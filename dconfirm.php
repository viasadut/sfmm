<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
//$vc=$_REQUEST['vc'];
//$vc1=$_REQUEST['vc1'];
//$room1=$_REQUEST['room1'];
//$user=$_REQUEST['fullname'];
//$id1=$_REQUEST['ID'];
//$date1 = date('d/m/Y H:i:s');
//$ddate1 = date('m/d/Y');
//$url = "idoccondis.php?pmrn=$pmrn&eid=$eid";
$url = "iview.php";


$update="update inpatient set dconfirm='Digitally Confirmed By Consultant'where id='$id'";
mysqli_query($con,$update) or die(mysqli_error(pp));

header("Location: $url"); 
?>