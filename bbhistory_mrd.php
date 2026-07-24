<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
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
$row2 = mysqli_fetch_assoc($result2);  
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
$pre=$_REQUEST['pre'];
$xl=$_REQUEST['xl'];
$mhistory= implode(",",$xl);
$a4=$a1+$a2+$a3;
$p4=$p1+$p2+$p3;
$g4=$g1+$g2+$g3;
$aa4=$aa1+$aa2+$aa3;
$r4=$r1+$r2+$r3;
if($res=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Birth History Has Already Updated"); ';
    echo '</script>';
    }
	else{

$ins_query="insert into bbhistory (`dname`,`pname`,`pmrn`,`psex`,`pdate`,`ptime`,`bweight`,`busg`,`bgroup`,`mbirth`,`a1`,`a2`,`a3`,`p1`,`p2`,`p3`,`g1`,`g2`,`g3`,`aa1`,`aa2`,`aa3`,`r1`,`r2`,`r3`,`mhistory`,`pre`,`h1`,`h2`,`h3`,`h4`,`a4`,`p4`,`g4`,`aa4`,`r4`,`link`) values
('$full','$pname','$pmrn','$psex','$bdate','$btime','$bweight','$busg','$bgroup','$mbirth','$a1','$a2','$a3','$p1','$p2','$p3','$g1','$g2','$g3','$aa1','$aa2','$aa3','$r1','$r2','$r3','$mhistory','$pre','$h1','$h2','$h3','$h4','$a4','$p4','$g4','$aa4','$r4','birthcer')";
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

<h1 align="center">Birth History</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				


				
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


<tr>				<td colspan="2"><?php echo $row2['pmrn'];?></td>
<td colspan="5"><?php echo $row2['pname'];?></td>
<td colspan="1"><?php echo $row2['psex'];?></td>
			<td colspan="2"><?php echo $row2['pdate'];?></td>
			<td colspan="2"><?php echo $row2['ptime'];?></td>
			<td colspan="2"><?php echo $row2['bweight'];?></td>			
			<td colspan="2"><?php echo $row2['busg'];?></td>	

<td colspan="2"><?php echo $row2['bgroup'];?></td>				
<td colspan="2"><?php echo $row2['mbirth'];?></td>
					 

		 
</tr>

<tr><td colspan="20" bgcolor="Lightgreen"><label><strong>APGAR Score:</strong></label></td></tr>
<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>A-Score:(Score GuideLine -  Grey or Pale="0", Pink body or Blue extremities="1", All pink="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>
						
						<tr>				
					 <td colspan="7"><?php echo $row2['a1'];?></td>  	

					 <td colspan="7"><?php echo $row2['a2'];?></td>  

              		 <td colspan="6"><?php echo $row2['a3'];?></td>	
					 
					 </tr>
<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>P-Score:(Score GuideLine -  No Pulse="0", Below 100 BPM="1", Above 100 BPM="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>
						
						<tr>				
					 <td colspan="7"><?php echo $row2['p1'];?></td>  	

					 <td colspan="7"><?php echo $row2['p2'];?></td>  

              		 <td colspan="6"><?php echo $row2['p3'];?></td>	
					 
					 </tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>G-Score:(Score GuideLine -  No Response="0", Grimace, Not Crying="1", Good Cry="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>
						
						<tr>				
					 <td colspan="7"><?php echo $row2['g1'];?></td>  	

					 <td colspan="7"><?php echo $row2['g2'];?></td>  

              		 <td colspan="6"><?php echo $row2['g3'];?></td>	
					 
					 </tr>
					 
					 <tr><td colspan="20" bgcolor="#00CCCC"><label><strong>A-Score:(Score GuideLine -  Limp="0", Slight Flexion="1", Active, Flexed Extremities="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>
						
						<tr>				
					 <td colspan="7"><?php echo $row2['aa1'];?></td>  	

					 <td colspan="7"><?php echo $row2['aa2'];?></td>
              		 <td colspan="6"><?php echo $row2['aa3'];?></td>	
					 
					 </tr>
					 
							 <tr><td colspan="20" bgcolor="#00CCCC"><label><strong>R-Score:(Score GuideLine -  Not Breathing="0", Weak, Slow and Irregular="1", Strong Cry="2")</strong></label></td></tr>
		
		<tr>
						
						<td colspan="7"><label><strong>1 Minute:</strong></label></td>
						<td colspan="7"><label><strong>5 Minute:</strong></label></td>
						<td colspan="6"><label><strong>10 Minute:</strong></label></td>
						
						
						</tr>		
						<tr>				
					 <td colspan="7"><?php echo $row2['r1'];?></td>  	

					 <td colspan="7"><?php echo $row2['r2'];?></td>
              		 <td colspan="6"><?php echo $row2['r3'];?></td>	
					 
					 </tr>
					 <tr><td colspan="20" bgcolor="Lightgreen"><label><strong>Total APGAR Score:</strong></label></td></tr>
					 <td colspan="7"><label><strong>1 Minute:&nbsp;&nbsp</strong></label><font size="4.5" color="#FF0000"><b><?php echo $row2['a4'];?><b></td>
						<td colspan="7"><label><strong>5 Minute:&nbsp;&nbsp</strong></label><font size="4.5" color="#FF0000"><b><?php echo $row2['p4'];?><b></td>
						<td colspan="6"><label><strong>10 Minute:&nbsp;&nbsp</strong></label><font size="4.5" color="#FF0000"><b><?php echo $row2['g4'];?><b></td><br>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Mother's Medical History:</strong></label></td>  </tr>
<tr><td colspan="20"><?php echo $row2['mhistory'];?>
</td></tr>
<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Obstetric History:</strong></label></td>  </tr>
<tr>
<td colspan="5"><label><strong>H/O PROM:</strong></label></td>
<td colspan="5"><label><strong>H/O Delivary:</strong></label></td>
<td colspan="5"><label><strong>Use of Anaesthesia:</strong></label></td>
<td colspan="5"><label><strong>Delivary Place:</strong></label></td>
</tr>
<tr>
<td colspan="5" align="center"><?php echo $row2['h1'];?></td>
				  
				  <td colspan="5" align="center"><?php echo $row2['h2'];?></td>

				  
				  <td colspan="5" align="center"><?php echo $row2['h3'];?></td>

				  <td colspan="5" align="center"><?php echo $row2['h4'];?></td>

</tr>				  
<tr>
<td colspan="20"><label><strong>Presentation:</strong></label></td>
</tr>


<tr>
<td colspan="20"><?php echo $row2['pre'];?></td>  	
</tr>
</table>
</body>

</html>
