<?php
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
   INPUTS
========================= */
$eid   = (int)($_REQUEST['eid'] ?? 0);
$pmrn  = $_REQUEST['pmrn'] ?? '';
$id3   = (int)($_REQUEST['id3'] ?? 0);
$pdos  = (int)($_REQUEST['pdos'] ?? 0);
$code  = $_REQUEST['code'] ?? '';
$sno   = $_REQUEST['sno'] ?? '';
$price = (float)($_REQUEST['price'] ?? 0);

$pmrn_safe = mysqli_real_escape_string($con, $pmrn);
$code_safe = mysqli_real_escape_string($con, $code);
$sno_safe  = mysqli_real_escape_string($con, $sno);

$p11 = $price * $pdos;

if ($id3 <= 0 || $pmrn_safe === '' || $eid <= 0) {
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

    // 1) Ensure charge exists and lock it
    $qChk = $con->query("SELECT * FROM inhoscharge WHERE id={$id3} LIMIT 1 FOR UPDATE");
    $rowCharge = $qChk->fetch_assoc();
    if (!$rowCharge) {
        throw new Exception("Charge row not found / already deleted.");
    }

    // 2) Delete charge
    $con->query("DELETE FROM inhoscharge WHERE id={$id3}");

    // 3) TB account lookup
    $tb_q = $con->query("SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='{$code_safe}' LIMIT 1");
    $tb_result = $tb_q->fetch_assoc();
    if (!$tb_result) {
        throw new Exception("acct_master_new not found for item_code: {$code_safe}");
    }

    $tb_data = ($tb_result['tb_op'] !== '') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
    if ($tb_data === '' || $tb_data === null) {
        throw new Exception("TB account missing (tb_op/tb_ip empty) for item_code: {$code_safe}");
    }

    // 4) Insert TB reversal entries
    $date = date('Y-m-d');
    $amt  = (float)$p11;

    $con->query("INSERT INTO pms_tb (trans_id, trans_type, acct_code, date, amount, location)
                 VALUES ('{$id3}','DR','{$tb_data}','{$date}','{$amt}','IPD_HOS_CHARGE_DEL')");

    $con->query("INSERT INTO pms_tb (trans_id, trans_type, acct_code, date, amount, location)
                 VALUES ('{$id3}','CR','111999','{$date}','{$amt}','IPD_HOS_CHARGE_DEL')");

    // 5) If stock item, return qty to unique sno
    if ($sno_safe !== '') {
        $qStock = $con->query("SELECT add_qty FROM purchase_stock3 WHERE sno='{$sno_safe}' LIMIT 1 FOR UPDATE");
        $stock_row = $qStock->fetch_assoc();

        if (!$stock_row) {
            throw new Exception("purchase_stock3 not found for sno: {$sno_safe}");
        }

        $current_qty = (float)$stock_row['add_qty'];
        $new_stock   = $current_qty + $pdos;

        $con->query("UPDATE purchase_stock3 SET add_qty='{$new_stock}' WHERE sno='{$sno_safe}'");
    }

    $con->commit();

    // ✅ flash success
    $_SESSION['flash_msg']  = "Deleted successfully (all entries reversed).";
    $_SESSION['flash_type'] = "success";

    header("Location: otchargenurse1nurse.php?pmrn=" . urlencode($pmrn) . "&eid=" . $eid);
    exit;

} catch (Throwable $e) {

    try { $con->rollback(); } catch (Throwable $ex) {}

    // ❌ flash error (safe for UI)
    $_SESSION['flash_msg']  = "Delete failed! Everything rolled back. Error: " . $e->getMessage();
    $_SESSION['flash_type'] = "error";

    header("Location: otchargenurse1nurse.php?pmrn=" . urlencode($pmrn) . "&eid=" . $eid);
    exit;
}