



<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$pmrn = $_REQUEST['pmrn'];
$porder = $_REQUEST['porder'];

//list($number1, $number2) = explode(',', $pmrn);

// Get the user id
//$pmrnE =  explode(",", $pmrn);

//$pieces = explode(" ", $pizza);
//$pmrn4=$pmrnE[0]; // piece1
//$pmrn1=$pmrnE[1]; // piece2

 
//$pmrn = $_REQUEST['pmrn'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "select * from vitals_report_format where status in('Active','Waiting') and type='$pmrn'");

	
	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];
	$type = $row["type"];

	// Get the first name
	//$page = $row["page"];
	$charge = $row["report"];
	//$porder = $porder;
	
}

// Store it in a array
$result = array("$charge","$type");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
