



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
$pmrn = $_REQUEST['pmrn'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM medi_stock WHERE rfid='$pmrn' and add_qty>0");

	$row = mysqli_fetch_array($query);
	
	
	// Get the first name
	$tqty = $row["add_qty"];

	// Get the first name
	//$page = $row["page"];
	$uprice = $row["uprice"];
	$code = $row["mname"];
	$brand = $row["brand1"];
	$location = $row1["location1"];
	$perlevel = $row["perlevel"];
	$p_id = $row["id"];

//$mcode = $row['code'];
	  
}

// Store it in a array
$result = array("$tqty","$uprice","$code","$brand","$location","$perlevel","$p_id");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
