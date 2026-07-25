<?php 
   session_start();
    require('../../db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','doctor')"; 
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

require('../../db1.php');
//$user=$_SESSION["sess_username"];
$id1=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$dname=$_REQUEST['dname'];
$iname=$_REQUEST['iname'];
$pic_id=$_REQUEST['pic_id'];


$add_time = date('Y-m-d H:i:s');

$url = "set_pic_attach?pmrn=$pmrn&eid=$eid&ID=$id1&dname=$dname";

$ins_query1="delete from set_attach_pic where pmrn='$pmrn' and eid='$eid' and dname='$dname' and pic_id='$pic_id';";
mysqli_query($con,$ins_query1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Deleted  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");

?>