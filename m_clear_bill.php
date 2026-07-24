<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
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

$user=$_SESSION['sess_username'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['id'];
//$pmrn=$_REQUEST['dname'];
//include("auth.php");
//echo $count1;
 
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge!='Discharged'");
$data59 = mysqli_fetch_assoc($query4);
$eid=$data59['eid'];

//$query444 = mysqli_query($db,"select * from preadm where id='$id'");
//$data444 = mysqli_fetch_assoc($query444);

$query4_a = mysqli_query($db,"select * from preadm where pmrn='$pmrn' and eid='$eid'");
$data59_a = mysqli_fetch_assoc($query4_a);
$approx_amount=$data59_a['approx_amount'];

  
?>

<?php
require('db1.php');
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);



?>
<?php
$full = $row39['fullname'];
$m_clear_time=date('d/m/Y h:i:s');
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$pname = $_REQUEST['pname'];
//$pmrn = $_REQUEST['pmrn'];
//$pphone=$_REQUEST['pphone'];
//$page=$_REQUEST['page'];
//$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];
//$diagnosis=$_REQUEST['diagnosis'];
//$date=$_REQUEST['date'];
//$plan=$_REQUEST['plan'];
//$instruction=$_REQUEST['instruction'];
//$date1=$_REQUEST['date1'];
//$remarks=$_REQUEST['remarks'];
$m_clearance=$_REQUEST['m_clearance'];
$m_remarks=$_REQUEST['m_remarks'];
$m_clearance1=$_REQUEST['m_clearance1'];
$m_clearance5=$_REQUEST['m_clearance5'];

		
$update212="update ot set m_clearance='$m_clearance',m_remarks='$m_remarks',m_clear_by='$full',m_clear_time='$m_clear_time',c_amount='$m_clearance1',c_total_amount='$m_clearance5' where `id`='$id'";
mysqli_query($con,$update212);
		
		
		
echo '<script language="javascript">';
    echo 'alert("Update Succesfully"); ';
    echo '</script>';


	      header('Location: billot');
	

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Clearance Form</title>
  
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
  width: 45%;
}

textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
  margin-bottom: 0px;
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
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
}


@media screen and (min-width: 480px) {

  form {
    max-width: 750px;
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
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
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
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
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
		 <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
	   <li class='has-sub'><a href='app1doc'><span>Appointment Report</span></a>
            
         </li>
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
		<li class='has-sub'><a href='view3newrad'><span>Radiology Report</span></a>
            
         </li>
      </ul>
   </li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>OT Clearance Form</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
	
	
	<label for="age"><strong>Approximate Cost(Consultant):</strong></label>
		<input style="color:red;font-size:40px;font-weight:bold" type="text"name="m_clearance_5" id="m_clearance5" type="text" size="20" value="<?php echo $approx_amount;?>"readonly >
		
		<label for="age"><strong>Approximate Cost(Finance):</strong></label>
		<input style="color:green;font-size:40px;font-weight:bold" type="text"name="m_clearance1" id="m_clearance1" type="text" size="20" value="<?php echo $approx_amount;?>"required >
	
		<label for="age"><strong>Amount Taken :</strong></label>
		<input style="color:green;font-size:40px;font-weight:bold" type="text"name="m_clearance" id="m_clearance" type="text" size="20" value=""required >
		
		
		
			  	  <label for="age" ><strong>Margin(%):</strong></label>
      <input style="color:red;font-size:40px;font-weight:bold" name="mar" id="mar" type="text" size="20" value=""required>
	  
	  <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#m_clearance1").val()) 
	var ret2 = parseInt($("#m_clearance").val())
	var ret3=ret2*100
	//var ret4=ret3 * 100
	var ret5=ret3 / ret1
	
    $("#mar").val(ret5);
  })
</script>

		
		
		
		
		<label for="age"><strong>Remarks :</strong></label>
		<textarea name="m_remarks" type="text" size="70" value=""required  /></textarea>

		
		
		


<table><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>


</form>
  


</body>

</html>
