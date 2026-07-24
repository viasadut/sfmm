<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','tm','staff','staff1')"; 
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


$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(sname) FROM staff3 where dept= '$bt' and status='active';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



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
 <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 50px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 1200px;
  }

}
      </style>

   <link rel="stylesheet" href="jquery-ui.css">
        <script src="jquery-1124.js"></script>
  <script src="jqueryui.js"></script>
  <link rel="stylesheet" href="bootstrapmin.css" />

   <link rel="stylesheet" href="styles.css">
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script>

  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
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

<h1 align="center">Department Wise Staff List</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						

							<td colspan="15"><label><strong> Select Department</strong></label></td> 
			 				<td colspan="5">	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 
					 <td colspan="15">
        <input list="browsers111" name="bt"  size="140"  style="text-transform:uppercase"required>
  <datalist id="browsers111">
						
						
						<option value=''>-Select-</option>
						
						<?php 
			$sql = "select distinct dept from `staff3`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dept."'>".$row->dept."</option>";
				}
			}
			?>
						
				
</datalist></td>  
					<td colspan="5">	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Staff's Name</strong></th>
	  <th width="17%"><strong>Staff's ID</strong></th>
      <th width="10%"><strong>Designation</strong></th>
      <th width="15%"><strong>Department</strong>
      <th width="14%"><strong>Present Address</strong>  
      <th width="14%"><strong>permanent Address</strong>
      
<th width="14%"><strong>Phone</strong> 
<th width="7%"><strong>Material</strong> 
<th width="7%"><strong>CHKUP</strong> 

      

	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


echo "<font color=blue font size=5> Total Record found in the search  -";

	 
	 
	 


echo $row43['COUNT(sname)'];

$count=1;

$sel_query1="Select * from staff3 where dept='$bt' and status='active' order by id";
 

//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result1 = mysqli_query($con,$sel_query1);

while($row = mysqli_fetch_assoc($result1)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></td>
	  <td align="center"><?php echo $row["sid1"]; ?></td>
      <td align="center"><?php echo $row["desig"]; ?></td>
      <td align="center"><?php echo $row["dept"]; ?></td>
	  <td align="center"><?php echo $row["padd"]; ?></td>
      <td align="center"><?php echo $row["peradd"]; ?>  
	  <td align="center"><?php echo $row["cno"]; ?></td>
<td><?php 
$count3=1;
$sid=$row['sid'];
$sel_query6="Select * from staff_item where sid= '$sid' and status='active' order by `id` DESC;";

$result6 = mysqli_query($con,$sel_query6);

while($row6 = mysqli_fetch_assoc($result6)) 
{ ?>	

<?php echo $row6["cname"].'-'.$row6["cyear"]; ?>
<?php $count3++; } ?>  </td>



<td>
<?php
$sid_t=$row['sid'];
$ddf=date('Y-m-d');
$year=date('Y');

$sel5 = "select COUNT(id) from staff_checkup where sid='$sid_t' and year='$year'"; 
	 
$res5 = mysqli_query($con, $sel5) or die(mysqli_error());

// Print out result
$row5 = mysqli_fetch_array($res5);


if($row5['COUNT(id)']==0)
{
	echo '<input type="button" name="edit_co_rr" value="1st CHKUP" id="'.$row['id'].'" class="btn btn-success edit_data_corr" />';
	
}

else if($row5['COUNT(id)']==1)
{
	echo '<input type="button" name="edit_co_rr" value="2nd CHKUP" id="'.$row['id'].'" class="btn btn-danger edit_data_corr" />';
	
}

else if($row5['COUNT(id)']>=2)
{
	echo '<input type="button" class="btn btn-primary btn-xs" value="CHKUP Completed" />';
	
}
?>


</td>
	  
      </tr>
	  
    <?php $count++; } }?>
	
	
	


      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>

<div id="msg">  
</form>
</body>
</html>
 
   <div id="dataModaltrr" class="modal fade">  
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
 <div id="add_data_Modalrr" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Follow Up Panel</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_formrr" id="insert_formrr">  
                         <label>MRN</label>  
                          <input type="number" name="mrn" id="mrn" class="form-control" style="font-size:30px;color:red;font-weight:bold" required readonly>  
                          
                          
						  
						  
						 <label>NAME</label>  
                          <input type="text" name="name" id="name" class="form-control" value=""  style="font-size:30px;color:red;font-weight:bold" required readonly>  
						  
						  
                          
                          <input type="hidden" name="employee_idrr" id="employee_idrr" />  
						    <input type="hidden" name="cno" id="cno" />  
							  <input type="hidden" name="padd" id="padd" />  
							  <input type="hidden" name="gender" id="gender" /> 
							  <input type="hidden" name="district" id="district" /> 
							  <input type="hidden" name="dob" id="dob" /> 
							  <input type="hidden" name="sid" id="sid" /> 
                         <input type="submit" name="insertrr" id="insert450rr" value="Insert" class="btn btn-success" />  
													
							
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
           $('#insertrr').val("Insert");  
           $('#insert_formrr')[0].reset(); 
      });  
      $(document).on('click', '.edit_data_corr', function(){  
           var employee_idrr = $(this).attr("id");  
           $.ajax({  
                url:"update_staff.php",  
                method:"POST",  
                data:{employee_idrr:employee_idrr},  
				
                dataType:"json",  
                success:function(data){  
                      $('#mrn').val(data.mrn);  
					  $('#name').val(data.sname);  
					  $('#cno').val(data.cno);  
					  $('#dob').val(data.dob);  
					  $('#gender').val(data.gender);  
					  $('#padd').val(data.padd);  
					  $('#district').val(data.district);  
					 $('#sid').val(data.sid);  
                      
					 
                    
					 
					 $('#employee_idrr').val(data.id);  
                     $('#insert450rr').val("Send");  
                     $('#add_data_Modalrr').modal('show');  
					  
                              

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_formrr').on("submit", function(event){  
           event.preventDefault();  
           if($('#mrn').val() == "")  
           {  
                alert("MRN is required");  
           }  
           else if($('#name').val() == '')  
           {  
                alert("Name is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"update_staff1.php",  
                     method:"POST",  
                     data:$('#insert_formrr').serialize(),  
                     beforeSend:function(){  
                          $('#insertrr').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_formrr')[0].reset();  
                          $('#add_data_Modalrr').modal('hide');  
                          $('#employee_table').html(data);  
						   
						  
						   $('#msg').html(data).fadeIn('slow');
     $('#msg').html("data insert successfully").fadeIn('slow') //also show a success message 
     $('#msg').delay(5000).fadeOut('slow');
						  
						  
						  parent.location.reload();
						  
                     }  
                });  
				//alert("Successful");  
           }  
      });   
 
 });  
 </script>