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
$sid=$_REQUEST['sid'];
$tleave=$_REQUEST['tleave'];
$tdays=$_REQUEST['tdays'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "leaveviewmd";
$appdate= date('Y-m-d');


$query = "SELECT * from staff1 where sid='$sid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$al= $row['curleave']-$tdays;
$ol= $row['oleave'] + $tdays;
$altaken= $row['altaken'] + $tdays;
$al1= $row['aleave']-$tdays;
if($tleave=='Annual Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());



header("Location: $url"); }


else if($tleave=='Conference Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());



header("Location: $url"); }


else if($tleave=='Training Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());



header("Location: $url"); }


else{
	$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set oleave='$ol' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());


$url = "leaveviewmd";
header("Location: $url");
	
}
?>