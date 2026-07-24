<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];


$id=$_REQUEST['id'];
$sid=$_REQUEST['sid'];

$ctime=date('d/m/Y h:i:s');






//$pmrn=$_REQUEST['pmrn'];
//$id3=$_REQUEST['id3'];
$url = "rrequest5.php?sid=$sid";
$query = "UPDATE srequest set status='Cancel',cby='$user', ctime='$ctime' WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());




header("Location: $url"); 
?>