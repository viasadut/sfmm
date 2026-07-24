



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
	$query = mysqli_query($con, "SELECT * FROM medi_stock WHERE rfid='$pmrn' and location='Pharmacy' and add_qty>0");

	$row = mysqli_fetch_array($query);

	
	$tqty = $row["add_qty"];

	// Get the first name
	//$page = $row["page"];
	
	$code = $row["g_name"];
	$code1 = $row["code"];
	
	$query1 = mysqli_query($con, "SELECT * FROM medicine WHERE code='$code1'");

	$row1 = mysqli_fetch_array($query1);

	
	$ins = $row1["frequency"].','.$row1["frelation"].','.$row1["duration"];
$uprice = $row1["uprice"];
	/*$query1 = mysqli_query($con, "SELECT * FROM pmedi WHERE medi='$code'");

	$row1 = mysqli_fetch_array($query1);
	$pp = $row1["pmrn"];*/
}

// Store it in a array
$result = array("$tqty","$uprice","$code","$ins");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
