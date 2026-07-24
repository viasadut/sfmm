<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$ad='b';
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
 
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

   <script src="script.js"></script>




</head>


<body>






<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   
   
   
   
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN Emergency Admission</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient Emergency Admission</span></a>         </li>
		 <li class='has-sub'><a href='register'><span>Register New Patient</span></a>         </li>
        <li class='has-sub'><a href='eadminnew_manual_api'><span>Manual Push New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   
   
   
   
    <li class='last'><a href='manualesearch'><span>Manual Admission With MRN</span></a></li>
	<li class='last'><a href='eadminnew'><span>New Manual Admission</span></a></li>
	
	<li class='last'><a href='manualprintadm'><span>Admission Form Print</span></a></li>
	<li class='active has-sub'><a href='#'><span>Admission Request</span></a>
      <ul>
         <li class='last'><a href='ebilladm1'><span>Approved Admission Request</span></a></li>
         <li class='last'><a href='ebilladm2'><span>Pending Staff Admission Request</span></a></li>
		 
      </ul>
   </li>
   
	<li class='last'><a href='billot'><span>TODAY'S OT LIST</span></a></li>
	<li class='last'><a href='insummary'><span>Inpatient</span></a></li>
	<li class='last'><a href='inemergency'><span>Emergency</span></a></li>
   <!--<li class='last'><a href='insummary_api'><span>Manual Push Admission To H360</span></a></li> -->
   <!--<li class='last'><a href='insummary_api1'><span>Manual Push Charges To H360</span></a></li>-->
   
   <li class='active has-sub'><a href='#'><span>Guest House</span></a>
      <ul>
         <li class='has-sub'><a href='gdetails'><span>Guest House Room Booking</span></a>         </li>
         <li class='has-sub'><a href='ghousedis'><span>View Current Guest List</span></a>         </li>
		 <li class='has-sub'><a href='gstat'><span>Datewise Stats</span></a>         </li>
		 <li class='has-sub'><a href='g_house_bed'><span>Guest House Room Management</span></a></li>
		 
      </ul>
   </li>
   
   <li class='last'><a href="hinfo111">Hospital Information</a></li>
   <li class='active has-sub'><a href='#'><span>Bed</span></a>
      <ul>
         <li class='has-sub'><a href='bedviewbill'><span>Bed Status</span></a>         </li>
         <li class='has-sub'><a href='bed_mng_test5'><span>Bed Management</span></a>         </li>
		 
      </ul>
   </li>
   
   <li class='active has-sub'><a href='#'><span>RFID RECEIVE PANEL</span></a>
      <ul>
         
         <li class='has-sub'><a href='rfid/transaction/receive'><span>Receive</span></a>         </li>
		 
      </ul>
   </li>

   <li class='active has-sub'><a href='#'><span>New Patient Registration</span></a>
      <ul>
         <li class='has-sub'><a href='registration_api'><span>Patient Registration With API</span></a>         </li>
         <li class='has-sub'><a href='mrn_manual_push'><span>Manual Push Patient MRN</span></a>         </li>
		   <li class='has-sub'><a href='new_patient_list'><span>View Latest Registered Patient </span></a>         </li>
      </ul>
   </li>

   <li class='active has-sub'><a href='#'><span>Doriddro Fund</span></a>
      <ul>

    	    
      <li class='last'><a href='ddrequestsend'><span>View DD Fund Request From Consultant / MO</span></a></li>
	  <li class='last'><a href='ddrequestsend1'><span>View DD Fund Final Print</span></a></li>
	  <li class='last'><a href='ddfinalprintdate'><span>Datewise ALL Approved DD Fund Print</span></a></li>
	  <li class='last'><a href='ddstats3bill'><span>Stats of Allocation Datewise DD Fund Amount</span></a></li>
	  <li class='last'><a href='ddmanualbill'><span>Manual Request</span></a></li>
	  
      </ul>
	  
   </li>

   <li class='active has-sub'><a href='#'><span>Endoscopy</span></a>
      <ul>
<li class='last'><a href='endobillsummary'><span>Today's Endoscopy Patient List</span></a></li>
    	    <li class='last'><a href='endocensusbill'><span>Endoscopy STATS</span></a></li>
      
      </ul>
	  
   </li>

   <li class='last'><a href='opdbill'><span>OPD PROCEDURE BILL</span></a></li>

   
<li class='has-sub'><a href='collection_report'><span>Collection Report</span></a>         </li>
<li class='last'><a href='leave2'><span>Apply Leave</span></a></li>
<li class='last'><a href='leaveviewindu'><span>View Leave</span></a></li>
   

<li class='last'><a href="ticketv2/dashboard">Hospital Ticketing System</a></li>


<li class='last'><a href="attnstatsindu">Attendance Report</a></li>

<li class='active has-sub'><a href='#'><span>Investigation Bill Comfirm Panel</span></a>
      <ul>

    	   
	  <li class='disabled-li' ><a href='bill_lab_search_new'><span>Search Bill</span></a></li>
	  <li class='disabled-li'><a href='manual_bill'><span>Manual Bill Confirm</span></a></li>
    <li class='last'><a href='manual_bill_package'><span>Package Bill Confirm</span></a></li>
      </ul>
	  
   </li>
<li class='active has-sub'><a href='#'><span>OPD Billing Portal</span></a>
      <ul>
      <li class='has-sub'><a href='new_bill/pre_appointment_list'><span>Pre Appointment List</span></a>         </li>
      <li class='has-sub'><a href='new_bill/old_mrn_app1'><span>Old Patient Consultation Bill</span></a>         </li>
      <li class='has-sub'><a href='new_bill/register_new_app_new'><span>New Patient Consultation Bill</span></a>         </li>
      
      
      
     
      
      <li class='has-sub'><a href='new_bill/opd_inves_search'><span>Search Prescribed Investigation By Consultant</span></a>         </li>
      
      <li class='has-sub'><a href='new_bill/register_new_app_new_inves'><span>New Patient Investigation Bill Portal</span></a>         </li>
      
      <li class='has-sub'><a href='new_bill/manual_bill'><span>Manual Bill Portal</span></a>         </li>
      
      <li class='has-sub'><a href='new_bill/due_payment_against_billno'><span>Due Collection Against Billno</span></a>         </li>
      <li class='has-sub'><a href='new_bill/manual_bill_extra'><span>Other Charges</span></a>         </li>
      <li class='has-sub'><a href='today_pms_bill'><span>Today's Bill</span></a>         </li>
      <li class='has-sub'><a href='new_bill/search_patient_bill'><span>Search Bill By Patient MRN</span></a>         </li>
      <li class='has-sub'><a href='new_bill/new_bill_refund'><span>Bill Refund</span></a>         </li>
      <li class='has-sub'><a href='collection_report'><span>Collection Report</span></a>         </li>
      
      </ul>
   </li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='last'><a href='ward_update_11'><span>Ward Visit</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
   
   
   
   
</ul>


</div>

<p align="center" class="style1">WELCOME TO Inpatient Billing Panel</p> 
<form action="" method="GET">
<p><b>Emergency Discharge Request<b><p>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Docrtor Charge</strong>
	  <th width="14%"><strong>Hospital Charge</strong>
	  
      <th width="14%"><strong>Go</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from emergency where disstatus= 'Discharge Requested' order by adate desc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["pphone"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="billpall?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Details</a>
	  <td align="center"><a href="ebill1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Doctor Charge</a></td>
	  <td align="center"><a href="ebill2?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Hospital Charge</a></td>
	  
	  <td align="center"><a href="edischarge2?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">GO</a></td>


	  
      </tr>
    <?php $count++; } ?>
   </tbody>
</table>
<br><br>
<p><b>Inpatient Discharge Request<b><p>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
	  <th width="15%"><strong>Phone</strong>
      <th width="14%"><strong>Discharge Sent Time</strong>   
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Summary</strong>
      
	  <th width="14%"><strong>Go</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where disstatus= 'Discharge Requested' order by adate desc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["adoc"]; ?>
	  <td align="center"><?php echo $row["pphone"]; ?>
      <td align="center"><?php echo $row["dstatustime"]; ?>  

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="ipall_new_1_new_0_new1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Summary</a>
	  
	  <td align="center"><a href="idischarge2?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">GO</a></td>


	  
      </tr>
    <?php $count++; } ?>
   </tbody>
</table>
</form>
<?php if($ad=='b')
{
	$txt='Greetings'.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}?>
</body>

</html>
