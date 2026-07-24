<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="opdpro"){
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
$runningTime = date('iYdsm');
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
   
  
   <script src="script.js"></script>
 <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>



</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?> To OT Module </p> 
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
	<td colspan="5"align="left"><a href="procedureopd"><font size="4.5">SET OPD PROCEDURE APPOINTMENT(OPD)</a></td></tr>

<tr>
	<td colspan="5"align="left"><a href="procedurein1"><font size="4.5">SET OPD PROCEDURE APPOINTMENT(IPD)</a></td></tr>
<tr>
	<td colspan="5"align="left"><a href="procedure_work"><font size="4.5">Pending Booked Procedure List</a></td></tr>
	
	<tr><td colspan="5" align="left"><a href="procedureup"><font size="4.5">PENDING OPD PROCEDURE HISTORY LIST</a></td></tr>
		<tr><td colspan="5" align="left"><a href="proprint1"><font size="4.5">PRINT TODAYS PROCEDURE NOTES</a></td></tr>
				<tr><td colspan="5" align="left"><a href="opdproalln"><font size="4.5">PRINT MRN WISE PROCEDURE NOTES</a></td></tr>
								<tr><td colspan="5" align="left"><a href="procedurestat"><font size="4.5">Stats</a></td></tr>

		<tr><td colspan="20"align="left"><a href="opd_stock_edit"><font size="4.5">OPD Stock</td></tr>	
		<tr><td colspan="20"align="left"><a href="dispose_medicine_opd"><font size="4.5">Discard Medicine</td></tr>	
	  
<tr><td colspan="20"align="left"><a href="phar_transfer_opd?sno=<?php echo $runningTime;?>"><font size="4.5">Request For Stock</td></tr>	
<tr><td colspan="20"align="left"><a href='procedure_return_phar?sno=<?php echo date('misdY');?>'><span>Return Stock Medicine</span></a></td></tr>	
<tr><td colspan="20"align="left"><a href="consent_patient"><span><font size="5.5" color="green" font-weight="bold">Upload Consent Forms</span></a></td></tr>					

<tr><td colspan="20"align="left"><a href="via_test_bill"><span><font size="5.5" color="green" font-weight="bold">VIA Test</span></a></td></tr>					

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
