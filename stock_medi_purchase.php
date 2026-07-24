



<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

// Get the user id
$pmrn = $_REQUEST['pmrn'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	

	//$row = mysqli_fetch_array($query);
	
	
	//$query1 = mysqli_query($con, "SELECT * FROM storenew WHERE eid='$pmrn' and estatus='Active'");
	$query1 = mysqli_query($con, "SELECT * FROM store_master WHERE code='$pmrn' and status='0'");
	$row1 = mysqli_fetch_array($query1);
	$p_id = $row1["id"];
	
	//$query = mysqli_query($con, "SELECT SUM(add_qty),u_price,g_name,b_name,rfid FROM purchase_stock3 WHERE code='$pmrn' and location='Store' and add_qty>0");
	$query = mysqli_query($con, "SELECT SUM(add_qty),u_price,g_name,b_name,rfid FROM purchase_stock3 WHERE code='$pmrn' and location='Store'");
	$row = mysqli_fetch_array($query);
	
	// Get the first name
	$tqty = $row["SUM(add_qty)"];

	// Get the first name
	//$page = $row["page"];
	$uprice = $row["uprice"];
	$code = $row1["name"];
	$brand = $row["b_name"];
	$rfid5 = $row["rfid"];	
	$location = $row["location1"];
	$perlevel = $row["perlevel"];
	
	//$p_id = $row["id"];

//$mcode = $row['code'];
	
}

// Store it in a array
$result = array("$tqty","$uprice","$code","$brand","$location","$perlevel","$p_id");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
