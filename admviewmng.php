<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

$query3 = "SELECT * FROM staff where uname= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['sdept'];
//echo $dept;
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$query3 = "SELECT * FROM incident1 where itype= 'Clinical'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
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


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Leave ?");
}

</script>

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

<p align="center" class="style1">Today's OPD Staff's List </p> 
<form action="cviewsp1" method="Post">

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Category</strong></th>
	  <th width="10%"><strong>Phone</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
	  <th width="14%"><strong>Clinical Details</strong>
      <th width="14%"><strong>Diagnosis</strong>
      <th width="14%"><strong>Doctor Name</strong>  
	  <th width="14%"><strong>Seen Time</strong>
      <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Covid</strong>

	  



	   </tr>
  </thead>
  <tbody>
  
    <?php

$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;
echo "Today's Unseen Patients";

$sel_query="Select * from pappnew where adate= '$date' and ptype IN ('Staff','Staffs Spouse', 'Staff Children','Consultant')  ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center" style="text-transform:uppercase"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  
	  <?php
	  $tr=$row['ptype'];
	  if($row['ptype']=='Staff' || $row['ptype']=='Staff Spouse' || $row['ptype']=='Staff Children' || $row['ptype']=='Consultant')
	{ 
echo "<td align='center' style='background-color:lightblue;'>".$tr."</td>";
	}
	
	else if($row['ptype']=='General') 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>".$tr."</td>";
	}
	
	else if($row['ptype']=='VIP') 
	{ 
echo "<td align='center' style='background-color:red;'>".$tr."</td>";
	}
	
	
	else if($row['ptype']=='Corporate') 
	{ 
echo "<td align='center' style='background-color:lightyellow;'>".$tr."</td>";
	}
	
	else 
	{ 
echo "<td align='center'>".$tr."</td>";
	}
	  ?>
	  
	  
	  	  
		   <?php
$tt1=$row["pmrn"];
$eid=$row["eid"];
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];


$query_p = "SELECT * FROM presnew where pmrn= '$tt1' and eid='$eid'"; 
	 
$result_p = mysqli_query($con, $query_p) or die(mysqli_error());

// Print out result
$row_p = mysqli_fetch_array($result_p);

$diag=$row_p['diagnosis'];
$cdetails=$row_p['cdetails'];





?>
	  <td align="center"><?php echo $row["pphone"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $cdetails; ?>  
	  <td align="Left"><?php echo $diag; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  
	
		  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   <td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=5){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=5){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($tt!='' and $dcon=='confirmed'and $diff47>5){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else if($rowc['lid']!='' and $dcon!='confirmed') {echo "<span style='color:blue;text-align:center;'><b>Result Pending";}else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($rowc['lid']=='' and $dcon!='confirmed') {echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";} ?></a>  </td>

  

	       


	  
      </tr>
    <?php $count++; } ?>

  </tbody>
</table>								
</form>


<p align="center" class="style1">Today's Emergency Staff's List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Patient Type</strong></th>
	  <th width="10%"><strong>Phone</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Zone</strong>  
      <th width="14%"><strong>Patient Age</strong>
	  <th width="14%"><strong>Clinical Details</strong>
	  <th width="14%"><strong>Diagnosis</strong>
	  <th width="14%"><strong>Covid Result</strong>

	       


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

//$date= date('m/d/Y');
$date2= date('m/d/Y');
$date3= date('Y-m-d');

$count=1;
$sel_query="Select * from emergency where adate2= '$date3' and type IN ('Staff','Staffs Spouse', 'Staff Children','Consultant') order by adate desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  
	  <?php
	  $tr=$row['type'];
	  if($row['type']=='Staff' || $row['type']=='Staff Spouse' || $row['type']=='Staff Children' || $row['type']=='Consultant')
	{ 
echo "<td align='center' style='background-color:lightblue;'>".$tr."</td>";
	}
	
	else if($row['type']=='General') 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>".$tr."</td>";
	}
	
	else if($row['type']=='VIP') 
	{ 
echo "<td align='center' style='background-color:red;'>".$tr."</td>";
	}
	
	
	else if($row['type']=='Corporate') 
	{ 
echo "<td align='center' style='background-color:lightyellow;'>".$tr."</td>";
	}
	
	else
	{ 
echo "<td align='center'>".$tr."</td>";
	}
	  ?>
	  <td align="center"><?php echo $row["pphone"]; ?>
	  
  	  <td align="center"><?php echo $row["gender"]; ?>  
      <td align="center"><?php echo $row["adate"]; ?>
      <td align="center"><?php echo $row["room"]; ?>  
	  <td align="center"><?php echo $row["age"]; ?> 
	  
	  		   <?php
$tt1=$row["pmrn"];
$eid=$row["eid"];
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];


$query_p = "SELECT * FROM discharge1 where pmrn= '$tt1' and eid='$eid'"; 
	 
$result_p = mysqli_query($con, $query_p) or die(mysqli_error());

// Print out result
$row_p = mysqli_fetch_array($result_p);

$diag=$row_p['ddia'];
$cdetails=$row_p['ill'];





?>
	
<td align="Left"><?php echo $cdetails; ?>  
	  <td align="Left"><?php echo $diag; ?>  	
<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=5){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=5){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($tt!='' and $dcon=='confirmed'and $diff47>5){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else if($rowc['lid']!='' and $dcon!='confirmed') {echo "<span style='color:blue;text-align:center;'><b>Result Pending";}else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($rowc['lid']=='' and $dcon!='confirmed') {echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";} ?></a>  </td>


	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>
</form>



<p align="center" class="style1">Today's IPD Staff's List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Phone</strong></th>
	  <th width="10%"><strong>Patient Type</strong></th>
      <th width="15%"><strong>Consultant Name </strong>
      
      <th width="14%"><strong>Ward</strong>
	  <th width="14%"><strong>Bed</strong>
	  <th width="14%"><strong>Admission Date</strong>
	  <th width="14%"><strong>Working Diagnosis</strong>
	  <th width="14%"><strong>Covid Result</strong>
	 
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where type IN ('Staff','Staffs Spouse', 'Staff Children','Consultant')  and idisconfirm !='Confirmed'";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  
	  
	  	  
	  	  	 	  <?php
$tt1=$row["pmrn"];
$date455=$row['anew'];
$rid=$row['eid'];
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

	  
	  
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["pphone"]; ?>
	  <td align="center"><?php echo $row["type"]; ?>
	  <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"><?php echo $row["room"]; ?>
      <td align="center"><?php echo $row["room1"]; ?>  
	  <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="center"><span style='color:green;text-align:center;'><b><?php echo $inves;?></td>
	  <td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=5){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=5){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($tt!='' and $dcon=='confirmed'and $diff47>5){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else if($rowc['lid']!='' and $dcon!='confirmed') {echo "<span style='color:blue;text-align:center;'><b>Result Pending";}else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($rowc['lid']=='' and $dcon!='confirmed') {echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";} ?></a>  </td>
	  
	  
      </tr>
<?php $count++; } 

?>
  </tbody>
  
</table>

</form>

</body>

</html>

