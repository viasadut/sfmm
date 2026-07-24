



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
	

	
	$query1 = mysqli_query($con, "SELECT SUM(add_qty),u_price,code,g_name FROM medi_stock WHERE sno='$pmrn' and location='2nd Fl Pharmacy' and add_qty>0");
	$row1 = mysqli_fetch_array($query1);
	// Get the first name
	$tqty = $row1["SUM(add_qty)"];

	// Get the first name
	$code1 = $row1["code"];
	$uprice = $row1["u_price"];
	$code = $row1["g_name"];
	
	$query = mysqli_query($con, "SELECT * FROM medicine WHERE code='$code1'");

	$row = mysqli_fetch_array($query);
	
	$ins = $row["frequency"].','.$row["frelation"].','.$row["duration"];

	/*$query1 = mysqli_query($con, "SELECT * FROM pmedi WHERE medi='$code'");

	$row1 = mysqli_fetch_array($query1);
	$pp = $row1["pmrn"];*/
}

// Store it in a array
$result = array("$tqty","$uprice","$code","$ins","$code1");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
