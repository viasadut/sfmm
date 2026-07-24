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


$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );

$lab = "SELECT COUNT(id) from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and date1 between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS','BLOOD BANK') and rejectby=''"; 
$lab_result= mysqli_query($con, $lab) or die(mysqli_error());
$lab_row = mysqli_fetch_array($lab_result);
$lab_r=$lab_row['COUNT(id)'];

$lab1 = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and ndate between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS','BLOOD BANK') and rejectby=''"; 
$lab_result1= mysqli_query($con, $lab1) or die(mysqli_error());
$lab_row1 = mysqli_fetch_array($lab_result1);
$lab_r1=$lab_row1['COUNT(id)'];

$lab2 = "SELECT COUNT(id) from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and ndate between '$test' and '$apdate'and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS','BLOOD BANK') and rejectby=''"; 
$lab_result2= mysqli_query($con, $lab2) or die(mysqli_error());
$lab_row2 = mysqli_fetch_array($lab_result2);
$lab_r2=$lab_row2['COUNT(id)'];

$lab_all=$lab_r + $lab_r1 + $lab_r2;



$laba = "SELECT COUNT(id) from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and date1 between '$test' and '$apdate' and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby=''"; 
$lab_resulta= mysqli_query($con, $laba) or die(mysqli_error());
$lab_rowa = mysqli_fetch_array($lab_resulta);
$lab_ra=$lab_rowa['COUNT(id)'];

$lab1a = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and ndate between '$test' and '$apdate' and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby=''"; 
$lab_result1a= mysqli_query($con, $lab1a) or die(mysqli_error());
$lab_row1a = mysqli_fetch_array($lab_result1a);
$lab_r1a=$lab_row1a['COUNT(id)'];

$lab2a = "SELECT COUNT(id) from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and ndate between '$test' and '$apdate'and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby=''"; 
$lab_result2a= mysqli_query($con, $lab2a) or die(mysqli_error());
$lab_row2a = mysqli_fetch_array($lab_result2a);
$lab_r2a=$lab_row2a['COUNT(id)'];

$lab_alla=$lab_ra + $lab_r1a + $lab_r2a;

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


<tr>
	<td colspan="5"align="left"><a href="datewiselabt"><font size="4.5">Todays's Lab Request</a></td></tr>
	<tr><td colspan="2" align="left"><a href="categoryinvesmng"><font size="4.5">Categorywise Investigation Search</a></td></tr>
		<tr><td colspan="3" align="left"><a href="addlabmng"><font size="4.5">	ADD Investigation</a></td></tr>
				<tr><td colspan="3" align="left"><a href="labstatmng"><font size="4.5">	Individual Lab Investigation Request Stats</a></td></tr>
								<tr><td colspan="3" align="left"><a href="datewiselab"><font size="4.5">	ALL Lab Investigation Request Stats</a></td></tr>
								<tr><td colspan="3" align="left"><a href="teslab2"><font size="4.5">	Blood Bank Stock</a></td></tr>
		
		
<tr><td colspan="5"align="left" bgcolor='lightgreen'><a href="lab_all_mng"><font size="4.5">All Pending Approval List(BIOCHEMISTRY, HAEMATOLOGY, PROFILE, FLUIDS & EXCREATIONS, BLOOD BANK)</a><?php echo'<strong style="color:red;">('.$lab_all.')</strong>';?></td></tr>		
<tr><td colspan="5"align="left" bgcolor='lightgreen'><a href="lab_all1_mng"><font size="4.5">All Pending Approval List(BACTERIOLOGY, IMMUNOLOGY/SEROLOGY,VIROLOGY)</a><?php echo'<strong style="color:red;">('.$lab_alla.')</strong>';?></td></tr>		
<tr><td colspan="5"align="left" bgcolor='lightgreen'><a href="lab_all1_histo"><font size="4.5">All Pending Approval List(Histology)</a></td></tr>		

		
	  
</tr>


<tr><td colspan="5"align="left" bgcolor='lightgreen'><a href="lab_con_stat"><font size="4.5">Report Confirmation Wise Stats</a></td></tr>		
<tr><td colspan="5"align="left" bgcolor='lightgreen'><a href="lab_con_stat_1"><font size="4.5">Daily Report Confirmation Stats</a></td></tr>		

		
	  
</tr>


</table>
    


  
    

   
  </tbody>
</table>
</form>

</body>

</html>
