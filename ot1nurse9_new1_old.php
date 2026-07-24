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
$row39 = mysqli_fetch_array($result39);
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

$user=$_SESSION['sess_username'];

//include("auth.php");
$id=$_REQUEST['id'];

 
$query1 = "SELECT * from ot where id='$id'"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);

$addate= $row1['adate'];
$eid= $row1['eid'];
$pname= $row1['pname'];
$pmrn= $row1['pmrn'];
$pphone= $row1['pphone'];  
$page= $row1['page'];
$psex= $row1['psex'];
$otname= $row1['duration'];
$otdate= date('Y-m-d', strtotime($row1['otdate']));


?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$bt2 =$_REQUEST['bt2'];
$bt3 =$_REQUEST['bt3'];

$bt4 =$_REQUEST['bt4'];
$duration1=strtotime($bt4) - strtotime($bt3); 
$duration=gmdate("H:i",$duration1); 

$sel90="SELECT * from otslot WHERE ottime BETWEEN '$bt3' and '$bt4' and otdate='$otdate' and status='Booked' and otname='$bt';";
$result90 = mysqli_query($con,$sel90);

	

	
	if(empty($_REQUEST['bt3']))

{
       echo '<script language="javascript">';
    echo 'alert("Surgery Start Time Not Selected!!"); ';
    echo '</script>';

    }
	
	else if(empty($_REQUEST['bt4']))

{
       echo '<script language="javascript">';
    echo 'alert("Surgery End Time Not Selected!!"); ';
    echo '</script>';

    }



else if($res90=mysqli_num_rows($result90)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Eiher Booking Time is Laready Taken Or Overlap with Others"); ';
    echo '</script>';
    }


else {

$ins_query="update ot set stime='$bt3', etime='$bt4', duration='$bt2',duration1='$duration' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());


//$update="update otslot set status='Booked' where `otdate`='$date1' and otname='$bt' and `ottime` between '$bt3' and '$bt4'";
//mysqli_query($con,$update);

echo '<script language="javascript">';
    echo 'alert("Time Slot Set Successfully"); ';
    echo '</script>';
	
	header("Location:otview12");
	//header("Location: $url"); 
}
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>OT Booking</title>
  
   

  
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
  background: red;
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

<h1 align="center">OT BOOKING FORM </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>
		
		
		<form style="background-color: gold;">
		        <table class="table" border='0'>  
		<tr>
						
						
						<td colspan="4" align='left' style="font-size: 14;"><label><strong>Patient's MRN:<?php echo $row1['pmrn'];?></strong></label></td>
						
						<td colspan="4" align='left' style="font-size: 14;"><label><strong>Patient's Name:<?php echo $row1['pname'];?></strong></label></td>
						<td colspan="4" align='left' style="font-size: 14;"><label><strong>Patient's Gender:<?php echo $row1['psex'];?></strong></label></td>
						<td colspan="4" align='left' style="font-size: 14;"><label><strong>Patient's Age: <?php echo $row1['page'];?></strong></label></td>
						<td colspan="4" align='left' style="font-size: 14;"><label><strong>Patient's Phone:</strong> <?php echo $row1['pphone'];?></label></td>
						
						
						
						
						</tr>
						<tr>
						
						
						
						</tr>
						
						<tr>
						
						
						<td colspan="4" align='left' style="font-size: 14px;"><label><strong>Surgeon's Name: <?php echo $row1['dname'];?></strong></label></td>
						<td colspan="4" align='left' style="font-size: 14px;"><label><strong>OT Date:<?php echo date('d/m/Y', strtotime($row1['otdate']));?></strong></label></td>
						<td colspan="4" align='left' style="font-size: 14px;"><label><strong>OT Name:<?php echo $row1['duration'];?></strong></label></td>
						<td colspan="4" align='left' style="font-size: 14px;"><label><strong>Procedure Name:<?php echo $row1['proce'];?></strong></label></td>
						<td colspan="4" align='left' style="font-size: 14px;"><label><strong>OT Duration:<?php echo $row1['duration2'];?></strong></label></td>
						
						
						</tr>
		
		</table>
		</form>

<form action="" method="post" style="background-color: lightgreen;">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr>
						<td colspan="2"><label><strong>OT Start</strong></label></td>		
						<td colspan="3"><label><strong>OT End</strong></label></td>
						<td colspan="3"><label><strong>Select OT (If Change Click on "Check Available Time")</strong></label></td>
						
						</tr>
						
						<tr>				
						
						
						
						
					 <td colspan="2"><select name="bt3" >
        
						<option value=''>-Select-</option>
						<?php 
	   
	   		if(isset($_POST['load'])){$bt2 = $_REQUEST['bt2'];
			$sql = "select * from `otslot` where  `status`='vacant' and otname='$bt2'and `otdate`='$otdate'order by ottime asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->ottime."'>".$row->ottime."</option>";
				}
			}
			}
			
			
			else {
				
				$sql = "select * from `otslot` where  `status`='vacant' and otname='$otname'and `otdate`='$otdate'order by ottime asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->ottime."'>".$row->ottime."</option>";
				}
			}
				
			}
			?>
				
</select></td>  
				
						
						
					 <td colspan="3"><select name="bt4" >
        
						<option value=''>-Select-</option>
						<?php 
	   
	   		if(isset($_POST['load'])){$bt2 = $_REQUEST['bt2'];
			$sql = "select * from `otslot` where  `status`='vacant'and otname='$bt2'and `otdate`='$otdate'order by ottime asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->ottime."'>".$row->ottime."</option>";
				}
			}
			}
			
			
			else {
				
				$sql = "select * from `otslot` where  `status`='vacant' and otname='$otname'and `otdate`='$otdate'order by ottime asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->ottime."'>".$row->ottime."</option>";
				}
			}
				
			}
			?>
				
</select></td> 
				
				<td colspan="2"><select name="bt2" value="" required>
        
		
						<option value='<?php if(isset($_POST['load'])==1)
{ $bt2 = $_REQUEST['bt2'];
echo $bt2;
}
else {
	
	echo $row1['duration'];
}

?>'><?php if(isset($_POST['load'])==1)
{ $bt2 = $_REQUEST['bt2'];
echo $bt2;
}
else {
	
	echo $row1['duration'];
}
?></option>
						<option value='OT01'>OT01(RED)</option>
						<option value='OT02'>OT02(GREEN)</option>
						<option value='OT03'>OT03(BLUE)</option>
						<option value='OT04'>OT04(YELLOW)</option>
						<option value='OT05'>OT05(WHITE)</option>
						<option value='OT06'>OT06(ORANGE)</option>
						<option value='OT07'>OT07(PINK)</option>
						<option value='OT08'>OT08(PURPLE)</option>
				
</select>

<input name="load" class="style1" type="submit" id="load" value="Check Available Time">
</td>  										

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="otreport?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>&bkdate=<?php echo "$bkdate"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
