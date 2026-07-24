<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
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

if (!empty ($_POST['select'])){
$update="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:00AM'";
mysqli_query($con,$update) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$update1="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:10AM'";
mysqli_query($con,$update1) or die(mysql_error());
}

if (!empty ($_POST['select'])){
$update2="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:20AM'";
mysqli_query($con,$update2) or die(mysql_error());
}

if (!empty ($_POST['select'])){
$update3="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:30AM'";
mysqli_query($con,$update3) or die(mysql_error());
}

if (!empty ($_POST['select'])){
$update4="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:40AM'";
mysqli_query($con,$update4) or die(mysql_error());
}

if (!empty ($_POST['select'])){
$update5="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:50AM'";
mysqli_query($con,$update5) or die(mysql_error());
}

if (!empty ($_POST['select'])){
$update6="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='10:50AM'";
mysqli_query($con,$update6) or die(mysql_error());
}

if (!empty ($_POST['select2'])){
$update7="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:00AM'";
mysqli_query($con,$update7) or die(mysql_error());
}

if (!empty ($_POST['select2'])){
$update8="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:10AM'";
mysqli_query($con,$update8) or die(mysql_error());
}

if (!empty ($_POST['select2'])){
$update9="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:20AM'";
mysqli_query($con,$update9) or die(mysql_error());
}
if (!empty ($_POST['select2'])){
$update10="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:30AM'";
mysqli_query($con,$update10) or die(mysql_error());
}

if (!empty ($_POST['select2'])){
$update11="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:40AM'";
mysqli_query($con,$update11) or die(mysql_error());
}

if (!empty ($_POST['select2'])){
$update12="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='11:50AM'";
mysqli_query($con,$update12) or die(mysql_error());
}

if (!empty ($_POST['select3'])){
$update13="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:00PM'";
mysqli_query($con,$update13) or die(mysql_error());
}
if (!empty ($_POST['select3'])){
$update14="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:10PM'";
mysqli_query($con,$update14) or die(mysql_error());
}
if (!empty ($_POST['select3'])){
$update15="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:20PM'";
mysqli_query($con,$update15) or die(mysql_error());
}
if (!empty ($_POST['select3'])){
$update16="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:30PM'";
mysqli_query($con,$update16) or die(mysql_error());
}
if (!empty ($_POST['select3'])){
$update17="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:40PM'";
mysqli_query($con,$update17) or die(mysql_error());
}
if (!empty ($_POST['select3'])){
$update18="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='12:50PM'";
mysqli_query($con,$update18) or die(mysql_error());
}
if (!empty ($_POST['select4'])){
$update19="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:00PM'";
mysqli_query($con,$update19) or die(mysql_error());
}
if (!empty ($_POST['select4'])){
$update20="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:10PM'";
mysqli_query($con,$update20) or die(mysql_error());
}

if (!empty ($_POST['select4'])){
$update21="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:20PM'";
mysqli_query($con,$update21) or die(mysql_error());
}

if (!empty ($_POST['select5'])){
$update22="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:30PM'";
mysqli_query($con,$update22) or die(mysql_error());
}
if (!empty ($_POST['select4'])){
$update23="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:40PM'";
mysqli_query($con,$update23) or die(mysql_error());
}
if (!empty ($_POST['select4'])){
$update24="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='02:50PM'";
mysqli_query($con,$update24) or die(mysql_error());
}
if (!empty ($_POST['select5'])){
$update25="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:00PM'";
mysqli_query($con,$update25) or die(mysql_error());
}
if (!empty ($_POST['select5'])){
$update26="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:10PM'";
mysqli_query($con,$update26) or die(mysql_error());
}

if (!empty ($_POST['select5'])){
$update27="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:20PM'";
mysqli_query($con,$update27) or die(mysql_error());
}
if (!empty ($_POST['select5'])){
$update28="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:30PM'";
mysqli_query($con,$update28) or die(mysql_error());
}
if (!empty ($_POST['select5'])){
$update29="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:40PM'";
mysqli_query($con,$update29) or die(mysql_error());
}

if (!empty ($_POST['select5'])){
$update30="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='03:50PM'";
mysqli_query($con,$update30) or die(mysql_error());
}

if (!empty ($_POST['select6'])){
$update31="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:00PM'";
mysqli_query($con,$update31) or die(mysql_error());
}

if (!empty ($_POST['select6'])){
$update32="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:10PM'";
mysqli_query($con,$update32) or die(mysql_error());
}


if (!empty ($_POST['select6'])){
$update33="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:20PM'";
mysqli_query($con,$update33) or die(mysql_error());
}

if (!empty ($_POST['select6'])){
$update34="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:30PM'";
mysqli_query($con,$update34) or die(mysql_error());
}

if (!empty ($_POST['select6'])){
$update35="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:40PM'";
mysqli_query($con,$update35) or die(mysql_error());
}

if (!empty ($_POST['select6'])){
$update36="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='04:50PM'";
mysqli_query($con,$update36) or die(mysql_error());
}

if (!empty ($_POST['select7'])){
$update37="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:00PM'";
mysqli_query($con,$update37) or die(mysql_error());
}
if (!empty ($_POST['select7'])){
$update38="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:10PM'";
mysqli_query($con,$update38) or die(mysql_error());
}
if (!empty ($_POST['select7'])){
$update39="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:20PM'";
mysqli_query($con,$update39) or die(mysql_error());
}

if (!empty ($_POST['select7'])){
$update40="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:30PM'";
mysqli_query($con,$update40) or die(mysql_error());
}
if (!empty ($_POST['select7'])){
$update41="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:40PM'";
mysqli_query($con,$update41) or die(mysql_error());
}
if (!empty ($_POST['select7'])){
$update42="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='05:50PM'";
mysqli_query($con,$update42) or die(mysql_error());
}
if (!empty ($_POST['select8'])){
$update43="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:00PM'";
mysqli_query($con,$update43) or die(mysql_error());
}
if (!empty ($_POST['select8'])){
$update44="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:10PM'";
mysqli_query($con,$update44) or die(mysql_error());
}
if (!empty ($_POST['select8'])){
$update45="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:20PM'";
mysqli_query($con,$update45) or die(mysql_error());
}

if (!empty ($_POST['select8'])){
$update46="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:30PM'";
mysqli_query($con,$update46) or die(mysql_error());
}
if (!empty ($_POST['select8'])){
$update47="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:40PM'";
mysqli_query($con,$update47) or die(mysql_error());
}
if (!empty ($_POST['select8'])){
$update48="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='06:50PM'";
mysqli_query($con,$update48) or die(mysql_error());
}

if (!empty ($_POST['select9'])){
$update49="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:00PM'";
mysqli_query($con,$update49) or die(mysql_error());
}
if (!empty ($_POST['select9'])){
$update50="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:10PM'";
mysqli_query($con,$update50) or die(mysql_error());
}
if (!empty ($_POST['select9'])){
$update51="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:20PM'";
mysqli_query($con,$update51) or die(mysql_error());
}
if (!empty ($_POST['select9'])){
$update52="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:30PM'";
mysqli_query($con,$update52) or die(mysql_error());
}
if (!empty ($_POST['select9'])){
$update53="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:40PM'";
mysqli_query($con,$update53) or die(mysql_error());
}
if (!empty ($_POST['select9'])){
$update54="update test set status='NOT AVAILABLE' where dname='$name' and  ddate='$date' and dslot='07:50PM'";
mysqli_query($con,$update54) or die(mysql_error());
}
echo '<script language="javascript">';
    echo 'alert("Appointment Blocked Successfully !!"); ';
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
   <li><a href='ccview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='ccggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ccami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 		 <li class='has-sub'><a href='ccviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>

		 
      </ul>
	  
   </li>

    	    <li class='last'><a href='ccgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='ccview4'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='ccapp1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>BLOCK DOCTOR'S UNAVAILABLE DATE &amp; TIME </h1>
        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="name">Doctor's Name :</label>
			</span>
			<select name="dname" required>
			        <option value='<?php echo $full;?>'selected><?php echo $full;?></option>
				
			</select>
<!-- E-mail Input -->
			<label for="mail"><strong>Appointment Date :</strong></label>
									<input type="text" name="date" id="datepicker" placeholder="Select Date" required/>
<!-- Password Input --><!-- Age Dropdown -->
			<label for="age"><strong>BLOCK UR SLOT :</strong></label>
			
			<select name="select">
	  <option value=''>10AM-11AM</option>
	  <option value='NOT Available'>NOT AVAILABLE</option>
	  
      </select>
						
			<select name="select2">
	  <option value=''>11AM-12AM</option>
	  <option value='NOT Available'>NOT AVAILABLE</option>
	  
      </select>
			<select name="select3">
	  <option value=''>12PM-1PM</option>
	  <option value=' NOT Available'>NOT AVAILABLE</option>
	  
      </select>
	  	<select name="select4">
	  <option value=''>2PM-3PM</option>
	  <option value='NOT Available'>NOT AVAILABLE</option>
	  
      </select>
	  	<select name="select5">
	  <option value=''>3PM-4PM</option>
	  <option value='NOT Available'>NOT AVAILABLE</option>
	  
      </select>
	  	<select name="select6">
	  <option value=''>4PM-5PM</option>
	  <option value='NOT Available'>NOT AVAILABLE</option>
	  
      </select>
      <select name="select7">
	  <option value=''>5PM-6PM</option>
	  <option value='NOT Available'>NOT AVAILABLE</option>
	  
      </select>
	  <select name="select8">
	  <option value=''>6PM-7PM</option>
	  <option value='NOT Available'>NOT AVAILABLE</option>
	  
      </select>
	  <select name="select9">
	  <option value=''>7PM-8PM</option>
	  <option value='NOT Available'>NOT AVAILABLE</option>
	  
      </select>
	  <br>
  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
