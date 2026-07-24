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

//$user=$_SESSION['sess_username'];

$user=$_SESSION['sess_username'];
$rfid=$_REQUEST['rfid'];
$req_loc=$_REQUEST['req_loc'];

//include("auth.php");
//echo $count1;

$runningTime = date('dmisi');
$tt='Pharmacy';


$sel95wa="SELECT SUM(t_price) FROM purchase_stock3 WHERE `rfid`='$rfid';";
$result95wa = mysqli_query($con,$sel95wa);
$dataa=mysqli_fetch_assoc($result95wa);

$po_value=$dataa['SUM(t_price)'];

$sel95waa="SELECT * FROM purchase_stock3 WHERE `rfid`='$rfid';";
$result95waa = mysqli_query($con,$sel95waa);
$dataaa=mysqli_fetch_assoc($result95waa);

$query = "SELECT * from staff3 where sid='".$user."' and status='Active'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
  
$dept=$row['dept'];
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$remarks = $_REQUEST['remarks'];
$po_date = date('Y-m-d',strtotime($_REQUEST['po_date']));
$record_no = $_REQUEST['record_no'];
$enter_date=date('Y-m-d',strtotime($_REQUEST['enter_date']));

$auth_person=$_REQUEST["auth_person"];
$auth_date=$_REQUEST['auth_date'];
$record_status=$_REQUEST['record_status'];
$issue_person=$_REQUEST['issue_person'];
$issue_date=date('Y-m-d',strtotime($_REQUEST['issue_date']));
$total_amount=$_REQUEST['total_amount'];
$amount_discount=$_REQUEST['amount_discount'];
$percentage_dis=$_REQUEST['percentage_dis'];

$subamount=$_REQUEST['subamount'];
$sup_code=$_REQUEST['sup_code'];
$creditor_code=$_REQUEST['creditor_code'];
$d_department=$_REQUEST['d_department'];
$ex_date=date('Y-m-d',strtotime($_REQUEST['ex_date']));
$expiry_date=date('Y-m-d',strtotime($_REQUEST['expiry_date']));
$payment_terms=$_REQUEST['payment_terms'];
$purchase_department=$_REQUEST['purchase_department'];
$ono=$_REQUEST['ono'];
$po_type=$_REQUEST['po_type'];
$req_department=$_REQUEST['req_department'];
$terms=$_REQUEST['terms'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');
$ittime1= date('Y-m-d H:i:s');

//$ono1=$runningTime+$user;

$ip=$_SERVER['REMOTE_ADDR'];

$e_date=date('Y-m-d');

$query4 = "SELECT COUNT(id) from po_table where enter_date='".$e_date."'"; 
$result4 = mysqli_query($con, $query4) or die ( mysqli_error());
$row4 = mysqli_fetch_assoc($result4);
$s_no=$row4['COUNT(id)']+1;



    //$ip = "195.123.321.456";
    $split = explode(".", $ip);
    $last= $split[3];
    $host=substr($last, -2);

    $ono1='1'.$host.date('ymd').$s_no;




if($user!=''){
		
$ins_query1="insert into po_table (`req_department`,`po_type`,`purchase_department`,`payment_terms`,`expiry_date`,`ex_date`,`d_department`,`creditor_code`,`sup_code`,`subamount`,`percentage_dis`,`amount_discount`,`total_amount`,`issue_date`,`issue_person`,`record_status`,`auth_date`,`auth_person`,`enter_date`,`record_no`,`po_date`,`remarks`,`ono`,`terms`)
values ('$req_department','$po_type','$purchase_department','$payment_terms','$expiry_date','$ex_date','$d_department','$creditor_code','$sup_code','$subamount','$percentage_dis','$amount_discount','$total_amount','$issue_date','$issue_person','$record_status','$auth_date','$auth_person','$enter_date','$record_no','$po_date','$remarks','$ono1','$terms')";
mysqli_query($con,$ins_query1) or die(mysql_error());



								$simple_string = $ono1;
								$ciphering = "AES-128-CTR";
								$iv_length = openssl_cipher_iv_length($ciphering);
								$options = 0;
								$encryption_iv = '1234567891011121';
								$encryption_key = "kpj";
								$encryption = openssl_encrypt($simple_string,
								$ciphering,
								$encryption_key, $options, $encryption_iv);
								$encryption;


//header("Location: add_medi_stock");
//header("Location: medi_bar?g_name=$g_name&rfid=$rfid");


header("Location: po_prepare1_d?ono=$ono1&rfid=$rfid&req_loc=$req_loc");
//header("Location: po_prepare1_d?ono=$encryption&rfid=$rfid&req_loc=$req_loc");
echo '<script language="javascript">';
    echo 'alert("TEST"); ';
    echo '</script>';
		
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
		<h1>Open New Purchase Order</h1>

<form action="" method="post">
        
<table width="95%" height ="100%" border="0" align="center" bgcolor="lightblue" style="border-collapse:collapse;">	
			
			
			
		<tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Purchase Department</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Order NO</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> PO Type</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Request Department</td>
		
		
		
		<tr>
						
						 
						
		<tr>				
						<td colspan="5">
						
						
						<select name="purchase_department" required style="font-weight: bold;font-size:14px;color:green"> <option><?php echo $row['dept'];?></option>
	   
	   	   
	   
	   </select>

	   
      </select>
						
						
						</td>
		

		<td colspan="5"><input name="ono" type="text" size="70" style="text-transform:uppercase" value=""readonly></td>
		
		<td colspan="5">
		
		<select name="po_type" required style="font-weight: bold;font-size:14px;color:green"> <option value="">-Select PO Type-</option>
	   
	   	   <option value='Asset'>Asset</option>
		   <option value='General'>General</option>
		   
		   
			

	   
      </select>
		
		</td>
		
		<td colspan="5">
		
		
		<select name="req_department" required style="font-weight: bold;font-size:14px;color:green"> <option><?php echo $dataaa['location'];?></option>
	   
	   	  

	   
      </select>
		
		
		</td>
		
		
      
	      </tr>  
		  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Delivery Department</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Expected Date</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Expiry Date</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Payment Terms</td>
		
		
		
		<tr>
						
						 
						
		<tr>				
						<td colspan="5">
						
						
							<select name="d_department" required style="font-weight: bold;font-size:14px;color:green"> <option><?php echo $row['dept'];?></option>
	   
	   	  
	   
      </select>
						
						
						</td>
		

		<td colspan="5"><input name="ex_date" type="date" style="text-transform:uppercase" value=""required></td>
		<td colspan="5"><input name="expiry_date" type="date" style="text-transform:uppercase" value=""required></td>
		<td colspan="5">

		<select name="payment_terms" required style="font-weight: bold;font-size:14px;color:green" required>
	   
	   <option value='Cheque'>Cheque</option>	   
	  <option value='Cash'>Cash</option>
	  
	  
	   

  
 </select>
	   

		</td>
		
		
      
	      </tr>  
		  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Supplier Code</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Creditor Code</td>
		<td colspan="10" style="font-weight: bold;font-size:14px;color:red"> </td>
		
		
		
		
		<tr>
						
						 
						
		<tr>				
						<td colspan="5">
						
						<select name="sup_code" class="sup_code" required style="font-weight: bold;font-size:14px;color:green" id="sup_code" onchange="GetDetail(this.value)"> <option>-Select Company-</option>
	   
						<?php 
				
				//$sql = "select * from add_company order by com_name asc";
				$sql = "select * from suppliers_master order by supplier_code asc";
				$res = mysqli_query($con, $sql);
				if(mysqli_num_rows($res) > 0) {
					while($row = mysqli_fetch_object($res)) {
						echo "<option value='".$row->supplier_code."'>".$row->supplier_code."</option>";
					}
				}
				?>

	   
      </select>

							
		<script>
$(document).ready(function() {
    $('.sup_code').select2();
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
		

		<td colspan="5">
		
		<input name="creditor_code" id="con_name" type="text" size="70" style="text-transform:uppercase" value="" readonly required>
		
		
		</td>
		<td colspan="10"><input name="com_add" id="com_add" type="text" size="70" style="text-transform:uppercase" value="" readonly required></td>
		
		
		
      
	      </tr>  
		  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Amount Discount</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Percentage Discount</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Subamount</td>
		
		
		
		
		<tr>
						
						 
						
		<tr>				
						<td colspan="5"><input type="number" name="amount_discount" id="location" required value="0" style="font-weight: bold;font-size:14px;color:green"  required></td>
		

		<td colspan="5"><input name="percentage_dis" type="number" size="70" style="text-transform:uppercase" value="0"required readonly></td>
		<td colspan="5"></td>
		<td colspan="5"><input name="subamount" type="number" size="70" style="text-transform:uppercase" value="0"required readonly></td>
		
		
		
      
	      </tr>  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Issue Person ID</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Issue Date</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Total Amount</td>
		
		
		
		<tr>
						
						 
						
		<tr>				
						<td colspan="5"><input type="text" name="issue_person" id="location" required readonly value="<?php echo $user;?>" style="font-weight: bold;font-size:14px;color:green"></td>
		

		<td colspan="5"><input name="issue_date" type="date" size="70" style="text-transform:uppercase" value="<?php echo date('Y-m-d');?>"required  ></td>
		<td colspan="5"></td>
		<td colspan="5"><input name="total_amount" type="number" size="70" style="text-transform:uppercase" value="<?php echo $po_value;?>"required readonly></td>
		
		
      
	      </tr>  
		  
			     
  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Authorization Person ID</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Authorization Date</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> </td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Record Status</td>
		
		
		
		
		<tr>
						
						 
						
		<tr>				
						<td colspan="5"><input type="text" name="auth_person" id="location" required value="<?php echo $user;?>" style="font-weight: bold;font-size:14px;color:green"></td>
		

		<td colspan="5"><input name="auth_date" type="date" size="70" style="text-transform:uppercase" value=""required></td>
		<td colspan="5"></td>
		<td colspan="5"><input name="record_status" type="text" size="70" style="text-transform:uppercase" value="0"required readonly></td>
		
		
		
      
	      </tr>  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Purchase Order Date</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Record Number</td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> </td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Entered date</td>
		
		
		
		
		<tr>
						
						 
						
		<tr>				
						<td colspan="5"><input type="date" name="po_date" id="location" required value="<?php echo date('Y-m-d');?>" style="font-weight: bold;font-size:14px;color:green"></td>
		

		<td colspan="5"><input name="record_no" type="text" size="70" style="text-transform:uppercase" value="0"required readonly></td>
		<td colspan="5"></td>
		<td colspan="5"><input name="enter_date" type="date" size="70" style="text-transform:uppercase" value="<?php echo date('Y-m-d');?>"required></td>
		
		
		
      
	      </tr>  
		  <tr><td colspan="20"style="font-weight: bold;font-size:14px;color:red"> Remarks</td>
				
				
				</tr> 
				<tr><td colspan="20"><textarea name="remarks" style="text-transform:uppercase" value=""required rows="5" cols="130"></textarea></td>
				
				
				</tr> 
				<tr><td colspan="20"style="font-weight: bold;font-size:14px;color:red"> Trems & Condition</td>
				
				
				</tr> 

				<tr><td colspan="20"><textarea name="terms" style="text-transform:uppercase" value=""required rows="15" cols="130">
1. All Goods not supplied to our specification will be rejected at your own expense.
2. We reserve the right to cancel this order if the above goods are not supplied within the specified time.
3. In order to ensure prompt payment, all Deliver Order, Invoices and other documents related to this order must bear this Purchase Order Number.
4. Any goods supplied without our Purchase Order will not be entertained.

			</textarea></td>
				
				
				</tr> 
		<tr><td colspan="15">		<button type="submit" name="Submit">Add</button></td>
		
  



</table>

</form>
  

		
			
		
</body>

</html>
<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("con_name").value = "";

				document.getElementById("com_add").value = "";
				
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
							("con_name").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"com_add").value = myObj[1];
							
							
						document.getElementById('com_add').style.color = "red";	
						document.getElementById('con_name').style.color = "red";	
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "sup_pull_po.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  