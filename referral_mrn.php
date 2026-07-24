<?php 
    session_start();
	include_once 'dbconfig.php';
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','call','bill','mng','staff','billin')"; 
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
$billtime = date('d/m/Y H:i:s');
$aatime=date('d/m/Y H:i:s'); 

$ct=date('H:i:s');
$pmrn=$_REQUEST['pmrn'];
$app_id=$_REQUEST['ID'];



$queryc = "SELECT * FROM pappnew where ID='$app_id' and bill=''"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);



$query = mysqli_query($con, "SELECT * FROM patient WHERE ID='$pmrn'");

	$row5 = mysqli_fetch_array($query);

	$dd=date('d', strtotime($row5['bdate']));
	$mm=date('m', strtotime($row5['bdate']));
	$yy=date('Y', strtotime($row5['bdate']));
	
	//echo $row5['bdate'];
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_username"];
$status = "";
if(isset($_POST['Submit']))
{
	
	
$user1='root';
$pass='Godiloveu16';
$db= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	
$vehicle1 =$_REQUEST['vehicle1'];
$due_remarks =$_REQUEST['due_remarks'];
$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn3'];
$app_pmrn=(int)$_REQUEST['pmrn3'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
$dname25 =$_REQUEST['doc'];
//$date = $_REQUEST['date'];
$date22=$_REQUEST['daten'];
$date23=date('m/d/Y', strtotime($date22));
//$date23=$_REQUEST['daten'];
$date10 =$_REQUEST[ 'date10'];
$adate1=date('Y-m-d',strtotime($date22)); 
$slot = $_REQUEST['slot'];
$dname2 = $_REQUEST['dname3'];
$pphone= $_REQUEST['pphone'];
$payment= $_REQUEST['payment']-100;
$payment1= (int)$_REQUEST['payment'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
//$bill = $_REQUEST['bill'];
//$hdlate = $_REQUEST['hdlate'];
//$yage = $_REQUEST['yage'];

$appdate=date('Y-m-d');
$apptime=date('Y-m-d H:i:s');

$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];


$dis = $_REQUEST['dis'];
$ptype = $_REQUEST['type3'];
//$fdate='$dd-$mm-$yy';


$date1=date_create("$dd-$mm-$yy");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");



$strSQL1 = "select DISTINCT MAX(s_no) from pms_bill where date='$appdate'";
			$objQuery1 = mysqli_query($con,$strSQL1);
			$obj = mysqli_fetch_array($objQuery1);
			$mno=$obj['MAX(s_no)']+1;
			$mno1=$obj['MAX(s_no)'];
			$billno=date('ymd').$mno;

			
			$user1='root';
$pass='Godiloveu16';
$db= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Appointment Slot Selected!!"); ';
    echo '</script>';

    }




	




	
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
else if($mno>$mno1)
{

	
	



  $r_s='Confirmed By Consultant';
  $r_d=date('d/m/Y H:i:s');
  $nmrn='NEW MRN';
  $particulars='OPD Consultation';
  $particulars1='NEW MRN';
  $status='Booked';
  $opd='OPD';		
  $regi='100';
  $notseen='NOT SEEN';
  $ccgg1new_test1='ccgg1new_test1';
$billed='BILLED';



$taka=$_REQUEST['taka'];
$taka1=(int)$_REQUEST['taka'];
$dis_taka=$_REQUEST['dis_taka'];
$percentage=$_REQUEST['percentage'];
$percentage1=(int)$_REQUEST['percentage'];
$dis_percentage=$_REQUEST['dis_percentage'];
$discount_type=$_REQUEST['discount_type'];
$gtotal=$_REQUEST['gtotal'];
$discount_taka=$gtotal-$dis_taka;
$discount_percentage=$payment-$dis_percentage;
$b_remarks=$_REQUEST['remarks']; 
$servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";
$ff='';
$regi=100;
$male='M';
$dis2='Dhaka';
// Create connection
$conn = new mysqli($servername, $username1, $password1, $dbname1);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  if($discount_type=='' and $payment>0 and $user!='' and $vehicle1=='Cash'){
  $sql = "insert into pms_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,b_remarks) VALUES
('$pmrn','$opd','$payment1','$appdate','$apptime','$user','$particulars','$dname2','$mno','$vehicle1','$due_remarks','$b_remarks')";
  
  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;


  
  try {
    $db->beginTransaction();

	
		
    $sh = $db->prepare("insert into opd_bill (pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,billno) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$pmrn, $opd, $payment1, $appdate, $apptime, $user, $particulars, $dname2, $mno, $vehicle1, $last_id]);

	
	
	$sh = $db->prepare("UPDATE pappnew SET pmrn=?, payment=?, bill=?, billby=?, billtime=?, billno=?  WHERE ID=?");
    $sh->execute([$pmrn, $payment1, $billed, $user, $billtime, $last_id, $app_id]);

	
	/*$sh = $db->prepare("insert into pappnew(pname,pmrn,pphone,padd,dname,adate,aslot,status,page,psex,user,yage,
	bdate,dis,aatime,adate1,ptype,page1,payment,bill,billby,billtime,billno) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$name, $pmrn, $pphone, $padd, $dname2, $date23, $slot, $notseen, $diff1, $psex, $user, $diff2, $date91, 
	$dis, $aatime, $adate1, $ptype, $ccgg1new_test1, $payment, $billed, $user, $billtime, $last_id]);
*/
	
if ($db->commit()) {
	
	
	$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> $app_pmrn,
  "in_patient_code"=> "$pmrn",
  "in_admission_no_pk"=> null,
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
  "in_ref_invoice_no_fk"=> "$last_id",
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
  "in_ITEM_NO_FK"=> [6004010],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["OPD Consultation"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_MU"=>[""],
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> [$payment1],
  "in_item_disc_percent"=> [0],
  "in_item_disc_amount"=> [$taka1],
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
  "in_patient_no_fk"=> $app_pmrn,
  "in_admission_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_counter_su_no_fk"=> 20275,
  "in_ledger_amt_sales"=> 0,
  "in_ledger_amt_payment"=> $payment1,
  "in_ledger_amt_discount"=> $taka1,
  "in_urgent_fee"=> 0,
  "in_service_charge"=> 0,
  "in_cor_client_no_fk"=> null,
  "in_pay_mode"=> "CASH",
  "in_pay_cqcc_holder_name"=> "",
  "in_pay_cqcc_number"=> "",
  "in_pay_cqcc_deduct_percent"=> 0,
  "in_pay_bank_name"=> "",
  "in_pay_remarks"=> "Payment collected",
  "in_given_amt"=> $payment1,
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
  "in_ITEM_NO_FK"=> [6004010],
  "in_ITEM_NAME"=> ["OPD CONSULTATION"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_RATE"=> [$payment1],
  "in_item_disc_percent"=> [0],
  "in_item_disc_amount"=> [$taka1],
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

echo $response = curl_exec($ch);


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
  "in_payment_amt"=> [$payment1, 0],
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

echo $response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

	 
	 //
	 $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$app_id'"; 
$api_result = mysqli_query($con, $api_query) or die(mysqli_error());
	 
 }
 }

        } 
	
  
	
	
	//header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
//header("Location:$url");
header("Location: bcview.php");
	
} catch ( Exception $e ) {
    $db->rollBack();
	
	$sql3 = "UPDATE pms_bill set bill_status='Falied Due to Network Issue' where billno='$last_id'";
$conn->query($sql3);

}

  

  
  /*$sql1 = "insert into opd_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES
('$pmrn','$opd','$payment','$appdate','$apptime','$user','$particulars','$dname2','$mno','$vehicle1','$due_remarks','$last_id','$b_remarks')";

$conn->query($sql1);
  
$sql3 = "UPDATE opd_appoint1 set status='$status' where dname='$dname2' and date1='$date22' and dslot='$slot'";
$conn->query($sql3);
  
$sql2 = "insert into pappnew(pname,pmrn,pphone,padd,dname,adate,aslot,status,page,psex,user,yage,bdate,dis,aatime,adate1,ptype,page1,payment,bill,billby,billtime,billno) VALUES
('$name', '$pmrn','$pphone','$padd','$dname2','$date23','$slot','$notseen','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','$ptype','$ccgg1new_test1','$payment','$billed','$user','$billtime','$last_id')";
$conn->query($sql2);

header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
*/

}
			
 else {
	 
     echo '<script language="javascript">';
    echo 'alert("Network Error!!"); ';
    echo '</script>';
	 
//  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	

  

}





  else if($discount_type=='' and $payment>0 and $user!='' and $vehicle1!='Cash'){
  $sql = "insert into pms_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,b_remarks) VALUES
('$pmrn','$opd','$payment1','$appdate','$apptime','$user','$particulars','$dname2','$mno','$vehicle1','$due_remarks','$b_remarks')";
  
  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;


  
  try {
    $db->beginTransaction();
	
	
    $sh = $db->prepare("insert into opd_bill (pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$pmrn, $opd, $payment1, $appdate, $apptime, $user, $particulars, $dname2, $mno, $vehicle1, $due_remarks, $last_id, $b_remarks]);

    $sh = $db->prepare("UPDATE opd_appoint1 SET status=? WHERE dname=? and date1=? and dslot=?");
    $sh->execute([$status, $dname2, $date22, $slot]);

	
	$sh = $db->prepare("UPDATE pappnew SET pmrn=?, payment=?, bill=?, billby=?, billtime=?, billno=?  WHERE ID=?");
    $sh->execute([$pmrn, $payment1, $billed, $user, $billtime, $last_id, $app_id]);

	
	
	
    if ($db->commit()) {
	
	
      $url ='http://192.168.100.254:3038/api/billinvoice/';
    
    
    //Data Sending To API using CURL Method
    
    $data = array(
      "in_invoice_date"=> "30-JUL-2025",
      "in_invoice_datetime"=> "30-JUL-2025",
      "in_module_no_fk"=> 12,
      "in_patient_no_fk"=> $app_pmrn,
      "in_patient_code"=> "$pmrn",
      "in_admission_no_pk"=> null,
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
      "in_ref_invoice_no_fk"=> "$last_id",
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
      "in_ITEM_NO_FK"=> [6004010],
      "IN_ITEM_BATCH_FK"=>[""],
      "IN_ITEM_EXPIRY_DT"=>[""],
      "in_ITEM_NAME"=> ["OPD Consultation"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_MU"=>[""],
      //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
      "in_patient_no_fk"=> $app_pmrn,
      "in_admission_no_fk"=> null,
      "in_prescription_no_fk"=> null,
      "in_counter_su_no_fk"=> 20275,
      "in_ledger_amt_sales"=> 0,
      "in_ledger_amt_payment"=> $payment1,
      "in_ledger_amt_discount"=> $taka1,
      "in_urgent_fee"=> 0,
      "in_service_charge"=> 0,
      "in_cor_client_no_fk"=> null,
      "in_pay_mode"=> "CASH",
      "in_pay_cqcc_holder_name"=> "",
      "in_pay_cqcc_number"=> "",
      "in_pay_cqcc_deduct_percent"=> 0,
      "in_pay_bank_name"=> "",
      "in_pay_remarks"=> "Payment collected",
      "in_given_amt"=> $payment1,
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
      "in_ITEM_NO_FK"=> [6004010],
      "in_ITEM_NAME"=> ["OPD CONSULTATION"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
    
    echo $response = curl_exec($ch);
    
    
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
      "in_payment_amt"=> [$payment1, 0],
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
    
    echo $response = curl_exec($ch);
    
    
    if(curl_errno($ch)){
        echo 'Curl error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    //echo json_encode($data);
    
    $decoded_response = json_decode($response, true); // Decode the JSON response
    
       
       //
       $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$app_id'"; 
    $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
       
     }
     }
    
            } 
      
      
      
      
      //header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
    //header("Location:$url");
    header("Location: bcview.php");
      
    } catch ( Exception $e ) {
    $db->rollBack();
	
	$sql3 = "UPDATE pms_bill set bill_status='Falied Due to Network Issue' where billno='$last_id'";
$conn->query($sql3);

}

  

  
  /*$sql1 = "insert into opd_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES
('$pmrn','$opd','$payment','$appdate','$apptime','$user','$particulars','$dname2','$mno','$vehicle1','$due_remarks','$last_id','$b_remarks')";

$conn->query($sql1);
  
$sql3 = "UPDATE opd_appoint1 set status='$status' where dname='$dname2' and date1='$date22' and dslot='$slot'";
$conn->query($sql3);
  
$sql2 = "insert into pappnew(pname,pmrn,pphone,padd,dname,adate,aslot,status,page,psex,user,yage,bdate,dis,aatime,adate1,ptype,page1,payment,bill,billby,billtime,billno) VALUES
('$name', '$pmrn','$pphone','$padd','$dname2','$date23','$slot','$notseen','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','$ptype','$ccgg1new_test1','$payment','$billed','$user','$billtime','$last_id')";
$conn->query($sql2);

header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
*/

}
			
 else {
	 
	 
  //echo "Error: " . $sql . "<br>" . $conn->error;
  
       echo '<script language="javascript">';
    echo 'alert("Network Error!!"); ';
    echo '</script>';

}

$conn->close();
	

  

}



  else if($discount_type=='taka' and $taka>0 and $payment>0 and $user!='' and $vehicle1!='Cash'){

//else if($discount_type=='taka' and $taka >0 and $payment>0){
$sql = "insert into pms_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,dis_amount,b_remarks) VALUES
('$pmrn', '$opd', '$dis_taka', '$appdate', '$apptime', '$user', '$particulars','$dname2','$mno', '$vehicle1', '$due_remarks','$taka','$b_remarks')";

  
  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;


  
  
  
  try {
    $db->beginTransaction();
	
	
	

    $sh = $db->prepare("insert into opd_bill (pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$pmrn, $opd, $dis_taka, $appdate, $apptime, $user, $particulars, $dname2, $mno, $vehicle1, $due_remarks, $last_id, $b_remarks]);

    $sh = $db->prepare("UPDATE opd_appoint1 SET status=? WHERE dname=? and date1=? and dslot=?");
    $sh->execute([$status, $dname2, $date22, $slot]);

	
	$sh = $db->prepare("UPDATE pappnew SET pmrn=?, payment=?, bill=?, billby=?, billtime=?, billno=?, dis=?  WHERE ID=?");
    $sh->execute([$pmrn, $dis_taka, $billed, $user, $billtime, $last_id, $dis, $app_id]);

	
	
    if ($db->commit()) {
	
	
      $url ='http://192.168.100.254:3038/api/billinvoice/';
    
    
    //Data Sending To API using CURL Method
    
    $data = array(
      "in_invoice_date"=> "30-JUL-2025",
      "in_invoice_datetime"=> "30-JUL-2025",
      "in_module_no_fk"=> 12,
      "in_patient_no_fk"=> $app_pmrn,
      "in_patient_code"=> "$pmrn",
      "in_admission_no_pk"=> null,
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
      "in_ref_invoice_no_fk"=> "$last_id",
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
      "in_ITEM_NO_FK"=> [6004010],
      "IN_ITEM_BATCH_FK"=>[""],
      "IN_ITEM_EXPIRY_DT"=>[""],
      "in_ITEM_NAME"=> ["OPD Consultation"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_MU"=>[""],
      //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
      "in_patient_no_fk"=> $app_pmrn,
      "in_admission_no_fk"=> null,
      "in_prescription_no_fk"=> null,
      "in_counter_su_no_fk"=> 20275,
      "in_ledger_amt_sales"=> 0,
      "in_ledger_amt_payment"=> $payment1,
      "in_ledger_amt_discount"=> $taka1,
      "in_urgent_fee"=> 0,
      "in_service_charge"=> 0,
      "in_cor_client_no_fk"=> null,
      "in_pay_mode"=> "CASH",
      "in_pay_cqcc_holder_name"=> "",
      "in_pay_cqcc_number"=> "",
      "in_pay_cqcc_deduct_percent"=> 0,
      "in_pay_bank_name"=> "",
      "in_pay_remarks"=> "Payment collected",
      "in_given_amt"=> $payment1,
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
      "in_ITEM_NO_FK"=> [6004010],
      "in_ITEM_NAME"=> ["OPD CONSULTATION"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
    
    echo $response = curl_exec($ch);
    
    
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
      "in_payment_amt"=> [$payment1, 0],
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
    
    echo $response = curl_exec($ch);
    
    
    if(curl_errno($ch)){
        echo 'Curl error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    //echo json_encode($data);
    
    $decoded_response = json_decode($response, true); // Decode the JSON response
    
       
       //
       $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$app_id'"; 
    $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
       
     }
     }
    
            } 
      
      
      
      
      //header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
    //header("Location:$url");
    header("Location: bcview.php");
      
    } catch ( Exception $e ) {
    $db->rollBack();
	
	$sql3 = "UPDATE pms_bill set bill_status='Falied Due to Network Issue' where billno='$last_id'";
$conn->query($sql3);

}

  
  
  
  
  
/* $sql1 = "insert into opd_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES
('$pmrn','$opd','$dis_taka','$appdate','$apptime','$user','$particulars','$dname2','$mno','$vehicle1','$due_remarks','$last_id','$b_remarks')";

$conn->query($sql1);
  
$sql3 = "UPDATE opd_appoint1 set status='$status' where dname='$dname2' and date1='$date22' and dslot='$slot'";
$conn->query($sql3);
  
$sql2 = "insert into pappnew(pname,pmrn,pphone,padd,dname,adate,aslot,status,page,psex,user,yage,bdate,dis,aatime,adate1,ptype,page1,payment,bill,billby,billtime,billno) VALUES
('$name', '$pmrn','$pphone','$padd','$dname2','$date23','$slot','$notseen','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','$ptype','$ccgg1new_test1','$dis_taka','$billed','$user','$billtime','$last_id')";
$conn->query($sql2);

header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
*/

}
			
 else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
       echo '<script language="javascript">';
    echo 'alert("Network Error!!"); ';
    echo '</script>';

}

$conn->close();
	

  

}


else if($discount_type=='taka' and $taka>0 and $payment>0 and $user!='' and $vehicle1=='Cash'){

//else if($discount_type=='taka' and $taka >0 and $payment>0){
$sql = "insert into pms_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,dis_amount,b_remarks) VALUES
('$pmrn', '$opd', '$dis_taka', '$appdate', '$apptime', '$user', '$particulars','$dname2','$mno', '$vehicle1', '$due_remarks','$taka','$b_remarks')";

  
  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;


  
  
  
  try {
    $db->beginTransaction();
	
	
	    $sh = $db->prepare("insert into opd_bill (pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,billno,b_remarks) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$pmrn, $opd, $dis_taka, $appdate, $apptime, $user, $particulars, $dname2, $mno, $vehicle1,$last_id, $b_remarks]);

    $sh = $db->prepare("UPDATE opd_appoint1 SET status=? WHERE dname=? and date1=? and dslot=?");
    $sh->execute([$status, $dname2, $date22, $slot]);

	
	$sh = $db->prepare("UPDATE pappnew SET pmrn=?, payment=?, bill=?, billby=?, billtime=?, billno=?, dis=?  WHERE ID=?");
    $sh->execute([$pmrn, $dis_taka, $billed, $user, $billtime, $last_id, $dis, $app_id]);

	
	
	
    //$db->commit();
	  if ($db->commit()) {
	
	
	$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> $app_pmrn,
  "in_patient_code"=> "$pmrn",
  "in_admission_no_pk"=> null,
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
  "in_ref_invoice_no_fk"=> "$last_id",
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
  "in_ITEM_NO_FK"=> [6004010],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["OPD Consultation"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_MU"=>[""],
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> [$payment1],
  "in_item_disc_percent"=> [0],
  "in_item_disc_amount"=> [$taka1],
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
  "in_patient_no_fk"=> $app_pmrn,
  "in_admission_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_counter_su_no_fk"=> 20275,
  "in_ledger_amt_sales"=> 0,
  "in_ledger_amt_payment"=> $payment1,
  "in_ledger_amt_discount"=> $taka1,
  "in_urgent_fee"=> 0,
  "in_service_charge"=> 0,
  "in_cor_client_no_fk"=> null,
  "in_pay_mode"=> "CASH",
  "in_pay_cqcc_holder_name"=> "",
  "in_pay_cqcc_number"=> "",
  "in_pay_cqcc_deduct_percent"=> 0,
  "in_pay_bank_name"=> "",
  "in_pay_remarks"=> "Payment collected",
  "in_given_amt"=> $payment1,
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
  "in_ITEM_NO_FK"=> [6004010],
  "in_ITEM_NAME"=> ["OPD CONSULTATION"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [1],
  "in_ITEM_RATE"=> [$payment1],
  "in_item_disc_percent"=> [0],
  "in_item_disc_amount"=> [$taka1],
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

echo $response = curl_exec($ch);


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
  "in_payment_amt"=> [$payment1, 0],
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

echo $response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

	 
	 //
	 $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$app_id'"; 
$api_result = mysqli_query($con, $api_query) or die(mysqli_error());
	 
 }
 }

        } 
	
  
	
	
	header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
//header("Location:$url");

	
} catch ( Exception $e ) {
    $db->rollBack();
	
	$sql3 = "UPDATE pms_bill set bill_status='Falied Due to Network Issue' where billno='$last_id'";
$conn->query($sql3);

}

  
  
  
  
  
/* $sql1 = "insert into opd_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES
('$pmrn','$opd','$dis_taka','$appdate','$apptime','$user','$particulars','$dname2','$mno','$vehicle1','$due_remarks','$last_id','$b_remarks')";

$conn->query($sql1);
  
$sql3 = "UPDATE opd_appoint1 set status='$status' where dname='$dname2' and date1='$date22' and dslot='$slot'";
$conn->query($sql3);
  
$sql2 = "insert into pappnew(pname,pmrn,pphone,padd,dname,adate,aslot,status,page,psex,user,yage,bdate,dis,aatime,adate1,ptype,page1,payment,bill,billby,billtime,billno) VALUES
('$name', '$pmrn','$pphone','$padd','$dname2','$date23','$slot','$notseen','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','$ptype','$ccgg1new_test1','$dis_taka','$billed','$user','$billtime','$last_id')";
$conn->query($sql2);

header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
*/

}
			
 else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
       echo '<script language="javascript">';
    echo 'alert("Network Error!!"); ';
    echo '</script>';

}

$conn->close();
	

  

}
  
  else if($discount_type=='taka' and $taka<=0 and $payment>0 and $user!=''){
  //else if($discount_type=='taka' and $taka<=0 and $payment>0){
	
	  echo '<script language="javascript">';
    echo 'alert("Discount Amount(Taka) Cannot be Zero!!"); ';
    echo '</script>';
	
	$conn->close();
}



  else if($discount_type=='percentage' and $percentage>0 and $payment>0 and $user!='' and $vehicle1!='Cash'){

//else if($discount_type=='percentage' and $percentage>0 and $payment>0){
$sql = "insert into pms_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,dis_amount,b_remarks) VALUES
('$pmrn', '$opd', '$dis_percentage', '$appdate', '$apptime', '$user', '$particulars','$dname2','$mno', '$vehicle1', '$due_remarks','$percentage','$b_remarks')";

  
  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;




  
  try {
    $db->beginTransaction();

	
	$sh = $db->prepare("insert into opd_bill (pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,billno) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$pmrn, $opd, $regi, $appdate, $apptime, $user, $particulars1, $ff, $mno, $vehicle1, $last_id]);

	
    $sh = $db->prepare("insert into opd_bill (pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$pmrn, $opd, $dis_percentage, $appdate, $apptime, $user, $particulars, $dname2, $mno, $vehicle1, $due_remarks, $last_id, $b_remarks]);

    $sh = $db->prepare("UPDATE opd_appoint1 SET status=? WHERE dname=? and date1=? and dslot=?");
    $sh->execute([$status, $dname2, $date22, $slot]);

	
	$sh = $db->prepare("UPDATE pappnew SET pmrn=?, payment=?, bill=?, billby=?, billtime=?, billno=?, dis=?  WHERE ID=?");
    $sh->execute([$pmrn, $dis_percentage, $billed, $user, $billtime, $last_id, $dis, $app_id]);

	
	
    if ($db->commit()) {
	
	
      $url ='http://192.168.100.254:3038/api/billinvoice/';
    
    
    //Data Sending To API using CURL Method
    
    $data = array(
      "in_invoice_date"=> "30-JUL-2025",
      "in_invoice_datetime"=> "30-JUL-2025",
      "in_module_no_fk"=> 12,
      "in_patient_no_fk"=> $app_pmrn,
      "in_patient_code"=> "$pmrn",
      "in_admission_no_pk"=> null,
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
      "in_ref_invoice_no_fk"=> "$last_id",
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
      "in_ITEM_NO_FK"=> [6004010],
      "IN_ITEM_BATCH_FK"=>[""],
      "IN_ITEM_EXPIRY_DT"=>[""],
      "in_ITEM_NAME"=> ["OPD Consultation"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_MU"=>[""],
      //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
      "in_patient_no_fk"=> $app_pmrn,
      "in_admission_no_fk"=> null,
      "in_prescription_no_fk"=> null,
      "in_counter_su_no_fk"=> 20275,
      "in_ledger_amt_sales"=> 0,
      "in_ledger_amt_payment"=> $payment1,
      "in_ledger_amt_discount"=> $taka1,
      "in_urgent_fee"=> 0,
      "in_service_charge"=> 0,
      "in_cor_client_no_fk"=> null,
      "in_pay_mode"=> "CASH",
      "in_pay_cqcc_holder_name"=> "",
      "in_pay_cqcc_number"=> "",
      "in_pay_cqcc_deduct_percent"=> 0,
      "in_pay_bank_name"=> "",
      "in_pay_remarks"=> "Payment collected",
      "in_given_amt"=> $payment1,
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
      "in_ITEM_NO_FK"=> [6004010],
      "in_ITEM_NAME"=> ["OPD CONSULTATION"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
    
    echo $response = curl_exec($ch);
    
    
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
      "in_payment_amt"=> [$payment1, 0],
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
    
    echo $response = curl_exec($ch);
    
    
    if(curl_errno($ch)){
        echo 'Curl error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    //echo json_encode($data);
    
    $decoded_response = json_decode($response, true); // Decode the JSON response
    
       
       //
       $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$app_id'"; 
    $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
       
     }
     }
    
            } 
      
      
      
      
      //header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
    //header("Location:$url");
    header("Location: bcview.php");
      
    } catch ( Exception $e ) {
    $db->rollBack();
	
	$sql3 = "UPDATE pms_bill set bill_status='Falied Due to Network Issue' where billno='$last_id'";
$conn->query($sql3);

}

  




  
/*$sql1 = "insert into opd_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES
('$pmrn','$opd','$dis_percentage','$appdate','$apptime','$user','$particulars','$dname2','$mno','$vehicle1','$due_remarks','$last_id','$b_remarks')";

$conn->query($sql1);
  
$sql3 = "UPDATE opd_appoint1 set status='$status' where dname='$dname2' and date1='$date22' and dslot='$slot'";
$conn->query($sql3);
  
$sql2 = "insert into pappnew(pname,pmrn,pphone,padd,dname,adate,aslot,status,page,psex,user,yage,bdate,dis,aatime,adate1,ptype,page1,payment,bill,billby,billtime,billno) VALUES
('$name', '$pmrn','$pphone','$padd','$dname2','$date23','$slot','$notseen','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','$ptype','$ccgg1new_test1','$dis_percentage','$billed','$user','$billtime','$last_id')";
$conn->query($sql2);

header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
*/

}
			
 else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
       echo '<script language="javascript">';
    echo 'alert("Network Error!!"); ';
    echo '</script>';

}

$conn->close();
	

  

}





  else if($discount_type=='percentage' and $percentage>0 and $payment>0 and $user!='' and $vehicle1!='Cash'){
    

//else if($discount_type=='percentage' and $percentage>0 and $payment>0){
$sql = "insert into pms_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,dis_amount,b_remarks) VALUES
('$pmrn', '$opd', '$dis_percentage', '$appdate', '$apptime', '$user', '$particulars','$dname2','$mno', '$vehicle1', '$due_remarks','$percentage','$b_remarks')";

  
  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;




  
  try {
    $db->beginTransaction();
	
	
    $sh = $db->prepare("insert into opd_bill (pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$pmrn, $opd, $dis_percentage, $appdate, $apptime, $user, $particulars, $dname2, $mno, $vehicle1, $due_remarks, $last_id, $b_remarks]);

    $sh = $db->prepare("UPDATE opd_appoint1 SET status=? WHERE dname=? and date1=? and dslot=?");
    $sh->execute([$status, $dname2, $date22, $slot]);

	
	$sh = $db->prepare("UPDATE pappnew SET pmrn=?, payment=?, bill=?, billby=?, billtime=?, billno=?, dis=?  WHERE ID=?");
    $sh->execute([$pmrn, $dis_percentage, $billed, $user, $billtime, $last_id, $dis, $app_id]);

	
	
	
    if ($db->commit()) {
	
	
      $url ='http://192.168.100.254:3038/api/billinvoice/';
    
    
    //Data Sending To API using CURL Method
    
    $data = array(
      "in_invoice_date"=> "30-JUL-2025",
      "in_invoice_datetime"=> "30-JUL-2025",
      "in_module_no_fk"=> 12,
      "in_patient_no_fk"=> $app_pmrn,
      "in_patient_code"=> "$pmrn",
      "in_admission_no_pk"=> null,
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
      "in_ref_invoice_no_fk"=> "$last_id",
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
      "in_ITEM_NO_FK"=> [6004010],
      "IN_ITEM_BATCH_FK"=>[""],
      "IN_ITEM_EXPIRY_DT"=>[""],
      "in_ITEM_NAME"=> ["OPD Consultation"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_MU"=>[""],
      //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
      "in_patient_no_fk"=> $app_pmrn,
      "in_admission_no_fk"=> null,
      "in_prescription_no_fk"=> null,
      "in_counter_su_no_fk"=> 20275,
      "in_ledger_amt_sales"=> 0,
      "in_ledger_amt_payment"=> $payment1,
      "in_ledger_amt_discount"=> $taka1,
      "in_urgent_fee"=> 0,
      "in_service_charge"=> 0,
      "in_cor_client_no_fk"=> null,
      "in_pay_mode"=> "CASH",
      "in_pay_cqcc_holder_name"=> "",
      "in_pay_cqcc_number"=> "",
      "in_pay_cqcc_deduct_percent"=> 0,
      "in_pay_bank_name"=> "",
      "in_pay_remarks"=> "Payment collected",
      "in_given_amt"=> $payment1,
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
      "in_ITEM_NO_FK"=> [6004010],
      "in_ITEM_NAME"=> ["OPD CONSULTATION"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
    
    echo $response = curl_exec($ch);
    
    
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
      "in_payment_amt"=> [$payment1, 0],
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
    
    echo $response = curl_exec($ch);
    
    
    if(curl_errno($ch)){
        echo 'Curl error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    //echo json_encode($data);
    
    $decoded_response = json_decode($response, true); // Decode the JSON response
    
       
       //
       $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$app_id'"; 
    $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
       
     }
     }
    
            } 
      
      
      
      
      //header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
    //header("Location:$url");
    header("Location: bcview.php");
      
    } catch ( Exception $e ) {
    $db->rollBack();
	
	$sql3 = "UPDATE pms_bill set bill_status='Falied Due to Network Issue' where billno='$last_id'";
$conn->query($sql3);

}

  




}
			
 else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
       echo '<script language="javascript">';
    echo 'alert("Network Error!!"); ';
    echo '</script>';

}

$conn->close();
	

  

}








else if($discount_type=='percentage' and $percentage<=0 and $payment>0 and $user !=''){
	
	  echo '<script language="javascript">';
    echo 'alert("Discount Amount(Percentage) Cannot be Zero!!"); ';
    echo '</script>';
	
	$conn->close();
}






  else if($discount_type=='percentage' and $percentage>0 and $payment>0 and $user!='' and $vehicle1=='Cash'){
    
//else if($discount_type=='percentage' and $percentage>0 and $payment>0){
$sql = "insert into pms_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,dis_amount,b_remarks) VALUES
('$pmrn', '$opd', '$dis_percentage', '$appdate', '$apptime', '$user', '$particulars','$dname2','$mno', '$vehicle1', '$due_remarks','$percentage','$b_remarks')";

  
  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;




  
  try {
    $db->beginTransaction();
	
	
    $sh = $db->prepare("insert into opd_bill (pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,billno) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$pmrn, $opd, $dis_percentage, $appdate, $apptime, $user, $particulars, $dname2, $mno, $vehicle1, $last_id]);

    $sh = $db->prepare("UPDATE opd_appoint1 SET status=? WHERE dname=? and date1=? and dslot=?");
    $sh->execute([$status, $dname2, $date22, $slot]);

	
	$sh = $db->prepare("UPDATE pappnew SET pmrn=?, payment=?, bill=?, billby=?, billtime=?, billno=?, dis=?  WHERE ID=?");
    $sh->execute([$pmrn, $dis_percentage, $billed, $user, $billtime, $last_id, $dis, $app_id]);

	
    if ($db->commit()) {
	
	
      $url ='http://192.168.100.254:3038/api/billinvoice/';
    
    
    //Data Sending To API using CURL Method
    
    $data = array(
      "in_invoice_date"=> "30-JUL-2025",
      "in_invoice_datetime"=> "30-JUL-2025",
      "in_module_no_fk"=> 12,
      "in_patient_no_fk"=> $app_pmrn,
      "in_patient_code"=> "$pmrn",
      "in_admission_no_pk"=> null,
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
      "in_ref_invoice_no_fk"=> "$last_id",
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
      "in_ITEM_NO_FK"=> [6004010],
      "IN_ITEM_BATCH_FK"=>[""],
      "IN_ITEM_EXPIRY_DT"=>[""],
      "in_ITEM_NAME"=> ["OPD Consultation"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_MU"=>[""],
      //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
      "in_patient_no_fk"=> $app_pmrn,
      "in_admission_no_fk"=> null,
      "in_prescription_no_fk"=> null,
      "in_counter_su_no_fk"=> 20275,
      "in_ledger_amt_sales"=> 0,
      "in_ledger_amt_payment"=> $payment1,
      "in_ledger_amt_discount"=> $taka1,
      "in_urgent_fee"=> 0,
      "in_service_charge"=> 0,
      "in_cor_client_no_fk"=> null,
      "in_pay_mode"=> "CASH",
      "in_pay_cqcc_holder_name"=> "",
      "in_pay_cqcc_number"=> "",
      "in_pay_cqcc_deduct_percent"=> 0,
      "in_pay_bank_name"=> "",
      "in_pay_remarks"=> "Payment collected",
      "in_given_amt"=> $payment1,
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
      "in_ITEM_NO_FK"=> [6004010],
      "in_ITEM_NAME"=> ["OPD CONSULTATION"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [1],
      "in_ITEM_RATE"=> [$payment1],
      "in_item_disc_percent"=> [0],
      "in_item_disc_amount"=> [$taka1],
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
    
    echo $response = curl_exec($ch);
    
    
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
      "in_payment_amt"=> [$payment1, 0],
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
    
    echo $response = curl_exec($ch);
    
    
    if(curl_errno($ch)){
        echo 'Curl error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    //echo json_encode($data);
    
    $decoded_response = json_decode($response, true); // Decode the JSON response
    
       
       //
       $api_query = "update pappnew set api_status='1', api_bill_no='$invoice_no' where ID='$app_id'"; 
    $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
       
     }
     }
    
            } 
      
      
      
      
      //header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
    //header("Location:$url");
    header("Location: bcview.php");
      
    } catch ( Exception $e ) {
    $db->rollBack();
	
	$sql3 = "UPDATE pms_bill set bill_status='Falied Due to Network Issue' where billno='$last_id'";
$conn->query($sql3);

}

  




  
/*$sql1 = "insert into opd_bill(pmrn,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES
('$pmrn','$opd','$dis_percentage','$appdate','$apptime','$user','$particulars','$dname2','$mno','$vehicle1','$due_remarks','$last_id','$b_remarks')";

$conn->query($sql1);
  
$sql3 = "UPDATE opd_appoint1 set status='$status' where dname='$dname2' and date1='$date22' and dslot='$slot'";
$conn->query($sql3);
  
$sql2 = "insert into pappnew(pname,pmrn,pphone,padd,dname,adate,aslot,status,page,psex,user,yage,bdate,dis,aatime,adate1,ptype,page1,payment,bill,billby,billtime,billno) VALUES
('$name', '$pmrn','$pphone','$padd','$dname2','$date23','$slot','$notseen','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','$ptype','$ccgg1new_test1','$dis_percentage','$billed','$user','$billtime','$last_id')";
$conn->query($sql2);

header("Location: opd_bill_pdf2_new.php?adate1=$adate1&pmrn=$pmrn&dname=$dname2&billno=$last_id");
*/

}
			
 else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
       echo '<script language="javascript">';
    echo 'alert("Network Error!!"); ';
    echo '</script>';

}

$conn->close();
	

  

}
}
}

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>PATIENT'S APPOINTMENT</title>
  
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
  
  height: 60px;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 30%;
  background-color: #e8eeef;
  color: red;
  font-weight: bold;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 60px;
  border-radius: 2px;
}



button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 20%;
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
  margin-bottom: 8px;
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
    max-width: 900px;
  }

}






* {
    box-sizing: border-box;
}
#data {
    overflow:hidden;
    padding:0;
	width:94vw;
	
}
select {
	padding:0;
	padding-left:1px;
	border:none;
	background-color:#eee;
	width:50%;
	white-space: normal;
	height:60px;
}
option {
	height:40px;
	width:52px;
	border:1px solid #000;
	background-color:white;
	margin-left:-1px;
	display:inline-block;
}




      </style>

    
<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
  
  




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>
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
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>


  
          
         
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
	
</head>

<body style="background-color:lightgreen">

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<div class='container'>



<form name="frmMain1" action="" method="post" style="background-color:#F8DAE9">
        <h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>

			
            <!-- Name Input -->
			
			
			<label for="name"><strong>Doctor's Name :</strong></label>
			
				
				
<select name="doc" id="dname1" value="<?php echo $rowc['dname'];?>" required readonly class="country" style="font-size:20px; font-weight:bold;color:green;width:700px;">
			        
<option ="<?php echo $rowc['dname'];?>"><?php echo $rowc['dname'];?></option>

</select>
<input type="hidden" id="dname3" name="dname3" required />
<input type="hidden" id="pmrn3" name="pmrn3" required />
<input type="hidden" id="type3" name="type3" required />
			
		<script>
$(document).ready(function() {
    $('.country').select2(
	
	
	);
	
	
});
</script>	

						
							<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />

				
					
						</select>
						<br /><br />
						
				
			
			
			    
		<!-- E-mail Input -->
		
		<label for="age"><strong>MRN :</strong></label>

<input value="<?php echo $rowc['pmrn'];?>" name="pmrn" id="pmrn" type="text" placeholder="MRN" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:300px" readonly>
      
	  

			<label for="age"><strong>Name :</strong></label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="name" id="pname" type="text" value="<?php echo $rowc['pname'];?>"  required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:300px">
 	  <br /><label for="age"><strong>ADDRESS :</strong></label>
      <input name="padd" id="padd" type="text" size="85" value="<?php echo $rowc['padd'];?>"  required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:330px">


<label for="age"><strong>District :</strong></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="dis" id="dis" type="text" size="85" value="<?php echo $rowc['dis'];?>"  required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:330px">
		
	

			
				
      </select>
<br />
	  <label for="age"><strong>Gender :</strong></label>
	  	
            
	  	<input name="psex" id="psex" type="text" size="85" value="<?php echo $rowc['psex'];?>"  required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:330px">
		
		
		
	  
	  <label for="age"><strong>Phone Number :</strong></label>
	 <input name="pphone" type="text" id="pphone" placeholder="Phone No"value="<?php echo $rowc['pphone'];?>"  required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:200px">	  
            

  
            
	  

	  <br><br>
<label><strong>DOB(DD/MM/YYYY) :</strong></label>
<input name="dd" id="dd" type="text" maxlength="2" size="1" value="<?php echo $dd;?>"  readonly required placeholder="DD" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px">	/

<input name="mm" id="mm" type="text" maxlength="2" size="1" value="<?php echo $mm;?>"  readonly required placeholder="MM" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px"> /	

<input name="yy" id="yy" type="text" maxlength="4" size="1" value="<?php echo $yy;?>"   readonly required placeholder="YYYY" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:90px">		  
	  
	
	  
	  
	  
							 
<label for="age"><strong>Patient's Type :</strong></label>
	  	
            
	  	<input name="type" id="type" type="text" size="20" value="<?php echo $rowc['ptype'];?>" required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:330px">
		
		
			


<label for="age"><strong>Visit Type :</strong></label>
	  	
            
	  	<select name="ftype" id="ftype"class="style1" placeholder="Patient Type"  required style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:100px" onchange="GetDetail6(this)" > 
		
		
		<option value=""></option>
			<option value="Regular">Regular</option>
			<option value="Followup">Followup</option>
			
			
				
      </select>
	  
	
<br />  	  
      
      

			<label for="age"><strong>Bill Amount:</strong></label>
	 <input name="payment" type="text" id="bill" placeholder="00"value="" readonly style="background-color:lightgreen;font-size:30px;font-weight:bold;color:red;width:100px">	  
	  <input name="cr" type="hidden" id="cr" placeholder="CR"value="" readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px">	  
			
	  

<label for="mail"><strong>Appointment Date :</strong></label>

									  
									<input type='date' name="daten" size="20" style='background-color:lightgreen;font-size:22px;font-weight:bold;color:red;width:200px' min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('7 days') ); ?>" value="<?php echo $rowc['adate1'];?>">  
									  
									  
									 
									<label for="age"><strong>Available Slot :</strong></label>
			
			
			<select id="txtHint" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:120px" name = 'slot' readonly value="">
			
			<option value='<?php echo $rowc['aslot'];?>'><?php echo $rowc['aslot'];?></option>
			
			
			
		
</select>	    			  <br>  
			
<input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="bKash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">bKash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Card</span>				 

      <input name="due_remarks" type="text" size="40" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">
	
  

		



<tr>
<td colspan="5" align="left" style="color:red; font-weight:bold;font-size:18px"><label><strong>Type </strong></label>
<select name="discount_type" value="" class="style1" id="dis1" onchange="GetDetail1(this.value)" width="20px;">
			        
					 <option value=''>--Select--</option>
					 <option value='taka'>Discount In Taka</option>
					 <option value='percentage'>Discount In Percentage</option>
					 
									
										 
										 
				
			</select>
			
	
		
</td>	
	
	<td colspan="10">

<input name="taka" type="number" class="style1" id="sdate12" placeholder="Discount In Taka" max="100" hidden style="font-size:20px;color:red;font-weight:bold;">
<input type="number" name="percentage" id="sdate1" class="style1" placeholder="Discount In Percentage" max="10" hidden style="font-size:20px;color:red;font-weight:bold;">



</td>


		
		

		<td colspan="5"align="right">
		<input type="number" id="dis_taka" name="dis_taka" value="" hidden readonly style="font-size:20px;color:red;font-weight:bold;"> 
<input type="number" id="dis_percentage" name="dis_percentage" value="" hidden readonly style="font-size:20px;color:red;font-weight:bold;"> 
 <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#bill").val()) 
	var ret2 = parseInt($("#sdate12").val())
	var ret3 = parseInt($("#sdate1").val())
	var ret4=ret1-ret2
	var ret5=ret3 / 100
	var ret6=ret1 * ret5
	var ret7=parseInt(ret1 - ret6)
	
    $("#dis_taka").val(ret4);
	$("#dis_percentage").val(ret7);
  })
</script>


	
	
	
	
	</tr>
	
	<tr>
	<td>
		&nbsp;&nbsp;&nbsp;<input type="text" name="remarks" style="background-color:white" placeholder="Remarks"></input>  
	</td>
	<td>
		&nbsp;&nbsp;&nbsp;
		<button type="submit" name="Submit" id="submitButton" style="background-color:#ED6572">Confirm</button>  
	</td>

  <script>
					         document.getElementById('submitButton').addEventListener('click', function() {
        this.style.display = 'none'; // Hides the button
        // Optional: Add a message indicating submission is in progress
        // document.getElementById('myForm').innerHTML += '<p>Processing, please wait...</p>';
    });
					 </script>
	</tr>
	
	
	<script>
					         document.getElementById('submitButton').addEventListener('click', function() {
        this.style.display = 'none'; // Hides the button
        // Optional: Add a message indicating submission is in progress
        // document.getElementById('myForm').innerHTML += '<p>Processing, please wait...</p>';
    });
					 </script>
	
<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');


function subTotal()
{
gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
gt=gt+(iprice[i].value)*(iquantity[i].value);

}
//gtotal.innerText=gt;
document.getElementById("gtotal").value=gt;
}
subTotal();
</script>

	
	
	 </table>
            </form>
        </div>








</body>

</html>
<script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
   
        
        var txtPassportNumber4 = document.getElementById("sdate21");
        txtPassportNumber4.disabled = chkPassport.unchecked ? false : true;
        if (!txtPassportNumber4.disabled) {
            txtPassportNumber4.focus();
        }
		
		
    }
	
		function EnableDisableTextBox1(chkPassport1) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport1.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
	
	function EnableDisableTextBox2(chkPassport2) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport2.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
</script>

<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			
					
							
			if (str.length == 0) {
				document.getElementById("pname").value = "";

				document.getElementById("psex").value = "";
				document.getElementById("padd").value = "";
				document.getElementById("pphone").value = "";
				document.getElementById("dis").value = "";
				document.getElementById("dd").value = "";
				document.getElementById("mm").value = "";
				document.getElementById("yy").value = "";
				document.getElementById("cr").value = "";
				document.getElementById("type").value = "";
				
				
				return;
				
				//dname1.disabled = true;
			//type.disabled = true;
	//ftype.disabled = true;
			//pmrn.disabled = true;
			
			//psex.disabled = true;
			//dis.disabled = true;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("pname").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"psex").value = myObj[1];
							
							document.getElementById(
							"padd").value = myObj[2];
							
							document.getElementById(
							"pphone").value = myObj[3];
							
							document.getElementById(
							"dis").value = myObj[4];
							
							document.getElementById(
							"dd").value = myObj[5];
							
							document.getElementById(
							"mm").value = myObj[6];
							
							document.getElementById(
							"yy").value = myObj[7];
							
							document.getElementById(
							"cr").value = myObj[8];
							
							
							document.getElementById(
							"type").value = myObj[9];
							
							
						document.getElementById('type').style.color = "red";	
						document.getElementById('cr').style.color = "red";	
						document.getElementById('yy').style.color = "red";	
						document.getElementById('mm').style.color = "red";	
						document.getElementById('dd').style.color = "red";	
						document.getElementById('dis').style.color = "red";	
						document.getElementById('phone').style.color = "red";	
						document.getElementById('padd').style.color = "red";	
						document.getElementById('psex').style.color = "red";	
						document.getElementById('pname').style.color = "red";	
	
				
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "gfg1.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
	
	
	
<script>
function showUser(str) {
			var q1 = document.getElementById('dname1').value;
	//dname1.disabled = true;
	//ftype.disabled = true;
	
		
			
		
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","opd_slot.php?q="+str + "&dname2="+q1, true);
  xmlhttp.send();
}
</script>

<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		

		function GetDetail1(str) {
			
				var rt = document.getElementById('dis1').value;
				
var taka= document.getElementById('sdate12');
var percentage= document.getElementById('sdate1');

var dis_taka= document.getElementById('dis_taka');
var dis_percentage= document.getElementById('dis_percentage');

								if(rt === ""){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = true;
	dis_percentage.disabled = true;
	
	//type.disabled = false;
	//dname1.disabled = false;
	
		
		
		
  }	  
	

				
				
				else if(rt === "percentage"){
    
	
	
	sdate1.hidden = false;
	sdate1.disabled = false;
	percentage.value = ""; // Clear the input
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	dis_percentage.value = ""; // Clear the input
	
	
	//type.disabled = true;
//	dname1.disabled = true;
	
			
			
  }	  
  
	
else if(rt === "taka"){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = false;
	sdate12.disabled = false;
	taka.value = ""; // Clear the input
	
	dis_taka.hidden = false;
	dis_taka.disabled = false;
	dis_taka.value = ""; // Clear the input
	dis_percentage.hidden = true;
	dis_percentage.disabled = true;
	
	//type.disabled = true;
	//dname1.disabled = true;
		
			
  }	  
  
  
	
				
			}
		
	</script>  
	
	
	
	
		<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail6(str) {
			
			
	
	
			var q = document.getElementById('type').value;
			var q1 = document.getElementById('dname1').value;
			
					var q2 = document.getElementById('ftype').value;
					var q3 = document.getElementById('pmrn').value;
					  

				document.getElementById("dname3").value = q1;
				document.getElementById("type3").value = q;
				document.getElementById("pmrn3").value = q3;
							
							
							dname1.disabled = true;
			type.disabled = true;
	//ftype.disabled = true;
			pmrn.disabled = true;
			
			//psex.disabled = true;
			//dis.disabled = true;
	
			if (str.length == 0) {
				
				document.getElementById("cr").value = "";
				//document.getElementById("payment").value = "";
			
				return;
			}	
				
			
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
							
							document.getElementById(
							"cr").value = myObj[0];
													
													document.getElementById(
							"bill").value = myObj[0];
													
							
							
						
						document.getElementById('cr').style.color = "red";	
						document.getElementById('bill').style.color = "red";	
						
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "visit_type.php?type="+q+"&dname2="+q1+"&ftype="+q2, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
	
	