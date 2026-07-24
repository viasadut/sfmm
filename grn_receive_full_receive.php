<?php 
session_start();
require('db1.php');

$role = $_SESSION['sess_userrole'] ?? '';

$queryc = "SELECT COUNT(utype) AS total_count FROM user WHERE '$role' IN ('mng','staff','store','doctor')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc = mysqli_fetch_assoc($resultc);
$c1 = $rowc['total_count'] ?? 0;

if (!isset($_SESSION['sess_username']) || $c1 == 0) {
    header('Location: login2?err=2');
    exit;
}

$fullname = $_SESSION['sess_username'];

$query39 = "SELECT * FROM user WHERE uname='$fullname'";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39 = mysqli_fetch_assoc($result39);

$full = $row39['fullname'] ?? '';
$user = $_SESSION["sess_username"];

$query40 = "SELECT * FROM staff3 WHERE sid='$fullname'";
$result40 = mysqli_query($con, $query40) or die(mysqli_error($con));
$row40 = mysqli_fetch_assoc($result40);

$sid1 = $row40['sid1'] ?? '';
$cat  = $row40['cat'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Full Received PO List</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
.style1 {
    font-size: x-large;
    font-weight: bold;
    font-style: italic;
}
div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>

<link rel="stylesheet" href="styles.css">
<script src="script.js"></script>
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

<p align="center" class="style1">Today's <?php echo htmlspecialchars($full); ?>'s Full Received PO List</p>
<p align="right"><?php echo "Date: " . date('d/m/Y'); ?></p>

<form action="" method="GET">


<p ><a style="font-size:18px; font-weight:bold; color:red" href='grn_receive_pending'><span>Approved</span></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='grn_receive_full_receive' style="font-size:18px; font-weight:bold; color:green"><span>Full Received</span></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='grn_receive_rejected' style="font-size:18px; font-weight:bold; color:red"><span>Rejected</span></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='grn_receive' style="font-size:18px; font-weight:bold; color:red"><span>Home</span></a>


</p>
<table width="100%" height="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Request Department</strong></th>
      <th width="10%"><strong>PO NO</strong></th>
      <th width="10%"><strong>Supplier</strong></th>
      <th width="10%"><strong>Discount</strong></th>
      <th width="10%"><strong>Total Amount</strong></th>
      <th width="12%"><strong>Issue Date</strong></th>
      <th width="12%"><strong>PO Status</strong></th>
      <th width="12%"><strong>Action</strong></th>
      <th width="12%"><strong>Print PO</strong></th>
    </tr>

    <tbody>

<?php
$sel_query = "
    SELECT 
        p.*,
        COALESCE(SUM(pt1.r_qty), 0) AS total_received,
        COALESCE(SUM(pt1.o_qty), 0) AS total_ordered,
        CASE
            WHEN COALESCE(SUM(pt1.r_qty), 0) > 0 
                 AND COALESCE(SUM(pt1.r_qty), 0) = COALESCE(SUM(pt1.o_qty), 0)
            THEN 'Full Received'
            WHEN COALESCE(SUM(pt1.r_qty), 0) > 0 
                 AND COALESCE(SUM(pt1.r_qty), 0) < COALESCE(SUM(pt1.o_qty), 0)
            THEN 'Partially Received'
            ELSE p.status
        END AS po_status
    FROM po_table p
    LEFT JOIN po_table1 pt1 ON pt1.po_id = p.id
    WHERE p.po_type != 'Pharmacy'
    GROUP BY p.id
    HAVING COALESCE(SUM(pt1.r_qty), 0) > 0
       AND COALESCE(SUM(pt1.r_qty), 0) = COALESCE(SUM(pt1.o_qty), 0)
    ORDER BY p.id DESC
";

$result = mysqli_query($con, $sel_query) or die(mysqli_error($con));
$count = 1;

while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo htmlspecialchars($row["req_department"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row['id']); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["sup_code"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["amount_discount"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["total_amount"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["issue_date"]); ?></td>

      <td align="center"><?php echo htmlspecialchars($row['po_status']); ?></td>

      <td align="center">
      <?php
      $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
      $split = explode(".", $ip);
      $last = end($split);
      $host = substr($last, -2);
      $s_no = $row['id'];

      $grn = '2' . $host . date('ymds') . $s_no;
      $ono1 = $row['ono'];

      if (
            $row['status'] == 'Approved' &&
            ($fullname == '1603' || $fullname == '54' || $fullname == '71' || $fullname == '1912')
         ) {
          echo '<a href="po_prepare1_purchase_grn?ono=' . urlencode($ono1) . '&grn=' . urlencode($grn) . '">View/Edit</a>';
      } else {
          echo '-';
      }
      ?>
      </td>

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large; font-weight:bold">
        <a href="po_print_new?ono=<?php echo urlencode($row["ono"]); ?>">Print</a>
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