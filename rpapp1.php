<?php
session_start();
require('db1.php');

/* ================= AUTH ================= */
if (!isset($_SESSION['sess_username']) || 
    !in_array($_SESSION['sess_userrole'], ['doctor','rad','outdoc','staff'])) {
    header('Location: login2?err=2');
    exit;
}

$user = $_SESSION['sess_username'];

/* ================= SAFE INPUT ================= */
$id   = $_GET['id'] ?? '';
$pmrn = $_GET['pmrn'] ?? '';

if(empty($id) || empty($pmrn)){
    die("Invalid Request");
}

/* ================= FETCH TEST ================= */
$stmt = $con->prepare("SELECT * FROM alltest WHERE id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

if(!$row){
    die("Test not found");
}

$tname  = $row['medi'];
$a_id   = $row['id'];
$pname  = $row['pname'];
$ddname = $row['dname'];
$price  = $row['price'];
$link   = $row['link'];
$product_code = $row['code'];
/* ================= DOCTOR CODE ================= */
$dData=mysqli_fetch_assoc(mysqli_query($con,"SELECT sid FROM doctor WHERE dname LiKE  '%$ddname%' AND status IN ('active','Active')"));
$doctor_code=$dData['sid'];
/* ================= FETCH PATIENT ================= */
$stmt = $con->prepare("SELECT * FROM patient WHERE pmrn=?");
$stmt->bind_param("s", $pmrn);
$stmt->execute();
$pdata = $stmt->get_result()->fetch_assoc();


if(!$pdata){
    die("Patient not found");
}

/* ================= DERIVED DATA ================= */
$birth = date('Ymd', strtotime($pdata['bdate']));

// age
$diff1 = '';
if(!empty($pdata['bdate'])){
    $dob = new DateTime($pdata['bdate']);
    $now = new DateTime();
    $diff = $now->diff($dob);
    $diff1 = $diff->y.'Y '.$diff->m.'M '.$diff->d.'D';
}

// subtype
$stmt = $con->prepare("SELECT subtype FROM radio WHERE code=? LIMIT 1");
$stmt->bind_param("s", $product_code);
$stmt->execute();
$sub = $stmt->get_result()->fetch_assoc()['subtype'] ?? '';

$dname2 = $ddname;


function getModality($dname){
  $map = [
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
  return $map[$dname] ?? 'OT';
}

function getStation($dname){
    $map = [
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
        'US3'=>'DCM_SECURE_LOCAL'
    ];
    return $map[$dname] ?? 'DEFAULT';
}


function insertPacsOrder($con, $data){

    $sql = "INSERT INTO his_order (
      Accession_Number, Center_Id, Patient_Id, Patient_Name,
      Patient_Birth_Date, Patient_Sex, Phone_Number,
      Patient_Weight, Patient_Type, Modality,
      Sch_Proc_Step_Desc, Ref_Physician_Id,Ref_Physician_Name,
      Sch_Station_AE_Title,
      Sch_Proc_Step_Start_Date, Sch_Proc_Step_Start_Time,
      Order_Status,Sch_Proc_Step_ID
  ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  $stmt = $con->prepare($sql);

  if(!$stmt){
      die("PACS PREPARE ERROR: " . $con->error);
  }

    $stmt->bind_param("ssssssssssssssssss",
    $data['a_id'],
    $data['center'],
    $data['pmrn'],
    $data['pname'],
    $data['birth'],
    $data['psex'],
    $data['pphone'],
    $data['weight'],
    $data['ptype'],
    $data['modality'],
    $data['tname'],
    $data['doctor_code'],
    $data['doctor'],
    $data['station'],
    $data['app_date'],
    $data['slot'],
    $data['status'],
    $data['product_code']
  );

  if(!$stmt->execute()){
      die("PACS INSERT FAILED: " . $stmt->error);
  }

  return true;
}

if(isset($_POST['Submit'])){

    $dname  = $_POST['dname'] ?? '';
    $pphone = $_POST['pphone'] ?? '';
    $psex   = $_POST['psex'] ?? '';
    $padd   = $_POST['padd'] ?? '';
    $page   = $_POST['page'] ?? '';
    $slot   = $_POST['slot'] ?? '';
    $app_date2 = $_POST['app_date2'] ?? '';
    $remarks = $_POST['remarks'] ?? '';
    $dname1 = $_POST['dname1'] ?? '';

    if(empty($dname) || empty($slot) || empty($app_date2)){
        die("Required fields missing");
    }

    $app_date = date('Ymd', strtotime($app_date2));
    $app_date3 = date('m/d/Y', strtotime($app_date2));

    /* ================= DUPLICATE CHECK ================= */
    $stmt = $con->prepare("SELECT id FROM radpapp 
        WHERE pmrn=? AND tname=? AND adate=? AND status!='Cancel'");
    $stmt->bind_param("sss", $pmrn, $tname, $app_date2);
    $stmt->execute();

    if($stmt->get_result()->num_rows > 0){
        echo "<script>alert('Already Appointment Exists');</script>";
        exit;
    }

    /* ================= INSERT APPOINTMENT ================= */

    $location = 'OPD';
    $status = 'NOT SEEN';
    $adate1=date('Y-m-d');

    $sql = "INSERT INTO radpapp 
    (pname, pmrn, pphone, dname, page, padd, adate, adate1, aslot, status, psex, dreffer, tname, btime, a_no, link, remarks, location, price)
    VALUES 
    ('$pname', '$pmrn', '$pphone', '$dname', '$page', '$padd','$app_date3', '$adate1', '$slot','$status', '$psex', '$dname1', '$tname', NOW(), '$a_id', '$link','$remarks', '$location', '$price')";

    if(!mysqli_query($con, $sql)){
        die("Appointment Insert Failed: " . mysqli_error($con));
    }

    /* ================= PACS INSERT ================= */
    $ok = insertPacsOrder($con, [
      'a_id'     => $a_id,
      'center'   => '571330ad-b779-4a11-830c-ab8e00bf2434',
      'pmrn'     => $pmrn,
      'pname'    => $pname,
      'birth'    => $birth,
      'psex'     => $psex,
      'pphone'   => $pphone,
      'weight'   => '1',
      'ptype'    => 'OP',
      'modality' => getModality($dname),
      'tname'    => $tname,
      'doctor_code'   => $doctor_code,
      'doctor'   => $ddname,
      'station'  => getStation($dname),
      'app_date' => $app_date,
      'slot'     => $slot,
      'status'   => '1',
      'product_code'    => $product_code
  ]);
  
  if(!$ok){
      die("PACS INSERT FAILED");
  }

    /* ================= UPDATE ================= */
    $stmt = $con->prepare("UPDATE alltest SET status='DONE', rstatus='RECEIVED' WHERE id=?");
    $stmt->bind_param("s",$id);
    $stmt->execute();

    echo "<script>alert('Appointment Set Successfully');</script>";
}

if(isset($_POST['submitEquipment'])){

    $doc    = $_POST['doc'] ?? '';
    $creden = $_POST['creden'] ?? '';
    $wplace = $_POST['wplace'] ?? '';

    $stmt = $con->prepare("INSERT INTO outside_doc 
        (dname, degree, wplace, add_by, add_time)
        VALUES (?,?,?,?,NOW())");

    $stmt->bind_param("ssss",$doc,$creden,$wplace,$user);

    if(!$stmt->execute()){
        die("Doctor Insert Failed: ".$stmt->error);
    }

    echo "<script>alert('Doctor Added Successfully');</script>";
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
  width: 30%;
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
		
		
		<div  style="width: 150px; height: 40px; overflow: auto; position: relative;left: 560px;">
		
		<!--<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default" margin-right= "70px">
                                Add Outside Doctor <i class="fas fa-plus"></i>
                            </button>-->
							
</div>
							
							                                  <label>Doctor's Name</label>  
             
		
		
					


  <select class="js-example-basic-single" name="dname1" required>
						<option value='<?php echo $dname2;?>'><?php echo $dname2;?></option>
						
						<?php 
			$sql = "select * from `doctor` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			
			
			<?php 
			$sql4 = "select * from `outside_doc`";
			$res4 = mysqli_query($con, $sql4);
			if(mysqli_num_rows($res4) > 0) {
				while($row4 = mysqli_fetch_object($res4)) {
					echo "<option value='".$row4->dname."'>".$row4->dname."</option>";
				}
			}
			?>
			
			
						
				
</select>
							
		<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
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
							
			<label for="tname"><strong>Investigation Name:</strong></label>
      <input name="tname" type="text" size="70" class="style1" value="<?php echo $tname;?>" readonly/>

            <!-- Name Input -->
			
      
      

            <label for="age"><strong>Service Name :</strong></label>
	  	
            
	  	<select name="dname" id="machine" onchange="showUser()" class="style1" placeholder="Machine Type"  required style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:300px"> 
      <option value="">-Select-</option>
		
      <?php if($sub=='ULTRASOUND'){echo
					"
					<option value='US'>US</option>
					<option value='US1'>US1</option>
					<option value='US2'>US2</option>
					<option value='US3'>US3</option>
					";}
					
					
					else if($sub=='MRI'){echo
					"
					<option value='MR'>MR</option>
					
					";}
					
					else if($sub=='CT-SCAN'){echo
					"
					<option value='CT'>CT</option>
					
					";}
					
										else if($sub=='X-RAY'){echo
					"
					<option value='CR'>CR</option>
					<option value='CR1'>CR1</option>
					
					<option value='DX'>DX</option>
					<option value='DX1'>DX1</option>
					<option value='DX2'>DX2</option>
          <option value='DX3'>DX3</option>
					<option value='OPG'>OPG</option>
					<option value='MG'>Mammography</option>
					
					";}
					
					
					else if($sub=='BMD'){echo
					"
					<option value='BMD'>BMD</option>
					
					";}
					
					
					?>
			
				
      </select>


<label for="mail"><strong>Appointment Date :</strong></label>

									  
									<input type='date' id="datenn" name="app_date2" onchange="showUser()"size="20" style='background-color:lightgreen;font-size:22px;font-weight:bold;color:red;width:300px' min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('45 days') ); ?>">  

                  <label for="age"><strong>Available Slot :</strong></label>
			
			
			
			<select name="slot" class="con_charge" required id="txtHint" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:300px">
			<option value="">-Select-</option>
			
			</select>	
        
      
            
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="70" class="style1" value="<?php echo $pname;?>" readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" class="style1" value="<?php echo $pdata['padd'];?>"readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
      <input name="psex" type="text" size="70" class="style1" value="<?php echo $pdata['psex'];?>"readonly>
	  
      <input name="pmrn" type="text" size="15"Placeholder="Patient's MRN" class="style1" value="<?php echo $pmrn;?>" readonly>
      <input name="pphone" type="text" size="13" Placeholder="Patient's Phone NO" class="style1"value="<?php echo $pdata['pphone'];?>"readonly>	  
	  <input name="page" type="text" size="5"Placeholder="Patient's AGE" class="style1" value="<?php echo $diff1;?>"readonly>
      

	  
	  	<label for="age"><strong>Remarks:</strong></label>
			
			<select name="remarks" class="style1"> 
			<option value='Not Required'>Not Required</option>
			<option value='No Preparation'>No Preparation</option>
			<option value='Insufficient Money'>Insufficient Money</option>
			<option value='Patient Choice'>Patient Choice</option>
			<option value='Appointment Not Available'>Appointment Not Available</option>
	   
      </select>



  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
 
 
 <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Outside Doctors's</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="form-horizontal" action=""  method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <label>Doctor's Name</label>  
              <input list="test" name="doc" id="test12" size='50'>
		
		
					


 <datalist id="test">
						<option value=''>-Select-</option>
						
						<?php 
			$sql = "select * from `doctor` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			
			
			
			
						
				
</datalist>
                          
						 
						  
                         
			<label for="age"><strong>Credentials :</strong></label>
			<input list="test3" name="creden" id="test55" size='50'>
		
		
					


 <datalist id="test3">
						<option value=''>-Select-</option>
						
						
			
			
						
				
</datalist>
                         
			
			
			
			<label for="age"><strong>Work Place Details</strong></label>
	 <input list="test33" name="wplace" id="test553" size='50'>
		
		
					


 <datalist id="test33">
						<option value=''>-Select-</option>
						
						
			
			
						
				
</datalist>
  </fieldset>

  
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                                        <button name="submitEquipment" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      

	
	
	
	


<script>
function showUser() {
    // Retrieve values from the selects
  var q = document.getElementById('datenn').value;
   var g= document.getElementById('machine').value;
if (q=="" || g=="") {
    document.getElementById("txtHint").innerHTML="";
	//var ret1 = parseInt($("#tname23").val()); 
    return;
  }
    var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
	 //var fval = document.getElementById('dname').value;
    }
  }
  xmlhttp.open("GET","radio_slot.php?q="+q+"&dname2="+g, true);
 
  xmlhttp.send();
}
</script>
