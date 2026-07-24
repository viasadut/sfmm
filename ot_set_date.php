<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('ot','doctor')"; 
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
 
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];

$query = "SELECT * from user where uname='$user'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$dname=$row['fullname'];
 
$query1 = "SELECT * from ot_day where con_name='$dname' and status='Approved'"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);

$day11= $row1['day1'];
$day22= $row1['day2'];
$day33= $row1['day3'];
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$day1= $_REQUEST['day1'];
$day2= $_REQUEST['day2'];
$day3= $_REQUEST['day3'];

$date=date('Y-m-d H:i:s');






	
if($day11=='')

{
$ins_query="insert into ot_day (`con_name`,`day1`,`day2`,`day3`,`con_date`,`status`) values 
('$dname', '$day1','$day2','$day3','$date','Request Pending')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query1="insert into ot_day1 (`con_name`,`day1`,`day2`,`day3`,`con_date`) values 
('$dname', '$day1','$day2','$day3','$date')";
mysqli_query($con,$ins_query1) or die(mysql_error());
echo '<script language="javascript">';
    echo 'alert("OT Day Set Successfully"); ';
    echo '</script>';

    }

	

else {

      $ins_query="update ot_day set day1='$day1',day2='$day2',day3='$day3', edit_date='$date',status='Request Pending' where con_name='$dname'";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query1="insert into ot_day1 (`con_name`,`day1`,`day2`,`day3`,`con_date`) values 
('$dname', '$day1','$day2','$day3','$date')";
mysqli_query($con,$ins_query1) or die(mysql_error());
echo '<script language="javascript">';
    echo 'alert("OT Day Set Successfully"); ';
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

<h1 align="center">SET YOUR DESIRE OT DAY</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>
		
		
		<form style="background-color: gold;"method="post">
		        <table class="table" border='0'>  
		<tr>
						
						
						<td colspan="7" align='left' style="font-size: 20px; background-color: lightgreen;"><label><strong>OT Day-1</strong></label></td>
						<td colspan="7" align='left' style="font-size: 20px; background-color: lightblue;"><label><strong>OT Day-2</strong></label></td>
						<td colspan="6" align='left' style="font-size: 20px; background-color: lightgrey;"><label><strong>OT Day-3</strong></label></td>
						
						
						</tr>
						
						<tr>
						
						
						<td colspan="7" align='left' style="font-size: 20px; background-color: lightgreen;">
						<select name="day1" required size='1'>
        
						<option value='<?php echo $day11;?>'><?php echo $day11;?></option>
						<option value='Saturday'>Saturday</option>
						<option value='Sunday'>Sunday</option>
						<option value='Monday'>Monday</option>
						<option value='Tuesday'>Tuesday</option>
						<option value='Wednesday'>Wednesday</option>
						<option value='Thursday'>Thursday</option>
						<option value='Friday'>Friday</option>
						
						
				
</select></td>
						<td colspan="7" align='left' style="font-size: 20px; background-color: lightblue;">
						<select name="day2" required size='1'>
        
						<option value='<?php echo $day22;?>'><?php echo $day22;?></option>
						<option value='Saturday'>Saturday</option>
						<option value='Sunday'>Sunday</option>
						<option value='Monday'>Monday</option>
						<option value='Tuesday'>Tuesday</option>
						<option value='Wednesday'>Wednesday</option>
						<option value='Thursday'>Thursday</option>
						<option value='Friday'>Friday</option>
						
						
				
</select>
						</td>
						<td colspan="6" align='left' style="font-size: 20px; background-color: lightgrey;">
						
						<select name="day3" required size='1'>
        
						<option value='<?php echo $day33;?>'><?php echo $day33;?></option>
						<option value='Saturday'>Saturday</option>
						<option value='Sunday'>Sunday</option>
						<option value='Monday'>Monday</option>
						<option value='Tuesday'>Tuesday</option>
						<option value='Wednesday'>Wednesday</option>
						<option value='Thursday'>Thursday</option>
						<option value='Friday'>Friday</option>
						
						
				
</select>
						
						
						</td>
						
						
						</tr>

		


						
	</form>				
					 


 
<tr>
		<td colspan="1"><button type="submit" name="Submit">Confirm</button></td>
	  
	  				
</tr>


		</table>
		
</body>

</html>
