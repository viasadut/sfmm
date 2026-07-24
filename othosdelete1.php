<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];


$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$id3=$_REQUEST['id3'];
$url = "otchargenurse2.php?pmrn=$pmrn&id=$id";
$query = "DELETE FROM othoscharge1 WHERE id=$id3"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>