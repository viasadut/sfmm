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
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$ad=date('d/m/Y H:i:s');

$sel="Select * from inpatient where '$ad3' between alert1 and alert2 and discharge='' order by id desc limit 1";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);



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


<script type="text/javascript">
  var time = 1000 * 30 * 1; //20 minutes
  var theTimer = setTimeout("document.location.href='login2'",time);
</script>

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
		 <li class='has-sub'><a href='disreportprint'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bed_mng_test5'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>

<li class='active has-sub'><a href='#'><span>Death Certificate</span></a>
      <ul>
<li class='has-sub'><a href='deathsearchimo'><span>Issue Death Certificate</span></a>
            
         </li>


	  <li class='has-sub'><a href='deathsearch1'><span>Print Death Certificate</span></a>
            
         </li>
         <li class='has-sub'><a href='deathsearchdupedit'><span>Edit Death Certificate</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Birth Certificate</span></a>
      <ul>
<li class='has-sub'><a href='birthsearch_close'><span>Issue Birth Certificate</span></a>
            
         </li>


	  <li class='has-sub'><a href='deathsearch1'><span>Print Birth Certificate</span></a>
            
         </li>
         <li class='has-sub'><a href='birthsearchdupeditimo'><span>Edit Birth Certificate</span></a>
            
         </li>
		   

		           <li class='has-sub'><a href='birthsearch_manual_close'><span></span></a>
            
         </li>

		 
      </ul>
	  
   </li>

   
   <li class='active has-sub'><a href='#'><span>OT</span></a>
      <ul>
         <li class='has-sub'><a href='otimo'><span>OT BOOKING</span></a>
            
         </li>
         <li class='has-sub'><a href='otviewimo'><span>VIEW PENDING LIST</span></a>
            
         </li>
		          <li class='has-sub'><a href='otbookingallimo'><span>VIEW DATEWISE OT BOOKING</span></a>
            
         </li>
		 
		 <li class='has-sub'><a href='endoreportmrnotimo'><span>SEARCH OT NOTE BY MRN</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   <li class='last'><a href='histoimo'><span>Histopathology Request</span></a></li>
   <li class='last'><a href='imochangepass'><span>Change Password</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?>'s DashBoard </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">

 <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

<?php 

$query3 = "SELECT COUNT(id) FROM inpatient where discharge=''"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3)



?>
<?php
$date1=date('d/m/Y');
$query4 = "SELECT COUNT(id) FROM inpatient where disstatus='Discharge Bill Confirmed' and billdate='$date1'and confirmdn !='' and discharge='Discharged'";
	 
$result4 = mysqli_query($con, $query4) or die(mysqli_error());

// Print out result
$row4 = mysqli_fetch_array($result4)
?>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      
      <th width="14%"><strong>Drescription</strong>
	        <th width="14%"><strong>Number of Patients</strong>
      <th width="14%"><strong>Details View</strong>


	   </tr>
  </thead>
  <tbody>
  
    

    <tr>
       <td> Today's Number of Inpatients </td>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo  $row3['COUNT(id)']; ?></td>  
	       
	  <td align="center"><a href="imoinview">Details</a></td>

	  
      </tr>
	  
	  <tr>
        
       <td> Today's Number of Discharge Request </td>
       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo  $row4['COUNT(id)']; ?></td>  
	  <td align="center"><a href="imodcview">Details</a></td>

	  
      </tr>
	<?php 

if($rw==true)
{
	
	echo '<audio autoplay>
  <source src="audio/in.mp3" type="audio/mpeg">
  <source src="audio/in.ogg" type="audio/ogg">
 
</audio>';}?>
   
  </tbody>
</table>
</form>

</body>

</html>
