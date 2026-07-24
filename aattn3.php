<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$sid=$_REQUEST['sid'];

$server=$_SERVER['REMOTE_ADDR'];
$tt=$_SERVER['HTTP_HOST']	;

$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$sid'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

//$dname=$_REQUEST['dname'];

//$id1=$_REQUEST['ID'];
$date1 = date('d/m/Y H:i:s');
$adate = date('Y-m-d');
//$url = "idoccondis.php?pmrn=$pmrn&eid=$eid";
//$url = "iview.php";

if($tt=='192.168.100.252:8081')
{
$ins_query23="insert into attendance (`sid`,`sname`,`stime`,`adate`,`aip`,`status`,`sip`,`location`,`mode`) values 
('$sid', '$full','$date1','$adate','$server','Present','$tt','Hospital','Sad.jpg')";
mysqli_query($con,$ins_query23) or die("Problem in DB");}

else {
	
$ins_query23="insert into attendance (`sid`,`sname`,`stime`,`adate`,`aip`,`status`,`sip`,`location`,`mode`) values 
('$sid', '$full','$date1','$adate','$server','Present','$tt','Outside','Sad.jpg')";
mysqli_query($con,$ins_query23) or die("Problem in DB");}
	
	


header("Location: homemng"); 
?>