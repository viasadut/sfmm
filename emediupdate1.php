<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$ww = date('d/m/Y H:i:s');
$url = "emedi.php?pmrn=$pmrn&eid=$eid&dname=$dname&ID=$id1";
$query = "UPDATE emedi2 set status='Cancel', cdate='$ww', cuser='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>