<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
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


$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];

$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$query43 = "SELECT COUNT(pmrn) FROM ecg where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;

$query = "SELECT * from alltest where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$dnam= $row['dname'];

//$dname1= $row['dname'];
//$rfor= $row['rfor'];

//$pa= $row['padd'];
  
$query2 = "SELECT * from patient where pmrn='$pmrn'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row2 = mysqli_fetch_assoc($result2);
$pp= $row2['pphone'];  
//$pd= $row['tname'];
//$pdate= $row['adate'];
$pa= $row2['bdate'];
$ps= $row2['psex'];
 
 
 $te=date('d',strtotime($pa));
$te1=date('m',strtotime($pa));
$te2=date('Y',strtotime($pa));


$date19=date_create("$te-$te1-$te2");
$date91=date_format($date19,'Y-m-d');
$date92= date('d-m-Y');
$date20=date_create($date92);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date20,$date19);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;

  
  ?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$select=$_REQUEST['dname1'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$ron=$_REQUEST['ron'];
$vent=$_REQUEST['vent'];
$qwave=$_REQUEST['qwave'];
$arate=$_REQUEST['arate'];
$st=$_REQUEST['st'];
$rhy=$_REQUEST['rhy'];
$twave=$_REQUEST['twave'];
$pwave=$_REQUEST['pwave'];
$qt=$_REQUEST['qt'];
$pr=$_REQUEST['pr'];
$qtc=$_REQUEST['qtc'];
$qrs=$_REQUEST['qrs'];
$uwave=$_REQUEST['uwave'];
$qrsc=$_REQUEST['qrsc'];
$ebeats=$_REQUEST['ebeats'];
$qrsvol=$_REQUEST['qrsvol'];
$others=$_REQUEST['others'];
$eaxis=$_REQUEST['eaxis'];
$poro=$_REQUEST['poro'];
$comments=$_REQUEST['comments'];

$date= date('Y/m/d');
$date1=date('m/d/Y');
$date2=date('d/m/Y');
$date2=date('d/m/Y');
$stime=date("h:i:sa");
$dtime= date('d/m/Y H:i:s');
$ins_query="insert into ecg (`dname`,`dname1`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`ron`,`vent`,`qwave`,`arate`,`st`,`rhy`,`twave`,`pwave`,`qt`,`pr`,`qtc`,`qrs`,`uwave`,`qrsc`,`ebeats`,`qrsvol`,`others`,`eaxis`,`poro`,`comments`,`eid`,`date1`,`date2`,`stime`,`status1`,`location`) 
values('$dname','$select','$pmrn','$pname','$page','$psex','$pphone','$ron','$vent','$qwave','$arate','$st','$rhy','$twave','$pwave','$qt','$pr','$qtc','$qrs','$uwave','$qrsc','$ebeats','$qrsvol','$others','$eaxis','$poro','$comments','$count1','$date1','$date2','$stime','Updated','OPD')";
mysqli_query($con,$ins_query);

$update="update ecgapp set status='SEEN' where `id`='$id'";
mysqli_query($con,$update);

$update="update alltest set status='SEEN' where `id`='$id'";
mysqli_query($con,$update);



//$id1=$_REQUEST['ID'];
//$url = "tescath";
$query90 = "UPDATE alltest set rby='$fullname',rtime='$dtime',status='RECEIVED' where id='$id'"; 
$result90 = mysqli_query($con,$query90) or die ( mysqli_error());

}
?>
<?php 
$query39 = "SELECT * FROM radreport where pmrn= '$pmrn' and eid='$count1'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$dname3=$row39['dname'];

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DID REPORT</title>
  
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
  font-size: 16px;
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
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">ECG REPORT FORM</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}" autocomplete="on">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="viewradrecord?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo $row['dreffer'];?>"><b>See Clinical Details<b></a></td></tr>
				<tr><td colspan="10"><label><strong>Doctors's Name :</strong></label></td>
				<td colspan="10"><label><strong>Referral Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="10"><select name="dname1"  required>
			        
					<option value='Dr. Mohammad Arifur Rahman'>Dr. Mohammad Arifur Rahman</option>
					<option value='Dr. Md. Moniruzzaman'>Dr. Md. Moniruzzaman</option>
					<option value='Dr. Md. Shahimur Parvez'>Dr. Md. Shahimur Parvez</option>
					
					</select></td>
				<td colspan="10" ><input type="text" name="dname"  required value="<?php echo $dnam;?>" readonly/></td>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['id'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="10"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly/></td>
					 <td colspan="10"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly/></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Phone NO:</strong></label></td>
						<td colspan="5"><label><strong>REPORT ON:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" required value="<?php echo $diff1;?>" readonly/></td>  
             		
					 <td colspan="5"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly/></td>
					 <td colspan="5"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly/></td>  


					 <td colspan="5"><select name="ron">
        
						
						<option value='ECG'selected>ECG</option>
						
						
				
</select></td>  
					 </tr>

	<tr><td colspan="20"bgcolor='lightgreen'align="center"><label><strong>ELECTROCARDIOGRAPHY REPORT</label></strong></td></tr>				 
					 
					 
					 <tr>
						
						<td colspan="5"><label><strong>Vent. Rate (Per Min): </strong></label></td>
						<td colspan="5"><label><strong>Q Wave: </strong></label></td>
						<td colspan="5"><label><strong>Auric. Rate (Per Min): </strong></label></td>
						<td colspan="5"><label><strong>S-T Segment:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="vent"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="qwave"  value=""></td>
					 <td colspan="5"><input type="text" name="arate"  value=""></td>  


					 <td colspan="5"><input type="text" name="st" value=""></td>  
					 </tr>
					 
					 
<tr>
						
						<td colspan="5"><label><strong>Rhythm: </strong></label></td>
						<td colspan="5"><label><strong>T Wave: </strong></label></td>
						<td colspan="5"><label><strong>P-Wave: </strong></label></td>
						<td colspan="5"><label><strong>Q-T Interval (Sec): </strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="rhy"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="twave"  value=""></td>
					 <td colspan="5"><input type="text" name="pwave"  value=""></td>  


					 <td colspan="5"><input type="text" name="qt"  value=""></td>  
					 </tr>					 
					 
					 
					 <tr>
						
						<td colspan="5"><label><strong>P-R Interval (Sec): </strong></label></td>
						<td colspan="5"><label><strong>QTc (Sec): </strong></label></td>
						<td colspan="5"><label><strong>QRS Interval (Sec): </strong></label></td>
						<td colspan="5"><label><strong>U-Wave:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="pr"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="qtc"  value=""></td>
					 <td colspan="5"><input type="text" name="qrs"  value=""></td>  


					 <td colspan="5"><input type="text" name="uwave" value=""></td>  
					 </tr>	


<tr>
						
						<td colspan="5"><label><strong>QRS Configuration:</strong></label></td>
						<td colspan="5"><label><strong>Ectopic Beats: </strong></label></td>
						<td colspan="5"><label><strong>QRS Voltage (mim): </strong></label></td>
						<td colspan="5"><label><strong>Others:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="qrsc"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="ebeats"  value=""></td>
					 <td colspan="5"><input type="text" name="qrsvol"  value=""></td>  


					 <td colspan="5"><input type="text" name="others" value=""></td>  
					 </tr>
					 
					 
					 <tr>
						
						<td colspan="5"><label><strong>Elec. Axis:</strong></label></td>
						<td colspan="5"><label><strong>Position / Rotation: </strong></label></td>
					
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="eaxis"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="poro"  value=""></td>
					 
					 </tr>	
				 
					 
						 
						<tr><td colspan="20"><label><strong>Comments / Observation / Remarks:</strong></label></td>  </tr>
<td  colspan="20"align="center"><input list="browsers11" name="comments" class="form-control" value='Normal ECG'required>
  <datalist id="browsers11">

						
						<option value='Normal ECG'>Normal ECG</option>
						<option value='Sinus Tachycardia'>Sinus Tachycardia</option>
						<option value='Sinus Bradycardia'>Sinus Bradycardia</option>
						<option value='Poor "R" Progression V1-V3'>Poor "R" Progression V1-V3</option>
						<option value='Poor "R" Progression V1-V4'>Poor "R" Progression V1-V4</option>
						<option value='Prolonged QTC'>Prolonged QTC</option>
						<option value='IRBBB'>IRBBB</option>
						<option value='Complete RBBB'>Complete RBBB</option>
						<option value='LBBB'>LBBB</option>
						
				 </datalist>
</td></tr>
				
																


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="ecgreport.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$count1"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
