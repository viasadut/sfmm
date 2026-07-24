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
  $cdate = date('Y-m-d H:i:s');
//$id1=$_REQUEST['ID'];
$url = "cancelmediimo.php?pmrn=$pmrn&eid=$eid";

if($user!=''){
$query = "UPDATE imedi3 set status='Active',status1 ='Rupdated', retrive_time='$cdate',retrive_by='$user',server='$server' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
}
?>