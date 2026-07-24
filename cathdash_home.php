<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
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
$runningTime = date('iYdss');
$runningTime1 = date('misis').$fullname;
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
	<td colspan="5"align="left"><a href="cathlab_receive"><font size="4.5">SET Cathlab Procedure APPOINTMENT</a></td></tr>

<tr>
	

	<tr><td colspan="5" align="left"><a href="cath_receive2"><font size="4.5">PENDING Cathlab PROCEDURE HISTORY LIST</a></td></tr>
		
				
		<tr><td colspan="20"align="left"><a href="cath_stock_edit"><font size="4.5">Cathlab Stock</td></tr>	
		<tr><td colspan="20"align="left"><a href="dispose_medicine_cath"><font size="4.5">Discard Medicine</td></tr>	
	  
<tr><td colspan="20"align="left"><a href="phar_transfer_cath?sno=<?php echo $runningTime;?>"><font size="4.5">Request For Stock</td></tr>	
<tr><td colspan="20"align="left"><a href='cath_return_phar?sno=<?php echo date('mdsYi');?>'><span>Return Stock Medicine</span></a></td></tr>	
<tr><td colspan="20"align="left"><a href="purchase_transfer_ot?sno=<?php echo $runningTime1;?>"><font size="4.5">Request For Material(Store)</td></tr>	

</table>
    


  
    

    
   
  </tbody>
</table>
</form>

</body>

</html>
