



<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

// Get the user id
$gname = $_REQUEST['gname'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($gname !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM medicine WHERE mname='$gname'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$brand = $row["brand1"];

	// Get the first name
	//$page = $row["page"];
	$company = $row["brand2"];
	$id = $row["id"];
	//$porder = $row["porder"];
	
}

// Store it in a array
$result = array("$brand","$company","$id");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
