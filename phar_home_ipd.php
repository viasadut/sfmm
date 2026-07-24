<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");

$fullname = $_SESSION['sess_username'];
$runningTime1 = date('misis').$fullname;
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$ndate=date('Y-m-d'); 
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
    height: 28px;
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



<?php


$runningTime = date('Ymdis').$fullname;
//$sno=$runningTime;

?>
</div1>


<div id='cssmenu'>
<ul>
   <li><a href='homestaff'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Prescription</span></a>
      <ul>
         <li class='has-sub'><a href='tes'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='pharinview'><span>IPD Prescription</span></a>
            
         </li>
      </ul>
   </li>
   
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='preview'><span>Print Previous Prescription</span></a>
            
         </li>
		 <li class='has-sub'><a href='tes5'><span>Prescription Status Wise Report </span></a>
            
         </li>
         <li class='has-sub'><a href='tes6'><span>Consultant Wise Report</span></a>
            
         </li>
		 <li class='has-sub'><a href='tesaudit'><span>All Consultant Prescription Report</span></a>
            
         </li>
      </ul>
   </li>
   
   
   <li class='active has-sub'><a href='#'><span>Search</span></a>
      <ul>
         <li class='last'><a href='categoryphar'><span>Categorywise Medicine</span></a></li>
		 <li class='last'><a href='genericsearch'><span>Generic Name wise Medicine</span></a></li>
            
         
      </ul>
      <li class='last'><a href='imoinviewphar'><span>Inpatient</span></a>
	  
	  
	  </li>
	  
	  <li class='last'><a href='otphar'><span>OT</span></a>
	  
	  
	  </li>
	  
	  <li class='last'><a href='phomemngphar'><span>Add / Edit Medicine </span></a></li>
	  <li class='last'><a href='pending_request_phar'><span>Pending Request</span></a></li>
	  <li class='last'><a href='pharstats'><span>Stats</span></a>
	  <li class='last'><a href='pchangepass'><span>Change Password</span></a></li>
	  <li class='last'><a href='phar_home'><span>New Home</span></a></li>
	  <li class='last'><a href='phar_medi_stat'><span>Medicine Stats</span></a></li>
	  <li class='last'><a href='all_dept_stock_vc'><span>Edit</span></a></li>

    <li><a href='insummary_api1_phar'><span>Manually Push Charge in H360</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</div>

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1" style="color:black; font-size:36px; font-weight:bold">IPD Pharmacy</p> 


   
   <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  background-color: lightblue;
  padding: 10px;
              line-height: 25px;

  
}
.grid-item {
  background-color: lightgreen;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:280px; /* or whatever width you want. */
   max-width:280px; /* or whatever width you want. */
   display: inline-block;
   
}

.grid-item1 {
  background-color: #77DD77;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:280px; /* or whatever width you want. */
   max-width:280px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item8 {
  background-color: green;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:280px; /* or whatever width you want. */
   max-width:280px; /* or whatever width you want. */
   display: inline-block;
}



.grid-item2 {
  background-color: red;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:280px; /* or whatever width you want. */
   max-width:280px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item3 {
  background-color: orange;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:280px; /* or whatever width you want. */
   max-width:280px; /* or whatever width you want. */
   display: inline-block;
}


.font1{
    font-family:serif;
	   font-size:20px;
}
.font2{
    font-family:sans-serif;
	   font-size:12px;
	     font-weight:bold;
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
 
				
						




	

<div class="grid-container">


<div class='grid-item'>
<span><img src='phar_pic/ipd.png' title='IPD' height='60' width='75'align='center'></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM inpatient where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href="imoinviewphar_ipd">(<?php echo $row_ipd['COUNT(pmrn)'];?>)</a></span>


</div>








<div class='grid-item'>
<span><img src='phar_pic/ae.png' title='IPD' height='60' width='75'align='center'></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM emergency where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href="">(<?php echo $row_ipd['COUNT(pmrn)'];?>)</a></span>


</div>



<div class='grid-item'>
<span><a target='_blank' href="all_dept_stock"><img src='phar_pic/stock1.png' title='Stock' height='60' width='75'align='center'></a></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM emergency where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="all_dept_stock">Departmental Stock</a></span>
<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="all_dept_stock_all">Departmental Stock(sum)</a></span>


</div>


<div class='grid-item'>
<span><a target='_blank' href="all_dept_stock"><img src='phar_pic/m_stock.png' title='Stock' height='60' width='75'align='center'></a></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM emergency where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_stock_view_all_ipd">Real Time Stock(IPD Pharmacy)</a></span>


</div>

<div class='grid-item' >


<span><img src='phar_pic/return.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="rfid/nurse/inpatient/medication_new_return_ipd.php">Return Medicine(IPD)</a></span>






</div>

<div class='grid-item' >


<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="">Old Discharge Medicine</a></span>






</div>



<div class='grid-item' >


<span><img src='phar_pic/stock.png' title='Add_Stock_2nd_Fl' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_opd_dispense_ipd">Dispense Medicine</a></span>






</div>



<div class='grid-item' >


<span><img src='phar_pic/stock.png' title='Add_Stock_2nd_Fl' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="today_phar_bill">Re-Print Bill</a></span>






</div>



<div class='grid-item' >


<span><img src='phar_pic/return.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_transfer_phar_ipd?sno=<?php echo $runningTime;?>">Request IPD Pharmacy Stock</a></span>






</div>

</div>



</div>









</form>

</body>

</html>



