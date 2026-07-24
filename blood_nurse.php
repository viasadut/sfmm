
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$user=$_SESSION["sess_username"];
require('db1.php');
//$uname=$_REQUEST['uname'];
$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];





$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "iblood1?pmrn=$pmrn&eid=$eid";

$query1 = "UPDATE iblood set nstart='$dtime',nsby='$user' where id='$id'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());

header("Location: $url"); 


?>