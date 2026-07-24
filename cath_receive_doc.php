<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];
?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
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


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>

</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='otdash'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='cview'><span>List of Unpaid Appointment</span></a>
            
         </li>
		 		 <li class='has-sub'><a href='cviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
      </ul>
	  
   </li>

    	    <li class='last'><a href='gg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='app1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $full; ?>'s Dash Board </p> 
<form action="cviewsp1" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="14%"><strong>Consultant Name</strong>
	  <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>OT Time </strong>
      <th width="14%"><strong>Anaethetist Name</strong> 
      <th width="14%"><strong>Duration</strong>
      <th width="14%"><strong>Procedure</strong> 
<th width="14%"><strong>Date</strong> 	  
      
	        <th width="14%"><strong>Type</strong>
			<th width="14%"><strong>Details</strong>
	  <th width="14%"><strong>Edit</strong>
	  
	  
	  <th width="14%"><strong>Confirm</strong>
<th width="14%"><strong>Cancel Case</strong>


	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$test5=date('Y-m-d', strtotime('-5 days') );
//echo datetime(NOW());
//echo DATE_SUB(now(), 'interval 2 day');

$rrd5=date('Y-m-d 23:59:59', strtotime('-1 days') );
$rrd6=date('Y-m-d 23:59:59', strtotime('+1 days') );
//$rrd1=$row['ot_charge_date'];
		   
	//	   `ot_charge_date` between '$rrd5' and '$rrd6'

$count=1;



$sel_query="Select * from cath_receive where ustatus='Updated' and '$full' in (`dname`,`dname2`) and `date1`>='$test5'";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td> 
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["duration"]; ?>
      <td align="center"><?php echo $row["nanes"]; ?>  
	  <td align="Left"><?php echo $row["duration1"]; ?>  
	  	  <td align="Left"><?php echo $row["proce"]; ?> 
		  <td align="Left"><?php echo $row["otdate"]; ?> 
      

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>

<?php
$rrd=date('Y-m-d 23:59:59', strtotime('-2 days') );
$rrd1=$row['ot_charge_date'];
		   
		   if($rrd1>=$rrd || $rrd1==''){echo'
		   
		   
		   <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="otpatientdashdoc?id='.$row["id"].'">Details</a> </td>
	       <td><a href="ssnotetestedit1?id='.$row['id'].'&pmrn='.$row["pmrn"].'">EDIT</a></td>
		   	  
		   

<td align="center" colspan="1"><a onclick="return confirm_click1();" href="otnotecomplete?pmrn='.$row["pmrn"].'&full='.$full.'&id='.$row["id"].'">Confirm OT Note</a></td>
	  <td align="center"><a href="otcanceldoc?id='.$row["id"].'"><strong>Cancel</strong></a></td>
	  
	  ';}
	  else {
		  
		  echo ' <td colspan="6"align="center">
		  
		  <input type="button" name="edit" value="Send Request" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data">
		  
</td>';
	  }
	  
	  ?>
      </tr>
    <?php $count++; } ?>

	
	
