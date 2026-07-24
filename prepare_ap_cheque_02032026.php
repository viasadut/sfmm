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

$sel95w="SELECT * FROM suppliers_master WHERE `supplier_code`='$cname';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);
$bank_name=$data['bank_name'];  


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

$bankno=$_REQUEST['bankno'];
$chequeno=$_REQUEST['chequeno'];
$cheque_amount=$_REQUEST['cheque_amount'];
$gtotal1=$_REQUEST['gtotal'];
$gtotal = (int) str_replace(",", "", $gtotal1);
$p_remarks=$_REQUEST['p_remarks'];
$cheque_date=$_REQUEST['cheque_date'];



$sel95w="SELECT COUNT(id) FROM cheque_registers WHERE `status`='1' and bank_account_code='619910';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);



if($cheque_amount!=$gtotal){

    echo '<script language="javascript">';
    echo 'alert("Cheque Amount and Total Amount is not equal"); ';
    echo '</script>';

    //$url = "prepare_ap_cheque?cname=$cname";
    //header("refresh:5; Location: $url"); 
	
}

//else if()


else if($data['COUNT(id)']>0 and $user!=''){


    

    foreach($_POST['update'] as $updateid){


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
      $eqty2 = $_POST['eqty1_'.$updateid];
      $date=date('Y-m-d');
      $time=date('Y-m-d H:i:s');

      $objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
      $objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");
      

     
      $qq = mysqli_query($objConnect,"select * from acct_ap where id='".$updateid."'");
      $dd = mysqli_fetch_assoc($qq);
      $ono = $dd["pono"];
      $creditor_name = $dd["creditor_code"];
      $payable=$dd['payable'];
      $paid=$dd['paid'];
      $aid=$dd['id'];
      $grn=$dd['grn'];
      $new_pay=$paid+$eqty2;
      $invoice_no=$dd['invoice_no'];

      
      $qq1 = mysqli_query($objConnect,"select COUNT(billno) from pms_bill_payment where invoice_no='$invoice_no' and remarks='FULL'");
      $dd1 = mysqli_fetch_assoc($qq1);
      $count_in=$dd1['COUNT(billno)'];
      
              //echo $updateid;
          $eqty2 = $_POST['eqty1_'.$updateid];
      $add_time=date('Y-m-d H:i:s');
      $re_date=date('Y-m-d');
      
      if($eqty2>0 and $payable==$new_pay and $count_in==0){


      $sql = "insert into pms_bill_payment(creditor_name,cheque_amount,bankno,chequeno,gtotal,remarks,user,date,time,grn,pono,a_id,invoice_no,p_remarks,approve_status) VALUES
    ('$creditor_name','$cheque_amount','$bankno','$chequeno','$eqty2','FULL','$user','$cheque_date','$time','$grn','$ono','$aid','$invoice_no','$p_remarks','1')";
    
      
      if ($conn->query($sql) === TRUE) {
      $last_id = $conn->insert_id;

      
       
        
        //if($payable==$eqty2){
        
        $ins_query1="update acct_ap set paid='$new_pay', status='Paid',payment_id='$last_id' where id='$updateid'";
        mysqli_query($con,$ins_query1) or die(mysql_error());
        }

       
       // }
    //}

}

else if($eqty2>0 and $payable>$new_pay and $count_in==0){



  $sql = "insert into pms_bill_payment(creditor_name,cheque_amount,bankno,chequeno,gtotal,remarks,user,date,time,grn,pono,a_id,invoice_no,p_remarks,approve_status) VALUES
('$creditor_name','$cheque_amount','$bankno','$chequeno','$eqty2','PARTIAL','$user','$cheque_date','$time','$grn','$ono','$aid','$invoice_no','$p_remarks','1')";

  
  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

  
   
    
    //if($payable==$eqty2){
    
    $ins_query1="update acct_ap set paid='$new_pay', status='Partially Paid',payment_id='$last_id' where id='$updateid'";
    mysqli_query($con,$ins_query1) or die(mysql_error());
    }

    else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
   // }
//}

}


  
  
  $conn->close();


}

$updated_at=date('Y-m-d H:i:s');
$as_date=date('Y-m-d 00:00:00');
$ins_query15="update cheque_registers set status='2', assigned_to='$creditor_name',updated_by='$user',updated_at='$updated_at',amount='$cheque_amount', assinged_at='$as_date' where cheque_number='$chequeno'";
mysqli_query($con,$ins_query15) or die(mysql_error());

              
            }

            
			}


        
        
    }

	
	
	

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Cheque Prepare Form</title>
  
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
			url: "get_cheque.php",
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
   
	  
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


  



<form action="" method="post">
   
<table width="95%" height ="100%" border="0" align="center" bgcolor="lightblue" style="border-collapse:collapse;">	
			
			
		
		
	
						
						 
						
		
<tr>
		<td colspan="10"style="font-weight: bold;font-size:14px;color:red"> Company Name:<br> <span style="font-weight: bold;font-size:25px;color:green"><?php echo $data['supplier_name'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Address: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['address'];?></span></td>
		
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Contact No: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['contact_person'].' ('. $data['contact_person_phone'].' )';?></span></td>
		
		
		
		</tr>
			
						 
						
		
	
</table>

</form>
  

<form name="frmMain1" action="" method="post" > 
<table width="95%" height ="100%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">	
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="3" align="center"><strong>GRN NO</strong></td>
      <td colspan="3" align="center"><strong>PO NO </strong></td>
      
      <td colspan="3" align="center"><strong>INVOICE NO</strong></td>
	  <td colspan="2" align="center"><strong>REMARKS</strong></td>
	  <td colspan="2" align="center"><strong>Invoice AMOUNT</strong></td>
    <td colspan="2" align="center"><strong>PAYABLE AMOUNT</strong></td>
    <td colspan="2" align="center"><strong>PAID AMOUNT</strong></td>
	  <td colspan="2" align="center"><strong>PAYING AMOUNT</strong></td>
	  
	  
	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
//$sel_query="SELECT * FROM acct_ap WHERE creditor_code = '".$cname."' and status in ('AP DONE','Partially Paid') order by id asc";
$sel_query="SELECT * FROM acct_ap WHERE creditor_code = '".$cname."' and status in ('Waiting For Payment','Partially Paid') order by id asc";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="center"colspan="3"><?php echo $row["grn"]; ?></a></td>
	  
      
	  <td align="center"colspan="3"><?php echo $row["pono"]; ?></td>
	  <td align="center"colspan="3" ><?php echo $row["invoice_no"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["remarks"]; ?></td> 
    <td align="center"colspan="2"><?php echo $row["amount"];?>
    <br>
    <?php  echo  "VAT: ".$row["vat"]."";?>
    <br>
    <?php  echo  "TAX: ".$row["tax"]."";?>
  
    
    
     </td> 
      <td align="center"colspan="2"><?php echo $row["payable"]; ?></td> 
      <td align="center"colspan="2"><?php echo $row["paid"]; ?>
    
      
    </td> 
	  
	  
<td colspan="1" hidden>
<input type="number" class="row_total" name="row_total[]" value="0" readonly>
</td>



<?php 
$id=$row["id"];
$tt=$row['payable'];
$tt1=$row['paid'];
$tt3=$tt-$tt1;
?>
<input type='hidden' class="paid3"  id="paid3" readonly style="font-weight: bold;font-size:35px;color:red" value="<?php echo $tt3;?>">
<?php 
if($row['paid']<=0 and $row['payable']!=$row['paid'])
{echo'
<td align="center"colspan="2"><input class="paid" name="eqty1_'.$id.'" id="paid" value="0"type="number" max="'.$tt.'" required onchange="subTotal()" style="font-weight: bold;font-size:35px;color:red">


</td>


<input type="checkbox" name="update[]" value="'.$id.'" checked hidden>
';}

else if($row['paid']>0 and $row['payable']!=$row['paid'])
{echo'
<td align="center"colspan="2"><input class="paid" name="eqty1_'.$id.'" id="paid" value="0" type="number" max="'.$tt3.'" required onchange="subTotal()" style="font-weight: bold;font-size:35px;color:red">


</td>


<input type="checkbox" name="update[]" value="'.$id.'" checked hidden>
';}
?>						





      </tr>
    <?php $count++; } ?>


    
	<td colspan="20"align="right" style="font-weight: bold;font-size:35px;color:red;text-align:right">Grand Total<input id='gtotal' name='gtotal' style="font-weight: bold;font-size:35px;color:red" readonly></td>
</tr>
<tr>
    <td colspan="5"> 
			<select name="bankno" class="country" value=''required style="width:150px;">
<option>--Select Bank--</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct bank_code FROM bank_info where status='Active'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo '619910'; ?>"><?php echo $row['bank_code']; ?></option>
        <?php
	} 
?>
</select>
</td>


	<td colspan="5">		       
		
		
									
									
									
			<select name="chequeno" class="state" value='' required style="width:150px;">

</select>

<script>
$(document).ready(function() {
    $('.state').select2(
	
	
	);
	
	
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

<td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red;text-align:right">Cheque Amount<input id='ooo' name='cheque_amount' style="font-weight: bold;font-size:35px;color:red" required></td>
<tr>
<td align="left" colspan="5">Cheque Date</td>  
<td align="left" colspan="15"><input class="cheque" name="cheque_date" id="cheque_date" value="" type="date" placeholder="Cheque Date" required size="30"></td>
</tr>

<tr>
<td align="left" colspan="5">Remarks</td>  
<td align="left" colspan="15"><input class="invoice" name="p_remarks" id="invoice" value="" type="text" placeholder="Remarks" required size="30"></td>
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

//document.getElementById("gtotal").value=gt;
document.getElementById("gtotal").value=gt.toLocaleString('en-US');
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


<?php
//$sql4="SELECT COUNT(id) as t_count FROM acct_ap WHERE creditor_code = '".$cname."' and status in('AP DONE','Partially Paid') order by id asc";
$sql4="SELECT COUNT(id) as t_count FROM acct_ap WHERE creditor_code = '".$cname."' and status not in('Paid') order by id asc";
$result4 = mysqli_query($con,$sql4);
$data_count=mysqli_fetch_array($result4);

if($data_count['t_count']>0){echo'
	<td colspan="30" align="right"><input type="submit" value="Confirm" name="but_update"><br><br></td>';}?>

</tr>
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
$sel_query="SELECT * FROM pms_bill_payment WHERE creditor_name = '".$cname."' group by chequeno order by billno desc";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

    <td align="center" colspan="1"><?php echo $count; ?></td>
      
           
	  <td align="center"colspan="4"><?php echo $row["a_id"]; ?></td>
	  
	  <td align="center"colspan="4"><?php echo $row["chequeno"]; ?></td> 
    <td align="center"colspan="3"><?php echo $row["pono"]; ?></td>	 	  
<td align="center"colspan="3"><?php echo $row["grn"]; ?></td>	  

<td align="center"colspan="2"><?php echo $row["bankno"]; ?></td>	  
<td align="center"colspan="2"><?php echo $row["user"]; ?></td>	  
<td align="center"colspan="1"><?php echo $row["time"]; ?></td>	  

<td align="center"colspan="1"><a target='_Blank' href="print_allocate_cheque?cname=<?php echo $row['creditor_name']; ?>&chequeno=<?php echo $row['chequeno']; ?>&id=<?php echo $row['id']; ?>">Print</a></td>	  
      
	  





      
    <?php $count++; } ?>


    </form>



</body>

</html>

</body>

</html>


<script>
document.addEventListener("input", function(e) {

    if (
        e.target.classList.contains("paid")
    ) {
        updateRowAndGrand(e.target);
    }

});

function updateRowAndGrand(qtyInput) {

    let row = qtyInput.closest("tr");

    let available = Number(row.querySelector(".paid3").value);
    let qty       = Number(row.querySelector(".paid").value);
    let price     = Number(row.querySelector(".price").value);
    let rowTotal  = row.querySelector(".row_total");

    // 🔴 Prevent selling more than available
    if (qty > available) {
        alert("You cannot Receive more than Ordered Qty !");
        qtyInput.value = available;
        qty = available;
    }

  }
</script>
