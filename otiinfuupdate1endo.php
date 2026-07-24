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
//$dname=$_REQUEST['dname'];
$id3=$_REQUEST['id3'];
$pmrn=$_REQUEST['pmrn'];
$cdate = date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "otidocinfusionendo.php?pmrn=$pmrn&id=$id";
$query = "UPDATE otendoinfusion set status1='Cancel',cdate='$cdate',cuser='$user'  where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>