<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="endo"){
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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];


//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM endopapp WHERE `ID`='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$pname=$result9["pname"];
$ieid=$result9["ieid"];
$pmrn_int=(int)$_REQUEST['pmrn'];
$eid=(int)$_REQUEST['eid'];
$api_adminssion_no=(int)$result9['OUT_ADMISSION_NO_PK'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge='' and eid='$ieid'");
$data = mysqli_fetch_assoc($query4);
$ward=$data['room'];
$bed1=$data['room1'];
$adoc=$data['adoc'];
$pname=$data['pname'];
//$api_adminssion_no=(int)$data['OUT_ADMISSION_NO_PK'];


?>


<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
$rfid=$_REQUEST['medi1'];
$pdos=(int)$_REQUEST['pdos'];
$tqty=(int)$_REQUEST['tqty'];



/*$treat=explode(',',$medi12);
	
	$medi1=$treat[0];
	$rfid=$treat[1];
*/

//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
//$id=$row1["id"];




$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


$sel96="SELECT * FROM medi_stock WHERE `sno`='$rfid' and status in('Served','Partially Served');";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=(int)$b_chk_m['add_qty'];
$m_qty1=(int)$b_chk_m['add_qty']-$pdos;
	 
$tfid=$b_chk_m['rfid'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
$u_price=(int)$b_chk_m['u_price'];
$adate= date('Y-m-d');
$code=(int)$b_chk_m['code'];	 
$medi1=$b_chk_m['g_name'];
$tprice=(int)$b_chk_m['u_price']*$pdos;
$medi1_details=$b_chk_m['g_name'].'-ENDOSCOPY';


$sel9=mysqli_query($db,"SELECT * FROM endohoscharge1 where pmrn= '$pmrn' and eid='$eid' and code='$code' and rfid='$rfid' and adate='$adate'");
$result9 = mysqli_fetch_assoc($sel9);
$pdos1=(int)$result9['pdos'];
$pdos2=(int)$result9['pdos']+$pdos;
$iid=$result9['id'];
$tprice2=(int)$b_chk_m['u_price']*$pdos2;


$sel990="SELECT * FROM medi_stock WHERE `sno`='$rfid' and add_qty>0  and status in('Served','Partially Served');";
$result990 = mysqli_query($con,$sel990);



$sel95 = "SELECT * from medicine where code='$code' and c_code=''"; 
$result95 = mysqli_query($con,$sel95);
//$charge_code = mysqli_fetch_assoc($con,$result95);


$sel956 = "SELECT * from medicine where code='$code' and c_code=''"; 
$result956 = mysqli_query($con,$sel956);
$charge_code = mysqli_fetch_assoc($con,$result956);

//$c_code=$charge_code['c_code'];*/

$qq1 = mysqli_query($db,"select * from medicine where code='$code' and c_code!=''");
			$dd1 = mysqli_fetch_assoc($qq1);
			//$c_code=$dd1['c_code'];

      $c_code=(int)$dd1['c_code'];
			$new_u_price=(int)$dd1['uprice']*$pdos;
			$new_price=(int)$dd1['uprice'];
      $charge_price=(int)$dd1['charge_price'];
      $charge_name=$dd1['charge_name'];
$new_charge_price=(int)$charge_price*$pdos;
$new_charge_price1=(int)$charge_price*$pdos2;

$t_price3=(int)$pdos2*$new_price;

$new_charge_price_api=(int)$charge_price;
$charge_name_details=$dd1['charge_name'].'-ENDOSCOPY';

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


$sql = "insert into endohoscharge1 (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`rfid`,`adate`,`brand`,`price`,`ieid`) values 
('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$code','$rfid','$adate','$bb_name','$tprice','$ieid')";


$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$rfid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`) values
			('$g_name','$pdos','$u_price','$tprice','$user','$adate','$bb_name','$pmrn','$eid','$rfid','Sale','ENDOSCOPY','$code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);


if ($conn->query($sql) === TRUE) {
$last_id = $conn->insert_id;



      $url ='http://192.168.100.254:3038/api/billinvoice/';


      //Data Sending To API using CURL Method
      
        $data = array(
        "in_invoice_date"=> "30-JUL-2025",
        "in_invoice_datetime"=> "30-JUL-2025",
        "in_module_no_fk"=> 22,
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
         
        $ins_query="UPDATE endohoscharge1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
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


$sql = "insert into endohoscharge1 (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`rfid`,`adate`,`brand`,`reuse`,`price`,`ieid`) values 
('$pmrn','$pname','$charge_name','$eid','$date1','$pdos','$c_code','$rfid','$adate','$bb_name','Yes','$new_charge_price','$ieid')";


if ($conn->query($sql) === TRUE) {
     $last_id = $conn->insert_id;
   




$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`,`reuse`) values
			('$charge_name','$pdos','$charge_price','$new_charge_price','$user','$adate','$bb_name','$pmrn','$eid','$rfid','Sale','ENDOSCOPY','$c_code','Yes')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);




      $url ='http://192.168.100.254:3038/api/billinvoice/';


            //Data Sending To API using CURL Method
            
                $data = array(
              "in_invoice_date"=> "30-JUL-2025",
              "in_invoice_datetime"=> "30-JUL-2025",
              "in_module_no_fk"=> 22,
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
                 
                $ins_query="UPDATE endohoscharge1 SET api_status='1', invoice_no='$invoice_no' WHERE id='$last_id'";
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
  <meta charset="UTF-8">
  <title>Medicine</title>
  
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
<td colspan="5" align="center"><label><strong>Available QTY</strong></label></td> 
<td colspan="5" align="center"><label><strong>Select Used QTY</strong></label></td> 


</tr>
<tr>
<td colspan="10" align="center"><input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="browsers2" autocomplete="off" name='medi1' required style="font-weight: bold;font-size:22px;color:green">
  <datalist id="browsers2">

						<option value=''>-Select Items</option>
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `medi_stock` where add_qty>0 and location='ENDOSCOPY' and status in('Served','Partially Served')";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['sno']; ?>"><?php echo $row['g_name'].','.$row['sno']; ?></option>
        <?php } ?>  </datalist></td>
			
			
			<td colspan="5"><input type="text" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>
			<td  colspan="5"align="center"><input type="number" name="pdos" class="form-control" required>
  
</td>



</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td>
	  
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>ITEM</strong></td>
      	  <td colspan="5" align="center"><strong>QTY</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from endohoscharge1 where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
			      
				 <td align="center" colspan="2"><a href="endohosdelete1_new?id=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&id1=<?php echo "$id"; ?>&rfid=<?php echo $row['rfid']; ?>&pdos=<?php echo $row['pdos']; ?>&reuse=<?php echo $row['reuse']; ?>&admission_no=<?php echo $api_adminssion_no;?>&invoice_no=<?php echo $row['invoice_no'];?>&code=<?php echo $row['code'];?>">DELETE</a></td>

  	  

	  
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
				xmlhttp.open("GET", "procedure_stock_test2.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  