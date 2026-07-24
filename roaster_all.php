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
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Category</strong></th>
      <th width="14%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Working Diagnosis</strong>
	  <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  
	  
	  <th width="14%"><strong>Update Roaster</strong>
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from staff3 where dept='Nursing Services' and status='Active'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      
		<td align="center">  	 	

      
      <a href="roaster_4?id=<?php echo $row["id"]; ?>"><?php echo $row["sname"]; ?></a>  
	  <?php
	  $id_in=$row['sid'];
	  ?></td>
	  
	  
	  <td align="center"><?php 
	  
		$id_in=$row['sid'];
		$sel_query="Select * from roaster_1 where date between '2021-08-01' and '2021-08-01' and sid='$id_in' order by id asc";	
		$result1 = mysqli_query($con,$sel_query);
		$rows=mysqli_num_rows($result1);

	  $dstatus1=$row['ln1'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);
		echo "<span class=''>".$item."</span><br>";
}
	  ?>  
	  <td align="center"><?php 
	   $dstatus1=$row['ln2'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);
		echo "<span class=''>".$item."</span><br>";
}
	  
	  ?>  
	  <td align="center">
	  
	  <?php 
	   $dstatus1=$row['ln3'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);
		echo "<span class=''>".$item."</span><br>";
}
	  
	  ?>    
	  <td align="center">
	  <?php 
	   $dstatus1=$row['ln4'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);
		echo "<span class=''>".$item."</span><br>";
}
	  
	  ?>  
	  <td align="center"><?php 
	   $dstatus1=$row['ln5'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);
		echo "<span class=''>".$item."</span><br>";
}
	  
	  ?>  
	  <td align="center"><?php 
	   $dstatus1=$row['ln6'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);
		echo "<span class=''>".$item."</span><br>";
}
	  
	  ?>  
	  <td align="center"><?php 
	   $dstatus1=$row['ln7'];
$treat=explode(',',$dstatus1);

foreach ($treat as $item) {
	    $item = trim($item);
		echo "<span class=''>".$item."</span><br>";
}
	  
	  ?>  
	  

<td><input type="button" name="edit" value="Update Roaster" id="<?php echo "$id_in"; ?>" class="btn btn-info btn-xs edit_data"></td>
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
                     <h4 class="modal-title"align='center'>Patient Covid Stage & Treatment Update</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						  
                          
						  
						  
		  
		   <label>Level 5A & 5B </label>  
						  <select type="text" name="pbp1[]" id="pbp1" multiple="multiple" class="3col active" required>
						<option value=""selected></option>
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		  <label>Level 5C & 5D </label>  
						  <select name="pbp2[]" id="pbp2" multiple="multiple" class="3col active" required>
						  
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		 				  
						  <label>Level 6A & 6B </label>  
						  <select name="pbp3[]" id="pbp3" multiple="multiple" class="3col active" required>
						  
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		  
		  <label>Level 6C & 6D </label>  
						  <select name="pbp4[]" id="pbp4" multiple="multiple" class="3col active" required>
						  
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		  <label>Level 7A & 7B </label>  
						  <select name="pbp5[]" id="pbp5" multiple="multiple" class="3col active" required>
						  
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
						  
						  
						  <label>ICU</label>  
						  <select name="pbp6[]" id="pbp6" multiple="multiple" class="3col active" required>
						  
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		  <label>NICU</label>  
						  <select name="pbp7[]" id="pbp7" multiple="multiple" class="3col active" required>
						  
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
					 <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 3,
            placeholder: 'Select Nurse',
            search: true,
            searchOptions: {
                'default': ''
            },
            selectAll: true
        });

    });
</script>	  
						  
						  
                          
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
                url:"roaster_2.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.date);  
                     
					 $('#pbp1').val(data.ln1); 
					 $('#pbp2').val(data.ln2); 
					 $('#pbp3').val(data.ln3); 
					 $('#pbp4').val(data.ln4); 
					 $('#pbp5').val(data.ln5); 
					 $('#pbp6').val(data.ln6); 
					 $('#pbp7').val(data.ln7); 
					 
					 
					  
                     
					 
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
                     url:"roaster_3.php",  
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
 
 