<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];

// Get the user id
$pmrn = $_REQUEST['pmrn'];
$dname = $_REQUEST['dname'];
	

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");


	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE status='Approved' and pname='$pmrn' and dname='$dname'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$price = $row["charge"];


	
$result = array("$price");


$myJSON = json_encode($result);
echo $myJSON;





// Store it in a array
?>

