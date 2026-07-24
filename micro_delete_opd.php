<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('lab')"; 
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
$user=$_SESSION['sess_username'];
$id=$_REQUEST['id'];
$id1=$_REQUEST['id1'];


//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "labmicro1_edit.php?pmrn=$pmrn&eid=$eid&id=$id1";



$query = "UPDATE micro set dstatus='Deleted',duser='$user',dtime='$dtime' WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


header("Location: $url"); 




?>