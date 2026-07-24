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
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid&dname=$dname&ID=$id1";
$query = "UPDATE imedi2 set status='Cancel', cuser='$user'  where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>