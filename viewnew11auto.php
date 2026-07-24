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
//header("Refresh: 5; URL=$url1");

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
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ccamidoc'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot.php'><span>OT BOOKING</span></a></li>
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
   <li class='active has-sub'><a href='docchangepass'><span>Pending Certificates Request</span></a>
   <ul>
   <li class='has-sub'><a href='deathconfirm'><span>Pending Death Certificate Approval Request</span></a></li>
   <li class='has-sub'><a href='birthconfirm'><span>Pending Birth Certificate Approval Request</span></a></li>
   </ul>
   
   <li class='active has-sub'><a href='#'><span>Generic Name Request</span></a>
      <ul>
	   <li class='has-sub'><a href='requestmedicine'><span>Request Generic Name</span></a>
            
         </li>
		 <li class='has-sub'><a href='pendingrequestdoc'><span>Pending Request List For Generic Name</span></a>
            
         </li>
         <li class='has-sub'><a href='pendingrequest1'><span>Pending List For Approval</span></a>
            
   </ul>
   </li>
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
	<td colspan="5"align="center"><a href="viewnew"><font size="4.5">OPD</a></td>
		<td colspan="5" align="center"><a href="iview"><font size="4.5">IPD</a></td>
		<td colspan="3" align="center"><a href="view3newrad"><font size="4.5">	Radiology</a></td>
		<td colspan="3" align="center"><a href="inves"><font size="4.5">	Pharmacy</a></td>
		<td colspan="2" align="center"><a href="viewlab"><font size="4.5">LAB</a></td>
		<td colspan="2" align="center"><a href="otdash"><font size="4.5">	OT</a></td>

		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href="idiet"><font size="4.5">	Antenatal History</a></td>
		<td colspan="5" align="center"><a href="stret"><font size="4.5">Vaccine Center</a></td>
		<td colspan="3" align="center"><a href="opdprodash"><font size="4.5">	OPD Procedure</a></td>
		<td colspan="3" align="center"><a href="endohome"><font size="4.5">Endoscopy Suite</a></td>
		<td colspan="2" align="center"><a href="histoappnew"><font size="4.5">	Histopathology</a></td>
		<td colspan="2" align="center"><a href="hinfo"><font size="4.5">Hospital Information</a></td>
		
	  
</tr>
 <tr>
	<td colspan="5"align="center"><a href="edocview"><font size="4.5">	Emergency</a></td>
		<td colspan="5" align="center"><a href="history11"><font size="4.5">Patients History</a></td>
		<td colspan="3" align="center"><a href="docadm1"><font size="4.5">	Admission Request</a></td>
		<td colspan="3" align="center"><a href="category"><font size="4.5">	Categorywise Medicine Search</a></td>
				<td colspan="3" align="center"><a href="categoryinves"><font size="4.5">	Categorywise Investigation Search</a></td>
		<td colspan="2" align="center"><a href="cathdash"><font size="4.5">	Cardiac Procedure</a></td>
		
	  
</tr>
 <tr>
	<td colspan="5"align="center"><a href="manualesearchdddoc"><font size="4.5">	Doridro Fund Request</a></td>
			<td colspan="5" align="center"><a href="medicalcer"><font size="4.5">Medical Certificate</a></td>
			<td colspan="3" align="center"><a href="preanaescheck"><font size="4.5">PAC</a></td>
			<td colspan="3" align="center"><a href="leavemngdoc"><font size="4.5">Leave Management</a></td>
		
	  
</tr>


</table>
    


  
    

    
<?php  
       
      if(isset($_SESSION["sess_username"]))  
      {  
           if((time() - $_SESSION['last_login_timestamp']) > 10) // 900 = 15 * 60  
           {  
                header("location:logout2.php");  
           }  
           else  
           {  
                $_SESSION['last_login_timestamp'] = time();  
                
           }  
      }  
      else  
      {  
           header('location:login2.php');  
      }  
      ?>    
  </tbody>
</table>
</form>

</body>

</html>
