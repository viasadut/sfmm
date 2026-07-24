<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$type=$_REQUEST['type'];
//$bal=$_REQUEST['bal'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];



$url = "pendingrequest";
$query1 = "UPDATE medicinerequest set rstatus='Cancelled', cancel='$user' where id='$id'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());

header("Location: $url");



?>