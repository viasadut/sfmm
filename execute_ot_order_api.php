<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
    header('Location: login2?err=2');
    }
	require('db1.php');

$user=$_SESSION["sess_username"];
$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$odate=date('m/d/Y',strtotime("+1 days"));	
$ndate=date('Y-m-d',strtotime("+1 days"));	
$time= date('Y-m-d H:i:s');
$mtime=date('H:i:s');



$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
//$dname=$row139['fullname'];

?>

  <?php  
  
  $user1='root';
$pass='Godiloveu16';
$db= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
     /* $pmrn = mysqli_real_escape_string($connect, $_POST["name1"]);  
      $infu = mysqli_real_escape_string($connect, $_POST["address1"]);  
      $instruc = mysqli_real_escape_string($connect, $_POST["ins1"]);  
	  $root = mysqli_real_escape_string($connect, $_POST["route1"]);  
	 // $dilu = mysqli_real_escape_string($connect, $_POST["result1"]);
	 $eid = mysqli_real_escape_string($connect, $_POST["dname1"]);	  
	 $time = mysqli_real_escape_string($connect, $_POST["time1"]);	
	 */
	 $dilu = mysqli_real_escape_string($connect, $_POST["dilu"]);	
	 
$alert = mysqli_real_escape_string($connect, $_POST["alert1"]);	
$uprice = mysqli_real_escape_string($connect, $_POST["uprice1"]);		 
$id = mysqli_real_escape_string($connect, $_POST["employee_id3"]);		 
$location5 = mysqli_real_escape_string($connect, $_POST["location5"]);		 
	 

	 
$sel96="SELECT * FROM medi_stock WHERE `sno`='$dilu' and add_qty>0 order by id asc limit 1;";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-1;
	 
$tfid=$b_chk_m['rfid'];
//$loc=$b_chk_m['location'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];

$adate= date('Y-m-d');
$code=(int)$b_chk_m['code'];	 
$mid=$b_chk_m['id'];	 
$ddate = date('d/m/Y H:i:s');

$sel95 = "SELECT * from medicine where code='$code'"; 
$result95 = mysqli_query($con,$sel95);
$charge_code = mysqli_fetch_assoc($result95);

$u_price=(int)$charge_code['uprice'];



$db1 = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db1,'sfmmkpjnew');
$sel1=mysqli_query($db1,"SELECT * FROM hits_list1 WHERE `code`='$code';");
$result1 = mysqli_fetch_assoc($sel1);
//$medi1=$result1['item_name'];
$ip=$result1["ip"];
$op=$result1["op"];
$acct_code=$result1["acct_code"];
$ccentre=$result1["ccentre"];


$sel="SELECT * FROM otendomedi WHERE `id`='$id';";
$result = mysqli_query($con,$sel);
$info=mysqli_fetch_assoc($result);
$pmrn=$info['pmrn'];
$pname=$info['pname'];
$route=$info['root'];
$ins=$info['instruc'];
$ucode=$info['code'];
$eid=$info['eid'];
$dname=$info['dname'];


$patient_query  = "SELECT * FROM `inpatient` WHERE pmrn='$pmrn' and discharge='' order by id desc";
    $run_patient    = mysqli_query($con,$patient_query);
    $result_patient = mysqli_fetch_assoc($run_patient);

    //$pmrn           = $result_patient['pmrn'];
    $pmrn_int           = (int)$result_patient['pmrn'];
	$ieid            = $result_patient['eid'];
	$admission_id= (int)$result_patient['OUT_ADMISSION_NO_PK'];





if($ucode==$code and $mm_qty>0)
{
	
    $ins_query="UPDATE otendomedi SET status1='given',donet='$ddate',udone='$user' WHERE id='$id' and status1!='given'";
    mysqli_query($con,$ins_query) or die(mysql_error());
    if(mysqli_affected_rows($con)){

try {
    $db->beginTransaction();

	
	$impl='implemented';
    $qqt=1;
	$sale='Sale';
 //   $sh = $db->prepare("UPDATE imedi3 SET donet=?,udone=?,status1=? WHERE id=? and status1 !=?");
   // $sh->execute([$ddate, $user, $impl, $id, $impl]);
	
	$sh = $db->prepare("UPDATE medi_stock SET add_qty=? WHERE id=?");
    $sh->execute([$m_qty1, $mid]);

	//$sh = $db->prepare("insert into phar_sale (medi,qty,uprice,tprice,aby,adate,brand,pmrn,eid,rfid,status,location,code,iidd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    //$sh->execute([$g_name, $qqt, $u_price, $u_price, $user, $adate, $bb_name, $pmrn, $eid, $dilu, $sale, $loc, $code, $id]);



	$sh = $db->prepare("insert into othoscharge1 (dname,pmrn,pname,medi,brand,eid,date,pdos,rfid,code,ndate,route,remarks,location,aqty,ins,time,mtime,nuser,ip,op,acct_code,ccentre,ieid) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$dname,$pmrn, $pname, $g_name, $bb_name, $eid, $date1, $qqt, $dilu, $code, $date2, $route, $ins,$location5, $m_qty1, $u_price, $time,$mtime,$user,$ip,$op,$acct_code,$ccentre,$ieid]);



	/*$ins_query1="insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`eid`,`date`,`pdos`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`aqty`,`ins`,`time`,`mtime`,`nuser`) values 
('$pmrn','$pname','$infusion','$id','$odate','1','$code',)";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/

    //$db->commit();
	//$url = "historynewview?pmrn=$pm&eid=$count1&date=$pdate&dname=$pd" ;
//header("Location:$url");

if ($db->commit()) {


    $last_id = $db->insert_id;

$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

	$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 22,
  "in_patient_no_fk"=> $pmrn_int,
  "in_patient_code"=> "$pmrn",
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
  "in_ITEM_NO_FK"=> [$code],
  "IN_ITEM_BATCH_FK"=>[""],
  "IN_ITEM_EXPIRY_DT"=>[""],
  "in_ITEM_NAME"=> ["$g_name"],
  "in_ITEMTYPE_NO_FK"=> [1],
  "in_ITEM_QTY"=> [$qqt],
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
	 
	$ins_query="UPDATE othoscharge1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
mysqli_query($con,$ins_query) or die(mysql_error());
	 
 }
}



$url = "imedi1_new.php?pmrn=$pmrn&eid=$eid";

header("imedi1_new.php?pmrn=$pmrn&eid=$eid");

	
} catch ( Exception $e ) {
    $db->rollBack();
}	
	
	

}

}
else if($infu==$g_name and $mm_qty>0)
{
	
	
    $ins_query="UPDATE otendomedi SET status1='given',donet='$ddate',udone='$user' WHERE id='$id' and status1!='given'";
    mysqli_query($con,$ins_query) or die(mysql_error());
    if(mysqli_affected_rows($con)){


try {
    $db->beginTransaction();

	
	$impl='implemented';
    $qqt=1;
	$sale='Sale';
 //   $sh = $db->prepare("UPDATE imedi3 SET donet=?,udone=?,status1=? WHERE id=? and status1 !=?");
   // $sh->execute([$ddate, $user, $impl, $id, $impl]);
	
	$sh = $db->prepare("UPDATE medi_stock SET add_qty=? WHERE id=?");
    $sh->execute([$m_qty1, $mid]);

	$sh = $db->prepare("insert into othoscharge1 (dname,pmrn,pname,medi,brand,eid,date,pdos,rfid,code,ndate,route,remarks,location,aqty,ins,time,mtime,nuser,ip,op,acct_code,ccentre,ieid) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$dname,$pmrn, $pname, $g_name, $bb_name, $eid, $date1, $qqt, $dilu, $code, $date2, $route, $ins,$location5, $m_qty1, $u_price, $time,$mtime,$user,$ip,$op,$acct_code,$ccentre,$ieid]);

//    $db->commit();

if ($db->commit()) {

    $last_id = $db->insert_id;

    $url ='http://192.168.100.254:3038/api/billinvoice/';
    
    
    //Data Sending To API using CURL Method
    
        $data = array(
      "in_invoice_date"=> "30-JUL-2025",
      "in_invoice_datetime"=> "30-JUL-2025",
      "in_module_no_fk"=> 22,
      "in_patient_no_fk"=> $pmrn_int,
      "in_patient_code"=> "$pmrn",
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
      "in_ITEM_NO_FK"=> [$code],
      "IN_ITEM_BATCH_FK"=>[""],
      "IN_ITEM_EXPIRY_DT"=>[""],
      "in_ITEM_NAME"=> ["$g_name"],
      "in_ITEMTYPE_NO_FK"=> [1],
      "in_ITEM_QTY"=> [$qqt],
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
         
        $ins_query="UPDATE othoscharge1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
    mysqli_query($con,$ins_query) or die(mysql_error());
         
     }
    }
    
	
$url = "imedi1_new.php?pmrn=$pmrn&eid=$eid";

header("imedi1_new.php?pmrn=$pmrn&eid=$eid");

	
} catch ( Exception $e ) {
    $db->rollBack();
}
		
	
	
	
}
}
}
 ?>
 