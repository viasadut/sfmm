<?php
include_once 'dbconfig.php';
?>


<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];


//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from pappnew where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query59);

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$dname =$_REQUEST["adoc"];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
$pname=$data1["pname"];
//$dtime = $_REQUEST['dtime'];
$query159 = mysqli_query($db,"select type from radio where iname='$medi'");
$data159 = mysqli_fetch_assoc($query159);
$type=$data159["type"];
//echo $type;
//echo $type;

$ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`date`) values ('$full', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$date')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
?>
<?php 

if(isset($_POST['Submit1'])){
$medi1=$_REQUEST['medi1'];
//$pdos=$_REQUEST['pdos'];
$pmrn=$data1["pmrn"];
$pname=$data1["pname"];
$date1 = date('m/d/Y');
//$id=$row1["id"];
$frequency=$_REQUEST["frequency"];
$duration=$_REQUEST["duration"];
$frelation=$_REQUEST["frelation"];
$ctaken=$_REQUEST["ctaken"];
$date2 = date('Y-m-d');

$sel9=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$medi1'");
$result9 = mysqli_fetch_assoc($sel9);
$brand2=$result9["brand1"];

$sel990="SELECT * FROM medicine WHERE `mname`='$medi1';";
$result990 = mysqli_query($con,$sel990);




if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }
else {
$ins_query1="insert into pmedi (`dname`,`pmrn`,`pname`,`medi`,`brand`,`frequency`,`duration`,`frelation`,`ctaken`,`eid`,`date`,`ndate`) values ('$full','$pmrn','$pname','$medi1','$brand2','$frequency','$duration','$frelation','$ctaken','$eid','$date1','$date2')";
mysqli_query($con,$ins_query1) or die(mysql_error());}}

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
  <title>Medicine</title>
  
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

    <script src="jsnew/prefixfree.min.js"></script>


  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">

<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Investigation</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

 <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	
	$(".form-control").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
	
		$.ajax
		({
			type: "POST",
			url: "ccc.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
		
		
		
		$.ajax
		({
			type: "POST",
			url: "ccc1.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				
				$(".state1").html(html);
			} 
		});
	
	
	
	
	$.ajax
		({
			type: "POST",
			url: "ccc2.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state2").html(html);
			} 
		});
		
	});
	
});
</script>
<head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           <script src="jsnew/jquery.min1.js"></script>  
           <link rel="stylesheet" href="jsnew/bootstrap.min1.css" />  
           <script src="jsnew/bootstrap.min1.js"></script>  
      </head>  

</head>
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


<form action="" method="post">
        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medication Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"bgcolor="lightblue"><label><strong>Medicine Name</strong></label></td> 
<td colspan="3" align="center"bgcolor="lightblue"><label><strong>Frequency</strong></label></td> 
<td colspan="3" align="center"bgcolor="lightblue"><label><strong>Duration (In Days)</strong></label></td> 
<td colspan="3" align="center"bgcolor="lightblue"><label><strong>Food Relation</strong></label></td> 
<td colspan="1" align="center"bgcolor="lightblue"><label><strong>Continue</strong></label></td> 


</tr>
<tr><td colspan="10"><input list="browsers131" name="medi1" class="form-control"size="90">
			<datalist id="browsers131"name="btype1" class="country" value=''required>
<option value=''>-Select Medicine</option>
				<?php
	$stmt = $DB_con->prepare("select * from `medicine` where status='Active'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['mname']; ?>"><?php echo $row['mname']; ?>(<?php echo $row['brand1']; ?>)</option>
        <?php
	} 
?> 
</datalist>	</td>		       
		
		
									
		<td colspan="3"><input list="browsers11" name="frequency" class="state" value=""size="25">
		
		<datalist id="browsers11"name="bno" class="state" value=''required></datalist></td>

		<td colspan="3"><input list="browsers111" name="duration" class="statel" value="" size="20">
		<datalist id="browsers111"name="bno2" class="state1" value=''required>
		
		</datalist></td>
		
			<td colspan="3">
			<input list="browsers114" name="frelation" class="state2" value="" size="20">
			<datalist id="browsers114"name="bno25" class="state2" value=''required></datalist>
			
		</td>

<td colspan="1"><input type="checkbox" name="ctaken" value="Continue"> Cont.</td>
		</tr>
		
<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td>
	  
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="1" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>Medicine</strong></td>
      	  <td colspan="5" align="center"><strong>Instruction</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
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
$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["brand"].' ('.$row["medi"].')'; ?></td>
			      <td align="center"colspan="5"><?php echo $row["frequency"].' ,'.$row["duration"].', '.$row["frelation"].', '.$row["ctaken"]; ?></td>
				  <td align="center" colspan="2"><a href="delete1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$dname"; ?>&eid=<?php echo "$eid"; ?>&ID=<?php echo "$id"; ?>">DELETE</a></td>

  	  <td align="center"colspan="1"><input type="button" name="edit" value="Details" id="<?php echo $row["medi"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
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
                     <h4 class="modal-title">DETAILS OF THE MEDICINE</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
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
                          
                          <input type="text" name="contrain" id="contrain" class="form-control" readonly>  
                          
                          
						  
						  <label>Major Side Effect</label>  
                          
                          <input type="text" name="meffect" id="meffect" class="form-control" readonly>  
                          
                          
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
                url:"yyyy.php",  
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