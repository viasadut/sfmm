<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff','imo','doctor','ot','endo','bill','nurse','bed')"; 
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
  background-color: lightgreen;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}

.grid-item1 {
  background-color: #3B9C9C;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item8 {
  background-color: purple;
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
	   font-size:12px;
	     font-weight:bold;
		 text-align:left;
}

img{
        max-width: 20%;
        max-height: 15%;
        
		align: center;
    }
	
	
	.label {
  color: white;
  padding: 8px;
  font-family: Arial;
}
.success {background-color: lightgreen;} /* lightgreen */
.info {background-color: #3B9C9C;} /* Red */
.warning {background-color: orange;} /* Orange */
.danger {background-color: yellow;} /* Red */ 
.other {background-color: purple; } /* Gray */ 




</style>
</head>
<body>
  

<form action="" method="post">
 
		
		
		<table>

				
					
						<tr>				
						
             		
					 
			    	 
					 <td colspan="3" align="right"><select name="bt">
        
												<option value=''>-Select Ward-</option>
												<option value='ALL'>ALL</option>
						<?php 
			$sql = "select distinct block, level  from `bed` order by block asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->block."'>".$row->block." - Level ".$row->level."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch" align="right">Search</button></td>
					<td>Select Ward From Dropdown List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					
					 </tr>
</table>

<span class="label success" style="float:right;"><a href="bed_occupied">Occupied</a></span>
<span class="label info"style="float:right;"><a  href="bed_vacant">Vacant</a></span>
<span class="label warning"style="float:right;"><a  href="bed_house">Under Housekeeping</a></span>
<span class="label danger"style="float:right;"><a  href="bed_maintenance">Under Maintenance</a></span>
<span class="label other"style="float:right;color:white;"><a  href="bed_discharge">To be Discharged</a></span>



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
Consultant Name: ".$row["dname"]."</span><br>








</div>";}


if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2' style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen."<br>
Consultant Name: ".$row["dname"]."</span>








</div>";}


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
<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-5 (Block -5A)</blink></h1></P>	    
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='5A' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2' style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-5 (Block -5B)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='5B' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];


$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];

if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-5 (Block -5C)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='5C' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 

$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];



if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}



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


<?php $count++; }?>

</div>



<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-5 (Block -5D)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='5D' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];



if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-6 (Block -6A)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='6A' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-6 (Block -6B)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='6B' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];



if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}
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


<?php $count++; }?>

</div>



<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-6 (Block -6C)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='6C' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}
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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-6 (Block -6D)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='6D' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-7 (Block -7A)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='7A' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];



if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>



<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-7 (Block -7B)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='7B' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];



if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>



<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-7 (Block -7C)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='7C' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];



if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2' style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Level-7 (Block -7D)</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='7D' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];



if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2' style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>

<p><h1 style="color:red;font-size:40px;text-align:left"><blink>ICU</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='ICU' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];



if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2' style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>CCU</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='CCU' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];


$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2' style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>

<p><h1 style="color:red;font-size:40px;text-align:left"><blink>HDU</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='HDU' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}
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


<?php $count++; }?>

</div>


<p><h1 style="color:red;font-size:40px;text-align:left"><blink>NICU</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='NICU' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

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


<?php $count++; }?>

</div>






<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Covid ICU</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='Covid ICU' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span><br>
<span class='blink_img'><img src='oxy.png'></span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span><br>
<span class='blink_img'><img src='oxy.png'></span>

</div>";}

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


<?php $count++; }?>

</div>

<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Any Block</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='Any Block' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}
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


<?php $count++; }?>



</div>





<p><h1 style="color:red;font-size:40px;text-align:left"><blink>NC Block 5A</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='NC5A' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}
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


<?php $count++; }?>



</div>



<p><h1 style="color:red;font-size:40px;text-align:left"><blink>NC Block 5B</blink></h1></P>	  
<div class="grid-container">

<?php

$count=1;	
$sel_query="Select * from bed where status in ('occupied','Vacant','Under Housekeeping','Under Maintenance') and block='NC5B' and bed_status='Active' order by status asc";	
	
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$ss1=$row['bed_status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
$url1 = "bededit_all?id=$id"; 
$pmrn=$row['pmrn'];
$query43 = "SELECT * FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$dstatus=$row1['disstatus'];

$query44 = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($result44);


//$dstatus=$row1['disstatus'];
$gen1=$row2['psex'];


if($ss=='Occupied' and $dstatus=='')
{
echo"
<div class='grid-item'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}

else if($ss=='Occupied' and $dstatus!='')
{
echo"
<div class='grid-item8'>

<img src='pat.jpg'><br>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'style='color:white'>Patient Name: ".$row["pname"]."<br>
MRN: ".$row["pmrn"]."<br>
Gender: ".$gen1."<br>
Consultant Name: ".$row["dname"]."</span>
</div>";}
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


<?php $count++; }}?>



</div>





</form>

</body>

</html>



