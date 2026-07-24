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
$aform=$_REQUEST['aform'];
$adate=$_REQUEST['adate'];
$astime=$_REQUEST['astime'];
$shistory=$_REQUEST['shistory'];
$ccom=$_REQUEST['ccom'];
$pill=$_REQUEST['pill'];
$gexam=$_REQUEST['gexam'];
$abdomen=$_REQUEST['abdomen'];
$res=$_REQUEST['res'];
$car=$_REQUEST['car'];
$nsys=$_REQUEST['nsys'];
$ent=$_REQUEST['ent'];
$breast=$_REQUEST['breast'];
$gen=$_REQUEST['gen'];
$mus=$_REQUEST['mus'];
$ex=$_REQUEST['ex'];
$uro=$_REQUEST['uro'];
$func=$_REQUEST['func'];
$diag=$_REQUEST['diag'];
$mplan=$_REQUEST['mplan'];
$dplan=$_REQUEST['dplan'];


if($res=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Triage Form Has Already Updated"); ';
    echo '</script>';
    }
	else{

$ins_query="insert into massess (`dname`,`pname`,`pmrn`,`eid`,`psex`,`page`,`pphone`,`ward`,`bed`,`aform`,`adate`,`astime`,`shistory`,`ccom`,`pill`,`gexam`,`abdomen`,`res`,`car`,`nsys`,`ent`,`breast`,`gen`,`mus`,`ex`,`uro`,`func`,`diag`,`mplan`,`dplan`) values
('$full','$pname','$pmrn','$eid','$psex','$page','$pphone','$ward','$bed','$aform','$adate','$astime','$shistory','$ccom','$pill','$gexam','$abdomen','$res','$car','$nsys','$ent','$breast','$gen','$mus','$ex','$uro','$func','$diag','$mplan','$dplan')";
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
   <li><a href='idocdetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
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

<h1 align="center">Assessment Form </h1>

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
						<td colspan="2"><label><strong>Height:</strong></label></td>
						<td colspan="2"><label><strong>Weight:</strong></label></td>
						<td colspan="4"><label><strong>BMI:</strong></label></td>
						
						
						</tr>


<tr>				<td colspan="5"><?php echo $pm1;?></td>

					 <td colspan="2"><?php echo $row['gender'];?></td>

					 <td colspan="5"><?php echo $row['pname'];?></td>
					  <td colspan="2"><?php echo $row11['ph'];?></td>

					 <td colspan="2"><?php echo $row11['pw'];?></td>
					 <td colspan="4"><?php echo $row11['pbmi'];?></td>

		 
</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Personal Particulars / History :</strong></label></td></tr>

		
		<tr>
						
						<td colspan="4"><label><strong>Age:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Ward:</strong></label></td>
						<td colspan="2"><label><strong>Bed:</strong></label></td>
					
						<td colspan="4"><label><strong>Admission Date & Time:</strong></label></td>
						<td colspan="4"><label><strong>Assessment Time</strong></label></td>	
						
						</tr>
						
						<tr>				
					 <td colspan="4"><?php echo $row11['page'];?></td>  	

					 <td colspan="4"><?php echo $row11['pphone'];?></td>  

              		 <td colspan="2"><?php echo $row11['ward'];?></td>	
					 <td colspan="2"><?php echo $row11['bed'];?></td>    
					 
             		 <td colspan="4"><?php echo $row11['adate'];?></td>					 	
					 <td colspan="4"><?php echo $row11['atime'];?></td>
					
					 </tr>




<tr><td colspan="5" bgcolor="#00CCCC"><label><strong>Recent Weight Changes:</strong></label></td>  
<td colspan="5" bgcolor="#00CCCC"><label><strong>Grading Of Obesity:</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label><strong>Grading Of Undernutration:</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label><strong>Nutrition Related Diagnosis:</strong></label></td>

</tr>

<tr><td colspan="5"><?php echo $row11['rwc'];?></td> 	
						
						
						  

<td colspan="5"><?php echo $row11['go'];?></td>

<td colspan="5"><?php echo $row11['gu'];?></td>
						
						<td colspan="5"><?php echo $row11['nrd'];?></td>

						</tr>	

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Food Allergies:</strong></label></td>  </tr>

<tr><td colspan="20"><?php echo $row11['fa'];?></td>  </tr>	

<tr><td colspan="5" bgcolor="#00CCCC"><label for="age"><strong>Feeding Mode:</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label for="age"><strong>Chewing Difficulties:</strong></label></td>

<td colspan="5" bgcolor="#00CCCC"><label for="age"><strong>Swallowing Difficulties:</strong></label></td>
<td colspan="5" bgcolor="#00CCCC"><label for="age"><strong>Activity Level:</strong></label></td>

</tr>
<tr><td colspan="5"><?php echo $row11['fm'];?></td> 	

						<td colspan="5"><?php echo $row11['cd'];?></td> 	
						
						<td colspan="5"><?php echo $row11['sd'];?></td>
						<td colspan="5"><?php echo $row11['al'];?></td>
</tr>








<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Diet Recommended By Clinicial:</strong></label></td>  </tr>

<tr><td colspan="20"><?php echo $row11['drc'];?></td>  </tr>	



<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Diet Plan By Dietician:</strong></label></td>  </tr>

<tr><td colspan="20"><?php echo $row11['dpd'];?></td>  </tr>	
<tr><td colspan="10"><a target='_blank' href="dietassessprint.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>		</tr>



</table>
</body>

</html>
