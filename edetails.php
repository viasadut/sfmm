<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="emergency"){
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

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and discharge=''");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query59);



$query3 = "SELECT COUNT(pmrn) FROM einves where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());
$row3 = mysqli_fetch_array($result3);
//$num1=$row3['COUNT(pmrn)'];

$query14 = "SELECT COUNT(pmrn) FROM einfusion where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result14 = mysqli_query($con, $query14) or die(mysqli_error());
$row14 = mysqli_fetch_array($result14);

$query15 = "SELECT COUNT(pmrn) FROM estat where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result15 = mysqli_query($con, $query15) or die(mysqli_error());
$row15 = mysqli_fetch_array($result15);

$query16 = "SELECT COUNT(pmrn) FROM ehmedi where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result16 = mysqli_query($con, $query16) or die(mysqli_error());
$row16 = mysqli_fetch_array($result16);

$query17 = "SELECT COUNT(pmrn) FROM eidiet where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result17 = mysqli_query($con, $query17) or die(mysqli_error());
$row17 = mysqli_fetch_array($result17);

$query18 = "SELECT COUNT(pmrn) FROM estret where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result18 = mysqli_query($con, $query18) or die(mysqli_error());
$row18 = mysqli_fetch_array($result18);

$query19 = "SELECT COUNT(pmrn) FROM emedi2 where pmrn='$pmrn' and eid='$eid' and status1='Rupdated' "; 
$result19 = mysqli_query($con, $query19) or die(mysqli_error());
$row19 = mysqli_fetch_array($result19);

$query20 = "SELECT COUNT(pmrn) FROM gcs where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result20 = mysqli_query($con, $query20) or die(mysqli_error());
$row20 = mysqli_fetch_array($result20);

$query21 = "SELECT COUNT(pmrn) FROM eblood where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
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

 $query25 = "SELECT COUNT(pmrn) FROM edprocedure where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result25 = mysqli_query($con, $query25) or die(mysqli_error());
$row25 = mysqli_fetch_array($result25);

$query26 = "SELECT COUNT(pmrn) FROM ecnote where pmrn='$pmrn' and eid='$eid' and status='Data Updated' "; 
$result26 = mysqli_query($con, $query26) or die(mysqli_error());
$row26 = mysqli_fetch_array($result26);
?>

<?php
if(isset($_POST['Submit13']))
{
$url = "ennote1?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit12']))
{
	$update="update ecnote set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Data Updated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "ecnote?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['nurse_form']))
{
	
$url = "nursing_form_ae?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit1']))
{
$url = "einpatient_new?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit']))
{
	
	
$url = "einves1?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit2']))
{
$url = "estat_new?pmrn=$pmrn&eid=$eid";
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
if(isset($_POST['Submit3']))
{
$url = "ehmedi2?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit4']))
{
$url = "ediet2?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit5']))
{
$url = "estret2?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit6']))
{

$update="update emedi2 set status1='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status1`='Rupdated';";
mysqli_query($con,$update) or die(mysql_error());
$url = "emedi1lo?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit7']))
{

  $query2 = "SELECT COUNT(id) from gcs where pmrn='$pmrn' and eid='$eid'"; 
  $result2 = mysqli_query($con, $query2) or die ( mysqli_error());
  $gcs_data = mysqli_fetch_assoc($result2);   
  if($gcs_data['COUNT(id)']==0){
$url = "gcs?pmrn=$pmrn&eid=$eid";
header("Location: $url");
  }

  else if($gcs_data['COUNT(id)']>0){
    $url = "gcs_edit?pmrn=$pmrn&eid=$eid";
    header("Location: $url");

  }
}
?>
<?php
if(isset($_POST['Submit8']))
{
$url = "eblood1?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>
<?php
if(isset($_POST['Submit10']))
{
//$update="update gcs1 set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
//mysqli_query($con,$update) or die(mysql_error());
$url = "endocvitals?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit11']))
{
//$update="update evisit set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Rupdated';";
//mysqli_query($con,$update) or die(mysql_error());
$url = "endocvisit?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit98']))
{
	
	$update="update edprocedure set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Data Updated';";
mysqli_query($con,$update) or die(mysql_error());

$url = "ndprocedure?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit9']))
{
	
	
$url = "nurse_discharge_print.php?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit99']))
{
	$update="update enprocedure set status='SEEN' where `pmrn`='$pmrn' and `eid`='$eid' and `status`='Data Updated';";
mysqli_query($con,$update) or die(mysql_error());

$url = "nprocedure?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit50']))
{
$url = "enpall?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>



<?php
if(isset($_POST['Submit100']))
{
$url = "esurgery?pmrn=$pmrn&eid=$eid";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit101']))
{
$url = "endisposable?pmrn=$pmrn&eid=$eid";
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
$url = "erefferal?pmrn=$pmrn&eid=$eid";
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
<h1 align="center"style="background-color:lightgreen;">DETAILS INPATIENT RECORD </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname" value="<?php echo $data["dname"]; ?>"disabled></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="7"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="7"><input type="text" name="pmrn" value="<?php echo $data["pmrn"]; ?>"disabled> </td>
				<td colspan="3"><input type="text" name="eid" value="<?php echo $data59["eid"]; ?>"disabled> </td>
					 <td colspan="10"><input type="text" name="pname" value="<?php echo $data["pname"]; ?>"disabled> </td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><input type="text" name="padd" value="<?php echo $data["padd"]; ?>"disabled></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="2"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" value="<?php echo $data["age"]; ?>"disabled> </td>  
             		<td colspan="5"> <input type="text" name="adm" value="<?php echo $data["adate"]; ?>"disabled> </td>					 	
					 <td colspan="2"><input type="text" name="psex" value="<?php echo $data["gender"]; ?>"disabled></td>
					 <td colspan="4"><input type="text" name="pphone" value="<?php echo $data["pphone"]; ?>"disabled></td>  

			    	 <td colspan="2"><input type="text" name="room" value="<?php echo $data["room"]; ?>"disabled></td>  
					 <td colspan="2"><input type="text" name="bed" value="<?php echo $data["room1"]; ?>"disabled></td>  
					 </tr>

						


<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3>Insert Patients Medical Details</h3></td></tr>
<tr>
		<td colspan="5" align="center"><button type="submit" name="Submit7">Triage Form</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row20['COUNT(pmrn)']; ?>)<b></td>
	<td colspan="5"align="center"><button type="submit" name="Submit13">Nurse's Note</button></td>
		<td colspan="3" align="center"><button type="submit" name="Submit12">Doctor's Note</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row26['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit101">Procedure & Hospital Charge(s)</button></td>
		
		<td colspan="2" align="center"><button type="submit" name="Submit10">Vitals</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row22['COUNT(pmrn)']; ?>)<b></td>
		
	  <td colspan="2"align="center"><button type="submit" name="Submit4">Diet</button><font size="4.5" color="#FF0000"><br><b>(<?php echo  $row17['COUNT(pmrn)']; ?>)<b></td>	
</tr>

<tr>

		
		<td colspan="5" align="center"><button type="submit" name="Submit2">MO Order</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row15['COUNT(pmrn)']; ?>)<b></td>
		
		<td colspan="5" align="center"><button type="submit" name="Submit5">Special Treatment</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row18['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit11">Doctor's Visit</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row23['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit100">Surgery Note</button></td>
	
		<td colspan="3" align="center"><button type="submit" name="Submit">Investigation Request</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row3['COUNT(pmrn)']; ?>)<b></td>
		<td colspan="3" align="center"><button type="submit" name="Submit8">Blood Request</button><font size="4.5" color="#FF0000"><b>(<?php echo  $row21['COUNT(pmrn)']; ?>)<b></td>
		
		
	  
</tr>
 <tr>
 		
		<td colspan="5" align="center"><button type="submit" name="Submit14">Admission Request</button></td>
		<td colspan="5" align="center"><button type="submit" name="Submit9">Discharge Request</button></td>
		<td colspan="3" align="center"><button type="submit" name="Submit101">Procedure & Hospital Charge(s)</button></td>
<td colspan="3" align="center"><button type="submit" name="Submit50">Summary</button></td>
<td colspan="3" align="center"><button type="submit" name="Submit103">Rfferal</button></td>
<td colspan="2" align="center"><button type="submit" name="adverse">Report Adverse Reaction</button></td>
</tr>

<tr>
<td colspan="5" align="center"><button type="submit" name="nurse_form">Print Nursing Form</button></td>
</tr>
</table>
</form>
</body>

</html>
