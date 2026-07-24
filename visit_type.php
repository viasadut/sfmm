<?php

// Get the user id
$pmrn = $_REQUEST['type'];
$dname = $_REQUEST['dname2'];
$ftype = $_REQUEST['ftype'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn=='Staff' || $pmrn=='Staff Spouse' || $pmrn=='Staff Children' || $pmrn=='Consultant' and $ftype=='Regular'){
	
	// Get corresponding first name and
	// last name for that user id	

	
	
	$g=200;
	$g1=200;
	
	}


else if ($pmrn=='Staff' || $pmrn=='Staff Spouse' || $pmrn=='Staff Children' || $pmrn=='Consultant' and $ftype=='Followup'){
	
	// Get corresponding first name and
	// last name for that user id	

	
	
	$g=100;
	$g1=100;
	
	}
	
	
	else if ($pmrn=='General' || $pmrn=='VIP' and $ftype=='Regular'){
	
	// Get corresponding first name and
	// last name for that user id	
	
	
	$queryc = "SELECT * FROM doctor where dname='$dname' and status IN ('Active','active')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
	$g=$rowc['v1'];
	$g1=$rowc['v2'];
	
	}
	
	else if ($pmrn=='General' || $pmrn=='VIP' and $ftype=='Followup'){
	
	// Get corresponding first name and
	// last name for that user id	
	
	
	$queryc = "SELECT * FROM doctor where dname='$dname' and status IN ('Active','active')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
	$g=$rowc['v2'];
	$g1=$rowc['v2'];
	
	}
	
	
else if ($pmrn!='Staff' || $pmrn!='Staff Spouse' || $pmrn!='Staff Children' || $pmrn!='Consultant' || $pmrn!='General' and $ftype=='Regular'){
	
	// Get corresponding first name and
	// last name for that user id	
	
$queryc5 = "SELECT * FROM corporate where c_name='$pmrn'"; 
$resultc5 = mysqli_query($con, $queryc5) or die(mysqli_error());
$rowc5 = mysqli_fetch_array($resultc5);

$dis=$rowc5['c_per'];


	
$queryc = "SELECT * FROM doctor where dname='$dname' and status IN ('Active','active')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
	$g=$rowc['v1']-$rowc['v1']*$dis / 100;
	//$g1=$rowc['v2'] * $dis / 100;
	
	}
	


else if ($pmrn!='Staff' || $pmrn!='Staff Spouse' || $pmrn!='Staff Children' || $pmrn!='Consultant' || $pmrn!='General' and $ftype=='Followup'){
	
	// Get corresponding first name and
	// last name for that user id	
	
$queryc5 = "SELECT * FROM corporate where c_name='$pmrn'"; 
$resultc5 = mysqli_query($con, $queryc5) or die(mysqli_error());
$rowc5 = mysqli_fetch_array($resultc5);

$dis=$rowc5['c_per'];


	
$queryc = "SELECT * FROM doctor where dname='$dname' and status IN ('Active','active')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
	$g=$rowc['v2']-$rowc['v2']*$dis / 100;
	//$g1=$rowc['v2'] * $dis / 100;
	
	}
	

// Store it in a array
$result = array("$g","$g1");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
