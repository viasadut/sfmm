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
$lis_code=$data['barcode1'];

$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);


$sel="SELECT * FROM urine WHERE `sno`='$sno';";
$resulto = mysqli_query($con,$sel);  


//lis data
$query_SG = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='SG' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_SG= mysqli_fetch_assoc($query_SG);


$query_pH = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='pH' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_pH= mysqli_fetch_assoc($query_pH);

$query_PRO = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='PRO' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_PRO= mysqli_fetch_assoc($query_PRO);

$query_GLU = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='GLU' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_GLU= mysqli_fetch_assoc($query_GLU);

$query_NIT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='NIT' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_NIT= mysqli_fetch_assoc($query_NIT);

$query_KET = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='KET' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_KET= mysqli_fetch_assoc($query_KET);

$query_BIL = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='BIL' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_BIL= mysqli_fetch_assoc($query_BIL);

$query_UBG = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='UBG' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_UBG= mysqli_fetch_assoc($query_UBG);

$query_LEU = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='LEU' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_LEU= mysqli_fetch_assoc($query_LEU);

$query_BLD = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='BLD' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_BLD= mysqli_fetch_assoc($query_BLD);

$query_PUS = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='WBC' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_PUS= mysqli_fetch_assoc($query_PUS);

$query_RBC = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='RBC' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_RBC= mysqli_fetch_assoc($query_RBC);

$query_EP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='SQEP' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_EP= mysqli_fetch_assoc($query_EP);

$query_UNCX = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='UNCX' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_UNCX= mysqli_fetch_assoc($query_UNCX);

$query_HYA = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='HYA' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_HYA= mysqli_fetch_assoc($query_HYA);

$query_UNCC = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='UNCC' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_UNCC= mysqli_fetch_assoc($query_UNCC);

$query_BYST = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='BYST' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_BYST= mysqli_fetch_assoc($query_BYST);

$query_SPRM = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='SPRM' and MACHINE_CODE='FUS_1000' order by response_no_pk desc limit 1");
$data_ISPRM= mysqli_fetch_assoc($query_SPRM);

  
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

$aurine=$_REQUEST['aurine'];
$surine=$_REQUEST['surine'];
$purine=$_REQUEST['purine'];
$prurine=$_REQUEST['prurine'];
$gurine=$_REQUEST['gurine'];
$kurine=$_REQUEST['kurine'];
$burine=$_REQUEST['burine'];
$uurine=$_REQUEST['uurine'];
$blurine=$_REQUEST['blurine'];
$wurine=$_REQUEST['wurine'];
$rurine=$_REQUEST['rurine'];
$eurine=$_REQUEST['eurine'];
$curine=$_REQUEST['curine'];
$crurine=$_REQUEST['crurine'];
$baurine=$_REQUEST['baurine'];
$yurine=$_REQUEST['yurine'];
$ourine=$_REQUEST['ourine'];

//$crea=$_REQUEST['crea'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');



if($res=mysqli_num_rows($resulto)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Result Already Updated For This Test... Kindly go back to edit option  if need to modify"); ';
    echo '</script>';
    }


else
{


$rr='Appearance:'.$aurine."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br />".'Cast:'.$curine
."<br />".'Crystal:'.$crurine."<br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine;





$ins_query1="insert into urine (`pname`,`pmrn`,`pphone`,`psex`,`page`,`aurine`,`surine`,`purine`,`prurine`,`gurine`,`kurine`,
`burine`,`uurine`,`blurine`,`wurine`,`eurine`,`curine`,`crurine`,`baurine`,`yurine`,`ourine`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`,`rurine`) values 
('$pname','$pmrn','$pphone','$psex','$page','$aurine','$surine','$purine','$prurine','$gurine','$kurine',
'$burine','$uurine','$blurine','$wurine','$eurine','$curine','$crurine','$baurine','$yurine','$ourine','$user','$adate','$eid','$iname','$id','$sno','$rurine')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());



$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$rtime',resultby='$user',
r1='$aurine',r2='$surine',r3='$purine',
 r4='$prurine',r5='$gurine',r6='$kurine',r7='$burine',r8='$uurine',r9='$blurine',r10='$wurine',r11='$eurine',r12='$curine',r13='$crurine',r14='$baurine',r15='$yurine',r16='$ourine' where `sno`='$sno'";
mysqli_query($con,$update1);

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
		<h1>URINE FOR RME FORM </h1>


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
      
	  <label for="age"><strong>Urine FEME / Urinalysis (uFEME1):</strong></label>
	  <label for="age"><strong>Appearance, Urine:</strong></label>
      <input name="aurine" type="text" size="70" style="text-transform:uppercase" value="Clear Yellow"required>
	  <label for="age"><strong>Specific Gravity, Urine:</strong></label>
      <input name="surine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_SG['machine_result'];?>"required>
	  <label for="age"><strong>pH, Urine:</strong></label>
      <input name="purine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_pH['machine_result'];?>"required>
	  <label for="age"><strong>Protein, Urine:</strong></label>
      <input name="prurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_PRO['machine_result'];?>"required>
	  <label for="age"><strong>Glucose, Urine:</strong></label>
      <input name="gurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_GLU['machine_result'];?>"required>
	  <label for="age"><strong>Ketone, Urine:</strong></label>
      <input name="kurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_KET['machine_result'];?>"required>
	  <label for="age"><strong>Bilirubin Screen, Urine:</strong></label>
      <input name="burine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_BIL['machine_result'];?>"required>
	  <label for="age"><strong>Urobilinogen, Urine:</strong></label>
      <input name="uurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_UBG['machine_result'];?>"required>
	  
	  <label for="age"><strong>Blood, Urine:</strong></label>
      <input name="blurine" type="text" size="70" style="text-transform:uppercase" value="Negative" required>
	  <label for="age"><strong>Microscopic Examination, Urine:</strong></label>
	  <label for="age"><strong>WBC, Urine:</strong></label>
      <input name="wurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_PUS['machine_result'];?>"required>
	  <label for="age"><strong>RBC, Urine:</strong></label>
      <input name="rurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_RBC['machine_result'];?>"required>
	  <label for="age"><strong>Epithelial Cell, Urine:</strong></label>
      <input name="eurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data_EP['machine_result'];?>"required>
	  <label for="age"><strong>Cast, Urine:</strong></label>
      <input name="curine" type="text" size="70" value="Negative"required>
	  <label for="age"><strong>Crystal, Urine:</strong></label>
      <input name="crurine" type="text" size="70"  value="Negative"required>
	  <label for="age"><strong>Bacteria, Urine:</strong></label>
      <input name="baurine" type="text" size="70"  value="Negative"required>
	  <label for="age"><strong>Yeast, Urine:</strong></label>
      <input name="yurine" type="text" size="70"  value="Negative"required>
	  <label for="age"><strong>Others, Urine:</strong></label>
      <input name="ourine" type="text" size="70" value="Negative"required>
	  
	  
	  
	  
	  
	  
	  
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
