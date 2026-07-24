<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="endo"){
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
$runningTime = date('imdYs');
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
   <li><a href='endonursehome'><span>Home</span></a></li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?> To Endoscopy Suite </p> 
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
<tr><td colspan="20"align="left"bgcolor="white"><br></td></tr>
<tr>
	<td colspan="5"align="left"><a href="endonurse1"><font size="4.5">Set Endoscopy Suite's Available Slot</a></td></tr>
	<tr><td colspan="5" align="left"><a href="endoapp3nurse"><font size="4.5">Set Patient Appoinment</a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoapp5nurse_wer0"><font size="4.5"></a></td></tr>
		<tr><td colspan="5" align="left"><a href="register_endo--"><font size="4.5">	Register New Patient</a></td></tr>
		
		<tr><td colspan="5" align="left"><a href="endoreport1nursetest_work"><font size="4.5">	Set Booked Appoinment</a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoappreport1nurse"><font size="4.5">	View Appoinment Reports</a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoreport1nursetest"><font size="4.5">	Today's Pending Receive Patients List</a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoreport1nursetest1"><font size="4.5">Today's Received Patients List</a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoreport1nurse"><font size="4.5">Pending Reports</a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoreport3nurse"><font size="4.5">Today's Reports</a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoreportallnurse"><font size="4.5">All Done Reports </a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoreportmrnnurse"><font size="4.5">Search Report By MRN OR PHONE</a></td></tr>
				<tr><td colspan="5" align="left"><a href="endocensus"><font size="4.5">Monthly Census Report</a></td></tr>
								<tr><td colspan="5" align="left"><a href="inves_request_endo"><font size="4.5">Add New Investigation</a></td></tr>
								<tr><td colspan="20"align="left"><a href="hinfo111"><font size="4.5">Hospital Information</td></tr>	
								<tr><td colspan="20"align="left"><a href="endo_stock_edit"><font size="4.5">Endoscopy Stock</td></tr>	
		
		<tr><td colspan="20"align="left"><a href="dispose_medicine_endo"><font size="4.5">Discard Medicine</td></tr>	
<tr><td colspan="20"align="left"><a href="phar_transfer_endo?sno=<?php echo $runningTime;?>"><font size="4.5">Request For Stock</td></tr>	
<tr><td colspan="20"align="left"><a href='endo_return_phar?sno=<?php echo date('msdYi');?>'><span>Return Stock Medicine</span></a></td></tr>	
<tr><td colspan="20"style="font-size:20px;color:red;font-weight:bold;align:left"><a href='bio_tech_home'>Project Bio Tech</a></td></tr>	
<tr><td colspan="20"style="font-size:20px;color:red;font-weight:bold;align:left"><a href='staffleave'>Leave</a></td></tr>	
<tr><td colspan="20"style="font-size:20px;color:red;font-weight:bold;align:left"><a href='attnstatsindu'>Attendance</a></td></tr>	
		
	  <td colspan="20"align="left"><a href="oes1/index"><span><font size="5.5" color="green" font-weight="bold">Online Exam Module</span></a></td>					

	  
	  <tr><td colspan="20"align="left"><a href="staffincident"><font size="4.5">	Incident Report</a>
<font size="4.5" color="#FF0000"><b>(
	<?php echo $cin;?>)<b>

</td></tr>


</table>
    


  
    

    
  </tbody>
</table>
</form>

</body>

</html>
