<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="chemo"){
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
$time=date('h:m:s');
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



//$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];




$query43 = "SELECT COUNT(pmrn) FROM chemopapp where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
$query = "SELECT * from chemopapp where pmrn= '$pmrn' and eid='$eid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn1= $row['pname'];
$pm1= $row['pmrn'];
$pp1= $row['pphone'];  
//$pd= $row['dname'];
$pdate1= $row['adate'];
$pa1= $row['padd'];
$ps1= $row['psex'];
//$ph= $row['height'];
//$pw= $row['weight'];
//$pt= $row['temp'];
//$pa= $row['padd'];
$query2 = "SELECT * from nurseassessechemo where pmrn='$pmrn' and eid='$eid'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());

  
?>


<?php
 
require('db1.php');
//$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$psex = $_REQUEST['psex'];
$cname = $_REQUEST['cname'];
$crelation = $_REQUEST['crelation'];
$cphone = $_REQUEST['cphone'];
$page = $_REQUEST['page'];
$pphone = $_REQUEST['pphone'];
//$ward = $_REQUEST['ward'];
//$bed = $_REQUEST['bed'];
$aform = $_REQUEST['aform'];
$adate = $_REQUEST['adate'];
$astime = $_REQUEST['astime'];
$ma = $_REQUEST['ma'];
$acc = $_REQUEST['acc'];
$shistory = $_REQUEST['shistory'];
$language = $_REQUEST['language'];
$nip = $_REQUEST['nip'];
$edus = $_REQUEST['edus'];
$cpatient = $_REQUEST['cpatient'];
$csite = $_REQUEST['csite'];
$cposition = $_REQUEST['cposition'];
$ctaken = $_REQUEST['ctaken'];

$valueableb = $_REQUEST['valueableb'];
$bodys = $_REQUEST['bodys'];
$du = $_REQUEST['du'];
$remarks = $_REQUEST['remarks'];
$xl2=$_REQUEST['xl2'];
$comor= implode(",",$xl2);


if($res=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Assessment Form is Already Updated"); ';
    echo '</script>';
    }
	else{

$ins_query="insert into nurseassessechemo
(`pname`,`pmrn`,`psex`,`cname`,`crelation`,`cphone`,`page`,`pphone`,`aform`,`adate`,`astime`,`ma`,`acc`,`shistory`,`language`,`nip`,`edus`,`comor`,`valueableb`,`bodys`,`du`,`remarks`,`eid`,`cpatient`,`csite`,`cposition`,`ctaken`,`user`) values
('$pname','$pmrn','$psex','$cname','$crelation','$cphone','$page','$pphone','$aform','$adate','$astime','$ma','$acc','$shistory','$language','$nip','$edus','$comor','$valueableb','$bodys','$du','$remarks','$eid','$cpatient','$csite','$cposition','$ctaken','$full')";
mysqli_query($con,$ins_query) or die(mysql_error());
	


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

<h1 align="center">Nurse Assessment </h1>

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
					  <td colspan="6"><input type="text" name="cname"  value="" required></td>
					   <td colspan="3"><input type="text" name="crelation"  value="" required></td>
					    <td colspan="3"><input type="text" name="cphone"  value="" required></td>

		 
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
					 <td colspan="4"><input type="text" name="astime" style="background-color:skyblue;"required value="<?php echo $time;?>" /></td>
					
					 </tr>


<tr>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Mode Of Arrival:</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Accompany:</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Source of history :</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Language:</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Necessity of Interpreter :</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Educational status :</strong></label></td>
</tr>

<tr>
<td colspan="3"><select name="ma" placeholder="Arrival Mode" >
						
						<option value='Walk In'>Walk In</option>
						<option value='Wheel Chair'>Wheel Chair</option>
						<option value='Ambulance'>Ambulance</option>				
						<option value='Trolley'>Trolley</option>				
						<option value='Others'>Others</option>													
						</select></td>
<td colspan="3"><select name="acc" placeholder="Arrival Mode" >
						<option value='None'>None</option>
						
						<option value='Parents'>Parents</option>
						<option value='Spouse'>Spouse</option>				
						<option value='Others'>Others</option>													
						</select></td>
						
						<td colspan="3"><select name="shistory" placeholder="" >
						
						<option value='Patient'>Patient</option>
						<option value='Relative'>Relative</option>
						<option value='Friends'>Friends</option>				
						<option value='Others'>Others</option>													
						</select></td>
						
						<td colspan="3"><select name="language" placeholder="" >
						
						<option value='Bangla'>Bangla</option>
						<option value='English'>English</option>
						
						<option value='Others'>Others</option>													
						</select></td>
						
						<td colspan="3"><select name="nip" placeholder="" >
						
						<option value='NO'>NO</option>
						<option value='Yes'>Yes</option>
						
						</select></td>
						
						<td colspan="3"><select name="edus" placeholder="" >
						
						<option value='Illiterate'>Illiterate</option>
						<option value='Primary'>Primary</option>
						<option value='Graduate'>Graduate</option>				
						<option value='Post Graduate'>Post Graduate</option>													
						</select></td>
</tr>

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

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Valuable Belongings:</strong></label></td>  </tr>

<tr><td colspan="20"><textarea id="exampleTextarea" name="valueableb" rows="5" placeholder="Valuable Belongings"></textarea></td>  </tr>	

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Body/safety search:</strong></label></td>  </tr>

<tr><td colspan="20"><textarea id="exampleTextarea" name="bodys" rows="5" placeholder="Body/safety search:"></textarea></td>  </tr>	

<tr>
<td colspan="10" bgcolor="#00CCCC"><label><strong>Decubitus Ulcer</strong></label></td>
<td colspan="10" bgcolor="#00CCCC"><label><strong>Remarks:</strong></label></td>
</tr>
<tr>

<td colspan="10"><select name="du" placeholder="" >
						
						<option value='Yes'>Yes</option>
						<option value='No'>No</option>
						</select></td>
						
						<td colspan="10"><input type="text" name="remarks" style="background-color:skyblue;"required value="" /></td>
</tr>

<tr>
<td colspan="5" bgcolor="#00CCCC"><label><strong>Correct Patient</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label><strong>Correct Site / Procedure:</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label><strong>Correct Position:</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label><strong>Consent Taken:</strong></label></td>
</tr>
<tr>

<td colspan="5"><input type="radio" name="cpatient" value="YES"checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="phyper" value="NO"> NO &nbsp;&nbsp;</td>
<td colspan="5"><input type="radio" name="csite" value="YES"checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="phyper" value="NO"> NO &nbsp;&nbsp;</td>
<td colspan="5"><input type="radio" name="cposition" value="YES"checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="phyper" value="NO"> NO &nbsp;&nbsp;</td>
<td colspan="5"><input type="radio" name="ctaken" value="YES" checked="checked"required> YES &nbsp;&nbsp;<input type="radio" name="phyper" value="NO"> NO &nbsp;&nbsp;</td>
						
						
</tr>



<tr><td colspan="20" bgcolor="lightgreen"><h3><a target='_blank' href="fallriskendo?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"?>">Fall Risk Assessment(John Hopkins Tool)  </a></td></tr>					






<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="nurseassessmentchemoprint.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>		</tr>
	  				
</tr>
</table>
</body>

</html>
