<?php
include_once 'dbconfig.php';
?>
<?php 
   session_start();
   $date = date('Y-m-d');
   // show flash success one time
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

 $encryption=$_REQUEST['ono'];

 $ono=$_REQUEST['ono'];
 $grn=$_REQUEST['grn'];

    //$encryption11=$_REQUEST['grn'];    
 $encryption1=$_REQUEST['grn'];
//$grn = $decryption1;

//include("auth.php");
//echo $count1;

//$runningTime = date('dmisi');


$sel95w="SELECT * FROM po_table WHERE `ono`='$ono';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);
$po_ono=$data['ono'];  
$po_id=$data['id'];  
$discount_given=$data['amount_discount'];  


$creditor_code=$data['creditor_code'];  

?>


<?php
require('db1.php'); // must define $con (mysqli) + $user

if (isset($_POST['but_update'])) {

    if (empty($_POST['update'])) {
        echo '<script>alert("Unsuccessful !!! No Row Selected!!");</script>';
        exit;
    }

    if ($user == '') {
        echo '<script>alert("User session missing.");</script>';
        exit;
    }

    // mysqli throws exceptions on error => rollback in catch
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $con->begin_transaction();

        $total      = 0;
        $gtotal     = $_REQUEST['gtotal'] ?? 0;
        $g_discount = (float)($_REQUEST['g_discount'] ?? 0) + (float)($discount_given ?? 0);
        $grn_discount = (float)($_REQUEST['g_discount'] ?? 0);
        $invoice_no = $_POST['invoice'] ?? '';
        $check_by   = $_POST['check_by'] ?? '';

        // These variables MUST exist in your system (same as your original code uses)
        // If they come from earlier code, keep them. Otherwise define them properly.
        $grn           = $grn ?? '';
        $creditor_code = $creditor_code ?? '';
        $po_ono        = $po_ono ?? '';
        $last_id       = $last_id ?? 0;

        foreach ($_POST['update'] as $updateid) {

            $updateid = (int)$updateid;

            // Fetch PO row (use SAME $con)
            $qq = $con->query("SELECT * FROM po_table1 WHERE id='{$updateid}'");
            $dd = $qq->fetch_assoc();

            if (!$dd) {
                throw new Exception("po_table1 row not found for id={$updateid}");
            }

            $ono      = $dd["po_ono"];
            $recevied = (float)$dd["r_qty"];
            $ordered  = (float)$dd["o_qty"];
            $balanced = $ordered - $recevied;

            $code   = $dd["code"];
            $g_name = $dd["name"];
            $b_name = $dd["brand"];
            $pono   = $dd["po_ono"];
            $uprice = (float)$dd["uprice"];
            $po_id  = (int)$dd["po_id"];

            $runningTime  = (int)$dd["id"] + (int)date('dmisi');
            $runningTime1 = (int)$dd["id"] + (int)date('idmsi') + 1;

            $eqty2   = (float)($_POST['eqty1_' . $updateid] ?? 0);
            $bonus   = (float)($_POST['bonus_' . $updateid] ?? 0);
            $batchno = $_POST['batchno_' . $updateid] ?? '';

            $expiry_raw = $_POST['expiry_' . $updateid] ?? '';
            $expiry     = $expiry_raw ? date('Y-m-d', strtotime($expiry_raw)) : null;

            if ($eqty2 <= 0) {
                continue; // or throw if you want strict
            }

            if ($balanced < $eqty2) {
                throw new Exception("Receive qty exceeds balance for po_table1 id={$updateid}");
            }

            $eqty3   = $recevied + $eqty2;
            $tprice  = $uprice * $eqty2;
            $bprice  = $uprice * $bonus;

            $add_time = date('Y-m-d H:i:s');
            $re_date  = date('Y-m-d');

            
            // Keep it as-is to match your logic.
            $sel95w = "
                SELECT COUNT(id) AS cnt
                FROM medi_stock
                WHERE code='{$code}'
                  AND location='Pharmacy'
                  AND batch_no='{$batchno}'
                  AND add_qty>0
                  AND sno='DSSVSGDGDG'
            ";
            $result95w = $con->query($sel95w);
            $b_chkw    = $result95w->fetch_assoc();
            $count_qtyw = (int)$b_chkw['cnt'];

            // Your original code proceeds only if count_qtyw==0
            if ($count_qtyw != 0) {
                continue;
            }

            // Update po_table1 r_qty
            if ($recevied == 0) {
                $con->query("UPDATE po_table1 SET status='Updated', r_qty='{$eqty2}', check_by='{$check_by}' WHERE id='{$updateid}'");
            } else {
                $con->query("UPDATE po_table1 SET status='Updated', r_qty='{$eqty3}', check_by='{$check_by}' WHERE id='{$updateid}'");
            }

            // Insert into medi_stock (main receive)
            $ins_query2 = "
                INSERT INTO medi_stock
                (code,location,g_name,b_name,add_qty,s_qty,exdate,batch_no,rfid,sno,u_price,t_price,add_by,add_time,re_date,req_qty,grn,invoice_no,p_id,check_by,s_date,po_id)
                VALUES
                ('{$code}','Pharmacy','{$g_name}','{$b_name}','{$eqty2}','{$eqty2}','{$expiry}','{$batchno}','{$runningTime}','{$pono}','{$uprice}','{$tprice}','{$user}','{$add_time}','{$re_date}','{$eqty2}','{$grn}','{$invoice_no}','{$ono}','{$check_by}','{$re_date}','{$po_id}')
            ";
            $con->query($ins_query2);

            // Bonus item
            if ($bonus > 0) {
                $ins_query22 = "
                    INSERT INTO medi_stock
                    (code,location,g_name,b_name,add_qty,s_qty,exdate,batch_no,rfid,sno,u_price,t_price,add_by,add_time,re_date,req_qty,grn,invoice_no,p_id,b_remarks,check_by,s_date,po_id)
                    VALUES
                    ('{$code}','Pharmacy','{$g_name}','{$b_name}','{$bonus}','{$bonus}','{$expiry}','{$batchno}','{$runningTime1}','{$pono}','{$uprice}','{$bprice}','{$user}','{$add_time}','{$re_date}','{$eqty2}','{$grn}','{$invoice_no}','{$ono}','Bonus Item','{$check_by}','{$re_date}','{$po_id}')
                ";
                $con->query($ins_query22);
            }

            $total += $tprice;
        }

        // After loop: AP + TB + discount update
        if ($total > 0) {

            // You calculate $amount but don't use it; keeping your flow
            $sel95r    = "SELECT SUM(t_price) AS amount FROM medi_stock WHERE grn='{$grn}' AND b_remarks=''";
            $result95r = $con->query($sel95r);
            $data_ap   = $result95r->fetch_assoc();
            $amount    = (float)($data_ap['amount'] ?? 0);

            $add_time = date('Y-m-d H:i:s');

            $ins_queryr = "
                INSERT INTO acct_ap
                (grn, creditor_code, vat, tax, amount, payable, cheque_no, bank, user, add_time, date, pono, grn_time, grn_by, invoice_no, discount)
                VALUES
                ('{$grn}','{$creditor_code}','','','{$total}','{$total}','','','{$user}','{$add_time}','{$date}',
                 '{$po_ono}','{$add_time}','{$user}','{$invoice_no}', '{$grn_discount}')
            ";
            $con->query($ins_queryr);



            $con->query("INSERT INTO pms_tb (trans_id, trans_type, acct_code, date, amount, location) VALUES ('{$grn}','CR','311140','{$date}','{$total}','PO_PHAR')");
            $con->query("INSERT INTO pms_tb (trans_id, trans_type, acct_code, date, amount, location) VALUES ('{$grn}','DR','713085','{$date}','{$total}','PO_PHAR')");

            $con->query("UPDATE po_table SET amount_discount='{$g_discount}' WHERE id='{$po_id}'");
        }

        // ✅ If all OK
       
        $con->commit();
       /* echo '<script>alert("Success! All committed.");</script>';
        exit;*/

        // ✅ flash message (will show after redirect)
$_SESSION['flash_success'] = "Success! All operations completed.";
header("Location: ".$_SERVER['PHP_SELF']."?ono=".urlencode($ono)."&grn=".urlencode($grn));
// ✅ keep same encrypted variables (exactly what you already use in URL)
//$ono_q = $_REQUEST['ono'] ?? '';
//$grn_q = $_REQUEST['grn'] ?? '';

// ✅ redirect back to same page (NO blank page)

exit;



    } catch (Throwable $e) {
        // ❌ Any failure => rollback all queries done in this transaction
        $con->rollback();
        echo '<script>alert("Transaction failed! Rolled back.");</script>';
        // Debug (remove in production)
        echo "<pre>".$e->getMessage()."</pre>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
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



select {
  
  height: 52px;
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



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
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
			url: "get_data.php",
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
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
</head>

<body>
<?php if (!empty($_SESSION['flash_success'])): ?>
<script>
alert(<?= json_encode($_SESSION['flash_success']) ?>);
</script>
<?php unset($_SESSION['flash_success']); endif; ?>

<?php if (!empty($_SESSION['flash_error'])): ?>
<script>
alert(<?= json_encode($_SESSION['flash_error']) ?>);
</script>
<?php unset($_SESSION['flash_error']); endif; ?>


<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>Purchase Order Form</h1>

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
	  <td colspan="2" align="center"><strong>In Hand</strong></td>
	  <td colspan="2" align="center"><strong>Order Qty</strong></td>
	  <td colspan="2" align="center"><strong>Received Qty</strong></td>
	  
	  
<td colspan="1" align="center"><strong>Receive Qty </strong></td>
<td colspan="1" align="center"><strong>Discount </strong></td>
<td colspan="1" align="center"><strong>Expiry Date </strong></td>
<td colspan="1" align="center"><strong>Batch NO </strong></td>
<td colspan="1" align="center"><strong>Bonus Qty </strong></td>
	   </tr>
 
	
	
     <?php



$query = "Select * from po_table1 where po_id= '$po_id' and po_ono='$po_ono' order by `id` DESC";
$result = mysqli_query($con,$query);
$count=1;
while($i = mysqli_fetch_array($result) ){
    $id=$i['id'];
?>

<td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="center"colspan="8"><a target='_blank' href="all_product_list5_purchase?id=<?php echo $row['pid'];?>"><?php echo $i["name"]; ?></a></td>
	  
      
	  <td align="center"colspan="3"><?php echo $i["brand"]; ?></td>
	  
	  <td align="center"colspan="3"><?php echo $i["uprice"]; ?></td> 
	  

<td align="center"colspan="2"><?php echo $i["stock"]; ?></td>	  
<td align="center"colspan="2"><?php echo $i["o_qty"]; ?></td>
<td align="center"colspan="2"><?php echo $i["r_qty"]; ?></td>
      
	 <?php
     $rec_qty=$i['o_qty'] - $i['r_qty'];
     ?>




<td colspan="1" hidden>
<input  type="number" class="avail" value="<?= $i['o_qty']-$i['r_qty'] ?>" readonly >
</td>

<td colspan="1">

<?php 
if($i['o_qty']<=$i['r_qty']){
echo '<input  type="number" name="" class="qty" min="0" value="0" disabled>';
}

else if($i['o_qty']>$i['r_qty']){
    echo '<input  type="number" name="eqty1_'.$id.'" class="qty" min="0" value="0">';
    }
    ?>
</td>



<td colspan="1">
<input  type="hidden" class="price" name="price[]" value="<?= $i['uprice'] ?>" readonly>
<input  type="number" class="discount" name="discount[]" value="" step="any">
</td>

<td align="center"colspan="1"><input class="expiry" name="expiry_<?= $id ?>" type="date" min="'.date('Y-m-d').'" ></td>
<td align="center"colspan="1"><input class="batchno" name="batchno_<?= $id ?>" type="text" ></td>
<td align="center"colspan="1"><input class="bonus" name="bonus_<?= $id ?>" type="text"></td>



<td colspan="1" hidden>
<input type="number" class="row_total" name="row_total[]" value="0" readonly hidden>
</td>
<td align="center" colspan="1"><input type='checkbox' name='update[]' value='<?= $id ?>' checked hidden></td>						
</tr>
<?php $count++;} ?>
<strong style="font-size:25px;color:green">GRN VALUE:</strong>
<input type="number" name='gtotal' id="grand_total" value="0" readonly style="font-size:25px;color:green">
<strong style="font-size:25px;color:green">GRN Discount:</strong>
<input type="number" name='g_discount' id="grand_discount" value="0" readonly style="font-size:25px;color:green">





    
   
<tr>
<td align="left" colspan="5">Invoice No</td>  
<td align="left" colspan="22"><input class="invoice" name="invoice" id="invoice" value="" type="text" placeholder="Invoice No" required size="30"></td>
</tr>


<tr>
<td align="left" colspan="5">Check By</td>  
<td align="left" colspan="25">
<select class="js-example-basic-single" name="check_by" required>

						<option value=''>-Select-</option>
				<?php 
			$sql76 = "select * from `staff3` where status='Active' and dept in ('Pharmacy Services') ";
			$res76 = mysqli_query($con, $sql76);
			
			
			
			
					if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->sname."'>".$row76->sname.'-'.$row76->sid."</option>";
				}}
			
				
				
				
				
			
			?>  </select>
      <script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

	<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />


</td>
</tr>










	   
	   
	 



	  
<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');


function subTotal()
{
gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
gt=gt+(iprice[i].value)*(iquantity[i].value);

}
gtotal.innerText=gt;
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


	
	<td colspan='30' align='right'><input type='submit' value='Confirm' name='but_update'><br><br></td></tr>
	
	
	 </table>
            </form>
        </div>



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
$sel_query="Select * from medi_stock where sno='$ono' order by `id` DESC;";

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




<td align="center"colspan="1"><a target='_Blank' href="grn_print_pdf_phar?ono=<?php echo $encryption1; ?>&grn=<?php echo $encryption11; ?>&id=<?php echo $row['re_date']; ?>">Print</a></td>	  
<td align="center"colspan="1"><a target='_Blank' href="medi_bar?g_name=<?php echo $row['g_name']; ?>&id=<?php echo $row['id']; ?>&rfid=<?php echo $row['rfid']; ?>">Barcode</a></td>	  
      
	  





      
    <?php $count++; } ?>


    </form>



</body>

</html>
<script>

document.addEventListener("input", function (e) {
    if (
        e.target.classList.contains("qty") ||
        e.target.classList.contains("discount")
    ) {
        updateRowAndGrand(e.target);
    }
});


function updateRowAndGrand(input) {

let row = input.closest("tr");

let qtyInput      = row.querySelector(".qty");
let priceInput    = row.querySelector(".price");
let discountInput = row.querySelector(".discount");
let availInput    = row.querySelector(".avail");
let rowTotal      = row.querySelector(".row_total");

// 🔒 Prevent negative values
if (qtyInput.value < 0) qtyInput.value = 0;
if (priceInput.value < 0) priceInput.value = 0;
if (discountInput.value < 0) discountInput.value = 0;

let qty       = Number(qtyInput.value) || 0;
let price     = Number(priceInput.value) || 0;
let discount  = Number(discountInput.value) || 0;
let available = Number(availInput.value) || 0;
let tdis= price*qty;

// 🔴 Qty cannot exceed available
if (qty > available) {
    alert("You cannot receive more than ordered qty!");
    qty = available;
    qtyInput.value = available;
}

// 🔴 Discount cannot exceed price
if (discount > tdis) {
    alert("Discount cannot be greater than price!");
    discount = tdis;
    discountInput.value = discount;
}

// 🧮 Row total (never negative)
let total = qty * Math.max(0, price - discount);
rowTotal.value = total;

calculateGrandTotal();
calculateGrandDiscount();
}

function calculateGrandTotal() {
    let total = 0;

    document.querySelectorAll(".row_total").forEach(function (input) {
        total += Math.max(0, Number(input.value) || 0);
    });

    document.getElementById("grand_total").value = total;
}
function calculateGrandDiscount() {
    let totalDiscount = 0;

    document.querySelectorAll("tr").forEach(function (row) {

        let qtyInput = row.querySelector(".qty");
        let discountInput = row.querySelector(".discount");

        if (qtyInput && discountInput) {
            let qty = Number(qtyInput.value) || 0;
            let discount = Number(discountInput.value) || 0;

            totalDiscount += qty * discount;
        }
    });

    document.getElementById("grand_discount").value = totalDiscount;
}


</script>





