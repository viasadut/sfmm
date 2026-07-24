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
$ieid=$_REQUEST['ieid'];
$type=$_REQUEST['type'];
$pmrn=$_REQUEST['pmrn'];
$price=$_REQUEST['price'];

$pdos=(int)$_REQUEST['pdos'];
$code=$_REQUEST['code'];
$admission_no=(int)$_REQUEST['admission_no'];

$invoice_no=(int)$_REQUEST['invoice_no'];

//$id1=$_REQUEST['ID'];
$url = "prohoscharge.php?pmrn=$pmrn&eid=$eid&dname=$dname&id=$id&ieid=$ieid&type=$type";

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel_p=mysqli_query($db,"SELECT COUNT(id) FROM prohoscharge WHERE `id`='$id';");
$result_p = mysqli_fetch_assoc($sel_p);
$del_id=$result_p['COUNT(id)'];
if($del_id>0){

$query = "DELETE FROM prohoscharge WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d M Y', $timestamp);



$date=date('Y-m-d');
      $tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$code'");
		$tb_result = mysqli_fetch_assoc($tb_q);
		$tb_data=$tb_result['tb_op'];

		$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$id','DR','$tb_data','$date','$price','OPD PROCEDURE')";
		mysqli_query($con,$ins_query) or die(mysql_error());

		
		$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$id','CR','615100','$date','$price','OPD PROCEDURE')";
		mysqli_query($con,$ins_query2) or die(mysql_error());
    

header("Location:prohoscharge.php?pmrn=$pmrn&eid=$eid&dname=$dname&id=$id&ieid=$ieid&type=$type");

}

?>