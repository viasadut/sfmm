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


$query_staff = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result_staff = mysqli_query($con, $query_staff) or die(mysqli_error());

// Print out result
$row_staff = mysqli_fetch_array($result_staff);
$full_l = $row_staff['sid1'];


$query_s = "SELECT COUNT(id) FROM dleave where hstatus='Approval Pending' and hos in('$full_l') and recomby=''";
$result_s = mysqli_query($con, $query_s) or die(mysqli_error());
$row_s = mysqli_fetch_array($result_s);
$s_l=$row_s['COUNT(id)'];

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


<tr>	<td colspan="20"align="left"><a href="allstaffmng"><font size="4.5">All Consultant's List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="allmomng"><font size="4.5">All Medical Officer's List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="allstaffmng7"><font size="4.5">All Staff's List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="staffsearch"><font size="4.5">Search Department wise Staff's List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="staffdesig"><font size="4.5">Designation Wise Staff List</a></td></tr>

<tr>	<td colspan="20"align="left"><a href="staffindimng"><font size="4.5">Serach Consultant / MO By Staff ID</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="addmembertest"><font size="4.5">Add New Staff</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="staffeditmng"><font size="4.5">Edit Consultant / MO Info</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="adddepartment"><font size="4.5">Add Department</a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="covidstat"><font size="4.5">Covid Stats</a></td></tr>		

<tr>	<td colspan="20"align="left"><a href="staffattnm"><font size="4.5">Staff Attendance</a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="staffleave"><font size="4.5">Staff Leave</a> <font size="4.5" color="#FF0000"><b>(
	<?php echo $s_l;?>)<b></td></tr>	
<tr>	<td colspan="20"align="left"><a href="apartment1"><font size="4.5">Residence Information</a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="staff_dis"><font size="4.5">Material Distribution List</a></td></tr>		
<tr>	<td colspan="20"align="left"><a href="t_leave_staff"><font size="4.5">Todays Staff Leave Status</a></td></tr>
		
	  
</tr>


</table>
    


  
    

    
	  <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

</body>

</html>
