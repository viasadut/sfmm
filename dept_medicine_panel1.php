



<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM staff3 where sid= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

// Get the user id
$pmrn = $_REQUEST['pmrn'];
$dept = $_REQUEST['dept'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	
	$query1 = mysqli_query($con, "SELECT * FROM medi_stock1 WHERE rfid='$pmrn' and location1='OT'");

	$row1 = mysqli_fetch_array($query1);
	
	$pcode=$row1['code'];
	
	$query = mysqli_query($con, "SELECT * FROM medicine WHERE code='$pcode'");

	$row = mysqli_fetch_array($query);

	$query2 = mysqli_query($con, "SELECT SUM(add_qty) AS add_qty FROM medi_stock1 where rfid='$pmrn' and location1='OT';");

	$row2 = mysqli_fetch_array($query2);

	
	// Get the first name
	$tqty = $row2["add_qty"];

	// Get the first name
	//$page = $row["page"];
	$uprice = $row["uprice"];
	$code = $row["mname"];
	$ins = $row["frequency"].','.$row["frelation"].','.$row["duration"];

	/*$query1 = mysqli_query($con, "SELECT * FROM pmedi WHERE medi='$code'");

	$row1 = mysqli_fetch_array($query1);
	$pp = $row1["pmrn"];*/
}

// Store it in a array
$result = array("$tqty","$uprice","$code","$ins","$pcode");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
