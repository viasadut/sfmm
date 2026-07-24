<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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
//$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from ot where id='$id' ");
$data = mysqli_fetch_assoc($query4);
$dname=$data['dname'];
$pro=$data['proce'];
$pro1=$data['Otherins'];
$pmrn=$data['pmrn'];


?>

<?php
if(isset($_POST['Submit']))
{


$url = "otchargenurse2_new11?pmrn=$pmrn&id=$id";
header("Location: $url");
}


?>

<?php
if(isset($_POST['consent']))
{


$url = "all_consent_form?pmrn=$pmrn&id=$id";
header("Location: $url");
}


?>

<?php
if(isset($_POST['consent_upload']))
{


$url = "consent_upload_ot?pmrn=$pmrn&id=$id";
header("Location: $url");
}


?>

<?php
if(isset($_POST['Submit991']))
{


$url = "histo1ot1nurse?pmrn=$pmrn&id=$id";
header("Location: $url");
}


?>


<?php
if(isset($_POST['ot_bill_all']))
{


$url = "ot_bill_all?pmrn=$pmrn&id=$id";
header("Location: $url");
}


?>

<?php
if(isset($_POST['Submit1011']))
{


$url = "otconsent?pmrn=$pmrn&id=$id";
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
$url = "otchargenurse1?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit6_con']))
{
$url = "otchargenurse1_con?pmrn=$pmrn&id=$id";
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
$url = "inassessmentnurseview1ot?pmrn=$pmrn&id=$id";
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
$url = "otdocnotenurse?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit690']))
{
$url = "otchargenurse2_new11?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['uphoto']))
{
$url = "otphotonew?pmrn=$pmrn&eid=$id";
header("Location: $url");


}
?>

<?php
if(isset($_POST['anaes_doc']))
{
$url = "otanaesedit?pmrn=$pmrn&id=$id";
header("Location: $url");


}
?>



<?php
if(isset($_POST['Submit66']))
{
$url = "otchargenurse2_new11?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit666']))
{
$url = "otidocstretnurse?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit1111']))
{
$url = "otcsnurse?pmrn=$pmrn&id=$id";
header("Location: $url");


}
?>

<?php
if(isset($_POST['who']))
{
$url = "who1?pmrn=$pmrn&id=$id";
header("Location: $url");


}
?>


<?php
if(isset($_POST['Submit669']))
{
$url = "otanaesvitalsnurse?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['Submit9669']))
{
$url = "preanaesprintnurse?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>


<?php
if(isset($_POST['anote']))
{
$url = "otnurseanes?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['ocount']))
{
$url = "otcount?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['percare']))
{
$url = "postotncare?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['bpratice']))
{
$url = "bestpractice?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>

<?php
if(isset($_POST['charge']))
{
$url = "otuse_ot?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>


<?php
if(isset($_POST['Submit13']))
{


$url = "otnursenote?pmrn=$pmrn&id=$id";
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
	
	
$url = "newotnote?pmrn=$pmrn&eid=$id";
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
if(isset($_POST['Submit1001']))
{
$url = "docchargeendo?pmrn=$pmrn&eid=$eid";
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
		<tr><td align="right" colspan="20"><a target='_blank' href="ptothistory?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;<a target='_blank' href="opdradreportmngot?pmrn=<?php echo "$pmrn"; ?>"><b>Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolinkmngot?pmrn=<?php echo "$pmrn"; ?>"><b>Cardiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>Lab Report<b></a>&nbsp;&nbsp;<a target='_blank' href="surnotemngot?pmrn=<?php echo "$pmrn"; ?>"><b>Surgery Note<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportinmngot?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a></td></tr>
		
				<tr><td colspan="10"><label><strong>Endoscopist's Name :</strong></label></td>
				<td colspan="10"><label><strong>Anaethetist's Name :</strong></label></td>
				</tr>
				<tr>	  
				<td colspan="10"><input type="text" name="dname" value="<?php echo $data["dname"]; ?>"disabled></td>
				<td colspan="10"><input type="text" name="dname" value="<?php echo $data["nanes"]; ?>"disabled></td>
				</tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="2"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="6"><label><strong>Procedure Name:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="2"><input type="text" name="pmrn" value="<?php echo $data["pmrn"]; ?>"disabled> </td>
				<td colspan="2"><input type="text" name="eid" value="<?php echo $data["eid"]; ?>"disabled> </td>
				<td colspan="6"><input type="text" name="eid" value="<?php echo $data["proce"].' '.$data["Otherins"]; ?>"disabled> </td>
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
		<td colspan="4" align="center"><button type="submit" name="Submit200">Nurse's Assessment</button></td>		
		<td colspan="4"align="center"><button type="submit" name="Submit13">Nurse's Note</button></td>
		<td colspan="4" align="center"><button type="submit" name="Submit12">Doctor's Note</button></td>
		<td colspan="4" align="center"><button type="submit" name="Submit100">Surgery Note</button></td>
		<td colspan="4" align="center"><button type="submit" name="Submit6">Hospital Charges</button></td>
</tr>		
		
	  
</tr>

<tr>

<td colspan="4" align="center"><button type="submit" name="Submit">Medicine Used</button></td>

<td colspan="4" align="center"><button type="submit" name="Submit1011">Print Consent Form</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit991_kkk">Histo Request</butto</td>
<td colspan="4" align="center"><button type="submit" name="Submit1001">Doctor Charges</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit1111">Investigation Request</button></td>
		


</tr>




<tr>

<td colspan="4" align="center"><button type="submit_mm" name="Submit690">Medication Ordered</button></td>
<td colspan="4" align="center"><button type="submit_mm" name="Submit66">Infusion Ordered</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit666">Special Ordered</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit669">Vitals</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit9669">PAC</button></td>



</tr>

<tr>

<td colspan="4" align="center"><button type="submit" name="who">WHO Checklist</button></td>
<td colspan="4" align="center"><button type="submit" name="anote">Anaes Note</button></td>
<td colspan="4" align="center"><button type="submit" name="ocount">OT Count Log</button></td>
<td colspan="4" align="center"><button type="submit" name="percare">Per-Operative Nursing Care</button></td>
<td colspan="4" align="center"><button type="submit" name="bpratice">Best Practice</button></td>


		


</tr>


<tr>

<td colspan="4" align="center"><button type="submit" name="charge">Print All Charges</button></td>


<td colspan="4" align="center"><button type="submit" name="uphoto">Upload Photo</button></td>
<td colspan="4" align="center"><button type="submit" name="anaes_doc">Anaethesia Documentaion</button></td>

<td colspan="4" align="center"><button type="submit" name="ot_bill_all">All Charges (New Format)</button></td>
<td colspan="4" align="center"><button type="submit" name="Submit6_con">Hospital Charges(Only For Consignment Items)</button></td>
		


</tr>
 
 
 <tr>

<td colspan="4" align="center"><button type="submit" name="consent">All Consent Form </button></td>
<td colspan="4" align="center"><button type="submit" name="consent_upload">Upload Consent Form </button></td>




</tr>
</table>
</form>
</body>

</html>
