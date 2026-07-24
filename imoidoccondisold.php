<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

//include("auth.php");
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$query = "SELECT * from inpatient where pmrn='$pmrn' and eid='$eid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$phone= $row['pphone'];  
$pa= $row['age'];
$pdate= $row['adate'];
$padd= $row['padd'];
$pg= $row['gender'];
$vc= $row['card1'];
$vc1= $row['card2'];
$room1= $row['room1'];
$ac= $row['acard'];

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


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm the Discharge Note ?");
}

</script>


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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Out Patients List </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="5%"><strong>MRN</strong></th>
      <th width="14%"><strong>Discharge Request Time </strong>
      <th width="10%"><strong>Bill Confirmed Time</strong> 
      <th width="12%"><strong>Prepare Discharge Note</strong>  
      <th width="10%"><strong>View / Edit</strong>  
	  <th width="14%"><strong>Consultant Confirmation</strong>  

	       


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where eid='$eid' and pmrn='$pmrn' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dstatustime"]; ?>
      <td align="center"><?php echo $row["bstatustime"]; ?>  
	  
	   

<td align="center"><a href="imoidisreport?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Prepare Discharge Note</a></td>
<td align="center"><a href="indischarge1edit?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Edit</a></td>	  	  	  
      <td align="center"><b><?php echo $row["dconfirm"]; ?>  
	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

<br><br>
<p><b> Discharge Bill Confirmed Patient<b></p>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="14%"><strong>Discharge Request Time</strong>  
      <th width="15%"><strong>Bill Confirmed Time </strong>
      <th width="14%"><strong>Doctor Name</strong> 
      <th width="14%"><strong>Episode</strong>
      <th width="14%"><strong>Print</strong>
	<th width="14%"><strong>Confirm</strong> 
<th width="14%"><strong>Death Ceartificate</strong> 	

	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$coun1t=1;



$sel_query1="Select * from inpatient where eid='$eid' and pmrn='$pmrn' and disstatus='Discharge Bill Confirmed' ORDER BY id asc;";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["pname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?>
  	  <td align="center"><?php echo $row1["dstatustime"]; ?>  
      <td align="center"><?php echo $row1["bstatustime"]; ?>
      <td align="center"><?php echo $row1["adoc"]; ?>  
	  <td align="center"><?php echo $row1["eid"]; ?>  


	  <td ><a target='_blank' href="idisreport?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="100" height="60" /></a></td>  

<td align="center" colspan="1"><a onclick="return confirm_click();" href="idisupdate1?eid=<?php echo $row1["eid"]; ?>&pmrn=<?php echo $row1["pmrn"]; ?>&room1=<?php echo "$room1"; ?>&vc=<?php echo "$vc"; ?>&vc1=<?php echo "$vc1"; ?>&ac=<?php echo "$ac"; ?>&user=<?php echo "$fullname"; ?>">Click To Vacant the Bed</a></td>
<td><a href="death2?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><b>Issue Death Certificate<b></a></td>
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>
</form>


</body>

</html>
