<?php
/* =========================================================
  IMPORTANT:
  - Do NOT start session here
  - Do NOT re-connect DB here
  - This file uses variables from ipd_bill_gui.php:
    $con, $db, $pmrn, $eid, $data, etc.
========================================================= */
?>

<!-- ✅ ROOM CHARGE (PASTE YOUR ORIGINAL ROOM CHARGE BLOCK EXACTLY) -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">Room Charge</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle mb-0">
      <tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Room Charge</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Ward</strong></td>
      <td colspan="2" align="center"><strong>Bed No</strong></td>
      <td colspan="4" align="center"><strong>Admit Date</strong></td>
      <td colspan="4" align="center"><strong>Transfer Date</strong></td>   
      <td colspan="2" align="center"><strong>Bed Charge Per Day</strong></td>   
	  <td colspan="2" align="center"><strong>Days Staying</strong></td>   
	  <td colspan="2" align="center"><strong>Total Charge</strong></td>   

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from newbed_new where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);
$rows=mysqli_num_rows($result);


while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["type"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["bno"]; ?></td>  
	  <td align="center"colspan="4"><?php echo $row["adatenew"]; ?></td>
	        <td align="center"colspan="4"><?php echo $row["adatenew1"]; ?></td>
			
			
			
						<td align="center" colspan="2"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
			<?php 
			
$bed=$row['bno'];
$query_bed = mysqli_query($db,"select * from bed where bno='$bed'");
$charge_bed = mysqli_fetch_assoc($query_bed);
$b_charge=$charge_bed['charge'];



echo $row['b_charge'];
?>  </td>

			
			
			<td align="center" colspan="2" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
			<?php 
			
			$date_v= date('m/d/Y');
			$start_d=$row["adatenew1"];
			/*$date=date('Y-m-d',strtotime($start_d));
			//$date=date('m/d/Y',strtotime($start_d));
			
			$start=$row["adatenew"];
			//$start1=date('m/d/Y',strtotime($start));
			$start1=date('Y-m-d',strtotime($start));
			$date1=date_create("$start1");
			//echo $date_t=date('H:i:s',strtotime($start));
$date2=date_create("$date");
$date2_v=date_create("$date_v");
$diff=date_diff($date1,$date2);

$diff1=date_diff($date1,$date2_v);

$now = strtotime("$start_d");
$now2 = date('Y-m-d H:i:'); 
$now1 = strtotime($now2); 
$your_date = strtotime("$start");
$datediff = $now - $your_date;
$datediff1 = $now1 - $your_date;
if($datediff>=0)
{echo $fday= round($datediff/(60*60*24),2) ;
}

else
{echo "-" ;
}
*/
//echo $now = time();
//if ($rows==1 and $start_d=='') {echo '1';}else if ($rows>1 and $start_d=='') {echo $diff1->format("%a");} else {echo $diff->format("%a");}
$ttday=round($row["tdays"]/24,3);

?>  <?php echo round($row["tdays"]/24,3); ?></td>
<?php	  
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
	  $query198j_stay = "SELECT SUM(tdays)FROM newbed where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_stay = mysqli_query($dbhandle,$query198j_stay) or die(mysql_error());

// Print out result
$row198j_stay = mysqli_fetch_array($result198j_stay);

$total_day=	$row198j_stay['SUM(tdays)']/24;


			?>
      
	  
	  
	  <td align="center"colspan="2"><?php echo $row['charge'];?></td>
  
      </tr>
    <?php $count++; } ?>

				<?php
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
echo $bed_charge_new=	$row198j_stay['b_charge'];


	?>
	
	
	
	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Room Charge is:<?php echo $test1c_bed; ?> (BDT)</strong></td>
	<td align="center"colspan="4"><a href="update_charge_room.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1c_bed; ?>"></a></td>
	</tr>


      </table>
    </div>
  </div>
</div>

<!-- ✅ MEDICINE USED -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">Medicine Used</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle mb-0">
        	
<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Medicine Used</strong></label></td> </tr>
	
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="2" align="center"><strong>Order Time</strong></td>
        
      <td colspan="3" align="center"><strong>Medication</strong></td>   
	  <td colspan="2" align="center"><strong>Route</strong></td>
      <td colspan="2" align="center"><strong>Status</strong></td>
      <td colspan="2" align="center"><strong>User Done</strong></td>
	  <td colspan="2" align="center"><strong>QTY</strong></td>
	  <td colspan="4" align="center"><strong>Price</strong></td>
	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='' group by infusion order by `ndate` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo date('d/m/Y', strtotime($row["ndate"])); ?></td>
      <td align="center"colspan="2"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><a target='_blank' href="ipall_details_medi?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&medi=<?php echo $row['infusion'];?>"><?php echo $row["infusion"]; ?></a></td>
	  <td align="center"colspan="2"><?php echo $row["root"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["status"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["udone"]; ?></td>
	  
	  

	  
	  <?php
						
						
						$p_price=$row['uprice'];
						$pp_medi=$row['infusion'];
						
						$query4p = mysqli_query($db,"select COUNT(infusion) from imedi3 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi' and udone !=''");
						$datap = mysqli_fetch_assoc($query4p);
						$t_qty=$datap['COUNT(infusion)'];

						
						$query4pc = mysqli_query($db,"select SUM(uprice) from imedi3 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi' and udone !='' ");
						$datapc = mysqli_fetch_assoc($query4pc);
						$uomp=$datapc['SUM(uprice)'];
						
						//$n_uom=$u_price*$uomp;
						?>
	  
  	  <td align="center"colspan="2"><?php echo $t_qty; ?></td>
<td align="center"colspan="4"><?php echo $uomp; ?></td>

      </tr>
    <?php $count++; } ?>
<?php
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
?>	  
	
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Medicine Charge is:<?php echo $test1am;?> (BDT)</strong></td></tr>
	
	<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Special Treatment</strong></label></td> </tr>
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="3" align="center"><strong>Order Date </strong></td>
 
      <td colspan="4" align="center"><strong>Done Date</strong></td>
      <td colspan="3" align="center"><strong>Special Treatment</strong></td>
	  <td colspan="2" align="center"><strong>Done By</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from istret where pmrn= '$pmrn' and eid='$episode'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="4"><?php echo $row["ddate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
  	  

	  
      </tr>
    <?php $count++; } ?>
	

      </table>
    </div>
  </div>
</div>

<!-- ✅ LAB INVESTIGATION -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">Investigation (LAB)</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle mb-0">
        <?php
        // ✅ Paste your original LAB block here
        ?>
      </table>
    </div>
  </div>
</div>

<!-- ✅ RADIOLOGY -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">Investigation (Radiology)</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle mb-0">
        <?php
        // ✅ Paste your original Radiology block here
        ?>
      </table>
    </div>
  </div>
</div>

<!-- ✅ SPD -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">Investigation (SPD)</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle mb-0">
        <?php
        // ✅ Paste your original SPD block here
        ?>
      </table>
    </div>
  </div>
</div>

<!-- ✅ HOSPITAL CHARGES -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">Hospital Charges</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle mb-0">
        <?php
        // ✅ Paste your original Hospital Charges block here
        ?>
      </table>
    </div>
  </div>
</div>

<!-- ✅ DOCTOR VISIT -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">Visited Doctor List</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle mb-0">
        <?php
        // ✅ Paste your original Doctor Visit block here
        ?>
      </table>
    </div>
  </div>
</div>

<!-- ✅ OT -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">OT Charge</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle mb-0">
        <?php
        // ✅ Paste your original OT block here
        ?>
      </table>
    </div>
  </div>
</div>

<!-- ✅ ENDOSCOPY / DISCHARGE / EMERGENCY / TOTALS -->
<div class="card mb-3">
  <div class="card-header bg-white">
    <h5 class="section-title">Endoscopy / Discharge / Emergency / Totals</h5>
  </div>
  <div class="card-body">
    


<?php


$query198j_implant = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi LIKE '%IMPLANT%' and delete_status='0'"; 
	 
$result198j_implant = mysqli_query($dbhandle,$query198j_implant) or die(mysqli_error());

// Print out result
$row198j_implant = mysqli_fetch_array($result198j_implant);
$implant=	$row198j_implant['SUM(price)'];

$query198j_extra = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi NOT LIKE '%IMPLANT%' and medi NOT LIKE '%SERVICE CHARGE%' and delete_status='0'"; 
	 
$result198j_extra = mysqli_query($dbhandle,$query198j_extra) or die(mysqli_error());

// Print out result
$row198j_extra = mysqli_fetch_array($result198j_extra);
$extra=	$row198j_extra['SUM(price)'];

$query198j_extra_service = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi IN ('SERVICE CHARGE') and delete_status='0'"; 
	 
$result198j_extra_service = mysqli_query($dbhandle,$query198j_extra_service) or die(mysqli_error());

// Print out result
$row198j_extra_service = mysqli_fetch_array($result198j_extra_service);
$service_charge=	$row198j_extra_service['SUM(price)'];

$new_hos_dis=$data['hos1_dis']+$data['lab_dis']+$data['rad_dis']+$data['room_dis'];

$in_new_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$ot_payment+$emer_all_bill+$test1_dis+$opd_pro_summary+$endo_summary+$opd_cath_summary+$service_charge+$opd_msuite_summary;
$in_new_charge2=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$ot_payment+$emer_all_bill+$test1_dis+$opd_pro_summary+$endo_summary+$opd_cath_summary+$service_charge+$opd_msuite_summary;
$new_payable1=round($in_new_charge1-$data['hos_doc_dis']-$data['advance']-$new_hos_dis-$data['hos_doc_dis_ot']);
$new_payable2=round($in_new_charge2-$data['hos_doc_dis']-$data['advance']-$new_hos_dis-$data['hos_doc_dis_ot']);

//$in_ipd_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary;
$in_ipd_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$bed_charge_new+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary;
$in_ipd_charge2=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$bed_charge_new+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary;




?>



<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Inpatient Charge is:<?php

if($total_day<1){echo $in_ipd_charge2;} else {echo $in_ipd_charge1;} ?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Discharge Medicine Charge is:<?php echo $test1_dis;?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Service Charge:<?php echo $service_charge; ?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Grand Total is:<?php if($total_day<1){echo $in_new_charge2;} else {echo $in_new_charge1;};?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Advance / Deposit Amount:<?php echo $data['advance'];?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Hospital Discount:<?php echo $new_hos_dis;?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Consultant Discount:<?php echo $data['hos_doc_dis']+$data['hos_doc_dis_ot'];?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Payable Amount is:
<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;};?> (BDT)</strong></td></tr>	


<tr>

<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Receive Amount

<input name="receive_amount" type="number" size="40" style="text-transform:uppercase;text-align:right;" value="<?php if($total_day<1){echo $new_payable2-$data['receive_amount'];} else {echo $new_payable1-$data['receive_amount'];};?>" required max="<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;};?>">

</td>
</tr>




<input type="hidden" name="room_charge" value="<?php if($total_day<1){echo $test1c_bed;} else {echo $test1c_bed;}?>">
<input type="hidden" name="inves_charge" value="<?php echo $test1al + $test1al_rad + $test1as;?>">
<input type="hidden" name="disposable_charge" value="<?php echo $test1;?>">
<input type="hidden" name="doc_charge" value="<?php echo $test1c;?>">
<input type="hidden" name="pharmacy_charge" value="<?php echo $test1am;?>">
<input type="hidden" name="ot_hos_charge" value="<?php echo $test1c_dis;?>">

<input type="hidden" name="ot_doc_charge" value="<?php echo $test1c_doc;?>">
<input type="hidden" name="ot_phar_charge" value="<?php echo $test1c_medi+$test1c_amedi+$test1c_ainfu;?>">
<input type="hidden" name="implant" value="<?php echo $implant;?>">
<input type="hidden" name="extra" value="<?php echo $extra;?>">
<input type="hidden" name="endo" value="<?php echo $endo_summary;?>">
<input type="hidden" name="opdpro" value="<?php echo $opd_pro_summary;?>">
<input type="hidden" name="cath" value="<?php echo $opd_cath_summary;?>">



<input type="hidden" name="payment" value="<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;}?>">
<input type="hidden" name="ot_payment" value="<?php echo $ot_payment;?>">
<input type="hidden" name="in_payment" value="<?php echo $in_payment;?>">
<input type="hidden" name="dis_medi" value="<?php echo $test1_dis;?>">
<input type="hidden" name="emer_all_bill" value="<?php echo $emer_all_bill;?>">
<input type="hidden" name="cath" value="<?php echo $opd_cath_summary;?>">
<input type="hidden" name="msuite" value="<?php echo $opd_msuite_summary;?>">
<input type="hidden" name="service_charge" value="<?php echo $service_charge;?>">

<tr>
  </div>
</div>