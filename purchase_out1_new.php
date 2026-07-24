



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

$pmrn =$_REQUEST['pmrn'];

$treat=explode(',',$pmrn);
	
	$pmrn1=$treat[0];
	$pmrn2=$treat[1];
//$pmrn = $_REQUEST['pmrn'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT SUM(add_qty),u_price,g_name,rfid FROM purchase_stock WHERE code='$pmrn1' and location='Store' and add_qty>0");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$tqty = $row["SUM(add_qty)"];
	
	// last name for that user id	
	
	// Get the first name
	//$page = $row["page"];

	
	$uprice = $row["u_price"];
	//$code = $row["g_name"];
	$code = $row["g_name"];
	$rfid5 = $row["rfid"];
	$ins = $row["frequency"].','.$row["frelation"].','.$row["duration"];

	$query3 = mysqli_query($con, "SELECT SUM(add_qty),add_time FROM purchase_stock WHERE code='$pmrn1' and location='Store' and add_qty>0");

	$row3 = mysqli_fetch_array($query3);
	$dtqty = $row3["SUM(add_qty)"];
	$ldop = date('Y-m-d', strtotime($row3["add_time"]));
}

// Store it in a array
if($ldop=='1970-01-01'){
$result = array("$tqty","$uprice","$code","$ins","$rfid5","$dtqty","0000-00-00");
}

else {
$result = array("$tqty","$uprice","$code","$ins","$rfid5","$dtqty","$ldop");
}
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
