<?php
/* ==========================================================
   OPD PROCEDURE ROOM BILL (PRINT / PDF-LIKE HTML)
   - Fixes bind_param bool error
   - Uses prepared statements (no SQL injection)
   - Uses ONE mysqli connection ($con)
   - Works even if mysqlnd is NOT enabled (no get_result needed)
   ========================================================== */

require 'db1.php'; // must create $con = mysqli connection

// ---- If db1.php does NOT create $con, uncomment this block ----
// $con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");
// if (!$con) die("DB connect failed: " . mysqli_connect_error());
// mysqli_set_charset($con, "utf8mb4");

// ---- Force utf8 ----
mysqli_set_charset($con, "utf8mb4");

// ---- helper ----
function die_sql($con, $msg) {
    die($msg . " | MySQL: " . mysqli_error($con));
}

// ---- inputs ----
$id     = $_REQUEST['id']    ?? '';
$pmrn_i = $_REQUEST['pmrn']  ?? '';
$eid    = $_REQUEST['eid']   ?? '';
$billno = $_REQUEST['billno']?? '';

if ($billno === '') {
    die("Missing billno");
}

/* ==========================================================
   1) Count procedure rows
   ========================================================== */
$record = 0;
$sqlCount = "SELECT COUNT(id) AS c FROM procedure1 WHERE billno=?";
$stmt = mysqli_prepare($con, $sqlCount);
if (!$stmt) die_sql($con, "Prepare failed (COUNT procedure1)");
mysqli_stmt_bind_param($stmt, "s", $billno);
if (!mysqli_stmt_execute($stmt)) die_sql($con, "Execute failed (COUNT procedure1)");
mysqli_stmt_bind_result($stmt, $record);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

/* ==========================================================
   2) Load latest procedure row (for patient + doctor name)
   ========================================================== */
$rowLast = [
    'dname' => '',
    'pmrn'  => '',
    'pname' => '',
    'page'  => '',
    'psex'  => '',
    'billno'=> $billno
];

$sqlLast = "SELECT id, billno, pmrn, pname, page, psex, dname
            FROM procedure1
            WHERE billno=?
            ORDER BY id DESC
            LIMIT 1";
$stmt = mysqli_prepare($con, $sqlLast);
if (!$stmt) die_sql($con, "Prepare failed (LAST procedure1)");
mysqli_stmt_bind_param($stmt, "s", $billno);
if (!mysqli_stmt_execute($stmt)) die_sql($con, "Execute failed (LAST procedure1)");
mysqli_stmt_bind_result($stmt, $idL, $billnoL, $pmrnL, $pnameL, $pageL, $psexL, $dnameL);
if (mysqli_stmt_fetch($stmt)) {
    $rowLast['dname'] = $dnameL ?? '';
    $rowLast['pmrn']  = $pmrnL ?? '';
    $rowLast['pname'] = $pnameL ?? '';
    $rowLast['page']  = $pageL ?? '';
    $rowLast['psex']  = $psexL ?? '';
    $rowLast['billno']= $billnoL ?? $billno;
}
mysqli_stmt_close($stmt);

$dname = $rowLast['dname'];
$kk    = $rowLast['pmrn'];   // used in barcode

/* ==========================================================
   3) Load doctor info
   ========================================================== */
$rowDoc = [
    'degree' => '',
    'desig'  => '',
    'Discipline' => ''
];

if ($dname !== '') {
    $sqlDoc = "SELECT degree, Discipline
               FROM doctor1
               WHERE dname=? AND status IN ('Active','active')
               ORDER BY did DESC
               LIMIT 1";
    $stmt = mysqli_prepare($con, $sqlDoc);
    if (!$stmt) die_sql($con, "Prepare failed (doctor1)");
    mysqli_stmt_bind_param($stmt, "s", $dname);
    if (!mysqli_stmt_execute($stmt)) die_sql($con, "Execute failed (doctor1)");
    mysqli_stmt_bind_result($stmt, $degree, $desig, $discipline);
    if (mysqli_stmt_fetch($stmt)) {
        $rowDoc['degree']     = $degree ?? '';
        $rowDoc['desig']      = $desig ?? '';
        $rowDoc['Discipline'] = $discipline ?? '';
    }
    mysqli_stmt_close($stmt);
}

/* ==========================================================
   4) Load pms_bill info (amount_receive, r_amount, user, time, p_mode)
   ========================================================== */
$rowBill = [
    'amount_receive' => 0,
    'r_amount'       => 0,
    'user'           => '',
    'time'           => '',
    'p_mode'         => ''
];

$sqlBill = "SELECT amount_receive, r_amount, user, time, p_mode
            FROM pms_bill
            WHERE billno=?
            LIMIT 1";
$stmt = mysqli_prepare($con, $sqlBill);
if (!$stmt) die_sql($con, "Prepare failed (pms_bill)");
mysqli_stmt_bind_param($stmt, "s", $billno);
if (!mysqli_stmt_execute($stmt)) die_sql($con, "Execute failed (pms_bill)");
mysqli_stmt_bind_result($stmt, $amount_receive, $r_amount, $bill_user, $bill_time, $p_mode);
if (mysqli_stmt_fetch($stmt)) {
    $rowBill['amount_receive'] = (float)$amount_receive;
    $rowBill['r_amount']       = (float)$r_amount;
    $rowBill['user']           = $bill_user ?? '';
    $rowBill['time']           = $bill_time ?? '';
    $rowBill['p_mode']         = $p_mode ?? '';
}
mysqli_stmt_close($stmt);

$grand_total = $rowBill['amount_receive'] - $rowBill['r_amount'];

/* ==========================================================
   5) Load all procedure1 rows for the bill (for charges/discount)
   NOTE: Your original HTML repeats fixed lines for each row.
         We will show ONE set of lines per record, like your code.
   ========================================================== */
$procRows = [];
$sqlProc = "SELECT doc_charge, hos_charge, medi_charge, dis_amount
            FROM procedure1
            WHERE billno=?
            ORDER BY id DESC";
$stmt = mysqli_prepare($con, $sqlProc);
if (!$stmt) die_sql($con, "Prepare failed (procedure1 list)");
mysqli_stmt_bind_param($stmt, "s", $billno);
if (!mysqli_stmt_execute($stmt)) die_sql($con, "Execute failed (procedure1 list)");
mysqli_stmt_bind_result($stmt, $doc_charge, $hos_charge, $medi_charge, $dis_amount);
while (mysqli_stmt_fetch($stmt)) {
    $procRows[] = [
        'doc_charge'  => (float)$doc_charge,
        'hos_charge'  => (float)$hos_charge,
        'medi_charge' => (float)$medi_charge,
        'dis_amount'  => (float)$dis_amount
    ];
}
mysqli_stmt_close($stmt);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>OPD Procedure Suite Bill</title>

<style>
.table { width:100%; margin-bottom:20px; }
.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th { background:#f9f9f9; }

@media print { #PrintButton{display:none;} }

table, th, td { border:0px solid black; border-collapse:collapse; }
table.center { margin-left:auto; margin-right:auto; }

body { margin-top:0in; margin-left:0in; }
.page { width:8.5in; height:10.5in; margin-top:0.5in; margin-left:0.25in; }

header { padding:0 0 10px 0; }
.footerBox { position:fixed; left:30px; right:20px; bottom:10px; }
.box { border:1px solid #000; margin-left:30px; margin-right:20px; padding:10px; }
</style>

<script src="jsnew/jquery-latest.min.js"></script>
<script src="bill/JsBarcode.all.min.js"></script>
</head>

<body>

<header>
  <br><br>
  <table width="100%">
    <tr>
      <td width="30%" align="right"><img src="kpj_logo/1.png" width="30" height="30" alt="KPJ"></td>
      <td width="40%" align="center" style="font-weight:bold;font-size:10px;font-family:freesans;">
        KPJ SPECIALIZED HOSPITAL <br>
        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.
      </td>
      <td width="30%"></td>
    </tr>
  </table>

  <div class="box" style="height:150px;">
    <table width="100%">
      <tr>
        <td style="font-family:freesans;font-size:14px;" width="60%">
          <b>Patient Name : <?= htmlspecialchars($rowLast['pname']) ?></b><br>
          <b>MRN : <?= htmlspecialchars($rowLast['pmrn']) ?></b><br>
          <b>Age : <?= htmlspecialchars($rowLast['page']) ?></b><br>
          <b>Gender : <?= htmlspecialchars($rowLast['psex']) ?></b><br>
        </td>

        <td style="font-family:freesans;text-align:left;font-size:14px;" width="40%">
          <b>Consultant Name: <?= htmlspecialchars($dname) ?></b><br>
          <?= htmlspecialchars($rowDoc['degree']) ?><br>
          <b><?= htmlspecialchars(trim(($rowDoc['desig'] ?? '') . ( ($rowDoc['Discipline'] ?? '') ? (', '.$rowDoc['Discipline']) : '' ))) ?></b>
        </td>
      </tr>
    </table>

    <table width="100%">
      <tr>
        <td width="10%"><svg id="mrn"></svg></td>
        <td width="80%"></td>
        <td width="10%"><svg id="id"></svg></td>
      </tr>
    </table>
  </div>
</header>

<div class="box" style="height:300px;">
  <table width="100%">
    <tr>
      <td style="text-align:center;font-size:16px;"><b>OPD Procedure Suite Bill</b></td>
    </tr>
  </table>

  <table width="100%">
    <tr>
      <td style="font-family:freesans;font-size:12px;" width="5%"><b>S/NO</b></td>
      <td style="font-family:freesans;text-align:left;font-size:12px;" width="85%"><b>Particulars</b></td>
      <td style="font-family:freesans;text-align:center;font-size:12px;" width="10%"><b>Price</b></td>
    </tr>

    <?php
    // Your previous code prints Consultant/Disposable/Medicine/Discount lines.
    // If multiple rows exist, it prints them again. We'll keep same behavior.
    foreach ($procRows as $idx => $row) {
        ?>
        <tr>
          <td style="font-family:freesans;font-size:12px;text-align:center" width="5%">1</td>
          <td style="font-family:freesans;text-align:left;font-size:12px;" width="85%">Consultant Charge:</td>
          <td style="font-family:freesans;text-align:center;font-size:12px;" width="10%"><?= number_format($row['doc_charge'], 2) ?></td>
        </tr>

        <tr>
          <td style="font-family:freesans;font-size:12px;text-align:center" width="5%">2</td>
          <td style="font-family:freesans;text-align:left;font-size:12px;" width="85%">Disposable Charge:</td>
          <td style="font-family:freesans;text-align:center;font-size:12px;" width="10%"><?= number_format($row['hos_charge'], 2) ?></td>
        </tr>

        <tr>
          <td style="font-family:freesans;font-size:12px;text-align:center" width="5%">3</td>
          <td style="font-family:freesans;text-align:left;font-size:12px;" width="85%">Medicine Charge:</td>
          <td style="font-family:freesans;text-align:center;font-size:12px;" width="10%"><?= number_format($row['medi_charge'], 2) ?></td>
        </tr>

        <?php if ($row['dis_amount'] > 0) { ?>
        <tr>
          <td style="font-family:freesans;font-size:12px;text-align:center" width="5%">4</td>
          <td style="font-family:freesans;text-align:left;font-size:12px;" width="85%">Discount:</td>
          <td style="font-family:freesans;text-align:center;font-size:12px;" width="10%"><?= number_format($row['dis_amount'], 2) ?></td>
        </tr>
        <?php } ?>
        <?php
    }
    ?>
  </table>
</div>

<div class="footerBox">
  <table width="100%">
    <tr>
      <td style="font-family:freesans;text-align:center;font-size:14px;" width="20%">
        <b>Billed By:</b> <?= htmlspecialchars($rowBill['user']) ?>
      </td>

      <td style="font-family:freesans;text-align:center;font-size:14px;" width="30%">
        <b>Billed Time:</b> <?= htmlspecialchars($rowBill['time']) ?>
      </td>

      <td style="font-family:freesans;text-align:left;font-size:14px;" width="20%">
        <b>Payment Mode:</b> <?= htmlspecialchars($rowBill['p_mode']) ?>
      </td>

      <td style="font-family:freesans;text-align:right;font-size:16px;" width="30%">
        <b>Grand Total: <?= number_format($grand_total, 2) ?></b>
      </td>
    </tr>
  </table>
</div>

<br><br>
<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>

<script>
function PrintPage(){ window.print(); }

window.addEventListener('DOMContentLoaded', () => {
  // auto print + close (like your original)
  PrintPage();
  setTimeout(function(){ window.close(); }, 750);
});

// MRN barcode
$(document).ready(function(){
  let barcodeValue = "<?= addslashes((string)$kk) ?>";
  let displayText = "MRN: " + barcodeValue;
  if(barcodeValue !== ""){
    JsBarcode("#mrn", barcodeValue, {
      displayValue:true,
      text:displayText,
      width:3,
      height:40,
      fontSize:10
    });
  }
});

// Bill ID barcode
$(document).ready(function(){
  let barcodeValue = "<?= addslashes((string)$billno) ?>";
  let displayText = "ID: " + barcodeValue;
  if(barcodeValue !== ""){
    JsBarcode("#id", barcodeValue, {
      displayValue:true,
      text:displayText,
      width:3,
      height:40,
      fontSize:10
    });
  }
});
</script>

</body>
</html>