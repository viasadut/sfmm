<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor')"; 
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
$sql="SELECT * FROM con_work WHERE date = '".$q."' and dcode='".$user."' order by loc asc";
$result = mysqli_query($con,$sql);

echo "<table width='100%' height ='100%' border='1' align='center' bgcolor='#FFFF99' style='border-collapse:collapse;'>
<tr>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>SNO</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Doctor Name</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Patient Name</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Patient MRN</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Procedure Name</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Location</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Date</th>
<th style='background-color:lightgreen;font-size:18px;font-weight:bold'>Print</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['id'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['dname'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['pname'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['pmrn'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['pro_name'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['loc'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['date'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>"; 
  echo "<a target='_blank' href='work_report?id=".$row['id']."'><img src='print.png' title='Print Report' width='50' height='60' /></a>";
  echo "</td>";
  
  
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>