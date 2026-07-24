<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff','imo','doctor','ot','endo','bill','nurse','bed','emergency','mofficer','call','diet','physio')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

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

<?php
$pmrn = $_REQUEST['pmrn'];
?>
<?php

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
  <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}


blink {
  -webkit-animation: 2s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
  animation: 2s linear infinite condemned_blink_effect;
}

/* for Safari 4.0 - 8.0 */
@-webkit-keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

@keyframes condemned_blink_effect {
  10% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

.blink_img {
  animation: blinker 2s linear infinite;
  
}
@keyframes blinker {
  50% { opacity: 0; }
}
@keyframes blin {
  50% { opacity: 0; }
}




.button {
  background-color: #004A7F;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>




</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   
   
   <li class='active has-sub'><a href='g_house_bed'><span>Guest House Room Management</span></a>
      
	  
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1">Weight Loss Program Calendar Management</p> 


   
   <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: pink;
  padding: 0px;
  align:left;
  
}
.grid-item {
  background-color: #F778A1;
  border: 1px solid rgba(0, 0, 0, 0.8);
  
  
  text-align: left;
  width:350px; /* or whatever width you want. */
   max-width:350px; /* or whatever width you want. */
   display: inline-block;
}

.grid-item1 {
  background-color: #77DD77;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item8 {
  background-color: #D462FF;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}



.grid-item2 {
  background-color: orange;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}

.grid-itemr {
  background-color: #FFCBA4	;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item3 {
  background-color: yellow;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.font1{
    font-family:serif;
	   font-size:30px;
	   
}
.font2{
    font-family:sans-serif;
	   font-size:16px;
	     font-weight:bold;
		 text-align:left;
}


.font3{
    font-family:sans-serif;
	   font-size:18px;
	     font-weight:bold;
		 text-align:left;
}

img{
        max-width: 20%;
        max-height: 20%;
        
		align: center;
    }
	
	
	.label {
  color: white;
  padding: 8px;
  font-family: Arial;
}
.success {background-color: #F778A1;} /* lightgreen */
.info {background-color: #77DD77;} /* Red */
.warning {background-color: orange;} /* Orange */
.danger {background-color: yellow;} /* Red */ 
.other {background-color: #D462FF; } /* Gray */ 
.oxy {background-color: #FFE5B4; } /* Gray */ 
.other2 {background-color: #FFCBA4	; } /* Gray */ 



</style>
</head>
<body>
  
<span class="label success" style="float:right;"><a href="weight_loss2">3rd Month</a></span>
<span class="label info"style="float:right;"><a  href="weight_loss1">2nd Month</a></span>
<span class="label warning"style="float:right;"><a  href="weight_lossn">1st Month</a></span>

<br>

<form action="" method="post">
 
		
		
		<table>

				
					
						
					 
</table>



 
 
<div class="grid-container">




  

  

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-01</span><br><br>
<span class='font2' align='left'></span>

<?php
$query1 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-01' and type='Obesity Lecture'"; 
	 
$result1 = mysqli_query($con, $query1) or die(mysqli_error());

// Print out result
$row1 = mysqli_fetch_array($result1);


$query2 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-01' and type='Endocrinologiest Assessment'"; 
	 
$result2 = mysqli_query($con, $query2) or die(mysqli_error());

// Print out result
$row2 = mysqli_fetch_array($result2);


$query3 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-01' and type='Dietary Assessment'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);

$query4 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-01' and type='Physiotheraphy Assessment'"; 
	 
$result4 = mysqli_query($con, $query4) or die(mysqli_error());

// Print out result
$row4 = mysqli_fetch_array($result4);

?>
1)Registration- <b><?php echo '<span style="color:green;">DONE</span>';?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Obesity Lecture'?>&day=<?php echo 'DAY-01'?>&pmrn=<?php echo $pmrn;?>">2)Obesity Lecture-</a> <b><?php if($row1['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Endocrinologiest Assessment'?>&day=<?php echo 'DAY-01'?>&pmrn=<?php echo $pmrn;?>">3)Endocrinologiest's Assessment-</a> <b><?php if($row2['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Dietary Assessment'?>&day=<?php echo 'DAY-01'?>&pmrn=<?php echo $pmrn;?>">4)Dietary Assessment-</a> <b><?php if($row3['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Physiotheraphy Assessment'?>&day=<?php echo 'DAY-01'?>&pmrn=<?php echo $pmrn;?>">5)Physitheraphy Assessment-</a> <b><?php if($row4['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
6)Investgations Sample- <b><?php echo 'NOT DONE';?></b><br>

<br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-02</span><br><br>
<span class='font2'></span>


<?php

$query2a = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-02' and type='Endocrinologiest Assessment'"; 
	 
$result2a = mysqli_query($con, $query2a) or die(mysqli_error());

// Print out result
$row2a = mysqli_fetch_array($result2a);


$query3a = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-02' and type='Hospital Diet Chart'"; 
	 
$result3a = mysqli_query($con, $query3a) or die(mysqli_error());

// Print out result
$row3a = mysqli_fetch_array($result3a);

$query4a = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-02' and type='Hospital Exercise'"; 
	 
$result4a = mysqli_query($con, $query4a) or die(mysqli_error());

// Print out result
$row4a = mysqli_fetch_array($result4a);

$query5a = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-02' and type='Psychiatrist Assessment'"; 
	 
$result5a = mysqli_query($con, $query5a) or die(mysqli_error());

// Print out result
$row5a = mysqli_fetch_array($result5a);

?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Endocrinologiest Assessment'?>&day=<?php echo 'DAY-02'?>&pmrn=<?php echo $pmrn;?>">1)Endocrinologiest's Followup Assessment-</a> <b><?php if($row2a['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Psychiatrist Assessment'?>&day=<?php echo 'DAY-02'?>&pmrn=<?php echo $pmrn;?>">2)Psychiatrist Assessment- </a><b><?php if($row4a['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-02'?>&pmrn=<?php echo $pmrn;?>">3)Hospital Exercise-</a><b><?php if($row5a['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Diet Chart'?>&day=<?php echo 'DAY-02'?>&pmrn=<?php echo $pmrn;?>">4)Hospital Diet Chart-</a> <b><?php if($row3a['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>

</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-03</span><br><br>


<span class='font2'></span>


<?php
$query3b = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-03' and type='Diet'"; 
	 
$result3b = mysqli_query($con, $query3b) or die(mysqli_error());

// Print out result
$row3b = mysqli_fetch_array($result3b);

$query4b = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-03' and type='Home Exercise'"; 
	 
$result4b = mysqli_query($con, $query4b) or die(mysqli_error());
$row4b = mysqli_fetch_array($result4b);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-03'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4b['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-03'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3b['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-04</span><br><br>
<span class='font2'></span>


<?php
$query3c = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-04' and type='Diet'"; 
	 
$result3c = mysqli_query($con, $query3c) or die(mysqli_error());

// Print out result
$row3c = mysqli_fetch_array($result3c);

$query4c = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-04' and type='Home Exercise'"; 
	 
$result4c = mysqli_query($con, $query4c) or die(mysqli_error());
$row4c = mysqli_fetch_array($result4c);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-04'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4c['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-04'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3c['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-05</span><br><br>
<span class='font2'></span>


<?php
$query3d = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-05' and type='Diet Followup'"; 
	 
$result3d = mysqli_query($con, $query3d) or die(mysqli_error());

// Print out result
$row3d = mysqli_fetch_array($result3d);

$query4d = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-05' and type='Hospital Exercise'"; 
	 
$result4d = mysqli_query($con, $query4d) or die(mysqli_error());
$row4d = mysqli_fetch_array($result4d);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-05'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($row4d['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-05'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($row3d['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>
<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-06</span><br><br>
<span class='font2'></span>

<?php
$query3e = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-06' and type='Diet'"; 
	 
$result3e = mysqli_query($con, $query3e) or die(mysqli_error());

// Print out result
$row3e = mysqli_fetch_array($result3e);

$query4e = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-06' and type='Home Exercise'"; 
	 
$result4e = mysqli_query($con, $query4e) or die(mysqli_error());
$row4e = mysqli_fetch_array($result4e);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-06'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4e['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-06'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3e['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>

<span class='font1'><a target='_blank' href='$url'></a>DAY-07</span><br><br>
<span class='font2'></span>
<?php
$query3f = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-07' and type='Diet'"; 
	 
$result3f = mysqli_query($con, $query3f) or die(mysqli_error());

// Print out result
$row3f = mysqli_fetch_array($result3f);

$query4f = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-07' and type='Home Exercise'"; 
	 
$result4f = mysqli_query($con, $query4f) or die(mysqli_error());
$row4f = mysqli_fetch_array($result4f);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-07'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4f['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-07'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3f['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>
<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-08</span><br><br>
<span class='font2'></span>
<?php
$query3g = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-08' and type='Diet Followup'"; 
	 
$result3g = mysqli_query($con, $query3g) or die(mysqli_error());

// Print out result
$row3g = mysqli_fetch_array($result3g);

$query4g = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-08' and type='Hospital Exercise'"; 
	 
$result4g = mysqli_query($con, $query4g) or die(mysqli_error());
$row4g = mysqli_fetch_array($result4g);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-08'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($row4g['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-08'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($row3g['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>
<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-09</span><br><br>
<span class='font2'></span>
<?php
$query3h = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-09' and type='Diet'"; 
	 
$result3h = mysqli_query($con, $query3h) or die(mysqli_error());

// Print out result
$row3h = mysqli_fetch_array($result3h);

$query4h = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-09' and type='Home Exercise'"; 
	 
$result4h = mysqli_query($con, $query4h) or die(mysqli_error());
$row4h = mysqli_fetch_array($result4h);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-09'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4h['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-09'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3h['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-10</span><br><br>
<span class='font2'></span>
<?php
$query3i = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-10' and type='Diet'"; 
	
$result3i = mysqli_query($con, $query3i) or die(mysqli_error());

// Print out result
$row3i = mysqli_fetch_array($result3i);

$query4i = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-10' and type='Home Exercise'"; 
	 
$result4i = mysqli_query($con, $query4i) or die(mysqli_error());
$row4i = mysqli_fetch_array($result4i);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-10'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4i['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-10'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3i['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>
<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-11</span><br><br>
<span class='font2'></span><br><br>

<?php
$query11 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-11' and type='Diet Followup'"; 
	 
$result11 = mysqli_query($con, $query11) or die(mysqli_error());

// Print out result
$row11 = mysqli_fetch_array($result11);

$queryg11 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-11' and type='Hospital Exercise'"; 
	 
$resultg11 = mysqli_query($con, $queryg11) or die(mysqli_error());
$rowg11 = mysqli_fetch_array($resultg11);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-11'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowg11['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-11'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($row11['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>




</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-12</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi12 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-12' and type='Diet'"; 
	
$resulti12 = mysqli_query($con, $queryi12) or die(mysqli_error());

// Print out result
$rowi12 = mysqli_fetch_array($resulti12);

$queryii12 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-12' and type='Home Exercise'"; 
	 
$resultii12 = mysqli_query($con, $queryii12) or die(mysqli_error());
$rowii12 = mysqli_fetch_array($resultii12);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-12'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii12['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-12'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi12['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>

</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-13</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi13 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-13' and type='Diet'"; 
	
$resulti13 = mysqli_query($con, $queryi13) or die(mysqli_error());

// Print out result
$rowi13 = mysqli_fetch_array($resulti13);

$queryii13 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-13' and type='Home Exercise'"; 
	 
$resultii13 = mysqli_query($con, $queryii13) or die(mysqli_error());
$rowii13 = mysqli_fetch_array($resultii13);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-13'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii13['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-13'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi13['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
</div>


<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-14</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi14 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-14' and type='Diet Followup'"; 
	 
$resulti14 = mysqli_query($con, $queryi14) or die(mysqli_error());

// Print out result
$rowi14 = mysqli_fetch_array($resulti14);

$queryii14 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-14' and type='Hospital Exercise'"; 
	 
$resultii14 = mysqli_query($con, $queryii14) or die(mysqli_error());
$rowii14 = mysqli_fetch_array($resultii14);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-14'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii14['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-14'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi14['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-15</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi15 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-15' and type='Diet'"; 
	
$resulti15 = mysqli_query($con, $queryi15) or die(mysqli_error());

// Print out result
$rowi15 = mysqli_fetch_array($resulti15);

$queryii15 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-15' and type='Home Exercise'"; 
	 
$resultii15 = mysqli_query($con, $queryii15) or die(mysqli_error());
$rowii15 = mysqli_fetch_array($resultii15);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-15'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii15['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-15'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi15['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>

</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-16</span><br><br>
<span class='font2'></span><br><br>


<?php
$queryi16 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-16' and type='Diet'"; 
	
$resulti16 = mysqli_query($con, $queryi16) or die(mysqli_error());

// Print out result
$rowi16 = mysqli_fetch_array($resulti16);

$queryii16 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-16' and type='Home Exercise'"; 
	 
$resultii16 = mysqli_query($con, $queryii16) or die(mysqli_error());
$rowii16 = mysqli_fetch_array($resultii16);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-16'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii16['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-16'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi16['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-17</span><br><br>
<span class='font2'></span><br><br>



<?php
$queryi17 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-17' and type='Diet Followup'"; 
	 
$resulti17 = mysqli_query($con, $queryi17) or die(mysqli_error());

// Print out result
$rowi17 = mysqli_fetch_array($resulti17);

$queryii17 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-17' and type='Hospital Exercise'"; 
	 
$resultii17 = mysqli_query($con, $queryii17) or die(mysqli_error());
$rowii17 = mysqli_fetch_array($resultii17);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-17'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii17['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-17'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi17['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-18</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi18 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-18' and type='Diet'"; 
	
$resulti18 = mysqli_query($con, $queryi18) or die(mysqli_error());

// Print out result
$rowi18 = mysqli_fetch_array($resulti18);

$queryii18 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-18' and type='Home Exercise'"; 
	 
$resultii18 = mysqli_query($con, $queryii18) or die(mysqli_error());
$rowii18 = mysqli_fetch_array($resultii18);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-18'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii18['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-18'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi18['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-19</span><br><br>
<span class='font2'></span><br><br>



<?php
$queryi19 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-19' and type='Diet'"; 
	
$resulti19 = mysqli_query($con, $queryi19) or die(mysqli_error());

// Print out result
$rowi19 = mysqli_fetch_array($resulti19);

$queryii19 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-18' and type='Home Exercise'"; 
	 
$resultii19 = mysqli_query($con, $queryii19) or die(mysqli_error());
$rowii19 = mysqli_fetch_array($resultii19);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-19'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii19['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-19'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi19['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-20</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi20 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-20' and type='Diet Followup'"; 
	 
$resulti20 = mysqli_query($con, $queryi20) or die(mysqli_error());

// Print out result
$rowi20 = mysqli_fetch_array($resulti20);

$queryii20 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-20' and type='Hospital Exercise'"; 
	 
$resultii20 = mysqli_query($con, $queryii20) or die(mysqli_error());
$rowii20 = mysqli_fetch_array($resultii20);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-20'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii20['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-20'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi20['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-21</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi21 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-21' and type='Diet'"; 
	
$resulti21 = mysqli_query($con, $queryi21) or die(mysqli_error());

// Print out result
$rowi21 = mysqli_fetch_array($resulti21);

$queryii21 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-21' and type='Home Exercise'"; 
	 
$resultii21 = mysqli_query($con, $queryii21) or die(mysqli_error());
$rowii21 = mysqli_fetch_array($resultii21);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-21'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii21['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-21'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi21['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>

</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-22</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi22 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-22' and type='Diet'"; 
	
$resulti22 = mysqli_query($con, $queryi22) or die(mysqli_error());

// Print out result
$rowi22 = mysqli_fetch_array($resulti22);

$queryii22 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-22' and type='Home Exercise'"; 
	 
$resultii22 = mysqli_query($con, $queryii22) or die(mysqli_error());
$rowii22 = mysqli_fetch_array($resultii22);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-22'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii22['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-22'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi22['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-23</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi23 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-23' and type='Diet Followup'"; 
	 
$resulti23 = mysqli_query($con, $queryi23) or die(mysqli_error());

// Print out result
$rowi23 = mysqli_fetch_array($resulti23);

$queryii23 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-23' and type='Hospital Exercise'"; 
	 
$resultii23 = mysqli_query($con, $queryii23) or die(mysqli_error());
$rowii23 = mysqli_fetch_array($resultii23);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-23'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii23['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-23'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi23['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-24</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi24 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-24' and type='Diet'"; 
	
$resulti24 = mysqli_query($con, $queryi24) or die(mysqli_error());

// Print out result
$rowi24 = mysqli_fetch_array($resulti24);

$queryii24 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-24' and type='Home Exercise'"; 
	 
$resultii24 = mysqli_query($con, $queryii24) or die(mysqli_error());
$rowii24 = mysqli_fetch_array($resultii24);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-24'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii24['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-24'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi24['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-25</span><br><br>
<span class='font2'></span><br><br>


<?php
$queryi25 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-25' and type='Diet'"; 
	
$resulti25 = mysqli_query($con, $queryi25) or die(mysqli_error());

// Print out result
$rowi25 = mysqli_fetch_array($resulti25);

$queryii25 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-25' and type='Home Exercise'"; 
	 
$resultii25 = mysqli_query($con, $queryii25) or die(mysqli_error());
$rowii25 = mysqli_fetch_array($resultii25);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-25'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii25['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-25'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi25['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-26</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi26 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-26' and type='Diet Followup'"; 
	 
$resulti26 = mysqli_query($con, $queryi26) or die(mysqli_error());

// Print out result
$rowi26 = mysqli_fetch_array($resulti26);

$queryii26 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-26' and type='Hospital Exercise'"; 
	 
$resultii26 = mysqli_query($con, $queryii26) or die(mysqli_error());
$rowii26 = mysqli_fetch_array($resultii26);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-26'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii26['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-26'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi26['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-27</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi27 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-27' and type='Diet'"; 
	
$resulti27 = mysqli_query($con, $queryi27) or die(mysqli_error());

// Print out result
$rowi27 = mysqli_fetch_array($resulti27);

$queryii27 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-27' and type='Home Exercise'"; 
	 
$resultii27 = mysqli_query($con, $queryii27) or die(mysqli_error());
$rowii27 = mysqli_fetch_array($resultii27);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-27'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii27['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-27'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi27['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-28</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi28 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-28' and type='Diet'"; 
	
$resulti28 = mysqli_query($con, $queryi28) or die(mysqli_error());

// Print out result
$rowi28 = mysqli_fetch_array($resulti28);

$queryii28 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-28' and type='Home Exercise'"; 
	 
$resultii28 = mysqli_query($con, $queryii28) or die(mysqli_error());
$rowii28 = mysqli_fetch_array($resultii28);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-28'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii28['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-28'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi28['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>

</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-29</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi29 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-29' and type='Diet Followup'"; 
	
$resulti29 = mysqli_query($con, $queryi29) or die(mysqli_error());

// Print out result
$rowi29 = mysqli_fetch_array($resulti29);

$queryii29 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-29' and type='Hospital Exercise'"; 
	 
$resultii29 = mysqli_query($con, $queryii29) or die(mysqli_error());
$rowii29 = mysqli_fetch_array($resultii29);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-29'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii29['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-29'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi29['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-30</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi30 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-30' and type='Endocrinologiest Assessment'"; 
	
$resulti30 = mysqli_query($con, $queryi30) or die(mysqli_error());

// Print out result
$rowi30 = mysqli_fetch_array($resulti30);

?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Endocrinologiest Assessment'?>&day=<?php echo 'DAY-30'?>&pmrn=<?php echo $pmrn;?>">1)Endocrinologiest's Followup-</a> <b><?php if($rowi30['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>
</div>
</form>

</body>

</html>



