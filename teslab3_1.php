<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
      header('Location: login2?err=2');
    }
?>



<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");

?>

<?php $test=date('Y-m-d', strtotime('-30 days') );
  //echo $test;
//echo $date= date('m/d/Y');

$btype=$_REQUEST['btype'];
  ?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/


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
function confirm_click()
{
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='teslab'><span>Home</span></a></li>
   
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='preview'><span>Print Previous Prescription</span></a>
            
         </li>
		 <li class='has-sub'><a href='tes5lab'><span>Prescription Status Wise Report </span></a>
            
         </li>
         <li class='has-sub'><a href='tes6lab'><span>Consultant Wise Report</span></a>
            
         </li>
      </ul>
   </li>
  <li><a href='testlabreceive'><span>OPD Pending Reports</span></a></li>
  
  <li><a href='opdlabreport'><span>OPD Done Reports</span></a></li>
  <li><a href='ipdlabreport'><span>IPD Done Reports</span></a></li>
  <li><a href='inplab'><span>Inpatient</span></a></li>
  <li><a href='emerlab'><span>Emergency</span></a></li>
  <li><a href='endoscopylab'><span>Endoscopy Suite</span></a></li>
  <li><a href='labsearchbar'><span>Search By Barcode</span></a></li>
  <li><a href='labstatlab'><span>Investigation Stats</span></a></li>
  <li><a href='categoryinvesmng'><span>Update</span></a></li>
  
  <li class='active has-sub'><a href='#'><span>Covid</span></a>
      <ul>
         <li class='has-sub'><a href='labcovidreceive'><span>Receive Covid Sample</span></a>
            
         </li>
		  <li class='has-sub'><a href='centrewise1'><span>Update Covid Result</span></a>
            
         </li>
		 <li class='has-sub'><a href='covidstatnew'><span>Datewise Covid Test Stats</span></a>
            
         </li>
		 
		 
      </ul>
   </li>
      
	  
	  
	  <li class='active has-sub'><a href='#'><span>Manual Request</span></a>
      <ul>
         <li class='has-sub'><a href='manualesearchlab'><span>OPD Manual Request</span></a>
            
         </li>
		  <li class='has-sub'><a href='registerlab'><span>Manula Patient Registration</span></a>
            
         </li>
		 
      </ul>
   </li>
      
	  <li class='last'><a href='mngpassword'><span>Change Password</span></a></li>
	  <li class='last'><a href='laballs'><span>Search Patient's All Reports</span></a></li>
	  <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>





<p align="center" class="style1">Blood Bank Stock</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Blood Type</strong></th>
	  <th width="17%"><strong>Blood Group</strong></th>
      <th width="10%"><strong>Collection Date</strong></th>
	  <th width="10%"><strong>Expiry Date</strong></th>
	  <th width="10%"><strong>Amount</strong></th>
	  <th width="10%"><strong>Bag No</strong></th>
      

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from bcross1 where btype='$btype' and status='available' order by edate;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      
		  	  	  <td align="center"><?php echo $row["btype"];?></a></td> 
<td align="center"><?php echo $row["bgroup"];?></a></td> 				  
<td align="center"><?php echo $row["udate"];?></a></td> 				  
<td align="center"><?php echo $row["edate"];?></a></td> 
<td align="center"><?php echo $row["bqty"];?></a></td> 
<td align="center"><a href="labbar11.php?bagno=<?php echo $row['bagno']; ?>"><?php echo $row["bagno"];?></a></td> 
<td align="center"><a href="bcross_new_1.php?bagno=<?php echo $row['bagno']; ?>&sno=<?php echo $row['sno']; ?>"><?php echo $row["bagno"];?></a></td> 
<td align="center"><a href="donar_sticker.php?bagno=<?php echo $row['bagno']; ?>&sno=<?php echo $row['sno']; ?>">Sticker</a></td> 


      </tr>
    <?php $count++; } ?>
	
	
	  <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from bcross1 where btype='$btype' and status='issued' order by edate;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      
		  	  	  <td align="center"><?php echo $row["btype"];?></a></td> 
<td align="center"><?php echo $row["bgroup"];?></a></td> 				  
<td align="center"><?php echo $row["udate"];?></a></td> 				  
<td align="center"><?php echo $row["edate"];?></a></td> 
<td align="center"><?php echo $row["bqty"];?></a></td> 
<td align="center"><a href="labbar11.php?bagno=<?php echo $row['bagno']; ?>"><?php echo $row["bagno"];?></a></td> 
<td align="center"><a href="bcross_new_1.php?bagno=<?php echo $row['bagno']; ?>&sno=<?php echo $row['sno']; ?>"><?php echo $row["bagno"];?></a></td> 
<td align="center"><a href="donar_sticker.php?bagno=<?php echo $row['bagno']; ?>&sno=<?php echo $row['sno']; ?>">Sticker</a></td> 

<?php

$pmrn=$row["dmrn"];
$sno=$row["sno"];
$id=$row["id"];

?>

<td align="center"><a target='_blank' href="bcrossreport1.php?pmrn=<?php echo $pmrn;?>&id=<?php echo $id; ?>&sno=<?php echo $sno; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>

<td align="center"><a target='_blank' href="bcrossreport.php?pmrn=<?php echo $pmrn;?>&id=<?php echo $id; ?>&sno=<?php echo $sno; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>
<td align="center"><a target='_blank' href="labbar.php?pmrn=<?php echo $pmrn;?>&sno=<?php echo $bbno;?>&id=<?php echo $id; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>


      </tr>
    <?php $count++; } ?>
	
  </tbody>
</table>
</form>
</body>
</html>
