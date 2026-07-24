<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call')"; 
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
//$full = $row39['fullname'];

//include("auth.php");
//echo $count1;

$ss=date('m/d/Y');

$rd=date('m/d/Y',strtotime($_REQUEST["rd"]));
$rd1=$_REQUEST["rd"];


$querymax = "SELECT max(sid) FROM covidopd"; 
$resultmax = mysqli_query($con, $querymax) or die(mysqli_error());
$rowmax = mysqli_fetch_array($resultmax);
$max=$rowmax['max(sid)']+1;



  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$sid = $_REQUEST['sid'];
$cp = $_REQUEST['cp'];
$name = $_REQUEST['name'];
$psex = $_REQUEST['psex'];
$page = $_REQUEST['page'];
$phone = $_REQUEST['phone'];
$padd = $_REQUEST['padd'];
$district = $_REQUEST['district'];
$ward = $_REQUEST['ward'];
$email = $_REQUEST['email'];
$xl=$_REQUEST['xl'];
$lx= implode(",",$xl);
$phyper = $_REQUEST['phyper'];
$pdm = $_REQUEST['pdm'];
$asthma = $_REQUEST['asthma'];
$copd = $_REQUEST['copd'];
$mali = $_REQUEST['mali'];
$other = $_REQUEST['other'];
$ssent = date('Y-m-d',strtotime($_REQUEST["ssent"]));
$ssent1 = date('d/m/Y',strtotime($_REQUEST["ssent"]));
$sentto = $_REQUEST['sentto'];
$specimen = $_REQUEST['specimen'];
//$tresult=$_REQUEST['tresult'];
//$rdate=date('Y-m-d',strtotime($_REQUEST["rdate"]));
//$rdate1=date('d/m/Y',strtotime($_REQUEST["rdate"]));
$ldate=date('Y-m-d',strtotime($_REQUEST["ldate"]));
$ldate1=date('d/m/Y',strtotime($_REQUEST["ldate"]));
$pcase = $_REQUEST['pcase'];
$advice = $_REQUEST['advice'];
$adate= date('d/m/Y H:i:s');
$adate1= date('Y-m-d');
$sam=$_REQUEST['sam'];
$tp=$_REQUEST['tp'];
$pro=$_REQUEST['pro'];



$queryt = "SELECT COUNT(sid) FROM covidopd where sid='$sid' and adate='$adate1'"; 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_array($resultt);
$co=$rowt['COUNT(sid)'];

$querym = "SELECT COUNT(sid) FROM covidopd where ssent='$rd1'"; 
$resultm = mysqli_query($con, $querym) or die(mysqli_error());
$rowm = mysqli_fetch_array($resultm);
$c1m=$rowm['COUNT(sid)'];




if($co>0)
	
	{
		
	 echo '<script language="javascript">';
    echo 'alert("Unsuccessful !! Patient Already Gave Sample for Today"); ';
    echo '</script>';
	
	}



else if($c1m<=30)
{

$ins_query1="insert into covidopd (`sid`,`cp`,`name`,`psex`,`page`,`phone`,`padd`,`district`,`ward`,`symptom`,`phyper`,`pdm`,
`asthma`,`copd`,`mali`,`other`,`ssent`,`ssent1`,`sentto`,`specimen`,`ldate`,`ldate1`,`pcase`,
`advice`,`atime`,`email`,`aby`,`adate`,`sam`,`tp`,`pro`,`apdate`,`aptime`) values
 ('$sid','$cp','$name','$psex','$page','$phone','$padd','$district','$ward','$lx','$phyper','$pdm','$asthma','$copd','$mali',
 '$other','$ssent','$ssent1','$sentto','$specimen','$ldate','$ldate1','$pcase','$advice',
 '$adate','$email','$user','$adate1','$sam','$tp','$pro','$ssent','09:00AM')";
	
	mysqli_query($con,$ins_query1) or die(mysql_error());
   echo '<script language="javascript">';
    echo 'alert("30sful"); ';
    echo '</script>';

	
	$url = "allsamplelistcovid?dt=$rd1" ;
header("Location:$url");

}


else if($c1m>30 and $c1m<=60)
{

$ins_query1="insert into covidopd (`sid`,`cp`,`name`,`psex`,`page`,`phone`,`padd`,`district`,`ward`,`symptom`,`phyper`,`pdm`,
`asthma`,`copd`,`mali`,`other`,`ssent`,`ssent1`,`sentto`,`specimen`,`ldate`,`ldate1`,`pcase`,
`advice`,`atime`,`email`,`aby`,`adate`,`sam`,`tp`,`pro`,`apdate`,`aptime`) values
 ('$sid','$cp','$name','$psex','$page','$phone','$padd','$district','$ward','$lx','$phyper','$pdm','$asthma','$copd','$mali',
 '$other','$ssent','$ssent1','$sentto','$specimen','$ldate','$ldate1','$pcase','$advice',
 '$adate','$email','$user','$adate1','$sam','$tp','$pro','$ssent','10:00AM')";
	
	mysqli_query($con,$ins_query1) or die(mysql_error());
   echo '<script language="javascript">';
    echo 'alert("31-60 Successful"); ';
    echo '</script>';

	
	$url = "allsamplelistcovid?dt=$rd1" ;
header("Location:$url");

}



else if($c1m>60 and $c1m<=90)
{

$ins_query1="insert into covidopd (`sid`,`cp`,`name`,`psex`,`page`,`phone`,`padd`,`district`,`ward`,`symptom`,`phyper`,`pdm`,
`asthma`,`copd`,`mali`,`other`,`ssent`,`ssent1`,`sentto`,`specimen`,`ldate`,`ldate1`,`pcase`,
`advice`,`atime`,`email`,`aby`,`adate`,`sam`,`tp`,`pro`,`apdate`,`aptime`) values
 ('$sid','$cp','$name','$psex','$page','$phone','$padd','$district','$ward','$lx','$phyper','$pdm','$asthma','$copd','$mali',
 '$other','$ssent','$ssent1','$sentto','$specimen','$ldate','$ldate1','$pcase','$advice',
 '$adate','$email','$user','$adate1','$sam','$tp','$pro','$ssent','11:00AM')";
	
	mysqli_query($con,$ins_query1) or die(mysql_error());
   echo '<script language="javascript">';
    echo 'alert("61-90 Successful"); ';
    echo '</script>';

	
	$url = "allsamplelistcovid?dt=$rd1" ;
header("Location:$url");

}

else if($c1m>90 and $c1m<=120)
{

$ins_query1="insert into covidopd (`sid`,`cp`,`name`,`psex`,`page`,`phone`,`padd`,`district`,`ward`,`symptom`,`phyper`,`pdm`,
`asthma`,`copd`,`mali`,`other`,`ssent`,`ssent1`,`sentto`,`specimen`,`ldate`,`ldate1`,`pcase`,
`advice`,`atime`,`email`,`aby`,`adate`,`sam`,`tp`,`pro`,`apdate`,`aptime`) values
 ('$sid','$cp','$name','$psex','$page','$phone','$padd','$district','$ward','$lx','$phyper','$pdm','$asthma','$copd','$mali',
 '$other','$ssent','$ssent1','$sentto','$specimen','$ldate','$ldate1','$pcase','$advice',
 '$adate','$email','$user','$adate1','$sam','$tp','$pro','$ssent','12:00PM')";
	
	mysqli_query($con,$ins_query1) or die(mysql_error());
   echo '<script language="javascript">';
    echo 'alert("90-120 Successful"); ';
    echo '</script>';

	
	$url = "allsamplelistcovid?dt=$rd1" ;
header("Location:$url");

}

else

	{
	 echo '<script language="javascript">';
    echo 'alert("Unsuccessful"); ';
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
  width: 80%;
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
  <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script><script>
  $(document).ready(function() {
    $("#datepicker3").datepicker();
  });
  </script>
  </script><script>
  $(document).ready(function() {
    $("#datepicker6").datepicker();
  });
  </script>
  
  <link rel="stylesheet" href="styles.css">

  
  
    <link href="./jquery.multiselect.css" rel="stylesheet" />
  
    <script src="./jquery.multiselect.js"></script>




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
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>ADD Covid Record</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  


<label for="age"><strong>Sample Classification:</strong></label>
<select name="sam" required>
        
						<option value=''>-Select-</option>
		


		<option value='New'>New</option>
		<option value='Followup'>Followup</option>
		<option value='Contact'>Contact</option>
				<option value='Death'>Death</option>
					
</select>


<label for="age"><strong>Type Of Patient:</strong></label>
<select name="tp" required>
        
						<option value=''>-Select-</option>
		


		<option value='Outside'>Outside</option>
		<option value='InPatient'>InPatient</option>
		<option value='Staff'>Staff</option>
					
</select>


	  
<label for="age"><strong>ID:</strong></label>
<input type="text" name="sid" id="email" class="input-text" placeholder="ID" size="70" value="<?php echo $max;?>"readonly>


	  <label for="age"><strong>Name:</strong></label>
<input type="text" name="name" id="email" class="input-text" placeholder="Name" size="70" value="" required>

<label for="age"><strong>Gender:</strong></label>
	 <select name="psex" required>
						<option value=''>-Select-</option>
						<option value='Male'>Male</option>
						<option value='Female'>Female</option>
					
</select>

<label for="age"><strong>Age:</strong></label>
<input type="text" name="page" id="email" class="input-text" placeholder="Age" size="70"value=""required>     




<label for="age"><strong>Phone:</strong></label>
<input type="text" name="phone" id="email" class="input-text" placeholder="Phone" size="70"value=""required>     

<label for="age"><strong>Address:</strong></label>
<input type="text" name="padd" id="email" class="input-text" placeholder="Address" size="70"value=""required>     

<label for="age"><strong>Local Ward:</strong></label>
<input type="text" name="ward" id="email" class="input-text" placeholder="Ward" size="70"value="" required>     


<label for="age"><strong>District:</strong></label>
	 <select name="district" required>
        
						<option value='Gazipur'>Gazipur</option>
						<option value='Dhaka'>Dhaka</option>
						<option value='Tangail'>Tangail</option>
						<option value='Savar'>Savar</option>

</select>

<label for="age"><strong>Profession:</strong></label>
	 <select name="pro" required>
        
		<option value='RMG Employee'>RMG Employee</option>
		<option value='Health Care Employee'>Health Care Employee</option>
		


		<option value='Others'>Others</option>
		
		
					
</select>


<label for="age"><strong>Email Address:</strong></label>
<input type="text" name="email" id="email" class="input-text" placeholder="Email" size="70"value="">     


<label><strong>Sign Symptoms Present:</strong></label>
<select name="xl[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=''>Not Required</option>
<option value='Asymptomatic'>Asymptomatic</option>
<option value='Fever'>Fever</option>
<option value='Headache'>Headache</option>
<option value='Cough'>Cough</option>
<option value='Sore Throat'>Sore Throat</option>
<option value='Breathlessness'>Breathlessness</option>
	
      
    </select>
<br>

<label for="age" ><strong>Comobidity:</strong></label><br>
<p>
 Hypertension:&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="phyper" value="YES"required>YES&nbsp;&nbsp;<input type="radio" name="phyper" value="NO"checked="checked"required> NO<br>
 
 DM:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="pdm" value="YES"required>YES&nbsp;&nbsp;<input type="radio" name="pdm" value="NO"checked="checked"required> NO <br>
 Asthma:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="asthma" value="YES"required>YES &nbsp;<input type="radio" name="asthma" value="NO"checked="checked"required> NO<br>
 COPD:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="copd" value="YES"required>YES &nbsp;<input type="radio" name="copd" value="NO"checked="checked"required> NO<br>
 Malignancy:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="mali" value="YES"required>YES &nbsp;<input type="radio" name="mali" value="NO"checked="checked"required> NO<br>
 
 
 
 </p>
<br>

<label for="age"><strong>Others(if Any):</strong></label>
<input type="text" name="other" id="email" class="input-text" placeholder="Others" size="70"value="">     

<label for="age"><strong>Symptoms Start Date:</strong></label>
<input type="text" name="ldate" id="datepicker1" placeholder="Select Date" size="15" >


<label for="age"><strong>Sample Sent:</strong></label>
<input type="text" name="ssent" id="datepicker" placeholder="Select Date" size="15" value="<?php echo $rd;?>">


<label for="age"><strong>Sent To:</strong></label>
	 <select name="sentto" required>
        <option value='BLIR'>BLIR</option>
		<option value='NILM'>NILM</option>
		


		<option value='IEDCR'>IEDCR</option>
		<option value='IPH'>IPH</option>
		
					
</select>

<label for="age"><strong>Specimen:</strong></label>
<input type="text" name="specimen" id="email" class="input-text" placeholder="Specimen" size="70"value="Nasal Swab"required>     











	  
	    
  
   <label for="age"><strong>Travel History:</strong></label>
<select name="pcase" required>
        <option value='NO'>NO</option>
						
		


		<option value='YES'>YES</option>
		
					
</select>

	  	  <label for="age"><strong>Contact History With Positive Case:</strong></label>
<select name="cp" required>
        
						
		

<option value='NO'>NO</option>
		<option value='YES'>YES</option>
		
					
</select>



<label for="age"><strong>Advice:</strong></label>
<textarea rows="15" name="advice" ></textarea>






    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 4,
            placeholder: 'Select Symptoms',
            search: true,
            searchOptions: {
                'default': '-Select Symptoms-'
            },
            selectAll: true
        });

    });
</script>

  </fieldset>

 

<table><tr><td colspan="15">		<button type="submit" name="Submit">ADD</button></td>
</table>

</form>
  


</body>

</html>
