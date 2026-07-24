<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$infu=$_REQUEST['infu'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "inrad1dis?pmrn=$pmrn&eid=$eid";

$query4 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and discharge='discharged'");
$data = mysqli_fetch_assoc($query4);
$pname=$data['pname'];
$padd=$data['padd'];
$psex=$data['gender'];
$page=$data['age'];
$pphone=$data['pphone'];
$dname=$data['adoc'];
$btime=date('d/m/Y H:i:s');


$query5 = mysqli_query($db,"select * from einves where id='$id'");
$data1 = mysqli_fetch_assoc($query5);
$type=$data1['subtype'];
$tname=$data1['infusion'];
//$subtype=$data1['subtype'];


$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`) 
values ('$pname', '$pmrn','$pphone','$padd','$type','NOT SEEN','$page','$psex','$dname','$tname','$btime')";
mysqli_query($con,$ins_query);






//$query = "UPDATE iinves set rby='$user',rtime='$dtime', rstatus='RECEIVED', status='RECEIVED' where id='$id'"; 
//$result = mysqli_query($con,$query) or die ( mysqli_error());


$url = "emerrad1dis?pmrn=$pmrn&eid=$eid";
$query = "UPDATE einves set rby='$user',rtime='$dtime', rstatus='RECEIVED', status='RECEIVED' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
?>