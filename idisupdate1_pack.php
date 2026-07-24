<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$vc=$_REQUEST['vc'];
$vc1=$_REQUEST['vc1'];
$ac=$_REQUEST['ac'];
$room1=$_REQUEST['room1'];
$room=$_REQUEST['room'];
$adatenew= date('Y-m-d H:i:s');
$user=$_REQUEST['user'];
//$id1=$_REQUEST['ID'];
$date1 = date('d/m/Y H:i:s');
$ddate1 = date('m/d/Y');
//$url = "idoccondis.php?pmrn=$pmrn&eid=$eid";
$url = "package_view1.php";



$query = "UPDATE package_screening set status='Discharged' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

/*
$query1 = "UPDATE idischarge1 set idisconfirm='Confirmed' where pmrn='$pmrn' and eid='$eid'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());

$update="update inpatient set discharge='Discharged',fstatustime='$date1',ddate1='$ddate1', dconname='$user' where eid='$eid' and pmrn='$pmrn'";
mysqli_query($con,$update) or die(mysqli_error(pp));

$update1="update irefferal set status='Discharged'where eid='$eid' and pmrn='$pmrn'";
mysqli_query($con,$update1) or die(mysqli_error(oo));


$update2="update bed set status='Under Housekeeping', pname='',pmrn='', adate='', dname='', discharge='' where bno='$room1'";
mysqli_query($con,$update2) or die(mysqli_error(gg));


$update3="update vcard set status='AVAILABLE',pmrn='' where c_no='$vc'";
mysqli_query($con,$update3) or die(mysqli_error(oo));

$update4="update vcard set status='AVAILABLE',pmrn='' where c_no='$vc1'";
mysqli_query($con,$update4) or die(mysqli_error(oo));

$update5="update acard set status='AVAILABLE',pmrn='' where c_no='$ac'";
mysqli_query($con,$update5) or die(mysqli_error(oo));


$ins_query2="insert into bed_mang (`bno`,`c_request_by`,`c_request_time`,`problem`,`status`) values('$room1','$user','$date1','Under Housekeeping','Under Housekeeping')";
mysqli_query($con,$ins_query2) or die(mysql_error());

$update2_n="update newbed set adatenew1='$adatenew',tby1='$user' where type='$room' and bno='$room1' and pmrn='$pmrn' and eid='$eid'";
mysqli_query($con,$update2_n) or die(mysqli_error(gg));
*/
header("Location: $url"); 
?>