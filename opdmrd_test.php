<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));

$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(dname) FROM presnew where dname= '$bt' and date1 BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



$query44 = "SELECT COUNT(dname) FROM presnew where date1 BETWEEN '$start' and '$end' ;"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44=mysqli_fetch_assoc($result44);
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

<link href="prescription/prescription/css/select2.min.css" rel="stylesheet" />
<script src="prescription/prescription/css/select2.min.js"></script>
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

<h1 align="center">Number of Out Patient Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							<td colspan="3"><label><strong> Select Consultant</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="date" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="date" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 <td colspan="3"><select name="bt">
        
						<option value=''>-Select-</option>
						<option value='all'>ALL</option>
						<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>Gender</strong></th>
	  <th width="10%"><strong>Age</strong></th>
	  <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>EID</strong></th>
	  
      <th width="15%"><strong>Appointment Date </strong>
      <th width="14%"><strong>Patient Phone</strong>   
      <th width="14%"><strong>Doctor's Name</strong>
      <th width="14%"><strong>Diagnosis</strong>
	  <th width="14%"><strong>ICD</strong>
	  
	  <th width="14%"><strong>Details</strong>

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


if (($_POST['bt'])=="all"){
echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row44['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;

$sel_query="Select * from presnew where  date1 BETWEEN '$start' and '$end' ";}
 else{
	 echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row43['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from presnew where dname='$bt' and date1 BETWEEN '$start' and '$end' ";
 } 
$count=1;
//$sel_query="Select * from presnew where dname='$bt' and date BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
	        <td align="center"><?php echo $row["psex"]; ?></td>
				        <td align="center"><?php echo $row["page"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["eid"]; ?>
      <td align="center"><?php echo $row["date"]; ?>
      <td align="center"><?php echo $row["pphone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
      <td align="center"><?php echo $row["diagnosis"]; ?>  
	  <td align="center"><?php echo $row["m1"]; ?>  
	  
	  
	  
	  <td align="center"><a target='_blank' href="historynewmng?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row["eid"]?>&date=<?php echo $row["date"]?>&dname=<?php echo $row["dname"]?>"><b>Details<b></a></td>	  
    
    <td align="center"><input type="button" name="edit" value="ICD" id="<?php echo $row['id'];?>" class="btn btn-info btn-xs edit_data3"></td>
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
                     <h4 class="modal-title"align='center'>Blood Return Received Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form3" name="frmMain23">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn3" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse3" class="form-control"  size="15" readonly>  
						  
						  
						             	
                         						 

                          <label>ICD CODE</label>                          
                          <select class="con_charge21"
					multiple=true
					style="width: 445px; overflow-y: auto;" name="icd[]" id="con_charge1">
				
				<?php
				
				/* $cid=$row['id'];
	$stmt5 = $DB_con->prepare("select * from `add_com_product` where cid='$cid'");
	$stmt5->execute();
	while($row5=$stmt5->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row5['product']; ?>"selected><?php echo $row5['product']; ?></option>
        <?php
	} */
?>
				
				
				
				
			

			</select>
            
		
			<script>
        $(document).ready(function(){

            $("#con_charge1").select2({
                ajax: {
                    url: "prescription/prescription/select_search_icd.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        </script>
		
                          
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
                url:"icd_data.php",  
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
                     url:"update_icd_data.php",  
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
