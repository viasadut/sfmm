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
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");
//$tt=$_SERVER['HTTP_HOST']	;

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

$adate=date('Y-m-d');
$full = $row39['fullname'];

$query22 = "SELECT COUNT(lseen) FROM conleavedetails where rdoc='$full' and status='Approval Pending' and lseen='NOT SEEN'"; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$queryc = "SELECT COUNT(status) FROM cme where status='Pending'"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);

$queryb = "SELECT COUNT(sid) FROM attendance where adate='$adate' and sid='$fullname'"; 
$resultb = mysqli_query($con, $queryb) or die(mysqli_error());
$rowb = mysqli_fetch_array($resultb);
$c1=$rowb['COUNT(sid)'];


$query59 = "SELECT * FROM attendance where sid= '$fullname' and adate='$adate'"; 
$result59 = mysqli_query($con, $query59) or die(mysqli_error());

// Print out result
$row59 = mysqli_fetch_array($result59);
$etime=$row59['etime'];

$server=$_SERVER['REMOTE_ADDR'];
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
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnewblock'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iviewblock'><span>In-Patients</span></a>
		 <li class='last'><a href='mngviewmo'><span>IPD</span></a></li>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ccamidoc'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot.php'><span>OT BOOKING</span></a></li>
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
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='active has-sub'><a href='docchangepass'><span>Pending Certificates Request</span></a>
   <ul>
   <li class='has-sub'><a href='deathconfirm'><span>Pending Death Certificate Approval Request</span></a></li>
   <li class='has-sub'><a href='birthconfirm'><span>Pending Birth Certificate Approval Request</span></a></li>
   </ul>
   
   <li class='active has-sub'><a href='#'><span>Generic Name Request</span></a>
      <ul>
	   <li class='has-sub'><a href='requestmedicine'><span>Request Generic Name</span></a>
            
         </li>
		 <li class='has-sub'><a href='pendingrequestdoc'><span>Pending Request List For Generic Name</span></a>
            
         </li>
         <li class='has-sub'><a href='pendingrequest1'><span>Pending List For Approval</span></a>
            
   </ul>
   </li>
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
<tr><td colspan="20" align="right" bgcolor="lightgreen"><a target='_blank' href="http://182.160.124.36/"><b>ACCESS PACS FROM OUTSIDE HOSPITAL<b></a></td></tr>
<tr><td align="center" colspan="10" bgcolor="lightblue">





<?php
		
		$sid=$fullname;
		
		$url = "attn?sid=$sid"; 
		$url3 = "attn3?sid=$sid"; 
		$url4 = "attn4?sid=$sid";
		$url5 = "attn5?sid=$sid";		
		$url6 = "attn6?sid=$sid";
	if($c1==0)
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
	if($c1>0 && $etime =='')
	{ 
echo "<a onclick='return confirm_click();' href='$url'><h3>End Your Day</h3></a>";
	}
	
	else if($c1>0 && $etime !=='')
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

<?php if($c1>0){
	echo'
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module</h3></td></tr>
<tr>
	<td colspan="5"align="center"><a href="viewnew"><font size="4.5">OPD</a></td>
		
			
		<td colspan="5" align="center"><a href="iview"><font size="4.5">IPD</a></td>
		<td colspan="3" align="center"><a href="radiohome"><font size="4.5">	Radiology</a></td>
		<td colspan="3" align="center"><a href="pharhome"><font size="4.5">	Pharmacy</a></td>
		<td colspan="2" align="center"><a href="labome"><font size="4.5">LAB</a></td>
		<td colspan="2" align="center"><a href="otdash"><font size="4.5">	OT</a></td>

		
	  
</tr>

<tr>
	
		<td colspan="5"align="center"><a href="edocview"><font size="4.5">	Emergency</a></td>
		
		<td colspan="5" align="center"><a href="endohome"><font size="4.5">Endoscopy Suite</a></td>
		<td colspan="3" align="center"><a href="opdprodash"><font size="4.5">OPD Procedure Suite</a></td>
		
		<td colspan="3" align="center"><a href="histoappnew"><font size="4.5">	Histopathology Sutie</a></td>
		<td colspan="2"align="center"><a href="chemodochome"><font size="4.5">Oncology Suite</a></td>
	<td colspan="2"align="center"><a href="dialysisdochome"><font size="4.5">Dialysis Suite</a></td>
		
		
	  
</tr>
 <tr>
 <td colspan="5" align="center"><a href="cathdash"><font size="4.5">	Cardiac Suite</a></td>
	<td colspan="5" align="center"><a href="stret"><font size="4.5">Vaccine Center</a></td>
		<td colspan="3" align="center"><a href="history11"><font size="4.5">Patients Previous Records</a></td>
		<td colspan="3" align="center"><a href="medicalcer"><font size="4.5">Medical Certificate</a></td>
			<td colspan="2" align="center"><a href="preanaescheck"><font size="4.5">PAC</a></td>
		<td colspan="2" align="center"><a href="docadm1"><font size="4.5">	Admission Request</a></td>
		
				
		
		
	  
</tr>
 <tr>
	<td colspan="5"align="center"><a href="manualesearchdddoc"><font size="4.5">	Doridro Fund Request</a></td>
			<td colspan="5" align="center"><a href="leavemngdoc"><font size="4.5">Leave Management</a>
			
			
			<font size="4.5" color="#FF0000"><b>(<?php echo  $row22["COUNT(lseen)"]; ?>)<b>
			</td>
			
			<td colspan="3" align="center"><a href="testsedoc?sid=<?php echo $fullname; ?>"><font size="4.5">CME / Training Program Approval</a>
<font size="4.5" color="#FF0000"><b>(
	<?php
	if($fullname==="547")
	{ 
echo  $rowc["COUNT(status)"];
} 

	?>)<b>

</td>	  
<td colspan="3" align="center"><a href="hinfo"><font size="4.5">Hospital Information</a></td>	
<td colspan="2" align="center"><a href="doccom"><font size="4.5">Clinical Committee</a></td>
<td colspan="2" align="center"><a href="prihome"><font size="4.5">Previlege</a></td>
</tr>




<tr>
 <td colspan="5" align="center"><a href="meetingmin"><font size="4.5">Meeting Minutes</a></td>
	
		
		
	  
</tr>
</table>';}
    
else{
	
	echo '<h3 align="center" style=”color: red; font-weight: bold;">How Are You Feeling Today !!! Set Your Todays Mood By Clicking Any Of the Above Emoji And Proceed...</h3>';
}
?>
  
    

    
	  
   
  </tbody>
</table>
</form>

</body>

</html>
