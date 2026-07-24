<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bbank"){
      header('Location: login2?err=2');
    }
?>



<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 20; URL=$url1");

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
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment Menu</span></a>
	  <ul>
	  <li class='last'><a href='radapp'><span>Appointment</span></a></li>
	  <li class='last'><a href='radblock'><span>Block Appointment Slot</span></a></li>
	  <li class='last'><a href='radunblock'><span>Unblock Appointment Slot</span></a></li>
	  <li class='last'><a href='radeditapp'><span>Cancel Patient Appointment </span></a></li>
	  
	  
	  
	  
	  </ul>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allapp'><span>Print Appointment Report </span></a>
		 <li class='has-sub'><a href='allpen'><span>Search all Pending Reports </span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>pending Report Search By MRN</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
			<li class='last'><a href='radview3'><span>All Confirmed Reports</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='newdoc'><span>Add New Doctor</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Search pending request </span></a></li>
		  		        <li class='last'><a href='donereportedit'><span>EDIT</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<p align="center" class="style1">!! WELCOME !! <?php echo $row39['fullname']; ?>'s Dash Board </p> 
<p align="center" class="style1">Special Diagnosis Request </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Date </strong>
      <th width="14%"><strong>Doctor's Name</strong>   
	        <th width="14%"><strong>Investigation</strong>   
      <th width="14%"><strong>UPDATE</strong>
      <th width="14%"><strong>PRINT</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from iblood where bbstatus='Request';";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["odate"]; ?></td>
	  <td align="center"><?php echo $row["user"]; ?></td>
	  	  <td align="center"><?php echo $row["room"];?></td> 
		  <td align="center"><?php echo $row["bed"];?></td> 
	  <td align="center"><a href="bbupdate1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"];?>&id=<?php echo $row["id"];?>">UPDATE</a></td>

 

	  	  	  

      </tr>
    <?php $count++; } ?>
	
  </tbody>
</table>
</form>
</body>
</html>
