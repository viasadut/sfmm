



<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$query1 = "SELECT * FROM doctor where dname= '$full'"; 
	 
$result1 = mysqli_query($con, $query1) or die(mysqli_error());

// Print out result
$row1 = mysqli_fetch_array($result1);
$desig = $row1['desig'];



// Get the user id
$pmrn = $_REQUEST['pmrn'];
$treat=explode(',',$pmrn);
	
	$pp=$treat[0];
	$id=$treat[1];
	$r='p';

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "" and $pp=='Regular Visit' and $user=='1218') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common','anes') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '1000';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
	
}



else if ($pmrn !== "" and $pp=='Regular Visit' and $desig=='Consultant') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common','anes') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '800';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
	
}




else if ($pmrn !== "" and $pp=='Regular Visit' and $desig!='Consultant') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common','anes') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '700';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
	
}


else if ($pmrn !== "" and $pp!='Regular Visit') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common','anes') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = $row['charge'];
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
	
}

// Store it in a array
?>

