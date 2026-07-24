<?php 
session_start();
require('db1.php');

$role = $_SESSION['sess_userrole'] ?? '';
$queryc = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','staff','store','doctor')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc = mysqli_fetch_assoc($resultc);
$c1 = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 == 0){
  header('Location: login2?err=2');
  exit;
}

$fullname = $_SESSION['sess_username'] ?? '';

$query39 = "SELECT * FROM user WHERE uname='$fullname' LIMIT 1";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39 = mysqli_fetch_assoc($result39);
$full = $row39['fullname'] ?? $fullname;

// =======================
// DATE FILTER (From/To)
// =======================
$today = date('Y-m-d');

// default range = today to today
$stdate = $_GET['stdate'] ?? $today;
$endate = $_GET['endate'] ?? $today;

// normalize to Y-m-d safely
$stdate = date('Y-m-d 00:00:00', strtotime($stdate));
$endate = date('Y-m-d 23:59:59', strtotime($endate));

$stdate1 = date('Y-m-d', strtotime($stdate));
$endate1 = date('Y-m-d', strtotime($endate));

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Vendor Wise PO & Payment Report</title>
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="styles.css">
<script src="script.js"></script>

<style type="text/css">
.style1 { font-size: x-large; font-weight: bold; font-style: italic; }
</style>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a></li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a></li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a></li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a></li>
      </ul>
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a></li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a></li>
         <li class='has-sub'><a href='con2'><span>OT Stats</span></a></li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a></li>
         <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">
  <?php echo "Date-wise Vendor Wise PO & Payment Report - " . htmlspecialchars($full); ?>
</p>

<p align="right">
  <?php echo "Today: " . date('d/m/Y'); ?>
</p>

<!-- =======================
     DATE FILTER FORM
======================= -->
<form action="" method="GET">
<table width="100%" border="0" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  <tr>
    <td style="padding:10px; font-weight:bold;">
      From:
      <input type="date" name="stdate" value="<?php echo htmlspecialchars($stdate); ?>" required>
      &nbsp;&nbsp;
      To:
      <input type="date" name="endate" value="<?php echo htmlspecialchars($endate); ?>" required>
      &nbsp;&nbsp;
      <input type="submit" value="Search" style="padding:6px 14px; font-weight:bold;">
    </td>
  </tr>
</table>
</form>

<form action="" method="GET">
<input type="hidden" name="stdate" value="<?php echo htmlspecialchars($stdate); ?>">
<input type="hidden" name="endate" value="<?php echo htmlspecialchars($endate); ?>">

<table width="100%" height="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<?php
// =======================
// TOTALS (DATE-WISE)
// =======================

// 1) Total approved PO within date range
$po_total_sql = "
  SELECT COALESCE(SUM(total_amount),0) AS po_sum
  FROM po_table
  WHERE status='Approved'
    AND ceo_a_time BETWEEN '$stdate' AND '$endate'
";
$po_total_res = mysqli_query($con, $po_total_sql) or die(mysqli_error($con));
$po_total_row = mysqli_fetch_assoc($po_total_res);
$po_sum = (float)($po_total_row['po_sum'] ?? 0);

// 2) Total PV (approve_status=1) within date range
$pv_total_sql = "
  SELECT COALESCE(SUM(total_amount),0) AS pv_sum
  FROM fund_transfer_master
  WHERE approve_status='1'
    AND posting_date BETWEEN '$stdate1' AND '$endate1'
";
$pv_total_res = mysqli_query($con, $pv_total_sql) or die(mysqli_error($con));
$pv_total_row = mysqli_fetch_assoc($pv_total_res);
$pv_sum = (float)($pv_total_row['pv_sum'] ?? 0);

// 3) Total PAID (use same logic you use in row-wise calc: approve_status=3 and include vat/tax/discount)
$paid_total_sql = "
  SELECT 
    COALESCE(SUM(total_amount),0) AS paid_amt,
    COALESCE(SUM(total_vat),0) AS paid_vat,
    COALESCE(SUM(total_tax),0) AS paid_tax,
    COALESCE(SUM(total_discount),0) AS paid_dis
  FROM fund_transfer_master
  WHERE approve_status='3'
    AND posting_date BETWEEN '$stdate1' AND '$endate1'
";
$paid_total_res = mysqli_query($con, $paid_total_sql) or die(mysqli_error($con));
$paid_total_row = mysqli_fetch_assoc($paid_total_res);

$paid_amt = (float)($paid_total_row['paid_amt'] ?? 0);
$paid_vat = (float)($paid_total_row['paid_vat'] ?? 0);
$paid_tax = (float)($paid_total_row['paid_tax'] ?? 0);
$paid_dis = (float)($paid_total_row['paid_dis'] ?? 0);

// total paid (same as vendor row: amount + vat + tax + discount)
$paid_sum = $paid_amt + $paid_vat + $paid_tax + $paid_dis;

// 4) Due = PO - Paid
$due_sum = $po_sum - $paid_sum;

// Show totals nicely (you can format if you want)
echo "
<tr>
  <td colspan='20' style='font-size:20px; font-weight:bold; color:red; text-align:center; line-height:1.6'>
    <div>Total Summary ({$stdate} to {$endate})</div>
    <div>
      PO Total: {$po_sum} &nbsp; | &nbsp;
      PV Total: {$pv_sum} &nbsp; | &nbsp;
      Paid Total: {$paid_sum} &nbsp; | &nbsp;
      Due Total: {$due_sum}
    </div>
  </td>
</tr>
";
?>
<tr>
  <th width="4%"><strong>S.No</strong></th>
  <th width="17%"><strong>Company Name</strong></th>
  <th width="14%"><strong>PO Amount</strong></th>
  <th width="14%"><strong>PV Amount</strong></th>
  <th width="14%"><strong>Paid Amount</strong></th>
  <th width="14%"><strong>Due Amount</strong></th>
</tr>

<tbody>
<?php
$count = 1;

// ✅ creditors only from approved PO within date range
$sel_query = "
  SELECT creditor_code
  FROM po_table
  WHERE status='Approved'
    AND ceo_a_time BETWEEN '$stdate' AND '$endate'
  GROUP BY creditor_code
";
$result = mysqli_query($con, $sel_query) or die(mysqli_error($con));

while ($row = mysqli_fetch_assoc($result)) {

    $creditor = $row['creditor_code'];

    // supplier name
    $sel_sup = "SELECT supplier_name FROM suppliers_master WHERE supplier_code='$creditor' LIMIT 1";
    $result_sup = mysqli_query($con, $sel_sup) or die(mysqli_error($con));
    $row_sup = mysqli_fetch_assoc($result_sup);
    $supplier_name = $row_sup["supplier_name"] ?? $creditor;

    // PO sum (date-wise)
    $sel_query1 = "
      SELECT COALESCE(SUM(total_amount),0) AS po_sum
      FROM po_table
      WHERE status='Approved'
        AND creditor_code='$creditor'
        AND ceo_a_time BETWEEN '$stdate' AND '$endate'
    ";
    $result1 = mysqli_query($con, $sel_query1) or die(mysqli_error($con));
    $row1 = mysqli_fetch_assoc($result1);
    $po_amount = (float)($row1["po_sum"] ?? 0);

    // PV sum (approve_status=1) date-wise
    $sel_query2 = "
      SELECT COALESCE(SUM(total_amount),0) AS pv_sum
      FROM fund_transfer_master
      WHERE approve_status='1'
        AND sub_ledger='$creditor'
        AND posting_date BETWEEN '$stdate1' AND '$endate1'
    ";
    $result2 = mysqli_query($con, $sel_query2) or die(mysqli_error($con));
    $row2 = mysqli_fetch_assoc($result2);
    $total_pv = (float)($row2["pv_sum"] ?? 0);

    // Paid sum (approve_status=3) date-wise (same as your original paid calc including vat/tax/discount)
    $sel_paid = "
      SELECT 
        COALESCE(SUM(total_amount),0) AS paid_amt,
        COALESCE(SUM(total_vat),0) AS paid_vat,
        COALESCE(SUM(total_tax),0) AS paid_tax,
        COALESCE(SUM(total_discount),0) AS paid_dis
      FROM fund_transfer_master
      WHERE approve_status='3'
        AND sub_ledger='$creditor'
        AND posting_date BETWEEN '$stdate1' AND '$endate1'
    ";
    $res_paid = mysqli_query($con, $sel_paid) or die(mysqli_error($con));
    $row_paid = mysqli_fetch_assoc($res_paid);

    $total_paid = (float)($row_paid['paid_amt'] ?? 0)
                + (float)($row_paid['paid_vat'] ?? 0)
                + (float)($row_paid['paid_tax'] ?? 0)
                + (float)($row_paid['paid_dis'] ?? 0);

    $due_amount = $po_amount - $total_paid;
?>
<tr>
  <td align="center"><?php echo $count; ?></td>

  <td align="center"><?php echo htmlspecialchars($supplier_name); ?></td>

  <td align="center" style="font-weight:bold">
    <a href="po_report?cname=<?php echo urlencode($creditor); ?>&stdate=<?php echo urlencode($stdate); ?>&endate=<?php echo urlencode($endate); ?>">
      <?php echo $po_amount; ?>
    </a>
  </td>

  <td align="center" style="font-weight:bold">
    <a href="dp_report?cname=<?php echo urlencode($creditor); ?>&stdate=<?php echo urlencode($stdate); ?>&endate=<?php echo urlencode($endate); ?>">
      <?php echo $total_pv; ?>
    </a>
  </td>

  <td align="center" style="font-weight:bold">
    <a href="prepare_ap_cheque?cname=<?php echo urlencode($creditor); ?>&stdate=<?php echo urlencode($stdate); ?>&endate=<?php echo urlencode($endate); ?>">
      <?php echo $total_paid; ?>
    </a>
  </td>

  <td align="center" style="font-weight:bold">
    <a href="prepare_ap_cheque?cname=<?php echo urlencode($creditor); ?>&stdate=<?php echo urlencode($stdate); ?>&endate=<?php echo urlencode($endate); ?>">
      <?php echo $due_amount; ?>
    </a>
  </td>
</tr>
<?php
$count++;
}
?>
</tbody>

</table>
</form>

</body>
</html>