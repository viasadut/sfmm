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
	
	



//$treat=explode(',',$pmrn);
	
	//$medi1=$treat[0];
	//$rfid=$pmrn;

	
	
	$query = mysqli_query($con, "SELECT * FROM medi_stock WHERE sno='$pmrn' and code !='51840419'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$tqty = $row["add_qty"];

	// Get the first name
	//$page = $row["page"];
	//$uprice = $row["uprice"];
	//$code = $row["mname"];
	//$ins = $row["frequency"].','.$row["frelation"].','.$row["duration"];

	/*$query1 = mysqli_query($con, "SELECT * FROM pmedi WHERE medi='$code'");

	$row1 = mysqli_fetch_array($query1);
	$pp = $row1["pmrn"];*/
}

// Store it in a array
$result = array("$tqty");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
