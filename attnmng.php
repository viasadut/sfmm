<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','adminmng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 20; URL=$url1");

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
$row7 = mysqli_fetch_array($result3);
$dept=$row7['sdept'];
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
$row7 = mysqli_fetch_array($result3);
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
  <li class='last'><a href='leaveprint1'><span>Print Approved Leave</span></a></li>
   <li class='last'><a href='viewleave'><span>Leave Balance</span></a></li>
   <li class='last'><a href='leavestatsadm'><span>Consultant Wise Leave Stats</span></a></li>
   <li class='last'><a href='tadmleave'><span>Today's Present Consultant List</span></a></li>
   <li class='last'><a href='attnstatsadm'><span>Consultant Wise Attendance Stats</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




<p align="center" class="style1">Todays Consultant's Attendance  Status </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Consultant Name</strong></th>
	  <th width="17%"><strong>ID</strong></th>
	  <th width="17%"><strong>Start Time</strong></th>
	  <th width="17%"><strong>Feeling</strong></th>
      <th width="10%"><strong>Status</strong></th>
      <th width="15%"><strong>Location</strong>
      
	  
      
	   </tr>
  </thead>
  <tbody>

  
  
  
<?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');

$sel_query="Select * from staff3 where desig in('CEO','CFO','MD','CNO','MD') order by desig asc";
//$start=$row["aadate"];
$count=1;
$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
	  <td align="center"><?php echo $row["desig"]; ?></a></td>
       <?php 

$adate=date('Y-m-d');
$ssid=$row["sname"];
$query40 = "SELECT * FROM attendance where sname= '$ssid' and adate='$adate';"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$mname=$row40["status"];
$location=$row40["location"];
$stime=$row40["stime"];
$mode=$row40["mode"];

$sel_query50="Select COUNT(sid) from conleavedetails where status in('Approved By ALL','Approval Pending','Approve By Replacement Consultant') and '$adate' between sdate and edate and sid='$ssid'";
$result50 = mysqli_query($con, $sel_query50) or die(mysqli_error());
$row50 = mysqli_fetch_array($result50);
$num1=$row50['COUNT(sid)'];


?>

	   
	   <td align="center"><?php echo $stime;?></td>
	   	<td align="center"><?php echo "<img src='$mode' title='$mode' width='60' height='40' />";?></td>



	  <td align="center"><?php if($mname=='Present') {echo "<span style='color:green;text-align:center;'><b>$mname"; } else if($num1==1) {echo '<span style="color:blue;text-align:center;"><b>Leave<b>';}else {echo '<span style="color:red;text-align:center;"><b>Absent<b>';}?></td>
	  <td align="center"><?php if($location=='Hospital' && $mname=='Present') {echo "<span style='color:green;text-align:center;'><b>$location"; } else if($location !=='Hospital' && $mname=='Present'){echo '<span style="color:red;text-align:center;"><b>Outside';} else {echo '<span style="background-color:red;text-align:center;">';}?></td>
	  

  
      </tr>
<?php $count++; } 

?>

    


<?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');

$sel_query="Select * from staff1 where astatus ='Active' and ugroup='Doctor' and stype in('permanent','Contractual') order by sid desc";
//$start=$row["aadate"];
//$count=1;
$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["mname"]; ?></a></td>
	  <td align="center"><?php echo $row["sid"]; ?></a></td>
       <?php 

$adate=date('Y-m-d');
$ssid=$row["sid"];
$query40 = "SELECT * FROM attendance where sid= '$ssid' and adate='$adate';"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$mname=$row40["status"];
$location=$row40["location"];
$stime=$row40["stime"];
$mode=$row40["mode"];
$com=$row40["com"];

$sel_query50="Select COUNT(sid) from conleavedetails where status in('Approved By ALL','Approval Pending','Approve By Replacement Consultant') and '$adate' between sdate and edate and sid='$ssid'";
$result50 = mysqli_query($con, $sel_query50) or die(mysqli_error());
$row50 = mysqli_fetch_array($result50);
$num1=$row50['COUNT(sid)'];


?>

	   
	   <td align="center"><?php echo $stime;?></td>
	   	<td align="center"><?php echo "<img src='$mode' title='$mode' width='60' height='40' />";?></td>



	  <td align="center"><?php if($mname=='Present') {echo "<span style='color:green;text-align:center;'><b>$mname"; } else if($num1==1) {echo '<span style="color:blue;text-align:center;"><b>Leave<b>';}else {echo "<span style='color:red;text-align:center;'><b>Absent <br>$com<b>";}?></td>
	  <td align="center"><?php if($location=='Hospital' && $mname=='Present') {echo "<span style='color:green;text-align:center;'><b>$location"; } else if($location !=='Hospital' && $mname=='Present'){echo '<span style="color:red;text-align:center;"><b>Outside';} else {echo '<span style="background-color:red;text-align:center;">';}?></td>
	  

  
      </tr>
<?php $count++; } 

?>
  </tbody>
  
</table>













</form>

</body>

</html>

