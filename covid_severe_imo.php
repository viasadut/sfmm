<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 600; URL=$url1");

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
<p align="center" class="style1">Inpatient Search Panel</p>


<form action="" method="post">
 
		
		
		

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
        <tr>
            <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
	  <th width="24%"><strong>Working Diagnosis</strong>
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Go</strong>
      <th width="5%"><strong>Transfer Bed</strong>
	  <th width="5%"><strong>PWL</strong>
	  <th width="10%"><strong>Covid Result</strong>
	  <th width="7%"><strong>Stage</strong>
	  <th width="7%"><strong>Treatment</strong>
	  <th width="10%"><strong>Update Stage</strong>

	   </tr>
  </thead>
  <tbody>

  <?php
    	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;
		
$sel_query="Select * from inpatient where discharge= '' and adoc='Covid Unit' order by room1 asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
<?php
$id_in=$row['id'];
$ad=date('d/m/Y H:i:s');
$pp=$row['pmrn'];
$sel="Select * from inpatient where '$ad' between alert1 and alert2 and pmrn='$pp'";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);
?>


      <td align="center"<?php if($rw==true): ?> style="background-color:VIOLET;"<?php else: ?> <?php endif ; ?>><a href="imoidetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"<?php if($rw==true): ?> style="background-color:VIOLET;"<?php else: ?> <?php endif ; ?>><?php echo $row["adate"]; ?>  
	  
	  
	  
	  	  	 	  <?php
$tt1=$row["pmrn"];
$date455=$row['anew'];
$rid=$row['eid'];
$tt2=$row["pname"];

$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($row['anew']));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];



?>

	  
	  
	  
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="imoidetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">GO</a></td>
	  	  <td align="center"><a href="imotdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">transfer</a></td>
<td align="center"><a href="todolist?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>


<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>

<td align="center"><?php echo $row['stage'];?></td>	  
<td align="center"><?php echo $row['treat'];?></td>	  
<td><input type="button" name="edit" value="Update Stage" id="<?php echo "$id_in"; ?>" class="btn btn-info btn-xs edit_data"></td>
	  
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
                     <h4 class="modal-title"align='center'>Patient Covid Stage & Treatment Update</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 <label><input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success"></label>  
					 <br>
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						   <label>Patient Episode</label>  
                          <input type="text" name="peid" id="peid" class="form-control" size="15" readonly>  
                          
                          <label>Patient Name</label>  
                          <input type="text" name="ppluse" id="ppluse" class="form-control"  size="15" readonly>  
						  
						  <label>Consultant Name</label>                          
                          <input type="text" name="temp" id="temp" class="form-control"readonly>
                          
                          <label>Stage Of Disease </label>  
                          
						  <select name="pbp" id="pbp" class="form-control" required>
<option value="">--Select--</option>
	  	  <option value="Stage 1 – Asymptomatic ">Stage 1 – Asymptomatic </option>
		  <option value="Stage 2 – Mild ">Stage 2 – Mild </option>
		  <option value="Stage 3 – Moderate ">Stage 3 – Moderate </option>
		  <option value="Stage 4 – Severe ">Stage 4 – Severe </option>
		  <option value="Stage 5 – Very Severe ">Stage 5 – Very Severe </option>
		  <option value="Stage 6 – Death ">Stage 6 – Death</option>

</select>
						  
						  <label>Treatment Mode</label>  
						  <select name="pbp1[]" id="pbp1" multiple="multiple" class="3col active" required>
						  
                          
						  <option value="Nasal Prong">Nasal Prong</option>
		  <option value="BiPap">BiPap</option>
		  <option value="C-PAP">C-PAP</option>
		  <option value="High Flow Nasal Cannula">High Flow Nasal Cannula</option>
		  <option value="Oxygen concentrator">Oxygen concentrator</option>
		  <option value="Ventilated">Ventilated</option>
		  <option value="Face Mask">Face Mask</option>
		  <option value="Chest Tube">Chest Tube</option>
		  <option value="High Flow Mask">High Flow Mask</option>
		  <option value="Observation">Observation</option>
		  </select>
		  
		  
		 				  
						  
					 <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 3,
            placeholder: 'Select Treatment',
            search: true,
            searchOptions: {
                'default': ''
            },
            selectAll: true
        });

    });
</script>	  
						  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          
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
                url:"covid_patient.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#ppluse').val(data.pname);  
					 $('#peid').val(data.eid); 
					 $('#temp').val(data.adoc); 
                     $('#pbp').val(data.stage); 
					 $('#pbp1').val(data.treat); 
					 
					 
					  
                     
					 
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
           else if($('#ppluse').val() == '')  
           {  
                alert("Medicine is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"edit_covid_stage.php",  
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
 
 