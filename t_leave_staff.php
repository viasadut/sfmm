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




<p align="center" class="style1">Todays Staff's Leave Status </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Name</strong></th>
	  <th width="17%"><strong>ID</strong></th>
	  <th width="17%"><strong>Department</strong></th>
	  <th width="17%"><strong>Start Date</strong></th>
	  <th width="17%"><strong>End Date</strong></th>
	  
      <th width="10%"><strong>Leave Type</strong></th>
	  <th width="10%"><strong>Reason</strong></th>
	  <th width="10%"><strong>Replacement Staff</strong></th>
	  <th width="10%"><strong>Status</strong></th>
      
      
	  
      
	   </tr>
  </thead>
  <tbody>

  
  
  

    


<?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');

$sel_query="Select * from dleave where '$date' between `sdate` and `edate` and hstatus in('Approval Pending','Forwarded to Incharge','Confirmed By TM','Forwarded to HOS') order by dept asc";
//$start=$row["aadate"];
$count=1;
$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <?php
	  $sname2=$row["uname"];
	  $query3 = "SELECT * FROM staff3 where sid= '$sname2'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
	  
	$ssname=$row3['sname'];
	  ?>
	  <?php if($row['hstatus']!='Confirmed By TM') {echo'
      <td align="center" style="background-color:red">'.$ssname.'</a></td>';}
	  else {echo '<td align="center" style="background-color:lightgreen">'.$ssname.'</a></td>';}
	  ?>
	  
	  <td align="center"><?php echo $row["uname"]; ?></a></td>
	  <td align="center"><?php echo $row["dept"]; ?></a></td>
       
	   <td align="center"><?php echo $row['sdate'];?></td>
	   <td align="center"><?php echo $row['edate'];?></td>
	   <td align="center"><?php echo $row['type'];?></td>
	   <td align="center"><?php echo $row['reason'];?></td>
	   <td align="center"><?php echo $row['r_name'];?></td>
	   <td align="center"><?php echo $row['hstatus'];?></td>
	   
	



	
	  
	  

  
      </tr>
<?php $count++; } 

?>

  </tbody>
  
  
  
</table>













</form>

</body>

</html>


