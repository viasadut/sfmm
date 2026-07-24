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

$aa2=date('Y-m-d H:i:s');
$query881 = "SELECT COUNT(id) FROM oxygen_1 where atime2<'$aa2' and status='In-Use' "; 
	 
$result881 = mysqli_query($con, $query881) or die(mysqli_error());

// Print out result
$row881 = mysqli_fetch_array($result881);

$aa=$row881['COUNT(id)'];


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
$query87 = "SELECT COUNT(id) FROM bed where status='occupied'"; 
	 
$result87 = mysqli_query($con, $query87) or die(mysqli_error());

// Print out result
$row87 = mysqli_fetch_array($result87)
?>
<?php
$query88 = "SELECT COUNT(id) FROM bed where status='vacant'"; 
	 
$result88 = mysqli_query($con, $query88) or die(mysqli_error());

// Print out result
$row88 = mysqli_fetch_array($result88)
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-31</span><br><br>
<span class='font2' align='left'></span>

<?php
$queryi31 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-31' and type='Diet'"; 
	
$resulti31 = mysqli_query($con, $queryi31) or die(mysqli_error());

// Print out result
$rowi31 = mysqli_fetch_array($resulti31);

$queryii31 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-31' and type='Home Exercise'"; 
	 
$resultii31 = mysqli_query($con, $queryii31) or die(mysqli_error());
$rowii31 = mysqli_fetch_array($resultii31);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-31'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii31['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-31'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi31['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-32</span><br><br>
<span class='font2'></span>


<?php
$queryi32 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-32' and type='Diet'"; 
	
$resulti32 = mysqli_query($con, $queryi32) or die(mysqli_error());

// Print out result
$rowi32 = mysqli_fetch_array($resulti32);

$queryii32 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-32' and type='Home Exercise'"; 
	 
$resultii32 = mysqli_query($con, $queryii32) or die(mysqli_error());
$rowii32 = mysqli_fetch_array($resultii32);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-32'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii31['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-32'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi31['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>

</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-33</span><br><br>


<span class='font2'></span>


<?php
$queryi33 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-33' and type='Diet Followup'"; 
	
$resulti33 = mysqli_query($con, $queryi33) or die(mysqli_error());

// Print out result
$rowi33 = mysqli_fetch_array($resulti33);

$queryii33 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-33' and type='Hospital Exercise'"; 
	 
$resultii33 = mysqli_query($con, $queryii33) or die(mysqli_error());
$rowii33 = mysqli_fetch_array($resultii33);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-33'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii33['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-33'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi33['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-34</span><br><br>
<span class='font2'></span>


<?php
$query3c = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-34' and type='Diet'"; 
	 
$result3c = mysqli_query($con, $query3c) or die(mysqli_error());

// Print out result
$row3c = mysqli_fetch_array($result3c);

$query4c = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-34' and type='Home Exercise'"; 
	 
$result4c = mysqli_query($con, $query4c) or die(mysqli_error());
$row4c = mysqli_fetch_array($result4c);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-34'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4c['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-34'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3c['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-35</span><br><br>
<span class='font2'></span>


<?php
$query35 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-35' and type='Diet'"; 
	 
$result35 = mysqli_query($con, $query35) or die(mysqli_error());

// Print out result
$row35 = mysqli_fetch_array($result35);

$queryc35 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-35' and type='Home Exercise'"; 
	 
$resultc35 = mysqli_query($con, $queryc35) or die(mysqli_error());
$rowc35 = mysqli_fetch_array($resultc35);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-35'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowc35['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-5'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row35['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>
<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-36</span><br><br>
<span class='font2'></span>

<?php
$queryi36 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-36' and type='Diet Followup'"; 
	
$resulti36 = mysqli_query($con, $queryi36) or die(mysqli_error());

// Print out result
$rowi36 = mysqli_fetch_array($resulti36);

$queryii36 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-36' and type='Hospital Exercise'"; 
	 
$resultii36 = mysqli_query($con, $queryii36) or die(mysqli_error());
$rowii36 = mysqli_fetch_array($resultii36);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-36'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii33['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-36'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi33['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>

<span class='font1'><a target='_blank' href='$url'></a>DAY-37</span><br><br>
<span class='font2'></span>
<?php
$query3f = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-37' and type='Diet'"; 
	 
$result3f = mysqli_query($con, $query3f) or die(mysqli_error());

// Print out result
$row3f = mysqli_fetch_array($result3f);

$query4f = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-37' and type='Home Exercise'"; 
	 
$result4f = mysqli_query($con, $query4f) or die(mysqli_error());
$row4f = mysqli_fetch_array($result4f);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-37'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4f['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-37'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3f['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>
<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-38</span><br><br>
<span class='font2'></span>
<?php
$query38 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-38' and type='Diet'"; 
	 
$result38 = mysqli_query($con, $query38) or die(mysqli_error());

// Print out result
$row38 = mysqli_fetch_array($result38);

$queryc38 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-38' and type='Home Exercise'"; 
	 
$resultc38 = mysqli_query($con, $queryc38) or die(mysqli_error());
$rowc38 = mysqli_fetch_array($resultc38);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-38'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowc38['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-38'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row38['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>
<div class='grid-item'>

<span class='font1'><a target='_blank' href='$url'></a>DAY-39</span><br><br>
<span class='font2'></span>
<?php
$queryi39 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-39' and type='Diet Followup'"; 
	
$resulti39 = mysqli_query($con, $queryi39) or die(mysqli_error());

// Print out result
$rowi39 = mysqli_fetch_array($resulti39);

$queryii39 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-39' and type='Hospital Exercise'"; 
	 
$resultii39 = mysqli_query($con, $queryii39) or die(mysqli_error());
$rowii39 = mysqli_fetch_array($resultii39);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-39'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii39['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-39'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi39['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-40</span><br><br>
<span class='font2'></span>
<?php
$query3i = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-40' and type='Diet'"; 
	
$result3i = mysqli_query($con, $query3i) or die(mysqli_error());

// Print out result
$row3i = mysqli_fetch_array($result3i);

$query4i = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-40' and type='Home Exercise'"; 
	 
$result4i = mysqli_query($con, $query4i) or die(mysqli_error());
$row4i = mysqli_fetch_array($result4i);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-40'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($row4i['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-40'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($row3i['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>
<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-41</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi41 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-41' and type='Diet'"; 
	
$resulti41 = mysqli_query($con, $queryi41) or die(mysqli_error());

// Print out result
$rowii41 = mysqli_fetch_array($resultii41);

$queryii41 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-41' and type='Home Exercise'"; 
	 
$resultii41 = mysqli_query($con, $queryii41) or die(mysqli_error());
$rowii41 = mysqli_fetch_array($resultii41);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-41'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii41['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-41'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi41['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>




</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-42</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi42 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-42' and type='Diet Followup'"; 
	
$resulti42 = mysqli_query($con, $queryi42) or die(mysqli_error());

// Print out result
$rowi42 = mysqli_fetch_array($resulti42);

$queryii42 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-42' and type='Hospital Exercise'"; 
	 
$resultii42 = mysqli_query($con, $queryii42) or die(mysqli_error());
$rowii42 = mysqli_fetch_array($resultii42);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Hospital Exercise'?>&day=<?php echo 'DAY-42'?>&pmrn=<?php echo $pmrn;?>">1)Hospital Exercise-</a> <b><?php if($rowii42['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet Followup'?>&day=<?php echo 'DAY-42'?>&pmrn=<?php echo $pmrn;?>">1)Diet Followup-</a> <b><?php if($rowi42['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>

</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-43</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-44</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-45</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-46</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-47</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-48</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-49</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-50</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-51</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-52</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-53</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-54</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-55</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-56</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-57</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-58</span><br><br>
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





<span class='font1'><a target='_blank' href='$url'></a>DAY-59</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi29 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-29' and type='Diet'"; 
	
$resulti29 = mysqli_query($con, $queryi29) or die(mysqli_error());

// Print out result
$rowi29 = mysqli_fetch_array($resulti29);

$queryii29 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-29' and type='Home Exercise'"; 
	 
$resultii29 = mysqli_query($con, $queryii29) or die(mysqli_error());
$rowii29 = mysqli_fetch_array($resultii29);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-29'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii29['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-29'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi29['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-60</span><br><br>
<span class='font2'></span><br><br>

<?php
$queryi30 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-30' and type='Diet'"; 
	
$resulti30 = mysqli_query($con, $queryi30) or die(mysqli_error());

// Print out result
$rowi30 = mysqli_fetch_array($resulti30);

$queryii30 = "SELECT COUNT(type) FROM weight_loss_assess where pmrn='$pmrn' and day='DAY-30' and type='Home Exercise'"; 
	 
$resultii30 = mysqli_query($con, $queryii30) or die(mysqli_error());
$rowii30 = mysqli_fetch_array($resultii30);
?>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Home Exercise'?>&day=<?php echo 'DAY-30'?>&pmrn=<?php echo $pmrn;?>">1)Home Exercise-</a> <b><?php if($rowii30['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>
<a  target='_Blank' href="weight_loss_assess?type=<?php echo 'Diet'?>&day=<?php echo 'DAY-30'?>&pmrn=<?php echo $pmrn;?>">1)Diet-</a> <b><?php if($rowi30['COUNT(type)']==0){echo '<span style="color:red;">NOT DONE</span>';}else {echo'<span style="color:green;">DONE</span>';}?></b><br>



</div>
</div>
</form>

</body>

</html>



