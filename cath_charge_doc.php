<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);



$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$date1=date('Y-m-d');

//include("auth.php");

//$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from cath_receive where id='$id'");
$data = mysqli_fetch_assoc($query4);

$otdate=$data['otdate'];
$ottype=$data['typeo'];
$pmrn=$data['pmrn'];
$pmrn_int=(int)$_REQUEST['pmrn'];
$ieid=$data['ieid'];
$query45 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge!='Discharged'");
$data5 = mysqli_fetch_assoc($query45);
$in_eid=$data5['eid']; 




$ward=$data5['room'];
$bed1=$data5['room1'];
//$adoc=$data['adoc'];
$pname=$data5['pname'];
$api_adminssion_no=(int)$data5['OUT_ADMISSION_NO_PK'];
$adoc=$data5['adoc'];
$emerid=$data5['emerid'];
$api_adminssion_no_char=$data5['OUT_ADMISSION_NO_PK'];




$queryd = mysqli_query($db,"select * from doctor where dname='$full' and status='Active'");
$datad= mysqli_fetch_assoc($queryd);
$dcode=$datad['dcode'];
$code7=$datad['code'];





$modified_string = substr($code7, 1);
//$modified_string = $code7;

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$modified_string'");
		$tb_result = mysqli_fetch_assoc($tb_q);
		$tb_data=$tb_result['tb_ip'];


$queryd1 = mysqli_query($db,"select * from doctor_code where dcode='$dcode' and dname like '%procedure%'");
$datad1= mysqli_fetch_assoc($queryd1);

$code=(int)$datad1['ccode'];

//$dcode=$datad1['dcode'];
$ip=$datad1['ip'];
$op=$datad1['op'];
$app_con=$datad1['app_con'];
$ccentre=$datad1['ccentre'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data['pname'];
//$pmrn = $data['pmrn'];
//$eid = $data['eid'];
//$padd = $data['padd'];
//$adm = $data['adate'];
//$pphone=$data['pphone'];
//$page=$data['page'];
//$psex=$data['psex'];
//$odate = $_REQUEST['odate'];
//$otime = $_REQUEST['otime'];
//$infu = $_REQUEST['infu'];

$proname = $_REQUEST['proname'];
//$sreport = $_REQUEST['sreport'];
$sreport = str_replace("'", "''",$_REQUEST['sreport']);
$charge = (int)$_REQUEST['charge'];
$charge1 = (int)$_REQUEST['charge1'];
//$inorder = $_REQUEST['inorder'];
$inorder = str_replace("'", "''",$_REQUEST['inorder']);
//$otherins = $_REQUEST['otherins'];

$adate1= date('d/m/Y H:i:s');
//$x=$_REQUEST['xl'];
//$lx= implode(",",$x);
$plevel = $_REQUEST['plevel'];

$sel90="SELECT COUNT(id) FROM cath_charge WHERE `pmrn`='$pmrn' and `eid`='$id' and `pname`='$proname' and sname='$full' and c_status!='Cancelled';";
$result90 = mysqli_query($con,$sel90);
$row_r = mysqli_fetch_assoc($result90);
$ww=$row_r['COUNT(id)'];

$sel95="SELECT COUNT(id),pname FROM privilege WHERE `id`='$proname' and status in ('Approved','Waiting For CFO Approval') and dname='$full';";
$result95 = mysqli_query($con,$sel95);
$row_rr = mysqli_fetch_assoc($result95);
$ww1=$row_rr['COUNT(id)'];
$pname_new=$row_rr['pname'];
$adoc_details=$full.' - '.$pname_new;


if($plevel=='Surgeon' and $charge!='' and $full!='' and $ww>0){
	
/*	
$ins_query="insert into otreport (`pmrn`,`eid`,`pname`,`otdate`,`sname`,`sreport`,`ottype`,`date1`,`charge`,`plevel`) values ( '$pmrn','$id','$proname','$otdate','$full','$sreport','$ottype','$date1','$charge','$plevel')";
mysqli_query($con,$ins_query) or die(mysql_error());

$ins_query7="insert into otivisitendo (`pmrn`,`eid`,`infusion`,`room`,`cdate`,`user`,`vtype`,`odate`) values 
( '$pmrn','$id','$full','$charge','$date1','$user','$proname','$adate1')";
mysqli_query($con,$ins_query7) or die(mysql_error());
*/
echo '<script language="javascript">';
    echo 'alert("Failed !!! Note Already Written.. To Modify it Please go to Edit Option"); ';
    echo '</script>';



}


else if($plevel=='Surgeon' and $charge!='' and $full!='' and $ww1<=0){
	
/*	
$ins_query="insert into otreport (`pmrn`,`eid`,`pname`,`otdate`,`sname`,`sreport`,`ottype`,`date1`,`charge`,`plevel`) values ( '$pmrn','$id','$proname','$otdate','$full','$sreport','$ottype','$date1','$charge','$plevel')";
mysqli_query($con,$ins_query) or die(mysql_error());

$ins_query7="insert into otivisitendo (`pmrn`,`eid`,`infusion`,`room`,`cdate`,`user`,`vtype`,`odate`) values 
( '$pmrn','$id','$full','$charge','$date1','$user','$proname','$adate1')";
mysqli_query($con,$ins_query7) or die(mysql_error());
*/
echo '<script language="javascript">';
    echo 'alert("Failed !!! The Procedure Name is not in your approved List.."); ';
    echo '</script>';



}


else if($plevel=='Surgeon' and $charge!='' and $full!='' and $ww==0 and $ww1>0){
	


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
	
	
	$sql = "insert into cath_charge (`pmrn`,`eid`,`pname`,`otdate`,`sname`,`sreport`,`ottype`,`date1`,`charge`,`plevel`,`ieid`,`inorder`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) values
	( '$pmrn','$id','$pname_new','$otdate','$full','$sreport','$ottype','$date1','$charge','$plevel','$ieid','$inorder','$dcode','$code','$ip','$op','$app_con','$ccentre')";
	
	  if ($conn->query($sql) === TRUE) {
	  $last_id = $conn->insert_id;
	



	  $date=date('Y-m-d');
		$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','CATH_DOC_CHARGE')";
		mysqli_query($con,$ins_query) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','CATH_DOC_CHARGE')";
		mysqli_query($con,$ins_query7) or die(mysql_error());



	  //$url ='http://192.168.100.254:3038/api/billinvoice/';
  
  
	  //Data Sending To API using CURL Method
	  
		$data = array(
		"in_invoice_date"=> "$formattedDate",
		"in_invoice_datetime"=> "$formattedDate",
		"in_module_no_fk"=> 12,
		"in_patient_no_fk"=> $pmrn_int,
		"in_patient_code"=> "$pmrn",
		"in_admission_no_pk"=> "$api_adminssion_no_char",
		"in_admission_code"=> $api_adminssion_no,
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
		"in_ref_invoice_no_fk"=> "",
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
		"in_BLOOD_GROUP"=> "1",
		"in_PHONE_MOBILE"=> "017XXXXXXXX",
		"in_invoice_remarks"=> "",
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
		"in_ITEM_NAME"=> [$adoc_details],
		"in_ITEMTYPE_NO_FK"=> [1],
		"in_ITEM_QTY"=> [1],
		"in_ITEM_MU"=>[""],
		//"in_ITEM_RATE"=> ["$integer_value", "$payment"],
		"in_ITEM_RATE"=> [$charge],
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
	  
	  $invoice_no=$decoded_response['invoice_id'];
	  
	  
	  if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
		 
		//header("Location:$url");
		 //echo json_encode($data);
		 
		 $api_query = "update cath_charge set api_status='1', invoice_no='$invoice_no' where id='".$last_id."'"; 
	  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());


	  echo '<script language="javascript">';
    echo 'alert("Successful !!! "); ';
    echo '</script>';


	header("cath_charge_doc?pmrn=$pmrn&dname=$full&eid=$eid&id=$id&type=$ottype&ieid=$ieid");




	   }
	  
	  
	  
	  
	  





}

else {
echo '<script language="javascript">';
    echo 'alert("OT NOTE UPDATE FAILED !!! "); ';
    echo '</script>';
}
}


else if($plevel=='Assist' and $charge1!='' and $full!=''){
	


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


$sql = "insert into cath_charge (`pmrn`,`eid`,`pname`,`otdate`,`sname`,`sreport`,`ottype`,`date1`,`charge`,`plevel`,`ieid`,`inorder`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) values
( '$pmrn','$id','$pname_new','$otdate','$full','$sreport','$ottype','$date1','$charge1','$plevel','$ieid','$inorder','$dcode','$code','$ip','$op','$app_con','$ccentre')";

  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

  $date=date('Y-m-d');
  $ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','$tb_data','$date','$charge1','CATH_DOC_CHARGE')";
  mysqli_query($con,$ins_query) or die(mysql_error());

  $ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','DR','111999','$date','$charge1','CATH_DOC_CHARGE')";
  mysqli_query($con,$ins_query7) or die(mysql_error());





  //$url ='http://192.168.100.254:3038/api/billinvoice/';


  //Data Sending To API using CURL Method
  
	$data = array(
	"in_invoice_date"=> "$formattedDate",
	"in_invoice_datetime"=> "$formattedDate",
	"in_module_no_fk"=> 12,
	"in_patient_no_fk"=> $pmrn_int,
	"in_patient_code"=> "$pmrn",
	"in_admission_no_pk"=> "$api_adminssion_no_char",
	"in_admission_code"=> $api_adminssion_no,
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
	"in_ref_invoice_no_fk"=> "",
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
	"in_BLOOD_GROUP"=> "1",
	"in_PHONE_MOBILE"=> "017XXXXXXXX",
	"in_invoice_remarks"=> "",
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
	"in_ITEM_NAME"=> [$adoc_details],
	"in_ITEMTYPE_NO_FK"=> [1],
	"in_ITEM_QTY"=> [1],
	"in_ITEM_MU"=>[""],
	//"in_ITEM_RATE"=> ["$integer_value", "$payment"],
	"in_ITEM_RATE"=> [$charge1],
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
  
  $invoice_no=$decoded_response['invoice_id'];
  
  
  if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	//header("Location:$url");
	 //echo json_encode($data);
	 
	 $api_query = "update cath_charge set api_status='1', invoice_no='$invoice_no' where id='".$last_id."'"; 
  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());


  echo '<script language="javascript">';
    echo 'alert("Successful !!!"); ';
    echo '</script>';


	header("cath_charge_doc?pmrn=$pmrn&dname=$full&eid=$eid&id=$id&type=$ottype&ieid=$ieid");
   }
  
  

}

else {

echo '<script language="javascript">';
    echo 'alert("ASSIST CHARGE FAILED TO UPDATE!!!"); ';
    echo '</script>';
}


}







else {
	
echo '<script language="javascript">';
    echo 'alert("Failed !!!"); ';
    echo '</script>';
	
}
}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <link rel="stylesheet" href="toastr.min.css">
   <style type="text/css">
	   body{
		   background:#d1d1d2;
	   }
	   .mian-section{
		   padding:20px 60px;
		   margin-top:100px;
		   background:#fff;
	   }
	   .title{
		   margin-bottom:50px;
	   }
	   .label-success{
		   position: relative;
		   top:20px;
	   }
   </style>
 
 <title>Surgery Note</title>
 
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
 width: 100%;
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
   max-width: 1200px;
 }

}


	 </style>

   <script src="jsnew/prefixfree.min.js"></script>



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
		   minDate: new Date(currentMonth, currentDate,currentYear),
		   maxDate: new Date(currentMonth, currentDate,currentYear)
	   });
   });
</script>




 <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
 </style>
 
 <head>
   <title>Investigation</title>
   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
   <script src="jsnew/jjquery.min.js"></script>
   <script src="jsnew/bootstrap.min.js"></script>

   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
   <link href="./jquery.multiselect.css" rel="stylesheet" />
   <script src="jsnew/jquery-1.12.4.js"></script>
   <script src="jsnew/jquery-ui.js"></script>
   <script src="./jquery.multiselect.js"></script>


<script>
 $(document).ready(function() {
   $("#datepicker").datepicker();
 });
 </script>



 <link rel="stylesheet" href="styles.css">

  <script src="script.js"></script>
  <script>
function goBack() {
   window.history.back();
}
</script>


</head>
</head>
<script type="text/javascript">
$(document).ready(function()
{
   $("#loding1").hide();
   
   $(".form-control").change(function()
   {
	   $("#loding1").show();
	   var id=$(this).val();
	   var dataString = 'id='+ id;
	   $(".state").find('option').remove();
   
	   $.ajax
	   ({
		   type: "POST",
		   url: "ccc.php",
		   data: dataString,
		   cache: false,
		   success: function(html)
		   {
			   $("#loding1").hide();
			   $(".state").html(html);
		   } 
	   });
	   
	   
	   
	   $.ajax
	   ({
		   type: "POST",
		   url: "ccc1.php",
		   data: dataString,
		   cache: false,
		   success: function(html)
		   {
			   $("#loding1").hide();
			   
			   $(".state1").html(html);
		   } 
	   });
   
   
   
   
   $.ajax
	   ({
		   type: "POST",
		   url: "ccc2.php",
		   data: dataString,
		   cache: false,
		   success: function(html)
		   {
			   $("#loding1").hide();
			   $(".state2").html(html);
		   } 
	   });
	   
   });
   
});
</script>

		  
		  <script src="jsnew/jquery.min1.js"></script>  
		  <link rel="stylesheet" href="jsnew/bootstrap.min1.css" />  
		  <script src="jsnew/bootstrap.min1.js"></script>  
	 
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
		 
            
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
		

<form action="" method="post">
<table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a></td></tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname" value="<?php echo $data["dname"]; ?>"disabled></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="7"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="7"><input type="text" name="pmrn" value="<?php echo $data["pmrn"]; ?>"disabled> </td>
				<td colspan="3"><input type="text" name="eid" value="<?php echo $data["eid"]; ?>"disabled> </td>
					 <td colspan="10"><input type="text" name="pname" value="<?php echo $data["pname"]; ?>"disabled> </td>

					 
</tr>

						
						


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Admission Date:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Phone NO:</strong></label></td>
						
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" value="<?php echo $data["page"]; ?>"disabled> </td>  
             		<td colspan="5"> <input type="text" name="adm" value="<?php echo $data["adate"]; ?>"disabled> </td>					 	
					 <td colspan="5"><input type="text" name="psex" value="<?php echo $data["psex"]; ?>"disabled></td>
					 <td colspan="5"><input type="text" name="pphone" value="<?php echo $data["pphone"]; ?>"disabled></td>  

			    	 
					 </tr>


						
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Doctor's NOTE</strong></label></td> </tr>




<tr>



<tr><td colspan="20"><label><strong>Participation Level:</strong></label></td></tr>
<tr>
					 <td colspan="20">
	
	

<input list="browsers1" name="plevel" size=60% class="form-control" autocomplete="off" id="pmrn" onkeyup="GetDetail(this.value)" required>
  <datalist id="browsers1">

						<option value=''>-Select-</option>
<option value='Surgeon'>Surgeon</option>
<option value='Assist'>Assist</option> </datalist></td>
      
    </select>

    
</td></tr>
		  


<tr><td colspan="20" id="uu4"><label><strong>Procedure Name:</strong></label></td>  </tr>


<tr><td colspan="20" id="uu3">




    
	
	

<select id="pmrn" onchange="GetDetail1(this.value)" class="con_charge" name='proname' placeholder="Select Procedure Name" style="color:green;font-size:22px; font-weight:bold">
	
	
	<option value=''>-Select-</option>
				
			<?php 
			$sql = "select * from `privilege` where dname='$full' and status in ('Approved','Waiting For CFO Approval')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->id."'>".$row->pname."</option>";
				}
			}
			?>
    </select>


	<link rel="stylesheet"
			href=
"prescription/prescription/jsnew_1/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"prescription/prescription/jsnew_1/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"prescription/prescription/jsnew_1/select2.min.css" />			
			<script>
$(document).ready(function() {
    $('.con_charge').select2();
});
</script>
			
</td></tr>


<tr><td colspan="20">



									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      
									  
									  <a target='_blank' href="otphotonew?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$id"; ?>"><b>Upload Image<b></a>&nbsp;&nbsp;
									   <a target='_blank' href="idocmeditestdoc?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$in_eid"; ?>"><b>Running Medication(Inpatient)<b></a>
									   &nbsp;&nbsp;
									   <a target='_blank' href="idocinves?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$in_eid"; ?>"><b>Investigation(Inpatient)<b></a>
									   &nbsp;&nbsp;
									   <a target='_blank' href="idocdetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$in_eid"; ?>&dname=<?php echo "$full"; ?>"><b>Inpatient dashboard<b></a>
									   &nbsp;&nbsp;
									   <a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>"><b>All Reports<b></a>
									   &nbsp;&nbsp;
									   <a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>"><b>All Records<b></a>
									  </td>
									  
									  </tr>
									  

							

		  
									  
									  
									  
									  <tr>




<td colspan="20" align="center"><textarea rows="30"  name="sreport" value="" id="uu"></textarea></td>

</tr>

<input type="hidden" name="pnote" id="sformat" class="test" cols="30" rows="10">


<tr><td colspan="20" bgcolor="lightgreen" id="uu2"><label><strong>Post Operative Order:</strong></label></td></tr>

	
<tr><td colspan="20"><textarea id="uu1" name="inorder" rows="25" ></textarea></td>  </tr>


<tr><td colspan="20" align="left"bgcolor="lightgreen"><label><strong>Charge</strong></label></td> </tr><tr>
<td colspan="20" ><input type="number" name="charge" id="uu5" value="" readonly>
<input type="number" name="charge1" id="uu6" value="" hidden>

</td>
</tr>

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Note By</strong></td>
      <td colspan="1" align="center"><strong>Date </strong></td>
      
      <td colspan="3" align="center"><strong>Procedure Name</strong></td>
	  <td colspan="7" align="center"><strong>Surgery Note</strong></td>
	  <td colspan="2" align="center"><strong>Charge</strong></td>
	  <td colspan="1" align="center"><strong>Delete</strong></td>
	  

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from cath_charge where pmrn= '$pmrn' and eid='$id' and c_status=''order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["sname"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["otdate"]; ?></td>  
      
	  <td align="center"colspan="3"><?php echo $row["pname"].' '.$row["others"]; ?></td>
	  <td align="center"colspan="7"><?php echo $row["sreport"]; ?></td>
	  	  <td align="center"colspan="2"><?php echo $row["charge"]; ?></td>
      
	  


	  
	   <?php 
	  $id1=$row["id"];
	  $user7=$row["sname"];
	  $url7 = "cath_note_delete?pmrn=$pmrn&id=$id1&id1=$id"; 
	  
	  if($user7==$full){echo"
	  <td colspan='1' align='center'><a href='$url7'><strong>Delete</strong></a></td>
	  ";} else{echo"<td colspan='1'></td>";}?>	
	  
      </tr>
    <?php $count++; } ?>
</table>

<td colspan="10"><a target='_blank' href="newotnote?eid=<?php echo "$id"; ?>&pmrn=<?php echo "$pmrn"; ?>"><img src="print.png" title="Print Report" width="40" height="50" /></a></td>	
<td colspan="10"><a target='_blank' href="newotnote_new?eid=<?php echo "$id"; ?>&pmrn=<?php echo "$pmrn"; ?>">New Format</a></td>	
</form>
</body>

</html>


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("sformat").value = "";

				//document.getElementById("charge").value = "";
				//document.getElementById("porder").value = "";
				
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
						
						//document.getElementById
							//("sformat").value = myObj[0];
						
						var rt=document.getElementById
							("sformat").value = myObj[0];
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							//document.getElementById(
							//"charge").value = myObj[1];
							
							//document.getElementById(
							//"porder").value = myObj[2];
				
if(str === "Assist"){
    uu.hidden = true;
	uu.disabled=true;
	
	uu1.hidden = true;
	uu1.disabled=true;
	
	uu2.hidden = true;
	uu2.disabled=true;
	
	uu3.hidden = true;
	uu3.disabled=true;
	
	uu4.hidden = true;
	uu4.disabled=true;

	uu5.hidden = true;
	uu5.disabled=true;

	uu6.hidden = false;
	uu6.disabled=false;

   // lastNameInput.disabled = true;
  }				

  
  


  
	
else if(str === "Surgeon"){
    uu.disabled = false;
	uu.hidden = false;
	
	uu1.hidden = false;
	uu1.disabled=false;
	
	uu2.hidden = false;
	uu2.disabled=false;
	
	uu3.hidden = false;
	uu3.disabled=false;
	
	uu4.hidden = false;
	uu4.disabled=false;

	uu5.hidden = false;
	uu5.disabled=false;

	uu6.hidden = true;
	uu6.disabled=true;
   // lastNameInput.disabled = true;
  }	  
  
 
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "inves_find.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
	
	
	
	<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail1(str) {
			if (str.length == 0) {
				//document.getElementById("sformat").value = "";

				document.getElementById("exampleTextarea22").value = "";
				//document.getElementById("porder").value = "";
				
				return;
			}
			else {
//var variables = "pmrn=Regular Visit&pd=$pd";
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
						
						//document.getElementById("porder").value = myObj[1];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							//document.getElementById("exampleTextarea22").value = myObj[0];
							
							document.getElementById("uu").value = myObj[0];
							document.getElementById("uu1").value = myObj[1];
							document.getElementById("uu5").value = myObj[2];
							
							//document.getElementById("pd").value = myObj[2];
							
							
							//CKEDITOR.instances["exampleTextarea22"].setData(myObj[0]);
							
							
							
					}
				};
//var variables = "pmrn=str&string=$pd";

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "ot_pull_new.php?pmrn=" + str + "&porder=<?php echo $full;?>", true);
//				xmlhttp.open("GET","getuser.php?q=" + q + "&r=" + r, true);

				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	