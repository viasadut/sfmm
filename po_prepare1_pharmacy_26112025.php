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
//$ono=$_REQUEST['ono'];

 $encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
	$ono4 = $decryption;

//include("auth.php");
//echo $count1;

$runningTime = date('dmisi');


$sel95w="SELECT * FROM po_table WHERE `ono`='$ono4';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);
$po_ono=$data['ono'];
$po_id=$data['id'];  
$status=$data['status'];  
//$po_value=$data['total_amount'];

								
								$simple_string1 = $data['id'];
								$ciphering1 = "AES-128-CTR";
								$iv_length = openssl_cipher_iv_length($ciphering1);
								$options = 0;
								$encryption_iv = '123esed';
								$encryption_key = "kpj1";
								$encryption1 = openssl_encrypt($simple_string1,
								$ciphering1,
								$encryption_key, $options, $encryption_iv);
								$encryption1;
								
								

?>


<?php

$sel95wa="SELECT SUM(tprice) FROM po_table1 WHERE `po_ono`='$ono4';";
$result95wa = mysqli_query($con,$sel95wa);
$dataa=mysqli_fetch_assoc($result95wa);

$po_value=$dataa['SUM(tprice)']-$data['amount_discount'];


/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

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

$sel95wr="SELECT COUNT(id) FROM po_table1 WHERE `po_ono`='$ono4' and code='$code';";
$result95wr = mysqli_query($con,$sel95wr);
$dr=mysqli_fetch_assoc($result95wr);

$sel95wr1="SELECT SUM(o_qty) FROM po_table1 WHERE `po_ono`='$ono4' and code='$code';";
$result95wr1 = mysqli_query($con,$sel95wr1);
$dr1=mysqli_fetch_assoc($result95wr1);

$sum=$dr1['SUM(o_qty)']+$order_qty;
//$u_price_sum=$_REQUEST['u_price'];
$t_price_sum=$u_price*$sum;

$po_new_price=$t_price+$po_value-$data['amount_discount'];


if($dr['COUNT(id)']==0){


		
$ins_query1="insert into po_table1 (`code`,`name`,`brand`,`stock`,`o_qty`,`uprice`,`tprice`,`po_ono`,`po_id`,`pid`)
 values ('$code','$g_name','$b_name','$stock','$order_qty','$u_price','$t_price','$po_ono','$po_id','$p_id')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query11="Update po_table set total_amount='$po_new_price' where ono='$ono4'";
mysqli_query($con,$ins_query11) or die(mysql_error());

}

else if($dr['COUNT(id)']>0){

$ins_query1="update po_table1 set `o_qty`='$sum',`tprice`='$t_price_sum' where `po_ono`='$ono4' and code='$code'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query11="Update po_table set total_amount='$po_new_price' where ono='$ono4'";
mysqli_query($con,$ins_query11) or die(mysql_error());		

}



header("Location: po_prepare1_pharmacy?ono=$encryption");
	}
	
	else {

		//echo "ERROR:";
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
  
  
  if($status=='' || $status=='Draft'){echo'<div style="position: relative;left: 900px;">
<a onclick="return confirm_click();" href="po_forward?id='.$po_id.'&ono='.$_REQUEST['ono'].'&va='.$po_value.'"><strong><img src="forward.png" title="Forward PO" width="50" height="50" /></strong></a>
<a target="_blank" href="po_upload?ono='.$encryption.'&eid='.$simple_string1.'"><img src="upload.png" title="Upload PO" width="50" height="50" />
   </a>     

   <a target="_blank" href="po_request_comparison_p?sno='.$po_ono.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
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
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Total Amount: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $po_value;?></span></td>
		
		
		
		</tr>
						
						 
						
		
		  
			     
  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Authorization Person ID: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['auth_person'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Authorization Date:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['auth_date'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> </td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Record Status: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['status'];?></span></td>
		
		
		
		
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
  

		
			
		<form action="" method="post">
			
		
			
            <!-- Name Input -->
		<table width="95%" height ="100%" border="1" align="center" bgcolor="lightgreen" style="border-collapse:collapse;">	
		<tr>
		<td colspan="3"style="font-weight: bold;font-size:22px;color:red"> Code</td>
		<td colspan="3" style="font-weight: bold;font-size:22px;color:red"> Name</td>
		<td colspan="3" style="font-weight: bold;font-size:22px;color:red"> Brand</td>
		<td colspan="3" style="font-weight: bold;font-size:22px;color:red"> Stock In Hand</td>
		<td colspan="3" style="font-weight: bold;font-size:22px;color:red"> Unit Price</td>
		<td colspan="3" style="font-weight: bold;font-size:22px;color:red"> Order Qty</td>
		<td colspan="3" style="font-weight: bold;font-size:22px;color:red"> Total Price</td>
		
		
		<tr>
		<td colspan="3">
	  
	  
	  
	  			 <input type="text" class="country" list="eee" autocomplete="off" name='code' required style="font-weight: bold;font-size:14px;color:green" id="pmrn" onkeyup="GetDetail(this.value)">
 
    <datalist id="eee">
	<option value=''>-Select-</option>
		
<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `medicine` where status='Active'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['code']; ?>"><?php echo $row['mname']; ?></option>
        <?php } ?>
</datalist>

	  </td>
	  <td colspan="3">
      
	
	  <textarea name="g_name" id="code"  style="font-weight: bold;font-size:14px;color:green"readonly required></textarea>
	  </td>
	  <td colspan="3">
<input type="text" name="b_name" id="brand" required value="" readonly style="font-weight: bold;font-size:14px;color:green">
</td>
						
						 
	<td colspan="3">					
		<input type="text" name="stock" id="tqty" required value="" readonly style="font-weight: bold;font-size:14px;color:green">
		</td>
		
		<td colspan="3">					
		<input type="text" name="u_price" id="uprice" required value=""  style="font-weight: bold;font-size:14px;color:green">
		</td>
		
		
		
	<td colspan="3">	
			<input type="number" name="order_qty" id="qty" required value=""  style="font-weight: bold;font-size:14px;color:green"></td>

			
			
			
			
			<script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = $("#uprice").val() 
	var ret2 = parseInt($("#qty").val())
	var ret3=ret2 * ret1
	//var ret4=ret3 * 100
	//var ret5=ret4 / ret1


	if(ret3>0){
		$("#tprice").val(ret3);
	
	//$("#tprice").style.color = "red";
	
	}
	else {
		$("#tprice").val();
		//$("#tprice").style.color = "green";6
	}
  })
</script>

<td colspan="3" ><input type="text" name="tcharge" id="tprice" readonly value="" style="font-weight: bold;font-size:22px;color:green"required>
<input type="hidden" name="p_id" id="p_id" value="" style="font-weight: bold;font-size:22px;color:green"required>
</td>


		</tr>
		<tr>
		<td colspan="3"></td><td colspan="3"></td><td colspan="3"></td><td colspan="3"></td><td colspan="3"></td><td colspan="3"></td>
		
		<?php if($status=='' || $status=='Draft'){echo'
		<td colspan="3">		<button type="submit" name="Submit3">Add</button></td>';}
		else {
			
			echo'<td colspan="3" align="center"><span style="font-size:30px; font-weight:bold;color:red">PO Closed</span></td>
			<td colspan="3" align="center"><span style="font-size:30px; font-weight:bold;color:red">
			<a target="_Blank" href="po_print_new?ono='.$ono4.'">Print PO</a>
			</span></td>
			
			';
		}?>
		</tr>
		
</form>
</table>
<table width="95%" height ="100%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">	
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="8" align="center"><strong>Name</strong></td>
      <td colspan="3" align="center"><strong>Brand </strong></td>
      
      <td colspan="3" align="center"><strong>Unit Price</strong></td>
	  <td colspan="3" align="center"><strong>In Hand</strong></td>
	  <td colspan="3" align="center"><strong>Order Qty</strong></td>
	  <td colspan="3" align="center"><strong>Total Price</strong></td>
	  
<td colspan="1" align="center"><strong>Delete </strong></td>
	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select * from po_table1 where po_id= '$po_id' and po_ono='$ono4' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="left"colspan="8"><?php echo $row["name"]; ?></td>
	  
      
	  <td align="center"colspan="3"><?php echo $row["brand"]; ?></td>
	  <td align="center"colspan="3" ><?php echo $row["uprice"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["stock"]; ?></td> 
	  <td align="center"colspan="3"><?php echo $row["o_qty"]; ?></td> 
<td align="center"colspan="3"><?php echo $row["tprice"]; ?></td> 	  
      
	  
	  <?php 
	  $id=$row["id"];
	  $user7=$row["user"];
	  $url7 = "delete_po_item?id=$id&ono=$encryption"; 
	  
	  if($user7==$full and $status==''){echo"
	  <td colspan='1' align='center'><a href='$url7'>Delete</a></td>
	  ";} else{echo"<td colspan='1'></td>";}?>	
	  
  	  

	  
      </tr>
    <?php $count++; } ?>


</table>

<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				

				document.getElementById("brand").value = "";
				document.getElementById("code").value = "";
				
				
				//document.getElementById("pp").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("tqty").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"uprice").value = myObj[1];
							
							
							
							document.getElementById(
							"code").value = myObj[2];
							
							document.getElementById(
							"brand").value = myObj[3];
							
							//							document.getElementById(
							//"location").value = myObj[4];
							
							document.getElementById(
							"p_id").value = myObj[6];
							
							//document.getElementById(
							//"pp").value = myObj[3];
							
							//document.getElementById(
							//"qty").value = 0;
							if(myObj[0]>0){
							document.getElementById('tqty').style.color = "green";}
else {
							document.getElementById('tqty').style.color = "red";}							

					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "stock_medi_pharmacy.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  



</body>

</html>
