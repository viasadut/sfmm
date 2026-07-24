<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
$ugroup = $row39['ugroup'];

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
   <li><a href='viewnew11'><span>Home</span></a></li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?> To Radiology Suite </p> 
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
	<td colspan="5"align="left"><a href="view3newrad"><font size="4.5">See All Done Reports</a></td></tr>
	
	
	<?php if($ugroup=='radio')
	{echo '
	<tr><td colspan="3" align="left"><a href="radview1_con"><font size="4.5">	Pending Reports</a></td></tr>
	<tr><td colspan="3" align="left"><a href="rad_report_outside21.php"><font size="4.5">	Todays Report</a></td></tr>
	<tr><td colspan="3" align="left"><a href="donereport"><font size="4.5">	Search Done Reports</a></td></tr>
	<tr><td colspan="3" align="left"><a href="allapp"><font size="4.5">	Appointment Report</a></td></tr>
	<tr><td colspan="3" align="left"><a href="allreport"><font size="4.5">	Datewise Done Reports</a></td></tr>
	<tr><td colspan="3" align="left"><a href="radconsultant"><font size="4.5">	Consultantwise Reports</a></td></tr>
		<tr><td colspan="3" align="left"><a href="radreportapprove"><font size="4.5">Approval Pending Reports</a></td></tr>
	
	<tr><td colspan="3" align="left"><a href="radview1new"><font size="4.5">	Test Pending Reports</a></td></tr>
	<tr><td colspan="3" align="left"><a href="rad_lab"><font size="4.5">	ALL LAB REPORTS (PMS)</a></td></tr>
	<tr><td colspan="3" align="left"><a href="set_radio_template" style="color:red;font-size:20px;font-weight:bold;">Prepare / Edit Your Own Templates</a></td></tr>
	
	';}?>	
		

		
	  



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
