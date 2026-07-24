<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff','imo','doctor','ot','endo','bill','nurse','bed','emergency','mofficer')"; 
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

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1">Bed Management (Under Construction)</p> 


   
   <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto;
  background-color: pink;
  padding: 10px;
  
}
.grid-item {
  background-color: #F778A1;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}

.grid-item1 {
  background-color: #77DD77;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item8 {
  background-color: #D462FF;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}



.grid-item2 {
  background-color: orange;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item3 {
  background-color: yellow;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
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




</style>
</head>
<body>
  

<form action="" method="post">
 
		
		
		

<span class="label success" style="float:right;"><a href="bed_occupied">Occupied</a></span>
<span class="label info"style="float:right;"><a  href="bed_vacant">Vacant</a></span>
<span class="label warning"style="float:right;"><a  href="bed_house">Under Housekeeping</a></span>
<span class="label danger"style="float:right;"><a  href="bed_maintenance">Under Maintenance</a></span>
<span class="label other"style="float:right;color:white;"><a  href="bed_discharge">To be Discharged</a></span>
<span class="label oxy"style="float:right;color:white;"><a  href="oxy_mng_home">Oxygen Cylinder Management</a></span>



 <?php
if(isset($_POST['bsearch'])){
$bt=$_REQUEST["bt"];
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;

	
//echo "<font color=blue font size=5> Patient View For Ward -";
//echo   $bt;

	
//$sel_query="Select * from bed where  status in ('occupied','Vacant') and type='$bt' order by status asc";	
	


//$result = mysqli_query($con,$sel_query);
//while($row = mysqli_fetch_assoc($result)) { ?>


<h1 style="background-color:powderblue;text-align:center;color:red"><blink><?php echo 'Block- '. $bt;?></blink></h1>  
<div class="grid-container">




  

  
<?php  

if($bt=='ALL'){
	
	//echo "<font color=blue font size=5> ALL Patient List  -";


	
	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and bed_status='Active' order by status asc";

}

else{

$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='$bt' and bed_status='Active'  order by status asc";}

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$pp=$row['pmrn'];

$pic = "webcam?pmrn=$pp"; 
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);


$dstatus=$row1['disstatus'];
$gen=$row1['gender'];


$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>



<img src='pat.jpg'><a target='_blank' href='$pic'>pic</a><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span><br><br>








";
$dstatus1=$row1['treat'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);

	
	//echo "<span class=''>".$item."</span>";

//foreach ($treat as $item) {

if($item==''){
echo "<span class=''>No Special Plan Set Yet</span>";
}

else if($item=='Ventilated'){
echo "<span class=''><img src='Ventilator.png' title='Ventilator'></span>";
}
else if($item=='High Flow Mask'){
echo "<span class=''><img src='high_flow_mask.png' title='high_flow_mask'></span>";
}
else if($item=='Nasal Prong'){
echo "<span class=''><img src='nasal_cannula.png' title='nasal_cannula'></span>";
}
else if($item=='Oxygen concentrator'){
echo "<span class=''><img src='Oxygen_concentrator.png' title='Oxygen_concentrator'></span>";
}
else if($item=='BiPap'){
echo "<span class=''><img src='BiPap.png' title='BiPap'></span>";
}
else if($item=='C-PAP'){
echo "<span class=''><img src='C-PAP.png' title='C-PAP'></span>";
}
else if($item=='Face Mask'){
echo "<span class=''><img src='facemask.png' title='facemask'></span>";
}
else if($item=='High Flow Nasal Cannula'){
echo "<span class=''><img src='High_Flow_Nasal_Cannula.png' title='High_Flow_Nasal_Cannula'></span>";
}
else if($item=='Chest Tube'){
echo "<span class=''><img src='Chest_Tube.png' title='Chest_Tube' ></span>";
}
else if($item=='Observation'){
echo "<span class=''>Observation</span>";
}

}	


echo "</div>";
}


if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font3'>MRN: ".$row["pmrn"]."<br></span><br>
<span class='font2' style='color:white'>Patient Name: ".$row["pname"]."</span><br>

<span class='font2' style='color:white'>Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span><br><br>








";
$dstatus1=$row1['treat'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);

	
	//echo "<span class=''>".$item."</span>";

//foreach ($treat as $item) {

if($item==''){
echo "<span class=''>No Special Plan Set Yet</span>";
}

else if($item=='Ventilated'){
echo "<span class=''><img src='Ventilator.png' title='Ventilator'></span>";
}
else if($item=='High Flow Mask'){
echo "<span class=''><img src='high_flow_mask.png' title='high_flow_mask'></span>";
}
else if($item=='Nasal Prong'){
echo "<span class=''><img src='nasal_cannula.png' title='nasal_cannula'></span>";
}
else if($item=='Oxygen concentrator'){
echo "<span class=''><img src='Oxygen_concentrator.png' title='Oxygen_concentrator'></span>";
}
else if($item=='BiPap'){
echo "<span class=''><img src='BiPap.png' title='BiPap'></span>";
}
else if($item=='C-PAP'){
echo "<span class=''><img src='C-PAP.png' title='C-PAP'></span>";
}
else if($item=='Face Mask'){
echo "<span class=''><img src='facemask.png' title='facemask'></span>";
}
else if($item=='High Flow Nasal Cannula'){
echo "<span class=''><img src='High_Flow_Nasal_Cannula.png' title='High_Flow_Nasal_Cannula'></span>";
}
else if($item=='Chest Tube'){
echo "<span class=''><img src='Chest_Tube.png' title='Chest_Tube' ></span>";
}
else if($item=='Observation'){
echo "<span class=''>Observation</span>";
}

}	


echo "</div>";
}


else if($ss=='Vacant' and $ss1='Active')
{
echo"
<div class='grid-item1'>
<span class='font1'><a href='$url1'>".$row["bno"]."</a></span><br><br>
<span class='font2'><a target='_blank' href='$url'>VACANT</a><br>
</span>
</div>";}


else if($ss=='Under Housekeeping' and $ss1='Active')
{
echo"
<div class='grid-item2'>
<span class='font1'><a  href='$url1'>".$row["bno"]."</a></span><br><br>


<span class='font2'><a target='_blank' href='$url'>Under Housekeeping</a><br>
</span>
</div>";}


else if($ss=='Under Maintenance' and $ss1='Active')
{
echo"
<div class='grid-item3'>
'<span class='font1'><a href='$url1'>".$row["bno"]."</a></span><br><br>

<span class='font2'><a target='_blank' href='$url'>Under Maintenance</a><br>
</span>

</div>";}


?>


<?php $count++; } }


else {?>
</div>


<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied') and bed_status='Active' and oxy_no !='' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
//$row1 = mysqli_fetch_assoc($result);

$rows=mysqli_num_rows($result);
if ($rows!=0)
{
	echo'
	
	<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Patient List under Oxygen Concentrator</blink></h1></P>	  
<div class="grid-container">

	';
	
}
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$oxy_no=$row['oxy_no'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$url2 = "asset_manage?id=$id"; 
$url3 = "bededit_oxygen?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];
//$dstatus1=$row1['treat'];
//$treat=explode(',',$dstatus1);
//$treat as $item;
//foreach ($treat as $item) {
//if($item=='Ventilated')
	//echo $item;

//}

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];






if($ss=='Occupied' and $dstatus=='' and $oxy_no!='' and $row['oxy_type']=='Oxygen Concentrator')



{
	
	
	
echo"
<div class='grid-item'>


<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font3' style='color:white;text-align:left'>MRN: ".$row["pmrn"]."<br></span><br>
<span class='font2' style='color:white; align:left' >Patient: ".$row["pname"]."</span><br>

<span class='font2' style='color:white'>Gender: ".$gen1."<br>
Consultant: ".$row["dname"]."</span><br><br>
";
$dstatus1=$row1['treat'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);

	
	//echo "<span class=''>".$item."</span>";

//foreach ($treat as $item) {

if($item==''){
echo "<span class='font2' style='color:white'>No Special Plan Set Yet</span>";
}

else if($item=='Ventilated'){
echo "<span class=''><img src='Ventilator.png' title='Ventilator'></span>";
}
else if($item=='High Flow Mask'){
echo "<span class=''><img src='high_flow_mask.png' title='high_flow_mask'></span>";
}
else if($item=='Nasal Prong'){
echo "<span class=''><img src='nasal_cannula.png' title='nasal_cannula'></span>";
}
else if($item=='Oxygen concentrator'){
echo "<span class=''><img src='Oxygen_concentrator.png' title='Oxygen_concentrator'></span>";
}
else if($item=='BiPap'){
echo "<span class=''><img src='BiPap.png' title='BiPap'></span>";
}
else if($item=='C-PAP'){
echo "<span class=''><img src='C-PAP.png' title='C-PAP'></span>";
}
else if($item=='Face Mask'){
echo "<span class=''><img src='facemask.png' title='facemask'></span>";
}
else if($item=='High Flow Nasal Cannula'){
echo "<span class=''><img src='High_Flow_Nasal_Cannula.png' title='High_Flow_Nasal_Cannula'></span>";
}
else if($item=='Chest Tube'){
echo "<span class=''><img src='Chest_Tube.png' title='Chest_Tube' ></span>";
}

else if($item=='Observation'){
echo "<span class='font2' style='color:white'>Observation</span>";
}
}	

if($row['oxy_type']=='Portable Oxygen Cylinder (Bull) '){
echo "<span class=''><a target='_blank' href='$url2'><img src='oxygen_new.png' title='".$row['oxy_no']."'></a></span>";

}

else if($row['oxy_type']=='Central Oxygen Supply'){
echo "<span class=''><a target='_blank' href='$url2'><img src='c_oxygen.png' title='Central Oxygen Line '></a></span>";



}


else if($row['oxy_type']=='Oxygen Concentrator'){
echo "<span class=''><a target='_blank' href='$url2'><img src='con_oxygen.png' title='Oxygen Concentrator'></a></span>";

$oxy_no = $row["oxy_no"];

$query88 = "SELECT * FROM oxygen_1 where sno='$oxy_no'"; 
	 
$result88 = mysqli_query($con, $query88) or die(mysqli_error());

// Print out result
$row88 = mysqli_fetch_array($result88);

$myvalue=$row88['atime1'];


$datetime = new DateTime($myvalue); 
$sdate = $datetime->format('Y-m-d'); 
$stime = $datetime->format('His');
$stimexx = $datetime->format('H:i:s');
$time2 = "00:05:00";
$time3 = "00:05:00";

$time_now1 = date("H:i:s");

$time_now=strtotime($time_now1)-strtotime("00:00:00");



$secs = strtotime($time2)-strtotime("00:00:00");
$secs1 = strtotime($time3)-strtotime("00:00:00");

$result_time1 = date("H:i:s",strtotime($stimexx)+$secs);
$result_time=strtotime($result_time1)-strtotime("00:00:00");

$result_timez = date("H:i:s",strtotime($time_now1)+$secs1);

$result_time2=$result_time;
$time_now2=$time_now;
$n_time=$result_time2 - $time_now;

$ad=date('Y-m-d H:i:s');
/*$sel="Select * from oxygen_1 where '$ad' between atime1 and atime2";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);
*/
$ad1=$row88['atime2'];

if($ad>$ad1)
{
	   
	
	echo "<audio autoplay>
  <source src='audio/oxy.mp3' type='audio/mpeg'>
  
  
 
</audio>

<blink><img src='audio/alert.png' title='Oxygen Alert'></blink>";}


}


echo "</div>";
}





else if($ss=='Occupied' and $dstatus!='' and $oxy_no!='' and $row['oxy_type']=='Oxygen Concentrator')
{
	
	
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font3' style='color:white;text-align:left'>MRN: ".$row["pmrn"]."<br></span><br>
<span class='font2' style='color:white; align:left' >Patient: ".$row["pname"]."</span><br>

<span class='font2' style='color:white'>Gender: ".$gen1."<br>
Consultant: ".$row["dname"]."</span><br><br>




";
$dstatus1=$row1['treat'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);

	
	//echo "<span class=''>".$item."</span>";

//foreach ($treat as $item) {

if($item==''){
echo "<span class='font2' style='color:white'>No Special Plan Set Yet</span>";
}

else if($item=='Ventilated'){
echo "<span class=''><img src='Ventilator.png' title='Ventilator'></span>";
}
else if($item=='High Flow Mask'){
echo "<span class=''><img src='high_flow_mask.png' title='high_flow_mask'></span>";
}
else if($item=='Nasal Prong'){
echo "<span class=''><img src='nasal_cannula.png' title='nasal_cannula'></span>";
}
else if($item=='Oxygen concentrator'){
echo "<span class=''><img src='Oxygen_concentrator.png' title='Oxygen_concentrator'></span>";
}
else if($item=='BiPap'){
echo "<span class=''><img src='BiPap.png' title='BiPap'></span>";
}
else if($item=='C-PAP'){
echo "<span class=''><img src='C-PAP.png' title='C-PAP'></span>";
}
else if($item=='Face Mask'){
echo "<span class=''><img src='facemask.png' title='facemask'></span>";
}
else if($item=='High Flow Nasal Cannula'){
echo "<span class=''><img src='High_Flow_Nasal_Cannula.png' title='High_Flow_Nasal_Cannula'></span>";
}
else if($item=='Chest Tube'){
echo "<span class=''><img src='Chest_Tube.png' title='Chest_Tube' ></span>";
}

else if($item=='Observation'){
echo "<span class='font2' style='color:white'>Observation</span>";
}
}	

if($row['oxy_type']=='Portable Oxygen Cylinder (Bull) '){
echo "<span class=''><a target='_blank' href='$url2'><img src='oxygen_new.png' title='".$row['oxy_no']."'></a></span>";

}

else if($row['oxy_type']=='Central Oxygen Supply'){
echo "<span class=''><a target='_blank' href='$url2'><img src='c_oxygen.png' title='Central Oxygen Line '></a></span>";

}


else if($row['oxy_type']=='Oxygen Concentrator'){
echo "<span class=''><a target='_blank' href='$url2'><img src='con_oxygen.png' title='Oxygen Concentrator'></a></span>";


$oxy_no = $row["oxy_no"];

$query88 = "SELECT * FROM oxygen_1 where sno='$oxy_no'"; 
	 
$result88 = mysqli_query($con, $query88) or die(mysqli_error());

// Print out result
$row88 = mysqli_fetch_array($result88);

$myvalue=$row88['atime1'];


$datetime = new DateTime($myvalue); 
$sdate = $datetime->format('Y-m-d'); 
$stime = $datetime->format('His');
$stimexx = $datetime->format('H:i:s');
$time2 = "00:05:00";
$time3 = "00:05:00";

$time_now1 = date("H:i:s");

$time_now=strtotime($time_now1)-strtotime("00:00:00");



$secs = strtotime($time2)-strtotime("00:00:00");
$secs1 = strtotime($time3)-strtotime("00:00:00");

$result_time1 = date("H:i:s",strtotime($stimexx)+$secs);
$result_time=strtotime($result_time1)-strtotime("00:00:00");

$result_timez = date("H:i:s",strtotime($time_now1)+$secs1);

$result_time2=$result_time;
$time_now2=$time_now;
$n_time=$result_time2 - $time_now;

$ad=date('Y-m-d H:i:s');
/*$sel="Select * from oxygen_1 where '$ad' between atime1 and atime2";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);
*/
$ad1=$row88['atime2'];

if($ad>$ad1)
{
	   
	
	echo "<audio autoplay>
  <source src='audio/oxy.mp3' type='audio/mpeg'>
  
  
 
</audio>

<blink><img src='audio/alert.png' title='Oxygen Alert'></blink>";}


}


echo "</div>";
}




?>


<?php $count++; }}?>

</div>




</form>

</body>

</html>



