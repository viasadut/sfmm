<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
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


$adate=date('Y-m-d');

$phar1_cfo = "SELECT COUNT(id) FROM covidopd where ssent='$adate' and status='collected' and tp='Foreign_Passenger'";
$phar11_cfo = mysqli_query($con, $phar1_cfo) or die(mysqli_error());
$phar111_cfo = mysqli_fetch_array($phar11_cfo);
$phar_cfo=$phar111_cfo['COUNT(id)'];





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
	   <li class='has-sub'><a href='app1doc'><span>Appointment Report</span></a>
            
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
 
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='last'><a href='bedviewmr'><span>Bed</span></a></li>
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
	<td colspan="5"align="center"><a href="opdmrd"><font size="4.5">OPD Stat</a></td>
		<td colspan="5" align="center"><a href="ipdmrd"><font size="4.5">IPD Stat</a></td>
		<td colspan="3" align="center"><a href="otallmrd"><font size="4.5">	OT STAT</a></td>
		<td colspan="3" align="center"><a href="endocensusmng"><font size="4.5">Endoscopy Suite Stats</a></td>
		<td colspan="2" align="center"><a href="deathmain"><font size="4.5">	Death Certificates</a></td>
		<td colspan="2" align="center"><a href="birthmain"><font size="4.5">Birth Certificates</a></td>

		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="topdmrd"><font size="4.5">	Today's OPD</a></td>
		<td colspan="5" align="center"><a href="mrdview"><font size="4.5">Today's IPD</a></td>
		<td colspan="3" align="center"><a href="enereport44mrd1"><font size="4.5">Emergency Admission & Discharge Report</a></td>
			
		
		<td colspan="3" align="center"><a href="referphysio"><font size="4.5">	Physio Referral Request</a></td>
		
		
		<td colspan="2" align="center"><a href="opdcensus"><font size="4.5">	PMS STATS</a></td>
		<td colspan="2"align="left"><a href="guest_module_home"><font size="5.5" color="red" font-weight="bold">Guest Module</a></td>
	  
</tr>
 <tr>

		<td colspan="5" align="center"><a href="spdreceivedmng"><font size="4.5">SPD Request Stats</a></td>
		
	<td colspan="5"align="center"><a href="mrdhis"><font size="4.5">FOR MRD</a></td>	
	<td colspan="3"align="center"><a href="opdmrd1"><font size="4.5">Datewise Not Seen / History Updated Patients List</a></td>	
	<td colspan="3"align="center"><a href="agestats"><font size="4.5">Agewise Stats</a></td>	
	<td colspan="2"align="center"><a href="agestatstest"><font size="4.5">Agewise Stats1</a></td>	
	<td colspan="2"align="center"><a href="procedurestat"><font size="4.5">OPD Procedure Stats</a></td>	
	  
</tr>


<tr>

		<td colspan="5" align="center"><a href="covidmrd"><font size="4.5">Covid Stats</a></td>
				<td colspan="5" align="center"><a href="mrd_cat_covid"><font size="4.5">Covid Stats(Categorywise)</a></td>
				<td colspan="3" align="center"><a href="endoreport_qc"><font size="4.5">Endoscopy Stats</a></td>
								
								<td colspan="3" align="center"><a href="covidtodaymrd"><font size="4.5">Foreign Passenger</a>
								
								<font size="4.5" color="#FF0000"><b><?php
							
	  {
		  echo '('.$phar_cfo.')';
		  
	  }
								?>
								</td>
		
	  
	  <td colspan="2" align="center"><a href="ipdmng1"><font size="4.5">Discharge Report</a></td>
	  <td colspan="2" align="center"><a href="injury_home"><font size="4.5">Injury Certificate</a></td>
	  
</tr>
<tr>
<td colspan="5"align="center"><a href="consent_patient"><span><font size="5.5" color="green" font-weight="bold">Upload Consent Forms</span></a></td>					
<td colspan="5"align="center"><a href="mrd_other_search"><span><font size="5.5" color="red" font-weight="bold">Upload Other Documents</span></a></td>
<td colspan="2"align="center"><a href="labstatlab_new"><span><font size="5.5" color="red" font-weight="bold">Dengue Stats</span></a></td>					
<td colspan="2"align="center"><a href="ipdmrd_icd"><span><font size="5.5" color="red" font-weight="bold">ICD CODE UPDATE</span></a></td>					
<td colspan="2"align="center"><a href="aemrd"><span><font size="5.5" color="red" font-weight="bold">Consultant wise A&E Stats</span></a></td>					


<td colspan="2" align="center"><a href="ipdmrd_report"><font size="4.5">Doctor Wise OPD & IPD Stats</a></td>
	  <td colspan="2" align="center"><a href="icd_stats"><font size="4.5">Top ICD Cases</a></td>
</tr>
</table>
    


  
    

    
	  <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

</body>

</html>
