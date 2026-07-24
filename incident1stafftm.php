<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff','mng')"; 
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
$ceo=$_REQUEST['ceo'];
$cfo=$_REQUEST['cfo'];
$cno=$_REQUEST['cno'];
$md=$_REQUEST['md'];
$hos=$_REQUEST['hos'];
$fby=$_REQUEST['fby'];
$id=$_REQUEST['id'];
$cc=$_REQUEST['cc'];

//include("auth.php");
//echo $count1;
$query39 = "SELECT * FROM user where uname= '$user'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];


$query3 = "SELECT * FROM incident1 where id= '$id'"; 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$m1=$row3['m1'];
$m2=$row3['m2'];
$m3=$row3['m3'];
$m4=$row3['m4'];
$m5=$row3['m5'];
$hos1=$row3['hos1'];

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$com = $_REQUEST['com'];
$com = str_replace("'", "''",$_REQUEST['com']);
$cat = $_REQUEST['cat'];
$injury = $_REQUEST['injury'];
//$idept = $_REQUEST['idept'];
//$idetails=$_REQUEST['idetails'];
//$page=$_REQUEST['page'];
//$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');

/* $query9 = "SELECT * FROM staff where sdept= '$idept' and sdesignation='HOS'"; 
$result9 = mysqli_query($con, $query9) or die(mysqli_error());
$row9 = mysqli_fetch_array($result9);
$hos=$row9['sname']; */

/*if($fby==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set com6='$com',status='Forwarded' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}*/

if($hos==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set com5='$com',status='Forwarded',com5time='$adate' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}


else if($_SESSION['sess_username']=='780'){
	
	$ins_query1="update incident1 set chaircom='$com', chair='$user',chairtime='$adate' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}



else if($fby==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set com6='$com',com6time='$adate',cat='$cat',injury='$injury' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}


else if($m1==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set m1com='$com',m1date='$adate' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}

else if($m2==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set m2com='$com',m2date='$adate' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}


else if($m3==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set m3com='$com',m3date='$adate' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}

else if($m4==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set m4com='$com',m4date='$adate' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}


else if($m5==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set m5com='$com',m5date='$adate' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}

else if($hos1==$_SESSION['sess_username']){
	
	$ins_query1="update incident1 set hos1com='$com',hos1time='$adate' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}

else {
	echo '<script language="javascript">';
    echo 'alert(" NOT successful !!"); ';
    echo '</script>';

	
}
//if ($con->query($ins_query) == TRUE) 
//{

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
  width: 55%;
}
textarea {
  padding: 2px;
  height: 500px;
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
		<h1>Observation / Comments on Incident Report </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<label for="age"><strong>Category of Incident:</strong></label>
      <select name="cat" required>
						<option>--Select Type--</option>
						<option value='Adverse Event'>Adverse Event</option>
						<option value='Near Miss'>Near Miss</option>
						<option value='Sentinel Event'>Sentinel Event</option>
						<option value='Others'>Others</option>
						
								
														
						</select>
	  
	  <label for="age"><strong>Injury Outcome:</strong></label>
      <select name="injury" required>
						<option>--Select Type--</option>
						<option value='No Injury'>No Injury</option>
						<option value='Minor'>Minor</option>
						<option value='Major'>Major</option>
						<option value='Others'>Others</option>
								
														
						</select>

			
	  <label for="age"><strong>Details Of The Incident :</strong></label>
      <textarea rows="25"  name="com" required value=""></textarea>
 	  
      
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		<a target='_blank' href="adm?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data4["adoc"]; ?>&adate=<?php echo $data4["adate"]; ?>&eid=<?php echo $count1; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  

<?php echo $user?>
</body>

</html>
