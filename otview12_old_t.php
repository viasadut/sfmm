<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");
$test=date('Y-m-d', strtotime('-1 days') );
$test1=date('Y-m-d');
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
//$full = $row39['fullname'];
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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Cancel The OT ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Send the Patient to cunnent bed?");
}

</script>

</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='cviewsp1'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='cview'><span>List of Unpaid Appointment</span></a>
            
         </li>
		 		 <li class='has-sub'><a href='cviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
      </ul>
	  
   </li>

    	    <li class='last'><a href='gg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='app1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="cviewsp1" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th ><strong>S.No</strong></th>
      <th ><strong>Patient's Name</strong></th>
      <th ><strong>MRN</strong></th>
      <th ><strong>Appointment Date </strong>
      <th ><strong>Type</strong>   
      <th ><strong>Surgeon Name</strong>
	  <th ><strong>Second Surgeon Name</strong>
	  <th ><strong>Third Surgeon Name</strong>
	  <th ><strong>Anaesthetist Name</strong>
	  <th ><strong>Book Time</strong>
	  <th ><strong>Duration Time</strong>
	  <th ><strong>OT Name</strong>
      <th ><strong>Findings</strong>
      
	        <th ><strong>Type</strong>
			<th ><strong>Receive</strong>
			<th ><strong>Cancel</strong>
			<th ><strong>Covid Result</strong>
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from ot where status='' and date5 between '$test' and '$test1' ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "List Of Today's Not Received OT Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
      <td align="center"><?php echo $row["otdate"]; ?></td>
	  	  <td align="Left"><?php echo $row["proce"].' ' .$row["Otherins"]; ?> </td>
      
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname1"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname2"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["nanes"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php 
	  $id=$row['id'];
	  $url_ot = "ot1nurse9_new1?id=$id"; 
	  
	  
	  if($row['stime']!='' and $row['etime']!='') {echo $row["stime"].' To '.$row["etime"];} else {echo "<a href='$url_ot'>Set OT Time</a>";}?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration2"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration"];?> </td>
	  <td align="center"><?php echo $row["procedure2"]; ?>  </td>
	  
	  
	  <?php
	  
	  $tt1=$row["pmrn"];
	  $queryi = "SELECT * FROM inpatient where pmrn= '$tt1' and discharge=''"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);


	  
//$tt1=$row["pmrn"];
$date455=$rowi['anew'];
$rid=$rowi['eid'];
$tt2=$row["pname"];

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

	  
      

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>
		   
		   
		   
		   <?php
		$m_c=$row['m_clearance'];
		$rid=$row['id'];
		$pp=$row['pmrn'];
		
		$url = "otpatientreceive?pmrn=$pp&id=$rid"; 
		   
		   
		
	if($m_c!='')
	{ 
echo "<td align='center' style='background-color:lightblue;'><a target='_blank' href='$url'>RECEIVE</a></td>";
	}
	
	else 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>Waiting For Finance Clearance</td>";
	}
	
	?>
		   
		   
		   
		
		<td align="center"><a href="otcancelnurse?id=<?php echo $row["id"]; ?>"> Cancel</a></td>


<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>


	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

<br><br>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th ><strong>S.No</strong></th>
      <th ><strong>Patient's Name</strong></th>
      <th ><strong>MRN</strong></th>
      <th ><strong>Appointment Date </strong>
      <th ><strong>Type</strong>   
      <th ><strong>Surgeon Name</strong>
	  <th ><strong>Second Surgeon Name</strong>
	  <th ><strong>Third Surgeon Name</strong>
	  <th ><strong>Anaesthetist Name</strong>
	  <th ><strong>Book Time</strong>
	  <th ><strong>Duration Time</strong>
	  <th ><strong>OT Name</strong>
      <th ><strong>Findings</strong>
      
	        <th ><strong>Type</strong>
			<th ><strong>Details</strong>
			<th ><strong>Send C.Bed</strong>
			<th ><strong>Transfer</strong>
			<th ><strong>Cancel</strong>
			<th ><strong>Covid Result</strong>
			
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from ot where status='Received' and room2 ='' and room3 ='' and date5 between '$test' and '$test1'  ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "List Of Today's Received OT Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><a href="otpatientreceive?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></a>
      <td align="center"><?php echo $row["otdate"]; ?>
	  	  <td align="Left"><?php echo $row["proce"].' ' .$row["Otherins"]; ?> 
      
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname1"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname2"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["nanes"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"].' To '.$row["etime"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration1"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration"];?> 
	  <td align="center"><?php echo $row["procedure2"]; ?>  
      
 <?php
	  
	  $tt1=$row["pmrn"];
	  $queryi = "SELECT * FROM inpatient where pmrn= '$tt1' and discharge=''"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);


	  
//$tt1=$row["pmrn"];
$date455=$rowi['anew'];
$rid=$rowi['eid'];
$tt2=$row["pname"];

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
	  
	  
	  
	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>
		   
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="otpatientdash?id=<?php echo $row["id"]; ?>">Details</a> </td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click1();" href="otsendcurrent?id=<?php echo $row["id"]; ?>&room2=<?php echo $row["room"]; ?>&room3=<?php echo $row["room1"]; ?>">Send To Current bed</a> </td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="ottransfer?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer</a> </td>
		   <td align="center"><a href="otcancelnurse?id=<?php echo $row["id"]; ?>"> Cancel</a></td>

	       <td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>


	  
      </tr>
    <?php $count++; } ?>







	
	
  </tbody>
</table>

<br><br>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th><strong>S.No</strong></th>
      <th><strong>Patient's Name</strong></th>
      <th><strong>MRN</strong></th>
      <th><strong>Appointment Date </strong>
      <th><strong>Type</strong>   
      <th><strong>Surgeon Name</strong>
	  <th><strong>Second Surgeon Name</strong>
	  <th><strong>Third Surgeon Name</strong>
	  <th><strong>Anaesthetist Name</strong>
	  <th><strong>Book Time</strong>
	  <th><strong>Duration Time</strong>
	  <th><strong>OT Name</strong>
      <th><strong>Findings</strong>
      
	        <th><strong>Type</strong>
			
			<th><strong>Send to (Ward)</strong>
			<th><strong>Send to (Bed)</strong>
			<th><strong>All Charges</strong>
			
			
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from ot where status='Received' and otdate='$date' and room2 !='' and room3 !='' ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "List Of Today's Sent Patients from OT ";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><a href="otpatientreceive?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></a>
      <td align="center"><?php echo $row["otdate"]; ?>
	  	  <td align="Left"><?php echo $row["proce"].' ' .$row["Otherins"]; ?> 
      
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname1"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname2"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["nanes"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"].' To '.$row["etime"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration1"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration"];?> 
	  <td align="center"><?php echo $row["procedure2"]; ?>  
      

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>
		   
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room2"];?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room3"];?></td>
		   	       <td><a target='_blank' href="otuse.php?pmrn=<?php echo $row['pmrn']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>


	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	







	
	
  </tbody>
</table>
<br><br>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Date </strong>
      <th ><strong>Type</strong>   
      <th ><strong>Surgeon Name</strong>
	  <th ><strong>Second Surgeon Name</strong>
	  <th ><strong>Third Surgeon Name</strong>
	  <th ><strong>Anaesthetist Name</strong>
	  <th ><strong>Book Time</strong>
	  <th ><strong>Duration Time</strong>
	  <th ><strong>OT Name</strong>
      <th ><strong>Findings</strong>
      
	        <th ><strong>Type</strong>
			<th ><strong>Status</strong>
			<th ><strong>Cancel Reason</strong>
			<th ><strong>Cancel By</strong>
			
			
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from ot where status='Cancel' and otdate='$date' ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "List Of Today's Cancelled OT Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><a href="otpatientreceive?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></a>
      <td align="center"><?php echo $row["otdate"]; ?>
	  	  <td align="Left"><?php echo $row["proce"].' ' .$row["Otherins"]; ?> 
      
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname1"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname2"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["nanes"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"].' To '.$row["etime"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration1"];?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration"];?> 
	  <td align="center"><?php echo $row["procedure2"]; ?>  
      

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>
		   
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?></td>
		   <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["creason"];?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["cby"];?></td>



	       


	  
      </tr>
    <?php $count++; } ?>







	
	
  </tbody>
</table>

</form>


</body>

</html>
