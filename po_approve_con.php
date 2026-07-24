<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$user=$_SESSION['sess_username'];
$ortime = date('Y-m-d H:i:s');

$url = "po_approval.php";


if($user=='ceo') {

$ins_query1="update po_table set status='Approved',ceo_a_time='$ortime' where id='$id';";
mysqli_query($con,$ins_query1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}


else if($user=='cfo') {

$ins_query1="update po_table set status='FORWARD FOR CEO APPROVAL',cfo_a_time='$ortime' where id='$id';";
mysqli_query($con,$ins_query1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}

?>