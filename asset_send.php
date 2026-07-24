<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
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

//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "all_asset_list_indu";

$query39 = "SELECT * FROM storenew where id= '$id'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$aname = $row39['ename1'];
$sno = $row39['serialno'];
$msno = $row39['msno'];
$aname = $row39['ename1'];
$c_loc = $row39['c_loc'];



$query = "UPDATE storenew set sendstatus='sent' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$ins_query="insert into oxygen_1 (`aname`,`sno`,`msno`,`status`,`aby`,`atime`,`s_s_no`,`location`,`type`) values 
( '$aname','$sno','$msno','Ready To Use','$user','$dtime','$id','$c_loc','$aname')";
mysqli_query($con,$ins_query) or die(mysql_error());







header("Location: $url"); 


?>