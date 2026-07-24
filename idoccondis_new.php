<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('imo','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

//include("auth.php");
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$query = "SELECT * from inpatient where pmrn='$pmrn' and eid='$eid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$phone= $row['pphone'];  
$pa= $row['age'];
$pdate= $row['adate'];
$padd= $row['padd'];
$pg= $row['gender'];
$vc= $row['card1'];
$vc1= $row['card2'];
$room1= $row['room1'];
$ac= $row['acard'];
$room= $row['room'];
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
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm the Discharge Note ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Confirm the Discharge Note ?");
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
   <li class='last'><a href='medicalcertificate1_imo?pmrn=<?php echo $pmrn;?>'><span>Issue MC</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Out Patients List </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="5%"><strong>MRN</strong></th>
      <th width="14%"><strong>Discharge Request Time </strong>
      <th width="10%"><strong>Bill Confirmed Time</strong> 
      <th width="12%"><strong>Prepare / Edit Discharge Note</strong>  
      
	  <th width="14%"><strong>Consultant Confirmation</strong>  
	  <th width="14%"><strong>MO Confirmation</strong>  

	       


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where eid='$eid' and pmrn='$pmrn' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dstatustime"]; ?>
      <td align="center"><?php echo $row["bstatustime"]; ?>  
	  
	  <?php
	  
	  $d_type=$row['d_type'];
	  $query40 = "SELECT * FROM idischarge1 where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
//$row40 = mysqli_fetch_array($result40);
$res90=mysqli_num_rows($result40);


$query414 = "SELECT * FROM death_summary where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result414 = mysqli_query($con, $query414) or die(mysqli_error());

// Print out result
//$row40 = mysqli_fetch_array($result40);
$res914=mysqli_num_rows($result414);


$query41 = "SELECT * FROM deathn where pmrn= '$pmrn'"; 
	 
$result41 = mysqli_query($con, $query41) or die(mysqli_error());

// Print out result
//$row40 = mysqli_fetch_array($result40);
$res91=mysqli_num_rows($result41);


$url = "imoidisreport?pmrn=$pmrn&eid=$eid";
$url1 = "indischarge1edit1?pmrn=$pmrn&eid=$eid";
$url2 = "death2?pmrn=$pmrn&eid=$eid";
$url3 = "death2_edit?pmrn=$pmrn&eid=$eid";


	  ?>
	   


      <td align="center"><b><?php if($res90==0 and $d_type!='Confirm Death Declaration Request'){echo "<a href='$url'>Prepare Discharge Note</a>";} 
      else if($res90>0 and $d_type!='Confirm Death Declaration Request'){echo "<a href='$url1'>Edit Discharge Note</a>";} 
      else if($res914==0 and $d_type!='Confirm Death Declaration Request'){echo "Death Summary Not Written";}
      else if($res91==0 and $d_type=='Confirm Death Declaration Request'){echo "<a href='$url2'> Prepare Death Certificate</a>";}
      else if($res91>0 and $d_type=='Confirm Death Declaration Request'){echo "<a href='$url3'> Edit Death Certificate</a>";} ?></td>


<td align="center"><b><?php echo $row["dconfirm"]; ?></td>	  
	  <td align="center" colspan="1"><a onclick="return confirm_click1();" href="dconfirm?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Confirm BY </a>(<b><?php echo $row["confirmdn"]; ?></b>)  </td>	  
	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

<br><br>
<p><b> Discharge Bill Confirmed Patient<b></p>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="14%"><strong>Discharge Request Time</strong>  
      <th width="15%"><strong>Bill Confirmed Time </strong>
      <th width="14%"><strong>Doctor Name</strong> 
      <th width="14%"><strong>Episode</strong>
      <th width="14%"><strong>Print</strong>
	<th width="14%"><strong>Confirm</strong> 


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$coun1t=1;



$sel_query1="Select * from inpatient where eid='$eid' and pmrn='$pmrn' and disstatus='Discharge Bill Confirmed' and confirmdn !='' and rfid_status='0' and rfid_card2_status='0' and rfid_acard_status='0' ORDER BY id asc;";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["pname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?>
  	  <td align="center"><?php echo $row1["dstatustime"]; ?>  
      <td align="center"><?php echo $row1["bstatustime"]; ?>
      <td align="center"><?php echo $row1["adoc"]; ?>  
	  <td align="center"><?php echo $row1["eid"]; ?>  


	  <?php
	  
	  $d_type=$row1['d_type'];
    $dconfirm=$row1['dconfirm'];
	  $query40 = "SELECT * FROM idischarge1 where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
//$row40 = mysqli_fetch_array($result40);
$res90=mysqli_num_rows($result40);


$query41 = "SELECT * FROM deathn where pmrn= '$pmrn'"; 
	 
$result41 = mysqli_query($con, $query41) or die(mysqli_error());

// Print out result
//$row40 = mysqli_fetch_array($result40);
$res91=mysqli_num_rows($result41);


$query414 = "SELECT * FROM death_summary where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result414 = mysqli_query($con, $query414) or die(mysqli_error());

// Print out result
//$row40 = mysqli_fetch_array($result40);
$res914=mysqli_num_rows($result414);



$url = "idisreport?pmrn=$pmrn&eid=$eid";

$url2 = "deathprint1?pmrn=$pmrn&eid=$eid";
$urgent = "consultant_confirmation_urgent_doc?pmrn=$pmrn&eid=$eid";



	  ?>
	  
	  
	  

	  
	  
	  <td align="center"><b><?php if($res90==0 and $d_type!='Confirm Death Declaration Request'){echo "Discharge Note Not Prepared";} 
      else if($res90>0 and $d_type!='Confirm Death Declaration Request'){echo "<a target='_blank'href='idisreport?pmrn=".$pmrn."&eid=".$eid."'><img src='dis_pic.png' title='Print Report' width='100' height='60'></a>";} 
      else if($res914==0 and $d_type=='Confirm Death Declaration Request'){echo "Death Summary Not Written";}
      else if($res91==0 and $d_type=='Confirm Death Declaration Request' and $res914>0){echo "Death Certificate Not Prepared";}
      else if($dconfirm=='' and $d_type=='Confirm Death Declaration Request'){echo "<a href='$urgent'>Confirm Death Certificate</a>";}
      else if($res91>0 and $d_type!='Confirm Death Declaration Request' and $res914>0){echo "<a href='$url2'><img src='death_pic.png' title='Print Report' width='100' height='60'></a>";} ?></td>
<td align="center" colspan="1"><a onclick="return confirm_click();" href="idisupdate1?eid=<?php echo $row1["eid"]; ?>&pmrn=<?php echo $row1["pmrn"]; ?>&room1=<?php echo "$room1"; ?>&room=<?php echo "$room"; ?>&vc=<?php echo "$vc"; ?>&vc1=<?php echo "$vc1"; ?>&ac=<?php echo "$ac"; ?>&user=<?php echo "$fullname"; ?>"></a></td>

      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

<br><br>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$coun1t=1;



$sel_query1="select * from birth where pmrn='$pmrn' and status!='Waiting For Approval'";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="1"align="center"><?php echo $row["bname"]; ?></td>
      
      <td colspan="1"align="center"><?php echo $row["eid"]; ?> </td> 
      <td colspan="2"align="center"><?php echo $row["dname"]; ?></td>

<?php
	if($row['status']!='Waiting For Approval')
	  {echo
	  
	  '<a target="_blank" href="birthprintedit1.php?id='.$row['id'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'"><img src="print.png" title="Print Report" width="50" height="40" /></a>';}
	 ?> 

      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>
</form>


</body>

</html>
