<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff')"; 
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


<tr>	<td colspan="20"align="left"><a href="attn_upload/upload"><font size="4.5">Upload Data</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="attnstatsd"><font size="4.5">Process Attendance</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="staff_update_attn_comment"><font size="4.5">Edit Staff Attendance</a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="attnstaff1"><font size="4.5">Today's Attendance</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="attnstaff1a"><font size="4.5">Today's Late Attendance List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="attnstaff1aa"><font size="4.5">Today's Absent List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="attnstaff1aaa"><font size="4.5">Today's Leave List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="attnstaffdetails"><font size="4.5">Details Attendance</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="staffattnid"><font size="4.5">View Attendance By Staff ID</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="attndept2"><font size="4.5">Datewise Attendance Report By Department</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="attnstats"><font size="4.5">Datewise Attendance Report</a></td></tr>
<tr>	<td colspan="20"align="left"style="color:green;text-align:left;font-size:15px;font-weight:bold;"><a href="desig_wise_attn"><font size="4.5">Today's Summary of Departmentwise Attendance</a></td></tr>
<tr>	<td colspan="20"align="left"style="color:green;text-align:left;font-size:15px;font-weight:bold;"><a href="staff_attn_rfid"><font size="4.5">Test</a></td></tr>
<tr>	<td colspan="20"align="left"style="color:green;text-align:left;font-size:15px;font-weight:bold;"><a href="attnstaffdetails_date"><font size="4.5">Monthwise Attendance Report</a></td></tr>




		
	 


</table>
    


  
    

    
   
  </tbody>
</table>
</form>

</body>

</html>
