<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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
<p align="right" style="font-size:22px;font-weight:bold"><a target='_BLANK' href="<?php echo 'incident_work_flow.jpg'; ?>">Work Flow</a></p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
	  <th width="4%"><strong>Incident No</strong></th>
      <th width="5%"><strong>Incident Type</strong></th>
      <th width="5%"><strong>Department Involved</strong></th>
      <th width="75%"><strong>Details </strong>
      
	  <th width="6%"><strong>Write Comments</strong>
	  <th width="5%"><strong>Details</strong>
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	if($fullname=='ceo'){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Pending Incident<b> </td> </tr>';
}

		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where status='forwarded' and ceo='$fullname' and com1='' order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["itype"]; ?></a></td>
      <td align="center"><?php echo $row["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $row["idetails"]; ?></textarea>
      
      <td align="center"align="right">



	  <?php 
	  if($row['itype']=='Clinical')
	  {echo
  
	  '<a href="incident1?ceo='.$row['ceo'].'&cfo='.$row['cfo'].'&cno='.$row['cno'].'>&md='.$row['md'].'&hos='.$row['hos'].'&id='.$row['id'].'">Write Comments</a>';}
	  
	  
	  else if($row['itype']=='Non-Clinical')
	  {echo
  
	  '<a href="incident1?ceo='.$row['ceo'].'&cfo='.$row['cfo'].'&cno='.$row['cno'].'>&md='.$row['md'].'&hos='.$row['hos'].'&id='.$row['id'].'">Write Comments</a>';}
	  /*<a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Write Comments</a>*/
	  else {echo "ALL Comments Not Completed Yet";}
	  ?>




	  </td>	  
	  <td align="center"align="right"><a href="incident_print?id=<?php echo $row['id']; ?>">Details</a>
   
   
     <?php

$rr=$row['id'];
   $query43 = "SELECT COUNT(pmrn) FROM incident_gallery where pmrn= '$rr';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count_pic =$row43['COUNT(pmrn)'];


if($count_pic>0){

echo '
<br><a href="view_incident_image?pmrn='.$row['id'].'">View Image</a>';


};
?>

   
   </td>	  
	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	
	    <?php
	
		
						if($fullname=='ceo'){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Already Commented Incident<b> </td> </tr>';
}

		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where status='forwarded' and ceo='$fullname' and com1!=''order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["itype"]; ?></a></td>
      <td align="center"><?php echo $row["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $row["idetails"]; ?></textarea>
      
      <td align="center"align="right"><a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Edit Comments</a>


   </td>	  
	  <td align="center"align="right"><a href="incident_print?id=<?php echo $row['id']; ?>">Details</a>
   
   
     <?php

$rr=$row['id'];
   $query43 = "SELECT COUNT(pmrn) FROM incident_gallery where pmrn= '$rr';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count_pic =$row43['COUNT(pmrn)'];


if($count_pic>0){

echo '
<br><a href="view_incident_image?pmrn='.$row['id'].'">View Image</a>';


};
?>

   
   </td>	  
	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	 <?php
	
				if($fullname=='md' || $fullname=='md01'){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Pending Incident<b> </td> </tr>';
}
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where status='forwarded' and md in('$fullname','md') and com4=''order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["itype"]; ?></a></td>
      <td align="center"><?php echo $row["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $row["idetails"]; ?></textarea>
      
      <td align="center"align="right"><a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Write Comments</a>
   
   
   </td>	  
	  <td align="center"align="right"><a href="incident_print?id=<?php echo $row['id']; ?>">Details</a>
   
   
     <?php

$rr=$row['id'];
   $query43 = "SELECT COUNT(pmrn) FROM incident_gallery where pmrn= '$rr';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count_pic =$row43['COUNT(pmrn)'];


if($count_pic>0){

echo '
<br><a href="view_incident_image?pmrn='.$row['id'].'">View Image</a>';


};
?>

   
   </td>	  
	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	    <?php
	
	
						if($fullname=='md' || $fullname=='md01'){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Already Commented Incident<b> </td> </tr>';
}
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where status='forwarded' and md in('$fullname','md') and com4!=''order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["itype"]; ?></a></td>
      <td align="center"><?php echo $row["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $row["idetails"]; ?></textarea>
      
      <td align="center"align="right"><a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Edit Comments</a>
   

   
   </td>	  
	  <td align="center"align="right"><a href="incident_print?id=<?php echo $row['id']; ?>">Details</a>
   
   
     <?php

$rr=$row['id'];
   $query43 = "SELECT COUNT(pmrn) FROM incident_gallery where pmrn= '$rr';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count_pic =$row43['COUNT(pmrn)'];


if($count_pic>0){

echo '
<br><a href="view_incident_image?pmrn='.$row['id'].'">View Image</a>';


};
?>

   
   </td>	  
	    

	
				


      </tr>
    <?php $count++; } ?>
	
	
	
	<?php
	
				if($fullname=='cfo'){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Pending Incident<b> </td> </tr>';
}
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where status='forwarded' and cfo='$fullname' and com2=''order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["itype"]; ?></a></td>
      <td align="center"><?php echo $row["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $row["idetails"]; ?></textarea>
      
      <td align="center"align="right"><a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Write Comments</a>
   
     

   
   </td>	  
	  <td align="center"align="right"><a href="incident_print?id=<?php echo $row['id']; ?>">Details</a>
   
   
     <?php

$rr=$row['id'];
   $query43 = "SELECT COUNT(pmrn) FROM incident_gallery where pmrn= '$rr';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count_pic =$row43['COUNT(pmrn)'];


if($count_pic>0){

echo '
<br><a href="view_incident_image?pmrn='.$row['id'].'">View Image</a>';


};
?>

   </td>	  
	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	    <?php
	
	
						if($fullname=='cfo'){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Already Commented Incident<b> </td> </tr>';
}
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where status='forwarded' and cfo='$fullname' and com2!=''order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["itype"]; ?></a></td>
      <td align="center"><?php echo $row["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $row["idetails"]; ?></textarea>
      
      <td align="center"align="right"><a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Edit Comments</a>
   
   
    
   
   </td>	  
	  <td align="center"align="right"><a href="incident_print?id=<?php echo $row['id']; ?>">Details</a>
   
   
   
     <?php

$rr=$row['id'];
   $query43 = "SELECT COUNT(pmrn) FROM incident_gallery where pmrn= '$rr';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count_pic =$row43['COUNT(pmrn)'];


if($count_pic>0){

echo '
<br><a href="view_incident_image?pmrn='.$row['id'].'">View Image</a>';


};
?>

   </td>	  
	  
      </tr>
    <?php $count++; } ?>
	
	
	
		<?php
	
				if($fullname=='ruzita'){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Pending Incident<b> </td> </tr>';
}
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where status='forwarded' and cno='$fullname' and com3=''order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["itype"]; ?></a></td>
      <td align="center"><?php echo $row["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $row["idetails"]; ?></textarea>
      
      <td align="center"align="right"><a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Write Comments</a>
   
      

   
   </td>	  
	  <td align="center"align="right"><a href="incident_print?id=<?php echo $row['id']; ?>">Details</a>
   
   
     <?php

$rr=$row['id'];
   $query43 = "SELECT COUNT(pmrn) FROM incident_gallery where pmrn= '$rr';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count_pic =$row43['COUNT(pmrn)'];


if($count_pic>0){

echo '
<br><a href="view_incident_image?pmrn='.$row['id'].'">View Image</a>';


};
?>

   </td>	  
	  <td align="center"align="right"><a href="incident_close?id=<?php echo $row['id']; ?>">Close Incident</a></td>	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	    <?php
	
	
						if($fullname=='ruzita'){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Already Commented Incident<b> </td> </tr>';
}
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where status='forwarded' and cno='$fullname' and com3!=''order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["itype"]; ?></a></td>
      <td align="center"><?php echo $row["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $row["idetails"]; ?></textarea>
      
      <td align="center"align="right"><a href="incident1?ceo=<?php echo $row['ceo']; ?>&cfo=<?php echo $row['cfo']; ?>&cno=<?php echo $row['cno']; ?>&md=<?php echo $row['md']; ?>&hos=<?php echo $row['hos']; ?>&id=<?php echo $row['id']; ?>">Edit Comments</a>
   
   
   </td>	  
	  <td align="center"align="right"><a href="incident_print?id=<?php echo $row['id']; ?>">Details</a>
   
   
     <?php

$rr=$row['id'];
   $query43 = "SELECT COUNT(pmrn) FROM incident_gallery where pmrn= '$rr';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count_pic =$row43['COUNT(pmrn)'];


if($count_pic>0){

echo '
<br><a href="view_incident_image?pmrn='.$row['id'].'">View Image</a>';


};
?>

   
   </td>	  
	  <td align="center"align="right"><a href="incident_close?id=<?php echo $row['id']; ?>">Close Incident</a></td>	  
      </tr>
    <?php $count++; } ?>




	</tbody>
  

</table>

</form>

</body>

</html>
