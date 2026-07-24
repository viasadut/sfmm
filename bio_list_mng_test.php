<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng')"; 
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
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];
$dd=$row3['dept'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Reports</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->


div1 {
  height: 50px;
  width: 20%;
  border: 1px solid #4CAF50;
  float: right;
  
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
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
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



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

</style>



   
       
<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
   
   <link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

 


</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='histohome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>







<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 

<p align="right"><div1><input style="background-color: lightblue;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Asset Name.." title="Type in a Discipline">
</div1></p>
<p><div1><input style="background-color: lightgreen;" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search by Current Location.." title="Type in a Discipline">
</div1>

</p>

 

<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

    <tr class="header">
      <th width="2%"><strong>S.No</strong></th>
      <th width="2%"><strong>MSNO</strong></th>
	  <th width="2%"><strong>ID</strong></th>
      <th width="8%"><strong>Equipment Name</strong></th>
	  <th width="1%"><strong>VA</strong></th>
	  <th width="1%"><strong>Added By</strong></th>
      <th width="8%"><strong>Current Location</strong>
      <th width="8%"><strong>Vendor</strong> 
      <th width="8%"><strong>Warrenty</strong>
      <th width="8%"><strong>From</strong>  
      <th width="8%"><strong>Transfer to</strong>
	  <th width="8%"><strong>Details</strong>
	  <th width="8%"><strong>Send For Servecing</strong>
	  <th width="6%"><strong>Feedback</strong>
	  <th width="6%"><strong>Maintenance Note</strong>
	  
	  
	  
	        
	  



	   </tr>
  </thead>
  <tbody>
  
    
	
	
	
		<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from storenew where etype='Asset' and estatus!='Deleted' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
//echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["msno"]; ?></td>
      <td align="center"><a target='_blank' href="materialhistory1.php?eid=<?php echo $row['id']; ?>"><?php echo $row["id"]; ?></a> </td>
      <td align="center"><a target='_blank' href="transfer_his.php?eid=<?php echo $row['id']; ?>"><?php echo $row["ename1"]; ?></a> </td>
	  <td align="center"><a target='_blank' href="all_asset_list_indu.php?ename1=<?php echo $row['ename1']; ?>"><img src="eye.png" title="Print Report" width="30" height="15" /></a></td>
	  
	   <?php
	   $dn = $row['aby'];
$query40 = "SELECT * FROM staff3 where sid= '$dn'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$ss=$row40['sname'];

   ?>
	  
	  <td align="center"><?php echo $ss; ?>
      <td align="center"><?php echo $row["trans_to"]; ?>
      
	  <td align="center"><?php echo $row["supplier"]; ?>
	  <td align="center"><?php echo $row["warrenty"]; ?>
	  <td align="center"><?php echo $row["p_by"]; ?>
	  	  

		  <?php		 
				 
		$id=$row["id"];
		//$status=$row["status"];
		$tt=$row['trans_to'];
		$es=$row['elocation_s'];
		$url = "transfer_to?id=$id"; 
		$url2 = "dmsend?id=$id"; 
		$url3 = "dmsendbio1?id=$id"; 
		$url4 = "dmsendbio12?id=$id"; 
		$url5 = "asset_edit?id=$id"; 
				 
				 
				 ?>
		  
	        <td align="center">
			<?php if($tt==$dd)
			
		
			{ 
echo "<a href='$url'>Transfer To</a>";

	}
	
	else
	{ 
echo "";	

	}
?>
			
			
			
			</td>	
				        
<td align="center">
<?php if($es!=$dd)
			
		
			{ 
echo "<a href='$url5'>Details</a>";

	}
	
	else
	{ 
echo "";	

	}
?>



</td>  

	       
 <td align="center">
 
 		<?php if($tt==$dd)
			
		
			{ 
echo "<a href='$url2'>Send For Servecing</a>";

	}
	
	else
	{ 
echo "";	

	}
?>
 
 
 
 
 
 
 </td>	

<td align="center">


<?php if($ms=='$dd' and $row['estatus']=='Not Functioning')
			
		
			{ 
echo "<a href='$url3'>Give Feedback</a>";

	}
	
	else
	{ 
echo "";	

	}
?>







</td>	

 <td>
 
 
 <?php if($es==$dd)
			
		
			{ 
echo "<a href='$url4'>Maintenance Note</a>";



	}
	
	else
	{ 
echo "";	

	}
?>
 

 
 
 
 
 </td>	
<td align="center"colspan="1"><input type="button" name="edit" value="ADD-TO" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		  	  
	  
      </tr>
    <?php $count++; } ?>

  </tbody>
</table>

</form>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
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
    
	td = tr[i].getElementsByTagName("td")[6];
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
                     <h4 class="modal-title">ADD TOMORROW MEDICINE Form</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Patient MRN</label>  
                          <input type="text" name="name" id="name" class="form-control" size="15" readonly/>  
                          
						  <label>Code</label>  
                          <input type="text" name="code" id="code" class="form-control"  size="15"readonly/>  
						  
						  
                          <label>Medicine</label>  
                          <input type="text" name="address" id="address" class="form-control"  size="15"readonly/>  
                          
                          <label>Dilution</label>  
                          <input type="text" name="result" id="result" class="form-control" readonly>  
						  
						  <label>Instruction</label>  
                          <input type="text" name="ins" id="ins" class="form-control" />  
						  
						  <label>Route</label>  
						  <select list="rr1" name="route" id="route"  class="form-control">
                          <option value=''>-Select Route</option>
						<option value='Intravenous'>Intravenous</option>
						<option value='Intramuscular'>Intramuscular</option>
						<option value='Oral'>Oral</option>
						<option value='Per Rectal'>Per Rectal</option>
						<option value='Sub Cutaneous'>Sub Cutaneous</option>
						<option value='Infusion'>Infusion</option>
						<option value='Deep Intramuscular'>Deep Intramuscular</option>
						<option value='Eye'>Eye</option>
						<option value='Ear'>Ear</option>
						<option value='Epidural'>Epidural</option>
						<option value='Nebulizer'>Nebulizer</option>
						<option value='Inhaler'>Inhaler</option>
						<option value='Nose'>Nose</option>
						<option value='Local'>Local</option>
						<option value='Per Vaginal'>Per Vaginal</option>
			  </select>
						  
						  <label>Time</label>  
						  
						  <select list="rr1" name="time" id="time"  class="form-control">
  
<option value=''>-Select-</option>

<option value='SOS'>SOS</option>
						<option value='00:00'>00:00</option>
						<option value='01:00'>01:00</option>
						<option value='02:00'>02:00</option>
						<option value='03:00'>03:00</option>
						<option value='04:00'>04:00</option>
						<option value='05:00'>05:00</option>
						<option value='06:00'>06:00</option>
						<option value='07:00'>07:00</option>
						<option value='08:00'>08:00</option>
						<option value='09:00'>09:00</option>
						<option value='10:00'>10:00</option>
						<option value='11:00'>11:00</option>
						<option value='12:00'>12:00</option>
						<option value='13:00'>13:00</option>
						<option value='14:00'>14:00</option>
						<option value='15:00'>15:00</option>
						<option value='16:00'>16:00</option>
						<option value='17:00'>17:00</option>
						<option value='18:00'>18:00</option>
						<option value='19:00'>19:00</option>
						<option value='20:00'>20:00</option>
						<option value='21:00'>21:00</option>
						<option value='22:00'>22:00</option>
						<option value='23:00'>23:00</option>
			  </select>
                          
						                          
                          <input type="hidden" name="eid" id="eid" /> 
						  <input type="hidden" name="uprice" id="uprice" /> 
						  <input type="hidden" name="alert" id="alert" /> 
						  
						  
                          
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

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"asset_bar.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.msno);  
                     $('#address').val(data.infusion);  
                     $('#result').val(data.dilu); 
					 $('#dname').val(data.time); 
					 $('#ins').val(data.instruc); 
					 $('#route').val(data.root); 
					 $('#eid').val(data.eid); 
					 $('#time').val(data.time); 
					 $('#alert').val(data.alert); 
					 $('#uprice').val(data.uprice); 
					 $('#code').val(data.code); 
					 
					
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("ADD");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("MRN is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Medicine is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Dosage is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"newmediadd.php",  
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
</html>


