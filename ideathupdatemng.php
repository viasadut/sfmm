
<?php 

require('db1.php');
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2?err=2');
    }
	$full1 = $_SESSION['sess_username'];
	
	$query39 = "SELECT * FROM user where uname= '$full1'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];
$ctime=date('d/m/Y H:i:s');

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST["user"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$url = "deathconfirmmng";
$query = "UPDATE death set cby='$full',ctime='$ctime',cstatus='confirmed'where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>