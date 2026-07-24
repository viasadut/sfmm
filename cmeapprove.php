<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2.php?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_REQUEST['user'];
$user=$_SESSION['sess_username'];

$id=$_REQUEST['id'];

//$id1=$_REQUEST['ID'];
$url = "testse";
$atime = date('m/d/Y H:i:s');



$query = "UPDATE cme set status='Approved',atime='$atime',aby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());




header("Location: $url"); 


	

?>