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
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$user=$_SESSION["sess_username"];
//$dname=$_REQUEST['dname'];
$id3=$_REQUEST['id3'];
$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "otidocmediendo.php?pmrn=$pmrn&id=$id";
$query = "UPDATE otendomedi set status='Cancel',cuser='$user', cdate='$cdate' where id='$id3'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>