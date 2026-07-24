<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','covid')"; 
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



<tr>	<td colspan="20"align="left"><a href="allsamplelist"><font size="4.5">Todays Sample Collections Records</a></td></tr>

<tr>	<td colspan="20"align="left"><a href="covidopdsearch"><font size="4.5">Search Old Record</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidstatnew"><font size="4.5">Datewise Stat</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidstatnewdt"><font size="4.5">Result Datewise Stat</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidstatdeptnew"><font size="4.5">Categorywise Stat</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidstatallnew"><font size="4.5">All Cases</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidstatallpnew"><font size="4.5">All Positive Case</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidstatnewp"><font size="4.5"> Datewise All Positive Case</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidstatdeptnewstaff"><font size="4.5"> Categorywise All Positive Case</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="isolationhome"><font size="4.5"> Isolation Unit</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="centrewise"><font size="4.5"> Test Centerwise Stat Report</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidopdsearchlid"><font size="4.5"> Search By Lab ID</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidbillstat"><font size="4.5"> Daily Categorywise Summary </a></td></tr>
<tr>	<td colspan="20"align="left"><a href="covidsummarystats"><font size="4.5"> Datewise Summary Stats </a></td></tr>
<?php
if($fullname=='153' or $fullname=='md')
{
	
echo ' 
<td colspan="2"align="left"><a href="covidresult"><font size="4.5">	Confirmation Pending List of Covid Result </a>

	
	
	
	
	</td>
	</tr>
	<tr>
	<td colspan="2"align="left"><a href="labcovidreceive"><font size="4.5">	Receive Sample </a><td>
	</tr>
	</table>

';}
?>


<?php
if($fullname=='qc')
{
	
echo ' 
<td colspan="2"align="left"><a href="covidresult"><font size="4.5">	Confirmation Pending List of Covid Result </a>

	
	
	
	
	</td>
	</tr>
	
	<tr>	<td colspan="20"align="left"><a href="covidopdsearch4"><font size="4.5">Edit Old Records</a></td></tr>
	<tr>	<td colspan="20"align="left"><a href="covidstatnew2"><font size="4.5">Edit 17th July Records</a></td></tr>
	<tr>	<td colspan="20"align="left"><a href="qcviewipd"><font size="4.5">Update Outside Result (IPD)</a></td></tr>
	
	

';}
?>


<?php
if($fullname=='ceo')
{
	
echo ' 

	<tr>	<td colspan="20"align="left"><a href="covidopdsearch4"><font size="4.5">Edit Old Records</a></td></tr>
	
	
	

';}
?>

<?php
if($fullname=='md')
{
	
echo ' 

	<tr>	<td colspan="20"align="left"><a href="covidopdsearch4"><font size="4.5">Edit Old Records</a></td></tr>
	
	
	

';}
?>

<?php
if($fullname=='cfo')
{
	
echo ' 

	<tr>	<td colspan="20"align="left"><a href="covidopdsearch4"><font size="4.5">Edit Old Records</a></td></tr>
	
	
	

';}
?>

</table>
    


  
    

    
	 
   
  </tbody>
</table>
</form>

</body>

</html>
