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
//header("Refresh: 15; URL=$url1");

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
$full = $row39['fullname'];
$mng=$row39['ugroup'];
?>

<?php

if(isset($_POST['call']))
{
$url = "code_call";
echo $code_name=$_REQUEST['code_name'];

	//header("location:$url");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  
   <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="toastr.min.css">
    <style type="text/css">
        body{
            background:#d1d1d2;
        }
        .mian-section{
            padding:20px 60px;
            margin-top:100px;
            background:#fff;
        }
        .title{
            margin-bottom:50px;
        }
        .label-success{
            position: relative;
            top:20px;
        }

        .buttonON {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px #999;
      }
      .buttonON:hover {background-color: #3e8e41}
      .buttonON:active {
        background-color: #3e8e41;
        box-shadow: 0 1px #666;
        transform: translateY(4px);
      }
    </style>
  
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
  max-width: 1080px;
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


@media screen and (min-width: 1200pxpx) {

  form {
    max-width: 1200px;
  }

}


    @media screen and (min-width: 1200px) {
        .modal-dialog {
          max-width: 1200px; /* New width for default modal */
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
   
   <li class='active has-sub'><a href='#'><span>ADD TOPIC</span></a>
      <ul>
         <li class='has-sub'><a href='addqc'><span>ADD TOPIC</span></a>
            
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

<p align="center" class="style1">WELCOME TO Topic Panel</p> 

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> <td align="right" colspan="20"><a href="topicsearch"><strong>SEARCH</strong></a></td></tr>
<tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr>
    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Code Name</strong></th>
      <th width="10%"><strong>Call Code</strong></th>
      
	  <th width="14%"><strong>Last Code Call</strong>   
      
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$dis=$_REQUEST["dis"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from code_call where code_report='' order by id desc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
	
	 <?php
	 
	 $code_name=$row['code_name'];
	
	
	$staff1 = "select * from code where code_name='$code_name'";  
	$staff_result1 = mysqli_query($con, $staff1);  
	
      
	  $staff_data1 = mysqli_fetch_array($staff_result1);        
	$code_color=$staff_data1['code_color'];
	  
	  ?>
      <td align="center" style="background-color:<?php echo $code_color;?>;color:white;font-weight:bold;font-size:20px;"><?php echo $count.')'; ?></td>
      <td align="center" style="background-color:<?php echo $code_color;?>">
	  <input name="code_name" style="background-color:<?php echo $code_color;?>;color:white;font-weight:bold;font-size:20px;" type="text" value="<?php echo $row['code_name'];?>" readonly>
	  </td>
      
          
	<td align="center">

	
	<input style="background-color:<?php echo $row['id'];?>;font-size:25px;font-weight:bold" type="button" name="edit_co" value="Upload Report" id="<?php echo $row['id']; ?>" class="btn btn-info btn-xs edit_data_co" />
	
	</td> 
	<td align="center">
	 <a class="btn btn-outline-info btn-sm btn-block" href="active_code_details.php?id=<?php echo $row['id']; ?>">
                                                <i class="fas fa-info"></i> View
                                            </a>
	  </td>
    <td>

    <?php 
    if($row['call_c_status']==1){echo '
    <form action="call_code/updateDBLED.php" method="post" id="LED_ON" name="LED_ON">
      <input type="hidden" name="id_call" value="'.$row['id'].'"/>    
      <button class="buttonON" name= "call_update" type="submit">LED ON</button>
      
    </form>';
    }
    ?>
    </td>
      </tr>
    <?php $count++; } ?>
   </tbody>
</table>


</body>

</html>


<div id="dataModal7" class="modal" >  
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
 <div id="add_data_Modal7" class="modal">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Instruction</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_form7" id="insert_form7">  
                         <label>Code Name</label>  
                          <input type="text" name="code_name" id="code_name" class="form-control" size="15" readonly>  
						   <input type="text" name="code_id" id="code_id" class="form-control" size="15" required>  
                          
						  <label>Code Incharge</label>  
                          <input type="text" name="c_incharge" id="c_incharge" class="form-control"  size="15" readonly>  
						  
                          <label>Report</label>  
                          <input type="text" name="location" id="location" class="form-control"  size="15" required>  
                          
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						  <strong>Image:</strong>
                <input type="file" name="image" id="image" class="form-control">
            
						  
						  
						  
						  
						  
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
                url:"upload_code_report1.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#code_name').val(data.code_name);  
					 $('#code_id').val(data.id);  
					 $('#c_incharge').val(data.members);  
                     $('#employee_id2').val(data.id);  
					 $('#image').val();  
                     $('#insert450').val("Update");  
                     $('#add_data_Modal7').modal('show');  
					  
                     
					 
          

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#code_id').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#code_name').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"upload_code_report.php",  
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