<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2.php?err=2');
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

require('db1.php');
//include("auth1.php");

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
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>
<body>

<p align="center" class="style1">Today's In <?php echo $_SESSION['sess_username']; ?>'s Patients List </p> 
<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Products</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Product 1</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Product 2</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li><a href='#'><span>About</span></a></li>
   <li class='last'><a href='logout.php'><span>LOGOUT</span></a></li>
</ul>
</div>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    
<div align="right" style="font-weight:bold"><a href="logout.php">Logout</a></div>
<div1 align="left" style="font-weight:bold"><a href="gg.php">Set Appointment</a></div>&nbsp;&nbsp;&nbsp;&nbsp;
<div1 align="left" style="font-weight:bold"><a href="main2.php">Manual Prescription</a></div>




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong>   
	        <th width="14%"><strong>Doctor Name</strong>   
      <th width="14%"><strong>Status</strong>
      <th width="14%"><strong>GO</strong>
      <th width="14%"><strong>Cancel</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from pmedi where date='$date' ORDER BY date desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["medi"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
      <td align="center"><?php echo date("h:i:sa"); ?></td>
      <td align="center"><?php echo $row["date"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?></td>
	  <td align="center"><?php echo $row["status"];?></td>  

	  <td align="center"><?php echo $row["id"];?></td>  

	  	  	  <td align="center"><a href="gg2.php?id=<?php echo $row["id"]; ?>">GO</a></td>

      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>
</body>
</html>
