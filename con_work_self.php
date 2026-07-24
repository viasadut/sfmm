<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('ot','imo','doctor','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
include_once 'dbconfig.php';
 $user = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$date=date('m/d/Y');
//$bt4='02:30:00';
//$bt3='18:00:00';

//$duration1=strtotime($bt4) - strtotime($bt3); 
//echo $duration=gmdate("H:i",$duration1); 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];

//include("auth.php");
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from patient where pmrn='$pmrn'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

 
$query1 = "SELECT * from patient where pmrn='$pmrn'"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);

$addate= $row1['adate'];
$eid= $row1['eid'];
$pname= $row['pname'];
$pmrn= $row['pmrn'];
$pphone= $row['pphone'];  
$page=$row['page'];
$psex= $row['psex'];

$queryd = "SELECT * FROM diap where pmrn= '$pmrn' and  eid='$eid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];

$pro_name=$_REQUEST['pro_name'];
//$cdetails=$_REQUEST['cdetails'];

$date1=date('Y-m-d',strtotime($_REQUEST['date']));
$s_date=date('Y-m-d H:i:s');
//$bt=$_REQUEST['bt2'];
//$tp=$_REQUEST['tp'];
$loc=$_REQUEST['loc'];

$remarks=$_REQUEST['remarks'];




$date=date('Y-m-d', strtotime($date));


$queryd = "SELECT * FROM user where fullname= '$dname'"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$dcode=$rowd['uname'];

$querym = "SELECT COUNT(id) FROM privilege where dname= '$dname' and pname='$pro_name' and status='Approved'"; 
	 
$resultm = mysqli_query($con, $querym) or die(mysqli_error());

// Print out result
$rowm = mysqli_fetch_array($resultm);
$ap=$rowm['COUNT(id)'];



	
if(empty($_REQUEST['dname']))

{
       echo '<script language="javascript">';
    echo 'alert("No Surgeon Name is selected !!"); ';
    echo '</script>';

    }

else if($ap==0)

{
       echo '<script language="javascript">';
    echo 'alert("Sorry !! You Dont have the privilege.. kindly apply for it !!"); ';
    echo '</script>';

    }	
	
//$t1='11:00';
//$t2='12:30';
//$t3=strtotime($t2)-strtotime($t1);
//echo $t4=gmdate("H:i", $t3);

else {

$ins_query="insert into con_work (`dname`,`dcode`,`pro_name`,`pname`,`pmrn`,`pphone`,`psex`,`page`,`date`,`s_date`,`s_by`,`remarks`,`status`,`loc`) values 
('$dname', '$user','$pro_name','$pname','$pmrn','$pphone','$psex','$page','$date1','$s_date','$user','$remarks','Pending','$loc')";
mysqli_query($con,$ins_query) or die(mysql_error());


//$update="update otslot set status='Booked' where `otdate`='$date1' and otname='$bt' and `ottime` between '$bt3' and '$bt4'";
//mysqli_query($con,$update);

echo '<script language="javascript">';
    echo 'alert("Booking Set Successfully"); ';
    echo '</script>';
}
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>OT Booking</title>
  
   

  
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
  background: red;
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
    max-width: 1200px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
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


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   
   
   
   
   
   <script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".3col").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_privilege.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".3col").html(html);
			} 
		});
	});
	
	
	$(".3col").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='otdash'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
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

<h1 align="center">PROCEDURE BOOKING FORM </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>
		
		
		<form style="background-color: gold;">
		        <table class="table" border='0'>  
		<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's MRN:<?php echo $row['pmrn'];?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Gender:<?php echo $row['psex'];?></strong></label></td>
						
						
						</tr>
						<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Name:<?php echo $row['pname'];?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Phone:</strong> <?php echo $row['pphone'];?></label></td>
						
						
						</tr>
						
						<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Age: <?php echo $row['page'];?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Admission Date:<?php echo $row1['adate'];?></strong></label></td>
						
						
						</tr>
		
		</table>
		</form>

<form action="" method="post" style="background-color: lightgreen;">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td>
				
				<tr>	  
				<td colspan="20"><select name="dname" value="" class="country"required>
			        
<option ="<?php echo $full;?>"><?php echo $full;?></option>
</select>
			
				
						
						
				
					
						</select></td>
						
						
						
						</tr>
						
						
<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>
		<tr><td colspan="20">
		<input type="text" name="pro_name" value="" list='23'>
		
		<datalist id="23" name="pro_name"  class="3col">
		

<option value="">--Select--</option>
	<?php
	$stmt = $DB_con->prepare("SELECT * FROM privilege where status='Approved' and did='$user'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>
        <?php
	} 
?>
 

</datalist>



</td></tr>


		<tr>
						
						
						<td colspan="5"><label><strong>Date:</strong></label></td>
						
						
						
						<td colspan="15"><label><strong>Location:</strong></label></td>
						
							
						</tr>
						
						<tr>				
						

			    	 <td colspan="5"><input type="date" name="date"  placeholder="Select Date" value=""size="15" required></td>  

					 
					 
					 
		
							
										
						
						
						
						
					
					 


 
<td colspan="15"><select name="loc" required>
        
						<option value=''>--Select--</option>
						<option value='OT'>OT</option>
						<option value='Endoscopy'>Endoscopy</option>
						<option value='OPD Procedure'>OPD Procedure</option>
						
				
</select>




</td>  

		
		 
		<tr>
						
						<td colspan="20"><label><strong> Remarks:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><input type="text" name="remarks" value=""></td>  
				
						
					 
					 </tr>
					 
						
				
														

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="work_report1?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>"><img src="print.png" title="Print Report" width="50" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
