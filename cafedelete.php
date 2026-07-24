<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];


$id=$_REQUEST['id'];
$eqty=$_REQUEST['eqty'];
$sid=$_REQUEST['sid'];
$ename=$_REQUEST['ename'];



$sel90="SELECT * FROM storecafe WHERE `ename`='$ename';";
$result90 = mysqli_query($con,$sel90);
$res93=mysqli_fetch_assoc($result90);
//$eprice=$res93["eprice"];
$eeqty=$res93["eqty"];

$ueqty2=$eeqty+$eqty;



//$pmrn=$_REQUEST['pmrn'];
//$id3=$_REQUEST['id3'];
$url = "cafeitem3.php?sid=$sid";
$query = "DELETE FROM cafesale WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



$ins_query2="Update storecafe set eqty='$ueqty2' where ename='$ename'";
mysqli_query($con,$ins_query2) or die(mysql_error());

header("Location: $url"); 
?>