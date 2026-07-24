<?php

// Get the user id
$dname = $_REQUEST['dname'];
$ct=date('H:i:s');
$date22=date('Y-m-d');

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($dname !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "select * from opd_appoint1 where dname='$dname' and date1='$date22' and status='AVAILABLE'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$dslot = $row["dslot"];

	// Get the first name
	//$page = $row["page"];
	

}

// Store it in a array
$result = array("$dslot");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
