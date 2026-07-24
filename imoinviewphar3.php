<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 15; URL=$url1");

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
$dd=date('m/d/Y');
//include("auth.php");
$runningTime = date('iYsmd'); 
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
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
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

<p align="center" class="style1">WELCOME TO IMO'S Panel</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> <td align="right" colspan="20"><a href="imoinviewtest"><strong>SEARCH</strong></a></td></tr>
<tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr>
    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Medicine</strong>
	  
	  
	  <th width="14%"><strong>Special</strong>
	  <th width="14%"><strong>Careshope</strong>

	  
	  <th width="14%"><strong>Dis Medi</strong>
	  <th width="14%"><strong>Stock Use</strong>
	  
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where discharge= '' order by room asc";

$result = mysqli_query($con,$sel_query);




while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"><?php echo $row["aadate"]; ?>  

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>

<?php 
$pmrn1=$row['pmrn'];
$eid1=$row['eid'];
//$sel90="Select * from imedi3 where pmrn= $pmrn1 and odate='$dd';";
//$result90 = mysqli_query($con,$sel90);
//$row3 = mysqli_fetch_assoc($result90);

$query43 = "SELECT COUNT(pstatus) FROM imedi3 where pmrn= '$pmrn1' and odate='$dd' and pstatus='Ordered' and status !='Cancel';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count55 =$row43['COUNT(pstatus)'];
/*
$query44 = "SELECT COUNT(pstatus) FROM iinfusion where pmrn= '$pmrn1' and odate='$dd' and pstatus='ordered' and status1 !='Cancel';"; 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
$count56 =$row44['COUNT(pstatus)'];*/

/*
$query45 = "SELECT COUNT(pstatus) FROM istat where pmrn= '$pmrn1' and odate1='$dd' and pstatus='ordered' and status1 !='Cancel';"; 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);
$count57 =$row45['COUNT(pstatus)'];
*/

$confirmdn=$row['confirmdn'];
$query445 = "SELECT COUNT(status) FROM istret where pmrn= '$pmrn1' and odate='$dd' and status='Data Updated' and status1 !='Cancel';"; 
$result445 = mysqli_query($con, $query445) or die(mysqli_error());
$row445 = mysqli_fetch_assoc($result445);
$count574 =$row445['COUNT(status)'];


$query445c = "SELECT COUNT(status) FROM careshope1 where pmrn= '$pmrn1' and ordate='$dd' and status='Data Updated';"; 
$result445c = mysqli_query($con, $query445c) or die(mysqli_error());
$row445c = mysqli_fetch_assoc($result445c);
$count574c =$row445c['COUNT(status)'];

$query445d = "SELECT COUNT(medi) FROM idismedi where pmrn= '$pmrn1' and eid='$eid1' and status!='Served';"; 
$result445d = mysqli_query($con, $query445d) or die(mysqli_error());
$row445d = mysqli_fetch_assoc($result445d);
$count574d =$row445d['COUNT(medi)'];


$query445d1 = "SELECT * FROM phar_sale where pmrn= '$pmrn1' and eid='$eid1' and location='Discharge';"; 
$result445d1 = mysqli_query($con, $query445d1) or die(mysqli_error());
$row445d1 = mysqli_fetch_assoc($result445d1);
$count574d1 =$row445d1['sno'];

$query445d12 = "SELECT * FROM phar_sale where pmrn= '$pmrn1' and eid='$eid1' and location in ('ICU','NICU','5AB Medicine stock','5CD Medicine stock','6AB Medicine stock','6CD Medicine stock','HMD','Cathlab and SPD','5AB emergency trolley','5CD emergency trolley','6th Fl emergency trolley','Maternity Suite') and ins='';"; 
$result445d12 = mysqli_query($con, $query445d12) or die(mysqli_error());
$row445d12 = mysqli_fetch_assoc($result445d12);
$count574d12 =$row445d12['rfid'];

$rru=$runningTime+$pmrn1+$eid1
?>

	  <td align="center" <?php if($count55>0): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>><a href="pharinmedi_new?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Medi</a></td>
	  
	  
	  	  <td align="center"<?php if($count574>0): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>><a href="specialphar?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Special</a></td>
		  <td align="center"<?php if($count574c>0): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>><a href="careshope1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Careshope</a></td>


<td align="center"<?php if($confirmdn!=''): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>><?php if($count574d1=='' and $confirmdn!=''){echo"<a href='discharge_medicine_phar?pmrn=".$row['pmrn']."&eid=".$row['eid']."&sno=".$rru."'>Dis Medi</a>";}else if ($count574d1!='' and $confirmdn!=''){echo"<a href='discharge_medicine_phar?pmrn=".$row['pmrn']."&eid=".$row['eid']."&sno=".$rrusss."'>Dis Medi</a>";} else {echo 'Discharge Note Not Confirmed';}?></td>


		  <td align="center"<?php if($count574d12>0): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>><a href="stock_use?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Stock Use</a></td>

  	  	    
        
		
		</td>

			
      </tr>
    <?php $count++; } ?>
   </tbody>
</table>
</form>

</body>

</html>
