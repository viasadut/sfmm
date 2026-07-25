<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$eid1=$_REQUEST['eido'];
$url = "newtest2_edit.php?pmrn=$pmrn&eid=$eid&dname=$dname&eido=$eid1";
$query = "DELETE FROM alltest WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>