<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="diet"){
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
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];

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
    width: 100%;
    
}
img {
  border-radius: 50%;
   
}



</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


<link rel="stylesheet" href="css/presentational.css">
    
    
    <link rel="stylesheet" href="css/circular-images.css">

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
		 <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='last'><a href='reporting-portal/index.php'><span>Reporting Portal</span></a></li>
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
   <li class='last'><a href='deathconfirm'><span>Pending Death Certificate Approval Request</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

 
        

<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?></p> 
<?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>

<br>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr><td colspan="20"align="center"bgcolor="lightgreen"><img src="staff_pic/<?php echo $row3['pic'] ?>" width="100"  height="100" align='center'></td></tr>
<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module  (<?php echo "Date:" ?> <?php echo date('d/m/Y')?>) </h3> </td></tr>
<tr>
	<td colspan="5"align="center"><a href="viewnewdiet"><font size="4.5">OPD</a></td>
		<td colspan="5" align="center"><a href="inplabdiet"><font size="4.5">IPD</a></td>
		<td colspan="3" align="center"><a href="view3newrad"><font size="4.5">	Radiology</a></td>
		<td colspan="3" align="center"><a href="inves"><font size="4.5">	Pharmacy</a></td>
		<td colspan="2" align="center"><a href="viewlab"><font size="4.5">LAB</a></td>
		<td colspan="2" align="center"><a href="otdash"><font size="4.5">	OT</a></td>

		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="idiet"><font size="4.5">	Antenatal History</a></td>
		<td colspan="5" align="center"><a href="stret"><font size="4.5">Vaccine Center</a></td>
		<td colspan="3" align="center"><a href="pall"><font size="4.5">	OPD Procedure Room</a></td>
		<td colspan="3" align="center"><a href="endohome"><font size="4.5">Endoscopy Suite</a></td>
		<td colspan="2" align="center"><a href="histoappnew"><font size="4.5">	Histopathology</a></td>
		<td colspan="2" align="center"><a href="hinfo"><font size="4.5">Hospital Information</a></td>
		
	  
</tr>
 <tr>
	<td colspan="5"align="center"><a href="edocview"><font size="4.5">	Emergency</a></td>
		<td colspan="5" align="center"><a href="opdpmrddiet"><font size="4.5">Patients History</a></td>
		<td colspan="3" align="center"><a href="docadm1"><font size="4.5">	Admission Request</a></td>
		<td colspan="3" align="center"><a href="category"><font size="4.5">	Categorywise Medicine Search</a></td>
				<td colspan="3" align="center"><a href="categoryinves"><font size="4.5">	Categorywise Investigation Search</a></td>
		<td colspan="2" align="center"><a href="opdmngdiet"><font size="4.5">	OPD STATS</a></td>
		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="dietreferral"><font size="4.5">Datewise Diet Referral Stats</a></td>
		<td colspan="5" align="center"><a href="dietreferraltodays"><font size="4.5">Todays Referral</a></td>
				<td colspan="3" align="center"><a href="assstat"><font size="4.5">Diet Assessment datewise Stats</a></td>
		
	  <td colspan="3"align="center"><a href="ticketv2/dashboard"><font size="4.5">IT_Ticketing_System </td>
		<td colspan="3"align="center"><a href="staffincident"><font size="4.5">Incident Reporting </td>
		<td colspan="2"align="center"><a href="staffleave"><font size="4.5">	Leave Management</a></td>
</tr>

<tr>
	<td colspan="5"align="center"><a href="hos_log"><font size="4.5">Departmental Log</a></td>
	<td colspan="5"align="center"><a href="attnstatsindu"><font size="4.5">Attendance Report</a></td>
<td colspan="3"align="center"><a href="mrequest"><font size="4.5">Material Request</a></td>	
<td colspan="3"align="center"><a href="weight_loss_list_doc"><font size="4.5">Weight Loss program</a></td>
<td colspan="3" align="center"><a href="prihome"><font size="4.5">Previlege</a></td>	

<td colspan="2"align="left"><a href="cafe/OwnBill.php?m=<?= date('m') ?>"><font size="4.5">Current Month Cafe Bill</a></td>	  
</tr>

<tr>
<td colspan="5"align="center"><a href="ipdmng_diet"><span style="font-size:20px;color:red;font-weight:bold">IPD Patient Stats</a></td>
		
</tr>


</table>
    

<?php if($ad=='b')
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
