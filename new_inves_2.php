<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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

//echo $rt ='test'.$user."<br />".'hhh:'.$user;
//echo $rt='test '.$user ;
//include("auth.php");
//echo $count1;
$id=$_REQUEST['id'];
$sno='I'.$id;
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from iinves where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['medi'];

$query5 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);
  
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
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

$ph=$_REQUEST['ph'];
$pco2=$_REQUEST['pco2'];
$po2=$_REQUEST['po2'];
$beecf=$_REQUEST['beecf'];
$hco3=$_REQUEST['hco3'];
$tco2=$_REQUEST['tco2'];
$so2=$_REQUEST['so2'];
$na=$_REQUEST['na'];

$k=$_REQUEST['k'];
$ica=$_REQUEST['ica'];
$giu=$_REQUEST['giu'];
$hct=$_REQUEST['hct'];
$hb=$_REQUEST['hb'];



$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


$rr='pH:'.$ph."<br />".'PCO2:'.$pco2."<br />".'PO2:'.$po2."<br />".'BEecf:'.$beecf."<br />".'HCO3:'.$hco3."<br />".
'TCO2:'.$tco2."<br />".'sO2:'.$so2."<br />".'Na:'.$na."<br />".'K:'.$k."<br />".'iCa:'.$ica."<br />".'Glu:'.$giu."<br />".'Hct:'.$hct."<br />".'Hb:'.$hb;


$rr1='pH:'.$ph.' '.''."<br />".'PCO2:'.$pco2.' '.'mmHg'."<br />".'PO2:'.$po2.' '.'mmHg'."<br />".'BEecf:'.$beecf.' '.'mmol/L'."<br />".'HCO3:'.$hco3.' '.'mmol/L'."<br />".
'TCO2:'.$tco2.' '.'mmol/L'."<br />".'sO2:'.$sO2.' '.'%'."<br />".'Na:'.$na.' '.'mmol/L'.'K:'.$k.' '.'mmol/L'.'iCa:'.$ica.' '.'mmol/L'.'Glu:'.$giu.' '.'mg/dL'.'Hct:'.$hct.' '.'%PCV'.'Hb:'.$hb.' '.'g/dL';


$query6 = mysqli_query($db,"select COUNT(id) from b_gas_a where sno='$sno'");
$data6 = mysqli_fetch_assoc($query6);

if($data6['COUNT(id)']>0)
{



$ins_query1="insert into b_gas_a (`pname`,`pmrn`,`pphone`,`psex`,`page`,`ph`,`pco2`,`po2`,`beecf`,`hco3`,`tco2`,`so2`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`,`na`,`k`,`ica`,`glu`,`hct`,`hb`) values 
('$pname','$pmrn','$pphone','$psex','$page','$ph','$pco2','$po2','$beecf','$hco3','$tco2','$so2','$user','$adate','$eid','$iname','$id','$sno','$na','$k','$ica','$glu','$hct','$hb')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update iinves set resultstatus='Updated By Duty Nurse',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());




//if ($con->query($ins_query) == TRUE) 
//{
	
	$url = "new_inves_2_edit?sno=$sno&id=$id&pmrn=$pmrn&eid=$eid" ;
header("Location:$url");

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	
	}
else  
{
	
	echo '<script language="javascript">';
    echo 'alert("Report Already Updated.. Please Edit Report if Required "); ';
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
		<h1>TEST FORM </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data['pname']?>"required/>
 	  

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
      <input name="psex" type="text" size="5"value="<?php echo $data['pgender']?>" required/>
														
						
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required/>
      <input name="pphone" type="text" size="13" value="<?php echo $data['pphone']?>"  required/>	  
	  <input name="page" type="text" size="2"value="<?php echo $data['page']?>" required/>
      
	   <label for="age"><strong>pH:</strong></label>
      <input name="ph" id="haemo" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  	  	  <script>
function f_color15(){
var myVal = parseInt(document.getElementById('haemo').value);
if (myVal > 18) {
document.getElementById('haemo').style.color = "red";
}

else if (myVal < 13) {
document.getElementById('haemo').style.color = "red";
}

else  {
document.getElementById('haemo').style.color = "green";
}

}
document.getElementById('haemo').onchange= f_color15;
</script>
	  
	  
	  <label for="age"><strong>PC02:</strong></label>
      <input name="pco2" id="red" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  	  <script>
function f_color14(){
var myVal = parseInt(document.getElementById('red').value);
if (myVal > 5.9) {
document.getElementById('red').style.color = "red";
}

else if (myVal < 4.5) {
document.getElementById('red').style.color = "red";
}

else  {
document.getElementById('red').style.color = "green";
}

}
document.getElementById('red').onchange= f_color14;
</script>
	  
	  
	  
	  <label for="age"><strong>po2:</strong></label>
      <input name="po2" id="pcv" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color13(){
var myVal = parseInt(document.getElementById('pcv').value);
if (myVal > 53) {
document.getElementById('pcv').style.color = "red";
}

else if (myVal < 41) {
document.getElementById('pcv').style.color = "red";
}

else  {
document.getElementById('pcv').style.color = "green";
}

}
document.getElementById('pcv').onchange= f_color13;
</script>
	  
	  
	  <label for="age"><strong>BEecf:</strong></label>
      <input name="beecf" id="mcv" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color12(){
var myVal = parseInt(document.getElementById('mcv').value);
if (myVal > 103) {
document.getElementById('mcv').style.color = "red";
}

else if (myVal < 76) {
document.getElementById('mcv').style.color = "red";
}

else  {
document.getElementById('mcv').style.color = "green";
}

}
document.getElementById('mcv').onchange= f_color12;
</script>
	  
	  
	  
	  <label for="age"><strong>HCO3:</strong></label>
      <input name="hco3" id="mch" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color11(){
var myVal = parseInt(document.getElementById('mch').value);
if (myVal > 34) {
document.getElementById('mch').style.color = "red";
}

else if (myVal < 26) {
document.getElementById('mch').style.color = "red";
}

else  {
document.getElementById('mch').style.color = "green";
}

}
document.getElementById('mch').onchange= f_color11;
</script>
	  
	  
	  
	  
	  <label for="age"><strong>TCO2:</strong></label>
      <input name="tco2" id="mchc" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color10(){
var myVal = parseInt(document.getElementById('mchc').value);
if (myVal > 36) {
document.getElementById('mchc').style.color = "red";
}

else if (myVal < 31) {
document.getElementById('mchc').style.color = "red";
}

else  {
document.getElementById('mchc').style.color = "green";
}

}
document.getElementById('mchc').onchange= f_color10;
</script>
	  
	  
	  
	  <label for="age"><strong>SO2:</strong></label>
      <input name="so2" id="rdw" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color9(){
var myVal = parseInt(document.getElementById('rdw').value);
if (myVal > 14.6) {
document.getElementById('rdw').style.color = "red";
}

else if (myVal < 8) {
document.getElementById('rdw').style.color = "red";
}

else  {
document.getElementById('rdw').style.color = "green";
}

}
document.getElementById('rdw').onchange= f_color9;
</script>
	  
	  
	  
	  <label for="age"><strong>Na:</strong></label>
      <input name="na" id="pla" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color8(){
var myVal = parseInt(document.getElementById('pla').value);
if (myVal > 450) {
document.getElementById('pla').style.color = "red";
}

else if (myVal < 150) {
document.getElementById('pla').style.color = "red";
}

else  {
document.getElementById('pla').style.color = "green";
}

}
document.getElementById('pla').onchange= f_color8;
</script>


<label for="age"><strong>K:</strong></label>
      <input name="k" id="mpv" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color7(){
var myVal = parseInt(document.getElementById('mpv').value);
if (myVal > 12) {
document.getElementById('mpv').style.color = "red";
}

else if (myVal < 5.8) {
document.getElementById('mpv').style.color = "red";
}

else  {
document.getElementById('mpv').style.color = "green";
}

}
document.getElementById('mpv').onchange= f_color7;
</script>
	  
	  
	 <label for="age"><strong>iCa:</strong></label>
      <input name="ica" id="wbc" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color6(){
var myVal = parseInt(document.getElementById('wbc').value);
if (myVal > 10.5) {
document.getElementById('wbc').style.color = "red";
}

else if (myVal < 4.3) {
document.getElementById('wbc').style.color = "red";
}

else  {
document.getElementById('wbc').style.color = "green";
}

}
document.getElementById('wbc').onchange= f_color6;
</script>
	  
	  
	  
	  
	  <label for="age"><strong>GIu:</strong></label>
      <input name="giu" id="neu" type="text"  style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color5(){
var myVal = parseInt(document.getElementById('neu').value);
if (myVal > 75) {
document.getElementById('neu').style.color = "red";
}

else if (myVal < 40) {
document.getElementById('neu').style.color = "red";
}

else  {
document.getElementById('neu').style.color = "green";
}

}
document.getElementById('neu').onchange= f_color5;
</script>
	  
	  
	  <label for="age"><strong>Hct:</strong></label>
      <input name="hct" id="lym" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color4(){
var myVal = parseInt(document.getElementById('lym').value);
if (myVal > 45) {
document.getElementById('lym').style.color = "red";
}

else if (myVal < 20) {
document.getElementById('lym').style.color = "red";
}

else  {
document.getElementById('lym').style.color = "green";
}

}
document.getElementById('lym').onchange= f_color4;
</script>
	  
	  
	  <label for="age"><strong>Hb:</strong></label>
      <input name="hb" id="eos" type="text" style="font-weight: bold;font-size:22px;" value=""required/>
	  
	  <script>
function f_color3(){
var myVal = parseInt(document.getElementById('eos').value);
if (myVal > 6) {
document.getElementById('eos').style.color = "red";
}

else if (myVal < 0) {
document.getElementById('eos').style.color = "red";
}

else  {
document.getElementById('eos').style.color = "green";
}

}
document.getElementById('eos').onchange= f_color3;
</script>
	  
	  
	  
	  
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
  


</body>

</html>
