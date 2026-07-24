<?php
session_start();
require('db1.php');

/* ===== SHOW ERRORS (remove later in production) ===== */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* ===== ROLE CHECK (staff / mng) ===== */
$role = $_SESSION['sess_userrole'] ?? '';
$queryc = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('staff','mng')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 == 0) {
  header('Location: login2?err=2');
  exit;
}

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

/* ===== bind helper ===== */
function bindParams(mysqli_stmt $stmt, string $types, array $params): void {
  if ($types === '' || empty($params)) return;
  $refs = [];
  $refs[] = $types;
  foreach ($params as $k => $v) $refs[] = &$params[$k];
  call_user_func_array([$stmt, 'bind_param'], $refs);
}

/* =========================================================
   MONEY HELPERS (cents)
========================================================= */
function toCents($v): int { return (int)round(((float)$v) * 100); }

function centsToSmart(int $cents): string {
  if ($cents % 100 === 0) return number_format($cents / 100, 0, '.', ',');
  return number_format($cents / 100, 2, '.', ',');
}

/* =========================================================
   Refund from refund_bill (replace old phar_sale_return)
   Rule: SUM(r_amount) WHERE date between start/end AND location!='IPD'
   Mode mapping:
   - cash   => p_mode='Cash'
   - bkash  => p_mode in ('bKash','Bkash','bkash')
   - card   => p_mode='Card'
   - cheque => p_mode='Cheque' (if you use cheque there)
   - all    => p_mode in ('Cash','Card','Cheque','bKash','Bkash','bkash')
========================================================= */
function refundBillSumCents(mysqli $con, string $start, string $end, string $modeLower): int {
  $modeLower = strtolower($modeLower);

  $sql = "SELECT COALESCE(SUM(r_amount),0) AS s
          FROM refund_bill
          WHERE DATE(`date`) BETWEEN ? AND ?
            AND location != 'IPD' ";

  $types = "ss";
  $params = [$start, $end];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sql .= " AND p_mode IN ('bKash','Bkash','bkash') ";
    } else {
      // Cash / Card / Cheque
      $sql .= " AND p_mode = ? ";
      $types .= "s";
      $params[] = ucfirst($modeLower); // cash->Cash, card->Card, cheque->Cheque
    }
  } else {
    $sql .= " AND p_mode IN ('Cash','Card','Cheque','bKash','Bkash','bkash') ";
  }

  $stmt = mysqli_prepare($con, $sql);
  bindParams($stmt, $types, $params);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($rs);

  return toCents($row['s'] ?? 0);
}

/* ===== pms_payment refund sum by mode ===== */
function paymentRefundSumCents(mysqli $con, string $start, string $end, string $modeLower): int {
  $modeLower = strtolower($modeLower);

  $sql = "SELECT COALESCE(SUM(amount),0) AS s
          FROM pms_payment
          WHERE DATE(`date`) BETWEEN ? AND ?
            AND refund IN ('1','2') ";
  $types = "ss";
  $params = [$start, $end];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sql .= " AND p_mode IN ('bKash','Bkash','bkash') ";
    } else {
      $sql .= " AND p_mode = ? ";
      $types .= "s";
      $params[] = ucfirst($modeLower);
    }
  }

  $stmt = mysqli_prepare($con, $sql);
  bindParams($stmt, $types, $params);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($rs);

  return toCents($row['s'] ?? 0);
}

/* ===== pms_payment collection sum (non-refund) by mode ===== */
function paymentCollectSumCents(mysqli $con, string $start, string $end, string $modeLower): int {
  $modeLower = strtolower($modeLower);

  $sql = "SELECT COALESCE(SUM(amount),0) AS s
          FROM pms_payment
          WHERE DATE(`date`) BETWEEN ? AND ?
            AND refund NOT IN ('1','2') ";
  $types = "ss";
  $params = [$start, $end];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sql .= " AND p_mode IN ('bKash','Bkash','bkash') ";
    } else {
      $sql .= " AND p_mode = ? ";
      $types .= "s";
      $params[] = ucfirst($modeLower);
    }
  }

  $stmt = mysqli_prepare($con, $sql);
  bindParams($stmt, $types, $params);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($rs);

  return toCents($row['s'] ?? 0);
}

/* ===== pms_payment discount sum by mode ===== */
function paymentDiscountSumCents(mysqli $con, string $start, string $end, string $modeLower): int {
  $modeLower = strtolower($modeLower);

  $sql = "SELECT COALESCE(SUM(dis_amount),0) AS s
          FROM pms_payment
          WHERE DATE(`date`) BETWEEN ? AND ? ";
  $types = "ss";
  $params = [$start, $end];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sql .= " AND p_mode IN ('bKash','Bkash','bkash') ";
    } else {
      $sql .= " AND p_mode = ? ";
      $types .= "s";
      $params[] = ucfirst($modeLower);
    }
  }

  $stmt = mysqli_prepare($con, $sql);
  bindParams($stmt, $types, $params);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($rs);

  return toCents($row['s'] ?? 0);
}

/* ===== pms_bill collection sum by mode (OPD_DIS/OTC_Sale/OPD_Medi) ===== */
function billCollectSumCents(mysqli $con, string $start, string $end, string $modeLower): int {
  $modeLower = strtolower($modeLower);

  $sql = "SELECT COALESCE(SUM(amount_receive),0) AS s
          FROM pms_bill
          WHERE DATE(`date`) BETWEEN ? AND ?
            AND location IN ('OPD_DIS','OTC_Sale','OPD_Medi') ";
  $types = "ss";
  $params = [$start, $end];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sql .= " AND p_mode IN ('bKash','Bkash','bkash','bkash') ";
    } else {
      $sql .= " AND p_mode = ? ";
      $types .= "s";
      $params[] = ucfirst($modeLower);
    }
  }

  $stmt = mysqli_prepare($con, $sql);
  bindParams($stmt, $types, $params);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($rs);

  return toCents($row['s'] ?? 0);
}

/* ===== pms_bill discount sum by mode ===== */
function billDiscountSumCents(mysqli $con, string $start, string $end, string $modeLower): int {
  $modeLower = strtolower($modeLower);

  $sql = "SELECT COALESCE(SUM(dis_amount),0) AS s
          FROM pms_bill
          WHERE DATE(`date`) BETWEEN ? AND ?
            AND location IN ('OPD_DIS','OTC_Sale','OPD_Medi') ";
  $types = "ss";
  $params = [$start, $end];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sql .= " AND p_mode IN ('bKash','Bkash','bkash','bkash') ";
    } else {
      $sql .= " AND p_mode = ? ";
      $types .= "s";
      $params[] = ucfirst($modeLower);
    }
  }

  $stmt = mysqli_prepare($con, $sql);
  bindParams($stmt, $types, $params);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($rs);

  return toCents($row['s'] ?? 0);
}

/* ===== Expenses ===== */
function expenseSumCents(mysqli $con, string $start, string $end, ?string $accountType=null): int {
  $sql = "SELECT COALESCE(SUM(total_amount),0) AS s
          FROM fund_transfer_master
          WHERE DATE(posting_date) BETWEEN ? AND ? ";
  $types = "ss";
  $params = [$start, $end];

  if ($accountType !== null) {
    $sql .= " AND account_type = ? ";
    $types .= "s";
    $params[] = $accountType;
  }

  $stmt = mysqli_prepare($con, $sql);
  bindParams($stmt, $types, $params);
  mysqli_stmt_execute($stmt);
  $rs = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($rs);

  return toCents($row['s'] ?? 0);
}

/* ===== Default dates ===== */
$didSearch = isset($_POST['bsearch']);
$start = $didSearch ? date('Y-m-d', strtotime($_POST['stdate'] ?? date('Y-m-01'))) : date('Y-m-01');
$end   = $didSearch ? date('Y-m-d', strtotime($_POST['endate'] ?? date('Y-m-d'))) : date('Y-m-d');

/* ===== Calculate report (ONLY if searched) ===== */
$cash = $card = $cheque = $bkash = 0;
$discCash = $discCard = $discBkash = 0;
$refundCash = $refundCard = $refundCheque = $refundBkash = 0;
$netCash = $netCard = $netCheque = $netBkash = 0;

$totalCollection = 0;
$totalDiscount   = 0;
$totalRefund     = 0;
$totalNet        = 0;

$expenseTotal = $expenseBank = $expensePetty = 0;

if ($didSearch) {
  // Mode collections = (pms_payment non-refund) + (pms_bill amount_receive) - (pms_bill dis_amount)
  $cash   = paymentCollectSumCents($con, $start, $end, 'cash')   + billCollectSumCents($con, $start, $end, 'cash')   - billDiscountSumCents($con, $start, $end, 'cash');
  $card   = paymentCollectSumCents($con, $start, $end, 'card')   + billCollectSumCents($con, $start, $end, 'card')   - billDiscountSumCents($con, $start, $end, 'card');
  $cheque = paymentCollectSumCents($con, $start, $end, 'cheque'); // bill side usually no cheque; keep payment only
  $bkash  = paymentCollectSumCents($con, $start, $end, 'bkash')  + billCollectSumCents($con, $start, $end, 'bkash')  - billDiscountSumCents($con, $start, $end, 'bkash');

  // Discounts from pms_payment by mode (you were subtracting these later)
  $discCash  = paymentDiscountSumCents($con, $start, $end, 'cash');
  $discCard  = paymentDiscountSumCents($con, $start, $end, 'card');
  $discBkash = paymentDiscountSumCents($con, $start, $end, 'bkash');

  // Refunds from pms_payment by mode + refund_bill by mode
  $refundCash   = paymentRefundSumCents($con, $start, $end, 'cash')   + refundBillSumCents($con, $start, $end, 'cash');
  $refundCard   = paymentRefundSumCents($con, $start, $end, 'card')   + refundBillSumCents($con, $start, $end, 'card');
  $refundCheque = paymentRefundSumCents($con, $start, $end, 'cheque') + refundBillSumCents($con, $start, $end, 'cheque');
  $refundBkash  = paymentRefundSumCents($con, $start, $end, 'bkash')  + refundBillSumCents($con, $start, $end, 'bkash');

  // Net per mode (your old logic had card/bkash subtract discount + refund; cash subtract discount + refund; cheque just subtract refund)
  $netCash   = $cash   - $discCash  - $refundCash;
  $netCard   = $card   - $discCard  - $refundCard;
  $netCheque = $cheque - $refundCheque;
  $netBkash  = $bkash  - $discBkash - $refundBkash;

  // Totals
  $totalCollection = $cash + $card + $cheque + $bkash;
  $totalDiscount   = $discCash + $discCard + $discBkash; // cheque discount usually 0 in your output
  $totalRefund     = $refundCash + $refundCard + $refundCheque + $refundBkash;
  $totalNet        = $totalCollection - $totalDiscount - $totalRefund;

  // Expenses
  $expenseTotal = expenseSumCents($con, $start, $end, null);
  $expenseBank  = expenseSumCents($con, $start, $end, 'Bank');
  $expensePetty = expenseSumCents($con, $start, $end, 'Petty Cash');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reconciliation Report</title>
  <link rel="stylesheet" href="jsnew/bootstrap.min.css" />
  <script src="jsnew/jjquery.min.js"></script>
  <script src="jsnew/bootstrap.min.js"></script>
  <style>
    body{ background:#f5f6fa; }
    .table th{ background:#2f3640; color:#fff; }
    .big{ font-size:18px; font-weight:bold; }
  </style>
</head>
<body>

<div class="container-fluid mt-3">

  <div class="d-flex align-items-center justify-content-between mb-2">
    <h4 class="mb-0">Date Wise Reconciliation Collection Report</h4>
    <small class="text-muted">Includes pms_payment + pms_bill + refunds (pms_payment + refund_bill) + expenses</small>
  </div>

  <form method="POST" class="card card-body mb-3">
    <div class="form-row align-items-end">
      <div class="col-md-3">
        <label><b>Select Start Date</b></label>
        <input type="date" name="stdate" class="form-control" value="<?=h($start)?>">
      </div>
      <div class="col-md-3">
        <label><b>Select End Date</b></label>
        <input type="date" name="endate" class="form-control" value="<?=h($end)?>">
      </div>
      <div class="col-md-3">
        <button class="btn btn-primary" type="submit" name="bsearch">Search</button>
        <a class="btn btn-secondary" href="<?=h($_SERVER['PHP_SELF'])?>">Reset</a>
      </div>
      <div class="col-md-3 text-right">
        <?php if($didSearch): ?>
          <div class="big text-success">
            Total Net: <?=h(centsToSmart($totalNet))?> BDT
          </div>
          <small class="text-muted">From <?=h($start)?> to <?=h($end)?></small>
        <?php endif; ?>
      </div>
    </div>
  </form>

  <?php if($didSearch): ?>

    <!-- SUMMARY TABLE -->
    <div class="card mb-3">
      <div class="card-header"><b>Summary (Mode Wise)</b></div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-sm mb-0">
            <thead>
              <tr>
                <th style="width:12%;">Type</th>
                <th style="width:22%;">Cash</th>
                <th style="width:22%;">Card</th>
                <th style="width:22%;">Cheque</th>
                <th style="width:22%;">Bkash</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="big text-success">Collection</td>
                <td class="big text-success"><?=h(centsToSmart($cash))?></td>
                <td class="big text-success"><?=h(centsToSmart($card))?></td>
                <td class="big text-success"><?=h(centsToSmart($cheque))?></td>
                <td class="big text-success"><?=h(centsToSmart($bkash))?></td>
              </tr>

              <tr>
                <td class="big text-danger">Discount</td>
                <td class="big text-danger"><?=h(centsToSmart($discCash))?></td>
                <td class="big text-danger"><?=h(centsToSmart($discCard))?></td>
                <td class="big text-danger"></td>
                <td class="big text-danger"><?=h(centsToSmart($discBkash))?></td>
              </tr>

              <tr>
                <td class="big text-danger">Refund</td>
                <td class="big text-danger"><?=h(centsToSmart($refundCash))?></td>
                <td class="big text-danger"><?=h(centsToSmart($refundCard))?></td>
                <td class="big text-danger"><?=h(centsToSmart($refundCheque))?></td>
                <td class="big text-danger"><?=h(centsToSmart($refundBkash))?></td>
              </tr>

              <tr>
                <td class="big text-success">Net Collection</td>
                <td class="big text-success"><?=h(centsToSmart($netCash))?></td>
                <td class="big text-success"><?=h(centsToSmart($netCard))?></td>
                <td class="big text-success"><?=h(centsToSmart($netCheque))?></td>
                <td class="big text-success"><?=h(centsToSmart($netBkash))?></td>
              </tr>

              <tr>
                <td class="big text-danger">Total Expenses</td>
                <td class="big text-danger"><?=h(centsToSmart($expenseTotal))?></td>
                <td></td>
                <td class="big text-danger">
                  <a target="_blank" href="expense_details?account_type=Bank&date=<?=h($start)?>&date1=<?=h($end)?>">
                    Cheque (Bank): <?=h(centsToSmart($expenseBank))?>
                  </a>
                  <br>
                  <a target="_blank" href="expense_details?account_type=Petty Cash&date=<?=h($start)?>&date1=<?=h($end)?>">
                    Petty Cash: <?=h(centsToSmart($expensePetty))?>
                  </a>
                </td>
                <td></td>
              </tr>

              <tr>
                <td class="big">TOTALS</td>
                <td class="big"><?=h(centsToSmart($cash))?></td>
                <td class="big"><?=h(centsToSmart($card))?></td>
                <td class="big"><?=h(centsToSmart($cheque))?></td>
                <td class="big"><?=h(centsToSmart($bkash))?></td>
              </tr>
              <tr>
                <td class="big text-primary">Grand Net</td>
                <td colspan="4" class="big text-primary">
                  Collection: <?=h(centsToSmart($totalCollection))?>
                  &nbsp; | Discount: <?=h(centsToSmart($totalDiscount))?>
                  &nbsp; | Refund: <?=h(centsToSmart($totalRefund))?>
                  &nbsp; | <b>Net: <?=h(centsToSmart($totalNet))?></b>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- BREAKDOWN TABLE (MISSING PART ADDED) -->
    <?php
      // Breakdown: pms_payment grouped by location (non refund)
      $sqlPayBreak = "
        SELECT
          COUNT(*) AS cnt,
          location,
          COALESCE(SUM(amount),0) AS total_amt,
          COALESCE(SUM(dis_amount),0) AS total_dis
        FROM pms_payment
        WHERE DATE(`date`) BETWEEN ? AND ?
          AND refund NOT IN ('1','2')
        GROUP BY location
        ORDER BY location
      ";
      $stmtPayBreak = mysqli_prepare($con, $sqlPayBreak);
      bindParams($stmtPayBreak, "ss", [$start, $end]);
      mysqli_stmt_execute($stmtPayBreak);
      $rsPayBreak = mysqli_stmt_get_result($stmtPayBreak);

      // Breakdown: pms_bill grouped by location (OPD_DIS/OTC_Sale/OPD_Medi)
      $sqlBillBreak = "
        SELECT
          COUNT(*) AS cnt,
          location,
          COALESCE(SUM(amount_receive),0) AS total_amt,
          COALESCE(SUM(dis_amount),0) AS total_dis
        FROM pms_bill
        WHERE DATE(`date`) BETWEEN ? AND ?
          AND location IN ('OPD_DIS','OTC_Sale','OPD_Medi')
        GROUP BY location
        ORDER BY location
      ";
      $stmtBillBreak = mysqli_prepare($con, $sqlBillBreak);
      bindParams($stmtBillBreak, "ss", [$start, $end]);
      mysqli_stmt_execute($stmtBillBreak);
      $rsBillBreak = mysqli_stmt_get_result($stmtBillBreak);
    ?>

    <div class="card">
      <div class="card-header"><b>Breakdown of the Collection (Location Wise)</b></div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-sm mb-0">
            <thead>
              <tr>
                <th style="width:140px; text-align:center;">No Of Records</th>
                <th style="width:220px; text-align:center;">Location</th>
                <th style="width:220px; text-align:center;">Total Amount</th>
                <th style="width:220px; text-align:center;">Total Discount</th>
                <th style="width:120px; text-align:center;">Source</th>
              </tr>
            </thead>
            <tbody>

              <?php while($r = mysqli_fetch_assoc($rsPayBreak)): ?>
                <tr>
                  <td class="text-center">
                    <a target="_blank"
                       href="breakdown_details?location=<?=h($r['location'])?>&date=<?=h($start)?>&date1=<?=h($end)?>">
                      <?=h((int)$r['cnt'])?>
                    </a>
                  </td>
                  <td class="text-center"><?=h($r['location'])?></td>
                  <td class="text-center"><?=h(centsToSmart(toCents($r['total_amt'])))?></td>
                  <td class="text-center"><?=h(centsToSmart(toCents($r['total_dis'])))?></td>
                  <td class="text-center"><span class="badge badge-info">PAYMENT</span></td>
                </tr>
              <?php endwhile; ?>

              <?php while($r = mysqli_fetch_assoc($rsBillBreak)): ?>
                <tr>
                  <td class="text-center">
                    <a target="_blank"
                       href="breakdown_details_phar?location=<?=h($r['location'])?>&date=<?=h($start)?>&date1=<?=h($end)?>">
                      <?=h((int)$r['cnt'])?>
                    </a>
                  </td>
                  <td class="text-center"><?=h($r['location'])?></td>
                  <td class="text-center"><?=h(centsToSmart(toCents($r['total_amt'])))?></td>
                  <td class="text-center"><?=h(centsToSmart(toCents($r['total_dis'])))?></td>
                  <td class="text-center"><span class="badge badge-primary">BILL</span></td>
                </tr>
              <?php endwhile; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  <?php endif; ?>

</div>
</body>
</html>