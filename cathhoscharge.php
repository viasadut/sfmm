<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
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

$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
$type=$_REQUEST['type'];


//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM cath_receive WHERE `id`='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$pname=$result9["pname"];
$ieid=$result9["ieid"];  

$ot_charge=$result9['charge_confirm'];  




$query45 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge!='Discharged' order by id desc");
$data5 = mysqli_fetch_assoc($query45);
$in_eid=$data5['eid']; 
$pmrn_int           = (int)$data5['pmrn'];
	//$eid            = $result_patient['eid'];
	$admission_id= (int)$data5['OUT_ADMISSION_NO_PK'];
$api_adminssion_no_char=$data5['OUT_ADMISSION_NO_PK'];
	$adoc=$data['adoc'];
	$adoc_details=$full.'-Cathlab Charge';







$sel_all=mysqli_query($db,"SELECT SUM(qty) FROM cathhoscharge WHERE pmrn= '$pmrn' and ieid='$ieid' and eid='$eid'");
$result_all = mysqli_fetch_assoc($sel_all);
$tprice=$result_all['SUM(qty)'];

$url = "cathhoscharge?pmrn=$pmrn&eid=$eid&id=$id&type=$type&dname=$full";
//$url=$_SERVER['REQUEST_URI'];
header("Refresh: 900; URL=$url");
?>


<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
$medi6=$_REQUEST['item'];
$pdos=(int)$_REQUEST['pdos'];
$remarks=$_REQUEST['remarks'];


//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
//$id=$row1["id"];


/*$sel990=mysqli_query($db,"SELECT * FROM disposable WHERE `disname`='$medi1';");
$result990 = mysqli_fetch_assoc($sel990);
$code=$result990['dcode'];
$btype=$result990['type'];
$price=$result990['price']*$pdos;
*/

$sel990=mysqli_query($db,"SELECT * FROM hits_list WHERE `id`='$medi6';");
$result990 = mysqli_fetch_assoc($sel990);

//echo $medi1=$result990['item_name'];
$medi1 = str_replace("'", "''",$result990['item_name']);
$medi1_details = $medi1.' - '.'Cathlab-Others';
$code=(int)$result990['code'];
$btype=$result990['sub_type'];
$price=(int)$result990['ipd_charge']*$pdos;
$u_price=(int)$result990['ipd_charge'];

$ip=$result990["ip"];
$op=$result990["op"];
$acct_code=$result990["acode"];
$ccentre=$result990["ccentre"];



/*
$sel_p=mysqli_query($db,"SELECT COUNT(id) FROM disposable WHERE `disname`='$medi1';");
$result_p = mysqli_fetch_assoc($sel_p);
$dis_pack=$result_p['COUNT(id)'];

*/

$sel_p=mysqli_query($db,"SELECT COUNT(id) FROM set_package WHERE `iname`='$medi1';");
$result_p = mysqli_fetch_assoc($sel_p);
echo $dis_pack=$result_p['COUNT(id)'];


/*if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }*/
//else {

  if($dis_pack<=0){


/*    $ins_query1="insert into cathhoscharge (`dname`,`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`type`,`ieid`,`code`,`qty`,`ins`,`remarks`,`ctype`) values 
('$full','$pmrn','$pname','$medi1','$eid','$date1','$pdos','$type','$ieid','$code','$price','$btype','$remarks','Others')";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/


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


$sql = "insert into cathhoscharge (`dname`,`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`type`,`ieid`,`code`,`qty`,`ins`,`remarks`,`ctype`,`ip`,`op`,`acct_code`,`ccentre`) values 
('$full','$pmrn','$pname','$medi1','$eid','$date1','$pdos','$type','$ieid','$code','$price','$btype','$remarks','Others','$ip','$op','$acct_code','$ccentre')";



if ($conn->query($sql) === TRUE and $ieid>0) {
	$last_id = $conn->insert_id;



  $date=date('Y-m-d');
  $tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$code'");
$tb_result = mysqli_fetch_assoc($tb_q);
//$tb_data=$tb_result['tb_op'];

if($tb_result['tb_op']!='')
{
  $tb_data=$tb_result['tb_op'];
}

else if($tb_result['tb_op']=='')
{
  $tb_data=$tb_result['tb_ip'];
}

$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','$tb_data','$date','$price','CATHLAB')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','DR','111999','$date','$price','CATHLAB')";
mysqli_query($con,$ins_query2) or die(mysql_error());


  //$url ='http://192.168.100.254:3038/api/billinvoice/';


  //Data Sending To API using CURL Method
  
    $data = array(
    "in_invoice_date"=> "30-JUL-2025",
    "in_invoice_datetime"=> "30-JUL-2025",
    "in_module_no_fk"=> 2,
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
    "in_ITEM_NAME"=> ["$medi1_details"],
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
     
    $ins_query="UPDATE cathhoscharge SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
  mysqli_query($con,$ins_query) or die(mysql_error());
     
   }


}

header("cathhoscharge?pmrn=$pmrn&eid=$eid&id=$id&type=$type&dname=$full");
}
  
  else if($dis_pack>0){

  //  echo "test";

    $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

    $query15 = mysqli_query($db,"select * from package_inves where package_name='$medi1' and status='Active'");
    while($data15 = mysqli_fetch_assoc($query15))
    //while($row = mysqli_fetch_assoc($result)) 
    {
    
      //$pack_name=$data15["package_name"];
    $ii=$data15["iname"];
    $p_price=(int)$data15["p_price"];
    $pdos=(int)$data15["qty"];
    $price=$data15["p_price"];
    $code=(int)$data15["code"];
    $btype=$data15['type'];
    $medi1_details = $ii.' - '.'Cathlab-Package';



    $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM hits_list WHERE `code`='$code';");
$result1 = mysqli_fetch_assoc($sel1);
//$medi1=$result1['item_name'];
$medi1 = str_replace("'", "''",$result1['item_name']);
//$dcode=(int)$result1["code"];
//$price=(int)$result1["ipd_charge"];
//$sub_type=$result1["sub_type"];

$ip=$result1["ip"];
$op=$result1["op"];
$acct_code=$result1["acode"];
$ccentre=$result1["ccentre"];
/*   $ins_query14="insert into cathhoscharge (`dname`,`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`type`,`ieid`,`code`,`qty`,`ins`,`ctype`) values 
('$full','$pmrn','$pname','$ii','$eid','$date1','$pdos','$type','$ieid','$code','$price','$btype','Package')";
mysqli_query($con,$ins_query14) or die(mysql_error());
  */  




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

$sql = "insert into cathhoscharge (`dname`,`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`type`,`ieid`,`code`,`qty`,`ins`,`ctype`,`ip`,`op`,`acct_code`,`ccentre`) values 
('$full','$pmrn','$pname','$ii','$eid','$date1','$pdos','$type','$ieid','$code','$price','$btype','Package','$ip','$op','$acct_code','$ccentre')";



if ($conn->query($sql) === TRUE and $ieid>0) {
	$last_id = $conn->insert_id;



  
  $date=date('Y-m-d');
  $tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$code'");
$tb_result = mysqli_fetch_assoc($tb_q);
//$tb_data=$tb_result['tb_op'];

if($tb_result['tb_op']!='')
{
  $tb_data=$tb_result['tb_op'];
}

else if($tb_result['tb_op']=='')
{
  $tb_data=$tb_result['tb_ip'];
}

$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','$tb_data','$date','$price','CATHLAB')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','DR','615100','$date','$price','CATHLAB')";
mysqli_query($con,$ins_query2) or die(mysql_error());


  //$url ='http://192.168.100.254:3038/api/billinvoice/';


  //Data Sending To API using CURL Method
  
    $data = array(
    "in_invoice_date"=> "30-JUL-2025",
    "in_invoice_datetime"=> "30-JUL-2025",
    "in_module_no_fk"=> 2,
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
    "in_ITEM_NAME"=> ["$medi1_details"],
    "in_ITEMTYPE_NO_FK"=> [1],
    "in_ITEM_QTY"=> [$pdos],
    "in_ITEM_MU"=>[""],
    //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
    "in_ITEM_RATE"=> [$price],
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
     
    $ins_query="UPDATE cathhoscharge SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
  mysqli_query($con,$ins_query) or die(mysql_error());
     
   }
  }
    

  }
  	

header("cathhoscharge?pmrn=$pmrn&eid=$eid&id=$id&type=$type&dname=$full");
//header("Refresh: 0; url=your_page.php"); // Refresh after 5 seconds


}

else {

    echo "something went wrong";
}
}
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM alltest WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <title>Sign Up Form</title>
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
}
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
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

<body>

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


<form action="" method="post">
        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>ADD HOSPITAL CHARGES</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Select Used Items</strong></label></td> 
<td colspan="5" align="center"><label><strong>Select Used QTY</strong></label></td> 
<td colspan="5" align="center"><label><strong>Remarks</strong></label></td> 


</tr>
<tr>
<td colspan="10" align="center">




<select class="con_charge21"
                    name="item" id="con_charge1" onchange="GetDetail(this.value)" required width="500px;">

						<option value=''>---Select--</option>


						


            
				<?php 


/*$sql = "select * from `set_package` where status='Approved' and iname='CAG PACKAGE'";
$res = mysqli_query($con, $sql);
if(mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_object($res)) {
    echo "<option value='".$row->iname."'>".$row->iname."</option>";
  }
}
*/

/*			$sql76 = "select * from `disposable`";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->disname."'>".$row76->disname."</option>";
				}
			}

  */    
			?>  </select>


<script>
        $(document).ready(function(){

            $("#con_charge1").select2({
                ajax: {
                    url: "search_hits_data.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
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
			<script>
$(document).ready(function() {
    $('.con_charge1').select2();
});
</script>

      
      </td>
			
			<td  colspan="5"align="center"><input type="number" name="pdos" class="form-control" required>
  <datalist id="browsers11">

						<option value=''>-Select Quantity-</option>
				 </datalist>
</td>

<td  colspan="5"align="center"><input type="text" name="remarks" class="form-control">
  

	
</td>

</tr>			        


    <?php if($ot_charge=='')
{ echo'<tr>
<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td></tr>';}

else {
	
	echo '<tr><td colspan="20"align="right"><button type="submit" name="Submit1" disabled><font size="4.5" color="#FF000"><b>Charge Already Confirmed</button></td></tr>';
}
	  ?>
	  

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>PMRN</strong></td>
     	  <td colspan="9" align="center"><strong>Item</strong></td>
      	  <td colspan="3" align="center"><strong>QTY</strong></td>
          <td colspan="2" align="center"><strong>Price</strong></td>
		      <td colspan="1" align="center"><strong>Remarks</strong></td>  
          <td colspan="1" align="center"><strong>Type</strong></td>	  
          <td colspan="1" align="center"><strong>Delete</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from cathhoscharge where pmrn= '$pmrn' and ieid='$ieid' and eid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="9"><?php echo $row["medi"]; ?></td>
				        
                <td align="center"colspan="3"><?php echo $row["pdos"]; ?></td>
                <td align="center"colspan="2"><?php echo $row["qty"]; ?></td>
                <td align="center"colspan="1"><?php echo $row["remarks"]; ?></td>
                <td align="center"colspan="1"><?php echo $row["ctype"]; ?></td>
				 

         <?php if($ot_charge=='')
{ echo'

			      
				 <td align="center" colspan="2"><a href="cathhosdelete1?id='.$id.'&pmrn='.$row['pmrn'].'&dname='.$dname.'&eid='.$eid.'&ieid='.$ieid.'&type='.$type.'&ID='.$id.'&rid='.$row['id'].'&pdos='.$row["pdos"].'&admission_no='.$admission_id.'&invoice_no='.$row['invoice_no'].'&code='.$row['code'].'&price='.$row['qty'].'">DELETE</a></td>';
				 
}
				 
				 else {
				echo '<td align="center" colspan="2">Charge Already Confirmed</a></td>';	 
					 
				 }

  	  
	  
	  ?>
  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><span style="font-size:22px; color:red;font-weight:bold;">Total: <?php echo $tprice;?></span></td></tr>
</table>
</form>
</body>

</html>
