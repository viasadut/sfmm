<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2.php?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



//$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM staff1 where sid= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$idept=$row39['department'];
$idept1=$row39['sdepartment'];
$gender= $row39['gender'];
$doj= $row39['doj'];
$status1= $row39['stype'];
$cdate=date('m/d/Y');
echo $status1;
//$id=$_REQUEST['ID'];
//$pmrn=$_REQUEST['pmrn'];
//echo $gender;
$query9 = "SELECT * FROM staff1 where department= '$idept' and hod='YES'"; 
$result9 = mysqli_query($con, $query9) or die(mysqli_error());
$row9 = mysqli_fetch_array($result9);
$hos=$row9['sid'];


$date4 = new DateTime($cdate);
$date3 = new DateTime($doj);

$diff2 = $date3->diff($date4, true);

$diff3= $diff2->format('%a')+1;

//echo time($cdate);
?>

<?php 

$query = "SELECT * from staff1 where sid='$user'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$el= $row['eleave'];
$al= $row['aleave'];
$sl= $row['sleave'];
$ma= $row['mleave']; 
$pa= $row['pleave'];
$mal= $row['maleave'];
$cfl= $row['cfleave'];
//$doj= $row['doj'];

$coml= $row['comleave'];  
$inl= $row['inleave'];
$status= $row['status']; 
//$pa= $row['padd'];

 
/*$date2=date('01/01/2019');
$date1= date('m/d/Y');
$date3=date_create("$date2");
$date4=date_create("$date1");
$diff=date_diff($date4,$date3);
echo $diff->format("%d");*/
$now = time(); // or your date as well
//$year=date('Y');
 //$your_date = date("2019-01-01");
$your_date = strtotime("2019-01-01");
 echo $datediff = $now - $your_date;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274) ;



$fday3= round($datediff / (60 * 60 * 24)*.0164) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;


//echo $fday;
$aday=$fday+$cfl;
$aday1=$fday1-$el;
$aday2=$fday3+$cfl;
  //echo $test;
//echo $aday;
//echo $aday2;


  ?>


<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{
$tleave=$_REQUEST['tleave'];
$sdate1=$_REQUEST['sdate'];
$edate1=$_REQUEST['edate'];
$reason=$_REQUEST['reason'];

$sdate=date('Y-m-d',strtotime($sdate1));
$edate=date('Y-m-d',strtotime($edate1));


//$date1=date_create("$sdate");
//$date2=date_create("$edate");
//$diff=$date1+$date2;

//$diff=date_diff($date1,$date2);
//$diff1=$diff->format("%d")+1;

$date1 = new DateTime($sdate);
$date2 = new DateTime($edate);

$diff = $date1->diff($date2, true);

$diff1= $diff->format('%a')+1;

echo $diff1;




$al1=$al-$diff1;
$el1=$el-$diff1;
$sl1=$sl-$diff1;
$ma1=$ma-$diff1;
$pa1=$pa-$diff1;


//echo $diff1;
//echo $diff->format("%d")+1;

if($tleave=='Annual Leave' && $diff1<=$aday && $status1=='confirm'){
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`sid`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`) values ('$sdate','$edate','$user','$user','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','aleave','$diff1')";
mysqli_query($con,$ins_query1) or die(mysql_error());


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}




else if($tleave=='Annual Leave' && $diff1<=$aday2 && $status1=='probition'){
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`sid`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`) values ('$sdate','$edate','$user','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','aleave','$diff1')";
mysqli_query($con,$ins_query1) or die(mysql_error());


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}




else if($tleave=='Emergency Leave' && $diff1<=$aday1){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`sid`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`) values ('$sdate','$edate','$user','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','eleave','$diff1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

//$ins_query2="update mleave set el1='$el1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}

else if($tleave=='Sick Leave' && $diff1<=$sl){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`sid`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`) values ('$sdate','$edate','$user','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','sleave','$sl1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

//$ins_query2="update mleave set sl1='$sl1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}

else if($tleave=='Maternity Leave' && $diff1<=$ma && $gender=='Female'){
	
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`sid`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`) values ('$sdate','$edate','$user','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','maleave','$ma1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

//$ins_query2="update mleave set sl1='$sl1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
	
}


else if($tleave=='Paternity Leave' && $diff1<=$pa && $gender=='Male'){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`sid`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`) values ('$sdate','$edate','$user','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','maleave','$pa1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

//$ins_query2="update mleave set sl1='$sl1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}



else{
	
	echo '<script language="javascript">';
    echo 'alert("You Dont Have Sufficient Leave Balance !!"); ';
    echo '</script>';
}
}


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Out Patient Record</title>
  
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

    <script src="jsnew/prefixfree.min.js"></script>



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





  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Prescription</title>
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

<h1 align="center">Leave Apply Panel </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
		
				<tr>
						
						
						<td colspan="2"><label><strong>Annual Leave</strong></label></td>
						<td colspan="2"><label><strong>Emergency Leave</strong></label></td>				
						<td colspan="2"><label><strong>Sick Leave</strong></label></td>
						<td colspan="2"><label><strong>In-Patient Leave</strong></label></td>
						<td colspan="2"><label><strong>Marriage Leave</strong></label></td>
						<td colspan="2"><label><strong>Compensation Leave</strong></label></td>
						<td colspan="2"><label><strong>Maternity Leave</strong></label></td>
						<td colspan="2"><label><strong>Paternity Leave</strong></label></td>
						
						
						
						</tr>

<tr>				 
					<td colspan="2"><input type="text1" name="aleave"  required value="<?php if($status1=='confirm'){echo $aday;} else {echo $aday2;}?>" readonly/></td>
					<td colspan="2"><input type="text1" name="eleave"  required value="<?php echo $aday1;?>" readonly/></td>
					<td colspan="2"><input type="text1" name="sleave" required value="<?php echo $sl;?>" readonly/></td>
					<td colspan="2"><input type="text1" name="inleave" required value="<?php echo $inl;?>" readonly/></td>
					<td colspan="2"><input type="text1" name="maleave" required value="<?php echo $mal;?>" readonly/></td>
					<td colspan="2"><input type="text1" name="comleave" required value="<?php echo $coml;?>" readonly/></td>
<td colspan="2"><input type="text1" name="maleave" required value="<?php if($gender=='Female'){echo $ma;} else {echo '0';}?>" readonly/></td>
<td colspan="2"><input type="text1" name="paleave" required value="<?php if($gender=='Male'){echo $pa;} else {echo '0';}?>" readonly/></td>					
					  

					 
</tr>

<tr>
						
						
						<td colspan="7"><label><strong>Type Of Leave</strong></label></td>
						<td colspan="7"><label><strong>From Date</strong></label></td>				
						<td colspan="6"><label><strong>End Date</strong></label></td>
						
						
						
						</tr>
				
<tr>

<td colspan="7"><select name="tleave" value="" class="style1">
			        <option value=''>-Select Type-</option>
					 <option value='Annual Leave'>Annual Leave</option>
					 <option value='Emergency Leave'>Emergency Leave</option>
					 <option value='Sick Leave'>Sick Leave</option>
					 					 <option value='Maternity Leave'>Maternity Leave</option>
										 <option value='Paternity Leave'>Paternity Leave</option>
				
			</select></td>
<td colspan="7"><input type="text" class="style1" name="sdate" id="datepicker" placeholder="Select Date" size="15" ></td>
<td colspan="6"><input type="text" class="style1" name="edate" id="datepicker1" placeholder="Select Date" size="15" ></td>

</tr>

<tr><td colspan="20"><label><strong>Reason For Leave</strong></label></td></tr>
<tr><td colspan="20"><textarea rows="5"  name="reason" required value=""></textarea></td></tr>

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	
	  				
</tr>

</body>

</html>
