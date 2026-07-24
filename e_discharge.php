<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];

//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];


//$user=$_REQUEST['user'];
//$id1=$_REQUEST['ID'];
$date1 = date('d/m/Y H:i:s');
$ddate1 = date('m/d/Y');
//$url = "idoccondis.php?pmrn=$pmrn&eid=$eid";
$ddate2=date('Y-m-d');
$url = "eview12.php";


$update="update emergency set discharge='Discharged', disstatus='SEEN',fstatustime='$date1',ddate1='$ddate1', duser='$user',ddate2='$ddate2' where `eid`='$eid' and pmrn='$pmrn'";
mysqli_query($con,$update) or die(mysql_error());

$update1="update erefferal set status='Discharged' where `eid`='$eid' and pmrn='$pmrn'";
mysqli_query($con,$update1) or die(mysql_error());


header("Location: $url"); 
?>