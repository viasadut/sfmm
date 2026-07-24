<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy','mng')"; 
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
$user=$_SESSION["sess_username"];
//$orderby=$_REQUEST['orderby'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

//$pdos=$_REQUEST['test'];


$ortime = date('d/m/Y H:i:s');




//$message= "this is a message";

$query="update inpatient set medinoti='Medicine Prepared', medinotitime='$ortime' where pmrn='$pmrn' and eid='$eid'";

$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Notification Sent Successfully!!"); ';
    echo '</script>';
$url = "pharinmedi.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");



?>

