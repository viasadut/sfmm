<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
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


	.label {
  color: black;
  padding: 8px;
  font-family: Arial;
}
.success {background-color: red;} /* lightgreen */
.info {background-color: lightgreen;} /* Red */
.warning {background-color: orange;} /* Orange */
.danger {background-color: yellow;} /* Red */ 
.other {background-color: #D462FF; } /* Gray */ 
.oxy {background-color: #FFE5B4; } /* Gray */ 
.other2 {background-color: #FFCBA4	; } /* Gray */ 

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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s In-Patients List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">

<span class="label success" style="float:right; font-weight:bold;color:white">Two Dosage Vaccine Not Taken</span>
<span class="label info" style="float:right; font-weight:bold">Two Dosage Vaccine Taken</span>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Requested By</strong></th>
	  <th width="17%"><strong>Employee ID</strong></th>
      <th width="10%"><strong>Leave Type</strong></th>
      <th width="15%"><strong>Total Days Applied </strong>
	  <th width="15%"><strong>Balance</strong>
      <th width="14%"><strong>Start From</strong>   
      <th width="14%"><strong>End Date</strong>
	  <th width="14%"><strong>Department</strong>
	  <th width="14%"><strong>HOS</strong>
	  <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Reason</strong>
	  <th width="14%"><strong>Replacement Staff</strong>
	  <th width="14%"><strong>MC</strong>
	  <th width="14%"><strong>Approve</strong>
	  <th width="14%"><strong>Reject</strong>
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	
if($dept=='Human Resources Management'){		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from dleave where hstatus='Approved By HOS'";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <?php
	  $sname=$row['uname'];
	  $query3 = "SELECT * FROM staff3 where sid= '$sname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$fulln = $row3['sname'];
$c_dosage = $row3['c_dosage'];
	  
	  ?>
	  
     
	  
	 <?php if($c_dosage=='Two Dosage Taken' || $c_dosage=='Booster Dosage Taken')
	{ 
echo "<td align='center' style='background-color:lightgreen;font-weight:bold;'>".$fulln."</td>";
	}
	
	else 
	{ 
echo "<td align='center' style='background-color:#FF2400; font-weight:bold; color:white'>".$fulln."</td>";
	}?>
      <td align="center"><?php echo $row3["sid1"]; ?></td>
	  <td align="center"><?php echo $row["tleave"]; ?></td>
	  <td align="center"><?php echo $row["total"]; ?></td>
	  
	  
	   <?php 
	  
	  
	  $ttl=$row["tleave"];
	  $query39 = "SELECT * FROM staff3 where sid= '$sname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
	  
	  $gd= $row39['gender'];
	  $el= $row39['etaken'];
$al= $row39['ataken'];
$sl= $row39['staken'];
$sl1= $row39['sleave'];
$ma= 112-$row39['mataken']; 
$pa= $row39['pataken'];
$doj= $row39['doj'];  
$status= $row39['status']; 
//$pa= $row['padd'];
$cf= $row39['cfleave'];
$pmrn= $row39['mrn'];

$sl1s=14-$sl;
$sl1s_y=5-$sl;
	  
	  
	  
	  $status1= $row39['cstatus'];

$now = time(); // or your date as well
$year=date('Y');
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
$your_date1 = strtotime("$doj");
//$your_date = strtotime("2019-01-01");
$datediff = $now - $your_date;
$datediff_y = $now - $your_date1;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438,2) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274,2) ;
$fday_y= round($datediff_y / (60 * 60 * 24)*.0438,2) ;
$fday1_y= round($datediff_y / (60 * 60 * 24)*.0274,2) ;



$fday3= round($datediff / (60 * 60 * 24)*.0164,2) ;
$fday3_y= round($datediff_y / (60 * 60 * 24)*.0164,2) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;


//echo $fday;
$aday=$fday+$cf-$al;
$aday1=$fday1-$el;

$aday_y=$fday_y+$cf-$al;
$aday1_y=$fday1_y-$el;

$aday2=$fday3-$al;
$aday2_y=$fday3_y-$al;
$cyear=date('Y');
$doj78=strtotime($doj);
$doj12=date('Y',strtotime($doj));
$datediff78 = $now - $doj78;
$fday8= round($datediff78 / (60 * 60 * 24)*.0164,2) ;
$fday9= round($datediff78 / (60 * 60 * 24)*.0274,2) ;




	  
	  
	  
	  ?>
	  
	  <td align="center">
	  
	  
	  <?php 
	  
	  if($status1=='Confirm'and $cyear!=$doj12 and $ttl=='Annual Leave'){echo $aday;} 
	  else if($status1=='Confirm'and $cyear==$doj12 and $ttl=='Annual Leave'){echo $aday_y;} 
	  else if($status1=='nonconfirm'and $cyear!=$doj12 and $ttl=='Annual Leave'){echo $aday2_y;} 
	  else if($status1=='nonconfirm'and $cyear==$doj12 and $ttl=='Annual Leave'){echo $aday2_y;}
	  
	  
	  else if($status1=='Confirm'and $cyear!=$doj12 and $ttl=='Half Day Leave'){echo $aday;} 
	  else if($status1=='Confirm'and $cyear==$doj12 and $ttl=='Half Day Leave'){echo $aday_y;} 
	  else if($status1=='nonconfirm'and $cyear!=$doj12 and $ttl=='Half Day Leave'){echo $aday2_y;} 
	  else if($status1=='nonconfirm'and $cyear==$doj12 and $ttl=='Half Day Leave'){echo $aday2_y;}
	  
	  
	  else if($status1=='Confirm' and $ttl=='Emergency Leave'and $cyear!=$doj12){echo $aday1;} 
	  else if($status1=='Confirm' and $ttl=='Emergency Leave'and $cyear==$doj12){echo $aday1_y;} 
	  else if($status1=='nonconfirm' and $ttl=='Emergency Leave'){echo '0';}
	  
	  
	  else if($status1=='Confirm' and $ttl=='Sick Leave' ){echo $sl1s;} 
	  else if($status1!='Confirm' and $ttl=='Sick Leave' ){echo $sl1s_y;}
	  else {echo '';}
	  
	  
	  
	  
	  ?>
	  
	  
	  
	  </td>
	  
      <td align="center"><?php echo $row["sdate"]; ?>
      <td align="center"><?php echo $row["edate"]; ?>  
	  <td align="center"><?php echo $row["dept"]; ?>  
	  <td align="center"><?php echo $row["hos"]; ?>  
	  <td align="center"><?php echo $row["hstatus"]; ?>
<td align="center"><?php echo $row["reason"]; ?>
<td align="center"><?php echo $row["r_name"]; ?>  	

<?php

$ss=date('m/d/Y',strtotime($row['sdate']));
$ss1=date('m/d/Y',strtotime($row['edate']));
$query33 = "SELECT COUNT(id) FROM mcertificate where pmrn='$pmrn' and fdate='$ss' and tdate='$ss1'"; 
	 
$result33 = mysqli_query($con, $query33) or die(mysqli_error());

// Print out result
$row33 = mysqli_fetch_array($result33);

$url = "printmcedit1test?pmrn=$pmrn&sdate=$ss&edate=$ss1"; 
?>



<td>
<?php if($row33['COUNT(id)']!=0){

echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='30' height='30'/></a>";


}?></td> 
  
<td align="center">

<?php 
$sss=date('Y', strtotime($row['sdate']));
$eee=date('Y', strtotime($row['edate']));
$rrr=date('Y');
$trt=date("Y",strtotime("-1 year"));

if($sss==$rrr || $eee==$rrr)

{echo'
<a onclick="return confirm_click();" href="leaveapprove1_new?id='.$row["id"].'&uname='.$row["uname"].'&type='.$row["type"].'&bal='.$row["total"].'"><strong>Confirm</strong></a>';
}

else if($sss==$trt || $eee==$trt)

{echo'
<a onclick="return confirm_click();" href="leaveapprove1_new?id='.$row["id"].'&uname='.$row["uname"].'&type='.$row["type"].'&bal='.$row["total"].'"><strong>Confirm</strong></a>';
}

else {
	
	echo 'You can confirm this when next Year Comes';
}

?>
</td>
<td align="center"><a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Write Comments</a></td>	  

<td align="center">
	  <?php
	  
	  $dr=$row['hstatus'];
	  $uname2=$row['uname'];
	  $id2=$row["id"];
	  
		
		$url = "leaveapproveretm?id=$id2&user=$user&uname='$uname2'"; 
		if($dr=='Approved By HOS')
		{
echo "<a onclick='return confirm_click();'  target='_blank' href='$url'>Reject</a>";
		}
	  ?>
	  </td>

	  
      </tr>
<?php $count++; } }

else {
	
	echo '<script language="javascript">';
    echo 'alert("You Dont Have access in this Page !!"); ';
    echo '</script>';
	
	$url = "homestaff";
	header("Location: $url");
}
?>
  </tbody>
  
</table>

</form>

</body>

</html>

