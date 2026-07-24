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

$id=$_REQUEST['id'];
$sno='O'.$id;
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['medi'];
$lis_code=$data['barcode1'];
$icode=$data['code'];

$query_SG1 = mysqli_query($db,"select * from lis_inves_table where icode='$icode' order by id desc limit 1");
$data_SG1= mysqli_fetch_assoc($query_SG1);

$para=$data_SG1['para'];
$mcode=$data_SG1['mcode'];

  

//lis data
$query_URCA = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='URCA' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_URCA= mysqli_fetch_assoc($query_URCA);


$query_CRE2 = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='CRE2' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_CRE2= mysqli_fetch_assoc($query_CRE2);

$query_TP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='TP' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_TP= mysqli_fetch_assoc($query_TP);

$query_CA = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='CA' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_CA= mysqli_fetch_assoc($query_CA);


$query_PHOS = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='PHOS' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_PHOS= mysqli_fetch_assoc($query_PHOS);


$query_ALB = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_ALB= mysqli_fetch_assoc($query_ALB);


$query_BiCar = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_BiCar= mysqli_fetch_assoc($query_BiCar);


$query_Micro_albumin = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='ALB' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_Micro_albumin= mysqli_fetch_assoc($query_Micro_albumin);


$query_Urea = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='BUN' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_Urea= mysqli_fetch_assoc($query_Urea);


$query_Urine_Albu_Ratio = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='' and MACHINE_CODE='$mcode' order by response_no_pk desc limit 1");
$data_Urine_Albu_Ratio= mysqli_fetch_assoc($query_Urine_Albu_Ratio);



$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
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
//$pphone=$_REQUEST['pphone'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

$uacid=$_REQUEST['uacid'];
$creatinine=$_REQUEST['creatinine'];
$urea=$_REQUEST['urea'];
$sodium=$_REQUEST['sodium'];
$potassium=$_REQUEST['potassium'];
$chloride=$_REQUEST['chloride'];
$tprotein=$_REQUEST['tprotein'];
$albumin=$_REQUEST['albumin'];


$ah=$_REQUEST['ah'];
$scal=$_REQUEST['scal'];
$po4=$_REQUEST['po4'];
$egfr=$_REQUEST['egfr'];

$bicarbonate=$_REQUEST['bicarbonate'];
$micro_albu_urine=$_REQUEST['micro_albu_urine'];
$creatinine_urine=$_REQUEST['creatinine_urine'];
$urine_albumin_creatinine_ratio=$_REQUEST['urine_albumin_creatinine_ratio'];



//$crea=$_REQUEST['crea'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


$rr='Uric Acid :'.$uacid."<br />".'Creatinine:'.$creatinine."<br />".'Urea:'.$urea."<br />".'Sodium:'.$sodium."<br />".'Potassium:'.$potassium."<br />".'Chloride:'.$chloride."<br />".'Bicarbonate:'.$bicarbonate."<br />".'Total Protein:'.$tprotein."<br />".'MicroAlbumin, Urine:'.$micro_albu_urine."<br />".'Creatinine, Urine:'.$creatinine_urine."<br />".'Urine Albumin/Creatinine Ratio:'.$urine_albumin_creatinine_ratio."<br />".'Serum Calcium :'.$scal."<br />".'Serum Inorganic Phosphate:'.$po4."<br />".'eGFR:'.$egfr;

$rr1='Uric Acid :'.$uacid.' '.'umol/L'."<br />".'Creatinine:'.$creatinine.' '.'mg/dL'."<br />".'Urea:'.$urea.' '.'mmol/L'."<br />".'Sodium:'.$sodium.' '.'mmol/L'."<br />".'Potassium:'.$potassium.' '.'mmol/L'."<br />".'Chloride:'.$chloride.' '.'mmol/L'."<br />".'Bicarbonate:'.$bicarbonate.' '.'mmol/L'."<br />".'Total Protein:'.$tprotein.' '.'g/L'."<br />".'MicroAlbumin, Urine:'.$micro_albu_urine.' '.'mmol/L'."<br />".'Creatinine, Urine:'.$creatinine_urine.' '.'mg/L'."<br />".'Urine Albumin /Creatinine Ratio :'.$urine_albumin_creatinine_ratio.' '.'mg/mmoL'."<br />".'Serum Calcium :'.$scal.' '.'mmol/L'."<br />".'Serum Inorganic Phosphate:'.$po4.' '.'mg/dL'."<br />".'eGFR:'.$egfr.' '.'mL/min/1.72mv';


$ins_query1="insert into renal (`pname`,`pmrn`,`psex`,`page`,`uacid`,`creatinine`,`urea`,`sodium`,`potassium`,`chloride`,`tprotein`,`albumin`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`,`ah`,`scal`,`po4`,`egfr`,`bicarbonate`,`micro_albu_urine`,`creatinine_urine`,`urine_albumin_creatinine_ratio`) values 
('$pname','$pmrn','$psex','$page','$uacid','$creatinine','$urea','$sodium','$potassium','$chloride','$tprotein','$albumin','$user','$adate','$eid','$iname','$id','$sno','$ah','$scal','$po4','$egfr','$bicarbonate','$micro_albu_urine','$creatinine_urine','$urine_albumin_creatinine_ratio')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());



//$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$rtime',resultby='$user',
//r1='$tc',r2='$tri',r3='$hdl',r4='$ldl',r5='$cho',r6='$cho',result1='$rr1' where `sno`='$sno'";
//mysqli_query($con,$update1);
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
  <title>REnal Function Test Form</title>
  
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
		<h1>RENAL FUNCTION TEST FORM </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	 <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data['pname']?>"required readonly>
 	  

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
      <input name="psex" type="text" size="5"value="<?php echo $data['pgender']?>" required readonly>
														
						
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required readonly>
      
	  <input name="page" type="text" size="20"value="<?php echo $data['page']?>" required readonly>
      
      
	  <label for="age"><strong>RENAL FUNCTION TEST (GP40A):</strong></label>
	  <label for="age"><strong>Uric Acid:</strong></label>
      <input name="uacid" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_URCA['machine_result'];?>"required>
	  <label for="age"><strong>Creatinine:</strong></label>
      <input name="creatinine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_CRE2['machine_result'];?>"required>
	  <label for="age"><strong>Urea:</strong></label>
      <input name="urea" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_Urea['machine_result'];?>"required>
	  <label for="age"><strong>Sodium:</strong></label>
      <input name="sodium" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Potassium:</strong></label>
      <input name="potassium" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Chloride:</strong></label>
      <input name="chloride" type="text" size="70" style="text-transform:uppercase" value=""required>

      <label for="age"><strong>Bicarbonate:</strong></label>
      <input name="bicarbonate" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Total Protein:</strong></label>
      <input name="tprotein" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_TP['machine_result'];?>"required>
	  <label for="age"><strong>MicroAlbumin, Urine:</strong></label>
      <input name="micro_albu_urine" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
      <label for="age"><strong>Creatinine, Urine:</strong></label>
      <input name="creatinine_urine" type="text" size="70" style="text-transform:uppercase" value=""required>
	  	  <label for="age"><strong>Urine Albumin / Creatinine Ratio:</strong></label>
      <input name="urine_albumin_creatinine_ratio" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  	  <label for="age"><strong>Serum Calcium:</strong></label>
      <input name="scal" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_CA['machine_result'];?>"required>
	  
	  	  <label for="age"><strong>Serum Inorganic Phosphate:</strong></label>
      <input name="po4" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_PHOS['machine_result'];?>"required>
	  
	  	  <label for="age"><strong>eGFR:</strong></label>
      <input name="egfr" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  
	  
	  
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
