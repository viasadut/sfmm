<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng','cath')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>



<!DOCTYPE html>
<html>
<title>KPJ ROSTER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<head>


<link rel="stylesheet" href="styles.css">
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->
  <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

   
 
</style>




   <script src="script.js"></script>
<style>
img{
        max-width: 8%;
        max-height:5%;
        
		align: center;
    }
	
</style>



</head>

<a href="homestaff" class="w3-bar-item w3-button">Back To PMS</a>

<body>

<!-- Sidebar -->
  
<!-- Page Content -->
<div class="w3-overlay" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div>
  <button class="w3-button w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>
  
</div>
     
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>
<p align="center" class="style1">Month Wise Roster System</p> 





<?php
// Your code here!
for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     //$month;
	 	 $jan=date('Y-01-01');
		 $jan1=date('Y-01-');
		 
		 $feb=date('Y-02-01');
		 $feb1=date('Y-02-');
		 
		 $mar=date('Y-03-01');
		 $mar1=date('Y-03-');
		 
		 $apr=date('Y-04-01');
		 $apr1=date('Y-04-');
		 
		 $may=date('Y-05-01');
		 $may1=date('Y-05-');
		 
		 $jun=date('Y-06-01');
		 $jun1=date('Y-06-');
		 
		 $jul=date('Y-07-01');
		 $jul1=date('Y-07-');
		 
		 $aug=date('Y-08-01');
		 $aug1=date('Y-08-');
		 
		 
		 $sep=date('Y-09-01');
		 $sep1=date('Y-09-');
		 
		 $oct=date('Y-10-01');
		 $oct1=date('Y-10-');
		 
		 $nov=date('Y-11-01');
		 $nov1=date('Y-11-');
		 
		 $dec=date('Y-12-01');
		 $dec1=date('Y-12-');
		 
		 $url = "roaster_details1_indu?id=$jan&id1=$jan1"; 
		 $url2 = "roaster_details1_indu?id=$feb&id1=$feb1"; 
		 $url3 = "roaster_details1_indu?id=$mar&id1=$mar1"; 
		 $url4 = "roaster_details1_indu?id=$apr&id1=$apr1"; 
		 $url5 = "roaster_details1_indu?id=$may&id1=$may1"; 
		 $url6 = "roaster_details1_indu?id=$jun&id1=$jun1"; 
		 $url7 = "roaster_details1_indu?id=$jul&id1=$jul1"; 
		 $url8 = "roaster_details1_indu?id=$aug&id1=$aug1"; 
		 $url9 = "roaster_details1_indu?id=$sep&id1=$sep1"; 
		 $url10 = "roaster_details1_indu?id=$oct&id1=$oct1"; 
		 $url11 = "roaster_details1_indu?id=$nov&id1=$nov1"; 
		 $url12 = "roaster_details1_indu?id=$dec&id1=$dec1"; 
		 
		 
		 
	 
	 if($month=='January')
	 {
	 
	 echo "<a target='_blank' href='$url'><img src='month/jan.jpg'></a>";
	 }
	 
	else if($month=='February')
	 {
	 
	 echo "<a target='_blank' href='$url2'><img src='month/feb.jpg'></a>";
	 }
	 
	 else if($month=='March')
	 {
	 
	 echo "<a target='_blank' href='$url3'><img src='month/mar.jpg'></a>";
	 }
	 
	 else if($month=='April')
	 {
	 
	 echo "<a target='_blank' href='$url4'><img src='month/apr.jpg'></a>";
	 }
	 
	 else if($month=='May')
	 {
	 
	 echo "<a target='_blank' href='$url5'><img src='month/may.jpg'></a>";
	 }
	 
	 else if($month=='June')
	 {
	 
	 echo "<a target='_blank' href='$url6'><img src='month/june.jpg'></a>";
	 }
	 
	 else if($month=='July')
	 {
	 
	 echo "<a target='_blank' href='$url7'><img src='month/kuly.jpg'></a>";
	 }
	 
	 
	 
	 else if($month=='August')
	 {
	 
	 echo "<a target='_blank' href='$url8'><img src='month/august.jpg'></a>";
	 }
	 
	 
	 else if($month=='September')
	 {
	 
	 echo "<a target='_blank' href='$url9'><img src='month/sep.jpg'></a>";
	 }
	 
	 
	 else if($month=='October')
	 {
	 
	 echo "<a target='_blank' href='$url10'><img src='month/october.jpg'></a>";
	 }
	 
	 
	 
	 else if($month=='November')
	 {
	 
	 echo "<a target='_blank' href='$url11'><img src='month/nov.jpg'></a>";
	 }
	 
	 
	 else if($month=='December')
	 {
	 
	 echo "<a target='_blank' href='$url12'><img src='month/dec.jpg'></a>";
	 }
	 
     }

	
	 

	 
	 ?>




</html>
