<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');

$id=$_REQUEST['id'];
//$id1=$_REQUEST['id1'];
$url = "mmaedit.php";
$query = "UPDATE storenew set status='Deactivate' WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>