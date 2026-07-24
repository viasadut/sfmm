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

$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);


$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn'");
$data = mysqli_fetch_assoc($query4);
//$adate=$data45['date'];
$pname=$data["pname"];  
$dd=$data["adoc"];  

$id=$_REQUEST['id'];
$sno='O'.$id;
$eid=$_REQUEST['eid'];


$query45 = mysqli_query($db,"select * from iinves where id='$id'");
$data45 = mysqli_fetch_assoc($query45);
$adate=$data45['date'];
$rinfusion=$data45['infusion'];
$redate=date('Y-m-d');
$link=$data45['link'];
$linkv=$data45['linkv'];
$reportv=$data45['reportv'];
$report=$data45['report'];
$code=(int)$data45['code'];
$pmrn=$data45['pmrn'];
$pmrn_int=(int)$data45['pmrn'];

$price_count = "SELECT * FROM radio where code= '$code'"; 
$result_count = mysqli_query($con, $price_count) or die(mysqli_error());
$row_count = mysqli_fetch_assoc($result_count);

$hos_price=(int)$row_count['hos_price'];
$doc_price=(int)$row_count['doc_price'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);
$ward=$data['room'];
$bed1=$data['room1'];
$adoc=$data['adoc'];
$pname=$data['pname'];
echo $api_adminssion_no=(int)$data['OUT_ADMISSION_NO_PK'];




?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['bsearch']))
{



//$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$result5=$_REQUEST['result'];
$dtime= date('d/m/Y H:i:s');
$date_d= date('Y-m-d');
$per_doc=$_REQUEST['per_doc'];
//$id1=$_REQUEST['ID'];

$adoc_details=$per_doc.'-Reporting Charge'.'('.$rinfusion.')';

$queryd = mysqli_query($db,"select * from doctor where dname='$per_doc'");
$datad= mysqli_fetch_assoc($queryd);
$dcode=$datad['dcode'];
//$code=(int)$datad['code'];

$queryd1 = mysqli_query($db,"select * from doctor_code where dcode='$dcode' and dname like '%PROCEDURE%'");
$datad1= mysqli_fetch_assoc($queryd1);

$doc_code=(int)$datad1['ccode'];



$query = "UPDATE iinves set rby='$user',rtime='$dtime',rdate='$date_d', rstatus='RECEIVED', status='RECEIVED',per_doc='$per_doc',price='$hos_price',doc_price='$doc_price' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$url ='http://192.168.100.254:3038/api/billinvoice/';


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
    "in_ITEM_NAME"=> ["$rinfusion"],
    "in_ITEMTYPE_NO_FK"=> [1],
    "in_ITEM_QTY"=> [1],
    "in_ITEM_MU"=>[""],
    //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
    "in_ITEM_RATE"=> [$hos_price],
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
  
 echo $response = curl_exec($ch);
  
  
  if(curl_errno($ch)){
      echo 'Curl error: ' . curl_error($ch);
  }
  
  curl_close($ch);
  
echo json_encode($data);
  
  $decoded_response = json_decode($response, true); // Decode the JSON response
  
  //Setting Other Logic after receving the decoded response 
  $invoice_no=$decoded_response['invoice_id'];
  
   if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
     
    $api_query = "update iinves set api_status='1', invoice_no='$invoice_no' where id='".$id."'"; 
  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
     
     
   }



   $url ='http://192.168.100.254:3038/api/billinvoice/';
  
  
   //Data Sending To API using CURL Method
   
     $data = array(
     "in_invoice_date"=> "$formattedDate",
     "in_invoice_datetime"=> "$formattedDate",
     "in_module_no_fk"=> 2,
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
     "in_ITEM_NO_FK"=> [$doc_code],
     "IN_ITEM_BATCH_FK"=>[""],
     "IN_ITEM_EXPIRY_DT"=>[""],
     "in_ITEM_NAME"=> [$adoc_details],
     "in_ITEMTYPE_NO_FK"=> [1],
     "in_ITEM_QTY"=> [1],
     "in_ITEM_MU"=>[""],
     //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
     "in_ITEM_RATE"=> [$doc_price],
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
   
   echo $response = curl_exec($ch);
   
   
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
      
      $api_query = "update iinves set doc_api_status='1', doc_invoice_no='$invoice_no' where id='".$id."'"; 
   $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
    }


$url = "tescath_new";
header("Location: tescath_new"); 



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

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
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
    max-width: 1200px;
  }

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

<form action="" method="POST">
<h1 align="center"style="background-color:lightgreen;">SPD RECEIVE PANEL</h1>

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $dd;?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $pmrn; ?></td>
				<td colspan="3"><?php echo $eid; ?> </td>
					 <td colspan="12"><?php echo $data["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						
	
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data6["page"]; ?></td>  
             		<td colspan="3"><?php echo $data45["date"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["psex"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  
					 
 
					 </tr>

						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Select Performing Consultant Name</strong></label></td> 
<td colspan="2" align="center"><label><strong>Order Date</strong></label></td> 
<td colspan="8" align="center"><label><strong>Investigation</strong></label></td> 
</tr>
<tr>
<td colspan="10"><select name="per_doc"  required>
			        
					<option value=''>-Select-</option>
					<?php
            require('db1.php');
            $uname = '';
            $query_1 = "select * from `privilege` where status in ('Approved','Waiting For CFO Approval') and pname='$rinfusion'";
            $result_1 = mysqli_query($con, $query_1);
            while($row_1 = mysqli_fetch_array($result_1)) {
        ?>
            <option value="<?php echo $row_1['dname'];?>"><?php echo $row_1['dname']; ?></option>
        <?php } ?>
					
					
					</select></td>
<td colspan="2" align="center"><input type="text"  name="odate" required value="<?php echo $data45["ndate"]; ?>" readonly/></td>
<td colspan="8" align="center"><input type="text" name="otime" required value="<?php echo $data45["infusion"]; ?>" readonly/></td>

</tr> 


<tr>
		<td colspan="20"align="right"><button type="submit" name="bsearch">RECEIVE</button></td>
	  
</tr>
		
	  

</table>


</form>
</body>

</html>
