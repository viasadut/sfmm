<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
    header('Location: login2?err=2');
    }
	require('db1.php');

$user=$_SESSION["sess_username"];
$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$odate=date('m/d/Y',strtotime("+1 days"));	
$ndate=date('Y-m-d',strtotime("+1 days"));	





$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $pmrn = mysqli_real_escape_string($connect, $_POST["name1"]);  
      $pmrn_int = (int)mysqli_real_escape_string($connect, $_POST["name1"]);  
      $infu = mysqli_real_escape_string($connect, $_POST["address1"]);  
      $instruc = mysqli_real_escape_string($connect, $_POST["ins1"]);  
	  $root = mysqli_real_escape_string($connect, $_POST["route1"]);  
	  //$dilu = mysqli_real_escape_string($connect, $_POST["result1"]);
	 $eid = mysqli_real_escape_string($connect, $_POST["dname1"]);	  
	 $time = mysqli_real_escape_string($connect, $_POST["time1"]);	
	 
	 $dilu = mysqli_real_escape_string($connect, $_POST["dilu"]);	
	 
$alert = mysqli_real_escape_string($connect, $_POST["alert1"]);	
$uprice = mysqli_real_escape_string($connect, $_POST["uprice1"]);		 		 
$id = mysqli_real_escape_string($connect, $_POST["employee_id2"]);		 
	 


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and discharge='' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$pname=$data['pname'];
$api_adminssion_no=(int)$data['OUT_ADMISSION_NO_PK'];


$query44 = mysqli_query($db,"select * from estat where id='$id'");
$data4 = mysqli_fetch_assoc($query44);
$e_status=$data4['api_status'];



	 
$sel96="SELECT * FROM medi_stock WHERE `sno`='$dilu' and add_qty>0 order by id asc limit 1;";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-1;





	 
$tfid=$b_chk_m['rfid'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
//$u_price=(int)$b_chk_m['u_price'];
$adate= date('Y-m-d');
$code=(int)$b_chk_m['code'];	 
$mid=$b_chk_m['id'];
$medi1_api=$g_name.'- AE STOCK';
	 
$sel95 = "SELECT * from medicine where code='$code'"; 
$result95 = mysqli_query($con,$sel95);
$charge_code = mysqli_fetch_assoc($result95);
$u_price=$charge_code['uprice'];


$ddate = date('m-d-Y H:i:s');
if($uprice==$code and $mm_qty>0)
{
$update="update estat set dtime='$ddate',udone='$user',status='Rupdated',loc='AE' where `id`='$id' and status!='Rupdated'";
//mysqli_query($con,$update) or die(mysql_error());


//$message= "this is a message";

//$query="update imedi2 set `instruc`='$instruc',`root`='$root',`dilu`='$dilu',`editby`='$user',`edittime`='$dtime' where `pmrn`='$pmrn' and `eid`='$eid' and infusion='$infu' and status1!='SEEN'";

//$result = mysqli_query($con,$query) or die ( mysqli_error());

if(mysqli_query($con,$update)==true){

$query1="update medi_stock set `add_qty`='$m_qty1' where `id`='$mid'";

//$result1 = mysqli_query($con,$query1) or die ( mysqli_error());




}

if($result1 = mysqli_query($con,$query1)==true){
$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`,`iidd`) values
			('$g_name','1','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$eid','$dilu','Sale','AE STOCK','$code','$id')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);

      $date=date('Y-m-d');
      $tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$pcode'");
      $tb_result = mysqli_fetch_assoc($tb_q);
      $tb_data=$tb_result['tb_op'];
      
      $ins_query23="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
      values ('$id','CR','111001','$date','$u_price','AE_MEDI_CHARGE')";
      mysqli_query($con,$ins_query23) or die(mysql_error());
      
      
      $ins_query24="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
      values ('$id','DR','111999','$date','$u_price','AE_MEDI_CHARGE')";
      mysqli_query($con,$ins_query24) or die(mysql_error());

if($e_status==0){


           // $url ='http://192.168.100.254:3038/api/billinvoice/';


  //Data Sending To API using CURL Method
  
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
    "in_ITEM_NO_FK"=> [$code],
    "IN_ITEM_BATCH_FK"=>[""],
    "IN_ITEM_EXPIRY_DT"=>[""],
    "in_ITEM_NAME"=> ["$medi1_api"],
    "in_ITEMTYPE_NO_FK"=> [1],
    "in_ITEM_QTY"=> [1],
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
  
 //echo $response = curl_exec($ch);
  
  
  if(curl_errno($ch)){
      echo 'Curl error: ' . curl_error($ch);
  }
  
  curl_close($ch);
  
echo json_encode($data);
  
  $decoded_response = json_decode($response, true); // Decode the JSON response
  
  //Setting Other Logic after receving the decoded response 
  $invoice_no=$decoded_response['invoice_id'];
  
   if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
     
    $api_query = "update estat set api_status='1', invoice_no='$invoice_no' where id='".$id."'"; 
  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
     
     
   }
  }
}

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine updated Added  !!"); ';
    echo '</script>';
$url = "estat_new.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");
}


else if($infu==$g_name and $mm_qty>0)
{
$update="update estat set dtime='$ddate',udone='$user',status='Rupdated',loc='AE' where `id`='$id' and status!='Rupdated'";
//mysqli_query($con,$update) or die(mysql_error());


//$message= "this is a message";

//$query="update imedi2 set `instruc`='$instruc',`root`='$root',`dilu`='$dilu',`editby`='$user',`edittime`='$dtime' where `pmrn`='$pmrn' and `eid`='$eid' and infusion='$infu' and status1!='SEEN'";

//$result = mysqli_query($con,$query) or die ( mysqli_error());

if(mysqli_query($con,$update)==true){

$query1="update medi_stock set `add_qty`='$m_qty1' where `id`='$mid'";

//$result1 = mysqli_query($con,$query1) or die ( mysqli_error());
}

if($result1 = mysqli_query($con,$query1)==true){
$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`,`iidd`) values
			('$g_name','1','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$eid','$dilu','Sale','AE STOCK','$code','$id')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);


if($e_status==0){

            //$url ='http://192.168.100.254:3038/api/billinvoice/';


  //Data Sending To API using CURL Method
  
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
    "in_ITEM_NO_FK"=> [$code],
    "IN_ITEM_BATCH_FK"=>[""],
    "IN_ITEM_EXPIRY_DT"=>[""],
    "in_ITEM_NAME"=> ["$medi1_api"],
    "in_ITEMTYPE_NO_FK"=> [1],
    "in_ITEM_QTY"=> [1],
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
  
 //echo $response = curl_exec($ch);
  
  
  if(curl_errno($ch)){
      echo 'Curl error: ' . curl_error($ch);
  }
  
  curl_close($ch);
  
echo json_encode($data);
  
  $decoded_response = json_decode($response, true); // Decode the JSON response
  
  //Setting Other Logic after receving the decoded response 
  $invoice_no=$decoded_response['invoice_id'];
  
   if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
     
    $api_query = "update estat set api_status='1', invoice_no='$invoice_no' where id='".$id."'"; 
  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
     
     
   }

  }
        }

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine updated Added  !!"); ';
    echo '</script>';
$url = "estat_new.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");
}

 else {
	 
	 echo '<script language="javascript">';
    echo 'alert("NOT SUCCESSFUL  !!"); ';
	
    echo '</script>';
 }
	 
}
 ?>
 