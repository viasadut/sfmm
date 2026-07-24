<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=$url1");

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
$date3=date('d/m/Y');


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
   <li><a href='viewnew11'><span>Home</span></a></li>
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
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Gender</strong></th>
	  <th width="10%"><strong>Age</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      
	  <th width="14%"><strong>Episode</strong> 
      <th width="14%"><strong>Referred From</strong>  
	  <th width="14%"><strong>Status</strong>

	        <th width="14%"><strong>NEW</strong>


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from pappnew where dname= '$full' and adate= '$date' and status='HISTORY UPDATED' and `bill`='Billed' ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center">
	  
	  <?php
		
		$gender=$row["psex"];
		$ID=$row["ID"];
		$pm=$row["pmrn"];
		$pname=$row["pname"];
		
		
		$url = "newtestformattestf?ID=$ID&pmrn=$pm"; 
		$url1 = "newtestformattestm?ID=$ID&pmrn=$pm"; 
	if($gender=='F')
	{ 
echo "<a href='$url'>$pname</a>";
	}
	
	else{
		echo "<a href='$url1'>$pname</a>";
		
		
	}
	
	?>
	  
	  
	  
	  </td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>  
	  <td align="center"><?php echo $row["page"]; ?>  
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $date3; ?>  
	  
	  
	 

<?php 

$pmrn1= $row['pmrn'];
$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn1';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count2 =$row43['COUNT(pmrn)'];
?>
<td align="center"><?php echo $count2; ?>  
	  <td align="center"><?php echo $row["dreffer"]; ?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 

	   <td align="center">
	   
	   <?php
		
		$gender=$row["psex"];
		$ID=$row["ID"];
		$pm=$row["pmrn"];
		
		
		$url = "newtestformattestf?ID=$ID&pmrn=$pm"; 
		$url1 = "newtestformattestm?ID=$ID&pmrn=$pm"; 
	if($gender=='F')
	{ 
echo "<a href='$url'>NEW</a>";
	}
	
	else{
		echo "<a href='$url1'>NEW</a>";
		
		
	}
	
	?>
	
	   
	   
	   
	   
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

<br><br>
<p> SEEN PATIENTS</p>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="14%"><strong>Gender</strong>  
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Seen Time</strong> 
      <th width="14%"><strong>EPISODE</strong>
      <th width="14%"><strong>EDIT</strong>


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query1="Select * from pappnew where dname= '$full' and adate= '$date' and status='SEEN' and `bill`='Billed' ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query1);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center">
	  
	    <?php
	  
	  
		
		$gender=$row["psex"];
		$ID=$row["ID"];
		$pm=$row["pmrn"];
		$ei=$row["eid"];
		$pname=$row["pname"];
		$pd= $row['dname'];		
		$dt1=$row['adate'];

		
		$url = "preeditg?pmrn=$pm&eid=$ei&dname=$pd&date=$dt1&id=$ID&ID=$ID";
		//$url = "preeditg?ID=$ID&pmrn=$pm"; 
		$url1 = "preeditf?pmrn=$pm&eid=$ei&dname=$pd&date=$dt1&id=$ID&ID=$ID";
	if($gender=='F')
	{ 
echo "<a href='$url1'>$pname</a>";
	}
	
	else{
		echo "<a href='$url'>$pname</a>";
		
		
	}
	
	?>
	  
	  
	  
	  </td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>  
	  <td align="center"><?php echo $row["page"]; ?>  
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $date3; ?>  
	  
	  
	 

<?php 

$pmrn1= $row['pmrn'];
$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn1';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count2 =$row43['COUNT(pmrn)'];
?>
<td align="center"><?php echo $count2; ?>  
	  <td align="center"><?php echo $row["dreffer"]; ?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 

	   <td align="center">
	   
	  <?php
	  
	  
		
		$gender=$row["psex"];
		$ID=$row["ID"];
		$pm=$row["pmrn"];
		$ei=$row["eid"];
		$pname=$row["pname"];
		$pd= $row['dname'];		
		$dt1=$row['adate'];

		
		$url = "preeditg?pmrn=$pm&eid=$ei&dname=$pd&date=$dt1&id=$ID&ID=$ID";
		//$url = "preeditg?ID=$ID&pmrn=$pm"; 
		$url1 = "preeditf?pmrn=$pm&eid=$ei&dname=$pd&date=$dt1&id=$ID&ID=$ID";
	if($gender=='F')
	{ 
echo "<a href='$url1'>Edit</a>";
	}
	
	else{
		echo "<a href='$url'>Edit</a>";
		
		
	}
	
	?>
	
	</tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>
</form>


</body>

</html>
