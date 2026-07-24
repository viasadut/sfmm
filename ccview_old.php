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
   <li><a href='rpapp22cc'><span>New Patient Registration</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='ccggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ccami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='ccviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
		 
      </ul>
	  
   </li>

    	    <li class='last'><a href='ccgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4new1'><span>Search previous patients</span></a></li>
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
   <li class='last'><a href='opd_doc_schedule_call'><span>TEST</span></a></li>
   <li class='last'><a href='hinfo'><span>Hospital Information</span></a></li>
   <li class='last'><a href='leave2'><span>Apply Leave</span></a></li>  
   
   <li class='active has-sub'><a href='#'><span>Consultant Leave</span></a>
	  
	  <ul>
      
<li class='has-sub'> <a href='leavemng1'><span>Pending Leave List</span></a>


            
         </li>
		 
		 <li class='has-sub'> <a href='leavemng'><span>Today's Approved Leave</span></a>
            
         </li>

	  
	 </ul>
	 </li>
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
