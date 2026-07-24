<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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

?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



//$id=$_REQUEST['id'];
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];




$query = "SELECT * from ot where pmrn= '$pmrn' and id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn1= $row['pname'];
$pm1= $row['pmrn'];
$pp1= $row['pphone'];  
//$pd= $row['dname'];
$pdate1= $row['adate'];
//$pa1= $row['padd'];
$ps1= $row['psex'];
//$ph= $row['height'];
//$pw= $row['weight'];
//$pt= $row['temp'];
//$pa= $row['padd'];
$query2 = "SELECT * from friskot where pmrn='$pmrn' and eid='$id'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
  
?>


<?php
 
require('db1.php');
//$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{
	$fcong1=$_REQUEST['fcong1'];
	$fcong2=$_REQUEST['fcong2'];
	$fcong3=$_REQUEST['fcong3'];
	$fmob1=$_REQUEST['fmob1'];
	$fmob2=$_REQUEST['fmob2'];
	$fmob3=$_REQUEST['fmob3'];
	$fpc=$_REQUEST['fpc'];
	$fmedi=$_REQUEST['fmedi'];
	$eli=$_REQUEST['eli'];	
	$fallhistory=$_REQUEST['fallhistory'];
	
	$fage=$_REQUEST['fage'];
	$astime=$_REQUEST['astime'];
	$date=date('d/m/Y');
	
	$fcong=$fcong1+$fcong2+$fcong3;
	$fmob=$fmob1+$fmob2+$fmob3;
	$all=$fmob+$fcong+$fpc+$fmedi+$eli+$fallhistory+$fage;
	
if($res=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Assessment Form is Already Updated"); ';
    echo '</script>';
    }
	else{

	
	$ins_query6="insert into friskot (`pmrn`,`eid`,`fscore`,`date`,`udone`,`astime`) values ('$pmrn','$id','$all','$date','$user','$astime')";
mysqli_query($con,$ins_query6) or die(mysql_error());

	echo '<script language="javascript">';
    echo 'alert("TOTAL FALL RISK SCORE IS - '.$all.'" ); ';
    echo '</script>';
	//echo $all;

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

<h1 align="center">Fall risk assessment Form (John Hopkins Tool)</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><b>Arrival Date & Time:<b> <?php echo $row['adate'];?></td></tr>
				<tr>
						
						
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>

						<td colspan="1"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="6"><label><strong>Contact Person's Name:</strong></label></td>
						<td colspan="3"><label><strong>Relation:</strong></label></td>
						<td colspan="3"><label><strong>Contact Number:</strong></label></td>
						
						</tr>


<tr>				<td colspan="2"><input type="text" name="pmrn"   value="<?php echo $pm1;?>" readonly/></td>

					 <td colspan="1"><input type="text" name="psex" required value="<?php echo $row['psex'];?>" /></td>

					 <td colspan="5"><input type="text" name="pname"  value="<?php echo $pn1;?>" readonly/></td>
					  <td colspan="6"><input type="text" name="cname"  value="<?php echo $pn1;?>" ></td>
					   <td colspan="3"><input type="text" name="crelation"  value="<?php echo $pn1;?>" ></td>
					    <td colspan="3"><input type="text" name="cphone"  value="<?php echo $pn1;?>" ></td>

		 
</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Personal Particulars / History :</strong></label></td></tr>

		
		<tr>
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="2"><label><strong>Phone NO:</strong></label></td>
						
						<td colspan="4"><label><strong>Admitted From:</strong></label></td>		
						<td colspan="4"><label><strong>Admission Date & Time:</strong></label></td>
						<td colspan="4"><label><strong>Assessment Time</strong></label></td>	
						
						</tr>
						
						<tr>				
					 <td colspan="2"><input type="text" name="page" required value="<?php echo $row['page'];?>" /></td>  	

					 <td colspan="2"><input type="text" name="pphone" required value="<?php echo $row['pphone'];?>" /></td>  

              		 
					 <td colspan="4"><select name="aform" placeholder="Admitted From" >
						
						<option value='OPD'>OPD</option>
						<option value='Emergency'>Emergency</option>
						<option value='Walkin'>Walkin</option>
												
						</select></td>
             		 <td colspan="4"><input type="text" name="adate"style="background-color:skyblue;" value="<?php echo $row['adate'];?>" /></td>					 	
					 <td colspan="4"><input type="text" name="astime" style="background-color:skyblue;"required value="" /></td>
					

					</tr>
<tr><td colspan="20" bgcolor="lightgreen" align="center"><label><strong>Fall risk assessment Form (John Hopkins Tool)  :</strong></label></td></tr>
					<tr>
					<td colspan="20"><b>Age: <br><br><input type="radio" name="fage" value="1"required> 60-69 Years (Score- 1) &nbsp;<input type="radio" name="fage" value="2"required> 70-79 Years (Score- 2) &nbsp;&nbsp;<input type="radio" name="fage" value="3"required> Grater than or Equal of 80 Years (Score- 3) &nbsp;&nbsp;<input type="radio" name="fage" value="0"required checked="checked"> N/A (0 Points) </td>
					</tr>
					<tr>
					<td colspan="20"><b>Fall History: <br><br><input type="radio" name="fallhistory" value="5"required> One fall within 6 months before admission (5 points) &nbsp;&nbsp;<input type="radio" name="fallhistory" value="0"required checked="checked"> N/A (0 points) </td>
					
					</tr>

<tr>
					<td colspan="20"><b>Elimination, Bowel and Urine: <br><br><input type="radio" name="eli" value="2"required> Incontinence (2 points) &nbsp;<input type="radio" name="eli" value="2"required> Urgency or frequency (2 points)  &nbsp;&nbsp;<input type="radio" name="eli" value="4"required> Urgency/frequency and incontinence (4 points)&nbsp;&nbsp;<input type="radio" name="eli" value="0"required checked="checked"> N/A (0 points) </td>
					</tr>
					<tr>
					<td colspan="20"><b>Medications: Includes PCA/opiates, anticonvulsants, anti-hypertensives, diuretics, hypnotics,
laxatives, sedatives, and psychotropics  <br><br><input type="radio" name="fmedi" value="3"required> On 1 high fall risk drug (3 points) &nbsp;&nbsp;&nbsp; <input type="radio" name="fmedi" value="5"required> On 2 or more high fall risk drugs (5 points)&nbsp;&nbsp;&nbsp; <input type="radio" name="fmedi" value="7"required> Sedated procedure within past 24 hours (7 points)&nbsp;&nbsp;<input type="radio" name="fmedi" value="0"required checked="checked"> N/A (0 points)   </td>
					
					</tr>

					<tr>
					<td colspan="20"><b>Patient Care Equipment: Any equipment that tethers patient (e.g., IV infusion, chest tube, indwelling
catheter, SCDs, etc.)   <br><br><input type="radio" name="fpc" value="1"required> One present (1 point)  &nbsp;&nbsp;&nbsp; <input type="radio" name="fpc" value="2"required> Two present (2 points)&nbsp;&nbsp;&nbsp; <input type="radio" name="fpc" value="3"required>3 or more present (3 points)&nbsp;&nbsp;<input type="radio" name="fpc" value="0"required checked="checked"> N/A (0 points)</td>
					
					</tr>

					
					<tr>
					<td colspan="20"><b>Mobility (multi-select; choose all that apply and add points together)

					
					</tr>

		<tr>

<td colspan="6"><input type="radio" name="fmob1" value="2" required> Requires assistance or supervision for mobility, transfer, or ambulation (2 points)<br><input type="radio" name="fmob1" checked="checked"value="0"required> N/A</td>
<td colspan="8"><input type="radio" name="fmob2" value="2" required> Unsteady gait (2 points)<br><input type="radio" name="fmob2" checked="checked"value="0"required> N/A</td>						
<td colspan="6"><input type="radio" name="fmob3" value="2" required> Visual or auditory impairment affecting mobility (2 points)<br><input type="radio" name="fmob3" checked="checked"value="0"required> N/A</td>												
						
</tr>			
			

		<tr>
					<td colspan="20"><b>Cognition (multi-select; choose all that apply and add points together)

					
					</tr>

		<tr>
<td colspan="6"><input type="radio" name="fcong1" value="1" required> Altered awareness of immediate physical environment (1 point)<br><input type="radio" name="fcong1" checked="checked"value="0"required> N/A</td>						
<td colspan="8"><input type="radio" name="fcong2" value="2" required> Impulsive (2 points)<br><input type="radio" name="fcong2" checked="checked"value="0"required> N/A</td>					
<td colspan="6"><input type="radio" name="fcong3" value="4" required> Lack of understanding of one's physical and cognitive limitations (4 points)<br><input type="radio" name="fcong3" checked="checked"value="0"required> N/A</td>						
						

</tr>					
					
<tr><td colspan="20" bgcolor="lightblue"></td></tr><tr><td colspan="20"bgcolor="lightblue"></td></tr>
					
<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  
	  				
</tr>
</table>
</body>

</html>

