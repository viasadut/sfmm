<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
$dtime= date('Y-m-d H:i:s');
//$id1=$_REQUEST['ID'];
$url = "spd_report_format";



$ins_query1r="update spd_report_format set status='Deleted',delete_by='$user',delete_time='$dtime' where id='$id'";
$testr=mysqli_query($con,$ins_query1r) or die(mysql_error());


header("Location: $url"); 
?>