<?php
session_start();
require('db1.php');

$role   = $_SESSION['sess_userrole'] ?? '';
$usernm = $_SESSION['sess_username'] ?? '';

/* =========================
   ROLE CHECK
========================= */
$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','staff','store','doctor')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if ($usernm === '' || $c1 == 0) {
  header('Location: login2?err=2');
  exit;
}

/* =========================
   USER FULL NAME
========================= */
$query39  = "SELECT * FROM user WHERE uname='" . mysqli_real_escape_string($con, $usernm) . "' LIMIT 1";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39    = mysqli_fetch_assoc($result39);
$full     = $row39['fullname'] ?? $usernm;

/* =========================
   DATE FILTER
========================= */
$today = date('Y-m-d');

// for input fields (must be Y-m-d)
$st_in = $_GET['stdate'] ?? $today;
$en_in = $_GET['endate'] ?? $today;

// normalize input to Y-m-d
$st_in = date('Y-m-d', strtotime($st_in));
$en_in = date('Y-m-d', strtotime($en_in));

// for SQL datetime range
$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Vendor Wise PO Amount Report</title>
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
  <?php echo "Date-wise Vendor Wise PO Amount Report - " . htmlspecialchars($full); ?>
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
      <input type="date" name="stdate" value="<?php echo htmlspecialchars($st_in); ?>" required>
      &nbsp;&nbsp;
      To:
      <input type="date" name="endate" value="<?php echo htmlspecialchars($en_in); ?>" required>
      &nbsp;&nbsp;
      <input type="submit" value="Search" style="padding:6px 14px; font-weight:bold;">
    </td>
  </tr>
</table>
</form>

<table width="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<?php
/* =======================
   TOTAL PO (DATE-WISE)
======================= */
$po_total_sql = "
  SELECT COALESCE(SUM(total_amount),0) AS po_sum
  FROM po_table
  WHERE status='Approved'
    AND ceo_a_time BETWEEN '$stdate' AND '$endate'
";
$po_total_res = mysqli_query($con, $po_total_sql) or die(mysqli_error($con));
$po_total_row = mysqli_fetch_assoc($po_total_res);
$po_sum       = (float)($po_total_row['po_sum'] ?? 0);

echo "
<tr>
  <td colspan='3' style='font-size:22px; font-weight:bold; color:red; text-align:center; padding:10px;'>
    Total PO Amount ({$st_in} to {$en_in}) : {$po_sum}
  </td>
</tr>
";
?>

<tr>
  <th width="5%"><strong>S.No</strong></th>
  <th width="55%"><strong>Company Name</strong></th>
  <th width="20%"><strong>PO Amount</strong></th>
</tr>

<tbody>
<?php
/* =======================
   VENDOR WISE PO SUM
   (FAST: single query)
======================= */
$vendor_sql = "
  SELECT 
    p.creditor_code,
    COALESCE(SUM(p.total_amount),0) AS po_amount
  FROM po_table p
  WHERE p.status='Approved'
    AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'
  GROUP BY p.creditor_code
  ORDER BY po_amount DESC
";
$vendor_res = mysqli_query($con, $vendor_sql) or die(mysqli_error($con));

$count = 1;
while ($row = mysqli_fetch_assoc($vendor_res)) {

  $creditor  = $row['creditor_code'];
  $po_amount = (float)($row['po_amount'] ?? 0);

  // Supplier name
  $sel_sup = "SELECT supplier_name FROM suppliers_master WHERE supplier_code='" . mysqli_real_escape_string($con, $creditor) . "' LIMIT 1";
  $res_sup = mysqli_query($con, $sel_sup) or die(mysqli_error($con));
  $row_sup = mysqli_fetch_assoc($res_sup);
  $supplier_name = $row_sup['supplier_name'] ?? $creditor;
?>
<tr>
  <td align="center"><?php echo $count; ?></td>

  <td align="center"><?php echo htmlspecialchars($supplier_name); ?></td>

  <td align="center" style="font-weight:bold">
    <a href="po_report?cname=<?php echo urlencode($creditor); ?>&stdate=<?php echo urlencode($st_in); ?>&endate=<?php echo urlencode($en_in); ?>">
      <?php echo $po_amount; ?>
    </a>
  </td>
</tr>
<?php
  $count++;
}
?>
</tbody>
</table>

</body>
</html>