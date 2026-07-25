<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$dt=$_REQUEST['date'];





$query = "SELECT * from pappnew where pmrn='$pmrn'and ID='$id';" ;
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pd1= $row['dname'];
$pdate= $row['adate'];
$pa= $row['page'];
$ps= $row['psex'];
$ph= $row['height'];
$pw= $row['weight'];
$pt= $row['temp'];
//$eid= $row['eid'];
//$id= $row['ID'];
//$dt1= $row['date'];
//$pa= $row['padd'];
  
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
if(isset($_POST['Submit']))
{
$url = "prescription3_1_edit?pmrn=$pm&eid=$eid1&dname=$pd&date=$dt1&id=$id1&ID=$id";
header("Location: $url");
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>

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
  max-width: 2000px;
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
  font-size: 12px;
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
    max-width: 2000px;
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
   <li><a href='viewnew'><span>Home</span></a></li>
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

<h1 align="center">OUTPATIENT RECORD </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><b>Date:<?php echo $row['adate'];?>&nbsp;&nbsp; Time:<?php echo $row['aslot'];?><b></td></tr>
		<tr><td colspan="20" align="right" bgcolor="lightgreen"><a target='_blank' href="http://182.160.124.36/"><b>ACCESS PACS FROM OUTSIDE HOSPITAL<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="viewlabpms1?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT(Only in PMS)<b></a></td></tr>
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp&nbsp&nbsp&nbsp<a href="view3newtesttest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>&eid=<?php echo "$count1"?>"><b>Template Of Previous Visits<b></a>&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>medex.com.bd<b></a></td></tr>
<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>"><b>SURGERY NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolink?pmrn=<?php echo "$pmrn"; ?>"><b>CARDIOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="opdprocedurenote?pmrn=<?php echo "$pmrn"; ?>"><b>OPD PROCEDURE NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="historeportdoc?pmrn=<?php echo "$pmrn"; ?>"><b>HISTOPATHOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="pcovidresult?pmrn=<?php echo "$pmrn"; ?>" class="blink1"><b>COVID RECORD<b></a>&nbsp;&nbsp;<a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>ALL REPORTS<b></a></td></tr>		

		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><?php echo $pd1;?>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>				
						<td colspan="2"><label><strong>Patient's Age:</strong></label></td>
						<td colspan="2"><label><strong>Patient's Gender:</strong></label></td>
						<td colspan="4"><label><strong>Patient's Phone No:</strong></label></td>
						
						
						</tr>

<tr>				 <td colspan="10"><?php echo $pn;?></td>
					<td colspan="2"><?php echo $pm;?></td>
					<td colspan="2"><?php echo $row['page'];?></td>  	
					 <td colspan="2"><?php echo $row['psex'];?></td>
					 <td colspan="4"><?php echo $row['pphone'];?></td>  

					 
</tr>


<tr><td colspan="10" bgcolor="lightgreen"><label><strong>Menstrual History :</strong></label></td>
<td colspan="10" bgcolor="lightgreen"><label><strong>Obstetrical History :</strong></label></td>

</tr>
<tr>
<td colspan="7"><label><strong>Menstrual Cycle:</strong></label></td>
<td colspan="7"><label><strong>LMP-Date:</strong></label></td>
<td colspan="6"><label><strong>Contraceptive List:</strong></label></td>
</tr>
<tr>
<td colspan="7"><?php echo $row['pperiod'];?></td>
<td colspan="7"><?php echo $row['plmp'];?></td>
<td colspan="6"><?php echo $row['clist'];?></td>
</tr>
<tr>
<td colspan="7"><?php echo $row['pperiod1'];?></td>
<td colspan="7"><?php echo $row['plmp1'];?></td>
<td colspan="6"><?php echo $row['clist1'];?></td>
</tr>
<tr><td colspan="20" bgcolor="lightgreen"><label><strong>Obstetrical History :</strong></label></td></tr>
<tr><td colspan="20"></td></tr>
<tr>
<td colspan="5"><label><strong>Para:</strong></label></td>
<td colspan="5"><label><strong>Gravida:</strong></label></td>
<td colspan="5"><label><strong>Age Of Last Child:</strong></label></td>
<td colspan="5"><label><strong>No Of Child:</strong></label></td>
</tr>
<td colspan="5"><?php echo $row['para'];?></td>
<td colspan="5"><?php echo $row['gravida'];?></td>
<td colspan="5"><?php echo $row['plchild'];?></td>
<td colspan="5"><?php echo $row['pnochild'];?></td>
</tr>
<tr>

<td colspan="5"><?php echo $row['para1'];?></td>
<td colspan="5"><?php echo $row['gravida1'];?></td>
<td colspan="5"><?php echo $row['plchild1'];?></td>
<td colspan="5"><?php echo $row['pnochild1'];?></td>
</tr>

</td></tr>



</body>

</html>
