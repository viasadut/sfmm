<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="opdpro"){
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
$date1=date('Y-m-d');
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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from patient where pmrn='$pmrn'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pa= $row['page'];
$ps= $row['psex'];
 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
//$diagnosis=$_REQUEST['diagnosis'];
//$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$pdate=$_REQUEST['pdate'];
$ptime=$_REQUEST['ptime'];
$proname=$_REQUEST['proname'];
$ll=$_REQUEST['ll'];

//$x2=$_REQUEST['xl2'];
//$lx2= implode(",",$x2);
if(empty($_REQUEST['ptime']))

{
       echo '<script language="javascript">';
    echo 'alert("No Time Slot Selected !!"); ';
    echo '</script>';

    }
	
	if(empty($_REQUEST['pdate']))

{
       echo '<script language="javascript">';
    echo 'alert("No Date Selected !!"); ';
    echo '</script>';

    }

	
	if(empty($_REQUEST['ll']))

{
       echo '<script language="javascript">';
    echo 'alert("No Procedure Room Selected !!"); ';
    echo '</script>';

    }
	

else {
$ins_query="insert into procedure1 (`dname`,`pname`,`pmrn`,`pphone`,`page`,`psex`,`pdate`,`ptime`,`proname`,`type`,`date1`,`ll`) values 
('$dname', '$pname','$pmrn','$pphone','$page','$psex','$pdate','$ptime','$proname','OPD','$date1','$ll')";
mysqli_query($con,$ins_query) or die(mysql_error());
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


input[type="text1"] {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 20px;
  font-weight:bold;
  font-color: Blue;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: yellow;
  color: Black;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
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

<h1 align="center">PROCEDURE APPOINTMENT PANEL </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="10"><select name="dname3" value="" class="style1">
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
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td>
						
																		
																		
					<td colspan="8">			<input type="text" name="dname" required value="<?php if(isset($_POST['load'])==1)
{ $dname = $_REQUEST['dname3'];
echo $dname;
}
?>" readonly></td>


										</tr>								
																		
																		
																		<tr>
						
						
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="15"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Type:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="2"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly></td>
					 <td colspan="15"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly></td>
					 <td colspan="3"><input type="text1" name="type" required value="OPD" readonly></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="3"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Gender:</strong></label></td>
						<td colspan="3"><label><strong>Phone NO:</strong></label></td>
						<td colspan="3"><label><strong>Date:</strong></label></td>
						<td colspan="4"><label><strong>TIME:</strong></label></td>		
						<td colspan="4"><label><strong>Procedure Room:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="3"><input type="text" name="page" required value="<?php echo $pa;?>" readonly></td>  
             		
					 <td colspan="3"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly></td>
					 <td colspan="3"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly></td>  
			    	 <td colspan="3"><input type="text" name="pdate" id="datepicker1" placeholder="Select Date" size="15" ></td>  
					 <td colspan="4"><select name="ptime">
        
						<option value=''>-Select-</option>
						<option value='9:00AM'>9:00AM</option>
						<option value='10:00AM'>10:00AM</option>
						<option value='11:00AM'>11:00AM</option>
						<option value='12:00PM'>12:00PM</option>
						<option value='1:00PM'>1:00PM</option>
						<option value='2:00PM'>2:00PM</option>
						<option value='3:00PM'>3:00PM</option>
						<option value='4:00PM'>4:00PM</option>
						<option value='5:00PM'>5:00PM</option>
						<option value='6:00PM'>6:00PM</option>
						<option value='7:00PM'>7:00PM</option>
						<option value='8:00PM'>8:00PM</option>
						<option value='9:00PM'>9:00PM</option>
						<option value='10:00PM'>10:00PM</option>
						<option value='11:00PM'>11:00PM</option>
						<option value='12:00AM'>12:00AM</option>
				
</select></td>  

<td colspan="4"><select name="ll">
        
						<option value=''>-Select-</option>
						<option value='General Procedure Room'>General Procedure Room</option>
						<option value='Gyane Procedure Room'>Gyane Procedure Room</option>
						
				
</select></td>  
				
					 </tr>
		<tr>			 
					 
		
						<td colspan="20"><label><strong>Type of Procedure</strong></label></td>
						
						</tr>
						
						<tr>				
						

<td colspan="2"><input name="load" class="style1" type="submit" id='load' value="Load Privilege">										</td>									
						
						<td colspan="20">
        
		
		<input list="rr" name="proname" class="form-control" autocomplete='off'>
  <datalist id="rr">
					



<?php 

if(isset($_POST['load'])){
			$sql = "select * from `privilege` where dname='$dname'and status='Approved'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->pname."'>".$row->pname."</option>";
				}
			}
}
			?>
						
				
</datalist></td>  </tr>
            
		
						
				
														

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  
	  				
</tr>

</body>

</html>
