<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','rad','mng','qc','ev','evv')"; 
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
$aatime=date('d/m/Y H:i:s'); 
$adate1=date('Y-m-d'); 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_username"];

$eid=$_REQUEST["eid"];

require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from event where id='$eid'");
$data = mysqli_fetch_array($query);
$event=$data['id'];
$edate=$data['edate'];



$status = "";
if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];

$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
//$bill = $_REQUEST['bill'];
//$hdlate = $_REQUEST['hdlate'];
//$yage = $_REQUEST['yage'];


$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];










$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];

//$fdate='$dd-$mm-$yy';


//$fdate='$dd-$mm-$yy';


$date1=date_create("$dd-$mm-$yy");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");

$diff2= $diff->format("%y");


$weight = $_REQUEST['weight'];
$height = $_REQUEST['height'];
$pulse = $_REQUEST['pulse'];
$pulseoxy = $_REQUEST['pulseoxy'];
$bp = $_REQUEST['bp'];
$spo2 = $_REQUEST['spo2'];
$bsugar = $_REQUEST['bsugar'];
$waist = $_REQUEST['waist'];






$ins_query="insert into pinfo (`pname`,`age`,`cno`,`height`,`weight`,`pulseoxi`,`pulse`,`spo2`,`sbp`,`event`,`padd`,`age1`,`gender`,`bsugar`,`pmrn`,`edate`,`waist`) values ('$name', '$diff1','$pphone','$height','$weight','$pulseoxy','$pulse','$spo2','$bp','$event','$padd','$diff1','$psex','$bsugar','$pmrn','$edate','$waist')";
mysqli_query($con,$ins_query) or die(mysql_error());



//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`psex`,`bdate`,`dis`) values ('$name', '$pmrn','$pphone','$padd','$psex','$date91','$dis')";
//mysqli_query($con,$ins_query1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully!!!"); ';
    echo '</script>';
 

 
 $url = "event_print_details" ;
header("Location:$url");

}


?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SFMMKPJSH DHAKA</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
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
    max-width: 800px;
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
  
  
  
  
 
  
  <link rel="stylesheet" href="styles.css">
  
</head>

<body>

<div id='cssmenu'>

</div>



  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>Registration Panel</h1>
		<h2 align='center'><?php echo $data['ename'];?></h2>

        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			 <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="80" value="" required >
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="80" value="<?php if(isset($_POST['load'])==1)
{ $padd = $_REQUEST['padd'];
echo $padd;
}
?>" required>



	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            
	  	<select name="psex" class="style1" placeholder="Gender" required> 
		
		
			<option value="">-Select Gender-</option>;
			<option value="M">MALE</option>;
			<option value="F">FEMALE</option>;
			
				
      </select>
            <input name="pmrn" type="text" size="15" placeholder="MRN" value="" >
      <input name="pphone" type="text" size="13" placeholder="Phone No"value="" required>	  
	        


	  

	  <br><br>
<label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="" required placeholder="DD">	/

<input name="mm" type="text" maxlength="2" size="1" value="" required placeholder="MM"> /	

<input name="yy" type="text" maxlength="4" size="1" value="" required placeholder="YYYY">		  
	  
	
	  

	  <br><br> 
	  
							 

<input type="hidden" name='yage'value="<?php	  if(isset($_POST['load'])==1)
{ 

echo $diffy;
}
?>" size="57" readonly>





<label for="age"><strong>Patient's Examination Value :</strong></label>
	  	
            
	  	            <input name="height" type="text" size="15" placeholder="Height" value="" required>
            <input name="weight" type="text" size="15" placeholder="Weight" value="" required>
      <input name="pulseoxy" type="text" size="13" placeholder="Pulse Oximeter"value="" required>	  
	        <input name="pulse" type="text" size="13" placeholder="Pulse"value="" required>	  
			
			
			
			
			
				  	            <input name="spo2" type="text" size="15" placeholder="SPO2" value="" required>
            <input name="bp" type="text" size="15" placeholder="SBP & DBP" value="" required>
      <input name="bsugar" type="text" size="13" placeholder="Blood Sugar"value="" required>	  
	  <input name="waist" type="text" size="13" placeholder="Waist Circumference"value="" required>	  
	        

			
			
			

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
