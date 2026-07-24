<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin1"){
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
    height: 100%;
    width: 100%;
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
   
   
   <li class='active has-sub'><a href='#'><span>Consultant Attendance</span></a>
      <ul>
         <li class='has-sub'><a href='tadmleave'><span>Today's Consultants Attendance</span></a>
            
         </li>
         <li class='has-sub'><a href='tadmleavey'><span>Yesterday's Consultants Attendance</span></a>
            
         </li>
		 <li class='has-sub'><a href='attnstatsadm'><span>Consultant Wise Attendance Stats</span></a>
            
         </li>
      </ul>
	  
   </li>
   
    <li class='active has-sub'><a href='#'><span>Consultant Leave</span></a>
      <ul>
         <li class='has-sub'><a href='leavemng_adm'><span>Today's Consultants Leave</span></a>
            
         </li>
         <li class='has-sub'><a href='viewleave'><span>Leave Balance</span></a>
            
         </li>
		 <li class='has-sub'><a href='leavestatsadm'><span>Consultant Wise Leave Stats</span></a>
            
         </li>
		 
		 <li class='has-sub'><a href='apply_2022_doc'><span>Leave 2022</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   
   <li class='active has-sub'><a href='#'><span>Consultant Menu</span></a>
      <ul>
         <li class='has-sub'><a href='addmemberteststaff1'><span>Add Consultant</span></a>
            
         </li>
         <li class='has-sub'><a href='allstaffmng'><span>View All Consultant</span></a>
            
         </li>
		 <li class='has-sub'><a href='staffeditmng'><span>Edit Consultant Information</span></a>
            
         </li>
         <li class='has-sub'><a href='allstaffmng_de'><span>View Deactivate Consultant</span></a>
            
         </li>
      </ul>
	  
   </li>
   
    <li class='active has-sub'><a href='#'><span>Residence</span></a>
      <ul>
         <li class='has-sub'><a href='apartment1'><span>Edit Residence Information</span></a>
            
         </li>
         <li class='has-sub'><a href='apartmentadd'><span>Add Residence Information</span></a>
            
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
      <th width="10%"><strong>Consultant Name</strong></th>
	  <th width="10%"><strong>ID</strong></th>
      <th width="10%"><strong>Leave Type</strong></th>
      <th width="10%"><strong>Total Days Applied </strong>
      <th width="10%"><strong>From</strong>   
      <th width="10%"><strong>To</strong>
	  <th width="10%"><strong>Applied On</strong>   
      
	  <th width="10%"><strong>Reason</strong>
	  <th width="10%"><strong>Replacement Doc</strong>
	  <th width="10%"><strong>Status</strong>
	  <th width="10%"><strong>Attachment</strong>
	  <th width="10%"><strong>Cancel by</strong>
	  <th width="10%"><strong>A. Balance</strong>
	  <th width="10%"><strong>S. Balance</strong>
	  
      
	   </tr>
  </thead>
  <tbody>
  
    


<?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');

$sel_query="Select * from conleavedetails where status !='Approved By ALL' order by apdate desc";
//$start=$row["aadate"];
$count=1;
$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
	  <td align="center"><?php echo $row["sid"]; ?></a></td>
      <td align="center"><?php echo $row["tleave"]; ?>
	  <td align="center"><?php echo $row["tdays"]; ?>
      <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["sdate"]) ); ?>
      <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["edate"]) ); ?>  
	  <td align="center"><?php echo date( 'j-F-Y', strtotime( $row["apdate"]) ); ?>  
	   
	  <td align="center"><?php echo $row["reason"]; ?>  
	  <td align="center"><?php echo $row["rdoc"]; ?>  
	  <td align="center"><?php echo $row["status"]; ?> 
<td><a class="thumbnail fancybox" rel="ligthbox" href="leave/<?php echo $row['upload'] ?>">Attachment</a></td>
<?php 

$cby=$row["ccby"];
$query40 = "SELECT * FROM staff1 where sid= '$cby'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$mname=$row40["mname"];
?>



	  <td align="center"><?php echo $mname; ?> 
	  

<?php 
$now = time();
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
$cyear=date('Y');
$datediff = $now - $your_date;
$fday= round($datediff / (60 * 60 * 24)*.0833) ;

	$ttid=$row['sid'];
	$query90 = "SELECT * from staff1 where sid='$ttid'"; 
$result0 = mysqli_query($con, $query90) or die ( mysqli_error());
$row3 = mysqli_fetch_assoc($result0);
$al1= $row3['aleave'];
$ol= $row3['oleave'];
//$pa= $row['padd'];
$cl= $row3['cfleave'];
$altaken= $row3['altaken'];
$doj= $row3['doj'];
$doj78=strtotime($doj);
 
 
$query97 ="SELECT sid, SUM(tdays) FROM conleavedetails  where status in('Approved By All') and tleave ='Sick Leave' and sid='$ttid' and year='$cyear' GROUP BY sid";  
$result97 = mysqli_query($con, $query97) or die ( mysqli_error());
$row97 = mysqli_fetch_assoc($result97);
$sick=14-$row97['SUM(tdays)'];

/*$date2=date('01/01/2019');
$date1= date('m/d/Y');
$date3=date_create("$date2");
$date4=date_create("$date1");
$diff=date_diff($date4,$date3);
echo $diff->format("%d");*/
$al=$cl+$fday-$altaken;
//$al2=$cl+$fday8-$altaken;  
$cyear=date('Y');
$doj12=date('Y',strtotime($doj));
$datediff78 = $now - $doj78;

//echo $fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;
$fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;
$al2=$cl+$fday8-$altaken;
?>	  

	<td  align="center"><?php if($cyear==$doj12){echo $al2;} else {echo $al;}?></td>
		<td  align="center"><?php echo $sick;?></td>
  
      </tr>
<?php $count++; } 

?>
  </tbody>
  
</table>













</form>

</body>

</html>

