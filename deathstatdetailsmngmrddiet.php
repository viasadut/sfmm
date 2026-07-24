<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('diet','gpopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');

$pmrn=$_REQUEST['pmrn'];
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

<p align="center" class="style1">PATIENTS RECORD </p> 

<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>">
<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightbrown"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>PATIENTS OPD RECORD<b> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a  target='_blank' href="allreportdocnew?pmrn=<?php echo $pmrn; ?>" style="color:black;font-size:20px;font-weight:bold;">ALL REPORTS</a>


  </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong>   
      <th width="14%"><strong>Status</strong>
      <th width="14%"><strong>PRINT</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$count=1;
$sel_query="Select * from presnew where pmrn= '$pmrn' order by ID desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["date"]; ?>
      <td align="center"><?php echo $row["pphone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
<?php	  $date=$row["date"] ;?>
	  <td align="center"><a target='_blank' href="p5new?pmrn=<?php echo "$pmrn"; ?>&date=<?php echo "$date"?>&dname=<?php echo $row["dname"];?>&eid=<?php echo $row["eid"];?>"><img src="print.png" title="Print Report" width="50" height="20" /></a></td>

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="skyblue"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>PATIENTS IPD RECORD<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>


  <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Gender</strong>
      <th width="14%"><strong>Age</strong>   
	        <th width="14%"><strong>Admission Date</strong>   
			<th width="14%"><strong>Doctor Name</strong>   
      <th width="14%"><strong>Zone</strong>
      <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Details</strong>
	  <th width="14%"><strong>Discharge Summary</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	

$count=1;
$sel_query="Select * from inpatient where pmrn= '$pmrn' order by id desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["gender"]; ?></td>
	  <td align="center"><?php echo $row["age"]; ?></td>
	  	  <td align="center"><?php echo $row["adate"];?></td> 
		  <td align="center"><?php echo $row["adoc"];?></td> 
		  <td align="center"><?php echo $row["room"];?></td> 
		  <td align="center"><?php echo $row["discharge"];?></td> 
	  <td align="center"><a href="ipallmrdmngmrddiet?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">DETAILS</a></td>
<td><a target='_blank' href="idisreport?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><img src="print.png" title="Print Report" width="100" height="60" /></a></td>  
    <?php $count++;  }?>
  </tbody>
  
  
  
  
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>PATIENTS EMERGENCY RECORD<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
<tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Address</strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Zone</strong>
      <th width="14%"><strong>PRINT</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$count=1;
$sel_query="Select * from emergency where pmrn= '$pmrn' order by id desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["padd"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?> 
<?php	  $date=$row["room"] ;?>
	<td colspan="10"><a target='_blank' href="esummaryprint.php?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	

	  
      </tr>
    <?php $count++;  }?>
  </tbody>
  
  </table>
</form>

</body>

</html>
