<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$test=date('Y-m-d', strtotime('-1 days') );
$test1=date('Y-m-d', strtotime('+1 days') );
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
$row39 = mysqli_fetch_array($result39);
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

   <script src="script.js"></script>
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    
    <script src="jsnew/bootstrap.min.js"></script>

   



   
   

   
   
   
   
   

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

		<p align="left" style="background-color:gold;font-size:22px;font-weight:bold">List Of Today's Not Received OT Patients</p>						
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th ><strong>S.No</strong></th>
      <th ><strong>Patient's Name</strong></th>
      <th ><strong>MRN</strong></th>
      <th ><strong>BED</strong></th>
      <th ><strong>Appointment Date </strong>
	  <th ><strong>Booking Time</strong>
      <th ><strong>Type</strong>   
      <th ><strong>Surgeon Name</strong>
	  <th ><strong>Second Surgeon Name</strong>
	  <th ><strong>Third Surgeon Name</strong>
       <th width="14%" style="font-weight:bold;color:red;"><strong>Suggestion</strong>
	  <th ><strong>Anaesthetist Name</strong>
	  <th ><strong>Book Time</strong>
	  <th ><strong>Duration Time</strong>
	  <th ><strong>OT Name</strong>
       <th ><strong>OT Type</strong>
      <th ><strong>Findings</strong>
      
	        <th ><strong>Type</strong>
			<th ><strong>Receive</strong>
			<th ><strong>Cancel</strong>
			
	  



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


while($row = mysqli_fetch_assoc($result)) { 
     
     $pmrn=$row["pmrn"];
     $pid = mysqli_fetch_assoc(mysqli_query($con,"SELECT * from inpatient where pmrn='$pmrn' and discharge='' ORDER BY id DESC"));
     $pbed=$pid['room1'];
     ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
      <td align="center"><?= $pbed ?? 'N/A'?></td>
      <td align="center"><?php echo $row["otdate"]; ?>
	  
	  
	  <input type="button" name="edit" value="C" id="<?php echo $row['id'];?>" class="btn btn-info btn-xs edit_data">
	  
	  </td>
	  
	  <td align="center"><?php echo $row["bookingdt"]; ?></td>
	  	  <td align="Left"><?php echo $row["proce"].' ' .$row["Otherins"]; ?> </td>
              
      
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname1"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname2"];?> </td>

       <td align="center" style="font-weight:bold;color:red;"><?php echo 'Anes- '.$row["p_anes"].'<br /> OT-'.$row['p_ot'].'<br /> Time-'.$row['p_time'];?>

       
            </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["nanes"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php 
	  $id=$row['id'];
	  $url_ot = "ot1nurse9_new1?id=$id"; 
	  
	  
	  if($row['stime']!='' and $row['etime']!='') {echo $row["stime"].' To '.$row["etime"];} else {echo "<a href='$url_ot'>Set OT Time</a>";}?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration2"];?> </td>

	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration"];?> </td>

       <?php
	  $tr=$row['typeot'];
	  if($row['typeot']=='Emergency')
	{ 
echo "<td align='center' style='background-color:red;'>Emergency</td>";
	}
	
	else 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>".$tr."</td>";
	}
	  ?>
     


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

/*$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));
*/


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
/*
<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>

*/


?>

	  
      

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["typeo"];?></td>
		   
		   
		   
		   <?php
		$m_c=$row['m_clearance'];
		$rid=$row['id'];
		$pp=$row['pmrn'];
		$stime=$row['stime'];
		$etime=$row['etime'];
		
		$url = "otpatientreceive?pmrn=$pp&id=$rid"; 
		   
		   
	
$pac_f = "SELECT * FROM pac_request where pmrn='$pp' and status='Approved' order by r_s_d DESC LIMIT 1 "; 
$pac1_f = mysqli_query($con, $pac_f) or die(mysqli_error());
$pac2_f = mysqli_fetch_array($pac1_f);
$f1=$pac2_f['r_s_d'];
//$f1=date('Y-m-d');
$f2=date('d-m-Y', strtotime($f1));
$date11=date_create($f2);
	$date91=date_format($date11,'Y-m-d');
	$date12= date('d-m-Y');
	$date22=date_create($date12);
	
	$diff=date_diff($date22,$date11);
	$diff1= $diff->format("%d");	   
		   
		   
		
	if($m_c!='' and $stime!='' and $etime!='')
	{ 
echo "<td align='center' style='background-color:lightblue;'><a target='_blank' href='$url'>RECEIVE</a></td>";
	}
	
	else if($m_c=='')
	{ 
echo "<td align='center' style='background-color:lightgreen;'>Waiting For Finance Clearance</td>";
	}
	
	else if($stime=='' || $etime=='' )
	{ 
echo "<td align='center' style='background-color:orange;'>Finance Clearance Done but OT Time Not Set</td>";
	}
	
	?>
		   
		   
		   
		
		<td align="center"><a href="otcancelnurse?id=<?php echo $row["id"]; ?>"> Cancel</a></td>
          





	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

<br><br>

<p align="left" style="background-color:lightgreen;font-size:22px;font-weight:bold">List Of Today's Received OT Patients</p>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th ><strong>S.No</strong></th>
      <th ><strong>Patient's Name</strong></th>
      <th ><strong>MRN</strong></th>
      <th ><strong>BED</strong></th>
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
			<th ><strong>Charge Status</strong>
			
	  



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

$sel_query="Select * from ot where status in('Received','Recovery') and room2 ='' and room3 ='' and date5 between '$test' and '$test1'  ORDER BY date5 desc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><a href="otpatientreceive?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></a>
      <td align="center"><?php echo $row["room1"]; ?></td>
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
	  $ot_charge=$row['ot_charge_status'];  
	  $tt1=$row["pmrn"];
	  $queryi = "SELECT * FROM inpatient where pmrn= '$tt1' and discharge=''"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);


	  
//$tt1=$row["pmrn"];
$date455=$rowi['anew'];
$rid=$rowi['eid'];
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
*/


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

/*
 <td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>
*/

?>
	  
	  
	  
	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["typeo"];?></td>
		   
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="otpatientdash?id=<?php echo $row["id"]; ?>">Details</a> </td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click1();" href="otsendcurrent?id=<?php echo $row["id"]; ?>&room2=<?php echo $row["room"]; ?>&room3=<?php echo $row["room1"]; ?>">Send To Current bed</a> </td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="ottransfer?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer</a> </td>
		   <td align="center"><a href="otcancelnurse?id=<?php echo $row["id"]; ?>"> Cancel</a></td>

	      
 <td align="center" <?php if($row['ot_charge_status']=='Charge Confirmed'): ?> style="background-color:lightgreen;"<?php else: ?> style="background-color:red;" <?php endif ; ?>><?php if($row['ot_charge_status']=='Charge Confirmed'){echo 'Charge Confirmed';} else {echo 'Charge Not Confirm';}?>

	  
      </tr>
    <?php $count++; } ?>







	
	
  </tbody>
</table>

<br><br>
<p align="left" style="background-color:lightblue;font-size:22px;font-weight:bold">List Of Today's Sent Patients from OT</p>
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

<p align="left" style="background-color:red;font-size:22px;font-weight:bold">List Of Today's Cancelled OT Patients</p>
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
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  

                <h4 class="modal-title"align='center'>Change OT Date</h4>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="ppluse" id="ppluse" class="form-control"  size="15" readonly>  
						  
						  <label>Name Of The Procedure</label>  
                          <input type="text" name="peid" id="peid" class="form-control" size="15" readonly>  
						  
						  
						  
						  <label>Consultant Name</label>                          
                          <input type="text" name="temp" id="temp" class="form-control"readonly>
                         


                          <label for="tname45"><strong>Anaesthethist Name:</strong></label>



<select name="anes" value="" class="style1" size="1px;" id="anes">
		
	
	
	
    <option value='<?php echo $row39['anes3'];?>'selected><?php echo $row39['anes3'];?></option>
    <option value='N/A'>N/A</option>
                
            <?php 
          $sql = "select * from `doctor` where Discipline='anes' and status in ('Active','active')";
          $res = mysqli_query($con, $sql);
          if(mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_object($res)) {
              echo "<option value='".$row->dname."'>".$row->dname."</option>";
            }
          }
          ?>  </select>
          
      
  <br/>    

  <label for="tname45"><strong>OT NO:</strong></label>
<select name="bt2" value="" class="country" required size="1px;" id="bt2">
			        
<option ="">--Select OT Name--</option>
<option value='OT01'>OT01(RED)</option>
						<option value='OT02'>OT02(GREEN)</option>
						<option value='OT03'>OT03(BLUE)</option>
						<option value='OT04'>OT04(YELLOW)</option>
						<option value='OT05'>OT05(WHITE)</option>
						<option value='OT06'>OT06(ORANGE)</option>
						<option value='OT07'>OT07(PINK)</option>
						<option value='OT08'>OT08(PURPLE)</option>
</select>
			
<br />
 <label>OT Time</label>                        
                          
                         						 
						  <input type="text" name="pbp8" id="pbp8" placeholder="Select Time" size="15" required>
						  

  
                          
						 
		  
		 				  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          
					<br>	  
						  <label><input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success"></label>  
					 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"ot_patient.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#ppluse').val(data.pname);  
					$('#peid').val(data.proce); 
					 $('#temp').val(data.dname); 
                     //$('#pbp').val(data.duration2); 
					 $('#pbp1').val(data.otdate); 
					 //$('#pbp2').val(pbp2); 
					
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_ot_date_mng.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>