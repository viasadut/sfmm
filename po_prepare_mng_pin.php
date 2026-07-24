<?php
include_once 'dbconfig.php';
?>

<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng')"; 
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

 $ono=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
   // $ono = $decryption;

//include("auth.php");
//echo $count1;

$runningTime = date('dmisi');


$sel95w="SELECT * FROM po_table WHERE `ono`='$ono';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);
$po_ono=$ono;
$po_id=$data['id'];  
$status=$data['status']; 
$po_type=$data['po_type'] ;

								
								$simple_string1 = $data['id'];
								$ciphering1 = "AES-128-CTR";
								$iv_length1 = openssl_cipher_iv_length($ciphering1);
								$options1 = 0;
								$encryption_iv1 = '123esed';
								$encryption_key1 = "kpj1";
								$encryption1 = openssl_encrypt($simple_string1,
								$ciphering1,
								$encryption_key1, $options1, $encryption_iv1);
								$encryption1;
								

								

?>


<?php
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
<meta charset="utf-8">
<title>View Records</title>
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>

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



<!-- Form Title -->
		<h1>Purchase Order Form</h1>

  
  <?php 
  
  
  
  if($status=='FORWARD FOR APPROVAL' and $user=='1601'){echo'<div style="position: relative;left: 865px;">
  <a target="_blank" href="po_upload_view?ono='.$ono.'&eid='.$simple_string1.'"><img src="view.png" title="View Quotation" width="50" height="50" />
   
      </a> 
<a onclick="return confirm_click1();" href="po_reject_con?id='.$po_id.'&ono='.$_REQUEST['ono'].'"><strong><img src="reject.png" title="Reject PO" width="50" height="50" /></strong></a>

   </a>    
     
<a target="_blank" href="po_request_comparison11?sno='.$po_ono.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
</a>

<input type="button" name="edit" value="Approve" id="'.$po_id.'" class="btn btn-info btn-xs edit_data">
</div>
';}



else if($status=='FORWARD FOR CEO APPROVAL' and $user=='cfo')

 {echo'<div style="position: relative;
  left: 1065px;">
<strong><img src="white.png" title="Forwarded To CEO" width="50" height="50" /></div>
';}

else if($status=='FORWARD FOR CEO APPROVAL' and $user=='md'){echo'<div style="position: relative;left: 865px;">
<a target="_blank" href="po_upload_view?ono='.$ono.'&eid='.$simple_string1.'"><img src="view.png" title="View Quotation" width="50" height="50" />

<a onclick="return confirm_click1();" href="po_reject_con?id='.$po_id.'&ono='.$_REQUEST['ono'].'"><strong><img src="reject.png" title="Reject PO" width="50" height="50" /></strong></a>

   </a>    
<a target="_blank" href="po_request_comparison11?sno='.$po_ono.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
</a>   
<input type="button" name="edit" value="Approve" id="'.$po_id.'" class="btn btn-info btn-xs edit_data">
</div>
';}



else if($status=='FORWARD FOR CEO APPROVAL' and $user=='md01'){echo'<div style="position: relative;left: 865px;">
     <a target="_blank" href="po_upload_view?ono='.$ono.'&eid='.$simple_string1.'"><img src="view.png" title="View Quotation" width="50" height="50" />
     
     <a onclick="return confirm_click1();" href="po_reject_con?id='.$po_id.'&ono='.$_REQUEST['ono'].'"><strong><img src="reject.png" title="Reject PO" width="50" height="50" /></strong></a>
     
        </a>    
     <a target="_blank" href="po_request_comparison11?sno='.$po_ono.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
     </a>   
     <input type="button" name="edit" value="Approve" id="'.$po_id.'" class="btn btn-info btn-xs edit_data">
     </div>
     ';}
     
else if($status=='Approved' and $user=='ceo'){echo'<div style="position: relative;left: 1065px;">
<strong><img src="white.png" title="Already Approved By CEO" width="50" height="50" /></div>

   </a>     

</div>
';}


?>

  </div>

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
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red" id="<?php echo $data["sup_code"];?>"> Supplier Code: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php  if($data['com_add']==''){echo $data['sup_code'];} else {echo $data['com_add'];}?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"> Creditor Code: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['creditor_code'];?></span></td>
		
		
		
		
		
		</tr>
						
						 
						
		  
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Amount Discount:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['amount_discount'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Percentage Discount: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['percentage_dis'];?></span></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red"></td>
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Subamount:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['subamount'];?></span></td>
		
		
		
		
		<tr>
						
						 
						
		
		  <tr>
		
		<td colspan="5" style="font-weight: bold;font-size:14px;color:red">Total Amount: <br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['total_amount'];?></span></td>
		
		
		
		</tr>
						
						 
						
		
		  
			     
  						 
						
		  <tr>
		<td colspan="5"style="font-weight: bold;font-size:14px;color:red"> Purchase Order Date:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['po_date'];?></span></td>
		
		
		
		</tr>
						
						 
						
		
				<tr><td colspan="20"style="font-weight: bold;font-size:14px;color:red"> Remarks:<br> <span style="font-weight: bold;font-size:18px;color:green"><?php echo $data['remarks'];?></span></td>
				
				
				</tr> 



</table>



  

		
			

			
		
			
       
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
	  

	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select * from po_table1 where po_id= '$po_id' and po_ono='$ono' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="left"colspan="8"><a target='_blank' href="<?php if($po_type=='Pharmacy'){echo 'all_product_list5_pharmacy';}
      else if($po_type!='Pharmacy'){echo 'all_product_list5_purchase1';}?>
      ?id=<?php echo $row['code'];?>"><?php echo $row["name"]; ?></a>
     <br />
      <?php echo $row["p_remarks"]; ?>
     </td>
	  
      
	  <td align="center"colspan="3"><?php echo $row["brand"]; ?></td>
	  <td align="center"colspan="3" ><?php echo $row["uprice"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["stock"]; ?></td> 
	  <td align="center"colspan="3"><?php echo $row["o_qty"]; ?></td> 
<td align="center"colspan="3"><?php echo $row["tprice"]; ?></td> 	  
      
	  
	  
	  
  	  

	  
      </tr>
    <?php $count++; } ?>


</table>



</body>

</html>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Assign Liver Clinic Doctor</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>PO NO</label>  
                          <input type="text" name="pmrn" id="po_no" class="form-control" size="15" readonly>  
						   
						                           
                          <label>PO Type</label>  
                          <input type="text" name="ppluse" id="po_type" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Request Department</label>                          
                          <input type="text" name="app_date" id="req_department" class="form-control"readonly>
						  
						  <label>Creditor Code</label>                          
                          <input type="text" name="temp" id="creditor_code" class="form-control"readonly>
                         
                          <input type="hidden" name="employee_id" id="employee_id" />  

 <label>Total Amount</label>                          
                          <input type="text" name="pbp1" id="total_amount" class="form-control"readonly>
                         						 
						  
		                        

                          
						  <label>PIN NO</label>  
                          <input type="password" name="pin_no" id="pin_no" class="form-control"  size="15" required>  
						  
                          
					<br>	  
						  <label><input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success"></label>  
					 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"po_approval_cfo.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#po_no').val(data.id);  
                     $('#po_type').val(data.po_type);  
					 $('#req_department').val(data.req_department);  
					$('#creditor_code').val(data.creditor_code); 
					 $('#total_amount').val(data.total_amount); 
					 //$('#pin_no').val(data.total_amount); 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Confirm");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#po_no').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"po_confirm_with_pin.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>


<script>  
$(document).ready(function(){ 

 $('a').tooltip({
  classes:{
   "ui-tooltip":"highlight"
  },
  position:{ my:'left center', at:'right+50 center'},
  content:function(result){
   $.post('fetch_sup.php', {
    id:$(this).attr('id')
   }, function(data){
    result(data);
   });
  }
 });
  
});  
</script>
