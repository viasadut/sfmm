<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$medi=$_REQUEST['medi'];
$link=$_REQUEST['link'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "tescath";
$query = "UPDATE alltest set rby='$user',rtime='$dtime',status='RECEIVED' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); 
?>