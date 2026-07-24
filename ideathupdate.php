<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST["user"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$url = "deathconfirm.php";
$query = "UPDATE death1 set estatus='Confirmed', ecby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>