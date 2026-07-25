<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
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
$sid=$_REQUEST['sid'];
$ctime=date('d/m/Y H:i:s');

$url = "spromotion.php?sid=$sid";
$query = "update spromotion set status='inactive', cuser='$user', ctime='$ctime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>