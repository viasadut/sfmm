



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
	$query = mysqli_query($con, "SELECT * FROM radio WHERE iname='$pmrn' and status='Active'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$price = $row["price"];


	$query1 = mysqli_query($con, "SELECT * FROM storenew WHERE ename='$pmrn'");

	$row1 = mysqli_fetch_array($query1);

	// Get the first name
	$price1 = $row1["price"];


	$query2 = mysqli_query($con, "SELECT * FROM doctor WHERE dname='$pmrn' and status in('active','Active')");

	$row2 = mysqli_fetch_array($query2);

	// Get the first name
	$con_visit = $row2["v1"];



	$query3 = mysqli_query($con, "SELECT * FROM bed WHERE type='$pmrn'");

	$row3 = mysqli_fetch_array($query3);

	// Get the first name
	$room_charge = $row3["charge"];



	$query4 = mysqli_query($con, "SELECT * FROM medicine WHERE mname='$pmrn' and status in('active','Active')");

	$row4 = mysqli_fetch_array($query4);

	// Get the first name
	$medi_charge = $row4["uprice1"];



	$query_c = mysqli_query($con, "SELECT COUNT(id) FROM radio WHERE iname='$pmrn'");

	$row_c = mysqli_fetch_array($query_c);

	// Get the first name
	$count = $row_c["COUNT(id)"];

	
	$query_c1 = mysqli_query($con, "SELECT COUNT(id) FROM storenew WHERE ename='$pmrn'");

	$row_c1 = mysqli_fetch_array($query_c1);

	// Get the first name
	$count1 = $row_c1["COUNT(id)"];


	$query_c2 = mysqli_query($con, "SELECT COUNT(did) FROM doctor WHERE dname='$pmrn'and status in('active','Active')");

	$row_c2 = mysqli_fetch_array($query_c2);

	// Get the first name
	$count2 = $row_c2["COUNT(did)"];



	$query_c3 = mysqli_query($con, "SELECT COUNT(id) FROM bed WHERE type='$pmrn'");

	$row_c3 = mysqli_fetch_array($query_c3);

	// Get the first name
	$count3 = $row_c3["COUNT(id)"];



	$query_c4 = mysqli_query($con, "SELECT COUNT(id) FROM medicine WHERE mname='$pmrn'");

	$row_c4 = mysqli_fetch_array($query_c4);

	// Get the first name
	$count4 = $row_c4["COUNT(id)"];

	// Get the first name
	//$page = $row["page"];
	$charge = '1000';
	$porder = $row["porder"];

$result = array("$price");

$result1 = array("$price1");
$result2 = array("$con_visit");
$result3 = array("$room_charge");
$result4 = array("$medi_charge");



// Send in JSON encoded form
if($count>0)
{
$myJSON = json_encode($result);
echo $myJSON;
}

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

// Store it in a array
?>

