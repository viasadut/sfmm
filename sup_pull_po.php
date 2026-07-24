<?php

// Get the user id
$pmrn = $_REQUEST['pmrn'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	//$query = mysqli_query($con, "SELECT * FROM add_company WHERE com_name='$pmrn'");
	$query = mysqli_query($con, "SELECT * FROM suppliers_master WHERE supplier_code='$pmrn'");
	$row = mysqli_fetch_array($query);

	// Get the first name
	$con_name = $row["supplier_code"];

	// Get the first name
	//$page = $row["page"];
	$com_add = $row["supplier_name"];
	
}

// Store it in a array
$result = array("$con_name","$com_add");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
