<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','staff','covid','call','imo','mofficer','nurse','emergency','staff','ot','endo','bill','billin','lab')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 600; URL=$url1");
$user=$_SESSION["sess_username"];
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
$test=date('Y-m-d',strtotime('-15 days') );
//echo '<br>';
$test1=date('Y-m-d', strtotime('30 days') );
//$test='2024-01-01';
 //$test1='2024-12-31';
$full = $row39['fullname'];
$tt=$_SERVER['HTTP_HOST']	;
$ad3=date('d/m/Y H:i:s');

$sel3="Select * from inpatient where '$ad3' between alert1 and alert2";

$resu3 = mysqli_query($con,$sel3);
$rw3 = mysqli_fetch_assoc($resu3);
$tt3=$rw3['pmrn'];
$tt4=$rw3['pname'];


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
   <li><a href='imoinview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>

    	    <li class='last'><a href='bgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='bview4'><span>Search previous patients</span></a></li>
      </ul>
	  
   </li>

<li class='last'><a href='billapp'><span>Appoinment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">Liver Clinic Patient List</p>



 
		
		
		

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
        <tr>
            <th><strong>S.No</strong></th>
      <th ><strong>Patient's Name</strong></th>
	  <th ><strong>Age</strong></th>
	        <th ><strong>Date</strong> 
      <th ><strong>MRN</strong></th>
	  <th><strong>Slot</strong></th>
	  
			<th><strong>Location</strong>
			<th><strong>Bill Status</strong>
			<th><strong>Assign</strong>
			<th><strong>Cancel</strong>
	  

	   </tr>
  </thead>
  <tbody>

  <?php
    	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;
		
$sel_query="Select * from pappnew where adate1 between '$test' and '$test1' and status NOT IN ('Cancel','SEEN') and dname IN('SFMM LIVER CLINIC') ORDER BY adate1 asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row['pmrn']; ?>"><?php echo $row["pname"]; ?></a></td>
	  <td align="center"><?php echo $row["page"]; ?></td>
	  <td align="center"><?php echo $row["adate"]; ?> </td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><?php echo $row["aslot"]; ?></td>
       
	  <td align="center"><?php echo $row["dname"]; ?>  </td>
	  
	  	 
        
		   
	  	 	


	       
	
    
    <?php if($row['bill']=='BILLED') {echo' 
   
   <td>'.$row['bill'].'<td>
	<td><input type="button" name="edit" value="Assign" id="'.$row['ID'].'" class="btn btn-info btn-xs edit_data"></td>
  	<td><a target="_blank" href="cancelapp?id='.$row["ID"].'&user='.$user.'"><strong>CANCEL</strong></a></td>
	';}

     
     
    else {echo' 
   
     <td>Not Paid<td>
       <td></td>
       
         <td><a target="_blank" href="cancelapp?id='.$row["ID"].'&user='.$user.'"><strong>CANCEL</strong></a></td>
       ';}
	
	
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
                          <input type="text" name="ppluse" id="ppluse" class="form-control"  size="15" readonly>  
						  
						  
						  
						  
						  <label>Appoinment Time</label>                          
                          <input type="text" name="temp" id="temp" class="form-control"readonly>
                         


 <label>Location</label>                          
                          <input type="text" name="pbp1" id="pbp1" class="form-control"readonly>
                         						 
						  
						  

                          <label>Local Consultant Name</label>  
                          
                          <select name="local" id="l_con_name" class="form-control" required onchange="showUser()">
<option value="">--Select--</option>
                    
                        <?php 
         $sql = "select * from `doctor` where status='Active' and liver='1'";
         $res = mysqli_query($con, $sql);
         if(mysqli_num_rows($res) > 0) {
              while($row = mysqli_fetch_object($res)) {
                   echo "<option value='".$row->dname."'>".$row->dname."</option>";
              }
         }
         ?>


      
      
</select>



                          <label>Consultant Name</label>  
                          
						  <select name="pbp" id="con_name" class="form-control" required onchange="showUser()">
<option value="">--Select--</option>
	  	              
						<?php 
			$sql = "select * from `doctor` where status='Active' and liver='1'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

  
		  
		  
</select>


                         
		 				  
						  
                          
                         
						  
						  
						  
						  <label>Appointment Date</label>  
                          
						  <input type='date' name="adate" id="adate" onchange="showUser()"size="20" style='background-color:lightgreen;font-size:22px;font-weight:bold;color:red;width:200px' min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('45 days') ); ?>" required>  
						  <label for="age"><strong>Available Slot :</strong></label>
			
			
			<select name ="txtHint" id="txtHint" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:120px" required>
			
			<option value=''>-Select-</option>
			
			</select>	    		
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
                url:"liver_patient.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#ppluse').val(data.pname);  
					$('#adate').val(data.adate1); 
					 $('#temp').val(data.aslot); 
					 $('#pphone').val(data.pphone); 
                          
					 //$('#txtHint').val; 
					 
                     $('#pbp').val(data.dname); 
                     $('#local').val(data.l_doc); 
					 $('#pbp1').val(data.status); 
					 
					 
					 
					  
                     
					 
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
                     url:"update_liver_consultant.php",  
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
 
<script>
function showUser() {
    // Retrieve values from the selects
  var q = document.getElementById('adate').value;
   var g= document.getElementById('con_name').value;
   var gg= document.getElementById('l_con_name').value;
if (q=="" || g=="") {
    document.getElementById("txtHint").innerHTML="";
	//var ret1 = parseInt($("#tname23").val()); 
    return;
  }
    var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
	 //var fval = document.getElementById('dname').value;
    }
  }
  xmlhttp.open("GET","opd_slot.php?q="+q+"&dname2="+gg, true);
 // xmlhttp.open("GET","endo_slot.php?q="+str+ "&dname2=<?php echo $dname2;?>", true);
  //hr.open('GET', 'DCC?command=' + encodeURIComponent(command)+"&varnameA=valueA",true);
  xmlhttp.send();
}
</script>