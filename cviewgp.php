<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="clinicalgp"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
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
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='cviewsp1gp'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttgp'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='amigp'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 
		 		 <li class='has-sub'><a href='cviewsp11gp'><span>Doctor's Available Slot</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">List of Unbilled Patients</p>
<form action="" method="GET">
 
&nbsp;&nbsp;&nbsp;&nbsp;<a href='cview'><span><b>Unbilled Patients</span><b></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='cviewreffer'><span>Reffered Patients</span></a><br><br>

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Doctor Name</strong>  
	  <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Status</strong>
	  



	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query100="Select * from pappnew where adate= '$date' and status='Not Seen' and bill='' ORDER BY aslot desc;";

$result100 = mysqli_query($con,$sel_query100);
while($row100 = mysqli_fetch_assoc($result100)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row100["pname"]; ?></td>
      <td align="center"><?php echo $row100["pmrn"]; ?>
      <td align="center"><?php echo $row100["aslot"]; ?>
      <td align="center"><?php echo $row100["adate"]; ?>  
	  <td align="center"><?php echo $row100["dname"]; ?> 
	  <td align="center"><?php echo $row100["dreffer"]; ?>  
	  	  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row100["status"];?> </td> 
	        


	  
      </tr>
    <?php $count++; } ?>
  </tbody>
  </table>
</form>


</body>

</html>
