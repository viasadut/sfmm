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
$q2 = $_GET['q1'];
$q=date('Y-m-d', strtotime($q1));
$ct=date('H:i:s');
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
require('db1.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="select * from opd_appoint where dslot>='$ct' and status='Active' order by dslot";

$result = mysqli_query($con,$sql);

//echo "<option selected=""></option>";






while($row = mysqli_fetch_array($result)) {
	
$tt=$row['dslot'];
$sql1 = "select * from opd_appoint1 where dname='$q2' and date1='$q' and dslot='$tt'";
$res1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_object($res1);	
	
	
  if($row1->status==''){
					echo "<option style='color:blue' value='".$row['dslot']."'>".$row['dslot']."- Slot Not Open Yet</option>";
					}
					
					else if($row1->status=='AVAILABLE'){
					echo "<option style='color:green' value='".$row['dslot']."'>".$row['dslot'].'-'.$row1->status."</option>";
					}
					
					else if($row1->status=='NOT AVAILABLE'){
					echo "<option style='color:red' value='".$row['dslot']."'>".$row['dslot'].'-'.$row1->status."</option>";
					}
					else if($row1->status=='Booked'){
					echo "<option style='color:red' value='".$row['dslot']."'>".$row['dslot'].'-'.$row1->status."</option>";
					}
					
  
}

mysqli_close($con);
?>
</body>
</html>