
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
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

$ptime=date('Y-m-d h:i:s');


$url = "tescardiospd1_new";
$query = "update ecg_test set pstatus='Deleted',pby='$user',ptime='$ptime' WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>