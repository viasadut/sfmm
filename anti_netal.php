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

<p align="center" class="style1">Anti Netal Program Calendar Management</p> 


   
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

<style>
#more {display: inline;}
#more1 {display: inline;}
#more2 {display: inline;}
</style>
</head>
<body>
  
<span class="label success" style="float:right;"><a href="weight_loss2">3rd Month</a></span>
<span class="label info"style="float:right;"><a  href="weight_loss1">2nd Month</a></span>
<span class="label warning"style="float:right;"><a  href="weight_lossn">1st Month</a></span>


<br>

<form action="" method="post">
 
		
		
	<span class='font1' style="font-size:42px;color:black;font-weight:bold;"><text onclick="myFunction()" id="myBtn">1st Trimester</text></span>

<span id="dots"></span><span id="more">
 
 
<div class="grid-container">




  

<div class='grid-item'>





<span class='font1' style="font-size:28px;color:white;font-weight:bold"><a target='_blank' href='$url'></a>1st Visit</span><br><br>
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
<?php $f=1;
if($f==2){echo'
<a  target="_Blank" href="anti_netal_appointment.php?type="Gynecologist Visit"&day="DAY-01"&pmrn='.$pmrn.'">1)Gynecologist Visit-</a> <b><span style="color:red;">NOT DONE</span></b><br>';}
else{echo'1)Gynecologist Visit-</a> <b><span style="color:Green;">DONE</span></b><br>';}

?>

<a  target='_Blank' href="anti_netal_appointment_diet.php?type=<?php echo 'Ditetician Visit'?>&day=<?php echo 'DAY-01'?>&pmrn=<?php echo $pmrn;?>">2)Ditetician Visit-</a> <b><?php if($row2['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>

<a  target='_Blank' href="anti_netal_appointment_physio.php?type=<?php echo 'Physiotheraphy Visit'?>&day=<?php echo 'DAY-01'?>&pmrn=<?php echo $pmrn;?>">3)Physiotheraphy Visit-</a> <b><?php if($row3['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



<br><br>


</div>

<div class='grid-item'>





<span class='font1' style="font-size:28px;color:white;font-weight:bold"><a target='_blank' href='$url'></a>2nd Visit</span><br><br>
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




</div>

</span>
<br>
<span class='font1' style="font-size:42px;color:black;font-weight:bold"><text onclick="myFunction1()" id="myBtn1">2nd Trimester</text></span>


 <span id="dots1"></span><span id="more1">
 
<div class="grid-container">




  

<div class='grid-item'>





<span class='font1' style="font-size:28px;color:white;font-weight:bold"><a target='_blank' href='$url'></a>1st Visit</span><br><br>
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





<span class='font1' style="font-size:28px;color:white;font-weight:bold"><a target='_blank' href='$url'></a>2nd Visit</span><br><br>
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




</div>
</span>
<br>
<span class='font1' style="font-size:42px;color:black;font-weight:bold"><text onclick="myFunction2()" id="myBtn2">3rd Trimester</text></span>


 <span id="dots2"></span><span id="more2">


 
 
<div class="grid-container">




  

<div class='grid-item'>





<span class='font1' style="font-size:28px;color:white;font-weight:bold"><a target='_blank' href='$url'></a>1st Visit</span><br><br>
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





<span class='font1' style="font-size:28px;color:white;font-weight:bold"><a target='_blank' href='$url'></a>2nd Visit</span><br><br>
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




</div>
</span>
</form>

</body>
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "1st Trimester"; 
    moreText.style.display = "inline";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "1st Trimester(more)"; 
    moreText.style.display = "none";
  }
}
</script>



<script>
function myFunction1() {
  var dots1 = document.getElementById("dots1");
  var moreText1 = document.getElementById("more1");
  var btnText1 = document.getElementById("myBtn1");

  if (dots1.style.display === "none") {
    dots1.style.display = "inline";
    btnText1.innerHTML = "2nd Trimester"; 
    moreText1.style.display = "inline";
  } else {
    dots1.style.display = "none";
    btnText1.innerHTML = "2nd Trimester(more)"; 
    moreText1.style.display = "none";
  }
}
</script>

<script>
function myFunction2() {
  var dots1 = document.getElementById("dots2");
  var moreText1 = document.getElementById("more2");
  var btnText1 = document.getElementById("myBtn2");

  if (dots1.style.display === "none") {
    dots1.style.display = "inline";
    btnText1.innerHTML = "3rd Trimester"; 
    moreText1.style.display = "inline";
  } else {
    dots1.style.display = "none";
    btnText1.innerHTML = "3rd Trimester(more)"; 
    moreText1.style.display = "none";
  }
}
</script>
</html>



