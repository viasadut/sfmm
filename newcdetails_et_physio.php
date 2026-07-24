<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('physio','staff')"; 
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

$vtime = date('d/m/Y H:i:s');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['ID'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from pappnew where ID='$id'");
$data = mysqli_fetch_assoc($query4);

$dnn=$data['dname'];


$query5 = mysqli_query($db,"select * from doctor where dname='$dnn'");
$data5 = mysqli_fetch_assoc($query5);

$sid=$data5['sid'];




 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_username"];
$status = "";
//$vtime=date('d/m/Y H:i:s');
if(isset($_POST['Submit'])==1)
{

//$name =$_REQUEST['name'];
//$pmrn =$_REQUEST['pmrn'];
//$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
//$dname =$_REQUEST['dname'];
//$date = $_REQUEST['date'];
//$date1 =$_REQUEST[ 'date1'];
//$slot = $_REQUEST['slot'];
//$doc1 = $_REQUEST['doc'];
//$pphone= $_REQUEST['pphone'];
$pheight= $_REQUEST['pheight'];
$pweight= $_REQUEST['pweight'];
$ptemp= $_REQUEST['ptemp'];
$pbp= $_REQUEST['pbp'];
//$pbmi= $_REQUEST['pbmi'];
$ppluse= $_REQUEST['ppluse'];
$phyper= $_REQUEST['phyper'];
$pheart= $_REQUEST['pheart'];
$pdm= $_REQUEST['pdm'];
$pkid= $_REQUEST['pkid'];
$ptb= $_REQUEST['ptb'];
$pasthma= $_REQUEST['pasthma'];
$pthyroid= $_REQUEST['pthyroid'];
$pneuro= $_REQUEST['pneuro'];
$psurgery= $_REQUEST['psurgery'];
$pperiod= $_REQUEST['pperiod'];
$plmp= $_REQUEST['plmp'];
$pnochild= $_REQUEST['pnochild'];
$plchild= $_REQUEST['plchild'];
//$pmenopause= $_REQUEST['pmenopause'];
$palcohol= $_REQUEST['palcohol'];
$psmoking= $_REQUEST['psmoking'];
$pfamily= $_REQUEST['pfamily'];
$pdrug= $_REQUEST['pdrug'];
$pmstatus= $_REQUEST['pmstatus'];
$poccupation= $_REQUEST['poccupation'];
$spo2= $_REQUEST['spo2'];
$rr= $_REQUEST['rr'];
$liver=$_REQUEST['liver'];
$para= $_REQUEST['para'];
$gravida= $_REQUEST['gravida'];
$clist= $_REQUEST['clist'];
$pbp1= $_REQUEST['pbp1'];
$hwc= $_REQUEST['hwc'];
$hhc= $_REQUEST['hhc'];

$update33="update pappnew set `height`='$pheight',`weight`='$pweight',`temp`='$ptemp',`pbp`='$pbp',`phyper`='$phyper',`ppluse`='$ppluse',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`psurgery`='$psurgery',`pperiod`='$pperiod',`plmp`='$plmp',`pnochild`='$pnochild',`plchild`='$plchild',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`mstatus`='$pmstatus',`occupation`='$poccupation', `status`='HISTORY UPDATED',`spo2`='$spo2',`rr`='$rr',`liver`='$liver',`para`='$para',`clist`='$clist',`gravida`='$gravida',`vby`='$user',`vtime`='$vtime',`pbp1`='$pbp1',`hwc`='$hwc',`hhc`='$hhc' where `ID`='$id'";

mysqli_query($con,$update33) or die(mysql_error());

//$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
//mysqli_query($con,$update) or die(mysql_error());

//$url = "new_opd_1_physio?sid=$sid"; 
$url = "newtestformattestphysio?ID=$id&pmrn=$pmrn"; 

header("Location: $url");
echo '<script language="javascript">';
    echo 'alert("Personal History Updated Successfully !!"); ';
    echo '</script>';}


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
  font-size: 12px;
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
  margin: 0 1px 1px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 20%;
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
  background-color: lightblue;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
}
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
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
</head>

<body>
<div id='cssmenu'>
<ul>
   <li><a href=''><span>Home</span></a></li>
     
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S PERSONAL HISTORY </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<label for="name"><strong>Doctor's Name :</strong></label>
			<input name="dname" type="text" value="<?php echo $data["dname"]; ?> "readonly>
		
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input type="text" name="date"  size="15" value="<?php echo $data["adate"]; ?>"readonly>
									 
									  
                                      
	    </p>

									<label for="age"><strong>Available Slot :</strong></label>
												  <input type="text" name="slot"  size="15" value="<?php echo $data["aslot"]; ?>"readonly
<p>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="65" value="<?php echo $data["pname"]; ?>"readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="65" value="<?php echo $data["padd"]; ?>"readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            <input name="psex" type="text" size="15" value="<?php echo $data["psex"]; ?>"readonly>
            <input name="pmrn" type="text" size="10" value="<?php echo $data["pmrn"]; ?>"readonly>
      <input name="pphone" type="text" size="10" value="<?php echo $data["pphone"]; ?>"readonly>	  
	  <input name="page" type="text" size="5"value="<?php echo $data["page"]; ?>"readonly>
	  	 
      
<label for="age"  size="20%"><strong>Patient's Vitals :</strong></label>

	        <input name="pheight" type="text" size="2" placeholder="Height" value="" required>
	        <input name="pweight" type="text" size="2" placeholder="Weight" value=""required>
	        <input name="ptemp" type="text" size="2" placeholder="Temp" value=""required>
	        <input name="ppluse" type="text" size="2" placeholder="Pluse" value=""required>
	        <input name="pbp" type="text" size="2" placeholder="SBP" value=""required>
			<input name="pbp1" type="text" size="2" placeholder="DBP" value=""required>
			<input name="spo2" type="text" size="2" placeholder="SPO2" value=""required>
			<input name="rr" type="text" size="2" placeholder="RR" value=""required>
			<input name="hwc" type="text" size="2" placeholder="Waist Circumference" value=""required>
			<input name="hhc" type="text" size="2" placeholder="Hip Circumference" value=""required>
	        
<label for="age"  size="20%"><strong>Patient's Past History :</strong></label><br>

 </br><b>Hypertension: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="phyper" value="YES"required/> YES &nbsp;&nbsp;<input type="radio" name="phyper" value="NO"checked="checked"required/> NO</br>
 </br><b>Heart Disease: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="pheart" value="YES"required/> YES &nbsp;&nbsp;<input type="radio" name="pheart" value="NO"checked="checked"required/> NO &nbsp;&nbsp;</br>
 </br><b>DM: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="pdm" value="YES"required> YES <input type="radio" name="pdm" value="NO"checked="checked"required> NO </br>
 </br><b>Kidney Disease: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="pkid" value="YES"required/> YES&nbsp;&nbsp;&nbsp;<input type="radio" name="pkid" value="NO"checked="checked"required/>&nbsp;&nbsp;NO &nbsp;</br>
 </br><b>TB: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ptb" value="YES"required> YES &nbsp;&nbsp;&nbsp;<input type="radio" name="ptb" value="NO"checked="checked"required> NO &nbsp;</br>
</br> <b>Asthma: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="pasthma" value="YES"required> YES <input type="radio" name="pasthma" value="NO"checked="checked"required> NO </br>
 </br><b>Thyroid Disease: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="pthyroid" value="YES"required> YES &nbsp;&nbsp;<input type="radio" name="pthyroid" value="NO"checked="checked"required> NO &nbsp;</br>
 </br><b>Neuro Disorder: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="pneuro" value="YES"required> YES <input type="radio" name="pneuro" value="NO"checked="checked"required> NO </br>
 </br><b>Past Surgery: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="psurgery" value="YES"required> YES <input type="radio" name="psurgery" value="NO"checked="checked"required> NO </br>
 </br><b>Liver Disease: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="liver" value="YES"required> YES <input type="radio" name="liver" value="NO"checked="checked"required> NO </br>
 
<br>

<label for="age"  size="20%" ><strong color="pink">For Female :</strong></label><br><br>
<label1 for="age"  size="20%" ><strong color="green">Menstrual History :</strong></label1><br><br>
 <b>Menstrual Cycle  : <input type="radio" name="pperiod" value="Regular"required> Regular <input type="radio" name="pperiod" value="Irregular"required/> Irregular&nbsp;&nbsp;&nbsp;<input type="radio" name="pperiod" value="N/A"checked="checked"required/> N/A &nbsp;&nbsp;&nbsp;
 <br><br> <b>LMP- Date: <br><input type="text" name="plmp" value="N/A" size="65%"required><br>
   <b>Contraceptive List: <br><input type="text" name="clist" value="N/A" size="65%"required>
  <br>
<label1 for="age"  size="20%" ><strong color="green">Obstetrical History :</strong></label1><br><br>
  
  <b>Para: <br><input type="text" name="para" value="N/A" size="65%"required><br>
  <b>Gravida: <br><input type="text" name="gravida" value="N/A" size="65%"required><br>
  <b>Age of Last Child: <br><input type="text" name="plchild" value="N/A" size="65%"required><br>
  
<b>No Of Child:<br><input name="pnochild" type="text"  value="N/A"/ size="65%"placeholder="No Of Child"required>


				
<label for="age"  size="20%"><strong>Personal History :</strong></label>
<br><br>
	Marital Status: <input type="radio" name="pmstatus" value="YES"required> YES <input type="radio" name="pmstatus" value="NO"checked="checked"required> NO <br><br>
	Occupation: <input type="radio" name="poccupation" value="Service Holder"checked="checked"required> Service Holder <input type="radio" name="poccupation" value="Business"required> Business <br><br>
 <b>Alcohol: <input type="radio" name="palcohol" value="YES"required> YES <input type="radio" name="palcohol" value="NO"checked="checked"required> NO <br><br>
 <b>Smoking: <input type="radio" name="psmoking" value="YES"required> YES <input type="radio" name="psmoking" value="NO"checked="checked"required> NO 


<br><br>
 <b>Family History: <input type="radio" name="pfamily" value="Significant"checked="checked"required> Significant <input type="radio" name="pfamily" value="Not Significant"required> Not Significant
<br><br>


 <b>Drug History: <input type="radio" name="pdrug" value="PRESENT" required> PRESENT <input type="radio" name="pdrug" value="ABSENT"checked="checked"required> ABSENT 

</p>	        			
  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
