
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="rad"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$id1=$_REQUEST['ID'];
$url = "rpapp2.php?pmrn=$pmrn";
$query = "DELETE FROM alltest WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>