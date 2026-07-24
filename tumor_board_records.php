<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
    $queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call','imo','mofficer','nurse','emergency','staff','ot','endo','bill','billin','lab','oic')"; 
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
   <li><a href='otdash'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='cview'><span>List of Unpaid Appointment</span></a>
            
         </li>
		 		 <li class='has-sub'><a href='cviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
      </ul>
	  
   </li>

    	    <li class='last'><a href='gg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='app1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $full; ?>'s Dash Board </p> 
<form action="cviewsp1" method="Post">
<?php if(!empty($_SESSION['error'])){ ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
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




								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      
	  <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Phone No</strong>
      <th width="14%"><strong>Age</strong> 
      <th width="14%"><strong>Gender</strong>
      <th width="14%"><strong>Address</strong> 
      <th width="14%"><strong>Add By</strong>
      <th width="14%"><strong>Add Time</strong> 	  
<th width="14%"><strong>Upload</strong> 	  
      
	        

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



$sel_query="Select * from patient_tumor";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>


      <?php
$add_by=$row['add_by'];
$queryr = "SELECT * FROM user where uname= '$add_by'"; 
	 
$resultr = mysqli_query($con, $queryr) or die(mysqli_error());

// Print out result
$rowr = mysqli_fetch_array($resultr);
$dname = $rowr['fullname'];


?>
	  
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
      <td align="center"><?php echo $row["pphone"]; ?></td>
      <td align="center"><?php echo $row["page"]; ?>  </td>
	  <td align="Left"><?php echo $row["psex"]; ?>  </td>
	  	  <td align="Left"><?php echo $row["padd"]; ?> </td>

              <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
       
       <?php echo $dname;?> </td> 
		  <td align="Left"><?php echo $row["add_time"]; ?> </td>
            <td align="Left">

            <?php if($row['doc']==''){echo
                                        '<form action="tumor_upload333.php" id="myform" enctype="multipart/form-data" method="POST">	   
            
            
            <input type="file" 
            id="capture" name="test" required>
          
				


<input type="hidden" name="id" value="'.$row["id"].'">


				
		
			
            <input type="submit" value="Upload" name="submit">
        </form>';}

        else {

          echo '<a target="_BLANK" href="tumor_upload_doc/'.$row["doc"].'"><img alt="" src="tumor_upload_doc/'.$row["doc"].'" class="img-flex-rounded" width="50"  height="50" align="center"/></a>';
          

        }
        ?>

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

					 
                     <h4 class="modal-title"align='center'>Surgery Note Edit Request</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						  
<label>Patient Name</label>  
                          <input type="text" name="pname" id="pname" class="form-control"  size="15" readonly>  

						  
						   <label>Name Of The Surgery</label>  
                          <input type="text" name="sname" id="sname" class="form-control" size="15" readonly>  
                          
                          
						  
						  <label>Surgeon Name</label>                          
                          <input type="text" name="surname" id="surname" class="form-control"readonly>
                          
                         
						  
						  <label>Remarks</label>  
						  <textarea name="remarks" id="remarks" class="form-control" readonly></textarea>
		 				  
						  
					 
						  
						  
                          
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
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"ot_edit_doc.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#pname').val(data.pname);  
					 $('#sname').val(data.proce); 
					 $('#surname').val(data.dname); 
                     $('#remarks').val(data.req_remarks); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Approve");  
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
                     url:"ot_edit_req_1.php",  
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