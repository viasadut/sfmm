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

$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and id='$id'");
$data59 = mysqli_fetch_assoc($query4);
$odate1 = date('m/d/Y');  


//include("auth.php");
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');


?>
<?php 

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
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
<head>  
           
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


<form action="" method="post">
        <table align="center" class="table table-bordered" id="dynamic_field"> 
		
     <td align="center"colspan="1"><input type="button" name="edit" value="Details" id="<?php echo $id; ?>" class="btn btn-info btn-xs edit_data" /></td>  	 
	   <td align="center"colspan="1"><input type="button" name="edit1" value="Details1" id="<?php echo $id; ?>" class="btn btn-info btn-xs edit_data1" /></td>  	 

	   </tr>
 

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
                     <h4 class="modal-title">Curcuit Entry From</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>PMRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" value="<?php echo $pmrn;?>"readonly>  
                          
                          <label>Curcuit</label>  
                          <input type="text" name="cval" id="cval" class="form-control" >  
                          
                          <label>Time</label>  
                          
                          <select name="time"  value="" >
<option value="0000">0000</option>
<option value="0001">0001</option>
<option value="0002">0002</option>
<option value="0003">0003</option>
<option value="0004">0004</option>
<option value="0005">0005</option>
<option value="0006">0006</option>
<option value="0007">0007</option>
<option value="0008">0008</option>
<option value="0009">0009</option>
<option value="0010">0010</option>
<option value="0011">0011</option>
<option value="0012">0012</option>
<option value="0013">0013</option>
<option value="0014">0014</option>
<option value="0015">0015</option>
<option value="0016">0016</option>
<option value="0017">0017</option>
<option value="0018">0018</option>
<option value="0019">0019</option>
<option value="0020">0020</option>
<option value="0021">0021</option>
<option value="0022">0022</option>
<option value="0023">0023</option>
<option value="04:00AM">04:00AM</option>
<option value="04:10AM">04:10AM</option>
<option value="04:20AM">04:20AM</option>
<option value="04:30AM">04:30AM</option>
<option value="04:40AM">04:40AM</option>
<option value="04:50AM">04:50AM</option>
<option value="05:00AM">05:00AM</option>
<option value="05:10AM">05:10AM</option>
<option value="05:20AM">05:20AM</option>
<option value="05:30AM">05:30AM</option>
<option value="05:40AM">05:40AM</option>
<option value="05:50AM">05:50AM</option>
<option value="06:00AM">06:00AM</option>
<option value="06:10AM">06:10AM</option>
<option value="06:20AM">06:20AM</option>
<option value="06:30AM">06:30AM</option>
<option value="06:40AM">06:40AM</option>
<option value="06:50AM">06:50AM</option>
<option value="07:00AM">07:00AM</option>
<option value="07:10AM">07:10AM</option>
<option value="07:20AM">07:20AM</option>
<option value="07:30AM">07:30AM</option>
<option value="07:40AM">07:40AM</option>
<option value="07:50AM">07:50AM</option>
<option value="08:00AM">08:00AM</option>
<option value="08:10AM">08:10AM</option>
<option value="08:20AM">08:20AM</option>
<option value="08:30AM">08:30AM</option>
<option value="08:40AM">08:40AM</option>
<option value="08:50AM">08:50AM</option>
<option value="08:00AM">08:00AM</option>
<option value="09:00AM">09:00AM</option>
<option value="09:10AM">09:10AM</option>
<option value="09:20AM">09:20AM</option>
<option value="09:30AM">09:30AM</option>
<option value="09:40AM">09:40AM</option>
<option value="09:50AM">09:50AM</option>
<option value="10:00AM">10:00AM</option>
<option value="10:10AM">10:10AM</option>
<option value="10:20AM">10:20AM</option>
<option value="10:30AM">10:30AM</option>
<option value="10:40AM">10:40AM</option>
<option value="10:50AM">10:50AM</option>
<option value="11:00AM">11:00AM</option>
<option value="11:10AM">11:10AM</option>
<option value="11:20AM">11:20AM</option>
<option value="11:30AM">11:30AM</option>
<option value="11:40AM">11:40AM</option>
<option value="11:50AM">11:50AM</option>
<option value="11:00AM">11:00AM</option>
<option value="12:00PM">12:00PM</option>
<option value="12:10PM">12:10PM</option>
<option value="12:20PM">12:20PM</option>
<option value="12:30PM">12:30PM</option>
<option value="12:40PM">12:40PM</option>
<option value="12:50PM">12:50PM</option>
<option value="01:00PM">01:00PM</option>
<option value="01:10PM">01:10PM</option>
<option value="01:20PM">01:20PM</option>
<option value="01:30PM">01:30PM</option>
<option value="01:40PM">01:40PM</option>
<option value="01:50PM">01:50PM</option>
<option value="02:00PM">02:00PM</option>
<option value="02:10PM">02:10PM</option>
<option value="02:20PM">02:20PM</option>
<option value="02:30PM">02:30PM</option>
<option value="02:40PM">02:40PM</option>
<option value="02:50PM">02:50PM</option>
<option value="03:00PM">03:00PM</option>
<option value="03:10PM">03:10PM</option>
<option value="03:20PM">03:20PM</option>
<option value="03:30PM">03:30PM</option>
<option value="03:40PM">03:40PM</option>
<option value="03:50PM">03:50PM</option>
<option value="04:00PM">04:00PM</option>
<option value="04:10PM">04:10PM</option>
<option value="04:20PM">04:20PM</option>
<option value="04:30PM">04:30PM</option>
<option value="04:40PM">04:40PM</option>
<option value="04:50PM">04:50PM</option>
<option value="05:00PM">05:00PM</option>
<option value="05:10PM">05:10PM</option>
<option value="05:20PM">05:20PM</option>
<option value="05:30PM">05:30PM</option>
<option value="05:40PM">05:40PM</option>
<option value="05:50PM">05:50PM</option>
<option value="06:00PM">06:00PM</option>
<option value="06:10PM">06:10PM</option>
<option value="06:20PM">06:20PM</option>
<option value="06:30PM">06:30PM</option>
<option value="06:40PM">06:40PM</option>
<option value="06:50PM">06:50PM</option>
<option value="07:00PM">07:00PM</option>
<option value="07:10PM">07:10PM</option>
<option value="07:20PM">07:20PM</option>
<option value="07:30PM">07:30PM</option>
<option value="07:40PM">07:40PM</option>
<option value="07:50PM">07:50PM</option>
<option value="08:00PM">08:00PM</option>
<option value="08:10PM">08:10PM</option>
<option value="08:20PM">08:20PM</option>
<option value="08:30PM">08:30PM</option>
<option value="08:40PM">08:40PM</option>
<option value="08:50PM">08:50PM</option>
<option value="09:00PM">09:00PM</option>
<option value="09:10PM">09:10PM</option>
<option value="09:20PM">09:20PM</option>
<option value="09:30PM">09:30PM</option>
<option value="09:40PM">09:40PM</option>
<option value="09:50PM">09:50PM</option>
<option value="10:00PM">10:00PM</option>
<option value="10:10PM">10:10PM</option>
<option value="10:20PM">10:20PM</option>
<option value="10:30PM">10:30PM</option>
<option value="10:40PM">10:40PM</option>
<option value="10:50PM">10:50PM</option>
<option value="10:00PM">11:00PM</option>
<option value="11:10PM">11:10PM</option>
<option value="11:20PM">11:20PM</option>
<option value="11:30PM">11:30PM</option>
<option value="11:40PM">11:40PM</option>
<option value="11:50PM">11:50PM</option>

</select>
                          
                          
						                      
                          
						  
                          
                                                    <input type="hidden" name="employee_id" id="employee_id" />  
													<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
													
		
													
                           
                     </form>  
					 
					 
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
                url:"anaestestnew1.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#cval').val(data.cval);  
                     $('#time').val(data.time);  
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#cval').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#time').val() == '')  
           {  
                alert("Designation is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"anaestest90.php",  
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
 
 
 
 <div id="dataModal1" class="modal fade">  
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
 <div id="add_data_Modal1" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">DETAILS OF THE MEDICINE</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form1">  
                          <label>Medicine Name</label>  
                          <input type="text" name="name" id="name" class="form-control" readonly>  
                          
                          <tr>

<td colspan="2" align="center"><label><strong>Invasive BP</strong></label></td> 

                          
                          
						  
                          
                                                    <input type="hidden" name="employee_id" id="employee_id" />  
													 <input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success" />  
													
                           
                     </form>  
					 
					 
					 <div id="dataModal1" class="modal fade">  
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
           $('#insert_form1')[0].reset();  
      });  
      $(document).on('click', '.edit_data1', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"anaestestnew1.php",  
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
                     $('#add_data_Modal1').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form1').on("submit", function(event){  
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
                     data:$('#insert_form1').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form1')[0].reset();  
                          $('#add_data_Modal1').modal('hide');  
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
                          $('#dataModal1').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>