<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=$_REQUEST["stdate"];
$end=$_REQUEST["endate"];
$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(medi) FROM cathmediused where medi= '$bt'and adate BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(infusion) FROM imedi3 where infusion= '$bt'and ndate BETWEEN '$start' and '$end' and status1='implemented';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);


$query45 = "SELECT COUNT(infusion) FROM estat where infusion= '$bt'and ndate BETWEEN '$start' and '$end';"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);


$query46 = "SELECT SUM(pdos) FROM othoscharge1 where medi= '$bt'and ndate BETWEEN '$start' and '$end';"; 
	 
$result46 = mysqli_query($con, $query46) or die(mysqli_error());
$row46 = mysqli_fetch_assoc($result46);


}

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

.form-group .select2-container {
  position: relative;
  z-index: 2;
  float: left;
  width: 100%;
  margin-bottom: 0;
  display: table;
  table-layout: fixed;
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
   <li><a href='homemng'><span>Home</span></a></li>
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

<h1 align="center">Medicine Request stats</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							<td colspan="3"><label><strong> Select Investigation</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="date" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="date" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 <td colspan="3">
        <select name="bt" size="1" style="text-transform:uppercase"required class="con_charge1">
  
						
						
						<option value=''>-Select-</option>
						
						<?php 
			$sql = "select * from `medicine` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->id."'>".$row->mname."</option>";
				}
			}
			?>
						
				
        </select>
    
    
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
			<script>
$(document).ready(function() {
    $('.con_charge1').select2();
});
</script>
    </td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Request By</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Patient Name</strong>
      <th width="14%"><strong>Medicine</strong> 
<th width="14%"><strong>Implement Date</strong> 	
<th width="14%"><strong>Location</strong> 	
<th width="14%"><strong>QTY</strong> 	  
      

	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


echo "<font color=blue font size=3> Total Record found in the search  ";

	 
echo " ($bt) -  ";	 	 
	 

echo "   OPD-  ";	 
echo $row43['COUNT(medi)'];

echo " ,  IPD-  ";	 
echo $row44['COUNT(infusion)'];

echo " ,  A&E-  ";	 
echo $row45['COUNT(infusion)'];
echo " ,  ";

echo " ,  OT-  ";	 
echo $row46['SUM(pdos)'];
echo " ,  ";

	
echo "<font color=red font size=3> TOTAL  -  ";	 
echo $row43['COUNT(medi)'] + $row44['COUNT(infusion)']+ $row45['COUNT(infusion)']+$row46['SUM(pdos)'];


echo " <br> ";	 	 
echo "<font color=blue font size=3>From  ";
echo $start;
echo "  To  ";
echo $end;
$count=1;

$sel_query1="Select * from cathmediused where medi='$bt' and adate BETWEEN '$start' and '$end' order by id desc";
 

//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result1 = mysqli_query($con,$sel_query1);

while($row1 = mysqli_fetch_assoc($result1)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["dname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?></td>
	  <td align="center"><?php echo $row1["pname"]; ?></td>
      <td align="center"><?php echo $row1["medi"]; ?></td>
	  <td align="center"><?php echo $row1["adate"]; ?></td>
	  <td align="center"><?php echo 'CathLab'; ?></td>
	  <td align="center"><?php echo '1'; ?></td>
        
	  <td>
    <?php if($row4['m_received']==''){
echo '<input type="button" name="Received" value="Received" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data55">';

    }
    else {
   echo  "<a target='_blank' href='report_pethidine_cath?id=".$row1['id']."'>Print</a>";
  }
    ?>
    
    </td>
      </tr>
	  
    <?php $count++; } ?>
	
	
	
	<?php
	
	$sel_query2="Select * from imedi3 where infusion='$bt' and ndate BETWEEN '$start' and '$end' and status1='implemented' order by id desc";
 

//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result2 = mysqli_query($con,$sel_query2);

while($row2 = mysqli_fetch_assoc($result2)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
	  
	  
	  
	   <?php
	  $pmrn=$row2['pmrn'];
	  $iidd=$row2['id'];
	  $query_p = "SELECT * FROM patient where pmrn= '$pmrn';"; 
	 
$result_p = mysqli_query($con, $query_p) or die(mysqli_error());
$row_p = mysqli_fetch_assoc($result_p);
$pname=$row_p['pname'];

$u_dname=$row2['orderby'];
	  $query_p = "SELECT * FROM user where uname= '$u_dname';"; 
	 
$result_p1 = mysqli_query($con, $query_p) or die(mysqli_error());
$row_p1 = mysqli_fetch_assoc($result_p1);
$dname1=$row_p1['fullname'];



$query_pp = "SELECT * FROM phar_sale where iidd= '$iidd';"; 
	 
$result_pp1 = mysqli_query($con, $query_pp) or die(mysqli_error());
$row_pp1 = mysqli_fetch_assoc($result_pp1);
$location=$row_pp1['location'];
	  
	  ?>
      <td align="center"><?php echo $dname1; ?></td>
	  
	 
	  
      <td align="center"><?php echo $row2["pmrn"]; ?></td>
	  <td align="center"><?php echo $pname; ?></td>
      <td align="center"><?php echo $row2["infusion"]; ?></td>
	  <td align="center"><?php echo $row2["ndate"]; ?></td>
        
	  <td align="center"><?php echo $location; ?></td>
	  <td align="center"><?php echo '1'; ?></td>

    <td>
    <?php if($row2['m_received']==''){
echo '<input type="button" name="Received" value="Received" id="'.$row2['id'].'" class="btn btn-info btn-xs edit_data3">';

    }
    else {
   echo  "<a target='_blank' href='report_pethidine?id=".$row2['id']."'>Print</a>";
  }
    ?>
    
    </td>


      </tr>
	  
    <?php $count++; }?>
	
	<?php
	$sel_query3="Select * from estat where infusion='$bt' and ndate BETWEEN '$start' and '$end' order by id desc";
 
//$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result3 = mysqli_query($con,$sel_query3);

while($row3 = mysqli_fetch_assoc($result3)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
	  $u_dname=$row3['user'];
	  $query_p = "SELECT * FROM user where uname= '$u_dname';"; 
	 
$result_p = mysqli_query($con, $query_p) or die(mysqli_error());
$row_p = mysqli_fetch_assoc($result_p);
$dname=$row_p['fullname'];
	  
	  ?>
	  
      <td align="center"><?php echo $dname; ?></td>
      <td align="center"><?php echo $row3["pmrn"]; ?></td>
	  <td align="center"><?php echo $row3["pname"]; ?></td>
      <td align="center"><?php echo $row3["infusion"]; ?></td>
	  <td align="center"><?php echo $row3["ndate"]; ?></td>
        <td align="center"><?php echo 'A&E'; ?></td>
		<td align="center"><?php echo '1'; ?></td>
    <td>
    <?php if($row3['m_received']==''){
echo '<input type="button" name="Received" value="Received" id="'.$row3['id'].'" class="btn btn-info btn-xs edit_data4">';

    }
    else {
   echo  "<a target='_blank' href='report_pethidine_ae?id=".$row3['id']."'>Print</a>";
  }
    ?>
    
    </td>

      </tr>
	  
    <?php $count++; } ?>
	
	
	<?php
$sel_query4="Select * from othoscharge1 where medi='$bt' and ndate BETWEEN '$start' and '$end' order by id desc";
 
//$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result4 = mysqli_query($con,$sel_query4);

while($row4 = mysqli_fetch_assoc($result4)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
	  $u_dname=$row4['user'];
	  $query_p4 = "SELECT * FROM user where uname= '$u_dname';"; 
	 
$result_p4 = mysqli_query($con, $query_p4) or die(mysqli_error());
$row_p4 = mysqli_fetch_assoc($result_p4);
$dname4=$row_p4['fullname'];
	  
	  ?>
	  
      <td align="center"><?php echo $row4['dname']; ?></td>
      <td align="center"><?php echo $row4["pmrn"]; ?></td>
	  <td align="center"><?php echo $row4["pname"]; ?></td>
      <td align="center"><?php echo $row4["medi"]; ?></td>
	  <td align="center"><?php echo $row4["ndate"]; ?></td>
        <td align="center"><?php echo 'OT'; ?></td>
		<td align="center"><?php echo $row4['pdos']; ?></td>

    <td>
    <?php if($row4['m_received']==''){
echo '<input type="button" name="Received" value="Received" id="'.$row4['id'].'" class="btn btn-info btn-xs edit_data5">';

    }
    else {
   echo  "<a target='_blank' href='report_pethidine_ot?id=".$row4['id']."'>Print</a>";
  }
    ?>
    
    </td>

      </tr>
	  
    <?php $count++; } }?>
	
	
	


      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>


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
                     <h4 class="modal-title"align='center'>Empty Pethidine Received Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form3" name="frmMain23">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn3" class="form-control" size="15" readonly style="font-size:20px; color:red;font-weight:bold;">  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse3" class="form-control"  size="15" readonly>  
						  
						  
						             						 

                          <label>Received Option</label>                          
                          <select name="roption" id="roption" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">
                         
                          <option value="Received">Received</option>

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
                url:"ipd_pethidine.php",  
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
                     url:"ipd_pethidine_received.php",  
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
                     <h4 class="modal-title"align='center'>Empty Pethidine Received Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form4" name="frmMain24">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn4" id="pmrn4" class="form-control" size="15" readonly style="font-size:20px; color:red;font-weight:bold;">  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname4" id="ppluse4" class="form-control"  size="15" readonly >  
						  
						  
						  
                          <label>Received Option</label>                          
                          <select name="roption4" id="roption4" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">
                         
                          <option value="Received">Received</option>

</select>
 
		
                          
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
                url:"ipd_pethidine_ae.php",  
                method:"POST",  
                data:{employee_id4:employee_id4},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn4').val(data.pmrn);  
                     $('#ppluse4').val(data.pname);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp3').val(data.room); 
					 $('#app_dat3').val(data.infusion); 
					 $('#bagno').val(data.bagno); 
					 //$('#txtHint').val; 
                
					 
					 
					  
                     
					 
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
                     url:"ipd_pethidine_received_ae.php",  
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
                     <h4 class="modal-title"align='center'>Empty Pethidine Received Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form5" name="frmMain25">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn5" id="pmrn5" class="form-control" size="15" readonly style="font-size:20px; color:red;font-weight:bold;">  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname5" id="ppluse5" class="form-control"  size="15" readonly>  
						  
						  
						  
                          <label>Received Option</label>                          
                          <select name="roption5" id="roption4" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">
                         
                          <option value="Received">Received</option>

</select>
 
		
                          
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
                url:"ipd_pethidine_ot.php",  
                method:"POST",  
                data:{employee_id5:employee_id5},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn5').val(data.pmrn);  
                     $('#ppluse5').val(data.pname);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp3').val(data.room); 
					 $('#app_dat3').val(data.infusion); 
					 $('#bagno').val(data.bagno); 
					 //$('#txtHint').val; 
                
					 
					 
					  
                     
					 
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
                     url:"ipd_pethidine_received_ot.php",  
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







<div id="dataModal55" class="modal fade">  
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
 <div id="add_data_Modal55" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Empty Pethidine Received Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form55" name="frmMain255">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn55" id="pmrn55" class="form-control" size="15" readonly style="font-size:20px; color:red;font-weight:bold;">  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname55" id="ppluse55" class="form-control"  size="15" readonly>  
						  
						  
						  
                          <label>Received Option</label>                          
                          <select name="roption55" id="roption45" class="form-control"required style="font-size:18px;color:red;font-weight:blod;">
                         
                          <option value="Received">Received</option>

</select>
 
		
                          
                           <input type="hidden" name="employee_id55" id="employee_id55" />  
						   
						   <input type="hidden" name="pphone5" id="pphone5" />  
					<br>	  
						  <label><input type="submit" name="insert" id="insert4555" value="Insert" class="btn btn-success"></label>  
					 
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
           $('#insert_form55')[0].reset();  
      });  
      $(document).on('click', '.edit_data55', function(){  
           var employee_id55 = $(this).attr("id");  
           $.ajax({  
                url:"ipd_pethidine_cath.php",  
                method:"POST",  
                data:{employee_id55:employee_id55},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn55').val(data.pmrn);  
                     $('#ppluse55').val(data.pname);  
					 $('#dname5').val(data.dname);  
					$('#adate5').val(data.adate); 
					 $('#temp35').val(data.rfid); 
					 $('#app_dat35').val(data.medi); 
					 $('#bagno5').val(data.bagno); 
					 //$('#txtHint').val; 
                
					 
					 
					  
                     
					 
                     $('#employee_id55').val(data.id);  
                     $('#insert4555').val("Confirm");  
                     $('#add_data_Modal55').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form55').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn55').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"ipd_pethidine_received_cath.php",  
                     method:"POST",  
                     data:$('#insert_form55').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form55')[0].reset();  
                          $('#add_data_Modal55').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>



