<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 300; URL=$url1");

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



<style>
    @media screen and (min-width: 1280px) {
        .modal-dialog {
          max-width: 1280px; /* New width for default modal */
        }
    }
</style>
   
   
   
   
</head>


<body>






<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
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

<p align="center" class="style1">WELCOME TO Covid Patient'S Panel</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> <td align="right" colspan="20"><a href="imoinviewtestmng"><strong>SEARCH</strong></a></td></tr>
<tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr>
    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="10%"><strong>Location</strong></th>
	  <th width="10%"><strong>Morning</strong></th>
      <th width="14%"><strong>Late</strong>
      <th width="14%"><strong>Night</strong>   
      
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from roaster_location";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
		  	 	

      
      <td align="center"><a href="roaster_4?id=<?php echo $row["loc"]; ?>"><?php echo $row["loc"]; ?></a>  
	  </td>
	  <?php
	  $id_in=$row['loc'];
	  ?>
	  
	  <td align="center"><?php 
	  

 $rr=$row['loc'];

	$sel_query1c="Select * from roaster_2 where date ='2021-08-16' and location='$rr' and emor='Morning'  order by id asc";	
	
$result1c = mysqli_query($con,$sel_query1c);

while ($rows1c = mysqli_fetch_assoc($result1c)){ ?>

<?php
$rr2=$rows1c['id'];
$rr1=$rows1c['mor'];
$sel_query1c1="Select * from staff3 where sid ='$rr1'order by id asc";	
	
$result1c1 = mysqli_query($con,$sel_query1c1);

$rows1c1 = mysqli_fetch_assoc($result1c1);

$s_name=$rows1c1['sname'];
$url = "s_details?sid=$rr1"; 


{echo
"
<span class='font3'><a target='_blank' href='$url'>".$s_name."</a>
<input type='button' name='edit' value='C' id=".$rr2." class='btn btn-info btn-xs edit_data'>

</span><br>


";}

}?>  
	  <td align="center"><?php 
	  

 $rr=$row['loc'];

	$sel_query1c="Select * from roaster_2 where date ='2021-08-16' and location='$rr' and emor='Late'  order by id asc";	
	
$result1c = mysqli_query($con,$sel_query1c);

while ($rows1c = mysqli_fetch_assoc($result1c)){ ?>

<?php

$rr2=$rows1c['id'];
$rr1=$rows1c['mor'];
$sel_query1c1="Select * from staff3 where sid ='$rr1'order by id asc";	
	
$result1c1 = mysqli_query($con,$sel_query1c1);

$rows1c1 = mysqli_fetch_assoc($result1c1);

$s_name=$rows1c1['sname'];
$url = "s_details?sid=$rr1"; 


{echo
"
<span class='font3'><a target='_blank' href='$url'>".$s_name."</a>
<input type='button' name='edit' value='C' id=".$rr2." class='btn btn-info btn-xs edit_data'>

</span><br>


";}

}?> 

</td> 
	  <td align="center">
	  
	  <?php 
	  

 $rr=$row['loc'];

	$sel_query1c="Select * from roaster_2 where date ='2021-08-16' and location='$rr' and emor='Night'  order by id asc";	
	
$result1c = mysqli_query($con,$sel_query1c);

while ($rows1c = mysqli_fetch_assoc($result1c)){ ?>

<?php
$rr2=$rows1c['id'];
$rr1=$rows1c['mor'];
$sel_query1c1="Select * from staff3 where sid ='$rr1'order by id asc";	
	
$result1c1 = mysqli_query($con,$sel_query1c1);

$rows1c1 = mysqli_fetch_assoc($result1c1);

$s_name=$rows1c1['sname'];
$url = "s_details?sid=$rr1"; 


{echo
"
<span class='font3'><a target='_blank' href='$url'>".$s_name."</a>

<input type='button' name='edit' value='C' id=".$rr2." class='btn btn-info btn-xs edit_data'>

</span><br>

";}

}?>  </td>
	 


      </tr>
    <?php $count++; } ?>
   </tbody>
</table>
</form>

</body>





<div id="dataModal" class="modal fade">  
      <div class="modal-dialog" style="max-width: 80%;" role="document">  
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
                     <h4 class="modal-title"align='center'>Update Roaster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						  
                          
						  
						  
		  
		   <label>Duty Location</label>  
						  <select type="text" name="pbp1" id="pbp1" class="form-control" required>
						
                          
			<?php 
			$sql = "Select * from roaster_location;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
		  </select>
		  
		  
		  <label>Duty Shift</label>  
						  <select type="text" name="pbp3" id="pbp3" class="form-control" required>
						
            <option value='Morning'>Morning</option>             
<option value='Late'>Late</option>             
<option value='Night'>Night</option>             			
			
		  </select>
		  
		  
		  
					 
						  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success" />  
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
                url:"roaster_2_2.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.mor);  
                     
					 $('#pbp1').val(data.location); 
					 $('#pbp3').val(data.emor); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Update");  
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
                     url:"roaster_3_3.php",  
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
 
 