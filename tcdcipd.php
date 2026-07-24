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
$iname=$data['medi'];
$lis_code=$data['barcode1'];
$icode=$data['code'];
$query5 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);
 
 
 
 
 
//lis data
$query_WBC = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='WBC' and MACHINE_CODE='XN_550' and TEST_NO_FK='$icode' order by response_no_pk desc limit 1");
$data_WBC= mysqli_fetch_assoc($query_WBC);



$query_NEUTP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='NEUT%' and MACHINE_CODE='XN_550' and TEST_NO_FK='$icode' order by response_no_pk desc limit 1");
$data_NEUTP= mysqli_fetch_assoc($query_NEUTP);

$query_LYMPHP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='LYMPH%' and MACHINE_CODE='XN_550' and TEST_NO_FK='$icode' order by response_no_pk desc limit 1");
$data_LYMPHP= mysqli_fetch_assoc($query_LYMPHP);

$query_MONOP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='MONO%' and MACHINE_CODE='XN_550' and TEST_NO_FK='$icode' order by response_no_pk desc limit 1");
$data_MONOP= mysqli_fetch_assoc($query_MONOP);

$query_EOP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='EO%' and MACHINE_CODE='XN_550' and TEST_NO_FK='$icode' order by response_no_pk desc limit 1");
$data_EOP= mysqli_fetch_assoc($query_EOP);

$query_BASOP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='BASO%' and MACHINE_CODE='XN_550' and TEST_NO_FK='$icode' order by response_no_pk desc limit 1");
$data_BASOP= mysqli_fetch_assoc($query_BASOP);
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

$wcc=$_REQUEST['wcc'];
$ne=$_REQUEST['ne'];
//$bo=$_REQUEST['bo'];
$lym=$_REQUEST['lym'];
$eos=$_REQUEST['eos'];
$mono=$_REQUEST['mono'];
$bas=$_REQUEST['bas'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


$rr='TOTAL WHITE BLOOD CELL:'."<br />".'White Blood Cell Count:'.$wcc."<br />".'--White Blood Cell Differential Count'."<br />".'**Neutrophil:'.$ne."<br />".'**Lymphocyte:'.$lym
."<br />".'Eosinophil:'.$eos."<br />".'Monocyte:'.$mono."<br />".'Basophil:'.$bas;





$ins_query1="insert into tcdc (`pname`,`pmrn`,`pphone`,`psex`,`page`,`wcc`,`ne`,`lym`,`eos`,`mono`,`bas`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$wcc','$ne','$lym','$eos','$mono','$bas','$user','$adate','$eid','$iname','$id','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());



/*$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$rtime',resultby='$user',
r1='$ap',r2='$vo',r3='$vis',
 r4='$sc',r5='$sm',r6='$nfs',r7='$rbc',r8='$wbc' where `sno`='$sno'";
mysqli_query($con,$update1);
mysqli_query($con,$update1);*/

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
		<h1>SEMINAL FLUID FOR ANALYSIS FORM </h1>


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
      
	<label for="age"><strong>TC & DC OF WBC:</strong></label>
	  <label for="age"><strong>Total White Blood Cell:</strong></label>
      <input name="wcc" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_WBC['machine_result'];?>"required>
	  <label for="age"><strong>Neutrophil:</strong></label>
      <input name="ne" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_NEUTP['machine_result'];?>"required>
	  <label for="age"><strong>Lymphocyte:</strong></label>
      <input name="lym" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_LYMPHP['machine_result'];?>"required>
	  <label for="age"><strong>Eosinophil:</strong></label>
      <input name="eos" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_EOP['machine_result'];?>"required>
	  <label for="age"><strong>Monocyte:</strong></label>
      <input name="mono" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_MONOP['machine_result'];?>"required>
	  
	  
	  <label for="age"><strong>Basophil:</strong></label>
      <input name="bas" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_BASOP['machine_result'];?>"required>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>


</form>
  


</body>

</html>
