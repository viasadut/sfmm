<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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
$query22 = "SELECT COUNT(lseen) FROM conleavedetails where md in('$full','Dr. Razeeb Hassan') and status='Approved By Replacement Consultant' and lseen='RSEEN'"; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$query21 = "SELECT COUNT(lseen) FROM conleavedetails where ceo='$full' and status='Approved By MD' and lseen='MDSEEN'"; 
$result21 = mysqli_query($con, $query21) or die(mysqli_error());
$row21 = mysqli_fetch_array($result21);

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

<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module</h3></td></tr>

 <tr>
	
			
	<tr><td colspan="20"align="left"><a href="leaveviewmd"><font size="4.5">	View Pending Leave Application</a> <font size="4.5" color="#FF0000"><b>(
	<?php
	if($full==='Dr. Razeeb Hassan' || $full==='Dr. J.M.H Qausar Alam')
	{ 
echo  $row22['COUNT(lseen)'];
} 
else if
($full==='Mohd Taufik Bin Ismail')
	{ 
	echo  $row21['COUNT(lseen)'];}
	
	?>)<b></td>	
	<tr><td colspan="20"align="left"><a href="attnmng"><font size="4.5">	Today's Consultants Attendance </a></td>		
	  
</tr>

	<tr><td colspan="20"align="left"><a href="leavemng"><font size="4.5">	Todays Leave Status</a></td>	</tr>
	
	<tr><td colspan="20"align="left"><a href="leavemng1"><font size="4.5">	All Pending Leave Status</a></td></tr>	
		<tr><td colspan="20"align="left"><a href="leavemngcancel"><font size="4.5">	Cancel Leave</a></td></tr>
				<tr><td colspan="20"align="left"><a href="cancelleave1"><font size="4.5">	Cancel Leave By Staff ID</a></td></tr>
				<tr><td colspan="20"align="left"><a href="viewleavemng"><font size="4.5">	ALL Consultants Leave Balance</a></td></tr>
				<tr><td colspan="20"align="left"><a href="leavestatsmng"><font size="4.5">	Consultant Wise Leave Stats</a></td></tr>
				<tr><td colspan="20"align="left"><a href="attnstatsmng"><font size="4.5">	Consultant Wise Attendance Stats</a></td></tr>
				<tr><td colspan="20"align="left"><a href="datewise_leave_con"><font size="4.5">	Datewise Leave Stats</a></td>		</tr>
<tr><td colspan="20"align="left"><a href="addcforward1"><font size="4.5">	Set Carry Forward Leave</a></td>		
</tr>


</table>
    


  
    

    
	 
   
  </tbody>
</table>
</form>

</body>

</html>
