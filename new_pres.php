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

$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dbhandle= new mysqli('localhost','root','Godiloveu16','sfmmkpjnew');
echo $dbhandle->connect_error;

$querym="select * from pappnew where pmrn='$pmrn' order by id desc limit 3";
$resm=$dbhandle->query($querym);






?>



<?php

require('db1.php');

$user=$_SESSION['sess_username'];
$date4=date('Y-m-d');


$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];




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
$pty= $row['yage'];
//$pa= $row['padd'];
  
$query5 = "SELECT * from pmedi where pmrn='$pmrn' and dname='$pd' order by id desc limit 1"; 
$result5 = mysqli_query($con, $query5) or die ( mysqli_error());
$row5 = mysqli_fetch_assoc($result5);
$oeid=$row5["eid"];
//echo $oeid;


$sel="SELECT * FROM presnew WHERE `pmrn`='$pmrn' and dname='$pd' and date='$pdate';";
$result = mysqli_query($con,$sel);  
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
//$padm=$_REQUEST['padm'];
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
//$pmenopause =$_REQUEST['pmanopause'];
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
//$pmanopause1=$_REQUEST['pmanopause1'];
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
$para=$_REQUEST['para'];
$para1=$_REQUEST['para1'];
$gravida=$_REQUEST['gravida'];
$gravida1=$_REQUEST['gravida1'];
$clist=$_REQUEST['clist'];
$clist1=$_REQUEST['clist1'];
$fdate1=$_REQUEST['fdate'];

$fdate=date('Y-m-d',strtotime($fdate1));



if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Today you have already issued prescription for the Patient... Kindly go back and edit the prescription if need to modify"); ';
    echo '</script>';
    }

	
	
	
	else{
$ins_query="insert into presnew (`dname`,`pname`,`pmrn`,`pphone`,`cdetails`,`diagnosis`,`other`,`date`,`page`,`pdiet`,`pdiet2`,`pdiet3`,`pdiet4`,`pdiet5`,`pdiet6`,`pdiet7`,`reffer`,`reffer2`,`reffer3`,`reffer4`,`reffer5`,`reffer6`,`psex`,`eid`,`dstatus`,`date1`,`fdate`) values ('$dname', '$pname','$pmrn','$pphone','$cdetails','$diagnosis','$other','$pdate','$page','$pdiet','$ref1','$ref2','$ref3','$ref4','$ref5','$ref6','$reffer','$reffer2','$reffer3','$reffer4','$reffer5','$reffer6','$psex','$count1','SEEN','$date4','$fdate')";
mysqli_query($con,$ins_query) or die("Please avoid Apostrophe in your prescription");

//$gg= $_REQUEST['pname'];
//$update="update pappnew set status='SEEN' where `ID`='$id'";
//mysqli_query($con,$update) or die(mysql_error());


if (!empty ($_POST['reffer'])){
$ins_query21="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query21) or die("Problem in Reffer1");}

if (!empty ($_POST['reffer2'])){
$ins_query22="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query22) or die("Problem in Reffer12");}

if (!empty ($_POST['reffer3'])){
$ins_query23="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query23) or die("Problem in Reffer3");}

if (!empty ($_POST['reffer4'])){
$ins_query24="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query24) or die("Problem in Reffer4");}

if (!empty ($_POST['reffer5'])){
$ins_query25="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query25) or die("Problem in Reffer5");}

if (!empty ($_POST['reffer6'])){
$ins_query26="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query26) or die("Problem in Reffer6");}

$update33="update pappnew set `height`='$pheight',`weight`='$pweight',`temp`='$ptemp',`pbp`='$pbp',`pbmi`='$pbmi',`phyper`='$phyper',`ppluse`='$ppluse',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`psurgery`='$psurgery',`pperiod`='$pperiod',`plmp`='$plmp',`pnochild`='$pnochild',`plchild`='$plchild',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`mstatus`='$pmstatus',`occupation`='$poccupation',`eid`='$count1', `status`='SEEN',`stime`='$stime',`spo2`='$spo2',`rr`='$rr',`pperiod1`='$pperiod1',`plmp1`='$plmp1',`pnochild1`='$pnochild1',`plchild1`='$plchild1',`psurgery1`='$psurgery1',`palcohol1`='$palcohol1',`psmoking1`='$psmoking1',`pfamily1`='$pfamily1',`pdrug1`='$pdrug1',`phyper1`='$phyper1',`pheart1`='$pheart1',`pdm1`='$pdm1',`pkid1`='$pkid1',`ptb1`='$ptb1',`pasthma1`='$pasthma1',`pthyroid1`='$pthyroid1',`pneuro1`='$pneuro1',`liver`='$liver',`liver1`='$liver1',`para`='$para',`para1`='$para1',`gravida`='$gravida',`gravida1`='$gravida1',`clist`='$clist',`clist1`='$clist1',`adate1`='$date4' where `ID`='$id'";
mysqli_query($con,$update33) or die("Problem in Update pappnew");






$url = "historynewview?pmrn=$pm&eid=$count1&date=$pdate&dname=$pd" ;
header("Location:$url");
}
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
  margin: 0px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 0px 0;
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
  margin-bottom: 0px;
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
  padding: 0px;
  width: 100%;
  background-color: yellow;
  color: Black;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 0px;
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
  margin-bottom: 0px;
}


button1 {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
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
  margin-bottom: 0px;
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
  background-color: lightblue;
  color: Black;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 0px;
}

input[type="text2"] {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 14px;
  font-weight:bold;
  font-color: Blue;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: lightblue;
  color: Black;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 0px;
}

fieldset {
  margin-bottom: 0px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 0px;
}

label {
  display: block;
  margin-bottom: 0px;
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
	  
	  
	  <style>

.blink {
      animation: blinker 5s linear infinite;
      color: red;
      font-size: 30px;
      font-weight: bold;
      font-family: sans-serif;
      }
      @keyframes blinker {  
      50% { opacity: 0; }
      }
      .blink-one {
      animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {  
      0% { opacity: 0; }
      }
      .blink-two {
      animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {  
      100% { opacity: 0; }
      }
	  </style>
	  
	  
	  <style>

.blink1 {
      animation: blinker 5s linear infinite;
      color: red;
      font-size: 20px;
      font-weight: bold;
      font-family: sans-serif;
      }
      @keyframes blinker {  
      50% { opacity: 0; }
      }
      .blink-one {
      animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {  
      0% { opacity: 0; }
      }
      .blink-two {
      animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {  
      100% { opacity: 0; }
      }
	  </style>

    <script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  

 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+365)
		});
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
   
   
   
   
   
   
   
   
   
   <script type="text/javascript" src="jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Weight', 'Temperature','Pluse','SPO2'],
          <?php
 while($rowm=$resm->fetch_assoc())
{
echo"['".$rowm['adate1']."',".$rowm['weight'].",".$rowm['temp'].",".$rowm['ppluse'].",".$rowm['spo2']."],";
}
?>

        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 550, height: 320, legend: 'left', title: 'Patient Last 3 visit Vitals Chart'});
      }
    </script>
  
<style>
.center {
  leftmargin: 0px;
  
  border: 0px solid #73AD21;
  padding: 0px;
  display: block;
  width: 550px; 
  height: 320px;
}
</style>  
   
   
   
   
   
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
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

		
<h2 align="right" style="color:red;">	
<form target="_blank" action="http://192.168.100.202/Launch_Viewer.asp?" method="post" id='tt' >
<input type="hidden" name="PatientID" value="<?php echo $pmrn;?>"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value='PACS VIEW'align="right" class="blink"></input>
</form></h2>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");'id="prescrip" name="prescrip" />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right" bgcolor="lightgreen"><a target='_blank' href="http://182.160.124.36/"><b>ACCESS PACS FROM OUTSIDE HOSPITAL<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="viewlabpms1?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT(Only in PMS)<b></a></td></tr>
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp&nbsp&nbsp&nbsp<a href="view3newtesttest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>&eid=<?php echo "$count1"?>"><b>Template Of Previous Visits<b></a>&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>medex.com.bd<b></a></td></tr>
<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>"><b>SURGERY NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolink?pmrn=<?php echo "$pmrn"; ?>"><b>CARDIOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="opdprocedurenote?pmrn=<?php echo "$pmrn"; ?>"><b>OPD PROCEDURE NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="historeportdoc?pmrn=<?php echo "$pmrn"; ?>"><b>HISTOPATHOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="pcovidresult?pmrn=<?php echo "$pmrn"; ?>" class="blink1"><b>COVID RECORD<b></a>&nbsp;&nbsp;<a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>ALL REPORTS<b></a></td></tr>		
				<tr><td colspan="2"><label><strong>Doctor's Name :</strong></label></td>
				
				<td colspan="6"><input type="text2" name="dname" value="<?php echo $pd;?>" readonly class="form-control"></td>
				<td colspan="2"><label><strong>Patient Name:</strong></label></td>
				<td colspan="6"><input type="text1" name="pname"  value="<?php echo $pn;?>" readonly class="form-control"></td>
				
				<td align="left" colspan="2"><a target='_blank' href="opd_vitals?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"><img src="vitals.jpg" title="test" width="120" height="50" /></a></td>
				<td align="left" colspan="2"><a target='_blank' href="newtest5?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"><img src="per_info.jpg" title="medicine" width="120" height="50" /></td>
				
				</tr>
				
				
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
				
						
						
						
						
						<td colspan="2"><label><strong>MRN:</strong></label></td>	
						<td colspan="2"><input type="text1" name="pmrn"   value="<?php echo $pm;?>" readonly class="form-control"></td>						
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="2"><input type="text2" name="page" required value="<?php echo $row['page'];?>" readonly class="form-control"></td>  	
					
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="2"><input type="text2" name="psex" required value="<?php echo $row['psex'];?>" readonly class="form-control"></td>
						
						<td colspan="2"><label><strong>Phone No:</strong></label></td>
						<td colspan="2"><input type="text2" name="pphone" required value="<?php echo $row['pphone'];?>" readonly class="form-control"></td>  	
						
						<td align="left" colspan="2">
						
						
						
						<div class="container"style="width: 100px">
  
  <!-- Trigger the modal with a button -->
  <div class="card shadow" style="width: 100px">
  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal" align="left">Vital Records</button>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
            <div id="chart_div" class="center"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
						
						
						
						
						
						
						
						
						
						</td>
						
						
						
						
						
						
						
						<td align="left" colspan="2"><a target='_blank' href="newtest5?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"><img src="p_his.jpg" title="medicine" width="90" height="50" /></a></td>

						</tr>

<tr>				 
					
					
					
					 
					 

					 
</tr>

				


				



						 <tr><td colspan="2"><label><strong>Patient's Clinical Details:</strong></label></td>
						 <td colspan="14"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="5" required></textarea></td>

<td align="left" colspan="2"><a target='_blank' href="newtest2?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"><img src="test1.jpg" title="test" width="130" height="90" /></a></td>
<td align="left" colspan="2"><a target='_blank' href="newtest5?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"><img src="medicine1.jpg" title="medicine" width="120" height="90" /></a></td>
						 </tr>
						 
						 <tr><td colspan="2"><label><strong>Patient's Diagnosis:</strong></label></td> 
						  <td colspan="14"><textarea class="form-control" id="exampleTextarea1" name="diagnosis" rows="5"required ></textarea></td>  
						 <td colspan="2"><a target='_blank' href="newtest5test?pmrn=<?php echo "$pm"; ?>&dname=<?php echo "$pd"?>&eid=<?php echo "$count1"?>&eido=<?php echo "$oeid"?>"><b>Load Last Medicine<b></a></td> 
						  
						  <td colspan="2"><a target='_blank' href="docadm?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>&eid=<?php echo "$count"; ?>"><img src="adm.jpg" title="Admission Request" width="120" height="75" /></a></td>  
						  </tr>
						
				
														





<tr><td colspan="2"><label for="age"><strong>Other Instructions:</strong></label></td>
<td colspan="14"><textarea class="form-control" id="exampleTextarea1" name="other" rows="5" placeholder="Other Instructions" ></textarea></td>  

<td colspan="4" align="left"><input type="text1" class="style" name="fdate" id="datepicker" placeholder="Select Follow UP Date" value=""></td>


</tr>	

<tr><td colspan="2"><label><strong>Diet Instructions :</strong></label></td>
<td colspan="14"><input list=diet1 name="pdiet" placeholder="Select Diet" class="form-control" >
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

<tr>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a target='_blank' href="docadm?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>&eid=<?php echo "$count"; ?>">
</td>

<?php 
	  
	  
	  
	  $url4="manualadm?pmrn=$pmrn&eid=$count";
	  ?>
	  
	  
	  <td align="center"><?php if($user=='929'){echo"<a ' href='$url4'><strong>Admission Request</strong></a>";} else {echo '';}?></td>


</tr>
<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	
	  				
</tr>

</body>

</html>
