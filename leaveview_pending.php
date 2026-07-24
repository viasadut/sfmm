<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff','mng','ot','endo','imo','mofficer','nurse','emergency','moopd','lab','rad')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>
<?php
require('db1.php');
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['sid1'];
$full2 = $row39['sname'];
//$pmrn = $row39['pmrn'];

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
return confirm("Are you Sure to Approve this Leave ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Reject this Leave ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Forward this Leave For recommendation?");
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
<p align="center" class="style1">Todays  <?php echo $fullname; ?>'s Pending Leave Approval List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Requested By</strong></th>
      <th width="10%"><strong>Leave Type</strong></th>
      <th width="15%"><strong>Total Days Applied </strong>
	  <th width="14%"><strong>Balance</strong>
      <th width="14%"><strong>Start From</strong>   
      <th width="14%"><strong>End Date</strong>
	  <th width="14%"><strong>Department</strong>
	  <th width="14%"><strong>HOS</strong>
	  <th width="14%"><strong>Reason</strong>
	  <th width="14%"><strong>Status</strong>
	 
	  <th width="14%"><strong>MC</strong>
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from dleave where hstatus='Forwarded to Incharge' and incharge='$full'";
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
	  
	  ?>
	  
      <td align="center"><?php echo $fulln; ?></a></td>
      <td align="center"><?php echo $row["tleave"].'<br>'.$row['apply_time'].'<br>';?>
	  <td align="center"><?php echo $row["total"]; ?>
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

$sl1s=14-$sl;
$sl1s_y=5-$sl;
	  
	  
	  
	  $status1= $row39['cstatus'];
	    $pmrn= $row39['mrn'];

$now = time(); // or your date as well
$year=date('Y');
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
//$your_date = strtotime("2019-01-01");
$datediff = $now - $your_date;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438,2) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274,2) ;



$fday3= round($datediff / (60 * 60 * 24)*.0164,2) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;


//echo $fday;
$aday=$fday+$cf-$al;
$aday1=$fday1-$el;
$aday2=$fday3-$al;


	  
	  
	  
	  ?>
	  
	  <td align="center">
	  
	  <?php 
	  if($status1=='Confirm' and $ttl=='Annual Leave' ){echo $aday;} 
	  else if($status1=='Confirm' and $ttl=='Half Day Leave' ){echo $aday;} 
	  else if($status1!='Confirm' and $ttl=='Annual Leave' ){echo $aday2;}
	  else if($status1!='Confirm' and $ttl=='Half Day Leave' ){echo $aday2;}
	  else if($status1=='Confirm' and $ttl=='Emergency Leave' ){echo $aday1;} 
	  else if($status1!='Confirm' and $ttl=='Emergency Leave' ){echo $aday1;}
	  else if($status1=='Confirm' and $ttl=='Sick Leave' ){echo $sl1s;} 
	  else if($status1!='Confirm' and $ttl=='Sick Leave' ){echo $sl1s;}
	  else {echo '';}
	  
	  
	  
	  
	  ?>
	  
	  
	  
	  </td>
	  
	  
	  
	  
      <td align="center"><?php echo $row["sdate"]; ?>
      <td align="center"><?php echo $row["edate"]; ?>  
	  <td align="center"><?php echo $row["dept"]; ?>  
	  <td align="center"><?php echo $row["hos"]; ?>  
	  <td align="center"><?php echo $row["reason"]; ?> 


<?php

$ss=date('m/d/Y',strtotime($row['sdate']));
$ss1=date('m/d/Y',strtotime($row['edate']));
$query33 = "SELECT COUNT(id) FROM mcertificate where pmrn='$pmrn' and fdate='$ss' and tdate='$ss1'"; 
	 
$result33 = mysqli_query($con, $query33) or die(mysqli_error());

// Print out result
$row33 = mysqli_fetch_array($result33);

$url = "printmcedit1test?pmrn=$pmrn&sdate=$ss&edate=$ss1"; 
?>
	  
	  <td align="center"><a onclick="return confirm_click();" href="leaveapprovei?id=<?php echo $row["id"]; ?>&user=<?php echo "$user"; ?>"><strong>Approve</strong></a></td>
<td align="center"><a onclick="return confirm_click1();" href="leaveapprovere?id=<?php echo $row["id"]; ?>&user=<?php echo "$user"; ?>"><strong>Reject</strong></a></td>
<td>
<?php if($row33['COUNT(id)']!=0){

echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='150' height='60'/></a>";


}?></td>  
	  
      </tr>
    <?php $count++; } ?>
	
	
	<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from dleave where hstatus='Approval Pending' and hos in('$full') and recomby=''";
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
	  
	  ?>
	  
      <td align="center"><?php echo $fulln; ?></a></td>
      <td align="center"><?php echo $row["tleave"].'<br>'.$row['apply_time'].'<br>';?>
	  <td align="center"><?php echo $row["total"]; ?>
	  
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

$sl1s=14-$sl;
	  
	      $pmrn= $row39['mrn'];
	  
	  $status1= $row39['cstatus'];

$now = time(); // or your date as well
$year=date('Y');
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
//$your_date = strtotime("2019-01-01");
$datediff = $now - $your_date;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438,2) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274,2) ;



$fday3= round($datediff / (60 * 60 * 24)*.0164,2) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;


//echo $fday;
$aday=$fday+$cf-$al;
$aday1=$fday1-$el;
$aday2=$fday3-$al;
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
	  else if($status1=='nonconfirm'and $cyear!=$doj12 and $ttl=='Annual Leave'){echo $aday2;} 
	  else if($status1=='nonconfirm'and $cyear==$doj12 and $ttl=='Annual Leave'){echo $fday8;}
	  
	  
	  else if($status1=='Confirm'and $cyear!=$doj12 and $ttl=='Half Day Leave'){echo $aday;} 
	  else if($status1=='nonconfirm'and $cyear!=$doj12 and $ttl=='Half Day Leave'){echo $aday2;} 
	  else if($status1=='nonconfirm'and $cyear==$doj12 and $ttl=='Half Day Leave'){echo $fday8;}
	  
	  
	  else if($status1=='Confirm' and $ttl=='Emergency Leave'){echo $aday1;} 
	  else if($status1=='nonconfirm' and $ttl=='Emergency Leave'){echo $fday9;}
	  
	  
	  else if($status1=='Confirm' and $ttl=='Sick Leave' ){echo $sl1s;} 
	  else if($status1!='Confirm' and $ttl=='Sick Leave' ){echo $sl1s;}
	  else {echo '';}
	  
	  
	  
	  
	  ?>
	  
	  
	  
	  </td>
      <td align="center"><?php echo $row["sdate"]; ?>
      <td align="center"><?php echo $row["edate"]; ?>  
	  <td align="center"><?php echo $row["dept"]; ?>  
	  <td align="center"><?php echo $row["hos"]; ?>  
	  <td align="center"><?php echo $row["reason"]; ?>  

<?php

$ss=date('m/d/Y',strtotime($row['sdate']));
$ss1=date('m/d/Y',strtotime($row['edate']));
$query33 = "SELECT COUNT(id) FROM mcertificate where pmrn='$pmrn' and fdate='$ss' and tdate='$ss1'"; 
	 
$result33 = mysqli_query($con, $query33) or die(mysqli_error());

// Print out result
$row33 = mysqli_fetch_array($result33);

$url = "printmcedit1test?pmrn=$pmrn&sdate=$ss&edate=$ss1"; 
?>









	  
	  

	  
	  
	  <td align="center"><a onclick="return confirm_click();" href="leaveapprove?id=<?php echo $row["id"]; ?>&user=<?php echo "$user"; ?>"><strong>Approve</strong></a></td>
	  <td align="center"><a onclick="return confirm_click2();" href="leaveapprove_r?id=<?php echo $row["id"]; ?>&user=<?php echo "$user"; ?>"><strong>Forward For Recommendation</strong></a></td>
<td align="center"><a onclick="return confirm_click1();" href="leaveapprovere?id=<?php echo $row["id"]; ?>&user=<?php echo "$user"; ?>"><strong>Reject</strong></a></td>

<td>
<?php if($row33['COUNT(id)']!=0){

echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='150' height='60'/></a>";


}?></td>  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	
	
	<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$dd=date('Y-01-01');
$dd1=date('Y-12-31');
$count=1;
$sel_query="Select * from dleave where hstatus in ('Approval Pending','Forwarded to Incharge') and sdate between '$dd' and '$dd1'   order by id desc";
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
	  
	  ?>
	  
      <td align="center"><?php echo $fulln; ?></a></td>
      <td align="center"><?php echo $row["tleave"].'<br>'.$row['apply_time'].'<br>';?>
	  <td align="center"><?php echo $row["total"]; ?>
	  
	  
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

$sl1s=14-$sl;
	  
	  
	  
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
	  <td align="center"><?php echo $row["reason"]; ?>  
	  <td align="center"><?php echo $row["hstatus"]; ?>  

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

echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='150' height='60'/></a>";


}?></td>  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
  </tbody>
</table>


</form>

</body>

</html>

