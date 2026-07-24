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
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");

?>

<?php $test=date('Y-m-d', strtotime('-30 days') );
  //echo $test;
//echo $date= date('m/d/Y');

$btype=$_REQUEST['btype'];
  ?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)

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
   <li><a href='teslab'><span>Home</span></a></li>
   
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='preview'><span>Print Previous Prescription</span></a>
            
         </li>
		 <li class='has-sub'><a href='tes5lab'><span>Prescription Status Wise Report </span></a>
            
         </li>
         <li class='has-sub'><a href='tes6lab'><span>Consultant Wise Report</span></a>
            
         </li>
      </ul>
   </li>
  <li><a href='testlabreceive'><span>OPD Pending Reports</span></a></li>
  
  <li><a href='opdlabreport'><span>OPD Done Reports</span></a></li>
  <li><a href='ipdlabreport'><span>IPD Done Reports</span></a></li>
  <li><a href='inplab'><span>Inpatient</span></a></li>
  <li><a href='emerlab'><span>Emergency</span></a></li>
  <li><a href='endoscopylab'><span>Endoscopy Suite</span></a></li>
  <li><a href='labsearchbar'><span>Search By Barcode</span></a></li>
  <li><a href='labstatlab'><span>Investigation Stats</span></a></li>
  <li><a href='categoryinvesmng'><span>Update</span></a></li>
  
  <li class='active has-sub'><a href='#'><span>Covid</span></a>
      <ul>
         <li class='has-sub'><a href='labcovidreceive'><span>Receive Covid Sample</span></a>
            
         </li>
		  <li class='has-sub'><a href='centrewise1'><span>Update Covid Result</span></a>
            
         </li>
		 <li class='has-sub'><a href='covidstatnew'><span>Datewise Covid Test Stats</span></a>
            
         </li>
		 
		 
      </ul>
   </li>
      
	  
	  
	  <li class='active has-sub'><a href='#'><span>Manual Request</span></a>
      <ul>
         <li class='has-sub'><a href='manualesearchlab'><span>OPD Manual Request</span></a>
            
         </li>
		  <li class='has-sub'><a href='registerlab'><span>Manula Patient Registration</span></a>
            
         </li>
		 
      </ul>
   </li>
      
	  <li class='last'><a href='mngpassword'><span>Change Password</span></a></li>
	  <li class='last'><a href='laballs'><span>Search Patient's All Reports</span></a></li>
	  <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>





<p align="center" class="style1">Expired Blood Bank Items</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Blood Type</strong></th>
	  <th width="17%"><strong>Blood Group</strong></th>
      <th width="10%"><strong>Collection Date</strong></th>
	  <th width="10%"><strong>Expiry Date</strong></th>
	  <th width="10%"><strong>Amount</strong></th>
	  <th width="10%"><strong>Bag No</strong></th>
      

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from bcross1 where btype='$btype' and status='available' and edate<='$date' order by btype desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      
		  	  	  <td align="center"><?php echo $row["btype"];?></a></td> 
<td align="center"><?php echo $row["bgroup"];?></a></td> 				  
<td align="center"><?php echo $row["udate"];?></a></td> 				  
<td align="center"><?php echo $row["edate"];?></a></td> 
<td align="center"><?php echo $row["bqty"];?></a></td> 
<td align="center"><?php echo $row["status"];?></a></td> 
<td align="center"><a href="labbar11.php?bagno=<?php echo $row['bagno']; ?>"><?php echo $row["bagno"];?></a></td> 

<td align="center"><input type="button" name="edit" value="Discard" id="<?php echo $row['id'];?>" class="btn btn-info btn-xs edit_data3"></td>
      </tr>
    <?php $count++; } ?>
	
	
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
                     <h4 class="modal-title"align='center'>Blood Return Received Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form3" name="frmMain23">  
					 
					 <label>Blood Bagno</label>                          
                          <input type="text" name="bagno" id="bagno" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">
                         

                                       
                          <label>Donor MRN</label>  
                          <input type="text" name="pmrn" id="pmrn3" class="form-control" size="15" readonly style="font-size:18px;color:green;font-weight:bold;">  
						   
						                           
                          <label>Donor Name</label>  
                          <input type="text" name="pname" id="ppluse3" class="form-control"  size="15" readonly style="font-size:18px;color:green;font-weight:bold;">  
						  
						  
						  <label>Blood Group </label>                          
                          <input type="text" name="bgroup" id="bgroup" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">

                          <label>Blood Type </label>                          
                          <input type="text" name="bgroup" id="btype" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">
						  
						  <label>Collection Date </label>                          
                          <input type="text" name="btype" id="temp3" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">

                          <label>Expire Date </label>                          
                          <input type="text" name="btype" id="app_dat3" class="form-control"readonly style="font-size:18px;color:red;font-weight:bold;">

                          

 <label>Remarks</label>                          
                          <textarea name="return_remarks" id="pbp13" class="form-control" required></textarea>
                         	
                         						 

                          <label>Option</label>                          
                          <select name="roption" id="roption" class="form-control"required style="font-size:18px;color:red;font-weight:bold;">
                          
                          
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
                url:"blood_patient_discard.php",  
                method:"POST",  
                data:{employee_id3:employee_id3},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn3').val(data.dmrn);  
                     $('#ppluse3').val(data.dname);  
					 $('#bgroup').val(data.bgroup);  
					$('#btype').val(data.btype); 
					 $('#temp3').val(data.udate); 
					 $('#app_dat3').val(data.edate); 
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
                     url:"discard_blood_bag.php",  
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
