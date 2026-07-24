<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2?err=2');
    }
	$user=$_SESSION["sess_username"];
	$dtime= date('d/m/Y H:i:s');
?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
//$id=$_REQUEST['id'];
$id=$_REQUEST['id'];
$id1=$_REQUEST['id1'];
$pmrn=$_REQUEST['pmrn'];
$pdos=$_REQUEST['pdos'];

//$id1=$_REQUEST['ID'];
$url = "otcount.php?pmrn=$pmrn&id=$id";
$query="delete from otcount where id='$id1'";

$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>