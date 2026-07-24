<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
 
?>

<?php
$query87 = "SELECT COUNT(id) FROM bed where status='occupied'"; 
	 
$result87 = mysqli_query($con, $query87) or die(mysqli_error());

// Print out result
$row87 = mysqli_fetch_array($result87)
?>
<?php
$query88 = "SELECT COUNT(id) FROM bed where status='vacant'"; 
	 
$result88 = mysqli_query($con, $query88) or die(mysqli_error());

// Print out result
$row88 = mysqli_fetch_array($result88)
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
         <li class='has-sub'><a href='mpsadmin'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
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

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1">VIEW PANEL FOR INPATIENTS </p> 
<form action="" method="GET">
<p align="center" class="style1">Occupied Bed List (Today's Occupancy Rate -<?php echo  $number1 ; ?>%)</p> 
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


 

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="17%"><strong>Patient's MRN</strong></th>
      <th width="17%"><strong>Doctor's Name</strong></th>
      <th width="17%"><strong>Bed Category</strong></th>
      <th width="10%"><strong>Bed Type</strong></th>
      <th width="15%"><strong>Bed No </strong>
	        <th width="15%"><strong>Occupancy Status </strong>
			<th width="15%"><strong>Active Status </strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="4%"><strong>Edit</strong></th>
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from bed group by type";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>

      <td align="center"><?php echo $row["category"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?>

      </tr>
<?php 
	  
	  //$count1=1;
	  $type=$row['type'];
$sel_query="Select * from bed where status in ('occupied','Vacant') and type='$type' order by status asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pname"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pmrn"];?>  
  	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?>  
      <td align="center"><?php echo $row["category"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?>
      <td align="center"><?php echo $row["bno"]; ?>
      <td align="center"><?php echo $row["status"]; ?>  
	  <td align="center"><?php echo $row["bed_status"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["adate"];?>  
	  
	  <td align="center"><a href="bededit_bill?id=<?php echo $row["id"]; ?>">Edit</a></td>
      </tr>
	  
	
	  
	  
    <?php $count++; } }?>
   </tbody>
   

   
   <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 15px;
  text-align: center;
}

.grid-item1 {
  background-color: red;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 15px;
  text-align: center;
}
</style>
</head>
<body>

<div class="grid-container">
  
  
  
  
  
<?php  $sel_query="Select * from bed where status in ('occupied','Vacant')  order by status asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
if($ss!='Vacant')
{
echo'
<div class="grid-item">
'.$row["bno"].'<br><br>
'.$row["pname"].'<br>
'.$row["pmrn"].'<br>
'.$row["dname"].'
</div>';}
else
{
echo'
<div class="grid-item1">
'.$row["bno"].'<br><br>

</div>';}

?>


<?php $count++; } ?>

</div>

</body>
</html>


</form>

</body>

</html>
