<?php


session_start();
require('db1.php');


$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);
$id=$_REQUEST['id'];

$query39 = "SELECT * FROM emergency where id= '$id'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row= mysqli_fetch_array($result39);

$pmrn=$row['pmrn'];
$pmrn_int=(int)$row['pmrn'];
$bed=$row['room1'];
$ward=$row['room'];
$doc=$row['adoc'];
$eid=(int)$row['eid'];
$eid_api=$pmrn.'-'.$eid;

$pname=$row['pname'];
$pphone=$row['pphone'];

$diff1=$row['age'];
$psex=$row['gender'];
$padd=$row['padd'];


$formatted_date=$row['bdate'];
//$formatted_date=$row['bdate'];
$timestamp = strtotime($formatted_date);
echo $output_date_string = date("d M Y", $timestamp);


$query = "SELECT * FROM doctor where dname= '$doc'"; 
$result = mysqli_query($con, $query) or die(mysqli_error());
$row1= mysqli_fetch_array($result);
$doc_code=$row1['dcode'];



$url ='http://192.168.100.254:3038/api/patregent/';


//Data Sending To API using CURL Method

$data = array(
  "in_PATIENT_NO_PK"=> null,
  "in_PATIENT_CODE"=> "$pmrn",
  "in_SALUTATION"=> "Mr.",
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
  "in_MARITAL_STATUS_TXT"=> "Married",
  "in_RELIGION"=> "8",
  "in_ADDRESS"=> "$padd",
  "in_ADDRESS1"=> "House-1",
  "in_ADDRESS2"=> "Road-2",
  "in_BLOOD_GROUP"=> "A+",
  "in_PATIENT_TYPE_NO_FK"=> 1,
  "in_REF_PATIENT_NO_FK"=> null,
  "in_REF_PERSON_NO_FK"=> null,
  "in_REF_PERSON_NO_FK_REL"=> null,
  "in_FATHER_NAME"=> "Mr. Father",
  "in_MOTHER_NAME"=> "Mrs. Mother",
  "in_SPOUSE_NAME"=> "Mrs. Wife",
  "in_NATIONAL_ID"=> "1234567890",
  "in_PRESENT_ADDR"=> "Uttara",
  "in_PR_ADDR_THANA"=> "172",
  "in_PRESENT_DISTRICT"=> "20",
  "in_present_post_code"=> "1230",
  "in_PR_ADDR_COUNTRY"=> 1, 
  "in_PERMANENT_ADDR"=> "Rajshahi",
  "in_PE_ADDR_THANA"=> "Rajshahi Thana",
  "in_PERMANENT_DISTRICT"=> "Rajshahi",
  "in_permanent_post_code"=> "6200",
  "in_PE_ADDR_COUNTRY"=> 1,
  "in_EMERGENCY_CONTACT_NAME"=> "Ali",
  "in_EMERGENCY_CONTACT_ADDR"=> "Barisal",
  "in_EMERGENCY_CONTACT_RELATION"=> "Brother",
  "in_EMERGENCY_CONTACT_CONTACT"=> "01612345678",
  "in_payer_type_code"=> "SELF",
  "in_OCCUPATION"=> "Engineer",
  "in_vip_ind"=> 0,
  "in_vip_narration"=> "",
  "in_last_edit_reason"=> "",
  "in_reg_remarks"=> "Walk-in registration",
  "in_CCM_CLIENT_NO_FK"=> null,
  "in_CCM_CLIENT_NAME"=> null,
  "in_passport_no"=> "BP1234567",
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

echo $response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);



$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 


 if($decoded_response['status']=='success' and $decoded_response['patient_no_pk']!=''){
	 
	 $api_query = "update patient set api_status='1' where pmrn='$pmrn'"; 
$api_result = mysqli_query($con, $api_query) or die(mysqli_error());
 







$url ='http://192.168.100.254:3038/api/ipdadmission/';
$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);


//Data Sending To API using CURL Method

$data = array(
  
  "IN_ADMISSION_NO_PK"=> null,
  "IN_ADMISSION_UID"=> "$eid_api",
  "IN_ADMISSION_DATE"=> "$formattedDate",
  "IN_PRIMARY_DOCTOR_NO_FK"=> "MO001",
  "IN_DUTY_DOC_PERSON_NO_FK"=> null,
  "IN_INITIAL_BED_NO_FK"=> "Yellow Zone-01",
  "IN_CURR_BED_NO_FK"=> "Yellow Zone-01",
  "IN_CURR_WARD_NO_FK"=> "Yellow Zone",
  "IN_REG_TYPE_NO_FK"=> null,
  "IN_SU_NO_FK"=> 38929,
  "IN_PRESCRIPTION_NO_FK"=> null,
  "IN_PRESCRIPTION_UID"=> null,
  "IN_APPOINTMENT_NO_FK"=> null,
  "IN_OPD_DEPARTMENT_SU_NO_FK"=> 38929,
  "IN_OPD_DEPARTMENT_NAME"=> "38929",
  "IN_OPD_DOC_PERSON_NO_FK"=> null,
  "IN_OPD_HOSPITAL_UID"=> null,
  "IN_PATIENT_NO_FK"=> $pmrn,
  "IN_ADM_REMARKS"=> "Admitted for observation",
  "IN_MOTHER_ADMISSION_NO_FK"=> null,
  "IN_REF_DOC_PERSON_NO_FK"=> null,
  "IN_FIRST_REF_DOC_PERSON_NO_FK"=> null,
  "IN_SECOND_REF_DOC_PERSON_NO_FK"=> null,
  "IN_PKG_PATIENT_IND"=> 0,
  "IN_ADMITTED_DEPT"=> 38929,
  "IN_REF_FROM_EMR_IND"=> 1,
  "IN_REF_FROM_OPD_DEPT"=> 0,
  "IN_REF_FROM_EXTERNAL"=> 0,
  "IN_PAT_CONDITION"=> null,
  "IN_ARRIVAL_MODE"=> null,
  "IN_ACCOMPANIED_BY"=> "",
  "IN_CAUSE_OF_ADMISSION"=> "",
  "IN_CONTACT_PERSON"=> "",
  "IN_CONTACT_PERSON_MOBILE"=> "",
  "IN_CONTACT_RELATION"=> "",
  "IN_WARD_NO_FK"=> "Yellow Zone",
  "IN_REMARKS"=> "Observation required",
  "IN_EXTERNAL_HOSPITAL"=> null,
  "IN_STATUS_DETAILS"=> 1,
  "IN_PRESCRIPTION_NO_FK_DTL"=> null,
  "IN_STATUS"=> 1,
  "IN_AU_ENTRY_BY"=> 21,
  "IN_AU_ENTRY_AT"=> "11-Aug-2025",
  "IN_AU_ENTRY_SESSION"=> "SESSION20250811",
  "IN_AU_ENTRY_HOSPITAL_NO_FK"=> 141

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

echo $decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 
$invoice_no=$decoded_response['invoice_no'];
$invoice_id=$decoded_response['invoice_id'];
$adm_id=$decoded_response['OUT_ADMISSION_NO_PK'];
 if($decoded_response['OUT_ADMISSION_NO_PK']!='' and $decoded_response['OUT_ADMISSION_UID']!=''){
	 
	 $update_in="update emergency set api_status='1', OUT_ADMISSION_NO_PK='$adm_id' where `pmrn`='$pmrn' and eid='$eid'";
	mysqli_query($con,$update_in);
 //
 //header("insummary_api");
 header("Location:insummary_api");
 }

}
					



?>