<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd')"; 
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
$tt=$_SERVER['HTTP_HOST']	;
$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge='' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''and eid='$eid'");
$data59 = mysqli_fetch_assoc($query59);

$query9 = mysqli_query($db,"select * from user where uname='$user'");
$data9 = mysqli_fetch_assoc($query9);


$query44=mysqli_query($db,"Select * from gcs where pmrn= '$pmrn' and eid='$eid'");
$data44 = mysqli_fetch_assoc($query44);

$query3 = "SELECT COUNT(pmrn) FROM iinves where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());
$row3 = mysqli_fetch_array($result3);
//$num1=$row3['COUNT(pmrn)'];

$query14 = "SELECT COUNT(pmrn) FROM iinfusion where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result14 = mysqli_query($con, $query14) or die(mysqli_error());
$row14 = mysqli_fetch_array($result14);

$query15 = "SELECT COUNT(pmrn) FROM istat where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result15 = mysqli_query($con, $query15) or die(mysqli_error());
$row15 = mysqli_fetch_array($result15);

$query16 = "SELECT COUNT(pmrn) FROM ehmedi where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result16 = mysqli_query($con, $query16) or die(mysqli_error());
$row16 = mysqli_fetch_array($result16);

$query17 = "SELECT COUNT(pmrn) FROM iidiet where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result17 = mysqli_query($con, $query17) or die(mysqli_error());
$row17 = mysqli_fetch_array($result17);

$query18 = "SELECT COUNT(pmrn) FROM istret where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result18 = mysqli_query($con, $query18) or die(mysqli_error());
$row18 = mysqli_fetch_array($result18);

$query19 = "SELECT COUNT(pmrn) FROM imedi3 where pmrn='$pmrn' and eid='$eid' and status1='implemented' "; 
$result19 = mysqli_query($con, $query19) or die(mysqli_error());
$row19 = mysqli_fetch_array($result19);

$query20 = "SELECT COUNT(pmrn) FROM gcs where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result20 = mysqli_query($con, $query20) or die(mysqli_error());
$row20 = mysqli_fetch_array($result20);

$query21 = "SELECT COUNT(pmrn) FROM iblood where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result21 = mysqli_query($con, $query21) or die(mysqli_error());
$row21 = mysqli_fetch_array($result21);


$query22 = "SELECT COUNT(pmrn) FROM gcs1 where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$query23 = "SELECT COUNT(pmrn) FROM ivisit where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);

$query24 = "SELECT COUNT(pmrn) FROM innote where pmrn='$pmrn' and eid='$eid' and status='Rupdated' "; 
$result24 = mysqli_query($con, $query24) or die(mysqli_error());
$row24 = mysqli_fetch_array($result24);

$query25 = "SELECT COUNT(pmrn) FROM inprocedure where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result25 = mysqli_query($con, $query25) or die(mysqli_error());
$row25 = mysqli_fetch_array($result25);

$query26 = "SELECT COUNT(pmrn) FROM inpatient where pmrn='$pmrn' and eid='$eid' and disstatus='Discharge Bill Confirmed' "; 
$result26 = mysqli_query($con, $query26) or die(mysqli_error());
$row26 = mysqli_fetch_array($result26);




$queryd = "SELECT * FROM diap where pmrn= '$pmrn' and  eid='$eid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];




$queryhw = "SELECT * FROM vitalshw where pmrn='$pmrn' and eid='$eid' order by id DESC limit 1"; 
$resulthw = mysqli_query($con, $queryhw) or die(mysqli_error());
$rowhw = mysqli_fetch_array($resulthw);


$query2 = "SELECT * from frisk where pmrn='$pmrn' and eid='$eid'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row7 = mysqli_fetch_assoc($result2);
$score=$row7['fscore'];




$baby="Select * from mo_baby where pmrn='$pmrn' or medi='$pmrn'";
$baby_result = mysqli_query($con, $baby) or die ( mysqli_error());
$data_baby = mysqli_fetch_assoc($baby_result);
$m_pmrn=$data_baby['pmrn'];
$b_pmrn=$data_baby['medi'];
$b_eid=$data_baby['beid'];
$m_eid=$data_baby['eid'];
?>

<?php
if(isset($_POST['Submit']))
{
$update="update iinves set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid'and status='Rupdated'";
mysqli_query($con,$update) or die(mysql_error());
$url = "idocinves?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}


?>

<?php
if(isset($_POST['Submit1']))
{
$update="update iinfusion set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and status='Rupdated'";
mysqli_query($con,$update) or die(mysql_error());
$url = "idocinfusion?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit2']))
{
$update="update istat set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and status='Rupdated'";
mysqli_query($con,$update) or die(mysql_error());
$url = "idocstat?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit3']))
{
$update="update ehmedi set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated'";
mysqli_query($con,$update) or die(mysql_error());
$url = "edochmedi?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit4']))
{
$update="update iidiet set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "idocdiet?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit5']))
{
$update="update istret set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "idocstret?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit6']))
{
//$update="update imedi3 set status1='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status1`='implemented';";
//mysqli_query($con,$update) or die(mysql_error());
$url = "idocmeditestdoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit7']))
{
$update="update gcs set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "edocgcs?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit8']))
{
$update="update iblood set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "idocblood?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit9']))
{
$url = "idocdischarge?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit200']))
{
$url = "inassessmentndoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit10']))
{
$update="update gcs1 set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "edocvitals?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit11']))
{
$update="update ivisit set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "idocvisit?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit12']))
{
$url = "idocnote_20012026?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit121']))
{
$url = "imoidocnote?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit13']))
{
$update="update innote set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "idocnnote?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['up_pic']))
{
	
$url = "cam_test/test_cam?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit14']))
{
$url = "edocadm?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['t_plan']))
{
$url = "treat_plan?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['consent']))
{
$url = "all_consent_form_ns?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['nform']))
{
$url = "nursing_form?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit213']))
{
$url = "inassessmentdoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit214']))
{
$url = "idocinprocedure?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit50']))
{
$url = "ipallmng?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit52']))
{
$url = "idocnotedd11?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit98']))
{
$url = "idprocedure?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['diap']))
{
$url = "diap?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>



<?php
if(isset($_POST['tplan']))
{
$url = "testpdfmname?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['pac']))
{
$url = "preanaesprintdoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['cmor']))
{
$url = "comorimo?pmrn=$pmrn&dname=$full";
header("Location: $url");
}
?>

<?php
if(isset($_POST['allergy']))
{
$url = "allergyimo?pmrn=$pmrn&dname=$full";
header("Location: $url");
}
?>
<?php
if(isset($_POST['adverse']))
{
$url = "cam_test/adverse_reaction?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['ot_book']))
{
$url = "ot1nurse9_new_doc.php?pmrn=$pmrn";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit99']))
{
	$update="update inprocedure set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Data Updated';";
mysqli_query($con,$update) or die(mysql_error());

$url = "idnprocedure?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit100']))
{
$url = "noteviewdoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit1000']))
{
$url = "bbupdate?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit1001']))
{
$url = "idocinvesstat?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit5011']))
{
$url = "influiddoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit502']))
{
$url = "indmdoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit101']))
{
$url = "ipall_new?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit102']))
{
$url = "iequipment?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit103']))
{
$url = "idocrefferal?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit104']))
{
	
//$update="update emergency set disstatus='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `disstatus`='Discharge Bill Confirmed';";
//mysqli_query($con,$update) or die(mysql_error());

$url = "idoccondis?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit301']))
{
$url = "inassessmentdocdietdoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit501']))
{
$url = "noteview2?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>



<?php
if(isset($_POST['Submit302']))
{
$url = "idproceduredietdoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit303']))
{
$url = "idocnotephysiodoc?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['cath_pro']))
{
$url = "cath_note_view?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');


?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Inpatient Panel</title>
  
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
  width: 100%;
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
}


input[type="text1"] {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 20px;
  font-weight:bold;
  font-color: Blue;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: yellow;
  color: Black;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
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
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

button {
  padding: 19px 9px 18px 0px;
  color: #FFF;
    font-size: 12px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 90%;
  border: 1px solid #8265B0;
  /*#3ac162*/
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
    max-width: 1200px;
  }

}

      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Add Inpatient Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add ICU Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Add Emergency Visit ?");
}

</script>
</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='iview'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
		 
            
         </li>
      </ul>
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<h2 align="right" style="color:red;">	

<?php if
($tt=='192.168.100.252:8081')
	{ 
	echo '<form target="_blank" action="https://192.168.100.202:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="PatientID" value="'.$pmrn.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}


else if
($tt!='192.168.100.252:8081')
	{ 
	echo'<form target="_blank" action="https://182.160.124.36:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="PatientID" value="'.$pmrn.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}
?>


</h2>



 
<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">DETAILS INPATIENT RECORD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php if($data["fav"]>0 and $data["adoc"]==$full){?>  
    
    <a onclick="return confirm_click_can();" href="fav_ipd_can_2?id=<?php echo $data['id']; ?>&pmrn=<?php echo $data['pmrn'];?>&eid=<?php echo $data['eid'];?>&dname=<?php echo $data['adoc'];?>"><img src="fav_icon.png" title="Favotire Case" width="50" height="40" /></a></td>
  <?php } 

else if($data["fav"]=='0' and $data["adoc"]==$full){?>  
  
  <a onclick="return confirm_click();" href="fav_ipd_2?id=<?php echo $data['id']; ?>&pmrn=<?php echo $data['pmrn'];?>&eid=<?php echo $data['eid'];?>&dname=<?php echo $data['adoc'];?>"><img src="add_fav.png" title="Add To Favotire Case List" width="50" height="40" /></a></td>
  <?php } ?>

</h1>


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
		<tr>


<td align="left" colspan="8" style="font-size:22px;color:red;background:lightgreen">

<b>Fall Risk Score:<?php if($score==''){echo' Not Done';} else{ echo $score;} ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>


<td align="left" colspan="7" style="font-size:22px;color:red;background:lightgreen">





<b>Hegiht:<?php echo $rowhw['score1'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight:<?php echo $rowhw['score2'] ?><b></td>

<td align="right" colspan="5">





<a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>ALL REPORTS<b></a>&nbsp;&nbsp;<a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>"><b>ALL RECORDS<b></a>

&nbsp;&nbsp;<a style="color:green;font-size:18px;font-weight:bold" target='_blank' href="g_chart_temp_test?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid;?>"><b>Combined Graph<b></a>

</td>
</tr>
		

		
<tr><td colspan="8" style="font-size:14px;color:green;background:lightgreen">
				
				<table class="table table-bordered" id="dynamic_field">
				
 <tr>

      
	  Patient Details:
	  <tr><td align="Left" style="font-size:20px;color:green;">Doctors's Name :<b><?php echo $data["adoc"]; ?></b></td>  </tr>
	  <tr><td align="Left"style="font-size:22px;color:red;"><b>Patient's Name :<?php echo $data["pname"]; ?></b></td>  </tr>
	  <tr><td align="Left"style="font-size:22px;color:red;"><b>Patient's MRN :<?php echo $data["pmrn"]; ?></b>
	  
	  	   <?php
	  if($m_pmrn==$pmrn)
	  {	  

$baby1="Select * from mo_baby where pmrn='$pmrn'";
$baby_result1 = mysqli_query($con, $baby1) or die ( mysqli_error());

  
while($data_baby1 = mysqli_fetch_assoc($baby_result1))


{ ?>
<?php $n=$data_baby1['medi'];
$n1=$data_baby1['beid'];
	
 echo'
		  <a target="_blank" href="ipallmng?pmrn='.$n.'&eid='.$n1.'"><strong><img src="baby1.png" title="Baby Details Of MRN-'.$n.'" width="50" height="50" /></strong></a>

   </a>   
		  
		  
	  ';}	
	
	

	    
		  
		

	  
 }
	  else if($b_pmrn==$pmrn){
		  
		  echo '<a target="_blank" href="ipallmng?pmrn='.$m_pmrn.'&eid='.$m_eid.'"><strong><img src="mother1.png" title="Mother Details" width="50" height="50" /></strong></a>

   </a>   ';
	  }
	  ?>
	  
	  
	  
	  </td>  </tr>
	  <tr><td align="Left"style="font-size:20px;color:green;">Patient's Age :<b><?php echo $data["age"]; ?></b></td>  </tr>
	  <tr><td align="Left"style="font-size:20px;color:green;">Patient's Gender :<b><?php echo $data["gender"]; ?></b></td>  </tr>
	  <tr><td align="Left"style="font-size:20px;color:green;">Patient's Phone :<b><?php echo $data["pphone"]; ?></b></td>  </tr>
	  <tr><td align="Left"style="font-size:20px;color:green;">Admission Date:<b><?php echo $data["adate"]; ?></b></td>  </tr>
	  <tr><td align="Left"style="font-size:20px;color:green;">Ward / Bed :<b><?php echo $data['room'].' / '.$data['room1']; ?></b></td>  </tr>
	  <tr><td align="Left"style="font-size:20px;color:green;">Working Diagnosis :<b><?php echo $inves; ?></b></td>  </tr>
	  <tr><td align="Left"style="font-size:20px;color:green;">
	  
	  Comorbidities:
<b>
<?php
$sel_query="Select * from allcomor where pmrn= '$pmrn' and status!='Cancel';";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>
<b><?php echo $row["medi"]; ?></b>,
<?php } 

if($row1 = mysqli_num_rows($result)==0)
	
	{
		echo"NONE";
		
	}



?></b>

<tr><td align="Left"style="font-size:20px;color:green;">
	  
	  Allergies:

<b><?php
$sel_query="Select * from allergy where pmrn= '$pmrn' and status!='Cancel';";

$result = mysqli_query($con,$sel_query);




while($row = mysqli_fetch_assoc($result)) 
{ ?>
<b><?php echo $row["medi"]; ?></b>,
<?php } 

if($row1 = mysqli_num_rows($result)==0)
	
	{
		echo"NONE";
		
	}



?></b>

	  </td>  </tr>
      
      
				
</table>		
				
				
			</td>
				
				<td colspan="7" style="font-size:14px;color:black;background:lightgreen;">
				<a target="_blank" href="imoidocinves.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Investigation:</a> 
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type in('LAB','Lab','lab') order by `id` DESC limit 8;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      
	  <td align="center"><?php echo $row["resulttime"]; ?></td>  
	  <td align="center"><a target="_blank" href="compareinvesimo.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&infu=<?php echo $row['infusion'];?>"><?php echo $row["infusion"]; ?></a></td>  
	  
	  
      
      <td align="center"><?php echo $row["result1"]; ?></td>  
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
				
</table>

				
				
				</td>
				
				<td colspan="5" style="font-size:14px;color:black;background:lightgreen;"> <a target="_blank" href="imoedocvitals.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">BP</a> <a target="_blank" href="g_chart_bp.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>"><span style="font-size:14px;color:red;background:lightgreen;"><b>(Graph)</b></span></a>
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from vitalsbp where pmrn= '$pmrn' and eid='$eid' order by `id` DESC limit 4;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo date('d/m/Y', strtotime($row["date2"])); ?></td>
	  <td align="center"><?php echo $row["score1"].'/'.$row["score2"]; ?></td>  
      
      <td align="center"><?php echo $row["time"]; ?></td>  
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
				
</table>

<a target="_blank" href="imoedocvitals.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Pulse</a> <a target="_blank" href="g_chart_pulse.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>"><span style="font-size:14px;color:red;background:lightgreen;"><b>(Graph)</b></span></a>
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from vitalspulse where pmrn= '$pmrn' and eid='$eid' order by `id` DESC limit 4;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo date('d/m/Y', strtotime($row["date2"])); ?></td>
	  <td align="center"><?php echo $row["score1"]; ?></td>  
      
      <td align="center"><?php echo $row["time"]; ?></td>  
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
				
</table>


<a target="_blank" href="imoedocvitals.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Temperature:</a><a target="_blank" href="g_chart_temp.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>"><span style="font-size:14px;color:red;background:lightgreen;"><b>(Graph)</b></span></a>
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from vitalstemp where pmrn= '$pmrn' and eid='$eid' order by `id` DESC limit 4";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo date('d/m/Y', strtotime($row["date2"])); ?></td>
	  <td align="center"><?php echo $row["score1"]; ?></td>  
      
      <td align="center"><?php echo $row["time"]; ?></td>  
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
				
</table>



<a target="_blank" href="indmdoc.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Saturation Chart:</a><a target="_blank" href="saturation_chart.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>"><span style="font-size:14px;color:red;background:lightgreen;"><b>(Graph)</b></span></a>
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from vitalsspo2 where pmrn= '$pmrn' and eid='$eid' order by `id` DESC limit 4";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      
	  <td align="center"><?php echo date('d/m/Y', strtotime($row["date2"])); ?></td>  
      
      <td align="center"><?php echo $row["score1"]; ?></td>  
	  <td align="center"><?php echo $row["time"]; ?></td>
	  

	  
      </tr>
    <?php $count++; } ?>
				
</table>


<a target="_blank" href="influiddoc.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">RR Chart:</a><a target="_blank" href="rr_chart.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>"><span style="font-size:14px;color:red;background:lightgreen;"><b>(Graph)</b></span></a>
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from vitalsrr where pmrn= '$pmrn' and eid='$eid' order by `id` DESC limit 4";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      
	  <td align="center"><?php echo date('d/m/Y', strtotime($row["date2"])); ?></td>  
      
      <td align="center"><?php echo $row["score1"]; ?></td>  
	  <td align="center"><?php echo $row["time"]; ?></td>
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
				
</table>


<a target="_blank" href="influiddoc.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Pain Score Chart:</a><a target="_blank" href="pain_score_chart.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>"><span style="font-size:14px;color:red;background:lightgreen;"><b>(Graph)</b></span></a>
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from vitalspscore where pmrn= '$pmrn' and eid='$eid' order by `id` DESC limit 4";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      
	  <td align="center"><?php echo date('d/m/Y',strtotime($row["date1"])); ?></td>  
      
      <td align="center"><?php echo $row["score1"]; ?></td>  
	  <td align="center"><?php echo $row["time"]; ?></td>
	  

	  
      </tr>
    <?php $count++; } ?>
				
</table>
<a target="_blank" href="indmdoc.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Diabetic Chart:</a><a target="_blank" href="g_chart_dia.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>"><span style="font-size:14px;color:red;background:lightgreen;"><b>(Graph)</b></span></a>
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from indm where pmrn= '$pmrn' and eid='$eid' order by `id` DESC limit 4";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      
	  <td align="center"><?php echo $row["rr1"]; ?></td>  
      
      <td align="center"><?php echo $row["rr2"]; ?></td>  
	  <td align="center"><?php echo $row["rr3"]; ?></td>
	  <td align="center"><?php echo $row["rr4"]; ?></td>
	  <td align="center"><?php echo $row["rr5"]; ?></td>
  	  
 
	  
      </tr>
    <?php $count++; } ?>
				
</table>		
<a target="_blank" href="influiddoc.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Fluid Chart:</a><a target="_blank" href="g_chart_fluid.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>"><span style="font-size:14px;color:red;background:lightgreen;"><b>(Graph)</b></span></a>
				<table class="table table-bordered" id="dynamic_field">
				<?php
	


$count=1;
$sel_query="Select * from influid where pmrn= '$pmrn' and eid='$eid' group by `date1` DESC limit 4";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      
	  <td align="center"style="font-size:12px;"><?php echo date('d/m/Y',strtotime($row["date1"])); ?></td>  
      
      <td align="center"style="font-size:12px;"><?php echo $row["time"]; ?></td>  

	  
  	  <?php
	  $date5=$row['date1'];
	  $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

$query298 = "SELECT type, SUM(qty) FROM influid where date1='$date5' and pmrn='$pmrn' and eid='$eid'and type='intake'GROUP BY type "; 
	 
$result298 = mysqli_query($dbhandle,$query298) or die(mysqli_error());

// Print out result
$row298 = mysqli_fetch_array($result298);
	//echo $row298['SUM(qty)'];

$test=$row298['SUM(qty)'];

	
$query198 = "SELECT type1, SUM(qty1) FROM influid where date1='$date5' and pmrn='$pmrn'and eid='$eid'and type1='Output 'GROUP BY type1 limit 4"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysqli_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
	//echo $row198['SUM(qty)'];

	
$test1=	$row198['SUM(qty1)'];

$test3=$test-$test1;

	  ?>

	  <td align="center" style="font-size:12px;"><?php echo 'In-'.' '.$test; ?></td>	  
	  <td align="center" style="font-size:12px;"><?php echo 'Out-'.' '.$test1; ?></td>	  
	  <td align="center"style="font-size:12px;"><?php echo 'Diff-'.' '.$test3; ?></td>	  
	  
	  
      </tr>
    <?php $count++; } ?>
				
</table>				



				
				</td>
				
				</tr>
				
				
				<tr><td colspan="20"align="Right"bgcolor="lightgreen"><a target='_blank' href="docadmimo?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><b>View Consultant Plan Upon Admission<b></a></td></tr>

<tr>
		<td colspan="5"align="center"><button type="submit" name="Submit213">Doctors's Assessement</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row24['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="5"align="center"><button type="submit" name="Submit13">Nurse's Note</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row24['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit12">Procedure Note</button></td>
		<td colspan="3" align="center"><button type="submit" name="Submit121">Doctor's Daily Note</button><font size="4.5" color="#FF0000"><br><b>(<?php echo  $row22['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit99">Nurse Procedure Note</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row25['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="2" align="center"><button type="submit" name="Submit98">Doctor Procedure Note</button></td>
		
</tr>		
		
	  
</tr>

<tr><td colspan="5" align="center"><button type="submit" name="Submit200">Nurse's Assessment</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row14['COUNT(pmrn)']; ?>)<b></td>
	<td colspan="5" align="center"><button type="submit" name="Submit1_ppp">Infusion</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row14['COUNT(pmrn)']; ?>)<b></td>
	
	<td colspan="3" align="center"><button type="submit" name="Submit6">Medication</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row19['COUNT(pmrn)']; ?>)<b></td>
	<td colspan="3" align="center"><button type="submit" name="Submit5">Special Treatment</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row18['COUNT(pmrn)']; ?>)<b></td>
	<td colspan="2"align="center"><button type="submit" name="Submit4">Diet</button><font size="4.5" color="#FF0000"><br><b>(<?php echo  $row17['COUNT(pmrn)']; ?>)<b></td>
	<td colspan="2" align="center"><button type="submit" name="Submit10">Vitals</button><font size="4.5" color="#FF0000"><br><b>(<?php echo  $row22['COUNT(pmrn)']; ?>)<b></td>	
		
		
	  
</tr>
<tr>
		<td colspan="5" align="center"><button type="submit" name="Submit">Request Investigation</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row3['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="5" align="center"><button type="submit" name="Submit8">Blood Request</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row21['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit9">Discharge Request</button></td>
		<td colspan="3" align="center"><button type="submit" name="Submit104">Discharge Bill Confirmed</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row26['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit11">Doctor/Allied Charges</button><font size="4.5" color="#FF0000"><br><b>(<?php echo  $row23['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="2" align="center"><button type="submit" name="Submit101">Hospital Charges</button></td>
		


</tr>

<tr>

<td colspan="5" align="center"><button type="submit" name="Submit5011">Fluid Chart</td>
<td colspan="5" align="center"><button type="submit" name="Submit502">Diabetic Chart</button></td>
<td colspan="3" align="center"><button type="submit" name="Submit1000">Blood Order</button></td>
<td colspan="3" align="center"><button type="submit" name="Submit1001">Record Investigation Results</button></td>
<td colspan="3" align="center"><button type="submit" name="Submit301">Dietician's  Assessement</button></td>
<td colspan="2" align="center"><button type="submit" name="Submit302">Dietician's Note</button></td>
</tr>


<tr>



<td colspan="5" align="center"><button type="submit" name="Submit100">Surgery Note</button></td>
<td colspan="5" align="center"><button type="submit" name="Submit103">Referral</button></td>
<td colspan="3" align="center"><button type="submit" name="Submit303">Physiotherapist's Note</button></td>
<td colspan="3" align="center"><button type="submit" name="Submit52">Dorridro Fund Request</button></td>
<td colspan="3" align="center"><button type="submit" name="Submit501">OPD Procedure Note</button></td>
<td colspan="2" align="center"><button type="submit" name="Submit50">Summary</button></td>
</tr>


<tr>

<td colspan="5" align="center"><button type="submit" name="diap">Diagnosis</button></td>
<td colspan="5" align="center"><button type="submit" name="tplan">Today's Treatment Plan</button></td>
<td colspan="3" align="center"><button type="submit" name="pac">PAC RECORDS</button></td>
<td colspan="3" align="center"><button type="submit" name="cmor">Comorbidities</button></td>
<td colspan="3" align="center"><button type="submit" name="allergy">Allergies</button></td>
<td colspan="2" align="center"><button type="submit" name="adverse">Report Adverse Reaction</button></td>

</tr>
 
 <tr>
 <td colspan="5" align="center" style="color:red;font-size:20px;font-weight:bold;"><button type="submit" name="ot_book">OT Booking</button></td>
 <td colspan="5" align="center"><button type="submit" name="up_pic">Upload Image</button></td>
 <td colspan="3" align="center"><button type="submit" name="t_plan">Treatment Plan</button></td>

 <td colspan="3" align="center"><button type="submit" name="consent">All Consent Form</button></td>
 <td colspan="3" align="center"><button type="submit" name="nform">All Nursing Form</button></td>
 <td colspan="2" align="center"><button type="submit" name="cath_pro"><font size="4.5" color="green"><b>Cathlab</b></button></td> 
 
 </tr>
</table>
</form>
</body>

</html>
