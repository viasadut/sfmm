<?php 
    session_start();
	$loginUser = $_SESSION['sess_username'];
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

<tr><td colspan="5"align="left"><a href="ot_set_date.php"><font size="4.5">Set Your Prefer OT Day</a></td></tr>
<tr>
	<td colspan="5"align="left"><a href="ot.php"><font size="4.5">OT BOOKING</a></td></tr>
	<td colspan="5"align="left"><a href="otallbookingdoc1"><font size="4.5">Todays's Own Booking List</a></td></tr>
	<td colspan="5"align="left"><a href="otallbookingdoc1mng"><font size="4.5">Todays's All Booking List</a></td></tr>
	
	<tr><td colspan="5" align="left"><a href="otviewdoc"><font size="4.5">Pending Notes</a></td></tr>
	<tr><td colspan="5" align="left"><a href="otviewdoc_edit" style="font-size:18px;color:red;font-weight:bold">Pending Edit Request</a></td></tr>
		<tr><td colspan="5" align="left"><a href="otallbookingdoc2"><font size="4.5">Datewise Booking List </a></td></tr>
		<tr><td colspan="5" align="left"><a href="otallbookingdoc"><font size="4.5">All Booking List </a></td></tr>
		<tr><td colspan="5" align="left"><a href="otall1" style="font-size:18px;color:green;font-weight:bold"><font size="4.5">OT Report Wise Stats </a></td></tr>
		<tr><td colspan="5" align="left"><a href="con2" style="font-size:18px;color:green;font-weight:bold"><font size="4.5">OT Performed Wise Stats </a></td></tr>
		<tr><td colspan="5" align="left"><a href="endoreportmrnotdoc"><font size="4.5">Search Report By MRN OR PHONE</a></td></tr>
		
		<tr><td colspan="5" align="left"><a href="printhisto"><font size="4.5">Print Previous Histo Request</a></td></tr>
		<tr><td colspan="5" align="left"><a href="printcd"><font size="4.5">Print Previous CS Request</a></td></tr>
		
		<tr><td colspan="5" align="left"><a href="old_ot_note_update" style="font-size:18px;color:green;font-weight:bold"><font size="4.5">Write Previous Not Confirmed OT Notes</a></td></tr>
		
	  



</table>
    


  
    

  </tbody>
</table>
</form>

</body>

</html>
