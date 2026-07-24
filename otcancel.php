<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$url = "otview12.php";
$query = "UPDATE ot set status='Cancel' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>