<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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
//$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];




$query43 = "SELECT COUNT(pmrn) FROM inpatient where pmrn= '$pmrn' and discharge='';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
$query = "SELECT * from inpatient where pmrn= '$pmrn'"; 
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
$query2 = "SELECT * from bbhistory where pmrn='$pmrn'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
  
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


$psex=$_REQUEST['psex'];
$bdate=$_REQUEST['bdate'];
$btime=$_REQUEST['btime'];
$bweight=$_REQUEST['bweight'];
$busg=$_REQUEST['busg'];
$bgroup=$_REQUEST['bgroup'];
$mbirth=$_REQUEST['mbirth'];
$a1=$_REQUEST['a1'];
$a2=$_REQUEST['a2'];
$a3=$_REQUEST['a3'];
$p1=$_REQUEST['p1'];
$p2=$_REQUEST['p2'];
$p3=$_REQUEST['p3'];
$g1=$_REQUEST['g1'];
$g2=$_REQUEST['g2'];
$g3=$_REQUEST['g3'];
$aa1=$_REQUEST['aa1'];
$aa2=$_REQUEST['aa2'];
$aa3=$_REQUEST['aa3'];
$r1=$_REQUEST['r1'];
$r2=$_REQUEST['r2'];
$r3=$_REQUEST['r3'];

//$mhistory=$_REQUEST['mhistory'];
$h1=$_REQUEST['h1'];
$h2=$_REQUEST['h2'];
$h3=$_REQUEST['h3'];
$h4=$_REQUEST['h4'];
$h5=$_REQUEST['h5'];
$pre=$_REQUEST['pre'];
$xl=$_REQUEST['xl'];
$mhistory= implode(",",$xl);
$a4=$a1+$p1+$g1+$aa1+$r1;
$p4=$a2+$p2+$g2+$aa2+$r2;
$g4=$a3+$p3+$g3+$aa3+$r3;
//$aa4=$aa1+$aa2+$aa3;
//$r4=$r1+$r2+$r3;
if($res=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Birth History is Already Updated"); ';
    echo '</script>';
    }
	else{

$ins_query="insert into bbhistory (`dname`,`pname`,`pmrn`,`psex`,`pdate`,`ptime`,`bweight`,`busg`,`bgroup`,`mbirth`,`a1`,`a2`,`a3`,`p1`,`p2`,`p3`,`g1`,`g2`,`g3`,`aa1`,`aa2`,`aa3`,`r1`,`r2`,`r3`,`mhistory`,`pre`,`h1`,`h2`,`h3`,`h4`,`a4`,`p4`,`g4`,`link`,`h5`) values
('$full','$pname','$pmrn','$psex','$bdate','$btime','$bweight','$busg','$bgroup','$mbirth','$a1','$a2','$a3','$p1','$p2','$p3','$g1','$g2','$g3','$aa1','$aa2','$aa3','$r1','$r2','$r3','$mhistory','$pre','$h1','$h2','$h3','$h4','$a4','$p4','$g4','birthcer','$h5')";
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

<script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>


<script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+3)
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
    <script src="jsnew/jquery.min.js"></script>
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

<h1 align="center">Birth History</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><b>Arrival Date & Time:<b> <?php echo $row['adate'];?></td></tr>
				<tr>
						
						
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="5"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="1"><label><strong>Gender:</strong></label></td>
						<td colspan="2"><label><strong>Date Of Birth:</strong></label></td>
						<td colspan="2"><label><strong>TimeOf Birth:</strong></label></td>
						<td colspan="2"><label><strong>Birth Weight:</strong></label></td>
						<td colspan="2"><label><strong>Gestation weeks by USG / Date:</strong></label></td>
						<td colspan="2"><label><strong>Blood Group:</strong></label></td>
						<td colspan="2"><label><strong>Maturity at Birth:</strong></label></td>
						
						
						
						
						
						</tr>


<tr>				<td colspan="2"><input type="text" name="pmrn"   value="<?php echo $pm1;?>" readonly/></td>
<td colspan="5"><input type="text" name="pname"  value="<?php echo $pn1;?>" readonly/></td>
<td colspan="1"><input type="text" name="psex" required value="<?php echo $row['gender'];?>" /></td>
			<td colspan="2"><input name="bdate" id="datepicker"type="text"></td>
			<td colspan="2"><input type="text" name="btime" required value="" /></td>
			<td colspan="2"><input type="text" name="bweight" required value="" /></td>			
			<td colspan="2"><input type="text" name="busg" required value="" /></td>	

<td colspan="2"><input type="text" name="bgroup" required value="" /></td>				
<td colspan="2"><select name="mbirth" placeholder="Arrival Mode" >
						
						<option value='Term'>Term</option>
						<option value='Pre-Term'>Pre-Term</option>
						<option value='Post-Term'>Post-Term</option>				
											
						</select></td>
					 

		 
</tr>

<tr><td colspan="20" bgcolor="Lightgreen"><label><strong>APGAR Score:</strong></label></td></tr>
<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>A-Score:(Score GuideLine -  Grey or Pale="0", Pink body or Blue extremities="1", All pink="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>
						
						<tr>				
					 <td colspan="7"><input type="text" name="a1" required value="" /></td>  	

					 <td colspan="7"><input type="text" name="a2" required value="" /></td>  

              		 <td colspan="6"><input type="text" name="a3" value="" /></td>	
					 
					 </tr>
<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>P-Score:(Score GuideLine -  No Pulse="0", Below 100 BPM="1", Above 100 BPM="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>
						
						<tr>				
					 <td colspan="7"><input type="text" name="p1" required value="" /></td>  	

					 <td colspan="7"><input type="text" name="p2" required value="" /></td>  

              		 <td colspan="6"><input type="text" name="p3" value="" /></td>	
					 
					 </tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>G-Score:(Score GuideLine -  No Response="0", Grimace, Not Crying="1", Good Cry="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>
						
						<tr>				
					 <td colspan="7"><input type="text" name="g1" required value="" /></td>  	

					 <td colspan="7"><input type="text" name="g2" required value="" /></td>  

              		 <td colspan="6"><input type="text" name="g3" value="" /></td>	
					 
					 </tr>
					 
					 <tr><td colspan="20" bgcolor="#00CCCC"><label><strong>A-Score:(Score GuideLine -  Limp="0", Slight Flexion="1", Active, Flexed Extremities="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>
						
						<tr>				
					 <td colspan="7"><input type="text" name="aa1" required value="" /></td>  	

					 <td colspan="7"><input type="text" name="aa2"></td>
              		 <td colspan="6"><input type="text" name="aa3" value="" /></td>	
					 
					 </tr>
					 
							 <tr><td colspan="20" bgcolor="#00CCCC"><label><strong>R-Score:(Score GuideLine -  Not Breathing="0", Weak, Slow and Irregular="1", Strong Cry="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>		
						<tr>				
					 <td colspan="7"><input type="text" name="r1" required value="" /></td>  	

					 <td colspan="7"><input type="text" name="r2"></td>
              		 <td colspan="6"><input type="text" name="r3" value="" /></td>	
					 
					 </tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Mother's Medical History:</strong></label></td>  </tr>
<tr><td colspan="20"><select name="xl[]" multiple="multiple" class="3col active" placeholder="Select Symptoms">
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
            placeholder: 'Select Mother Medical History',
            search: true,
            searchOptions: {
                'default': '-Select Symptoms-'
            },
            selectAll: true
        });

    });
</script>
</td></tr>
<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Obstetric History:</strong></label></td>  </tr>
<tr>
<td colspan="4"><label><strong>H/O PROM:</strong></label></td>
<td colspan="4"><label><strong>Features of chorioamnionitis</strong></label></td>
<td colspan="4"><label><strong>H/O Delivary:</strong></label></td>
<td colspan="4"><label><strong>Use of Anaesthesia:</strong></label></td>
<td colspan="4"><label><strong>Delivary Place:</strong></label></td>

</tr>
<tr>
<td colspan="4" align="center"><input list="browsers1" name="h1" class="form-control" required/>
  <datalist id="browsers1">

						<option value=''>-Select -</option>
						<option value='YES'>YES</option>
						<option value='NO'>NO</option>
						<option value='Features of Chorioamnionitis'>Features of Chorioamnionitis </option>
						
				  </datalist></td>


<td colspan="4" align="center"><input list="browsers16" name="h5" class="form-control" required/>
  <datalist id="browsers16">

						<option value=''>-Select -</option>
						<option value='YES'>YES</option>
						<option value='NO'>NO</option>
						
						
				  </datalist></td>
				  
				  <td colspan="4" align="center"><input list="browsers2" name="h2" class="form-control" required/>
  <datalist id="browsers2">

						<option value=''>-Select -</option>
						<option value='Normal'>Normal</option>
						<option value='LUCS'>LUCS</option>
						<option value='Assisted Delivary'>Assisted Delivary</option>
						
				  </datalist></td>

				  
				  <td colspan="4" align="center"><select name="h3"  class="form-control" required/>
  

						
						
						<option value='GA'>GA</option>
						<option value='SAB'selected>SAB</option>
						
				  </select></td>

				  <td colspan="4" align="center"><select list="browsers4" name="h4" class="form-control" required/>
  

						
						<option value='Hospital' selected>Hospital</option>
						<option value='Home'>Home</option>
						<option value='Clinic'>Clinic</option>
						<option value='Other'>Other</option>
				  </select></td>

</tr>				  
<tr>
<td colspan="20"><label><strong>Presentation:</strong></label></td>
</tr>


<tr>
<td colspan="20"><input type="text" name="pre" required value="" /></td>  	
</tr>
<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="bhistoryprint.php?pmrn=<?php echo "$pmrn"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>
	  				
</tr>
</table>
</body>

</html>
