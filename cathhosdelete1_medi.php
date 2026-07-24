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
$id1=$_REQUEST['id1'];
$rfid=$_REQUEST['rfid'];
$price=$_REQUEST['price'];
$pdos=(int)$_REQUEST['pdos'];
$reuse=$_REQUEST['reuse'];
$adate=$_REQUEST['adate'];
$code=$_REQUEST['code'];
$admission_no=(int)$_REQUEST['admission_no'];

$invoice_no=(int)$_REQUEST['invoice_no'];


$sel96="SELECT * FROM medi_stock WHERE `sno`='$rfid';";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']+$pdos;


//$id1=$_REQUEST['ID'];
$url = "cath_medi_use.php?pmrn=$pmrn&eid=$eid&dname=$dname&id=$id1&ieid=$ieid&type=$type";


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel_p=mysqli_query($db,"SELECT COUNT(id) FROM cathmediused WHERE `id`='$id';");
$result_p = mysqli_fetch_assoc($sel_p);
$del_id=$result_p['COUNT(id)'];
if($del_id>0){

if($reuse=='') 
	{ 
$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$rfid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());

$query13="update phar_sale set `status`='Cancel' where `rfid`='$rfid' and pmrn='$pmrn' and eid='$eid' and adate='$adate'";

$result13 = mysqli_query($con,$query13) or die ( mysqli_error());

$query = "DELETE FROM cathmediused WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





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
  values ('$last_id','DR','$tb_data','$date','$price','CATHLAB_MEDI_DEL')";
  mysqli_query($con,$ins_query) or die(mysql_error());
  
  
  $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','111999','$date','$price','CATHLAB_MEDI_DEL')";
  mysqli_query($con,$ins_query2) or die(mysql_error());


$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d M Y', $timestamp);



//$url ='http://192.168.100.254:3038/api/sales_cancellation_item/';


//Data Sending To API using CURL Method

	$data = array(

  "cancel_date"=> $formattedDate,
  "invoice_no_pk"=> $invoice_no,
  "refund_amount"=> 0,
  "refund_reason"=> null,
  "item_no_fk"=> ["$code"],
  "cancel_qty"=> [$pdos],
  "item_count"=> 1,
  "module_no_fk"=> 2,
  "admission_no_fk"=> $admission_no,
  "admission_code"=> "",
  "counter_su_no_fk"=> 38902,
  "au_entry_by"=> 21,
  "au_entry_session"=> "SESSION123",
  "au_entry_hospital_pk_no"=> 141,
  "ledgertrn_no"=> null

);

//initialize the CURL

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
));

//echo $response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 


 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	
	 
 }
header("Location:cath_medi_use.php?pmrn=$pmrn&eid=$eid&dname=$dname&id=$id1&ieid=$ieid&type=$type"); 


    }


    
		else if($reuse!='') 
        { 
    
            $query = "DELETE FROM cathmediused WHERE id=$id"; 
            $result = mysqli_query($con,$query) or die ( mysqli_error());
            header("Location: $url"); 
    
    
    $query13="update phar_sale set `status`='Cancel' where `rfid`='$rfid' and pmrn='$pmrn' and eid='$eid' and adate='$adate'";
    
    $result13 = mysqli_query($con,$query13) or die ( mysqli_error());


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
  values ('$last_id','DR','$tb_data','$date','$price','CATHLAB_MEDI_DEL')";
  mysqli_query($con,$ins_query) or die(mysql_error());
  
  
  $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','111999','$date','$price','CATHLAB_MEDI_DEL')";
  mysqli_query($con,$ins_query2) or die(mysql_error());
    
$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d M Y', $timestamp);



//$url ='http://192.168.100.254:3038/api/sales_cancellation_item/';


//Data Sending To API using CURL Method

	$data = array(

  "cancel_date"=> $formattedDate,
  "invoice_no_pk"=> $invoice_no,
  "refund_amount"=> 0,
  "refund_reason"=> null,
  "item_no_fk"=> ["$code"],
  "cancel_qty"=> [$pdos],
  "item_count"=> 1,
  "module_no_fk"=> 2,
  "admission_no_fk"=> $admission_no,
  "admission_code"=> "",
  "counter_su_no_fk"=> 38902,
  "au_entry_by"=> 21,
  "au_entry_session"=> "SESSION123",
  "au_entry_hospital_pk_no"=> 141,
  "ledgertrn_no"=> null

);

//initialize the CURL

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
));

//echo $response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 


 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	
	 
 }
    
        }

    }
?>