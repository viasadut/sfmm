<?php 

//check_login.php

//include 'database_connection.php';
require('db1.php');
$connect = new PDO("mysql:host=localhost;dbname=sfmmkpjnew", "root", "Godiloveu16");
session_start();
$fullname = $_SESSION['sess_username'];
$test=$_SESSION['user_session_id'];
$query = "
	SELECT user_session_id FROM user 
	WHERE uname = '$fullname'
";

$result = $connect->query($query);

foreach($result as $row)
{
	if($_SESSION['user_session_id'] != $row['user_session_id'] and $fullname != $row['uname'])
	{
		$data['output'] = 'logout';
	}
	else
	{
		$data['output'] = 'login';
	}
}

echo json_encode($data);

?>