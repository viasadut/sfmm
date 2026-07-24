<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST['user'];
$user1=$_REQUEST['user1'];
//$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
//$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];


//$pname = $data['pname'];
//$pmrn = $data['pmrn'];
$odate = date('d/m/Y H:i:s');
//$infu = $_REQUEST['infu'];
//$remarks = $_REQUEST['remarks'];
$cdate=date('m/d/Y');

$ins_query="insert into ivisit (`pmrn`,`eid`,`odate`,`infusion`,`user`,`room`,`vtype`,`cdate`) values 
( '$pmrn','$eid','$odate','$user','$user1','900','ICU/HDU Visit','$cdate')";
mysqli_query($con,$ins_query) or die(mysql_error());





$url = "idocnote?pmrn=$pmrn&eid=$eid";
//$query = "UPDATE iinves set rby='$user',rtime='$dtime', rstatus='RECEIVED', status='RECEIVED' where id='$id'"; 
//$result = mysqli_query($con,$query) or die ( mysqli_error());

 echo '<script language="javascript">';
    echo 'alert("Inpatient Visit Added Successfully !!! "); ';
    echo '</script>';
header("Refresh: .1; URL=$url");
//header("Location: $url"); 
?>