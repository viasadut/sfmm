<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="emergency"){
      header('Location: login2.php?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



//$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];




$query43 = "SELECT COUNT(pmrn) FROM emergency where pmrn= '$pmrn' and discharge='';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
$query = "SELECT * from emergency where pmrn= '$pmrn' and eid='$eid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn1= $row['pname'];
$pm1= $row['pmrn'];
$pp1= $row['pphone'];  
//$pd= $row['dname'];
$pdate1= $row['adate'];
$pa1= $row['padd'];
$ps1= $row['gender'];
//$ph= $row['height'];
//$pw= $row['weight'];
//$pt= $row['temp'];
//$pa= $row['padd'];
$query2 = "SELECT * from gcs where pmrn='$pmrn' and eid='$eid'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$gcs_data = mysqli_fetch_assoc($result2);   

 $query2_1 = "SELECT * from user where uname='$user'"; 
$result2_1 = mysqli_query($con, $query2_1) or die ( mysqli_error());
$row2_1 = mysqli_fetch_assoc($result2_1); 
$fname=$row2_1['fullname'];  
  ?>


<?php
 
require('db1.php');
//$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

//$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
//$pphone=$_REQUEST['pphone'];
//$xl=$_REQUEST['xl'];
//$lx= implode(",",$xl);

//$x2=$_REQUEST['x2'];
//$lx2= implode(",",$x2);
$other=$_REQUEST['other'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$pheight=$_REQUEST['pheight'];
$pweight=$_REQUEST['pweight'];
$ptemp=$_REQUEST['ptemp'];
$pbp=$_REQUEST['pbp'];
$phyper=$_REQUEST['phyper'];
$ppluse=$_REQUEST['ppluse'];
$ma=$_REQUEST['ma'];
$acc=$_REQUEST['acc'];
$con2=$_REQUEST['con'];
$men=$_REQUEST['men'];
$pmstatus=$_REQUEST['pmstatus'];
$po2=$_REQUEST['po2'];
$bg=$_REQUEST['bg'];
$coma=$_REQUEST['coma'];
$coma1=$_REQUEST['coma1'];
$coma2=$_REQUEST['coma2'];
$aller=$_REQUEST['aller'];
//$pasts=$_REQUEST['pasts'];
$xl=$_REQUEST['xl'];
//$lx= implode(",",$xl);

$x2=$_REQUEST['xl2'];
$lx2= implode(",",$x2);

$zone=$_REQUEST['zone'];
$coma3=$coma+$coma1+$coma2;
/*
if($res=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Triage Form Has Already Updated"); ';
    echo '</script>';
    }
	else{

$ins_query="insert into gcs (`pname`,`pmrn`,`gender`,`moa`,`accom`,`lcon`,`mstatus`,`ph`,`pw`,`pt`,`pp`,`pbp`,`pr`,`po`,`pb`,`pain`,
`c1`,`c2`,`c3`,`c4`,`pc`,`pcom`,`pall`,`eid`,`ad_by_id`,`ad_by_name`) values 
('$pname','$pmrn','$psex','$ma','$acc','$con2','$men','$pheight','$pweight','$ptemp','$ppluse','$pbp','$pmstatus','$po2','$bg','$phyper',
'$coma','$coma1','$coma2','$coma3','$xl','$lx2','$aller','$eid','$user','$fname')";
mysqli_query($con,$ins_query) or die(mysql_error());

*/
$update="update emergency set room='$zone' where `pmrn`='$pmrn' and `eid`='$eid'";
mysqli_query($con,$update) or die(mysql_error());
$update2="update gcs set moa='$ma',
accom='$acc',
lcon='$con2',
mstatus='$men',
ph='$pheight',
pw='$pweight',
pt='$ptemp',
pp='$ppluse',
pbp='$pbp',
pr='$pmstatus',
po='$po2',
pb='$bg',
pain='$phyper',
c1='$coma',
c2='$coma1',
c3='$coma2',
c4='$coma3',
pc='$xl',
pcom='$lx2',
pall='$aller'
where `pmrn`='$pmrn' and `eid`='$eid'";
mysqli_query($con,$update2) or die(mysql_error());

  echo '<script language="javascript">';
    echo 'alert("Successfully Updated"); ';
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
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
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


form {
  max-width: 2000px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
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



select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}



@media screen and (min-width: 480px) {

  form {
    max-width: 2000px;
  }

}



body {
  padding: 1rem;
  color: hsla(215, 5%, 50%, 1);
}
h1 {
  color: hsla(215, 5%, 10%, 1);
  margin-bottom: 2rem;
}
section {
  display: flex;
  flex-flow: row wrap;
}
section > div {
  flex: 1;
  padding: 0.5rem;
}
input[type="radio"] {
  {
     margin: 0 4px 8px 0;
	 
  }
  &:disabled ~ label {
    color: hsla(150, 5%, 75%, 1);
    border-color: hsla(150, 5%, 75%, 1);
    box-shadow: none;
    cursor: not-allowed;
  }
}
label {
  height: 50%;
  width: 90%;
  display: block;
  background: white;
  border: 2px solid hsla(150, 75%, 50%, 1);
  border-radius: 20px;
  padding: 1rem;
  margin-bottom: 1rem;
  //margin: 1rem;
  text-align: center;
  box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5);
  position: relative;
}
input[type="radio"]:checked + label {
  background: hsla(150, 75%, 50%, 1);
  color: hsla(215, 0%, 100%, 1);
  box-shadow: 0px 0px 20px hsla(150, 100%, 50%, 0.75);
  
}






input[type="radio"]#control_05:checked + label {
  background: red;
  border-color: red;
}


input[type="radio"]#control_06:checked + label {
  background: green;
  border-color: green;
}

input[type="radio"]#control_07:checked + label {
  background: yellow;
  border-color: yellow;
}


input[type="radio"]#control_01:checked + label {
  background: acua;
  border-color: acua;
}

input[type="radio"]#control_02:checked + label {
  background: pink;
  border-color: pink;
}

input[type="radio"]#control_03:checked + label {
  background: blue;
  border-color: blue;
}


input[type="radio"]#control_11:checked + label {
  background: acua;
  border-color: acua;
}

input[type="radio"]#control_12:checked + label {
  background: pink;
  border-color: pink;
}

input[type="radio"]#control_13:checked + label {
  background: blue;
  border-color: blue;
}



input[type="radio"]#control_14:checked + label {
  background: lightblue;
  border-color: lightblue;
}


input[type="radio"]#control_15:checked + label {
  background: lime;
  border-color: lime;
}

input[type="radio"]#control_16:checked + label {
  background: acua;
  border-color: acua;
}

input[type="radio"]#control_17:checked + label {
  background: pink;
  border-color: pink;
}

input[type="radio"]#control_18:checked + label {
  background: blue;
  border-color: blue;
}



input[type="radio"]#control_19:checked + label {
  background: lightblue;
  border-color: lightblue;
}


input[type="radio"]#control_20:checked + label {
  background: lime;
  border-color: lime;
}


input[type="radio"]#control_21:checked + label {
  background: Orange;
  border-color: Orange;
}







label1 {
	
  display: block;
  margin-bottom: 8px;
}

label1.light {
  font-weight: 300;
  display: inline;
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

<h1 align="center">EDIT GCS RECORD </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><b>Arrival Date & Time:<b> <?php echo $row['adate'];?></td></tr>
		
		<tr><td align="left" colspan="20"><b>Select Zone</td></tr>
		<tr><td align="left" colspan="7">
        <?php if($row['room']=='Green'){echo '	
  <input type="radio" id="control_06" name="zone" value="Green" required checked="checked">
  <label for="control_06">';}
  else {echo '	
    <input type="radio" id="control_06" name="zone" value="Green" required>
    <label for="control_06">';}
  
  ?>
  
  Green Zone</label></td>
<td align="left" colspan="7">

<?php if($row['room']=='Yellow'){echo '	
  <input type="radio" id="control_07" name="zone" value="Yellow" checked="checked">
  <label for="control_07">';

}

else 

{echo '	
    <input type="radio" id="control_07" name="zone" value="Yellow">
    <label for="control_07">';
  
  }
  ?>
  Yellow Zone</label></td>
<td align="left" colspan="6">

<?php if($row['room']=='Red'){echo '	
  <input type="radio" id="control_05" name="zone" value="Red" checked="checked">
  <label for="control_05">';}
  else {echo '	
    <input type="radio" id="control_05" name="zone" value="Red">
    <label for="control_05">';}
    ?>
  Red Zone</label></td>
		</tr>
		
				<tr>
						
						
						<td colspan="2"><label1><strong>Patient's MRN:</strong></label1></td>
						<td colspan="3"><label1><strong>Mode Of Arrival:</strong></label1></td>
						<td colspan="3"><label1><strong>Accompany:</strong></label1></td>
						<td colspan="3"><label1><strong>Level of Consciousness:</strong></label1></td>
						<td colspan="3"><label1><strong>Mental Status:</strong></label1></td>
						<td colspan="1"><label1><strong>Gender:</strong></label1></td>
						<td colspan="5"><label1><strong>Patient's Name:</strong></label1></td>
						
						
						</tr>


<tr>				<td colspan="2"><input type="text" name="pmrn"   value="<?php echo $pm1;?>" readonly/></td>
			<td colspan="3"><select name="ma" placeholder="Arrival Mode" >
						
			<option value='<?php echo $gcs_data['moa'];?>'><?php echo $gcs_data['moa'];?></option>			
            <option value='Walk In'>Walk In</option>
						<option value='Wheel Chair'>Wheel Chair</option>
						<option value='Ambulance'>Ambulance</option>				
						<option value='Trolley'>Trolley</option>				
						<option value='Others'>Others</option>													
						</select></td>
									<td colspan="3"><select name="acc" placeholder="Arrival Mode" >
                                    <option value='<?php echo $gcs_data['accom'];?>'><?php echo $gcs_data['accom'];?></option>			
						<option value='None'>None</option>
						<option value='Relative'>Relative</option>
						<option value='Friends'>Friends</option>				
						<option value='Others'>Others</option>													
						</select></td>
						<td colspan="3"><select name="con" placeholder="Arrival Mode" >
						<option value='<?php echo $gcs_data['lcon'];?>'><?php echo $gcs_data['lcon'];?></option>			
						<option value='Conscious'>Conscious</option>
						<option value='Semi/Conscious'>Semi/Conscious</option>
						<option value='unconscious'>unconscious</option>				

						</select></td>
						<td colspan="3"><select name="men" placeholder="Arrival Mode" >
						<option value='<?php echo $gcs_data['mstatus'];?>'><?php echo $gcs_data['mstatus'];?></option>			
						<option value='Oriented'>Oriented</option>
						<option value='Aggressive'>Aggressive</option>
						<option value='Confused'>Confused</option>				
						<option value='Irritable'>Irritable</option>				
						<option value='Restless'>Restless</option>	
<option value='N/R'>N/R</option>						
<option value='N/A'>N/A</option>							
						</select></td>
					 <td colspan="1"><input type="text" name="psex" required value="<?php echo $row['gender'];?>" /></td>

					 <td colspan="5"><input type="text" name="pname"  value="<?php echo $pn1;?>" readonly/></td>

		 
</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label1><strong>Personal Particulars / History :</strong></label1></td></tr>

		
		<tr>
						
						<td colspan="2"><label1><strong>Age:</strong></label1></td>
						<td colspan="2"><label1><strong>Phone NO:</strong></label1></td>
						<td colspan="2"><label1><strong>Patient's Height (CM):</strong></label1></td>
						<td colspan="2"><label1><strong>Patient's Weight (KG):</strong></label1></td>
						<td colspan="2"><label1><strong>Patient's Temperature(C):</strong></label1></td>		
						<td colspan="2"><label1><strong>Patient's Pluse:</strong></label1></td>
						<td colspan="2"><label1><strong>BP</strong></label1></td>	
						<td colspan="2"><label1><strong>Respiration(bpm)</strong></label1></td>		
						<td colspan="2"><label1><strong>O2 Sat%</strong></label1></td>		
						<td colspan="2"><label1><strong>Blood Glucosemmol/l:</strong></label1></td>
						</tr>
						
						<tr>				
					 <td colspan="2"><input type="text" name="page" required value="<?php echo $row['age'];?>" /></td>  	

					 <td colspan="2"><input type="text" name="pphone" required value="<?php echo $row['pphone'];?>" /></td>  

              		 <td colspan="2"><input type="text" name="pheight" value="<?php echo $gcs_data['ph'];?>" /></td>	
					 <td colspan="2"><input type="text" name="pweight" required value="<?php echo $gcs_data['pw'];?>" /></td>    
					 <td colspan="2"><input type="text" name="ptemp" value="<?php echo $gcs_data['pt'];?>" /></td>  
             		 <td colspan="2"><input type="text" name="ppluse"style="background-color:skyblue;" value="<?php echo $gcs_data['pp'];?>" /></td>					 	
					 <td colspan="2"><input type="text" name="pbp" style="background-color:skyblue;"required value="<?php echo $gcs_data['pbp'];?>" /></td>
					<td colspan="2"><input type="text" name="pmstatus"  value="<?php echo $gcs_data['pr'];?>" /></td>
					 <td colspan="2"><input type="text" name="po2" required value="<?php echo $gcs_data['po'];?>" /></td>  
					 <td colspan="2"><input type="text" name="bg" required value="<?php echo $gcs_data['pb'];?>" /></td>
					 </tr>



<tr>
<td colspan="20" bgcolor="#00CCCC"><label1><strong>Pain Score:</strong></label1></td></tr>
<tr>
<td colspan="20"><b><img src="pain/0.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==0)
{echo '<input type="radio" name="phyper" value="0"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="0"required/>';}?> 0
<img src="pain/1.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==1)
{echo '<input type="radio" name="phyper" value="1"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="1"required/>';}?> 1

<img src="pain/2.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==2)
{echo '<input type="radio" name="phyper" value="2"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="2"required/>';}?> 2

<img src="pain/3.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==3)
{echo '<input type="radio" name="phyper" value="3"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="3"required/>';}?> 3

<img src="pain/4.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==4)
{echo '<input type="radio" name="phyper" value="4"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="4"required/>';}?> 4

<img src="pain/5.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==5)
{echo '<input type="radio" name="phyper" value="5"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="5"required/>';}?> 5

<img src="pain/6.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==6)
{echo '<input type="radio" name="phyper" value="6"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="6"required/>';}?> 6

<img src="pain/7.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==7)
{echo '<input type="radio" name="phyper" value="7"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="7"required/>';}?> 7

<img src="pain/8.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==8)
{echo '<input type="radio" name="phyper" value="8"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="8"required/>';}?> 8

<img src="pain/9.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==9)
{echo '<input type="radio" name="phyper" value="9"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="9"required/>';}?> 9

<img src="pain/10.jpg" title="test" width="40" height="50" />&nbsp;<?php if($gcs_data['pain']==10)
{echo '<input type="radio" name="phyper" value="10"required/ checked="checked">';} 
else {echo '<input type="radio" name="phyper" value="10"required/>';}?> 10

</b></td>
</tr>


<td colspan="20" bgcolor="#00CCCC"><label1><strong>COMA SCALE(GCS):</strong></label1></td></tr>
<tr>
<td colspan="6"><b>Eye Opening: <br><br>
<?php if($gcs_data['c1']==4){echo '
<input type="radio" name="coma"id="control_01"  value="4"required checked="checked">
<label for="control_01">';}

else {echo '
    <input type="radio" name="coma"id="control_01"  value="4"required>
    <label for="control_01">';}
    ?>
    
Spontaneous(4)</label><br>
<?php if($gcs_data['c1']==3){echo '
<input type="radio" name="coma" id="control_02" value="3"required/ checked="checked">
<label for="control_02">';}
else {echo '
    <input type="radio" name="coma" id="control_02" value="3"required/>
    <label for="control_02">';}

?>

 To Speech(3)
    
  </label>

<br> 
<?php if($gcs_data['c1']==2){echo '
<input type="radio" name="coma" value="2"required id="control_03" checked="checked">
<label for="control_03">';}

else {echo '
    <input type="radio" name="coma" value="2"required id="control_03">
    <label for="control_03">';}

    ?>

To Pain(2)</label> 

<br> 
<?php if($gcs_data['c1']==1){echo '
<input type="radio" name="coma" value="1"required id="control_04" checked="checked">
<label for="control_04">';}

else {echo '
    <input type="radio" name="coma" value="1"required id="control_04">
    <label for="control_04">';}



?>


None(1)</label> 

</td>



<td colspan="7"><b>Best Verbal Response: <br><br>


<?php if($gcs_data['c2']==5){echo '
<input type="radio" name="coma1" value="5" id="control_11"required checked="checked">
<label for="control_11">';}

else {echo '
    <input type="radio" name="coma1" value="5" id="control_11"required>
    <label for="control_11">';}
    ?>



Oriented(5)</label> 
 <br>
 <?php if($gcs_data['c2']==4){echo '
<input type="radio" name="coma1" value="4"required id="control_12" checked="checked">
<label for="control_12">';}
else {echo '
    <input type="radio" name="coma1" value="4"required id="control_12">
    <label for="control_12">';}

    ?>
Confused(4)</label><br>

<?php if($gcs_data['c2']==3){echo '
<input type="radio" name="coma1" value="3"required id="control_13" checked="checked">
<label for="control_13">';}

else {echo '
    <input type="radio" name="coma1" value="3"required id="control_13">
    <label for="control_13">';}
?>

Words (In Appropiate)(3)</label><br>

<?php if($gcs_data['c2']==2){echo '
<input type="radio" name="coma1" value="2"required id="control_14" checked="checked">
<label for="control_14">';}

else {echo '
    <input type="radio" name="coma1" value="2"required id="control_14">
    <label for="control_14">';}

    ?>


Sounds (Incomprehensible)(2)</label><br>

<?php if($gcs_data['c2']==1){echo '
<input type="radio" name="coma1" value="1"required id="control_15" checked="checked">
<label for="control_15">';}

else {echo '
    <input type="radio" name="coma1" value="1"required id="control_15" >
    <label for="control_15">';}

    ?>


None(1)</label></td>


<td colspan="7"><b>Best Motor Response: <br>


<?php if($gcs_data['c3']==6){echo '
<input type="radio" name="coma2" value="6"required id="control_16" checked="checked">
<label for="control_16">';}

else {echo '
    <input type="radio" name="coma2" value="6"required id="control_16">
    <label for="control_16">';}

    ?>



Obeys Command(6)</label><br>

<?php if($gcs_data['c3']==5){echo '
<input type="radio" name="coma2" value="5"required id="control_17" checked="checked">
<label for="control_17">';}

else {echo '
    <input type="radio" name="coma2" value="5"required id="control_17">
    <label for="control_17">';}

    ?>


Localizing Pain(5)</label><br>

<?php if($gcs_data['c3']==4){echo '
<input type="radio" name="coma2" value="4"required id="control_18" checked="checked">
<label for="control_18">';}

else {echo '
    <input type="radio" name="coma2" value="4"required id="control_18">
    <label for="control_18">';}
?>

Withdraws tp Pain(4)</label><br>

<?php if($gcs_data['c3']==3){echo '
<input type="radio" name="coma2" value="3"required id="control_19" checked="checked">
<label for="control_19">';}

else {echo '
    <input type="radio" name="coma2" value="3"required id="control_19">
    <label for="control_19">';}

?>

Flexion to pain(3)</label><br>

<?php if($gcs_data['c3']==2){echo '
<input type="radio" name="coma2" value="2"required id="control_20" checked="checked">
<label for="control_20">';}
else {echo '
    <input type="radio" name="coma2" value="2"required id="control_20">
    <label for="control_20">';}

    ?>


Extension to Pain(2)</label><br>

<?php if($gcs_data['c3']==1){echo '
<input type="radio" name="coma2" value="1" id="control_21"required checked="checked">
<label for="control_21">';}

else {echo '
    <input type="radio" name="coma2" value="1" id="control_21"required>
    <label for="control_21">';}

    ?>


None(1)</label></td>
</tr>




<tr><td colspan="20" bgcolor="#00CCCC"><label1><strong>Presenting Complaints:</strong></label1></td>  </tr>
<tr><td colspan="20">

<textarea id="exampleTextarea" name="xl" rows="5" placeholder="Presenting Complaints:"><?php echo $gcs_data['pc'];?></textarea>

      
    
</td></tr>



<tr><td colspan="20" bgcolor="#00CCCC"><label1><strong>CO-Morbidities:</strong></label1></td>  </tr>
<tr><td colspan="20"><select name="xl2[]" multiple="multiple" class="3col active" placeholder="Select Symptoms">
<option value="<?php echo $gcs_data['pcom'];?>" selected><?php echo $gcs_data['pcom'];?></option>

<option value="N/A">N/A</option>
<option value="HTN">HTN</option>
<option value="DM">DM</option>
<option value="BA">BA</option>
<option value="CKD">CKD</option>
<option value="TB">TB</option>
<option value="Others">Others</option>
</select>
      
    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: 'Select CO-Morbidities',
            search: true,
            searchOptions: {
                'default': '-Select Symptoms-'
            },
            selectAll: true
        });

    });
</script>
</td></tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label1 for="age"><strong>Allergies:</strong></label1></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea" name="aller" rows="5" placeholder="Allergies"><?php echo $gcs_data['pall'];?></textarea></td>  </tr>	


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm Edit</button></td>
	  
	  				
</tr>
</table>




</body>

</html>
