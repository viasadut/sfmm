



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


	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM hits_list WHERE id='$pmrn' and status='0'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$price = $row["ipd_charge"];


$result = array("$price");

$result1 = array("$price1");
$result2 = array("$con_visit");
$result3 = array("$room_charge");
$result4 = array("$medi_charge");



// Send in JSON encoded form
//if($count>0)
//{
$myJSON = json_encode($result);
echo $myJSON;
//}
/*
else if($count1>0)
{
$myJSON = json_encode($result1);
echo $myJSON;
}

else if($count2>0)
{
$myJSON = json_encode($result2);
echo $myJSON;
}


else if($count3>0)
{
$myJSON = json_encode($result3);
echo $myJSON;
}

else if($count4>0)
{
$myJSON = json_encode($result4);
echo $myJSON;
}
*/
// Store it in a array
?>

