<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];


$id=$_REQUEST['id'];
$rfid=$_REQUEST['rfid'];
$url = "medication_new1.php?rfid=$rfid";
$query = "update imedi2 set status_select='' WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>