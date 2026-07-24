<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="physio"){
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
$runningTime1 = date('misis').$fullname;
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
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
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
	<td colspan="5"align="center"><a href="viewnewphysio54"><font size="4.5">OPD</a></td>
		<td colspan="5" align="center"><a href="inplabphysio"><font size="4.5">IPD</a></td>
		<td colspan="3" align="center"><a href="view3newrad"><font size="4.5">	Radiology</a></td>
		<td colspan="3" align="center"><a href="inves"><font size="4.5">	Pharmacy</a></td>
		<td colspan="3" align="center"><a href="viewlab"><font size="4.5">LAB</a></td>
		<td colspan="2" align="center"><a href="otdash"><font size="4.5">	OT</a></td>

		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="idiet"><font size="4.5">	Antenatal History</a></td>
		<td colspan="5" align="center"><a href="stret"><font size="4.5">Vaccine Center</a></td>
		<td colspan="3" align="center"><a href="pall"><font size="4.5">	OPD Procedure Room</a></td>
		<td colspan="3" align="center"><a href="endohome"><font size="4.5">Endoscopy Suite</a></td>
		<td colspan="3" align="center"><a href="histoappnew"><font size="4.5">	Histopathology</a></td>
		<td colspan="2" align="center"><a href="hinfo"><font size="4.5">Hospital Information</a></td>
		
	  
</tr>
 <tr>
	<td colspan="5"align="center"><a href="edocview"><font size="4.5">	Emergency</a></td>
		<td colspan="5" align="center"><a href="history11"><font size="4.5">Patients History</a></td>
		<td colspan="3" align="center"><a href="docadm1"><font size="4.5">	Admission Request</a></td>
		<td colspan="3" align="center"><a href="category"><font size="4.5">	Categorywise Medicine Search</a></td>
				<td colspan="3" align="center"><a href="categoryinves"><font size="4.5">	Categorywise Investigation Search</a></td>
		<td colspan="2" align="center"><a href="cathdash"><font size="4.5">	Cardiac Procedure</a></td>
		
	  
</tr>

<tr>
	<td colspan="5" align="center"><a href="physiorefer1"><font size="4.5">	Physio Referral Request</a></td>
	<td colspan="5" align="center"><a href="history11physio"><font size="4.5">	Patient History</a></td>
	<td colspan="3" align="center"><a href="opdphysio"><font size="4.5">	Stats</a></td>
		<td colspan="3" align="center"><a href="new_opd_physio"><font size="4.5">Update Patient Vitals</a></td>
		<td colspan="3"align="center"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td>
<td colspan="2"align="center"><a href="staffleave"><font size="4.5">Staff Leave </td>
		
	  
</tr>


<tr><td colspan="5"align="center"><a href="attnstatsindu"><font size="4.5">Datewise Attendance</td>
<td colspan="5"align="center"><a href="weight_loss_list_doc"><font size="4.5">Weight Loss program</a></td>	


<?php if($fullname=='1347'){echo
'<td colspan="3"align="left"><a href="recruit/manpower_requisition"><font size="4.5">Recruitment</a></td>
<td colspan="3"align="left"><a href="phar_transfer_physio"><font size="4.5">Stock Request</a></td>
<td colspan="3"align="left"><a href="dispose_medicine_physio"><font size="4.5">Discard Medicine</a></td>';}

?>

<td colspan="2"align="left"><a href="purchase_transfer_ot?sno=<?php echo $runningTime1;?>"><font size="4.5">Request For Material(Store)</td>
</tr>


</table>
    


  
    

    
<?php 
	  $ad='b';
	  
	  if($ad=='b')
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
