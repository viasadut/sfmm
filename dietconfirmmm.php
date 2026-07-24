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
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "inplabdietcafebreak?pmrn=$pmrn&eid=$eid";

$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);
$pname=$data['pname'];
$padd=$data['padd'];
$psex=$data['gender'];
$page=$data['age'];
$pphone=$data['pphone'];
$dname=$data['adoc'];
$btime=date('d/m/Y H:i:s');


$query5 = mysqli_query($db,"select * from iidiet where id='$id'");
$data1 = mysqli_fetch_assoc($query5);
//$type=$data1['subtype'];
//$tname=$data1['infusion'];
//$subtype=$data1['subtype'];



$query = "UPDATE iidiet set guser='$user',gtime='$dtime', status='Given' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); 
?>