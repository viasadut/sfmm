<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','store','doctor','ot','endo','emergency','mofficer','pharmacy','radio','lab','billing','ipd')"; 
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Charge Code Pending Approval List </p> 
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
      
	  
	  <th width="17%"><strong>Request Department</strong></th>
      <th width="10%"><strong>RFID</strong></th>
      <th width="10%"><strong>Date</strong></th>
	  
	  
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

$sel_query="Select * from purchase_stock3 where fstatus in('2') and hod in ('md001') and f_time!='NULL' group by rfid ORDER BY id asc;";
//$sel_query="Select * from purchase_stock where fstatus in('1','2') and '$user'='cfo' group by rfid ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	 
	  
	  <td align="center"><?php echo $row["location"]; ?></td>
	  <td align="center"><?php echo $row['rfid']; ?></td>
     

	  
	  <?php if($row['fstatus']!=2){?>
	  
	  <td align="center">

<a href="purchase_approve_mng?id=<?php echo $row['rfid']; ?>">View/Edit</a>



</td>
	  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="prf_forward_mng1?sno=<?php echo $row["rfid"]; ?>&user=<?php echo "$fullname";?>&cat=<?php echo "$cat";?>">Approve</a> 
	
	  <input type="button" name="edit" value="Approve" id="<?php echo $row["rfid"];?>" class="btn btn-info btn-xs edit_data">
	</td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="prf_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
	  
	  
	  </td>
	  
	  <td></td>
	 
	  <?php
	  
	  } 
	  
	  
	  
	  else if(($row['fstatus']==2)){
		  
		 echo'
		 <td></td>
		 <td></td>
		 <td></td>
		 
		 <td colspan="2" align="center">
			<a target="_blank" href="prf_request?sno='.$row['rfid'].'"><img src="phar_pic/print.png" title="Print Receipt" width="40" height="40" /></a>
			
			</td>';
	  }
	  
	  ?>
	      


	  
      </tr>
    <?php $count++; } ?>


	<?php
	

	//$start=$_REQUEST["stdate"];
	//$end=$_REQUEST["endate"];
	//$bt=$_REQUEST["bt"];
		
	//$user=$_SESSION["sess_username"];
	$date= date('m/d/Y');
	$count=1;
	
	$sel_query="Select * from purchase_stock3 where fstatus in('1','2') and incharge='$sid1' and incharge_time='' group by rfid ORDER BY id asc;";
	//$sel_query="Select * from purchase_stock where fstatus in('1','2') and '$user'='cfo' group by rfid ORDER BY id asc;";
	
	$result = mysqli_query($con,$sel_query);
	//echo   $bt;
	
	
	while($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
		  <td align="center"><?php echo $count; ?></td>
		  
		 
		  
		  <td align="center"><?php echo $row["location"]; ?></td>
		  <td align="center"><?php echo $row['rfid']; ?></td>
		 
	
		  
		  <?php if($row['fstatus']!=2){?>
		  
		  <td align="center">
	
	<a href="purchase_approve_mng?id=<?php echo $row['rfid']; ?>">View/Edit</a>
	
	
	</td>
		  
		  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="prf_forward_mng1?sno=<?php echo $row["rfid"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
		  
		  <td align="center"><a onclick="return confirm_click2();" href="prf_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
		  
		  
		  </td>
		  
		  <td></td>
		 
		  <?php
		  
		  } 
		  
		  
		  
		  else if(($row['fstatus']==2)){
			  
			 echo'
			 <td></td>
			 <td></td>
			 <td></td>
			 
			 <td colspan="2" align="center">
				<a target="_blank" href="prf_request?sno='.$row['rfid'].'"><img src="phar_pic/print.png" title="Print Receipt" width="40" height="40" /></a>
				
				</td>';
		  }
		  
		  ?>
			  
	
	
		  
		  </tr>
		<?php $count++; } ?>
	


	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

//$sel_query="Select * from purchase_stock where fstatus in('2') and '$user'='ceo' group by rfid ORDER BY id asc;";
$sel_query="Select * from purchase_stock3 where fstatus in('2') and '$user'='1601' and ptype in ('New Purchase') group by rfid ORDER BY f_time desc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	 
	  
	  <td align="center"><?php echo $row["location"]; ?></td>
	  <td align="center"><?php echo $row['rfid']; ?></td>
       <td align="center"><?php echo $row['f_time']; ?></td>
     

	  
	  <?php if($row['fstatus']==2){?>
	  
	  <td align="center">

<a href="new_bill/test_prf?id=<?php echo $row['rfid']; ?>">View/Edit</a>


</td>
	  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
     
       <input type="button" name="edit" value="Approve" id="<?php echo $row["rfid"];?>" class="btn btn-info btn-xs edit_data">
     </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="prf_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
	  
	  
	  </td>
	  
	  <td></td>
	 
	  <?php
	  
	  } 
	  
	  
	  
	  else if(($row['fstatus']!=2) and $row['ptype']=='New Purchase'){
		  
		 echo'
		 <td></td>
		 <td></td>
		 <td></td>
		 
		 <td colspan="2" align="center">
			<a target="_blank" href="prf_request?sno='.$row['rfid'].'"><img src="phar_pic/print.png" title="Print Receipt" width="40" height="40" /></a>
			
			</td>';
	  }
	  
	  ?>
	      


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

//$sel_query="Select * from purchase_stock where fstatus in('2') and '$user'='ceo' group by rfid ORDER BY id asc;";
$sel_query="Select * from purchase_stock3 where fstatus in('3') and '$user' in ('md','md01') and ptype in ('New Purchase','Stock Items') group by rfid ORDER BY f_time desc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	 
	  
	  <td align="center"><?php echo $row["location"]; ?></td>
	  <td align="center"><?php echo $row['rfid']; ?></td>
       <td align="center"><?php echo $row['f_time']; ?></td>
     

	  
	  <?php if($row['fstatus']==3 and $row['ptype']=='New Purchase' || $row['ptype']=='Stock Items'){?>
	  
	  <td align="center">

<a href="new_bill/test_prf?id=<?php echo $row['rfid']; ?>">View/Edit</a>


</td>
	  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
       <input type="button" name="edit" value="Approve" id="<?php echo $row["rfid"];?>" class="btn btn-info btn-xs edit_data">
     
     </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="prf_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a>
	  
	  
	  </td>
	  
	  <td></td>
	 
	  <?php
	  
	  } 
	  
	  
	  
	  else if(($row['fstatus']!=3) and $row['ptype']=='Purchase Items'){
		  
		 echo'
		 <td></td>
		 <td></td>
		 <td></td>
		 
		 <td colspan="2" align="center">
			<a target="_blank" href="prf_request?sno='.$row['rfid'].'"><img src="phar_pic/print.png" title="Print Receipt" width="40" height="40" /></a>
			
			</td>';
	  }
	  
	  ?>
	      


	  
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
                     <h4 class="modal-title"align='center'>Approve PRF</h4>  
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
                url:"prf_approval_cfo.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#po_no').val(data.rfid);  
                     $('#po_type').val(data.id);  
					 $('#req_department').val(data.location);  
					$('#creditor_code').val(data.creditor_code); 
					 $('#total_amount').val(data.total_amount); 
					 //$('#pin_no').val(data.total_amount); 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.rfid);  
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
                     url:"prf_confirm_with_pin.php",  
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
