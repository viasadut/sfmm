<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
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
$iname=$data['infusion'];
  
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

$tc=$_REQUEST['tc'];
$te=$_REQUEST['te'];
$color=$_REQUEST['color'];
$vol=$_REQUEST['vol'];
$liq=$_REQUEST['liq'];
$fru=$_REQUEST['fru'];
$ph=$_REQUEST['ph'];
$scon=$_REQUEST['scon'];
$tsc=$_REQUEST['tsc'];


$mor=$_REQUEST['mor'];
$vitality=$_REQUEST['vitality'];
$tmot=$_REQUEST['tmot'];
$ogressive=$_REQUEST['ogressive'];
$pusc=$_REQUEST['pusc'];
$rbc=$_REQUEST['rbc'];
$epi=$_REQUEST['epi'];
$sagg=$_REQUEST['sagg'];
$lagg=$_REQUEST['lagg'];
$agg=$_REQUEST['agg'];

$com=$_REQUEST['com'];




//$crea=$_REQUEST['crea'];

$adate= date('Y-m-d H:i:s');

$adate1= date('m/d/Y');


$rr='Time Of Collection:'.$tc."<br />".'Time Of Examination:'.$te."<br />".'Colour:'.$color."<br />".'Volume (ml):'.$vol."<br />".'Liquefaction(min):'.$liq
."<br />".'Fructose Test:'.$fru."<br />".'pH:'.$ph."<br />".'Sperm Concentration (M/ml):'.$scon."<br />".'Total Sperm Count(M/ ejaculate):'.$tsc
."<br />".'MORPHOLOGY (% Normal):'.$mor."<br />".'Vitality(% Live):'.$vitality."<br />".'Total Molility (PR +NP, %):'.$tmot."<br />".'Ogressive Motility (PR +NP, %):'.$ogressive
."<br />".'Pus Cells:'.$pus."<br />".'RBCs:'.$rbc."<br />".'Epithelial Cells:'.$epi."<br />".'Small Agglutinates:'.$sagg."<br />".'Large Agglutinates:'.$lagg
."<br />".'Aggregates:'.$agg."<br />".'Comments:'.$com;

$rr1='Time Of Collection:'.$tc."<br />".'Time Of Examination:'.$te."<br />".'Colour:'.$color."<br />".'Volume (ml):'.$vol."<br />".'Liquefaction(min):'.$liq
."<br />".'Fructose Test:'.$fru."<br />".'pH:'.$ph."<br />".'Sperm Concentration (M/ml):'.$scon."<br />".'Total Sperm Count(M/ ejaculate):'.$tsc
."<br />".'MORPHOLOGY (% Normal):'.$mor."<br />".'Vitality(% Live):'.$vitality."<br />".'Total Molility (PR +NP, %):'.$tmot."<br />".'Ogressive Motility (PR +NP, %):'.$ogressive
."<br />".'Pus Cells:'.$pus."<br />".'RBCs:'.$rbc."<br />".'Epithelial Cells:'.$epi."<br />".'Small Agglutinates:'.$sagg."<br />".'Large Agglutinates:'.$lagg
."<br />".'Aggregates:'.$agg."<br />".'Comments:'.$com;





$ins_query1="insert into semen1 (`pname`,`pmrn`,`pphone`,`psex`,`page`,`tc`,`te`,`color`,`vol`,`liq`,`fru`,`ph`,`scon`,`tsc`,`mor`,`vitality`,`tmot`,`ogressive`,`pusc`,`rbc`,`epi`,`sagg`,`lagg`,`agg`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`,`com`) values 
('$pname','$pmrn','$pphone','$psex','$page','$tc','$te','$color','$vol','$liq','$fru','$ph','$scon','$tsc','$mor','$vitality','$tmot','$ogressive','$pusc','$rbc','$epi','$sagg','$lagg','$agg','$uby','$adate','$eid','$iname','$id','$sno','$com')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());



$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$rtime',resultby='$user',
r1='$ap',r2='$vo',r3='$vis',
 r4='$sc',r5='$sm',r6='$nfs',r7='$rbc',r8='$wbc',result1='$rr1' where `sno`='$sno'";
mysqli_query($con,$update1);
mysqli_query($con,$update1);

//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
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
		<h1>CBC FORM </h1>


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
      
	  <label for="age"><strong>SEMINAL ANALYSIS / H&E STAIN FOR SPERM MORPHOLOGY (SemenAn2):</strong></label>
	  
	  <label for="age"><strong>Time Of Collection:</strong></label>
      <input name="tc" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Time Of Examination:</strong></label>
      <input name="te" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>PHYSICAL EXAMINATION</strong></label>
	  
	  
	  <label for="age"><strong>Colour:</strong></label>
      <input name="color" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Volume (ml):</strong></label>
      <input name="vol" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Liquefaction:</strong></label>
      <input name="liq" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Fructose Test:</strong></label>
      <input name="fru" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>pH:</strong></label>
      <input name="ph" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>MICROSCOPIC EXAMINATION</strong></label>
	  
	  <label for="age"><strong>Sperm Concentration (M/ml):</strong></label>
      <input name="scon" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Total Sperm Count(M/ ejaculate):</strong></label>
      <input name="tsc" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	    
	  
	  <label for="age"><strong>MORPHOLOGY (% Normal):</strong></label>
      <input name="mor" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  
	  
	  
	  <label for="age"><strong>Vitality(% Live):</strong></label>
      <input name="vitality" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  
	  <label for="age"><strong>Motility Within 1 Hour of Ejaculation:</strong></label>
	  
	  
	  
	  <label for="age"><strong>Total Molility (PR +NP, %):</strong></label>
      <input name="tmot" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  
	  
	  <label for="age"><strong>Ogressive Motility (PR +NP, %):</strong></label>
      <input name="ogressive" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Pus Cells:</strong></label>
      <input name="pusc" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>RBCs:</strong></label>
      <input name="rbc" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Epithelial Cells:</strong></label>
      <input name="epi" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Small Agglutinates:</strong></label>
      <input name="sagg" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Large Agglutinates:</strong></label>
      <input name="lagg" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Aggregates:</strong></label>
      <input name="agg" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  
	  <label for="age"><strong>Comments:</strong></label>
      <input name="com" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  
	  
	  
	  
	  
	  
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
