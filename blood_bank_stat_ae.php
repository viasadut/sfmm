<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','lab','rd','imo','mofficer','nurse','rad','moopd','diet','staff','dialysis','histo','physio','outdoc','techbio','endo','gpopd','mrd')"; 
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
//echo $pmrn=$_POST['pmrn'];
$inves=$_POST['inves'];

$start=$_POST['start'];

$end=$_POST['end'];
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



#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
div1 {
  height: 50px;
  width: 20%;
  border: 1px solid #4CAF50;
  float: right;
  
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
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
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
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



<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable"> 
<a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>">

  <tr> <td colspan="20" bgcolor="lightbrown"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>PATIENTS AE RECORD<b> </td> 
  
 


  </tr>
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Date </strong>
	  <th width="15%"><strong>Received Date </strong>
      <th width="14%"><strong>Investigation</strong>   
      <th width="14%"><strong>Value</strong>
      <th width="14%"><strong>Referred Doctor</strong>
<th width="14%"><strong>Print</strong>
<th width="14%"><strong>Status</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$count=1;
$sel_query="Select * from einves where ndate between '$start' and '$end' and infusion='$inves' and rstatus='RECEIVED' order by id desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
     <td align="center"><?php echo $row["rtime"]; ?></td>
	 <td align="center"><?php echo date('d/m/Y',strtotime($row["ndate"])); ?></td>
	  <td align="center"><a target='_blank' href="all_report_indu?pmrn=<?php echo $row["pmrn"]; ?>&test=<?php echo $row["infusion"]; ?>">
    <?php if($row['critical']!=''){echo '<span style="color:red;font-weight:bold">'.$row["infusion"].'</span>';} else {echo ''.$row["infusion"].'';}?>
  </a></td>
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
		$url = "$report5?pmrn=$pmrn5&eid=$eid5&id=$id5&sno=$id6"; 
		$url2 = "p4new1r.php?pmrn=$pmrn&acno=$id6&dname=$dname5"; 
	  $rrr=$row["result"];
	  $rrr55=$row["resultstatus"];
		$rrr1=$row["status"];
		$ac_no='E'.$row["id"];
		
		$url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$id6&dname=$dname5"; 
$date_d= date('2022-04-02');

	  //$url3 = "$pemer?pmrn=$pmrn&id=$id5"; 
	  		 if($type=='lab' and $rrr55 =='Confirmed By Consultant')
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
	
	if($type=='RAD' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	if($type=='rad' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
	
	if($type=='RAD' and $rrr1=='RECEIVED' and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='50' height='40' /></a>";
	}
?>
	  </td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">


</td>  
		  

<td>
	 
<?php if
($type=='rad' and $tt=='192.168.100.252:8081')
	{ 
	echo '<form target="_blank" action=http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}


else if
($type=='rad' and $tt!='192.168.100.252:8081')
	{ 
	echo'<form target="_blank" action="http://182.160.124.36/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}



  else if
($type=='RAD' or $type=='Rad' and $tt=='192.168.100.252:8081')
	{ 
	echo '<form target="_blank" action=http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}


else if
($type=='RAD' and $tt!='192.168.100.252:8081')
	{ 
	echo'<form target="_blank" action="http://182.160.124.36/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}

  else if
($type=='Rad' and $tt=='192.168.100.252:8081')
	{ 
	echo '<form target="_blank" action=http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}


else if
($type=='Rad' and $tt!='192.168.100.252:8081')
	{ 
	echo'<form target="_blank" action="http://182.160.124.36/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}
?>
	  </td>
			  
      </tr>
    <?php $count++;  }?>

  </tbody>
 
</body>

</html>
