<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','rad')"; 
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
 
require('db1.php');




//include("auth1.php");
$user=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['submit'])==1)
{

$name =$_REQUEST['dname'];
//$did =$_REQUEST['did'];
$date = $_REQUEST['date'];
$checkbox = $_REQUEST['select'];
$checkbox2 = $_REQUEST['select2'];
$checkbox3 = $_REQUEST['select3'];
$checkbox4 = $_REQUEST['select4'];
$checkbox5 = $_REQUEST['select5'];
$checkbox6 = $_REQUEST['select6'];
$checkbox7 = $_REQUEST['select7'];
$checkbox8 = $_REQUEST['select8'];
$checkbox9 = $_REQUEST['select9'];
$checkbox10 = $_REQUEST['select10'];
$checkbox11 = $_REQUEST['select11'];
$checkbox12 = $_REQUEST['select12'];
$checkbox13 = $_REQUEST['select13'];
$checkbox14 = $_REQUEST['select14'];








if (!empty ($_POST['select'])&& ($_POST['dname'])=="USG"){
		
$update="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:00AM'";
mysqli_query($con,$update) or die(mysql_error());
}

if (!empty ($_POST['select'])&& ($_POST['dname'])=="USG"){
		
$update1="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:20AM'";
mysqli_query($con,$update1) or die(mysql_error());
}
if (!empty ($_POST['select'])&& ($_POST['dname'])=="USG"){
		
$update2="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:40AM'";
mysqli_query($con,$update2) or die(mysql_error());
}
if (!empty ($_POST['select2'])&& ($_POST['dname'])=="USG"){
		
$update3="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:00AM'";
mysqli_query($con,$update3) or die(mysql_error());
}
if (!empty ($_POST['select2'])&& ($_POST['dname'])=="USG"){
		
$update4="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:20AM'";
mysqli_query($con,$update4) or die(mysql_error());
}

if (!empty ($_POST['select2'])&& ($_POST['dname'])=="USG"){
		
$update5="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:40AM'";
mysqli_query($con,$update5) or die(mysql_error());
}
if (!empty ($_POST['select3'])&& ($_POST['dname'])=="USG"){
		
$update6="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:00PM'";
mysqli_query($con,$update6) or die(mysql_error());
}

if (!empty ($_POST['select3'])&& ($_POST['dname'])=="USG"){
		
$update7="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:20PM'";
mysqli_query($con,$update7) or die(mysql_error());
}
if (!empty ($_POST['select3'])&& ($_POST['dname'])=="USG"){
		
$update8="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:40PM'";
mysqli_query($con,$update8) or die(mysql_error());
}
if (!empty ($_POST['select4'])&& ($_POST['dname'])=="USG"){
		
$update9="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:00PM'";
mysqli_query($con,$update9) or die(mysql_error());
}
if (!empty ($_POST['select4'])&& ($_POST['dname'])=="USG"){
		
$update10="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:20PM'";
mysqli_query($con,$update10) or die(mysql_error());
}
if (!empty ($_POST['select4'])&& ($_POST['dname'])=="USG"){
		
$update11="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:40PM'";
mysqli_query($con,$update11) or die(mysql_error());
}

if (!empty ($_POST['select5'])&& ($_POST['dname'])=="USG"){
		
$update12="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:00PM'";
mysqli_query($con,$update12) or die(mysql_error());
}
if (!empty ($_POST['select5'])&& ($_POST['dname'])=="USG"){
		
$update13="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:20PM'";
mysqli_query($con,$update13) or die(mysql_error());
}
if (!empty ($_POST['select5'])&& ($_POST['dname'])=="USG"){
		
$update14="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:40PM'";
mysqli_query($con,$update14) or die(mysql_error());
}

if (!empty ($_POST['select6'])&& ($_POST['dname'])=="USG"){
		
$update15="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:00PM'";
mysqli_query($con,$update15) or die(mysql_error());
}
if (!empty ($_POST['select6'])&& ($_POST['dname'])=="USG"){
		
$update16="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:20PM'";
mysqli_query($con,$update16) or die(mysql_error());
}
if (!empty ($_POST['select6'])&& ($_POST['dname'])=="USG"){
		
$update17="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:40PM'";
mysqli_query($con,$update17) or die(mysql_error());
}
if (!empty ($_POST['select7'])&& ($_POST['dname'])=="USG"){
		
$update18="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:00PM'";
mysqli_query($con,$update18) or die(mysql_error());
}
if (!empty ($_POST['select7'])&& ($_POST['dname'])=="USG"){
		
$update19="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:20PM'";
mysqli_query($con,$update19) or die(mysql_error());
}

if (!empty ($_POST['select7'])&& ($_POST['dname'])=="USG"){
		
$update20="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:40PM'";
mysqli_query($con,$update20) or die(mysql_error());
}
if (!empty ($_POST['select8'])&& ($_POST['dname'])=="USG"){
		
$update21="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:00PM'";
mysqli_query($con,$update21) or die(mysql_error());
}
if (!empty ($_POST['select8'])&& ($_POST['dname'])=="USG"){
		
$update22="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:20PM'";
mysqli_query($con,$update22) or die(mysql_error());
}
if (!empty ($_POST['select8'])&& ($_POST['dname'])=="USG"){
		
$update23="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:40PM'";
mysqli_query($con,$update23) or die(mysql_error());
}
if (!empty ($_POST['select9'])&& ($_POST['dname'])=="USG"){
		
$update24="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:00PM'";
mysqli_query($con,$update24) or die(mysql_error());
}
if (!empty ($_POST['select9'])&& ($_POST['dname'])=="USG"){
		
$update25="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:20PM'";
mysqli_query($con,$update25) or die(mysql_error());
}
if (!empty ($_POST['select9'])&& ($_POST['dname'])=="USG"){
		
$update26="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:40PM'";
mysqli_query($con,$update26) or die(mysql_error());
}
if (!empty ($_POST['select10'])&& ($_POST['dname'])=="USG"){
		
$update27="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='08:00PM'";
mysqli_query($con,$update27) or die(mysql_error());
}
if (!empty ($_POST['select10'])&& ($_POST['dname'])=="USG"){
		
$update28="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='08:20PM'";
mysqli_query($con,$update28) or die(mysql_error());
}
if (!empty ($_POST['select10'])&& ($_POST['dname'])=="USG"){
		
$update29="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='08:40PM'";
mysqli_query($con,$update29) or die(mysql_error());
}
if (!empty ($_POST['select11'])&& ($_POST['dname'])=="USG"){
		
$update30="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='09:00PM'";
mysqli_query($con,$update30) or die(mysql_error());
}
if (!empty ($_POST['select11'])&& ($_POST['dname'])=="USG"){
		
$update31="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='09:20PM'";
mysqli_query($con,$update31) or die(mysql_error());
}
if (!empty ($_POST['select11'])&& ($_POST['dname'])=="USG"){
		
$update32="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='09:40PM'";
mysqli_query($con,$update32) or die(mysql_error());
}
if (!empty ($_POST['select12'])&& ($_POST['dname'])=="USG"){
		
$update33="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:00PM'";
mysqli_query($con,$update33) or die(mysql_error());
}

if (!empty ($_POST['select12'])&& ($_POST['dname'])=="USG"){
		
$update34="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:20PM'";
mysqli_query($con,$update34) or die(mysql_error());
}
if (!empty ($_POST['select12'])&& ($_POST['dname'])=="USG"){
		
$update35="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:40PM'";
mysqli_query($con,$update35) or die(mysql_error());
}
if (!empty ($_POST['select13'])&& ($_POST['dname'])=="USG"){
		
$update36="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:00PM'";
mysqli_query($con,$update36) or die(mysql_error());
}
if (!empty ($_POST['select13'])&& ($_POST['dname'])=="USG"){
		
$update37="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:20PM'";
mysqli_query($con,$update37) or die(mysql_error());
}
if (!empty ($_POST['select13'])&& ($_POST['dname'])=="USG"){
		
$update38="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:40PM'";
mysqli_query($con,$update38) or die(mysql_error());
}
if (!empty ($_POST['select14'])&& ($_POST['dname'])=="USG"){
		
$update39="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='09:00AM'";
mysqli_query($con,$update39) or die(mysql_error());
}
if (!empty ($_POST['select14'])&& ($_POST['dname'])=="USG"){
		
$update40="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='09:20AM'";
mysqli_query($con,$update40) or die(mysql_error());
}
if (!empty ($_POST['select14'])&& ($_POST['dname'])=="USG"){
		
$update41="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='09:40AM'";
mysqli_query($con,$update41) or die(mysql_error());
}


if (!empty ($_POST['select15'])&& ($_POST['dname'])=="USG"){
		
$update42="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='08:00AM'";
mysqli_query($con,$update42) or die(mysql_error());
}
if (!empty ($_POST['select15'])&& ($_POST['dname'])=="USG"){
		
$update43="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='08:20AM'";
mysqli_query($con,$update43) or die(mysql_error());
}
if (!empty ($_POST['select15'])&& ($_POST['dname'])=="USG"){
		
$update44="update rapp set status='AVAILABLE' where dname='$name' and  ddate='$date' and dslot='08:40AM'";
mysqli_query($con,$update44) or die(mysql_error());
}


echo '<script language="javascript">';
    echo 'alert("Appointment Slot Unblocked Successfully !!"); ';
    echo '</script>';}
?>





<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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
  width: 19%;
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
    max-width: 800px;
  }

}
      </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
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
  
  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>



<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment Menu</span></a>
	  <ul>
	  <li class='last'><a href='radapp'><span>Appointment</span></a></li>
	  <li class='last'><a href='radblock'><span>Block Appointment Slot</span></a></li>
	  <li class='last'><a href='radeditapp'><span>Cancel Patient Appointment </span></a></li>
	  
	  
	  
	  
	  </ul>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allapp'><span>Print Appointment Report </span></a>
		 <li class='has-sub'><a href='allpen'><span>Search all Pending Reports </span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>pending Report Search By MRN</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
			<li class='last'><a href='radview3'><span>All Confirmed Reports</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='newdoc'><span>Add New Doctor</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Search pending request </span></a></li>
		  		        <li class='last'><a href='donereportedit'><span>EDIT</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>UNBLOCK RADIOLOGY DATE &amp; TIME </h1>
        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="name">Service's Name :</label>
			</span>
			<select name="dname" value="">
			       <option value=''>-Select Service-</option>
	  <option value='XRAY'>XRAY</option>
	  <option value='USG'>USG</option>
	  	  <option value='CT SCAN'>CT SCAN</option>
		  <option value='MRI'>MRI</option>
	  <option value='BMD'>BMD</option>
			</select>
<!-- E-mail Input -->
			<label for="mail"><strong>Block Date :</strong></label>
									<input type="text" name="date" id="datepicker" placeholder="Select Date">
<!-- Password Input --><!-- Age Dropdown -->
			<label for="age"><strong>BLOCK UR SLOT :</strong></label>
		
		
		
		<select name="select15">
	  <option value=''>08AM-09AM</option>
	  <option value='Available'>AVAILABLE</option>
	  
      </select>	
		
		<select name="select14">
	  <option value=''>09AM-10AM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>	
			<select name="select">
	  <option value=''>10AM-11AM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
						
			<select name="select2">
	  <option value=''>11AM-12AM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
			<select name="select3">
	  <option value=''>12PM-1PM</option>
	  <option value=' AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  	<select name="select4">
	  <option value=''>2PM-3PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  	<select name="select5">
	  <option value=''>3PM-4PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  	<select name="select6">
	  <option value=''>4PM-5PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
      <select name="select7">
	  <option value=''>5PM-6PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  <select name="select8">
	  <option value=''>6PM-7PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  <select name="select9">
	  <option value=''>7PM-8PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  	  <select name="select10">
	  <option value=''>8PM-9PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  <select name="select11">
	  <option value=''>9PM-10PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  
	  <select name="select12">
	  <option value=''>10PM-11PM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  <select name="select13">
	  <option value=''>11PM-12AM</option>
	  <option value='AVAILABLE'>AVAILABLE</option>
	  
      </select>
	  
	  <br>
  </fieldset>

		<button type="submit" name="submit">Unblock Confirm</button>

</form>
  
  

</body>

</html>
