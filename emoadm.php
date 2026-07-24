<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mofficer"){
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
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

//$pmrn=$_REQUEST['dname'];
//include("auth.php");
//echo $count1;
 
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data59 = mysqli_fetch_assoc($query4);
  
  
$ttr=$data59['bdate'];

$te=date('d',strtotime($ttr));
$te1=date('m',strtotime($ttr));
$te2=date('Y',strtotime($ttr));
  
?>

<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$doc=$_REQUEST['doc'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
//$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$sid=$_REQUEST['staff_id'];

$padd=$_REQUEST['padd'];
$diagnosis=$_REQUEST['diagnosis'];
$date=$_REQUEST['date'];
$plan=$_REQUEST['plan'];
$instruction=$_REQUEST['instruction'];
$date1=$_REQUEST['date1'];
$staff=$_REQUEST['staff'];
//$date=$_REQUEST['date'];
$remarks=$_REQUEST['remarks'];
$btype=$_REQUEST['btype'];

$date6= date('m/d/Y');
$snew= date('Y-m-d');
$date2=date("d/m/Y", strtotime($date));
$date3=date("d/m/Y", strtotime($date1));



$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];

//$fdate='$dd-$mm-$yy';


$date11=date_create("$dd-$mm-$yy");
$date91=date_format($date11,'Y-m-d');
$date12= date('d-m-Y');
$date22=date_create($date12);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date22,$date11);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");


$sel90="SELECT * FROM doctor WHERE `dname`='$doc' and status='Active';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Consultant Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }



else if($doc=='Dr. Md. Abdur Razzak'){
	
echo '<script language="javascript">';
    echo 'alert("Sorry !! Only Consultant and Specialist Can admit Patients"); ';
    echo '</script>';
	
}
else if ($staff== 'Staff' ){
$ins_query="insert into preadm (`pname`,`pmrn`,`padd`,`gender`,`page`,`pphone`,`diagnosis`,`sda`,`plan`,`formo`,`pdischarge`,`remarks`,`dname`,`location`,`rdate`,`staff`,`tstatus`,`snew`,`eeid`,`btype`,`sid`) values ('$pname','$pmrn','$padd','$psex','$diff1','$pphone','$diagnosis','$date2','$plan','$instruction','$date3','$remarks','$doc','A&E','$date6','$staff','pending','$snew','$eid','$btype','$sid')";
mysqli_query($con,$ins_query);

    echo '<script language="javascript">';
    echo 'alert("Admission Request Successful"); ';
    echo '</script>';}
	
	
	
	else if ($staff== 'Staff Children' ){
$ins_query="insert into preadm (`pname`,`pmrn`,`padd`,`gender`,`page`,`pphone`,`diagnosis`,`sda`,`plan`,`formo`,`pdischarge`,`remarks`,`dname`,`location`,`rdate`,`staff`,`tstatus`,`snew`,`eeid`,`btype`,`sid`) values ('$pname','$pmrn','$padd','$psex','$diff1','$pphone','$diagnosis','$date2','$plan','$instruction','$date3','$remarks','$doc','A&E','$date6','$staff','pending','$snew','$eid','$btype','$sid')";
mysqli_query($con,$ins_query);

    echo '<script language="javascript">';
    echo 'alert("Admission Request Successful"); ';
    echo '</script>';}
	
	
	else if ($staff=='Staffs Spouse'){
$ins_query="insert into preadm (`pname`,`pmrn`,`padd`,`gender`,`page`,`pphone`,`diagnosis`,`sda`,`plan`,`formo`,`pdischarge`,`remarks`,`dname`,`location`,`rdate`,`staff`,`tstatus`,`snew`,`eeid`,`btype`,`sid`) values ('$pname','$pmrn','$padd','$psex','$diff1','$pphone','$diagnosis','$date2','$plan','$instruction','$date3','$remarks','$doc','A&E','$date6','$staff','pending','$snew','$eid','$btype','$sid')";
mysqli_query($con,$ins_query);

    echo '<script language="javascript">';
    echo 'alert("Admission Request Successful"); ';
    echo '</script>';}
	
	else if ($staff=='General'){
$ins_query="insert into preadm (`pname`,`pmrn`,`padd`,`gender`,`page`,`pphone`,`diagnosis`,`sda`,`plan`,`formo`,`pdischarge`,`remarks`,`dname`,`location`,`rdate`,`staff`,`tstatus`,`snew`,`eeid`,`btype`) values ('$pname','$pmrn','$padd','$psex','$diff1','$pphone','$diagnosis','$date2','$plan','$instruction','$date3','$remarks','$doc','A&E','$date6','$staff','Approved','$snew','$eid','$btype')";
mysqli_query($con,$ins_query);

    echo '<script language="javascript">';
    echo 'alert("Admission Request Successful"); ';
    echo '</script>';}
	
else {

    echo '<script language="javascript">';
    echo 'alert("Admission Request Unsuccessful"); ';
    echo '</script>';
} 
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
  
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

  
  <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+90)
		});
	});
</script>

<script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+90)
		});
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

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S ADMISSION </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<label for="name"><strong>Doctor's Name :</strong></label>
			<input name="doc" type="text" size="70" value=""required list="categoryname">
			
			<datalist id="categoryname">
			        <option value=''>-Select Doctor-</option>
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
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" value="<?php echo $data59['pname'];?>"required readonly />
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" value="<?php echo $data59['padd'];?>"required readonly/>

	  <label for="age"><strong>Patient's Details (Gender / MRN / Phone / Age) :</strong></label>
	  	<input name="psex" type="text" size="10" value="<?php echo $data59['psex'];?>"required readonly/>
														

						</select>
            <input name="pmrn" type="text" size="15" value="<?php echo $data59['pmrn'];?>" placeholder="MRN" required readonly>
      <input name="pphone" type="text" size="13" value="<?php echo $data59['pphone'];?>" placeholder="Phone No" required readonly>	  
	  
	  
	  
	  
	  <label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te;}  

if(isset($_POST['load'])==1)
{ $dd1 = $_REQUEST['dd'];
if($ttr == 0000-00-00){echo 'dd1';} else {echo '';}
}
?>
"required>	/

<input name="mm" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te1;} 

if(isset($_POST['load'])==1)
{ $mm1 = $_REQUEST['mm'];

if($ttr == 0000-00-00){echo 'mm1';} else {echo '';}

}

?>"required> /	

<input name="yy" type="text" maxlength="4" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te2;} 


if(isset($_POST['load'])==1)
{ 

$yy1 = $_REQUEST['yy'];
if($ttr == 0000-00-00){echo 'yy1';} else {echo '';}




}


?>"required>		  
	  



	  <br><br> 


	  
	  
	  
	  <label for="name"><strong>Patients Type:</strong></label>
			<select name="staff" required>
			        <option value="">-Select-</option>
					<option value='Staff'>Staff</option>
					<option value='Staffs Spouse'>Staff's Spouse</option>
					<option value='Staff Children'>Staff's Children</option>
					<option value='General'>General</option>			
				
			</select>
<label for="age"><strong>Staff ID:</strong></label>
      <input name="staff_id" type="text" size="70" value="<?php echo $data59['sid'];?>">
	  
	  <label for="name"><strong>Prefer Bed Type:</strong></label>
			<select name="btype" required>
			        <option value="">-Select-</option>
					<option value='VIP Cabin'>VIP Cabin</option>
					<option value='AC Cabin'>AC Cabin</option>
					<option value='Family Cabin'>Family Cabin</option>
					<option value='Non AC Cabin'>Non AC Cabin</option>
					<option value='Normal Bed'>Normal Bed</option>
					<option value='Free Bed'>Free Bed</option>
					<option value='Isolation Bed'>Isolation Bed</option>			
					
					<option value='Daycare'>Daycare</option>
					<option value='Orthopedic Bed'>Orthopedic Bed</option>
					<option value='Patinet Choice'>Patinet Choice</option>
					<option value='Maternity Suite'>Maternity Suite</option>
					<option value='ICU'>ICU</option>
					
					<option value='HDU'>HDU</option>
					<option value='NICU'>NICU</option>
					
					<option value='CARDIAC HIGH DEPENDENCY UNIT'>CARDIAC HIGH DEPENDENCY UNIT</option>
					<option value='CARDIAC OBSERVATION UNIT'>CARDIAC OBSERVATION UNIT</option>
					<option value='CARDIAC CRITICAL UNIT'>CARDIAC CRITICAL UNIT</option>
					
					
				
			</select>
	  
      <label for="age"><strong>Diagnosis :</strong></label>
	  	<textarea size="100" name="diagnosis"></textarea>
		      <label for="age"><strong>Suggested Date of Admission :</strong></label>
		<input type="text" class="style1" name="date" id="datepicker" placeholder="Select Date" size="15" required >
		<label for="age"><strong>Plan :</strong></label>
	  	<textarea size="100" name="plan"></textarea>
		<label for="age"><strong>Instruction For MO After Admission  :</strong></label>
	  	<textarea size="100" name="instruction"></textarea>
 <label for="age"><strong>Probable Date of Discharge  :</strong></label>
		<input type="text" class="style1" name="date1" id="datepicker1" placeholder="Select Date" size="15" >
		<label for="age"><strong>Remarks  :</strong></label>
	  	<textarea size="100" name="remarks"></textarea>
		
		
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		<a target='_blank' href="adm?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data4["adoc"]; ?>&adate=<?php echo $data4["adate"]; ?>&eid=<?php echo $count1; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>
