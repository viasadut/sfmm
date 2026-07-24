<?php
session_start();
require('db1.php'); // must provide $con (mysqli)

// ✅ ROLE CHECK (same pattern)
$role = $_SESSION['sess_userrole'] ?? '';
$queryc = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('staff','mng','lab')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc = mysqli_fetch_assoc($resultc);
$c1 = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 == 0) {
    header('Location: login2?err=2');
    exit;
}

// ✅ Inputs (from link)
$start = $_GET['stdate'] ?? '';
$end   = $_GET['endate'] ?? '';
$mode  = $_GET['mode'] ?? '';

// ✅ Basic validation
if ($start === '' || $end === '' || $mode === '') {
    die("Missing parameters.");
}
if (!in_array($mode, ['Card','Bkash'], true)) {
    die("Invalid mode.");
}

// =========================
// FETCH DATA (same DB logic)
// =========================
$sql = "SELECT * 
        FROM pms_payment 
        WHERE date BETWEEN '$start' AND '$end'
          AND p_mode='$mode'
          AND refund='0'
        ORDER BY user";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

$sqlTotal = "SELECT SUM(amount) AS total_amt
             FROM pms_payment
             WHERE date BETWEEN '$start' AND '$end'
               AND p_mode='$mode'
               AND refund='0'";
$resTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
$rowTotal = mysqli_fetch_assoc($resTotal);
$bill = $rowTotal['total_amt'] ?? 0;

// =========================
// TCPDF (PDF OUTPUT)
// =========================
require_once('tcpdf/tcpdf.php'); // ✅ adjust path if needed

$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator('Hospital System');
$pdf->SetAuthor('Hospital System');
$pdf->SetTitle('Datewise Card / Bkash Report');
$pdf->SetMargins(10, 12, 10);
$pdf->SetAutoPageBreak(true, 12);
$pdf->AddPage();

// Header
$title = "Datewise {$mode} Report";
$range = "From: ".date('d/m/Y', strtotime($start))."   To: ".date('d/m/Y', strtotime($end));

$html = '
<h2 style="text-align:center;">'.$title.'</h2>
<p style="text-align:center; font-size:12px;">'.$range.'</p>
<br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
  <tr style="font-weight:bold; background-color:#f2f2f2;">
    <th width="6%"  align="center">S.No</th>
    <th width="10%" align="center">MRN</th>
    <th width="12%" align="center">Total Bill</th>
    <th width="10%" align="center">Date</th>
    <th width="12%" align="center">Location</th>
    <th width="10%" align="center">Mode</th>
    <th width="18%" align="center">Reference No</th>
    <th width="12%" align="center">Bill By</th>
    <th width="10%" align="center">Bill No</th>
  </tr>
';

$count = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '
    <tr>
      <td align="center">'.$count.'</td>
      <td align="center">'.htmlspecialchars($row['pmrn']).'</td>
      <td align="center">'.htmlspecialchars($row['amount']).'</td>
      <td align="center">'.htmlspecialchars(date('d/m/Y', strtotime($row['date']))).'</td>
      <td align="center">'.htmlspecialchars($row['location']).'</td>
      <td align="center">'.htmlspecialchars($row['p_mode']).'</td>
      <td align="center">'.htmlspecialchars($row['p_remarks']).'</td>
      <td align="center">'.htmlspecialchars($row['user']).'</td>
      <td align="center">'.htmlspecialchars($row['billno']).'</td>
    </tr>
    ';
    $count++;
}

// Total row
$html .= '
  <tr style="font-weight:bold;">
    <td colspan="2" align="right">Total</td>
    <td align="center">'.htmlspecialchars($bill).'</td>
    <td colspan="6"></td>
  </tr>
</table>
';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output("datewise_{$mode}_report_{$start}_to_{$end}.pdf", "I");
exit;