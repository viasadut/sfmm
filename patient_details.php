<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf','rad','doctor','moopd','ddf1','staff','histo','doctor','nurse','imo','mofficer','physio','outdoc','techbio','endo','oic')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
$tt=$_SERVER['HTTP_HOST']	;
$pmrn=$_REQUEST['pmrn'];
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

$death = "SELECT COUNT(id) FROM deathn where pmrn= '$pmrn'"; 
	 
$result_d = mysqli_query($con, $death) or die(mysqli_error());

// Print out result
$row_d = mysqli_fetch_array($result_d);

$d1=$row_d['COUNT(id)'];





$death_b = "SELECT COUNT(id) FROM deathb where pmrn= '$pmrn'"; 
	 
$result_b = mysqli_query($con, $death_b) or die(mysqli_error());

// Print out result
$row_b = mysqli_fetch_array($result_b);

$d2=$row_b['COUNT(id)'];

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
   <script src="jnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>



<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">PATIENTS RECORD </p> 

<h2 align="right" style="color:red;">	
<?php if
($tt=='192.168.100.252:8081')
	{ 
	echo '<form target="_blank" action=http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="PatientID" value="'.$pmrn.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}


else if
($tt!='192.168.100.252:8081')
	{ 
	echo'<form target="_blank" action="http://182.160.124.36/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="PatientID" value="'.$pmrn.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}
?>
</h2>
<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan='20' align='right'>&nbsp;&nbsp;<a target='_blank' href="patient_all_reports?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>ALL REPORTS<b></a>&nbsp;&nbsp;<a target='_blank' href="surgery_reports?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>SURGERY NOTES<b></a>&nbsp;&nbsp;<a target='_blank' href="patient_procedure_report?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>OPD PROCEDURE NOTES<b></a>&nbsp;&nbsp;<a target='_blank' href="tender/equipment/patient_all_image?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>ALL IMAGE<b></a></td></tr>
<a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>">
<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightbrown"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>PATIENTS OPD RECORD<b> </td> </tr>
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
      <th width="14%"><strong>PhoneNo</strong>   
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
      
	  <td align="center"></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo date('d/m/Y',strtotime($row["date1"])); ?>
      <td align="center"><?php echo $row["pphone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
<?php	  $date=$row["date"] ;?>
	 
	  <td align="center"><a target='_blank' href="prescription/prescription/patient_pres?pmrn=<?php echo "$pmrn"; ?>&date=<?php echo "$date"?>&dname=<?php echo $row["dname"];?>&eid=<?php echo $row["eid"];?>"><img src="print.png" title="Print Report" width="50" height="40" /></a></td>

	  
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
	  <th width="14%"><strong>Discharge Note</strong>
	  

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
      <td align="center"></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["gender"]; ?></td>
	  <td align="center"><?php echo $row["age"]; ?></td>
	  	 <td align="center"><?php echo date('d/m/Y',strtotime($row["anew"])); ?></td>
		  <td align="center"><?php echo $row["adoc"];?></td> 
		  <td align="center"><?php echo $row["room"];?></td> 
		  <td align="center"><?php echo $row["discharge"];?></td> 
	  <td align="center"><a href="ipd_patient_details?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">DETAILS</a></td>
	  	 
<?php if($row39['ugroup']!='techbio')
{echo
		 '<td align="center"><a href="ipall?pmrn='.$row["pmrn"].'&eid='.$row["eid"].'">Summary Charges</a></td>
		 <td align="center"><a href="inassess?pmrn='.$row["pmrn"].'&eid='.$row["eid"].'">MO Assessment</a></td>';
		 
}?>
<td><a target='_blank' href="patient_discharge?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><img src="print.png" title="Print Report" width="50" height="40" /></a></td>  



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
      <th width="14%"><strong>Print</strong>
	  
	  <th width="14%"><strong>Photo</strong>

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
      <td align="center"><?php echo date('d/m/Y',strtotime($row["adate2"])); ?></td>
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?> 
<?php	  $date=$row["room"] ;?>
	<td align="center" ><a target='_blank' href="esummaryprint.php?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><img src="print.png" title="Print Report" width="50" height="40" /></a></td>	

	  
	   

	  
	  
	  <td align="center">
	  <?php

$re=$row['eid'];
$sel_queryz="Select * from e_gallery where pmrn= '$pmrn' and eid='$re';";

$resultz = mysqli_query($con,$sel_queryz);

while($rowz = mysqli_fetch_assoc($resultz)) 
{ ?>  

      <a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="aepic/<?php echo $rowz['image'] ?>">
                         
                        <div class='text-center'>
                            <small class='text-muted'>
							
							<?php echo $rowz['image'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
      
    <?php $count++; } ?>


	  </td>
	  
      </tr>
    <?php $count++;  }?>
  </tbody>
  
  
  
  
 <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>Death Certificate<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  
<tr>  <td colspan="20">
<?php if($d2>0){echo'

<a target="_blank" href="deathprintoriginal?pmrn='.$pmrn.'"><img src="print.png" title="Print Report" width="50" height="40" /></a>';}

else if($d1>0){echo'

<a target="_blank" href="deathprint11_all?pmrn='.$pmrn.'"><img src="print.png" title="Print Report" width="50" height="40" /></a>';}
?>
</td> 
  </table>
</form>

</body>

</html>
