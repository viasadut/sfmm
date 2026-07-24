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
$tday=date('Y-m-d');
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
require('db1.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
				if($q==$tday){
			$sql = "select * from opd_appoint1 where dslot>='$ct' and dname='$q2' and date1='$q' and status='NOT AVAILABLE' order by dslot";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
			
			
//echo "<option value='".$row->dslot."'>".$row->dslot.'-'.$row1->status."</option>";
			
					
					
					
					if($row->status=='AVAILABLE'){
					echo "<option style='color:green' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
					
					else if($row->status=='NOT AVAILABLE'){
					echo "<option style='color:lightred' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
					else if($row->status=='Booked'){
					echo "<option style='color:red' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
						
						
						
				}
			}
			
				}
			
				else if($q!=$tday){
			$sql = "select * from opd_appoint1 where dname='$q2' and date1='$q' and status='NOT AVAILABLE' order by dslot";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
			
			
//echo "<option value='".$row->dslot."'>".$row->dslot.'-'.$row1->status."</option>";
			
					
					
					
					if($row->status=='AVAILABLE'){
					echo "<option style='color:green' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
					
					else if($row->status=='NOT AVAILABLE'){
					echo "<option style='color:red' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
					else if($row->status=='Booked'){
					echo "<option style='color:red' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
						
						
						
				}
			}
			
				}
mysqli_close($con);
?>
</body>
</html>