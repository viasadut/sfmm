<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
      header('Location: login2.php?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



//$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$dt=$_REQUEST['date'];




$query43 = "SELECT * FROM presnew where pmrn='$pmrn' and eid='$eid';" ;
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query = "SELECT * from pappnew where pmrn='$pmrn'and adate='$dt' and status='SEEN';" ;
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pd= $row['dname'];
$pdate= $row['adate'];
$pa= $row['page'];
$ps= $row['psex'];
$ph= $row['height'];
$pw= $row['weight'];
$pt= $row['temp'];
//$pa= $row['padd'];
  
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
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp;&nbsp;
		&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>Reference Drug Index of Bangladesh(medex.com.bd)<b></a>&nbsp&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a></td></tr>
		<tr><td align="right" colspan="20"><b>Date:<?php echo $row['adate'];?>&nbsp;&nbsp; Time:<?php echo $row['aslot'];?><b></td></tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><?php echo $row43["dname"];?>
				
						
						
				
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

<tr>				 <td colspan="10"><?php echo $pn;?></td>
					<td colspan="2"><?php echo $pm;?></td>
					<td colspan="2"><?php echo $row['page'];?></td>  	
					 <td colspan="2"><?php echo $row['psex'];?></td>
					 <td colspan="4"><?php echo $row['pphone'];?></td>  

					 
</tr>

				<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Personal Information :</strong></label></td></tr>

		
		<tr>
						
						<td colspan="4"><label><strong>Occupation:</strong></label></td>
						<td colspan="4"><label><strong>Marital Status:</strong></label></td>
						<td colspan="4"><label><strong>Height (CM):</strong></label></td>
						<td colspan="4"><label><strong>Weight (CM)</strong></label></td>	
						<td colspan="4"><label><strong>BMI:</strong></label></td>
						

						</tr>
						
						<tr>	
					<td colspan="4"><?php echo $row['occupation'];?></td>						
					<td colspan="4"><?php echo $row['mstatus'];?></td> 
					<td colspan="4"><?php echo $row['height'];?></td>						
					<td colspan="4"><?php echo $row['weight'];?></td>    
					<td colspan="4"><?php echo $row['pbmi'];?></td>  
					
					 

					 </tr>
<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Vitals :</strong></label></td></tr>


<tr>
<td colspan="4"><label><strong>Pulse:</strong></label></td>
<td colspan="4"><label><strong>Blood Pressure:</strong></label></td>
<td colspan="4"><label><strong>Temperature:</strong></label></td>
<td colspan="4"><label><strong>SPO2:</strong></label></td>
<td colspan="4"><label><strong>RR:</strong></label></td>

</tr>
<tr>
<td colspan="4"><?php echo $row['ppluse'];?></td>					 	
<td colspan="4"><?php echo $row['pbp'];?></td>
<td colspan="4"><?php echo $row['temp'];?></td>  
<td colspan="4"><?php echo $row['spo2'];?></td>  
<td colspan="4"><?php echo $row['rr'];?></td>  

</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Comorbidities :</strong></label></td></tr>


<tr>
<td colspan="2"><label><strong>Hypertension:</strong></label></td>
<td colspan="2"><label><strong>Heart Disease:</strong></label></td>
<td colspan="2"><label><strong>DM:</strong></label></td>
<td colspan="2"><label><strong>Kidney Disease:</strong></label></td>
<td colspan="2"><label><strong>TB:</strong></label></td>
<td colspan="2"><label><strong>Asthma:</strong></label></td>
<td colspan="3"><label><strong>Thyriod Disease:</strong></label></td>
<td colspan="3"><label><strong>Neuro Disorder:</strong></label></td>
<td colspan="2"><label><strong>Liver Disease:</strong></label></td>

</tr>


<tr>

<td colspan="2"><?php echo $row['phyper'];?></td>
<td colspan="2"><?php echo $row['pheart'];?></td>
<td colspan="2"><?php echo $row['pdm'];?></td>
<td colspan="2"><?php echo $row['pkid'];?></td>
<td colspan="2"><?php echo $row['ptb'];?></td>
<td colspan="2"><?php echo $row['pasthma'];?></td>
<td colspan="3"><?php echo $row['pthyroid'];?></td>
<td colspan="3"><?php echo $row['pneuro'];?></td>
<td colspan="2"><?php echo $row['liver'];?></td>




</tr>


<tr>

<td colspan="2"><?php echo $row['phyper1'];?></td>
<td colspan="2"><?php echo $row['pheart1'];?></td>
<td colspan="2"><?php echo $row['pdm1'];?></td>
<td colspan="2"><?php echo $row['pkid1'];?></td>
<td colspan="2"><?php echo $row['ptb1'];?></td>
<td colspan="2"><?php echo $row['pasthma1'];?></td>
<td colspan="3"><?php echo $row['pthyroid1'];?></td>
<td colspan="3"><?php echo $row['pneuro1'];?></td>
<td colspan="2"><?php echo $row['liver1'];?></td>




</tr>



<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Past History :</strong></label></td></tr>
<tr>
<td colspan="4"><label><strong>Past Surgery:</strong></label></td>
<td colspan="4"><label><strong>Alcohol:</strong></label></td>
<td colspan="4"><label><strong>Smoking:</strong></label></td>
<td colspan="4"><label><strong>Family History:</strong></label></td>
<td colspan="4"><label><strong>Drug History:</strong></label></td>
</tr>
<tr>
<td colspan="4"><?php echo $row['psurgery'];?></td>
<td colspan="4"><?php echo $row['palcohol'];?></td>
<td colspan="4"><?php echo $row['psmoking'];?></td>
<td colspan="4"><?php echo $row['pfamily'];?></td>
<td colspan="4"><?php echo $row['pdrug'];?></td>
</tr>
<tr>
<td colspan="4"><?php echo $row['psurgery1'];?></td>
<td colspan="4"><?php echo $row['palcohol1'];?></td>
<td colspan="4"><?php echo $row['psmoking1'];?></td>
<td colspan="4"><?php echo $row['pfamily1'];?></td>
<td colspan="4"><?php echo $row['pdrug1'];?></td></tr>


<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>For Female :</strong></label></td></tr>
<tr><td colspan="20"></td></tr>
<tr><td colspan="20" bgcolor="lightgreen"><label><strong>Menstrual History :</strong></label></td></tr>
<tr>
<td colspan="7"><label><strong>Menstrual Cycle:</strong></label></td>
<td colspan="7"><label><strong>LMP-Date:</strong></label></td>
<td colspan="6"><label><strong>Contraceptive List:</strong></label></td>
</tr>
<tr>
<td colspan="7"><?php echo $row['pperiod'];?></td>
<td colspan="7"><?php echo $row['plmp'];?></td>
<td colspan="6"><?php echo $row['clist'];?></td>
</tr>
<tr>
<td colspan="7"><?php echo $row['pperiod1'];?></td>
<td colspan="7"><?php echo $row['plmp1'];?></td>
<td colspan="6"><?php echo $row['clist1'];?></td>
</tr>
<tr><td colspan="20" bgcolor="lightgreen"><label><strong>Obstetrical History :</strong></label></td></tr>
<tr><td colspan="20"></td></tr>
<tr>
<td colspan="5"><label><strong>Para:</strong></label></td>
<td colspan="5"><label><strong>Gravida:</strong></label></td>
<td colspan="5"><label><strong>Age Of Last Child:</strong></label></td>
<td colspan="5"><label><strong>No Of Child:</strong></label></td>
</tr>
<td colspan="5"><?php echo $row['para'];?></td>
<td colspan="5"><?php echo $row['gravida'];?></td>
<td colspan="5"><?php echo $row['plchild'];?></td>
<td colspan="5"><?php echo $row['pnochild'];?></td>
</tr>
<tr>

<td colspan="5"><?php echo $row['para1'];?></td>
<td colspan="5"><?php echo $row['gravida1'];?></td>
<td colspan="5"><?php echo $row['plchild1'];?></td>
<td colspan="5"><?php echo $row['pnochild1'];?></td>
</tr>

				<tr><td colspan="20" bgcolor="#00CCCC"><label><strong></strong></label></td></tr>					



						 <tr><td colspan="20"><label><strong>Patient's Clinical Details:</strong></label></td>  </tr>
						 <tr><td colspan="20"><?php echo $row43['cdetails'];?></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><?php echo $row43['diagnosis'];?></td>  </tr>
						
				
														


<tr><td colspan="20"><label><strong>Investigation Advised:</strong></label></td>  </tr>
<?php $query1 = "select * from alltest where pmrn='$pmrn' and dname='$dname' and eid='$eid'";
$result = mysqli_query($con,$query1);
while($data1 = mysqli_fetch_array($result))

{ ?>    <tr>

      <td colspan="20"><?php echo $data1["medi"]; ?></td>
	  </tr>
    <?php } ?>





<tr>

<td colspan="12"><label><strong>Medicine:</strong></label></td>
<td colspan="8"><label><strong>Dosages:</strong></label></td>

</tr>


<?php $query1 = "select * from pmedi where pmrn='$pmrn' and dname='$dname' and eid='$eid'";
$result = mysqli_query($con,$query1);
while($data1 = mysqli_fetch_array($result))

{ ?>    <tr>

      <td colspan="12"><?php echo $data1["medi"]; ?></td>
	        <td colspan="8"><?php echo $data1["pdos"]; ?></td>
	  </tr>
    <?php } ?>


<tr><td colspan="20"><label for="age"><strong>Other Instructions:</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row43['other'];?></td>  </tr>	

<tr><td colspan="20"><label><strong>Diet Instructions :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row43['pdiet'];?>
</td>
						
					
</tr>





<tr><td colspan="20"><label><strong>Reffered To:</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row43['reffer'];?>&nbsp;<?php echo $row43['reffer2'];?><?php echo $row43['reffer3'];?><?php echo $row43['reffer4'];?><?php echo $row43['reffer5'];?><?php echo $row43['reffer'];?>
</td>


<tr><td colspan="20"><label><strong>Admission Advise :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $row43['padm'];?>
</td>
						
					
</tr>



</body>

</html>
