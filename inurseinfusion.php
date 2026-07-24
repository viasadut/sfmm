<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');




session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2?err=2');
    }



$user=$_SESSION["sess_username"];
$id =$_REQUEST["id"];
//$pname = $data59['pname'];
$pmrn = $_REQUEST['pmrn'];
$eid = $_REQUEST['eid'];
//$padd = $data59['padd'];
//$adm = $data59['adate'];
//$pphone=$data59['pphone'];
//$page=$data59['age'];
//$psex=$data59['gender'];
//$odate = $_REQUEST['odate'];
//$otime = $_REQUEST['otime'];
//$infu = $_REQUEST['infu'];
$ddate = date('d/m/Y H:i:s');
//$dtime = $_REQUEST['dtime'];
$rdate=date('Y-m-d h:i:s');

$url = "iinpatient.php?pmrn=$pmrn&eid=$eid";

$medi_query  = "SELECT * FROM `iinfusion` WHERE `rfid` ='$infu'";
    $run_medi    = mysqli_query($con,$medi_query);
    $result_medi = mysqli_fetch_assoc($run_medi);
	$id6=$result_medi['id'];


$update="update iinfusion set ddate='$ddate',status='implemented', duser='$user' where `id`='$id'";
//$update="update imedi2 set donet='$ddate',status1='Rupdated', udone='$user',status1='implemented' where `id`='$id'";
mysqli_query($con,$update) or die(mysql_error());

$update1="update phar_sale set r_by='$user',r_date='$rdate' where `iidd`='$id6'";
mysqli_query($con,$update1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Infusion Successfully Implemented  !!"); ';
    echo '</script>';
header("Location: $url"); 
?>