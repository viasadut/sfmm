<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','histo','lab','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
 $user = $_SESSION['sess_username'];
$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139)
?>
<?php
$full = $row139['fullname'];

?>


<?php

require('db1.php');

$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$dname1=$_REQUEST['dname1'];
//include("auth.php");
$user=$_SESSION["sess_userrole"];

$query39 = "SELECT * FROM histo where id= '$id'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row39 = mysqli_fetch_array($result39);
$eeid=$row39['eeid'];

$status = "";
  
  $dd=date('Y-m-d');
?>


<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$date1 =date('m/d/Y');
$udate =date('m/d/Y h:i:s');
$time =date("h:i:sa");
$pmrn =$_REQUEST['pmrn'];
$pname =$_REQUEST['pname'];
$pphone =$_REQUEST['pphone'];
$page =$_REQUEST['page'];
$psex =$_REQUEST['psex'];
//$shistory =$_REQUEST['shistory'];
//$noperation =$_REQUEST['noperation'];
//$indication =$_REQUEST['indication'];
//$find =$_REQUEST['find'];
//$bio1 =$_REQUEST['bio1'];
//$bio2 =$_REQUEST['bio2'];
//$compli =$_REQUEST['compli'];
$cinfo =$_REQUEST['cinfo'];
$spe =$_REQUEST['spe'];
$gdes =$_REQUEST['gdes'];
$mdes =$_REQUEST['mdes'];
$hno =$_REQUEST['hno'];
//$twork =$_REQUEST['twork'];
$dia =$_REQUEST['dia'];
$date_n =date('Y-m-d');
//$ins_query="insert into histo (`dname`,`date`,`time`,`pmrn`,`pname`,`pphone`,`page`,`psex`,`shistory`,`noperation`,`indication`,`find`,`bio1`,`bio2`) 
//values ('$full','$date1', '$time','$pmrn','$pname','$pphone','$page','$psex','$shistory','$noperation','$indication','$find','$bio1','$bio2')";
//mysqli_query($con,$ins_query) or die("Problem in presnew");

$update33="update histo set `cinfo`='$cinfo',`spe`='$spe',`gdes`='$gdes',`mdes`='$mdes',`dia`='$dia',`status`='REPORT DONE',`dname1`='$full',`rtime`='$time',`rdate`='$date1',`date1`='$dd',`hno`='$hno',`cstatus`='Waiting For Consultant Confirmation',`ruby`='$full',`rutime`='$udate',`date1`='$date_n' where `id`='$id'";
mysqli_query($con,$update33) or die("Problem in Update pappnew");


//$gg= $_REQUEST['pname'];
//$update="update pappnew set status='SEEN' where `ID`='$id'";
//mysqli_query($con,$update) or die(mysql_error());

$url = "histoview?pmrn=$pmrn&id=$id";
header("Location: $url");

}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>HISTOPATHOLOGY REPORT</title>
  
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
    <title>HISTOPATHOLOGY REPORT</title>
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
		<tr><td align="right" colspan="20">
		
		<a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>" style="color:red"> SURGERY NOTE</a>
		<a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>"style="color:red">ALL REPORTS</a>
		<a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>"style="color:red">ALL RECORDS</a>
		</a>&nbsp&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="photo333doc?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eeid";?>" style="color:red"><b>Endoscopy Capture<b></a>
		
		
		</td></tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname" value="Dr. Abu Anis Khan" readonly/>
				
						
						
				
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

<tr>				 <td colspan="10"><input type="text" name="pname"  value="<?php echo $row39['pname'];?>" readonly/></td>
					<td colspan="2"><input type="text" name="pmrn"   value="<?php echo $row39['pmrn'];?>" readonly/></td>
					<td colspan="2"><input type="text" name="page" required value="<?php echo $row39['page'];?>" /></td>  	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $row39['psex'];?>" /></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $row39['pphone'];?>" /></td>  

					 
</tr>

			
				<tr><td colspan="20" bgcolor="#00CCCC"><label><strong></strong></label></td></tr>					



						 <tr><td colspan="20"><label><strong>Clinical Information:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="cinfo" rows="5" ><?php echo $row39['find'];?>&#13;&#10<?php echo $row39['shistory'];?></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>HISTOPATHOLOGY No:</strong></label></td>  </tr>
						 <tr><td colspan="20"><input type="text" name="hno" style="text-transform:uppercase" required value="" /></td>  </tr>


						 <tr><td colspan="20"><label><strong>Specimen:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="spe" rows="5"></textarea></td>  </tr>
						<tr><td colspan="20"><label><strong>Gross Description:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="gdes" rows="5"></textarea></td>  </tr>
				<tr><td colspan="20"><label><strong>Microscopic Description</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="mdes" rows="5"></textarea></td>  </tr>
														

<tr><td colspan="20"><label><strong>Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="dia" rows="5"></textarea></td>  </tr>

						 


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	 <td colspan="10"><a target='_blank' href="historeport.php?pmrn=<?php echo $row39['pmrn']; ?>&dname1=<?php echo "$full"; ?>&eid=<?php echo $row39['eid']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
