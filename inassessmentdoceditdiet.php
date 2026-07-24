<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="diet"){
      header('Location: login2.php?err=2');
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
$assdate=date('Y-m-d');
$asstime=date('d/m/Y H:i:s');
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



//$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

$query11 = "SELECT * from dietass where pmrn= '$pmrn' and eid='$eid'"; 
$result11 = mysqli_query($con, $query11) or die ( mysqli_error());
$row11 = mysqli_fetch_assoc($result11);



$query43 = "SELECT COUNT(pmrn) FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
$query = "SELECT * from inpatient where pmrn= '$pmrn' and eid='$eid' and discharge=''"; 
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
$query2 = "SELECT * from dietass where pmrn='$pmrn' and eid='$eid'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
  
?>


<?php
 
require('db1.php');
//$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

$dname =$full;
$eid =$eid;
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$psex=$_REQUEST['psex'];
$page=$_REQUEST['page'];
$pphone=$_REQUEST['pphone'];
$ward=$_REQUEST['ward'];
$bed=$_REQUEST['bed'];

$adate=$_REQUEST['adate'];
$astime=$_REQUEST['astime'];
$ph=$_REQUEST['ph'];
$pw=$_REQUEST['pw'];
$rwc=$_REQUEST['rwc'];
$go=$_REQUEST['go'];
$gu=$_REQUEST['gu'];
$nrd=$_REQUEST['nrd'];
$fa=$_REQUEST['fa'];
$fm=$_REQUEST['fm'];
$cd=$_REQUEST['cd'];
$sd=$_REQUEST['sd'];
$al=$_REQUEST['al'];
$drc=$_REQUEST['drc'];
$dpd=$_REQUEST['dpd'];

$pbmi=("$pw" / "$ph"/"$ph") *10000;


if($res=mysqli_num_rows($result2)<0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!No Patient Assessment Done before to edit"); ';
    echo '</script>';
    }
	else{

$update="update dietass set atime='$astime',ph='$ph',pw='$pw',rwc='$rwc',go='$go',gu='$gu',nrd='$nrd',fa='$fa',fm='$fm',cd='$cd',sd='$sd',al='$al',drc='$drc',dpd='$dpd',user='$fullname',pbmi='$pbmi',assedit='$asstime' where pmrn='$pmrn' and eid='$eid'";

mysqli_query($con,$update) or die(mysql_error());
	


    echo '<script language="javascript">';
    echo 'alert("Successfully Updated"); ';
    echo '</script>';
}

}

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>

						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="3"><label><strong>Height:</strong></label></td>
						<td colspan="5"><label><strong>Weight:</strong></label></td>
						
						
						</tr>


<tr>				<td colspan="5"><input type="text" name="pmrn"   value="<?php echo $row11['pmrn'];?>" readonly/></td>

					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $row11['psex'];?>" readonly/></td>

					 <td colspan="5"><input type="text" name="pname"  value="<?php echo $row11['pname'];?>" readonly/></td>
					  <td colspan="3"><input type="text" name="ph" required value="<?php echo $row11['ph'];?>" /></td>

					 <td colspan="5"><input type="text" name="pw"  value="<?php echo $row11['pw'];?>" /></td>

		 
</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Personal Particulars / History :</strong></label></td></tr>

		
		<tr>
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="2"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Ward:</strong></label></td>
						<td colspan="2"><label><strong>Bed:</strong></label></td>
					
						<td colspan="4"><label><strong>Admission Date & Time:</strong></label></td>
						<td colspan="4"><label><strong>Assessment Time</strong></label></td>	
						
						</tr>
						
						<tr>				
					 <td colspan="2"><input type="text" name="page" required value="<?php echo $row11['page'];?>" readonly/></td>  	

					 <td colspan="2"><input type="text" name="pphone" required value="<?php echo $row11['pphone'];?>" readonly/></td>  

              		 <td colspan="2"><input type="text" name="ward" value="<?php echo $row11['ward'];?>" readonly/></td>	
					 <td colspan="2"><input type="text" name="bed" required value="<?php echo $row11['bed'];?>" readonly/></td>    
					 
             		 <td colspan="4"><input type="text" name="adate"style="background-color:skyblue;" value="<?php echo $row11['adate'];?>" readonly/></td>					 	
					 <td colspan="4"><input type="text" name="astime" style="background-color:skyblue;"required value="<?php echo $row11['atime'];?>" /></td>
					
					 </tr>




<tr><td colspan="4" bgcolor="#00CCCC"><label><strong>Recent Weight Changes:</strong></label></td>  
<td colspan="4" bgcolor="#00CCCC"><label><strong>Grading Of Obesity:</strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><label><strong>Grading Of Undernutration:</strong></label></td>
<td colspan="4" bgcolor="#00CCCC"><label><strong>Nutrition Related Diagnosis:</strong></label></td>

</tr>

<tr><td colspan="4"><select name="rwc" placeholder="Admitted From" >
						<option value='<?php echo $row11['rwc'];?>' selected><?php echo $row11['rwc'];?></option>
						<option value='No Change'>No Change</option>
						<option value='Weight Gain'>Weight Gain</option>
						<option value='Weight Loss'>Weight Loss</option>
												
						</select></td> 	
						
						
						  

<td colspan="4"><select name="go" placeholder="Admitted From" >
						<option value='<?php echo $row11['go'];?>' selected><?php echo $row11['go'];?></option>
						<option value='Not Obese'>Not Obese</option>
						<option value='Grade 1'>Grade 1</option>
						<option value='Grade 11'>Grade 11</option>
						<option value='Grade 111'>Grade 111</option>
						
												
						</select></td>

<td colspan="4"><select name="gu" placeholder="Admitted From" >
						<option value='<?php echo $row11['gu'];?>' selected><?php echo $row11['gu'];?></option>
						<option value='Normal'>Normal</option>
						<option value='Mild'>Mild</option>
						<option value='Moderate'>Moderate</option>
						<option value='Severe'>Severe</option>
						
												
						</select></td>
						
						<td colspan="4"><select name="nrd" placeholder="Admitted From" >
						<option value='<?php echo $row11['nrd'];?>' selected><?php echo $row11['nrd'];?></option>
						<option value='Malnutrition'>Malnutrition</option>
						<option value='Sepsis'>Sepsis</option>
						<option value='Diabetes'>Diabetes</option>
						<option value='Dysphasia'>Dysphasia</option>
						<option value='HTN'>HTN</option>
						<option value='Unconscious'>Unconscious</option>
						<option value='Cardiac'>Cardiac</option>
						<option value='Renal'>Renal</option>
						<option value='Hepatic Diet Restriction'>Hepatic Diet Restriction</option>
						<option value='RTA'>RTA</option>
						
												
						</select></td>

						</tr>	

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Food Allergies:</strong></label></td>  </tr>

<tr><td colspan="20"><textarea id="exampleTextarea" name="fa" rows="5" placeholder="Chief Complaints"><?php echo $row11['fa'];?></textarea></td>  </tr>	

<tr><td colspan="5" bgcolor="#00CCCC"><label for="age"><strong>Feeding Mode:</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label for="age"><strong>Chewing Difficulties:</strong></label></td>

<td colspan="5" bgcolor="#00CCCC"><label for="age"><strong>Swallowing Difficulties:</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label for="age"><strong>Activity Level:</strong></label></td>

</tr>
<tr><td colspan="5"><select name="fm" placeholder="Admitted From" >
						<option value='<?php echo $row11['fm'];?>' selected><?php echo $row11['fm'];?></option>
						<option value='Oral'>Oral</option>
						<option value='NPO'>NPO</option>
						<option value='Tube Feeding'>Tube Feeding</option>
												
						</select></td> 	

						<td colspan="5"><select name="cd" placeholder="Admitted From" >
						<option value='<?php echo $row11['cd'];?>' selected><?php echo $row11['cd'];?></option>
						<option value='Yes'>YES</option>
						<option value='NO'>NO</option>
						
												
						</select></td> 	
						
						<td colspan="5"><select name="sd" placeholder="Admitted From" >
						<option value='<?php echo $row11['sd'];?>' selected><?php echo $row11['sd'];?></option>
						<option value='Yes'>YES</option>
						<option value='NO'>NO</option>
						
												
						</select></td>
						<td colspan="5"><select name="al" placeholder="Admitted From" >
						<option value='<?php echo $row11['al'];?>' selected><?php echo $row11['al'];?></option>
						<option value='Very Active'>Very Active</option>
						<option value='Moderate Active'>Moderate Active</option>
						<option value='In Active'>In Active</option>
						
												
						</select></td>
</tr>








<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Diet Recommended By Clinicial:</strong></label></td>  </tr>

<tr><td colspan="20"><textarea id="exampleTextarea" name="drc" rows="5" placeholder="General Examination"><?php echo $row11['drc'];?></textarea></td>  </tr>	



<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Diet Plan By Dietician:</strong></label></td>  </tr>

<tr><td colspan="20"><textarea id="exampleTextarea" name="dpd" rows="5" placeholder="General Examination"><?php echo $row11['dpd'];?></textarea></td>  </tr>	




<tr>
		<td colspan="10"><button type="submit" name="Submit">EDIT</button></td>
	  <td colspan="10"><a target='_blank' href="docassessprint.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>
</table>
</body>

</html>
