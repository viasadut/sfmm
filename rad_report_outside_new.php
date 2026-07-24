<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','rad')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 600; URL=$url1");

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
$row39 = mysqli_fetch_array($result39)
?>

<?php
$test=date('Y-m-d', strtotime('-30 days') );
 $test1=date('Y-m-d');
$full = $row39['fullname'];
$tt=$_SERVER['HTTP_HOST']	;
$ad3=date('d/m/Y H:i:s');

$sel3="Select * from inpatient where '$ad3' between alert1 and alert2";

$resu3 = mysqli_query($con,$sel3);
$rw3 = mysqli_fetch_assoc($resu3);
$tt3=$rw3['pmrn'];
$tt4=$rw3['pname'];


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
   <li><a href='imoinview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>

    	    <li class='last'><a href='bgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='bview4'><span>Search previous patients</span></a></li>
      </ul>
	  
   </li>

<li class='last'><a href='billapp'><span>Appoinment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">Pending Report List</p>



 
		
		
		

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
        <tr>
            <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
	        <th width="14%"><strong>Date</strong> 
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Investigation Name</strong></th>
	  <th width="10%"><strong>Instruction</strong></th>
	  <th width="10%"><strong>A_NO</strong></th>
      <th width="15%"><strong>Appointment Time </strong>

      <th width="14%"><strong>Reffered From</strong>
      
      

	  
	        <th width="14%"><strong>PACS View</strong>
			<th width="14%"><strong>Send For Outside Reporting</strong>
	  

	   </tr>
  </thead>
  <tbody>

  <?php
    	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;
		
$sel_query="Select * from radpapp where adate1 between '$test' and '$test1' and status='NOT SEEN' and out_report='0' and dname NOT IN('US','US1','US2') ORDER BY dname Asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
	  <td align="center"><?php echo $row["adate"]; ?> </td>
      <td align="center"><a href="<?php echo $row['link']?>?pmrn=<?php echo $row["pmrn"]; ?>&ID=<?php echo $row["ID"];?>&dreffer=<?php echo $row["dreffer"];?>&dname1=<?php echo $row["dname"];?>"><?php echo $row["pmrn"]; ?></a> </td>
	   <td align="center"><?php echo $row["tname"]; ?> </td>
		  <td align="center"><?php echo $row["ins"]; ?> </td>
	  
	  <td align="center"><?php echo $row["a_no"]; ?></td>
      <td align="center"><?php echo $row["aslot"]; ?></td>
       
	  <td align="center"><?php echo $row["dreffer"]; ?>  </td>
	  
	  	 
        
		   
	  	 	  <td align="center">
			  
			  <?php 
                 
                 if($tt=='192.168.100.252:8081')
{echo'

<form target="_blank" action="https://192.168.100.202:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$row['a_no'].'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
</form>';}

else if($tt=='182.160.124.36:6583')
	
	{
		echo'<form target="_blank" action="https://182.160.124.36:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$row['a_no'].'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
</form>';
		
	}


	else if($tt=='180.211.162.10:6583')
	
	{
		echo'<form target="_blank" action="https://180.211.162.10:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$row['a_no'].'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
</form>';
		
	}


	?>
		   </td>
		   
		   


	       
	
      
   

<td><input type="button" name="edit" value="Send" id="<?php echo $row['ID'];?>" class="btn btn-info btn-xs edit_data"></td>
	  
      </tr>
	  

    
    <?php $count++; } 
		
		
		
	
	
	
	
	?>
	
	
	
	
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
                     <h4 class="modal-title"align='center'>Send Image For Outside Reporting</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="ppluse" id="ppluse" class="form-control"  size="15" readonly>  
						  
						  <label>Name Of The Investigation</label>  
                          <input type="text" name="peid" id="peid" class="form-control" size="15" readonly>  
						  
						  
						  
						  <label>Referred Consultant Name</label>                          
                          <input type="text" name="temp" id="temp" class="form-control"readonly>
                         


 <label>Location</label>                          
                          <input type="text" name="pbp1" id="pbp1" class="form-control"readonly>
                         						 
						  
						  
                          <label>Reporting Consultant Name</label>  
                          
						  <select name="pbp" id="pbp" class="form-control" required>
<option value="">--Select--</option>
	  	  <option value="Dr. Muhammad Shoyab">Dr. Muhammad Shoyab</option>
		  <option value="Lt. Col. (Dr.) Md. Javed Mahfuz Khan">Lt. Col. (Dr.) Md. Javed Mahfuz Khan</option>
		  <option value="Dr. Sumi Datta">Dr. Sumi Datta</option>
		  
</select>

  
                          <label>Short History Of Patient</label>  
                          
						  <textarea type="text" name="pbp2" id="pbp2" class="form-control"> </textarea>
						  
						 
		  
		 				  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          
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
                url:"rad_patient.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#ppluse').val(data.pname);  
					$('#peid').val(data.tname); 
					 $('#temp').val(data.dreffer); 
                     $('#pbp').val(data.report_dname); 
					 $('#pbp1').val(data.location); 
					 $('#pbp2').val(data.shistory); 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.ID);  
                     $('#insert45').val("Send");  
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
                     url:"update_rad_consultant.php",  
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
 
 