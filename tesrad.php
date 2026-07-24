<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('rad','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php

$test=date('Y-m-d', strtotime('-180 days') );
$date= date('Y-m-d');

require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];



	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];

$query_p = "SELECT COUNT(pmrn) from alltest where type='rad' and status='' and pmrn='$pmrn' and date1 between '$test' and '$date';";
$result_p = mysqli_query($con, $query_p) or die(mysqli_error());
$row_p = mysqli_fetch_array($result_p);
$p1=$row_p['COUNT(pmrn)'];

$query_p2 = "SELECT COUNT(pmrn) from radpapp where status='NOT SEEN' and pmrn='$pmrn';";
$result_p2 = mysqli_query($con, $query_p2) or die(mysqli_error());
$row_p2 = mysqli_fetch_array($result_p2);
$p2=$row_p2['COUNT(pmrn)'];

}
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
   <li><a href='tesrad'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment Menu</span></a>
	  <ul>
	  <li class='last'><a href='radapp'><span>Appointment</span></a></li>
	  <li class='last'><a href='radblock'><span>Block Slot</span></a></li>
	  <li class='last'><a href='radunblock'><span>Unblock Slot</span></a></li>
	  <li class='last'><a href='radeditapp'><span>Cancel Patient Appointment </span></a></li>
	  
	  
	  
	  
	  </ul>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allapp'><span>Print Appointment Report </span></a>
		 <li class='has-sub'><a href='allpen'><span>Search Pending Reports </span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise Report </span></a>
		 <li class='has-sub'><a href='radconsultant'><span>Consultant Wise Report </span></a>
		 <li class='has-sub'><a href='radconsultant_groupwise'><span>Consultant Wise Report (Groupwise)</span></a>
            <li class='last'><a href='raddtsearch2'><span>pending Report Search By MRN</span></a></li>
			<li class='last'><a href='radapp22'><span>Appointment Report</span></a></li>
			<li class='last'><a href='radview3'><span>All Confirmed Reports</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='newdoc'><span>Add New Doctor</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Search pending request </span></a></li>
		  		        <li class='last'><a href='donereportedit'><span>EDIT</span></a></li>
						<li class='last'><a href='viewlabrad'><span>LAB</span></a></li>
						<li class='last'><a href='inprad'><span>Inpatient</span></a></li>
						<li class='last'><a href='emerrad'><span>Emergency</span></a></li>
						<li class='last'><a href='history11rad01'><span>Patient History</span></a></li>
						<li class='last'><a href='raddocapp'><span>OPD Appointment</span></a></li>
						
				
						
						
      
	  
	  
	  
	  
						 <li class='active has-sub'><a href='#'><span>New Investigation</span></a>
      <ul>
         <li class='has-sub'><a href='inves_request1'><span>Request New Investigation</span></a>
            
         </li>
		<li class='has-sub'><a href='inves_pending1'><span>View Pending Request</span></a>
            
         </li>
		 <li class='has-sub'><a href='edit_rad'><span>Update Charge Code price</span></a>
            
         </li>
		  <li class='has-sub'><a href='tesrad1'><span>Request List</span></a>
            
         </li>
		 <li class='has-sub'><a href='pedit1_rad'><span>EDIT DOB</span></a>
            
         </li>
</ul>

<li class='active has-sub'><a href='#'><span>Outside Reporting Panel</span></a>
 <ul>
         <li class='has-sub'><a href='rad_report_outside_new'><span>Set For Outside Reporting</span></a>
            
         </li>
		<li class='has-sub'><a href='rad_report_outside_new1'><span>View Pending Outside Reporting</span></a>
            
         </li>
		 
</ul>		 
		 
		 <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</ul>
		
</div>
<p align="center" class="style1">PATIENTS RECORD SEARCH PANEL </p> 

<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



<tr> 
<td colspan="15"><input type="text" name="search" placeholder="Search By MRN"></td>
<td colspan="5"><button type="submit" name="bsearch">Search</button></td>
</tr>
  
  </thead>
  <tbody>
  
  
  <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];




$count=1;  
$sel_query2="Select * from alltest where type='rad' and status='' and pmrn='$pmrn' and date1 between '$test' and '$date' and billstatus!='' and billno!='' order by pmrn desc ;";

$result2 = mysqli_query($con,$sel_query2);

if($p1=='0')
	
	{
		
		echo'';
	}
	else 
{
	

echo'


<tr>
	<td colspan="20" bgcolor="red"><strong>Appointment Pending</strong></td>
	
</tr>

 <tr>
      <td colspan="1"><strong>S.No</strong></td>
      <th colspan="4"><strong>Patients Name</strong></td>
      <th colspan="2"><strong>MRN</strong></td>
      <th colspan="2"><strong>Date </strong></td>
      <th colspan="3"><strong>Consultant Name</strong>   </td>
      <th colspan="3"><strong>Investigation Name</strong></td>
	  <th colspan="2"><strong>Instruction</strong></td>
      <th colspan="1"><strong>Appointment</strong></td>
	  <th colspan="1"><strong>View Prescription</strong></td>
	    <th colspan="1"><strong>Covid Result</strong></td>

	   </tr>

';
}





while($row2 = mysqli_fetch_assoc($result2)) { ?>
    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row2["pname"]; ?></td>
      <td align="center"colspan="2"><a href="rpapp1?pmrn=<?php echo $row2["pmrn"]; ?>&id=<?php echo $row2["id"];?>&dname1=<?php echo $row2['dname'];?>"><?php echo $row2["pmrn"]; ?></a></td>

      <td align="center"colspan="2"><?php echo $row2["date"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row2["dname"]; ?></td>
	  	  <td align="center"colspan="3"><?php echo $row2["medi"];?></td> 
		  <td align="center"colspan="2"><?php echo $row2["ins"];?></td> 
	  <td align="center"colspan="1"><a target='_blank' href="rpapp1?pmrn=<?php echo $row2["pmrn"]; ?>&id=<?php echo $row2["id"];?>&dname1=<?php echo $row2['dname'];?>">Make Appointment</a></td>
	  
	  		   
	  	 	  <?php
$tt1=$row['pmrn'];
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







?>


<td><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;font-size:14pt;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;font-size:14pt;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;font-size:14pt;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;font-size:14pt;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a></td>


 

	  	  	  <td align="center"colspan="1"><a target='_blank' href="pharreport?pmrn=<?php echo $row2["pmrn"]; ?>&dname=<?php echo $row2["dname"];?>&date=<?php echo $row2["date"];?>&eid=<?php echo $row2["eid"];?>"><img src="print.png" title="Print Report" width="60" height="20" /></a></td>

      </tr>
    <?php }} ?>
  
  
  
  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];

$sel_query="Select * from radpapp where pmrn='$pmrn' and status='NOT SEEN' ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


if($p2=='0')
{
	
	echo'';
}
else 
{
	echo'
	
	
<tr>
	<td colspan="20" bgcolor="red"><strong>Report Pending</strong></td>
	
</tr>

<tr>
      <th colspan="1"><strong>S.No</strong></th>
      <th colspan="4"><strong>Patients Name</strong></th>
      <th colspan="1"><strong>MRN</strong></th>
	  <th colspan="1"><strong>A_NO</strong></th>
      <th colspan="2"><strong>Appointment Time </strong></th>
      <th colspan="2"><strong>Date</strong> </th>
      <th colspan="3"><strong>Reffered From</strong></th>
      <th colspan="2"><strong>Doctor Name</strong>  </th>
      <th colspan="1"><strong>Instruction</strong></th>
	  <th colspan="1"><strong>Status</strong></th>
	        <th colspan="1"><strong>Report</strong></th>
			<th colspan="1"><strong>Covid Result</strong></td>
	  



	   </tr>';
}


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["pname"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["a_no"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["aslot"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["adate"]; ?>  </td>
	  <td align="center"colspan="3"><?php echo $row["dreffer"]; ?>  </td>
	  	  <td align="center"colspan="2"><?php echo $row["tname"]; ?> </td>
		  <td align="center"colspan="1"><?php echo $row["ins"]; ?> </td>
      <td align="center" colspan="1"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 

	       <td align="center"colspan="1" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold" bgcolor='red'>Report Pending</td>
		   
		   
		   		   
<?php
$tt1=$row['pmrn'];
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







?>


<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=5){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=5){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($tt!='' and $dcon=='confirmed'and $diff47>5){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else if($rowc['lid']!='' and $dcon!='confirmed') {echo "<span style='color:blue;text-align:center;'><b>Result Pending";}else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($rowc['lid']=='' and $dcon!='confirmed') {echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";} ?></a>  </td>

		   

      </tr>
    <?php $count++; }} ?>
	
	
	
	
	
	
	
  </tbody>
</table>
</form>



<?php
$date77=date('Y-m-d');
$date78=date('m/d/Y');

$query43 = "SELECT COUNT(pmrn) FROM presnew where date1 ='$date77';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



$query44 = "SELECT COUNT(pmrn) FROM inpatient where discharge !='Discharged';"; 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);


$sel_query_in="Select COUNT(id) from inpatient where discharge= '' and room1 LIKE 'cardiac%'  order by adoc asc";

$result_in = mysqli_query($con,$sel_query_in);
$row_in = mysqli_fetch_assoc($result_in);

$sel_query_in1="Select COUNT(id) from inpatient where discharge= '' and room1 LIKE 'ICU%'  order by adoc asc";

$result_in1 = mysqli_query($con,$sel_query_in1);
$row_in1 = mysqli_fetch_assoc($result_in1);

$sel_query_in2="Select COUNT(id) from inpatient where discharge= '' and room1 LIKE '%CCU%'  order by adoc asc";

$result_in2 = mysqli_query($con,$sel_query_in2);
$row_in2 = mysqli_fetch_assoc($result_in2);

$sel_query_in3="Select COUNT(id) from inpatient where discharge= '' and room1 LIKE '%HDU%'  order by adoc asc";

$result_in3 = mysqli_query($con,$sel_query_in3);
$row_in3 = mysqli_fetch_assoc($result_in3);


$sel_query_in4="Select COUNT(id) from inpatient where discharge= '' and room1 LIKE '%NICU%'  order by adoc asc";

$result_in4 = mysqli_query($con,$sel_query_in4);
$row_in4 = mysqli_fetch_assoc($result_in4);



$critical=$row_in['COUNT(id)']+$row_in1['COUNT(id)']+$row_in2['COUNT(id)']+$row_in3['COUNT(id)']+$row_in4['COUNT(id)'];
$ward=$row44['COUNT(pmrn)']-$critical;




$query44a = "SELECT COUNT(pmrn) FROM inpatient where discharge ='Discharged' and dnew='$date77';"; 
$result44a = mysqli_query($con, $query44a) or die(mysqli_error());
$row44a = mysqli_fetch_assoc($result44a);


$query45 = "SELECT COUNT(pmrn) FROM emergency where adate2 ='$date77';"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);


$query46 = "SELECT COUNT(pmrn) FROM ot where date5 ='$date77' and status='Received';"; 
	 
$result46 = mysqli_query($con, $query46) or die(mysqli_error());
$row46 = mysqli_fetch_assoc($result46);


$query47 = "SELECT COUNT(pmrn) FROM endopapp where adate ='$date77' and status in ('Received','SEEN');"; 
	 
$result47 = mysqli_query($con, $query47) or die(mysqli_error());
$row47 = mysqli_fetch_assoc($result47);



$query48 = "SELECT COUNT(id) FROM covidopd where ssent ='$date77' and status ='collected';"; 
	 
$result48 = mysqli_query($con, $query48) or die(mysqli_error());
$row48 = mysqli_fetch_assoc($result48);


echo "<br><br>";

echo "<font color=white font size=5.5><b> TODAY'S HOSPITAL ACTIVITIES AT A GLANCE  - ";

	 
	 
	 

echo "OPD-  ";	 
echo $row43['COUNT(pmrn)'];
echo " , ";	 
echo "IPD-  ";	 
echo $row44['COUNT(pmrn)'];
echo "( ICU- ";

echo $row_in1['COUNT(id)'];
echo " , ";	 
echo "HDU- ";
echo $row_in3['COUNT(id)'];

echo " , ";	 
echo "NICU- ";
echo $row_in4['COUNT(id)'];

echo " , ";	 
echo "CCU- ";
echo $row_in2['COUNT(id)']+$row_in['COUNT(id)'];

echo " , ";	 
echo "WARD- ";
echo $ward;
echo " ) ";	 
echo " , ";	 
echo "IPD Discharged-  ";	 
echo $row44a['COUNT(pmrn)'];
echo " , ";	 


echo "A&E-  ";	 
echo $row45['COUNT(pmrn)'];
echo " , ";	 
echo "OT-  ";	 
echo $row46['COUNT(pmrn)'];
echo " , ";	 

echo "Endoscopy-  ";	 
echo $row47['COUNT(pmrn)'];
echo " , ";	 


echo "Covid Sample Collection-  ";	 
echo $row48['COUNT(id)'];





?>
</body>

</html>
