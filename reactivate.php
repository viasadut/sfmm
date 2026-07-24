<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];

//$rname=$_REQUEST['rname'];
$user=$_REQUEST['user'];

$date1 = date('d/m/Y H:i:s');
$ddate1 = date('m/d/Y');

$url = "listdeactive.php";
$query = "UPDATE medicine set status='Active', stime='$date1', sby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


header("Location: $url"); 
?>