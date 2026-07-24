<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2.php?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];
$date4=date('Y-m-d');


//$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$adate1=date('m/d/Y');




$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
$query = "SELECT * from pappnew where pmrn='$pmrn' and adate='$adate1'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pd= $row['dname'];
$pdate= $row['adate'];
$pa= $row['padd'];
$ps= $row['psex'];
$ph= $row['height'];
$pw= $row['weight'];
$pt= $row['temp'];
//$pa= $row['padd'];
  
$query5 = "SELECT * from pmedi where pmrn='$pmrn' and dname='$pd' order by id desc limit 1"; 
$result5 = mysqli_query($con, $query5) or die ( mysqli_error());
$row5 = mysqli_fetch_assoc($result5);
$oeid=$row5["eid"];
//echo $oeid;


$sel="SELECT * FROM presnew WHERE `pmrn`='$pmrn' and dname='$pd' and date='$pdate';";
$result = mysqli_query($con,$sel);  
  ?>


<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

$phyper=$_REQUEST['phyper'];
$pheart=$_REQUEST['pheart'];
$pdm=$_REQUEST['pdm'];
$pkid=$_REQUEST['pkid'];
$ptb=$_REQUEST['ptb'];
$pasthma=$_REQUEST['pasthma'];
$pthyroid=$_REQUEST['pthyroid'];
$pneuro=$_REQUEST['pneuro'];
$liver=$_REQUEST['liver'];

$phyper1=$_REQUEST['phyper1'];
$pheart1=$_REQUEST['pheart1'];
$pdm1=$_REQUEST['pdm1'];
$pkid1=$_REQUEST['pkid1'];
$ptb1=$_REQUEST['ptb1'];
$pasthma1=$_REQUEST['pasthma1'];
$pthyroid1=$_REQUEST['pthyroid1'];
$pneuro1=$_REQUEST['pneuro1'];
$liver1=$_REQUEST['liver1'];

$psurgery=$_REQUEST['psurgery'];
$palcohol=$_REQUEST['palcohol'];
$psmoking=$_REQUEST['psmoking'];
$pfamily=$_REQUEST['pfamily'];
$pdrug=$_REQUEST['pdrug'];

$psurgery1=$_REQUEST['psurgery1'];
$palcohol1=$_REQUEST['palcohol1'];
$psmoking1=$_REQUEST['psmoking1'];
$pfamily1=$_REQUEST['pfamily1'];
$pdrug1=$_REQUEST['pdrug1'];


$update33="update pappnew set `phyper`='$phyper',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`liver`='$liver',
`phyper1`='$phyper1',`pheart1`='$pheart1',`pdm1`='$pdm1',`pkid1`='$pkid1',`ptb1`='$ptb1',`pasthma1`='$pasthma1',`pthyroid1`='$pthyroid1',`pneuro1`='$pneuro1',`liver1`='$liver1',
`psurgery`='$psurgery',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`psurgery1`='$psurgery1',`palcohol1`='$palcohol1',`psmoking1`='$psmoking1',`pfamily1`='$pfamily1',`pdrug1`='$pdrug1' where `pmrn`='$pmrn' and adate='$adate1'";
mysqli_query($con,$update33) or die("Problem in Update pappnew");

echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';


}
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Out Patient Record</title>
  
 <link rel="stylesheet" href="jsnew/normalize.min.css">   

  
      <style>

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
  max-width: 2000px;
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
  font-size: 12px;
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


button1 {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
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
  background-color: lightblue;
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
    max-width: 2000px;
  }

}
      </style>

    <script src="jsnew/prefixfree.min.js"></script>

<style>

.blink {
      animation: blinker 5s linear infinite;
      color: red;
      font-size: 30px;
      font-weight: bold;
      font-family: sans-serif;
      }
      @keyframes blinker {  
      50% { opacity: 0; }
      }
      .blink-one {
      animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {  
      0% { opacity: 0; }
      }
      .blink-two {
      animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {  
      100% { opacity: 0; }
      }
	  </style>

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
			maxDate: new Date(currentYear, currentMonth, currentDate+365)
		});
	});
</script>



  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Prescription</title>
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

<h1 align="center">OUTPATIENT RECORD </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

		
<h2 align="right" style="color:red;">	
<form target="_blank" action="http://192.168.100.202/Launch_Viewer.asp?" method="post" id='tt' >
<input type="hidden" name="PatientID" value="<?php echo $pmrn;?>"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value='PACS VIEW'align="right" class="blink"></input>
</form></h2>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");'id="prescrip" name="prescrip" />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp&nbsp&nbsp&nbsp<a href="view3newtesttest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>&eid=<?php echo "$count1"?>"><b>Edit On Previous Visits<b></a>&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>medex.com.bd<b></a></td></tr>
<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>"><b>SURGERY NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolink?pmrn=<?php echo "$pmrn"; ?>"><b>CARDIOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="opdprocedurenote?pmrn=<?php echo "$pmrn"; ?>"><b>OPD PROCEDURE NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="historeportdoc?pmrn=<?php echo "$pmrn"; ?>"><b>HISTOPATHOLOGY REPORT<b></a></td></tr>		
				
						
						
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>				
						<td colspan="3"><label><strong>Patient's Age:</strong></label></td>
						<td colspan="1"><label><strong>Patient's Gender:</strong></label></td>
						<td colspan="4"><label><strong>Patient's Phone No:</strong></label></td>
						
						
						</tr>

<tr>				 
					<td colspan="10"><input type="text1" name="pname"  value="<?php echo $pn;?>" readonly/></td>
					<td colspan="2"><input type="text1" name="pmrn"   value="<?php echo $pm;?>" readonly/></td>
					<td colspan="3"><input type="text" name="page" required value="<?php echo $row['page'];?>" readonly/></td>  	
					 <td colspan="1"><input type="text" name="psex" required value="<?php echo $row['psex'];?>" readonly/></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $row['pphone'];?>" readonly/></td>  

					 
</tr>

				
<tr><td colspan="20" bgcolor="#00CCCC"><label class="blink"><strong>Comorbidities :</strong></label></td></tr>


<tr>
<td colspan="2"><label><strong>Hypertension:</strong></label></td>
<td colspan="2"><label><strong>Heart Disease:</strong></label></td>
<td colspan="2"><label><strong>DM:</strong></label></td>
<td colspan="2"><label><strong>Kidney Disease:</strong></label></td>
<td colspan="2"><label><strong>TB:</strong></label></td>
<td colspan="2"><label><strong>Asthma:</strong></label></td>
<td colspan="3"><label><strong>Thyriod Disease:</strong></label></td>
<td colspan="3"><label><strong>Neuro Disorder:</strong></label></td>
<td colspan="2"><label><strong>Liver Disease:</strong></label></td>
</tr>


<tr>

<td colspan="2"><input type="text" name="phyper" style="background-color:skyblue;" required value="<?php echo $row['phyper'];?>" /></td>
<td colspan="2"><input type="text" name="pheart" style="background-color:skyblue;" required value="<?php echo $row['pheart'];?>" /></td>
<td colspan="2"><input type="text" name="pdm" style="background-color:skyblue;" required value="<?php echo $row['pdm'];?>" /></td>
<td colspan="2"><input type="text" name="pkid" style="background-color:skyblue;" required value="<?php echo $row['pkid'];?>" /></td>
<td colspan="2"><input type="text" name="ptb" required value="<?php echo $row['ptb'];?>" /></td>
<td colspan="2"><input type="text" name="pasthma" required value="<?php echo $row['pasthma'];?>" /></td>
<td colspan="3"><input type="text" name="pthyroid" required value="<?php echo $row['pthyroid'];?>" /></td>
<td colspan="3"><input type="text" name="pneuro" required value="<?php echo $row['pneuro'];?>" /></td>
<td colspan="2"><input type="text" name="liver" required value="<?php echo $row['liver'];?>" /></td>




</tr>

<tr>

<td colspan="2"><input type="text" name="phyper1" style="background-color:skyblue;" placeholder="Remarks" value="<?php echo $row['phyper1'];?>"/></td>
<td colspan="2"><input type="text" name="pheart1" style="background-color:skyblue;" placeholder="Remarks" value="<?php echo $row['pheart1'];?>" /></td>
<td colspan="2"><input type="text" name="pdm1" style="background-color:skyblue;" placeholder="Remarks" value="<?php echo $row['pdm1'];?>" /></td>
<td colspan="2"><input type="text" name="pkid1" style="background-color:skyblue;" placeholder="Remarks" value="<?php echo $row['pkid1'];?>" /></td>
<td colspan="2"><input type="text" name="ptb1" placeholder="Remarks" value="<?php echo $row['ptb1'];?>"/></td>
<td colspan="2"><input type="text" name="pasthma1" placeholder="Remarks" value="<?php echo $row['pasthma1'];?>" /></td>
<td colspan="3"><input type="text" name="pthyroid1" placeholder="Remarks" value="<?php echo $row['pthyroid1'];?>" /></td>
<td colspan="3"><input type="text" name="pneuro1" placeholder="Remarks" value="<?php echo $row['pneuro1'];?>" /></td>
<td colspan="2"><input type="text" name="liver1" placeholder="Remarks" value="<?php echo $row['liver1'];?>" /></td>



</tr>




<tr><td colspan="20" bgcolor="#00CCCC"><label class="blink"><strong>Past History :</strong></label></td></tr>
<tr>
<td colspan="4"><label><strong>Past Surgery:</strong></label></td>
<td colspan="4"><label><strong>Alcohol:</strong></label></td>
<td colspan="4"><label><strong>Smoking:</strong></label></td>
<td colspan="4"><label><strong>Family History:</strong></label></td>
<td colspan="4"><label><strong>Drug History:</strong></label></td>
</tr>
<tr>
<td colspan="4"><input type="text" name="psurgery" required value="<?php echo $row['psurgery'];?>" /></td>
<td colspan="4"><input type="text" name="palcohol" required value="<?php echo $row['palcohol'];?>" /></td>
<td colspan="4"><input type="text" name="psmoking" required value="<?php echo $row['psmoking'];?>" /></td>
<td colspan="4"><input type="text" name="pfamily" required value="<?php echo $row['pfamily'];?>" /></td>
<td colspan="4"><input type="text" name="pdrug" required value="<?php echo $row['pdrug'];?>" /></td>
</tr>
<tr>
<td colspan="4"><input type="text" name="psurgery1" placeholder="Remarks" value="<?php echo $row['psurgery1'];?>" /></td>
<td colspan="4"><input type="text" name="palcohol1" placeholder="Remarks" value="<?php echo $row['palcohol1'];?>" /></td>
<td colspan="4"><input type="text" name="psmoking1" placeholder="Remarks" value="<?php echo $row['psmoking1'];?>"/></td>
<td colspan="4"><input type="text" name="pfamily1"placeholder="Remarks"  value="<?php echo $row['pfamily1'];?>" /></td>
<td colspan="4"><input type="text" name="pdrug1"  placeholder="Remarks"value="<?php echo $row['pdrug1'];?>"/></td>
</tr>




		<td colspan="10"><button type="submit" name="Submit">UPDATE</button></td>
	
	  				
</tr>

</body>

</html>
