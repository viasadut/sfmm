<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','staff1')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$sid=$_REQUEST['sid'];
$ctime=date('Y-m-d H:i:s');

$url = "add_dependencies.php?sid=$sid";
$query = "update dependency set status='Inactive', edit_by='$user', edit_time='$ctime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>