<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','doctor')"; 
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
$cyear=date('Y');

$sid=$_REQUEST['sid'];

?>
<?php
require('db1.php');
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM staff3 where sid= '$sid'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['sid1'];
$full1 = $row39['sname'];

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
<p align="center" class="style1"><?php echo $full1; ?>'s Attendance Details </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Name</strong></th>
      
      <th width="15%"><strong>Department</strong>
	  <th width="14%"><strong>Date</strong>   
      <th width="14%"><strong>Start Time</strong>   
      <th width="14%"><strong>End Time</strong>
	  <th width="14%"><strong>Late Time</strong>
	  <th width="14%"><strong>Total Working Hour</strong>
	  <th width="14%"><strong>Status</strong>
	  
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	
$ss1=date('Y-m-01');
$ss2=date('Y-m-31');

	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from tm3 where uid='$full' and date1 between '$ss1' and '$ss2'";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
            <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["name"]; ?></a></td>
	  
	  
	  <td align="center"><?php echo $row["dept"]; ?></a></td>
       <td align="center"><?php echo $row['date1'];?></td>
	   
	   <td align="center"><?php echo $row['date'];?></td>
	   <td align="center"><?php echo $row['otime'];?></td>
	   <td align="center"><?php echo $row['time'];?></td>
	   <td align="center"><?php echo $row['ttime'];?></td>
	  

	  <?php 
$mname=$row['status'];
?>

 <td align="center"><?php if($mname =='LT') {echo '<span style="color:blue;text-align:center;"><b>LT<b>';}else if($mname=='P') {echo "<span style='color:green;text-align:center;'><b>P"; } else if($mname =='L'){echo "<span style='color:red;text-align:center;'><b>L";} else if($mname =='H'){echo "<span style='color:orange;text-align:center;'><b>H";} else if($mname =='A'){echo '<span style="color:red;text-align:center;"><b>A<b>';}?></td>

      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

</form>

</body>

</html>

