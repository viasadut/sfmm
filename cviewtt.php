<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="clinical"){
      header('Location: login2.php?err=2');
    }
?>
<?php
//$url1=$_SERVER['REQUEST_URI'];
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
   <li><a href='inviewnew1.php'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin.php'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new.php'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview.php'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge.php'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview.php'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview.php'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7.php'><span>Detail History</span></a>
            
         </li>
		 
		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout.php'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">WELCOME TO DISCHARGE PANEL </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      
      <th width="14%"><strong>Go</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from test where ddate= '$date' order by id";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["dname"]; ?></td>
      <td align="center"><?php echo $row["ddate"]; ?>
      <td align="center"><?php echo $row["dslot"]; ?>
      <td align="center"><?php echo $row["status"]; ?>  
<td><input type="checkbox" name="vehicle" value="Bike" size="20"></td>
	  <td align="center"><a href="delete.php?id=<?php echo $row["id"];?>">DELETE</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>
