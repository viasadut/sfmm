<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2.php?err=2');
    }
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
         <li class='has-sub'><a href='detail.php'><span>Detail History</span></a>
            
         </li>
		 
		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout.php'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO PATIENT'S SEARCH PANEL FOR ADMISSION </p> 


<form action="detail.php" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



<tr> 
<td colspan="5"><input type="text" name="search"></td>
<td colspan="3"><button type="submit" name="bsearch">Search</button></td>
</tr>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Bed Type </strong>
      <th width="14%"><strong>Bed No</strong>   
      <th width="14%"><strong>Doctor Name</strong>
	        <th width="14%"><strong>Admit Date</strong>
      <th width="14%"><strong>GO</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from newbed where pmrn= '$pmrn';";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	        <td align="center"><?php echo $row["type"]; ?>  
      <td align="center"><?php echo $row["bno"]; ?>
      <td align="center"><?php echo $row["dname"]; ?>  
	        <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="center"><a href="gg3new.php?pmrn=<?php echo "$pmrn"; ?>&ID=<?php echo $row["ID"]; ?>">GO</a></td>

	  
      </tr>
    <?php $count++; } }?>
  </tbody>
</table>
</form>

</body>

</html>
