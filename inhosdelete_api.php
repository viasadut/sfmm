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
$code=$_REQUEST['code'];
$admission_no=(int)$_REQUEST['admission_no'];

$invoice_no=(int)$_REQUEST['invoice_no'];
$url = "otchargenurse1nurse.php?pmrn=$pmrn&eid=$eid";
$query = "DELETE FROM inhoscharge WHERE id=$id3"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);



$url ='http://192.168.100.254:3038/api/sales_cancellation_item/';


//Data Sending To API using CURL Method

	$data = array(

  "cancel_date"=> $formattedDate,
  "invoice_no_pk"=> $invoice_no,
  "refund_amount"=> 0,
  "refund_reason"=> null,
  "item_no_fk"=> ["$code"],
  "cancel_qty"=> [1],
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

echo $response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 


 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	
	 
 }

header("Location:otchargenurse1nurse.php?pmrn=$pmrn&eid=$eid");
//header("Location: $url"); 
?>