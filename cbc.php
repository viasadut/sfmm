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
$lis_code=$data['barcode1'];

$query5 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);
  
  
  $opd_last= mysqli_query($db,"select * from cbctbl where pmrn='$pmrn' order by id desc limit 1");
$data_opd = mysqli_fetch_assoc($opd_last);


//lis data
$query_WBC = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='WBC' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_WBC= mysqli_fetch_assoc($query_WBC);


$query_RBC = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='RBC' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_RBC= mysqli_fetch_assoc($query_RBC);

$query_HGB = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='HGB' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_HGB= mysqli_fetch_assoc($query_HGB);

$query_HCT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='HCT' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_HCT= mysqli_fetch_assoc($query_HCT);

$query_MCV = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='MCV' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_MCV= mysqli_fetch_assoc($query_MCV);

$query_MCH = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='MCH' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_MCH= mysqli_fetch_assoc($query_MCH);

$query_MCHC = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='MCHC' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_MCHC= mysqli_fetch_assoc($query_MCHC);

$query_PLT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='PLT' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_PLT= mysqli_fetch_assoc($query_PLT);

$query_NEUTP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB IN ('NEUT%','NEU%','NEUT#') and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_NEUTP= mysqli_fetch_assoc($query_NEUTP);

$query_LYMPHP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB IN ('LYMPH%','LYM%','LYMPH#') and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_LYMPHP= mysqli_fetch_assoc($query_LYMPHP);



$query_MONOP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB IN ('MONO%','MON%','MONO#') and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_MONOP= mysqli_fetch_assoc($query_MONOP);



$query_EOP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB IN('EO%','EOS%','EO#') and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_EOP= mysqli_fetch_assoc($query_EOP);

$query_BASOP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB IN('BASO%','BAS%','BASO#') and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_BASOP= mysqli_fetch_assoc($query_BASOP);

$query_NEUTT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='NEUT#' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_NEUTT= mysqli_fetch_assoc($query_NEUTT);

$query_LYMPHT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='LYMPH#' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_LYMPHT= mysqli_fetch_assoc($query_LYMPHT);

$query_MONOT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='MONO#' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_MONOT= mysqli_fetch_assoc($query_MONOT);

$query_EOT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='EO#' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_EOT= mysqli_fetch_assoc($query_EOT);

$query_BASOT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='BASO#' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_BASOT= mysqli_fetch_assoc($query_BASOT);

$query_IGP = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='IG%' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_IGP= mysqli_fetch_assoc($query_IGP);

$query_IGT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='IG#' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_IGT= mysqli_fetch_assoc($query_IGT);

$query_RDWSD = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='RDW-SD' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_RDWSD= mysqli_fetch_assoc($query_RDWSD);

$query_RDWCV = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='RDW-CV' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_RDWCV= mysqli_fetch_assoc($query_RDWCV);

$query_MICROR = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='MICROR' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_MICROR= mysqli_fetch_assoc($query_MICROR);

$query_MACROR = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='MACROR' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_MACROR= mysqli_fetch_assoc($query_MACROR);

$query_PDW = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='PDW' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_PDW= mysqli_fetch_assoc($query_PDW);

$query_MPV = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='MPV' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_MPV= mysqli_fetch_assoc($query_MPV);

$query_PLCR = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='P-LCR' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_PLCR= mysqli_fetch_assoc($query_PLCR);

$query_PCT = mysqli_query($db,"select * from lab_machine_response where LAB_CODE='$lis_code' and machine_ATTRIB='PCT' and MACHINE_CODE='XN_550' order by response_no_pk desc limit 1");
$data_PCT= mysqli_fetch_assoc($query_PCT);



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

$haemo=$_REQUEST['haemo'];
$red=$_REQUEST['red'];
$pcv=$_REQUEST['pcv'];
$mcv=$_REQUEST['mcv'];
$mch=$_REQUEST['mch'];
$mchc=$_REQUEST['mchc'];
$rdw=$_REQUEST['rdw'];
$pla=$_REQUEST['pla'];
$mpv=$_REQUEST['mpv'];
$wbc=$_REQUEST['wbc'];
$neu=$_REQUEST['neu'];
$lym=$_REQUEST['lym'];
$eos=$_REQUEST['eos'];
$mono=$_REQUEST['mono'];
$bas=$_REQUEST['bas'];
$esr=$_REQUEST['esr'];
$acell=$_REQUEST['acell'];
$nrbc=$_REQUEST['nrbc'];
$remarks=$_REQUEST['remarks'];
$myoblast=$_REQUEST['myoblast'];
$lymphoblast=$_REQUEST['lymphoblast'];
$metamyclocyte=$_REQUEST['metamyclocyte'];
$promyclocyte=$_REQUEST['promyclocyte'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


/*$rr='Haemoglobin:'.$haemo."<br />".'Red Cell Count:'.$red."<br />".'Haematocrit:'.$pcv."<br />".'MCV:'.$mcv."<br />".'MCH:'.$mch."<br />".
'MCHC:'.$mchc."<br />".'RDW:'.$rdw."<br />".'Platelet:'.$pla."<br />".'MPV:'.$mpv."<br />".'White Blood Cell Count:'.$wbc."<br />".
'Neutrophil:'.$neu."<br />".'Lymphocyte:'.$lym."<br />".'Eosinophil:'.$eos."<br />".'Monocyte:'.$mono."<br />".'Basophil:'.$bas."<br />".'ESR:'.$esr
."<br />".'Promyclocyte:'.$promyclocyte."<br />".'Metamyclocyte:'.$metamyclocyte."<br />".'Lymphoblast:'.$lymphoblast."<br />".'Myoblast:'.$myoblast
."<br />".'NRBC:'.$nrbc."<br />".'Remarks:'.$rekarks;




$rr1='Haemoglobin:'.$haemo.' '.'g/dL'."<br />".'Red Cell Count:'.$red.' '.'10^12/L'."<br />".'Haematocrit:'.$pcv.' '.'%'."<br />".'MCV:'.$mcv.' '.'fL'."<br />".'MCH:'.$mch.' '.'pg'."<br />".
'MCHC:'.$mchc.' '.'g/dL'."<br />".'RDW:'.$rdw.' '.'%'."<br />".'Platelet:'.$pla.' '.'10^3/uL'."<br />".'MPV:'.$mpv.' '.'fL'."<br />".'White Blood Cell Count:'.$wbc.' '.'10^3/uL'."<br />".
'Neutrophil:'.$neu.' '.'%'."<br />".'Lymphocyte:'.$lym.' '.'%'."<br />".'Eosinophil:'.$eos.' '.'%'."<br />".'Monocyte:'.$mono.' '.'%'."<br />".'Basophil:'.$bas.' '.'%'."<br />".'ESR:'.$esr.' '.'mm/h'
."<br />".'Promyclocyte:'.$promyclocyte.' '.'%'."<br />".'Metamyclocyte:'.$metamyclocyte.' '.'%'."<br />".'Lymphoblast:'.$lymphoblast.' '.'%'."<br />".'Myoblast:'.$myoblast
.' '.'%'."<br />".'NRBC:'.$nrbc.' '.'10^3/uL'."<br />".'Remarks:'.$rekarks;
*/

$rr='Haemoglobin:'.$haemo."<br />".'Red Cell Count:'.$red."<br />".'Haematocrit:'.$pcv."<br />".'MCV:'.$mcv."<br />".'MCH:'.$mch."<br />".
'MCHC:'.$mchc."<br />".'RDW:'.$rdw."<br />".'Platelet:'.$pla."<br />".'MPV:'.$mpv."<br />".'White Blood Cell Count:'.$wbc."<br />".
'Neutrophil:'.$neu."<br />".'Lymphocyte:'.$lym."<br />".'Eosinophil:'.$eos."<br />".'Monocyte:'.$mono."<br />".'Basophil:'.$bas."<br />".'ESR:'.$esr
."<br />".'Promyclocyte:'.$promyclocyte."<br />".'Metamyclocyte:'.$metamyclocyte."<br />".'Lymphoblast:'.$lymphoblast."<br />".'Myoblast:'.$myoblast
."<br />".'NRBC:'.$nrbc."<br />".'Atypical, Cells:'.$acell."<br />".'Remarks:'.$rekarks;




$rr1='Haemoglobin:'.$haemo.' '.'g/dL'."<br />".'Red Cell Count:'.$red.' '.'10^12/L'."<br />".'Haematocrit:'.$pcv.' '.'%'."<br />".'MCV:'.$mcv.' '.'fL'."<br />".'MCH:'.$mch.' '.'pg'."<br />".
'MCHC:'.$mchc.' '.'g/dL'."<br />".'RDW:'.$rdw.' '.'%'."<br />".'Platelet:'.$pla.' '.'10^3/uL'."<br />".'MPV:'.$mpv.' '.'fL'."<br />".'White Blood Cell Count:'.$wbc.' '.'10^3/uL'."<br />".
'Neutrophil:'.$neu.' '.'%'."<br />".'Lymphocyte:'.$lym.' '.'%'."<br />".'Eosinophil:'.$eos.' '.'%'."<br />".'Monocyte:'.$mono.' '.'%'."<br />".'Basophil:'.$bas.' '.'%'."<br />".'ESR:'.$esr.' '.'mm/h'
."<br />".'Promyclocyte:'.$promyclocyte.' '.'%'."<br />".'Metamyclocyte:'.$metamyclocyte.' '.'%'."<br />".'Lymphoblast:'.$lymphoblast.' '.'%'."<br />".'Myoblast:'.$myoblast
.' '.'%'."<br />".'NRBC:'.$nrbc.' '.'10^3/uL'."<br />".'Atypical, Cells:'.$acell.' '.'%'."<br />".'Remarks:'.$rekarks;







$ins_query1="insert into cbctbl (`pname`,`pmrn`,`pphone`,`psex`,`page`,`haemo`,`red`,`pcv`,`mcv`,`mch`,`mchc`,`rdw`,`pla`,`mpv`,`wbc`,`neu`,`lym`,`eos`,`mono`,`bas`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`,`esr`,`promyclocyte`,`metamyclocyte`,`myoblast`,`lymphoblast`,`nrbc`,`remarks`,`a_cell`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$red','$pcv','$mcv','$mch','$mchc','$rdw','$pla','$mpv','$wbc','$neu','$lym','$eos','$mono','$bas','$user','$adate','$eid','$iname','$id','$sno','$esr','$promyclocyte','$metamyclocyte','$myoblast','$lymphoblast','$nrbc','$remarks','$acell')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());


/*$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$adate',resultby='$user',r1='$haemo',r2='$red',r3='$pcv',
 r4='$mcv',r5='$mch',r6='$mchc',r7='$rdw',r8='$pla',r9='$mpv',r10='$wbc',r11='$neu',r12='$lym',r13='$eos',r14='$mono',r15='$bas',esr='$esr',result1='$rr1' where `sno`='$sno'";
mysqli_query($con,$update1);
*/

//if ($con->query($ins_query) == TRUE) 
//{
	
	$url = "cbcv?inid=$sno&id=$id" ;
header("Location:$url");

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
} 

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>CBC Form</title>
  
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
    

label {
            float: left;
        }
          
        span {
            display: block;
            overflow: hidden;
            padding: 0px 4px 0px 6px;
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
		<h1><?php if ($iname!='CBC'){echo 'CBC WITH ESR FORM';} else {echo 'CBC FORM';}?> </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	 <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data['pname']?>"required/>
 	  

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
      <input name="psex" type="text" size="2"value="<?php echo $data['pgender']?>" required/>
														
						
      <input name="pmrn" type="text" size="5" value="<?php echo $data['pmrn']?>" required/>
      <input name="pphone" type="text" size="8" value="<?php echo $data['pphone']?>"  required/>	  
	  <input name="page" type="text" size="10"value="<?php echo $data['page']?>" required/>
      
	  
	  <span>
	  <label for="age" style="font-weight: bold;font-size:22px;color:green">Today's Result:</label>
	  
	  <?php if(!empty($data_opd))
	  
	  {echo
	  '<label for="age" style="font-weight: bold;font-size:22px;color:green">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Result:('.$data_opd["udate"].')</label>'
	  ;}
	  else {};
	  ?>
	  
	  </span><br><br><br>
	  
	   <label for="age" style="display: flex;"><strong>White Blood Cell Count:</strong></label>
		  
      <span><input name="wbc" id="wbc" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_WBC['machine_result'];?>"required step=".01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['wbc'];?></strong>
	  </span>
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
	  
	   <label for="age"><strong>Red Cell Count:</strong></label>
      <span>
	  
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="red" id="red" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_RBC['machine_result'];?>"required step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['red'];?></strong>
	   
	   </span>
	   
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
	  
	   <label for="age"><strong>Haemoglobin:</strong></label>
	   <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="haemo" id="haemo" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_HGB['machine_result'];?>"required step=".01">
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['haemo'];?></strong>
	  </span>
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
	  
	  
	 
	  
	  
	  
	  <label for="age"><strong>Haematocrit:</strong></label>
	  <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="pcv" id="pcv" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_HCT['machine_result'];?>"required step=".01">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['pcv'];?></strong>
	  </span>
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
	  
	  
	  <label for="age"><strong>MCV:</strong></label>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="mcv" id="mcv" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_MCV['machine_result'];?>"required step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['mcv'];?></strong>
	  </span>
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
	  
	  <span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <label for="age"><strong>MCH:</strong></label>
      <input name="mch" id="mch" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_MCH['machine_result'];?>"required step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['mch'];?></strong>
	  </span>
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
	  
	  
	  
	  
	  <label for="age"><strong>MCHC:</strong></label>
      <span>
	  
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="mchc" id="mchc" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_MCHC['machine_result'];?>"required step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['mchc'];?></strong>
	  </span>
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
	  
<label for="age"><strong>Platelet:</strong></label>
     
<span>	 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="pla" id="pla" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_PLT['machine_result'];?>"required step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['pla'];?></strong>
	  </span>
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
	  
	  <label for="age"><strong>RDW:</strong></label>
      
	  <span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="rdw" id="rdw" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_RDWCV['machine_result'];?>"required step=".01">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['rdw'];?></strong>
	  </span>
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
	  
	  
	  
	  
	  <label for="age"><strong>MPV:</strong></label>
      <span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="mpv" id="mpv" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_MPV['machine_result'];?>"required step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['mpv'];?></strong>
	  </span>
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
	  
	  
	 
	  
	  
	  
	  
	  <label for="age"><strong>Neutrophil:</strong></label>
      
	  <span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  
	  <input name="neu" id="neu" type="number"  style="font-weight: bold;font-size:22px;" value="<?php echo $data_NEUTP['machine_result'];?>"required step=".01">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['neu'];?></strong>
	  </span>
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
	  
	  
	  <label for="age"><strong>Lymphocyte:</strong></label>
      
	  <span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="lym" id="lym" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_LYMPHP['machine_result'];?>"required step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['lym'];?></strong>
	  </span>
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
	  <label for="age"><strong>Monocyte:</strong></label>
      <span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="mono" type="number" id="mono" style="font-weight: bold;font-size:22px;" value="<?php echo $data_MONOP['machine_result'];?>"required step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['mono'];?></strong>
	  </span>
	  
	  	  <script>
function f_color2(){
var myVal = parseInt(document.getElementById('mono').value);
if (myVal > 11) {
document.getElementById('mono').style.color = "red";
}

else if (myVal < 1) {
document.getElementById('mono').style.color = "red";
}

else  {
document.getElementById('mono').style.color = "green";
}

}
document.getElementById('mono').onchange= f_color2;
</script>
	  
	  <label for="age"><strong>Eosinophil:</strong></label>
      <span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="eos" id="eos" type="number" style="font-weight: bold;font-size:22px;" value="<?php echo $data_EOP['machine_result'];?>"required step=".01">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['eos'];?></strong>
	  </span>
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
	  
	  
	  

	  <label for="age"><strong>Basophil:</strong></label>
      <span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input name="bas" type="number" value="<?php echo $data_BASOP['machine_result'];?>" id="bas" required style="font-weight: bold;font-size:22px;" step=".01">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['bas'];?></strong>
	  </span>
	  
	  <script>
function f_color1(){
var myVal = parseInt(document.getElementById('bas').value);
if (myVal > 2) {
document.getElementById('bas').style.color = "red";
}

else if (myVal < 0) {
document.getElementById('bas').style.color = "red";
}

else  {
document.getElementById('bas').style.color = "green";
}

}
document.getElementById('bas').onchange= f_color1;
</script>

	  
	  
	  <?php if ($iname!='CBC'){echo'
	  <label for="age"><strong>ESR:</strong></label>
      
	  
	 
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="esr" type="text" value=""required id="esr" style="font-weight: bold;font-size:22px;" step=".01">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:18px;color:red">'.$data_opd['esr'].'</strong>
	  </span>';}?>
<script>
function f_color(){
var myVal = parseInt(document.getElementById('esr').value);
if (myVal > 20) {
document.getElementById('esr').style.color = "red";
}

else if (myVal < 0) {
document.getElementById('esr').style.color = "red";
}

else  {
document.getElementById('esr').style.color = "green";
}

}
document.getElementById('esr').onchange= f_color;
</script>	  



      
<label for="age"><strong>Pro-Myclocyte:</strong></label>
	  
	 
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="promyclocyte" type="number" value="0"required style="font-weight: bold;font-size:22px;" step=".01">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['promyclocyte'];?></strong>
</span>
	  
<label for="age"><strong>Metamyclocyte:</strong></label>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="metamyclocyte" type="number" value="0"required style="font-weight: bold;font-size:22px;" step=".01">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['metamyclocyte'];?></strong>
</span>


<label for="age"><strong>Lymphoblast:</strong></label>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="lymphoblast" type="number" value="0"required style="font-weight: bold;font-size:22px;" step=".01">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['lymphoblast'];?></strong>
</span>

<label for="age"><strong>Myoblast:</strong></label>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="myoblast" type="number" value="0"required style="font-weight: bold;font-size:22px;" step=".01" >
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['myoblast'];?></strong>
</span>


<label for="age"><strong>NRBC:</strong></label>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<input name="nrbc" type="number" value="0"required style="font-weight: bold;font-size:22px;" step=".01">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['nrbc'];?></strong>
</span>

<label for="age"><strong>Atypical, Cells:</strong></label>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input name="acell" type="number" value="0"required style="font-weight: bold;font-size:22px;" step=".01">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;font-size:22px;color:red"> <?php echo $data_opd['a_cell'];?></strong>
</span>
<label for="age"><strong>Remarks:</strong></label>
<br>
<textarea name="remarks" style="font-weight: bold;font-size:22px;"></textarea>
 

	  
  </fieldset>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
</tr></table>

</form>
  


</body>

</html>
