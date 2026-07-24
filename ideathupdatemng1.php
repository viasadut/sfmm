<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST["user"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$url = "deathconfirmmng.php";
$query = "UPDATE death set rto='Confirmed', cby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>