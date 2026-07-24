<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
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
$date=date('m/d/Y');
//$bt4='02:30:00';
//$bt3='18:00:00';

//$duration1=strtotime($bt4) - strtotime($bt3); 
//echo $duration=gmdate("H:i",$duration1); 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];

//include("auth.php");
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from patient where pmrn='$pmrn'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$bbdate=$row['bdate'];

$dd=date('d',strtotime($row["bdate"]));
$mm=date('m',strtotime($row["bdate"]));
$yy=date('Y',strtotime($row["bdate"]));


$date1=date_create("$dd-$mm-$yy");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");





 
$query1 = "SELECT * from inpatient where pmrn='$pmrn' and idisconfirm !='Confirmed'"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);

$addate= $row1['adate'];
$eid= $row1['eid'];
$pname= $row['pname'];
$pmrn= $row['pmrn'];
$pphone= $row['pphone'];  
//$page=$row['page'];
$psex= $row['gender'];

$queryd = "SELECT * FROM diap where pmrn= '$pmrn' and  eid='$eid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];


$queryd1 = "SELECT * FROM ot_day where con_name= '$full' and status='Approved'"; 
	 
$resultd1 = mysqli_query($con, $queryd1) or die(mysqli_error());

// Print out result
$rowd1 = mysqli_fetch_array($resultd1);
$day1=$rowd1['day1'];
$day2=$rowd1['day2'];
$day3=$rowd1['day3'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname1'];

$diagnosis=$_REQUEST['diagnosis'];
//$cdetails=$_REQUEST['cdetails'];

$otdate=$_REQUEST['otdate'];
$bkdate=date('d/m/Y H:i:s');
//$bt=$_REQUEST['bt2'];
//$tp=$_REQUEST['tp'];
$typeot=$_REQUEST['typeot'];
//$sn=$_REQUEST['sn'];
//$na=$_REQUEST['na'];
$lx=$_REQUEST['xl'];
//$lx= implode(",",$xl);


//$otherins=$_REQUEST['otherins'];
$sprequire=$_REQUEST['sprequire'];
//$remarks=$_REQUEST['remarks'];
$typeo=$_REQUEST['typeo'];
$lx3=$_REQUEST['xl3'];
//$lx3= implode(",",$x3);
//$bt3=$_REQUEST['bt3'];
//$bt4=$_REQUEST['bt4'];
//$duration1=strtotime($bt4) - strtotime($bt3); 
//$duration=gmdate("H:i",$duration1); 
//$x2=$_REQUEST['xl2'];
//$lx2= implode(",",$x2);
$duration=$_REQUEST['duration'];
$date1=date('Y-m-d', strtotime($otdate));
$date5=date('Y-m-d');



$ot_q = "SELECT COUNT(pmrn) FROM ot where pmrn='$pmrn' and date5='$date1' and status !='Cancel'"; 
	 
$ot_r = mysqli_query($con, $ot_q) or die(mysqli_error());

// Print out result
$ot_data = mysqli_fetch_array($ot_r);

if($ot_data['COUNT(pmrn)']>0)

{
       echo '<script language="javascript">';
    echo 'alert("Patient Has Already Booked For An OT On Mentioned Date !!"); ';
    echo '</script>';

    }


	
else if(empty($_REQUEST['dname1']))

{
       echo '<script language="javascript">';
    echo 'alert("No Surgeon Name is selected !!"); ';
    echo '</script>';

    }

	
	else if(empty($_REQUEST['xl']))

{
       echo '<script language="javascript">';
    echo 'alert("Please select Surgery Name!!"); ';
    echo '</script>';

    }	
	
//$t1='11:00';
//$t2='12:30';
//$t3=strtotime($t2)-strtotime($t1);
//echo $t4=gmdate("H:i", $t3);

else {

$ins_query="insert into ot (`dname`,`pname`,`pmrn`,`pphone`,`diagnosis`,`psex`,`page`,`adate`,`otdate`,`bookingdt`,`tanes`,`proce`,`duration2`,`sprequire`,`typeo`,`date5`,`typeot`) values 
('$dname', '$pname','$pmrn','$pphone','$diagnosis','$psex','$diff1','$addate','$otdate','$bkdate','$lx3','$lx','$duration','$sprequire','$typeo','$date1','$typeot')";
mysqli_query($con,$ins_query) or die(mysql_error());

//$update="update otslot set status='Booked' where `otdate`='$otdate' and otname='$bt' and `ottime` between '$bt3' and '$bt4'";
//mysqli_query($con,$update);

echo '<script language="javascript">';
    echo 'alert("Booking Set Successfully"); ';
    echo '</script>';
}
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>OT Booking</title>
  
   

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: red;
}

form {
  max-width: 300px;
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
    max-width: 1200px;
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

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
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
   <li><a href='otdash'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
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

<h1 align="center">OT BOOKING FORM </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>
		
		
		<form style="background-color: gold;">
		
		<div style="background-color:pink;position: relative;left:00px; font-size:15px; font-weight:bold;color:red">
		<table border="1" width="100%" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
		
	<tr>
	 
      <td ><strong>S.No</strong></td>
      
	  <td ><strong>Surgeon Name</strong></td>
      <td ><strong>OT Booked Date</strong></td>
	  <td ><strong>Procedure Name</strong></td>
	  <td ><strong>Status</strong></td>
	</tr>
	
		<?php
		$count4=1;
		$sel_query4="Select * from ot where pmrn='$pmrn' order by id desc LIMIT 3;";

$result4 = mysqli_query($con,$sel_query4);




while($row4 = mysqli_fetch_assoc($result4)) 


	
	
{ ?>
    <tr>

      <td align="left"><?php echo $count4; ?></td>
      <td align="left"><?php echo $row4["dname"]; ?></a></td>
	  <td align="left"><?php echo $row4["otdate"]; ?></td>
	  <td align="left"><?php echo $row4["proce"]; ?></td>
	  <td align="left"><?php if($row4["status"]=='Received'){echo '<span style="color:green;font-size:20px;font-weight:bold">'.$row4["status"].'</span>';}else if($row["status"]!='Received'){echo '<span style="color:red;font-size:20px;font-weight:bold">'.$row4["status"].'</span>';} ?></td>
	  
      
    

	  
	 
      
	  
	  
	  

 

	  

      </tr>
    <?php $count4++; } ?>
		
		</table>
		</div>
		        <table class="table" border='0'>  
		<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's MRN:<?php echo $row['pmrn'];?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Gender:<?php echo $row['psex'];?></strong></label></td>
						
						
						</tr>
						<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Name:<?php echo $row['pname'];?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Phone:</strong> <?php echo $row['pphone'];?></label></td>
						
						
						</tr>
						
						<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Age: <?php echo $diff1;?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Admission Date:<?php echo $row1['adate'];?></strong></label></td>
						
						
						</tr>
		
		</table>
		</form>

<form action="" method="post" style="background-color: lightgreen;">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
		
		<tr><td colspan="20" style="font-weight: bold;font-size:25px;color:red;" align="center"><label><strong>Approved OT Day</strong></label></td></tr>
<tr>
<td colspan="7"><input type="text" name="tqty" id="tqty" required value="<?php echo $day1;?>" readonly style="font-weight: bold;font-size:16px;color:green"></td>
<td colspan="7"><input type="text" name="tqty" id="tqty1" required value="<?php echo $day2;?>" readonly style="font-weight: bold;font-size:16px;color:green"></td>
<td colspan="6"><input type="text" name="tqty" id="tqty2" required value="<?php echo $day3;?>" readonly style="font-weight: bold;font-size:16px;color:green"></td>

</tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td>
				
				<tr>	  
				<td colspan="20"><select name="dname1" value="" class="style1">
			        <option value='<?php echo $full;?>'><?php echo $full;?></option>
				
			</select>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td>
						
						
						
						</tr>
						
						


		<tr>
						
						
						<td colspan="4"><label><strong>OT Date:</strong></label></td>
						
						<td colspan="2"><label><strong>Type Of OT:</strong></label></td>
						<td colspan="2"><label><strong>Duration:</strong></label></td>
						
						<td colspan="8"><label><strong>Type of Anesthesia:</strong></label></td>
							
						</tr>
						
						<tr>				
						

			    	 <td colspan="4"><input type="date" name="otdate" placeholder="Select Date" value=""size="15" required></td>  

					 
					 
					 
		
							
										
						
						
						
						
					
					 

						
		

 
<td colspan="2"><select name="typeot">
        
						<option value=''>-Select-</option>
						<option value='Elective'>Elective</option>
						<option value='Emergency'>Emergency</option>
						
				
</select>




</td>  
<td colspan="2"><input type="text" name="duration" size="15"value="" required></td>  		             		
					 <td colspan="8"><select name="xl3"  class="3col active" placeholder="Select Investigations">
       
						
						<option value='<?php if(isset($_POST['load'])==1)
{ $xl31 = $_REQUEST['xl3'];
echo $xl31;
}
?>'><?php if(isset($_POST['load'])==1)
{ $xl31 = $_REQUEST['xl3'];
echo $xl31;
}
?></option>
						<option value='Local'>Local</option>
						<option value='GA - Endotracheal Tube'>GA - Endotracheal Tube</option>
						<option value='GA - LMA'>GA - LMA</option>
						<option value='SAB'>SAB</option>
						<option value='GA + SAB'>GA + SAB</option>
						<option value='GA - LMA + Caudal Epidural'>GA - LMA + Caudal Epidural</option>
						<option value='Nerve Block'>Nerve Block</option>
						<option value='Saddle Block'>Saddle Block</option>
						<option value='Deep Sedation'>Deep Sedation</option>
						<option value='TIVA'>TIVA</option>
						<option value='Inhalational Anesthesia'>Inhalational Anesthesia</option>
						<option value='Dissociative Anaesthesia'>Dissociative Anaesthesia</option>
						<option value='Spinal'>Spinal + Epidural </option>
						
						
				
</select></td>  


 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"><?php echo $inves;?></textarea></td>  </tr>
						


		<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>
		<tr><td colspan="20">
		
		 <select class="js-example-basic-single" name="xl" required>
		
<option value=''>-Select-</option>
<?php 


			$sql = "select * from `privilege` where dname='$full' and status in ('Approved','Waiting For CFO Approval')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->pname."'>".$row->pname."</option>";
				}
			}

			?>
      
    </select>


    <script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

	<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />


</td></tr>







					 </tr>

<tr>
							<td colspan="20"><label><strong>Type Of Operation:</strong></label></td>
						

<tr>
					 <td colspan="20"><select name="typeo" >
        
						
						<option value=''>-Select-</option>
						<option value='Major'>Major</option>
						<option value='Minor'>Minor</option>
						<option value='Intermidiate'>Intermidiate</option>
						
						
						
				
</select></td>  

					 
</tr>
		
		
		 
		<tr>
						
						<td colspan="20"><label><strong> Remarks / Special Requirement:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><input type="text" name="sprequire" value=""</td>  
				
						
					 
					 </tr>
					 
						
				
														

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="otreport?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>&bkdate=<?php echo "$bkdate"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
