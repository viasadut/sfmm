<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(amount) FROM pms_payment where user= '$bt'and date BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(adoc) FROM inpatient where anew BETWEEN '$start' and '$end';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
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

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Start The Blood?");
}

</script>

<link href="prescription/prescription/css/select2.min.css" rel="stylesheet" />
<script src="prescription/prescription/css/select2.min.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Cashier Wise Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="date" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="date" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Cashier ID</strong></th>
      <th width="10%"><strong>Cashier Name</strong></th>
	  <th width="10%"><strong>Cash Collection</strong></th>
      <th width="10%"><strong>Card Collection</strong></th>
	  <th width="10%"><strong>Cheque Collection</strong></th>
      <th width="10%"><strong>Bkash Collection</strong></th>
      <th width="10%"><strong>Discount</strong></th>
      <th width="10%"><strong>Total Collection</strong></th>
      <th width="10%"><strong>Refund</strong></th>
      
      <th width="10%"><strong>Net Collection</strong></th>
      <th width="10%"><strong>Total Outstanding</strong></th>

      
	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


$query43_p1 = "SELECT SUM(amount_receive) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Cash';"; 
	 
$result43_p1 = mysqli_query($con, $query43_p1) or die(mysqli_error());
$row43_p1 = mysqli_fetch_assoc($result43_p1);


$query43_p1_card = "SELECT SUM(amount_receive) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Card';"; 
	 
$result43_p1_card = mysqli_query($con, $query43_p1_card) or die(mysqli_error());
$row43_p1_card = mysqli_fetch_assoc($result43_p1_card);



$query43_p1_bkash = "SELECT SUM(amount_receive) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='bkash';"; 
	 
$result43_p1_bkash= mysqli_query($con, $query43_p1_bkash) or die(mysqli_error());
$row43_p1_bkash = mysqli_fetch_assoc($result43_p1_bkash);



$query43_p1_dis = "SELECT SUM(dis_amount) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi');"; 
	 
$result43_p1_dis = mysqli_query($con, $query43_p1_dis) or die(mysqli_error());
$row43_p1_dis = mysqli_fetch_assoc($result43_p1_dis);



$query43_o3 = "SELECT SUM(amount) FROM pms_payment where date between '$start' and '$end' and refund NOT IN ('1','2');"; 
	 
$result43_o3 = mysqli_query($con, $query43_o3) or die(mysqli_error());
$temp_opd_collection_all3 = mysqli_fetch_assoc($result43_o3);


$query43_dis4 = "SELECT SUM(dis_amount) FROM pms_payment where date between '$start' and '$end';"; 
	 
$result43_dis4 = mysqli_query($con, $query43_dis4) or die(mysqli_error());
$opd_collection_dis4 = mysqli_fetch_assoc($result43_dis4);

$query43_refund5 = "SELECT SUM(amount) FROM pms_payment where date between '$start' and '$end' and refund IN ('1','2');"; 
	 
$result43_refund5 = mysqli_query($con, $query43_refund5) or die(mysqli_error());
$opd_collection_refund5 = mysqli_fetch_assoc($result43_refund5);


//$query43_refund_phar = "SELECT SUM(r_amount) FROM refund_bill where date between '$start' and '$end' and dname='OPD_Medi';"; 
$query43_refund_phar = "SELECT SUM(r_amount) FROM refund_bill where date between '$start' and '$end' and location!='IPD';"; 
	 
$result43_refund_phar = mysqli_query($con, $query43_refund_phar) or die(mysqli_error());
$opd_collection_refund_phar = mysqli_fetch_assoc($result43_refund_phar);

$income=$temp_opd_collection_all3['SUM(amount)']+$row43_p32['SUM(amount)']+$row43_p1['SUM(amount_receive)']+$row43_p1_card['SUM(amount_receive)']+$row43_p1_bkash['SUM(amount_receive)']-$opd_collection_dis4['SUM(dis_amount)']-$opd_collection_refund5['SUM(amount)']-$row43_p1_dis['SUM(dis_amount)']-$opd_collection_refund_phar['SUM(r_amount)'];



$outstanding_query_t = "SELECT SUM(amount) FROM pms_bill where amount_receive='0' and date between '$start' and '$end' AND amount!='0' AND dname!='IPD ADVANCE' AND amount>dis_amount"; 
	 
$outstanding_result_t = mysqli_query($con, $outstanding_query_t) or die(mysqli_error());
$outstanding_data_t = mysqli_fetch_assoc($outstanding_result_t);
//$outstanding_amount=$outstanding_data_t['SUM(amount)'];





$querydr = "select SUM(amount) FROM pms_bill WHERE date between '$start' and '$end' and amount>(amount_receive+dis_amount) and dname !='IPD ADVANCE' and amount!='0'"; 
  $resultdr = mysqli_query($con,$querydr) or die ( mysqli_error());
  $data = mysqli_fetch_assoc($resultdr);	

$bill=$data['SUM(amount)'];


 $querycr = "select SUM(amount_receive) FROM pms_bill WHERE date between '$start' and '$end' and amount>(amount_receive+dis_amount) and dname !='IPD ADVANCE' and amount!='0'"; 
 $resultcr = mysqli_query($con,$querycr) or die ( mysqli_error());
 $data1 = mysqli_fetch_assoc($resultcr);	

$receive=$data1['SUM(amount_receive)'];

$querycr1 = "select SUM(dis_amount) FROM pms_bill WHERE date between '$start' and '$end' and amount>(amount_receive+dis_amount) and dname !='IPD ADVANCE' and amount!='0'"; 
 $resultcr1 = mysqli_query($con,$querycr1) or die ( mysqli_error());
 $data2 = mysqli_fetch_assoc($resultcr1);	

$discount=$data2['SUM(dis_amount)'];

$outstanding_amount=$bill-$receive-$discount;


if (($_POST['bt'])=="all"){
echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row44['COUNT(adoc)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;

$sel_query="Select * from inpatient where date BETWEEN '$start' and '$end' group by user";}
 else{
	 echo "<font color=blue font size=5> Total Collection  -";
echo  '<span style="color:red; font-weight:bold">';
echo $income;
echo
' BDT </span>';
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from pms_bill where date BETWEEN '$start' and '$end' and  user='$user'";
 } 
$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>


<?php
$bill_user=$row['user'];
$bill_date=$row['date'];
$query43 = "SELECT SUM(amount_receive) FROM pms_bill where user= '$bill_user'and date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Cash';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$phar_collection = mysqli_fetch_assoc($result43);


$query43_card = "SELECT SUM(amount_receive) FROM pms_bill where user= '$bill_user'and date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Card';"; 
	 
$result43_card = mysqli_query($con, $query43_card) or die(mysqli_error());
$phar_collection_card = mysqli_fetch_assoc($result43_card);



$query43_bkash = "SELECT SUM(amount_receive) FROM pms_bill where user= '$bill_user'and date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='bkash';"; 
	 
$result43_bkash = mysqli_query($con, $query43_bkash) or die(mysqli_error());
$phar_collection_bkash = mysqli_fetch_assoc($result43_bkash);


$query43_dis = "SELECT SUM(dis_amount) FROM pms_bill where user= '$bill_user'and date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Cash';"; 
	 
$result43_dis = mysqli_query($con, $query43_dis) or die(mysqli_error());
$phar_collection_dis = mysqli_fetch_assoc($result43_dis);


$query43_dis_bkash = "SELECT SUM(dis_amount) FROM pms_bill where user= '$bill_user'and date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode in('Bkash','bKash');"; 
	 
$result43_dis_bkash = mysqli_query($con, $query43_dis_bkash) or die(mysqli_error());
$phar_collection_dis_bkash = mysqli_fetch_assoc($result43_dis_bkash);


$query43_dis_card = "SELECT SUM(dis_amount) FROM pms_bill where user= '$bill_user'and date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode ='Card';"; 
	 
$result43_dis_card = mysqli_query($con, $query43_dis_card) or die(mysqli_error());
$phar_collection_dis_card = mysqli_fetch_assoc($result43_dis_card);




$query43_o = "SELECT SUM(amount) FROM pms_payment where user='$bill_user'and date between '$start' and '$end' and refund NOT IN ('1','2');"; 
	 
$result43_o = mysqli_query($con, $query43_o) or die(mysqli_error());
$temp_opd_collection_all = mysqli_fetch_assoc($result43_o);

$query43_dis = "SELECT SUM(dis_amount) FROM pms_payment where user= '$bill_user'and date between '$start' and '$end';"; 
	 
$result43_dis = mysqli_query($con, $query43_dis) or die(mysqli_error());
$opd_collection_dis = mysqli_fetch_assoc($result43_dis);

$query43_refund = "SELECT SUM(amount) FROM pms_payment where user= '$bill_user'and date between '$start' and '$end' and refund IN ('1','2');"; 
	 
$result43_refund = mysqli_query($con, $query43_refund) or die(mysqli_error());
$opd_collection_refund = mysqli_fetch_assoc($result43_refund);

//$query43_refund_phar_indu = "SELECT SUM(r_amount) FROM refund_bill where date='$bill_date' and dname='OPD_Medi' and refund_by='$bill_user';"; 

$query43_refund_phar_indu = "SELECT SUM(r_amount) FROM refund_bill where date between '$start' and '$end' and refund_by='$bill_user' and location!='IPD';"; 
	 
$result43_refund_phar_indu = mysqli_query($con, $query43_refund_phar_indu) or die(mysqli_error());
$opd_collection_refund_phar_indu = mysqli_fetch_assoc($result43_refund_phar_indu);




$outstanding_query = "SELECT SUM(amount) FROM pms_bill where amount_receive='0' and user= '$bill_user'and date between '$start' and '$end' AND amount!='0' AND dname!='IPD ADVANCE' AND amount>dis_amount"; 
	 
$outstanding_result = mysqli_query($con, $outstanding_query) or die(mysqli_error());
$outstanding_data = mysqli_fetch_assoc($outstanding_result);




$querydr5 = "select SUM(amount) FROM pms_bill WHERE date between '$start' and '$end' and amount>(amount_receive+dis_amount) and dname !='IPD ADVANCE' and amount!='0' and user= '$bill_user'"; 
  $resultdr5 = mysqli_query($con,$querydr5) or die ( mysqli_error());
  $data5 = mysqli_fetch_assoc($resultdr5);	

$bill5=$data5['SUM(amount)'];


 $querycr6 = "select SUM(amount_receive) FROM pms_bill WHERE date between '$start' and '$end' and amount>(amount_receive+dis_amount) and dname !='IPD ADVANCE' and amount!='0' and user= '$bill_user'"; 
 $resultcr6 = mysqli_query($con,$querycr6) or die ( mysqli_error());
 $data16 = mysqli_fetch_assoc($resultcr6);	

$receive6=$data16['SUM(amount_receive)'];

$querycr17 = "select SUM(dis_amount) FROM pms_bill WHERE date between '$start' and '$end' and amount>(amount_receive+dis_amount) and dname !='IPD ADVANCE' and amount!='0' and user= '$bill_user'"; 
 $resultcr17 = mysqli_query($con,$querycr17) or die ( mysqli_error());
 $data27 = mysqli_fetch_assoc($resultcr17);	

$discount7=$data27['SUM(dis_amount)'];

$outstanding8=$bill5-$receive6-$discount7;




/*$query43_ipd = "SELECT SUM(amount) FROM pms_bill where user= '$bill_user'and date='$bill_date' and dname='IPD ADVANCE';"; 
	 
$result43_ipd = mysqli_query($con, $query43_ipd) or die(mysqli_error());
$row43_ipd = mysqli_fetch_assoc($result43_ipd);
*/




$user_name_q = "SELECT * FROM user where uname= '$bill_user';"; 
	 
$user_name_r = mysqli_query($con, $user_name_q) or die(mysqli_error());
$user_name_d = mysqli_fetch_assoc($user_name_r);


$cash_query = "SELECT SUM(amount) FROM pms_payment where user='$bill_user'and date between '$start' and '$end' and refund NOT IN ('1','2') and p_mode='Cash';"; 
	 
$cash_result = mysqli_query($con, $cash_query) or die(mysqli_error());
$cash_data = mysqli_fetch_assoc($cash_result);
$cash=$cash_data['SUM(amount)']+$phar_collection['SUM(amount_receive)']-$phar_collection_dis['SUM(dis_amount)'];

$card_query = "SELECT SUM(amount) FROM pms_payment where user='$bill_user'and date between '$start' and '$end' and refund NOT IN ('1','2') and p_mode='Card';"; 
$card_result = mysqli_query($con, $card_query) or die(mysqli_error());
$card_data = mysqli_fetch_assoc($card_result);
$card=$card_data['SUM(amount)']+$phar_collection_card['SUM(amount_receive)']-$phar_collection_dis_card['SUM(dis_amount)'];;


$cheque_query = "SELECT SUM(amount) FROM pms_payment where user='$bill_user'and date between '$start' and '$end' and refund NOT IN ('1','2') and p_mode='Cheque';"; 
$cheque_result = mysqli_query($con, $cheque_query) or die(mysqli_error());
$cheque_data = mysqli_fetch_assoc($cheque_result);
$cheque=$cheque_data['SUM(amount)'];

$bkash_query = "SELECT SUM(amount) FROM pms_payment where user='$bill_user'and date between '$start' and '$end' and refund NOT IN ('1','2') and p_mode in ('bKash','Bkash');"; 
$bkash_result = mysqli_query($con, $bkash_query) or die(mysqli_error());
$bkash_data = mysqli_fetch_assoc($bkash_result);
$bkash=$bkash_data['SUM(amount)']+$phar_collection_bkash['SUM(receive_amount)']-$phar_collection_dis_bkash['SUM(dis_amount)'];



$opd_collection=$phar_collection['SUM(amount_receive)']+$phar_collection_card['SUM(amount_receive)']+$phar_collection_bkash['SUM(amount_receive)']+$temp_opd_collection_all['SUM(amount)']-$opd_collection_dis['SUM(dis_amount)']-$phar_collection_dis['SUM(dis_amount)'];
$net_collection=$phar_collection['SUM(amount_receive)']+$phar_collection_card['SUM(amount_receive)']+$phar_collection_bkash['SUM(amount_receive)']+$temp_opd_collection_all['SUM(amount)']-$opd_collection_dis['SUM(dis_amount)']-$phar_collection_dis['SUM(dis_amount)']-$phar_collection_dis_card['SUM(dis_amount)']-$phar_collection_dis_bkash['SUM(dis_amount)']-$opd_collection_refund['SUM(amount)']-$opd_collection_refund_phar_indu['SUM(r_amount)'];
      ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["user"]; ?></td>
      <td align="center"><?php echo $user_name_d['fullname']; ?></td>

     
      <td align="center">
      <a target='_blank' href="cashier_details_cash?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $cash;
   
      ?></a> </td>
	       

           <td align="center">
      <a target='_blank' href="cashier_details_card?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $card; 
   
      ?></a> </td>

<td align="center">
      <a target='_blank' href="cashier_details_cheque?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $cheque; 
   
      ?></a> </td>


<td align="center">
      <a target='_blank' href="cashier_details_bkash?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $bkash; 
   
      ?></a> </td>

      
<td align="center">
      <a target='_blank' href="cashier_details_discount?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $opd_collection_dis['SUM(dis_amount)']
   
      ?></a> </td>

<td align="center">
      <a target='_blank' href="cashier_details_total?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $opd_collection;
   
      ?></a> </td>

<td align="center">
      <a target='_blank' href="cashier_details_refund?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $opd_collection_refund['SUM(amount)']+$opd_collection_refund_phar_indu['SUM(r_amount)'];
   
      ?></a> </td>




<td align="center">
      <a target='_blank' href="cashier_details_net?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $net_collection 
   
      ?></a> </td>

<td align="center">
      <a target='_blank' href="cashier_outstanding?user=<?php echo $row['user'];?>&date=<?php echo $start; ?>&date1=<?php echo $end; ?>">
      <?php echo $outstanding8;
   
      ?></a> </td>
           
      </tr>


	  
    <?php $count++; } }?>


    <?php
if(isset($_POST['bsearch'])){

$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));


$query43_t = "SELECT SUM(amount_receive) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Cash';"; 
$result43_t = mysqli_query($con, $query43_t) or die(mysqli_error());
$phar_collection_t = mysqli_fetch_assoc($result43_t);


$query43_t_card = "SELECT SUM(amount_receive) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Card';"; 
$result43_t_card = mysqli_query($con, $query43_t_card) or die(mysqli_error());
$phar_collection_t_card = mysqli_fetch_assoc($result43_t_card);



$query43_t_bkash = "SELECT SUM(amount_receive) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='bkash';"; 
$result43_t_bkash = mysqli_query($con, $query43_t_bkash) or die(mysqli_error());
$phar_collection_t_bkash = mysqli_fetch_assoc($result43_t_bkash);




/*$query43_dis_t = "SELECT SUM(dis_amount) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi');"; 
 
$result43_dis_t = mysqli_query($con, $query43_dis_t) or die(mysqli_error());
$phar_collection_dis_t = mysqli_fetch_assoc($result43_dis_t);
*/

$query43_dis_t = "SELECT SUM(dis_amount) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Cash';"; 
 
$result43_dis_t = mysqli_query($con, $query43_dis_t) or die(mysqli_error());
$phar_collection_dis_t = mysqli_fetch_assoc($result43_dis_t);



$query43_dis_t_card = "SELECT SUM(dis_amount) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='Card';"; 
 
$result43_dis_t_card = mysqli_query($con, $query43_dis_t_card) or die(mysqli_error());
$phar_collection_dis_t_card = mysqli_fetch_assoc($result43_dis_t_card);


$query43_dis_t_bkash = "SELECT SUM(dis_amount) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi') and p_mode='bkash';"; 
 
$result43_dis_t_bkash = mysqli_query($con, $query43_dis_t_bkash) or die(mysqli_error());
$phar_collection_dis_t_bkash = mysqli_fetch_assoc($result43_dis_t_bkash);



$cash_query_t = "SELECT SUM(amount) FROM pms_payment where date between '$start' and '$end' and refund NOT IN ('1','2') and p_mode='Cash';"; 
$cash_result_t = mysqli_query($con, $cash_query_t) or die(mysqli_error());
$cash_data_t = mysqli_fetch_assoc($cash_result_t);

//$cash_t=$cash_data_t['SUM(amount)']+$phar_collection_t['SUM(amount_receive)']-$phar_collection_dis_t['SUM(dis_amount)'];
$cash_t=$cash_data_t['SUM(amount)']+$phar_collection_t['SUM(amount_receive)']-$phar_collection_dis_t['SUM(dis_amount)'];


$card_query_t = "SELECT SUM(amount) FROM pms_payment where date between '$start' and '$end' and refund NOT IN ('1','2') and p_mode='Card';"; 
$card_result_t = mysqli_query($con, $card_query_t) or die(mysqli_error());
$card_data_t = mysqli_fetch_assoc($card_result_t);
$card_t=$card_data_t['SUM(amount)']+$phar_collection_t_card['SUM(amount_receive)']-$phar_collection_dis_t_card['SUM(dis_amount)'];


$cheque_query_t = "SELECT SUM(amount) FROM pms_payment where date between '$start' and '$end' and refund NOT IN ('1','2') and p_mode='Cheque';"; 
$cheque_result_t = mysqli_query($con, $cheque_query_t) or die(mysqli_error());
$cheque_data_t = mysqli_fetch_assoc($cheque_result_t);
$cheque_t=$cheque_data_t['SUM(amount)'];

$bkash_query_t = "SELECT SUM(amount) FROM pms_payment where date between '$start' and '$end' and refund NOT IN ('1','2') and p_mode in ('bKash','Bkash');"; 
$bkash_result_t = mysqli_query($con, $bkash_query_t) or die(mysqli_error());
$bkash_data_t = mysqli_fetch_assoc($bkash_result_t);
$bkash_t=$bkash_data_t['SUM(amount)']+$phar_collection_t_bkash['SUM(amount_receive)']-$phar_collection_dis_t_bkash['SUM(dis_amount)'];;


$query43_refund_t = "SELECT SUM(amount) FROM pms_payment where date between '$start' and '$end' and refund IN ('1','2');"; 
	 
$result43_refund_t = mysqli_query($con, $query43_refund_t) or die(mysqli_error());
$opd_collection_refund_t = mysqli_fetch_assoc($result43_refund_t);


$query43_dis_t = "SELECT SUM(dis_amount) FROM pms_payment where date between '$start' and '$end';"; 
	 
$result43_dis_t = mysqli_query($con, $query43_dis_t) or die(mysqli_error());
$total_di = mysqli_fetch_assoc($result43_dis_t);
$total_discount=$total_di['SUM(dis_amount)'];

$query43_dis_t_cash = "SELECT SUM(dis_amount) FROM pms_payment where date between '$start' and '$end' and p_mode='Cash';"; 
	 
$result43_dis_t_cash = mysqli_query($con, $query43_dis_t_cash) or die(mysqli_error());
$total_di_cash = mysqli_fetch_assoc($result43_dis_t_cash);
$total_discount_cash=$total_di_cash['SUM(dis_amount)'];


$query43_refund_t_cash = "SELECT SUM(amount) FROM pms_payment where date between '$start' and '$end' and p_mode='Cash' and refund IN ('1','2');"; 
$result43_refund_t_cash = mysqli_query($con, $query43_refund_t_cash) or die(mysqli_error());
$total_re_cash = mysqli_fetch_assoc($result43_refund_t_cash);


//$query43_refund_phar_p = "SELECT SUM(r_amount) FROM refund_bill where date between '$start' and '$end' and dname='OPD_Medi';"; 
$query43_refund_phar_p = "SELECT SUM(r_amount) FROM refund_bill where date between '$start' and '$end' and location!='IPD';"; 
	 
$result43_refund_phar_p = mysqli_query($con, $query43_refund_phar_p) or die(mysqli_error());
$opd_collection_refund_phar_p = mysqli_fetch_assoc($result43_refund_phar_p);



$total_refund=$opd_collection_refund_t['SUM(amount)'] + $opd_collection_refund_phar_p['SUM(r_amount)'];

$total_refund_cash=$total_re_cash['SUM(amount)'] + $opd_collection_refund_phar_p['SUM(r_amount)'];

$final_cash_collection=$cash_t-$total_discount_cash-$total_refund_cash;

$total_opd_collection=$cash_t+$bkash_t+$cheque_t+$card_t;
$total_net=$total_opd_collection-$total_refund-$total_discount;

echo'
<tr>
<td>

</td>
<td>

</td>
<td>
Total
</td>
<td>
Total Cash Collection: '.$cash_t.'
<br>
Total Cash Discount: '.$total_discount_cash.'
<br>
Total Cash Refund: '.$total_refund_cash.'
<br>
Net Cash Collection: <b>'.$final_cash_collection.'</b>

</td>
<td>
'.$card_t.'
</td>
<td>
'.$cheque_t.'
</td>
<td>
'.$bkash_t.'
</td>

<td>
'.$total_discount.'
</td>
<td>
'.$total_opd_collection.'
</td>

<td>
'.$total_refund.'
</td>


<td>
'.$total_net.'
</td>

<td>
'.$outstanding_amount.'
</td>
</tr>';

}?>
   
    


      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>

