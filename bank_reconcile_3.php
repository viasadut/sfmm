<?php
session_start();
require('db1.php');

/* ===== SHOW ERRORS (remove later in production) ===== */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (!isset($_SESSION['sess_username'])) {
  header('Location: login2?err=2');
  exit;
}

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function bindParams(mysqli_stmt $stmt, string $types, array $params): void {
  if ($types === '' || empty($params)) return;
  $refs = [];
  $refs[] = $types;
  foreach ($params as $k => $v) $refs[] = &$params[$k];
  call_user_func_array([$stmt, 'bind_param'], $refs);
}

/* =========================================================
   MONEY HANDLING (Use integer cents everywhere)
========================================================= */
function toCents($v): int { return (int)round(((float)$v) * 100); }

function centsToDb(int $cents): string {
  if ($cents % 100 === 0) return (string)($cents / 100);
  return number_format($cents / 100, 2, '.', '');
}

function centsToSmart(int $cents): string {
  if ($cents % 100 === 0) return number_format($cents / 100, 0, '.', ',');
  return number_format($cents / 100, 2, '.', ',');
}

function smartNumber($v): string { return centsToSmart(toCents($v)); }

/* ===== ROUND REFUND TO WHOLE TAKA (NO DECIMALS) ===== */
function roundRefundCents(int $refundCents): int {
  return (int)(round($refundCents / 100) * 100);
}

/* =========================================================
   NORMALIZE MODE (handles bKash/Bkash/etc)
========================================================= */
function normalizeModeLower(string $m): string {
  $m = strtolower(trim($m));
  if ($m === 'bkash' || $m === 'b-kash') return 'bkash';
  if ($m === 'cash') return 'cash';
  if ($m === 'card') return 'card';
  if ($m === 'cheque' || $m === 'check') return 'cheque';
  if ($m === 'all') return 'all';
  return 'all';
}

/* =========================================================
   REFUND TOTAL (2 parts) -> returns cents (ROUNDED)
========================================================= */
function getRefundTotalCents(mysqli $con, string $from, string $to, string $modeLower): int {

  // -------- A) pms_payment refunds --------
  $sqlA = "
    SELECT COALESCE(SUM(amount),0) AS rsum
    FROM pms_payment
    WHERE refund IN ('1','2')
      AND DATE(`date`) BETWEEN ? AND ?
  ";
  $typesA  = "ss";
  $paramsA = [$from, $to];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sqlA .= " AND LOWER(p_mode) IN ('bkash','bkash','b-kash') ";
    } else {
      $sqlA .= " AND LOWER(p_mode) = ? ";
      $typesA .= "s";
      $paramsA[] = $modeLower;
    }
  }

  $stmtA = mysqli_prepare($con, $sqlA);
  bindParams($stmtA, $typesA, $paramsA);
  mysqli_stmt_execute($stmtA);
  $rsA  = mysqli_stmt_get_result($stmtA);
  $rowA = mysqli_fetch_assoc($rsA);
  $refundPaymentCents = toCents($rowA['rsum'] ?? 0);

  // -------- B) refund_bill refunds --------
  $refundBillCents = 0;

  $modeMap = [
    'cash'  => 'Cash',
    'bkash' => 'Bkash',
    'card'  => 'Card',
  ];

  $modesToInclude = [];
  if ($modeLower === 'all') {
    $modesToInclude = ['Cash','Bkash','Card'];
  } elseif (isset($modeMap[$modeLower])) {
    $modesToInclude = [$modeMap[$modeLower]];
  } else {
    $modesToInclude = []; // cheque -> none
  }

  if (!empty($modesToInclude)) {
    $ph = implode(',', array_fill(0, count($modesToInclude), '?'));

    $sqlB = "
      SELECT COALESCE(SUM(r_amount),0) AS rsum
      FROM refund_bill
      WHERE DATE(`date`) BETWEEN ? AND ?
        AND location != 'IPD'
        AND p_mode IN ($ph)
    ";

    $typesB  = "ss" . str_repeat("s", count($modesToInclude));
    $paramsB = array_merge([$from, $to], $modesToInclude);

    $stmtB = mysqli_prepare($con, $sqlB);
    bindParams($stmtB, $typesB, $paramsB);
    mysqli_stmt_execute($stmtB);
    $rsB  = mysqli_stmt_get_result($stmtB);
    $rowB = mysqli_fetch_assoc($rsB);

    $refundBillCents = toCents($rowB['rsum'] ?? 0);
  }

  $totalRefundCents = $refundPaymentCents + $refundBillCents;
  return roundRefundCents($totalRefundCents);
}

/* =========================================================
   DISCOUNT TOTAL -> returns cents
   UPDATED:
   - pms_payment dis_amount (refund NOT IN 1,2)
   - PLUS pms_bill dis_amount for locations OPD_Medi, OTC_Sale, OPD_DIS
========================================================= */
function getDiscountTotalCents(mysqli $con, string $from, string $to, string $modeLower): int {

  // -------- A) pms_payment discount --------
  $sqlA = "
    SELECT COALESCE(SUM(dis_amount),0) AS dsum
    FROM pms_payment
    WHERE refund NOT IN ('1','2')
      AND DATE(`date`) BETWEEN ? AND ?
  ";
  $typesA  = "ss";
  $paramsA = [$from, $to];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sqlA .= " AND p_mode IN ('bKash','Bkash','bkash','b-kash') ";
    } else {
      $sqlA .= " AND LOWER(p_mode) = ? ";
      $typesA .= "s";
      $paramsA[] = $modeLower;
    }
  }

  $stmtA = mysqli_prepare($con, $sqlA);
  bindParams($stmtA, $typesA, $paramsA);
  mysqli_stmt_execute($stmtA);
  $rsA  = mysqli_stmt_get_result($stmtA);
  $rowA = mysqli_fetch_assoc($rsA);
  $payDiscCents = toCents($rowA['dsum'] ?? 0);

  // -------- B) pms_bill discount (NEW) --------
  $sqlB = "
    SELECT COALESCE(SUM(dis_amount),0) AS dsum
    FROM pms_bill
    WHERE location IN ('OPD_Medi','OTC_Sale','OPD_DIS')
      AND DATE(`date`) BETWEEN ? AND ?
  ";
  $typesB  = "ss";
  $paramsB = [$from, $to];

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sqlB .= " AND p_mode IN ('bKash','Bkash','bkash','b-kash') ";
    } else {
      $sqlB .= " AND LOWER(p_mode) = ? ";
      $typesB .= "s";
      $paramsB[] = $modeLower;
    }
  }

  $stmtB = mysqli_prepare($con, $sqlB);
  bindParams($stmtB, $typesB, $paramsB);
  mysqli_stmt_execute($stmtB);
  $rsB  = mysqli_stmt_get_result($stmtB);
  $rowB = mysqli_fetch_assoc($rsB);
  $billDiscCents = toCents($rowB['dsum'] ?? 0);

  return $payDiscCents + $billDiscCents;
}

/* =========================================================
   AJAX: refund + discount for current filter (date + mode)
========================================================= */
if (isset($_GET['ajax']) && $_GET['ajax'] === 'deduct_sum') {
  header('Content-Type: application/json; charset=utf-8');
  try {
    $from = $_GET['from'] ?? date('Y-m-01');
    $to   = $_GET['to']   ?? date('Y-m-d');
    $modeLower = normalizeModeLower($_GET['mode'] ?? 'all');

    $refundCents   = getRefundTotalCents($con, $from, $to, $modeLower); // rounded
    $discountCents = getDiscountTotalCents($con, $from, $to, $modeLower);

    echo json_encode([
      'ok' => 1,
      'refund_cents' => $refundCents,
      'discount_cents' => $discountCents,
      'refund_display' => centsToSmart($refundCents),
      'discount_display' => centsToSmart($discountCents),
    ]);
    exit;

  } catch (Throwable $e) {
    echo json_encode(['ok'=>0,'refund_cents'=>0,'discount_cents'=>0,'err'=>$e->getMessage()]);
    exit;
  }
}

$user = $_SESSION['sess_username'] ?? '';

/* ===== POST: RECONCILE SELECTED ===== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['do_reconcile'])) {

  $keys = $_POST['keys'] ?? [];
  if (!is_array($keys) || empty($keys)) {
    $_SESSION['flash_msg']  = "No rows selected for reconciliation.";
    $_SESSION['flash_type'] = "danger";
    header("Location: ".$_SERVER['PHP_SELF']."?".($_SERVER['QUERY_STRING'] ?? ""));
    exit;
  }

  $postFrom = $_POST['from'] ?? date('Y-m-01');
  $postTo   = $_POST['to']   ?? date('Y-m-d');
  $postModeLower = normalizeModeLower($_POST['mode'] ?? 'all');

  $payIds  = [];
  $billIds = [];

  foreach ($keys as $k) {
    $k = trim((string)$k);
    if ($k === '') continue;
    if (preg_match('/^(P|B)\:(\d+)$/i', $k, $m)) {
      $src = strtoupper($m[1]);
      $id  = (int)$m[2];
      if ($id <= 0) continue;
      if ($src === 'P') $payIds[]  = $id;
      if ($src === 'B') $billIds[] = $id;
    }
  }

  if (empty($payIds) && empty($billIds)) {
    $_SESSION['flash_msg']  = "Invalid selection.";
    $_SESSION['flash_type'] = "danger";
    header("Location: ".$_SERVER['PHP_SELF']."?".($_SERVER['QUERY_STRING'] ?? ""));
    exit;
  }

  mysqli_begin_transaction($con);

  try {
    $recDate = date('Y-m-d H:i:s');
    $tbDate  = date('Y-m-d');

    $selectedCents = 0;

    // 1) sum pms_payment non-refund selected
    if (!empty($payIds)) {
      $ph = implode(',', array_fill(0, count($payIds), '?'));
      $sql = "
        SELECT COALESCE(SUM(amount),0) AS total_amt, COUNT(*) AS cnt
        FROM pms_payment
        WHERE billno1 IN ($ph)
          AND refund NOT IN ('1','2')
          AND (reconcile_status = 0 OR reconcile_status IS NULL)
        FOR UPDATE
      ";
      $stmt = mysqli_prepare($con, $sql);
      bindParams($stmt, str_repeat('i', count($payIds)), $payIds);
      mysqli_stmt_execute($stmt);
      $rs = mysqli_stmt_get_result($stmt);
      $r  = mysqli_fetch_assoc($rs);

      $cntP = (int)($r['cnt'] ?? 0);
      if ($cntP !== count($payIds)) {
        throw new Exception("Some selected pms_payment rows already reconciled / not found.");
      }

      $selectedCents += toCents($r['total_amt'] ?? 0);
    }

    // 2) sum pms_bill selected (amount_receive)
    if (!empty($billIds)) {
      $ph = implode(',', array_fill(0, count($billIds), '?'));
      $sql = "
        SELECT COALESCE(SUM(amount_receive),0) AS total_amt, COUNT(*) AS cnt
        FROM pms_bill
        WHERE billno IN ($ph)
          AND location IN ('OTC_Sale','OPD_Medi','OPD_DIS')
          AND (reconcile_status = 0 OR reconcile_status IS NULL)
        FOR UPDATE
      ";
      $stmt = mysqli_prepare($con, $sql);
      bindParams($stmt, str_repeat('i', count($billIds)), $billIds);
      mysqli_stmt_execute($stmt);
      $rs = mysqli_stmt_get_result($stmt);
      $r  = mysqli_fetch_assoc($rs);

      $cntB = (int)($r['cnt'] ?? 0);
      if ($cntB !== count($billIds)) {
        throw new Exception("Some selected pms_bill rows already reconciled / not found.");
      }

      $selectedCents += toCents($r['total_amt'] ?? 0);
    }

    if ($selectedCents <= 0) throw new Exception("Total selected amount is 0.");

    // 3) Deductions for current filter mode/date (not per-row)
    $refundCents   = getRefundTotalCents($con, $postFrom, $postTo, $postModeLower); // rounded
    $discountCents = getDiscountTotalCents($con, $postFrom, $postTo, $postModeLower); // UPDATED

    $netCents = $selectedCents - $refundCents - $discountCents;
    if ($netCents <= 0) {
      throw new Exception("Net reconcile amount <= 0 after deductions.");
    }

    // update pms_payment selected
    if (!empty($payIds)) {
      $sql = "
        UPDATE pms_payment
        SET reconcile_status=1, reconcile_date=?, reconcile_by=?
        WHERE billno1 = ?
          AND refund NOT IN ('1','2')
          AND (reconcile_status=0 OR reconcile_status IS NULL)
      ";
      $stmt = mysqli_prepare($con, $sql);
      foreach ($payIds as $pid) {
        bindParams($stmt, "ssi", [$recDate, $user, (int)$pid]);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) !== 1) {
          throw new Exception("Payment update affected 0 row for ID {$pid}.");
        }
      }
    }

    // update pms_bill selected
    if (!empty($billIds)) {
      $sql = "
        UPDATE pms_bill
        SET reconcile_status=1, reconcile_date=?, reconcile_by=?
        WHERE billno = ?
          AND location IN ('OTC_Sale','OPD_Medi','OPD_DIS')
          AND (reconcile_status=0 OR reconcile_status IS NULL)
      ";
      $stmt = mysqli_prepare($con, $sql);
      foreach ($billIds as $bid) {
        bindParams($stmt, "ssi", [$recDate, $user, (int)$bid]);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) !== 1) {
          throw new Exception("Bill update affected 0 row for ID {$bid}.");
        }
      }
    }

    // insert TB with NET amount
    $trans_id = 'REC-' . date('YmdHis');
    $sqlTB = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) VALUES (?,?,?,?,?,?)";
    $stmtTB = mysqli_prepare($con, $sqlTB);
    $location = 'Reconciled';

    $netDbFloat = (float)centsToDb($netCents);

    bindParams($stmtTB, "ssssds", [$trans_id, 'CR', '619210', $tbDate, $netDbFloat, $location]);
    mysqli_stmt_execute($stmtTB);

    bindParams($stmtTB, "ssssds", [$trans_id, 'DR', '619910', $tbDate, $netDbFloat, $location]);
    mysqli_stmt_execute($stmtTB);

    mysqli_commit($con);

    $_SESSION['flash_msg'] =
      "Reconciled OK. Selected Total: ".centsToSmart($selectedCents).
      ", Refund(-): ".centsToSmart($refundCents).
      ", Discount(-): ".centsToSmart($discountCents).
      ", Net Total: ".centsToSmart($netCents).
      ", TB trans_id: {$trans_id}";
    $_SESSION['flash_type'] = "success";

  } catch (Exception $e) {
    mysqli_rollback($con);
    $_SESSION['flash_msg']  = "Reconcile unsuccessful! Rolled back. Reason: ".$e->getMessage();
    $_SESSION['flash_type'] = "danger";
  }

  header("Location: ".$_SERVER['PHP_SELF']."?".($_SERVER['QUERY_STRING'] ?? ""));
  exit;
}

/* ===== Default Filters ===== */
$from = $_GET['from'] ?? date('Y-m-01');
$to   = $_GET['to']   ?? date('Y-m-d');
$modeLower = normalizeModeLower($_GET['mode'] ?? 'ALL');

$charge = $_GET['charge'] ?? '';
$chargeVal = is_numeric(str_replace(',', '.', $charge)) ? (float)str_replace(',', '.', $charge) : 0.0;

$isChargeRequired = in_array($modeLower, ['bkash','card'], true);
$canRunQuery = !($isChargeRequired && $chargeVal <= 0);

$res = false;
$rowCount = 0;

if ($canRunQuery) {
  $params = [$from, $to, $from, $to];
  $types  = "ssss";

  $sql = "
    SELECT *
    FROM (
      SELECT
        'P' AS src,
        billno1 AS rid,
        DATE(`date`) AS tdate,
        p_mode AS pmode,
        billno AS refno,
        amount AS amt,
        remarks AS rem,
        COALESCE(reconcile_status,0) AS rec_status,
        reconcile_date AS rec_date,
        reconcile_by AS rec_by
      FROM pms_payment
      WHERE refund NOT IN ('1','2')
        AND DATE(`date`) BETWEEN ? AND ?

      UNION ALL

      SELECT
        'B' AS src,
        billno AS rid,
        DATE(`date`) AS tdate,
        p_mode AS pmode,
        billno AS refno,
        amount_receive AS amt,
        location AS rem,
        COALESCE(reconcile_status,0) AS rec_status,
        reconcile_date AS rec_date,
        reconcile_by AS rec_by
      FROM pms_bill
      WHERE location IN ('OTC_Sale','OPD_Medi','OPD_DIS')
        AND DATE(`date`) BETWEEN ? AND ?
    ) X
  ";

  if ($modeLower !== 'all') {
    if ($modeLower === 'bkash') {
      $sql .= " WHERE X.pmode IN ('bKash','Bkash','bkash','b-kash') ";
    } else {
      $sql .= " WHERE LOWER(X.pmode) = ? ";
      $params[] = $modeLower;
      $types .= "s";
    }
  }

  $sql .= " ORDER BY X.tdate DESC, X.src ASC, X.rid DESC ";

  $stmt = mysqli_prepare($con, $sql);
  bindParams($stmt, $types, $params);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bank Reconciliation</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body{ background:#f5f6fa; }
    .table th{ background:#2f3640; color:#fff; }
    .sticky-total{
      position: sticky; bottom: 0; background: #fff;
      border-top: 2px solid #ddd; padding: 10px; z-index: 999;
    }
    .chargeBox{ display:none; padding:10px; background:#f8f9fa; border:1px solid #e5e5e5; border-radius:6px; margin-top:10px; }
    tr.reconciled{ background:#d4edda; }
    .badge-src{ font-size:12px; }
  </style>
</head>
<body>
<div class="container-fluid mt-3">

<?php
if (!empty($_SESSION['flash_msg'])) {
  $type = $_SESSION['flash_type'] ?? 'success';
  $msg  = $_SESSION['flash_msg'];
  unset($_SESSION['flash_msg'], $_SESSION['flash_type']);
  echo "<div class='alert alert-".h($type)."'>".h($msg)."</div>";
}
?>

<div class="d-flex align-items-center justify-content-between mb-2">
  <h4 class="mb-0">Bank Reconciliation</h4>
  <small class="text-muted">pms_payment (refund NOT IN 1,2) + pms_bill (OTC_Sale/OPD_Medi/OPD_DIS)</small>
</div>

<form method="get" class="card card-body mb-3" id="filterForm">
  <div class="form-row align-items-end">
    <div class="col-md-3">
      <label>From</label>
      <input type="date" name="from" class="form-control" id="fromDate" value="<?=h($from)?>">
    </div>
    <div class="col-md-3">
      <label>To</label>
      <input type="date" name="to" class="form-control" id="toDate" value="<?=h($to)?>">
    </div>
    <div class="col-md-3">
      <label>Payment Mode</label>
      <select name="mode" class="form-control" id="modeSelect">
        <option value="ALL"    <?=($modeLower==='all'?'selected':'')?>>All</option>
        <option value="cash"   <?=($modeLower==='cash'?'selected':'')?>>Cash</option>
        <option value="bkash"  <?=($modeLower==='bkash'?'selected':'')?>>bKash</option>
        <option value="card"   <?=($modeLower==='card'?'selected':'')?>>Card</option>
        <option value="cheque" <?=($modeLower==='cheque'?'selected':'')?>>Cheque</option>
      </select>

      <div class="chargeBox" id="chargeBox">
        <div class="form-row">
          <div class="col-6">
            <label class="mb-1">Charge % (Mandatory for bKash/Card)</label>
            <input type="text" class="form-control form-control-sm" id="chargePercent" name="charge"
                   value="<?=h($charge)?>" placeholder="Ex: 1.50">
            <div class="invalid-feedback">Charge % is required for bKash/Card.</div>
            <small class="text-muted">You can type 1.5 or 1,5</small>
          </div>
          <div class="col-6">
            <label class="mb-1">Charge Amount</label>
            <input type="text" class="form-control form-control-sm" id="chargeAmount" value="0" readonly>
            <label class="mb-1 mt-2">Net After Charge</label>
            <input type="text" class="form-control form-control-sm" id="netAfterCharge" value="0" readonly>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-3">
      <button class="btn btn-primary" type="submit">Search</button>
      <a class="btn btn-secondary" href="<?=h($_SERVER['PHP_SELF'])?>">Reset</a>
    </div>
  </div>

  <?php if(!$canRunQuery && $isChargeRequired): ?>
    <div class="alert alert-warning mt-3 mb-0">
      Please enter <b>Charge %</b> for <b><?=h(strtoupper($modeLower))?></b> to load data.
    </div>
  <?php endif; ?>
</form>

<form method="post" id="reconcileForm" class="card">
  <input type="hidden" name="from" value="<?=h($from)?>">
  <input type="hidden" name="to" value="<?=h($to)?>">
  <input type="hidden" name="mode" value="<?=h($modeLower)?>">

  <div class="card-header d-flex justify-content-between align-items-center">
    <b>Transactions</b>
    <button type="submit" name="do_reconcile" class="btn btn-success btn-sm" id="btnReconcile" disabled>Reconcile Selected</button>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-bordered table-sm mb-0" id="payTable">
        <thead>
          <tr>
            <th style="width:40px;text-align:center;"><input type="checkbox" id="checkAll"></th>
            <th style="width:90px;">SRC</th>
            <th style="width:90px;">ID</th>
            <th style="width:120px;">Date</th>
            <th style="width:120px;">Mode</th>
            <th style="width:160px;">Reference</th>
            <th style="width:140px;text-align:right;">Amount</th>
            <th>Remarks / Location</th>
            <th style="width:120px;">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if ($canRunQuery && $res) {
          while($row = mysqli_fetch_assoc($res)){
            $rowCount++;
            $amt   = $row['amt'];
            $amtCents = toCents($amt);
            $isRec = ((int)$row['rec_status'] === 1);
            $trCls = $isRec ? "reconciled" : "";

            $src = $row['src'];
            $rid = $row['rid'];
            $key = $src . ":" . $rid;

            echo "<tr class='{$trCls}'>";
            echo "<td style='text-align:center;'>";
            echo $isRec
              ? "<input type='checkbox' disabled>"
              : "<input type='checkbox' class='rowCheck' data-cents='".h($amtCents)."' data-key='".h($key)."'>";
            echo "</td>";

            $srcBadge = ($src === 'P')
              ? "<span class='badge badge-info badge-src'>PAY</span>"
              : "<span class='badge badge-primary badge-src'>BILL</span>";

            echo "<td>{$srcBadge}</td>";
            echo "<td>".h($rid)."</td>";
            echo "<td>".h($row['tdate'])."</td>";
            echo "<td>".h($row['pmode'])."</td>";
            echo "<td>".h($row['refno'])."</td>";
            echo "<td style='text-align:right;'>".h(smartNumber($amt))."</td>";
            echo "<td>".h($row['rem'])."</td>";

            if ($isRec) {
              $info = "Reconciled";
              if (!empty($row['rec_date'])) $info .= "<br><small>".h($row['rec_date'])."</small>";
              if (!empty($row['rec_by']))   $info .= "<br><small>By: ".h($row['rec_by'])."</small>";
              echo "<td><span class='badge badge-success'>Done</span><div>{$info}</div></td>";
            } else {
              echo "<td><span class='badge badge-warning'>Pending</span></td>";
            }
            echo "</tr>";
          }
          if($rowCount === 0){
            echo "<tr><td colspan='9' class='text-center p-3 text-muted'>No records found for this filter.</td></tr>";
          }
        } else {
          echo "<tr><td colspan='9' class='text-center p-3 text-muted'>Select filters to load data.</td></tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="sticky-total">
    <div class="row">
      <div class="col-md-2"><b>Selected Rows:</b> <span id="selCount">0</span></div>
      <div class="col-md-2 text-right"><b>Selected Total:</b> <span style="font-size:18px;" id="selTotal">0</span></div>
      <div class="col-md-2 text-right"><b>Refund(-):</b> <span style="font-size:18px;" id="refundBottom">0</span></div>
      <div class="col-md-2 text-right"><b>Discount(-):</b> <span style="font-size:18px;" id="discountBottom">0</span></div>
      <div class="col-md-2 text-right"><b>Charge:</b> <span style="font-size:18px;" id="chargeBottom">0</span></div>
      <div class="col-md-2 text-right"><b>Net Total:</b> <span style="font-size:18px;" id="netTotalBottom">0</span></div>
    </div>
  </div>

</form>

</div>

<script>
function centsToSmartJS(cents){
  cents = parseInt(cents || 0, 10);
  if (!isFinite(cents)) cents = 0;
  const whole = (cents % 100 === 0);
  const val = cents / 100;
  if (whole) return val.toLocaleString(undefined, {maximumFractionDigits:0});
  return val.toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});
}
function roundRefundCentsJS(refundCents){
  refundCents = parseInt(refundCents || 0, 10);
  if (!isFinite(refundCents)) refundCents = 0;
  return Math.round(refundCents / 100) * 100;
}
function getChargePercent(){
  const raw = (document.getElementById('chargePercent').value || '').trim().replace(',', '.');
  const v = parseFloat(raw);
  return isFinite(v) ? v : 0;
}
function isChargeRequired(){
  const mode = (document.getElementById('modeSelect').value || '').toLowerCase();
  return (mode === 'bkash' || mode === 'card');
}
function getSelectedTotalCents(){
  let total = 0;
  document.querySelectorAll('.rowCheck:checked').forEach(cb => {
    const c = parseInt(cb.dataset.cents || '0', 10);
    if (isFinite(c)) total += c;
  });
  return total;
}
function calcChargeCents(totalAfterDeductionsCents){
  const percent = getChargePercent();
  if (isChargeRequired() && percent > 0) {
    const charge = Math.round(totalAfterDeductionsCents * (percent / 100));
    return {chargeCents: charge, netCents: totalAfterDeductionsCents - charge};
  }
  return {chargeCents: 0, netCents: totalAfterDeductionsCents};
}
function syncHiddenInputs(){
  const form = document.getElementById('reconcileForm');
  form.querySelectorAll('input[name="keys[]"]').forEach(e => e.remove());
  document.querySelectorAll('.rowCheck:checked').forEach(cb => {
    const hid = document.createElement('input');
    hid.type = 'hidden';
    hid.name = 'keys[]';
    hid.value = cb.dataset.key;
    form.appendChild(hid);
  });
}

let deductTimer = null;

async function fetchDeductions(){
  const url = new URL(window.location.href);
  url.searchParams.set('ajax', 'deduct_sum');
  url.searchParams.set('from', document.getElementById('fromDate').value);
  url.searchParams.set('to', document.getElementById('toDate').value);
  url.searchParams.set('mode', (document.getElementById('modeSelect').value || 'ALL').toLowerCase());

  const r = await fetch(url.toString(), {headers: {'X-Requested-With':'XMLHttpRequest'}});
  const j = await r.json();

  let refundCents     = (j && j.ok) ? parseInt(j.refund_cents || 0, 10) : 0;
  const discountCents = (j && j.ok) ? parseInt(j.discount_cents || 0, 10) : 0;

  refundCents = roundRefundCentsJS(refundCents);

  document.getElementById('refundBottom').innerText   = centsToSmartJS(refundCents);
  document.getElementById('discountBottom').innerText = centsToSmartJS(discountCents);

  return {refundCents, discountCents};
}

function recalc(){
  const selectedCount = document.querySelectorAll('.rowCheck:checked').length;
  const selectedCents = getSelectedTotalCents();

  document.getElementById('selCount').innerText = selectedCount;
  document.getElementById('selTotal').innerText = centsToSmartJS(selectedCents);
  document.getElementById('btnReconcile').disabled = (selectedCount === 0);

  syncHiddenInputs();

  if (deductTimer) clearTimeout(deductTimer);
  deductTimer = setTimeout(async () => {
    const d = await fetchDeductions();
    const afterDeductCents = selectedCents - d.refundCents - d.discountCents;
    const out = calcChargeCents(afterDeductCents);

    document.getElementById('chargeBottom').innerText = centsToSmartJS(out.chargeCents);
    document.getElementById('netTotalBottom').innerText = centsToSmartJS(out.netCents);

    document.getElementById('chargeAmount').value = centsToSmartJS(out.chargeCents);
    document.getElementById('netAfterCharge').value = centsToSmartJS(out.netCents);
  }, 150);
}

const modeSelect = document.getElementById('modeSelect');
const chargeBox = document.getElementById('chargeBox');
const chargePercent = document.getElementById('chargePercent');

function toggleChargeBox(){
  if (isChargeRequired()) chargeBox.style.display = 'block';
  else { chargeBox.style.display = 'none'; chargePercent.value=''; }
  recalc();
}

document.getElementById('checkAll')?.addEventListener('change', function(){
  const state = this.checked;
  document.querySelectorAll('.rowCheck').forEach(cb => cb.checked = state);
  recalc();
});

document.querySelectorAll('.rowCheck').forEach(cb => cb.addEventListener('change', recalc));

modeSelect.addEventListener('change', function(){
  toggleChargeBox();
  document.getElementById('filterForm').submit();
});

chargePercent.addEventListener('input', function(){
  if (!isChargeRequired()) { recalc(); return; }
  const v = getChargePercent();
  if (!v || v <= 0) this.classList.add('is-invalid');
  else this.classList.remove('is-invalid');
  document.getElementById('filterForm').submit();
});

document.getElementById('fromDate').addEventListener('change', ()=>document.getElementById('filterForm').submit());
document.getElementById('toDate').addEventListener('change', ()=>document.getElementById('filterForm').submit());

document.getElementById('reconcileForm').addEventListener('submit', function(e){
  if (document.querySelectorAll('.rowCheck:checked').length === 0) {
    e.preventDefault();
    alert("Please select at least one row to reconcile.");
    return;
  }
  if (!confirm("Reconcile selected transactions?")) e.preventDefault();
});

toggleChargeBox();
recalc();
</script>
</body>
</html>