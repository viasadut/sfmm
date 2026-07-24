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

$url = "categorymngphar.php";
$query = "UPDATE medicine set status='Deactive', stime='$date1', sby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


header("Location: $url"); 
?>