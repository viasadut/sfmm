



<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$pmrn = $_REQUEST['pmrn'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$query1 = "SELECT * FROM cdetails where cname= '$pmrn' and user='$user'"; 
	 
$result1 = mysqli_query($con, $query1) or die(mysqli_error());

// Print out result
$row1 = mysqli_fetch_array($result1);
$dosage = $row1['cdescription'];



// Get the user id

$treat=explode(',',$pmrn);
	
	$pp=$treat[0];
	$id=$treat[1];
	$r='p';


$result = array("$dosage");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
	


// Store it in a array
?>

