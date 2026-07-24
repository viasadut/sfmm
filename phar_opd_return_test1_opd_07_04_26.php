<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php 
include "con_db.php";
$appdate=date('Y-m-d');
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$dname=$_REQUEST['dname'];
$sno=$_REQUEST['sno'];
$stime = date('d/m/Y H:i:s');
//$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];

//include("auth.php");
$ldate=date('Y-m-d');

$pid=$_REQUEST['sno'];
$query23 = "select * FROM medi_stock2 WHERE billno='$pid'"; 
$er = mysqli_query($con,$query23) or die ( mysqli_error());

$err = mysqli_fetch_array($er);

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query44 = mysqli_query($db,"select * from pms_bill where billno='$pid'");
$data4 = mysqli_fetch_assoc($query44);
$eid=$data4['eid'];
$location=$data4['location'];
$amount=$data4['amount'];
$location=$data4['location'];
$r_date=date('Y-m-d');

$pmrn=$data4['pmrn'];
$eid=$data4['eid'];
$dname=$data4['dname'];
$pname=$data4['pname'];
$dis_amount=$data4['dis_amount'];



?>


<?php

if(isset($_POST['but_update'])){
	
	


if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}


            else {
$apptime=date('Y-m-d H:i:s');				

$vehicle1=$_REQUEST['vehicle1'];
$due_remarks=$_REQUEST['due_remarks'];
$taka=$_REQUEST['taka'];
$dis_taka=$_REQUEST['dis_taka'];
$percentage=$_REQUEST['percentage'];
$dis_percentage=$_REQUEST['dis_percentage'];


$dis_amount=$_REQUEST['dis_amount'];
$gtotal=$_REQUEST['gtotal'];
$return_amount=$_REQUEST['return_amount'];
$b_remarks=$_REQUEST['remarks'];

$discount_taka=$gtotal-$dis_taka;
$discount_percentage=$gtotal-$dis_percentage;
				$servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";

// Create connection
$conn = new mysqli($servername, $username1, $password1, $dbname1);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($user!=''){

$sql = "insert into refund_bill(pmrn,eid,location,amount,dis_amount,r_amount,date,refund_time,refund_by,remarks,dname,s_no,p_mode,p_remarks,billno,b_remarks) VALUES
('$pmrn', '$eid', '$location', '$return_amount', $dis_amount, $return_amount, '$appdate', '$apptime', '$user', '$ipd', '$location','$mno', '$vehicle1', '$due_remarks','$pid','$b_remarks')";


if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;	

  

  $date=date('Y-m-d');
  $ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','DR','112000','$date','$return_amount','PHARMACY RETURN')";
  mysqli_query($con,$ins_query) or die(mysql_error());

  
$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$return_amount','PHARMACY RETURN')";
mysqli_query($con,$ins_query7) or die(mysql_error());


$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','CR','619210','$date','$return_amount','PHARMACY RETURN')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','DR','615100','$date','$return_amount','PHARMACY RETURN')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  




				
           foreach($_POST['update'] as $updateid){
					
$eqty2 = $_POST['eqty1_'.$updateid];

if($eqty2>0){
	
			$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			
$ortime = date('d/m/Y H:i:s');
$adate = date('Y-m-d');
//$eqty2 = $_POST['eqty1_'.$updateid];
			
	$chk1=mysqli_query($db,"SELECT * FROM medi_stock2 where id='".$updateid."'");
	$chk_row1=mysqli_fetch_assoc($chk1);
	$phar_sale_id=$chk_row1['phar_id'];
	$medi_stock_id=$chk_row1['medi_id'];
	$new_eqty=$chk_row1['r_qty']+$eqty2;
	
	$chk11=mysqli_query($db,"SELECT * FROM medi_stock where id='".$medi_stock_id."'");
	$chk_row11=mysqli_fetch_assoc($chk11);
	$medi_stock_qty=$chk_row11['add_qty']+$eqty2;
			
	$chk=mysqli_query($db,"SELECT * FROM phar_sale where id='".$phar_sale_id."'");
	$chk_row=mysqli_fetch_assoc($chk);
	$mqty=$chk_row['qty'];
	$r_id=$chk_row['id'];
$p_mrn=$chk_row['pmrn'];
$p_name=$chk_row['pname'];
$fqty=$mqty+$eqty2;
$charge_f=$fqty*$p_price;
$rqty=$chk_row['r_qty'];
$medi_1 = $chk_row["medi"];
$code_1 = $chk_row["code"];	
$m_rfid = $chk_row["rfid"];	
$sale_price=$chk_row['uprice'];
$new_sale_price=$sale_price*$eqty2;
			
			$p_price=$chk_row['uprice'];
			$u_price=$eqty2*$p_price;
	

$eqty44=$eqty2+$rqty;			
			
	
	
	$strSQL2 = "insert into phar_sale_return(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`,`rfid`,`billno`,`eid`,`rid`)
	values
	('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','OPD','$code_1','$p_mrn','$p_name','$m_rfid','$pid','$eid','$last_id')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);
			
			
$strSQL22215 = "update medi_stock2 set r_qty='$new_eqty' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery22215 = mysqli_query($objConnect,$strSQL22215);


			
$strSQL2221 = "update medi_stock set add_qty='$medi_stock_qty' where id='$medi_stock_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2221 = mysqli_query($objConnect,$strSQL2221);
		

			$strSQL222 = "update phar_sale set r_qty='$eqty44' where id='$phar_sale_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery222 = mysqli_query($objConnect,$strSQL222);
	
	
	
			
			

//#1
				
			
			




}
  }
$strSQL22 = "update pms_bill set r_amount='$return_amount', refund_by='$user', refund_time='$apptime' where billno='$pid'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery22 = mysqli_query($objConnect,$strSQL22);


header("Location: refund_phar_bill_pdf.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&refundno=$last_id&billno=$pid&eid=$eid");			

}
			
$conn->close();			
}
}
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Medicine</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}



fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 1200px;
  }

}


      </style>

    <script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Investigation</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>



  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>



</head>
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




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<div class='container'>


<form name="frmMain1" action="" method="post" > 
        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><h1 style="color:red"><strong>Bill No - <?php echo $sno;?>&nbsp;&nbsp;&nbsp;(MRN- <?php echo $pmrn;?>)</strong></h1></label></td> </tr>
<tr><td colspan="7" align="center"><label><strong>S/No- <?php echo $sid;?></strong></label></td> 
<td colspan="10" align="center"><label><strong>User- <?php echo $user ;?></strong></label></td> 
<td colspan="7" align="center"><label><strong>Date & Time:<?php echo $stime ;?> </strong></label></td> 



</tr>



<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="10" align="center"><strong>Medicine Name</strong></td>
	  <td colspan="1" align="center"><strong>Code</strong></td>
	  
     	  <td colspan="1" align="center"><strong>Available QTY</strong></td>
		  <td colspan="1" align="center"><strong>Sold QTY</strong></td>
		  <td colspan="1" align="center"><strong>Last_Returned_Qty</strong></td>
		  <td colspan="1" align="center"><strong>Unit Price</strong></td>
      	  
		  <td colspan="2" align="center"><strong>Return_Qty</strong></td>
		  
		  <td colspan="3" align="center"><strong>Total price</strong></td>
		  
		  
		
       

	   </tr>
	   
	   
	    <?php 
                    $query = "select * from medi_stock2 where billno='$sno'";
                    $result = mysqli_query($con,$query);
					$count=1;
                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                        $medi = $row['g_name'];
						$pdos = $row['pdos'];
						$duration = $row['duration'];
						$frelation = $row['frelation'];
												$uprice = $row['uprice'];
												$mcode = $row['code'];
												$gg_qty=$row['given_qty'];
												$batch_no=$row['batch_no'];
                       
$query1 = "select * from phar_sale where code='$mcode' and billno='$sno'";
                    $result1 = mysqli_query($con,$query1);
					   $row1 = mysqli_fetch_array($result1);
                       
//$mcode = $row1['code'];
	  $sum = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='Pharmacy_opd' and batch_no='$batch_no'" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$new_qty=$sumr['SUM(add_qty)'];
         					   
                    ?>
	   
   
     <td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $count; ?></td>


                            
                  
                  
	 
<td align="center"colspan="10" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["g_name"].' ('.$row["b_name"].')'; ?></td>
	  
<td align="center"colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["code"].'<br> Batch-('.$row['batch_no'].')'; ?></td>


	  
	        
						

		
<td align="center"colspan="1"
<?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $new_qty;?>

<input name="eqty2_<?= $id ?>" id="eqty2" type="hidden" value="<?php echo $new_qty;?>" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>

</td>


		
<td align="center"colspan="1"
<?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row['given_qty'];?>

<input name="eqty2_<?= $id ?>" id="eqty2" type="hidden" value="<?php echo $new_qty;?>" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>

</td>
<td align="center"colspan="1" <?php echo 'style="font-weight: bold;font-size:22px;color:red"';?>><?php echo $row["r_qty"]; ?></td>
		
		
		<td align="center"colspan="1"
<?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row1['uprice'];?>

<input class="iprice" name="eqty3_<?= $id ?>" id="eqty2" type="hidden" value="<?php echo $row1['uprice'];?>" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>
</td>			



<td align="center"colspan="2">


<?php  $va = $row['r_qty']; 
//echo "<br>";
$va1 = $row['given_qty']; 

$va_new = $va1-$va; 
$readOnly = "";
if($va>=$va1){
    $readOnly = "readonly";
}
?>


                        



<input class="iquantity" name="eqty1_<?= $id ?>" type="number" onchange='subTotal()' value="0" id="eqty1" required <?php if($va_new>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?><?php echo $readOnly;?> max="<?php echo $va_new;?>"></td>




<td colspan="3" class='itotal' <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>></td>


							  
                  
						
	 <td align="center" colspan="1"><input type='checkbox' name='update[]' value='<?= $id ?>' checked hidden></td>						
			      

  	  <td>
	  <?php
	   if($row['r_qty']>0){
	 echo'
	 
	 <a target="_blank" href="return_medi_tag?sno='.$row['medi_id'].'"><img src="phar_pic/barcode.png" title="Print Instruction" width="20" height="20" /></a>';}
	 ?>
	  </td>

	  
      </tr>
	  
    <?php $count++; } ?>




	<tr >
	
	<td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red">Grand Total</td>
	<td colspan="10"align="right"><input id='gtotal' name='gtotal' style="font-weight: bold;font-size:35px;color:red;text-align:right" readonly></td>
</tr>

<tr>
<td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red">Discounted Amount</td>
		<td colspan="10"align="right">


		<input id="dis_amount" name="dis_amount" value="<?php if($dis_amount>0){echo $dis_amount;} else {echo '0';}?>" style="font-weight: bold;font-size:35px;color:red;text-align:right" readonly>

</td></tr>

<tr>
	<td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red">Returnable Amount</td>
<td colspan="10" align="right" style="font-weight: bold;font-size:35px;color:red">
<input id="dis_taka" name="return_amount" value="" style="font-weight: bold;font-size:35px;color:green;text-align:right" readonly>
</td>

</tr>


 <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#gtotal").val()) 
	var ret2 = parseInt($("#dis_amount").val())
	
	var ret4=ret1-ret2
	
	
    $("#dis_taka").val(ret4);
	
  })
</script>


	
	
	
	
	</tr>
	
	
	
	<tr>
<td colspan="10"><input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="bkash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Bikash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Card</span>				 

      <input name="due_remarks" type="text" size="40" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">

</td>	  
	<td colspan="10"align="right"><a target='_blank' href="phar_receipt?sno=<?php echo $sno;?>"><img src="phar_pic/print.png" title="Print Receipt" width="100" height="80" /></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="medi_ins_p?sno=<?php echo $sno;?>"><img src="phar_pic/barcode.png" title="Print Instruction" width="100" height="80" /></a>


</td>
<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');
var dis_amount=document.getElementById('dis_amount');

function subTotal()
{

gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
gt=gt+(iprice[i].value)*(iquantity[i].value);

}
//gtotal.innerText=gt;
//gtt=gt-dis_amount;

document.getElementById("gtotal").value=gt;
}
subTotal();
</script>

<script src='a_j_q/jquery-3.3.1.min.js' type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="update[]"]').prop('checked',true);
                    }else{
                        $('input[name="update[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });

                // Checkbox click
                $('input[name="update[]"]').click(function(){
                    var total_checkboxes = $('input[name="update[]"]').length;
                    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            });
        </script>	

</tr>
<tr>
	<td colspan='10'>
		<input type="text" name="remarks" style="background-color:white" placeholder="Remarks" size="30"></input>  
	</td>
	<td colspan='10' align='right'><input type='submit' value='Confirm' name='but_update'><br><br></td></tr>
	
	
	 </table>
            </form>
        </div>








</body>

</html>
<script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
   
        
        var txtPassportNumber4 = document.getElementById("sdate21");
        txtPassportNumber4.disabled = chkPassport.unchecked ? false : true;
        if (!txtPassportNumber4.disabled) {
            txtPassportNumber4.focus();
        }
		
		
    }
	
		function EnableDisableTextBox1(chkPassport1) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport1.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
	
	function EnableDisableTextBox2(chkPassport2) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport2.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
</script>



<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		

		function GetDetail(str) {
			
				var rt = document.getElementById('pmrn').value;
				

								if(rt === ""){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = true;
	dis_percentage.disabled = true;
  }	  
	

				
				
				else if(rt === "percentage"){
    
	
	
	sdate1.hidden = false;
	sdate1.disabled = false;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	
	
  }	  
  
	
else if(rt === "taka"){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = false;
	sdate12.disabled = false;
	
	dis_taka.hidden = false;
	dis_taka.disabled = false;
	
	dis_percentage.hidden = true;
	dis_percentage.disabled = true;
  }	  
  
  
	
				
			}
		
	</script>  