<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];

$rname=$_REQUEST['rname'];
$user=$_REQUEST['user'];

$date1 = date('d/m/Y H:i:s');
$ddate1 = date('m/d/Y');
$dnew = date('Y-m-d');
$ddate = date('Y-m-d H:i:s');

$url = "ghousedis.php";
$query = "UPDATE gdetails set status='Discharged', ddate='$date1', dddate='$ddate1',dby='$user',dnew='$dnew',hstatus='UNDER HOUSEKEEPING' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$update2="update ghouse set status='AVAILABLE',hstatus='UNDER HOUSEKEEPING',dby='$user',ddate='$ddate' where rname='$rname'";
mysqli_query($con,$update2) or die(mysqli_error(gg));


$ins_query6="insert into ghouse1 (`rname`,`status`,`ddate`,`dby`,`hstatus`) values 
('$rname','Discharged','$ddate','$user','UNDER HOUSEKEEPING')";
mysqli_query($con,$ins_query6);

header("Location: $url"); 
?>