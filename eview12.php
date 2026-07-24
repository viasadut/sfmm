<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mofficer"){
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
//include("auth.php");
 $test=date('Y-m-d', strtotime('-20 days') );
  $test1=date('Y-m-d', strtotime('-1 days') );
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
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='reportdischarge'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">WELCOME TO Emergency Panel</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    

  <tr><td colspan='20'><h1 align="center"style="background-color:lightgreen;"></h1></td></tr>
<tr><td colspan='20'><h1 align="center"style="background-color:lightgreen;">CURRENT PATIENT LIST</h1></td></tr>




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Zone</strong>
	  <th width="14%"><strong>Status</strong>
      
      <th width="14%"><strong>Transfer</strong>
	   </tr>
  </thead>
  <tbody>
  
  
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from emergency where adate2 between '$test' and '$date' and discharge =''order by adate2 desc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a href="eddetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a href="deathstatdetailsmng.php?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></a>
	  <td align="center"><?php echo $row["adate"]; ?>  
	  

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
  
  <td align="center"><?php echo $row["discharge"]; ?> </td> 
	  
	  	  <td align="center"><a href="etransferold11?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer</a></td>

	  
      </tr>
    <?php $count++; } ?>
	
	

	
	<tr><td colspan='20'><h1 align="center"style="background-color:lightgreen;"></h1></td></tr>
<tr><td colspan='20'><h1 align="center"style="background-color:lightgreen;">DISCHARGED / ADMITTED PATIENT LIST</h1></td></tr>
 <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Zone</strong>
	  <th width="14%"><strong>Status</strong>
      
      <th width="14%"><strong>Transfer</strong>
	  <th width="14%"><strong>Death Certificate</strong>
	   </tr>
    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from emergency where adate2 between '$test1' and '$date' and discharge !=''order by discharge asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a href="eddetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><a href="deathstatdetailsmng.php?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?></a>
	  <td align="center"><?php echo $row["adate"]; ?>  
	  

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
  
  <td align="center"><?php echo $row["discharge"]; ?>  
	  
	  	  <td align="center"><a href="etransferold11?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer</a></td>

		  
		  <?php
$pmrn = $row['pmrn'];

$death = "SELECT COUNT(id) FROM deathn where pmrn= '$pmrn'"; 
	 
$result_d = mysqli_query($con, $death) or die(mysqli_error());

// Print out result
$row_d = mysqli_fetch_array($result_d);

$d1=$row_d['COUNT(id)'];





$death_b = "SELECT COUNT(id) FROM deathb where pmrn= '$pmrn'"; 
	 
$result_b = mysqli_query($con, $death_b) or die(mysqli_error());

// Print out result
$row_b = mysqli_fetch_array($result_b);

$d2=$row_b['COUNT(id)'];

?>

		  
	

<td>
<?php if($d2>0){echo'

<a target="_blank" href="deathprintoriginal?pmrn='.$row["pmrn"].'"><img src="print.png" title="Print Report" width="100" height="60" /></a>';}

else if($d1>0){echo'

<a target="_blank" href="deathprint11_all?pmrn='.$row["pmrn"].'"><img src="print.png" title="Print Report" width="100" height="60" /></a>';}
?>
</td>  
	
	  
      </tr>
    <?php $count++; } ?>
	
	
	
	

   </tbody>
</table>
</form>

</body>

</html>
