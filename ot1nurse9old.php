<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pa= $row['page'];
$ps= $row['psex'];
 
$query1 = "SELECT * from inpatient where pmrn='$pmrn' and idisconfirm !='Confirmed'"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);

$addate= $row1['adate'];
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$diagnosis=$_REQUEST['diagnosis'];
//$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$adate=$_REQUEST['adate'];
$otdate=$_REQUEST['otdate'];
$bkdate=$_REQUEST['bkdate'];
$bt=$_REQUEST['bt'];
$tp=$_REQUEST['tp'];
$typeot=$_REQUEST['typeot'];
//$sn=$_REQUEST['sn'];
//$na=$_REQUEST['na'];
$xl=$_REQUEST['xl'];
$lx= implode(",",$xl);


$otherins=$_REQUEST['otherins'];
$sprequire=$_REQUEST['sprequire'];
$remarks=$_REQUEST['remarks'];
$typeo=$_REQUEST['typeo'];
$x3=$_REQUEST['xl3'];
$lx3= implode(",",$x3);
$bt3=$_REQUEST['bt3'];
$bt4=$_REQUEST['bt4'];
$duration1=strtotime($bt4) - strtotime($bt3); 
$duration=gmdate("H:i",$duration1); 
//$x2=$_REQUEST['xl2'];
//$lx2= implode(",",$x2);
$date1=date('Y-m-d', strtotime($otdate));
$date5=date('Y-m-d');



$sel90="SELECT * from otslot WHERE ottime BETWEEN '$bt3' and '$bt4' and otdate='$date1' and status='Booked' and otname='$bt';";
$result90 = mysqli_query($con,$sel90);


	
if(empty($_REQUEST['dname']))

{
       echo '<script language="javascript">';
    echo 'alert("No Surgeon Name is selected !!"); ';
    echo '</script>';

    }

	else if(empty($_REQUEST['bt3']))

{
       echo '<script language="javascript">';
    echo 'alert("Surgery Start Time Not Selected!!"); ';
    echo '</script>';

    }
	
	else if(empty($_REQUEST['bt4']))

{
       echo '<script language="javascript">';
    echo 'alert("Surgery End Time Not Selected!!"); ';
    echo '</script>';

    }


else if($res90=mysqli_num_rows($result90)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Eiher Booking Time is Laready Taken Or Overlap with Others"); ';
    echo '</script>';
    }

//$t1='11:00';
//$t2='12:30';
//$t3=strtotime($t2)-strtotime($t1);
//echo $t4=gmdate("H:i", $t3);

else {

$ins_query="insert into ot (`dname`,`pname`,`pmrn`,`pphone`,`diagnosis`,`psex`,`page`,`adate`,`otdate`,`bookingdt`,`duration`,`ptype`,`tanes`,`proce`,`duration1`,`Otherins`,`sprequire`,`remarks`,`typeo`,`stime`,`etime`,`date5`,`typeot`) values 
('$dname', '$pname','$pmrn','$pphone','$diagnosis','$psex','$page','$adate','$otdate','$bkdate','$bt','$tp','$lx3','$lx','$duration','$otherins','$sprequire','$remarks','$typeo','$bt3','$bt4','$date1','$typeot')";
mysqli_query($con,$ins_query) or die(mysql_error());


$update="update otslot set status='Booked' where `otdate`='$date1' and otname='$bt' and `ottime` between '$bt3' and '$bt4'";
mysqli_query($con,$update);

echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
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
  background: #A085C6;
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

<h1 align="center">OT BOOKING FORM </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="10"><label><strong>Doctors's Name :</strong></label></td>
				<td colspan="10"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="10"><select name="dname1" value="" class="style1">
			        <option value=''>-Select Doctor-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td>
						
						
						<td colspan="10">
						<input type="text" name="dname" required value="<?php if(isset($_POST['load'])==1)
{ $dname3 = $_REQUEST['dname1'];
echo $dname3;
}
?>" readonly>
</td>
						
						
						</tr>
						
												<tr>
						
						
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="18"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="2"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly></td>
					 <td colspan="18"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="3"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="4"><label><strong>OT Date:</strong></label></td>
						<td colspan="2"><label><strong>OT Name:</strong></label></td>	
						
							
						</tr>
						
						<tr>				
						<td colspan="3"><input type="text" name="page" required value="<?php echo $pa;?>" readonly></td>  
             		<td colspan="5"><input type="text" name="adate" id="datepicker" placeholder="Select Date" value='<?php echo date('d/m/Y H:i:s',strtotime($addate));?>'size="25">
<input type="text" name="addate" required value="<?php if(isset($_POST['load'])==1)
{ $aadate = $_REQUEST['adate'];
echo $aadate;
}
?>" readonly>
					

					</td>					 	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly></td>  

			    	 <td colspan="4"><input type="text" name="otdate" id="datepicker1" placeholder="Select Date" value="<?php if(isset($_POST['load'])==1)
{ $date1 = $_REQUEST['otdate'];
echo $date1;
$test=date('Y-m-d', strtotime($date1));
}
?>"size="15" required></td>  
<td colspan="2"><select name="bt2" value="">
        
						<option value=''>-Select-</option>
						<option value='OT01'>OT01(RED)</option>
						<option value='OT02'>OT02(GREEN)</option>
						<option value='OT03'>OT03(BLUE)</option>
						<option value='OT04'>OT04(YELLOW)</option>
						<option value='OT05'>OT05(WHITE)</option>
						<option value='OT06'>OT06(ORANGE)</option>
						<option value='OT07'>OT07(PINK)</option>
						<option value='OT08'>OT08(PURPLE)</option>
				
</select>
<input type="text" name="bt" required value="<?php if(isset($_POST['load'])==1)
{ $bt2 = $_REQUEST['bt2'];
echo $bt2;
}
?>" readonly>
<input name="load" class="style1" type="submit" id="load" value="Check Available Time">
</td>  

					 </tr>
					 
					 
		
	<tr>
						<td colspan="2"><label><strong>OT Start:</strong></label></td>		
						<td colspan="3"><label><strong>OT End:</strong></label></td>
						<td colspan="3"><label><strong>Booking Date& Time:</strong></label></td>
						<td colspan="2"><label><strong>Type Of Patients:</strong></label></td>
						<td colspan="2"><label><strong>Type Of OT:</strong></label></td>
						
						<td colspan="8"><label><strong>Type of Anesthesia:</strong></label></td>
						
						</tr>
						
						<tr>				
						
						
						
						
					 <td colspan="2"><select name="bt3">
        
						<option value=''>-Select-</option>
						<?php 
	   
	   		if(isset($_POST['load'])){
			$sql = "select * from `otslot` where  `status`='vacant' and otname='$bt2'and `otdate`='$test'order by ottime asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->ottime."'>".$row->ottime."</option>";
				}
			}
			}
			?>
				
</select></td>  
				
						
						
					 <td colspan="3"><select name="bt4">
        
						<option value=''>-Select-</option>
						<?php 
	   
	   		if(isset($_POST['load'])){
			$sql = "select * from `otslot` where  `status`='vacant'and otname='$bt2'and `otdate`='$test'order by ottime asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->ottime."'>".$row->ottime."</option>";
				}
			}
			}
			?>
				
</select></td> 
					 <td colspan="3"><input type="text" name="bkdate" size="15"value="<?php echo $date;?>" required readonly/></td>  		

						
						
						<td colspan="2"><select name="tp">
        
						<option value=''>-Select-</option>
						<option value='In-Patients'>In-Patients</option>
						<option value='Day Care'>Day Care</option>
						<option value='OPD Procedure'>OPD Procedure</option>
				
</select>
</td>
<td colspan="2"><select name="typeot">
        
						<option value=''>-Select-</option>
						<option value='Elective'>Elective</option>
						<option value='Emergency'>Emergency</option>
						
				
</select>




</td>  
             		
					 <td colspan="8"><select name="xl3[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
       
						
						<option value=''>-Select-</option>
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
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"></textarea></td>  </tr>
						


		<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>
		<tr><td colspan="20"><select name="xl[]" multiple="multiple" class="3col active" placeholder="Select Investigations">

<?php 
			$sql = "select * from `mma1` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->Proname."'>".$row->Proname."</option>";
				}
			}
			?>
      
    </select>


    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: 'Select Procedure',
            search: true,
            searchOptions: {
                'default': '-Select Procedure-'
            },
            selectAll: true
        });

    });
</script>
</td></tr>






<td colspan="20"><input type="text" name="otherins" placeholder="Name if other Procedure" ></td>	    	 
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
						
						<td colspan="20"><label><strong>Special Requirement:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><input type="text" name="sprequire" value=""</td>  
				
						
					 
					 </tr>
					 <tr>
						
						<td colspan="20"><label><strong>Remarks:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><input type="text" name="remarks" value=""</td>  
				
						
					 
					 </tr>
		
						
				
														

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="otreport?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>&bkdate=<?php echo "$bkdate"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
