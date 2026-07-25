<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

session_start();
require('db1.php');
$fullname = $_SESSION['sess_username'];




if(session_destroy()) // Destroying All Sessions
{
 $qq = "update user set user_session_id='' WHERE uname='$fullname'";
 $resultq = mysqli_query($con, $qq) or die(mysqli_error());
	
	
header("Location: login2"); // Redirecting To Home Page
}
?>