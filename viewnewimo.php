<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('imo','doctor','mo01')"; 
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
$test=$_SESSION['user_session_id'];
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
$runningTime1 = date('misis').$fullname;
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

$log = "SELECT COUNT(id) FROM logbook_users where user_id= '$fullname' and status='1'"; 
		
	$log_res = mysqli_query($con, $log) or die(mysqli_error());

	// Print out result
	$log_data = mysqli_fetch_array($log_res);

	$log_count = $log_data['COUNT(id)'];



$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];

$r_cor=$row3['r_cor'];
$query = "SELECT COUNT(id) FROM todolist where dis='' and status!='DONE'"; 
	 
$result = mysqli_query($con, $query) or die(mysqli_error());

// Print out result
$row = mysqli_fetch_array($result);
$p_work=$row['COUNT(id)'];





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
         <li class='has-sub'><a href='ccamidoc'><span>Set Restrictions on Appointment Time</span></a>
            
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
   <li class='last'><?php if ($log_count>0){echo "<a style='color:red;font-size:20px;font-weight:bold;' href='logbook/index'><span>Logbook</span></a>";}?></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr><td colspan="19"align="center"bgcolor="lightblue"class="style1" border="0">Welcome!! <?php echo $row39['fullname']; ?></td>
<td colspan="1"align="center"bgcolor="lightblue">
<a target='_blank' href="hinfo111"><img src="hinfo.jpg" title="Hospital Information" width="100" height="70" /></a>
<a target="_blank" href="event_cal/calender_view"><img src="event_cal/cal_view.png" title="Update Calendar" width="100" height="70" /></a>




</tr>
<tr><td colspan="19"align="center"bgcolor="lightgreen"><img  src="staff_pic/<?php echo $row3['pic'] ?>" width="100"  height="100" align="center"></td>
<td colspan="1"align="center"bgcolor="lightgreen"><h3><?php echo date('d/m/Y').'<br>'.date('H:i:s')?></h3></td>
</tr>

	
		<td colspan="5" align="center"><a href="imoinviewnew1"><font size="4.5">IPD</a></td>
	
	
		
		<td colspan="5" align="center"><a href="otdashimo"><font size="4.5">	OT</a></td>

    <td colspan="3" align="center"><a style="color:red;font-weight:bold;font-size:18px;" href="otallbookingdoc1mng"><font size="4.5">Today's OT List</a></td>
			<td colspan="3" align="center"><a style="color:red;font-weight:bold;font-size:18px;" href="otallbookingdoc1mng_to"><font size="4.5">Tomorrow's OT List</a></td>

		
		
		
		<td colspan="2" align="center"><a href="hinfo111"><font size="4.5">Hospital Information</a></td>
		
		<td colspan="2" align="center"><a href="history1mng.php"><font size="4.5">Patients History</a></td>
	  
</tr>

<tr>
	
		
		
	  
</tr>
 <tr>
	
		
		<td colspan="5" align="center"><a href="categoryimo"><font size="4.5">	Categorywise Medicine Search</a></td>
				<td colspan="5" align="center"><a href="categoryinvesimo"><font size="4.5">	Categorywise Investigation Search</a></td>
		<td colspan="3"align="center"><a href=""><font size="4.5">	Doridro Fund Request</a></td>
			<td colspan="3" align="center"><a href=""><font size="4.5">Medical Certificate</a></td>
			<td colspan="2" align="center"><a href="chemoimohome"><font size="4.5">Oncology Suite</a></td>
		
		<td colspan="2"align="center"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td>
		
	  
</tr>
 <tr>
	
		
		<td colspan="5"align="center"><a href="staffincident"><font size="4.5">Incident Reporting </td>
	  <td colspan="5"align="center"><a href="staffleave"><font size="4.5">	Leave Management</a></td>
			<td colspan="3"align="center"><a href="bed_mng_test5"><font size="4.5">	Bed Management</a></td>

<td colspan="3" align="center"><a href="research"><font size="4.5">Research Portal</a></td>
<td colspan="2" align="center"><a href="attnstatsindu"><font size="4.5">Attendance</a></td>
<td colspan="2" align="center"><a href="roaster_home_indu"><font size="4.5">Roster</a></td>

</tr>


<tr>
	
<td colspan="5" align="center"><a href="otallbookingdoc1mng"><font size="5.5" color="red" font-weight="bold">Today's OT List</a></td>





	<td colspan="5"align="center"><a href="todolist_details"><font size="5.5" color="red" font-weight="bold">Pending Work List (<?php echo $p_work;?>)</a></td>
	<td colspan="3" align="center"><a href="endoreport1_imo"><font size="4.5">Endoscopy</a></td>		
	<td colspan="3"align="center"><a href="oes1/index"><span><font size="5.5" color="green" font-weight="bold">Online Exam Module</span></a></td>
	<?php 
if($r_cor=='yes'){echo'
<td colspan="2" align="center"><a href="roster_home_new"><font size="4.5">Set Departmental Roster</a></td>';}
?>	 
<td colspan="3"align="center"><a href="consent_patient"><span><font size="5.5" color="green" font-weight="bold">Upload Consent Forms</span></a></td>					
<td colspan="3"align="center"><a href="death_summary_pending_indu"><span><font size="5.5" color="red" font-weight="bold">Edit Death Summary</span></a></td>					
</tr>

<tr>

<td colspan="5"align="left"><a href="purchase_transfer_ot?sno=<?php echo $runningTime1;?>"><font size="5" color="green">Request For Material(Store)</td>
	<td colspan="5"align="left"><a href="view_material_request_indu"><font size="5" color="green">View Material Request</td>
  <td colspan="3"align="left"><a href="incertificateimo"><font size="5" color="green">Issue Injury Certificate</td>

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
<script>

function check_session_id()
{
    var session_id = "<?php echo $test; ?>";

    fetch('check_login.php').then(function(response){

        return response.json();

    }).then(function(responseData){

        if(responseData.output == 'logout')
        {
            window.location.href = 'logout_new.php';
        }

    });
}

setInterval(function(){

    check_session_id();
    
}, 10000);

</script>
</html>
