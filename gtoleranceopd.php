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
$sno='O'.$id;
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];




$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['medi'];

$icode=$data['code'];
$lis_code=$data['barcode1'];
$lis_code2=$data['barcode2'];
$lis_code3=$data['barcode3'];

$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);
  
  
  
$query_SG1 = mysqli_query($db,"select * from lis_inves_table where icode='$icode' order by id desc limit 1");
$data_SG1= mysqli_fetch_assoc($query_SG1);

$para=$data_SG1['para'];
$mcode=$data_SG1['mcode'];



$query_SG = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='$para' and MACHINE_CODE='$mcode' and TEST_NO_FK='$icode'  order by response_no_pk desc limit 1");
$data_SG= mysqli_fetch_assoc($query_SG);
$gg=$data_SG['machine_result'];

$query_SG2 = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code2' and machine_ATTRIB='$para' and MACHINE_CODE='$mcode' and TEST_NO_FK='$icode'  order by response_no_pk desc limit 1");
$data_SG2= mysqli_fetch_assoc($query_SG2);


$query_SG3 = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code3' and machine_ATTRIB='$para' and MACHINE_CODE='$mcode' and TEST_NO_FK='$icode'  order by response_no_pk desc limit 1");
$data_SG3= mysqli_fetch_assoc($query_SG3);
  
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

$gfast=$_REQUEST['gfast'];
$gone=$_REQUEST['gone'];
$gtwo=$_REQUEST['gtwo'];
$gufast=$_REQUEST['gufast'];
$guone=$_REQUEST['guone'];
$gutwo=$_REQUEST['gutwo'];

//$crea=$_REQUEST['crea'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


$rr='Glucose, Blood(fasting):'.$gfast."<br />".'Glucose, Blood(1.0 Hour):'.$gone."<br />".'Glucose, Blood(2.0 Hour):'.$gtwo."<br />".'Glucose, Urine(fasting):'.$gufast."<br />".'Glucose, Urine(1.0 Hour):'.$guone."<br />".
'Glucose, Urine(2.0 Hour):'.$gutwo;

$rr1='Glucose, Blood(fasting):'.$gfast.' '.'mmol/L'."<br />".'Glucose, Blood(1.0 Hour):'.$gone.' '.'mmol/L'."<br />".'Glucose, Blood(2.0 Hour):'.$gtwo.' '.'mmol/L'."<br />".'Glucose, Urine(fasting):'.$gufast.' '.'mmol/L'."<br />".'Glucose, Urine(1.0 Hour):'.$guone.' '.'mmol/L'."<br />".
'Glucose, Urine(2.0 Hour):'.$gutwo.' '.'mmol/L';


$ins_query1="insert into gtolerance (`pname`,`pmrn`,`pphone`,`psex`,`page`,`gfast`,`gone`,`gtwo`,`gufast`,`guone`,`gutwo`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$gfast','$gone','$gtwo','$gufast','$guone','$gutwo','$user','$adate','$eid','$iname','$id','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());



$update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());


$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$rtime',resultby='$user',
r1='$gfast',r2='$gone',r3='$gtwo',
 r4='$gufast',r5='$guone',r6='$gutwo',result1='$rr1' where `sno`='$sno'";
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
		<h1>OGTT FORM </h1>


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
      
	  <label for="age"><strong>Glucose, Blood (Fasting):</strong></label>
      <input name="gfast" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_SG['machine_result'];?>"required>
	  <label for="age"><strong>Glucose, Blood (1.0 Hour):</strong></label>
      <input name="gone" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_SG2['machine_result'];?>" >
	  <label for="age"><strong>Glucose, Blood (2.0 Hour)::</strong></label>
      <input name="gtwo" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_SG3['machine_result'];?>"required>
	  <label for="age"><strong>Glucose, Urine (Fasting):</strong></label>
      <input name="gufast" type="text" size="70" style="text-transform:uppercase" value=""required>
	  <label for="age"><strong>Glucose, Urine (1.0 Hour):</strong></label>
      <input name="guone" type="text" size="70" style="text-transform:uppercase" value=""/>
	  <label for="age"><strong>Glucose, Urine (2.0 Hour):</strong></label>
      <input name="gutwo" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  
	  
	  
	  
	  
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
