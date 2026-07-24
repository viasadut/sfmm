<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','rd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>



<?php

$user=$_SESSION['sess_username'];
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
$uname=$_REQUEST['uname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('Y-m-d H:i:s');
//$id1=$_REQUEST['ID'];
$url = "rd_receive_panel";



$query = "UPDATE ecg_test set rd_receive_by='$user',rd_receive_time='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());







header("Location: $url"); 
?>