<?php

// Get the user id
$pmrn = $_REQUEST['phone'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM patient WHERE pphone='$pmrn'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$pname = $row["pname"];

	// Get the first name
	//$page = $row["page"];
	$psex = $row["psex"];
	$padd = $row["padd"];
	$pphone = $row["pmrn"];
	$dis = $row["dis"];
	$type=$row['type'];
	$ttr=$row['bdate'];
	//$pp=$row['pmrn'];

$dd=date('d',strtotime($ttr));
$mm=date('m',strtotime($ttr));
$yy=date('Y',strtotime($ttr));


$query1 = mysqli_query($con, "SELECT * FROM covidopd where pmrn= '$pphone' order by id DESC limit 1");

	$row1 = mysqli_fetch_array($query1);
$cr=$row1['tresult'];
}

// Store it in a array
$result = array("$pname","$psex","$padd","$pphone","$dis","$dd","$mm","$yy","$cr","$type");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
