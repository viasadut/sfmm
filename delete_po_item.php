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
$ono=$_REQUEST['ono'];
$id1=$_REQUEST['ID'];
$url = "po_prepare1_pharmacy.php?ono=$ono";
$query = "DELETE FROM po_table1 WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>