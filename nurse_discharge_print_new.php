<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="emergency"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

//include("auth.php");
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)

?>
<?php
$full = $row39['fullname'];

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
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm Discharge ?");
}

</script>


</head>


<body>







<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Out Patients List </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Discharge Request Time </strong>
      <th width="14%"><strong>Bill Confirmed Time</strong> 
      
	  <th width="14%"><strong>Print All Reports</strong>  
	  <th width="14%"><strong>Discharge Note</strong>  
	  <th width="14%"><strong>Vacant Bed</strong>  
      

	       


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from emergency where disstatus in ('Discharge Bill Confirmed','','Discharge Requested') and eid='$eid' and pmrn='$pmrn' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dstatustime"]; ?>
      <td align="center"><?php echo $row["bstatustime"]; ?>  
	  
	  
	   <?php 
	  
	  $pp=$row['pmrn'];
	  $ee=$row['eid'];
	  $url_d = "eedischarge1?pmrn=$pp&eid=$ee"; 
	  $url2 = "e_discharge?pmrn=$pp&eid=$ee"; 
	  
	  	  $query_d = "SELECT * FROM discharge1 where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result_d = mysqli_query($con, $query_d) or die(mysqli_error());

// Print out result
//$row40 = mysqli_fetch_array($result40);
$res_d=mysqli_num_rows($result_d);

	  
	  
	  
	  
	  
	  ?>
	    


	  	  

	  <td><a target='_blank' href="allaereport.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="mr.jpg" title="Print Report" width="100" height="100" /></a></td>
	  
	  <?php 
	  
	  $pp=$row['pmrn'];
	  $ee=$row['eid'];
	  $url = "disreport?pmrn=$pp&eid=$ee"; 
	  $url2 = "e_discharge?pmrn=$pp&eid=$ee"; 
	  
	  	  $query_d = "SELECT * FROM discharge1 where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result_d = mysqli_query($con, $query_d) or die(mysqli_error());

// Print out result
//$row40 = mysqli_fetch_array($result40);
$res_d=mysqli_num_rows($result_d);

	  
	  
	  
	  
	  if($row['disstatus']=='Discharge Bill Confirmed' and $res_d>0 and $row['e_type']==0){
		  echo
	  '
	  <td><a target="_blank" href="'.$url.'"><img src="print.png" title="Print Report" width="100" height="60" /></a></td>
	  <td><a onclick="return confirm_click();" href="'.$url2.'">Vacant Bed</a></td>
	  
	  
	  ';}

     else if($row['e_type']==1){
      echo
   '
   <td></td>
   <td><a onclick="return confirm_click();" href="'.$url2.'">Vacant Bed</a></td>
   
   
   ';}



	  
	  else {echo '<td></td><td></td>';}
	  
	  ?>
	  
	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

</form>


</body>

</html>
