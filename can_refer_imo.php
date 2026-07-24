<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "imoidocrefferal?pmrn=$pmrn&eid=$eid";




$query = "UPDATE irefferal set cstatus='Cancel',ctime='$dtime',cby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());






header("Location: $url"); 


?>