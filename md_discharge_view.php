<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','mng')"; 
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




</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='mpsadmin'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO DISCHARGE PANEL </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr>
     <td colspan='20' style="background-color:red;font-size:22px;font-weight:bold"><strong>Today's Discharged Inpatient Patients</strong></td>
	 </tr>

    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
      
<th width="14%"><strong>Print</strong>	  
	  </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date1= date('d/m/Y');
$count=1;
$sel_query="Select * from inpatient where billdate='$date1' and confirmdn !='' order by room asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  
	  <td align="center"><a target='_blank' href="idisreport?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><img src="print.png" title="Print Report" width="100" height="60" /></a></td>  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	
	
	
	<br><br>


 <tr>
     <td colspan='20' style="background-color:red;font-size:22px;font-weight:bold"><strong>Today's Emergency Patients</strong></td>
	 </tr>

    
    <tr>
     <th width="4%"style="background-color:lightgreen;font-size:20px;font-weight:bold"><strong>S.No</strong></th>
      <th width="17%" style="background-color:lightgreen;font-size:20px;font-weight:bold"><strong>Patient's Name</strong></th>
      <th width="10%" style="background-color:lightgreen;font-size:20px;font-weight:bold"><strong>MRN</strong></th>
      <th width="15%" style="background-color:lightgreen;font-size:20px;font-weight:bold"><strong>Doctor's Name </strong>
      <th width="14%" style="background-color:lightgreen;font-size:20px;font-weight:bold"><strong>Admission Date</strong>   
      <th width="14%" style="background-color:lightgreen;font-size:20px;font-weight:bold"><strong>Room No</strong>
      <th width="14%" style="background-color:lightgreen;font-size:20px;font-weight:bold"><strong>Assessment</strong>
      
<th width="14%" style="background-color:lightgreen;font-size:20px;font-weight:bold"><strong>Discharge Note</strong>	  


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date2= date('m/d/Y');
$date3= date('Y-m-d');

$coun1t=1;



$sel_query1="Select * from emergency where discharge IN ('discharged','Admitted','transfer') and adate2='$date3'order by discharge asc;";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["pname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?>
	  
	  
  	    
      <td align="center"><?php echo $row1["adate"]; ?>
      <td align="center"><?php echo $row1["room"]; ?>  
	  
	  <td align="center"><?php echo $row1["discharge"]; ?> 
<td align="center"><a target='_blank' href="esummaryprint.php?pmrn=<?php echo $row1['pmrn']; ?>&eid=<?php echo $row1['eid']; ?>"><img src="print.png" title="Print Report" width="100" height="60" /></a></td>

<td align="center"><a target='_blank' href="disreport.php?pmrn=<?php echo $row1['pmrn']; ?>&eid=<?php echo $row1['eid']; ?>"><img src="print.png" title="Print Report" width="100" height="60" /></a></td>
	  

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>
