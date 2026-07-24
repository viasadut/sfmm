<?php
include_once 'dbconfig.php';
?>
<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf')"; 
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
//$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$pmrn=$_REQUEST['dname'];
//include("auth.php");
//echo $count1;
 
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data59 = mysqli_fetch_assoc($query4);


$query444 = mysqli_query($db,"select * from endopapp where ID='$id'");
$data444 = mysqli_fetch_assoc($query444);



$dname=$data444['dname'];
$pname=$data444['pname'];
$pmrn=$data444['pmrn'];
$page=$data444['page'];
$padd=$data444['padd'];
$gender=$data444['psex'];
$pphone=$data444['pphone'];
$eid=$data444['eid'];


$query43 = "SELECT COUNT(pmrn) FROM inpatient where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;  
  
  
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


//$pname = $_REQUEST['pname'];
//$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
//$page=$_REQUEST['page'];
//$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];
//$diagnosis=$_REQUEST['diagnosis'];
//$date=$_REQUEST['date'];
//$plan=$_REQUEST['plan'];
//$instruction=$_REQUEST['instruction'];
//$date1=$_REQUEST['date1'];
//$remarks=$_REQUEST['remarks'];
//$btype=$_REQUEST['btype1'];
//$bno=$_REQUEST['bno'];
$adate= date('d/m/Y H:i:s');
$aadate= date('m/d/Y ');
$fname=$_REQUEST['fname'];
$mname=$_REQUEST['mname'];
$peradd=$_REQUEST['peradd'];
$nid1=$_REQUEST['nid1'];
$pocu=$_REQUEST['pocu'];
$mincome=$_REQUEST['mincome'];
$wife=$_REQUEST['wife'];
$child=$_REQUEST['child'];
$isource=$_REQUEST['isource'];
$land=$_REQUEST['land'];
$service=$_REQUEST['service'];
$poss=$_REQUEST['poss'];
$political=$_REQUEST['political'];
$date1 = date('d/m/Y H:i:s');
$ddate1 = date('m/d/Y');
$nidcard=$_REQUEST['nidcard'];
$bcard=$_REQUEST['bcard'];
$vgcard=$_REQUEST['vgcard'];
$ocard=$_REQUEST['ocard'];
$wcard=$_REQUEST['wcard'];
$hcard=$_REQUEST['hcard'];
$fcard=$_REQUEST['fcard'];
$ecost1=$_REQUEST['ecost1'];
$dia1=$_REQUEST['dia1'];
$cinfo=$_REQUEST['cinfo'];
$bfigure=$_REQUEST['bfigure'];
$bword=$_REQUEST['bword'];

$scase=$_REQUEST['scase'];
$vpoor=$_REQUEST['vpoor'];
$aldate=date('Y-m-d', strtotime($_REQUEST['aldate']));
$pvno=$_REQUEST['pvno'];
$pvdate=date('Y-m-d', strtotime($_REQUEST['pvdate']));
$spcase=$_REQUEST['spcase'];


$update212="update endopapp set fname='$fname', mname='$mname',dia1='$dia1', peradd='$peradd', nid='$nid1', pocu='$pocu', mincome='$mincome', wife='$wife', child='$child', isource='$isource', land='$land', service='$service', poss='$poss', political='$political',dia1='$dia1',cinfo='$cinfo',nidcard='$nidcard',bcard='$bcard',vgcard='$vgcard',ocard='$ocard',wcard='$wcard',hcard='$hcard',fcard='$fcard',bfigure='$bfigure',bword='$bword',ecost1='$ecost1', pphone='$pphone',user='$user',scase='$scase',vpoor='$vpoor',aldate='$aldate',pvno='$pvno',pvdate='$pvdate',spcase='$spcase' where `ID`='$id'";
mysqli_query($con,$update212);

$update23="update patient set pname='$pname' where `pmrn`='$pmrn'";
mysqli_query($con,$update23);


    echo '<script language="javascript">';
    echo 'alert("Record Successfully Updated"); ';
    echo '</script>';

	
	

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
  width: 30%;
}

select1 {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 20%;
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
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
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
  <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
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
<label for="age" align="right"><strong><a target='_blank' href="opdradreportmng?pmrn=<?php echo "$pmrn"; ?>"><b>Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolinkmng?pmrn=<?php echo "$pmrn"; ?>"><b>Cardiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>Lab Report<b></a>&nbsp;&nbsp;<a target='_blank' href="surnotemng?pmrn=<?php echo "$pmrn"; ?>"><b>Surgery Note<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportinmng?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp;<a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>"><b>Patients Records<b></a></td>		</tr></strong></label>

        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			 <label1 for="age"><strong color="green">Patient Particulars   :</strong></label1> <br><br><br>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" value="<?php echo $data59['pname'];?>"required readonly >
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" value="<?php echo $data59['padd'];?>"required readonly>

	  <label for="age"><strong>Patient's Details (Gender / MRN / Phone / Age) :</strong></label>
	  	<input name="psex" type="text" size="10" value="<?php echo $data59['psex'];?>"required readonly>

		
						


						<input name="pmrn" type="text" size="15" value="<?php echo $data59['pmrn'];?>" placeholder="MRN" required readonly/>
      <input name="pphone" type="text" size="13" value="<?php echo $data59['pphone'];?>" placeholder="Phone No" required>	  
	  <input name="page" type="text" size="2"value="<?php echo $data59['page'];?>" placeholder="Age" required readonly/>

	  		<label for="age"><strong>Patient's Diagnosis:</strong></label>
		
			  	<textarea name="diagno" required><?php echo $data444['dia1'];?></textarea>
		
		<br><br>

		<label for="age"><strong>Father's Name :</strong></label>
		<input name="fname" type="text" size="70" value="<?php echo $data444['fname'];?>"required  />
		<label for="age"><strong>Mother's Name :</strong></label>
		<input name="mname" type="text" size="70" value="<?php echo $data444['mname'];?>"required  />

		<label for="age"><strong>Permanent Address :</strong></label>
		<input name="peradd" type="text" size="70" value="<?php echo $data444['peradd'];?>"required  />

		<label for="age"><strong>National ID :</strong></label>
		<input name="nid1" type="text" size="70" value="<?php echo $data444['nid'];?>"required  />


      <label1 for="age"><strong color="green">Financial condition of the patients  :</strong></label1> <br><br><br>
	  
	  <label for="age"><strong>Occupation of the patient  :</strong></label> <br>
	  
	  <input list=pocu name="pocu" placeholder="Select Occupation" size="70" value="<?php echo $data444['pocu'];?>">
					<datalist id="pocu">	
						
						<option value='Government Job'>Government Job</option>
						<option value='Private Job'>Private Job</option>
						<option value='Business'> Business</option>
						<option value='Student'> Student</option>
						<option value='Farmer'> Farmer</option>
						<option value='Housewife'> Housewife</option>
						<option value='Others'>Others</option>
				 
						

						</datalist>
	 

	  	<br><br>
		
		<label for="age"><strong>Monthly Income :</strong></label>
		<input name="mincome" type="text" size="70" value="<?php echo $data444['mincome'];?>"required  />
		
		<label for="age"><strong>Dependents Please Mention Numbers :</strong></label>
		<input name="wife" type="text" size="30" value="<?php echo $data444['wife'];?>"required placeholder="Wife" />
		<input name="child" type="text" size="30" value="<?php echo $data444['child'];?>"required placeholder="Children"  />
		<br><br>
		<label for="age"><strong>Income Source of Dependents :</strong></label>
		<input name="isource" type="text" size="70" value="<?php echo $data444['isource'];?>"required  />
		<br><br>
		
		<label for="age"><strong>Owner of Land in Favor of Patients (in Acre) :</strong></label>
		<input name="land" type="text" size="70" value="<?php echo $data444['land'];?>"required  />
		<br><br>
		<label for="age"><strong>Service Place :</strong></label>
		<input name="service" type="text" size="70" value="<?php echo $data444['service'];?>"required  />
		<br><br>
		<label for="age"><strong>Select on the Patient’s possession (Have to include the photocopy)  :</strong></label> <br>
	  
	  <input list=poss name="poss" placeholder="Select Possession" size="70" value="<?php echo $data444['poss'];?>">
					<datalist id="poss">	
						
						<option value='VGF Card'>VGF Card</option>
						<option value='Old Allowance'>Old Allowance</option>
						<option value='Widow Allowance'> Widow Allowance</option>
						<option value='Handicap Card'>Handicap Card</option>
						<option value='Freedom Fighter Certificate'>Freedom Fighter Certificate</option>	
						

						</datalist>
						
						<br><br>
		<label for="age"><strong>Member of any political party , if yes have to mention with designation :</strong></label>
		<input name="political" type="text" size="70" value="<?php echo $data444['political'];?>"required  />
		<br><br>
<label for="age"><strong>Diagnosis</strong></label>
<textarea rows="5"  name="dia1" required><?php echo $data444['dia1'];?></textarea>
<label for="age"><strong>Clinical Condition</strong></label>
<textarea rows="5"  name="cinfo" required value=""><?php echo $data444['cinfo'];?></textarea>

<label for="age"><strong>Estimated Cost For Treatment :</strong></label>
<input name="ecost1" type="text" size="70" value="<?php echo $data444['ecost1'];?>"required  />		<b>	  

<label for="age"><strong>Recommended Donation Amount(Figure in BDT) :</strong></label>
<input name="bfigure" type="text" size="70" value="<?php echo $data444['bfigure'];?>"required  />		<b>	  

<label for="age"><strong>Recommended Donation Amount(In Words) :</strong></label>
<input name="bword" type="text" size="70" value="<?php echo $data444['bword'];?>"required  />		<b>	  


<label for="age"><strong>Mention if considered as a special case and give reasons :</strong></label>
<textarea name="scase" required><?php echo $data444['scase'];?></textarea>
<b>	  

<label for="age"><strong>Patient Financial Condition :</strong></label>
<input name="vpoor" type="text" size="70" value="Very Poor"required  />		<b>	  
<label for="age"><strong>Allocation Date:</strong></label>
<input type="text" name="aldate" id="datepicker" placeholder="MM/DD/YYYY" size="15" value="<?php echo date('m/d/Y', strtotime($data444['aldate']));?>" >

<label for="age"><strong>Payment Voucher NO :</strong></label>
<input name="pvno" type="text" size="70" value="<?php echo $data444['pvno'];?>"  required>		<b>	  


<label for="age"><strong>Payment Voucher Date:</strong></label>
<input type="text" name="pvdate" id="datepicker1" placeholder="MM/DD/YYYY" size="15" value="<?php echo date('m/d/Y', strtotime($data444['pvdate']));?>" >


<label for="age"><b>Attachment with the Application :</label><b>		<br><b>
<b>NID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="nidcard" value="NID" required/> Attached <input type="radio" name="nidcard" value=""checked="checked"required/> Not Attached<b><br><br> 
<b>Birth Certificate: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="bcard" value="Birth Certificate" required/> Attached <input type="radio" name="bcard" value=""checked="checked"required/> Not Attached<b><br><br>
<b>VGF Card : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="vgcard" value="VGF Card" required/> Attached <input type="radio" name="vgcard" value=""checked="checked"required/> Not Attached<b><br>		 <br>
<b>Old Allowance : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="ocard" value="Old Allowance Card" required/> Attached <input type="radio" name="ocard" value=""checked="checked"required/> Not Attached<b><br>		 <br>
<b>Widow Allowance : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="wcard" value="Attached" required> Attached <input type="radio" name="wcard" value=""checked="checked"required/> Not Attached<b><br>		 <br>
<b>Handicap Card : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="hcard" value="Handicap Card" required/> Attached <input type="radio" name="hcard" value=""checked="checked"required/> Not Attached<b><br>		 <br>
<b>Freedom Fighter Certificate : &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="fcard" value="Freedom Fighter Certificate" required/> Attached <input type="radio" name="fcard" value=""checked="checked"required/> Not Attached<b><br>		 <br>
<b>Special Case : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="spcase" value="Special"  required> Special Case <input type="radio" name="spcase" value="no" checked="checked"required> Not Special<b><br>		 <br>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');



//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['ID'];
//$adate=$_REQUEST['adate'];
$query49 = mysqli_query($db,"select * from endopapp where pmrn='$pmrn' and eid='$eid';");
$data49 = mysqli_fetch_assoc($query49);
  
?>


<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		<a target='_blank' href="admnewddendonew?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data49["dreffer"]; ?>&adate=<?php echo $data49["adate"]; ?>&eid=<?php echo $eid; ?>&id=<?php echo $id; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>
