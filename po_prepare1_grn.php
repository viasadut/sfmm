<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
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
    $ciphering = "AES-256-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $ono = $decryption;


//include("auth.php");
//echo $count1;

$runningTime = date('dmisi');


$sel95w="SELECT * FROM po_table WHERE `ono`='$ono';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);
$po_ono=$data['ono'];  
$po_id=$data['id'];  

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


            else {
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
		$runningTime = $dd["id"]+ date('dimis');			
					//echo $updateid;
				$eqty2 = $_POST['eqty1_'.$updateid];
				$expiry = date('Y-m-d',strtotime($_POST['expiry_'.$updateid]));
				
				$batchno = $_POST['batchno_'.$updateid];
				$expiry = date('Y-m-d',strtotime($_POST['expiry_'.$updateid]));
				
				$batchno = $_POST['batchno_'.$updateid];
				
				$tprice = $uprice * $eqty2;
	

$sel95w="SELECT COUNT(id) FROM medi_stock WHERE `code`='$code' and location='Pharmacy' and batch_no='$batchno' and add_qty>0;";
$result95w = mysqli_query($con,$sel95w);
$b_chkw=mysqli_fetch_assoc($result95w);
$count_qtyw=$b_chkw['COUNT(id)'];
	
	
$sel95wz="SELECT * FROM medi_stock WHERE `code`='$code' and location='Pharmacy' and batch_no='$batchno' order by id desc limit 1;";
$result95wz = mysqli_query($con,$sel95wz);
$b_chkwz=mysqli_fetch_assoc($result95wz);
$row_id=$b_chkwz['id'];
$new_qty=$b_chkwz['add_qty'] + $eqty2;
//$new_given=$b_chkwz['given_qty'] + $add_qty;	


				
			$eqty3 =$recevied + $eqty2;
					if($eqty2>0 and $recevied==0 and $count_qtyw==0){
					$ins_query1="update po_table1 set status='Updated',r_qty='$eqty2' where id='$updateid'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query2="insert into medi_stock (`code`,`location`,`g_name`,`b_name`,`add_qty`,`exdate`,`batch_no`,`rfid`,`sno`,`u_price`,`t_price`)
values('$code','Pharmacy','$g_name','$b_name','$eqty2','$expiry','$batchno','$runningTime','$pono','$uprice','$tprice')";
mysqli_query($con,$ins_query2) or die(mysql_error());

					}
					
					
	else if($eqty2>0 and $recevied==0 and $count_qtyw>0){
					$ins_query1="update po_table1 set status='Updated',r_qty='$eqty2' where id='$updateid'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query2="update medi_stock set `add_qty`='$new_qty' where id='$row_id' and location='Pharmacy'";
mysqli_query($con,$ins_query2) or die(mysql_error());

					}				
					
					else if($eqty2>0 and $recevied>0 and $count_qtyw==0){
					$ins_query1="update po_table1 set status='Updated',r_qty='$eqty3' where id='$updateid'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into medi_stock (`code`,`location`,`g_name`,`b_name`,`add_qty`,`exdate`,`batch_no`,`rfid`,`sno`,`u_price`,`t_price`)
values('$code','Pharmacy','$g_name','$b_name','$eqty2','$expiry','$batchno','$runningTime','$pono','$uprice','$tprice')";
mysqli_query($con,$ins_query2) or die(mysql_error());
					}
					
					
					else if($eqty2>0 and $recevied>0 and $count_qtyw>0){
					$ins_query1="update po_table1 set status='Updated',r_qty='$eqty3' where id='$updateid'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="update medi_stock set `add_qty`='$new_qty' where id='$row_id' and location='Pharmacy'";
mysqli_query($con,$ins_query2) or die(mysql_error());

					}
				}
			}
/*$code = $_REQUEST['code'];
$g_name = $_REQUEST['g_name'];
$b_name = $_REQUEST['b_name'];
$order_qty=$_REQUEST['order_qty'];
$u_price=$_REQUEST['u_price'];
$t_price=$_REQUEST['tcharge'];
$stock=$_REQUEST['stock'];
$batch_no=$_REQUEST['batch_no'];
$p_id=$_REQUEST['p_id'];

		
$ins_query1="update po_table1 set status='Updated' where po_ono='1005381238p01'";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/




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
      
      <td colspan="8" align="center"><strong>Name</strong></td>
      <td colspan="3" align="center"><strong>Brand </strong></td>
      
      <td colspan="3" align="center"><strong>Unit Price</strong></td>
	  <td colspan="3" align="center"><strong>In Hand</strong></td>
	  <td colspan="3" align="center"><strong>Order Qty</strong></td>
	  <td colspan="3" align="center"><strong>Received Qty</strong></td>
	  <td colspan="3" align="center"><strong>Total Price</strong></td>
	  
<td colspan="1" align="center"><strong>Edit </strong></td>
	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select * from po_table1 where po_id= '$po_id' and po_ono='$po_ono' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="center"colspan="8"><a target='_blank' href="all_product_list5?id=<?php echo $row['pid'];?>"><?php echo $row["name"]; ?></a></td>
	  
      
	  <td align="center"colspan="3"><?php echo $row["brand"]; ?></td>
	  <td align="center"colspan="3" ><?php echo $row["uprice"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["stock"]; ?></td> 
	  <td align="center"colspan="3"><?php echo $row["o_qty"]; ?></td>
<td align="center"colspan="3"><?php echo $row["r_qty"]; ?></td>	  
<td align="center"colspan="3"><?php echo $row["tprice"]; ?></td> 	  
      
	  



<?php 
$id=$row["id"];
$tt=$row['o_qty'];
$tt1=$row['r_qty'];
$tt3=$tt-$tt1;
?>
<?php if($row['r_qty']=='' and $row['o_qty']!=$row['r_qty'] || $row['o_qty']<$row['r_qty'])
{echo'
<td align="center"colspan="1"><input class="iquantity" name="eqty1_'.$id.'" id="eqty1" value="0"type="number" max="'.$tt.'" required></td>
<td align="center"colspan="1"><input class="expiry" name="expiry_'.$id.'" type="date" min="'.date('Y-m-d').'" required></td>
<td align="center"colspan="1"><input class="batchno" name="batchno_'.$id.'" type="text" required></td>
<input type="checkbox" name="update[]" value="'.$id.'" checked hidden>
';}

else if($row['r_qty']!='' and $row['o_qty']!=$row['r_qty'] || $row['o_qty']<$row['r_qty'])
{echo'
<td align="center"colspan="1"><input class="iquantity" name="eqty1_'.$id.'" id="eqty1" value="0"type="number" max="'.$tt3.'" required></td>
<td align="center"colspan="1"><input class="expiry" name="expiry_'.$id.'" type="date" min="'.date('Y-m-d').'" required></td>
<td align="center"colspan="1"><input class="batchno" name="batchno_'.$id.'" type="text" required></td>
<input type="checkbox" name="update[]" value="'.$id.'" checked hidden>
';}
?>						



      </tr>
    <?php $count++; } ?>











	   
	   
	 



	  
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


	
	<td colspan='10' align='right'><input type='submit' value='Confirm' name='but_update'><br><br></td></tr>
	
	
	 </table>
            </form>
        </div>


</body>

</html>
