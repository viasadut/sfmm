<?php

// Get the user id
$cprice = $_REQUEST['cprice'];
$form = $_REQUEST['form'];
$rr=$cprice * $form;

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($cprice !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	//$query = mysqli_query($con, "SELECT * FROM patient WHERE pmrn='$pmrn'");

	//$row = mysqli_fetch_array($query);

	// Get the first name
	//$pname = $row["pname"];

	// Get the first name
	//$page = $row["page"];
	/*$psex = $row["psex"];
	$padd = $row["padd"];
	$pphone = $row["pphone"];
	$dis = $row["dis"];
	
	$ttr=$row['bdate'];

$dd=date('d',strtotime($ttr));
$mm=date('m',strtotime($ttr));
$yy=date('Y',strtotime($ttr));
*/

$form1=$rr;
}

// Store it in a array
$result = array("$form1");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
