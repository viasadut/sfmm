<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$uname=$_REQUEST['uname'];
$id=$_REQUEST['id'];
//$type=$_REQUEST['type'];
//$bal=$_REQUEST['bal'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];



$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "admview";

$query1 = "UPDATE preadm set tstatus='Approved',tname='$uname',ttime='$dtime' where id='$id'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());
header("Location: $url");



?>