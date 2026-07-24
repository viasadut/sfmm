<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/





require('db1.php');
//$user=$_SESSION["sess_username"];
$full=$_REQUEST['full'];
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from ot where id='$id'");
$data = mysqli_fetch_assoc($query4);

$dname=$data['dname'];
$dname1=$data['dname1'];
$dname2=$data['dname2'];


$url = "otviewdoc";



if($dname==$full)
{
	
	
$ins_query="update ot set dnamestatus='Written' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());


header("Refresh: .1; URL=$url");
}
else if ($dname1==$full)
{
	
	
	$ins_query="update ot set dname1status='Written' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());

header("Refresh: .1; URL=$url");
}

else if ($dname2==$full)
{
	
	
	$ins_query="update ot set dname2status='Written' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());

header("Refresh: .1; URL=$url");
}







?>

