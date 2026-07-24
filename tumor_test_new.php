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
header("Refresh: 120; URL=$url1");
$ct=date('H:i:s');
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$mng=$row39['ugroup'];

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$query3 = "SELECT * FROM incident1 where itype= 'Clinical'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
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
   <li><a href='homestaff'><span>Home</span></a></li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<h1 align="center" class="style1">Tumor Board Patient List</h1> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>


<p align="right"><div1><input style="background-color: lightgreen;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by MRN.." title="Type in a Discipline">
</div1></p>

 
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


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">


<tr>

<td colspan="20" align="right">
<form action="" method="POST">     

<select name="bt" style="background: lightgreen; font-weight:bold;">
        
												<option value=''>-Select Type-</option>
												<option value='TB'>Tumor Board</option>
                                                            <option value='MB'>Medical Board</option>
                                                            <option value='all'>All</option>
                                                            <option value='M'>Male</option>
                                                            <option value='F'>Female</option>
                                                            <option value='age'>Age</option>
                                                            <option value='diagnosis'>Diagnosis</option>
						
						
				
</select>
<button type="submit" name="bsearch" align="right">Search</button>
					Select Type From Dropdown List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					
        </form>
					</td>
        </tr>
<tr>
      <th width="4%"><strong>S.No</strong></th>
      
	  <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="10%"><strong>Phone No</strong>
      <th width="10%"><strong>Age</strong> 
      <th width="10%"><strong>Gender</strong>
      <th width="10%"><strong>Address</strong> 
      <th width="10%"><strong>Add By</strong>
      <th width="7%"><strong>Add Consultant</strong>
      <th width="7%"><strong>Add Time</strong> 	  
<th width="7%"><strong>Upload</strong> 
<th width="7%"><strong>Board Type</strong> 	  
   
  </thead>
  <tbody>
  
   
	<?php
	
	
		
	if(!isset($_POST['bsearch'])){
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date1= date('Y-m-d');
$count=1;
$sel_query="Select * from patient_tumor order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>


<?php
$add_by=$row['add_by'];
$queryr = "SELECT * FROM user where uname= '$add_by'"; 

$resultr = mysqli_query($con, $queryr) or die(mysqli_error());

// Print out result
$rowr = mysqli_fetch_array($resultr);
$dname = $rowr['fullname'];


?>

<td align="center"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn'];?>"><?php echo $row["pname"]; ?></a></td>
<td align="center"><a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row['pmrn'];?>"><?php echo $row["pmrn"]; ?></a></td>
<td align="center"><?php echo $row["pphone"]; ?></td>
<td align="center"><?php echo $row["page"]; ?>  </td>
<td align="Left"><?php echo $row["psex"]; ?>  </td>
  <td align="Left"><?php echo $row["padd"]; ?> </td>

        <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
 
 <?php echo $dname;?> </td> 
<td align="Left">
<?php
$tid=$row['ID'];
$tmrn=$row['pmrn'];

$sel_query9="Select * from tumor_board_doc where pmrn='$tmrn' and tid='$tid'";
$row10 = mysqli_query($con,$sel_query9);
while($row9 = mysqli_fetch_assoc($row10)){ 
echo $row9["dname"];
echo "<br>";
}
?>
<input type="button" name="edit" value="Add Consultant" id="<?php echo $row['ID'];?>" class="btn btn-info btn-xs edit_data"></td>
<td align="Left"><?php echo $row["add_time"]; ?> </td>

    
	  
	  <td align="left"><span style='color:red;text-align:center;font-size:22px'>
	  
	 
	  
	  <b><a target='_BLANK' href="cam_test/rela_photo/<?php echo $row['sfmm_form']; ?>"><?php echo $row["sfmm_form"]; ?></a>
	  
      <?php if($row['doc']==''){ echo'
<form action="cam_test/tumor_upload.php" id="myform" enctype="multipart/form-data" method="POST">	   
            
            
            <input type="file" 
            id="capture" name="test" required>
          
				

<input type="hidden" name="id" value="'.$row["ID"].'">

				
		
			
            <input type="submit" value="Upload" name="submit">
        </form>';}
        
        else {

          echo '<a target="_BLANK" href="cam_test/tumor_doc/'.$row["doc"].'">'.$row['doc'].'</a>';
          

        }
        ?>




	  </td>
	  
	    
       <td align="left"><span style='color:red;text-align:center;font-size:22px'><?php echo $row['b_type'];?></td>






      </tr>
    <?php $count++; } }?>
	
	
	
	
	
	
	
	
	




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
                     <h4 class="modal-title"align='center'>Assign Liver Clinic Doctor</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="pname" class="form-control"  size="15" readonly>  
						  
						  
						              

                          
						  
                          <label>Consultant Name</label><br>  
                          
						  <select name="doc" id="con_name" class="con_charge" required multiple="multiple" style="width: 100%; height: 30%">
<option value="">--------Select------------</option>
	  	              
						<?php 
			$sql = "select * from `doctor` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
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
   
  
    $(".con_charge").select2({
      
					maximumSelectionLength: 1,
				});
});
</script>

                         
		 				  
						  <br>
                          
                         
						  
						  
						  
						  
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

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


</body>

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
                url:"tumor_patient.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#pname').val(data.pname);  
                     //$('#doc').val();  
					 //$('#txtHint').val; 
           
					 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.ID);  
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
                     url:"assign_tumor_doc.php",  
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



<?php
if(isset($_POST['bsearch'])){
$bt=$_REQUEST["bt"];
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');


if ($bt=="all"){
     $sel_query="Select * from patient_tumor order by pmrn;";}
     

else if ($bt=="M"){
$sel_query="Select * from patient_tumor where psex= 'M' order by pmrn;";}


 else if ($bt=="F"){
     $sel_query="Select * from patient_tumor where psex= 'F' order by pmrn;";
 } 
 
 else if ($bt=="age"){
     $sel_query="Select * from patient_tumor  order by page desc;";
 } 



 else if ($bt=="TB"){
     $sel_query="Select * from patient_tumor where b_type='Tumor Board' order by pmrn desc;";
 } 

 else if ($bt=="MB"){
     $sel_query="Select * from patient_tumor where b_type='Medical Board' order by pmrn desc;";
 } 
 
 else if($bt=="diagnosis")
 
 {
	 $sel_query="Select * from patient_tumor where pname like'%$pmrn%';";
 } 

 
$count=1;

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>
 <td align="center"><?php echo $count; ?></td>


<?php
$add_by=$row['add_by'];
$queryr = "SELECT * FROM user where uname= '$add_by'"; 

$resultr = mysqli_query($con, $queryr) or die(mysqli_error());

// Print out result
$rowr = mysqli_fetch_array($resultr);
$dname = $rowr['fullname'];


?>

<td align="center"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn'];?>"><?php echo $row["pname"]; ?></a></td>
<td align="center"><a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row['pmrn'];?>"><?php echo $row["pmrn"]; ?></a></td>
<td align="center"><?php echo $row["pphone"]; ?></td>
<td align="center"><?php echo $row["page"]; ?>  </td>
<td align="Left"><?php echo $row["psex"]; ?>  </td>
  <td align="Left"><?php echo $row["padd"]; ?> </td>

        <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
 
 <?php echo $dname;?> </td> 
<td align="Left">
<?php
$tid=$row['ID'];
$tmrn=$row['pmrn'];

$sel_query9="Select * from tumor_board_doc where pmrn='$tmrn' and tid='$tid'";
$row10 = mysqli_query($con,$sel_query9);
while($row9 = mysqli_fetch_assoc($row10)){ 
echo $row9["dname"];
echo "<br>";
}
?>
<input type="button" name="edit" value="Add Consultant" id="<?php echo $row['ID'];?>" class="btn btn-info btn-xs edit_data"></td>
<td align="Left"><?php echo $row["add_time"]; ?> </td>

    
	  
	  <td align="left"><span style='color:red;text-align:center;font-size:22px'>
	  
	 
	  
	  <b><a target='_BLANK' href="cam_test/rela_photo/<?php echo $row['sfmm_form']; ?>"><?php echo $row["sfmm_form"]; ?></a>
	  
      <?php if($row['doc']==''){ echo'
<form action="cam_test/tumor_upload.php" id="myform" enctype="multipart/form-data" method="POST">	   
            
            
            <input type="file" 
            id="capture" name="test" required>
          
				

<input type="hidden" name="id" value="'.$row["ID"].'">

				
		
			
            <input type="submit" value="Upload" name="submit">
        </form>';}
        
        else {

          echo '<a target="_BLANK" href="cam_test/tumor_doc/'.$row["doc"].'">'.$row['doc'].'</a>';
          

        }
        ?>




	  </td>
	  
	    
       <td align="left"><span style='color:red;text-align:center;font-size:22px'><?php echo $row['b_type'];?></td>





	  
      </tr>

	<?php $count++;  }}
     
     
     
     
     ?>


</tbody>
</table>
