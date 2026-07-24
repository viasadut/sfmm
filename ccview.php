<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="call"){
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
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];
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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='ccview'><span>Home</span></a></li>
   

    	    <li class='last'><a href='opd_doc_schedule_call'><span>Set Patient's Appointment</span></a></li>
      
	  <li class='last'><a href='ccapp1'><span>Appointment Report</span></a></li>
	  <li class='last'><a href='appcancel12'><span>Cancel Appointment</span></a></li>
	  <li class='last'><a href='callpasschange'><span>Change Password</span></a></li>
	  <li class='active has-sub'><a href='#'><span>Covid</span></a>
	  
	  <ul>
      
<li class='has-sub'> <a href='covidhomemanual'><span>Set Manual Appointment For Today</span></a>


            
         </li>
		 
		 <li class='has-sub'> <a href='covidhome2manual'><span>Set Manual Appointment For Tomorrow</span></a>
            
         </li>

	  <li class='has-sub'> <a href='covidcall'><span>Covid Result</span></a>
            
         </li>
	  
	  <li class='has-sub'> <a href='infodesk'><span>IPD Patient List</span></a>
            
         </li>
		 
		 <li class='has-sub'> <a href='covidtodaymrd'><span>Foreign Passenger List</span></a>
            
         </li>
	 </ul>
	 </li>
   
   <li class='last'><a href='hinfo'><span>Hospital Information</span></a></li>
   
   <li class='last'><a href='attnstatsindu'><span>View Attendance</span></a></li>  
   
   <li class='active has-sub'><a href='#'><span>Consultant Leave</span></a>
	  
	  <ul>
      
<li class='has-sub'> <a href='leavemng1'><span>Pending Leave List</span></a>


            
         </li>
		 
		 <li class='has-sub'> <a href='leavemng'><span>Today's Approved Leave</span></a>
            
         </li>

	  
	 </ul>
	 </li>
	 
	  <li class='active has-sub'><a href='#'><span>Staff Leave</span></a>
	  
	  <ul>
      
<li class='has-sub'> <a href='leave2'><span>Apply Leave</span></a>


            
         </li>
		 
		 <li class='has-sub'> <a href='leaveviewindu'><span>View ALL Leave Status</span></a>
            
         </li>

	  
	 </ul>
	 </li>
	 
	 <li class='last'><a href='ticketv2/dashboard'>Hospital Ticketing System</a></li>
   <li class='last'><a href='staffincident'><span>Incident Report</span></a></li>
  <?php if($fullname=='217')
  {echo"
   
   <li class='active has-sub'><a href='#'><span>Admission Desk</span></a>
	  
	  <ul>
      
<li class='has-sub'> <a href='bed_mng_test5'><span>Bed Management</span></a>


            
         </li>

<li class='has-sub'> <a href='qcview'><span>Inpatient List</span></a>


            
         </li>
		 
		 <li class='has-sub'> <a href='adm_req'><span>View Admission Request</span></a>
            
         </li>

	  
	 </ul>
  </li>";}?>


<?php if($fullname=='1546')
  {echo"
   

    <li class='active has-sub'><a href='#'><span>Inpatient Menu</span></a>
	  
	  <ul>
      
<li class='has-sub'> <a href='bed_mng_test5'><span>Bed Management</span></a>


            
         </li>

<li class='has-sub'> <a href='qcview'><span>Inpatient List</span></a>


            
         </li>
		 
		 <li class='has-sub'> <a href='bedviewbill'><span>Edit Bed Details</span></a>
            
         </li>

	  
	 </ul>
  </li>";}?>
   <li class='last'><a href='call_center_liver'><span>Liver Followup</span></a></li>
   <li class='last'><a href='call_center_code'><span>Active Code Panel</span></a></li>
   <li class='last'><a href='purchase_transfer_ot?sno=<?php echo $runningTime1;?>'><span>Request For Material(Store)</span></a></li>
   <li class='last'><a href='cafe/OwnBill.php?m=<?= date('m') ?>'><span>Cafe Bill</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 


</body>

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

</html>
