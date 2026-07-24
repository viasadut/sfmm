<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('qc','billin','staff','call')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 15; URL=$url1");

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
   <li><a href='homemng'><span>Home</span></a></li>
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
   
   <li class='active has-sub'><a href='#'><span>ADD TOPIC</span></a>
      <ul>
         <li class='has-sub'><a href='addqc'><span>ADD TOPIC</span></a>
            
         </li>
         <li class='has-sub'><a href='topicview'><span>View Topic</span></a>
            
         </li>
		          <li class='has-sub'><a href='addmemberteststaff'><span>ADD Medical Officer</span></a>
				  <li class='has-sub'><a href='addmemberteststaff1'><span>ADD Consultant </span></a>
				  	  <li class='has-sub'><a href='allstaffmngstaff'><span>View All Staff</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   <li class='last'><a href='ddpendingrequest'><span>DD Fund Request</span></a></li>
   
     <li class='active has-sub'><a href='#'><span>Feedback</span></a>
      <ul>
         <li class='has-sub'><a href='feed'><span>New Feedback</span></a>
            
         </li>
         <li class='has-sub'><a href='feedstats'><span>Feedback stats</span></a>
            
         </li>
		 
		 
      </ul>
	  
   </li>
   
   
   <li class='last'><a href='staffdetailsmng1'><span>covid</span></a></li>
   <li class='last'><a href='predoc5'><span>Minutes</span></a></li>
   
    <li class='active has-sub'><a href='#'><span>Event</span></a>
      <ul>
         <li class='has-sub'><a href='event'><span>New Event</span></a>
            
         </li>
         <li class='has-sub'><a href='event_view'><span>View Todays event</span></a>
            
         </li>
		 
		 
      </ul>
	  
   </li>
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">WELCOME TO Inpatient'S Panel</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> <td align="right" colspan="20"><a href="imoinviewtestmng"><strong>SEARCH</strong></a></td></tr>
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
	  <th width="14%"><strong>Details</strong>
	  <th width="14%"><strong>Feedback</strong>
	
  <th width="14%"><strong>PWL</strong>
	  <th width="14%"><strong>Discharge Request</strong>
	  <th width="14%"><strong>Covid Result</strong>
      
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
	<td align="center"><a href="ipallqc?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">DETAILS</a></td> 
<?php 
$pmrn1=$row['pmrn'];
$dd=date('m/d/Y');
$query43 = "SELECT COUNT(pmrn) FROM feedback where pmrn= '$pmrn1' and otime='$dd';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count55 =$row43['COUNT(pmrn)'];

?>	
		<td align="center"<?php if($count55>0): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>><a href="qcfeedback?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Feedback</a></td>  
		<td align="center"><a href="todolistqc?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>
  	  	 	  <?php
$tt1=$row["pmrn"];
$date455=$row['anew'];
$rid=$row['eid'];
$tt2=$row["pname"];
/*
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

*/


$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];



?>

<?php 
$pmrn1=$row['pmrn'];
$eid=$row['eid'];
$disstatus=$row['disstatus'];
$disstatus1=$row['dstatustime'];
$disstatus2=$row['bstatustime'];
$dd=date('m/d/Y');
$query43 = "SELECT COUNT(pmrn) FROM feedback where pmrn= '$pmrn1' and otime='$dd';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count55 =$row43['COUNT(pmrn)'];


$query73="Select COUNT(disstatus) from inpatient where eid='$eid' and pmrn='$pmrn1' and disstatus='Discharge Requested' ORDER BY id asc;";
$result73 = mysqli_query($con, $query73) or die(mysqli_error());
$row73 = mysqli_fetch_assoc($result73);
$count75 =$row73['COUNT(disstatus)'];


$query74="Select COUNT(disstatus) from inpatient where eid='$eid' and pmrn='$pmrn1' and disstatus='Discharge Bill Confirmed'  ORDER BY id asc;";
$result74 = mysqli_query($con, $query74) or die(mysqli_error());
$row74 = mysqli_fetch_assoc($result74);
$count76 =$row74['COUNT(disstatus)'];


$query77="Select COUNT(pnote) from icnote where eid='$eid' and pmrn='$pmrn1' and pnote LIKE '%dengu%'  ORDER BY id asc;";
$result77 = mysqli_query($con, $query77) or die(mysqli_error());
$row77 = mysqli_fetch_assoc($result77);
$count77 =$row77['COUNT(pnote)'];



?>	
<td align="center"<?php if($count76>0): ?> style="background-color:YELLOW;"<?php else: ?> style="background-color:WHITE;" <?php endif ; ?>><?php echo $disstatus;?><br><?php echo $disstatus1;?><br><?php echo $disstatus2;?></a></td>  
<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=5){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=5){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>5){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>

	  
      </tr>
    <?php $count++; } ?>
   </tbody>
</table>
</form>

</body>

</html>
