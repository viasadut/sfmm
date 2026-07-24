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


if (!empty ($_POST['select'])){
$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','10:00AM','AVAILABLE')";
mysqli_query($con,$ins_query) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query1="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','10:15AM','AVAILABLE')";
mysqli_query($con,$ins_query1) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query2="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','10:30AM','AVAILABLE')";
mysqli_query($con,$ins_query2) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query3="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','10:45AM','AVAILABLE')";
mysqli_query($con,$ins_query3) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query4="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','11:00AM','AVAILABLE')";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query5="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','11:15AM','AVAILABLE')";
mysqli_query($con,$ins_query5) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query6="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','11:30AM','AVAILABLE')";
mysqli_query($con,$ins_query6) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query7="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','11:45AM','AVAILABLE')";
mysqli_query($con,$ins_query7) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query8="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','12:00PM','AVAILABLE')";
mysqli_query($con,$ins_query8) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query9="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','12:15PM','AVAILABLE')";
mysqli_query($con,$ins_query9) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query10="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','12:30PM','AVAILABLE')";
mysqli_query($con,$ins_query10) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query11="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','12:45PM','AVAILABLE')";
mysqli_query($con,$ins_query11) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query12="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','02:00PM','AVAILABLE')";
mysqli_query($con,$ins_query12) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query13="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','02:15PM','AVAILABLE')";
mysqli_query($con,$ins_query13) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query14="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','02:30PM','AVAILABLE')";
mysqli_query($con,$ins_query14) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query15="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','02:45PM','AVAILABLE')";
mysqli_query($con,$ins_query15) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query16="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','03:00PM','AVAILABLE')";
mysqli_query($con,$ins_query16) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query17="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','03:15PM','AVAILABLE')";
mysqli_query($con,$ins_query17) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query18="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','03:30PM','AVAILABLE')";
mysqli_query($con,$ins_query18) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query19="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','03:45PM','AVAILABLE')";
mysqli_query($con,$ins_query19) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query20="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','04:00PM','AVAILABLE')";
mysqli_query($con,$ins_query20) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query21="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','04:15PM','AVAILABLE')";
mysqli_query($con,$ins_query21) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query22="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','04:30PM','AVAILABLE')";
mysqli_query($con,$ins_query22) or die(mysql_error());
}
if (!empty ($_POST['select'])){
$ins_query23="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','04:45PM','AVAILABLE')";
mysqli_query($con,$ins_query23) or die(mysql_error());
}

if (!$con->query($ins_query) === TRUE) 
{
   
    echo '<script language="javascript">';
    echo 'alert("Appointment Successfully Updated"); ';
    echo '</script>';
} 

else 
{
        die('Error: ' . mysqli_error($con));
    }
}
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
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>SET DOCTOR'S AVAILABLE DATE &amp; TIME </h1>
        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="name">Doctor's Name :</label>
			</span>
			<select name="dname" value="">
			        <option value=''>-Select Doctor-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select>
<!-- E-mail Input -->
			<label for="mail"><strong>Appointment Date :</strong></label>
									<input type="text" name="date" id="datepicker" placeholder="Select Date">
<!-- Password Input --><!-- Age Dropdown -->
			<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="select">
	  <option value=''>-Select Time-</option>
	  <option value='Available'>AVAILABLE</option>
	  
      </select>
      
	  <br>
  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
