<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf')"; 
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Doriddro Fund Pending Approval List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient Name</strong></th>
      <th width="10%"><strong>Patient MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Diagnosis</strong>   
      <th width="14%"><strong>Clinical Condition</strong>
	  <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>DD Request</strong>
	  <th width="14%"><strong>DD Given</strong>
	  <th width="14%"><strong>Alocation Date</strong>
	  
	  <th width="14%"><strong>Current Status</strong>
	  <th width="14%"><strong>View/Edit</strong>
	  <th width="14%"><strong>Approve</strong>
	  <th width="14%"><strong>Reject</strong>
	  
      
	   </tr>
  </thead>
  <tbody>
  
  
  <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from preadm where apstatus='Waiting For Finance Approval' and ddrequest ='pending' and dd01='$fullname' order by aldate desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count1; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></td><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["dia1"]; ?>
      <td align="center"><?php echo $row["cinfo"]; ?>  
	  
	  <td align="center"><?php echo $row["ddrequest"]; ?>  
	   
	  <td align="center"><?php echo $row["arequest"]; ?>  
	  
	  <td align="center"><?php echo $row["bfigure"]; ?> 
	  <td align="center"><?php echo $row["aldate"]; ?>  
	  <td align="center"><?php echo $row["apstatus"]; ?>
	  
<td align="center"><a href="ddmngedit?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="ddaproval2?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>

<td align="center"><a href="rejectmd99?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count1++; } ?>

	
	
	 <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$sel_query="Select * from endopapp where apstatus='Waiting For Finance Approval' and ddrequest ='pending' and dd01='$fullname' order by aldate desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count1; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><?php echo $row["dreffer"]; ?>
      <td align="center"><?php echo $row["dia1"]; ?>
      <td align="center"><?php echo $row["cinfo"]; ?>  
	  <td align="center"><?php echo $row["ddrequest"]; ?>  
	  <td align="center"><?php echo $row["arequest"]; ?> 
	  
<td align="center"><?php echo $row["bfigure"]; ?> 	  
<td align="center"><?php echo $row["aldate"]; ?>  
	  <td align="center"><?php echo $row["apstatus"]; ?>  
<td align="center"><a href="ebilladmddbillendomng?id=<?php echo $row["ID"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="ddaproval2endo?id=<?php echo $row["ID"]; ?>"><strong>Confirm</strong></a></td>

<td align="center"><a href="rejectmd99e?id=<?php echo $row["ID"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count1++; } ?>
  
  
  
  
  
    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count2=1;
$sel_query="Select * from preadm where apstatus='Forwarded For CFO Approval' and ddrequest ='pending' and cfo='$fullname' order by aldate desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count2; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></td><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["dia1"]; ?>
      <td align="center"><?php echo $row["cinfo"]; ?>  
	  <td align="center"><?php echo $row["ddrequest"]; ?>  
	   
	  <td align="center"><?php echo $row["arequest"]; ?>  
	  <td align="center"><?php echo $row["bfigure"]; ?> 
	  <td align="center"><?php echo $row["aldate"]; ?>  
	  <td align="center"><?php echo $row["apstatus"]; ?>  
<td align="center"><a href="ddmngedit?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="ddaproval2?id=<?php echo $row["id"]; ?>"><strong>Approve</strong></a></td>

<td align="center"><a href="rejectmd99?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count2++; } ?>

	
	
	 <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$sel_query="Select * from endopapp where apstatus='Forwarded For CFO Approval' and ddrequest ='pending' and cfo='$fullname' order by aldate desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count2; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><?php echo $row["dreffer"]; ?>
      <td align="center"><?php echo $row["dia1"]; ?>
      <td align="center"><?php echo $row["cinfo"]; ?>  
	  <td align="center"><?php echo $row["ddrequest"]; ?>  
	  <td align="center"><?php echo $row["arequest"]; ?> 
<td align="center"><?php echo $row["bfigure"]; ?> 	  
<td align="center"><?php echo $row["aldate"]; ?>  
	  <td align="center"><?php echo $row["apstatus"]; ?>  
<td align="center"><a href="ebilladmddbillendomng?id=<?php echo $row["ID"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="ddaproval2endo?id=<?php echo $row["ID"]; ?>"><strong>Approve</strong></a></td>

<td align="center"><a href="rejectmd99e?id=<?php echo $row["ID"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count2++; } ?>

	
	
	<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count3=1;
$sel_query="Select * from preadm where apstatus='Forwarded For MD Approval' and ddrequest ='pending' and md='$fullname' order by aldate desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count3; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["dia1"]; ?>
      <td align="center"><?php echo $row["cinfo"]; ?>  
	  <td align="center"><?php echo $row["ddrequest"]; ?>  
	  <td align="center"><?php echo $row["arequest"]; ?> 
<td align="center"><?php echo $row["bfigure"]; ?> 	  
<td align="center"><?php echo $row["aldate"]; ?>  
	  <td align="center"><?php echo $row["apstatus"]; ?>  
<td align="center"><a href="ddmngedit?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="ddaproval2?id=<?php echo $row["id"]; ?>"><strong>Approve</strong></a></td>

<td align="center"><a href="rejectmd99?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count3++; } ?>

	
	 <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$sel_query="Select * from endopapp where apstatus='Forwarded For MD Approval' and ddrequest ='pending' and md='$fullname' order by aldate desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count3; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><?php echo $row["dreffer"]; ?>
      <td align="center"><?php echo $row["dia1"]; ?>
      <td align="center"><?php echo $row["cinfo"]; ?>  
	  <td align="center"><?php echo $row["ddrequest"]; ?>  
	  <td align="center"><?php echo $row["arequest"]; ?>  
	  <td align="center"><?php echo $row["bfigure"]; ?> 
	  <td align="center"><?php echo $row["aldate"]; ?>  
	  <td align="center"><?php echo $row["apstatus"]; ?>  
<td align="center"><a href="ebilladmddbillendomng?id=<?php echo $row["ID"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="ddaproval2endo?id=<?php echo $row["ID"]; ?>"><strong>Approve</strong></a></td>

<td align="center"><a href="rejectmd99e?id=<?php echo $row["ID"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count3++; } ?>



<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count4=1;
$sel_query="Select * from preadm where apstatus='Forwarded For CEO Approval' and ddrequest ='pending' and ceo='$fullname' order by aldate desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count4; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["dia1"]; ?>
      <td align="center"><?php echo $row["cinfo"]; ?>  
	  <td align="center"><?php echo $row["ddrequest"]; ?>  
	  <td align="center"><?php echo $row["arequest"]; ?>  
	  <td align="center"><?php echo $row["bfigure"]; ?> 
	  <td align="center"><?php echo $row["aldate"]; ?>  
	  <td align="center"><?php echo $row["apstatus"]; ?>  
<td align="center"><a href="ddmngedit?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="ddaproval2?id=<?php echo $row["id"]; ?>"><strong>Approve</strong></a></td>

<td align="center"><a href="rejectmd99?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count4++; } ?>    

	
	 <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$sel_query="Select * from endopapp where apstatus='Forwarded For CEO Approval' and ddrequest ='pending' and ceo='$fullname' order by aldate desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count4; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><?php echo $row["dreffer"]; ?>
      <td align="center"><?php echo $row["dia1"]; ?>
      <td align="center"><?php echo $row["cinfo"]; ?>  
	  <td align="center"><?php echo $row["ddrequest"]; ?>  
	  <td align="center"><?php echo $row["arequest"]; ?>
<td align="center"><?php echo $row["bfigure"]; ?> 	 
<td align="center"><?php echo $row["aldate"]; ?>   
	  <td align="center"><?php echo $row["apstatus"]; ?>  
<td align="center"><a href="ebilladmddbillendomng?id=<?php echo $row["ID"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="ddaproval2endo?id=<?php echo $row["ID"]; ?>"><strong>Approve</strong></a></td>

<td align="center"><a href="rejectmd99e?id=<?php echo $row["ID"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count4++; } ?>

</tbody>
</table>

</form>

</body>

</html>

