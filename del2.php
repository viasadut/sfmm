<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="clinical"){
      header('Location: login2.php?err=2');
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
$checkbox1 = $_REQUEST['select2'];
$checkbox2 = $_REQUEST['select3'];
$checkbox3 = $_REQUEST['select4'];
$checkbox4 = $_REQUEST['select5'];
$checkbox5 = $_REQUEST['select6'];
$checkbox6 = $_REQUEST['select7'];
$checkbox7 = $_REQUEST['select8'];
$checkbox8 = $_REQUEST['select9'];
$checkbox9 = $_REQUEST['select10'];
$checkbox10 = $_REQUEST['select11'];

if (!empty ($_POST['select'])){
$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox','AVAILABLE')";
mysqli_query($con,$ins_query) or die(mysql_error());
}
if (!empty ($_POST['select2'])){
$ins_query1="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox1','AVAILABLE')";
mysqli_query($con,$ins_query1) or die(mysql_error());
}
if (!empty ($_POST['select3'])){
$ins_query2="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox2','AVAILABLE')";
mysqli_query($con,$ins_query2) or die(mysql_error());
}
if (!empty ($_POST['select4'])){
$ins_query3="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox3','AVAILABLE')";
mysqli_query($con,$ins_query3) or die(mysql_error());
}
if (!empty ($_POST['select5'])){
$ins_query4="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox4','AVAILABLE')";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
if (!empty ($_POST['select6'])){
$ins_query5="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox5','AVAILABLE')";
mysqli_query($con,$ins_query5) or die(mysql_error());
}
if (!empty ($_POST['select7'])){
$ins_query6="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox6','AVAILABLE')";
mysqli_query($con,$ins_query6) or die(mysql_error());
}
if (!empty ($_POST['select8'])){
$ins_query7="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox7','AVAILABLE')";
mysqli_query($con,$ins_query7) or die(mysql_error());
}
if (!empty ($_POST['select9'])){
$ins_query8="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox8','AVAILABLE')";
mysqli_query($con,$ins_query8) or die(mysql_error());
}
if (!empty ($_POST['select10'])){
$ins_query9="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox9','AVAILABLE')";
mysqli_query($con,$ins_query9) or die(mysql_error());
}
if (!empty ($_POST['select11'])){
$ins_query10="insert into test (`dname`,`ddate`,`dslot`,`status`) values ('$name', '$date','$checkbox10','AVAILABLE')";
mysqli_query($con,$ins_query10) or die(mysql_error());
}


$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
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
   <li><a href='cview.php'><span>Home</span></a></li>
    <li class='last'><a href='cgg.php'><span>Set Doctor's Appointment</span></a></li>
	    <li class='last'><a href='gg1new.php'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4.php'><span>Search previous patients</span></a></li>
   <li class='last'><a href='logout.php'><span>LOGOUT</span></a></li>
</ul>
</div>

  <!-- Stephonce R. MOrris | 2014 -->

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


  <?php 
			$sql = "select * from `test` where `dname`='$doc1' and `status`='AVAILABLE'and `ddate`='$date1'order by id asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select2">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select3">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select4">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select5">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select6">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select7">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select8">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select9">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select10">
	  	  <option value=''>-Select Time-</option>
	   <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
      <select name="select11">
        <option value=''>-Select Time-</option>
        <?php 
			$sql = "select * from `slot`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->aslot."'>".$row->aslot."</option>";
				}
			}
			?>
      </select>
	  <br>
  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
