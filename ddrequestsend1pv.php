<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ddf"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$test=date('Y-m-d', strtotime('-60 days') );
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
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO PATIENT'S SEARCH PANEL FOR ADMISSION </p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <td colspan="1"align="center"><strong>S.No</strong></td>
      <td colspan="1"align="center"><strong>Patient's Name</strong></td>
      <td colspan="1"align="center"><strong>MRN</strong></td>
      <td colspan="1"align="center"><strong>Address </strong></td>
      <td colspan="2"align="center"><strong>Phone No</strong></td>   
      <td colspan="1"align="center"><strong>Amount Requested</strong></td>
      <td colspan="1"align="center"><strong>Request Time</strong></td>
	  <td colspan="1"align="center"><strong>Status</strong></td>
	  <td colspan="1"align="center"><strong>Location</strong></td>
	  
	  <td colspan="1"align="center"><strong>Go</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	

$dd=date('Y-m-d');
$sel_query="Select * from preadm where drsend between '$test' and '$dd' and ddrequest='settled' and apstatus ='Approved' and pvno !=''order by id desc;";

$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="1"align="center"><?php echo $row["pname"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pmrn"]; ?></td>
	  <td colspan="1"align="center"><?php echo $row["padd"]; ?></td>
      <td colspan="2"align="center"><?php echo $row["pphone"]; ?> </td>
	  <td colspan="1"align="center"><?php echo $row["arequest"]; ?> </td>
	  <td colspan="1"align="center"><?php echo $row["ddin"]; ?> </td>
<td colspan="1"align="center"><?php echo $row["apstatus"]; ?> </td> 	  
	  <td colspan="1"align="center"><?php echo "Inpatient"; ?> </td> 
      
      
	  <td colspan="10">		<a target='_blank' href="ddmngedit1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">UPDATE PV</a></td></tr>
	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
	 <?php
	
$dd=date('Y-m-d');

$sel_query5="Select * from endopapp where drsend between '$test' and '$dd' and ddrequest='settled' and apstatus ='Approved' and pvno !=''  order by id desc;";

	 
$result5 = mysqli_query($con,$sel_query5);



while($row5 = mysqli_fetch_assoc($result5)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="1"align="center"><?php echo $row5["pname"]; ?></td>
      <td colspan="1"align="center"><?php echo $row5["pmrn"]; ?></td>
	  <td colspan="1"align="center"><?php echo $row5["padd"]; ?></td>
      <td colspan="2"align="center"><?php echo $row5["pphone"]; ?> </td>
	  <td colspan="1"align="center"><?php echo $row5["arequest"]; ?> </td>
	  <td colspan="1"align="center"><?php echo $row5["ddin"]; ?> </td> 
	  <td colspan="1"align="center"><?php echo $row5["apstatus"]; ?> </td> 
      <td colspan="1"align="center"><?php echo "Endoscopy Daycare"; ?> </td> 
      
	  
	  <td colspan="10">		<a target='_blank' href="ebilladmddbillendomng1?pmrn=<?php echo $row5["pmrn"]; ?>&eid=<?php echo $row5["eid"]; ?>&id=<?php echo $row5["ID"]; ?>">UPDATE PV</a></td></tr>

	  
      </tr>
    <?php $count++; } ?>
	
	
	
	

	</tbody>
</table>
</form>

</body>

</html>
