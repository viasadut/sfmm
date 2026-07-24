<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data["adoc"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>


				<td colspan="5"><?php echo $data["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Ward/Cabin:</strong></label></td>
						<td colspan="4"><label><strong>Bed NO:</strong></label></td>
	
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["age"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  
					 <td colspan="2"><?php echo $data["room"]; ?></td>  
					 <td colspan="4"><?php echo $data["room1"]; ?></td>  

				 </tr>



				


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
$sel_query="Select * from iblood where pmrn= '$pmrn' and eid='$episode' and location='IPD' and status!='Cancel' order by `id` DESC;";

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
	 
<td colspan="2"><a target='_blank' href="bloodrequest_test.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&id=<?php echo $row['id']; ?>"><img src="lab.png" title="Print Report" width="150" height="60" /></a></td>
  <td colspan="2">
  <?php

$id1=$row['id'];
$eid1=$row['eid'];
$pmrn1=$row['pmrn'];
$bg=$row['infusion'];
$bstatus=$row['bbstatus'];
$bbtype=$row["room"];


$ss=$row['nstart'];
$ee=$row['nend'];
$oo=$row['ooby1'];
$pause_by=$row['pause_by'];


//$bno=$_REQUEST['bagno'];
$url = "blood_nurse?id=$id1&pmrn=$pmrn1&eid=$eid1"; 
$url1 = "blood_nurse1?id=$id1&pmrn=$pmrn1&eid=$eid1"; 


if($row['return_by']=='' and $bstatus=='Issued' and $ee=='' and $ss==''){
     echo '<input type="button" name="edit" value="Return" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data3">';
     }
     

if($ss=='' and $oo=='' and $bstatus!='')
	
{
//echo"<a href='$url'><strong>waiting For MO's Order</strong></a>";
echo"<strong>waiting For MO's Order</strong>";
}

else if($ss=='' and $oo!='' and $bstatus=='Issued' and $row['pause_by']=='' and $row['pause_by1']=='' and $row['pause_by2']=='' and $row['start1by']=='' and $row['start2by']=='' and $row['nstart']=='')
	
{
//echo"<a onclick='return confirm_click();' href='$url'><strong>Start</strong></a>";

echo '<input type="button" name="edit2" value="Start" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data2">';
}


else if($ss!='' and $oo!='' and $bstatus=='Issued' and $row['pause_by']!='' and $row['pause_by1']=='' and $row['pause_by2']=='' and $row['start1by']=='' and $row['start2by']=='')
	
{
//echo"<a onclick='return confirm_click();' href='$url'><strong>Start</strong></a>";

echo '<input type="button" name="edit2" value="Start" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data2">';
}

else if($ss!=''  and $oo!='' and $bstatus=='Issued' and $row['pause_by']!='' and $row['pause_by1']!='' and $row['pause_by2']=='' and $row['start1by']!='' and $row['start2by']=='')
	
{
//echo"<a onclick='return confirm_click();' href='$url'><strong>Start</strong></a>";

echo '<input type="button" name="edit2" value="Start" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data2">';
}

else if ($ss !='' and $ee=='' and $row['start1by']=='' and $row['start2by']=='' and $row['pause_by']=='' and $row['pause_by1']=='' and $row['pause_by2']=='')
{
//echo"<a onclick='return confirm_click1();'' href='$url1'><strong>End</strong></a>";
echo '<input type="button" name="edit" value="Pause" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data">';

}	


else if ($ss !='' and $ee=='' and $row['start1by']!='' and $row['start2by']=='' and $row['pause_by']!='' and $row['pause_by1']=='' and $row['pause_by2']=='')
{
//echo"<a onclick='return confirm_click1();'' href='$url1'><strong>End</strong></a>";
echo '<input type="button" name="edit" value="Pause" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data">';

}	


else if ($ss !='' and $ee=='' and $row['start1by']!='' and $row['start2by']!='' and $row['pause_by']!='' and $row['pause_by1']!='' and $row['pause_by2']=='')
{
//echo"<a onclick='return confirm_click1();'' href='$url1'><strong>End</strong></a>";
echo '<input type="button" name="edit" value="Pause" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data">';

}	


	

else if($ss!='' and $ee!='')
{
echo"Completed";
}	

if ($ss !='' and $ee=='')
{
//echo"<a onclick='return confirm_click1();'' href='$url1'><strong>End</strong></a>";
echo '<input type="button" name="edit" value="End" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data4">';

}



if ($ss !='')
{
//echo"<a onclick='return confirm_click1();'' href='$url1'><strong>End</strong></a>";
echo '<input type="button" name="edit" value="" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data5">';

echo '<a target="_blank" href="test_transfusion_reaction.php?pmrn='.$pmrn.'&eid='.$eid.'&id='.$row['id'].'">Report Transfusion Reaction</a>';
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
                         

                          						  
						  <label>Temperature</label>                          
                          <input type="text" name="b_temp" id="b_temp" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">
 
                          						  
						  <label>Pulse</label>                          
                          <input type="text" name="b_pulse" id="b_pulse" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">
 
                          						  
						  <label>Blood Pressure</label>                          
                          <input type="text" name="b_bp" id="b_bp" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">
 

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
                          $('#b_temp').val(data.b_temp); 
                          $('#b_pulse').val(data.b_pulse); 
                          $('#b_bp').val(data.b_bp); 
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
                     <h4 class="modal-title"align='center'>Blood Return Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form3" name="frmMain23">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn3" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse3" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Ordered Blood Group </label>                          
                          <input type="text" name="bgroup" id="app_dat3" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
						  <label>Ordered Blood Type</label>                          
                          <input type="text" name="btype" id="temp3" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
                         


 <label>Return Remarks</label>                          
                          <textarea name="return_remarks" id="pbp13" class="form-control" required></textarea>
                         	
                         						 
						  
		
                          
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
					 $('#pphone3').val(data.pphone); 
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
                     url:"update_return_data.php",  
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






<div id="dataModal4" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail4">  
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
                     <h4 class="modal-title"align='center'>Blood Transfusion End Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form4" name="frmMain24">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn4" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse4" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Ordered Blood Group </label>                          
                          <input type="text" name="bgroup" id="app_dat4" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
						  <label>Ordered Blood Type</label>                          
                          <input type="text" name="btype" id="temp4" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
                         


 <label>Transfusion Ending Remarks</label>                          
                          <textarea name="end_remarks" id="pbp14" class="form-control" required></textarea>
                         	
                         						 
						  
		
                          
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
                url:"blood_patient4.php",  
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
					 $('#pphone4').val(data.pphone); 
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
                     url:"update_end_data.php",  
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



<div id="dataModal5" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail5">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal5" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Transfusion Reaction Investigation Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form5" name="frmMain25">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn5" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse5" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Ordered Blood Group </label>                          
                          <input type="text" name="bgroup" id="app_dat5" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
						  <label>Ordered Blood Type</label>                          
                          <input type="text" name="btype" id="temp5" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
                         

                          <label>Bagno</label>                          
                          <input type="text" name="bagno" id="bagno" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">

                          <label>Transfusion Start Time</label>                          
                          <input type="text" name="tst" id="tst" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">

                          <label>Time Of Reaction Started</label>                          
                          <input type="text" name="rst" id="rst" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">

                          <label>Amount Remaining in Bag</label>                          
                          <input type="number" name="blood_remaining" id="blood_remaining" class="form-control" style="font-size:18px;color:red;font-weight:blod;" required>

                          <label>Symptoms</label>                          
                          <select type="text" name="symptoms[]" id="symptoms" multiple="multiple" class="3col active" required size="80" required>
    
            <option value="Fever">Fever</option>
            <option value="Rigor">Rigor</option>
            <option value="Pain">Pain</option>
            <option value="Hypotension">Hypotension</option>
            <option value="Dyspnea">Dyspnea</option>
            <option value="Urticaria">Urticaria</option>
            <option value="Oedema">Oedema</option>
            <option value="Nausea">Nausea</option>
            <option value="Vomiting">Vomiting</option>
            <option value="Oliguria">Oliguria</option>
            <option value="Anaphylaxis">Anaphylaxis</option>
            <option value="Others">Others</option>


    </select>


    <label>Temperature Before Transfusion</label>                          
                          <input type="text" name="b_temp" id="b_temp" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">

                          <label>Pulse Before Transfusion</label>                          
                          <input type="text" name="b_pulse" id="b_pulse" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">

                          <label>Blood Pressure Before Transfusion</label>                          
                          <input type="text" name="b_bp" id="b_bp" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">
                         	
 
                          
                          <label>Temperature At Start Of Reaction</label>                          
                          <input type="text" name="a_temp" id="a_temp" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">

                          <label>Pulse At Start Of Reaction</label>                          
                          <input type="text" name="a_pulse" id="a_pulse" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">

                          <label>Blood Pressure At Start Of Reaction</label>                          
                          <input type="text" name="a_bp" id="a_bp" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">
 
					
                          
                          <label>H/O Past Transfusion</label>                          
                          <input type="text" name="t_history" id="t_history" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">
 
                          <label>Time Of Reporting To Blood Bank</label>                          
                          <input type="text" name="reporting_time" id="reporting_time" class="form-control" required style="font-size:18px;color:red;font-weight:blod;">
 
                          
                           <input type="hidden" name="employee_id5" id="employee_id5" />  
						   
						   <input type="hidden" name="pphone" id="pphone" />  
					<br>	  
						  <label><input type="submit" name="insert" id="insert455" value="Insert" class="btn btn-success"></label>  
					 
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
           $('#insert_form5')[0].reset();  
      });  
      $(document).on('click', '.edit_data5', function(){  
           var employee_id5 = $(this).attr("id");  
           $.ajax({  
                url:"blood_patient5.php",  
                method:"POST",  
                data:{employee_id5:employee_id5},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn5').val(data.pmrn);  
                     $('#ppluse5').val(data.pna5me);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp5').val(data.room); 
					 $('#app_dat5').val(data.infusion); 
					 $('#pphone5').val(data.pphone); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp5').val(data.status); 
                     $('#employee_id5').val(data.id);  
                     $('#insert455').val("Confirm");  
                     $('#add_data_Modal5').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form5').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn5').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_transfusion_data.php",  
                     method:"POST",  
                     data:$('#insert_form5').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form5')[0].reset();  
                          $('#add_data_Modal5').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>

<script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 2,
            placeholder: 'Select',
            search: true,
            searchOptions: {
                'default': ''
            },
            selectAll: true
        });

    });
</script>	   
						