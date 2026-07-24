<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','bill','ot')"; 
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

$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and id='$id'");
$data59 = mysqli_fetch_assoc($query4);
$odate1 = date('m/d/Y');  
?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$adate = date('Y-m-d');
$edate = date('d/m/Y H:i:s');
$adate1 = $_REQUEST['adate1'];
$time = $_REQUEST['time'];
$circuit = $_REQUEST['circuit'];
$hme = $_REQUEST['hme'];
$peroxy = $_REQUEST['peroxy'];
$ventilation = $_REQUEST['ventilation'];
$gasflow = $_REQUEST['gasflow'];
$ppv = $_REQUEST['ppv'];
$res = $_REQUEST['res'];
$mv = $_REQUEST['mv'];
$f = $_REQUEST['f'];
$co2a = $_REQUEST['co2a'];

$vt = $_REQUEST['vt'];



if (!empty ($_POST['circuit'])){

$ins_query21="insert into circuit (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$circuit','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_query21) or die("Problem in entry");}

if (!empty ($_POST['hme'])){
$ins_query22="insert into hme (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$hme','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_query22) or die("Problem in entry");}

if (!empty ($_POST['peroxy'])){
$ins_querypulse="insert into peroxy (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$peroxy','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_querypulse) or die("Problem in entry");}

if (!empty ($_POST['ventilation'])){
$ins_queryspo2="insert into ventilation (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$ventilation','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_queryspo2) or die("Problem in entry");}

if (!empty ($_POST['gasflow'])){
$ins_querytemp="insert into gasflow (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$gasflow','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}

if (!empty ($_POST['ppv'])){
$ins_queryrr="insert into ppv (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$ppv','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_queryrr) or die("Problem in entry");}

if (!empty ($_POST['res'])){
$ins_querypscore="insert into res (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$res','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_querypscore) or die("Problem in entry");}



if (!empty ($_POST['vt'])){
$ins_vt="insert into vt (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$vt','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_vt) or die("Problem in entry");}




if (!empty ($_POST['mv'])){
$ins_mv="insert into mv (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$mv','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_mv) or die("Problem in entry");}



if (!empty ($_POST['f'])){
$ins_f="insert into f (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$f','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_f) or die("Problem in entry");}


if (!empty ($_POST['co2a'])){
$ins_co2a="insert into co2a (`pmrn`,`eid`,`cval`,`edate`,`time`,`user`,`adate`,`adate1`) values 
('$pmrn', '$id','$co2a','$edate','$time','$user','$adate','$adate1')";
mysqli_query($con,$ins_co2a) or die("Problem in entry");}

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
  width: 100%;
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
    width: 100px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
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
    max-width: 1300px;
  }

}
      </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			
		});
	});
</script>



  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
<script>
function goBack() {
    window.history.back();
}
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




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">Emergency Patients Vitals</h1>
<!-- Form Title -->
<h4><a target='_blank' href="test4545.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">See Graph</a>
&nbsp;&nbsp;<a href="dgraph2.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Datewise Graph</a>&nbsp;&nbsp;<a href="height.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Height Graph</a>&nbsp;&nbsp;<a href="weight.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Weight Graph</a>&nbsp;&nbsp;<a href="bpot.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$id";?>&odate1=<?php echo "$odate1";?>">BP Graph</a>&nbsp;&nbsp;<a href="pulseot.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$id";?>&odate1=<?php echo "$odate1";?>">Pulse Graph</a>&nbsp;&nbsp;<a href="temp.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Temperature Graph</a>&nbsp;&nbsp;<a href="spo2ot.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$id";?>&odate1=<?php echo "$odate1";?>">SPO2 Graph</a>&nbsp;&nbsp;<a href="rrot.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$id";?>&odate1=<?php echo "$odate1";?>">RR Graph</a>&nbsp;&nbsp;<a href="pain.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Pain Score Graph</a></h4>
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="10"><label><strong>Surgeon's Name :</strong></label></td>
				<td colspan="10"><label><strong>Anaesthetist's Name :</strong></label></td></tr>
				
				<tr>	
  
				<td colspan="10"><?php echo $data59["dname"]; ?></td>				
				<td colspan="10"><?php echo $data59["nanes"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $data59["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data59["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data59["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data59["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="6"><label><strong>Procedure Name:</strong></label></td>
							
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data59["page"]; ?></td>  
             		<td colspan="3"><?php echo $data59["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data59["psex"]; ?></td>
					 <td colspan="4"><?php echo $data59["pphone"]; ?></td>  

			    	 <td colspan="2"><?php echo $data59["proce"].''.$data59["Otherins"]; ?></td>  
					  
					 </tr>

						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Vitals Entry Form</strong></label></td> </tr>

<tr>
<td colspan="2" align="center"><label><strong>Date</strong></label></td>
<td colspan="2" align="center"><label><strong>Time</strong></label></td><tr>
<tr><td colspan="2" align="left"><input type="text" class="style" name="adate1" id="datepicker" placeholder="Select Date" value="<?php echo date('m/d/Y');?>" required></td>
<td colspan="2" align="center"><select name="time"  value="" required>
<option value="00:00">00:00</option>
<option value="00:10">00:10</option>
<option value="00:20">00:20</option>
<option value="00:30">00:30</option>
<option value="00:40">00:40</option>
<option value="00:50">00:50</option>
<option value="01:00">01:00</option>
<option value="01:10">01:10</option>
<option value="01:20">01:20</option>
<option value="01:30">01:30</option>
<option value="01:40">01:40</option>
<option value="01:50">01:50</option>
<option value="02:00">02:00</option>
<option value="02:10">02:10</option>
<option value="02:20">02:20</option>
<option value="02:30">02:30</option>
<option value="02:40">02:40</option>
<option value="02:50">02:50</option>
<option value="03:00">03:00</option>
<option value="03:10">03:10</option>
<option value="03:20">03:20</option>
<option value="03:30">03:30</option>
<option value="03:40">03:40</option>
<option value="03:50">03:50</option>
<option value="04:00">04:00</option>
<option value="04:10">04:10</option>
<option value="04:20">04:20</option>
<option value="04:30">04:30</option>
<option value="04:40">04:40</option>
<option value="04:50">04:50</option>
<option value="05:00">05:00</option>
<option value="05:10">05:10</option>
<option value="05:20">05:20</option>
<option value="05:30">05:30</option>
<option value="05:40">05:40</option>
<option value="05:50">05:50</option>
<option value="06:00">06:00</option>
<option value="06:10">06:10</option>
<option value="06:20">06:20</option>
<option value="06:30">06:30</option>
<option value="06:40">06:40</option>
<option value="06:50">06:50</option>
<option value="07:00">07:00</option>
<option value="07:10">07:10</option>
<option value="07:20">07:20</option>
<option value="07:30">07:30</option>
<option value="07:40">07:40</option>
<option value="07:50">07:50</option>
<option value="08:00">08:00</option>
<option value="08:10">08:10</option>
<option value="08:20">08:20</option>
<option value="08:30">08:30</option>
<option value="08:40">08:40</option>
<option value="08:50">08:50</option>
<option value="08:00">08:00</option>
<option value="09:00">09:00</option>
<option value="09:10">09:10</option>
<option value="09:20">09:20</option>
<option value="09:30">09:30</option>
<option value="09:40">09:40</option>
<option value="09:50">09:50</option>
<option value="10:00">10:00</option>
<option value="10:10">10:10</option>
<option value="10:20">10:20</option>
<option value="10:30">10:30</option>
<option value="10:40">10:40</option>
<option value="10:50">10:50</option>
<option value="11:00">11:00</option>
<option value="11:10">11:10</option>
<option value="11:20">11:20</option>
<option value="11:30">11:30</option>
<option value="11:40">11:40</option>
<option value="11:50">11:50</option>
<option value="12:00">12:00</option>
<option value="12:10">12:10</option>
<option value="12:20">12:20</option>
<option value="12:30">12:30</option>
<option value="12:40">12:40</option>
<option value="12:50">12:50</option>
<option value="13:00">13:00</option>
<option value="13:10">13:10</option>
<option value="13:20">13:20</option>
<option value="13:30">13:30</option>
<option value="13:40">13:40</option>
<option value="13:50">13:50</option>
<option value="14:00">14:00</option>
<option value="14:10">14:10</option>
<option value="14:20">14:20</option>
<option value="14:30">14:30</option>
<option value="14:40">14:40</option>
<option value="14:50">14:50</option>
<option value="15:00">15:00</option>
<option value="15:10">15:10</option>
<option value="15:20">15:20</option>
<option value="15:30">15:30</option>
<option value="15:40">15:40</option>
<option value="15:50">15:50</option>
<option value="16:00">16:00</option>
<option value="16:10">16:10</option>
<option value="16:20">16:20</option>
<option value="16:30">16:30</option>
<option value="16:40">16:40</option>
<option value="16:50">16:50</option>
<option value="17:00">17:00</option>
<option value="17:10">17:10</option>
<option value="17:20">17:20</option>
<option value="17:30">17:30</option>
<option value="17:40">17:40</option>
<option value="17:50">17:50</option>
<option value="18:00">18:00</option>
<option value="18:10">18:10</option>
<option value="18:20">18:20</option>
<option value="18:30">18:30</option>
<option value="18:40">18:40</option>
<option value="18:50">18:50</option>
<option value="19:00">19:00</option>
<option value="19:10">19:10</option>
<option value="19:20">19:20</option>
<option value="19:30">19:30</option>
<option value="19:40">19:40</option>
<option value="19:50">19:50</option>
<option value="20:00">20:00</option>
<option value="20:10">20:10</option>
<option value="20:20">20:20</option>
<option value="20:30">20:30</option>
<option value="20:40">20:40</option>
<option value="20:50">20:50</option>
<option value="21:00">21:00</option>
<option value="21:10">21:10</option>
<option value="21:20">21:20</option>
<option value="21:30">21:30</option>
<option value="21:40">21:40</option>
<option value="21:50">21:50</option>
<option value="22:00">22:00</option>
<option value="22:10">22:10</option>
<option value="22:20">22:20</option>
<option value="22:30">22:30</option>
<option value="22:40">22:40</option>
<option value="22:50">22:50</option>
<option value="23:00">23:00</option>
<option value="23:10">23:10</option>
<option value="23:20">23:20</option>
<option value="23:30">23:30</option>
<option value="23:40">23:40</option>
<option value="23:50">23:50</option>

</select>

</td>




</tr>


<td colspan="2" align="center"><label><strong>Circuit</strong></label></td> 
<td colspan="1" align="center"><label><strong>CO2 absorption</strong></label></td> 
<td colspan="2" align="center"><label><strong>HME</strong></label></td> 
<td colspan="2" align="center"><label><strong>Preoxygenation </strong></label></td> 
<td colspan="2" align="center"><label><strong>Ventilation </strong></label></td>
<td colspan="2" align="center"><label><strong>Gas flow </strong></label></td>
<td colspan="2" align="center"><label><strong>PPV</strong></label></td> 
<td colspan="2" align="center"><label><strong>Spontaneous respiration </strong></label></td> 
<td colspan="2" align="center"><label><strong>Tidal volume (VT)</strong></label></td> 
<td colspan="2" align="center"><label><strong>Minute volume (MV)</strong></label></td> 
<td colspan="1" align="center"><label><strong>Frequency (F)</strong></label></td> 





</tr>
<tr>

<td colspan="2"><input type="text" id="circuit" name="circuit"placeholder="circuit" value="" ></td>
<td colspan="1"><select name="co2a">
        
						<option value=""></option>
						<option value='ON'>ON</option>
						<option value='OFF'>OFF</option>
						</select></td>
<td colspan="2"><select name="hme">
        
						<option value=""></option>
						<option value='USED'>USED</option>
						<option value='NOT USED'>NOT USED</option>
						</select></td>
						
						<td colspan="2"><select name="peroxy">
        
						<option value=""></option>
						<option value='DONE'>DONE</option>
						<option value='NOT DONE'>NOT DONE</option>
						</select></td>

<td colspan="2"><select name="ventilation" id='ventilation'>
        
						<option value=''></option>
						<option value='PPV'>PPV</option>
						<option value='Spontaneous Respiration'>Spontaneous Respiration</option>
						
						
						
						
				
</select></td>
<td colspan="2"><input type="text" name="gasflow" value="" id='gasflow'></td>
<td colspan="2"><input type="text" name="ppv" value="" id='ppv'></td>
<td colspan="2"><input type="text" name="res" value="" id='res'></td>

<td colspan="2"><input type="text" name="vt" value="" id='vt' ></td>
<td colspan="2"><input type="text" name="mv" value="" id='mv'></td>
<td colspan="1"><input type="text" name="f" value="" id='f'></td>











<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>
<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Circuit</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from circuit where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>CO2 absorption</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from co2a where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>

	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>HME</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from hme where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>
	
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Preoxygenation </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from peroxy where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>

	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Ventilation </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from ventilation where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>
	
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Gas flow </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from gasflow where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>


	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>PPV</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from ppv where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>	
	
	
	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Spontaneous respiration </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from res where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>	
	
	
	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Tidal volume (VT)</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from vt where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>	
	
	
	
	
	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Minute volume (MV)</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from mv where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>	
	
	
	
	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Frequency (F)</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="5" align="center"><strong>Entry By</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="5" align="center"><strong>Value</strong></td>
	        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$count=1;
$sel_query="Select * from f where pmrn= '$pmrn' and eid='$id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="5"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["edate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row["cval"]; ?></td>
        
	  	  
      </tr>
    <?php $count++; } ?>	
	
	
	
	
</table>
</form>

</body>

</html>
