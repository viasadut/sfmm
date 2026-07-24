<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
	include_once 'dbconfig.php';
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('bill','billin')"; 
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
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$religion = $_REQUEST['religion'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['queue'];
$pphone=$_REQUEST['pphone'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$dis=$_REQUEST['dis'];
$ptype=$_REQUEST['ptype'];
$ename=$_REQUEST['ename'];
$ephone=$_REQUEST['ephone'];

$padd=$_REQUEST['padd'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];

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

$formatted_date=date(strtotime($date1,'Y-m-d'));
$timestamp = strtotime($date91);
echo $output_date_string = date("d-M-Y", $timestamp);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$rdate=date('Y-m-d');


$servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";


$conn = new mysqli($servername, $username1, $password1, $dbname1);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($user!=''){

  $sql = "insert into patient_new (`pname`,`padd`,`psex`,`page`,`pphone`,`bdate`,`type`,`dis`,`ename`,`ephone`,`rby`,`rdate`,`religion`) values 
('$pname','$padd','$psex','$diff1','$pphone','$date91','$ptype','$dis','$ename','$ephone','$user','$rdate','$religion')";
  
  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

  
   $sql3 = "insert into patient (`pname`,`pmrn`,`padd`,`psex`,`page`,`pphone`,`bdate`,`type`,`dis`,`ename`,`ephone`,`rby`,`rdate`,`religion`) values 
('$pname','$last_id','$padd','$psex','$diff1','$pphone','$date91','$ptype','$dis','$ename','$ephone','$user','$rdate','$religion')";
  $conn->query($sql3);

  
  
  $url ='http://192.168.100.254:3038/api/patregent/';

  if($psex=="M"){
	  
	  $g="Mr.";
  }
  if($psex=="F"){
	  
	  $g="Ms.";
  }
  if($psex=="O"){
	  
	  $g="";
  }

//Data Sending To API using CURL Method

$data = array(
  "in_PATIENT_NO_PK"=> null,
  "in_PATIENT_CODE"=> "$last_id",
  "in_SALUTATION"=> "$g",
  "in_PATIENT_NAME"=> "$pname",
  "in_PHONE_MOBILE"=> "$pphone",
  "in_MOBILE2_alt"=> "",
  "in_EMAIL"=> "",
  "in_DOB"=> "$output_date_string",
  "in_AGE_DD"=> 15,
  "in_AGE_MM"=> 6,
  "in_AGE_YY"=> 34,
  "in_AGE"=> "$diff1",
  "in_GENDER"=> 3002115,
  "in_GENDER_TXT"=> "$psex",
  "in_MARITAL_STATUS"=> 20,
  "in_MARITAL_STATUS_TXT"=> "",
  "in_RELIGION"=> "$religion",
  "in_ADDRESS"=> "$padd",
  "in_ADDRESS1"=> "",
  "in_ADDRESS2"=> "",
  "in_BLOOD_GROUP"=> "",
  "in_PATIENT_TYPE_NO_FK"=> 1,
  "in_REF_PATIENT_NO_FK"=> null,
  "in_REF_PERSON_NO_FK"=> null,
  "in_REF_PERSON_NO_FK_REL"=> null,
  "in_FATHER_NAME"=> "",
  "in_MOTHER_NAME"=> "",
  "in_SPOUSE_NAME"=> "",
  "in_NATIONAL_ID"=> "",
  "in_PRESENT_ADDR"=> "",
  "in_PR_ADDR_THANA"=> "",
  "in_PRESENT_DISTRICT"=> "$dis",
  "in_present_post_code"=> "",
  "in_PR_ADDR_COUNTRY"=> 1, 
  "in_PERMANENT_ADDR"=> "",
  "in_PE_ADDR_THANA"=> "",
  "in_PERMANENT_DISTRICT"=> "",
  "in_permanent_post_code"=> "",
  "in_PE_ADDR_COUNTRY"=> 1,
  "in_EMERGENCY_CONTACT_NAME"=> "$ename",
  "in_EMERGENCY_CONTACT_ADDR"=> "",
  "in_EMERGENCY_CONTACT_RELATION"=> "",
  "in_EMERGENCY_CONTACT_CONTACT"=> "$ephone",
  "in_payer_type_code"=> "",
  "in_OCCUPATION"=> "",
  "in_vip_ind"=> 0,
  "in_vip_narration"=> "",
  "in_last_edit_reason"=> "",
  "in_reg_remarks"=> "Walk-in registration",
  "in_CCM_CLIENT_NO_FK"=> null,
  "in_CCM_CLIENT_NAME"=> null,
  "in_passport_no"=> "",
  "in_PATIENT_PHOTO"=> "",
  "in_au_entry_by"=> 101,
  "in_au_entry_session"=> "SESSION20250708",
  "in_au_entry_hospital_pk_no"=> 141,
  "IN_FALL_RISK"=> 0,
  "IN_N_MASKING"=> 0,
  "IN_H_WITH_CARE"=> 0,
  "IN_GUARDIAN_NAME"=> "",
  "in_nationality"=> 1,
  "in_STATUS"=> 1,
  "in_present_state"=> 10,
  "in_parmamnent_state"=> 20,
  "in_sponsor_no_fk"=> null

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

echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

  $patient_no_pk=$decoded_response['patient_no_pk'];
  $patient_code=$decoded_response['patient_code'];
  
  
  if($patient_no_pk!='' and $patient_code!=''){
     
    //header("Location:$url");
     //echo json_encode($data);
     
     $api_query = "update patient_new set api_status='1' where ID='".$last_id."'"; 
  $api_result = mysqli_query($con, $api_query) or die(mysqli_error());
   }
  
  
  
  
  

header("Location: mrn_display.php?pmrn=$last_id&app_id=$app_id");
    echo '<script language="javascript">';
    echo 'alert("Registration Successful"); ';
    echo '</script>';
 

  }
}
  
//if ($con->query($ins_query) == TRUE) 
//{


else{
echo '<script language="javascript">';
    echo 'alert("Registration Not Successful"); ';
    echo '</script>';

}
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
  width: 25%;
}
textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
  margin-bottom: 0px;
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
    max-width: 750px;
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
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>

</head>

<body>
<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S REGISTRATION </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<div id="txtHint1" name="queue"></div> 
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" style="text-transform:uppercase" value=""required>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" style="text-transform:uppercase" value=""required>

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            <select name="psex" required>
						<option value=''></option>
						<option value='M'>Male</option>
						<option value='F'>Female</option>
						<option value='OTHERS'>Others</option>
						
														
						</select>
            
      <input name="pphone" type="text" size="13" value="" placeholder="Phone No" required>	  
	  
      <br><br>
<label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="" required max="31">	/

<input name="mm" type="text" maxlength="2" size="1" value=""required max="12"> /	

<input name="yy" type="text" maxlength="4" size="1" value=""required>		  
	  <br><br>
	  
	  <label for="age"><strong>Patient's Type :</strong></label>
	  	
            <select name="ptype" required>
						<option value=''></option>
						<option value='General'>General</option>
						<option value='Staff'>Staff</option>
						<option value='Staff Spouse'>Staff Spouse</option>
						<option value='Staff Childrean'>Staff Children</option>
						<option value='Consultant'>Consultant</option>
						<option value='Corporate'>Corporate</option>
						<option value='VIP'>VIP</option>
						
														
						</select>
            <br><br>
	  
	  <label for="age"><strong>Religion :</strong></label>
	  	
            <select name="religion" required>
						<option value=''></option>
						<option value='8'>Islam</option>
						<option value='9'>Hindu</option>
						<option value='281'>Christian</option>
						<option value='282'>Buddha</option>
						<option value='283'>Others</option>
						
														
						</select>
						
						
<label for="age"><strong>District :</strong></label>
<select name="dis" id="dis" class="country" placeholder="District" required style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:200px"> 
		
		
<option value=""></option>

<option value='Barguna'>Barguna</option>
<option value='Barisal'>Barisal</option> 
<option value='Bhola'>Bhola</option>
<option value='Jhalokati'>Jhalokati</option> 
<option value='Patuakhali'>Patuakhali</option> 
<option value='Pirojpur'>Pirojpur</option> 
<option value='Bandarban'>Bandarban</option> 
<option value='Brahmanbaria'>Brahmanbaria</option> 
<option value='Chandpur'>Chandpur</option> 
<option value='Chittagong'>Chittagong</option> 
<option value='Comilla'>Comilla</option> 
<option value='Coxs Bazar'>Cox's Bazar</option> 
<option value='Feni'>Feni</option> 
<option value='Khagrachhari'>Khagrachhari</option> 
<option value='Lakshmipur'>Lakshmipur</option> 
<option value='Noakhali'>Noakhali</option> 
<option value='Rangamati'>Rangamati</option> 
<option value='Dhaka'>Dhaka</option> 
<option value='Faridpur'>Faridpur</option> 
<option value='Gazipur'>Gazipur</option> 
<option value='Gopalganj'>Gopalganj</option> 
<option value='Kishoreganj'>Kishoreganj</option> 
<option value='Madaripur'>Madaripur</option> 
<option value='Manikganj'>Manikganj</option> 
<option value='Munshiganj'>Munshiganj</option> 
<option value='Narayanganj'>Narayanganj</option> 
<option value='Narsingdi'>Narsingdi</option> 
<option value='Rajbari'>Rajbari</option> 
<option value='Shariatpur'>Shariatpur</option> 
<option value='Tangail'>Tangail</option> 
<option value='Bagerhat'>Bagerhat</option> 
<option value='Chuadanga'>Chuadanga</option> 
<option value='Jessore'>Jessore</option> 
<option value='Jhenaidah'>Jhenaidah</option> 
<option value='Khulna'>Khulna</option> 
<option value='Kushtia'>Kushtia</option> 
<option value='Magura'>Magura</option> 
<option value='Meherpur'>Meherpur</option> 
<option value='Narail'>Narail</option> 
<option value='Satkhira'>Satkhira</option> 
<option value='Jamalpur'>Jamalpur</option> 
<option value='Mymensingh'>Mymensingh</option> 
<option value='Netrokona'>Netrokona</option> 
<option value='Sherpur'>Sherpur</option> 
<option value='Bogra'>Bogra</option> 
<option value='Joypurhat'>Joypurhat</option> 
<option value='Naogaon'>Naogaon</option> 
<option value='Natore'>Natore</option> 
<option value='Chapai Nawabganj'>Chapai Nawabganj</option> 
<option value='Pabna'>Pabna</option> 
<option value='Rajshahi'>Rajshahi</option> 
<option value='Sirajganj'>Sirajganj</option> 
<option value='Dinajpur'>Dinajpur</option> 
<option value='Gaibandha'>Gaibandha</option> 
<option value='Kurigram'>Kurigram</option> 
<option value='Lalmonirhat'>Lalmonirhat</option> 
<option value='Nilphamari'>Nilphamari</option> 
<option value='Panchagarh'>Panchagarh</option> 
<option value='Rangpur'>Rangpur</option> 
<option value='Thakurgaon'>Thakurgaon</option> 
<option value='Habiganj'>Habiganj</option> 
<option value='Moulvibazar'>Moulvibazar</option> 
<option value='Sunamganj'>Sunamganj</option> 
<option value='Sylhet'>Sylhet</option> 

			
				
      </select>
            
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


<label for="age"><strong>Guardian Name :</strong></label>
      <input name="ename" type="text" size="70" style="text-transform:uppercase" value=""required>
 	  <label for="age"><strong>Guardian Contact No :</strong></label>
      <input name="ephone" type="number" size="70" style="text-transform:uppercase" value=""required>

  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		</td></tr></table>

</form>
  


</body>

</html>

	
	