<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];

?>
<?php
if(isset($_POST['Submit'])){
	

	//$odate = date('m/d/Y H:i:s');
	//$uname = $_REQUEST['uname'];
	$rfid_card = $_REQUEST['rfid_card'];
	$etime=date('m/d/Y H:i:s');

	
	$sel90="SELECT * FROM inpatient WHERE `rfid_card`='$rfid_card' and discharge='';";
	$result90 = mysqli_query($con,$sel90);
	
	

	$db = mysqli_connect('localhost','root','Godiloveu16');
	mysqli_select_db($db,'sfmmkpjnew');
	
	$query60_a = mysqli_query($db,"select * from inpatient where rfid_card='$rfid_card' and discharge=''");
	$data60_a = mysqli_fetch_assoc($query60_a);

	$pmrn=$data60_a['pmrn'];
	$eid=$data60_a['eid'];
	
	
	if($res90=mysqli_num_rows($result90)==0){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!! No Patient Found Under This RFID.. Pls Try Again With Correct RFID"); ';
		echo '</script>';
		//header("Refresh: .1;");
	}
	
	
	else {
	$url = "idetails_new?pmrn=$pmrn&eid=$eid";
header("Location: $url");
	}
	
	
}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<head>
  <meta charset="UTF-8">
  <title>RFID SEARCH PANEL</title>
  
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
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #FA8072		;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
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
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>




  <style type="text/css">

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
<script>
function goBack() {
    window.history.back();
}
</script>
</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ccamidoc'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
	   <li class='has-sub'><a href='app1doc'><span>Appointment Report</span></a>
            
         </li>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>
		<li class='has-sub'><a href='view3newrad'><span>Radiology Report</span></a>
            
         </li>
      </ul>
   </li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='active has-sub'><a href='docchangepass'><span>Pending Certificates Request</span></a>
   <ul>
   <li class='has-sub'><a href='deathconfirm'><span>Pending Death Certificate Approval Request</span></a></li>
   <li class='has-sub'><a href='birthconfirm'><span>Pending Birth Certificate Approval Request</span></a></li>
   </ul>
   
   <li class='active has-sub'><a href='#'><span>Generic Name Request</span></a>
      <ul>
	   <li class='has-sub'><a href='requestmedicine'><span>Request Generic Name</span></a>
            
         </li>
		 <li class='has-sub'><a href='pendingrequestdoc'><span>Pending Request List For Generic Name</span></a>
            
         </li>
         <li class='has-sub'><a href='pendingrequest1'><span>Pending List For Approval</span></a>
            
   </ul>
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<form action="" method="post">
<table>
<tr>

<td colspan="5" align="right"><input name="rfid_card" type="text" value=""required autofocus='autofocus'></td>  
<td colspan="5"><button type="submit" name="Submit">Search</button></td>

</tr>
</table>
</form>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr><td colspan="19"align="center"bgcolor="lightblue"class="style1" border="0">Welcome!! <?php echo $row39['fullname']; ?></td>
<td colspan="1"align="center"bgcolor="lightblue">
<a target='_blank' href="hinfo111"><img src="hinfo.jpg" title="Hospital Information" width="100" height="70" /></a>




</tr>
<tr><td colspan="19"align="center"bgcolor="lightgreen"><img  src="staff_pic/<?php echo $row3['pic'] ?>" width="100"  height="100" align="center"></td>
<td colspan="1"align="center"bgcolor="lightgreen"><h3><?php echo date('d/m/Y').'<br>'.date('H:i:s')?></h3></td>
</tr>



<tr>
	<td colspan="5"align="center"><a href=""><font size="4.5">OPD</a></td>
		<td colspan="5" align="center"><a href="inviewnew1"><font size="4.5">IPD</a></td>
		<td colspan="3" align="center"><a href="view3newradimo"><font size="4.5">	Radiology</a></td>
		<td colspan="3" align="center"><a href="categoryimo"><font size="4.5">	Pharmacy</a></td>
		<td colspan="2" align="center"><a href="viewlabimo"><font size="4.5">LAB</a></td>
		<td colspan="2" align="center"><a href="otdashimo"><font size="4.5">	OT</a></td>

		
	  
</tr>

<tr>
	<td colspan="5"align="center"><a href=""><font size="4.5">	Antenatal History</a></td>
		<td colspan="5" align="center"><a href=""><font size="4.5">Vaccine Center</a></td>
		<td colspan="3" align="center"><a href="opdprodashimo"><font size="4.5">	OPD Procedure</a></td>
		<td colspan="3" align="center"><a href="endohomeimo"><font size="4.5">Endoscopy Suite</a></td>
		<td colspan="2" align="center"><a href="histoappnew"><font size="4.5">	Histopathology</a></td>
		<td colspan="2" align="center"><a href="hinfo111"><font size="4.5">Hospital Information</a></td>
		
	  
</tr>
 <tr>
	<td colspan="5"align="center"><a href=""><font size="4.5">	Emergency</a></td>
		<td colspan="5" align="center"><a href="history1mng"><font size="4.5">Patients History</a></td>
		<td colspan="3" align="center"><a href=""><font size="4.5">	Admission Request</a></td>
		<td colspan="3" align="center"><a href="categoryimo"><font size="4.5">	Categorywise Medicine Search</a></td>
				<td colspan="2" align="center"><a href="categoryinvesimo"><font size="4.5">	Categorywise Investigation Search</a></td>
		<td colspan="2" align="center"><a href="cathdashimo"><font size="4.5">	Cardiac Procedure</a></td>
		
	  
</tr>
 <tr>
	<td colspan="5"align="center"><a href=""><font size="4.5">	Doridro Fund Request</a></td>
			<td colspan="5" align="center"><a href=""><font size="4.5">Medical Certificate</a></td>
			<td colspan="3" align="center"><a href="chemoimohome"><font size="4.5">Oncology Suite</a></td>
		
		<td colspan="3" align="center"><a href="hinfo111"><font size="4.5">Hospital Information</a></td>
		<td colspan="2"align="center"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td>
		<td colspan="2"align="center"><a href="staffincident"><font size="4.5">Incident Reporting </td>
	  
</tr>


<tr>
	<td colspan="5"align="center"><a href="staffleave"><font size="4.5">	Leave Management</a></td>
	<td colspan="5"align="center"><a href="bed_mng_test5"><font size="4.5">	Bed Management</a></td>
	<td colspan="3"align="center"><a href="new_patient_chart"><font size="4.5">	Search patient With RFID</a></td>
	
	<?php if($cat=='HOD' or $cat=='Incharge'){	echo'	

<td colspan="3" align="center"><a href="mrequest"><font size="4.5">Material Request</a></td>
			<td colspan="3" align="center"><a href="bio_list_nurse"><font size="4.5">Asset List</a></td>		
<td colspan="2" align="center"><a href="dmaterialstore"><font size="4.5">Add Hospital Asset</a></td>		
<td colspan="2" align="center"><a href="bededit_nurse"><font size="4.5">Bed Management</a></td>	
<tr>
<td colspan="5"align="center"><a href="recruit/manpower_requisition"><font size="4.5">Recruitment</a></td>	

<td colspan="5"align="left"><a href="roaster_home"><font size="4.5">Set Departmental Roster</a></td>
	</tr>		
			'
;}

		

	?>	
	
	
	  
</tr>





</table>
    


  
    

    
	  <?php 
	  $ad='b';
	  
	  if($ad=='b')
{
	$txt='Greetings'.' '.$full.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}?>
   
  </tbody>
</table>
</form>

</body>

</html>
