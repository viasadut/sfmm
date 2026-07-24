<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='view.php'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='view.php'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview.php'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='last'><a href='view3.php'><span>Search Report</span></a></li>
   <li class='last'><a href='logout.php'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Todays Doctor <?php echo $_SESSION['sess_username']; ?>'s Out Patients List </p> 
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
      <th width="14%"><strong>Status</strong>
      <th width="14%"><strong>GO</strong>
      <th width="14%"><strong>Cancel</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from papp where dname= '$user' and adate= '$date' ORDER BY aslot desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?>  
	  <td align="center"><a href="ttt.php?ID=<?php echo $row["ID"]; ?>">GO</a></td>
	  <td width="3%" align="center"><a href="delete.php?id=<?php echo $row["dname"]; ?>">Cancel</a></td>
	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>
<?php echo date("h:i:sa")?>
</body>

</html>
