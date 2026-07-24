<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>



<?php

$user=$_SESSION["sess_username"];
$q1 = $_GET['q'];
$q=date('Y-m-d', strtotime($q1));
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
require('db1.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM acct_ap WHERE creditor_code = '".$q1."' and status='' order by id asc";
$result = mysqli_query($con,$sql);
$count=1;

echo "<table width='100%' height ='100%' border='1' align='center' bgcolor='#FFFF99' style='border-collapse:collapse;'>
<tr>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>SNO</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Creditor Name</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>GRN NO</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>GRN AMOUNT</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>PO NO</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>GRN TIME</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>INVOICE NO</th>

<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Go</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $count . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['creditor_code'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['grn'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['amount'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['pono'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['grn_time'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['invoice_no'] . "</td>";
  
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>"; 
  echo "<a target='_blank' href='create_ap_number?id=".$row['id']."'>Create AP</a>";
  echo "</td>";
  
  
  echo "</tr>";

$count++;}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>