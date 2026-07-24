<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff','mng','ot','endo','imo','mofficer','nurse','emergency','moopd','diet','physio','mrd','adminmng','lab','call','bill','cath')"; 
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


$query3_9 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3_9 = mysqli_query($con, $query3_9) or die(mysqli_error());

// Print out result
$row3_9 = mysqli_fetch_array($result3_9);

$cat=$row3_9['cat'];


$queryin = "SELECT COUNT(id) FROM incident1 where fby='$fullname' and status !='Closed'"; 
$resultin = mysqli_query($con, $queryin) or die(mysqli_error());
$rowin = mysqli_fetch_array($resultin);
$cin=$rowin['COUNT(id)'];


$queryin1 = "SELECT COUNT(id) FROM incident1 where fby='$fullname' and status ='Closed'"; 
$resultin1 = mysqli_query($con, $queryin1) or die(mysqli_error());
$rowin1 = mysqli_fetch_array($resultin1);
$cin1=$rowin1['COUNT(id)'];


$queryin2 = "SELECT COUNT(id) FROM incident1 where tm_status='' and status='Closed'"; 
$resultin2 = mysqli_query($con, $queryin2) or die(mysqli_error());
$rowin2 = mysqli_fetch_array($resultin2);
$cin2=$rowin2['COUNT(id)'];
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


		
<?php if($fullname=='294'){	echo"

<tr><td><a target='_blank' href='pms_income_report'><span>Daily Income Statement</span></a></td></tr>  
	  <<tr><td><a target='_blank' href='cash_collection_report_modewise_1'><span>Cashier Wise Report(Payment Mode Wise)</span></a></td></tr>
     <tr><td><a target='_blank' href='report_tb_new_5'><span>Trial Balance</span></a></td></tr>
     <tr><td><a target='_blank' href='pms_discount_report'><span>Discount Report</span></a></td></tr>
     <tr><td><a target='_blank' href='pms_outstanding_report'><span>Outstanding Report</span></a></td></tr>
     <tr><td><a target='_blank' href='pms_activity_report'><span>Patient Activity Enquiry Report</span></a></td></tr>
     <tr><td><a target='_blank' href='pms_corporate_report'><span>Corporate Activity Enquiry Report</span></a></td></tr>
     <tr><td><a target='_blank' href='pl_new1' style='color:black; font-weight:bold'><span>Profit & Loss Report(Test)</span></a></td></tr>
     <tr><td><a target='_blank' href='balance_sheet' style='color:black; font-weight:bold'><span>Balance Sheet Report(Test)</span></a></td></tr>
     <tr><td><a target='_blank' href='po_payment_report' style='color:black; font-weight:bold'><span>PO Payment Statistics</span></a></td></tr>
	  
"

;}

		

	?>	


</table>
    


  
    

   
  </tbody>
</table>
</form>

</body>

</html>
