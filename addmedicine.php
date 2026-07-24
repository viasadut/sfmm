<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="test"){
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


$mname = $_REQUEST['mname'];
$bname = $_REQUEST['bname'];
$cname=$_REQUEST['cname'];
$form=$_REQUEST['form'];
$cat=$_REQUEST['cat'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];
$frequency=$_REQUEST['frequency'];
$frelation=$_REQUEST['frelation'];
$pcategory=$_REQUEST['pcategory'];
$duration=$_REQUEST['duration'];
$contrain=$_REQUEST['contrain'];
$meffect=$_REQUEST['meffect'];
$uprice=$_REQUEST['uprice'];
$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


$sel90="SELECT * FROM medicine WHERE `mname`='$mname';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in The Database !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else{

$ins_query1="insert into medicinerequest (`mname`,`brand1`,`brand2`,`pre`,`pcat`,`addby`,`atime`,`status`,`frequency`,`frelation`,`pcategory`,`duration`,`contrain`,`meffect`,`uprice`)
 values ('$mname','$bname','$cname','$form','$cat','$user','$adate','Active','$frequency','$frelation','$pcategory','$duration','$contrain','$meffect','$uprice')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query1="update medicinerequest set mname='$mname',brand1='$bname',brand2='$cname',pre='$form',pcat='$cat',pby='$user',ptime='$adate', aname1='446',aname2='md',
aname3='cfo',aname4='taufik', rstatus='Waiting For approval',remarks='$remarks',a1='waiting',a2='waiting',a3='waiting',a4='waiting' where id='$id';";
//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Entry Successful"); ';
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
  width: 25%;
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
		<h1>ADD NEW MEDICINE</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Medicine Name :</strong></label>
      <input name="mname" type="text" size="70" style="text-transform:uppercase" value=""required>
 	  <label for="age"><strong>Brand Name :</strong></label>
      <input name="bname" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Company Name :</strong></label>
      <input name="cname" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Form :</strong></label>
      <input name="form" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Category :</strong></label>
      <input name="cat" type="text" size="70" style="text-transform:uppercase" value=""required>
<label for="age"><strong>Frequency :</strong></label>
      <input name="frequency" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Food Relation :</strong></label>
      <input name="frelation" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Duration :</strong></label>
      <input name="duration" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Pregnancy Category :</strong></label>
      <input name="pcategory" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Contraindications :</strong></label>
      <input name="contrain" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Major Side Effects :</strong></label>
      <input name="meffect" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Unite Price :</strong></label>
      <input name="uprice" type="text" size="70" style="text-transform:uppercase" value=""required>

	        
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
</table>

</form>
  


</body>

</html>
