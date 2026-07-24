<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="emergency"){
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
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
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

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Today's Discharge Patients</p> 
<form action="" method="GET">




<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<td colspan="10" align="right"><a target='_blank' href="endatewise.php"><b>See Datewise Report<b></a></td>	  

    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="14%"><strong>Gender</strong>  
      <th width="15%"><strong>Admission Date </strong>
      <th width="14%"><strong>Zone</strong> 
      <th width="14%"><strong>Age</strong>
	  
	       <th width="14%"><strong>Summary</strong>
		         <th width="14%"><strong>Discharge Report</strong>
				 		  <th width="14%"><strong>All Reports</strong>
      


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date2= date('m/d/Y');
$count=1;



$sel_query1="Select * from emergency where discharge= 'discharged' and ddate1='$date2'order by adate desc;";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["pname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?>
  	  <td align="center"><?php echo $row1["gender"]; ?>  
      <td align="center"><?php echo $row1["adate"]; ?>
      <td align="center"><?php echo $row1["room"]; ?>  
	  <td align="center"><?php echo $row1["age"]; ?> 
<td align="center"><a target='_blank' href="enpall1.php?pmrn=<?php echo $row1['pmrn']; ?>&eid=<?php echo $row1['eid']; ?>">Summary</a></td>	  

<td align="center"><a target='_blank' href="disreport.php?pmrn=<?php echo $row1['pmrn']; ?>&eid=<?php echo $row1['eid']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>
<td ><a target='_blank' href="allaereport.php?pmrn=<?php echo $row1["pmrn"]; ?>&eid=<?php echo $row1["eid"]; ?>"><img src="mr.jpg" title="Print Report" width="100" height="100" /></a></td>
	  

	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>
</form>


</body>

</html>
