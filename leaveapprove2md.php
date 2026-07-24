<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$appdate= date('Y-m-d');
$url = "leaveviewmd";
$query = "UPDATE conleavedetails set status='Approved By MD',mtime='$dtime',lseen='MDSEEN',status1='Approved',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); 
?>