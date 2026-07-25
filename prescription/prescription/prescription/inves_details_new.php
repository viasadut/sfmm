



<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$query1 = "SELECT * FROM doctor where dname= '$full'"; 
	 
$result1 = mysqli_query($con, $query1) or die(mysqli_error());

// Print out result
$row1 = mysqli_fetch_array($result1);
$desig = $row1['desig'];



// Get the user id
$pmrn = $_REQUEST['pmrn'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

	$query = mysqli_query($con, "SELECT * FROM radio1 WHERE iname='$pmrn'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["ins_new"];

	

$result = array("$sformat");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
	





// Store it in a array
?>

