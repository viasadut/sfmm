<?php

// Get the user id
$date =date('Y-m-d',strtotime($_REQUEST['pmrn']));

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM opd_appoint1 WHERE date1='$date'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	//$dname = $row["pname"];

	// Get the first name
	//$page = $row["page"];
	$select = $row["dslot"];
	

}

// Store it in a array
$result = array("$dname","$select");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
