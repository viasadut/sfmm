<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$cby=$_REQUEST['cby'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$url = "procedureup_ms.php";
$query = "UPDATE m_suite set ustatus='Cancel', cby='$cby' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>