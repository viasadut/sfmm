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
header("Refresh: 5; URL=$url1");


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
$full = $row39['fullname'];

?>

<?php
$full = $row39['fullname'];
$query22 = "SELECT COUNT(lseen) FROM conleavedetails where md='$full' and status='Approved By Replacement Consultant' and lseen='RSEEN'"; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$query21 = "SELECT COUNT(lseen) FROM conleavedetails where ceo='$full' and status='Approved By MD' and lseen='MDSEEN'"; 
$result21 = mysqli_query($con, $query21) or die(mysqli_error());
$row21 = mysqli_fetch_array($result21);



$query23 = "SELECT COUNT(apstatus) FROM preadm where apstatus='Forwarded For CEO Approval'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);
$c1=$row23['COUNT(apstatus)'];

$query24 = "SELECT COUNT(apstatus) FROM endopapp where apstatus='Forwarded For CEO Approval'"; 
$result24 = mysqli_query($con, $query24) or die(mysqli_error());
$row24 = mysqli_fetch_array($result24);
$c2=$row24['COUNT(apstatus)'];



$query25 = "SELECT COUNT(apstatus) FROM preadm where apstatus='Forwarded For MD Approval'"; 
$result25 = mysqli_query($con, $query25) or die(mysqli_error());
$row25 = mysqli_fetch_array($result25);
$c3=$row25['COUNT(apstatus)'];

$query26 = "SELECT COUNT(apstatus) FROM endopapp where apstatus='Forwarded For MD Approval'"; 
$result26 = mysqli_query($con, $query26) or die(mysqli_error());
$row26 = mysqli_fetch_array($result26);
$c4=$row26['COUNT(apstatus)'];



$query27 = "SELECT COUNT(apstatus) FROM preadm where apstatus='Forwarded For CFO Approval'"; 
$result27 = mysqli_query($con, $query27) or die(mysqli_error());
$row27 = mysqli_fetch_array($result27);
$c5=$row27['COUNT(apstatus)'];

$query28 = "SELECT COUNT(apstatus) FROM endopapp where apstatus='Forwarded For CFO Approval'"; 
$result28 = mysqli_query($con, $query28) or die(mysqli_error());
$row28 = mysqli_fetch_array($result28);
$c6=$row28['COUNT(apstatus)'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




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
		 <li class='has-sub'><a href='pedit1'><span>Edit Patient Record</span></a>
            
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
   
   <li class='last'><a href='mngpassword'><span>Change Password</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?>'s DashBoard </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">

 <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module</h3></td></tr>
<tr>
	<td colspan="5"align="center"><a href="opdmng"><font size="4.5">OPD Stat</a></td>
		<td colspan="5" align="center"><a href="ipdstatmng"><font size="4.5">IPD Stat</a></td>
		<td colspan="3" align="center"><a href="otstatmng"><font size="4.5">	OT STAT</a></td>
		<td colspan="3" align="center"><a href="phomemng"><font size="4.5">	Pharmacy</a></td>
		<td colspan="2" align="center"><a href="labhomemng"><font size="4.5">LAB</a></td>
		<td colspan="2"align="center"><a href="edischarge3mng"><font size="4.5">	Pending Discharge Request List</a></td>

		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="topdmng"><font size="4.5">	Today's OPD</a></td>
		<td colspan="5" align="center"><a href="mngview"><font size="4.5">Today's IPD</a></td>
		<td colspan="3" align="center"><a href="enereport44mng"><font size="4.5">	Datewise Emergency Discharge</a></td>
		<td colspan="3" align="center"><a href="endocensusmng"><font size="4.5">Endoscopy Suite Stats</a></td>
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
	<td colspan="5"align="center"><a href="ddhome"><font size="4.5">Doridro Fund</a> 
	
	<font size="4.5" color="#FF0000"><b>(
	<?php
	if($full==='Dr. Razeeb Hassan')
	{ 
echo  $row25['COUNT(apstatus)'] + $row26['COUNT(apstatus)'];
} 
else if
($full==='Mohd Taufik Bin Ismail')
	{ 
	echo  $row23['COUNT(apstatus)'] + $row24['COUNT(apstatus)'];}
	
	else if
($full==='Nuradilah Shuib')
	{ 
	echo  $row27['COUNT(apstatus)'] + $row28['COUNT(apstatus)'];}
	
	?>)<b>
	
	
	</td>
	<td colspan="5"align="center"><a href="incidentview"><font size="4.5">	Pending Incidnet Request</a></td>
	<td colspan="3"align="center"><a href="deathhomemng"><font size="4.5">Death Certificate	</a></td>
	<td colspan="3"align="center"><a href="birthconfirmmng"><font size="4.5">	Pending Birth Certificate Edit Request</a></td>
	<td colspan="2"align="center"><a href="leavemng"><font size="4.5">	Todays Leave Status</a></td>
	<td colspan="2"align="center"><a href="mceditmng"><font size="4.5">	Todays Issued Medical Certificate</a></td>
		
		
		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="admviewmng"><font size="4.5">	Staff Admission List</a></td>
	<td colspan="5"align="center"><a href="ghousemng"><font size="4.5">	Guest House</a></td>
	<td colspan="3"align="center"><a href="mmahome"><font size="4.5">	MMA CODE</a></td>
	<td colspan="3"align="center"><a href="staffdetailsmng"><font size="4.5">	STAFF INFORMATION</a></td>
	<td colspan="2"align="center"><a href="leavemngdocmng"><font size="4.5">	LEAVE MANAGEMENT</a>
	<font size="4.5" color="#FF0000"><b>(
	<?php
	if($full==='Dr. Razeeb Hassan')
	{ 
echo  $row22['COUNT(lseen)'];
} 
else if
($full==='Mohd Taufik Bin Ismail')
	{ 
	echo  $row21['COUNT(lseen)'];}
	
	?>)<b>
	
	
	</td>
	<td colspan="2"align="center"><a href="hoschargehome"><font size="4.5">	Hospital Charges</a></td>
		
		
		
	  
</tr>


<tr>
	<td colspan="5"align="center"><a href="addtopicmd"><font size="4.5">Add Topic</a></td>
	<td colspan="5"align="center"><a href="eapprove"><font size="4.5">Pending New Material Request</a></td>
	<td colspan="3"align="center"><a href="cmeportal"><font size="4.5">Training & Education Records Portal</a></td>
	<td colspan="3"align="center"><a href="feedmng"><font size="4.5">Customer Care Feedback</a></td>
	<td colspan="2"align="center"><a href="agestatsmng"><font size="4.5">Age & Gender Wise Patient's Stat (For DG Heallth)</a></td>
	<td colspan="3"align="center"><a href="assstatmng"><font size="4.5">IPD Diet Assessment Stats</a></td>	
		
		
	  
</tr>


<tr>
	<td colspan="5"align="center"><a href="ccomm2"><font size="4.5">Clinical Committee</a></td>
	<td colspan="5"align="center"><a href="procedurestat"><font size="4.5">OPD Procedure Stats</a></td>
	<td colspan="3"align="center"><a href="staffdetailsmng1"><font size="4.5">Covid Situation</a></td>
	<td colspan="3"align="center"><a href="feedmng"><font size="4.5"></a></td>
	<td colspan="2"align="center"><a href="agestatsmng"><font size="4.5"></a></td>
	<td colspan="3"align="center"><a href="assstatmng"><font size="4.5"></a></td>	
		
		
	  
</tr>

</table>
    


  
    

<?php 

$date77=date('Y-m-d');
$date78=date('m/d/Y');

$query43 = "SELECT COUNT(pmrn) FROM pappnew where adate ='$date78' and `bill`='Billed' and status ='SEEN';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



$query44 = "SELECT COUNT(pmrn) FROM inpatient where discharge !='Discharged';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);



$query45 = "SELECT COUNT(pmrn) FROM emergency where adate1 ='$date78';"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);


$query46 = "SELECT COUNT(pmrn) FROM ot where date5 ='$date77' and status='Received';"; 
	 
$result46 = mysqli_query($con, $query46) or die(mysqli_error());
$row46 = mysqli_fetch_assoc($result46);


$query47 = "SELECT COUNT(pmrn) FROM endopapp where adate ='$date77' and status in ('Received','SEEN');"; 
	 
$result47 = mysqli_query($con, $query47) or die(mysqli_error());
$row47 = mysqli_fetch_assoc($result47);

echo "<br><br>";

echo "<font color=white font size=5.5><b> TODAY'S HOSPITAL ACTIVITIES AT A GLANCE  - ";

	 
	 
	 
echo "<font color=white font size=5.5><b>";
echo "OPD-  ";	 
echo "<font color=white font size=6><b>";
echo $row43['COUNT(pmrn)'];
echo "<font color=white font size=5.5><b>";
echo " , ";	 
echo "IPD-  ";	 
echo "<font color=white font size=6><b>";
echo $row44['COUNT(pmrn)'];
echo "<font color=white font size=5.5><b>";
echo " , ";	 
echo "A&E-  ";	 
echo "<font color=white font size=6><b>";
echo $row45['COUNT(pmrn)'];
echo "<font color=white font size=5.5><b>";
echo " , ";	 
echo "OT-  ";	 
echo "<font color=white font size=6><b>";
echo $row46['COUNT(pmrn)'];
echo "<font color=white font size=5.5><b>";
echo " , ";	 

echo "Endoscopy-  ";	 
echo "<font color=white font size=6><b>";
echo $row47['COUNT(pmrn)'];






?>    

   
  </tbody>
</table>
</form>

</body>

</html>
