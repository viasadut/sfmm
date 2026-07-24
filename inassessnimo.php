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
$query2 = "SELECT * from nurseassess where pmrn='$pmrn' and eid='$eid'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row3 = mysqli_fetch_assoc($result2);
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
$ward = $_REQUEST['ward'];
$bed = $_REQUEST['bed'];
$aform = $_REQUEST['aform'];
$adate = $_REQUEST['adate'];
$astime = $_REQUEST['astime'];
$ma = $_REQUEST['ma'];
$acc = $_REQUEST['acc'];
$shistory = $_REQUEST['shistory'];
$language = $_REQUEST['language'];
$nip = $_REQUEST['nip'];
$edus = $_REQUEST['edus'];

$valueableb = $_REQUEST['valueableb'];
$bodys = $_REQUEST['bodys'];
$du = $_REQUEST['du'];
$remarks = $_REQUEST['remarks'];
$xl2=$_REQUEST['xl2'];
$comor= implode(",",$xl2);


	
$update="update nurseassess set cname='$cname',crelation='$crelation',cphone='$cphone', astime='$astime', ma='$ma', acc='$acc', shistory='$shistory', language='$language', nip='$nip', edus='$edus', comor='$comor', valueableb='$valueableb', bodys='$bodys', du='$du', remarks='$remarks' where eid='$eid' and pmrn='$pmrn'";
mysqli_query($con,$update) or die(mysqli_error(pp));


    echo '<script language="javascript">';
    echo 'alert("Successfully Updated"); ';
    echo '</script>';
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

<h1 align="center">Nurse Assessment </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

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


<tr>				<td colspan="2"><?php echo $pm1;?></td>

					 <td colspan="1"><?php echo $row['gender'];?></td>

					 <td colspan="5"><?php echo $pn1;?></td>
					  <td colspan="6"><?php echo $row3['cname'];?></td>
					   <td colspan="3"><?php echo $row3['crelation'];?></td>
					    <td colspan="3"><?php echo $row3['cphone'];?></td>

		 
</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Personal Particulars / History :</strong></label></td></tr>

		
		<tr>
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="2"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Ward:</strong></label></td>
						<td colspan="2"><label><strong>Bed:</strong></label></td>
						<td colspan="4"><label><strong>Admitted From:</strong></label></td>		
						<td colspan="4"><label><strong>Admission Date & Time:</strong></label></td>
						<td colspan="4"><label><strong>Assessment Time</strong></label></td>	
						
						</tr>
						
						<tr>				
					 <td colspan="2"><?php echo $row['age'];?></td>  	

					 <td colspan="2"><?php echo $row['pphone'];?></td>  

              		 <td colspan="2"><?php echo $row['room'];?></td>	
					 <td colspan="2"><?php echo $row['room1'];?></td>    
					 <td colspan="4"><?php echo $row3['aform'];?></td>
						
						
             		 <td colspan="4"><?php echo $row['adate'];?></td>					 	
					 <td colspan="4"><?php echo $row3['astime'];?></td>
					
					 </tr>


<tr>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Mode Of Arrival:</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Accompany:</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Source of history :</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Language:</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Necessity of Interpreter :</strong></label></td>
<td colspan="3" bgcolor="#00CCCC"><label><strong>Educational status :</strong></label></td>
</tr>

<tr><?php echo $row3['astime'];?>
<td colspan="3">
						<?php echo $row3['ma'];?>
						</td>
<td colspan="3">
						<?php echo $row3['acc'];?>
						
						</td>
						
						<td colspan="3">
						<?php echo $row3['shistory'];?>
						</td>
						
						<td colspan="3">
						<?php echo $row3['language'];?>
						</td>
						
						<td colspan="3">
						<?php echo $row3['nip'];?>
						</td>
						
						<td colspan="3">
						<?php echo $row3['edus'];?>
						</td>
</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>CO-Morbidities:</strong></label></td>  </tr>
<tr><td colspan="20">
<?php echo $row3['comor'];?>

</td></tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Valuable Belongings:</strong></label></td>  </tr>

<tr><td colspan="20"><?php echo $row3['valueableb'];?></td>  </tr>	

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Body/safety search:</strong></label></td>  </tr>

<tr><td colspan="20"><?php echo $row3['bodys'];?></td>  </tr>	

<tr>
<td colspan="10" bgcolor="#00CCCC"><label><strong>Decubitus Ulcer</strong></label></td>
<td colspan="10" bgcolor="#00CCCC"><label><strong>Remarks:</strong></label></td>
</tr>
<tr>

<td colspan="10">
						<?php echo $row3['du'];?>
						</td>
						
						<td colspan="10"><?php echo $row3['remarks'];?></td>
</tr>








</table>
</body>

</html>
