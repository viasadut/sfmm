<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill','mng')"; 
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

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);
$eeid=$data['eid'];

$query5 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query59);



$query3 = "SELECT COUNT(pmrn) FROM iinves where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());
$row3 = mysqli_fetch_array($result3);
//$num1=$row3['COUNT(pmrn)'];

$query14 = "SELECT COUNT(pmrn) FROM iinfusion where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result14 = mysqli_query($con, $query14) or die(mysqli_error());
$row14 = mysqli_fetch_array($result14);

$query15 = "SELECT COUNT(pmrn) FROM istat where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result15 = mysqli_query($con, $query15) or die(mysqli_error());
$row15 = mysqli_fetch_array($result15);

$query16 = "SELECT COUNT(pmrn) FROM ehmedi where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result16 = mysqli_query($con, $query16) or die(mysqli_error());
$row16 = mysqli_fetch_array($result16);

$query17 = "SELECT COUNT(pmrn) FROM iidiet where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result17 = mysqli_query($con, $query17) or die(mysqli_error());
$row17 = mysqli_fetch_array($result17);

$query18 = "SELECT COUNT(pmrn) FROM istret where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result18 = mysqli_query($con, $query18) or die(mysqli_error());
$row18 = mysqli_fetch_array($result18);

$query19 = "SELECT COUNT(pmrn) FROM imedi3 where pmrn='$pmrn' and eid='$eid' and status1='Rupdated' and status='Active' "; 
$result19 = mysqli_query($con, $query19) or die(mysqli_error());
$row19 = mysqli_fetch_array($result19);

$query20 = "SELECT COUNT(pmrn) FROM gcs where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result20 = mysqli_query($con, $query20) or die(mysqli_error());
$row20 = mysqli_fetch_array($result20);

$query21 = "SELECT COUNT(pmrn) FROM iblood where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result21 = mysqli_query($con, $query21) or die(mysqli_error());
$row21 = mysqli_fetch_array($result21);


$query22 = "SELECT COUNT(pmrn) FROM gcs1 where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$query23 = "SELECT COUNT(pmrn) FROM evisit where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);

$query24 = "SELECT COUNT(pmrn) FROM ennote where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result24 = mysqli_query($con, $query24) or die(mysqli_error());
$row24 = mysqli_fetch_array($result24);

 $query25 = "SELECT COUNT(pmrn) FROM idprocedure where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result25 = mysqli_query($con, $query25) or die(mysqli_error());
$row25 = mysqli_fetch_array($result25);

$query26 = "SELECT COUNT(pmrn) FROM icnote where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
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


$query2 = "SELECT * from frisk where pmrn='$pmrn' and eid='$eid' order by id desc"; 
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
if(isset($_POST['Submit13']))
{
$url = "innote1?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit12']))
{
	$update="update icnote set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Data Updated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "icnote?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit1']))
{
$url = "iinpatient_new?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit']))
{
	
	
$url = "iinves1?pmrn=$pmrn&eid=$eid";
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
if(isset($_POST['sum_charge']))
{
$url = "ipall_new_nurse?pmrn=$pmrn&eid=$eid";
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
if(isset($_POST['nurse_form']))
{
	
$url = "nursing_form?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['all_consent_form']))
{
	
$url = "all_consent_form_ns?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit2']))
{
$url = "istat?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit3']))
{
$url = "ehmedi2?pmrn=$pmrn&eid=$eid";
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
if(isset($_POST['Submit501']))
{
$url = "influid?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>




<?php
if(isset($_POST['Submit501c']))
{
$url = "careshope2?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit502']))
{
$url = "indm?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit503']))
{
$url = "indocassess6?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>



<?php
if(isset($_POST['Submit4']))
{
$url = "idiet2?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit4r']))
{
$url = "nreturnmedi?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit5']))
{
$url = "istret2?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit6']))
{

//$update="update imedi3 set status1='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status1`='Rupdated';";
//mysqli_query($con,$update) or die(mysql_error());
$url = "imedi1_new_pppp?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit7']))
{
$url = "gcs?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit213']))
{
$url = "inassessmentnurseview1?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit214']))
{
$url = "fallrisk?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit8']))
{
$url = "iblood1?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit10']))
{
//$update="update gcs1 set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
//mysqli_query($con,$update) or die(mysql_error());
$url = "indocvitals?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit11']))
{
//$update="update evisit set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
//mysqli_query($con,$update) or die(mysql_error());
$url = "imoidocnotedoc_bill?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit9']))
{
//$update="update evisit set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
//mysqli_query($con,$update) or die(mysql_error());
$url = "nurseidoccondis_ppp?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit98']))
{
	
	$update="update idprocedure set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Data Updated';";
mysqli_query($con,$update) or die(mysql_error());

$url = "indprocedure?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit99']))
{
	//$update="update enprocedure set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Data Updated';";
//mysqli_query($con,$update) or die(mysql_error());

$url = "inprocedure?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit50']))
{
$url = "npall?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>



<?php
if(isset($_POST['Submit100']))
{
$url = "esurgeryn?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit101']))
{
$url = "otchargenurse1nurse?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit102']))
{
$url = "enequipment?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit103']))
{
$url = "nrefferal?pmrn=$pmrn&eid=$eid";
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
    <title>Patient Dashboard</title>
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

</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnewnurse'><span>Home</span></a></li>
  
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<h2 align="right" style="color:red;">	

<?php if
($tt=='192.168.100.252:8081')
	{ 
	echo '<form target="_blank" action=http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="PatientID" value="'.$pmrn.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}


else if
($tt!='192.168.100.252:8081')
	{ 
	echo'<form target="_blank" action="http://182.160.124.36/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="PatientID" value="'.$pmrn.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}
?>



</h2>


 
<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">DETAILS INPATIENT RECORD</h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
<tr>


<td align="left" colspan="8" style="font-size:22px;color:red;background:lightgreen">

<b>Last Fall Risk Score:<?php if($score==''){echo' Not Done';} else{ echo $score;} ?>&nbsp;&nbsp;
<a target='_blank' href="fall_risk_print?pmrn=<?php echo "$pmrn";?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="20" height="20" /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>


<td align="left" colspan="7" style="font-size:22px;color:red;background:lightgreen">





<b>Hegiht:<?php echo $rowhw['score1'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight:<?php echo $rowhw['score2'] ?><b></td>

<td align="right" colspan="5">





<a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>ALL REPORTS<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>"><b>ALL RECORDS<b></a>

&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:green;font-size:18px;font-weight:bold" target='_blank' href="g_chart_temp_test?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid;?>"><b>Combined Graph<b></a>

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
		  <a target="_blank" href="idetails?pmrn='.$n.'&eid='.$n1.'"><strong><img src="baby1.png" title="Baby Details" width="50" height="50" /></strong></a>

   </a>   
		  
		  
	  ';}	
	
	

	    
		  
		

	  
 }
	  else if($b_pmrn==$pmrn){
		  
		  echo '<a target="_blank" href="idetails?pmrn='.$m_pmrn.'&eid='.$m_eid.'"><strong><img src="mother1.png" title="Mother Details" width="50" height="50" /></strong></a>

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

      <td align="center"><?php echo $row["date2"]; ?></td>
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

      <td align="center"><?php echo $row["date2"]; ?></td>
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

      <td align="center"><?php echo $row["date2"]; ?></td>
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

      
	  <td align="center"><?php echo $row["date2"]; ?></td>  
      
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

      
	  <td align="center"><?php echo $row["date2"]; ?></td>  
      
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

      
	  <td align="center"style="font-size:12px;"><?php echo $row["date1"]; ?></td>  
      
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

<tr>

<td colspan="5" align="center"><button type="submit" name="Submit1">Infusion</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row14['COUNT(pmrn)']; ?>)<b></td>
		
		
		<td colspan="5" align="center"><button type="submit" name="Submit6">Medication</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row19['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit5">Special Treatment</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row18['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit501c">Careshope Items</button></td>
		<td colspan="3" align="center"><button type="submit" name="Submit101">Hospital Charges</button></td>
		
	
		
		
		
	  
</tr>
 <tr>
 		
		
		
		<td colspan="3" align="center"><button type="submit" name="Submit11">Doctor's Visit</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row23['COUNT(pmrn)']; ?>)<b></td>
		
		

</tr>
</table>
</form>
</body>

</html>
