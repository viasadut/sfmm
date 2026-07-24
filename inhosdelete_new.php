<?php
ob_start();
session_start();
require('db1.php'); // must provide $con (mysqli)

/* =========================
   ROLE CHECK
========================= */
$role = $_SESSION['sess_userrole'] ?? '';

$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('billin','bill','mng','nurse')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 == 0) {
    header('Location: login2?err=2');
    exit;
}

$user = $_SESSION["sess_username"] ?? '';
if ($user === '') {
    header('Location: login2?err=2');
    exit;
}

/* =========================
   INPUTS (only identifiers)
========================= */
$eid  = (int)($_REQUEST['eid'] ?? 0);
$pmrn = $_REQUEST['pmrn'] ?? '';
$id3  = (int)($_REQUEST['id3'] ?? 0);

if ($id3 <= 0 || $pmrn === '' || $eid <= 0) {
    $_SESSION['flash_msg']  = "Invalid request.";
    $_SESSION['flash_type'] = "error";
    header("Location: otchargenurse1nurse.php?pmrn=" . urlencode($pmrn) . "&eid=" . $eid);
    exit;
}

/* =========================
   TRANSACTION
========================= */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $con->begin_transaction();

    // 1) Lock charge row
    $qChk = $con->query("SELECT * FROM inhoscharge WHERE id={$id3} LIMIT 1 FOR UPDATE");
    $rowCharge = $qChk->fetch_assoc();
    if (!$rowCharge) {
        throw new Exception("Charge row not found / already deleted.");
    }

    // ✅ ALWAYS use DB row values (works even if request fields missing)
    // Adjust these column names if your table uses different names
    $code = trim((string)($rowCharge['code'] ?? ''));
    $sno  = trim((string)($rowCharge['sno'] ?? ''));   // if your column is different, tell me (ex: sno1)
    $pdos = (float)($rowCharge['pdos'] ?? 0);          // qty
    $price = (float)($rowCharge['price'] ?? 0);

    // fallback if your column names are different
    if ($code === '' && isset($rowCharge['item_code'])) $code = trim((string)$rowCharge['item_code']);
    if ($sno === '' && isset($rowCharge['sno1'])) $sno = trim((string)$rowCharge['sno1']);
    if ($pdos <= 0 && isset($rowCharge['qty'])) $pdos = (float)$rowCharge['qty'];
    if ($price <= 0 && isset($rowCharge['uprice'])) $price = (float)$rowCharge['uprice'];

    if ($code === '') {
        // Without code we cannot do TB lookup, so rollback safely
        throw new Exception("Item code missing in inhoscharge row (id={$id3}).");
    }

    $code_safe = mysqli_real_escape_string($con, $code);
    $sno_safe  = mysqli_real_escape_string($con, $sno);

    $amt = $price * $pdos;
    if ($amt <= 0) {
        // If amount is not stored properly, you can still allow TB with 0 (but usually not)
        throw new Exception("Invalid amount (price/qty missing) for charge id={$id3}.");
    }

    // 2) Delete charge
    $con->query("DELETE FROM inhoscharge WHERE id={$id3}");

    // 3) TB account lookup
    $tb_q = $con->query("SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='{$code_safe}' LIMIT 1");
    $tb_result = $tb_q->fetch_assoc();
    if (!$tb_result) {
        throw new Exception("acct_master_new not found for item_code: {$code}");
    }

    $tb_data = ($tb_result['tb_op'] !== '') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
    if ($tb_data === '' || $tb_data === null) {
        throw new Exception("TB account missing (tb_op/tb_ip empty) for item_code: {$code}");
    }

    // 4) Insert TB reversal entries
    $date = date('Y-m-d');

    $con->query("INSERT INTO pms_tb (trans_id, trans_type, acct_code, date, amount, location)
                 VALUES ('{$id3}','DR','{$tb_data}','{$date}','{$price}','IPD_HOS_CHARGE_DEL')");

    $con->query("INSERT INTO pms_tb (trans_id, trans_type, acct_code, date, amount, location)
                 VALUES ('{$id3}','CR','111999','{$date}','{$price}','IPD_HOS_CHARGE_DEL')");

    // 5) ✅ STOCK UPDATE ONLY IF sno NOT EMPTY
    if ($sno_safe !== '') {

        $qStock = $con->query("SELECT add_qty FROM purchase_stock3 WHERE sno='{$sno_safe}' LIMIT 1 FOR UPDATE");
        $stock_row = $qStock->fetch_assoc();
        if (!$stock_row) {
            throw new Exception("purchase_stock3 not found for sno: {$sno}");
        }

        $current_qty = (float)$stock_row['add_qty'];
        $new_stock   = $current_qty + $pdos;

        $con->query("UPDATE purchase_stock3 SET add_qty='{$new_stock}' WHERE sno='{$sno_safe}'");
    }

    $con->commit();

    $_SESSION['flash_msg']  = ($sno_safe === '')
        ? "Deleted successfully (TB reversed)."
        : "Deleted successfully (TB reversed + stock returned).";
    $_SESSION['flash_type'] = "success";

    header("Location: otchargenurse1nurse.php?pmrn=" . urlencode($pmrn) . "&eid=" . $eid);
    exit;

} catch (Throwable $e) {

    try { $con->rollback(); } catch (Throwable $ex) {}

    $_SESSION['flash_msg']  = "Delete failed! Everything rolled back. Error: " . $e->getMessage();
    $_SESSION['flash_type'] = "error";

    header("Location: otchargenurse1nurse.php?pmrn=" . urlencode($pmrn) . "&eid=" . $eid);
    exit;
}