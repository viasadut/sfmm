<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','imo','mng','lab','nurse')"; 
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

$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data['pname'];
$pmrn = $data['pmrn'];
$eid = $data['eid'];
$padd = $data['padd'];
$adm = $data['adate'];
$pphone=$data['pphone'];
$page=$data['age'];
$psex=$data['gender'];
$odate = date('m-d-Y H:i:s');
$infu = $_REQUEST['infu'];
$remarks = $_REQUEST['remarks'];


$ins_query="insert into eblood (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`) values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$infu','$user','$remarks')";
mysqli_query($con,$ins_query) or die(mysql_error());

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
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Start The Blood?");
}

</script>

</head>



<body>

<div id='cssmenu'>
<ul>
   <li><a href='idetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT INVESTIGATION </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		


<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Blood Request Form</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="1" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Blood Group</strong></td>
      <td colspan="1" align="center"><strong>First 10 Mins Droplates/Mins</strong></td>   
      <td colspan="1" align="center"><strong>Then Increase to</strong></td>
	  <td colspan="1" align="center"><strong>Amount</strong></td>
       	  <td colspan="2" align="center"><strong>Finish By (Hour)</strong></td>
		  
		  <td colspan="2" align="center"><strong>Blood Start Time</strong></td>
		  <td colspan="2" align="center"><strong>Blood End Time</strong></td>
		  <td colspan="2" align="center"><strong>Detail Instruction</strong></td>
		  <td colspan="2" align="center"><strong>Start / Finish</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iblood where reporting_user!='' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["first"]; ?></td>
      
	  <td align="center"colspan="1"><?php echo $row["second"]; ?></td>
  	  <td align="center"colspan="1"><?php echo $row["amount"]; ?></td>
  	  
	  <td align="center"colspan="2"><?php echo $row["finish"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["nstart"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["nend"]; ?></td>
	 
<td colspan="2"><a target='_blank' href="transfusion_report1.php?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="lab.png" title="Print Report" width="150" height="60" /></a></td>
  
<td colspan="2">
  <?php	

/*if($row['reporting_user']!=''){
echo '<input type="button" name="edit" value="Return" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data3">';
}
*/
if($row['reporting_user']!=''){
     echo '<input type="button" name="edit" value="Reaction Documentation" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data4">';
     }

?>

</td>
  
  
      </tr>
    <?php $count++; } ?>

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
                     <h4 class="modal-title"align='center'>Blood Pause Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Ordered Blood Group </label>                          
                          <input type="text" name="bgroup" id="app_date" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
						  <label>Ordered Blood Type</label>                          
                          <input type="text" name="btype" id="temp" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
                         


 <label>Reason For Pause</label>                          
                          <textarea name="pause_remarks" id="pbp1" class="form-control" required></textarea>
                         						 
						  
		
                          
                           <input type="hidden" name="employee_id" id="employee_id" />  
						   
						   <input type="hidden" name="pphone" id="pphone" />  
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
                url:"blood_patient.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#ppluse').val(data.pname);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp').val(data.room); 
					 $('#app_date').val(data.infusion); 
					 $('#pphone').val(data.pphone); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp1').val(data.status); 
					 
					 
					 
					  
                     
					 
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
           
           else  
           {  
                $.ajax({  
                     url:"update_pause_data.php",  
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
                <div class="modal-body" id="employee_detail1">  
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
                     <h4 class="modal-title"align='center'>Blood Transfusion End Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form1" name="frmMain21">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn1" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse1" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Ordered Blood Group </label>                          
                          <input type="text" name="bgroup" id="app_dat1" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
						  <label>Ordered Blood Type</label>                          
                          <input type="text" name="btype" id="temp1" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
                         


 <label>Reason For End Transfusion</label>                          
                          <textarea name="end_remarks" id="pbp11" class="form-control" required></textarea>
                         	
                         						 
						  
		
                          
                           <input type="hidden" name="employee_id1" id="employee_id1" />  
						   
						   <input type="hidden" name="pphone" id="pphone" />  
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
           var employee_id1 = $(this).attr("id");  
           $.ajax({  
                url:"blood_patient1.php",  
                method:"POST",  
                data:{employee_id1:employee_id1},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.pmrn);  
                     $('#ppluse1').val(data.pname);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp1').val(data.room); 
					 $('#app_dat1').val(data.infusion); 
					 $('#pphone1').val(data.pphone); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp1').val(data.status); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id1').val(data.id);  
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
                     url:"update_end_data.php",  
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



<div id="dataModal2" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail2">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal2" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Blood Transfusion Start Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form2" name="frmMain22">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn2" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse2" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Ordered Blood Group </label>                          
                          <input type="text" name="bgroup" id="app_dat2" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
						  <label>Ordered Blood Type</label>                          
                          <input type="text" name="btype" id="temp2" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
                         


 <label>Transfusion Starting Remarks</label>                          
                          <textarea name="start_remarks" id="pbp12" class="form-control" required></textarea>
                         	
                         						 
						  
		
                          
                           <input type="hidden" name="employee_id2" id="employee_id2" />  
						   
						   <input type="hidden" name="pphone" id="pphone" />  
					<br>	  
						  <label><input type="submit" name="insert" id="insert452" value="Insert" class="btn btn-success"></label>  
					 
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
           $('#insert_form2')[0].reset();  
      });  
      $(document).on('click', '.edit_data2', function(){  
           var employee_id2 = $(this).attr("id");  
           $.ajax({  
                url:"blood_patient2.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn2').val(data.pmrn);  
                     $('#ppluse2').val(data.pname);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp2').val(data.room); 
					 $('#app_dat2').val(data.infusion); 
					 $('#pphone2').val(data.pphone); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp1').val(data.status); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert452').val("Confirm");  
                     $('#add_data_Modal2').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn2').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_start_data.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#add_data_Modal2').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>



<div id="dataModal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail3">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Blood Return Received Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form3" name="frmMain23">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn3" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse3" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Returned Blood Group </label>                          
                          <input type="text" name="bgroup" id="app_dat3" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
						  <label>Returned Blood Type</label>                          
                          <input type="text" name="btype" id="temp3" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">

                          <label>Returned Blood Bagno</label>                          
                          <input type="text" name="bagno" id="bagno" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
                         


 <label>Return Remarks</label>                          
                          <textarea name="return_remarks" id="pbp13" class="form-control" required></textarea>
                         	
                         						 

                          <label>Received Option</label>                          
                          <select name="roption" id="roption" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">
                          <option value="">--Select--</option>
                          <option value="Back To Stock">Back To Stock</option>
<option value="Discard">Discard</option>
</select>
 
		
                          
                           <input type="hidden" name="employee_id3" id="employee_id3" />  
						   
						   <input type="hidden" name="pphone" id="pphone" />  
					<br>	  
						  <label><input type="submit" name="insert" id="insert453" value="Insert" class="btn btn-success"></label>  
					 
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
           $('#insert_form3')[0].reset();  
      });  
      $(document).on('click', '.edit_data3', function(){  
           var employee_id3 = $(this).attr("id");  
           $.ajax({  
                url:"blood_patient3.php",  
                method:"POST",  
                data:{employee_id3:employee_id3},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn3').val(data.pmrn);  
                     $('#ppluse3').val(data.pname);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp3').val(data.room); 
					 $('#app_dat3').val(data.infusion); 
					 $('#bagno').val(data.bagno); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp3').val(data.status); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id3').val(data.id);  
                     $('#insert453').val("Confirm");  
                     $('#add_data_Modal3').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form3').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn3').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_return_data_lab.php",  
                     method:"POST",  
                     data:$('#insert_form3').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form3')[0].reset();  
                          $('#add_data_Modal3').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>



<div id="dataModal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail3">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal4" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Blood Transfusion Reaction Reporting Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form4" name="frmMain24">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn4" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse4" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Visual Inspection of Patient's Serum</label>                          
                          <select name="vserum" id="vserum" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

                          <option value="">-Select-</option>
                          <option value="Normal">Normal</option>
                          <option value="Hemolysis (Pink)">Hemolysis (Pink)</option>
                          <option value="Bilirubin (Yellow)">Bilirubin (Yellow)</option>
</select>
						  
						  <label>Direct Anti Globulin Test(Pre Transfusion)</label>                          
                                <select name="globulin_pre" id="globulin_pre" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="Positive">Positive</option>
<option value="Negative">Negative</option>

</select>


<label>Direct Anti Globulin Test(Post Transfusion)</label>                          
                                <select name="globulin_post" id="globulin_post" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="Positive">Positive</option>
<option value="Negative">Negative</option>

</select>


<label>Bacteriological Studies Done On Container</label>                          
                                <select name="bac_con" id="bac_con" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="Positive">Positive</option>
<option value="Negative">Negative</option>

</select>


<label>First Voided Fresh Specimen of Urine, Hemolysis</label>                          
                                <select name="hemolysis" id="hemolysis" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="Yes">Yes</option>
<option value="No">No</option>

</select>

<label>Antibody Screening(ICT)</label>                          
                                <select name="antibody" id="antibody" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="Positive">Positive</option>
<option value="Negative">Negative</option>

</select>                 


<label>Medication Given</label>                          
                                <textarea name="medi" id="medi" class="form-control"required style="font-size:18px;color:red;font-weight:blod;"></textarea>





                                <label>Recipient Pre-Transfusion Anti-Serum - (A)</label>                          
                                <select name="anti_serum_re_pre_a" id="anti_serum_re_pre_a" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Recipient Pre-Transfusion Anti-Serum - (B)</label>                          
                                <select name="anti_serum_re_pre_b" id="anti_serum_re_pre_b" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          


<label>Recipient Pre-Transfusion Anti-Serum - (AB)</label>                          
                                <select name="anti_serum_re_pre_ab" id="anti_serum_re_pre_ab" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          


<label>Recipient Pre-Transfusion Anti-Serum - (D)</label>                          
                                <select name="anti_serum_re_pre_d" id="anti_serum_re_pre_d" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          

<label>Recipient Pre-Transfusion Known Cell - (A)</label>                          
                                <select name="anti_serum_re_pre_k_a" id="anti_serum_re_pre_k_a" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Recipient Pre-Transfusion Known Cell - (B)</label>                          
                                <select name="anti_serum_re_pre_k_b" id="anti_serum_re_pre_k_b" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  

<label>Recipient Pre-Transfusion Blood Group</label>                          
                                <select name="anti_serum_re_pre_bg" id="anti_serum_re_pre_bg" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="O">O</option>
<option value="AB">AB</option>
<option value="Others">Others</option>


</select>                  

                            
<label>Recipient Pre-Transfusion Rh Type</label>                          
                                <select name="anti_serum_re_pre_rh" id="anti_serum_re_pre_rh" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Recipient Post-Transfusion Anti-Serum - (A)</label>                          
                                <select name="anti_serum_re_po_a" id="anti_serum_re_po_a" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Recipient Post-Transfusion Anti-Serum - (B)</label>                          
                                <select name="anti_serum_re_po_b" id="anti_serum_re_po_b" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          


<label>Recipient Post-Transfusion Anti-Serum - (AB)</label>                          
                                <select name="anti_serum_re_po_ab" id="anti_serum_re_po_ab" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          


<label>Recipient Post-Transfusion Anti-Serum - (D)</label>                          
                                <select name="anti_serum_re_po_d" id="anti_serum_re_po_d" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          

<label>Recipient Post-Transfusion Known Cell - (A)</label>                          
                                <select name="anti_serum_re_po_k_a" id="anti_serum_re_pre_k_a" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Recipient Post-Transfusion Known Cell - (B)</label>                          
                                <select name="anti_serum_re_po_k_b" id="anti_serum_re_pre_k_b" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Recipient Post-Transfusion Blood Group</label>                          
                                <select name="anti_serum_re_po_bg" id="anti_serum_re_po_bg" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="O">O</option>
<option value="AB">AB</option>
<option value="Others">Others</option>

</select>                  

                            
<label>Recipient Post-Transfusion Rh Type</label>                          
                                <select name="anti_serum_re_po_rh" id="anti_serum_re_po_rh" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  







<label>Donor Transfusion Anti-Serum - (A)</label>                          
                                <select name="anti_serum_do_a" id="anti_serum_do_a" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Donor Transfusion Anti-Serum - (B)</label>                          
                                <select name="anti_serum_do_b" id="anti_serum_do_b" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          


<label>Donor Transfusion Anti-Serum - (AB)</label>                          
                                <select name="anti_serum_do_ab" id="anti_serum_do_ab" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          


<label>Donor Transfusion Anti-Serum - (D)</label>                          
                                <select name="anti_serum_do_d" id="anti_serum_do_d" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>          

<label>Donor Transfusion Known Cell - (A)</label>                          
                                <select name="anti_serum_do_k_a" id="anti_serum_do_k_a" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Donor Transfusion Known Cell - (B)</label>                          
                                <select name="anti_serum_do_k_b" id="anti_serum_do_k_b" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>                  


<label>Donor Transfusion Blood Group</label>                          
                                <select name="anti_serum_do_bg" id="anti_serum_do_bg" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="O">O</option>
<option value="AB">AB</option>
<option value="Others">Others</option>

</select>                  

                            
<label>Donor Transfusion Rh Type</label>                          
                                <select name="anti_serum_do_rh" id="anti_serum_do_rh" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

<option value="">-Select-</option>
<option value="+">+</option>
<option value="-">-</option>

</select>             





<label>Cross Match (Patient Serum + Donor)-Pre Room Tem. in Slides</label>  
                          <input type="text" name="cross_pre_room" id="cross_pre_room" class="form-control"  size="15" required>  

                          <label>Cross Match (Patient Serum + Donor)-Pre 37* C </label>  
                          <input type="text" name="cross_pre_37" id="cross_pre_37" class="form-control"  size="15" required>  

                          <label>Cross Match (Patient Serum + Donor)-Pre AHG </label>  
                          <input type="text" name="cross_pre_ahg" id="cross_pre_ahg" class="form-control"  size="15" required>  

                          <label>Cross Match (Patient Serum + Donor)-Pre Compatible </label>  
                          <input type="text" name="cross_pre_com" id="cross_pre_com" class="form-control"  size="15" required>  


                          <label>Cross Match (Patient Serum + Donor)-Post Room Tem. in Slides</label>  
                          <input type="text" name="cross_post_room" id="cross_post_room" class="form-control"  size="15" required>  

                          <label>Cross Match (Patient Serum + Donor)-Post 37* C </label>  
                          <input type="text" name="cross_post_37" id="cross_post_37" class="form-control"  size="15" required>  

                          <label>Cross Match (Patient Serum + Donor)-Post AHG </label>  
                          <input type="text" name="cross_post_ahg" id="cross_post_ahg" class="form-control"  size="15" required>  

                          <label>Cross Match (Patient Serum + Donor)-Post Compatible </label>  
                          <input type="text" name="cross_post_com" id="cross_post_com" class="form-control"  size="15" required>  

                          <label>Remarks</label>                          
                                <textarea name="remarks" id="remarks" class="form-control"required style="font-size:18px;color:red;font-weight:blod;"></textarea>

<input type="hidden" name="employee_id4" id="employee_id4" />  
						   
						   <input type="hidden" name="pphone" id="pphone" />  
					<br>	  
						  <label><input type="submit" name="insert" id="insert454" value="Insert" class="btn btn-success"></label>  
					 
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
           $('#insert_form4')[0].reset();  
      });  
      $(document).on('click', '.edit_data4', function(){  
           var employee_id4 = $(this).attr("id");  
           $.ajax({  
                url:"blood_patient44.php",  
                method:"POST",  
                data:{employee_id4:employee_id4},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn4').val(data.pmrn);  
                     $('#ppluse4').val(data.pname);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp4').val(data.room); 
					 $('#app_dat4').val(data.infusion); 
					 $('#bagno').val(data.bagno); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp4').val(data.status); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id4').val(data.id);  
                     $('#insert454').val("Confirm");  
                     $('#add_data_Modal4').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form4').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn4').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_transfusion_data_lab_test.php",  
                     method:"POST",  
                     data:$('#insert_form4').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form4')[0].reset();  
                          $('#add_data_Modal4').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>