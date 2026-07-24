<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$user=$_REQUEST['user'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "idocmedi.php?pmrn=$pmrn&eid=$eid&dname=$dname&ID=$id1";
$query = "UPDATE imedi2 set status='Cancel',cuser='$user', cdate='$cdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>