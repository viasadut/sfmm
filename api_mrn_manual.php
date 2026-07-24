<?php


session_start();
require('db1.php');


$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);
$id=$_REQUEST['id'];

$query39 = "SELECT * FROM patient_new where ID= '$id'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row= mysqli_fetch_array($result39);

$pname = $row['pname'];
$pmrn = $row['queue'];
$pphone=$row['pphone'];
$page=$row['page'];
$psex=$row['psex'];
$dis=$row['dis'];
$ptype=$row['ptype'];
$ename=$row['ename'];
$ephone=$row['ephone'];

$padd=$row['padd'];
$religion = $row['religion'];



$bdate = $row['bdate'];
$diff1 = $row['page'];

// Convert to desired format
$output_date_string = strtoupper(date("d-M-Y", strtotime($bdate)));

//echo $formatted_date; // Output: 16-JUN-1985

if($row['api_status']=0)

{

$url ='http://192.168.100.254:3038/api/patregent/';

  if($psex=="M"){
	  
	  $g="Mr.";
  }
  if($psex=="F"){
	  
	  $g="Ms.";
  }
  if($psex=="O"){
	  
	  $g="";
  }

//Data Sending To API using CURL Method

$data = array(
  "in_PATIENT_NO_PK"=> null,
  "in_PATIENT_CODE"=> "$id",
  "in_SALUTATION"=> "$g",
  "in_PATIENT_NAME"=> "$pname",
  "in_PHONE_MOBILE"=> "$pphone",
  "in_MOBILE2_alt"=> "",
  "in_EMAIL"=> "",
  "in_DOB"=> "$output_date_string",
  "in_AGE_DD"=> 15,
  "in_AGE_MM"=> 6,
  "in_AGE_YY"=> 34,
  "in_AGE"=> "$diff1",
  "in_GENDER"=> 3002115,
  "in_GENDER_TXT"=> "$psex",
  "in_MARITAL_STATUS"=> 20,
  "in_MARITAL_STATUS_TXT"=> "",
  "in_RELIGION"=> "$religion",
  "in_ADDRESS"=> "$padd",
  "in_ADDRESS1"=> "",
  "in_ADDRESS2"=> "",
  "in_BLOOD_GROUP"=> "",
  "in_PATIENT_TYPE_NO_FK"=> 1,
  "in_REF_PATIENT_NO_FK"=> null,
  "in_REF_PERSON_NO_FK"=> null,
  "in_REF_PERSON_NO_FK_REL"=> null,
  "in_FATHER_NAME"=> "",
  "in_MOTHER_NAME"=> "",
  "in_SPOUSE_NAME"=> "",
  "in_NATIONAL_ID"=> "",
  "in_PRESENT_ADDR"=> "",
  "in_PR_ADDR_THANA"=> "",
  "in_PRESENT_DISTRICT"=> "$dis",
  "in_present_post_code"=> "",
  "in_PR_ADDR_COUNTRY"=> 1, 
  "in_PERMANENT_ADDR"=> "",
  "in_PE_ADDR_THANA"=> "",
  "in_PERMANENT_DISTRICT"=> "",
  "in_permanent_post_code"=> "",
  "in_PE_ADDR_COUNTRY"=> 1,
  "in_EMERGENCY_CONTACT_NAME"=> "$ename",
  "in_EMERGENCY_CONTACT_ADDR"=> "",
  "in_EMERGENCY_CONTACT_RELATION"=> "",
  "in_EMERGENCY_CONTACT_CONTACT"=> "$ephone",
  "in_payer_type_code"=> "",
  "in_OCCUPATION"=> "",
  "in_vip_ind"=> 0,
  "in_vip_narration"=> "",
  "in_last_edit_reason"=> "",
  "in_reg_remarks"=> "Walk-in registration",
  "in_CCM_CLIENT_NO_FK"=> null,
  "in_CCM_CLIENT_NAME"=> null,
  "in_passport_no"=> "",
  "in_PATIENT_PHOTO"=> "",
  "in_au_entry_by"=> 101,
  "in_au_entry_session"=> "SESSION20250708",
  "in_au_entry_hospital_pk_no"=> 141,
  "IN_FALL_RISK"=> 0,
  "IN_N_MASKING"=> 0,
  "IN_H_WITH_CARE"=> 0,
  "IN_GUARDIAN_NAME"=> "",
  "in_nationality"=> 1,
  "in_STATUS"=> 1,
  "in_present_state"=> 10,
  "in_parmamnent_state"=> 20,
  "in_sponsor_no_fk"=> null

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

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

  $patient_no_pk=$decoded_response['patient_no_pk'];
  $patient_code=$decoded_response['patient_code'];
  
  
  if($patient_no_pk!='' and $patient_code!=''){
     
    //header("Location:$url");
     //echo json_encode($data);
     
     $api_query = "update patient_new set api_status='2' where ID='".$last_id."'"; 
  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
   }
  					
  }
   header("Location:mrn_manual_push");

?>