<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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
  $pmrn = $_REQUEST['pmrn'];
  $eid = $_REQUEST['eid'];
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Emergency Patients List </p> 
<form action="" method="GET">


<p> Today's Discharge Patients</p>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Patient Type</strong></th>
      <th width="14%"><strong>Gender</strong>  
      <th width="15%"><strong>Admission Date </strong>
      <th width="14%"><strong>Zone</strong> 
      <th width="14%"><strong>Age</strong>
	  <th width="14%"><strong>Status</strong>
	  
	       <th width="14%"><strong>Summary</strong>
		         <th width="14%"><strong>Discharge Report</strong>
      


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date2= date('m/d/Y');
$date3= date('Y-m-d');

$coun1t=1;



$sel_query1="Select * from emergency where pmrn='$pmrn' and eid='$eid' and adate2='$date3'order by discharge asc;";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["pname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?>
	  
	  <?php
	  $tr=$row1['type'];
	  if($row1['type']=='Staff' || $row1['type']=='Staff Spouse' || $row1['type']=='Staff Children' || $row1['type']=='Consultant')
	{ 
echo "<td align='center' style='background-color:lightblue;'>".$tr."</td>";
	}
	
	else if($row1['type']=='General') 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>".$tr."</td>";
	}
	
	else if($row1['type']=='VIP') 
	{ 
echo "<td align='center' style='background-color:red;'>".$tr."</td>";
	}
	
	
	else if($row1['type']=='Corporate') 
	{ 
echo "<td align='center' style='background-color:lightyellow;'>".$tr."</td>";
	}
	
	else
	{ 
echo "<td align='center'>".$tr."</td>";
	}
	  ?>
  	  <td align="center"><?php echo $row1["gender"]; ?>  
      <td align="center"><?php echo $row1["adate"]; ?>
      <td align="center"><?php echo $row1["room"]; ?>  
	  <td align="center"><?php echo $row1["age"]; ?> 
	  <td align="center"><?php echo $row1["discharge"]; ?> 
<td align="center"><a target='_blank' href="esummaryprint.php?pmrn=<?php echo $row1['pmrn']; ?>&eid=<?php echo $row1['eid']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>

<td align="center"><a target='_blank' href="disreport.php?pmrn=<?php echo $row1['pmrn']; ?>&eid=<?php echo $row1['eid']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>
	  

	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>
</form>


</body>

</html>
