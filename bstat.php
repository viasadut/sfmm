<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
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
  height: 50px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
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

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
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


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
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
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
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

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Best Practice Analysis Stats</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		



  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
//$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];

//$eid=$_REQUEST['eid'];
$dd=date('m/d/Y');
$query2 = mysqli_query($link,"Select count(d01) from bestp where d01='YES' and edate BETWEEN '$start' and '$end'" );
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($link,"Select count(d02) from bestp where d02='YES' and edate BETWEEN '$start' and '$end'" );
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($link,"Select count(d03) from bestp where d03='YES' and edate BETWEEN '$start' and '$end'" );
$data4 = mysqli_fetch_array($query4);

$query5 = mysqli_query($link,"Select count(d04) from bestp where d04='YES' and edate BETWEEN '$start' and '$end'" );
$data5 = mysqli_fetch_array($query5);

$query6 = mysqli_query($link,"Select count(d05) from bestp where d05='YES' and edate BETWEEN '$start' and '$end'" );
$data6 = mysqli_fetch_array($query6);

$query7 = mysqli_query($link,"Select count(d06) from bestp where d06='YES' and edate BETWEEN '$start' and '$end'" );
$data7 = mysqli_fetch_array($query7);





$query8 = mysqli_query($link,"Select count(d07) from bestp where d07='YES' and edate BETWEEN '$start' and '$end'" );
$data8 = mysqli_fetch_array($query8);

$query9 = mysqli_query($link,"Select count(d08) from bestp where d08='YES' and edate BETWEEN '$start' and '$end'" );
$data9 = mysqli_fetch_array($query9);

$query10 = mysqli_query($link,"Select count(d09) from bestp where d09='YES' and edate BETWEEN '$start' and '$end'" );
$data10 = mysqli_fetch_array($query10);

$query11 = mysqli_query($link,"Select count(d10) from bestp where d10='YES' and edate BETWEEN '$start' and '$end'" );
$data11 = mysqli_fetch_array($query11);

$query12 = mysqli_query($link,"Select count(d11) from bestp where d11='YES' and edate BETWEEN '$start' and '$end'" );
$data12 = mysqli_fetch_array($query12);

$query13 = mysqli_query($link,"Select count(d12) from bestp where d12='YES' and edate BETWEEN '$start' and '$end'" );
$data13 = mysqli_fetch_array($query13);





$query14 = mysqli_query($link,"Select count(d13) from bestp where d13='YES' and edate BETWEEN '$start' and '$end'" );
$data14 = mysqli_fetch_array($query14);

$query15 = mysqli_query($link,"Select count(d14) from bestp where d14='YES' and edate BETWEEN '$start' and '$end'" );
$data15 = mysqli_fetch_array($query15);

$query16 = mysqli_query($link,"Select count(d15) from bestp where d15='YES' and edate BETWEEN '$start' and '$end'" );
$data16 = mysqli_fetch_array($query16);

$query17 = mysqli_query($link,"Select count(d16) from bestp where d16='YES' and edate BETWEEN '$start' and '$end'" );
$data17 = mysqli_fetch_array($query17);

$query18 = mysqli_query($link,"Select count(d17) from bestp where d17='YES' and edate BETWEEN '$start' and '$end'" );
$data18 = mysqli_fetch_array($query18);

$query19 = mysqli_query($link,"Select count(d18) from bestp where d18='YES' and edate BETWEEN '$start' and '$end'" );
$data19 = mysqli_fetch_array($query19);
	
	
$count=1;

echo "<font color=blue font size=5> Record Shown -";

echo "  From  ";
echo date('d/m/Y',strtotime($_REQUEST["stdate"]));
echo "  To  ";
echo date('d/m/Y',strtotime($_REQUEST["endate"]));	
	
	
	

	/*$i1=$data2['count(*)']+$data8['count(*)']+$data14['count(*)']+$data118['count(*)']+$data24['count(*)']+$data30['count(*)']+$data36['count(*)']+$data42['count(*)']+$data48['count(*)']+$data54['count(*)']+$data60['count(*)']+$data66['count(*)'];
$i2=$data15['count(*)']+$data9['count(*)']+$data3['count(*)']+$data119['count(*)']+$data25['count(*)']+$data31['count(*)']+$data37['count(*)']+$data43['count(*)']+$data49['count(*)']+$data55['count(*)']+$data61['count(*)']+$data67['count(*)'];
$i3=$data16['count(*)']+$data10['count(*)']+$data4['count(*)']+$data20['count(*)']+$data26['count(*)']+$data32['count(*)']+$data38['count(*)']+$data44['count(*)']+$data50['count(*)']+$data56['count(*)']+$data62['count(*)']+$data68['count(*)'];
$i4=$data18['count(*)']+$data12['count(*)']+$data6['count(*)']+$data21['count(*)']+$data27['count(*)']+$data33['count(*)']+$data39['count(*)']+$data45['count(*)']+$data51['count(*)']+$data57['count(*)']+$data63['count(*)']+$data69['count(*)'];
$i5=$data19['count(*)']+$data13['count(*)']+$data7['count(*)']+$data22['count(*)']+$data28['count(*)']+$data34['count(*)']+$data40['count(*)']+$data46['count(*)']+$data52['count(*)']+$data58['count(*)']+$data64['count(*)']+$data70['count(*)'];
$i6=$data17['count(*)']+$data11['count(*)']+$data5['count(*)']+$data23['count(*)']+$data29['count(*)']+$data35['count(*)']+$data41['count(*)']+$data47['count(*)']+$data53['count(*)']+$data59['count(*)']+$data65['count(*)']+$data71['count(*)'];
$gsum=$sum1+$sum2+$sum3+$sum4+$sum5+$sum6+$sum7+$sum8+$sum9+$sum10+$sum11+$sum12+$data74['count(*)'];;*/


 ?>   
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    





<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Departure No-10 (Consultant Faliure to respond to the emergency call within 20 min of notification if s/he is present at the hospital):  </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data11['count(d10)'];?></td>
</tr>
<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Departure No-07 (Incomplete Consent Form): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data8['count(d07)'];?> </td>
</tr>
<tr>



</tr>
<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Departure No-06 (Consent Obtain in OT for schedule cases):  </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data7['count(d06)'];?> </td>
</tr>
<tr>



</tr>

<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Departure No-08 (Consent for operation are not signed prior to the operative procedure (Surgery / Procedure performed without written consent): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data9['count(d08)'];?> </td>
</tr>
<tr>



</tr>


<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-16 (Engaging Locum or assistant to perform surgery without prior approval): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data17['count(d16)'];?> </td>
</tr>
<tr>



</tr>
<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-18 (Failure to do site marking prior to surgery:): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data19['count(d18)'];?> </td>
</tr>
<tr>



</tr>


<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-01 (Schedule Surgery is delayed >30 Mins due to surgeon's absent): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data2['count(d01)'];?> </td>
</tr>
<tr>



</tr>


<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-05 (One surgeon managing 2 cases simultaneously: More than 1 patient at a time): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data6['count(d05)'];?> </td>
</tr>
<tr>



</tr>

<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-17 (Paediatrician Arrived Late During Caesarean Section:): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data18['count(d17)'];?> </td>
</tr>
<tr>



</tr>


<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-13 (Consultant Passing Abusive / Vulgar Remarks): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data14['count(d13)'];?> </td>
</tr>
<tr>



</tr>


<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-15 (Consultant Mishandling surgical instrument / equipment):</strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b> <?php echo $data16['count(d15)'];?> </td>
</tr>
<tr>



</tr>

<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-14 (Dissatisfied with Consultant): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data15['count(d14)'];?> </td>
</tr>
<tr>




</tr>



<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-04- Anaesthetic Nurse (One Anaesthetist Managing 2 Cases simultaneously):</strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data5['count(d04)'];?> </td>
</tr>
<tr>



</tr>

<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-02- Anaesthetic Nurse (Patient Under GA for a period of >10 Mins before surgeon's arrival): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data3['count(d02)'];?> </td>
</tr>
<tr>



</tr>


<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-03- Anaesthetic Nurse (Patient Under Spinal Anaesthesia for a period of >10 Mins before surgeon's arrival): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data4['count(d03)'];?> </td>
</tr>
<tr>



</tr>


<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-09- Absence of Anaesthetist during surgery without valid reason: </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data10['count(d09)'];?> </td>
</tr>
<tr>



</tr>


<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-11- Recovery Nurse (Patient Extubate in recovery Bay (ET Tube Only)): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data12['count(d11)'];?> </td>
</tr>
<tr>



</tr>

<tr>
<td colspan="16" bgcolor="#00CCCC"><label><strong>Depature No-12- Recovery Nurse (Operation Note not completed on discharge from recovery Bay): </strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><font size="6" color="#FF0000"><b><?php echo $data13['count(d12)'];?> </td>
</tr>
<tr>



</tr>


<?php $count++; } ?>












  
</table>


</form>
</body>
</html>
