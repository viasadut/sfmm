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
$id=$_REQUEST['cname'];

$sel95w1="SELECT * FROM acct_ap WHERE `id`='$id';";
$result95w1 = mysqli_query($con,$sel95w1);
$data1=mysqli_fetch_assoc($result95w1);
$creditor=$data1['creditor_code'];
$grn=$data1['grn'];

$sel95w="SELECT * FROM suppliers_master WHERE `supplier_code`='$creditor'";
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
$gtotal=$_REQUEST['gtotal'];
$p_remarks=$_REQUEST['p_remarks'];


    

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
      $vat = $_POST['vat_'.$updateid];
      $tax = $_POST['tax_'.$updateid];
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
      if($user!=''){
      $ins_query1="update acct_ap set status='Forwarded', f_date='$re_date',f_time='$add_time',f_by='$user',f_remarks='$p_remarks' where id='$updateid'";
      mysqli_query($con,$ins_query1) or die(mysql_error());
      }

      else{

echo "Something Went Wrong !!";
      }
        
    }

	
            }
          }
        
	

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>AP Form</title>
  
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
   
<table width="100%" height ="100%" border="0" align="center" bgcolor="lightblue" style="border-collapse:collapse;">	
			
			
<tr>
      
      <td colspan="20" bgcolor="lightblue" style="text-align:right">
      <a target="_blank" href="grn_upload_view?grn=<?php echo $grn;?>"><img src="upload.png" title="Upload GRN Documents" width="50" height="50" />
     </a>  </td>
  
        </tr>
		
	
						
						 
						
		
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
      
      <td colspan="1" align="center"><strong>GRN NO</strong></td>
      <td colspan="1" align="center"><strong>PO NO </strong></td>
      
      <td colspan="1" align="center"><strong>INVOICE NO</strong></td>
	  <td colspan="1" align="center"><strong>REMARKS</strong></td>
	  <td colspan="2" align="center"><strong>PAYABLE AMOUNT</strong></td>
    <td colspan="2" align="center"><strong>PAID AMOUNT</strong></td>
	  <td colspan="2" align="center"><strong>VAT</strong></td>
    <td colspan="2" align="center"><strong>TAX</strong></td>
	  
	  
	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
//$sel_query="SELECT * FROM acct_ap WHERE creditor_code = '".$cname."' and status in ('AP DONE','Partially Paid') order by id asc";
$sel_query="Select * from acct_ap where status!='Forwarded' and id='$id'";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="center"colspan="1"><?php echo $row["grn"]; ?></a></td>
	  
      <?php 
$id=$row["id"];
$tt=$row['payable'];
$tt1=$row['paid'];
$tt3=$tt-$tt1;
$po_no=$row["pono"];

$queryc_ap = "SELECT * FROM po_table where ono='$po_no'"; 
$resultc_ap = mysqli_query($con, $queryc_ap) or die(mysqli_error());
$rowc_ap = mysqli_fetch_array($resultc_ap);


?>

	  <td align="center"colspan="1"><?php echo $rowc_ap["id"]; ?></td>
	  <td align="center"colspan="1" ><?php echo $row["invoice_no"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["remarks"]; ?></td> 
      
      <td align="center"colspan="2"><?php echo $row["payable"]; ?></td> 
      <td align="center"colspan="2"><?php echo $row["paid"]; ?></td> 
	  
	  




<input type='hidden' class="paid3" type="number"  id="paid3"required style="font-weight: bold;font-size:35px;color:red" value="<?php echo $tt3;?>">
<?php if($row['paid']<=0 and $row['payable']!=$row['paid'])
{echo'
  <td align="center"colspan="2" hidden><input class="paid1" name="vat_'.$id.'" id="paid" value="0"type="number" max="'.$tt.'" required onchange="subTotal()" style="font-weight: bold;font-size:35px;color:red">


  </td>



  <td align="center" colspan="2" hidden><input class="paid" name="tax_'.$id.'" id="paid" value="0"type="number" max="'.$tt.'" required onchange="subTotal()" style="font-weight: bold;font-size:35px;color:red">


  </td>

  

<input type="checkbox" name="update[]" value="'.$id.'" checked hidden>
';}

else if($row['paid']>0 and $row['payable']!=$row['paid'])
{echo'

  <td align="center"colspan="2"><input class="paid1" name="eqty1_'.$id.'" id="paid" value="0" type="number" max="'.$tt3.'" required onchange="subTotal()" style="font-weight: bold;font-size:35px;color:red">


</td>

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
<td align="left" colspan="5">Remarks</td>  
<td align="left" colspan="15"><input class="invoice" name="p_remarks" id="invoice" value="" type="text" placeholder="Remarks" required size="30"></td>
</tr>
  
<script>
//gt=0;
var iprice=document.getElementsByClassName('paid');
var iprice1=document.getElementsByClassName('paid1');
var payable=document.getElementById("paid3").value;

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
//gt=(Math.round(+gt + +((iprice[i].value)*payable/100)+((iprice1[i].value)*payable/100)));

gt=iprice[i].value;
gt3=iprice1[i].value;
}
//gtotal.innerText=gt;
//gtt=gt-dis_amount;

document.getElementById("gtotal").value=(payable-gt-gt3).toLocaleString('en-US');
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
$sql4="SELECT COUNT(id) as t_count FROM acct_ap WHERE id = '".$id."' and status='' order by id asc";
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
