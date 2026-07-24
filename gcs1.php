<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mofficer"){
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
$query = "SELECT * from emergency where pmrn= '$pmrn' and eid='$eid' and discharge=''"; 
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
$pasts=$_REQUEST['pasts'];
$xl=$_REQUEST['xl'];
//$lx= implode(",",$xl);

$x2=$_REQUEST['xl2'];
$lx2= implode(",",$x2);

$zone=$_REQUEST['zone'];
$coma3=$coma+$coma1+$coma2;

if($res=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Triage Form Has Already Updated"); ';
    echo '</script>';
    }
	else{

$ins_query="insert into gcs (`pname`,`pmrn`,`gender`,`moa`,`accom`,`lcon`,`mstatus`,`ph`,`pw`,`pt`,`pp`,`pbp`,`pr`,`po`,`pb`,`pain`,`c1`,`c2`,`c3`,`c4`,`pc`,`pd`,`pcom`,`pall`,`psur`,`eid`,`ad_by_id`,`ad_by_name`) values ('$pname','$pmrn','$psex','$ma','$acc','$con2','$men','$pheight','$pweight','$ptemp','$ppluse','$pbp','$pmstatus','$po2','$bg','$phyper','$coma','$coma1','$coma2','$coma3','$xl','$other','$lx2','$aller','$pasts','$eid','$user','$fname')";
mysqli_query($con,$ins_query) or die(mysql_error());
$update="update emergency set room='$zone' where `pmrn`='$pmrn' and `eid`='$eid'";
mysqli_query($con,$update) or die(mysql_error());
	


    echo '<script language="javascript">';
    echo 'alert("Successfully Updated"); ';
    echo '</script>';
}

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

<h1 align="center">OUTPATIENT RECORD </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><b>Arrival Date & Time:<b> <?php echo $row['adate'];?></td></tr>
				<tr>
						
						
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Mode Of Arrival:</strong></label></td>
						<td colspan="3"><label><strong>Accompany:</strong></label></td>
						<td colspan="3"><label><strong>Level of Consciousness:</strong></label></td>
						<td colspan="3"><label><strong>Mental Status:</strong></label></td>
						<td colspan="1"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>


<tr>				<td colspan="2"><input type="text" name="pmrn"   value="<?php echo $pm1;?>" readonly/></td>
			<td colspan="3"><select name="ma" placeholder="Arrival Mode" >
						
						<option value='Walk In'>Walk In</option>
						<option value='Wheel Chair'>Wheel Chair</option>
						<option value='Ambulance'>Ambulance</option>				
						<option value='Trolley'>Trolley</option>				
						<option value='Others'>Others</option>													
						</select></td>
									<td colspan="3"><select name="acc" placeholder="Arrival Mode" >
						
						<option value='None'>None</option>
						<option value='Relative'>Relative</option>
						<option value='Friends'>Friends</option>				
						<option value='Others'>Others</option>													
						</select></td>
						<td colspan="3"><select name="con" placeholder="Arrival Mode" >
						
						<option value='Conscious'>Conscious</option>
						<option value='Semi/Conscious'>Semi/Conscious</option>
						<option value='unconscious'>unconscious</option>				

						</select></td>
						<td colspan="3"><select name="men" placeholder="Arrival Mode" >
						
						<option value='Oriented'>Oriented</option>
						<option value='Aggressive'>Aggressive</option>
						<option value='Confused'>Confused</option>				
						<option value='Irritable'>Irritable</option>				
						<option value='Restless'>Restless</option>										
						</select></td>
					 <td colspan="1"><input type="text" name="psex" required value="<?php echo $row['gender'];?>" /></td>

					 <td colspan="5"><input type="text" name="pname"  value="<?php echo $pn1;?>" readonly/></td>

		 
</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Personal Particulars / History :</strong></label></td></tr>

		
		<tr>
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="2"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Patient's Height (CM):</strong></label></td>
						<td colspan="2"><label><strong>Patient's Weight (KG):</strong></label></td>
						<td colspan="2"><label><strong>Patient's Temperature(C):</strong></label></td>		
						<td colspan="2"><label><strong>Patient's Pluse:</strong></label></td>
						<td colspan="2"><label><strong>BP</strong></label></td>	
						<td colspan="2"><label><strong>Respiration(bpm)</strong></label></td>		
						<td colspan="2"><label><strong>O2 Sat%</strong></label></td>		
						<td colspan="2"><label><strong>Blood Glucosemmol/l:</strong></label></td>
						</tr>
						
						<tr>				
					 <td colspan="2"><input type="text" name="page" required value="<?php echo $row['age'];?>" /></td>  	

					 <td colspan="2"><input type="text" name="pphone" required value="<?php echo $row['pphone'];?>" /></td>  

              		 <td colspan="2"><input type="text" name="pheight" value="" /></td>	
					 <td colspan="2"><input type="text" name="pweight" required value="" /></td>    
					 <td colspan="2"><input type="text" name="ptemp" value="" /></td>  
             		 <td colspan="2"><input type="text" name="ppluse"style="background-color:skyblue;" value="" /></td>					 	
					 <td colspan="2"><input type="text" name="pbp" style="background-color:skyblue;"required value="" /></td>
					<td colspan="2"><input type="text" name="pmstatus"  value="" /></td>
					 <td colspan="2"><input type="text" name="po2" required value="" /></td>  
					 <td colspan="2"><input type="text" name="bg" required value="" /></td>
					 </tr>



<tr>
<td colspan="20" bgcolor="#00CCCC"><label><strong>Pain Score:</strong></label></td></tr>
<tr>
<td colspan="20"><b><img src="pain/0.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="0"required/> 0 &nbsp;&nbsp;<img src="pain/1.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="1"checked="checked"required/> 1 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/2.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="2"checked="checked"required/> 2 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/3.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="3"checked="checked"required/> 3 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/4.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="4"checked="checked"required/> 4 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/5.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="5"checked="checked"required/> 5 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/6.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="6"checked="checked"required/> 6 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/7.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="7"checked="checked"required/> 7 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/8.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="8"checked="checked"required/> 8 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/9.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="9"checked="checked"required/> 9 &nbsp;&nbsp;&nbsp;&nbsp;<img src="pain/10.jpg" title="test" width="40" height="50" />&nbsp;<input type="radio" name="phyper" value="10"checked="checked"required/> 10 &nbsp;&nbsp;</b></td>
</tr>


<td colspan="20" bgcolor="#00CCCC"><label><strong>COMA SCALE(GCS):</strong></label></td></tr>
<tr>
<td colspan="6"><b>Eye Opening: <br><input type="radio" name="coma" value="4"required/> Spontaneous(4) &nbsp;<input type="radio" name="coma" value="3"required/> To Speech(3) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="coma" value="2"required/> To Pain(2) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="coma" value="1"required/> None(1) </td>



<td colspan="7"><b>Best Verbal Response: <br><input type="radio" name="coma1" value="5"required/> Oriented(5) &nbsp;&nbsp;&nbsp;<input type="radio" name="coma1" value="4"required/> Confused(4) &nbsp;<input type="radio" name="coma1" value="3"required/> Words (In Appropiate)(3)&nbsp;&nbsp;<input type="radio" name="coma1" value="2"required/>Sounds (Incomprehensible)(2)&nbsp;<input type="radio" name="coma1" value="1"required/> None(1)</td>


<td colspan="7"><b>Best Motor Response: <br><input type="radio" name="coma2" value="6"required/> Obeys Command(6) &nbsp;&nbsp;&nbsp;<input type="radio" name="coma2" value="5"required/> Localizing Pain(5) &nbsp;<input type="radio" name="coma2" value="4"required/> Withdraws tp Pain(4) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="coma2" value="3"required/> Flexion to pain(3)&nbsp;<input type="radio" name="coma2" value="2"required/> Extension to Pain(2)&nbsp;<input type="radio" name="coma2" value="1"required/> None(1)</td>
</tr>





<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Presenting Complaints:</strong></label></td>  </tr>
<tr><td colspan="20">

<textarea id="exampleTextarea" name="xl" rows="5" placeholder="Presenting Complaints:"></textarea>

      
    
</td></tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label for="age"><strong>Details Complaints:</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea" name="other" rows="5" placeholder="Details Complaints:"></textarea></td>  </tr>	

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>CO-Morbidities:</strong></label></td>  </tr>
<tr><td colspan="20"><select name="xl2[]" multiple="multiple" class="3col active" placeholder="Select Symptoms">
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

<tr><td colspan="20" bgcolor="#00CCCC"><label for="age"><strong>Allergies:</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea" name="aller" rows="5" placeholder="Allergies"></textarea></td>  </tr>	


<tr><td colspan="20" bgcolor="#00CCCC"><label for="age"><strong>Past Medical / Surgical History:</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea" name="pasts" rows="5" placeholder="Past Medical / Surgical History"></textarea></td>  </tr>	
<tr><td colspan="20"><select name="zone" placeholder="Select Zone" >
						<option value=''>--Select Zone--</option>
						<option value='Green'>Green</option>
						<option value='Yellow'>Yellow</option>
						<option value='Red'>Red</option>				
								
						</select></td></tr>
<tr><td colspan="20"></td></tr>
<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="p4new.php?pmrn=<?php echo "$pm"; ?>&dname=<?php echo "$pd"; ?>&date=<?php echo "$pdate"; ?>&eid=<?php echo "$count1"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>
</table>
</body>

</html>
