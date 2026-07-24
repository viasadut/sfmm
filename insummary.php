<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?><?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 15; URL=$url1");

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];


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

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
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
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
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

<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?>'s IPD DashBoard </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> <td align="right" colspan="20"><a href="imoinviewtest"><strong>SEARCH</strong></a></td></tr>
<tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr>
    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Type</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Phone No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Summary</strong>
	  <th width="14%"><strong>Card</strong>
     <th width="14%"><strong>Hospital Charge</strong>
	  <th width="14%"><strong>Sticker</strong>
     <th width="14%"><strong>Detail Bill</strong>
     
    <th width="14%"><strong>Total</strong>
    <th width="14%"><strong>Payment</strong>
    
    <th width="14%"><strong>Due</strong>

	  
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where discharge= '' order by room asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
$tt1=$row['pmrn'];


/*$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];*/
?>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><a href="chg_type?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&p_type=<?php echo $row["type"]; ?>"><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["adoc"]; ?></td>
      <td align="center"><?php echo $row["aadate"]; ?>  </td>

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pphone"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="ipall_new_1_new_00_new?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">VIEW Summary</a></td>
	  <td align="center"><a href="rfid_lost_bill_new2?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Card</a></td>
     <td align="center"><a href="otchargenurse1nurse?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Add Hospital Charge</a></td>









	  	 	  <?php
/*$tt1=$row['pmrn'];
$date455=$row['anew'];


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($row['anew']));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];*/
?>










	
	    
	  <td align="center"><a target='_blank' href="ipd_sticker?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Print Sticker</a></td>	  
	  <td align="center"><a target='_blank' href="ipd_details_charge?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Detail Bill</a></td>	  

	  


     <?php
      $eid=$row['eid'];
      $emer_eid=$row['emerid'];
      $pmrn=$row['pmrn'];
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198j_bed = "SELECT SUM(charge) FROM newbed_new where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(charge)'];
$test1c_bed4=	$row198j_bed['SUM(charge)']+$fday8;

$total_bed_dis=	($test1c_bed4)*$data['room_dis']/100;


	$query198j_stay = "SELECT SUM(tdays),b_charge FROM newbed where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_stay = mysqli_query($dbhandle,$query198j_stay) or die(mysql_error());

// Print out result
$row198j_stay = mysqli_fetch_array($result198j_stay);

$total_day=	$row198j_stay['SUM(tdays)']/24;
$bed_charge_new=	$row198j_stay['b_charge'];



$query198ad = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and status1='implemented' and reuse=''"; 
	 
$result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());

// Print out result
$row198ad = mysqli_fetch_array($result198ad);
$test1am2=	$row198ad['SUM(uprice)'];



$query198ad3 = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and status1='implemented' and reuse='Reuse' and discard='New'"; 
	 
$result198ad3 = mysqli_query($dbhandle, $query198ad3) or die(mysql_error());

// Print out result
$row198ad3 = mysqli_fetch_array($result198ad3);
$test1am3=	$row198ad3['SUM(uprice)'];


$test1am=$test1am3+$test1am2;


$query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in('lab','Lab','LAB')"; 
	 
$result198af = mysqli_query($dbhandle,$query198af) or die(mysql_error());

// Print out result
$row198af = mysqli_fetch_array($result198af);
$test1al=	$row198af['SUM(price)'];


$query198af3 = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN','DONE') and type in('rad','Rad','RAD')"; 
	 
$result198af3 = mysqli_query($dbhandle,$query198af3) or die(mysql_error());

// Print out result
$row198af3 = mysqli_fetch_array($result198af3);
$test1al_rad=	$row198af3['SUM(price)'];


$query198ah = "SELECT SUM(price), SUM(doc_price)  FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN') and type in ('spd','spd1','ANJAN OPD ( ENT)','SPD')"; 
	 
$result198ah = mysqli_query($dbhandle,$query198ah) or die(mysql_error());

// Print out result
$row198ah = mysqli_fetch_array($result198ah);
$test1as=	$row198ah['SUM(price)']+$row198ah['SUM(doc_price)'];



$query198 = "SELECT SUM(price) FROM inhoscharge where pmrn= '$pmrn' and eid='$eid'"; 
	 
  $result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());
  $row198 = mysqli_fetch_array($result198);
  
  
  $query198_care = "SELECT SUM(price) FROM careshope1 where pmrn= '$pmrn' and eid='$eid'"; 
     
  $result198_care = mysqli_query($dbhandle,$query198_care) or die(mysql_error());
  
  $row198_care = mysqli_fetch_array($result198_care);
  $care_price=$row198_care['SUM(price)'];
  // Print out result
  
  $test1=	$row198['SUM(price)']+$care_price;


  $query198j = "SELECT SUM(charge) FROM icnote where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198j = mysqli_query($dbhandle,$query198j) or die(mysql_error());

// Print out result
$row198j = mysqli_fetch_array($result198j);
$test1c=	$row198j['SUM(charge)'];


$opd_procedure = "SELECT SUM(price) FROM prohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res = mysqli_query($dbhandle,$opd_procedure) or die(mysql_error());

// Print out result
$opd_procedure_data = mysqli_fetch_array($opd_procedure_res);
$opd_procedure_sum=	$opd_procedure_data['SUM(price)'];

$opd_procedure_medi = "SELECT SUM(price) FROM promediused where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res_medi = mysqli_query($dbhandle,$opd_procedure_medi) or die(mysql_error());

// Print out result
$opd_procedure_data_medi = mysqli_fetch_array($opd_procedure_res_medi);
$opd_procedure_sum_medi=	$opd_procedure_data_medi['SUM(price)'];


$opd_procedure_doc = "SELECT SUM(procharge) FROM procedure1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res_doc = mysqli_query($dbhandle,$opd_procedure_doc) or die(mysql_error());

// Print out result
$opd_procedure_data_doc = mysqli_fetch_array($opd_procedure_res_doc);
echo $opd_procedure_sum_doc=	$opd_procedure_data_doc['SUM(procharge)'];

$opd_pro_summary=$opd_procedure_sum+$opd_procedure_sum_medi;



$opd_cath = "SELECT SUM(qty) FROM cathhoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res = mysqli_query($dbhandle,$opd_cath) or die(mysql_error());

// Print out result
$opd_cath_data = mysqli_fetch_array($opd_cath_res);
$opd_cath_sum=	$opd_cath_data['SUM(qty)'];

$opd_cath_medi = "SELECT SUM(price) FROM cathmediused where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res_medi = mysqli_query($dbhandle,$opd_cath_medi) or die(mysql_error());

// Print out result
$opd_cath_data_medi = mysqli_fetch_array($opd_cath_res_medi);
$opd_cath_sum_medi=	$opd_cath_data_medi['SUM(price)'];


$opd_cath_doc = "SELECT SUM(charge) FROM cath_charge where pmrn= '$pmrn' and ieid='$eid' and c_status=''"; 
	 
$opd_cath_res_doc = mysqli_query($dbhandle,$opd_cath_doc) or die(mysql_error());

// Print out result
$opd_cath_data_doc = mysqli_fetch_array($opd_cath_res_doc);
$opd_cath_sum_doc=	$opd_cath_data_doc['SUM(charge)'];

$opd_cath_summary=$opd_cath_sum+$opd_cath_sum_doc+$opd_cath_sum_medi;


$opd_msuite = "SELECT SUM(price) FROM prohoscharge_ms where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res = mysqli_query($dbhandle,$opd_msuite) or die(mysql_error());

// Print out result
$opd_msuite_data = mysqli_fetch_array($opd_msuite_res);
$opd_msuite_sum=	$opd_msuite_data['SUM(price)'];

$opd_msuite_medi = "SELECT SUM(price) FROM promediused_ms where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_medi = mysqli_query($dbhandle,$opd_msuite_medi) or die(mysql_error());

// Print out result
$opd_msuite_data_medi = mysqli_fetch_array($opd_msuite_res_medi);
$opd_msuite_sum_medi=	$opd_msuite_data_medi['SUM(price)'];


$opd_msuite_doc = "SELECT SUM(procharge) FROM m_suite where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_doc = mysqli_query($dbhandle,$opd_msuite_doc) or die(mysql_error());

// Print out result
$opd_msuite_data_doc = mysqli_fetch_array($opd_msuite_res_doc);
$opd_msuite_sum_doc=	$opd_msuite_data_doc['SUM(procharge)'];

$opd_msuite_summary=$opd_msuite_sum_doc+$opd_msuite_sum+$opd_msuite_sum_medi;


$endo_doc = "SELECT SUM(room) FROM ivisitendo where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_doc_res = mysqli_query($dbhandle,$endo_doc) or die(mysql_error());

// Print out result
$endo_doc_data = mysqli_fetch_array($endo_doc_res);
$endo_doc_sum=	$endo_doc_data['SUM(room)'];

$endo_hos = "SELECT SUM(price) FROM endohoscharge1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_hos_q = mysqli_query($dbhandle,$endo_hos) or die(mysql_error());

// Print out result
$endo_hos_data = mysqli_fetch_array($endo_hos_q);
$endo_hos_sum=	$endo_hos_data['SUM(price)'];


$endo_medi = "SELECT SUM(price) FROM endohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_medi_q = mysqli_query($dbhandle,$endo_medi) or die(mysql_error());

// Print out result
$endo_medi_data = mysqli_fetch_array($endo_medi_q);
$endo_medi_sum=	$endo_medi_data['SUM(price)'];

$endo_summary=$endo_doc_sum+$endo_hos_sum+$endo_medi_sum;



$query198_dis = "SELECT SUM(tprice) FROM phar_sale where pmrn= '$pmrn' and eid='$eid' and location='Discharge'"; 
	 
$result198_dis = mysqli_query($dbhandle,$query198_dis) or die(mysql_error());

// Print out result
$row198_dis = mysqli_fetch_array($result198_dis);
$test1_dis=	$row198_dis['SUM(tprice)'];


$emer_medi = "SELECT SUM(uprice) FROM estat where pmrn= '$pmrn' and eid='$emer_eid' and status='Rupdated'"; 

	 
$emer_medi_1 = mysqli_query($dbhandle, $emer_medi) or die(mysql_error());

// Print out result
$emer_medi_res = mysqli_fetch_array($emer_medi_1);
$emer_medi_bill=	$emer_medi_res['SUM(uprice)'];


$emer_inves = "SELECT SUM(price) FROM einves where pmrn= '$pmrn' and eid='$emer_eid' and status in ('RECEIVED','SEEN','DONE')"; 

	 
$emer_inves_1 = mysqli_query($dbhandle, $emer_inves) or die(mysql_error());

// Print out result
$emer_inves_res = mysqli_fetch_array($emer_inves_1);
$emer_inves_bill=	$emer_inves_res['SUM(price)'];

$emer_dispo = "SELECT SUM(price) FROM edisposible where pmrn= '$pmrn' and eid='$emer_eid'"; 
	 
$emer_dispo_1 = mysqli_query($dbhandle, $emer_dispo) or die(mysql_error());

// Print out result
$emer_dispo_res = mysqli_fetch_array($emer_dispo_1);
$emer_dispo_bill=	$emer_dispo_res['SUM(price)'];


$emer_evisit = "SELECT SUM(visit) FROM ecnote where pmrn= '$pmrn' and eid='$emer_eid'"; 
	 
$emer_evisit_1 = mysqli_query($dbhandle, $emer_evisit) or die(mysql_error());

// Print out result
$emer_evisit_res = mysqli_fetch_array($emer_evisit_1);
$emer_evisit_bill=	$emer_evisit_res['SUM(visit)'];

/*$nurse_procedure = "SELECT SUM(price) FROM enprocedure where pmrn='$pmrn' and eid='$emer_eid'"; 
	 
$nurse_procedure1 = mysqli_query($dbhandle,$nurse_procedure) or die(mysql_error());

// Print out result
$nurse_procedure2 = mysqli_fetch_array($nurse_procedure1);
$nurse_procedure_price=	$nurse_procedure2['SUM(price)'];
*/

$emer_all_bill=$emer_dispo_bill+$emer_inves_bill+$emer_medi_bill+$nurse_procedure_price+0;


$query198j_doc_ot = "SELECT * FROM ot where pmrn= '$pmrn' and eid='$eid' ORDER BY id DESC"; 
	 
  $result198j_doc_ot = mysqli_query($dbhandle,$query198j_doc_ot) or die(mysql_error());
  $row198j_doc_ot = mysqli_fetch_array($result198j_doc_ot);
  $test1c_doc_ot=	$row198j_doc_ot['id'];
  

$query198j_doc = "SELECT SUM(room) FROM otivisitendo where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198j_doc = mysqli_query($dbhandle,$query198j_doc) or die(mysql_error());

// Print out result
$row198j_doc = mysqli_fetch_array($result198j_doc);
$test1c_doc=	$row198j_doc['SUM(room)'];


$query198j_dis = "SELECT SUM(ins) FROM othoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198j_dis = mysqli_query($dbhandle,$query198j_dis) or die(mysqli_error());

// Print out result
$row198j_dis = mysqli_fetch_array($result198j_dis);
$test1c_dis=	$row198j_dis['SUM(ins)'];

$query198j_medi = "SELECT SUM(ins) FROM othoscharge1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198j_medi = mysqli_query($dbhandle,$query198j_medi) or die(mysqli_error());

// Print out result
$row198j_medi = mysqli_fetch_array($result198j_medi);
$test1c_medi=	$row198j_medi['SUM(ins)'];


/*$query198j_amedi = "SELECT SUM(price) FROM otanaesmedi where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_amedi = mysqli_query($dbhandle,$query198j_amedi) or die(mysqli_error());

// Print out result
$row198j_amedi = mysqli_fetch_array($result198j_amedi);
$test1c_amedi=	$row198j_amedi['SUM(price)'];

$query198j_ainfu = "SELECT SUM(price) FROM otanaesinfusion where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_ainfu = mysqli_query($dbhandle,$query198j_ainfu) or die(mysqli_error());

// Print out result
$row198j_ainfu = mysqli_fetch_array($result198j_ainfu);
$test1c_ainfu=	$row198j_ainfu['SUM(price)'];

*/


$payment=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$implant+$extra+$test1_dis-$test1al_rad_dis-$total_bed_dis;

$ot_payment=$test1c_doc+$test1c_medi+$test1c_dis+$test1c_ainfu-$row['ot_hos_dis']-$row['ot_doc_dis'];
$in_payment=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed-$test1al_rad_dis-$total_bed_dis;
$payable=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$implant+$extra+$endo_summary+$opd_pro_summary+$test1_dis+$emer_all_bill-$test1al_rad_dis-$total_bed_dis-$row['hos1_dis']-$row['hos_doc_dis']-$row['advance'];



$query198j_implant = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi LIKE '%IMPLANT%' "; 
	 
$result198j_implant = mysqli_query($dbhandle,$query198j_implant) or die(mysqli_error());

// Print out result
$row198j_implant = mysqli_fetch_array($result198j_implant);
$implant=	$row198j_implant['SUM(price)'];

$query198j_extra = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi NOT LIKE '%IMPLANT%'"; 
	 
$result198j_extra = mysqli_query($dbhandle,$query198j_extra) or die(mysqli_error());

// Print out result
$row198j_extra = mysqli_fetch_array($result198j_extra);
$extra=	$row198j_extra['SUM(price)'];




$new_hos_dis=$row['hos1_dis']+$row['lab_dis']+$row['rad_dis']+$row['room_dis'];
$in_new_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$ot_payment+$emer_all_bill+$test1_dis+$opd_pro_summary+$endo_summary+$opd_cath_summary+$service_charge+$opd_msuite_summary;
$in_new_charge2=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$bed_charge_new+$implant+$extra+$ot_payment+$emer_all_bill+$test1_dis+$opd_pro_summary+$endo_summary+$opd_cath_summary+$service_charge+$opd_msuite_summary;
$new_payable1=round($in_new_charge1-$row['hos_doc_dis']-$row['advance']-$new_hos_dis);
$new_payable2=round($in_new_charge2-$row['hos_doc_dis']-$row['advance']-$new_hos_dis);

$in_ipd_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary;
$in_ipd_charge2=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$bed_charge_new+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary;

	?>


<td align="center"><a target='_blank' href="ipall_new_1_new_00_new?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><?php if($total_day<1){echo $in_new_charge2;} else {echo $in_new_charge1;};?>

</a></td>

<td align="center"><a target='_blank' href="ipall_new_1_new_00_new?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><?php echo $row['advance']?></a></td>

<td colspan="20" align="right"bgcolor="lightgreen"><font size="3" color="#FF0000"><strong>
<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;};?>
</td>
      </tr>
    <?php $count++; } ?>
   </tbody>
</table>
</form>

</body>

</html>
