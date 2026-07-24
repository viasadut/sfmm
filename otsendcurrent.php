

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

$id=$_REQUEST['id'];
$room2=$_REQUEST['room2'];
$room3=$_REQUEST['room3'];
//$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$sstime=date('Y-m-d H:i:s');
$url = "otview12.php";
$query = "UPDATE ot set room2='$room2', room3='$room3',sstime='$sstime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>