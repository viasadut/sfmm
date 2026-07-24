<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mofficer"){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
//$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];

$ad='b';
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
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
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
		 <li class='has-sub'><a href='reportdischarge'><span>Print Discharge Report</span></a>
		 <li class='has-sub'><a href='manualsummaryprint'><span>Print Summary Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedviewemo'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Death Certificate</span></a>
      <ul>
         <li class='has-sub'><a href='death1?pmrn=394.894&eiid=1....'><span>Issue Brought in Death Certificate</span></a>
            
         </li>
         <li class='has-sub'><a href='deathsearchdup'><span>Print Issued Brought in Death Certificate</span></a>
		 
            
         </li>
		      
		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='incertificateemo'><span>Issue Certificates</span></a></li>
   <li class='last'><a href='estatemer'><span>Datewise Stat</span></a></li>
   <li class='last'><a href='hinfo'><span>Hospital Information</span></a></li>
   <li class='last'><a href='leave2'><span>Apply Leave</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!! <?php echo $full; ?>'S DashBoard </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">

 <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date2= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

<?php 

$query3 = "SELECT COUNT(id) FROM emergency where discharge=''"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3)



?>
<?php
$query4 = "SELECT COUNT(id) FROM emergency where discharge='Discharged' and ddate1='$date2'"; 
	 
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
       <td> Today's Number of Emergency Patients </td>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo  $row3['COUNT(id)']; ?></td>  
	       
	  <td align="center"><a href="eview12">Details</a></td>

	  
      </tr>
	  
	  <tr>
        
       <td> Today's Number of Discharged Patients </td>
       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo  $row4['COUNT(id)']; ?></td>  
	  <td align="center"><a href="emoview">Details</a></td>

	  
      </tr>
	
   
  </tbody>
</table>
</form>
<?php if($ad=='b')
{
	$txt='Greetings'.' '.$full.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}?>
</body>

</html>
