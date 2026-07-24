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
//header("Refresh: 30; URL=$url1");

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


$runningTime = date('Ymdis');
//$sno=$runningTime;

?>
</div1>


<div id='cssmenu'>
<ul>
   <li><a href='tes'><span>Home</span></a></li>
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
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</div>

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1">Pharmacy</p> 


   
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
<span class=''><img src='phar_pic/medicine_png.png' title='Available Generic' height='60' width='75'align='center'></span><br>
<span style="color:black;font-size:22px;text-align:center;font-weight:bold">Available Generic</span>
<br>

<?php
$query87 = "SELECT COUNT(id) FROM medicine where status='Active'"; 
	 
$result87 = mysqli_query($con, $query87) or die(mysqli_error());

// Print out result
$row87 = mysqli_fetch_array($result87);
$p_level=$row87['per_qty'];




$query_per = "SELECT COUNT(id) FROM medicine where status='Active' and `per_qty` >=(select SUM(add_qty) from medi_stock where medicine.code=medi_stock.code and location='Pharmacy' and add_qty>0);";
	 
$result87_per = mysqli_query($con, $query_per) or die(mysqli_error());

// Print out result
$row87_per = mysqli_fetch_array($result87_per);

$edate=date("Y-m-d", strtotime("$end_date -60 days"));


$expire_medi = "SELECT COUNT(id) FROM medi_stock where '$edate'>= exdate and add_qty>'0'"; 
	 
$expire_medi1 = mysqli_query($con, $expire_medi) or die(mysqli_error());

// Print out result
$expire_row = mysqli_fetch_array($expire_medi1);


$slow_medi = "SELECT COUNT(id) FROM medicine where '$edate'>= l_sale_date || l_sale_date is NULL and status='Active'"; 
	 
$slow_medi1 = mysqli_query($con, $slow_medi) or die(mysqli_error());

// Print out result
$slow_row = mysqli_fetch_array($slow_medi1);

?>



<span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href='all_medi_phar'>(<?php echo $row87['COUNT(id)'];?>)</a></span>

</div>


<div class='grid-item2'>
<span class=''><img src='phar_pic/expried.png' title='Expired_Medi' height='60' width='75'align='center'></span>
<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href='expire_medi'>Expired Medicine</a></span>
<br>

<span style="color:black;font-size:28px;text-align:center;font-weight:bold">(<?php echo $expire_row['COUNT(id)'];?>)</span>
</div>

<div class='grid-item3'>
<span class=''><img src='phar_pic/slow.png' title='Slow_Moving_Medi' height='60' width='75'align='center'></span>
<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href='slow_medi'>Slow Moving Medicine</a></span>

<br>

<span style="color:black;font-size:28px;text-align:center;font-weight:bold">(<?php echo $slow_row['COUNT(id)'];?>)</span>
</div>


<div class='grid-item'>
<span class=''><img src='phar_pic/low.png' title='Low Stock' height='60' width='75'align='center'></span><br>
<span style="color:black;font-size:22px;text-align:center;font-weight:bold">Low Stock Items</span>
<br>



<span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href='low_medi_phar'>(<?php echo $row87_per['COUNT(id)'];?>)</a></span>
</div>

<div class='grid-item'>
<span><img src='phar_pic/ipd.png' title='IPD' height='60' width='75'align='center'></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM inpatient where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href="imoinviewphar">(<?php echo $row_ipd['COUNT(pmrn)'];?>)</a></span>


</div>

<div class='grid-item'>
<span class=''><img src='phar_pic/opd.png' title='OPD' height='60' width='75'align='center'></span>


<?php
$opd = "SELECT COUNT(distinct(pmrn)) FROM pmedi where ndate='$ndate'"; 
	 
$opd_re = mysqli_query($con, $opd) or die(mysqli_error());

// Print out result
$row_opd = mysqli_fetch_array($opd_re);


?>


<br><span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href='phar_opd'>(<?php echo $row_opd['COUNT(distinct(pmrn))'];?>)</a></span>


</div>

<div class='grid-item'>
<span class=''><img src='phar_pic/ot.png' title='OT' height='60' width='75'align='center'></span>


<?php
$ot = "SELECT COUNT(pmrn) FROM ot where date5='$ndate'"; 
	 
$ot_re = mysqli_query($con, $ot) or die(mysqli_error());

// Print out result
$row_ot = mysqli_fetch_array($ot_re);


?>


<br><span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href='otphar'>(<?php echo $row_ot['COUNT(pmrn)'];?>)</a></span>


</div>


<div class='grid-item'>
<span class=''><img src='phar_pic/pending.png' title='Pending_Request' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold">Pending Request</span>

<?php
$request = "SELECT COUNT(id) FROM medicinerequest where rstatus='Pending'"; 
	 
$request_re = mysqli_query($con, $request) or die(mysqli_error());

// Print out result
$row_request = mysqli_fetch_array($request_re);


?>


<br><span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href='pendingrequest'>(<?php echo $row_request['COUNT(id)'];?>)</a></span>


</div>




<div class='grid-item' >


<span><img src='phar_pic/sale.png' title='sale' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a href="phar_out_new3?sno=<?php echo $runningTime;?>">OPD Sale</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/add_company.png' title='Add_company' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="add_company">Add Supplier</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/stock.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="add_medi_stock">Add Stock</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/bar_scan_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_scan">Scan Prescription</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/return.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_opd_return_new">Return Medicine(OPD)</a></span>






</div>

<div class='grid-item' >


<span><img src='phar_pic/return.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_transfer_phar?sno=<?php echo $runningTime;?>">Request 2nd Fl Pharmacy Stock</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/return.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_transfer_out_test">Pending Stock Request</a></span>






</div>





<div class='grid-item'>
<span><img src='phar_pic/ae.png' title='IPD' height='60' width='75'align='center'></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM emergency where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href="emergency_phar">(<?php echo $row_ipd['COUNT(pmrn)'];?>)</a></span>


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

<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_stock_view">Real Time Stock(Pharmacy)</a></span>


</div>

<div class='grid-item'>
<span><a target='_blank' href="all_dept_stock"><img src='phar_pic/m_stock.png' title='Stock' height='60' width='75'align='center'></a></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM emergency where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_stock_view_all">Real Time Stock(All)</a></span>


</div>
<div class='grid-item' >


<span><img src='phar_pic/return.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="rfid/nurse/inpatient/medication_new_return.php">Return Medicine(IPD)</a></span>






</div>

<div class='grid-item' >


<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_scan_discharge.php">Old Discharge Medicine</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_stock_receive.php">Receive Floor Stock Returned Medicine</a></span>






</div>

</div>










</form>

</body>

</html>



