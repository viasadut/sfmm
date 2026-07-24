<?php
include_once 'dbconfig.php';
?>

<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','store','doctor','pharmacy')"; 
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
$rfid=$_REQUEST['rfid'];
$req_loc=$_REQUEST['req_loc'];

 $ono4=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    //$ono4 = $decryption;

//include("auth.php");
//echo $count1;

$runningTime = date('dmisi');


$sel95w="SELECT * FROM po_table WHERE `ono`='$ono4';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);
$po_ono=$data['ono'];
$po_id=$data['id'];  
$status=$data['status'];  
$po_value=$data['total_amount'];
								
								$simple_string1 = $data['id'];
								$ciphering1 = "AES-128-CTR";
								$iv_length1 = openssl_cipher_iv_length($ciphering1);
								$options = 0;
								$encryption_iv1 = '1234567891011124';
								$encryption_key1 = "kpj1";
								$encryption1 = openssl_encrypt($simple_string1,
								$ciphering1,
								$encryption_key1, $options, $encryption_iv1);
								$encryption1;

								
								
$po1="SELECT * FROM purchase_stock3 WHERE `rfid`='$rfid' and req_loc='$req_loc';";
$re_po = mysqli_query($con,$po1);
$re_data=mysqli_fetch_assoc($re_po);
								

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
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
                foreach($_POST['update'] as $updateid){
					

	
$qq1 = mysqli_query($db,"select * from purchase_stock3 where id='".$updateid."'");
			$dd1 = mysqli_fetch_assoc($qq1);
$code=$dd1['code'];
$g_name=$dd1['g_name'];
$stock=$dd1['balance'];
$order_qty=$dd1['req_qty'];
$stock=$dd1['balance'];
$u_price=$dd1['u_price'];
$t_price=$dd1['t_price'];
$p_id=$dd1['p_id'];


	//s
			
			
		//echo 'test';
if($re_data['po_status']!='Done'){

$ins_query1="insert into po_table1 (`code`,`name`,`brand`,`stock`,`o_qty`,`uprice`,`tprice`,`po_ono`,`po_id`,`pid`)
 values ('$code','$g_name','$g_name','$stock','$order_qty','$u_price','$t_price','$po_ono','$po_id','$p_id')";
mysqli_query($con,$ins_query1) or die(mysql_error());

}
		
	

	
	}	
		
	
	


		}
		
	$ins_query2="update purchase_stock3 set po_status='Done',po_id='$po_id',ono='$ono4' where rfid='$rfid' and req_loc='$req_loc'";

	
	if(mysqli_query($con,$ins_query2)== true){

	$ins_query22="update po_gallery set rfid='$rfid',pmrn='$ono4',eid='$po_id' where rfid='$rfid'";
	//header("Location: po_prepare1_d?ono=$encryption&rfid=$rfid&req_loc=$req_loc");	}
}

if(mysqli_query($con,$ins_query22)== true){

	$ins_query224="update po_comparison set rfid='$rfid',pmrn='$ono4',eid='$po_id' where rfid='$rfid'";
	//header("Location: po_prepare1_d?ono=$encryption&rfid=$rfid&req_loc=$req_loc");	}
}

if(mysqli_query($con,$ins_query224)== true){

	//$ins_query22="update po_gallery set rfid='$rfid',pmrn='$po_ono',eid='$po_id' where rfid='$rfid'";
	header("Location: po_prepare1_d?ono=$encryption&rfid=$rfid&req_loc=$req_loc");	}
}

?>

<?php

if(isset($_POST['Submit3']))
{

$code = $_REQUEST['code'];
$g_name = $_REQUEST['g_name'];
$b_name = $_REQUEST['b_name'];
$order_qty=$_REQUEST['order_qty'];
$u_price=$_REQUEST['u_price'];
$t_price=$_REQUEST['tcharge'];
$stock=$_REQUEST['stock'];
$batch_no=$_REQUEST['batch_no'];
$p_id=$_REQUEST['p_id'];

$sel95wr="SELECT COUNT(id),SUM(o_qty) FROM po_table1 WHERE `po_ono`='$ono' and code='$code';";
$result95wr = mysqli_query($con,$sel95wr);
$dr=mysqli_fetch_assoc($result95wr);
$sum=$dr['SUM(o_qty)']+$order_qty;
//$u_price_sum=$_REQUEST['u_price'];
$t_price_sum=$_REQUEST['tcharge']*$sum;


if($dr['COUNT(id)']==0){


		
$ins_query1="insert into po_table1 (`code`,`name`,`brand`,`stock`,`o_qty`,`uprice`,`tprice`,`po_ono`,`po_id`,`pid`)
 values ('$code','$g_name','$b_name','$stock','$order_qty','$u_price','$t_price','$po_ono','$po_id','$p_id')";
mysqli_query($con,$ins_query1) or die(mysql_error());

}

else if($dr['COUNT(id)']>0){

$ins_query1="update po_table1 set `o_qty`='$sum',`tprice`='$t_price_sum' where `po_ono`='$ono' and code='$code'";
mysqli_query($con,$ins_query1) or die(mysql_error());

		

}



//header("Location: add_medi_stock");
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
	
	
	<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Forward this PO ?");
}

</script>

</head>

<body>

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

  
  <?php 
  
  
  
  if($status==''){echo'<div style="position: relative;left: 900px;">
<a onclick="return confirm_click();" href="po_forward?id='.$po_id.'&ono='.$_REQUEST['ono'].'&va='.$po_value.'"><strong><img src="forward.png" title="Forward PO" width="50" height="50" /></strong></a>
<a target="_blank" href="prf_upload_new?sno='.$rfid.'&id='.$po_id.'"><img src="view.png" title="View Quotation" width="50" height="50" />
</a>
<a target="_blank" href="po_request_comparison1?sno='.$rfid.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
</a>


</div>
';}

else {echo'<div style="position: relative;
  left: 1065px;">
<strong><img src="white.png" title="Already Forwarded PO" width="50" height="50" /></div>
';}
?>

  </div>
<form action="" method="post">
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
	  <td colspan="3" align="center"><strong>Order Qty</strong></td>
	  <td colspan="3" align="center"><strong>Total Price</strong></td>
	  
<td colspan="1" align="center"><strong>Edit </strong></td>
	   </tr>
 
	
	
	


	
	<?php 
                    $query = "select * from purchase_stock3 where rfid='$rfid' and req_loc='$req_loc'";
                    $result = mysqli_query($con,$query);
					$count=1;
                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                         ?>
	   
  <td colspan="1" align="center">	
		<?php echo $count++;?>
		
		</td>
		
		
     
		<td colspan="8" align="center">	
		<?php echo $row['g_name'];?>	
		
		</td>
		
		<td colspan="3" align="center">	
		<?php echo $row['g_name'];?>
		
		</td>
		
		<td colspan="3" align="center">	
		<?php echo $row['u_price'];?>
		
		</td>
		
		<td colspan="3" align="center">	
		<?php echo $row['balance'];?>	
		
		</td>
		
		<td colspan="3" align="center">	
		<?php echo $row['req_qty'];?>	
		
		</td>
		
		<td colspan="3" align="center">	
		<?php echo $row['t_price'];?>	
		
		</td>
                      




<td align="center"colspan="1"><input type="checkbox" name="update[]" value="<?php echo $id;?>" checked hidden></td>

	  
      </tr>
	  
    <?php $count++; } ?>
	
	
	<tr>
	<td colspan="10"align="right"><a target='_blank' href="phar_receipt?sno=<?php echo $sno;?>"></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="department_bar_transfer?sno=<?php echo $sno;?>"></a>


</td>

	<?php if($re_data['po_status']==''){echo'
	<td colspan="10" align="right"><input type="submit" value="Confirm" name="but_update"><br><br></td>
	';}?>
	
	<?php if($re_data['po_status']!=''){echo'
	
	<td colspan="10" align="right"><a target="_blank" href="po_print_new?ono='.$ono4.'">sad</a></td>';}?>
	
	</tr>
	
 </table>
            </form>



</body>

</html>
