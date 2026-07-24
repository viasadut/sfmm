<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id2=$_REQUEST['id2'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$id1=$_REQUEST['id1'];
$url = "edmedi1.php?pmrn=$pmrn&eid=$eid&dname=$dname&id=$id2";
$query = "DELETE FROM edmedi WHERE id=$id1"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>