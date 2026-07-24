<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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
$date=date('m/d/Y');
//$bt4='02:30:00';
//$bt3='18:00:00';

//$duration1=strtotime($bt4) - strtotime($bt3); 
//echo $duration=gmdate("H:i",$duration1); 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$dname1=$_REQUEST['dname1'];
//include("auth.php");
$user=$_SESSION["sess_username"];
$time=date('d/m/Y h:i:s');
//$pname=$_REQUEST['pname'];
$query = "SELECT * from patient where pmrn='$pmrn'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pa= $row['page'];
$ps= $row['psex'];
 
$query1 = "SELECT * from inpatient where pmrn='$pmrn' and idisconfirm !='Confirmed'"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);

$addate= $row1['adate'];


$query2 = "SELECT * from perop where pmrn='$pmrn' and eid='$id'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row2 = mysqli_fetch_assoc($result2);
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{
$ptable=$_REQUEST['ptable'];
$pother=$_REQUEST['pother'];
$pcare=$_REQUEST['pcare'];
$pcareother=$_REQUEST['pcareother'];
$generalp=$_REQUEST['general'];
$elbow=$_REQUEST['elbow'];
$sacrum=$_REQUEST['sacrum'];
$heel=$_REQUEST['heel'];
$dplate=$_REQUEST['dplate'];
$dposition=$_REQUEST['dposition'];
$psolution=$_REQUEST['psolution'];
$solutionother=$_REQUEST['solutionother'];
$csolution=$_REQUEST['csolution'];
$csolutionother=$_REQUEST['csolutionother'];
$wdrain=$_REQUEST['wdrain'];
$ndrain=$_REQUEST['ndrain'];
$uwwdrain=$_REQUEST['uwwdrain'];
$iinserted=$_REQUEST['iinserted'];
$imedi=$_REQUEST['imedi'];
$dressing=$_REQUEST['dressing'];
$specimen=$_REQUEST['specimen'];
$specimenother=$_REQUEST['specimenother'];
$specimensent=$_REQUEST['specimensent'];
$skim=$_REQUEST['skim'];
$bone=$_REQUEST['bone'];


if($res90=mysqli_num_rows($result3)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Information is already updated"); ';
    echo '</script>';
    }
	

else {

$ins_query="insert into perop (`pmrn`,`eid`,`eby`,`etime`,`ptable`,`pother`,`pcare`,`pcareother`,`generalp`,`elbow`,`sacrum`,`heel`,`dplate`,`dposition`,`psolution`,`solutionother`,`csolution`,
`csolutionother`,`wdrain`,`ndrain`,`uwwdrain`,`iinserted`,`imedi`,`dressing`,`specimen`,`specimenother`,`specimensent`,`skim`,`bone`) values 
('$pmrn','$id','$user','$time','$ptable', '$pother','$pcare','$pcareother','$generalp','$elbow','$sacrum','$heel','$dplate','$dposition','$psolution','$solutionother','$csolution',
'$csolutionother','$wdrain','$ndrain','$uwwdrain','$iinserted','$imedi','$dressing','$specimen','$specimenother','$specimensent','$skim','$bone')";
mysqli_query($con,$ins_query) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
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
    max-width: 1200px;
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
  </script>

  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='otdash'><span>Home</span></a></li>
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
</div>

<h1 align="center">Per Operative Nursing Procedure</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr><td colspan="10"><label><strong>Position On Tabel : <?php echo $row2['ptable']?></strong></label></td>
				<td colspan="10"><label><strong>Mention if Others: <?php echo $row2['pother']?></strong></label></td></tr>
						
						
						
						<tr><td colspan="10"><label><strong>Pressure Care : <?php echo $row2['pcare']?></strong></label></td>
				<td colspan="10"><label><strong>Mention if Others: <?php echo $row2['pcareother']?></strong></label></td></tr>
				
						
												<tr>
												
												<tr><td colspan="20"><label><strong>Skin Integrity:</strong></label></td></tr>
				<tr>
				<td colspan="4"><label><strong>General: <?php echo $row2['generalp']?></strong></label></td>
				<td colspan="4"><label><strong>Elbow: <?php echo $row2['elbow']?></strong></label></td>
				<td colspan="4"><label><strong>Sacrum: <?php echo $row2['sacrum']?></strong></label></td>
				<td colspan="4"><label><strong>Heel: <?php echo $row2['heel']?></strong></label></td>
				<td colspan="4"><label><strong>Diathermy Plate Site: <?php echo $row2['dplate']?></strong></label></td>
				
				
				
				</tr>
				
						
						
						
						<tr><td colspan="20"><label><strong>Diathermy Plate Position : <?php echo $row2['dposition']?></strong></label></td>
				</tr>
				
						
						
						<tr><td colspan="10"><label><strong>Preperation Solution: <?php echo $row2['psolution']?></strong></label></td>
				<td colspan="10"><label><strong>Mention if Others: <?php echo $row2['solutionother']?></strong></label></td></tr>
						
						
						
												<tr>
												
												
						<tr><td colspan="5"><label><strong>Catheterised Solution: <?php echo $row2['csolution']?></strong></label></td>
				<td colspan="15"><label><strong>Time & By Whom: <?php echo $row2['csolutionother']?></strong></label></td></tr>
				
												
												
						<tr><td colspan="5"><label><strong>Wound Drain: <?php echo $row2['wdrain']?></strong></label></td>
				<td colspan="5"><label><strong>No Of Drain: <?php echo $row2['ndrain']?></strong></label></td>
				
				<td colspan="10"><label><strong>Under Water Seal Drain: <?php echo $row2['uwwdrain']?></strong></label></td></tr>
				
						
						
						<tr><td colspan="10"><label><strong>Implants Inserted: <?php echo $row2['iinserted']?></strong></label></td>
				<td colspan="10"><label><strong>Intraoperative Medication Ordered: <?php echo $row2['imedi']?></strong></label></td>
				
				</tr>
				

<tr><td colspan="10"><label><strong>Dressing: <?php echo $row2['dressing']?></strong></label></td>
				<td colspan="5"><label><strong>Specimen: <?php echo $row2['specimen']?></strong></label></td>
				<td colspan="5"><label><strong>Mention If Other Specimen: <?php echo $row2['specimenother']?></strong></label></td>
				
				</tr>
				
						
						<tr><td colspan="10"><label><strong>Specimen Sent / Given To: <?php echo $row2['specimensent']?></strong></label></td>
				<td colspan="5"><label><strong>Skim Stored: <?php echo $row2['skim']?></strong></label></td>
				<td colspan="5"><label><strong>Bone Stored: <?php echo $row2['bone']?></strong></label></td>
				
				</tr>
				<tr><td colspan="20"><label><strong>Anaesthesia Used: <?php echo $row2['anaesused']?></strong></label></td>
	  				
</tr>

</body>

</html>
