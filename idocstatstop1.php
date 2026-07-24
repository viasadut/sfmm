<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$user1=$_REQUEST['user'];
$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$url = "imoidocstat.php?pmrn=$pmrn&eid=$eid";
$query = "UPDATE istat set status1='Cancel', sby='$user1' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>