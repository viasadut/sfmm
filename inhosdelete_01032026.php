<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill','mng','nurse')"; 
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
$user=$_SESSION["sess_username"];


$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$id3=$_REQUEST['id3'];
$pdos=(int)$_REQUEST['pdos'];
$code=$_REQUEST['code'];
$sno=$_REQUEST['sno'];
$price=$_REQUEST['price'];
$admission_no=(int)$_REQUEST['admission_no'];

$invoice_no=(int)$_REQUEST['invoice_no'];
$url = "otchargenurse1nurse.php?pmrn=$pmrn&eid=$eid";


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel_p=mysqli_query($db,"SELECT COUNT(id) FROM inhoscharge WHERE `id`='$id3';");
$result_p = mysqli_fetch_assoc($sel_p);
$del_id=$result_p['COUNT(id)'];
if($del_id>0){


$query = "DELETE FROM inhoscharge WHERE id=$id3"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$date=date('Y-m-d');
$tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$code'");
$tb_result = mysqli_fetch_assoc($tb_q);
//$tb_data=$tb_result['tb_op'];

if($tb_result['tb_op']!='')
      {
        $tb_data=$tb_result['tb_op'];
      }
      
      else if($tb_result['tb_op']=='')
      {
        $tb_data=$tb_result['tb_ip'];
      }

$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$id3','DR','$tb_data','$date','$p11','IPD_HOS_CHARGE_DEL')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$id3','CR','111999','$date','$p11','IPD_HOS_CHARGE_DEL')";
mysqli_query($con,$ins_query2) or die(mysql_error());






$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d M Y', $timestamp);



 header("Location:otchargenurse1nurse.php?pmrn=$pmrn&eid=$eid");

}
//header("Location: $url"); 
?>