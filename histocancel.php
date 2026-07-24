

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2.php?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$ctime= date('d/m/Y H:i:s');

$id=$_REQUEST['id'];
//$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$url = "histo3.php";
$query = "UPDATE histo set status1='Cancel', cby='$user', ctime='$ctime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>