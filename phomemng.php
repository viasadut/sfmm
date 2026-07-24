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

<tr><td colspan="3" align="left"><a href="msearchmedicompanymng"><font size="4.5">Companywise Medicine Search</a></td></tr>
<tr>
	<td colspan="5"align="left"><a href="categorymng"><font size="4.5">Categorywise Medicine Search</a></td></tr>
	<tr>	<td colspan="5" align="left"><a href="companymedi"><font size="4.5">Quantitywise Generic Name By COmpany</a></td></tr>
	
	<tr>	<td colspan="5" align="left"><a href="addmedicinemng"><font size="4.5">Add New Medicine</a></td></tr>
	
	<tr>	<td colspan="5" align="left"><a href="listdeactivemng"><font size="4.5">List Of Deactive Medicine</a></td></tr>
		<tr>	<td colspan="5" align="left"><a href="tes5mng"><font size="4.5">Medicine Served Wise Stats </a></td></tr>
		<tr>	<td colspan="5" align="left"><a href="editrequestapprove"><font size="4.5">Medicine Edit Request</a></td></tr>
		
		<tr>	<td colspan="5" align="left"><a href="pharmacystat"><font size="4.5">Prescribed Medicine Stats(OPD,IPD,A/E)</a></td></tr>
		
		
		

		
	  
</tr>

<tr><td colspan="5" align="left"><a href='pendingrequest1mng'><span>Pending List For Approval</span></a></td></tr>
<tr><td colspan="5" align="left"><a href='pharstats'><span>Pharmacy Prescription Stats</span></a></td></tr>
<tr><td colspan="5" align="left"><a href='phar_approve_new'><span>Pending Charge Code Approval</span></a></td></tr>

<tr><td colspan="5" align="left"><a href='pendingrequest1mng_phar'><span>Pending Proceed Request List From Pharmacy</span></a></td></tr>
<tr><td colspan="5" align="left"><a href='phar_home'><span>Pharmacy New Module</span></a></td></tr>
<tr><td colspan="5" align="left"><a href='phar_stats'><span style="font-size:20px; color:red;font-weight:bold;">Pharmacy Stats (New)</span></a></td></tr>
<tr><td colspan="5" align="left"><a href='opd_phar_stock1'><span style="font-size:20px; color:green;font-weight:bold;">OPD Pharmacy Stats</span></a></td></tr>
<tr><td colspan="5" align="left"><a href='opd_phar_stock2'><span style="font-size:20px; color:green;font-weight:bold;">IPD Pharmacy Stats</span></a></td></tr>
<tr><td colspan="5" align="left"><a href='opd_phar_stock3'><span style="font-size:20px; color:green;font-weight:bold;">Store Pharmacy Stats</span></a></td></tr>
</table>
    


  
    


   
  </tbody>
</table>
</form>

</body>

</html>
