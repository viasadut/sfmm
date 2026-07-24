<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$id2=$_REQUEST['id2'];
$ctime = date('d/m/Y H:i:s');
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$url = "otidocblood.php?pmrn=$pmrn&eid=$eid&id=$id";
$query = "UPDATE iblood set cby='$user', ctime='$ctime',status='Cancel' WHERE id=$id2"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>