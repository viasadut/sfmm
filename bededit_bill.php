<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$id=$_REQUEST['id'];

$query39 = "SELECT * FROM bed where id= '$id'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);


//$full = $row39['fullname'];

//include("auth.php");
//echo $count1;


  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

  $bno = $_REQUEST['bno'];
  $rclass = $_REQUEST['rclass'];
$bcurtain = $_REQUEST['bcurtain'];
$tv = $_REQUEST['tv'];
$wroomclass = $_REQUEST['wroomclass'];
$almira = $_REQUEST['almira'];
$ref = $_REQUEST['ref'];
$moven = $_REQUEST['moven'];
$sofa = $_REQUEST['sofa'];
$ac = $_REQUEST['ac'];
$bed = $_REQUEST['bed'];
$des=$_REQUEST['des'];

$size = $_REQUEST['size'];
$wfilter=$_REQUEST['wfilter'];
$charge=$_REQUEST['charge'];
$bed_status=$_REQUEST['bed_status'];
$sins=$_REQUEST['sins'];

$room=$_REQUEST['room'];
$block=$_REQUEST['block'];
$level=$_REQUEST['level'];
$view=$_REQUEST['view'];
$category = $_REQUEST['cat'];

$adate1= date('d/m/Y H:i:s');


/*$ins_query1="update bed set category=`$category`,`rclass`='$rclass',`bcurtain`='$bcurtain',`tv`='$tv',`wroomclass`='$wroomclass',`almira`='$almira',`ref`='$ref',`moven`='$moven',`sofa`='$sofa',`ac`='$ac',`bed`='$bed',`des`='$des',
`size`='$size',`wfilter`='$wfilter',`eby`='$user',`etime`='$adate1',`charge`='$charge',`bed_status`='$bed_status',`sins`='$sins',`room`='$room',`block`='$block',`level`='$level',`view`='$view' where `id`='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/
$update33="update bed set `bno`='$bno',`category`='$category',`rclass`='$rclass',`bcurtain`='$bcurtain',`tv`='$tv',`wroomclass`='$wroomclass',`almira`='$almira',`ref`='$ref',`moven`='$moven',`sofa`='$sofa',`ac`='$ac',`bed`='$bed',`des`='$des',
`size`='$size',`wfilter`='$wfilter',`eby`='$user',`etime`='$adate1',`charge`='$charge',`bed_status`='$bed_status',`sins`='$sins',`room`='$room',`block`='$block',`level`='$level',`view`='$view' where `id`='$id'";
mysqli_query($con,$update33) or die(mysql_error());



   echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';

	
	$url = "bededit_bill?id=$id" ;
header("Location:$url");


}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
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
  width: 80%;
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
  
  <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script><script>
  $(document).ready(function() {
    $("#datepicker3").datepicker();
  });
  </script>
  </script><script>
  $(document).ready(function() {
    $("#datepicker6").datepicker();
  });
  </script>
  
  <link rel="stylesheet" href="styles.css">

  
  
    <link href="./jquery.multiselect.css" rel="stylesheet" />
  
    <script src="./jquery.multiselect.js"></script>




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
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>Edit Room Details</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<a href="bed_photo?id=<?php echo"$id"; ?>">Upload</a>
			
	  <label for="age"><strong>Category:</strong></label>
<input type="text" name="cat" id="email" class="input-text" placeholder="ID" size="70" value="<?php echo $row39['category'];?>"required>


	  <label for="age"><strong>Type:</strong></label>
<input type="text" name="type" id="email" class="input-text" placeholder="Name" size="70" value="<?php echo $row39['type'];?>"readonly>

<label for="age"><strong>Bed No:</strong></label>
	 
<input type="text" name="bno" id="email" class="input-text" placeholder="Age" size="70"value="<?php echo $row39['bno'];?>"required>     


<label for="age"><strong>Bed View</strong></label>
<select name="view" required>
        <option value='<?php echo $row39['view'];?>'><?php echo $row39['view'];?></option>
												<option value='Lake View'>Lake View</option>
						<option value='Atrium View'>Atrium View</option>
						<option value='Roadside View'></option>
						

</select>



<label for="age"><strong>Room Class:</strong></label>
	 <select name="rclass" required>
        <option value='<?php echo $row39['rclass'];?>'><?php echo $row39['rclass'];?></option>
						<option value='AC'>AC</option>
						<option value='NON AC'>NON AC</option>
<option value='Family Cabin - super'>Family Cabin - super</option>
						<option value='Family Cabin - Lower'>Family Cabin - Lower</option>
						<option value='Cabin - high dependency AC'>Cabin - high dependency AC</option>
						<option value='Cabin - Luxury'>Cabin - Luxury</option>
						<option value='Cabin - Normal '>Cabin - Normal </option>
						<option value='Free Bed'>Free Bed</option>
						<option value='Cabin - Paediatric - Luxury'>Cabin - Paediatric - Luxury</option>
						<option value='Cabin - Paediatric - Normal '>Cabin - Paediatric - Normal </option>
						<option value='Day Care - Chemo'>Day Care - Chemo</option>
						<option value='Day Care - Dialysis'>Day Care - Dialysis</option>
						<option value='Day Care - Endoscopy '>Day Care - Endoscopy </option>
						<option value='Emergency - red zone'>Emergency - red zone</option>
						<option value='Emergency - Yellow Zone'>Emergency - Yellow Zone</option>
						<option value='Cabin - Orthopaedics'>Cabin - Orthopaedics</option>
						<option value='ICU '>ICU </option>
						<option value='HDU'>HDU</option>
						<option value='CCU'>CCU</option>
						<option value='NICU'>NICU</option>
						<option value='Paediatric - Isolation '>Paediatric - Isolation </option>
						<option value='PICU'>PICU</option>
						<option value='PHDU'>PHDU</option>
		









</select>


<label for="age"><strong>Room Size:</strong></label>
	 
<input type="text" name="size" id="email" class="input-text" placeholder="" size="70"value="<?php echo $row39['size'];?>"required>     


<label for="age"><strong>Bed View</strong></label>
<select name="view" required>
        <option value='<?php echo $row39['view'];?>'><?php echo $row39['view'];?></option>
												<option value='Lake View'>Lake View</option>
						<option value='Atrium View'>Atrium View</option>
						<option value='Roadside View'>Roadside View</option>
						

</select>



<label for="age"><strong>Room Details:</strong></label>
<textarea rows="40" name="bed" ><?php echo $row39['bed'];?></textarea>

<label for="age"><strong>AC:</strong></label>
<select name="ac" required>
        <option value='<?php echo $row39['ac'];?>'><?php echo $row39['ac'];?></option>
												<option value='Available'>Available</option>
						<option value='AC Functional'>AC Functional</option>
						<option value='AC Nonfunctional'>AC Nonfunctional</option>
						<option value='N/A'>N/A</option>

</select>


<label for="age"><strong>Sofa:</strong></label>
<select name="sofa" required>
        <option value='<?php echo $row39['sofa'];?>'><?php echo $row39['sofa'];?></option>
		<option value='Available'>Available</option>
						<option value='2 Seated'>2 Seated</option>
						<option value='3 Seated'>3 Seated</option>
						<option value='N/A'>N/A</option>

</select>


<label for="age"><strong>Micro Oven:</strong></label>
<select name="moven" required>
        <option value='<?php echo $row39['moven'];?>'><?php echo $row39['moven'];?></option>
		<option value='Available'>Available</option>
						<option value='Oven Functional'>Oven Functional</option>
						<option value='Oven Nonfunctional'>Oven Nonfunctional</option>
						<option value='N/A'>N/A</option>

</select>

<label for="age"><strong>Refrigerator:</strong></label>
<select name="ref" required>
        <option value='<?php echo $row39['ref'];?>'><?php echo $row39['ref'];?></option>
		<option value='Available'>Available</option>
						<option value='Refrigerator Functional'>Refrigerator Functional</option>
						<option value='Refrigerator Nonfunctional'>Refrigerator Nonfunctional</option>
						<option value='N/A'>N/A</option>

</select>


<label for="age"><strong>Water Filter:</strong></label>
<select name="wfilter" required>
        <option value='<?php echo $row39['wfilter'];?>'><?php echo $row39['wfilter'];?></option>
		<option value='Available'>Available</option>
						<option value='Water Functional'>Water Functional</option>
						<option value='Water Nonfunctional'>Water Nonfunctional</option>
						<option value='N/A'>N/A</option>

</select>


<label for="age"><strong>Almira:</strong></label>
<select name="almira" required>
        <option value='<?php echo $row39['almira'];?>'><?php echo $row39['almira'];?></option>
		<option value='Available'>Available</option>
						<option value='Almira Functional'>Almira Functional</option>
						<option value='Almira Nonfunctional'>Almira Nonfunctional</option>
						<option value='N/A'>N/A</option>

</select>


<label for="age"><strong>TV:</strong></label>
<select name="tv" required>
        <option value='<?php echo $row39['tv'];?>'><?php echo $row39['tv'];?></option>
		<option value='Available'>Available</option>
						<option value='TV Functional'>TV Functional</option>
						<option value='TV Nonfunctional'>TV Nonfunctional</option>
						<option value='N/A'>N/A</option>

</select>


<label for="age"><strong>Bed Curtain:</strong></labe
l>
<select name="bcurtain" required>
        <option value='<?php echo $row39['bcurtain'];?>'><?php echo $row39['bcurtain'];?></option>
		<option value='Available'>Available</option>
						<option value='Bed Curtain Functional'>Bed Curtain Functional</option>
						<option value='Bed Curtain Nonfunctional'>Bed Curtain Nonfunctional</option>
						<option value='N/A'>N/A</option>

</select>



<label for="age"><strong>Wash Room CLass:</strong></label>
<select name="wroomclass" required>
        <option value='<?php echo $row39['wroomclass'];?>'><?php echo $row39['wroomclass'];?></option>
		<option value='Available'>Available</option>
						<option value='Normal'>Normal</option>
						<option value='Luxury'>Luxury</option>
						<option value='Supportive'>Supportive</option>
						<option value='Disable'>Disable</option>

</select>


<label for="age"><strong>Room Charge:</strong></label>
	 
<input type="text" name="charge" id="email" class="input-text" placeholder="" size="70"value="<?php echo $row39['charge'];?>"required>     



<label for="age"><strong>Bed Status:</strong></label>
<select name="bed_status" required>
        <option value='<?php echo $row39['bed_status'];?>'><?php echo $row39['bed_status'];?></option>
		<option value='Active'>Active</option>
						<option value='Deactive'>Deactive</option>
						

</select>



<label for="age"><strong>Special Instruction:</strong></label>
<textarea rows="40" name="sins" ><?php echo $row39['sins'];?></textarea>


<label for="age"><strong>Room :</strong></label>
	 
<input type="text" name="room" id="email" class="input-text" placeholder="" size="70"value="<?php echo $row39['room'];?>"required>     


<label for="age"><strong>Block:</strong></label>
	 
<input type="text" name="block" id="email" class="input-text" placeholder="" size="70"value="<?php echo $row39['block'];?>"required>     


<label for="age"><strong>Level:</strong></label>
	 
<input type="text" name="level" id="email" class="input-text" placeholder="" size="70"value="<?php echo $row39['level'];?>"required>     

  </fieldset>

 

<table><tr><td colspan="15">		<button type="submit" name="Submit">EDIT</button></td>
</table>

</form>
  


</body>

</html>
