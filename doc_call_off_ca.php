<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
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



$dn=$_REQUEST['dn'];
$sid=$_REQUEST['sid'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "new_opd_1?sid=$sid";
$url1 = "new_opd";
$query = "UPDATE doctor set c_call='0',offby='$user' where dname='$dn'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

if($sid=='')
	
	{
		
header("Location: $url1"); 		
	}

	if($sid!='')
	{
header("Location: $url"); 
	}
?>