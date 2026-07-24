<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','store','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
?>
<?php
$full = $row39['fullname'];

$user=$_SESSION["sess_username"];

$query40 = "SELECT * FROM staff3 where sid='$fullname'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$sid1=$row40['sid1'];
$cat=$row40['cat'];
$account_type=$_REQUEST['account_type'];
$sdate=$_REQUEST['date'];
$edate=$_REQUEST['date1'];
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
?>

<!DOCTYPE html>
<html>
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
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Payment Details </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>

<form>

<?php if(!empty($_SESSION['error'])){ ?>
            <div class="alert alert-danger">
                
                <ul>
                    <li><?php echo $_SESSION['error']; ?></li>
                </ul>
            </div>
        <?php unset($_SESSION['error']); } ?>


        <?php if(!empty($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $_SESSION['success']; ?></strong>
        </div>
        <?php unset($_SESSION['success']); } ?>





        </form>


<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      
	  
	  <th width="17%"><strong>Cheque NO</strong></th>
      <th width="10%"><strong>Creditor Name</strong></th>
	  <th width="10%"><strong>Bank Name</strong></th>
	  <th width="10%"><strong>Total Amount</strong></th>
	  	  
	        
      <th width="14%"><strong>Issue Date</strong>   
      
	  
	  <th width="14%"><strong>View/Edit</strong>
	  <th width="14%"><strong>Approve</strong>
	  <th width="14%"><strong>Reject</strong>
	  <th width="14%"><strong>Print</strong>
	  
      
	   </tr>
  </thead>
  <tbody>


  
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

//$sel_query="Select * from pms_bill_payment where approve_status='2' and '$user'='md' group BY chequeno;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <?php
       $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
       $cheque_no=$row['chequeno'];
$query4 = "SELECT SUM(gtotal) as gtotal,creditor_name,bankno,date,remarks,chequeno FROM pms_bill_payment WHERE chequeno ='$cheque_no' and approve_status='2'";  
$result4 = mysqli_query($connect, $query4);  
$row4 = mysqli_fetch_array($result4);  
       ?>
	 
	  
	  <td align="center"><?php echo $row["chequeno"]; ?></td>
	  <td align="center"><?php echo $row4['creditor_name']; ?></td>
      <td align="center"><?php echo $row4["bankno"]; ?></td>
	  <td align="center"><?php echo $row4["gtotal"]; ?></td>
	  
      
      <td align="center"><?php echo $row4["date"]; ?></td>
      
<td align="center">

<?php
$ono1=$row['ono'];
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


?>

<a target='_Blank' href="print_allocate_cheque?cname=<?php echo $row['creditor_name']; ?>&chequeno=<?php echo $row['chequeno']; ?>&id=<?php echo $row['id']; ?>">View</a>


</td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
       <input type="button" name="edit" value="Approve" id="<?php echo $row["chequeno"];?>" class="btn btn-info btn-xs edit_data">
     </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="ap_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
	
       
	      


	  
      </tr>
    <?php $count++; } ?>
	
    <?php
	

     //$start=$_REQUEST["stdate"];
     //$end=$_REQUEST["endate"];
     //$bt=$_REQUEST["bt"];
          
     //$user=$_SESSION["sess_username"];
     $date= date('m/d/Y');
     $count=1;
     
     $sel_query3="Select * from fund_transfer_master where account_type='$account_type' and posting_date between '$sdate' and '$edate' order by id desc;";
     
     $result3 = mysqli_query($con,$sel_query3);
     //echo   $bt;
     
     
     while($row3 = mysqli_fetch_assoc($result3)) { ?>
         <tr>
         <td align="center"><?php echo $count; ?></td>
            
            <td align="center"><?php echo $row3["journal_code"]; ?></td>
            <td align="center"><?php echo $row3['fund_transfer_type']; ?></td>
           <td align="center"><?php echo $row3["sub_ledger"]; ?></td>
            <td align="center"><?php echo $row3["total_amount"]; ?></td>
            
           
           <td align="center"><?php echo $row3["cheque_issue_date"]; ?></td>
           
     <td align="center">
     
     
     
     <a href="fams/FundTransferPrint?id=<?php echo $row3["id"]; ?>">View</a> 
     
     </td>
            
     
                
     
     
            
           </tr>
         <?php $count++; } ?>
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from pms_bill_payment where approve_status='1' and '$user'='1601' group BY chequeno asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
    <td align="center"><?php echo $count; ?></td>
	  <?php
       $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
       $cheque_no=$row['chequeno'];
$query4 = "SELECT SUM(gtotal) as gtotal,creditor_name,bankno,date,remarks,chequeno FROM pms_bill_payment WHERE chequeno ='$cheque_no' and approve_status='1'";  
$result4 = mysqli_query($connect, $query4);  
$row4 = mysqli_fetch_array($result4);  
       ?>
	 
	  
	  <td align="center"><?php echo $row["chequeno"]; ?></td>
	  <td align="center"><?php echo $row4['creditor_name']; ?></td>
      <td align="center"><?php echo $row4["bankno"]; ?></td>
	  <td align="center"><?php echo $row4["gtotal"]; ?></td>
	  
      
      <td align="center"><?php echo $row4["date"]; ?></td>
      
<td align="center">

<?php
$ono1=$row['ono'];
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


?>


<a target='_Blank' href="print_allocate_cheque?cname=<?php echo $row['creditor_name']; ?>&chequeno=<?php echo $row['chequeno']; ?>&id=<?php echo $row['id']; ?>">View</a>


</td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><input type="button" name="edit" value="Approve" id="<?php echo $row["chequeno"];?>" class="btn btn-info btn-xs edit_data"></td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="ap_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
     
   </td>
	

	      


	  
      </tr>
    <?php $count++; } ?>

    


    <?php
	

     //$start=$_REQUEST["stdate"];
     //$end=$_REQUEST["endate"];
     //$bt=$_REQUEST["bt"];
          
     //$user=$_SESSION["sess_username"];
     $date= date('m/d/Y');
     $count=1;
     
     $sel_query3="Select * from fund_transfer_master where approve_status='1' and '$user'='1601' order by id desc;";
     
     $result3 = mysqli_query($con,$sel_query3);
     //echo   $bt;
     
     
     while($row3 = mysqli_fetch_assoc($result3)) { ?>
         <tr>
         <td align="center"><?php echo $count; ?></td>
            
            <td align="center"><?php echo $row3["journal_code"]; ?></td>
            <td align="center"><?php echo $row3['fund_transfer_type']; ?></td>
           <td align="center"><?php echo $row3["sub_ledger"]; ?></td>
            <td align="center"><?php echo $row3["total_amount"]; ?></td>
            
           
           <td align="center"><?php echo $row3["cheque_issue_date"]; ?></td>
           
     <td align="center">
     
     
     
     
     <a href="fams/FundTransferPrint?id=<?php echo $row3["id"]; ?>">View</a> 
     
     </td>
            <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><input type="button" name="edit_dp" value="Approve" id="<?php echo $row3["id"];?>" class="btn btn-info btn-xs edit_data_dp"></td>
            
            <td align="center"><a onclick="return confirm_click2();" href="ap_reject_con?id=<?php echo $row3["id"]; ?>"><strong>Reject</strong></a>
          
        </td>
          
     
                
     
     
            
           </tr>
         <?php $count++; } ?>
     
	
	
</tbody>
</table>

</form>

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
                     <h4 class="modal-title"align='center'>Approve Payment</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Cheque NO</label>  
                          <input type="text" name="pmrn" id="po_no" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Bank Name</label>  
                          <input type="text" name="ppluse" id="po_type" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Creditor Name</label>                          
                          <input type="text" name="app_date" id="req_department" class="form-control"readonly>
						  
						  
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
                url:"ap_approval_cfo.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#po_no').val(data.chequeno);  
                     $('#po_type').val(data.bankno);  
					 $('#req_department').val(data.creditor_name);  
					$('#creditor_code').val(data.cheque_amount); 
					 $('#total_amount').val(data.gtotal); 
					 //$('#pin_no').val(data.total_amount); 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.chequeno);  
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
                     url:"ap_confirm_with_pin.php",  
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





<div id="dataModal_dp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail_dp">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal_dp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Approve Payment33</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form_dp" name="frmMain2_dp">  
					 
					 
                          <label>Cheque NO</label>  
                          <input type="text" name="pmrn_dp" id="po_no_dp" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Bank Name</label>  
                          <input type="text" name="ppluse_dp" id="po_type_dp" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Creditor Name</label>                          
                          <input type="text" name="app_date_dp" id="req_department_dp" class="form-control"readonly>
						  
						  
                          <input type="hidden" name="employee_id_dp" id="employee_id_dp" />  

 <label>Total Amount</label>                          
                          <input type="text" name="pbp1_dp" id="total_amount_dp" class="form-control"readonly>
                         						 
						  
		                        

                          
						  <label>PIN NO</label>  
                          <input type="password" name="pin_no_dp" id="pin_no_dp" class="form-control"  size="15" required>  
						  
                          
					<br>	  
						  <label><input type="submit" name="insert_dp" id="insert45_dp" value="Insert" class="btn btn-success"></label>  
					 
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
           $('#insert_dp').val("Insert");  
           $('#insert_form_dp')[0].reset();  
      });  
      $(document).on('click', '.edit_data_dp', function(){  
           var employee_id_dp = $(this).attr("id");  
           $.ajax({  
                url:"ap_approval_cfo_dp.php",  
                method:"POST",  
                data:{employee_id_dp:employee_id_dp},  
				
                dataType:"json",  
                success:function(data){  
                     $('#po_no_dp').val(data.id);  
                     $('#po_type_dp').val(data.account_type);  
					 $('#req_department_dp').val(data.sub_ledger);  
					$('#total_amount_dp').val(data.total_amount); 
					 //$('#total_amount_dp').val(data.gtotal); 
					 //$('#pin_no').val(data.pin_no_dp); 
					 
					 
					  
                     
					 
                     $('#employee_id_dp').val(data.id);  
                     $('#insert45_dp').val("Confirm");  
                     $('#add_data_Modal_dp').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form_dp').on("submit", function(event){  
           event.preventDefault();  
           if($('#po_no_dp').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"ap_confirm_with_pin_dp.php",  
                     method:"POST",  
                     data:$('#insert_form_dp').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form_dp')[0].reset();  
                          $('#add_data_Modal_dp').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
