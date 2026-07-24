<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','lab','rd','staff')"; 
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

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm?");
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
      <th width="15%"><strong>Date </strong>
	  <th width="15%"><strong>Received Date </strong>
      <th width="14%"><strong>Investigation</strong>   
      <th width="14%"><strong>Value</strong>
      <th width="14%"><strong>Referred Doctor</strong>
<th width="14%"><strong>Print(New)</strong>
<th width="14%"><strong>Print(Old)</strong>
<th width="14%"><strong>Status</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$count=1;
$sel_query="Select * from alltest where pmrn= '$pmrn' and pstatus='' order by ID desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo date('d/m/Y', strtotime($row["date1"])); ?>
	  <td align="center"><?php echo $row["retime"]; ?>
      <td align="center"><?php echo $row["medi"]; ?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["result"];?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 

	  <td><?php
		$type=$row["type"];
		$report5=$row["report"];
		$pmrn5=$row["pmrn"];
		
		$eid5=$row["eid"];
		$id5=$row["id"];
		$sno='O'.$row["id"];
		$rrr=$row["result"];
		$rrr55=$row["resultstatus"];
		$rrr1=$row["status"];
		$dname5=$row["dname"];
		$url = "$report5?pmrn=$pmrn&eid=$eid5&id=$id5&sno=$sno"; 
		$url2 = "p4new1r.php?pmrn=$pmrn&acno=$id5&dname=$dname5"; 
		$url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$id5&dname=$dname5"; 
		$url3 = "popd.php?pmrn=$pmrn&id=$id5"; 
		$date_d= date('2022-04-02');
		$bill=$row["billstatus"];
	   
	  
	  		 if($type=='lab' || $type=='LAB' and $rrr55=='Confirmed By Consultant' and $bill=='Billed')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	else {
		
		
		echo "$rrr55";
	}
	
	
	
	
?>
	  </td>
	  <td>
	  <?php
	  



	  if($type=='rad' and $rrr1=='RECEIVED' and $row['rdate']>=$date_d)
	  { 
  echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='rad' and $rrr1=='DONE' and $row['rdate']>=$date_d)
	  { 
  echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='rad' and $rrr1=='SEEN' and $row['rdate']>=$date_d)
	  { 
  echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
	  
	  else if($type=='RAD' and $rrr1=='RECEIVED' and $row['rdate']>=$date_d)
	  { 
  echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='RAD' and $rrr1=='DONE' and $row['rdate']>=$date_d)
	  { 
  echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='RAD' and $rrr1=='SEEN' and $row['rdate']>=$date_d)
	  { 
  echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
	  
	  
	  else if($type=='Rad' and $rrr1=='RECEIVED' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='Rad' and $rrr1=='DONE' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='Rad' and $rrr1=='SEEN' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
	  
	  else if($type=='RAD' and $rrr1=='RECEIVED' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='RAD' and $rrr1=='DONE' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='RAD' and $rrr1=='SEEN' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='rad' and $rrr1=='RECEIVED' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='rad' and $rrr1=='DONE' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }
  
	  else if($type=='rad' and $rrr1=='SEEN' and $row['rdate']<$date_d)
	  { 
  echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	  }


	  ?>
	  <td>
	  
	  
	  
	<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
	<?php 
	 if($type=='lab' and $rrr55=='Confirmed By Consultant')
	{ 
echo "<a target='_blank' href='$url'>Printed</a>";
	}
	
	else {
		
		
		echo "";
	}
	?>
	
	
	</td>  
	   
	  
	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	<?php
	
//$count=1;
$sel_query="Select * from endolab where pmrn= '$pmrn' order by ID desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo date('d/m/Y', strtotime($row["date1"])); ?>
	  <td align="center"><?php echo $row["retime"]; ?>
      <td align="center"><?php echo $row["medi"]; ?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["result"];?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 

	  <td><?php
		$type=$row["type"];
		$report5=$row["report"];
		$pmrn5=$row["pmrn"];
		
		$eid5=$row["eid"];
		$id5=$row["id"];
		$sno='O'.$row["id"];
		$rrr=$row["result"];
		$rrr55=$row["resultstatus"];
		$bill=$row["billstatus"];
		$rrr1=$row["status"];
		$dname5=$row["dname"];
		$url = "$report5?pmrn=$pmrn&eid=$eid5&id=$id5&sno=$sno"; 
		$url2 = "p4new1r.php?pmrn=$pmrn&acno=$id5&dname=$dname5"; 
		$url3 = "popd.php?pmrn=$pmrn&id=$id5"; 
	   $url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$id5&dname=$dname5"; 
$date_d= date('2022-04-02');

	  
	  		 if($type=='lab' || $type=='LAB' and $rrr55=='Confirmed By Consultant' and $bill=='Billed')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	else {
		
		
		echo "$rrr55";
	}
	
	if($type=='rad' and $rrr1=='DONE' and $row['odate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	if($type=='RAD' and $rrr1=='DONE' and $row['odate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	if($type=='rad' and $rrr1=='DONE' and $row['odate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	if($type=='RAD' and $rrr1=='DONE' and $row['odate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	
	
?>
	  </td>
	  
	  
	<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
	<?php 
	 if($type=='lab'|| $type=='LAB' and $rrr55=='Confirmed By Consultant')
	{ 
echo "<a target='_blank' href='$url'>Printed</a>";
	}
	
	else {
		
		
		echo "";
	}
	?>
	
	
	</td>  
	   
	  
	  
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
      

	   </tr>
  </thead>
  <tbody>
  
    <?php
	

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' order by id desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["rtime"]; ?></td>
	  <td align="center"><?php echo $row["infusion"]; ?></td>
	  	  <td align="center"><?php echo $row["result"];?></td> 
		  <td align="center"><?php echo $row["dname"];?></td> 
		


<td><?php
		$type=$row["type"];
		$report5=$row["report"];
		$pmrn5=$row["pmrn"];
		
		$eid5=$row["eid"];
		$id5=$row["id"];
		$id6='I'.$row["id"];
		$dname5=$row["dname"];
		$rrr55=$row["resultstatus"];
		$bill=$row["billstatus"];
		$url = "$report5?pmrn=$pmrn&eid=$eid5&id=$id5&sno=$id6"; 
		$url2 = "p4new1r.php?pmrn=$pmrn&acno=$id6&dname=$dname5"; 
		$url3 = "pipd.php?pmrn=$pmrn&id=$id5"; 
		
		$url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$id6&dname=$dname5"; 
$date_d= date('2022-04-02');
	  $rrr=$row["result"];
		$rrr1=$row["status"];
	  
	  		 if($type=='lab' || $type=='LAB' and $rrr55=='Confirmed By Consultant' )
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	else {
		
		
		echo "$rrr55";
	}
	
	
	if($type=='rad' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='DONE' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='SEEN' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	else if($type=='RAD' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='RAD' and $rrr1=='DONE' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='RAD' and $rrr1=='SEEN' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='DONE' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='SEEN' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	
	else if($type=='Rad' and $rrr1=='RECEIVED' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='DONE' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='SEEN' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	else if($type=='RAD' and $rrr1=='RECEIVED' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='RAD' and $rrr1=='DONE' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='RAD' and $rrr1=='SEEN' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='RECEIVED' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='DONE' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='SEEN' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
?>
	  </td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
<?php

 if($type=='lab' and $rrr55 ='Confirmed By Consultant')
	{ 
echo "<a target='_blank' href='$url3'>Printed</a>";
	}
	
	else {
		
		
		echo "";
	}
	
?>

</td>  


		

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
$sel_query="Select * from einves where pmrn= '$pmrn' and pstatus='' order by id desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
     <td align="center"><?php echo $row["rtime"]; ?></td>
	  <td align="center"><?php echo $row["infusion"]; ?></td>
	  	  <td align="center"><?php echo $row["result"];?></td> 
		  <td align="center"><?php echo $row["dname"];?></td> 
		  
		  
<td><?php
		$type=$row["type"];
		$report5=$row["report"];
		$pmrn5=$row["pmrn"];
		
		$eid5=$row["eid"];
		$id5=$row["id"];
		$id6='E'.$row["id"];
		$dname5=$row["dname"];
		$url = "$report5?pmrn=$pmrn&eid=$eid5&id=$id5&sno=$id6"; 
		$url2 = "p4new1r.php?pmrn=$pmrn&acno=$id6&dname=$dname5"; 
	  $rrr=$row["result"];
	  $bill=$row["billstatus"];
	  $rrr55=$row["resultstatus"];
		$rrr1=$row["status"];
		
		$url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$id6&dname=$dname5"; 
$date_d= date('2022-04-02');

	  //$url3 = "$pemer?pmrn=$pmrn&id=$id5"; 
	  		 if($type=='lab' || $type=='LAB' and $rrr55=='Confirmed By Consultant')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	else {
		
		echo"$rrr55";
	}
	
	if($type=='rad' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='DONE' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='SEEN' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	else if($type=='RAD' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='RAD' and $rrr1=='DONE' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='RAD' and $rrr1=='SEEN' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='DONE' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='SEEN' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	
	else if($type=='Rad' and $rrr1=='RECEIVED' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='DONE' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='Rad' and $rrr1=='SEEN' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	else if($type=='RAD' and $rrr1=='RECEIVED' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='RAD' and $rrr1=='DONE' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='RAD' and $rrr1=='SEEN' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='RECEIVED' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='DONE' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}

	else if($type=='rad' and $rrr1=='SEEN' and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
?>

	  </td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">


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
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>PATIENTS HISTOPATHOLOGY RECORD<b> </td> </tr>
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
      <th width="15%"><strong>Doctor Name </strong>
      <th width="14%"><strong>Type</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Date</strong>  
      
	        <th width="14%"><strong>Print</strong>
	  



	   </tr>
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from histo where pmrn= '$pmrn' and pstatus='' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["spe"]; ?>  
	  <td align="center"><?php echo $row["rtime"]; ?>  
	  	  <td align="center"><?php echo $row["date"]; ?> 
      
<td>
	  <?php 
	  $st=$row["status"];
	  $pp=$row["pmrn"];
	  $ee=$row["eid"];
	  $dd=$row["dname1"];
	  
	  
	  $url = "historeport?pmrn=$pp&eid=$ee&dname1=$dd"; 
		
	  
	  
	  		 if($st=='REPORT DONE')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	  
	  ?></td>
	        


	       
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="phisto?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $pmrn;?>">Printed</a> </td>  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
		<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from fnacreport where pmrn= '$pmrn' and pstatus='' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["find"]; ?>  
	  <td align="center"><?php echo $row["time"]; ?>  
	  	  <td align="center"><?php echo $row["date2"]; ?> 
      

	  <td>
	  <?php 
	  $st=$row["status"];
	  $pp=$row["pmrn"];
	  $ee=$row["eid"];
	  $dd=$row["dname"];
	  
	  
	  $url = "p4new1histo?pmrn=$pp&eid=$ee&dname=$dd"; 
		
	  
	  
	  		 if($st=='SEEN')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	  
	  ?></td>
	  
	  
	        


	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="pfnac?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $pmrn;?>">Printed</a> </td>  


	  
      </tr>
    <?php $count++; } ?>

	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>PATIENTS Cardiology RECORD<b> </td> </tr>
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
      <th width="15%"><strong>Done Date </strong>
      <th width="14%"><strong>Procedure Name</strong>   
	        
      
      <th width="14%"><strong>PRINT</strong>
	  <th width="14%"><strong>Flim</strong>
	  <th width="14%"><strong>Status</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where status1='Confirmed' and pmrn='$pmrn' and pstatus='' order by id;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	   
	  
	  
<td>
	  <?php 
	  $st=$row["status1"];
	  $pp=$row["pmrn"];
	  $ee=$row["eid"];
	  $dd=$row["dname1"];
	  
	  
	  $url = "ecgreport?pmrn=$pp&eid=$ee&dname=$dd"; 
		
	  
	  
	  		 if($st=='Confirmed')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	  
	  ?></td>
	  
	  
	  
	     <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

	  
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="pecg?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $pmrn;?>">Printed</a> </td>  
      </tr>
    <?php $count++; } ?>
	
	
	
<?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from echo where status1='Confirmed' and pmrn='$pmrn' and pstatus='' order by id;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["proname"]; ?></td>
	  	   
	  
	  
<td>
	  <?php 
	  $st=$row["status1"];
	  $pp=$row["pmrn"];
	  $ee=$row["eid"];
	  
	  	  
	  
	  $url = "echoreport?pmrn=$pp&eid=$ee"; 
		
	  
	  
	  		 if($st=='Confirmed')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	  
	  ?></td>
 

	  
	  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="pecho?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $pmrn;?>">Printed</a> </td>  

      </tr>
    <?php $count++; } ?>


<?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ett where status1='Confirmed' and pmrn='$pmrn' and pstatus='' order by id;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["type"]; ?></td>
	  	   
	  
	  

 

	  <td colspan="10"><a target='_blank' href="ettreport.php?eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	

	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="pett?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $pmrn;?>">Printed</a> </td>  
      </tr>
    <?php $count++; } ?>
	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from cathreport where status1='Confirmed' and pmrn='$pmrn' and pstatus='' order by id;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["rdate"]; ?></td>
	  <td align="center"><?php echo $row["type"]; ?></td>
	  	   
	  
	  

 

	  <td colspan="10"><a target='_blank' href="cathreportpdf.php?eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="pcath?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $pmrn;?>">Printed</a> </td>  
      </tr>
    <?php $count++; } ?>
	
	
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>PATIENTS Endoscopy RECORD<b> </td> </tr>
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
      <th width="15%"><strong>Reffer Doctor </strong>
      <th width="14%"><strong>Type</strong>   
      <th width="14%"><strong>Report Done By</strong>
      <th width="14%"><strong>PRINT</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
//$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from endoreport where pmrn= '$pmrn' and pstatus='' order by id desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dreffer"]; ?>
      <td align="center"><?php echo $row["type"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
<?php	  $date=$row["dname"] ;?>

<td>
	  <?php 
	  $st=$row["status"];
	  $pp=$row["pmrn"];
	  $ee=$row["eid"];
	  
	  
	  $rr = "SELECT * FROM image_gallery where pmrn= '$pmrn' and eid='$ee'"; 
	 
$rr1 = mysqli_query($con, $rr) or die(mysqli_error());

// Print out result
$qe = mysqli_fetch_array($rr1);

	  
	  
	  $url = "endopdf1?pmrn=$pp&eid=$ee"; 
		
	  
	  
	  		 if($st=='SEEN')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	  
	  ?></td>
 

<td align="center">

<td>
<?php

$re=$row['eid'];
$sel_queryz="Select * from image_gallery where pmrn= '$pmrn' and eid='$re';";

$resultz = mysqli_query($con,$sel_queryz);

while($rowz = mysqli_fetch_assoc($resultz)) 
{ ?>  

      <a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="uploads/<?php echo $rowz['image'] ?>">
                         
                        <div class='text-center'>
                            <small class='text-muted'>
							
							<?php echo $rowz['image'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
      
    <?php $count++; } ?>


	  
	  </td>
	  
	  
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="pendo?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $pmrn;?>">Printed</a> </td>  	      
    <?php $count++; } ?>
	</td></tr>
	
	
	
	
<?php

$re=$row['eid'];
$sel_queryz="Select * from image_gallery where pmrn= '$pmrn' ;";

$resultz = mysqli_query($con,$sel_queryz);

while($rowz = mysqli_fetch_assoc($resultz)) 
{ ?>  
<tr>
<td colspan="5"><?php echo $rowz['titile'] ?></td>
<td colspan="10">
      <a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="uploads/<?php echo $rowz['image'] ?>">
                         
                        <div class='text-center'>
                            <small class='text-muted'>
							
							<?php echo $rowz['image'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
</td></tr>      
    <?php $count++; } ?>


	  
	
	
	</tr>

  </tbody>
</table>

<br><br>


</form>

</body>

</html>
