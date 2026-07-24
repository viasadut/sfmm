

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="chemo"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$user=$_SESSION["sess_username"];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "chemodocmedi.php?pmrn=$pmrn&eid=$eid";
$query = "UPDATE chemomedi set pstatus='Given',udone='$user', donet='$cdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query1="insert into chemohoscharge1 (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode')";
mysqli_query($con,$ins_query1) or die(mysql_error());

header("Location: $url"); 
?>