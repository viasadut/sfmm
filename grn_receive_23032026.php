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

$url1 = $_SERVER['REQUEST_URI'];

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
<title>View Records</title>
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

<script type="text/javascript">
function confirm_click()
{
    return confirm("Are you Sure to Confirm this Request ?");
}

function confirm_click1()
{
    return confirm("Are you Sure to Reject this Leave ?");
}
</script>

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

<p align="center" class="style1">Todays <?php echo htmlspecialchars($full); ?>'s Charge Code Pending Approval List</p> 
<p align="right"><?php echo "Date: " . date('d/m/Y'); ?></p>

<form action="" method="GET">
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
$count = 1;

$sel_query = "SELECT * FROM po_table WHERE status='FORWARD FOR CEO APPROVAL' AND '$user'='ceo' ORDER BY id ASC";
$result = mysqli_query($con, $sel_query) or die(mysqli_error($con));

while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo htmlspecialchars($row["req_department"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row['po_type']); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["sup_code"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["amount_discount"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["total_amount"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["issue_date"]); ?></td>

      <td align="center"><?php echo htmlspecialchars($row["status"]); ?></td>

      <td align="center">
        <?php
        $ono1 = $row['ono'];
        $simple_string = $ono1;
        $ciphering = "AES-256-CTR";
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "kpj";
        $encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);
        ?>
        <a href="po_prepare_mng?ono=<?php echo urlencode($encryption); ?>">View/Edit</a>
        <br><br>
        <a onclick="return confirm_click();" href="po_approve_con?id=<?php echo $row["id"]; ?>&user=<?php echo urlencode($fullname); ?>">Approve</a>
        <br><br>
        <a onclick="return confirm_click1();" href="po_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
      </td>

      <td align="center">-</td>
    </tr>
<?php
$count++;
}
?>

<?php
$sel_query = "
    SELECT 
        p.*,
        CASE
            WHEN COALESCE(SUM(pt1.r_qty), 0) > 0 
                 AND COALESCE(SUM(pt1.r_qty), 0) < COALESCE(SUM(pt1.o_qty), 0)
            THEN 'Partially Received'

            WHEN COALESCE(SUM(pt1.r_qty), 0) > 0 
                 AND COALESCE(SUM(pt1.r_qty), 0) = COALESCE(SUM(pt1.o_qty), 0)
            THEN 'Full Received'

            ELSE p.status
        END AS po_status
    FROM po_table p
    LEFT JOIN po_table1 pt1 ON pt1.po_id = p.id
    WHERE p.po_type != 'Pharmacy'
    GROUP BY p.id
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