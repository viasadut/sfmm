<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf','doctor','imo','nurse','mofficer','emergency')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');

$test1=date('Y-m-d', strtotime('+1 days') );
$test=date('Y-m-d');
$user=$_SESSION["sess_username"];

//$bt=$_REQUEST["bt"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];






?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
 <head>

 <meta charset="utf-8">
<title>View Records</title>
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
    height: 40px;
    width: 30%;
    background-color: powderblue;
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
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    
    <script src="jsnew/bootstrap.min.js"></script>

   



   
   

   
   
   
   
   

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Cancel The OT ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Send the Patient to cunnent bed?");
}

</script>

</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='otdash'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">All OT Booking</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="17%"><strong>Age</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Date </strong>
      <th width="14%"><strong>Type</strong>   
      <th width="14%"><strong>Surgeon Name</strong>
	  <th width="14%"><strong>Bed No</strong>
	  <th width="14%" style="font-weight:bold;color:red;"><strong>Suggestion</strong>
	  <th width="14%"><strong>Anaesthetist Name</strong>
	  <th width="14%"><strong>Book Time</strong>
	  <th width="14%"><strong>Duration Time</strong>
	  <th width="14%"><strong>OT Name</strong>
      <th width="14%"><strong>Findings</strong>
	  <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Remarks</strong>
	  <th width="14%"><strong>Covid Result</strong>
	
	   </tr>
  </thead>
  <tbody>

  
     <?php
$odate=date('Y-m-d');	

echo "<font color=blue font size=5> Total Record found in the search  -";
//echo   $row43['COUNT(pmrn)'];


$count=1;
$sel_query="Select * from ot where date5 between '$test' and '$test' order by date5 asc";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>
 <?php
	  
	  $tt1=$row["pmrn"];
	  $queryi = "SELECT * FROM inpatient where pmrn= '$tt1' and discharge=''"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);


	  
//$tt1=$row["pmrn"];
$date455=$rowi['anew'];
$rid=$rowi['eid'];
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



$date45=date('m/d/Y',strtotime($rowi['anew']));

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
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["page"];?> 
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["otdate"]; ?>

      
      	  <td align="Left">
          <a target='_blank' href="billotbill_new1?pmrn=<?php echo $row['pmrn']; ?>&id=<?php echo $row['id']; ?>&proce=<?php echo $row['proce']; ?>">
          <?php echo $row["proce"].' ' .$row["Otherins"]; ?> </a></td>
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
      
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $rowi["room1"];?> 
	  <td align="center" style="font-weight:bold;color:red;"><?php echo 'Anes- '.$row["p_anes"].'<br /> OT-'.$row['p_ot'].'<br /> Time-'.$row['p_time'];?>
       
     </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["nanes"];?> </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"].' To '.$row["etime"];?> </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration1"];?> </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["duration"];?> </td> 
      <td align="center"><?php echo $row["procedure2"]; ?>  </td> 
	  <td align="center"><?php echo $row["status"]; ?>  </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["creason"];?></td>
	  
	  
	  
	 <td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=5){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=5){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($tt!='' and $dcon=='confirmed'and $diff47>5){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else if($rowc['lid']!='' and $dcon!='confirmed') {echo "<span style='color:blue;text-align:center;'><b>Result Pending";}else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($rowc['lid']=='' and $dcon!='confirmed') {echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";} ?></a>  </td>
      </tr>
	  
    <?php $count++; } ?>


      
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

                <h4 class="modal-title"align='center'>Change OT Date</h4>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="ppluse" id="ppluse" class="form-control"  size="15" readonly>  
						  
						  <label>Name Of The Procedure</label>  
                          <input type="text" name="peid" id="peid" class="form-control" size="15" readonly>  
						  
						  
						  
						  <label>Consultant Name</label>                          
                          <input type="text" name="temp" id="temp" class="form-control"readonly>
                         


                          <label for="tname45"><strong>Anaesthethist Name:</strong></label>



<select name="anes" value="" class="style1" size="1px;" id="anes">
		
	
	
	
    <option value='<?php echo $row39['anes3'];?>'selected><?php echo $row39['anes3'];?></option>
    <option value='N/A'>N/A</option>
                
            <?php 
          $sql = "select * from `doctor` where Discipline='anes' and status in ('Active','active')";
          $res = mysqli_query($con, $sql);
          if(mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_object($res)) {
              echo "<option value='".$row->dname."'>".$row->dname."</option>";
            }
          }
          ?>  </select>
          
      
  <br/>    

  <label for="tname45"><strong>OT NO:</strong></label>
<select name="bt2" value="" class="country" required size="1px;" id="bt2">
			        
<option ="">--Select OT Name--</option>
<option value='OT01'>OT01(RED)</option>
						<option value='OT02'>OT02(GREEN)</option>
						<option value='OT03'>OT03(BLUE)</option>
						<option value='OT04'>OT04(YELLOW)</option>
						<option value='OT05'>OT05(WHITE)</option>
						<option value='OT06'>OT06(ORANGE)</option>
						<option value='OT07'>OT07(PINK)</option>
						<option value='OT08'>OT08(PURPLE)</option>
</select>
			
<br />
 <label>OT Time</label>                        
                          
                         						 
						  <input type="text" name="pbp1" id="pbp1" placeholder="Select Date" size="15" required>
						  

  
                          
						 
		  
		 				  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          
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
                url:"ot_patient.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#ppluse').val(data.pname);  
					$('#peid').val(data.proce); 
					 $('#temp').val(data.dname); 
                     //$('#pbp').val(data.duration2); 
					 $('#pbp1').val(data.otdate); 
					 //$('#pbp2').val(pbp2); 
					
					  
                     
					 
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
                     url:"update_ot_date_mng.php",  
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