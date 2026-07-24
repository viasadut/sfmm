<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2.php?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_REQUEST['user'];
$user=$_SESSION['sess_username'];

$id=$_REQUEST['id'];

$appdate= date('Y-m-d');




$query = "UPDATE deathb set mstatus1='Confirmed By MD' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



$url = "deathstatmng1_all";
header("Location: $url");
	

?>