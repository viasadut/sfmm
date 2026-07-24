<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="billin"){
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

$user=$_SESSION['sess_username'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['id'];
//$pmrn=$_REQUEST['dname'];
//include("auth.php");
//echo $count1;
 
  
  
?>

<?php
require('db1.php');
$id=$_REQUEST['id'];
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

$query40 = "SELECT * FROM oncall_room where id= '$id'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);


$rname = $row40['rname'];


?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$pname = $_REQUEST['pname'];
$pphone=$_REQUEST['pphone'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$type=$_REQUEST['type'];
$fname=$_REQUEST['fname'];
$mname=$_REQUEST['mname'];
$peradd=$_REQUEST['peradd'];
$nid=$_REQUEST['nid'];
$service=$_REQUEST['service'];
$rname=$_REQUEST['rname'];
$tqty=$_REQUEST['tqty'];
$remarks=$_REQUEST['remarks'];
$adate= date('d/m/Y H:i:s');
$aadate= date('m/d/Y ');
$anew= date('Y-m-d');




$ins_query33="insert into oncall_details (`gname`,`age`,`sex`,`pphone`,`type`,`fname`,`mname`,`peradd`,`nid`,`service`,`rname`,`tqty`,`remarks`,`adate`,`aadate`,`status`,`aby`,`anew`)
values ('$pname', '$page','$psex','$pphone','$type','$fname','$mname','$peradd','$nid','$service','$rname','$tqty','$remarks','$adate','$aadate','Staying','$user','$anew')";
mysqli_query($con,$ins_query33);
//if ($con->query($ins_query) == TRUE) 
//{

//$ins_query1="insert into ipres (`dname`,`pname`,`pmrn`,`padd`,`psex`,`page`,`date`,`room`,`room1`,`pphone`,`eid`) values ('$dname', '$pname','$pmrn','$padd','$gender','$page','$adate','$btype','$bno','$pphone','$count1')";
//mysqli_query($con,$ins_query1);



$update199="update oncall_room set status='BOOKED' where `rname`='$rname'";
mysqli_query($con,$update199);



$url = "on_call_room" ;
header("Location:$url");

    echo '<script language="javascript">';
    echo 'alert("Booking Successful"); ';
    echo '</script>';

	
	

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
  
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
  width: 30%;
}

select1 {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 20%;
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
   <li><a href='inviewnew1'><span>Home</span></a></li>
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
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
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

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>Oncall Room Booking</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			 <label1 for="age"><strong color="green">Guest's Particulars   :</strong></label1> <br><br><br>
	  
	  <label for="age"><strong>Guest's Name :</strong></label>
      <input name="pname" type="text" size="70" value=""required>
 	  
	  <label for="age"><strong>Guest's Details (Gender / Phone / Age) :</strong></label>
	  	<input name="psex" type="text" size="10" value=""required >

		
						


						
      <input name="pphone" type="text" size="13" value="" placeholder="Phone No" required>	  
	  <input name="page" type="text" size="2"value="" placeholder="Age" required >

	  	
		<br><br>

		<label for="age"><strong>Father's Name :</strong></label>
		<input name="fname" type="text" size="70" value=""required  >
		<label for="age"><strong>Mother's Name :</strong></label>
		<input name="mname" type="text" size="70" value=""required  >

		<label for="age"><strong>Permanent Address :</strong></label>
		<input name="peradd" type="text" size="70" value=""required  >

		<label for="age"><strong>National ID :</strong></label>
		<input name="nid" type="text" size="70" value=""required  >
		
				<label for="age"><strong>Number Of People Staying:</strong></label>
		<input name="tqty" type="text" size="70" value=""required >


      
	  
	  <label for="age"><strong>Type :</strong></label> <br>
	  
	 <select name="type" class="country" value=''required>
					
						<option value=''>-Select-</option>
						<option value='Staff'> Staff</option>
						<option value='Staff Relative'>Staff Relative</option>
						<option value='Patient Relative'> Patient Relative</option>
						<option value='Others'> Others</option>
						

						</select>
	 

	  	<br><br>
		
		
		
		<label for="age"><strong>Service Place :</strong></label>
		<input name="service" type="text" size="70" value=""required>
		<br><br>
		
		
		      
			  <label for="name"><strong>Select Room :</strong></label>
			<p>
			<select name="rname" class="country" value=''required>
<option ="<?php echo $rname?>"><?php echo $rname?></option>
</select>



						
						
<label for="age"><strong>Remarks:</strong></label>
		<input name="remarks" type="text" size="70" value=""required  >


<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>


</form>
  


</body>

</html>
