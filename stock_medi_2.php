



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
	$query = mysqli_query($con, "SELECT * FROM medicine WHERE code='$pmrn' and status='Active'");

	$row = mysqli_fetch_array($query);
	
	
	$query1 = mysqli_query($con, "SELECT * FROM medi_stock WHERE code='$pmrn' and location='2nd Fl Pharmacy'");

	$row1 = mysqli_fetch_array($query1);

	// Get the first name
	//$tqty = $row["tqty"];

	// Get the first name
	//$page = $row["page"];
	$uprice = $row["uprice"];
	$code = $row["mname"];
	$brand = $row["brand1"];
	$location = $row1["location1"];
	$perlevel = $row["perlevel"];
	$p_id = $row["id"];

//$mcode = $row['code'];
	  $sum = "SELECT SUM(add_qty) FROM medi_stock where code='$pmrn' and location='2nd Fl Pharmacy' and add_qty>0" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$tqty=$sumr['SUM(add_qty)'];
}

// Store it in a array
$result = array("$tqty","$uprice","$code","$brand","$location","$perlevel","$p_id");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
