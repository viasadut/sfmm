<?php


session_start();
require('db1.php');



$id=$_REQUEST['id'];

$query39 = "SELECT * FROM prohoscharge where id= '$id'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row= mysqli_fetch_array($result39);

$pmrn=$row['pmrn'];
$pmrn_int=(int)$row['pmrn'];


$eid=(int)$row['ieid'];
$pname=$row['pname'];
$pphone=$row['pphone'];

$acode=(int)$row['code'];
$aprice=(int)$row['uprice'];
$medi=$row['medi'].'- OPRO';

$api_status=$row['api_status'];

$pdos=(int)$row['pdos'];
$t_price=(int)$row['price'];
$u_price=(int)$t_price/$pdos;




$query39a = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='' and eid='$eid'"; 
$result39a = mysqli_query($con, $query39a) or die(mysqli_error());
$rowa= mysqli_fetch_array($result39a);
$doc=$rowa['dname'];
$api_adminssion_no=$rowa['OUT_ADMISSION_NO_PK'];

$query = "SELECT * FROM doctor where dname= '$doc'"; 
$result = mysqli_query($con, $query) or die(mysqli_error());
$row1= mysqli_fetch_array($result);
$doc_code=$row1['dcode'];


if($api_status==0){
$url ='http://192.168.100.254:3038/api/billinvoice/';

$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d M Y', $timestamp);




$data = array(
    "in_invoice_date"=> $formattedDate,
    "in_invoice_datetime"=> $formattedDate,
    "in_module_no_fk"=> 2,
    "in_patient_no_fk"=> $pmrn_int,
    "in_patient_code"=> "$pmrn",
    "in_admission_no_pk"=> $api_adminssion_no,
    "in_admission_code"=> null,
    "in_appointment_no_fk"=> null,
    "in_prescription_no_fk"=> null,
    "in_doc_person_no_fk"=> 5001,
    "in_first_ref_doc_person_no_fk"=> null,
    "in_second_ref_doc_person_no_fk"=> null,
    "in_report_delivary_date"=> "11-JUL-2025",
    "in_report_delivary_datetime"=> "11-JUL-2025",
    "in_counter_su_no_fk"=> 38732,
    "in_cor_client_no_fk"=> null,
    "in_cor_client_card_no_fk"=> null,
    "in_relation_lookup_no_fk"=> null,
    "in_ref_invoice_no_fk"=> "",
    "in_pat_type"=> "1",
    "in_dob"=> "11-JUL-1980",
    "in_age"=> "35Y",
    "in_age_dd"=> 0,
    "in_age_mm"=> 0,
    "in_age_yy"=> 35,
    "in_customer_addr"=> "Dhaka",
    "in_customer_name"=> "Steven",
    "in_GENDER_TXT"=> "M",
    "in_MARITAL_STATUS_TXT"=> "Married",
    "in_BLOOD_GROUP"=> "O+",
    "in_PHONE_MOBILE"=> "017XXXXXXXX",
    "in_invoice_remarks"=> "Inpatient Hospital Charge",
    "in_urgent_fee_total"=> 0.0,
    "in_invoice_type"=> "SYS",
    "in_emergency_ind"=> 0,
    "in_daycare_ind"=> 0,
    "in_ot_ind"=> 0,
    "in_au_entry_by"=> 1,
    "in_au_entry_session"=> "SESSION123",
    "in_au_entry_hospital_pk_no"=> 141,
    "in_item_level_disc_ind"=> 0,
    "in_ledgertrn_no"=> null,
    "in_item_count"=>1,
    "in_ITEM_NO_FK"=> [$acode],
    "IN_ITEM_BATCH_FK"=>[""],
    "IN_ITEM_EXPIRY_DT"=>[""],
    "in_ITEM_NAME"=> ["$medi"],
    "in_ITEMTYPE_NO_FK"=> [1],
    "in_ITEM_QTY"=> [$pdos],
    "in_ITEM_MU"=>[""],
    //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
    "in_ITEM_RATE"=> [$u_price],
    "in_item_disc_percent"=> [0],
    "in_item_disc_amount"=> [0],
    "in_ITEM_VAT"=> [0],
    "in_URGENT_FEE"=> [0],
    "in_SERVICE_CHARGE"=> [0],
    "in_REPORT_DELIVERY_DATE"=> ["30-07-2025"],
    "in_REPORT_DELIVERY_TIME"=> ["30-07-2025"],
    "in_DELIVERY_STATUS_LOOKUP_NO_FK"=> [1],
    "in_PACKAGE_ITEM_IND"=> [0],
    "in_item_level_remarks"=> [""],
    "in_provider_no_fk"=> [0]
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
  
echo json_encode($data);
  
  $decoded_response = json_decode($response, true); // Decode the JSON response
  
  //Setting Other Logic after receving the decoded response 
  $invoice_no=$decoded_response['invoice_id'];
  
   if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
     
    $api_query = "update prohoscharge set api_status='1', invoice_no='$invoice_no' where id='".$id."'"; 
  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
     
     
   }
 

   header("Location:inpatient_api?pmrn=$pmrn&eid=$eid");
 }


					



?>