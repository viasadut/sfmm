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

$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$ID=$_REQUEST['ID'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from chemopapp where ID='$ID' ");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
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

$query19 = "SELECT COUNT(pmrn) FROM imedi2 where pmrn='$pmrn' and eid='$eid' and status1='implemented' "; 
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

?>

<?php
if(isset($_POST['Submit111']))
{
$url = "histo1?pmrn=$pmrn&eeid=$eid";
header("Location: $url");
}


?>

<?php
if(isset($_POST['Submit112']))
{
$url = "preanaesprintdoc?pmrn=$pmrn";
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
$url = "chemodocmedi1imo?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit69']))
{
$url = "postendomedi?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit6969']))
{
$url = "chemodocddfundimo?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit66']))
{
$url = "chemodocinfu1imo?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit666']))
{
$url = "chemodocsorder1imo?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submitvt']))
{
$url = "chemovitalsimo?pmrn=$pmrn&eid=$eid";
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
if(isset($_POST['Submitdoc']))
{
$url = "chemoinassessmentdoc1imo?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit200']))
{
$url = "chemoinassessmentdoc1imo?pmrn=$pmrn&eid=$eid";
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
$url = "chemodocnote1imo?pmrn=$pmrn&ID=$ID";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit13']))
{

$url = "chemonursenotedocimo?pmrn=$pmrn&eid=$eid";
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
$url = "ipall?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit52']))
{
$url = "idocnotedd?pmrn=$pmrn&eid=$eid";
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
	
	
$url = "endoreport2test1?ID=$ID&pmrn=$pmrn&eid=$eid";
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
if(isset($_POST['Submit501']))
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
$url = "chemodoccharge?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit1011']))
{
$url = "chemodocinvesimo?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit999']))
{
$url = "chemodocadmimo?pmrn=$pmrn&eid=$eid&dname=$full";
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
  <title>Emergency Panel</title>
  
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
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
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




 
<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">DETAILS PATIENT RECORD</h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>"><b>SURGERY NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolink?pmrn=<?php echo "$pmrn"; ?>"><b>CARDIOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="opdprocedurenote?pmrn=<?php echo "$pmrn"; ?>"><b>OPD PROCEDURE NOTE<b></a></td></tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname" value="<?php echo $data["dreffer"]; ?>"disabled></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="7"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="7"><input type="text" name="pmrn" value="<?php echo $data["pmrn"]; ?>"disabled> </td>
				<td colspan="3"><input type="text" name="eid" value="<?php echo $data["eid"]; ?>"disabled> </td>
					 <td colspan="10"><input type="text" name="pname" value="<?php echo $data["pname"]; ?>"disabled> </td>

					 
</tr>

						
						


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Admission Date:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Phone NO:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" value="<?php echo $data["page"]; ?>"disabled> </td>  
             		<td colspan="5"> <input type="text" name="adm" value="<?php echo $data["adate"]; ?>"disabled> </td>					 	
					 <td colspan="5"><input type="text" name="psex" value="<?php echo $data["psex"]; ?>"disabled></td>
					 <td colspan="5"><input type="text" name="pphone" value="<?php echo $data["pphone"]; ?>"disabled></td>  

			    	 
					 </tr>

						


<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3>Insert Patients Medical Details</h3></td></tr>

<tr>
		<td colspan="4" align="center"><button type="submit" name="Submitdoc">Doctor's Assessment</button></td>		
		<td colspan="4" align="center"><button type="submit" name="Submit200">Nurse's Assessment</button></td>		
		<td colspan="4"align="center"><button type="submit" name="Submit13">Nurse's Note</button></td>
		<td colspan="4" align="center"><button type="submit" name="Submit12">Doctor's Note</button></td>
		
		
</tr>		
		


<tr>

<td colspan="4" align="center"><button type="submit" name="Submit6">Medication</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit66">Infusion</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit666">Special Order</button></td>
<td colspan="4" align="center"><button type="submit" name="Submitvt">Vitals</button></td>

		


</tr>
		


<tr>


<td colspan="4" align="center"><button type="submit" name="Submit6969">Doridro Fund Request</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit999">Admission Request</button></td>

<td colspan="4" align="center"><button type="submit" name="Submit1011">Investigation Request</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit101">Doctor Charges</button></td>
		


</tr>



<tr>




</tr>


 
</table>
</form>
</body>

</html>
