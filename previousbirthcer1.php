<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$pmrn=$_REQUEST['pmrn'];
// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

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

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm the Death Certificate  ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Reject the Death Certificate ?");
}

</script>

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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Out Patients List </p> 
<form action="" method="GET">


<br><br>
<p><b> Discharge Bill Confirmed Patient<b></p>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
   <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>Episode</strong></th>
      
      <th width="14%"><strong>Status</strong> 
      
      <th width="14%"><strong>Doctor Name</strong>
<th width="14%"><strong>Print</strong>  

	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;



$sel_query1="Select * from birth where pmrn='$pmrn' and status !='Confirmed' and mng !='Confirmed' ORDER BY id asc;";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
           <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["bname"]; ?></td>
      
  	  <td align="center"><?php echo $row1["eid"]; ?>  
      <td align="center"><?php echo $row1["status"]; ?> 
	  <td align="center"><?php echo $row1["dname1"]; ?> 

	  	  <td><a target='_blank' href="birthprintedit.php?pmrn=<?php echo $row1["pmrn"]; ?>&eid=<?php echo $row1["eid"]; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>  

      </tr>
    <?php $count++; } ?>
	
   
	
  </tbody>
</table>
</form>


</body>

</html>
