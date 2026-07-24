<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','staff1')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

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
</style>
<link rel="stylesheet" href="jquery-ui.css">
        <script src="jquery-1124.js"></script>
  <script src="jqueryui.js"></script>
  <link rel="stylesheet" href="bootstrapmin.css" />

   <link rel="stylesheet" href="styles.css">
   
   

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
  height: 50px;
  border-radius: 2px;
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
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
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
    max-width: 1500px;
  }

}
      </style>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm Covid Vaccine Registration Status?");
}

</script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
</head>


<body>



<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">PATIENTS RECORD SEARCH PANEL </p> 

<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
	  <th width="4%"><strong>S.ID</strong></th>
      <th width="10%"><strong>Staff's Name</strong></th>
	  
      <th width="8%"><strong>Designation</strong></th>
      <th width="8%"><strong>Dept</strong>
	  <th width="8%"><strong>Sub-Dept</strong>
	  
      <th width="5%"><strong>Blood Group</strong>  
      
      
<th width="7%"><strong>Phone</strong> 
<th width="7%"><strong>C.Forward</strong> 
<th width="7%"><strong>A.Leave</strong> 
<th width="7%"><strong>IPD Bal</strong> 
<th width="7%"><strong>OPD Bal</strong> 
<th width="5%"><strong>HOS</strong> 
<th width="5%"><strong>Incharge</strong> 
<th width="4%"><strong>Image</strong>
<th width="5%"><strong>View</strong> 
<th width="5%"><strong>Edit</strong> 
<th width="5%"><strong>Dact</strong> 
<th width="5%"><strong>CHKUP</strong> 
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];

//$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from staff3 where status='Active'order by sid desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><a target='_blank' href="chkattntm?sid=<?php echo $row["sid"]; ?>"><?php echo $row["sid1"]; ?></a></td>
      <td align="center"><a target='_blank' href="chkleavetm?sid=<?php echo $row["sid"]; ?>"><?php echo $row["sname"]; ?></a></td>
	  
	  <?php
$sname=$row['sid'];
$rid=$row['id'];
$vr=$row['vr'];

$cyear=date('Y');


	  
	  
	  
	  $query39 = "SELECT * FROM staff3 where sid= '$sname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
	  
	  $status1= $row39['cstatus'];

$el= $row39['etaken'];
$al= $row39['ataken'];
$sl= $row39['staken'];
$sl1= $row39['sleave'];
$ma= $row39['mataken']; 
$pa= $row39['pataken'];
$doj= $row39['doj'];  
$status= $row39['status']; 
//$pa= $row['padd'];
$cf= $row39['cfleave'];
$doj12=date('Y',strtotime($doj));
$sl1s=$sl1-$sl;
 
/*$date2=date('01/01/2019');
$date1= date('m/d/Y');
$date3=date_create("$date2");
$date4=date_create("$date1");
$diff=date_diff($date4,$date3);
echo $diff->format("%d");*/
$now = time(); // or your date as well
$year=date('Y');
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
$your_date1 = strtotime("$doj");
//$your_date = strtotime("2019-01-01");
$datediff = $now - $your_date;
$datediff_y = $now - $your_date1;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438,2) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274,2) ;
$fday_y= round($datediff_y / (60 * 60 * 24)*.0438,2) ;
$fday1_y= round($datediff_y / (60 * 60 * 24)*.0274,2) ;


$fday3= round($datediff / (60 * 60 * 24)*.0164,2) ;
$fday3_y= round($datediff_y / (60 * 60 * 24)*.0164,2) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;


//echo $fday;
$aday=$fday+$cf-$al;
$aday1=$fday1-$el;

$aday_y=$fday_y+$cf-$al;
$aday1_y=$fday1_y-$el;


$aday2=$fday3-$al+$cf;
$aday2_y=$fday3_y-$al+$cf;

$cyear=date('Y');
$doj78=strtotime($doj);
$doj12=date('Y',strtotime($doj));
$datediff78 = $now - $doj78;
$fday8= round($datediff78 / (60 * 60 * 24)*.0164,2) ;
$fday9= round($datediff78 / (60 * 60 * 24)*.0274,2) ;

$url = "v_register?id=$rid"; 

?>
	  
	  
	    
	  
      <td align="center"><?php echo $row["desig"]; ?></td>
      <td align="center"><?php echo $row["dept"]; ?></td>
	  <td align="center"><?php echo $row["subdept"]; ?></td>
	  
	  
	  <td align="center"><?php echo $row["bgroup"]; ?></td>
      
	  <td align="center"><?php echo $row["cno"]; ?></td>
	  <td align="center"><?php echo $row["cfleave"]; ?></td>
	  
	  


<td align="center">
	 <?php if($status1=='Confirm'and $cyear!=$doj12){echo $aday;} 
	  else if($status1=='Confirm'and $cyear==$doj12){echo $aday_y;} 
	  else if($status1=='nonconfirm'and $cyear!=$doj12){echo $aday2;} 
	  else if($status1=='nonconfirm'and $cyear==$doj12){echo $aday2_y;}
?>
</td>	  

	  <td align="center"><a target='_blank' href='staff_benefit?sid=<?php echo $row['sid'];?>'><?php echo $row["ipd_bal"]; ?></a></td>
	  
	  	  <td align="center"><a target='_blank' href='staff_benefit?sid=<?php echo $row['sid'];?>'><?php echo $row["opd_bal"]; ?></a></td>
	  
<td><?php 
/*$count3=1;
$sid=$row['sid'];
$sel_query6="Select * from staff_item where sid= '$sid' and status='active' order by `id` DESC;";

$result6 = mysqli_query($con,$sel_query6);

while($row6 = mysqli_fetch_assoc($result6)) 
{ ?>	

<?php echo $row6["cname"].'-'.$row6["cyear"]; ?>
<?php $count3++; } */

$hos1=$row['hos'];
$incharge1=$row['incharge'];

$query9 = "SELECT * FROM staff3 where sid1= '$hos1'"; 
	 
$result9 = mysqli_query($con, $query9) or die(mysqli_error());

// Print out result
$row9 = mysqli_fetch_array($result9);


$query91 = "SELECT * FROM staff3 where sid1= '$incharge1'"; 
	 
$result91 = mysqli_query($con, $query91) or die(mysqli_error());

// Print out result
$row91 = mysqli_fetch_array($result91);


$hosn = $row9['sname'];
$inchargen = $row91['sname'];


	  
	  
	  




?>  

<?php echo $hosn; ?>

</td>


<td align="center"><?php echo $inchargen; ?></td>

<td><a href="#" id="<?php echo $row["id"];?>" title=" "><img alt="" src="staff_pic/<?php echo $row['pic'] ?>" class="img-flex-rounded" width="50"  height="50" align="center"/></a></td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a target='_blank' href="staff_details?sid=<?php echo $row["sid"]; ?>">View</a> </td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a target='_blank' href="staffedittm?sid=<?php echo $row["sid"]; ?>">Edit</a> </td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a target='_blank' href="staffedittm5?sid=<?php echo $row["sid"]; ?>">Deac</a> </td>
<td>
<?php
$sid_t=$row['sid'];
$ddf=date('Y-m-d');
$year=date('Y');

$sel5 = "select COUNT(id) from staff_checkup where sid='$sid_t' and year='$year'"; 
	 
$res5 = mysqli_query($con, $sel5) or die(mysqli_error());

// Print out result
$row5 = mysqli_fetch_array($res5);


if($row5['COUNT(id)']==0)
{
	echo '<input type="button" name="edit_co_rr" value="1st CHKUP" id="'.$row['id'].'" class="btn btn-success edit_data_corr" />';
	
}

else if($row5['COUNT(id)']==1)
{
	echo '<input type="button" name="edit_co_rr" value="2nd CHKUP" id="'.$row['id'].'" class="btn btn-danger edit_data_corr" />';
	
}

else if($row5['COUNT(id)']>=2)
{
	echo '<input type="button" class="btn btn-primary btn-xs" value="CHKUP Completed" />';
	
}
?>


</td>


      

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>

<div id="msg">  
<script>  
$(document).ready(function(){ 

 $('a').tooltip({
  classes:{
   "ui-tooltip":"highlight"
  },
  position:{ my:'left center', at:'right+50 center'},
  content:function(result){
   $.post('fetch_staff.php', {
    id:$(this).attr('id')
   }, function(data){
    result(data);
   });
  }
 });
  
});  
</script>



   <div id="dataModaltrr" class="modal fade">  
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
 <div id="add_data_Modalrr" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Follow Up Panel</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_formrr" id="insert_formrr">  
                         <label>MRN</label>  
                          <input type="number" name="mrn" id="mrn" class="form-control" style="font-size:30px;color:red;font-weight:bold" required readonly>  
                          
                          
						  
						  
						 <label>NAME</label>  
                          <input type="text" name="name" id="name" class="form-control" value=""  style="font-size:30px;color:red;font-weight:bold" required readonly>  
						  
						  
                          
                          <input type="hidden" name="employee_idrr" id="employee_idrr" />  
						    <input type="hidden" name="cno" id="cno" />  
							  <input type="hidden" name="padd" id="padd" />  
							  <input type="hidden" name="gender" id="gender" /> 
							  <input type="hidden" name="district" id="district" /> 
							  <input type="hidden" name="dob" id="dob" /> 
							  <input type="hidden" name="sid" id="sid" /> 
                         <input type="submit" name="insertrr" id="insert450rr" value="Insert" class="btn btn-success" />  
													
							
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
           $('#insertrr').val("Insert");  
           $('#insert_formrr')[0].reset(); 
      });  
      $(document).on('click', '.edit_data_corr', function(){  
           var employee_idrr = $(this).attr("id");  
           $.ajax({  
                url:"update_staff.php",  
                method:"POST",  
                data:{employee_idrr:employee_idrr},  
				
                dataType:"json",  
                success:function(data){  
                      $('#mrn').val(data.mrn);  
					  $('#name').val(data.sname);  
					  $('#cno').val(data.cno);  
					  $('#dob').val(data.dob);  
					  $('#gender').val(data.gender);  
					  $('#padd').val(data.padd);  
					  $('#district').val(data.district);  
					 $('#sid').val(data.sid);  
                      
					 
                    
					 
					 $('#employee_idrr').val(data.id);  
                     $('#insert450rr').val("Send");  
                     $('#add_data_Modalrr').modal('show');  
					  
                              

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_formrr').on("submit", function(event){  
           event.preventDefault();  
           if($('#mrn').val() == "")  
           {  
                alert("MRN is required");  
           }  
           else if($('#name').val() == '')  
           {  
                alert("Name is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"update_staff1.php",  
                     method:"POST",  
                     data:$('#insert_formrr').serialize(),  
                     beforeSend:function(){  
                          $('#insertrr').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_formrr')[0].reset();  
                          $('#add_data_Modalrr').modal('hide');  
                          $('#employee_table').html(data);  
						  
						    $('#msg').html(data).fadeIn('slow');
     $('#msg').html("data insert successfully").fadeIn('slow') //also show a success message 
     $('#msg').delay(5000).fadeOut('slow');
						  
						  parent.location.reload();
						  
                     }  
                });  
				//alert("Successful");  
           }  
      });   
     
 });  
 </script>