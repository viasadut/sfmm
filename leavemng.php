<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','call')"; 
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




<p align="center" class="style1">Todays Consultant's Leave  Status </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Consultant Name</strong></th>
      <th width="10%"><strong>Leave Type</strong></th>
      <th width="15%"><strong>Total Days Applied </strong>
      <th width="14%"><strong>From</strong>   
      <th width="14%"><strong>To</strong>
	  <th width="14%"><strong>Reason</strong>
	  <th width="14%"><strong>Replacement Doc</strong>
	  <th width="14%"><strong>Status</strong>
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from conleavedetails where status='Approved By ALL' and '$date' between sdate and edate";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
      <td align="center"><?php echo $row["tleave"]; ?>
	  <td align="center"><?php echo $row["tdays"]; ?>
      <td align="center"><?php echo $row["sdate"]; ?>
      <td align="center"><?php echo $row["edate"]; ?>  
	  <td align="center"><?php echo $row["reason"]; ?>  
	  <td align="center"><?php echo $row["rdoc"]; ?>  
	  <td align="center"><?php echo $row["status"]; ?> 
	  <td align="center"><a target='_blank' href="leaveprint?id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print" width="150" height="60" /></a></td>


	  
      </tr>
<?php $count++; } 

?>
  </tbody>
  
</table>






<p align="center" class="style1">Todays Staff's Leave  Status </p> 

<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Requested By</strong></th>
      <th width="10%"><strong>Leave Type</strong></th>
      <th width="15%"><strong>Total Days Applied </strong>
      <th width="14%"><strong>Start From</strong>   
      <th width="14%"><strong>End Date</strong>
	  <th width="14%"><strong>Department</strong>
	  <th width="14%"><strong>HOS</strong>
	  <th width="14%"><strong>Status</strong>
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from dleave where hstatus='Confirmed By TM' and '$date' between sdate and edate order by dept asc";
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
      <td align="center"><?php echo $row["tleave"]; ?>
	  <td align="center"><?php echo $row["total"]; ?>
      <td align="center"><?php echo $row["sdate"]; ?>
      <td align="center"><?php echo $row["edate"]; ?>  
	  <td align="center"><?php echo $row["dept"]; ?>  
	  <td align="center"><?php echo $row["hos"]; ?>  
	  <td align="center"><?php echo $row["hstatus"]; ?> 


	  
      </tr>
<?php $count++; } 

?>
  </tbody>
  
</table>






</form>

</body>

</html>

