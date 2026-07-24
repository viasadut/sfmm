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
$user=$_REQUEST['user'];
$server=$_SERVER['REMOTE_ADDR'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
  $cdate = date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "idocmedi.php?pmrn=$pmrn&eid=$eid";
$query = "UPDATE imedi3 set status='Cancel',status1 ='Cancel', cdate='$cdate',cuser='$user',server='$server' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>