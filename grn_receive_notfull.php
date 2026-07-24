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
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>

<style>
.style1 {
    font-size: x-large;
    font-weight: bold;
    font-style: italic;
}
</style>

<script>
function confirm_click(){
    return confirm("Are you Sure to Confirm this Request ?");
}
function confirm_click1(){
    return confirm("Are you Sure to Reject this Leave ?");
}
</script>

</head>

<body>

<p align="center" class="style1">
Todays <?php echo htmlspecialchars($full); ?>'s PO List
</p>

<p align="right"><?php echo "Date: " . date('d/m/Y'); ?></p>

<table width="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr>
  <th>S.No</th>
  <th>Department</th>
  <th>PO No</th>
  <th>Supplier</th>
  <th>Discount</th>
  <th>Total</th>
  <th>Date</th>
  <th>PO Status</th>
  <th>Action</th>
  <th>Print</th>
</tr>

<?php
$count = 1;

$sel_query = "
SELECT 
    p.*,
    COALESCE(SUM(pt1.r_qty),0) AS total_received,
    COALESCE(SUM(pt1.o_qty),0) AS total_ordered,

    CASE
        WHEN COALESCE(SUM(pt1.r_qty),0) > 0 
             AND COALESCE(SUM(pt1.r_qty),0) < COALESCE(SUM(pt1.o_qty),0)
        THEN 'Partially Received'

        WHEN COALESCE(SUM(pt1.r_qty),0) > 0 
             AND COALESCE(SUM(pt1.r_qty),0) = COALESCE(SUM(pt1.o_qty),0)
        THEN 'Full Received'

        ELSE p.status
    END AS po_status

FROM po_table p
LEFT JOIN po_table1 pt1 ON pt1.po_id = p.id

WHERE p.po_type != 'Pharmacy'

GROUP BY p.id

HAVING NOT (
    COALESCE(SUM(pt1.r_qty),0) > 0 
    AND COALESCE(SUM(pt1.r_qty),0) = COALESCE(SUM(pt1.o_qty),0)
)

ORDER BY p.id DESC
";

$result = mysqli_query($con, $sel_query) or die(mysqli_error($con));

while ($row = mysqli_fetch_assoc($result)) {
?>

<tr>
  <td align="center"><?php echo $count; ?></td>
  <td align="center"><?php echo htmlspecialchars($row["req_department"]); ?></td>
  <td align="center"><?php echo htmlspecialchars($row["id"]); ?></td>
  <td align="center"><?php echo htmlspecialchars($row["sup_code"]); ?></td>
  <td align="center"><?php echo htmlspecialchars($row["amount_discount"]); ?></td>
  <td align="center"><?php echo htmlspecialchars($row["total_amount"]); ?></td>
  <td align="center"><?php echo htmlspecialchars($row["issue_date"]); ?></td>

  <td align="center">
      <?php echo htmlspecialchars($row['po_status']); ?>
  </td>

  <td align="center">
  <?php
  $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
  $split = explode(".", $ip);
  $last = end($split);
  $host = substr($last, -2);
  $s_no = $row['id'];

  $grn = '2' . $host . date('ymds') . $s_no;

  if (
        $row['status'] == 'Approved' &&
        ($fullname == '1603' || $fullname == '54' || $fullname == '71' || $fullname == '1912')
     ) {
      echo '<a href="po_prepare1_purchase_grn?ono=' . urlencode($row["ono"]) . '&grn=' . urlencode($grn) . '">View/Edit</a>';
  } else {
      echo '-';
  }
  ?>
  </td>

  <td align="center">
    <a href="po_print_new?ono=<?php echo urlencode($row["ono"]); ?>">Print</a>
  </td>

</tr>

<?php
$count++;
}
?>

</table>

</body>
</html>