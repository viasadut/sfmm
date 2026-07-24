<?php
include_once 'dbconfig.php';

?>
<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','store','pharmacy')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];
//$ono=$_REQUEST['ono'];
$cname=$_REQUEST['cname'];
 $encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
 $ono = $decryption;



    //$encryption11=$_REQUEST['grn'];    
 $encryption1=$_REQUEST['grn'];
    $options1 = 0;
    $ciphering1 = "AES-128-CTR";
    $decryption_iv1 = '1234567891011124';
    $decryption_key1 = "kpjj";
    $decryption1=openssl_decrypt ($encryption1, $ciphering1,
    $decryption_key1, $options1, $decryption_iv1);
$grn = $decryption1;

//include("auth.php");
//echo $count1;

//$runningTime = date('dmisi');


$sel95w="SELECT * FROM po_table WHERE `ono`='$ono';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);
$po_ono=$data['ono'];  
$po_id=$data['id'];  

$creditor_code=$data['creditor_code'];  

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['but_update']))
{

if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}


            else if($user!=''){
                foreach($_POST['update'] as $updateid){
					$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			$qq = mysqli_query($objConnect,"select * from po_table1 where id='".$updateid."'");
			$dd = mysqli_fetch_assoc($qq);
			$ono = $dd["po_ono"];
			$recevied = $dd["r_qty"];
			$code = $dd["code"];
			$g_name = $dd["name"];
			$b_name = $dd["brand"];
			$code = $dd["code"];
			$pono = $dd["po_ono"];
			$uprice = $dd["uprice"];
			
			$runningTime = $dd["id"]+ date('dmisi');
      $runningTime1 = $dd["id"]+ date('idmsi')+1;
			
					//echo $updateid;
				$eqty2 = $_POST['eqty1_'.$updateid];
				$expiry = date('Y-m-d',strtotime($_POST['expiry_'.$updateid]));
				
				$batchno = $_POST['batchno_'.$updateid];
        $bonus = $_POST['bonus_'.$updateid];

        $invoice_no = $_POST['invoice'];
			$eqty3 =$recevied + $eqty2;
			
			$tprice = $uprice * $eqty2;
			$add_time=date('Y-m-d H:i:s');
      $re_date=date('Y-m-d');

      $tprice=$uprice * $eqty2;
      $bprice=$uprice * $bonus;
			
			
$sel95w="SELECT COUNT(id) FROM purchase_stock WHERE `code`='$code' and location='Store' and batch_no='$batchno' and add_qty>0 and sno='$pono';";
$result95w = mysqli_query($con,$sel95w);
$b_chkw=mysqli_fetch_assoc($result95w);
$count_qtyw=$b_chkw['COUNT(id)'];
	
	
$sel95wz="SELECT * FROM purchase_stock WHERE `code`='$code' and location='Store' and batch_no='$batchno' order by id desc limit 1;";
$result95wz = mysqli_query($con,$sel95wz);
$b_chkwz=mysqli_fetch_assoc($result95wz);
$row_id=$b_chkwz['id'];
$new_qty=$b_chkwz['add_qty'] + $eqty2;


			
			
			
					if($eqty2>0 and $recevied==0 and $count_qtyw==0){
					$ins_query1="update po_table1 set status='Updated',r_qty='$eqty2' where id='$updateid'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into purchase_stock (`code`,`location`,`g_name`,`b_name`,`add_qty`,`exdate`,`batch_no`,`rfid`,`sno`,`u_price`,`t_price`,`add_by`,`add_time`,`re_date`,`req_qty`,`grn`,`invoice_no`,`p_id`)
values('$code','Store','$g_name','$b_name','$eqty2','$expiry','$batchno','$runningTime','$pono','$uprice','$tprice','$user','$add_time','$re_date','$eqty2','$grn','$invoice_no','$ono')";
mysqli_query($con,$ins_query2) or die(mysql_error());

if($bonus>0){

 
  $ins_query22="insert into purchase_stock (`code`,`location`,`g_name`,`b_name`,`add_qty`,`exdate`,`batch_no`,`rfid`,`sno`,`u_price`,`t_price`,`add_by`,`add_time`,`re_date`,`req_qty`,`grn`,`invoice_no`,`p_id`,`b_remarks`)
  values('$code','Store','$g_name','$b_name','$bonus','$expiry','$batchno','$runningTime1','$pono','$uprice','$bprice','$user','$add_time','$re_date','$eqty2','$grn','$invoice_no','$ono','Bonus Item')";
  mysqli_query($con,$ins_query22) or die(mysql_error()); 
}
					}
					
					else if($eqty2>0 and $recevied==0 and $count_qtyw>0){
					$ins_query1="update po_table1 set status='Updated',r_qty='$eqty2' where id='$updateid'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="update purchase_stock set `add_qty`='$new_qty', `req_qty`='$new_qty' where id='$row_id' and location='Store'";
mysqli_query($con,$ins_query2) or die(mysql_error());

if($bonus>0){

  
  $ins_query22="insert into purchase_stock (`code`,`location`,`g_name`,`b_name`,`add_qty`,`exdate`,`batch_no`,`rfid`,`sno`,`u_price`,`t_price`,`add_by`,`add_time`,`re_date`,`req_qty`,`grn`,`invoice_no`,`p_id`,`b_remarks`)
  values('$code','Store','$g_name','$b_name','$bonus','$expiry','$batchno','$runningTime1','$pono','$uprice','$bprice','$user','$add_time','$re_date','$eqty2','$grn','$invoice_no','$ono','Bonus Item')";
  mysqli_query($con,$ins_query22) or die(mysql_error());
}

}
					
					else if($eqty2>0 and $recevied>0 and $count_qtyw==0){
					$ins_query1="update po_table1 set status='Updated',r_qty='$eqty3' where id='$updateid'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into purchase_stock (`code`,`location`,`g_name`,`b_name`,`add_qty`,`exdate`,`batch_no`,`rfid`,`sno`,`u_price`,`t_price`,`add_by`,`add_time`,`re_date`,`req_qty`,`grn`,`invoice_no`)
values('$code','Store','$g_name','$b_name','$eqty2','$expiry','$batchno','$runningTime','$pono','$uprice','$tprice','$user','$add_time','$re_date','$eqty2','$grn','$invoice_no')";
mysqli_query($con,$ins_query2) or die(mysql_error());

if($bonus>0){

  $ins_query22="insert into purchase_stock (`code`,`location`,`g_name`,`b_name`,`add_qty`,`exdate`,`batch_no`,`rfid`,`sno`,`u_price`,`t_price`,`add_by`,`add_time`,`re_date`,`req_qty`,`grn`,`invoice_no`,`p_id`,`b_remarks`)
  values('$code','Store','$g_name','$b_name','$bonus','$expiry','$batchno','$runningTime1','$pono','$uprice','$bprice','$user','$add_time','$re_date','$eqty2','$grn','$invoice_no','$ono','Bonus Item')";
  mysqli_query($con,$ins_query22) or die(mysql_error());
  
}
					}
					
	else if($eqty2>0 and $recevied>0 and $count_qtyw>0){
					$ins_query1="update po_table1 set status='Updated',r_qty='$eqty3' where id='$updateid'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="update purchase_stock set `add_qty`='$new_qty',`req_qty`='$new_qty' where id='$row_id' and location='Store'";
mysqli_query($con,$ins_query2) or die(mysql_error());

					}				
					
				}

        $sel95r="SELECT SUM(t_price) FROM purchase_stock WHERE `grn`='$grn' and b_remarks='';";
        $result95r = mysqli_query($con,$sel95r);
        $data_ap=mysqli_fetch_assoc($result95r);
        $amount=$data_ap['SUM(t_price)'];
        $add_time=date('Y-m-d H:i:s');


        $ins_queryr="insert into acct_ap (`grn`,`creditor_code`,`vat`,`tax`,`amount`,`payable`,`cheque_no`,`bank`,`user`,`add_time`,`date`,`pono`,`grn_time`,`grn_by`,`invoice_no`)
        values('$grn','$creditor_code','','','$amount','$amount','','','','','','$po_ono','$add_time','$user','$invoice_no')";
        mysqli_query($con,$ins_queryr) or die(mysql_error());
        
        
			}

}
	
	
	

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
  
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
  padding: 10px;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="text"]
{
  
  height: 40px;
  border-radius: 2px;
  width: 100%;
}





textarea {
  
  height: 70px;
  
  width: 100%;
}


button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
  margin-bottom: 0px;
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


@media screen and (min-width: 1100px) {

  form {
    max-width: 1200px;
  }

}
      </style>


   <script src="jsnew/pprefixfree.min.js"></script>

   <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>


<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>

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

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


  



<form action="" method="post">
   <a href="po_upload?ono=<?php echo "$ono"; ?>&eid=<?php echo "$po_id"; ?>">Upload Quotation</a>     
<table width="95%" height ="100%" border="0" align="center" bgcolor="lightblue" style="border-collapse:collapse;">	
			
			
			
		<tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Purchase Department: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['purchase_department'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Order NO: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['id'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> PO Type: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['po_type'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Request Department:  <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['req_department'];?></span></td>
		
		
		
		</tr>
						
						 
						
		  
		  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Delivery Department: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['d_department'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Expected Date: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['ex_date'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Expiry Date: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['expiry_date'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Payment Terms: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['payment_terms'];?></span></td>
		
		
		
		<tr>
						
						 
						
		  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Supplier Code: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['sup_code'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Creditor Code: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['creditor_code'];?></span></td>
		
		
		
		
		
		</tr>
						
						 
						
		  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Amount Discount:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['amount_discount'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Percentage Discount: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['percentage_dis'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Subamount:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['subamount'];?></span></td>
		
		
		
		
		<tr>
						
						 
						
		
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Issue Person ID:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['issue_person'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Issue Date: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['issue_date'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Total Amount: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['total_amount'];?></span></td>
		
		
		
		</tr>
						
						 
						
		
		  
			     
  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Authorization Person ID: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['auth_person'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Authorization Date:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['auth_date'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> </td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Record Status: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['record_status'];?></span></td>
		
		
		
		
		</tr>
						
						 
						
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Purchase Order Date:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['po_date'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Record Number:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['record_no'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> </td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Entered date:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['enter_date'];?></span></td>
		
		
		
		
		</tr>
						
						 
						
		
				<tr><td colspan="20"style="font-weight: bold;font-size:14px;color:red"> Remarks:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['remarks'];?></span></td>
				
				
				</tr> 



</table>

</form>
  

<form name="frmMain1" action="" method="post" > 
<table width="95%" height ="100%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">	
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="8" align="center"><strong>Name</strong></td>
      <td colspan="3" align="center"><strong>Brand </strong></td>
      
      <td colspan="3" align="center"><strong>Unit Price</strong></td>
	  <td colspan="3" align="center"><strong>In Hand</strong></td>
	  <td colspan="2" align="center"><strong>Order Qty</strong></td>
	  <td colspan="2" align="center"><strong>Received Qty</strong></td>
	  <td colspan="2" align="center"><strong>Total Price</strong></td>
	  
	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="SELECT * FROM acct_ap WHERE creditor_code = '".$cname."' and status='AP DONE' order by id asc";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="center"colspan="8"><?php echo $row["grn"]; ?></a></td>
	  
      
	  <td align="center"colspan="3"><?php echo $row["pono"]; ?></td>
	  <td align="center"colspan="3" ><?php echo $row["invoice_no"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["remarks"]; ?></td> 
      <td align="center"colspan="3"><?php echo $row["amount"]; ?></td> 
      <td align="center"colspan="3"><?php echo $row["payable"]; ?></td> 
	  
	  



<?php 
$id=$row["id"];
$tt=$row['payable'];
$tt1=$row['paid'];
$tt3=$tt-$tt1;
?>
<?php if($row['paid']=='0' and $row['payable']!=$row['paid'] || $row['paid']<$row['payable'])
{echo'
<td align="center"colspan="1"><input class="paid" name="eqty1_'.$id.'" id="paid" value=""type="number" max="'.$tt.'" required onchange="subTotal()">


</td>


<input type="checkbox" name="update[]" value="'.$id.'" checked hidden>
';}

else if($row['paid']>0 and $row['payable']!=$row['paid'] || $row['paid']<$row['payable'])
{echo'
<td align="center"colspan="1"><input class="paid" name="eqty1_'.$id.'" id="paid" value="" type="number" max="'.$tt3.'" required onchange="subTotal()">


</td>


<input type="checkbox" name="update[]" value="'.$id.'" checked hidden>
';}
?>						





      </tr>
    <?php $count++; } ?>


    <td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red">Grand Total</td>
	<td colspan="10"align="right"><input id='gtotal' name='gtotal' style="font-weight: bold;font-size:35px;color:red" readonly></td>

    <td> 
			<select name="btype1" class="country" value=''required style="width:150px;">
<option>--Select Ward--</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct type FROM bed where status!='deactivate'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
        <?php
	} 
?>
</select>
</td>
	<td>		       
		
		
									
									
									
			<select name="bno" class="state" value='' required style="width:150px;">

</select>

</td>
<tr>
<td align="left" colspan="5">Invoice No</td>  
<td align="left" colspan="10"><input class="invoice" name="invoice" id="invoice" value="" type="text" placeholder="Invoice No" required size="30"></td>
</tr>
  
<script>
//gt=0;
var iprice=document.getElementsByClassName('paid');

var gtotal=document.getElementById('gtotal');


function subTotal()
{
gt=0;
for(i=0;i<iprice.length;i++)

{
//iprice1[i].innerText=(iprice[i].value);
//itotal[i].innerText=(iprice[i].value);
//itotal[i].innerText=(iprice[i].value);
//gt=gt+(iprice[i].value);
gt=+gt + +(iprice[i].value);
}
//gtotal.innerText=gt;
//gtt=gt-dis_amount;

document.getElementById("gtotal").value=gt;
}
subTotal();
</script>



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


	
	<td colspan='30' align='right'><input type='submit' value='Confirm' name='but_update'><br><br></td></tr>
	
	
	 </table>
            </form>


            <form name="done" action="" method="post" > 
<table width="95%" height ="100%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">	
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="4" align="center"><strong>Item Name</strong></td>
      
      
      <td colspan="4" align="center"><strong>Re. Qty</strong></td>
      <td colspan="3" align="center"><strong>Batch No</strong></td>
	  <td colspan="3" align="center"><strong>Ex. Date</strong></td>
	  <td colspan="2" align="center"><strong>Re. Date</strong></td>
	  <td colspan="2" align="center"><strong>Re. By</strong></td>
	  <td colspan="1" align="center"><strong>Re. Location</strong></td>
	  
<td colspan="1" align="center"><strong>Print</strong></td>

	   </tr>
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$count=1;
//$count=1;
$sel_query="SELECT * FROM acct_ap WHERE creditor_code = '".$cname."' and status='AP DONE' order by id asc";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

    <td align="center" colspan="1"><?php echo $count; ?></td>
      
           
	  <td align="center"colspan="4"><?php echo $row["g_name"]; ?></td>
	  
	  <td align="center"colspan="4"><?php echo $row["req_qty"]; ?></td> 
    <td align="center"colspan="3"><?php echo $row["batch_no"]; ?></td>	 	  
<td align="center"colspan="3"><?php echo $row["exdate"]; ?></td>	  

<td align="center"colspan="2"><?php echo $row["add_time"]; ?></td>	  
<td align="center"colspan="2"><?php echo $row["add_by"]; ?></td>	  
<td align="center"colspan="1"><?php echo $row["location"]; ?></td>	  
<?php
$simple_string1 = $row['sno'];
								$ciphering1 = "AES-128-CTR";
								$iv_length1 = openssl_cipher_iv_length($ciphering1);
								$options = 0;
								$encryption_iv1 = '1234567891011121';
								$encryption_key1 = "kpj";
								$encryption1 = openssl_encrypt($simple_string1,
								$ciphering1,
								$encryption_key1, $options, $encryption_iv1);
								$encryption1;


                $simple_string11 = $row['grn'];
								$ciphering11 = "AES-128-CTR";
								$iv_length11 = openssl_cipher_iv_length($ciphering11);
								$options11 = 0;
								$encryption_iv11 = '1234567891011124';
								$encryption_key11 = "kpjj";
								$encryption11 = openssl_encrypt($simple_string11,
								$ciphering11,
								$encryption_key11, $options11, $encryption_iv11);
								$encryption11;

?>




<td align="center"colspan="1"><a target='_Blank' href="prepare_ap_cheque?cname=<?php echo $row['creditor_name']; ?>&grn=<?php echo $encryption11; ?>&id=<?php echo $row['re_date']; ?>">Print</a></td>	  
      
	  





      
    <?php $count++; } ?>


    </form>



</body>

</html>

</body>

</html>
