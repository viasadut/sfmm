<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','store','doctor','ot','endo','emergency','mofficer','pharmacy','radio','lab','billing','ipd')"; 
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
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
?>
<?php
$full = $row39['fullname'];

$user=$_SESSION["sess_username"];

$query40 = "SELECT * FROM staff3 where sid='$fullname'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$sid1=$row40['sid1'];
$cat=$row40['cat'];
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


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Request ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Reject this Leave ?");
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Charge Code Pending Approval List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      
	  
	  <th width="17%"><strong>Request Department</strong></th>
      <th width="10%"><strong>RFID</strong></th>
	  
	  
	  <th width="14%"><strong>View/Edit</strong>
	  <th width="14%"><strong>Approve</strong>
	  <th width="14%"><strong>PRF Value</strong> 
	  <th width="14%"><strong>Reject</strong>
	  <th width="14%"><strong>Print</strong>
	  
      
	   </tr>
  </thead>
  <tbody>


	
	
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from purchase_stock3 where fstatus in('1','2') and hod='$sid1' group by rfid ORDER BY id asc;";
//$sel_query="Select * from purchase_stock where fstatus in('1','2') and '$user'='cfo' group by rfid ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	 
	  
	  <td align="center"><?php echo $row["location"]; ?></td>
	  <td align="center"><?php echo $row['rfid']; ?></td>
     

	  <?php
$ss_no=$row['rfid'];
$query2 = mysqli_query($con,"select SUM(t_price) from purchase_stock3 where rfid='$ss_no'");
	 $data2 = mysqli_fetch_array($query2);
  
	  ?>
	  
	  <?php if($row['fstatus']!=2){?>
	  
	  <td align="center">

<a href="purchase_approve_mng?id=<?php echo $row['rfid']; ?>">View/Edit</a>


</td>
	  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="prf_forward_mng1?sno=<?php echo $row["rfid"]; ?>&user=<?php echo "$fullname";?>&cat=<?php echo "$cat";?>">Approve</a> </td>
	  
	  
	  <td align="center"><?php echo $data2['SUM(t_price)']; ?><strong></strong></a>
	  <td align="center"><a onclick="return confirm_click2();" href="prf_reject_con?id=<?php echo $row["rfid"]; ?>"><strong>Reject</strong></a>
	  
	  
	  </td>
	  
	  <td></td>
	 
	  <?php
	  
	  } 
	  
	  
	  
	  else if(($row['fstatus']==2)){
		  
		 echo'
		 <td></td>
		 <td></td>
		 <td></td>
		 
		 <td colspan="2" align="center">
			<a target="_blank" href="prf_request?sno='.$row['rfid'].'"><img src="phar_pic/print.png" title="Print Receipt" width="40" height="40" /></a>
			
			</td>';
	  }
	  
	  ?>
	      


	  
      </tr>
    <?php $count++; } ?>


	<?php
	

	//$start=$_REQUEST["stdate"];
	//$end=$_REQUEST["endate"];
	//$bt=$_REQUEST["bt"];
		
	//$user=$_SESSION["sess_username"];
	$date= date('m/d/Y');
	$count=1;
	
	$sel_query="Select * from purchase_stock3 where fstatus in('1','2') and incharge='$sid1' and incharge_time='' group by rfid ORDER BY id asc;";
	//$sel_query="Select * from purchase_stock where fstatus in('1','2') and '$user'='cfo' group by rfid ORDER BY id asc;";
	
	$result = mysqli_query($con,$sel_query);
	//echo   $bt;
	
	
	while($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
		  <td align="center"><?php echo $count; ?></td>
		  
		 
		  
		  <td align="center"><?php echo $row["location"]; ?></td>
		  <td align="center"><?php echo $row['rfid']; ?></td>
		 
	
		  
		  <?php if($row['fstatus']!=2){?>
		  
		  <td align="center">
	
	<a href="purchase_approve_mng?id=<?php echo $row['rfid']; ?>">View/Edit</a>
	
	
	</td>
		  
		  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="prf_forward_mng1?sno=<?php echo $row["rfid"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
		  
		  <td align="center"><a onclick="return confirm_click2();" href="prf_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
		  
		  
		  </td>
		  
		  <td></td>
		 
		  <?php
		  
		  } 
		  
		  
		  
		  else if(($row['fstatus']==2)){
			  
			 echo'
			 <td></td>
			 <td></td>
			 <td></td>
			 
			 <td colspan="2" align="center">
				<a target="_blank" href="prf_request?sno='.$row['rfid'].'"><img src="phar_pic/print.png" title="Print Receipt" width="40" height="40" /></a>
				
				</td>';
		  }
		  
		  ?>
			  
	
	
		  
		  </tr>
		<?php $count++; } ?>
	


	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

//$sel_query="Select * from purchase_stock where fstatus in('2') and '$user'='ceo' group by rfid ORDER BY id asc;";
$sel_query="Select * from purchase_stock3 where fstatus in('5') and '$user'='1603' and ptype in ('New Purchase') group by rfid ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	 
	  
	  <td align="center"><?php echo $row["location"]; ?></td>
	  <td align="center"><?php echo $row['rfid']; ?></td>
     

	  
	  <?php if($row['fstatus']==5){?>
	  
	  <td align="center">

<a href="new_bill/test_prf_purchase?id=<?php echo $row['rfid']; ?>">View/Edit</a>


<?php

if($row['reject_by']!=''){
	echo '<br />';
	echo 'Reject BY:' .$row['reject_by'];
	echo '<br />';
	echo 'Reject Comments:' .$row['reject_com'];
}
?>


</td>
	  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="prf_forward_mng1?sno=<?php echo $row["rfid"]; ?>&user=<?php echo "$fullname";?>"></a> </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="prf_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
	  
	  
	  </td>
	  
	  <td></td>
	 
	  <?php
	  
	  } 
	  
	  
	  
	  else if(($row['fstatus']!=2) and $row['ptype']=='New Purchase'){
		  
		 echo'
		 <td></td>
		 <td></td>
		 <td></td>
		 
		 <td colspan="2" align="center">
			<a target="_blank" href="prf_request?sno='.$row['rfid'].'"><img src="phar_pic/print.png" title="Print Receipt" width="40" height="40" /></a>
			
			</td>';
	  }
	  
	  ?>
	      


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

//$sel_query="Select * from purchase_stock where fstatus in('2') and '$user'='ceo' group by rfid ORDER BY id asc;";
$sel_query="Select * from purchase_stock3 where fstatus in('3') and '$user'='md' and ptype in ('New Purchase','Stock Items') group by rfid ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	 
	  
	  <td align="center"><?php echo $row["location"]; ?></td>
	  <td align="center"><?php echo $row['rfid']; ?></td>
     

	  
	  <?php if($row['fstatus']==3 and $row['ptype']=='New Purchase' || $row['ptype']=='Stock Items'){?>
	  
	  <td align="center">

<a href="purchase_approve_mng?id=<?php echo $row['rfid']; ?>">View/Edit</a>

<?php

if($row['reject_by']!=''){

	echo 'Reject BY:' .$row['reject_by'];
	echo '<br />';
	echo 'Reject Comments:' .$row['reject_com'];
}
?>


</td>
	  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="prf_forward_mng1?sno=<?php echo $row["rfid"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="prf_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
	  
	  
	  </td>
	  
	  <td></td>
	 
	  <?php
	  
	  } 
	  
	  
	  
	  else if(($row['fstatus']!=3) and $row['ptype']=='Purchase Items'){
		  
		 echo'
		 <td></td>
		 <td></td>
		 <td></td>
		 
		 <td colspan="2" align="center">
			<a target="_blank" href="prf_request?sno='.$row['rfid'].'"><img src="phar_pic/print.png" title="Print Receipt" width="40" height="40" /></a>
			
			</td>';
	  }
	  
	  ?>
	      


	  
      </tr>
    <?php $count++; } ?>
</tbody>
</table>

</form>

</body>

</html>

