<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','staff','covid','call','imo','mofficer','nurse','emergency','staff','ot','endo','bill','billin','lab')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?><?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$id=$_REQUEST['pid'];
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

.container {
  display: inline-block;
  white-space: nowrap;
}

.checkbox {
  border: 1px solid transparent;
  text-align: left;
}

.checkbox input {
  float: left;
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
   <li><a href='follow_scan'><span>Back To Scan Page</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $full; ?>'s Dash Board </p> 
<form action="cviewsp1" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="14%"><strong>Consultant Name</strong>
	  <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Clinical Details</strong>
      <th width="14%"><strong>Diagnosis</strong> 
      
      <th width="14%"><strong>Other Instruction</strong> 
  
      
	        
			<th width="14%"><strong>Set Followup Date</strong>
	 


	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$test5=date('Y-m-d', strtotime('-5 days') );
//echo datetime(NOW());
//echo DATE_SUB(now(), 'interval 2 day');

$rrd5=date('Y-m-d 23:59:59', strtotime('-1 days') );
$rrd6=date('Y-m-d 23:59:59', strtotime('+1 days') );
//$rrd1=$row['ot_charge_date'];
		   
	//	   `ot_charge_date` between '$rrd5' and '$rrd6'

$count=1;



$sel_query="Select * from presnew where id='$id'";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td> 
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
      <td align="center"><?php echo $row["cdetails"]; ?></td>
      <td align="center"><?php echo $row["diagnosis"]; ?>  </td>
	  <td align="Left"><?php echo $row["other"]; ?>  </td>
	  	  
      

 <td>
 <?php 
 
 $test=date('d/m/Y', strtotime(''.$row['follow_date'].' days') );
 
 if($row['follow_date']==0){echo'
 
 <input type="button" name="edit" value="Set Followup Date" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data">';}

 
 
else {echo '<span style="color:green;font-size:20px;font-weight:bold">'.$test.'</span>';}

?> 
</td>

<td align="Left">

<a target='_blank' href="follow_scan_bill?id=<?php echo $id; ?>">View Investigation List</a>


</td>
      </tr>
    <?php $count++; } ?>

	
  </tbody>
  
  
  
 
	



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

					 
                     <h4 class="modal-title"align='center'>Set Follow Up Date</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						  
<label>Patient Name</label>  
                          <input type="text" name="pname" id="pname" class="form-control"  size="15" readonly>  

						  
						   <label>Diagnosis</label>  
                          <input type="text" name="sname" id="sname" class="form-control" size="15" readonly>  
                          
                          
						  
						  <label>Surgeon Name</label>                          
                          <input type="text" name="surname" id="surname" class="form-control"readonly>
                          
                         
						  
						  <label>Next Followup Date After (In Days)</label>  
						  <input type="number" name="day" id="day" class="form-control" required data-autofocus>
						  
						  <label>Reason</label>  
						  <textarea name="reason" id="reason" class="form-control" required></textarea>
		 				   
						  
						   <label> Add For Transplant Surgery:
						  <input type="checkbox" name="rela" id="rela" class="form-control" style="align:left;height:20px;width:20px;">
					 </label>  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          
						   <div class="modal-footer">  
                     <input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success"></label>  
					 
					 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
                     </form>  
                </div>  
               
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset(); 
 
      });  
	  
	  jQuery(document).ready(function(e) {
  $('#add_data_Modal').on('shown.bs.modal', function() {
    $('input[name="day"]').focus();
  });
});
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"pres_edit_doc.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#pname').val(data.pname);  
					 $('#sname').val(data.diagnosis); 
					 $('#surname').val(data.dname); 
                     //$('#day').val(data.follow_date); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Confirm");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn').val() == "")  
           {  
                alert("MRN is required");  
           }  
           else if($('#ppluse').val() == '')  
           {  
                alert("Medicine is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"pres_edit_req_1.php",  
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