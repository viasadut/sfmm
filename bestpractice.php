<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2.php?err=2');
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
$time=date('h:m:s');
$etime=date('d/m/Y h:m:s');
$edate=date('Y-m-d');
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



//$id=$_REQUEST['id'];
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];




$query = "SELECT * from ot where pmrn= '$pmrn' and id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn1= $row['pname'];
$pm1= $row['pmrn'];
$pp1= $row['pphone'];  
//$pd= $row['dname'];
$pdate1= $row['adate'];
//$pa1= $row['padd'];
$ps1= $row['psex'];
//$ph= $row['height'];
//$pw= $row['weight'];
//$pt= $row['temp'];
//$pa= $row['padd'];
$query2 = "SELECT * from bestp where pmrn='$pmrn' and id='$id'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
  
?>


<?php
 
require('db1.php');
//$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

$d10 = $_REQUEST['d10'];
$d10remarks = $_REQUEST['d10remarks'];
$d10receive = $_REQUEST['d10receive'];
$d07 = $_REQUEST['d07'];
$d07remarks = $_REQUEST['d07remarks'];
$d06 = $_REQUEST['d06'];
$d06remarks = $_REQUEST['d06remarks'];
$d08 = $_REQUEST['d08'];
$d08remarks = $_REQUEST['d08remarks'];
$d16 = $_REQUEST['d16'];
$d16remarks = $_REQUEST['d16remarks'];
$d18 = $_REQUEST['d18'];
$d18remarks = $_REQUEST['d18remarks'];
$d01 = $_REQUEST['d01'];
$d01remarks = $_REQUEST['d01remarks'];
$d05 = $_REQUEST['d05'];
$d05remarks = $_REQUEST['d05remarks'];
$d17 = $_REQUEST['d17'];
$d17remarks = $_REQUEST['d17remarks'];
$d13 = $_REQUEST['d13'];
$d13remarks = $_REQUEST['d13remarks'];
$d15 = $_REQUEST['d15'];
$d15remarks = $_REQUEST['d15remarks'];
$d14 = $_REQUEST['d14'];
$d14remarks = $_REQUEST['d14remarks'];
$d04 = $_REQUEST['d04'];
$d04remarks = $_REQUEST['d04remarks'];
$d02 = $_REQUEST['d02'];
$d02remarks = $_REQUEST['d02remarks'];
$d03 = $_REQUEST['d03'];
$d03remarks = $_REQUEST['d03remarks'];
$d09 = $_REQUEST['d09'];
$d09remarks = $_REQUEST['d09remarks'];
$d11 = $_REQUEST['d11'];
$d11remarks = $_REQUEST['d11remarks'];
$d12 = $_REQUEST['d12'];
$d12remarks = $_REQUEST['d12remarks'];
$cindicator = $_REQUEST['cindicator'];
$cindicatorremarks = $_REQUEST['cindicatorremarks'];
$pindicator = $_REQUEST['pindicator'];
$pindicatorremarks = $_REQUEST['pindicatorremarks'];






if($res=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Best Practice Form is Already Updated"); ';
    echo '</script>';
    }
	else{

$ins_query="insert into bestp
(`pmrn`,`eid`,`d10`,`d10remarks`,`d10receive`,`d07`,`d07remarks`,`d06`,`d06remarks`,`d08`,`d08remarks`,`d16`,`d16remarks`,`d18`,`d18remarks`,`d01`,`d01remarks`,`d05`,
`d05remarks`,`d17`,`d17remarks`,`d13`,`d13remarks`,`d15`,`d15remarks`,`d14`,`d14remarks`,`d04`,`d04remarks`,`d02`,`d02remarks`,`d03`,`d03remarks`,`d09`,
`d09remarks`,`d11`,`d11remarks`,`d12`,`d12remarks`,`cindicator`,`cindicatorremarks`,`pindicator`,`pindicatorremarks`,`eby`,`etime`,`edate`) values
('$pmrn','$id','$d10','$d10remarks','$d10receive','$d07','$d07remarks','$d06','$d06remarks','$d08','$d08remarks','$d16','$d16remarks','$d18','$d18remarks','$d01','$d01remarks','$d05',
'$d05remarks','$d17','$d17remarks','$d13','$d13remarks','$d15','$d15remarks','$d14','$d14remarks','$d04','$d04remarks','$d02','$d02remarks','$d03','$d03remarks','$d09',
'$d09remarks','$d11','$d11remarks','$d12','$d12remarks','$cindicator','$cindicatorremarks','$pindicator','$pindicatorremarks','$user','$etime','$edate')";

mysqli_query($con,$ins_query) or die(mysql_error());
	


    echo '<script language="javascript">';
    echo 'alert("Successfully Updated"); ';
    echo '</script>';
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
</div>

<h1 align="center">BEST PRACTICE</h1>



  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
	<tr><td align="center"><a target='_blank' href="bestpracticeviewot?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>"><b>View Records</a><b></td></tr>	
<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Departure No-10 (Consultant Faliur to respond to the emergency call within 20 min of notification if s/he is present at the hospital) </strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d10" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d10" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d10" value="NA"> NA</td>
<td colspan="10"><input type="text" name="d10remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>
<td colspan="5"><input type="text" name="d10receive" style="background-color:skyblue;" placeholder="Porter/Receiving Nurse" value="" /></td>
</tr>

<td colspan="20" bgcolor="#00CCCC"><label><strong>Departure No-07 (Incomplete Consent Form) </strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d07" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d07" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d07" value="NA"> NA</td>
<td colspan="15"><input type="text" name="d07remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>
<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Departure No-06 (Consent Obtain in OT for schedule cases) </strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d06" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d06" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d06" value="NA"> NA</td>
<td colspan="15"><input type="text" name="d06remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>

<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Departure No-08 (Consent for operation are not signed prior to the operative procedure (Surgery / Procedure performed without written consent)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d08" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d08" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d08" value="NA"> NA</td>
<td colspan="15"><input type="text" name="d08remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-16 (Engaging Locum or assistant to perform surgery without prior approval)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d16" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d16" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d16" value="NA"> NA</td>
<td colspan="15"><input type="text" name="d16remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>
<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-18 (Failure to do site marking prior to surgery:)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d18" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d18" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d18" value="NA"> NA</td>
<td colspan="15"><input type="text" name="d18remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-01 (Schedule Surgery is delayed >30 Mins due to surgeon's absent)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d01" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d01" value="NO"> NO </td>
<td colspan="15"><input type="text" name="d01remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-05 (One surgeon managing 2 cases simultaneously: More than 1 patient at a time)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d05" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d05" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d05" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d05remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>

<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-17 (Paediatrician Arrived Late During Caesarean Section:)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d17" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d17" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d17" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d17remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-13 (Consultant Passing Abusive / Vulgar Remarks)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d13" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d13" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d13" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d13remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-15 (Consultant Mishandling surgical instrument / equipment)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d15" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d15" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d15" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d15remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>

<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-14 (Dissatisfied with Consultant)</strong></label></td>
</tr>
<tr>


<td colspan="7"><input type="radio" name="d14" value="Patient" checked="checked"required> Patient &nbsp;&nbsp;<input type="radio" name="d14" value="Clients/Family Members"> Clients/Family Members &nbsp;&nbsp;<input type="radio" name="d14" value="Healthcare Provider"> Healthcare Provider&nbsp;&nbsp;<input type="radio" name="d14" value="NA"> NA </td>
<td colspan="10"><input type="text" name="d14remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>
</tr>



<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-04- Anaesthetic Nurse (One Anaesthetist Managing 2 Cases simultaneously)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d04" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d04" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d04" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d04remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>

<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-02- Anaesthetic Nurse (Patient Under GA for a period of >10 Mins before surgeon's arrival)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d02" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d02" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d02" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d02remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-03- Anaesthetic Nurse (Patient Under Spinal Anaesthesia for a period of >10 Mins before surgeon's arrival)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d03" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d03" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d03" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d03remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-09- Absence of Anaesthetist during surgery without valid reason:</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d09" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d09" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d09" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d09remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-11- Recovery Nurse (Patient Extubate in recovery Bay (ET Tube Only))</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d11" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d11" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d11" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d11remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>

<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Depature No-12- Recovery Nurse (Operation Note not completed on discharge from recovery Bay)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="d12" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="d12" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="d12" value="NA"> NA </td>
<td colspan="15"><input type="text" name="d12remarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>


<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Clinical Indicator- Adverse Event in recovery to attend by primary consultant within 20 minutes of being informed)</strong></label></td>
</tr>
<tr>
<td colspan="5"><input type="radio" name="cindicator" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="cindicator" value="NO"> NO &nbsp;&nbsp;<input type="radio" name="cindicator" value="NA"> NA </td>
<td colspan="15"><input type="text" name="cindicatorremarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>



<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Performance Indicator- (Occurrence of intra-operative complications of anaesthesia)</strong></label></td>
</tr>
<tr>
<td colspan="10"><input type="radio" name="pindicator" value="Aspiration Pneumonia" checked="checked"required> Aspiration Pneumonia &nbsp;&nbsp;<input type="radio" name="pindicator" value="Cardiac Events"> Cardiac Events &nbsp;&nbsp;<input type="radio" name="pindicator" value="Incident of Re-intubation in the recovery"> Incident of Re-intubation in the recovery &nbsp;&nbsp;<input type="radio" name="pindicator" value="NA"> NA </td>
<td colspan="10"><input type="text" name="pindicatorremarks" style="background-color:skyblue;" placeholder="Remarks" value="" /></td>

</tr>



<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="nurseassessmentotprint.php?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>		</tr>
	  				
</tr>
</table>
</body>

</html>
