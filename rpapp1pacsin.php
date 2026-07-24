<?php
session_start();
require('db1.php');

if (!isset($_SESSION['sess_username'])) {
    header('Location: login2?err=2');
    exit;
}

$user = $_SESSION["sess_username"];

/* ================= SAFE INPUT ================= */
function clean($data){
    return htmlspecialchars(trim($data));
}

/* ================= FETCH BASE DATA ================= */
$id   = $_GET['id'] ?? '';
$pmrn = $_GET['pmrn'] ?? '';

$qInv = mysqli_query($con,"SELECT * FROM iinves WHERE id='$id'");
$inv  = mysqli_fetch_assoc($qInv);

$tname = $inv['infusion'];
$link  = $inv['link'];
$a_id  = 'I'.$inv['id'];
$price = $inv['price'];
$pcode = $inv['code'];
$eidin = $inv['eid'];
$product_code = $inv['code'];
$qPat = mysqli_query($con,"SELECT * FROM patient WHERE pmrn='$pmrn'");
$pat  = mysqli_fetch_assoc($qPat);

$pname  = $pat['pname'];
$psex   = $pat['psex'];
$pphone = $pat['pphone'];
$padd = $pat['padd'];
$dob    = $pat['bdate'];
$age1   = date('Ymd',strtotime($dob));

$qIPD = mysqli_query($con,"SELECT * FROM inpatient WHERE pmrn='$pmrn' AND eid='$eidin'");
$ipd  = mysqli_fetch_assoc($qIPD);

$api_adminssion_no = (int)$ipd['OUT_ADMISSION_NO_PK'];
$ddname = $inv['dname'];
$ppage  = $ipd['age'];

/* ================= DOCTOR ================= */
$qDoc = mysqli_query($con,"SELECT * FROM doctor WHERE dname LiKE  '%$ddname%' AND status IN ('active','Active')");
$doc  = mysqli_fetch_assoc($qDoc);
$dcode = $doc['sid'] ?? '';

/* ================= AE TITLE MAP ================= */
$ae_map = [
  'MR'=>'NODENAME',
  'DX'=>'CALYPSO',
  'DX1'=>'HIRISRF43',
  'DX2'=>'SWINGPONTE',
  'DX3'=>'FCR-CSL-SCP',
  'OPG'=>'DESKTOP-890K9IG',
  'MG'=>'MG',//FDR-MG
  'CR'=>'FCR-CSL',
  'CR1'=>'SCP1',
  'CT'=>'TM_CT_CMW_V3.00',
  'US'=>'LOGIQP9-000000',
  'US1'=>'USG',
  'US2'=>'USG3',
  'US3'=>'DCM_SECURE_LOCAL',
  'BMD' => 'BMD'
];

$modality_map = [
  'MR'=>'MR',
  'DX'=>'DX',
  'DX1'=>'DX',
  'DX2'=>'DX',
  'DX3'=>'DX',
  'OPG'=>'DX',
  'MG'=>'MG',
  'CR'=>'CR',
  'CR1'=>'CR',
  'CT'=>'CT',
  'US'=>'US',
  'US1'=>'US',
  'US2'=>'US',
  'US3'=>'US'
];

/* ================= SUBMIT ================= */
if(isset($_POST['Submit'])){

    $dname = clean($_POST['dname']);
    $date1 = clean($_POST['date1']);
    $slot  = clean($_POST['slot']);

    if(empty($slot)){
        echo "<script>alert('No Slot Selected');</script>";
        exit;
    }

    $app_date = date('Ymd', strtotime($date1));
    $btime = date('d/m/Y H:i:s');
    $rdate = date('Y-m-d');

    $ae_title = $ae_map[$dname] ?? 'DEFAULT';
    $modality = $modality_map[$dname] ?? 'OT';

    /* ================= HIS ORDER (IPD) ================= */
    $ins_querypac = "INSERT INTO his_order (
        Accession_Number, Center_Id, Patient_Id, Patient_Name,
        Patient_Birth_Date, Patient_Sex, Phone_Number,
        Patient_Weight, Patient_Type, Modality,
        Sch_Proc_Step_ID, Sch_Proc_Step_Desc,
        Ref_Physician_Id, Ref_Physician_Name,
        Sch_Proc_Step_Start_Date, Sch_Proc_Step_Start_Time,
        IPD_Field1, IPD_Field2, IPD_Field3,
        Order_Status,Sch_Station_AE_Title
    ) VALUES (
        '$a_id','571330ad-b779-4a11-830c-ab8e00bf2434',
        '$pmrn','$pname','$age1','$psex','$pphone',
        '0','IP','$modality',
        '$product_code','$tname',
        '$dcode','$ddname',
        '$app_date','$slot',
        '$eidin','$api_adminssion_no','IPD',
        '1','$ae_title'
    )";

    mysqli_query($con,$ins_querypac);

    /* ================= UPDATE INVESTIGATION ================= */
    mysqli_query($con,"UPDATE iinves 
        SET rby='$user', rtime='$btime',
        rstatus='RECEIVED', status='DONE', rdate='$rdate'
        WHERE id='$id'");

    /* ================= BOOK SLOT ================= */
    mysqli_query($con,"UPDATE rapp 
        SET status='Booked'
        WHERE dname='$dname' AND ddate='$date1' AND dslot='$slot'");

    /* ================= APPOINTMENT ================= */
    mysqli_query($con,"INSERT INTO radpapp (
        pname, pmrn, pphone, dname, status,
        page, psex, padd, dreffer, tname, btime,
        a_no, link, adate, aslot, ineid,
        location, adate1, price
    ) VALUES (
        '$pname','$pmrn','$pphone','$dname','NOT SEEN',
        '$ppage','$psex', '$padd','$ddname','$tname','$btime',
        '$a_id','$link','$date1','$slot','$eidin',
        'Inpatient','$rdate','$price'
    )");
    
    /* ================= BILLING ================= */
    $date = date('Y-m-d');

    $tb_q = mysqli_query($db,"SELECT * FROM acct_master_new WHERE item_code='$pcode'");
    $tb   = mysqli_fetch_assoc($tb_q);
    $acct = $tb['tb_op'];

    mysqli_query($con,"INSERT INTO pms_tb 
        (trans_id,trans_type,acct_code,date,amount,location)
        VALUES ('$id','CR','$acct','$date','$price','IPD_INVES_CHARGE_RAD')");

    mysqli_query($con,"INSERT INTO pms_tb 
        (trans_id,trans_type,acct_code,date,amount,location)
        VALUES ('$id','DR','111999','$date','$price','IPD_INVES_CHARGE_RAD')");

    echo "<script>alert('Appointment Set Successfully');</script>";
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SFMMKPJSH DHAKA</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
<link rel="stylesheet" href="styles.css">
		<link href='jsnew/fjsnwonts' rel='stylesheet' type='text/css'>







 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

  
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
  max-width: 280px;
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

    
  
  <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+20)
		});
	});
</script>
  <link rel="stylesheet" href="styles.css">
  
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
	

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>

			<label for="tname"><strong>Investigation Name:</strong></label>
      <input name="tname" type="text" size="70" class="style1" value="<?php echo $tname ;?>" readonly/>

            <!-- Name Input -->
			<label for="name"><strong>Service Name :</strong></label>
			<select name="doc" value="" class="style1">
			        <option value=''>-Select SERVICE-</option>
					<option value='CR'>CR</option>
          <option value='CR1'>CR1</option>
					<option value='CT'>CT</option>
					<option value='DX'>DX</option>
					<option value='DX1'>DX1</option>
					<option value='DX2'>DX2</option>
          <option value='DX3'>DX3</option>
					
					<option value='MR'>MR</option>
					<option value='US'>US</option>
					<option value='US1'>US1</option>
					<option value='US2'>US2</option>
					<option value='US3'>US3</option>
					<option value='OPG'>OPG</option>
					<option value='MG'>Mammography</option>
					<option value='BMD'>BMD</option>
				
			</select>
			        <input name="dname" class="style1" type="text"  size =50% value="<?php	  if(isset($_POST['load'])==1)
{ $doc1 = $_REQUEST['doc'];
echo $doc1;
}
?>" size="57" >
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input type="text" class="style1" name="date" id="datepicker" placeholder="Select Date" size="15" >
									  <input name="date1" type="text" size=48% class="style1" value="<?php if(isset($_POST['load'])==1)
{ $date1 = $_REQUEST['date'];
echo $date1;
}
?>" size ="57" >
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      <input name="load" class="style1" type="submit" id="load" value="Check Available Time">
	    </p>

									<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="slot" class="style1"> <option value=''>--Select--</option>
	   <?php 
	   $doc1= $_REQUEST['doc'];
			$sql = "select * from `rapp` where `dname`='$doc1' and `status`='AVAILABLE'and `ddate`='$date1'order by id asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dslot."'>".$row->dslot."</option>";
				}
			}
			?>
      </select>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="70" class="style1" value="<?php echo $pname;?>" readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" class="style1" value="<?php echo $padd;?>"readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
      <input name="psex" type="text" size="70" class="style1" value="<?php echo $psex;?>"readonly>
	  
      <input name="pmrn" type="text" size="15"Placeholder="Patient's MRN" class="style1" value="<?php echo $pmrn?>" readonly>
      <input name="pphone" type="text" size="13" Placeholder="Patient's Phone NO" class="style1"value="<?php  echo $pphone;?>"readonly>	  
	  <input name="page" type="text" size="5"Placeholder="Patient's AGE" class="style1" value="<?php echo $ppage;?>"readonly>
      



  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
