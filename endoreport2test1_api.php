<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2.php?err=2');
    }
?>


<?php

require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
$user=$_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$eid1=$_REQUEST['eid'];
//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];



/*$query43 = "SELECT COUNT(pmrn) FROM endoreport where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;*/

$query = "SELECT * from endopapp where ID='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pd= $row['tname'];
$pdate= $row['adate'];
$pa= $row['page'];
$ps= $row['psex'];
$eid= $row['eid'];
$ieid=$row['ieid'];
//$pa= $row['padd'];
$api_adminssion_no_char=$row['OUT_ADMISSION_NO_PK'];
$api_adminssion_no=(int)$row['OUT_ADMISSION_NO_PK'];

$pmrn_int=(int)$_REQUEST['pmrn'];
$eid=(int)$_REQUEST['eid'];
$adoc=$row['dreffer'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge='' and eid='$ieid'");
$data = mysqli_fetch_assoc($query4);
$ward=$data['room'];
$bed1=$data['room1'];
//$adoc=$data['adoc'];
$pname=$data['pname'];
//$api_adminssion_no=(int)$data['OUT_ADMISSION_NO_PK'];
$adoc=$data['adoc'];
$emerid=$data['emerid'];
//$api_adminssion_no_char=$data['OUT_ADMISSION_NO_PK'];
//$adoc_details=$full.'-IPD Visit';
  
$queryd = mysqli_query($db,"select * from doctor where dname='$full'");
$datad= mysqli_fetch_assoc($queryd);
$dcode=$datad['dcode'];

?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$select=$_REQUEST['select'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$ptemp=$_REQUEST['ptemp'];
$find=$_REQUEST['find'];
$tname=$_REQUEST['tname'];
$date= date('Y/m/d');
$date1=date('m/d/Y');
$time=date("h:i:sa");
$daten=date('d/m/Y h:i:s');
$charge=(int)$_REQUEST['charge'];
$date11=date('Y-m-d');


$queryd1 = mysqli_query($db,"select * from doctor_code where dcode='$dcode' and dname like '%PROCEDURE%'");
$datad1= mysqli_fetch_assoc($queryd1);

$code=(int)$datad1['ccode'];

$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);

$adoc_details=$full.'-'.$tname;


$sel90="SELECT * FROM privilege WHERE `pname`='$tname' and dname='$full' and status in ('Approved','Waiting For CFO Approval');";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Procedure Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }
	
	
	else if(empty($_REQUEST['charge']))


{
	
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Charge Cannot Br Empty"); ';
    echo '</script>';
}	


else {


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

  
  $sql = "insert into ivisitendo (`pmrn`,`eid`,`pname`,`page`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`,`vtype`,`cdate`,`ieid`) values 
  ( '$pmrn','$eid','$pname','$page','$psex','$pphone','$daten','$full','$user','$charge','$tname','$date11','$ieid')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
  




$update="update endopapp set status='SEEN' where `ID`='$id'";
mysqli_query($con,$update);


$ins_query3="insert into endoreport (`dname`,`pmrn`,`pname`,`age`,`gender`,`pphone`,`dreffer`,`report`,`type`,`eid`,`status`,`rdate`,`r1date`,`find`,`rtime`,`ieid`,`charge`) 
values ('$select', '$pmrn','$pname','$page','$psex','$pphone','$dname','$cdetails','$tname','$eid','SEEN','$date','$date1','$find','$time','$ieid','$charge')";
mysqli_query($con,$ins_query3) or die(mysql_error());




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
     
     $api_query = "update ivisitendo set api_status='1', invoice_no='$invoice_no' where id='".$last_id."'"; 
  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
   }
}
    }
	  header("Location:endoreport2test1?pmrn=$pmrn&eid=$eid1&ID=$id");
}

?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>

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
  max-width: 2000px;
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
    max-width: 2000px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
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


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='endohome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">OUTPATIENT RECORD </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="viewradrecord?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo $row['dreffer'];?>"><b>See Clinical Details<b></a></td></tr>
				<tr><td colspan="15"><label><strong>Doctors's Name :</strong></label></td>
				<td colspan="5"><label><strong>Referral Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="15"><input type="text" name="select" required value="<?php echo $full;?>" readonly/ style="background-color:skyblue;"></td>
				
				<td colspan="5" ><input type="text" name="dname" required value="<?php echo $row['dreffer'];?>" readonly/ style="background-color:skyblue;"></td>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
					</td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="10"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly/></td>
					 <td colspan="10"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly/></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Phone NO:</strong></label></td>
						<td colspan="5"><label><strong>REPORT ON:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" required value="<?php echo $pa;?>" readonly/></td>  
             		
					 <td colspan="5"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly/></td>
					 <td colspan="5"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly/></td>  


					 <td colspan="5"><input type="text" name="ptemp" value="<?php echo $pd;?>" readonly/></td>  
					 </tr>
					 
					 
					 <tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>
		<tr><td colspan="20">
		
		
		<input list="tname1" name="tname1" class="form-control" value="" autocomplete="off">
	
	<datalist id="tname1">

						<option value=''>-Select Procedure-</option>
				<?php 
			$sql = "select * from `privilege` where dname='$full' and status in ('Approved','Waiting For CFO Approval')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->pname."'>".$row->pname."</option>";
				}
			}
			?> </datalist>
		
		
		
</td></tr>

<tr><td colspan="20"><input name="tname" type="text" value="<?php if(isset($_POST['load'])==1)
{ $date10 = $_REQUEST['tname1'];
echo $date10;


$query45 = "select * from privilege where pname='$date10' and dname='$full'"; 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);
}
?>" readonly>



									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      <input name="load" type="submit" id="load" value="Load Template">
									  </td></tr>
									  

<tr>

<td colspan="20" align="left" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a target="_blank" href="photo333?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";  ?>"><img src="addphoto.png" title="test" width="100" height="120" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="postmediendo?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"?>"><img src="medicine1.jpg" title="test" width="130" height="90" /></a></td></tr>

</tr>
						 <tr><td colspan="20"><label><strong>Patient's Details Report:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="40" ><?php if(isset($_POST['load'])==1){echo $row45['sformat'];}?></textarea></td>  </tr>
						
						 <tr><td colspan="20"><label><strong>Findings / Observestion / Remarks:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="find" rows="5" ></textarea></td>  </tr>
						 
						 						 <tr><td colspan="20"><label><strong>Charge:</strong></label></td>  </tr>
						 <tr><td colspan="20"><input type="text" name="charge" value=""></td>  </tr>
				
														


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="endopdf1test.php?pmrn=<?php echo "$pm"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Note By</strong></td>
      <td colspan="1" align="center"><strong>Date </strong></td>
      
      <td colspan="3" align="center"><strong>Procedure Name</strong></td>
	  <td colspan="10" align="center"><strong>Surgery Note</strong></td>
	  

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from endoreport where pmrn= '$pmrn' and eid='$eid' and cstatus!='Cancelled'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["dname"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["r1date"]; ?></td>  
      
	  <td align="center"colspan="3"><?php echo $row["type"]; ?></td>
	  <td align="center"colspan="10"><?php echo $row["report"]; ?></td>
	   <td colspan='1' align='center'><a href="endo_note_delete.php?id=<?php echo $row['id']; ?>&id2=<?php echo $id;?>&eid1=<?php echo $eid1;?>&pmrn=<?php echo $pmrn;?>"><strong>Delete</strong></a></td>
      
	  
  	  

	  
      </tr>
    <?php $count++; } ?>

</body>

</html>
