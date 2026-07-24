<?php
session_start();
require('db1.php');

if (!isset($_SESSION['sess_username'])) {
  header('Location: login2?err=2');
  exit;
}

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
$user = $_SESSION['sess_username'] ?? '';

/* =========================================================
   IMPORTANT NOTES (adjust field names if your DB differs)
   ---------------------------------------------------------
   pms_payment:
     - PK/row id used here: billno1 (as you used before)
     - date field: date
     - mode field: p_mode
     - amount field: amount
     - refund flag: refund
     - reconcile fields: reconcile_status, reconcile_date, reconcile_by

   pms_bill:
     - PK/row id used here: id
     - date field (assumed): date
     - mode field (assumed): p_mode  (if your pms_bill uses pmode/payment_mode -> change below)
     - amount field (assumed): net_total (if your field is total/grand_total -> change below)
     - location filter: location IN ('OTC_Sale','OPD_Medi','OPD_DIS')
     - reconcile fields (assumed): reconcile_status, reconcile_date, reconcile_by
       If pms_bill doesn't have these 3 columns, add them or change code accordingly.
========================================================= */

/* ===== POST: RECONCILE SELECTED (PAYMENT + BILL) ===== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['do_reconcile'])) {

  $keys = $_POST['keys'] ?? [];
  if (!is_array($keys) || count($keys) === 0) {
    $_SESSION['flash_msg']  = "No rows selected for reconciliation.";
    $_SESSION['flash_type'] = "danger";
    header("Location: ".$_SERVER['PHP_SELF']."?".($_SERVER['QUERY_STRING'] ?? ""));
    exit;
  }

  // Parse keys like: P:123 (pms_payment billno1) , B:456 (pms_bill id)
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

  if (count($payIds) + count($billIds) === 0) {
    $_SESSION['flash_msg']  = "Invalid selection.";
    $_SESSION['flash_type'] = "danger";
    header("Location: ".$_SERVER['PHP_SELF']."?".($_SERVER['QUERY_STRING'] ?? ""));
    exit;
  }

  // Start transaction
  mysqli_begin_transaction($con);

  try {
    $recDate = date('Y-m-d H:i:s');
    $tbDate  = date('Y-m-d');
    $total_reconcile_amount = 0.0;

    /* ===== 1) Lock + SUM selected from pms_payment ===== */
    if (count($payIds) > 0) {
      $phP = implode(',', array_fill(0, count($payIds), '?'));
      $tp  = str_repeat('i', count($payIds));

      $sqlPTotal = "
        SELECT COALESCE(SUM(amount),0) AS total_amt, COUNT(*) AS cnt
        FROM pms_payment
        WHERE billno1 IN ($phP)
          AND refund != '1'
          AND (reconcile_status = 0 OR reconcile_status IS NULL)
        FOR UPDATE
      ";
      $stmtPT = mysqli_prepare($con, $sqlPTotal);
      if (!$stmtPT) throw new Exception("Prepare failed (payment total): ".mysqli_error($con));

      mysqli_stmt_bind_param($stmtPT, $tp, ...$payIds);
      if (!mysqli_stmt_execute($stmtPT)) throw new Exception("Execute failed (payment total): ".mysqli_stmt_error($stmtPT));

      $rs = mysqli_stmt_get_result($stmtPT);
      $r  = mysqli_fetch_assoc($rs);
      $sumP = (float)($r['total_amt'] ?? 0);
      $cntP = (int)($r['cnt'] ?? 0);

      if ($cntP !== count($payIds)) {
        throw new Exception("Some selected pms_payment rows are already reconciled / not found. Rollback.");
      }
      $total_reconcile_amount += $sumP;
    }

    /* ===== 2) Lock + SUM selected from pms_bill ===== */
    if (count($billIds) > 0) {
      $phB = implode(',', array_fill(0, count($billIds), '?'));
      $tb  = str_repeat('i', count($billIds));

      // Amount field assumed: net_total (CHANGE if needed)
      $sqlBTotal = "
        SELECT COALESCE(SUM(amount),0) AS total_amt, COUNT(*) AS cnt
        FROM pms_bill
        WHERE billno IN ($phB)
          AND location IN ('OTC_Sale','OPD_Medi','OPD_DIS')
          AND (reconcile_status = 0 OR reconcile_status IS NULL)
        FOR UPDATE
      ";
      $stmtBT = mysqli_prepare($con, $sqlBTotal);
      if (!$stmtBT) throw new Exception("Prepare failed (bill total): ".mysqli_error($con));

      mysqli_stmt_bind_param($stmtBT, $tb, ...$billIds);
      if (!mysqli_stmt_execute($stmtBT)) throw new Exception("Execute failed (bill total): ".mysqli_stmt_error($stmtBT));

      $rs = mysqli_stmt_get_result($stmtBT);
      $r  = mysqli_fetch_assoc($rs);
      $sumB = (float)($r['total_amt'] ?? 0);
      $cntB = (int)($r['cnt'] ?? 0);

      if ($cntB !== count($billIds)) {
        throw new Exception("Some selected pms_bill rows are already reconciled / not found. Rollback.");
      }
      $total_reconcile_amount += $sumB;
    }

    if ($total_reconcile_amount <= 0) {
      throw new Exception("Total reconcile amount is 0. Nothing to reconcile.");
    }

    /* ===== 3) Update pms_payment reconcile fields ===== */
    if (count($payIds) > 0) {
      $sqlPUp = "
        UPDATE pms_payment
        SET reconcile_status = 1,
            reconcile_date   = ?,
            reconcile_by     = ?
        WHERE billno1 = ?
          AND refund != '1'
          AND (reconcile_status = 0 OR reconcile_status IS NULL)
      ";
      $stmtPU = mysqli_prepare($con, $sqlPUp);
      if (!$stmtPU) throw new Exception("Prepare failed (payment update): ".mysqli_error($con));

      foreach ($payIds as $pid) {
        mysqli_stmt_bind_param($stmtPU, "ssi", $recDate, $user, $pid);
        if (!mysqli_stmt_execute($stmtPU)) {
          throw new Exception("Payment update failed for ID {$pid}: ".mysqli_stmt_error($stmtPU));
        }
        if (mysqli_stmt_affected_rows($stmtPU) !== 1) {
          throw new Exception("Payment update affected 0 row for ID {$pid} (already reconciled?).");
        }
      }
    }

    /* ===== 4) Update pms_bill reconcile fields ===== */
    if (count($billIds) > 0) {
      $sqlBUp = "
        UPDATE pms_bill
        SET reconcile_status = 1,
            reconcile_date   = ?,
            reconcile_by     = ?
        WHERE billno = ?
          AND location IN ('OTC_Sale','OPD_Medi','OPD_DIS')
          AND (reconcile_status = 0 OR reconcile_status IS NULL)
      ";
      $stmtBU = mysqli_prepare($con, $sqlBUp);
      if (!$stmtBU) throw new Exception("Prepare failed (bill update): ".mysqli_error($con));

      foreach ($billIds as $bid) {
        mysqli_stmt_bind_param($stmtBU, "ssi", $recDate, $user, $bid);
        if (!mysqli_stmt_execute($stmtBU)) {
          throw new Exception("Bill update failed for ID {$bid}: ".mysqli_stmt_error($stmtBU));
        }
        if (mysqli_stmt_affected_rows($stmtBU) !== 1) {
          throw new Exception("Bill update affected 0 row for ID {$bid} (already reconciled?).");
        }
      }
    }

    /* ===== 5) Insert pms_tb (CR + DR) ===== */
    $trans_id = 'REC-' . date('YmdHis');

    $sqlTB = "
      INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
      VALUES (?,?,?,?,?,?)
    ";
    $stmtTB = mysqli_prepare($con, $sqlTB);
    if (!$stmtTB) throw new Exception("Prepare failed (tb insert): ".mysqli_error($con));

    $location = 'Reconciled';

    // CR
    $trans_type = 'CR';
    $acct_code  = '619210';
    mysqli_stmt_bind_param($stmtTB, "ssssds", $trans_id, $trans_type, $acct_code, $tbDate, $total_reconcile_amount, $location);
    if (!mysqli_stmt_execute($stmtTB)) throw new Exception("TB insert failed (CR): ".mysqli_stmt_error($stmtTB));

    // DR
    $trans_type = 'DR';
    $acct_code  = '619910';
    mysqli_stmt_bind_param($stmtTB, "ssssds", $trans_id, $trans_type, $acct_code, $tbDate, $total_reconcile_amount, $location);
    if (!mysqli_stmt_execute($stmtTB)) throw new Exception("TB insert failed (DR): ".mysqli_stmt_error($stmtTB));

    mysqli_commit($con);

    $_SESSION['flash_msg']  =
      "Reconciled OK. Payment rows: ".count($payIds).
      ", Bill rows: ".count($billIds).
      ", Total: ".number_format($total_reconcile_amount,2).
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

/* Payment mode filter */
$mode = $_GET['mode'] ?? 'ALL';
$modeLower = strtolower($mode);

/* Charge % (mandatory only for bkash/card) */
$charge = $_GET['charge'] ?? '';
$chargeVal = is_numeric($charge) ? (float)$charge : 0.0;

/* Allowed modes */
$allowedModes = ['all','cash','bkash','card','cheque'];
if (!in_array($modeLower, $allowedModes, true)) $modeLower = 'all';
$isChargeRequired = in_array($modeLower, ['bkash','card'], true);

/* If bkash/card selected but charge is missing/invalid, keep page but don't run query */
$canRunQuery = true;
if ($isChargeRequired && $chargeVal <= 0) $canRunQuery = false;

/* ===== Fetch combined rows (pms_payment + pms_bill) ===== */
$res = false;
$rowCount = 0;

if ($canRunQuery) {
  $params = [$from, $to, $from, $to];
  $types  = "ssss";

  // NOTE: change pms_bill fields if needed:
  //   - date -> your bill date field
  //   - p_mode -> your bill payment mode field (pmode/payment_mode)
  //   - net_total -> your bill amount field
  $sql = "
    SELECT *
    FROM (
      /* pms_payment */
      SELECT
        'P' AS src,
        billno1 AS rid,
        date AS tdate,
        p_mode AS pmode,
        billno AS refno,
        amount AS amt,
        remarks AS rem,
        COALESCE(reconcile_status,0) AS rec_status,
        reconcile_date AS rec_date,
        reconcile_by AS rec_by,
        'pms_payment' AS tbl
      FROM pms_payment
      WHERE refund != '1'
        AND date BETWEEN ? AND ?

      UNION ALL

      /* pms_bill (ONLY locations you asked) */
      SELECT
        'B' AS src,
        billno AS rid,
        date AS tdate,
        p_mode AS pmode,
        billno AS refno,
        amount AS amt,
        location AS rem,
        COALESCE(reconcile_status,0) AS rec_status,
        reconcile_date AS rec_date,
        reconcile_by AS rec_by,
        'pms_bill' AS tbl
      FROM pms_bill
      WHERE location IN ('OTC_Sale','OPD_Medi','OPD_DIS')
        AND date BETWEEN ? AND ?
    ) X
  ";

  if ($modeLower !== 'all') {
    $sql .= " WHERE LOWER(X.pmode) LIKE ? ";
    $params[] = "%".$modeLower."%";
    $types .= "s";
  }

  $sql .= " ORDER BY X.tdate DESC, X.src ASC, X.rid DESC ";

  $stmt = mysqli_prepare($con, $sql) or die("Prepare failed: " . mysqli_error($con));
  mysqli_stmt_bind_param($stmt, $types, ...$params);
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
      position: sticky;
      bottom: 0;
      background: #ffffff;
      border-top: 2px solid #ddd;
      padding: 10px;
      z-index: 999;
    }
    .chargeBox{
      display:none;
      padding:10px;
      background:#f8f9fa;
      border:1px solid #e5e5e5;
      border-radius:6px;
      margin-top:10px;
    }
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
    <small class="text-muted">pms_payment (refund != 1) + pms_bill (OTC_Sale/OPD_Medi/OPD_DIS)</small>
  </div>

  <!-- Filters (auto submit) -->
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
              <input type="number" step="0.01" min="0"
                     class="form-control form-control-sm"
                     id="chargePercent" name="charge"
                     value="<?=h($charge)?>"
                     placeholder="Ex: 1.50">
              <div class="invalid-feedback">Charge % is required for bKash/Card.</div>
              <small class="text-muted">Charge is used for display totals only.</small>
            </div>
            <div class="col-6">
              <label class="mb-1">Charge Amount</label>
              <input type="text" class="form-control form-control-sm" id="chargeAmount" value="0.00" readonly>
              <label class="mb-1 mt-2">Net After Charge</label>
              <input type="text" class="form-control form-control-sm" id="netAfterCharge" value="0.00" readonly>
            </div>
          </div>
        </div>

      </div>

      <div class="col-md-3">
        <button class="btn btn-primary" type="submit">Search</button>
        <a class="btn btn-secondary" href="bank_reconcile.php">Reset</a>
      </div>
    </div>

    <?php if(!$canRunQuery && $isChargeRequired): ?>
      <div class="alert alert-warning mt-3 mb-0">
        Please enter <b>Charge %</b> for <b><?=h(strtoupper($modeLower))?></b> to load data.
      </div>
    <?php endif; ?>
  </form>

  <!-- RECONCILE FORM -->
  <form method="post" id="reconcileForm" class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <b>Transactions</b>
      <button type="submit" name="do_reconcile" class="btn btn-success btn-sm" id="btnReconcile" disabled>
        Reconcile Selected
      </button>
    </div>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered table-sm mb-0" id="payTable">
          <thead>
            <tr>
              <th style="width:40px;text-align:center;">
                <input type="checkbox" id="checkAll">
              </th>
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
                $amt   = (float)$row['amt'];
                $isRec = ((int)$row['rec_status'] === 1);
                $trCls = $isRec ? "reconciled" : "";

                $src = $row['src']; // P or B
                $rid = $row['rid'];

                $key = $src . ":" . $rid;

                echo "<tr class='{$trCls}'>";
                echo "<td style='text-align:center;'>";
                if ($isRec) {
                  echo "<input type='checkbox' disabled>";
                } else {
                  echo "<input type='checkbox' class='rowCheck' data-amount='".h($amt)."' data-key='".h($key)."'>";
                }
                echo "</td>";

                $srcBadge = ($src === 'P')
                  ? "<span class='badge badge-info badge-src'>PAY</span>"
                  : "<span class='badge badge-primary badge-src'>BILL</span>";

                echo "<td>{$srcBadge}</td>";
                echo "<td>".h($rid)."</td>";
                echo "<td>".h($row['tdate'])."</td>";
                echo "<td>".h($row['pmode'])."</td>";
                echo "<td>".h($row['refno'])."</td>";
                echo "<td style='text-align:right;'>".number_format($amt,2)."</td>";
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
        <div class="col-md-3">
          <b>Selected Rows:</b> <span id="selCount">0</span>
        </div>
        <div class="col-md-3 text-right">
          <b>Selected Total:</b> <span style="font-size:18px;" id="selTotal">0.00</span>
        </div>
        <div class="col-md-3 text-right">
          <b>Charge:</b> <span style="font-size:18px;" id="chargeBottom">0.00</span>
        </div>
        <div class="col-md-3 text-right">
          <b>Net Total:</b> <span style="font-size:18px;" id="netTotalBottom">0.00</span>
        </div>
      </div>
    </div>

  </form>

</div>

<script>
  function fmt2(n){
    n = isFinite(n) ? n : 0;
    return (Math.round(n * 100) / 100).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});
  }

  function isChargeRequired(){
    const mode = (document.getElementById('modeSelect').value || '').toLowerCase();
    return (mode === 'bkash' || mode === 'card');
  }

  function getSelectedTotal(){
    let total = 0;
    document.querySelectorAll('.rowCheck:checked').forEach(cb => {
      total += parseFloat(cb.dataset.amount || '0');
    });
    return total;
  }

  function calcCharge(total){
    const percent = parseFloat(document.getElementById('chargePercent').value || '0');
    if (isChargeRequired() && percent > 0) {
      const charge = total * (percent / 100);
      const net = total - charge;
      return {charge, net};
    }
    return {charge: 0, net: total};
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

  function recalc(){
    const selected = document.querySelectorAll('.rowCheck:checked').length;
    const total = getSelectedTotal();
    const out = calcCharge(total);

    document.getElementById('selCount').innerText = selected;
    document.getElementById('selTotal').innerText = fmt2(total);

    document.getElementById('chargeAmount').value = fmt2(out.charge);
    document.getElementById('netAfterCharge').value = fmt2(out.net);

    document.getElementById('chargeBottom').innerText = fmt2(out.charge);
    document.getElementById('netTotalBottom').innerText = fmt2(out.net);

    document.getElementById('btnReconcile').disabled = (selected === 0);

    syncHiddenInputs();
  }

  const filterForm = document.getElementById('filterForm');
  const modeSelect = document.getElementById('modeSelect');
  const chargeBox = document.getElementById('chargeBox');
  const chargePercent = document.getElementById('chargePercent');

  function toggleChargeBox(){
    if (isChargeRequired()) {
      chargeBox.style.display = 'block';
      chargePercent.setAttribute('required', 'required');
    } else {
      chargeBox.style.display = 'none';
      chargePercent.removeAttribute('required');
      chargePercent.classList.remove('is-invalid');
      chargePercent.value = '';
    }
    recalc();
  }

  function tryAutoSubmit(){
    if (isChargeRequired()) {
      const v = parseFloat(chargePercent.value || '0');
      if (!v || v <= 0) {
        chargePercent.classList.add('is-invalid');
        chargePercent.focus();
        return;
      }
      chargePercent.classList.remove('is-invalid');
    }
    filterForm.submit();
  }

  const checkAll = document.getElementById('checkAll');
  if (checkAll) {
    checkAll.addEventListener('change', function(){
      const state = this.checked;
      document.querySelectorAll('.rowCheck').forEach(cb => cb.checked = state);
      recalc();
    });
  }

  document.querySelectorAll('.rowCheck').forEach(cb => {
    cb.addEventListener('change', function(){
      if(checkAll && !this.checked) checkAll.checked = false;

      const all = document.querySelectorAll('.rowCheck').length;
      const checked = document.querySelectorAll('.rowCheck:checked').length;
      if(checkAll && all > 0 && all === checked) checkAll.checked = true;

      recalc();
    });
  });

  modeSelect.addEventListener('change', function(){
    toggleChargeBox();
    tryAutoSubmit();
  });

  chargePercent.addEventListener('input', function(){
    if (!isChargeRequired()) { recalc(); return; }
    const v = parseFloat(this.value || '0');
    if (!v || v <= 0) {
      this.classList.add('is-invalid');
      recalc();
      return;
    }
    this.classList.remove('is-invalid');
    filterForm.submit();
  });

  document.getElementById('fromDate').addEventListener('change', function(){ filterForm.submit(); });
  document.getElementById('toDate').addEventListener('change', function(){ filterForm.submit(); });

  document.getElementById('reconcileForm').addEventListener('submit', function(e){
    const selected = document.querySelectorAll('.rowCheck:checked').length;
    if (selected === 0) {
      e.preventDefault();
      alert("Please select at least one row to reconcile.");
      return;
    }
    if (!confirm("Reconcile selected transactions?")) {
      e.preventDefault();
    }
  });

  toggleChargeBox();
  recalc();
</script>
</body>
</html>