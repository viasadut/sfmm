<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
      header('Location: login2.php?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
require('db1.php');
$billtime = date('d/m/Y H:i:s');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['ID'];
$ct=date('H:i:s');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from pappnew where ID='$id'");
$data = mysqli_fetch_assoc($query4);
$dname2=$data['dname'];
$date224=date('Y-m-d');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query44 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data1 = mysqli_fetch_assoc($query44);






			
		
$pp=(int)$pmrn;
$dd=$data['dname'];

$query_a = "SELECT * FROM doctor where dname= '$dd' and status='Active'"; 
	 
$result_a = mysqli_query($con, $query_a) or die(mysqli_error());

// Print out result
$row_a = mysqli_fetch_array($result_a);
$v1 = (int)$row_a['v1'];
$v2 = $row_a['v2'];
$code = (int)$row_a['code'];
$dcode = $row_a['dcode'];


$query_b = "SELECT * FROM pappnew where dname= '$dd' and pmrn='$pp' and status='SEEN' order by ID DESC limit 1"; 
	 
$result_b = mysqli_query($con, $query_b) or die(mysqli_error());

// Print out result
$row_b = mysqli_fetch_array($result_b);

$l_date=date_create($row_b['adate1']);

$l_date1=$row_b['adate1'];
$t_date1=date('Y-m-d');

$t_date=date_create($t_date1);


//$date1=date_create("2013-03-15");
//$date2=date_create("2013-12-12");
$diff_b=date_diff($l_date,$t_date);
$diff1_b=$diff_b->format("%a");


					
 		
			








$ttr=$data['bdate'];

$te=date('d',strtotime($ttr));
$te1=date('m',strtotime($ttr));
$te2=date('Y',strtotime($ttr));


$date1=date_create("$te-$te1-$te2");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");
 

$formatted_date=date(strtotime($date1,'Y-m-d'));


$output_date_string = date("d M Y", $formatted_date);
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_username"];
$status = "";
if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
$dis =$_REQUEST['dis'];
$dname =$_REQUEST['dname'];
$sid =$_REQUEST['sid'];
//$date = $_REQUEST['date'];
$date11 =$_REQUEST[ 'date1'];
$slot = $_REQUEST['slot'];
//$doc1 = $_REQUEST['doc'];
$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
$bill = $_REQUEST['bill'];
$ptype = $_REQUEST['type'];
$payment = (int)$_REQUEST['payment'];


$sel99="SELECT * FROM patient WHERE `pmrn`='$pmrn';";
$result99 = mysqli_query($con,$sel99);

$sel_bill="SELECT * FROM pappnew WHERE `ID`='$id' and `bill`='BILLED';";
$result_bill = mysqli_query($con,$sel);

//$sel="SELECT * FROM pappnew WHERE `pmrn`='$pmrn' and `dname`='$dname' and adate='$date11' and status!='Cancel';";
//$result = mysqli_query($con,$sel);




if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Time Slot is selected !!"); ';
    echo '</script>';

}

	/*else if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Already Have Appointment with the doctor"); ';
    echo '</script>';
    }
*/

else if($res_bill=mysqli_num_rows($result_bill)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Bill Already Confirmed"); ';
    echo '</script>';
    }

else if($res=mysqli_num_rows($result99)>0)
{
 	
	//$update33="update pappnew set `aslot`='$slot', `bill`='$bill',`billby`='$user',`pmrn`='$pmrn', `pname`='$name', `padd`='$padd',`billtime`='$billtime',`payment`='$payment',`ptype`='$ptype' where `ID`='$id'";
//mysqli_query($con,$update33);

//$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
//mysqli_query($con,$update) or die(mysql_error());

//$update87="update test set status='Booked' where `dname`='$dname' and `ddate`='$date11' and `dslot`='$slot'";
//mysqli_query($con,$update87);


//$update1="update patient set bdate='$date91', dis='$dis', sid='$sid',type='$ptype' where `pmrn`='$pmrn'";
//mysqli_query($con,$update1) or die(mysql_error());






$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> $pp,
  "in_patient_code"=> "$pmrn",
  "in_admission_no_pk"=> null,
  "in_admission_code"=> null,
  "in_appointment_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_doc_person_no_fk"=> "$dcode",
  "in_first_ref_doc_person_no_fk"=> null,
  "in_second_ref_doc_person_no_fk"=> null,
  "in_report_delivary_date"=> "11-JUL-2025",
  "in_report_delivary_datetime"=> "11-JUL-2025",
  "in_counter_su_no_fk"=> 38732,
  "in_cor_client_no_fk"=> null,
  "in_cor_client_card_no_fk"=> null,
  "in_relation_lookup_no_fk"=> null,
  "in_ref_invoice_no_fk"=> "123",
  "in_pat_type"=> "1",
  "in_dob"=> "11-JUL-1980",
  "in_age"=> "35Y",
  "in_age_dd"=> 0,
  "in_age_mm"=> 0,
  "in_age_yy"=> 35,
  "in_customer_addr"=> "Dhaka",
  "in_customer_name"=> "$pname",
  "in_GENDER_TXT"=> "M",
  "in_MARITAL_STATUS_TXT"=> "Married",
  "in_BLOOD_GROUP"=> "O+",
  "in_PHONE_MOBILE"=> "017XXXXXXXX",
  "in_invoice_remarks"=> "Urgent service",
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
  "in_ITEM_NO_FK"=> [$code],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["OPD Consultation"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_MU"=>[""],
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> [$payment],
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

//$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 
$invoice_no=$decoded_response['invoice_no'];
$invoice_id=$decoded_response['invoice_id'];

 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	 
	 //
	 
	 	$url ='http://192.168.100.254:3038/api/billinvoicepayment/';


//Data Sending To API using CURL Method

$data = array(
  
  "in_payment_date"=> "15-JUL-2025",
  "in_payment_datetime"=> "15-JUL-2025",
  "in_invoice_no_fk"=> $invoice_no,
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> $pp,
  "in_admission_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_counter_su_no_fk"=> 20275,
  "in_ledger_amt_sales"=> 0,
  "in_ledger_amt_payment"=> $payment,
  "in_ledger_amt_discount"=> 0,
  "in_urgent_fee"=> 0,
  "in_service_charge"=> 0,
  "in_cor_client_no_fk"=> null,
  "in_pay_mode"=> "CASH",
  "in_pay_cqcc_holder_name"=> "",
  "in_pay_cqcc_number"=> "",
  "in_pay_cqcc_deduct_percent"=> 0,
  "in_pay_bank_name"=> "",
  "in_pay_remarks"=> "Payment collected",
  "in_given_amt"=> $payment,
  "in_disc_type_lookup_no_fk"=> 0,
  "in_disc_remarks"=> "",
  "in_disc_amt_by_doc"=> 0,
  "in_disc_amt_by_doc_no_fk"=> 0,
  "in_disc_amt_by_hosp"=> 0,
  "in_disc_amt_by_hosp_auth_by"=> 0,
  "in_disc_amt_request_by_name"=> "",
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION123",
  "in_au_entry_hospital_pk_no"=> 141,
  "in_item_count"=> 1,
  "in_item_level_disc_ind"=> 0,
  "in_ITEM_NO_FK"=> [$code],
  "in_ITEM_NAME"=> ["OPD CONSULTATION"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_RATE"=> [$payment],
  "in_item_disc_percent"=> [0],
  "in_item_disc_amount"=> [0],
  "in_ITEM_VAT"=> [0],
  "in_ITEMURGENT_FEE"=> [0],
  "in_ITEMSERVICE_CHARGE"=> [0],
  "in_PACKAGE_ITEM_IND"=> [0],
  "in_ledgertrn_no"=> null
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

//$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

	  
	  
	  if($decoded_response['out_ledger_no']!='' and $decoded_response['out_invoice_no']!=''){
	 
	 
	 //
	 
	 	$url ='http://192.168.100.254:3038/api/billinvoicepaymentmode/';


//Data Sending To API using CURL Method

$data = array(
  "in_payment_date"=> "14-JUL-2025",
  "in_invoice_no_fk"=> $decoded_response['out_invoice_no'],
  "in_LEDGER_NO_FK"=> $decoded_response['out_ledger_no'],
  "in_paymood"=> ["CASH", "CARD"],
  "in_pay_mood_type"=> ["FULL", "PARTIAL"],
  "in_bank_name"=> ["", "Bank Asia"],
  "in_transaction_id"=> ["", ""],
  "in_bank_card_no"=> ["", ""],
  "in_acc_holder_name"=> ["", ""],
  "in_payment_amt"=> [$payment, 0],
  "in_paymood_count"=> 2,
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION001",
  "in_au_entry_hospital_pk_no"=> 141
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

//$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

	 
	 //
	 $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$id'"; 
$api_result = mysqli_query($con, $api_query) or die(mysqli_error());
	 
 }
 }


       echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully !!"); ';
    echo '</script>';


    header("Location: bcview.php");
    }	
	
	else{
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`psex`,`bdate`,`dis`,`type`) values ('$name', '$pmrn','$pphone','$padd','$psex','$date91','$dis','$ptype')";
//mysqli_query($con,$ins_query1);

//$update33="update pappnew set `aslot`='$slot', `bill`='$bill',`billby`='$user',`pmrn`='$pmrn', `pname`='$name', `padd`='$padd',`billtime`='$billtime',`payment`='$payment',`ptype`='$ptype' where `ID`='$id'";
//mysqli_query($con,$update33);

//$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
//mysqli_query($con,$update) or die(mysql_error());

//$update87="update test set status='Booked' where `dname`='$dname' and `ddate`='$date11' and `dslot`='$slot'";
//mysqli_query($con,$update87);

$url ='http://192.168.100.254:3038/api/patregent/';


//Data Sending To API using CURL Method

$data = array(
  "in_PATIENT_NO_PK"=> null,
  "in_PATIENT_CODE"=> "$pmrn",
  "in_SALUTATION"=> "Mr.",
  "in_PATIENT_NAME"=> "$name",
  "in_PHONE_MOBILE"=> "$pphone",
  "in_MOBILE2_alt"=> "01812345678",
  "in_EMAIL"=> "john@example.com",
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

//$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 


 if($decoded_response['status']=='success' and $decoded_response['patient_no_pk']!=''){
	 
	 $api_query = "update patient set api_status='1' where pmrn='$pmrn'"; 
$api_result = mysqli_query($con, $api_query) or die(mysqli_error());






$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> $pp,
  "in_patient_code"=> "$pmrn",
  "in_admission_no_pk"=> null,
  "in_admission_code"=> null,
  "in_appointment_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_doc_person_no_fk"=> "$dcode",
  "in_first_ref_doc_person_no_fk"=> null,
  "in_second_ref_doc_person_no_fk"=> null,
  "in_report_delivary_date"=> "11-JUL-2025",
  "in_report_delivary_datetime"=> "11-JUL-2025",
  "in_counter_su_no_fk"=> 38732,
  "in_cor_client_no_fk"=> null,
  "in_cor_client_card_no_fk"=> null,
  "in_relation_lookup_no_fk"=> null,
  "in_ref_invoice_no_fk"=> "123",
  "in_pat_type"=> "1",
  "in_dob"=> "11-JUL-1980",
  "in_age"=> "35Y",
  "in_age_dd"=> 0,
  "in_age_mm"=> 0,
  "in_age_yy"=> 35,
  "in_customer_addr"=> "Dhaka",
  "in_customer_name"=> "$pname",
  "in_GENDER_TXT"=> "M",
  "in_MARITAL_STATUS_TXT"=> "Married",
  "in_BLOOD_GROUP"=> "O+",
  "in_PHONE_MOBILE"=> "017XXXXXXXX",
  "in_invoice_remarks"=> "Urgent service",
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
  "in_ITEM_NO_FK"=> [$code],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["OPD Consultation"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_MU"=>[""],
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> [$payment],
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

//$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 
$invoice_no=$decoded_response['invoice_no'];
$invoice_id=$decoded_response['invoice_id'];

 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	 
	 //
	 
	 	$url ='http://192.168.100.254:3038/api/billinvoicepayment/';


//Data Sending To API using CURL Method

$data = array(
  
  "in_payment_date"=> "15-JUL-2025",
  "in_payment_datetime"=> "15-JUL-2025",
  "in_invoice_no_fk"=> $invoice_no,
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> $pp,
  "in_admission_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_counter_su_no_fk"=> 20275,
  "in_ledger_amt_sales"=> 0,
  "in_ledger_amt_payment"=> $payment,
  "in_ledger_amt_discount"=> 0,
  "in_urgent_fee"=> 0,
  "in_service_charge"=> 0,
  "in_cor_client_no_fk"=> null,
  "in_pay_mode"=> "CASH",
  "in_pay_cqcc_holder_name"=> "",
  "in_pay_cqcc_number"=> "",
  "in_pay_cqcc_deduct_percent"=> 0,
  "in_pay_bank_name"=> "",
  "in_pay_remarks"=> "Payment collected",
  "in_given_amt"=> $payment,
  "in_disc_type_lookup_no_fk"=> 0,
  "in_disc_remarks"=> "",
  "in_disc_amt_by_doc"=> 0,
  "in_disc_amt_by_doc_no_fk"=> 0,
  "in_disc_amt_by_hosp"=> 0,
  "in_disc_amt_by_hosp_auth_by"=> 0,
  "in_disc_amt_request_by_name"=> "",
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION123",
  "in_au_entry_hospital_pk_no"=> 141,
  "in_item_count"=> 1,
  "in_item_level_disc_ind"=> 0,
  "in_ITEM_NO_FK"=> [$code],
  "in_ITEM_NAME"=> ["OPD CONSULTATION"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_RATE"=> [$payment],
  "in_item_disc_percent"=> [0],
  "in_item_disc_amount"=> [0],
  "in_ITEM_VAT"=> [0],
  "in_ITEMURGENT_FEE"=> [0],
  "in_ITEMSERVICE_CHARGE"=> [0],
  "in_PACKAGE_ITEM_IND"=> [0],
  "in_ledgertrn_no"=> null
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

//$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

	  
	  
	  if($decoded_response['out_ledger_no']!='' and $decoded_response['out_invoice_no']!=''){
	 
	 
	 //
	 
	 	$url ='http://192.168.100.254:3038/api/billinvoicepaymentmode/';


//Data Sending To API using CURL Method

$data = array(
  "in_payment_date"=> "14-JUL-2025",
  "in_invoice_no_fk"=> $decoded_response['out_invoice_no'],
  "in_LEDGER_NO_FK"=> $decoded_response['out_ledger_no'],
  "in_paymood"=> ["CASH", "CARD"],
  "in_pay_mood_type"=> ["FULL", "PARTIAL"],
  "in_bank_name"=> ["", "Bank Asia"],
  "in_transaction_id"=> ["", ""],
  "in_bank_card_no"=> ["", ""],
  "in_acc_holder_name"=> ["", ""],
  "in_payment_amt"=> [$payment, 0],
  "in_paymood_count"=> 2,
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION001",
  "in_au_entry_hospital_pk_no"=> 141
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

//$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

	 
	 //
	 $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$id'"; 
$api_result = mysqli_query($con, $api_query) or die(mysqli_error());
	 
 }
 }
 }
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully !!"); ';
    echo '</script>';
  
   // header("Location: bcview.php");
  
  }
}

?>


	  	 	  <?php
$tt1=$pmrn;
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];







?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>APPOINTMENT</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 25%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 0px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 750px;
  }

}

	  #myDIV {
  
  background: red;
  animation: mymove 3s infinite;
}

@keyframes mymove {
  from {background-color: red;}
  to {background-color: lightgreen;}
}

      </style>

 
  
  <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate+1),
			maxDate: new Date(currentYear, currentMonth, currentDate)
		});
	});
</script>
  
  <link rel="stylesheet" href="styles.css">
</head>

<body>
<div id='cssmenu'>
<ul>
   <li><a href='bcview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>

    	    <li class='last'><a href='bgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='bview4'><span>Search previous patients</span></a></li>
      </ul>
	  
   </li>


   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S APPOINTMENT </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
			<label for="age"><strong><SPAN STYLE="font-size:18.0pt">Covid Result:</span> <a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;font-size:18pt;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;font-size:18pt;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;font-size:18pt;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;font-size:18pt;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a></strong></label>
			<br><br><br>
			
			<label for="name"><strong>Doctor's Name :</strong></label>
			<input name="dname" type="text" value="<?php echo $data["dname"]; ?>"required readonly >
		
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input name="date1" id="datepicker" type="text" size=65% value="<?php echo $data["adate"]; ?>" size ="57"required readonly>
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      
	    </p>

									<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="slot"readonly required> <option><?php echo $data["aslot"]; ?></option>
	   
	   	   <?php 
				//$ct=date('H:i:s');
			/*$sql = "select * from opd_appoint1 where dslot>='$ct' and dname='$dname2' and date1='$date224' and status='AVAILABLE' order by dslot asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dslot."'>".$row->dslot."</option>";
				}
			}*/
			?>

	   
      </select>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="65" style="text-transform:uppercase" value="<?php echo $data["pname"]; ?>"required readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="40" style="text-transform:uppercase" value="<?php echo $data["padd"]; ?>"required readonly>
	  <select name="dis" class="style1" placeholder="District" required> 
		
		<option value='<?php echo $data["dis"]; ?>'><?php echo $data["dis"]; ?></option>
		<option value="<?php if(isset($_POST['load'])==1)
{ $dis = $_REQUEST['dis'];
echo $dis;
}
?>"><?php if(isset($_POST['load'])==1)
{ $dis = $_REQUEST['dis'];
echo $dis;
}
?></option>
<option value='Barguna'>Barguna</option>
<option value='Barisal'>Barisal</option> 
<option value='Bhola'>Bhola</option>
<option value='Jhalokati'>Jhalokati</option> 
<option value='Patuakhali'>Patuakhali</option> 
<option value='Pirojpur'>Pirojpur</option> 
<option value='Bandarban'>Bandarban</option> 
<option value='Brahmanbaria'>Brahmanbaria</option> 
<option value='Chandpur'>Chandpur</option> 
<option value='Chittagong'>Chittagong</option> 
<option value='Comilla'>Comilla</option> 
<option value='Coxs Bazar'>Cox's Bazar</option> 
<option value='Feni'>Feni</option> 
<option value='Khagrachhari'>Khagrachhari</option> 
<option value='Lakshmipur'>Lakshmipur</option> 
<option value='Noakhali'>Noakhali</option> 
<option value='Rangamati'>Rangamati</option> 
<option value='Dhaka'>Dhaka</option> 
<option value='Faridpur'>Faridpur</option> 
<option value='Gazipur'>Gazipur</option> 
<option value='Gopalganj'>Gopalganj</option> 
<option value='Kishoreganj'>Kishoreganj</option> 
<option value='Madaripur'>Madaripur</option> 
<option value='Manikganj'>Manikganj</option> 
<option value='Munshiganj'>Munshiganj</option> 
<option value='Narayanganj'>Narayanganj</option> 
<option value='Narsingdi'>Narsingdi</option> 
<option value='Rajbari'>Rajbari</option> 
<option value='Shariatpur'>Shariatpur</option> 
<option value='Tangail'>Tangail</option> 
<option value='Bagerhat'>Bagerhat</option> 
<option value='Chuadanga'>Chuadanga</option> 
<option value='Jessore'>Jessore</option> 
<option value='Jhenaidah'>Jhenaidah</option> 
<option value='Khulna'>Khulna</option> 
<option value='Kushtia'>Kushtia</option> 
<option value='Magura'>Magura</option> 
<option value='Meherpur'>Meherpur</option> 
<option value='Narail'>Narail</option> 
<option value='Satkhira'>Satkhira</option> 
<option value='Jamalpur'>Jamalpur</option> 
<option value='Mymensingh'>Mymensingh</option> 
<option value='Netrokona'>Netrokona</option> 
<option value='Sherpur'>Sherpur</option> 
<option value='Bogra'>Bogra</option> 
<option value='Joypurhat'>Joypurhat</option> 
<option value='Naogaon'>Naogaon</option> 
<option value='Natore'>Natore</option> 
<option value='Chapai Nawabganj'>Chapai Nawabganj</option> 
<option value='Pabna'>Pabna</option> 
<option value='Rajshahi'>Rajshahi</option> 
<option value='Sirajganj'>Sirajganj</option> 
<option value='Dinajpur'>Dinajpur</option> 
<option value='Gaibandha'>Gaibandha</option> 
<option value='Kurigram'>Kurigram</option> 
<option value='Lalmonirhat'>Lalmonirhat</option> 
<option value='Nilphamari'>Nilphamari</option> 
<option value='Panchagarh'>Panchagarh</option> 
<option value='Rangpur'>Rangpur</option> 
<option value='Thakurgaon'>Thakurgaon</option> 
<option value='Habiganj'>Habiganj</option> 
<option value='Moulvibazar'>Moulvibazar</option> 
<option value='Sunamganj'>Sunamganj</option> 
<option value='Sylhet'>Sylhet</option> 

			
				
      </select>

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            <input name="psex" type="text" size="15" value="<?php echo $data["psex"]; ?>"placeholder="Gender"required readonly>
            <input name="pmrn" type="number" size="10" value="<?php if($data["pmrn"]==0){echo '';} else {echo $data["pmrn"];} ?>"placeholder="MRN"required min="100" max="9000000">
      <input name="pphone" type="text" size="10" value="<?php echo $data["pphone"]; ?>"placeholder="Phone"required readonly>	  
	  <input name="page" type="text" size="11"value="<?php echo $data["page"]; ?>"readonly required>
	  
	  
	  
	  <label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te;}  ?>"required readonly>	/

<input name="mm" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te1;} ?>"required readonly> /	

<input name="yy" type="text" maxlength="4" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te2;} ?>"required readonly>		  
	  


	  <br><br> 

	  
	  
	  
	  
<label for="age"><strong>Staff ID(If Staff OR Staff's Dependent) :</strong></label>
      <input name="sid" type="text" size="65" style="text-transform:uppercase" value="<?php echo $data1["sid"]; ?>">	  
	  
	  
	  <br><br> 
	  
	  
	  <label for="age"><strong>Payment:</strong></label>
<input name="payment" type="text" size="10" style="color:red;font-size:50px;font-weight:bold" value="<?php if($l_date1==''){echo $v1;}else if($data['pmrn']==0){echo $v1;} else if($diff1_b<=4 and $data['pmrn']!=0){echo "0";} else if($diff1_b >4 and $data['pmrn']!=0){echo $v1;}?>" readonly>



<label for="age"><strong>Patient's Type :</strong></label>
	  	
            
	  	<select name="type" id="type"class="style1" placeholder="Patient Type"  required> 
		
		
		<option value="<?php echo $data1["type"]; ?>"><?php echo $data1["type"]; ?></option>
			<option value="General">General</option>;
			<option value="Staff">Staff</option>;
			<option value="Staff Spouse">Staff Spouse</option>;
			<option value="Staff Children">Staff Children</option>;
			<option value="Consultant">Consultant</option>;
			<option value="VIP">VIP</option>;
			<option value="Corporate">Corporate</option>;
			
				
      </select>

	  <br><br>  


      
			
			<label for="age"><strong>BILL STATUS:</strong></label>
<select name="bill" value=""> 
			<option value="BILLED">BILLED</option>;


				
      </select>	
	  
  </fieldset>

		<button type="submit" name="Submit" id="submitButton">Confirm</button>
    <script>
					         document.getElementById('submitButton').addEventListener('click', function() {
        this.style.display = 'none'; // Hides the button
        // Optional: Add a message indicating submission is in progress
        // document.getElementById('myForm').innerHTML += '<p>Processing, please wait...</p>';
    });
					 </script>
</form>
  
  

</body>

</html>
