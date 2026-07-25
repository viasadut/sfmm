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
$user=$_SESSION["sess_username"];
$adate1=date('Y-m-d');


$ID=$_REQUEST['ID'];
$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "viewnew";

$query1 = "UPDATE pappnew set s_no='' where dname='$dname' and adate1='$adate1' and s_no='Next'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());



$query = "UPDATE pappnew set s_no='Next' where ID='$ID'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());




header("Location: $url"); 
?>