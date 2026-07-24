<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2.php?err=2');
    }
?>
<?php
require('db1.php');

$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);


$full = $row39['fullname'];


$query40 = "SELECT * FROM idischarge1 where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$query41 = "SELECT * FROM evisit where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result41 = mysqli_query($con, $query41) or die(mysqli_error());

// Print out result
$row41 = mysqli_fetch_array($result41);

?>

<?php

require('db1.php');

$user=$_SESSION['sess_username'];



$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];



$query56 = "SELECT * from edprocedure where pmrn='$pmrn' and eid='$eid'"; 
$result56 = mysqli_query($con, $query56) or die ( mysqli_error());
$row56 = mysqli_fetch_assoc($result56);

$query57 = "SELECT * from enprocedure where pmrn='$pmrn' and eid='$eid'"; 
$result57 = mysqli_query($con, $query57) or die ( mysqli_error());
$row57 = mysqli_fetch_assoc($result57);


$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
$query = "SELECT * from inpatient where pmrn='$pmrn' and eid='$eid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$phone= $row['pphone'];  
$pa= $row['age'];
$pdate= $row['adate'];
$padd= $row['padd'];
$pg= $row['gender'];


//$pa= $row['padd'];
  
?>


<?php
if(isset($_POST['Submit34'])){ 
$url = "indocdischarge1edit1?pmrn=$pmrn&eid=$eid" ;
header("Location:$url");

}

if(isset($_POST['Submit34m'])){ 
$url = "imoidismomedi?pmrn=$pmrn&eid=$eid" ;
header("Location:$url");

}




?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Out Patient Record</title>
  
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
   <li><a href='idoccondis?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
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
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp;&nbsp;
		&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>Reference Drug Index of Bangladesh(medex.com.bd)<b></a>&nbsp&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a></td></tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				 <tr><td colspan="20"><?php echo $row['adoc'];?>
</td></tr>
       
						
						
						
						
				
</select></td>  

				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>				
						<td colspan="2"><label><strong>Patient's Age:</strong></label></td>
						<td colspan="2"><label><strong>Patient's Gender:</strong></label></td>
						<td colspan="4"><label><strong>Patient's Phone No:</strong></label></td>
						
						
						</tr>

<tr>				 
					<td colspan="10"><?php echo $pn;?></td>
					<td colspan="2"><?php echo $pm;?></td>
					<td colspan="2"><?php echo $pa;?></td>  	
					 <td colspan="2"><?php echo $pg;?></td>
					 <td colspan="4"><?php echo $phone;?></td>  

					 
</tr>
<tr><td colspan="20"><label><strong>Discharge Type :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row40['discharge'];?>
					
</td>
						
					
</tr>
<tr><td colspan="20"><label><strong>Surgery / Procedure (if Any) :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row40['surgery'];?>
<tr><td colspan="20"><label><strong>Discharge Diagnosis :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row40['ddia'];?></td>  </tr>
<tr><td colspan="20"><label><strong>History Of present Illness (Optional) :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row40['ill'];?></td>  </tr>
				

								





<tr><td colspan="20"><label><strong>Follow Up Investigations:</strong></label></td></tr>
<?php $query101 = "select * from idinves where pmrn='$pmrn' and eid='$eid'";
$result101 = mysqli_query($con,$query101);
while($data101 = mysqli_fetch_array($result101))

{ ?>    <tr>

      <td colspan="20"><?php echo $data101["medi"]; ?> - <?php echo $data101["ins"]; ?></td>
	  </tr>
    <?php } ?>





<tr>

<tr><td colspan="20"><label><strong>Medications:</strong></label></td></tr>
<?php $query102 = "select * from idismedi where pmrn='$pmrn' and eid='$eid' and status in ('Active','Served')";
$result102 = mysqli_query($con,$query102);
while($data102 = mysqli_fetch_array($result102))

{ ?>    <tr>

      <td colspan="20"><?php echo $data102["medi"]; ?> - <?php echo $data102["pdos"]; ?></td>
	  </tr>
    <?php } ?>





<tr>




<tr><td colspan="20"><label for="age"><strong>Investigation Done:</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row40['dinves'];?></td>  </tr>	


<tr><td colspan="20"><label for="age"><strong>Advise On Discharge:</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row40['other'];?></td>  </tr>	


<tr><td colspan="20"><label for="age"><strong>Follow Up Plan:</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row40['plan'];?></td>  </tr>	


<tr>
		<td colspan="5"><button type="submit" name="Submit34">EDIT</button></td>
		<td colspan="5"><button type="submit" name="Submit34m">EDIT MEDICATION</button></td>
		
	
<td colspan="5"><a href="idoccondis?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>"><b>BACK</a></td>
	  				
</tr>

</body>

</html>
