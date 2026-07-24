<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
  $uid= $_SESSION['sess_username'];
	
/*$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	*/

  $runningTime1 = date('misis').$user;

  $purchase="purchase_transfer_store?sno=$runningTime1";
  $purchase1="manual_stock_update?sno=$runningTime1";
  $product_stats="manual_stock_update?sno=$runningTime1";
  $queryc = "SELECT COUNT(uname) FROM user where '$uid' in ('322','1603','534','71','54','45','1912','310','790')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(uname)'];
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=$url1");

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
   <li><a href='homestaff'><span>Home</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</div>

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1">Purchase & Store</p> 


   
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
<span style="color:black;font-size:22px;text-align:center;font-weight:bold">Available Product</span>
<br>

<?php
$query87 = "SELECT COUNT(id) FROM storenew where estatus='Active' and etype in ('Disposable','MEDICAL DISPOSAL')"; 
	 
$result87 = mysqli_query($con, $query87) or die(mysqli_error());

// Print out result
$row87 = mysqli_fetch_array($result87);




/*$query_per = "SELECT COUNT(id) FROM storenew where estatus='Active' and etype='Disposable' and tqty<=per_qty"; 
	 
$result87_per = mysqli_query($con, $query_per) or die(mysqli_error());

// Print out result
$row87_per = mysqli_fetch_array($result87_per);

$edate=date("Y-m-d", strtotime("$end_date -15 days"));


$expire_medi = "SELECT COUNT(id) FROM medi_stock where '$edate'>= exdate and add_qty!='0'"; 
	 
$expire_medi1 = mysqli_query($con, $expire_medi) or die(mysqli_error());

// Print out result
$expire_row = mysqli_fetch_array($expire_medi1);


$slow_medi = "SELECT COUNT(id) FROM medicine where '$edate'>= l_sale_date and tqty!='0'"; 
	 
$slow_medi1 = mysqli_query($con, $slow_medi) or die(mysqli_error());

// Print out result
$slow_row = mysqli_fetch_array($slow_medi1);
*/
?>



<span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href='all_product_list_'>(<?php echo $row87['COUNT(id)'];?>)</a></span>

</div>


<div class='grid-item2'>
<span class=''><img src='phar_pic/expried.png' title='Expired_Medi' height='60' width='75'align='center'></span>
<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href='expire_medi_'>Expired Medicine</a></span>
<br>

<span style="color:black;font-size:28px;text-align:center;font-weight:bold">(<?php echo $expire_row['COUNT(id)'];?>)</span>
</div>

<div class='grid-item3'>
<span class=''><img src='phar_pic/slow.png' title='Slow_Moving_Medi' height='60' width='75'align='center'></span>
<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href='slow_medi_'>Slow Moving Medicine</a></span>

<br>

<span style="color:black;font-size:28px;text-align:center;font-weight:bold">(<?php echo $slow_row['COUNT(id)'];?>)</span>
</div>


<div class='grid-item'>
<span class=''><img src='phar_pic/low.png' title='Low Stock' height='60' width='75'align='center'></span><br>
<span style="color:black;font-size:22px;text-align:center;font-weight:bold">Low Stock Items</span>
<br>



<span style="color:black;font-size:28px;text-align:center;font-weight:bold"><a target='_blank' href='low_medi_'>(<?php echo $row87_per['COUNT(id)'];?>)</a></span>
</div>






<div class='grid-item' >


<span><img src='phar_pic/add_company.png' title='Add_company' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="add_company_">Add Supplier</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/stock.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="add_purchase_stock_new">Add Stock</a></span>






</div>







<div class='grid-item' >


<span><img src='phar_pic/return.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="purchase_transfer_out_test">Pending Stock Request</a></span>






</div>







<div class='grid-item'>
<span><a target='_blank' href="all_dept_stock"><img src='phar_pic/stock1.png' title='Stock' height='60' width='75'align='center'></a></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM emergency where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="all_dept_stock_purchase">Departmental Stock</a></span>
<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="all_dept_stock_all_purchase">Departmental Stock(sum)</a></span>


</div>


<div class='grid-item'>
<span><a target='_blank' href="all_dept_stock"><img src='phar_pic/m_stock.png' title='Stock' height='60' width='75'align='center'></a></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM emergency where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold">

<a target='_blank' href=<?php if($uid=='45'){echo "po_prepare_new_phar";} else if ($uid=='1603' || $uid=='534'){echo "po_prepare_new";}?>>Open PO</a></span>


</div>

<div class='grid-item'>
<span><a target='_blank' href="all_dept_stock"><img src='phar_pic/m_stock.png' title='Stock' height='60' width='75'align='center'></a></span>

<?php
$ipd = "SELECT COUNT(pmrn) FROM emergency where discharge=''"; 
	 
$ipd_re = mysqli_query($con, $ipd) or die(mysqli_error());

// Print out result
$row_ipd = mysqli_fetch_array($ipd_re);


?>

<br><span style="color:black;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="phar_stock_view_all_">Real Time Stock(All)</a></span>


</div>



<div class='grid-item' >


<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href="purchase_stock_receive_.php">Receive Floor Stock Returned Medicine</a></span>






</div>



<div class='grid-item' >


<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45' || $uid=='310' || $uid=='790'){echo "pharmacy_grn_receive";} else if ($uid=='54' || $uid=='71' || $uid=='322' || $uid=='1603' || $uid=='1912'){echo "grn_receive";}?>>GRN</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "open_po_phar";} else if ($uid=='1603' || $uid=='534'){echo "open_po";}?>>Reopen PO</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "";} else if ($uid=='1603' || $uid=='534'){echo "prf_approval_store";}?>>PRF Request</a></span>






</div>


<div class='grid-item' >


<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "";} else if ($uid=='1603'|| $uid=='534'){echo "purchase_transfer_out_test_26112025";}?>>Approved PRF Request</a></span>






</div>

<div class='grid-item' >

<?php 


?>
<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "";} else if ($uid=='1603' || $uid=='534'){echo $purchase;}?>>Generate PRF Request</a></span>






</div>




<div class='grid-item' >
<span><img src='phar_pic/dis_medi_pic.png' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "";} else if ($uid=='71' || $uid=='54' || $uid=='1912'){echo $purchase1;}?>>Manual Stock Update</a></span>
</div>



<div class='grid-item' >
<span><img src='' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "productwise_po_report";} else if ($uid=='1603' || $uid=='54' || $uid=='1912'){echo 'productwise_po_report';}?>>Productwise PO Report</a></span>
</div>



<div class='grid-item' >
<span><img src='' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "supplierwise_po_report";} else if ($uid=='1603' || $uid=='54' || $uid=='1912'){echo 'supplierwise_po_report';}?>>Supplierwise PO Report</a></span>
</div>


<div class='grid-item' >
<span><img src='' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "grnwise_supplier_report";} else if ($uid=='1603' || $uid=='54' || $uid=='1912'){echo 'grnwise_supplier_report';}?>>GRN-Wise PO Report</a></span>
</div>


<div class='grid-item' >
<span><img src='' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "po_type_wise_report1";} else if ($uid=='1603' || $uid=='54' || $uid=='1912'){echo 'po_type_wise_report1';}?>>PO Type Wise Report</a></span>
</div>


<div class='grid-item' >
<span><img src='' title='Add_Stock' height='60' width='75'align='center'></span>
<br><span style="color:red;font-size:22px;text-align:center;font-weight:bold"><a target='_blank' href=<?php if($uid=='45'){echo "company_wise_po_report";} else if ($uid=='1603' || $uid=='54' || $uid=='1912'){echo 'company_wise_po_report_purchase';}?>>All Supplierwise PO Report</a></span>
</div>

</div>










</form>

</body>

</html>



