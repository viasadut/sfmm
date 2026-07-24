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
$death_n = "SELECT COUNT(id) FROM deathn where new_issue='new' and mstatus1!='Confirmed By MD'";
$death_n1 = mysqli_query($con, $death_n) or die(mysqli_error());
$death_n11 = mysqli_fetch_array($death_n1);
$death_n_r=$death_n11['COUNT(id)'];


$death_b = "SELECT COUNT(id) FROM deathb where new_issue='new' and mstatus1!='Confirmed By MD'";
$death_b1 = mysqli_query($con, $death_b) or die(mysqli_error());
$death_b11 = mysqli_fetch_array($death_b1);
$death_b_r=$death_b11['COUNT(id)'];
$total_death=$death_n_r+$death_b_r;




$death_n_1 = "SELECT COUNT(id) FROM deathn where new_issue='Send To Mortality Committee'";
$death_n1_1 = mysqli_query($con, $death_n_1) or die(mysqli_error());
$death_n11_1 = mysqli_fetch_array($death_n1_1);
$death_n_r_1=$death_n11_1['COUNT(id)'];


$death_b_1 = "SELECT COUNT(id) FROM deathb where new_issue='Send To Mortality Committee'";
$death_b1_1 = mysqli_query($con, $death_b_1) or die(mysqli_error());
$death_b11_1 = mysqli_fetch_array($death_b1_1);
$death_b_r_1=$death_b11_1['COUNT(id)'];
$total_death_1=$death_n_r_1+$death_b_r_1;





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

<tr><td colspan="3" align="left"><a href="deathconfirmmng"><font size="4.5">Pending Death Certificate Edit Request</a></td></tr>
<tr>
	<td colspan="5"align="left"><a href="deathstatmng"><font size="4.5">Datewise Death Stats</a></td></tr>
	<tr>	<td colspan="5" align="left"><a href="deathstatmng1"><font size="4.5">Consultant Wise Death Stats</a></td></tr>
	<tr>	<td colspan="5" align="left"><a href="deathstatmng1_new"><font size="4.5">New Unsettle Death Case</a>
	
	
	<font size="4.5" color="#FF0000"><b><?php echo '(
	'.$total_death.')';?><b>
	</td></tr>
	
	
	
	
		<tr>	<td colspan="5" align="left"><a href="deathstatmng1_all"><font size="4.5">Pending Mortality Discussion Case(s)</a>
	
	
	<font size="4.5" color="#FF0000"><b><?php echo '(
	'.$total_death_1.')';?><b>
	</td></tr>
	
	
		
		
		

		
	  
</tr>
	<tr><td colspan="5"align="left"><a href="deathstatmng_minutes"><font size="4.5">Datewise Meeting Minutes</a></td></tr>

</table>
    


  
    

   
  </tbody>
</table>
</form>

</body>

</html>
