<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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
$id1=$_REQUEST['id1'];
$topic=$_REQUEST['topic'];

//$id1=$_REQUEST['ID'];
$url = "predoc1?id=$id1&topic=$topic";
$atime = date('d/m/Y H:i:s');
$atime1 = date('Y-m-d');



$query = "UPDATE predoc set status='Approved',adate='$atime',adate1='$atime1',aby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());




header("Location: $url"); 


	

?>