<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="billin"){
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
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="ipall_new?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Summary</a>
	  
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
