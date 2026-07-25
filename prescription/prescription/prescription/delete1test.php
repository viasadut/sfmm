<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
//$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$eid1=$_REQUEST['eid1'];
$pmrn=$_REQUEST['pmrn'];
$pname=$_REQUEST['pname'];
$medi=$_REQUEST['medi'];
$pdos=$_REQUEST['test'];
$brand=$_REQUEST['brand'];
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
//$id1=$_REQUEST['ID'];
$url = "newtest5test.php?pmrn=$pmrn&eid=$eid&dname=$dname&eido=$eid1";
$query="insert into pmedi (`dname`,`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`ndate`) values ('$dname','$pmrn','$pname','$medi','$brand','$pdos','$eid','$date1','$date2')";

$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>