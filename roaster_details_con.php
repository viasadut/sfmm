<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 20; URL=$url1");
$id=$_REQUEST['id'];
$id1=$_REQUEST['id1'];

$month=date('F', strtotime($id));
$year=date('Y', strtotime($id));
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
$dept=$row7['dept'];
//echo $dept;
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
$row7 = mysqli_fetch_array($result3);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Detail Roster</title>



<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->



* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


#myInput2 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 5px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


img {
  border-radius: 50%;
  
}

div2 {
  height: 50px;
  width: 25%;
  border: 1px solid #4CAF50;
  float: right;
  
  
  div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}

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
  <li><a href='roaster_home'><span>Roster Home</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




<p align="center" class="style1">KPJ ONLINE ROSTER (<?php echo $month.'-'.$year;?>)</p> 
<p align="right"><div2><input style="background-color: lightblue;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Staff Name.." title="Type in a Discipline">
</div2></p>


<p align="right"><div2><input style="background-color: lightgreen;" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search By Department Name.." title="Type in a Discipline">
</div2></p>

<p align="right"><div2><input style="background-color: lightgrey;" type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search By Location Name.." title="Type in a Discipline">
</div2></p>

 

<form action="" method="GET">
<table border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

    <tr class="header">

      <th width="4%"><strong>S.No</strong></th>
      <th width="10%"><strong>Name</strong></th>
	   <?php 
	   
//$date = date('Y-m-01');
//$end = date('Y-m-' . date('t', strtotime($date))); //get end date of month

$date=$id;
$end=date($id1 . date('t', strtotime($date)));
	   
	   
	   while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('D', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
		$date_z = date("Y-m-d", strtotime("-1 day", strtotime($date)));
		$url = "roaster_55?date=$date_z"; 
		
        echo "<th align='center'><a target='_blank' href='$url'>$day_num <br/> $day_name</a></th>";
    }
    ?>
	  
	  
	  
      
      
	  
      
	   </tr>
  </thead>
  <tbody>

  
  
  

    


<?php
	
	

	
	
$user=$_SESSION["sess_username"];
//$date= date('Y-m-d');

$sel_query="Select * from staff1 where astatus ='Active' and designation!='Medical Officer' order by department asc";
//$start=$row["aadate"];
$count=1;
$rown = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($rown)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["mname"]; ?></a>
	  <td align="center"style="display:none;"><?php echo $row["sdepartment"]; ?></a>
	  <td align="center"style="display:none;"><?php echo $row["dept"]; ?></a>
	  
	  
	  </td>
	   
	    <?php 
$uuid=$row['sid'];	   
//$date = date('Y-m-01');
//$end = date('Y-m-' . date('t', strtotime($date))); //get end date of month


$date1=$id;
$end1=date($id1 . date('t', strtotime($date1)));

 
	   while(strtotime($date1) <= strtotime($end1)) {
        $day_num = date('d', strtotime($date1));
        $day_name = date('D', strtotime($date1));
        //$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
		//$date1 = date("Y-m-d", strtotime("-1 day", strtotime($date)));
        //echo "<td>$date1</td>";
		
		$date1 = date("Y-m-d", strtotime("+1 day", strtotime($date1)));
		
		$date_z = date("Y-m-d", strtotime("-1 day", strtotime($date1)));
		
		$dd=date("$id1$day_num");
		//echo "<td>$dd</td>";
		//echo "<td>$date1</td>";
		
		
		
  	 $s1="Select COUNT(distinct(mor)),emor,id,location from roaster_2 where date='$dd' and mor='$uuid'";
$r1 = mysqli_query($con, $s1) or die(mysqli_error());
$row1 = mysqli_fetch_array($r1);
$n1=$row1['COUNT(distinct(mor))'];


if($n1>0 and $row1['emor']=='Early') 


{echo ' <td>

<input type="button" style="background-color:lightgreen;color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">

</td>';}


else if($n1>0 and $row1['emor']=='Morning') 


{echo ' <td>

<input type="button" style="background-color:green;color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">
</td>';}

else if($n1>0 and $row1['emor']=='Late') 


{echo ' <td>
<input type="button" style="background-color:lime;color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">

</td>';}


else if($n1>0 and $row1['emor']=='Night') 


{echo ' <td>

<input type="button" style="background-color:olive;color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">
</td>';}


else if($n1>0 and $row1['emor']=='On-Call') 


{echo ' <td>

<input type="button" style="background-color:purple;color:white;" name="edit" value="'.$row1['emor'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">
</td>';}



else if($n1>0 and $row1['emor']=='24 Hour On-Call') 


{echo ' <td>

<input type="button" style="background-color:lightblue;color:white;" name="edit" value="'.$row1['emor'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">
</td>';}



else if($n1>0 and $row1['emor']=='Off') 


{echo ' <td>

<input type="button" style="background-color:red;color:white;" name="edit" value="'.$row1['emor'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">
</td>';}


	   else 
	   {   
	   echo '<td><input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1"></td>';
	   }
	   /*else 
	   {   
	   echo '<td><input type="button" name="add" value="A" data-id="'.$row['sid'].'" data-ime="'.$dd.'" class="btn btn-info btn-xs edit_data1"></td>';
	   }*/
		
		

		
    }
    ?>
	   
	   
	   
	   
	  
	   
	   
	

  
      </tr>
<?php $count++; } 

?>

  </tbody>
  
  
  
</table>
</form>

</body>

</html>


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
                     <h4 class="modal-title"align='center'>Update Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						  
                          
						  
						  
		  
		   <label>Duty Location</label>  
						  <select type="text" name="pbp1" id="pbp1" class="form-control" required>
						
                          
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  
		  <label>Duty Shift</label>  
						  <select type="text" name="pbp3" id="pbp3" class="form-control" required>
						<option value='Early'>Early</option>             			
            <option value='Morning'>Morning</option>             
<option value='Late'>Late</option>             
<option value='Night'>Night</option> 
<option value='On-Call'>On-Call</option>
<option value='24 Hour On-Call'>24 Hour On-Call</option>       
<option value='Off'>Off</option>             			
			
		  </select>
		  
		  
		  
					 
						  
						  
                          
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
                url:"roaster_2_2.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.mor);  
                     
					 $('#pbp1').val(data.location); 
					 $('#pbp3').val(data.emor); 
					                  
					 
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
                     url:"roaster_3_3.php",  
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

 
 
 <div id="add_data_Modal1" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>Date</label>  
						  
                          <input type="text" class="form-control" name="date" id="date" readonly></td>
						  
						  
		  
		   <label>Duty Location</label>  
						  <select type="text" name="pbp11" id="pbp11" class="form-control" required>
						
                          
			<?php 
			$sql = "Select * from roaster_location where dept='$dept' ;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  
		  <label>Duty Shift</label>  
						  <select type="text" name="pbp31" id="pbp31" class="form-control" required>
			<option value='Early'>Early</option>             			
            <option value='Morning'>Morning</option>             
<option value='Late'>Late</option>             
<option value='Night'>Night</option> 
<option value='On-Call'>On-Call</option>
<option value='24 Hour On-Call'>24 Hour On-Call</option>       
<option value='Off'>Off</option>             			
			
		  </select>
		  
		  
		  
					 
						  
						  
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4" value="Insert" class="btn btn-success" />  

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
           $('#insert_form2')[0].reset();  
      });  
      $(document).on('click', '.edit_data1', function(){  
           var employee_id2 = $(this).attr("id");  
		   var employee_id3 = $(this).attr("name");  
		   
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(employee_id3); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4').val("Add");  
                     $('#add_data_Modal1').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#add_data_Modal1').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
 
 
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[1];
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






<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[3];
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


<script>
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
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