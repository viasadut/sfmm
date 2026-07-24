<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('Y-m-d H:i:s');
//$id1=$_REQUEST['ID'];
$url = "ot_day_approval";
$query = "UPDATE ot_day set status='Approved',a_name='$user',a_date='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); 
?>