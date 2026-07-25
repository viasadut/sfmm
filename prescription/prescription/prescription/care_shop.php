<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd','gpopd')"; 
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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$date77=date('Y-m-d');

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from pappnew where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);

//$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
//$data59 = mysqli_fetch_assoc($query59);

  
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
$page=$data1["page"];
$psex=$data1["psex"];
$pphone=$data1["pphone"];
//$dtime = $_REQUEST['dtime'];
$query159 = mysqli_query($db,"select * from storenew where ename='$medi'");
$data159 = mysqli_fetch_assoc($query159);

$price=$data159["uprice"];
$code=$data159["eid"];
//echo $type;
//echo $type;

$sel90="SELECT * FROM storenew WHERE `ename`='$medi';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Item Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }

else{



$ins_query="insert into care_shop (`pmrn`,`eid`,`iname`,`ins`,`odate`,`oby`,`price`,`code`) values 
('$pmrn','$eid','$medi','$pins','$date77','$full','$price','$code')";
mysqli_query($con,$ins_query) or die(mysql_error());
}
//header("Refresh: .1;");
}

?>
<?php
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database

$dbhandle = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
mysqli_select_db($dbhandle, "sfmmkpjnew");
//$dbhandle = mysql_connect($hostname, $username, $password) 
 //or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
//$selected = mysql_select_db("sfmmkpjnew",$dbhandle) 
  //or die("Could not select examples");

  
$query198 = "SELECT SUM(price) FROM alltest where pmrn='$pmrn'and eid='$eid'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];
//echo $test1;


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  
   <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
  <title>Investigation</title>
  
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



  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>


</head>
</head>
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
           
           <script src="jsnew/jquery.min1.js"></script>  
           <link rel="stylesheet" href="jsnew/bootstrap.min1.css" />  
           <script src="jsnew/bootstrap.min1.js"></script>  
      </head>  
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='../../iview'><span>In-Patients</span></a>
            
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
   
   <li class='last'><a href='../../logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="6"><label><strong>Doctors's Name :</strong></label></td>
					<td colspan="6"><label><strong>Patient's Name :</strong></label></td>
					<td colspan="4"><label><strong>Patient's MRN:</strong></label></td>
					<td colspan="4"><label><strong>Patient's Episode:</strong></label></td>

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				<td colspan="6"><?php echo $data1["dname"]; ?></td>
				<td colspan="6"><?php echo $data1["pname"]; ?></td>
				<td colspan="4"><?php echo $pmrn; ?></td>
				<td colspan="4"><?php echo $eid; ?> </td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Care Shop Item Request Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Item</strong></label></td> 

<td colspan="10" align="center"><label><strong>Instructions</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center"><input type="text" id="infu"  class="form-control action" list="categoryname" autocomplete="off" name='medi'>
    <datalist id="categoryname">

						<option value=''>-Select Items</option>
				
								
				
				
				<?php 
			$sql = "select * from `storenew` where etype='Care Shoppe' and estatus='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->ename."'>".$row->ename."</option>";
				}
			}
			?>  </datalist></td>

<td colspan="10" align="center">
<textarea name="pins" id="remarks" class="form-control action" cols="30" rows="10"></textarea>
</td>


</tr>
			        

<tr>
<td colspan="20"align="right"><button type="submit" name="Submit">ADD</button></td>
</tr>
<tr>
      <td /colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>ITEM NAME</strong></td>
      	  <td colspan="3" align="center"><strong>Instruction</strong></td>
		  <td colspan="3" align="center"><strong>Price</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       
<tbody class="row_position">
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
$sel_query="Select * from care_shop where pmrn= '$pmrn' and eid='$eid' ORDER BY page_order";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    

<tr id="<?php echo $row['id'] ?>">
      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["iname"]; ?></td>
			      <td align="center"colspan="3"><?php echo $row["ins"]; ?><input type="button" name="edit_co" value="E" id="<?php echo $row['id']; ?>" class="btn btn-info btn-xs edit_data_co" /></td>
				  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
				  
				  <?php
		$rstatus=$row['rstatus'];
		$id1=$row['id'];
		
		
		
		$url = "delete_c?pmrn=$pmrn&id=$id1&ID=$id&dname=$dname&eid=$eid"; 
		   
		   
		
	if($rstatus!='RECEIVED')
	{ 
echo "<td align='center' colspan='2' style='background-color:lightblue;'><a href='$url'><b>DELETE</b></a></td>";
	}
	
	
	?>


  	  

	  
      </tr>
    <?php $count++; } ?>
<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Cost For The Selected Item(s) Will Be:<?php echo $test1;?> (BDT)</strong></td></tr>
</table>

</form>


</body>

</html>

    <script src="jquery-ui.min.js"></script>
    <script src="toastr.min.js"></script>
    <script type="text/javascript">
        $(".row_position").sortable({
            delay: 150,
            stop: function() {
                var selectedData = new Array();
                $('.row_position>tr').each(function() {
                    selectedData.push($(this).attr("id"));
                });
                updateOrder(selectedData);
            }
        });
        function updateOrder(data) {
            $.ajax({
                url:"ajaxPro1_c.php",
                type:'post',
                data:{position:data},
                success:function(data){
                    toastr.success('Your Change Successfully Saved.');
                }
            })
        }
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
                     <h4 class="modal-title">Edit Instruction</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_form7" id="insert_form7">  
                         <label>Patient MRN</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
                          
                          <label>Item Name</label>  
                          <input type="text" name="phyper" id="phyper" class="form-control"  size="15" readonly>  
                          
                          <label>Instruction</label>  
                          <input type="text" name="pheart" id="pheart" class="form-control" />  
						  
						  
                          
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
                url:"edit_opd_care.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.pmrn);  
                     $('#phyper').val(data.iname);  
                     $('#pheart').val(data.ins); 
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
                     url:"edit_opd_care1.php",  
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