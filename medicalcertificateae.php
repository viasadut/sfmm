<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mofficer"){
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
   <li><a href='ccview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='ccggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ccami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='ccviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
		 
      </ul>
	  
   </li>

    	    <li class='last'><a href='ccgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4new1'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='ccapp1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">SEARCH PANEL FOR  PATIENTS RECORD</p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 
<td colspan="5"><select name="select" required/>
	  <option value=''>-Select Option-</option>
	  <option value='phone'>PHONE</option>
	  <option value='MRN'>MRN</option>
	  </select></td>

<td colspan="5"><input type="text" name="search"placeholder="ENTER PHONE NO OR MRN"></td>

<td colspan="10"><button type="submit" name="bsearch">Search</button></td>
</tr>

    <tr>
      <td colspan="1"align="center"><strong>S.No</strong></td>
      <td colspan="5"align="center"><strong>Patient's Name</strong></td>
      <td colspan="2"align="center"><strong>MRN</strong></td>

      
      <td colspan="4"align="center"><strong>Medical Certificate</strong></td>
	  <td colspan="4"align="center"><strong>Fitnes Certificate</strong></td>
	  <td colspan="4"align="center"><strong>Treatment Certificate</strong></td>
	  <td colspan="4"align="center"><strong>Injury Certificate</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];
if (($_POST['select'])=="phone"){


$sel_query="Select * from patient where phone= '$pmrn';";}
 else{
	 $sel_query="Select * from patient where pmrn= '$pmrn';";
 } 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="5"align="center"><?php echo $row["pname"]; ?></td>
      <td colspan="2"align="center"><?php echo $row["pmrn"]; ?></td>
      
      
	  <td colspan="4"align="center"><a target='_blank' href="medicalcertificate1.php?id=<?php echo $row["ID"]; ?>&pmrn=<?php echo$row["pmrn"];?>">Issue Medical Certificate</a></td>
<td colspan="4"align="center"><a target='_blank' href="medicalcertificate2.php?id=<?php echo $row["ID"]; ?>&pmrn=<?php echo$row["pmrn"];?>">Issue Fitness Certificate</a></td>
<td colspan="4"align="center"><a target='_blank' href="treatmentcertificate.php?id=<?php echo $row["ID"]; ?>&pmrn=<?php echo$row["pmrn"];?>">Issue Treatment Certificate</a></td>
<td colspan="4"align="center"><a target='_blank' href="injurycertificate.php?id=<?php echo $row["ID"]; ?>&pmrn=<?php echo$row["pmrn"];?>">Issue Injury Certificate</a></td>
	  
      </tr>

	<?php $count++;  }}?>

  </tbody>
</table>

</form>

</body>

</html>
