<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('lab','doctor','mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
require('db1.php');

$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
$bt=$_REQUEST["bt"];

$query43 = "SELECT * FROM radio where id= '$bt';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$icode=$row43['code'];





?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




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

<h1 align="center">Category wise Investigation List</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->

				
					
					


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Category</strong></th>
      <th width="10%"><strong>Sub Category</strong></th>
      <th width="15%"><strong>Investigation</strong>
	  <th width="15%"><strong>Ref. value(from)</strong>
	  <th width="15%"><strong>Ref. value(from)</strong>
	  <th width="15%"><strong>Unit</strong>
	  <th width="15%"><strong>Ref. Details</strong>
	  <th width="15%"><strong>Parameters</strong>
	  

	   </tr>
  </thead>
  <tbody>

  
     <?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];




$sel_query="Select * from radio where id='$bt';";

$count=1;
$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["subtype"]; ?>
      <td align="center"><?php echo $row["iname"]; ?>
	  <td align="center"><?php echo $row["reference"]; ?>
	  <td align="center"><?php echo $row["ref2"]; ?>
	  <td align="center"><?php echo $row["unit"]; ?>
	  	  <td align="center"><?php echo $row["remarks"]; ?>
	  
      <td><input type="button" name="edit" value="Parameters" id="<?php echo $row['id'];?>" class="btn btn-info btn-xs edit_data"></td>
	  
	  </tr>
	  
    <?php $count++; } ?>



  </tbody>
</table>


</form>

<h1 style="color:green;font-weight:bold">Parameters</h1>
<form action="" method="POST">


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


<tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Investigation</strong></th>
      <th width="10%"><strong>Parameters</strong></th>
      <th width="15%"><strong>Code</strong>
	  <th width="15%"><strong>Machine</strong>
	  <th width="15%"><strong>Status</strong>
	  <th width="15%"><strong>Edit</strong>
	  
	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];




$sel_query="Select * from lis_inves_table where icode='$icode';";

$count=1;
$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["inves"]; ?></td>
      <td align="center"><?php echo $row["para"]; ?></td>
      <td align="center"><?php echo $row["icode"]; ?></td>
	  <td align="center"><?php echo $row["mcode"]; ?></td>
	  <td align="center"><?php echo $row["status"]; ?></td>
	  <td><input type="button" name="edit" value="Edit" id="<?php echo $row['id'];?>" class="btn btn-info btn-xs edit_data1"></td>
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
                     <h4 class="modal-title"align='center'>Add Parameters</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Investigation Name</label>  
                          <input type="text" name="inves_name" id="pmrn" class="form-control" size="15" readonly>  
						  
						  <label>Code </label>  
                          <input type="text" name="code" id="code" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Short Form</label>  
                          <input type="text" name="inves_para" id="ppluse" class="form-control"  size="15" required>  
						  
						  
						  
						  
						  <label>Machine Name</label>                          
                         
                          
						  <select name="inves_machine" id="con_name" class="form-control" required>
						  <option value="">-Select-</option>
						  <option value="DLM">DLM</option>
						  <option value="D200">D200</option>
						  <option value="FUS_1000">FUS_1000</option>
						  <option value="XN_550">XN_550</option>
	  	                      <option value="YHLO">YHLO</option>
                                <option value="Maglumi_X_3">Maglumi_X_3</option>
  
		  
		  
</select>


                         
		 				  
						  
                          
                         
						  
						  
				
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
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"lis_short_form_assign.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.iname);  
					 $('#code').val(data.code);  
                    
					 
					 
					  
                     
					 
                    
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
           
           else  
           {  
                $.ajax({  
                     url:"update_lis_inves_para.php",  
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




<div id="dataModal1" class="modal fade">  
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
 <div id="add_data_Modal1" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Edit Parameters</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form1" name="frmMain21">  
					 
					 
                          <label>Investigation Name</label>  
                          <input type="text" name="inves_name1" id="pmrn1" class="form-control" size="15" readonly>  
						  
						  <label>Code </label>  
                          <input type="text" name="code1" id="code1" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Short Form</label>  
                          <input type="text" name="inves_para1" id="ppluse1" class="form-control"  size="15" required>  
						  
						  <input type="hidden" name="employee_id2" id="employee_id2" class="form-control"  size="15" required>  
						  
						  
						  
						  
						  <label>Machine Name</label>                          
                         
                          
						  
<select name="inves_machine1" id="con_name1" class="form-control" required value="">

						  <option value=""></option>
						  <option value="XN_550">XN_550</option>
						  <option value="DLM">DLM</option>
						  <option value="D200">D200</option>
						  <option value="FUS_1000">FUS_1000</option>
						  <option value="YHLO">YHLO</option>
                                <option value="D10">D10</option>
                                <option value="Maglumi_X_3">Maglumi_X_3</option>
						  
	  	              
						

  
		  
		  
</select>


<label>Status</label>                          
                         
                          
						  
<select name="status" id="status" class="form-control" required value="">

						  
						  <option value="1">Active</option>
						  <option value="0">Inactive</option>
						  
						  
	  	              
						

  
		  
		  
</select>


                         
		 				  
						  
                          
                         
						  
						  
				
					<br>	  
						  <label><input type="submit" name="insert" id="insert451" value="Insert" class="btn btn-success"></label>  
					 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form1')[0].reset();  
      });  
      $(document).on('click', '.edit_data1', function(){  
           var employee_id2 = $(this).attr("id");  
           $.ajax({  
                url:"lis_short_form_assign_indu.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.inves);  
					 $('#code1').val(data.icode);  
					 $('#ppluse1').val(data.para);  
					 $('#con_name1').val(data.mcode);  
					 $('#status').val(data.status);  
					 $('#employee_id2').val(data.id);  
                    
					 
					 
					  
                     
					 
                    
                     $('#insert451').val("Confirm");  
                     $('#add_data_Modal1').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form1').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_lis_inves_para_edit.php",  
                     method:"POST",  
                     data:$('#insert_form1').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form1')[0].reset();  
                          $('#add_data_Modal1').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
