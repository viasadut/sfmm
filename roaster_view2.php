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

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$bloc=$_REQUEST['location']; 
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

<p align="center" class="style1">Roaster Duty List</p> 


   
   <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  background-color: pink;
  padding: 20px;
  
}
.grid-item {
  background-color: lightgreen;
  border: 1px solid rgba(0, 0, 0, 0.8);
font-size:30px;
  padding: 20px;
  
  text-align: left;
  width:300px; /* or whatever width you want. */
   max-width:300px; /* or whatever width you want. */
   display: inline-block;

}

.grid-item1 {
  background-color: #77DD77;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 40px;
  
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
	   font-size:25px;
	   font-weight:bold;
	   text-align:left;
}
.font2{
    font-family:sans-serif;
	   font-size:30px;
	     font-weight:bold;
		 text-align:left;
		
}

.font3{
    font-family:serif;
	   font-size:16px;
	   
	   text-align:left;
}


img{
        max-width: 50%;
        max-height: 50%;
        
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
.other1 {background-color: #FFCBA4; } /* Gray */ 




</style>
</head>
<body>
  

<form action="" method="post">
 
		
		
		

				
					
						







<?php

$date_n=date('Y-m-01');
$date_n1=date('Y-m-31');
$date_f=date('F');
$date_y=date('Y');
$count=1;	
$sel_query="Select * from roaster_1 where date between '$date_n' and '$date_n1' order by id asc";	
	
$result = mysqli_query($con,$sel_query);

$rows=mysqli_num_rows($result);
if ($rows!=0)
{
	echo'
	
	<p><h1 style="color:red;font-size:40px;text-align:left"><blink>Roaster Details for Month of '.$date_f.', '.$date_y.'</blink></h1></P>	  
<div class="grid-container">

	';
	
}
while($row = mysqli_fetch_assoc($result)) { ?>



<?php
echo"

<div class='grid-item'>
<span class='font2'>".date('d/m/Y', strtotime($row["date"]))."</span><br><br>



";?>



<?php
echo"<span class='font1' style='color:red;'>Morning: </span><br>";
$rr=$row['date'];
$sel_query1="Select * from roaster_2 where date ='$rr' and emor='Morning' order by location asc";	
	
$result1 = mysqli_query($con,$sel_query1);

$rows2=mysqli_num_rows($result1);
while($rows1 = mysqli_fetch_assoc($result1)) { ?>

<?php if($rows1['emor']=='Morning') 



$rr=$rows1['mor'];

$url = "s_details?sid=$rr"; 
	$sel_query1c="Select * from staff3 where sid ='$rr' order by id asc";	
	
$result1c = mysqli_query($con,$sel_query1c);

$rows1c = mysqli_fetch_assoc($result1c);
$s_name=$rows1c['sname'];

{echo
"
<span class='font3'><a target='_blank' href='$url'>".$s_name."</a></span>

";}
}?>


<?php
echo"<br><span class='font1' style='color:red;'>Late: </span><br>";
$rr=$row['date'];
$sel_query1="Select * from roaster_2 where date ='$rr' and emor='Late' order by id asc";	
	
$result1 = mysqli_query($con,$sel_query1);

$rows2=mysqli_num_rows($result1);
while($rows1 = mysqli_fetch_assoc($result1)) { ?>

<?php if($rows1['emor']=='Late') 



$rr=$rows1['mor'];
$url = "s_details?sid=$rr"; 
	$sel_query1c="Select * from staff3 where sid ='$rr' order by id asc";	
	
$result1c = mysqli_query($con,$sel_query1c);

$rows1c = mysqli_fetch_assoc($result1c);
$s_name=$rows1c['sname'];

{echo
"
<span class='font3'><a target='_blank' href='$url'>".$s_name."</a></span>

";}
}?>



<?php
echo"<br><span class='font1' style='color:red;'>Night: </span><br>";
$rr=$row['date'];
$sel_query1="Select * from roaster_2 where date ='$rr' and emor='Night' order by id asc";	
	
$result1 = mysqli_query($con,$sel_query1);

$rows2=mysqli_num_rows($result1);
while($rows1 = mysqli_fetch_assoc($result1)) { ?>

<?php if($rows1['emor']=='Night') 

$rr=$rows1['mor'];
$url = "s_details?sid=$rr"; 
	$sel_query1c="Select * from staff3 where sid ='$rr' order by id asc";	
	
$result1c = mysqli_query($con,$sel_query1c);

$rows1c = mysqli_fetch_assoc($result1c);
$s_name=$rows1c['sname'];

{echo
"
<span class='font3'><a target='_blank' href='$url'>".$s_name."</a></span>

";}
}?>

<?php
echo "</div>";

?>






<?php $count++; }?>

</div>









</form>

</body>

</html>



