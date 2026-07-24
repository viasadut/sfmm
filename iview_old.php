<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 600; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s In-Patients List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<h1 align="center"style="background-color:lightgreen;">In-Patient List</h1>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
	  <th width="24%"><strong>Working Diagnosis</strong>
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Go</strong>
      <th width="5%"><strong>Transfer Bed</strong>
	  <th width="5%"><strong>PWL</strong>
	  <th width="10%"><strong>Covid Result</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where adoc= '$full' and discharge=''";
//$start=$row["aadate"];

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["adoc"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	   <?php
$tt1=$row['pmrn'];
$date455=$row['anew'];
$rid=$row['eid'];


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($row['anew']));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];



?>

	  
	  
	  
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>
	  
	  
	  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["adoc"]; ?>">GO</a></td>
<td align="center"><a href="tdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer</a></td>	  
<td align="center"><a href="todolistdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>	  
	  
	 

<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>




      </tr>
    <?php $count++; } ?>
  </tbody>
</table>

<br><br>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<h1 align="center"style="background-color:lightblue;">Referral Patient List</h1>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Referred By </strong>
      <th width="14%"><strong>Referred Date</strong>   
      <th width="14%"><strong>Gender</strong>
      <th width="14%"><strong>Age</strong>
	  <th width="14%"><strong>Working Diagnosis</strong>
	  <th width="14%"><strong>Ward</strong>
      <th width="14%"><strong>Bed</strong>
      <th width="14%"><strong>Go</strong>
	  <th width="14%"><strong>Transfer</strong>
	  <th width="14%"><strong>PWL</strong>
	  <th width="14%"><strong>Covid Test</strong>
	  <th width="14%"><strong>Cancel Referral </strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	

	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from irefferal where infusion= '$full' and status='' and tstatus='' and sid='$fullname' and cstatus='Active'and user!='Covid Unit'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["infusion"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["user"]; ?>
      <td align="center"><?php echo $row["odate"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pgender"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["page"];?>  
	 
 <?php
$tt1=$row['pmrn'];
$date455i=$row['ndate'];
$rid=$row['eid'];


$queryi = "SELECT * FROM inpatient where pmrn= '$tt1' and eid='$rid'"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);

$date455=$rowi['anew'];


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($rowi['anew']));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];



?>

	  
	  
	  
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>


	 <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ward"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["bed1"];?>  
	  <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["infusion"]; ?>">GO</a></td>
<td align="center"><a href="tdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer</a></td>	  
<td align="center"><a href="todolistdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>	  
	  

<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>


 <?php 
	  
	  $uu=$row['infusion'];
	  $id=$row['id'];
	  
	  
	  $url40="can_refer?id=$id";
	  ?>
	  
	  
	  
	   <td align="center"><?php if($full==$uu){echo"<a onclick='return confirm_click();' href='$url40'><strong>Cancel Referral</strong></a>";} else {echo '';}?></td>


      </tr>
    <?php $count++; } ?>
  </tbody>
  <tr><td colspan="20" align="Right"><a target='_blank' href="testpdfpa.php?dname=<?php echo "$full"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>
</table>



<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<h1 align="center"style="background-color:red;">Referral Patient From Covid Unit</h1>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Referred By </strong>
      <th width="14%"><strong>Referred Date</strong>   
      <th width="14%"><strong>Gender</strong>
      <th width="14%"><strong>Age</strong>
	  <th width="14%"><strong>Working Diagnosis</strong>
	  <th width="14%"><strong>Ward</strong>
      <th width="14%"><strong>Bed</strong>
      <th width="14%"><strong>Go</strong>
	  <th width="14%"><strong>Transfer</strong>
	  <th width="14%"><strong>PWL</strong>
	  <th width="14%"><strong>Covid Test</strong>
	  <th width="14%"><strong>Cancel Referral </strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	

	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from irefferal where infusion= '$full' and status='' and tstatus='' and sid='$fullname' and cstatus='Active' and user='Covid Unit'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["infusion"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["user"]; ?>
      <td align="center"><?php echo $row["odate"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pgender"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["page"];?>  
	 
 <?php
$tt1=$row['pmrn'];
$date455i=$row['ndate'];
$rid=$row['eid'];


$queryi = "SELECT * FROM inpatient where pmrn= '$tt1' and eid='$rid'"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);

$date455=$rowi['anew'];


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($rowi['anew']));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];



?>

	  
	  
	  
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>


	 <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ward"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["bed1"];?>  
	  <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["infusion"]; ?>">GO</a></td>
<td align="center"><a href="tdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer</a></td>	  
<td align="center"><a href="todolistdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>	  
	  

<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>


 <?php 
	  
	  $uu=$row['infusion'];
	  $id=$row['id'];
	  
	  
	  $url40="can_refer?id=$id";
	  ?>
	  
	  
	  
	   <td align="center"><?php if($full==$uu){echo"<a onclick='return confirm_click();' href='$url40'><strong>Cancel Referral</strong></a>";} else {echo '';}?></td>


      </tr>
    <?php $count++; } ?>
  </tbody>
  <tr><td colspan="20" align="Right"><a target='_blank' href="testpdfpa.php?dname=<?php echo "$full"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>
</table>






<br><br>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<h1 align="center"style="background-color:orange;">Today's Discharged Patients List</h1>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
	  <th width="24%"><strong>Working Diagnosis</strong>
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Go</strong>
      
	  <th width="5%"><strong>PWL</strong>
	  <th width="10%"><strong>Covid Result</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from inpatient where adoc= '$full' and discharge='Discharged' and dnew='$date'";
//$start=$row["aadate"];

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["adoc"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	   <?php
$tt1=$row['pmrn'];
$date455=$row['anew'];
$rid=$row['eid'];


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($row['anew']));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];



?>

	  
	  
	  
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>
	  
	  
	  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["adoc"]; ?>">GO</a></td>

<td align="center"><a href="todolistdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>	  
	  
	 

<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>




      </tr>
    <?php $count++; } ?>
  </tbody>
</table>



</form>

</body>

</html>
