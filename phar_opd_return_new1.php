



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
	$query = mysqli_query($con, "SELECT * FROM phar_sale WHERE id='$pmrn'");

	$row = mysqli_fetch_array($query);

	$medi=$row['medi'].'('.$row['brand'].')';
	$qty=$row['qty'];
	$uprice=$row['uprice'];
	$sno=$row['sno'];
	$id=$row['id'];
	$rfid=$row['rfid'];
	$r_qty=$row['return_qty'];
	
}

// Store it in a array
$result = array("$medi","$qty","$uprice","$sno","$id","$rfid","$r_qty");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
