<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST["user"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$url = "birthconfirm.php";
$query = "UPDATE birth set status='Confirmed', cby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>