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
header("Refresh: 15; URL=$url1");
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



$querymm = "SELECT * FROM ccomm where uid= '$fullname' and cname='Mortality and Morbidity Review Committee (MMRC)'"; 
$resultmm = mysqli_query($con, $querymm) or die(mysqli_error());

// Print out result
$rowmm = mysqli_fetch_array($resultmm);
$uuid=$rowmm['uid'];




$death_n_1 = "SELECT COUNT(id) FROM deathn where new_issue='Send To Mortality Committee' and rdoc='$full'";
$death_n1_1 = mysqli_query($con, $death_n_1) or die(mysqli_error());
$death_n11_1 = mysqli_fetch_array($death_n1_1);
$death_n_r_1=$death_n11_1['COUNT(id)'];


$death_b_1 = "SELECT COUNT(id) FROM deathb where new_issue='Send To Mortality Committee' and rdoc='$full'";
$death_b1_1 = mysqli_query($con, $death_b_1) or die(mysqli_error());
$death_b11_1 = mysqli_fetch_array($death_b1_1);
$death_b_r_1=$death_b11_1['COUNT(id)'];
$total_death_1=$death_n_r_1+$death_b_r_1;

$bell = "select * from doctor where sid='$fullname' and status='Active'";
			$bell_q = mysqli_query($con, $bell);
			$bell_r = mysqli_fetch_array($bell_q);
			$call_record=$bell_r['c_call'];
$new_date=date('Y-m-d');
			
$query_inves = "SELECT COUNT(inves_dname) FROM inves_doc where '$new_date' between `sdate` and `edate` and status='Active' and inves_dname='$fullname'"; 
$result_inves = mysqli_query($con, $query_inves) or die(mysqli_error());
$row_inves = mysqli_fetch_array($result_inves);
$c1_inves=$row_inves['COUNT(inves_dname)'];
			
			
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


img {
  border-radius: 50%;
  
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
return confirm("Are you Sure to Cancel The Call ?");
}

</script>


<script type="text/javascript">
function confirm_click9()
{
return confirm("Are you Sure to Call ?");
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
         <li class='has-sub'><a href='prescription/prescription/view3new'><span>OPD Prescription</span></a>
            
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
		<li class='has-sub'><a href='doc_all_stat'><span>All Stats </span></a>
            
         </li>
      </ul>
   </li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='active has-sub'><a href='docchangepass'><span>Pending Certificates Request</span></a>
   <ul>
   <li class='has-sub'><a href='deathconfirm'><span>Pending Mortality Stats Approval Request</span></a></li>
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
   <li class='last'><a href='bed_mng_test5'><span>Bed Management</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
   
</ul>
</div>
 <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr><td colspan="19"align="center"bgcolor="lightblue"class="style1" border="0">Welcome!! <?php echo $row39['fullname']; ?></td>
<td colspan="1"align="center"bgcolor="lightblue">
<a target='_blank' href="hinfo111"><img src="hinfo.jpg" title="Hospital Information" width="50" height="30" /></a>
<a target='_blank' href="task_index"><img src="to_do.jpg" title="ADD YOUR TO-DO-LIST" width="50" height="30" /></a>

<?php

$url1 = "doc_call_on?dn=$full";   
$url2 = "doc_call_off?dn=$full";   
	 if($call_record==0)
		
		{
			
			echo "
			
			
  
  <a onclick='return confirm_click9();' href='$url1'>
  <img src='audio/green_call.png' title='Active...' width='50'  height='30'></a></td>
  ";
		}  
		
		else if($call_record==1)
		
		{
			
			echo "
			
			<audio autoplay><source src='audio/call.mp3' type='audio/mpeg'></audio>
  
  <a onclick='return confirm_click1();' href='$url2'>
  <img src='audio/red_call.png' title='Calling...' width='50'  height='30'></a></td>
  ";
		}  
	 
?>	 


</td>



</tr>
<tr><td colspan="19"align="center"bgcolor="lightgreen"><img  src="prescription/prescription/doctor/<?php echo $user.'.jpg' ?>" width="100"  height="100" align="center"></td>
<td colspan="1"align="center"bgcolor="lightgreen"><h3><?php echo date('d/m/Y').'<br>'.date('H:i:s')?></h3></td>
</tr>
</table>  

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
	<td colspan="5"align="center"><a href="prescription/prescription/viewnew"><font size="4.5">OPD</a></td>
		
			
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
<td colspan="3" align="center"><a href="hinfo111"><font size="4.5">Hospital Information</a></td>	
<td colspan="2" align="center"><a href="doccom"><font size="4.5">Clinical Committee</a></td>
<td colspan="2" align="center"><a href="prihome"><font size="4.5">Previlege</a></td>

</tr>




<tr>
 <td colspan="5" align="center"><a href="meetingmin"><font size="4.5">Meeting Minutes</a></td>
 <td colspan="5" align="center"><a href="doc_all_stat"><font size="4.5">Datewise Summary Activities Stats</a></td>
<td colspan="3"align="center"><a href="staffincident"><font size="4.5">	Incident Report</a></td>



';}

else{
	
	echo '<h3 align="center" style=”color: red; font-weight: bold;">How Are You Feeling Today !!! Set Your Todays Mood By Clicking Any Of the Above Emoji And Proceed...</h3>';
}
?>
  


<?php if($c1>0 and $uuid!='' and $fullname!=929){
	echo'
	

<td colspan="3" align="center"><a href="mortality_cons"><font size="4.5">Mortality Records</a>

<font size="4.5" color="#FF0000"><b>('.$total_death_1.')<b>


</td>
	
	
	<td colspan="2"align="left"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td>
	<td colspan="2"align="center">
<a href="imset"><font size="4.5">	Make Your Own Medicine & Investigation Set </a>

	</td>




</tr>

 <tr>	
<td colspan="5" align="center"><a href="research_home"><font size="4.5">Research Portal</a></td>
<td colspan="5" align="center"><a href="cme_indu1"><font size="4.5">Education & CME Portal</a></td>

<td colspan="3" align="center"><a href="con_ot_bill"><font size="4.5">Search Previous Procedure Cost</a></td>
<td colspan="3" align="center"><a href="memberview1mng?sid='.$fullname.'"><font size="4.5">Personal Information</a></td>
<td colspan="2" align="center"><a href="adm_request_indu?sid='.$fullname.'"><font size="4.5">Previous Admission Request</a></td>







';}
?>  

<?php if($c1_inves>0){
	echo'


<td colspan="2" align="center"><a href="inves_doc_record"><font size="4.5">Investigator Panel</a></td></table>
';}

?>
  


<?php if($c1>0 and $uuid=='' and $fullname==929){
	echo'
	

<td colspan="3"align="center">
<a href="staffleave"><font size="4.5"> Staff Leave </a>

	</td>
	<td colspan="2"align="center">
<a href="ticketv2/dashboard"><font size="4.5">	Hospital Ticketing System </a>

	</td>



	
</tr>

<tr>	
<td colspan="5" align="center"><a href="research_home"><font size="4.5">Research Portal</a></td>
<td colspan="5" align="center"><a href="cme_indu1"><font size="4.5">Education & CME Portal</a></td>

<td colspan="3" align="center"><a href="con_ot_bill"><font size="4.5">Search Previous Procedure Cost</a></td>
</tr>	
</table>
';}
?>    



<?php if($c1>0 and $uuid=='' and $fullname!=929){
	echo'
	

	<td colspan="2"align="center">
<a href="ticketv2/dashboard"><font size="4.5">	Hospital Ticketing System </a>

	</td>
	<td colspan="2"align="center">
<a href="imset"><font size="4.5">	Make Your Own Medicine & Investigation Set </a>

	</td>
	</tr>
<tr>	
<td colspan="5" align="center"><a href="research_home"><font size="4.5">Research Portal</a></td>
<td colspan="5" align="center"><a href="cme_indu1"><font size="4.5">Education & CME Portal</a></td>
<td colspan="3" align="center"><a href="con_ot_bill"><font size="4.5">Search Previous Procedure Cost</a></td>
<td colspan="3" align="center"><a href="memberview1mng?sid='.$fullname.'"><font size="4.5">Personal Information</a></td>
<td colspan="2" align="center"><a href="adm_request_indu?sid='.$fullname.'"><font size="4.5">Previous Admission Request</a></td>
<td colspan="2" align="center"><a href="deathstatmng1_con_indu1"><font size="4.5">Mortality Case</a></td>
	

</tr>



</table>
';}
?>    



	  
  
<?php 

if($c1==0)
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
