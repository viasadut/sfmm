<?php

// Get the user id
$pmrn = $_REQUEST['pmrn'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM patient WHERE pmrn='$pmrn'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$pname = $row["pname"];

	// Get the first name
	//$page = $row["page"];
	$psex = $row["psex"];
	$padd = $row["padd"];
	$pphone = $row["pphone"];
	$dis = $row["dis"];
	$ptype=$row['type'];
	$ttr=$row['bdate'];

$dd=date('d',strtotime($ttr));
$mm=date('m',strtotime($ttr));
$yy=date('Y',strtotime($ttr));


$query1 = mysqli_query($con, "SELECT * FROM covidopd where pmrn= '$pmrn' order by id DESC limit 1");

$row1 = mysqli_fetch_array($query1);
$cr=$row1['tresult'];
}

// Store it in a array
$result = array("$pname","$psex","$padd","$pphone","$dis","$dd","$mm","$yy","$cr","$ptype");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
