<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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
//$id=$_REQUEST['id'];

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

$code = $_REQUEST['code'];
$Proname = $_REQUEST['Proname'];
$region = $_REQUEST['region'];
$organ=$_REQUEST['organ'];
$discipline=$_REQUEST['discipline'];
$scharge=$_REQUEST['scharge'];
$ascharge=$_REQUEST['ascharge'];
$acharge=$_REQUEST['acharge'];
$hcharge=$_REQUEST['hcharge'];
$medi=$_REQUEST['medi'];
//$sprivilege=$_REQUEST['sprivilege'];
//$type=$_REQUEST['type'];
//$subtype=$_REQUEST['subtype'];
//$adate=$_REQUEST['adate'];
//$padd=$_REQUEST['padd'];
$edate= date('d/m/Y H:i:s');
$adate1= date('m/d/Y');

$sprivilege=$_REQUEST['sprivilege'];
$sprivilege1= implode(",",$sprivilege);

$sel990="SELECT * FROM mma1 WHERE `Proname`='$Proname';";
$result990 = mysqli_query($con,$sel990);

if($res990=mysqli_num_rows($result990)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!!  This MMA Code is already in the Database"); ';
    echo '</script>';
    }
	else {


//$ins_query1="update mma1 set Proname='$Proname', region='$region', organ='$organ', discipline='$discipline', scharge='$scharge', ascharge='$ascharge', acharge='$acharge',hcharge='$hscharge',medi='$medi',sprivilege='$sprivilege',type='$type',subtype='$subtype',eby='$user',etime='$edate' where id='$id'";
//mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query="insert into  mma1 (`code`,`Proname`,`region`,`organ`,`discipline`,`scharge`,`ascharge`,`acharge`,`hcharge`,`medi`,`sprivilege`,`aby`,`atime`,`status`) 
values ('$code', '$Proname','$region','$organ','$discipline','$scharge','$ascharge','$acharge','$hcharge','$medi','$sprivilege1','$user','$edate','Active')";
mysqli_query($con,$ins_query) or die("Unsuccessful !!!");


//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
}

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
  width: 90%;
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
<link rel="stylesheet" href="jsnew/normalize.min.css">

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  
  
  
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
		<h1>ADD MMA CODE</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>CODE :</strong></label>
      <input name="code" type="text" size="80" style="text-transform:uppercase" value="" >
 	  <label for="age"><strong>Name Of Surgery :</strong></label>
      <input name="Proname" type="text" size="80" style="text-transform:uppercase" value=""required>
	  
	  
	  <label for="age"><strong>Region:</strong></label>
	  
	  
	  <input list="browsers" name="region" type="text" size="80" class="form-control" autocomplete="off" value="" required>
  <datalist id="browsers">

<?php 
			$sql76 = "select distinct region from `mma1`";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->region."'>".$row76->region."</option>";
				}
			}
			?>
  
  
  
</datalist>
      
	  <label for="age"><strong>Organ :</strong></label>

<input list="browsers2" name="organ" type="text" size="80" class="form-control" autocomplete="off" value="" required>
  <datalist id="browsers2">
<option value='Gall Bladder'>Gall Bladder</option>
<?php 
			$sql76 = "select distinct organ from `mma1`";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->organ."'>".$row76->organ."</option>";
				}
			}
			?>
  
  
  
</datalist>


      
	  <label for="age"><strong>Discipline :</strong></label>
	  
	  <input list="rr10" type="text" name="discipline" size="80" class="form-control" value=""required>
  <datalist id="rr10">

						<option value=''>-Select Route</option>
						<option value='Surgery'>Surgery</option>
						<option value='Neurology'>Neurology</option>
						<option value='Urology'>Urology</option>
						<option value='OBSTETRICS AND GYNECOLOGY'>OBSTETRICS AND GYNECOLOGY</option>
						<option value='OPHTHALMOLOGY'> OPHTHALMOLOGY</option>
						<option value='ENT'>ENT</option>
						<option value='ORTHOPEDICS'>ORTHOPEDICS</option>
						
			  </datalist>
      
	  <label for="age"><strong>Surgeon Charge :</strong></label>
      <input name="scharge" type="text" size="80" style="text-transform:uppercase" value="">
	  <label for="age"><strong>Asst. Surgeon Charge :</strong></label>
      <input name="ascharge" type="text" size="80" style="text-transform:uppercase" value="">
	  <label for="age"><strong>Anaesthetist Charge :</strong></label>
      <input name="acharge" type="text" size="80" style="text-transform:uppercase" value="">
	  <label for="age"><strong>Disposable And Equipments :</strong></label>
      <textarea rows="5" name="hcharge" > </textarea>
	  <label for="age"><strong>Medication List :</strong></label>
	  <textarea rows="5" name="medi" ></textarea>
      
	  <label for="age"><strong>Surgeon Privilege:</strong></label>
      
<select name="sprivilege[]" multiple="multiple" class="3col active" placeholder="Select Regional Technique">
       
						
						
						<?php 
			$sql76 = "select * from `doctor` where status='Active'";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->dname."'>".$row76->dname."</option>";
				}
			}
			?>
						
						
				

						
						
				
</select>	  
<script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: 'Privileged Surgeon',
            search: true,
            searchOptions: {
                'default': 'Privileged Surgeon'
            },
            selectAll: true
        });

    });
</script>

	        <br><br>
  </fieldset>
	  

	        
  </fieldset>

<table><tr><td colspan="15">		<button type="submit" name="Submit">ADD</button></td>
</table>

</form>
  


</body>

</html>
