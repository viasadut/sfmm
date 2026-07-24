<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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
<p align="center" class="style1">WELCOME TO DISCHARGE PANEL </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
      <th width="14%"><strong>Edit</strong>
<th width="14%"><strong>Print</strong>	  
	  </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date1= date('d/m/Y');
$count=1;
$sel_query="Select * from inpatient where disstatus='Discharge Bill Confirmed' and billdate='$date1' and confirmdn !='' and rfid_status='0' and rfid_card2_status='0' and rfid_acard_status='0'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center">
      
     <a href="indischarge1edit?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"></a>
   
     <a target='_blank' href="<?php if ($row['d_type']=='Confirm Death Declaration Request'){echo 'death2_edit';}
      
      else {echo 'indischarge1edit';}?>?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">
      
      
      <?php if ($row['d_type']=='Confirm Death Declaration Request'){echo 'EDIT DEATH CERTIFICATE';}else {echo 'EDIT DISCHARGE NOTE';}?></a>
   
   </td>
	  <td align="center">
      <a target='_blank' href="<?php if ($row['d_type']=='Confirm Death Declaration Request'){echo 'deathprint1';}
      
      else {echo 'idisreport';}?>?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">
      
      
      <img src="<?php if ($row['d_type']=='Confirm Death Declaration Request'){echo 'death_pic.png';}else {echo 'print.png';}?> " title="Print Report" width="100" height="60" /></a></td>  

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>
