<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
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
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];

$ad3=date('d/m/Y H:i:s');

$sel3="Select * from inpatient where '$ad3' between alert1 and alert2";

$resu3 = mysqli_query($con,$sel3);
$rw3 = mysqli_fetch_assoc($resu3);
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


<script type="text/javascript">
  var time = 1000 * 30 * 1; //20 minutes
  var theTimer = setTimeout("document.location.href='login2'",time);
</script>

</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='viewnewnurse'><span>Home</span></a></li>
   

<li class='last'><a href='nursechangepass'><span>Change Password</span></a></li>


<li class='last'><a href='logout'><span>LOGOUT</span></a></li>
       
</ul>
</div>
<p align="center" class="style1">Welcome!! <?php echo $row39['fullname']; ?> </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">

 <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

<?php 

$query3 = "SELECT COUNT(id) FROM inpatient where discharge=''"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3)



?>
<?php
$date1=date('d/m/Y');
$query4 = "SELECT COUNT(id) FROM inpatient where disstatus='Discharge Bill Confirmed' and billdate='$date1'and confirmdn !=''";
	 
$result4 = mysqli_query($con, $query4) or die(mysqli_error());

// Print out result
$row4 = mysqli_fetch_array($result4)
?>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      
      <th width="14%"><strong>Drescription</strong>
	        <th width="14%"><strong>Number of Patients</strong>
      <th width="14%"><strong>Details View</strong>


	   </tr>
  </thead>
  <tbody>
  
    

    <tr>
       <td> Today's Number of Inpatients </td>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo  $row3['COUNT(id)']; ?></td>  
	       
	  <td align="center"><a href="inview">Details</a></td>

	  
      </tr>
	  
	  <tr>
        
       <td> Today's Number of Discharge Patient </td>
       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo  $row4['COUNT(id)']; ?></td>  
	  <td align="center"><a href="nimoview">Details</a></td>

	  
      </tr>

   
  </tbody>
  
  		<?php
if($rw3==true)
{
	
	echo '<audio autoplay>
  <source src="audio/in.mp3" type="audio/mpeg">
  <source src="audio/in.ogg" type="audio/ogg">
 
</audio>';}?>

</table>
</form>

</body>

</html>
