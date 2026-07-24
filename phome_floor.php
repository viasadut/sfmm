<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call','imo','mofficer','nurse','emergency')"; 
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
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?> To Online Hospital Information Desk</p> 
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

<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Information</h3></td></tr>
<tr><td colspan="20"align="left"bgcolor="white"><br></td></tr>


<tr><td colspan="5"align="left"><a  href="s_p"><font size="4.5" target="_blank">Hospital Site Plan</a></td></tr>

<tr><td colspan="5"align="left"><a  href="gf"><font size="4.5" target="_blank">Ground Floor Plan</a></td></tr>

<tr>

	<td colspan="5"align="left"><a  href="1_f"><font size="4.5" target="_blank">1st Floor Plan</a></td></tr>
	<tr><td colspan="5"align="left"><a  href="2_f"><font size="4.5" target="_blank">2nd Floor Plan</a></td></tr>
	<tr><td colspan="5"align="left"><a  href="3_f"><font size="4.5" target="_blank">3rd Floor Plan</a></td></tr>
	<tr><td colspan="5"align="left"><a  href="4_f"><font size="4.5" target="_blank">4th Floor Plan</a></td></tr>
	<tr><td colspan="5"align="left"><a  href="5_f"><font size="4.5" target="_blank">5th Floor Plan</a></td></tr>
	<tr><td colspan="5"align="left"><a  href="6_f"><font size="4.5" target="_blank">6th Floor Plan</a></td></tr>
	<tr><td colspan="5"align="left"><a  href="7_f"><font size="4.5" target="_blank">7th Floor Plan</a></td></tr>
	<tr><td colspan="5"align="left"><a  href="base"><font size="4.5" target="_blank">Basement Plan</a></td></tr>
	
	

		
	  



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
