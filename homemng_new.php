<?php 

    session_start();
	
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
	
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2?err=2');
	  
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=$url1");
//$tt=$_SERVER['HTTP_HOST']	;
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php

$query_staff = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result_staff = mysqli_query($con, $query_staff) or die(mysqli_error());

// Print out result
$row_staff = mysqli_fetch_array($result_staff);
$full_l = $row_staff['sid1'];




$adate=date('Y-m-d');
$full = $row39['fullname'];

$phar1 = "SELECT COUNT(id) FROM medicineedit where status='Waiting For CEO Approval'";
$phar11 = mysqli_query($con, $phar1) or die(mysqli_error());
$phar111 = mysqli_fetch_array($phar11);
$phar_ceo=$phar111['COUNT(id)'];

$phar1_cfo = "SELECT COUNT(id) FROM medicineedit where status='Waiting For CFO Approval'";
$phar11_cfo = mysqli_query($con, $phar1_cfo) or die(mysqli_error());
$phar111_cfo = mysqli_fetch_array($phar11_cfo);
$phar_cfo=$phar111_cfo['COUNT(id)'];

$phar1_md = "SELECT COUNT(id) FROM medicineedit where status='Waiting For MD Approval'";
$phar11_md = mysqli_query($con, $phar1_md) or die(mysqli_error());
$phar111_md = mysqli_fetch_array($phar11_md);
$phar_md=$phar111_md['COUNT(id)'];


$death_n = "SELECT COUNT(id) FROM deathn where new_issue='new'";
$death_n1 = mysqli_query($con, $death_n) or die(mysqli_error());
$death_n11 = mysqli_fetch_array($death_n1);
$death_n_r=$death_n11['COUNT(id)'];



$query22 = "SELECT COUNT(lseen) FROM conleavedetails where md='$full' and status='Approved By Replacement Consultant' and lseen='RSEEN'"; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$query21 = "SELECT COUNT(lseen) FROM conleavedetails where ceo='$full' and status='Approved By MD' and lseen='MDSEEN'"; 
$result21 = mysqli_query($con, $query21) or die(mysqli_error());
$row21 = mysqli_fetch_array($result21);



$query23 = "SELECT COUNT(apstatus) FROM preadm where apstatus='Forwarded For CEO Approval' and ddrequest='Pending'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);
$c1=$row23['COUNT(apstatus)'];

$query24 = "SELECT COUNT(apstatus) FROM endopapp where apstatus='Forwarded For CEO Approval' and ddrequest='Pending'"; 
$result24 = mysqli_query($con, $query24) or die(mysqli_error());
$row24 = mysqli_fetch_array($result24);
$c2=$row24['COUNT(apstatus)'];



$query25 = "SELECT COUNT(apstatus) FROM preadm where apstatus='Forwarded For MD Approval' and ddrequest='Pending'"; 
$result25 = mysqli_query($con, $query25) or die(mysqli_error());
$row25 = mysqli_fetch_array($result25);
$c3=$row25['COUNT(apstatus)'];

$query26 = "SELECT COUNT(apstatus) FROM endopapp where apstatus='Forwarded For MD Approval' and ddrequest='Pending'"; 
$result26 = mysqli_query($con, $query26) or die(mysqli_error());
$row26 = mysqli_fetch_array($result26);
$c4=$row26['COUNT(apstatus)'];



$query27 = "SELECT COUNT(apstatus) FROM preadm where apstatus='Forwarded For CFO Approval'and ddrequest='Pending'"; 
$result27 = mysqli_query($con, $query27) or die(mysqli_error());
$row27 = mysqli_fetch_array($result27);
$c5=$row27['COUNT(apstatus)'];

$query28 = "SELECT COUNT(apstatus) FROM endopapp where apstatus='Forwarded For CFO Approval'and ddrequest='Pending'"; 
$result28 = mysqli_query($con, $query28) or die(mysqli_error());
$row28 = mysqli_fetch_array($result28);
$c6=$row28['COUNT(apstatus)'];

$query59 = "SELECT * FROM attendance where sid= '$fullname' and adate='$adate'"; 
$result59 = mysqli_query($con, $query59) or die(mysqli_error());

// Print out result
$row59 = mysqli_fetch_array($result59);
$etime=$row59['etime'];

$server=$_SERVER['REMOTE_ADDR'];

$queryb = "SELECT COUNT(sid) FROM attendance where adate='$adate' and sid='$fullname'"; 
$resultb = mysqli_query($con, $queryb) or die(mysqli_error());
$rowb = mysqli_fetch_array($resultb);
$c11=$rowb['COUNT(sid)'];


$queryin = "SELECT COUNT(id) FROM incident1 where status='Forwarded'"; 
$resultin = mysqli_query($con, $queryin) or die(mysqli_error());
$rowin = mysqli_fetch_array($resultin);
$cin=$rowin['COUNT(id)'];


$queryit = "SELECT COUNT(id) FROM ticket_tickets where status in('In Progress','Open')"; 
$resultit = mysqli_query($con, $queryit) or die(mysqli_error());
$rowit = mysqli_fetch_array($resultit);
$cit=$rowit['COUNT(id)'];


$query_s = "SELECT COUNT(id) FROM dleave where hstatus='Approval Pending' and hos in('$full_l') and recomby=''";
$result_s = mysqli_query($con, $query_s) or die(mysqli_error());
$row_s = mysqli_fetch_array($result_s);
$s_l=$row_s['COUNT(id)'];


$query_inves = "SELECT COUNT(id) FROM edit_inves where status='Waiting For CEO Approval'";
$result_inves = mysqli_query($con, $query_inves) or die(mysqli_error());
$row_inves = mysqli_fetch_array($result_inves);
$s_inves=$row_inves['COUNT(id)'];

$query_inves_a = "SELECT COUNT(id) FROM radio where status='Waiting For CEO Approval'";
$result_inves_a = mysqli_query($con, $query_inves_a) or die(mysqli_error());
$row_inves_a = mysqli_fetch_array($result_inves_a);
$s_inves_a=$row_inves_a['COUNT(id)'];

$ss_ceo=$s_inves_a+$s_inves;



$query_inves1 = "SELECT COUNT(id) FROM edit_inves where status='Waiting For CFO Approval'";
$result_inves1 = mysqli_query($con, $query_inves1) or die(mysqli_error());
$row_inves1 = mysqli_fetch_array($result_inves1);
$s_inves1=$row_inves1['COUNT(id)'];

$query_inves_a1 = "SELECT COUNT(id) FROM radio where status='Waiting For CFO Approval'";
$result_inves_a1 = mysqli_query($con, $query_inves_a1) or die(mysqli_error());
$row_inves_a1 = mysqli_fetch_array($result_inves_a1);
$s_inves_a1=$row_inves_a1['COUNT(id)'];

$ss_cfo=$s_inves_a1+$s_inves1;


$query_inves2 = "SELECT COUNT(id) FROM edit_inves where status='Waiting For MD Approval'";
$result_inves2 = mysqli_query($con, $query_inves2) or die(mysqli_error());
$row_inves2 = mysqli_fetch_array($result_inves2);
$s_inves2=$row_inves2['COUNT(id)'];

$query_inves_a2 = "SELECT COUNT(id) FROM radio where status='Waiting For MD Approval'";
$result_inves_a2 = mysqli_query($con, $query_inves_a2) or die(mysqli_error());
$row_inves_a2 = mysqli_fetch_array($result_inves_a2);
$s_inves_a2=$row_inves_a2['COUNT(id)'];

$ss_md=$s_inves_a2+$s_inves2;



$query_inves_asset = "SELECT COUNT(id) FROM storenew where estatus='Waiting For CEO Approval'";
$result_inves_asset = mysqli_query($con, $query_inves_asset) or die(mysqli_error());
$row_inves_asset = mysqli_fetch_array($result_inves_asset);
$s_inves_asset=$row_inves_asset['COUNT(id)'];

$query_inves_asset1 = "SELECT COUNT(id) FROM storenew_edit where estatus='Waiting For CEO Approval'";
$result_inves_asset1 = mysqli_query($con, $query_inves_asset1) or die(mysqli_error());
$row_inves_asset1 = mysqli_fetch_array($result_inves_asset1);
$s_inves_asset1=$row_inves_asset1['COUNT(id)'];

$asset_ceo=$s_inves_asset+$s_inves_asset1;
$ceo_new=$ss_ceo+$asset_ceo+$phar_ceo;

$query_inves_asset_cfo = "SELECT COUNT(id) FROM storenew where estatus='Waiting For CFO Approval'";
$result_inves_asset_cfo = mysqli_query($con, $query_inves_asset_cfo) or die(mysqli_error());
$row_inves_asset_cfo = mysqli_fetch_array($result_inves_asset_cfo);
$s_inves_asset_cfo=$row_inves_asset_cfo['COUNT(id)'];

$query_inves_asset1_cfo = "SELECT COUNT(id) FROM storenew_edit where estatus='Waiting For CFO Approval'";
$result_inves_asset1_cfo = mysqli_query($con, $query_inves_asset1_cfo) or die(mysqli_error());
$row_inves_asset1_cfo = mysqli_fetch_array($result_inves_asset1_cfo);
$s_inves_asset1_cfo=$row_inves_asset1_cfo['COUNT(id)'];

$asset_cfo=$s_inves_asset_cfo+$s_inves_asset1_cfo;
$cfo_new=$ss_cfo+$asset_cfo+$phar_cfo;



$query_inves_asset_md = "SELECT COUNT(id) FROM storenew where estatus='Waiting For MD Approval'";
$result_inves_asset_md = mysqli_query($con, $query_inves_asset_md) or die(mysqli_error());
$row_inves_asset_md = mysqli_fetch_array($result_inves_asset_md);
$s_inves_asset_md=$row_inves_asset_md['COUNT(id)'];

$query_inves_asset1_md = "SELECT COUNT(id) FROM storenew_edit where estatus='Waiting For CFO Approval'";
$result_inves_asset1_md = mysqli_query($con, $query_inves_asset1_md) or die(mysqli_error());
$row_inves_asset1_md = mysqli_fetch_array($result_inves_asset1_md);
$s_inves_asset1_md=$row_inves_asset1_md['COUNT(id)'];

$asset_md=$s_inves_asset_md+$s_inves_asset1_md;

$md_new=$ss_md+$asset_md+$phar_md;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">






:root {
	--white: #ffffff;
	--light: #f0eff3;
	--black: #000000;
	--dark-blue: #1f2029;
	--dark-light: #353746;
	--red: #da2c4d;
	--yellow: #f8ab37;
	--grey: #ecedf3;
}

/* #Primary
================================================== */

body{
	width: 100%;
	background: var(--dark-blue);
	overflow-x: hidden;
    font-family: 'Poppins', sans-serif;
	font-size: 17px;
	line-height: 30px;
	-webkit-transition: all 300ms linear;
	transition: all 300ms linear; 
}
p{
    font-family: 'Poppins', sans-serif;
	font-size: 17px;
	line-height: 30px;
	color: var(--white);
	letter-spacing: 1px;
	font-weight: 500;
	-webkit-transition: all 300ms linear;
	transition: all 300ms linear; 
}
::selection {
	color: var(--white);
	background-color: var(--black);
}
::-moz-selection {
	color: var(--white);
	background-color: var(--black);
}
mark{
	color: var(--white);
	background-color: var(--black);
}
.section {
    position: relative;
	width: 100%;
	display: block;
	text-align: center;
	margin: 0 auto;
}
.over-hide {
    overflow: hidden;
}
.z-bigger {
    z-index: 100 !important;
}


.background-color{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: var(--dark-blue);
	z-index: 1;
	-webkit-transition: all 300ms linear;
	transition: all 300ms linear; 
}
.checkbox:checked ~ .background-color{
	background-color: var(--white);
}


[type="checkbox"]:checked,
[type="checkbox"]:not(:checked),
[type="radio"]:checked,
[type="radio"]:not(:checked){
	position: absolute;
	left: -9999px;
	width: 0;
	height: 0;
	visibility: hidden;
}

.checkbox:checked + label:before,
.checkbox:not(:checked) + label:before {
	position: absolute;
	font-family: 'unicons';
	cursor: pointer;
	top: -17px;
	z-index: 2;
	font-size: 20px;
	line-height: 40px;
	text-align: center;
	width: 40px;
	height: 40px;
	border-radius: 50%;
	-webkit-transition: all 300ms linear;
	transition: all 300ms linear; 
}
.checkbox:not(:checked) + label:before {
	content: '\eac1';
	left: 0;
	color: var(--grey);
	background-color: var(--dark-light);
	box-shadow: 0 4px 4px rgba(0,0,0,0.15), 0 0 0 1px rgba(26,53,71,0.07);
}
.checkbox:checked + label:before {
	content: '\eb8f';
	left: 30px;
	color: var(--yellow);
	background-color: var(--dark-blue);
	box-shadow: 0 4px 4px rgba(26,53,71,0.25), 0 0 0 1px rgba(26,53,71,0.07);
}

.checkbox:checked ~ .section .container .row .col-12 p{
	color: var(--dark-blue);
}






.link-to-page {
	position: fixed;
    top: 30px;
    right: 30px;
    z-index: 20000;
    cursor: pointer;
    width: 50px;
}
.link-to-page img{
	width: 100%;
	height: auto;
	display: block;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Proceed ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Proceed ?");
}

</script>

<script type="text/javascript">
function confirm_click3()
{
return confirm("Are you Sure to Proceed ?");
}

</script>


<script type="text/javascript">
function confirm_click4()
{
return confirm("Are you Sure to Proceed ?");
}

</script>

<script type="text/javascript">
function confirm_click5()
{
return confirm("Are you Sure to Proceed ?");
}

</script>

<script type="text/javascript">
function confirm_click6()
{
return confirm("Are you Sure to Proceed ?");
}

</script>





</head>


<body>






<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
		 <li class='has-sub'><a href='pedit1_mng'><span>Update Patient Record</span></a>
            
         </li>
		 <li class='has-sub'><a href='manualesearchdd'><span>Old Doridro Fund Request</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
	   <li class='has-sub'><a href='billappmng'><span>Appointment Report</span></a>
            
         </li>
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
		<li class='has-sub'><a href='view3newrad'><span>Radiology Report</span></a>
            
         </li>
		 
		 <li class='has-sub'><a href='pack_stat'><span>Diabetics Day Stats Report</span></a>
            
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href='pendingrequest1mng'><span>Pending List For Approval</span></a></li>
 
 
 <li class='active has-sub'><a href='#'><span>Admission Request</span></a>
      <ul>
	   <li class='last'><a href='adrequestmng'><span>Approved Admission Request</span></a></li>
	   <li class='last'><a href='ebilladm3'><span>Pending Staff Admission Request</span></a></li>
	   <li class='last'><a href='admissionstat1'><span>Admission Stats</span></a></li>
            
         
      </ul>
   </li>
   
   <li class='active has-sub'><a href='#'><span>Privilege Request</span></a>
      <ul>
	   <li class='last'><a href='mmaapprove'><span>Pending Privilege List For Approval</span></a></li>
	   <li class='last'><a href='deptpri'><span>Discipline Wise Approved Privilege</span></a></li>
	   <li class='last'><a href='deptpric'><span>Consultant Wise Approved Privilege</span></a></li>
	   <li class='last'><a href='deptprip'><span>Procedure Wise Approved Privilege</span></a></li>
	   
            
         
      </ul>
   </li>
   
   <li class='active has-sub'><a href='#'><span>BED MANAGEMENT</span></a>
      <ul>
	   <li class='last'><a href='bedviewbill_bill'><span>Old Format</span></a></li>
	   <li class='last'><a href='bed_mng_test5'><span>New Format (Under Construction)</span></a></li>
	   <li class='last'><a href='add_new_bed'><span>Add New Bed</span></a></li>
	   
            
         
      </ul>
   </li>
   
   <li class='last'><a href='video\video'><span>Hospital Video</span></a></li>
   <li class='last'><a href='opd_doc_schedule'><span>New OPD Appointment System</span></a></li>
   <li class='last'><a href='mngpassword'><span>Change Password</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr>
<td colspan="20"align="right"bgcolor="lightblue">
<a target='_blank' href="hinfo111"><img src="hinfo.jpg" title="Hospital Information" width="50" height="30" /></a>
<a target='_blank' href="task_index"><img src="to_do.jpg" title="ADD YOUR TO-DO-LIST" width="50" height="30" /></a>
</tr>
		
<tr><td colspan="19"align="center"bgcolor="lightblue"class="style1" border="0">Welcome!! <?php echo $row39['fullname']; ?></td>

</tr>

<tr><td colspan="20"align="center"bgcolor="lightgreen"><img  src="staff_pic/<?php echo $row_staff['pic'] ?>" width="100"  height="100" align="center"></td>

</tr>
<input class="checkbox" type="checkbox" name="general" id="general">
		<label class="for-checkbox" for="general"></label>
		<div class="background-color"></div>	  


<tr><td align="center" colspan="10" bgcolor="lightblue">





<?php
		
		$sid=$fullname;
		
		$url = "aattn?sid=$sid"; 
		$url3 = "aattn3?sid=$sid"; 
		$url4 = "aattn4?sid=$sid";
		$url5 = "aattn5?sid=$sid";		
		$url6 = "aattn6?sid=$sid";
	if($c11==0)
	{ 
echo "<a onclick='return confirm_click();' href='$url'><img src='happy.jpg' title='Happy' width='130' height='90' /></a>
<a onclick='return confirm_click3();' href='$url3'><img src='sad.jpg' title='Sad' width='130' height='90' /></a>
<a onclick='return confirm_click4();' href='$url4'><img src='tired.jpg' title='Tired' width='130' height='90' /></a>
<a onclick='return confirm_click5();' href='$url5'><img src='angry.jpg' title='Angry' width='130' height='90' /></a>
<a onclick='return confirm_click6();' href='$url6'><img src='anxious.jpg' title='Anxious' width='130' height='90' /></a>";

	}
	
	else 
	{ 
echo "<h3>Day Started</h3>";
	}
	
	
	?>
	
	
		


</td>

<td align="center" colspan="10" bgcolor="lightblue">





<?php
		
		$sid=$fullname;
		
		$url = "attn1?sid=$sid"; 
	if($c11>0 && $etime =='')
	{ 
echo "<a onclick='return confirm_click();' href='$url'><h3>End Your Day</h3></a>";
	}
	
	else if($c11>0 && $etime !=='')
	{ 
echo "<h3>Day Ended</h3>";
	}
	else
	{ 
echo "<h3>Day Not Started Yet</h3>";
	}
	
	
	?>
	
	
		


</td>











</tr>


</table>

<?php if($c11>0){
	echo'
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module</h3></td></tr>
<tr>
	<td colspan="5"align="center"><a href="opdstatmng"><font size="4.5">OPD Stat</a></td>
		<td colspan="5" align="center"><a href="ipdstatmng"><font size="4.5">IPD Stat</a></td>
		<td colspan="3" align="center"><a href="otstatmng"><font size="4.5">	OT STAT</a></td>
		<td colspan="3" align="center"><a href="phomemng"><font size="4.5">	Pharmacy</a></td>
		<td colspan="2" align="center"><a href="labhomemng"><font size="4.5">LAB</a></td>
		<td colspan="2"align="center"><a href="edischarge3mng"><font size="4.5">	Pending Discharge Request List</a></td>

		
	  
</tr>
<tr>
	<td colspan="5"align="center"><a href="topdmng"><font size="4.5">	Todays OPD</a></td>
		<td colspan="5" align="center"><a href="mngview"><font size="4.5">Todays IPD</a></td>
		<td colspan="3" align="center"><a href="enereport44mng"><font size="4.5">	Datewise Emergency Discharge</a></td>
		<td colspan="3" align="center"><a href="all_endo_mng"><font size="4.5">Endoscopy Suite</a></td>
		<td colspan="2" align="center"><a href="allhistoreportmng"><font size="4.5">	Histopathology Stat</a></td>
		<td colspan="2" align="center"><a href="categoryinvesmng"><font size="4.5">Categorywise Investigation Search</a></td>
		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="edocviewmng"><font size="4.5">	Emergency</a></td>
		<td colspan="5" align="center"><a href="history11mng"><font size="4.5">Patients History</a></td>
		<td colspan="3" align="center"><a href="referphysio"><font size="4.5">	Physio Referral Request</a></td>
		
		<td colspan="3" align="center"><a href="mrdhis"><font size="4.5">	FOR MRD</a></td>
		<td colspan="2" align="center"><a href="opdcensus"><font size="4.5">	PMS STATS</a></td>
		<td colspan="2" align="center"><a href="spdreceivedmng"><font size="4.5">SPD Request Stats</a></td>
		
		
	  
</tr>



<tr>
	
	<td colspan="5"align="center"><a href="incidentviewmng"><font size="4.5">Incident Request</a>
	
	<font size="4.5" color="#FF0000"><b>(
	'.$cin.')<b>
	
	</td>
	<td colspan="5"align="center"><a href="deathhomemng"><font size="4.5">Death Certificate	</a>
	
	<font size="4.5" color="#FF0000"><b>(
	'.$death_n_r.')<b>
	
	</td>
	<td colspan="3"align="center"><a href="birthconfirmmng"><font size="4.5">	Pending Birth Certificate Edit Request</a></td>
	<td colspan="3"align="center"><a href="leavemng"><font size="4.5">	Todays Leave Status</a></td>
	<td colspan="2"align="center"><a href="mceditmng"><font size="4.5">	Todays Issued Medical Certificate</a></td>
	
	<td colspan="2"align="center"><a href="mmahome"><font size="4.5">	MMA CODE</a></td>	
		
		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="admviewmng"><font size="4.5">	Staff Admission List</a></td>
	
	<td colspan="5"align="center"><a href="staffdetailsmng"><font size="4.5">	STAFF INFORMATION</a>
	
	<font size="4.5" color="#FF0000"><b>(
	'.$s_l.')<b>
	</td>
	
	
	
	
	<td colspan="3"align="center"><a href="cmeportal"><font size="4.5">Training & Education Records Portal</a></td>
		
		
	<td colspan="3"align="center"><a href="ghousemng"><font size="4.5">	Guest House</a></td>	
	  <td colspan="2"align="center"><a href="biohomemng"><font size="4.5">Asset List</a></td>	
	  <td colspan="2"align="center"><a href="addtopicmd"><font size="4.5">Add Topic</a></td>
</tr>


<tr>
	<td colspan="5"align="center"><a href="assstatmng"><font size="4.5">IPD Diet Assessment Stats</a></td>	
	<td colspan="5"align="center"><a href="ccomm2"><font size="4.5">Clinical Committee</a></td>
	<td colspan="3"align="center"><a href="procedurestat"><font size="4.5">OPD Procedure Stats</a></td>
	<td colspan="3"align="center"><a href="staffdetailsmng1"><font size="4.5">Covid Situation</a></td>	
	<td colspan="2"align="center"><a href="feedmng"><font size="4.5">Customer Care Feedback</a></td>
	<td colspan="2"align="center"><a href="agestatsmng"><font size="4.5">Age & Gender Wise Patients Stat (For DG Heallth)</a></td>	
	  
</tr>

<tr>
<td colspan="5"align="center"><a href="hinfo111"><font size="4.5">Hospital Information</a></td>	
<td colspan="5"align="center"><a href="radiomng"><font size="4.5">Radiology</a></td>	

';}
    
else{
	
	echo '<h3 align="center" style=”color: red; font-weight: bold;">How Are You Feeling Today !!! Set Your Todays Mood By Clicking Any Of the Above Emoji And Proceed...</h3>';
}
?>
<?php 


if($full==='Mohd Taufik Bin Ismail' && $c11>0)
{$st=$row23['COUNT(apstatus)'] + $row24['COUNT(apstatus)'];
	
echo '
<td colspan="3"align="center"><a href="ddhome"><font size="4.5">Doridro Fund</a> 
	
	<font size="4.5" color="#FF0000"><b>(
	'.$st.')<b>
	
	
	</td>


';}


if($full==='Dr. Razeeb Hassan' && $c11>0)
{$st=$row25['COUNT(apstatus)'] + $row26['COUNT(apstatus)'];
	
echo '
<td colspan="3"align="center"><a href="ddhome"><font size="4.5">Doridro Fund</a> 
	
	<font size="4.5" color="#FF0000"><b>(
	'.$st.')<b>
	
	
	</td>


';}


else if($full==='Nuradilah Shuib' && $c11>0)
{$st=$row27['COUNT(apstatus)'] + $row28['COUNT(apstatus)'];
	
echo ' 
<td colspan="3"align="center"><a href="ddhome"><font size="4.5">Doridro Fund</a> 
	
	<font size="4.5" color="#FF0000"><b>(
	'.$st.')<b>
	
	
	</td>


';}



?>




<?php 


if($full==='Mohd Taufik Bin Ismail' && $c11>0)
{$st=$row21['COUNT(lseen)'];
	
echo ' 
<td colspan="3"align="center"><a href="leavemngdocmng"><font size="4.5">	LEAVE MANAGEMENT</a>
	
	<font size="4.5" color="#FF0000"><b>(
	'.$st.')<b>
	
	
	</td>
	
	
	
	<td colspan="2"align="center"><a href="hos_log_mng"><font size="4.5">Departmental Log</a></td>
	
	<td colspan="2"align="center"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a>
	<font size="4.5" color="#FF0000"><b>(
	'.$cit.')<b>
	</td></tr>
	  
	  <tr>
	  <td colspan="5"align="center"><a href="srequest33_mng"><font size="4.5">View Meterial Request</a></td>
	  
	  
	  <td colspan="5"align="center"><a href="recruit/evaluation"><font size="4.5">Recruitment</a></td>
	  
	  <td colspan="3"align="center"><a href="hoschargehome"><font size="4.5">	Hospital Charges</a>
	  
	  <font size="4.5" color="#FF0000"><b>(
	'.$ceo_new.')<b>
	  </td>
	  
	  <td colspan="2"align="center"><a href="roaster_home"><font size="4.5">Roster</a></td>
	  <td colspan="2"align="center"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td>
	  <td colspan="2"align="center"><a href="student_portal"><font size="4.5">Student Portal</a></td>
</tr>
	
	
	<tr>
	<td colspan="5"align="center"><a href="tender/vendor"><font size="4.5">Tender Portal</a></td>
	<td colspan="5"align="center"><a href="con_ot_bill_mng"><font size="4.5">Search Previous Procedure Cost</a></td>
	</tr>
	
	
	</table>

';}


if($full==='Dr. Razeeb Hassan' && $c11>0)
{$st=$row22['COUNT(lseen)'];
	
echo ' 
<td colspan="3"align="center"><a href="leavemngdocmng"><font size="4.5">	LEAVE MANAGEMENT</a>
	
	<font size="4.5" color="#FF0000"><b>(
	'.$st.')<b>
	
	
	</td>
	
	<td colspann="2"align="center"><a href="hos_log_mng"><font size="4.5">Departmental Log</a></td>
	
	  <td colspan="2"align="center"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td>
	  
	  <tr>
	  <td colspan="5"align="center"><a href="srequest33_mng"><font size="4.5">View Meterial Request</a></td>
	  
	  
	  <td colspan="5"align="center"><a href="recruit/evaluation"><font size="4.5">Recruitment</a></td>
	  <td colspan="3"align="center"><a href="hoschargehome"><font size="4.5">	Hospital Charges</a>
	  
	  <font size="4.5" color="#FF0000"><b>(
	'.$md_new.')<b>
	  </td>
	  
	  <td colspan="2"align="center"><a href="roaster_home"><font size="4.5">Roster</a></td>
	  <td colspan="2"align="center"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td>
	  <td colspan="2"align="center"><a href="student_portal"><font size="4.5">Student Portal</a></td>
</tr>
<tr>
	<td colspan="5"align="center"><a href="tender/vendor"><font size="4.5">Tender Portal</a></td>
	<td colspan="5"align="center"><a href="con_ot_bill_mng"><font size="4.5">Search Previous Procedure Cost</a></td>
	</tr>
	
	
	</table>

';}


if($full==='Nuradilah Shuib' && $c11>0)
{
	
echo ' 
<td colspan="3"align="center"><a href="leavemngdocmng"><font size="4.5">	LEAVE MANAGEMENT</a>
	
	
	
	
	</td>
	
	
	
	<td colspan="2"align="center"><a href="hos_log_mng"><font size="4.5">Departmental Log</a></td>
	
	<td colspan="2"align="center"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td>
	  
	
<tr>

	<td colspan="5"align="center"><a href="srequest33_mng"><font size="4.5">View Meterial Request</a></td>
	  
	
	  <td colspan="5"align="center"><a href="recruit/evaluation"><font size="4.5">Recruitment</a></td>
	  <td colspan="3"align="center"><a href="hoschargehome"><font size="4.5">	Hospital Charges</a>
	  
	  <font size="4.5" color="#FF0000"><b>(
	'.$cfo_new.')<b>
	  </td>
	  
	   <td colspan="2"align="center"><a href="roaster_home"><font size="4.5">Roster</a></td>
	   <td colspan="2"align="center"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td>
	  <td colspan="2"align="center"><a href="student_portal"><font size="4.5">Student Portal</a></td>
</tr>
	
	<tr>
	<td colspan="5"align="center"><a href="tender/vendor"><font size="4.5">Tender Portal</a></td>
	<td colspan="5"align="center"><a href="con_ot_bill_mng"><font size="4.5">Search Previous Procedure Cost</a></td>
	</tr>
	
	
	
	
	</table>

';}



if($full==='Ruzita Mohd Dan' && $c11>0)
{
	
echo ' 
<td colspan="3"align="center"><a href="leavemngdocmng"><font size="4.5">	LEAVE MANAGEMENT</a>
	
	
	
	
	</td>
	
	
	
	<td colspan="2"align="center"><a href="hos_log_mng"><font size="4.5">Departmental Log</a></td>
	
	
	<td colspan="2"align="center"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td>
	
	
	  <td colspan="5"align="center"><a href="recruit/evaluation"><font size="4.5">Recruitment</a></td>
	  
</tr>
<tr>
<td colspan="5"align="center"><a href="roaster_home"><font size="4.5">Roster</a></td>
	  <td colspan="5"align="center"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td>
	  <td colspan="3"align="center"><a href="student_portal"><font size="4.5">Student Portal</a></td>
	  <td colspan="2"align="center"><a href="tender/vendor"><font size="4.5">Tender Portal</a></td>
	  <td colspan="2"align="center"><a href="con_ot_bill_mng"><font size="4.5">Search Previous Procedure Cost</a></td>
</tr>
	
	
	
	
	</table>

';}

?>

  
  
  
<?php 

$date77=date('Y-m-d');
$date78=date('m/d/Y');

$query43 = "SELECT COUNT(pmrn) FROM presnew where date1 ='$date77';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



$query44 = "SELECT COUNT(pmrn) FROM inpatient where discharge !='Discharged';"; 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);



$query45 = "SELECT COUNT(pmrn) FROM emergency where adate2 ='$date77';"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);


$query46 = "SELECT COUNT(pmrn) FROM ot where date5 ='$date77' and status='Received';"; 
	 
$result46 = mysqli_query($con, $query46) or die(mysqli_error());
$row46 = mysqli_fetch_assoc($result46);


$query47 = "SELECT COUNT(pmrn) FROM endopapp where adate ='$date77' and status in ('Received','SEEN');"; 
	 
$result47 = mysqli_query($con, $query47) or die(mysqli_error());
$row47 = mysqli_fetch_assoc($result47);



$query48 = "SELECT COUNT(id) FROM covidopd where ssent ='$date77' and status ='collected';"; 
	 
$result48 = mysqli_query($con, $query48) or die(mysqli_error());
$row48 = mysqli_fetch_assoc($result48);


echo "<br><br>";

echo "<font color=white font size=5.5><b> TODAY'S HOSPITAL ACTIVITIES AT A GLANCE  - ";

	 
	 
	 

echo "OPD-  ";	 
echo $row43['COUNT(pmrn)'];
echo " , ";	 
echo "IPD-  ";	 
echo $row44['COUNT(pmrn)'];
echo " , ";	 
echo "A&E-  ";	 
echo $row45['COUNT(pmrn)'];
echo " , ";	 
echo "OT-  ";	 
echo $row46['COUNT(pmrn)'];
echo " , ";	 

echo "Endoscopy-  ";	 
echo $row47['COUNT(pmrn)'];
echo " , ";	 


echo "Covid Sample Collection-  ";	 
echo $row48['COUNT(id)'];





?>    

<?php 

if($c11==0)
{
	$txt='Greetings'.' '.$full.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}?>
     

    
   
  </tbody>
</table>
</form>

</body>

</html>
