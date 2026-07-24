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

$sup_code=$_REQUEST['ono'];
$grn=$_REQUEST['grn'];
$ono=$_REQUEST['ono'];
$encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-256-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    //$ono = $decryption;


//include("auth.php");
//echo $count1;

//$runningTime = date('dmisi');


$sel95w="SELECT * FROM po_table WHERE `ono`='$ono';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);
$po_ono=$data['ono'];  
$po_id=$data['id'];  
$req_dept=$data['req_department'];
$creditor_code=$data['creditor_code'];
$po_amount=$data['total_amount'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['but_update']))
{


  $eqty2 = $_REQUEST['eqty1'];
  $bank_name = $_REQUEST['bank_name'];
  $cheque_no = $_REQUEST['chequeno'];
  $cheque_date = $_REQUEST['chequedate'];
  $remarks=$_REQUEST['remarks'];

              $objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
              $objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");
        
              $qq = mysqli_query($objConnect,"select * from po_table where id='".$po_id."'");
              $dd = mysqli_fetch_assoc($qq);
              $ono = $dd["ono"];
              $payable = $dd["total_amount"];
              $paid = $dd["payment_done"];
              $payment=$paid+$eqty2;
              
              $runningTime = $dd["id"]+ date('dmisi');
              
              

              $apptime=date('Y-m-d H:i:s');

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
              
              
              if($user !='' and $payment<=$payable){
                
                $r_s='Confirmed By Consultant';
                $r_d=date('d/m/Y H:i:s');
                $nmrn='NEW MRN';
                $particulars='OPD Consultation';
                $status='Booked';
                $ipd='AE';
              $ipd1='AE ADVANCE';  
                $regi='100';
                $notseen='NOT SEEN';
                $ccgg1new_test1='ccgg1new_test1';
              $payment_status='PAID';
              $billinipd='';
                
              $time=date('Y-m-d H:i:s');
                
                $sql1 = "insert into pms_payment_old (req_dept,creditor_name,po_amount,paying_amount,bank_name,cheque_no,cheque_date,remarks,
                user,time,ono) values
                ('$req_dept', '$creditor_code', '$po_amount', '$eqty2', '$bank_name', '$cheque_no', '$cheque_date', '$remarks', '$user', '$time', '$ono')";
              
              
              
              if ($conn->query($sql1) === TRUE) {
                $last_id = $conn->insert_id;
              



                  
      		//echo $updateid;
				
				
			
			
			
					if($eqty2>0 and $payment==$payable){
					$ins_query1="update po_table set payment_status='Paid',payment_done='$payment' where id='$po_id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

/*$ins_query2="insert into purchase_stock (`code`,`location`,`g_name`,`b_name`,`add_qty`,`exdate`,`batch_no`,`rfid`,`sno`,`u_price`,`t_price`)
values('$code','Store','$g_name','$b_name','$eqty2','$expiry','$batchno','$runningTime','$pono','$uprice','$tprice')";
mysqli_query($con,$ins_query2) or die(mysql_error());*/
					}
					
					else if($eqty2>0 and $payment<$payable){
					$ins_query1="update po_table set payment_status='Partially Paid',payment_done='$payment' where id='$po_id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

/*$ins_query2="update purchase_stock set `add_qty`='$new_qty' where id='$row_id' and location='Store'";
mysqli_query($con,$ins_query2) or die(mysql_error());
*/
					}
					
									
					
				}
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
      
      <td colspan="4" align="center"><strong>Req. Dept</strong></td>
      
      
      <td colspan="4" align="center"><strong>Creditor Name</strong></td>
	  <td colspan="3" align="center"><strong>Total Amount</strong></td>
	  <td colspan="2" align="center"><strong>Paying Amount</strong></td>
	  <td colspan="2" align="center"><strong>Bank Name</strong></td>
	  <td colspan="2" align="center"><strong>Cheque No</strong></td>
	  
<td colspan="2" align="center"><strong>Cheque Date </strong></td>

	   </tr>
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select SUM(t_price) from purchase_stock where grn= '$grn' group by grn;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
           
	  <td align="center"colspan="4"><?php echo $row["SUM(t_price)"]; ?></td>
	  
	  <td align="center"colspan="4"><?php echo $row["creditor_code"]; ?></td> 
	  
<td align="center"colspan="3"><?php echo $row["total_amount"]; ?></td>	  

      
	  



<?php 
$id=$row["id"];
$tt=$row['SUM(t_price)'];
$tt1=$row['payment_done'];
$tt3=$tt-$tt1;
?>
<?php if($tt>$tt1)
{echo'
<td align="center"colspan="2"><input class="iquantity" name="eqty1" id="eqty1" value="0"type="number" max="'.$tt3.'" required></td>
<td align="center"colspan="2">';?>
<select name="bank_name" required><option value=''>-Select-</option>
		
    <?php
      $stmt = $DB_con->prepare("select * from `add_company`");
      $stmt->execute();
      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
      {
        ?>
            <option value="<?php echo $row['com_name']; ?>"><?php echo $row['com_name']; ?></option>
            <?php
      } 
    ?>
    </select>	
<?php echo'
<td align="center"colspan="2"><input class="chequeNO" name="chequeno" type="text" required></td>
<td align="center"colspan="2"><input class="ChequeDate" name="chequedate" type="date" required></td>
</tr>


<tr>
<td align="left"colspan="20"><textarea class="remarks" name="remarks" required placeholder="REMARKS"></textarea>
</tr>

';}

?>						



      
    <?php $count++; } ?>











	   
	   
	 



	  

	
	<td colspan='30' align='right'><input type='submit' value='Confirm' name='but_update'><br><br></td></tr>
	
	
	 </table>
            </form>
        </div>




        <form name="done" action="" method="post" > 
<table width="95%" height ="100%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">	
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="4" align="center"><strong>Req. Dept</strong></td>
      
      
      <td colspan="4" align="center"><strong>Creditor Name</strong></td>
	  <td colspan="3" align="center"><strong>Total Amount</strong></td>
	  <td colspan="2" align="center"><strong>Paying Amount</strong></td>
	  <td colspan="2" align="center"><strong>Bank Name</strong></td>
	  <td colspan="1" align="center"><strong>Cheque No</strong></td>
	  
<td colspan="1" align="center"><strong>Cheque Date </strong></td>
<td colspan="1" align="center"><strong>user </strong></td>
<td colspan="1" align="center"><strong>Issue Date </strong></td>
<td colspan="1" align="center"><strong>Print</strong></td>

	   </tr>
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select * from pms_payment_old where ono='$ono' order by `time` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
           
	  <td align="center"colspan="4"><?php echo $row["req_dept"]; ?></td>
	  
	  <td align="center"colspan="4"><?php echo $row["creditor_name"]; ?></td> 
	  
<td align="center"colspan="3"><?php echo $row["po_amount"]; ?></td>	  

<td align="center"colspan="2"><?php echo $row["paying_amount"]; ?></td>	  
<td align="center"colspan="2"><?php echo $row["bank_name"]; ?></td>	  
<td align="center"colspan="1"><?php echo $row["cheque_no"]; ?></td>	  
<td align="center"colspan="1"><?php echo $row["cheque_date"]; ?></td>	  
<td align="center"colspan="1"><?php echo $row["user"]; ?></td>	  
<td align="center"colspan="1"><?php echo $row["time"]; ?></td>	  

<?php
$simple_string1 = $row['billno'];
								$ciphering1 = "AES-256-CTR";
								$iv_length1 = openssl_cipher_iv_length($ciphering1);
								$options = 0;
								$encryption_iv1 = '1234567891011121';
								$encryption_key1 = "kpj";
								$encryption1 = openssl_encrypt($simple_string1,
								$ciphering1,
								$encryption_key1, $options, $encryption_iv1);
								$encryption1;

								
?>




<td align="center"colspan="1"><a target='_Blank' href="po_payment_pdf_new?ono=<?php echo $encryption1; ?>">Print</a></td>	  
      
	  





      
    <?php $count++; } ?>


    </form>










</body>

</html>
