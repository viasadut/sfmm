<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 20; URL=$url1");
$runningTime = date('Ymdis');
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/
if(isset($_POST['GO'])){
//$rr =$_REQUEST['rr'];
$update="update pmedi set `status`='$rr' where `id`='".$id."'";
mysqli_query($con,$update) or die(mysql_error());
}


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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 8px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 30%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

</style>
   <link rel="stylesheet" href="styles.css">
   
   <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
   
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='tes'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Prescription</span></a>
      <ul>
         <li class='has-sub'><a href='tes'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='pharinview'><span>IPD Prescription</span></a>
            
         </li>
      </ul>
   </li>
   
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='preview'><span>Print Previous Prescription</span></a>
            
         </li>
		 <li class='has-sub'><a href='tes5'><span>Prescription Status Wise Report </span></a>
            
         </li>
         <li class='has-sub'><a href='tes6'><span>Consultant Wise Report</span></a>
            
         </li>
		 <li class='has-sub'><a href='tesaudit'><span>All Consultant Prescription Report</span></a>
            
         </li>
      </ul>
   </li>
   
   
   <li class='active has-sub'><a href='#'><span>Search</span></a>
      <ul>
         <li class='last'><a href='categoryphar'><span>Categorywise Medicine</span></a></li>
		 <li class='last'><a href='genericsearch'><span>Generic Name wise Medicine</span></a></li>
            
         
      </ul>
      <li class='last'><a href='imoinviewphar'><span>Inpatient</span></a>
	  
	  
	  </li>
	  
	  <li class='last'><a href='otphar'><span>OT</span></a>
	  
	  
	  </li>
	  
	  <li class='last'><a href='phomemngphar'><span>Add / Edit Medicine </span></a></li>
	  <li class='last'><a href='pending_request_phar'><span>Pending Request</span></a></li>
	  <li class='last'><a href='pharstats'><span>Stats</span></a>
	  <li class='last'><a href='pchangepass'><span>Change Password</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</div>


<p align="center" class="style1">WelCome To Pharmacy Module </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>RFID</strong></th>
      <th width="10%"><strong>Request Time</strong></th>
      <th width="15%"><strong>Request Department </strong>
      <th width="14%"><strong>Request By</strong>   
	  <th width="14%"><strong>UPDATE</strong>     
    <th width="14%"><strong>UPDATE NEW</strong>        
      <th width="14%"><strong>REJECT</strong>
      <th width="14%"><strong>PRINT</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select distinct rfid,req_loc,req_by from medi_stock where status='Pending' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["rfid"]; ?></td>

<?php

$mrfid=$row['rfid'];
$query5 = "SELECT * from medi_stock where rfid='".$mrfid."' order by id desc"; 
$result5 = mysqli_query($con, $query5) or die ( mysqli_error());
$row5 = mysqli_fetch_assoc($result5);

?>

      <td align="center"><?php echo $row5["req_time"]; ?></td>

      <td align="center"><?php echo $row["req_loc"]; ?></td>
	  <td align="center"><?php echo $row["req_by"]; ?></td>
	  	  
		  
		  
	  <td align="center"><a href="phar_update_out_test_new?rfid=<?php echo $row["rfid"]; ?>&req_loc=<?php echo $row["req_loc"]; ?>"></a></td>
    <td align="center"><a href="new_phar_dispense?rfid=<?php echo $row["rfid"]; ?>&req_loc=<?php echo $row["req_loc"]; ?>">UPDATE NEW</a></td>
	  <td align="center"><a href="reject_request?rfid=<?php echo $row["rfid"]; ?>&rloc=<?php echo $row["req_loc"]; ?>"><strong>Reject</strong></a></td>

 <?php 
 
 $pp=$row['pmrn'];
 $pp=$row['eid'];
 
 ?>

	  	  	  <td align="center"><a target='_blank' href="pharreport?pmrn=<?php echo $row["pmrn"]; ?>&dname=<?php echo $row["dname"];?>&date=<?php echo $row["date"];?>&eid=<?php echo $row["eid"];?>"><img src="print.png" title="Print Report" width="60" height="20" /></a></td>

      </tr>
    <?php $count++; } ?>
	
  </tbody>
</table>
</form>
</body>
</html>
