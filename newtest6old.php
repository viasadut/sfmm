<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2.php?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];

$id=$_REQUEST['ID'];
$eid=$_REQUEST['eid'];
//$pid=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$date=date('m/d/Y');
$query49 = "SELECT * FROM presnew where pmrn='$pmrn' and eid='$eid';" ;
$result49 = mysqli_query($con, $query49) or die(mysqli_error());
$row49 = mysqli_fetch_assoc($result49);
$mm1= $row49['m1'];
//echo $mm1;
$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
$query = "SELECT * from pappnew where ID='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pd= $row['dname'];
$pdate= $row['adate'];
$pa= $row['padd'];
$ps= $row['psex'];
$ph= $row['height'];
$pw= $row['weight'];
$pt= $row['temp'];
//$pa= $row['padd'];
  
?>


<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
//$xl=$_REQUEST['xl'];
//$lx= implode(",",$xl);

//$x2=$_REQUEST['x2'];
//$lx2= implode(",",$x2);


$other=$_REQUEST['other'];
$diagnosis=$_REQUEST['diagnosis'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$pdiet=$_REQUEST['pdiet'];
$ref1=$_REQUEST['ref1'];
$ref2=$_REQUEST['ref2'];
$ref3=$_REQUEST['ref3'];
$ref4=$_REQUEST['ref4'];
$ref5=$_REQUEST['ref5'];
$ref6=$_REQUEST['ref6'];
$reffer=$_REQUEST['reffer'];
$reffer2=$_REQUEST['reffer2'];
$reffer3=$_REQUEST['reffer3'];
$reffer4=$_REQUEST['reffer4'];
$reffer5=$_REQUEST['reffer5'];
$reffer6=$_REQUEST['reffer6'];
$psex=$_REQUEST['psex'];
$pheight=$_REQUEST['pheight'];
$pweight=$_REQUEST['pweight'];
$ptemp=$_REQUEST['ptemp'];
$padm=$_REQUEST['padm'];
$pbp=$_REQUEST['pbp'];
$pbmi=$_REQUEST['pbmi'];
$phyper=$_REQUEST['phyper'];
$ppluse=$_REQUEST['ppluse'];
$pheart=$_REQUEST['pheart'];
$pdm=$_REQUEST['pdm'];
$pkid=$_REQUEST['pkid'];
$ptb=$_REQUEST['ptb'];
$pasthma =$_REQUEST['pasthma'];
$pthyroid =$_REQUEST['pthyroid'];
$pneuro =$_REQUEST['pneuro'];
$psurgery =$_REQUEST['psurgery'];
$pperiod =$_REQUEST['pperiod'];
$plmp =$_REQUEST['plmp'];
$pnochild =$_REQUEST['pnochild'];
$plchild =$_REQUEST['plchild'];
$pmenopause =$_REQUEST['pmanopause'];
$palcohol =$_REQUEST['palcohol'];
$psmoking =$_REQUEST['psmoking'];
$pfamily =$_REQUEST['pfamily'];
$pasthma =$_REQUEST['pasthma'];
$pdrug =$_REQUEST['pdrug'];
$pmstatus =$_REQUEST['pmstatus'];
$poccupation =$_REQUEST['poccupation'];
$spo2 =$_REQUEST['spo2'];
$rr =$_REQUEST['rr'];
$pperiod1=$_REQUEST['pperiod1'];
$plmp1=$_REQUEST['plmp1'];
$pnochild1=$_REQUEST['pnochild1'];
$plchild1=$_REQUEST['plchild1'];
$pmanopause1=$_REQUEST['pmanopause1'];
$psurgery1=$_REQUEST['psurgery1'];
$palcohol1=$_REQUEST['palcohol1'];
$psmoking1=$_REQUEST['psmoking1'];
$pfamily1=$_REQUEST['pfamily1'];
$pdrug1=$_REQUEST['pdrug1'];
$phyper1=$_REQUEST['phyper1'];
$pheart1=$_REQUEST['pheart1'];
$pdm1=$_REQUEST['pdm1'];
$pkid1=$_REQUEST['pkid1'];
$ptb1=$_REQUEST['ptb1'];
$pasthma1=$_REQUEST['pasthma1'];
$pthyroid1=$_REQUEST['pthyroid1'];
$pneuro1=$_REQUEST['pneuro1'];
$liver=$_REQUEST['liver'];
$liver1=$_REQUEST['liver1'];





$ins_query="insert into presnew (`dname`,`pname`,`pmrn`,`pphone`,`cdetails`,`diagnosis`,`other`,`date`,`page`,`pdiet`,`pdiet2`,`pdiet3`,`pdiet4`,`pdiet5`,`pdiet6`,`pdiet7`,`reffer`,`reffer2`,`reffer3`,`reffer4`,`reffer5`,`reffer6`,`psex`,`eid`,`padm`,`dstatus`) values ('$dname', '$pname','$pmrn','$pphone','$cdetails','$diagnosis','$other','$pdate','$page','$pdiet','$ref1','$ref2','$ref3','$ref4','$ref5','$ref6','$reffer','$reffer2','$reffer3','$reffer4','$reffer5','$reffer6','$psex','$count1','$padm','SEEN')";
mysqli_query($con,$ins_query) or die("Problem in presnew");

//$gg= $_REQUEST['pname'];
//$update="update pappnew set status='SEEN' where `ID`='$id'";
//mysqli_query($con,$update) or die(mysql_error());


if (!empty ($_POST['reffer'])){
$ins_query21="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa')";
mysqli_query($con,$ins_query21) or die("Problem in Reffer1");}

if (!empty ($_POST['reffer2'])){
$ins_query22="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`) values ('$pname', '$pmrn','$pphone','$reffer2','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa')";
mysqli_query($con,$ins_query22) or die("Problem in Reffer12");}

if (!empty ($_POST['reffer3'])){
$ins_query23="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`page`,`psex`,`dreffer`,`padd`) values ('$pname', '$pmrn','$pphone','$reffer3','$pdate','NOT SEEN','$page','$psex','$dname','$pa')";
mysqli_query($con,$ins_query23) or die("Problem in Reffer3");}

if (!empty ($_POST['reffer4'])){
$ins_query24="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`page`,`psex`,`dreffer`,`padd`) values ('$pname', '$pmrn','$pphone','$reffer4','$pdate','NOT SEEN','$page','$psex','$dname','$pa')";
mysqli_query($con,$ins_query24) or die("Problem in Reffer4");}

if (!empty ($_POST['reffer5'])){
$ins_query25="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`page`,`psex`,`dreffer`,`padd`) values ('$pname', '$pmrn','$pphone','$reffer5','$pdate','NOT SEEN','$page','$psex','$dname','$pa')";
mysqli_query($con,$ins_query25) or die("Problem in Reffer5");}

if (!empty ($_POST['reffer6'])){
$ins_query26="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`page`,`psex`,`dreffer`,`padd`) values ('$pname', '$pmrn','$pphone','$reffer6','$pdate','NOT SEEN','$page','$psex','$dname','$pa')";
mysqli_query($con,$ins_query26) or die("Problem in Reffer6");}

$update33="update pappnew set `height`='$pheight',`weight`='$pweight',`temp`='$ptemp',`pbp`='$pbp',`pbmi`='$pbmi',`phyper`='$phyper',`ppluse`='$ppluse',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`psurgery`='$psurgery',`pperiod`='$pperiod',`plmp`='$plmp',`pnochild`='$pnochild',`plchild`='$plchild',`pmeno`='$pmenopause',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`mstatus`='$pmstatus',`occupation`='$poccupation',`eid`='$count1', `status`='SEEN',`stime`='$stime',`spo2`='$spo2',`rr`='$rr',`pperiod1`='$pperiod1',`plmp1`='$plmp1',`pnochild1`='$pnochild1',`plchild1`='$plchild1',`pmanopause1`='$pmanopause1',`psurgery1`='$psurgery1',`palcohol1`='$palcohol1',`psmoking1`='$psmoking1',`pfamily1`='$pfamily1',`pdrug1`='$pdrug1',`phyper1`='$phyper1',`pheart1`='$pheart1',`pdm1`='$pdm1',`pkid1`='$pkid1',`ptb1`='$ptb1',`pasthma1`='$pasthma1',`pthyroid1`='$pthyroid1',`pneuro1`='$pneuro1',`liver`='$liver',`liver1`='$liver1'where `ID`='$id'";
mysqli_query($con,$update33) or die("Problem in Update pappnew");

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

<h1 align="center">OUTPATIENT RECORD </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp;&nbsp;
		&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>Reference Drug Index of Bangladesh(medex.com.bd)<b></a></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname" value="<?php echo $pd;?>" readonly/>
				
						
						
				
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

<tr>				 <td colspan="10"><input type="text1" name="pname"  value="<?php echo $pn;?>" readonly/></td>
					<td colspan="2"><input type="text1" name="pmrn"   value="<?php echo $pm;?>" readonly/></td>
					<td colspan="2"><input type="text" name="page" required value="<?php echo $row['page'];?>" /></td>  	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $row['psex'];?>" /></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $row['pphone'];?>" /></td>  

					 
</tr>

				<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Personal Information :</strong></label></td></tr>

		
		<tr>
						
						<td colspan="4"><label><strong>Occupation:</strong></label></td>
						<td colspan="4"><label><strong>Marital Status:</strong></label></td>
						<td colspan="4"><label><strong>Height (CM):</strong></label></td>
						<td colspan="4"><label><strong>Weight (CM)</strong></label></td>	
						<td colspan="4"><label><strong>BMI:</strong></label></td>
						

						</tr>
						
						<tr>	
					<td colspan="4"><input type="text" name="poccupation" required value="<?php echo $row['occupation'];?>" ></td>						
					<td colspan="4"><input type="text" name="pmstatus"  value="<?php echo $row['mstatus'];?>" /></td> 
					<td colspan="4"><input type="text" name="pheight" value="<?php echo $row['height'];?>" /></td>						
					<td colspan="4"><input type="text" name="pweight" required value="<?php echo $row['weight'];?>" /></td>    
					<td colspan="4"><input type="text" name="pbmi" required value="<?php echo ("$pw" / "$ph"/"$ph") *10000 ;?>" /></td>  
					
					 

					 </tr>
<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Vitals :</strong></label></td></tr>


<tr>
<td colspan="4"><label><strong>Pulse:</strong></label></td>
<td colspan="4"><label><strong>Blood Pressure:</strong></label></td>
<td colspan="4"><label><strong>Temperature:</strong></label></td>
<td colspan="4"><label><strong>SPO2:</strong></label></td>
<td colspan="4"><label><strong>RR:</strong></label></td>

</tr>
<tr>
<td colspan="4"><input type="text" name="ppluse"style="background-color:skyblue;" value="<?php echo $row['ppluse'];?>" /></td>					 	
<td colspan="4"><input type="text" name="pbp" style="background-color:skyblue;"required value="<?php echo $row['pbp'];?>" /></td>
<td colspan="4"><input type="text" name="ptemp" value="<?php echo $row['temp'];?>" /></td>  
<td colspan="4"><input type="text" name="spo2" value="<?php echo $row['spo2'];?>" /></td>  
<td colspan="4"><input type="text" name="rr" value="<?php echo $row['rr'];?>" /></td>  

</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Comorbidities :</strong></label></td></tr>


<tr>
<td colspan="2"><label><strong>Hypertension:</strong></label></td>
<td colspan="2"><label><strong>Heart Disease:</strong></label></td>
<td colspan="2"><label><strong>DM:</strong></label></td>
<td colspan="2"><label><strong>Kidney Disease:</strong></label></td>
<td colspan="2"><label><strong>TB:</strong></label></td>
<td colspan="2"><label><strong>Asthma:</strong></label></td>
<td colspan="3"><label><strong>Thyriod Disease:</strong></label></td>
<td colspan="3"><label><strong>Neuro Disorder:</strong></label></td>
<td colspan="2"><label><strong>Liver Disease:</strong></label></td>
</tr>


<tr>

<td colspan="2"><input type="text" name="phyper" style="background-color:skyblue;" required value="<?php echo $row['phyper'];?>" /></td>
<td colspan="2"><input type="text" name="pheart" style="background-color:skyblue;" required value="<?php echo $row['pheart'];?>" /></td>
<td colspan="2"><input type="text" name="pdm" style="background-color:skyblue;" required value="<?php echo $row['pdm'];?>" /></td>
<td colspan="2"><input type="text" name="pkid" style="background-color:skyblue;" required value="<?php echo $row['pkid'];?>" /></td>
<td colspan="2"><input type="text" name="ptb" required value="<?php echo $row['ptb'];?>" /></td>
<td colspan="2"><input type="text" name="pasthma" required value="<?php echo $row['pasthma'];?>" /></td>
<td colspan="3"><input type="text" name="pthyroid" required value="<?php echo $row['pthyroid'];?>" /></td>
<td colspan="3"><input type="text" name="pneuro" required value="<?php echo $row['pneuro'];?>" /></td>
<td colspan="2"><input type="text" name="liver" required value="<?php echo $row['liver'];?>" /></td>




</tr>

<tr>

<td colspan="2"><input type="text" name="phyper1" style="background-color:skyblue;" placeholder="Remarks" value="<?php echo $row['phyper1'];?>"/></td>
<td colspan="2"><input type="text" name="pheart1" style="background-color:skyblue;" placeholder="Remarks" value="<?php echo $row['pheart1'];?>" /></td>
<td colspan="2"><input type="text" name="pdm1" style="background-color:skyblue;" placeholder="Remarks" value="<?php echo $row['pdm1'];?>" /></td>
<td colspan="2"><input type="text" name="pkid1" style="background-color:skyblue;" placeholder="Remarks" value="<?php echo $row['pkid1'];?>" /></td>
<td colspan="2"><input type="text" name="ptb1" placeholder="Remarks" value="<?php echo $row['ptb1'];?>"/></td>
<td colspan="2"><input type="text" name="pasthma1" placeholder="Remarks" value="<?php echo $row['pasthma1'];?>" /></td>
<td colspan="3"><input type="text" name="pthyroid1" placeholder="Remarks" value="<?php echo $row['pthyroid1'];?>" /></td>
<td colspan="3"><input type="text" name="pneuro1" placeholder="Remarks" value="<?php echo $row['pneuro1'];?>" /></td>
<td colspan="2"><input type="text" name="liver1" placeholder="Remarks" value="<?php echo $row['liver1'];?>" /></td>



</tr>



<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Past History :</strong></label></td></tr>
<tr>
<td colspan="4"><label><strong>Past Surgery:</strong></label></td>
<td colspan="4"><label><strong>Alcohol:</strong></label></td>
<td colspan="4"><label><strong>Smoking:</strong></label></td>
<td colspan="4"><label><strong>Family History:</strong></label></td>
<td colspan="4"><label><strong>Drug History:</strong></label></td>
</tr>
<tr>
<td colspan="4"><input type="text" name="psurgery" required value="<?php echo $row['psurgery'];?>" /></td>
<td colspan="4"><input type="text" name="palcohol" required value="<?php echo $row['palcohol'];?>" /></td>
<td colspan="4"><input type="text" name="psmoking" required value="<?php echo $row['psmoking'];?>" /></td>
<td colspan="4"><input type="text" name="pfamily" required value="<?php echo $row['pfamily'];?>" /></td>
<td colspan="4"><input type="text" name="pdrug" required value="<?php echo $row['pdrug'];?>" /></td>
</tr>
<tr>
<td colspan="4"><input type="text" name="psurgery1" placeholder="Remarks" value="<?php echo $row['psurgery1'];?>" /></td>
<td colspan="4"><input type="text" name="palcohol1" placeholder="Remarks" value="<?php echo $row['palcohol1'];?>" /></td>
<td colspan="4"><input type="text" name="psmoking1" placeholder="Remarks" value="<?php echo $row['psmoking1'];?>"/></td>
<td colspan="4"><input type="text" name="pfamily1"placeholder="Remarks"  value="<?php echo $row['pfamily1'];?>" /></td>
<td colspan="4"><input type="text" name="pdrug1"  placeholder="Remarks"value="<?php echo $row['pdrug1'];?>"/></td>
</tr>


<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>For Female :</strong></label></td></tr>
<tr>
<td colspan="4"><label><strong>Period:</strong></label></td>
<td colspan="4"><label><strong>LMP-Date:</strong></label></td>
<td colspan="4"><label><strong>Number of Children:</strong></label></td>
<td colspan="4"><label><strong>Age of Last Children:</strong></label></td>
<td colspan="4"><label><strong>Manopause:</strong></label></td>
</tr>
<tr>
<td colspan="4"><input type="text" name="pperiod" required value="<?php echo $row['pperiod'];?>" /></td>
<td colspan="4"><input type="text" name="plmp" required value="<?php echo $row['plmp'];?>" /></td>
<td colspan="4"><input type="text" name="pnochild" required value="<?php echo $row['pnochild'];?>" /></td>
<td colspan="4"><input type="text" name="plchild" required value="<?php echo $row['plchild'];?>" /></td>
<td colspan="4"><input type="text" name="pmanopause" required value="<?php echo $row['pmeno'];?>" /></td>
</tr>
<tr>
<td colspan="4"><input type="text" name="pperiod1" placeholder="Remarks" value="<?php echo $row['pperiod1'];?>" /></td>
<td colspan="4"><input type="text" name="plmp1" placeholder="Remarks" value="<?php echo $row['plmp1'];?>" /></td>
<td colspan="4"><input type="text" name="pnochild1" placeholder="Remarks" value="<?php echo $row['pnochild1'];?>" /></td>
<td colspan="4"><input type="text" name="plchild1" placeholder="Remarks" value="<?php echo $row['plchild1'];?>" /></td>
<td colspan="4"><input type="text" name="pmanopause1" placeholder="Remarks" value="<?php echo $row['pmanopause1'];?>" /></td>
</tr>

<tr><td colspan="20" bgcolor="lightgreen"><h3><a target='_blank' href="vacine?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>">Add Vaccine</a>&nbsp;&nbsp;<a target='_blank' href="bhistory?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>">Add Birth History</a>&nbsp;&nbsp;<a target='_blank' href="pasthistory?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>">Add Past History</a></td></tr>					
				<tr><td colspan="20" bgcolor="#00CCCC"><label><strong></strong></label></td></tr>					




						 <tr><td colspan="20"><label><strong>Patient's Clinical Details:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="5" ><?php echo $row49["cdetails"]; ?></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"><?php echo $row49["diagnosis"]; ?></textarea></td>  </tr>
						
				
														



<tr><td align="left" colspan="3"><a target='_blank' href="newtest7?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&eid=<?php echo "$count1"?>"><img src="test1.jpg" title="test" width="130" height="90" /></a></td><td align="left" colspan="3"><a target='_blank' href="newtest8?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&eid=<?php echo "$count1"?>"><img src="medicine1.jpg" title="medicine" width="130" height="90" /></a></td></tr>

<tr><td colspan="20"><label for="age"><strong>Other Instructions:</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea" name="other" rows="5" placeholder="Other Instructions"><?php echo $row49["other"]; ?></textarea></td>  </tr>	

<tr><td colspan="20"><label><strong>Diet Instructions :</strong></label></td></tr>
<tr><td colspan="20"><input list=diet1 name="pdiet" placeholder="Select Diet" class="form-control" value="<?php echo $row49["pdiet"]; ?>">
					<datalist id="diet1">	
						
						<option value=''>-Select Diet-</option>
				 <?php 
			$sql = "select * from `diet`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dietn."'>".$row->dietn."</option>";
				}
			}
			?>	
						
						</datalist>
</td>
						
					
</tr>





<tr><td colspan="20"><label><strong>Reffered To:</strong></label></td></tr>
<tr><td colspan="3"><select name="reffer" placeholder="Select Dosage" >
						
						<option value=''>-Select Reffered Doctor-</option>
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
</td>
<td colspan="3"><select name="reffer2" placeholder="Select Dosage" >
						
						<option value=''>-Select Reffered Doctor-</option>
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
</td><td colspan="3"><select name="reffer3" placeholder="Select Dosage" >
						
						<option value=''>-Select Reffered Doctor-</option>
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
</td><td colspan="3"><select name="reffer4" placeholder="Select Dosage" >
						
						<option value=''>-Select Reffered Doctor-</option>
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
</td>
<td colspan="3"><select name="reffer5" placeholder="Select Dosage" >
						
						<option value=''>-Select Reffered Doctor-</option>
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
</td>

<td colspan="5"><select name="reffer6" placeholder="Select Dosage" >
						
						<option value=''>-Select Reffered Doctor-</option>
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

</td>
</tr>

<tr><td colspan="3"><input type="text" name="ref1" value="" /></td>
<td colspan="3"><input type="text" name="ref2" value="" /></td>
<td colspan="3"><input type="text" name="ref3" value="" /></td>
<td colspan="3"><input type="text" name="ref4" value="" /></td>
<td colspan="3"><input type="text" name="ref5" value="" /></td>
<td colspan="5"><input type="text" name="ref6" value="" /></td>
</tr>


<tr><td colspan="20"><label><strong>Admission Advise :</strong></label></td></tr>
<tr><td colspan="20"><input list=padm name="padm" placeholder="Select Admission Advise" class="form-control" >
					<datalist id="padm">	
						
						<option value=''>-Select Admission Advise-</option>
				 	<option value='Admission'>Admission</option>
					
						</datalist>
</td>
						
					
</tr>


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="p4new.php?pmrn=<?php echo "$pm"; ?>&dname=<?php echo "$pd"; ?>&date=<?php echo "$pdate"; ?>&eid=<?php echo "$count1"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
