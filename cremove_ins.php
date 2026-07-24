<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];
$etime=date('Y-m-d H:i:s');

$cname=$_REQUEST["cname"];
?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');

$id=$_REQUEST['id'];
//$id1=$_REQUEST['id1'];
$url = "surgery_instrument1.php?cname=$cname";
$query = "UPDATE sur_count1 set status='Deactivate', eby='$user', etime='$etime' WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>