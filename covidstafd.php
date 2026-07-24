<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','corona')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }?>

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
$sid2=$_REQUEST['sid'];

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

<p align="center" class="style1">PATIENTS RECORD SEARCH PANEL </p> 

<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
	  <th width="4%"><strong>S.ID</strong></th>
      <th width="17%"><strong>Staff's Name</strong></th>
      <th width="10%"><strong>Designation</strong></th>
      <th width="15%"><strong>Department</strong>
      <th width="14%"><strong>Present Address</strong>  
      <th width="14%"><strong>permanent Address</strong>
      
<th width="14%"><strong>Phone</strong> 

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];

//$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from staff3 where sid ='$sid2' and sid !=''order by sid desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo 'SFMMSH'.$row["sid"]; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></td>
      <td align="center"><?php echo $row["desig"]; ?></td>
      <td align="center"><?php echo $row["dept"]; ?></td>
	  <td align="center"><?php echo $row["padd"]; ?></td>
      <td align="center"><?php echo $row["peradd"]; ?>  
	  <td align="center"><?php echo $row["cno"]; ?></td>
	 

  

	  
      </tr>
    <?php $count++; } ?>
	
	
	<?php
	
$user=$_SESSION["sess_username"];

//$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from staff1 where sid ='$sid2' and sid !=''order by sid desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo 'SFMMSH'.$row["sid"]; ?></td>
      <td align="center"><?php echo $row["mname"]; ?></td>
      <td align="center"><?php echo $row["designation"]; ?></td>
      <td align="center"><?php echo $row["category"]; ?></td>
	  <td align="center"><?php echo $row["preadd"]; ?></td>
      <td align="center"><?php echo $row["peradd"]; ?>  
	  <td align="center"><?php echo $row["phone"]; ?></td>
	 

  

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>
