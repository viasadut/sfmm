<?php


session_start();
require('db1.php');


$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);
$id=$_REQUEST['id'];

$query39 = "SELECT * FROM inpatient where id= '$id'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row= mysqli_fetch_array($result39);

$pmrn=$row['pmrn'];
$pmrn_int=(int)$row['pmrn'];
$bed=$row['room1'];
$ward=$row['room'];
$doc=$row['adoc'];
$eid_api=$pmrn.'-'.$eid;
$eid=(int)$row['eid'];
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








$url ='http://192.168.100.254:3038/api/ipdadmission/';
$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);


//Data Sending To API using CURL Method

$data = array(
  
  "IN_ADMISSION_NO_PK"=> null,
  "IN_ADMISSION_UID"=> "$eid_api",
  "IN_ADMISSION_DATE"=> "$formattedDate",
  "IN_PRIMARY_DOCTOR_NO_FK"=> "$doc_code",
  "IN_DUTY_DOC_PERSON_NO_FK"=> null,
  "IN_INITIAL_BED_NO_FK"=> "$bed",
  "IN_CURR_BED_NO_FK"=> "$bed",
  "IN_CURR_WARD_NO_FK"=> "$ward",
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
  "IN_WARD_NO_FK"=> "$ward",
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
	 
	 $update_in="update inpatient set api_status='1', OUT_ADMISSION_NO_PK='$adm_id' where `pmrn`='$pmrn' and eid='$eid'";
	mysqli_query($con,$update_in);
 //
 //header("insummary_api");

 }
 header("Location:insummary_api");

					



?>