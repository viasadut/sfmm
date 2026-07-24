<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
//$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "allstaffmng";
$query = "UPDATE staff1 set vr='Registration Done',vrtime='$dtime',vrby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); 
?>