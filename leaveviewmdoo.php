<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s In-Patients List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Requested By</strong></th>
	  <th width="17%"><strong>User ID</strong></th>
      <th width="10%"><strong>Leave Type</strong></th>
      <th width="15%"><strong>Total Days Applied </strong>
      <th width="14%"><strong>Start From</strong>   
      <th width="14%"><strong>End Date</strong>
	  <th width="14%"><strong>Reason</strong>
	  <th width="14%"><strong>Replacement Doc</strong>
	  
	  <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Attachment</strong>
	  <th width="14%"><strong>Approve</strong>
	  <th width="14%"><strong>Reject</strong>
	  <th width="14%"><strong>Past Leave History</strong>
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from conleavedetails where status='Approved By Replacement Consultant' and md='$full' and tdays<=3";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
      <td align="center"><?php echo $row["sid"]; ?>
	  <td align="center"><?php echo $row["tleave"]; ?>
	  <td align="center"><?php echo $row["tdays"]; ?>
      <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["sdate"]) ); ?>
      <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["edate"]) ); ?>  
	  <td align="center"><?php echo $row["reason"]; ?>  
	  <td align="center"><?php echo $row["rdoc"]; ?>  
	  <td align="center"><?php echo $row["status"]; ?>  
	   <td><a class="thumbnail fancybox" rel="ligthbox" href="leave/<?php echo $row['upload'] ?>">Attachment</a></td>
<td align="center"><a onclick="return confirm_click();" href="leaveapprove1md?id=<?php echo $row["id"]; ?>&sid=<?php echo $row["sid"]; ?>&tleave=<?php echo $row["tleave"]; ?>&tdays=<?php echo $row["tdays"]; ?>"><strong>Approve</strong></a></td>
<td align="center"><a href="rejectmd?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
<td align="center"><strong><a  target='_blank' href="pastleave?sid=<?php echo $row['sid']; ?>">Past Leave History</a></strong></td>

	  
      </tr>
    <?php $count++; } ?>




    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from conleavedetails where status='Approved By Replacement Consultant' and md='$full' and tdays>3";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
	  <td align="center"><?php echo $row["sid"]; ?>
      <td align="center"><?php echo $row["tleave"]; ?>
	  <td align="center"><?php echo $row["tdays"]; ?>
      <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["sdate"]) ); ?>
      <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["edate"]) ); ?> 
	  <td align="center"><?php echo $row["reason"]; ?>  
	  <td align="center"><?php echo $row["rdoc"]; ?>  
	  <td align="center"><?php echo $row["status"]; ?>  
	   <td><a class="thumbnail fancybox" rel="ligthbox" href="leave/<?php echo $row['upload'] ?>">Attachment</a></td>
<td align="center"><a onclick="return confirm_click();" href="leaveapprove2md?id=<?php echo $row["id"]; ?>"><strong>Approve</strong></a></td>
<td align="center"><a href="rejectmd?id=<?php echo $row["id"]; ?>&user=<?php echo "$user"; ?>"><strong>Reject</strong></a></td>
<td align="center"><strong><a  target='_blank' href="pastleave?sid=<?php echo $row['sid']; ?>">Past Leave History</a></strong></td>
	  
      </tr>
    <?php $count++; } ?>

	
	<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from conleavedetails where status='Approved By MD' and ceo='$full' and tdays>3";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
	  <td align="center"><?php echo $row["sid"]; ?>
      <td align="center"><?php echo $row["tleave"]; ?>
	  <td align="center"><?php echo $row["tdays"]; ?>
      <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["sdate"]) ); ?>
      <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["edate"]) ); ?>  
	  <td align="center"><?php echo $row["reason"]; ?>  
	  <td align="center"><?php echo $row["rdoc"]; ?>  
	  <td align="center"><?php echo $row["status"]; ?>  
	   <td><a class="thumbnail fancybox" rel="ligthbox" href="leave/<?php echo $row['upload'] ?>">Attachment</a></td>

<td align="center"><a onclick="return confirm_click();" href="leaveapprove2ceo?id=<?php echo $row["id"]; ?>&sid=<?php echo $row["sid"]; ?>&tleave=<?php echo $row["tleave"]; ?>&tdays=<?php echo $row["tdays"]; ?>"><strong>Approve</strong></a></td>
<td align="center"><a href="rejectceo?id=<?php echo $row["id"]; ?>&user=<?php echo "$user"; ?>"><strong>Reject</strong></a></td>
<td align="center"><strong><a  target='_blank' href="pastleave?sid=<?php echo $row['sid']; ?>">Past Leave History</a></strong></td>

	  
      </tr>
    <?php $count++; } ?>


</tbody>
</table>

</form>

</body>

</html>

