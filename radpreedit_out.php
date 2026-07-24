<?php 
ini_set('session.gc_maxlifetime', 86400); // Set session timeout to 24 hours
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','rad','outdoc','staff')"; 
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


$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
$type1=$_REQUEST['type1'];
//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];



//$query43 = "SELECT COUNT(pmrn) FROM radreport where pmrn= '$pmrn';"; 
//$result43 = mysqli_query($con, $query43) or die(mysqli_error());
//$row43 = mysqli_fetch_assoc($result43);
//$count =$row43['COUNT(pmrn)'];
//$count1 = $count+1;
$query = "SELECT * from radreport where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$dreffer= $row['dreffer'];  
$type= $row['type'];  
$oreport= $row['report'];  
$oeid= $row['eid'];  
//$pd= $row['tname'];
//$pdate= $row['adate'];
//$pa= $row['page'];
//$ps= $row['psex'];

//$pa= $row['padd'];
 $odname=$row['dname'];  
$ordate=$row['rdate'];  
$or1date=$row['r1date']; 
$ofind=$row['find'];
$ordone=$row['rdone'];
$odate2=$row['date2'];
$otype1=$row['type1'];
$otime=$row['time'];

$oac_no=$row['ac_no'];
$ns=substr($row['ac_no'], 0, 1); 
$ns1=substr($row['ac_no'], 1); 

$ostatus1=$row['status1'];
$oineid=$row['ineid'];
$oemerid=$row['emerid'];
$oprice=$row['price'];
$odone_date=$row['done_date'];
$cc=$row['critical'];
?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$select=$_REQUEST['select'];
$cdetails=$_REQUEST['cdetails'];
$critical=$_REQUEST['critical'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$ptemp=$_REQUEST['ptemp'];
//$find=$_REQUEST['find'];
$date= date('Y/m/d');
$date1=date('m/d/Y');
$ortime = date('d/m/Y H:i:s');

$plaintext = strip_tags($cdetails);

$update="update radreport set report='$cdetails',report1='$plaintext',edittime='$ortime',editby='$user', critical='$critical', status='SEEN' where `id`='$id'";
mysqli_query($con,$update);


$ins_query="insert into radreport_edit (`dname`,`pmrn`,`pname`,`age`,`gender`,`pphone`,`dreffer`,`report`,`report1`,`type`,`eid`,`status`,`rdate`,`r1date`,`find`,`erdone`,`edate`,`type1`,`time`,`ac_no`,`status1`,`ineid`,`emerid`,`price`,`done_date`,`edittime`) 
values ('$odname', '$pmrn','$pname','$page','$psex','$pphone','$dname','$cdetails','$plaintext','$ptemp','$count1','Edited','$ordate','$or1date','$ofind','$user','$date2','$otype1','$otime','$oac_no','Edited','$oineid','$oemerid','$oprice','$odone_date','$ortime')";
mysqli_query($con,$ins_query);


$ins_query54="update his_report set `Report_Data`='$plaintext' where Accession_Number='$oac_no'";

mysqli_query($con,$ins_query54);


$ins_query55="update radpapp set `status`='SEEN' where a_no='$oac_no'";

mysqli_query($con,$ins_query55);


if($ns!='I' and $ns !='E'){
  $update="update alltest set resultstatus='Confirmed By Consultant',critical='$critical',status='SEEN' where `id`='$oac_no'";
  mysqli_query($con,$update);
  

}

if($ns=='I'){
  $update="update iinves set resultstatus='Confirmed By Consultant',critical='$critical',status='SEEN' where `id`='$ns1'";
  mysqli_query($con,$update);
  

}

if($location=='E'){
  $update="update einves set resultstatus='Confirmed By Consultant',critical='$critical',status='SEEN' where `id`='$ns1'";
  mysqli_query($con,$update);
  

}



}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>REPORT</title>
  
     <link rel="stylesheet" href="jsnew/normalize.min.css">
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
<link rel="stylesheet" href="styles.css">
		<link href='jsnew/fjsnwonts' rel='stylesheet' type='text/css'>







 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

  
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
    max-width: 2000px;
  }

}
      </style>

    
  
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
    

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   
   <script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='rad_report_outside21'><span>Home</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Report </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
	

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}" autocomplete="on">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>medex.com.bd<b></a></td></tr>
<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>"><b>SURGERY NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolink?pmrn=<?php echo "$pmrn"; ?>"><b>CARDIOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="opdprocedurenote?pmrn=<?php echo "$pmrn"; ?>"><b>OPD PROCEDURE NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="historeportdoc?pmrn=<?php echo "$pmrn"; ?>"><b>HISTOPATHOLOGY REPORT<b></a></td></tr>		
				<tr><td colspan="15"><label><strong>Doctors's Name :</strong></label></td>
				<td colspan="5"><label><strong>Referral Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="15"><input type="text" name="select"  required value="<?php echo $row['dname'];?>" readonly/></td>
				<td colspan="5" ><input type="text" name="dname" required value="<?php echo $row['dreffer'];?>" readonly/ style="background-color:skyblue;></td>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="10"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly/></td>
					 <td colspan="10"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly/></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Phone NO:</strong></label></td>
						<td colspan="5"><label><strong>REPORT ON:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" required value="<?php echo $row['age'];?>" readonly/></td>  
             		
					 <td colspan="5"><input type="text" name="psex" required value="<?php echo $row['gender'];?>" readonly/></td>
					 <td colspan="5"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly/></td>  


					 <td colspan="5"><input type="text" name="ptemp" value="<?php echo $row['type'];?>" readonly/></td>  
					 </tr>

						 <tr><td colspan="20"><label><strong>Patient's Details Report:</strong></label></td>  </tr>
						 
						 
						 
						 <tr><td colspan="20"><textarea class="form-control" id="charge" name="cdetails" rows="40" ><?php echo $row['report'];?></textarea></td>  </tr>
						 
						 <script>
                                                    CKEDITOR.replace( 'charge',{
  height: 700,
  
  
 
 } );
													
                                                </script>
						
				
														
<tr>
<td colspan="20">
<?php
if($row['critical']=='critical'){echo'
	 <input type="checkbox" id="critical" name="critical" value="critical" style="height:20px; width:20px; color:red;" checked><span style="color:red; font-size:30px; font-weight:bold;">&nbsp;Critical / Abnormal Report</span>				 
	 ';}

   else {echo'
    <input type="checkbox" id="critical" name="critical" value="critical" style="height:20px; width:20px; color:red;"><span style="color:red; font-size:30px; font-weight:bold;">&nbsp;Critical / Abnormal Report</span>				 
    ';}
 
   ?>
</td>

						</tr>
				


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="rad_report_new2_edit.php?pmrn=<?php echo $pmrn; ?>&dname=<?php echo $odname; ?>&acno=<?php echo $oac_no;?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
