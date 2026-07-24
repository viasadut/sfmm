<?php

$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


require('db1.php');
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
 //db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
$adate1new='0000-00-00 00:00:00';
//$adm_date=date('Y-m-d');
     //patient & bed list
     $count=1;
     foreach(mysqli_query($db,"SELECT * FROM inpatient WHERE disstatus=''") AS $bed_val){
     //variabel
     $bed_id=$bed_val['id'];
     $bed_eid=$bed_val['eid'];
     $bed_dname=$bed_val['dname'];
     echo $count;
     echo "<br />";
     echo $bed_pmrn=$bed_val['pmrn'];
     $bed_pmrn_int=(int)$bed_val['pmrn'];
     echo "<br />";
     $bed_pname=$bed_val['pname'];

     $admission_id= (int)$bed_val['OUT_ADMISSION_NO_PK'];
     //echo "<br />";
     //$bed_type=$bed_val['type'];
     //$bed_no=$bed_val['bno'];
     //$adate=date('d/m/Y H:i:s');
     $adate=$bed_val['adate'];
     $adate1=date('m/d/Y');
    echo $bed_ats=date('Y-m-d H:i:s', strtotime($bed_val['adate']));
    echo "<br />";
     $bed_ate=date('Y-m-d H:i:s');
     $adm_date=$bed_val['anew'];
     $current_date=date('Y-m-d');

     $queryc = "SELECT  MAX(b_charge)FROM newbed where pmrn='$bed_pmrn' and eid='$bed_eid' and status_new!='2'"; 
     $resultc = mysqli_query($con, $queryc) or die(mysqli_error());
     $rowc = mysqli_fetch_array($resultc);


     $querycv = "SELECT * FROM newbed_new where pmrn='$bed_pmrn' and eid='$bed_eid' order by id desc limit 1"; 
     $resultcv = mysqli_query($con, $querycv) or die(mysqli_error());
     $rowcv = mysqli_fetch_array($resultcv);
    
     $bed_ats2=$rowcv['adatenew'];


echo $bed_c=(int)$rowc['MAX(b_charge)'];
echo "<br />";

$queryc5 = "SELECT * FROM newbed where pmrn='$bed_pmrn' and eid='$bed_eid' and status_new!='2' and b_charge='$bed_c'"; 
$resultc5 = mysqli_query($con, $queryc5) or die(mysqli_error());
$rowc5 = mysqli_fetch_array($resultc5);

$bed_type=$rowc5['type'];
     $bed_no=$rowc5['bno'];
     $bed_des=$bed_type.' ('.$bed_no.')';
     //$pmrn=$bed_val['pmrn'];
     //Calculate total stay time in hours also total charge
     $admit_time = strtotime($bed_ats);
     $end_time = strtotime($bed_ate);
     $timediff = $end_time - $admit_time ;
     $timediff2 = $end_time - $admit_time ;
     $jj=round($timediff/3600);


     $admit_time2 = strtotime($bed_ats2);
     $end_time2 = strtotime($bed_ate);
     $timediff2 = $end_time2 - $admit_time2 ;
     $timediff22 = $end_time2 - $admit_time2 ;
     $jj2=round($timediff2/3600);


     $b_charge=(int)$bed_c / 24;

     $half_bed_charge=(int)$bed_c/2;
     //$final_total_charge= round($timediff/(60*60) * $b_charge);    
     //$final_total_stay_hours= round($timediff/(60*60),2);

     //echo "<b>MRN:</b>".$count.') '.$bed_pmrn." <b>Name:</b>".$bed_pname." <b>Bed Type:</b>".$bed_type." <b>Bed NO:</b>".$bed_no." <b>Start Time:</b>".$bed_ats." <b>End Time:</b>".$bed_ate." <b>Bed Charge:</b>".$bed_c." <b>Total Time:</b>".$final_total_stay_hours." <b>Total Charge:</b>".$final_total_charge."<br>";

//mysqli_query($db,"UPDATE newbed SET status_new='2' WHERE pmrn='$bed_pmrn' and eid='$bed_eid' and status_new='0'");

  if($adm_date==$current_date and $jj<=6){
  
  //mysqli_query($db,"INSERT INTO newbed_new (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
  //('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$half_bed_charge')");


$sql = "INSERT INTO newbed_new1 (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
  ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$half_bed_charge')";

   
/*$ins_query1="insert into inhoscharge (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`) values 
('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$p11')";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/
if ($conn->query($sql) === TRUE) {
$last_id = $conn->insert_id;



$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

	$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 2,
  "in_patient_no_fk"=> $bed_pmrn_int,
  "in_patient_code"=> "$bed_pmrn",
  "in_admission_no_pk"=> $admission_id,
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
  "in_customer_name"=> "",
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
  "in_ITEM_NO_FK"=> [5080001],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["$bed_des"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_MU"=>[""],
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> [$half_bed_charge],
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

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 
$invoice_no=$decoded_response['invoice_id'];

 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	$ins_query="UPDATE newbed_new1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
mysqli_query($con,$ins_query) or die(mysql_error());
	 
 }

}


  }

  else if($adm_date==$current_date and $jj>6){
  

$sql = "INSERT INTO newbed_new1 (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
  ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$bed_c')";

   

if ($conn->query($sql) === TRUE) {
$last_id = $conn->insert_id;



$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

	$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 2,
  "in_patient_no_fk"=> $bed_pmrn_int,
  "in_patient_code"=> "$bed_pmrn",
  "in_admission_no_pk"=> $admission_id,
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
  "in_customer_name"=> "",
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
  "in_ITEM_NO_FK"=> [5080001],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["$bed_des"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_MU"=>[""],
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> [$bed_c],
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

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 
$invoice_no=$decoded_response['invoice_id'];

 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	$ins_query="UPDATE newbed_new1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
mysqli_query($con,$ins_query) or die(mysql_error());
	 
 }

}




    }

    else if($adm_date<$current_date and $jj2<=6){
  

  $sql = "INSERT INTO newbed_new1 (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
  ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$half_bed_charge')";

   

if ($conn->query($sql) === TRUE) {
$last_id = $conn->insert_id;



$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

	$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 2,
  "in_patient_no_fk"=> $bed_pmrn_int,
  "in_patient_code"=> "$bed_pmrn",
  "in_admission_no_pk"=> $admission_id,
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
  "in_customer_name"=> "",
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
  "in_ITEM_NO_FK"=> [5080001],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["$bed_des"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_MU"=>[""],
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> [$half_bed_charge],
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

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 
$invoice_no=$decoded_response['invoice_id'];

 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	$ins_query="UPDATE newbed_new1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
mysqli_query($con,$ins_query) or die(mysql_error());
	 
 }

}




}
      

  else if($adm_date<$current_date and $jj2>6){
  
  $sql = "INSERT INTO newbed_new1 (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
  ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$bed_c')";

   

if ($conn->query($sql) === TRUE) {
$last_id = $conn->insert_id;



$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

	$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 2,
  "in_patient_no_fk"=> $bed_pmrn_int,
  "in_patient_code"=> "$bed_pmrn",
  "in_admission_no_pk"=> $admission_id,
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
  "in_customer_name"=> "",
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
  "in_ITEM_NO_FK"=> [5080001],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["$bed_des"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_MU"=>[""],
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> [$bed_c],
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

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 
$invoice_no=$decoded_response['invoice_id'];

 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	$ins_query="UPDATE newbed_new1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
mysqli_query($con,$ins_query) or die(mysql_error());
	 
 }

}

  

}

       $count++;
     }

     //End patient & bed list

?>