<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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
$time=date('Y-m-d H:i:s');	 
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];




//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM ot WHERE `id`='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$pname=$result9["pname"];
//$eid=$result9["eid"];
$ot_charge=$result9['ot_charge_status'];    





$patient_query  = "SELECT * FROM `inpatient` WHERE pmrn='$pmrn' and discharge='' order by id desc";
    $run_patient    = mysqli_query($con,$patient_query);
    $result_patient = mysqli_fetch_assoc($run_patient);

    //$pmrn           = $result_patient['pmrn'];
    $pmrn_int           = (int)$result_patient['pmrn'];
	$ieid            = $result_patient['eid'];
	$admission_id= (int)$result_patient['OUT_ADMISSION_NO_PK'];
	
?>




<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
$rfid=$_REQUEST['medi1'];
$pdos=(int)$_REQUEST['pdos'];
$tqty=(int)$_REQUEST['tqty'];

$route=$_REQUEST['route'];
$remarks=$_REQUEST['remarks'];
$mtime=$_REQUEST['mtime'];
$location=$_REQUEST['location'];



/*$treat=explode(',',$medi12);
	
	$medi1=$treat[0];
	$rfid=$treat[1];

*/

//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
//$id=$row1["id"];

$sel96="SELECT * FROM medi_stock WHERE `sno`='$rfid' and status in('Served','Partially Served');";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-$pdos;
	 
$tfid=$b_chk_m['rfid'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
$u_price=(int)$b_chk_m['u_price'];
$adate= date('Y-m-d');
$code=$b_chk_m['code'];
$medi1=$b_chk_m['g_name'];	 
//$t_price=(int)$u_price*$pdos;
$medi1_details=$b_chk_m['g_name'].'-OT';


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM hits_list1 WHERE `code`='$code';");
$result1 = mysqli_fetch_assoc($sel1);
//$medi1=$result1['item_name'];
$ip=$result1["ip"];
$op=$result1["op"];
$acct_code=$result1["acct_code"];
$ccentre=$result1["ccentre"];


$sel9=mysqli_query($db,"SELECT * FROM othoscharge1 where pmrn= '$pmrn' and eid='$id' and code='$code' and rfid='$rfid' and ndate='$adate'");
$result9 = mysqli_fetch_assoc($sel9);
$pdos1=(int)$result9['pdos'];
$pdos2=(int)$result9['pdos']+$pdos;
$iid=$result9['id'];
//$t_price2=(int)$pdos2*$u_price;

$sel990="SELECT * FROM medi_stock WHERE `sno`='$rfid' and add_qty>0  and status in('Served','Partially Served');";
$result990 = mysqli_query($con,$sel990);

$sel95 = "SELECT * from medicine where code='$code' and c_code=''"; 
$result95 = mysqli_query($con,$sel95);
$charge_code = mysqli_fetch_assoc($result95);

$t_price=(int)$charge_code['uprice']*$pdos;

$t_price2=(int)$charge_code['uprice']*$pdos2;

//$c_code=$charge_code['c_code'];*/

$qq1 = mysqli_query($db,"select * from medicine where code='$code' and c_code!=''");
			$dd1 = mysqli_fetch_assoc($qq1);
			$c_code=(int)$dd1['c_code'];
			$new_u_price=(int)$dd1['uprice']*$pdos;
			$new_price=(int)$dd1['uprice'];
      $charge_price=(int)$dd1['charge_price'];
      $charge_name=$dd1['charge_name'];
      $charge_name_details=$dd1['charge_name'].'-OT';
$new_charge_price=(int)$charge_price*$pdos;
$new_charge_price1=(int)$charge_price*$pdos2;
$new_charge_price_api=(int)$charge_price;

$t_price3=(int)$pdos2*$new_price;




if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in your department Stock.."); ';
    echo '</script>';
    }
else if($row95=mysqli_num_rows($result95)>0  and $tqty>=$pdos)

{


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


     $sql = "insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`aqty`,`ins`,`time`,`mtime`,`nuser`,`ip`,`op`,`acct_code`,`ccentre`,`ieid`) values 
     ('$pmrn','$pname','$medi1','$bb_name','$pdos','$id','$date1','$rfid','$code','$adate','$route','$remarks','$location','$m_qty1','$t_price','$time','$mtime','$user','$ip','$op','$acct_code','$ccentre','$ieid')";
 
 

//$ins_query1="insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`aqty`,`ins`,`time`,`mtime`,`nuser`) values 
//('$pmrn','$pname','$medi1','$bb_name','$pdos','$id','$date1','$rfid','$code','$adate','$route','$remarks','$location','$m_qty1','$t_price','$time','$mtime','$user')";
//mysqli_query($con,$ins_query1) or die(mysql_error());
if ($conn->query($sql) === TRUE) {
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
values ('$last_id','CR','$tb_data','$date','$t_price','OT_MEDI')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','DR','615100','$date','$t_price','OT_MEDI')";
mysqli_query($con,$ins_query2) or die(mysql_error());

   

$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$rfid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`) values
			('$g_name','$pdos','$u_price','$t_price','$user','$adate','$bb_name','$pmrn','$id','$rfid','Sale','OT','$code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);




           // $url ='http://192.168.100.254:3038/api/billinvoice/';


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
	 
	$ins_query="UPDATE othoscharge1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
mysqli_query($con,$ins_query) or die(mysql_error());
	 
 }
}

}


else if($row95=mysqli_num_rows($result95)<=0)

{


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


     $sql = "insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`reuse`,`aqty`,`ins`,`time`,`mtime`,`nuser`,`ip`,`op`,`acct_code`,`ccentre`,`ieid`) values
     ('$pmrn','$pname','$charge_name','$bb_name','$pdos','$id','$date1','$rfid','$c_code','$adate','$route','$remarks','$location','Yes','$mm_qty','$new_charge_price','$time','$mtime','$user','$ip','$op','$acct_code','$ccentre','$ieid')";
 

 

     if ($conn->query($sql) === TRUE) {
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
values ('$last_id','CR','$tb_data','$date','$new_charge_price','OT_MEDI')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','DR','615100','$date','$new_charge_price','OT_MEDI')";
mysqli_query($con,$ins_query2) or die(mysql_error());



/*$ins_query1="insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`reuse`,`aqty`,`ins`,`time`,`mtime`,`nuser`) values
 ('$pmrn','$pname','$charge_name','$bb_name','$pdos','$id','$date1','$rfid','$c_code','$adate','$route','$remarks','$location','Yes','$mm_qty','$new_charge_price','$time','$mtime','$user')";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`,`reuse`) values
			('$charge_name','$pdos','$charge_price','$new_charge_price','$user','$adate','$bb_name','$pmrn','$id','$rfid','Sale','OT','$c_code','Yes')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);



          //  $url ='http://192.168.100.254:3038/api/billinvoice/';


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
              "in_ITEM_NO_FK"=> [$c_code],
              "IN_ITEM_BATCH_FK"=>[""],
              "IN_ITEM_EXPIRY_DT"=>[""],
              "in_ITEM_NAME"=> ["$charge_name_details"],
              "in_ITEMTYPE_NO_FK"=> [1],
              "in_ITEM_QTY"=> [$pdos],
              "in_ITEM_MU"=>[""],
              //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
              "in_ITEM_RATE"=> [$new_charge_price_api],
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
            
//            $response = curl_exec($ch);
            
            
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
     }




else{
echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Not Enough Quantity Available "); ';
    echo '</script>';
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
<meta charset="utf-8">
<title>View Records</title>
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Start The Blood?");
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
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>ADD HOSPITAL CHARGES</strong></label>
<br> <span style="font-size:20px; color:red;font-weight:bold;">***Pethidine Order Must Be Given By The Doctor***</span></td> </tr>
<tr><td colspan="5" align="center"><label><strong>Select Used Items</strong></label></td> 

<td colspan="2" align="center"><label><strong>Available QTY</strong></label></td> 
<td colspan="2" align="center"><label><strong>Select Used QTY</strong></label></td> 

<td colspan="2" align="center"><label><strong>Route</strong></label></td> 
<td colspan="4" align="center"><label><strong>Location</strong></label></td> 
<td colspan="2" align="center"><label><strong>Time</strong></label></td> 
<td colspan="3" align="center"><label><strong>Remarks</strong></label></td> 

</tr>
<tr>
<td colspan="5" align="center"><input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="browsers2" autocomplete="off" name='medi1' required style="font-weight: bold;font-size:22px;color:green">
  <datalist id="browsers2">

						<option value=''>-Select Items</option>
					<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `medi_stock` where add_qty>0 and location='OT Medicine Store' and status in('Served','Partially Served') and code!='51840419'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['sno']; ?>"><?php echo $row['g_name'].','.$row['sno']; ?></option>
        <?php } ?>  </datalist></td>


<td colspan="2"><input type="text" name="tqty" class="form-control" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>

		
			<td  colspan="2"align="center"><input type="number" name="pdos" class="form-control" required style="font-weight: bold;font-size:22px;color:green">
 
</td>


<td colspan="2">


<input list="rr10" name="route" class="form-control" required style="font-weight: bold;font-size:22px;color:green">
  <datalist id="rr10">

						<option value=''>-Select Route</option>
						<option value='Intravenous'>Intravenous</option>
						<option value='Intramuscular'>Intramuscular</option>
						<option value='Oral'>Oral</option>
						<option value='Per Rectal'>Per Rectal</option>
						<option value='Sub Cutaneous'>Sub Cutaneous</option>
						<option value='Infusion'>Infusion</option>
						<option value='Deep Intramuscular'>Deep Intramuscular</option>
						<option value='Eye'>Eye</option>
						<option value='Ear'>Ear</option>
						<option value='Epidural'>Epidural</option>
						<option value='Nebulizer'>Nebulizer</option>
						<option value='Inhaler'>Inhaler</option>
						<option value='Nose'>Nose</option>
						<option value='Local'>Local</option>
						<option value='Per Vaginal'>Per Vaginal</option>
			  </datalist>

</td>


<td colspan="4">



  <select id="rr10" name="location" required class="form-control">

						
						<option value='OT'>OT</option>
						<option value='Recovery'>Recovery</option>
						
			  </select>

</td>
<td colspan="2"><input type="text" name="mtime" id="" required value=""  style="font-weight: bold;font-size:22px;color:green" class="form-control"></td>
<td colspan="3"><input type="text" name="remarks" id="" required value=""  style="font-weight: bold;font-size:22px;color:green" class="form-control"></td>


</tr>			        

<tr>
		
				<?php if($ot_charge=='')
{ echo'
<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td>';}

else {
	
	echo '<td colspan="20"align="right"><button type="submit" name="Submit1" disabled><font size="4.5" color="#FF000"><b>Charge Already Confirmed</button></td>';
}
	  ?>

		
		
		
	  
</tr>



<?php
	
  $user=$_SESSION["sess_username"];
  $dd=date('m/d/Y');
  $count=1;
  $sel_query="Select * from otendomedi where pmrn= '$pmrn' and eid='$id'and status !='Cancel' and status1='Rupdated' order by `infusion` and `time` asc;";
  
  $result = mysqli_query($con,$sel_query);
  $result1 = mysqli_query($con,$sel_query);
  if($rowf=mysqli_fetch_assoc($result1)){
echo'
     <tr>
     <td colspan="1" align="center"><strong>S.No</strong></td>
    
     <td colspan="2" align="center"><strong>Order By</strong></td>
     <td colspan="2" align="center"><strong>Order Time</strong></td>
           <td colspan="10" align="center"><strong>Medicine</strong></td>
            <td colspan="3" align="center"><strong>Route</strong></td>
           <td colspan="1" align="center"><strong>Instruction</strong></td>
     
                        <td colspan="2" align="center"><strong>Implement</strong></td>
      

       </tr>
';

  }
  else {}
  
  while($row = mysqli_fetch_assoc($result)) 
  { ?>    <tr>
  
        <td align="center" colspan="1"><?php echo $count; ?></td>
        
        
      <td align="center"colspan="2"><?php echo $row["dname"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["ortime"]; ?></td>
        
      <td align="center"colspan="10"><?php echo $row["infusion"]; ?></td>
      <td align="center"colspan="3"><?php echo $row["root"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["instruc"]; ?></td>
      
       
      
      
  <td align="center" colspan="1">
  <input type="button" name="edit" value="Implement" id="<?php echo $row['id'];?>" class="btn btn-info btn-xs edit_data3">
  </td>
      
  
  
        </tr>
      <?php $count++; } ?>
  












<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>ITEM</strong></td>
      	  <td colspan="3" align="center"><strong>QTY In Hand</strong></td>
		  <td colspan="1" align="center"><strong>QTY</strong></td>
      <td colspan="1" align="center"><strong>Time</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$id=$_REQUEST["id"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from othoscharge1 where pmrn= '$pmrn' and eid='$id'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="3"><?php echo $row["aqty"]; ?></td>
						<td align="center"colspan="1"><?php echo $row["pdos"]; ?></td>
            <td align="center"colspan="1"><?php echo $row["mtime"]; ?></td>
			      
				  
				  
				  		  				<?php if($ot_charge=='')
{ echo'

			      
				 <td align="center" colspan="2"><a href="othosdelete1_new?id='.$row["id"].'&pmrn='.$pmrn.'&eid='.$id.'&rfid='.$row["rfid"].'&reuse='.$row["reuse"].'&pdos='.$row["pdos"].'&admission_no='.$admission_id.'&invoice_no='.$row['invoice_no'].'&code='.$row['code'].'&price='.$row['ins'].'">DELETE</a></td>';
				 
}
				 
				 else {
				echo '<td align="center" colspan="2">Charge Already Confirmed</a></td>';	 
					 
				 }

  	  
	  
	  ?>
				  
				 

  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>
</form>
</body>

</html>
<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("tqty").value = "";

				document.getElementById("uprice").value = "";
				document.getElementById("code").value = "";
				document.getElementById("qty").value = "";
				document.getElementById("ins").value = "";
				document.getElementById("pcode").value = "";
				//document.getElementById("pp").value = "";
				
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
						
						document.getElementById
							("tqty").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"uprice").value = myObj[1];
							
							
							
							document.getElementById(
							"code").value = myObj[2];
							
							document.getElementById(
							"ins").value = myObj[3];
							
							document.getElementById(
							"pcode").value = myObj[4];
							
							//document.getElementById(
							//"pp").value = myObj[3];
							
							//document.getElementById(
							//"qty").value = 0;
							if(myObj[0]>0){
							document.getElementById('tqty').style.color = "green";}
else {
							document.getElementById('tqty').style.color = "red";}							

					}
					
					
					
					
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "procedure_stock_test2_ot.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  



  <div id="dataModal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail3">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Medicine Order Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form3" name="frmMain23">  
					 
                     <label>Order By</label>                          
                          <input type="text" name="orderby" id="orderby" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">

                     <label>Patient MRN</label>                          
                          <input type="text" name="pmrn6" id="pmrn6" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">
                         

                                       
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="pname" class="form-control" size="15" readonly style="font-size:18px;color:green;font-weight:bold;">  
						   
						                           
                          <label>Medicine Name</label>  
                          <input type="text" name="mname" id="mname" class="form-control"  size="15" readonly style="font-size:18px;color:green;font-weight:bold;">  
						  
						  
						  <label>Order time</label>                          
                          <input type="text" name="odate" id="odate" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">

                          <label>Route</label>                          
                          <input type="text" name="route" id="route" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">
						  
						  <label>Instruction</label>                          
                          <input type="text" name="instruc" id="instruc" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">

                          
                          <label>Stock</label>  
						  
                                <input list="stock" name="dilu" id="dilu" class="form-control" autocomplete='Off'>
    <datalist id="stock">
  
                                <option value=''>-Select Dilution</option>
                      <?php 
                 /*$sql76 = "select * from `medi_stock` where location in ('ICU','NICU','5AB Medicine stock','5CD Medicine stock','6AB Medicine stock','6CD Medicine stock','HMD','Cathlab and SPD','5AB emergency trolley','5CD emergency trolley','6th Fl emergency trolley','Maternity Suite') and add_qty!='0'";
                 $res76 = mysqli_query($con, $sql76);
                 if(mysqli_num_rows($res76) > 0) {
                      while($row76 = mysqli_fetch_object($res76)) {
                           echo "<option value='".$row76->sno."'>".$row76->g_name.'-'.$row76->sno."</option>";
                      }
                 }*/
                 ?> 
                   </datalist>                          

                   <label>Location</label>  
                   <select id="rr10" name="location5" required class="form-control">

                   <option value=''>--Select--</option>						
						<option value='OT'>OT</option>
						<option value='Recovery'>Recovery</option>
						
			  </select>

                           <input type="hidden" name="employee_id3" id="employee_id3" />  
						   
						   <input type="hidden" name="pphone" id="pphone" />  
                                 <br/>
						  <label><input type="submit" name="insert" id="insert453" value="Insert" class="btn btn-success"></label>  
					 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form3')[0].reset();  
      });  
      $(document).on('click', '.edit_data3', function(){  
           var employee_id3 = $(this).attr("id");  
           $.ajax({  
                url:"ot_medi_search.php",  
                method:"POST",  
                data:{employee_id3:employee_id3},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn6').val(data.pmrn);  
                     $('#pname').val(data.pname);  
					 $('#odate').val(data.odate);  
					$('#instruc').val(data.instruc); 
					 $('#mname').val(data.infusion); 
					 $('#route').val(data.root); 
					 $('#orderby').val(data.dname); 
					 //$('#txtHint').val; 
                          
                     $('#employee_id3').val(data.id);  
                     $('#insert453').val("Confirm");  
                     $('#add_data_Modal3').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form3').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn6').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"execute_ot_order_api.php",  
                     method:"POST",  
                     data:$('#insert_form3').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form3')[0].reset();  
                          $('#add_data_Modal3').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
