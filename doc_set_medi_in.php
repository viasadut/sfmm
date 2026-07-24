
<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$iname=$_REQUEST['iname'];
//include("auth.php");
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');




if(isset($_POST['Submit1'])){
$medi1=$_REQUEST['medi1'];
$pdos=$_REQUEST['pdos'];
$pdos1=$_REQUEST['pdos1'];
//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$duration=$_REQUEST["duration"];


//$id=$row1["id"];


$sel990="SELECT * FROM medicine WHERE `mname`='$medi1';";
$result990 = mysqli_query($con,$sel990);




if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }
else {
$ins_query1="insert into doc_medi (`dname`,`iname`,`medi`,`pdos`,`duration`,`frelation`) values 
('$user','$iname','$medi1','$pdos','$pdos1','$duration')";
mysqli_query($con,$ins_query1) or die(mysql_error());

//header("Refresh: .1; URL=$url");

}
}
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM alltest WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Medication Form</title>
  
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
  height: 32px;
  border-radius: 2px;
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

   
   
   <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
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
  
  
  
   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>
  
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	//$("#loding1").hide();
	//$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		//$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				//$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".country").change(function()
	{
		//$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	//$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state11.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			//	$("#loding1").hide();
				$(".city").html(html);
			} 
		});
	});
	
	
	$(".country").change(function()
	{
		//$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	//$(".state").find('option').remove();
		$(".city22").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state12.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			//	$("#loding1").hide();
				$(".city22").html(html);
			} 
		});
	});
	
	
		
	
});
</script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   
   
   
   
              <script src="jsnew/jquery.min1.js"></script>  
           <link rel="stylesheet" href="jsnew/bootstrap.min1.css" />  
           <script src="jsnew/bootstrap.min1.js"></script>  



</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
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
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


<form action="" method="post" name="form">
        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Add Medicine in set medication <?php echo $iname;?></strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Medicine</strong></label></td> 

<td colspan="4" align="center"><label><strong>Frequency </strong></label></td> 
<td colspan="2" align="center"><label><strong>Duration</strong></label></td> 
<td colspan="4" align="center"><label><strong>Food Relation</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center"><input list="browsers2" name="medi1" size=60%  class="country" class="form-control"autocomplete="off" required/>
  <datalist id="browsers2">

						<option value=''>-Select Medicine</option>
				
				
				
				
				
				<?php
	$stmt = $DB_con->prepare("SELECT * FROM medicine where status='Active'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['mname']; ?>"><?php echo $row['mname']; ?></option>
        <?php
	} 
?>
				
				
				  </datalist></td>

<td  colspan="4"align="center"><input list="21" name="pdos"  class="form-control" value="">
   <datalist id="21" name="pdos"  class="state">
						  </datalist>
</td>

<td  colspan="2"align="center"><input list="23" name="duration"  class="form-control" value="">
   <datalist id="23" name="duration"  class="city22">
						  </datalist>
</td>


<td  colspan="4"align="center"><input list="22" name="pdos1"   class="form-control"value="">
   <datalist id="22" name="pdos1" class="city">

						  </datalist>
</td>



</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="Submit1_a">ADD SET</button></td>
		
	  
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="3" align="center"><strong>Set Medication Name</strong></td>
     	  <td colspan="8" align="center"><strong>Medicine Name</strong></td>
      	  <td colspan="6" align="center"><strong>Instruction</strong></td>
		        	  <td colspan="1" align="center"><strong>DELETE</strong></td>
					  <td colspan="1" align="center"><strong>Details</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from doc_medi where iname= '$iname'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
	  <td align="center" colspan="3"><?php echo $row["iname"]; ?></td>

      
	        <td align="center"colspan="8"><?php echo $row["brand"].' ('.$row["medi"].')'; ?></td>
			      <td align="center"colspan="6"><?php echo $row["pdos"].' ('.$row["duration"].')'.' ('.$row["frelation"].')'; ?> <input type="button" name="edit_co" value="E" id="<?php echo $row['id']; ?>" class="btn btn-info btn-xs edit_data_co" /></td>
				  
				  <td align="center" colspan="1"><a href="delete1_doc?id=<?php echo $row["id"]; ?>&iname=<?php echo $row["iname"]; ?>">DELETE</a></td>

  	  
<td align="center"colspan="1"><input type="button" name="edit" value="Details" id="<?php echo $row["medi"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		
	  
      </tr>
    <?php $count++; } ?>
	
</form>

<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>
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
                     <h4 class="modal-title">DETAILS OF THE MEDICINE</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_form"id="insert_form">  
                          <label>Medicine Name</label>  
                          <input type="text" name="name" id="name" class="form-control" readonly>  
                          
                          <label>Brand</label>  
                          <input type="text" name="address" id="address" class="form-control" readonly>  
                          
                          <label>Company</label>  
                          
                          <input type="text" name="result" id="result" class="form-control" readonly>  
                          
                          
						  <label>Standard Frequency</label>  
                          
                          <input type="text" name="frequency" id="frequency" class="form-control" readonly>  
                          
                          
						  <label>Food Relation</label>  
                          
                          <input type="text" name="frelation" id="frelation" class="form-control" readonly>  
                          
                          
						  
						  <label>Pregnency Catergory</label>  
                          
                          <input type="text" name="pcategory" id="pcategory" class="form-control" readonly>  
                          
                          
						  
						  <label>Contraindications</label>  
                          
                          
                          
                          <textarea class="form-control" name="contrain" id="contrain" rows="5" readonly></textarea>
						  
						  <label>Major Side Effect</label>  
                          
                          
                          <textarea class="form-control" name="meffect" id="meffect" rows="5" readonly></textarea>
                          
						  <label>Standard Duration</label>  
                          
                          <input type="text" name="duration" id="duration" class="form-control" readonly> 

							<label>Per PC / Dosage Price</label>  
                          
								<input type="text" name="uprice" id="uprice" class="form-control" readonly> 						  
                          
                                                    <input type="hidden" name="employee_id" id="employee_id" />  
													
													
                           
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
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"yyyynew.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.mname);  
                     $('#address').val(data.brand1);  
                     $('#result').val(data.brand2);  
					 $('#frequency').val(data.frequency);  
					 $('#frelation').val(data.frelation);  
					 $('#pcategory').val(data.pcategory);  
					 $('#contrain').val(data.contrain);  
					 $('#meffect').val(data.meffect);  
					 $('#duration').val(data.duration);  
					 $('#uprice').val(data.uprice);  
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"labedittest.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"selectmodallab.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
 
 
 
 
 
 
  <div id="dataModal7" class="modal fade">  
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
 <div id="add_data_Modal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Dosage / Instruction</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_form7" id="insert_form7">  
                         <label>Patient MRN</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
                          
                          <label>Medicine</label>  
                          <input type="text" name="phyper" id="phyper" class="form-control"  size="15" readonly>  
                          
                          <label>Frequency</label>  
                          <input type="text" name="pheart" id="pheart" class="form-control" />  
						  
						  <label>Duration</label>  
                          <input type="text" name="pheart2" id="pheart2" class="form-control" />  
						  
						  <label>Food Relation</label>  
                          <input type="text" name="pheart3" id="pheart3" class="form-control" />  
						  
						  
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
                         <input type="submit" name="insert" id="insert450" value="Insert" class="btn btn-success" />  
													
													
                           
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
           $('#insert').val("Insert");  
           $('#insert_form7')[0].reset();  
      });  
      $(document).on('click', '.edit_data_co', function(){  
           var employee_id2 = $(this).attr("id");  
           $.ajax({  
                url:"edit_opd_dosage_doc.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.pmrn);  
                     $('#phyper').val(data.medi);  
                     $('#pheart').val(data.pdos); 
					 $('#pheart2').val(data.duration); 
					 $('#pheart3').val(data.frelation); 
					 $('#employee_id2').val(data.id);  
                     $('#insert450').val("Update");  
                     $('#add_data_Modal7').modal('show');  
					  
                     
					 
          

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#phyper').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#pheart').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"edit_opd_dosage1_doc.php",  
                     method:"POST",  
                     data:$('#insert_form7').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form7')[0].reset();  
                          $('#add_data_Modal7').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>