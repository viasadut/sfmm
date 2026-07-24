<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$pmrn=$_REQUEST['pmrn'];
 
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
<table width="100%" height ="100%" borde]r="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <td colspan="1"align="center"><strong>S.No</strong></td>
      <td colspan="1"align="center"><strong>Patient's Name</strong></td>
      <td colspan="1"align="center"><strong>MRN</strong></td>
      <td colspan="1"align="center"><strong>ID </strong></td>
      <td colspan="2"align="center"><strong>Date</strong></td>   
      <td colspan="1"align="center"><strong>Phone</strong></td>
      <td colspan="1"align="center"><strong>GO</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	

$sel_query="Select * from idischarge1 where pmrn='$pmrn' order by id desc;";
 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="1"align="center"><?php echo $row["pname"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pmrn"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["id"]; ?> </td> 
      <td colspan="2"align="center"><?php echo $row["ddate"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pphone"]; ?> </td>
	  
	  <?php
	  
	  $pm=$row['pmrn'];
	  $pid=$row['id'];
	  $pid1=$row['id'];
     $eid=$row['eid'];
	  $dd1=$row['date1'];
	  $url = "lab_bill_test2?pmrn=$pm&ID=$pid1&date=$dd1"; 
	  $url1 = "lab_bill_test2?pmrn=$pm&ID=$pid1&date=$dd1";
	  $runningTime = date('mYdsi');
	  ?>
	  
	  <td align="center">
	  
	  <a href="phar_update_new1_dis?pid=<?php echo $pid;?>&pmrn=<?php echo $pm;?>&eid=<?php echo $eid;?>&sno=<?php echo $runningTime;?>"><span>Go</span></a>
	  
	  </td>
	  

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>
