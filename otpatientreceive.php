<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$dname1=$_REQUEST['dname1'];
//include("auth.php");
$user=$_SESSION["sess_username"];
$time=date('d/m/Y h:i:s');

$query39 = "SELECT * FROM ot where id= '$id'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row39 = mysqli_fetch_array($result39);
$pmrn=$row39['pmrn'];
$pname=$row39['pname'];
$page=$row39['page'];

/*$query43 = "SELECT COUNT(pmrn) FROM endoreport where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;*/
$query1 = "SELECT * from inpatient where pmrn='$pmrn' and discharge=''"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);
$room=$row1['room'];
$room1=$row1['room1'];
$addate= $row1['adate'];
$eid= $row1['eid'];
$pgender= $row1['gender'];


$status = "";
if(isset($_POST['Submit'])==1)
{
$dname =$_REQUEST['dname'];
$dname1 =$_REQUEST['dname1'];
$dname2 =$_REQUEST['dname2'];
$dname3 =$_REQUEST['dname3'];
$dname4 =$_REQUEST['dname4'];
$anurse =$_REQUEST['anurse'];
$cnurse =$_REQUEST['cnurse'];
$snurse1 =$_REQUEST['snurse1'];
$snurse2 =$_REQUEST['snurse2'];
//$tname =$_REQUEST['tname'];
$anes =$_REQUEST['anes'];
$date1 = $_REQUEST['date1'];
$slot = $_REQUEST['slot'];
$lreport = $_REQUEST['lreport'];
$rreport = $_REQUEST['rreport'];
$smarking = $_REQUEST['smarking'];
$belongings = $_REQUEST['belongings'];
$surstime=$_REQUEST['surstime'];
$suretime=$_REQUEST['suretime'];
$anes2=$_REQUEST['anes2'];
$anes3=$_REQUEST['anes3'];


$rpatient=$_REQUEST['rpatient'];
$ntag=$_REQUEST['ntag'];
$oconsent=$_REQUEST['oconsent'];
$osite=$_REQUEST['osite'];
$dremove=$_REQUEST['dremove'];
$hremove=$_REQUEST['hremove'];
$jremove=$_REQUEST['jremove'];
$aremove=$_REQUEST['aremove'];
$ha=$_REQUEST['ha'];
$lscs=$_REQUEST['lscs'];
$lmeal=$_REQUEST['lmeal'];
$breservered=$_REQUEST['breservered'];




//$ins_query46="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query46);


//$sel="SELECT * FROM endopapp WHERE `pphone`='$pphone' and `dname`='$dname' and adate='$date1';";
//$result = mysqli_query($con,$sel);







	
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


$ins_query="update ot set dname='$dname',dname1='$dname1',dname2='$dname2',anurse='$anurse',cnurse='$cnurse',snurse1='$snurse1',snurse2='$snurse2', nanes='$anes',adate='$addate',lreport='$lreport', rreport='$rreport',smarking='$smarking',room='$room',room1='$room1',rby='$user',rtime='$time',eid='$eid',status='Received',surstime='$surstime',suretime='$suretime',anes2='$anes2',anes3='$anes3',rpatient='$rpatient',ntag='$ntag',oconsent='$oconsent',osite='$osite',dremove='$dremove',hremove='$hremove',jremove='$jremove',aremove='$aremove',ha='$ha',lscs='$lscs',lmeal='$lmeal',breservered='$breservered',dname3='$dname3',dname4='$dname4',ieid='$eid' where id='$id'";
mysqli_query($con,$ins_query);
//$update="update endoapp set status='Booked' where `ddate`='$date1' and `dslot`='$slot'";
//mysqli_query($con,$update);


echo '<script language="javascript">';
    echo 'alert("Patient Received Successfully!!!"); ';
    echo '</script>';



}
?>

<?php
if(isset($_POST['Submit669']))
{
$url = "otanaesvitalsnurse?pmrn=$pmrn&id=$id";
header("Location: $url");
}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SFMMKPJSH DHAKA</title>
  
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
  max-width: 280px;
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
  width: 100%;
}

textarea {
 
  width: 100%;
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
  margin-bottom: 0px;
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
    max-width: 750px;
  }

}
      </style>

   <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+10)
		});
	});
</script>
  <link rel="stylesheet" href="styles.css">
  
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='endonursehome'><span>Home</span></a></li>
      
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>OT PATIENT RECEIVE PANEL </h1>


		<p style="text-align:right"><a target='_blank' href='surgical_list_1?pmrn=<?php echo $pmrn;?>&pname=<?php echo $pname;?>&page=<?php echo $page;?>&gender=<?php echo $pgender;?>'><span style="color:red;font-weight:bold">Print Surgery Check List</span></a></p>
        <fieldset>
		
				<label for="tname45"><strong>Surgeon Name:</strong></label>
				
				<select name="dname" value="" class="style1" required>
		
	
	
	

						<option value='<?php echo $row39['dname'];?>'selected><?php echo $row39['dname'];?></option>
				<?php 
			$sql = "select * from `doctor1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
	
			<br><br>
			
			<label for="tname45"><strong> 2nd Surgeon Name:</strong></label>
				
				<select name="dname1" value="" class="style1" >
		
	<option value='<?php echo $row39['dname1'];?>'selected><?php echo $row39['dname1'];?></option>
	
	

						
				<?php 
			$sql = "select * from `doctor1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
			<br><br>
			
			<label for="tname45"><strong>3rd Surgeon Name:</strong></label>
				
				<select name="dname2" value="" class="style1" >
		
	
	<option value='<?php echo $row39['dname2'];?>'selected><?php echo $row39['dname2'];?></option>
	

						
				<?php 
			$sql = "select * from `doctor1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
			<br><br>
			
			<label for="tname45"><strong>4th Surgeon Name:</strong></label>
				
				<select name="dname3" value="" class="style1" >
		
	
	<option value='<?php echo $row39['dname3'];?>'selected><?php echo $row39['dname3'];?></option>
	

						
				<?php 
			$sql = "select * from `doctor1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
	
	
	<br><br>
			
			<label for="tname45"><strong>5th Surgeon Name:</strong></label>
				
				<select name="dname4" value="" class="style1" >
		
	
	<option value='<?php echo $row39['dname4'];?>'selected><?php echo $row39['dname4'];?></option>
	

						
				<?php 
			$sql = "select * from `doctor1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			<br><br>


				<label for="tname45"><strong>Anaesthethist Name:</strong></label>
				
				<select name="anes" value="" class="style1" required>
		
	
	
	
<option value='<?php echo $row39['nanes'];?>'selected><?php echo $row39['nanes'];?></option>
<option value='N/A'>N/A</option>
						
				<?php 
			$sql = "select * from `doctor` where Discipline='anes'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
	
			<br><br>


			<label for="tname45"><strong>2nd Anaesthethist Name:</strong></label>
				
				<select name="anes2" value="" class="style1" >
		
	
	
	
<option value='<?php echo $row39['anes2'];?>'selected><?php echo $row39['anes2'];?></option>
<option value='N/A'>N/A</option>
						
				<?php 
			$sql = "select * from `doctor` where Discipline='anes'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
	
			<br><br>
			
			<label for="tname45"><strong>3rd Anaesthethist Name:</strong></label>
				
				<select name="anes3" value="" class="style1" >
		
	
	
	
<option value='<?php echo $row39['anes3'];?>'selected><?php echo $row39['anes3'];?></option>
<option value='N/A'>N/A</option>
						
				<?php 
			$sql = "select * from `doctor` where Discipline='anes'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
	
			<br><br>

			
			<label for="age"><strong>Anaesthetic Nurse's Name :</strong></label>
      <input name="anurse" type="text" size="70" class="style1" value="<?php echo $row39['anurse'];?>" >
	  
	  <label for="age"><strong>Circulating Nurse's Name :</strong></label>
      <input name="cnurse" type="text" size="70" class="style1" value="<?php echo $row39['cnurse'];?>" >
	  
	  <label for="age"><strong>1st Scrub Nurse's Name :</strong></label>
      <input name="snurse1" type="text" size="70" class="style1" value="<?php echo $row39['snurse1'];?>" >
	  
	  <label for="age"><strong>2nd Scrub Nurse's Name :</strong></label>
      <input name="snurse2" type="text" size="70" class="style1" value="<?php echo $row39['snurse2'];?>" >
			
			
			
			

		<label for="tname1"><strong>Procedure Name:</strong></label>
		<br>
		
	
	
			  <input name="tname" type="text" size="70"class="style1" value="<?php echo $row39['proce'].''.$row39['Otherins'];?>" >
			<br>
            <!-- Name Input -->
			
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Appointment Date & Time:</strong></label>
									<p>
									  
									  <input name="date1" type="text" size="12"class="style1" value="<?php echo $row39['otdate']?>" readonly>
									  <input name="slot" type="text" size="25" class="style1" value="<?php echo $row39['stime'].':00 TO '.$row39['etime'].':00';?>" readonly>
									  <input name="slot" type="text" size="6" class="style1" value="<?php echo $row39['duration1'].' Hr(s)';?>" readonly>
									  <input name="slot" type="text" size="6" class="style1" value="<?php echo $row39['duration'];?>" readonly>
									  
									  
									  <label for="mail"><strong>Surgery Start Time & Surgery End Time</strong></label>
									<p>
									  
									  <input name="surstime" type="text" size="25"class="style1" value="<?php echo $row39['surstime']?>" placeholder="Surgery Start Time" >
									  <input name="suretime" type="text" size="25" class="style1" value="<?php echo $row39['suretime'];?>" placeholder="Surgery End Time" >
									  
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
              
	  

	<br>
		
	
	
	


	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="70" class="style1" value="<?php echo $row39['pname'];?>" readonly>
 	  <label for="age"><strong>Patient's Location :</strong></label>
      <input name="room" type="text" size="30" class="style1" value="<?php echo $room;?>"readonly>
	  <input name="room1" type="text" size="30" class="style1" value="<?php echo $room1;?>"readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
      <input name="psex" type="text" size="11" class="style1" value="<?php echo $row39['psex'];?>"readonly>
	  
      <input name="pmrn" type="text" size="15"Placeholder="Patient's MRN" class="style1" value="<?php echo $row39['pmrn'];?>"readonly>
      <input name="pphone" type="text" size="13" Placeholder="Patient's Phone NO" class="style1"value="<?php  echo $row39['pphone'];?>"readonly>	  
	  <input name="page" type="text" size="5" class="style1" value="<?php echo $row39['page'];?>" readonly>
    <br><br><br>  
	
	<label for="age"><strong>Belongings:</strong></label> 
<td colspan="15" align="center"> <textarea rows="5" name="belongings"></textarea></td>

<br><br><br>  
<label for="age"><strong>Is This The Correct Patient:</strong></label><br>
<input type="radio" name="rpatient" value="YES" checked>YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="rpatient" value="No"> NO &nbsp;<input type="radio" name="rpatient" value="N/A"> N/A &nbsp;



<br><br><br>  
<label for="age"><strong>Name Tag In Position and Correct:</strong></label><br>
<input type="radio" name="ntag" value="YES" checked>YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ntag" value="No"> NO &nbsp;&nbsp;<input type="radio" name="rpatient" value="N/A"> N/A &nbsp;

<br><br><br>  
<label for="age"><strong>Operation Consent Form Signed Doctor / Patient:</strong></label><br>
<input type="radio" name="oconsent" value="YES" checked>YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="oconsent" value="No"> NO &nbsp;&nbsp;<input type="radio" name="oconsent" value="N/A"> N/A &nbsp;


<br><br><br>  
<label for="age"><strong>Operation Site Prepared:</strong></label><br>
<input type="radio" name="osite" value="YES" checked>YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="osite" value="No"> NO &nbsp;&nbsp;<input type="radio" name="osite" value="N/A"> N/A &nbsp;


<br><br><br>  
<label for="age"><strong>Dentures Removed:</strong></label><br>
<input type="radio" name="dremove" value="YES" checked>YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="dremove" value="No"> NO &nbsp;&nbsp;<input type="radio" name="dremove" value="N/A"> N/A &nbsp;


<br><br><br>  
<label for="age"><strong>Hair Clips/Make-up Etc Removed:</strong></label><br>
<input type="radio" name="hremove" value="YES" >YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="hremove" value="No"> NO &nbsp;&nbsp;<input type="radio" name="hremove" value="N/A"checked> N/A &nbsp;



<br><br><br>  
<label for="age"><strong>Jewellary Removed and Recorded:</strong></label><br>
<input type="radio" name="jremove" value="YES" >YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="jremove" value="No"> NO &nbsp;&nbsp;<input type="radio" name="jremove" value="N/A"checked> N/A &nbsp;


<br><br><br>  
<label for="age"><strong>Artificial Eye-Contact Lenses Removed:</strong></label><br>
<input type="radio" name="aremove" value="YES" >YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="aremove" value="No"> NO &nbsp;&nbsp;<input type="radio" name="aremove" value="N/A"checked> N/A &nbsp;


<br><br><br>  
<label for="age"><strong>Hearing Aides to accompany patient and handed over to theater nurse:</strong></label><br>
<input type="radio" name="ha" value="YES" >YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ha" value="No"> NO &nbsp;&nbsp;<input type="radio" name="ha" value="N/A"checked> N/A &nbsp;

<br><br><br>  
<label for="age"><strong>LSCS: Paediatrician Informed:</strong></label><br>
<input type="radio" name="lscs" value="YES" >YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="lscs" value="No"> NO &nbsp;&nbsp;<input type="radio" name="lscs" value="N/A" checked> N/A &nbsp;

<br><br><br>  
<label for="age"><strong>Blood Reservered:</strong></label><br>
<input type="radio" name="breservered" value="1 Unit" >1 Unit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="breservered" value="2 Unit"> 2 Unit &nbsp;&nbsp;&nbsp;<input type="radio" name="breservered" value="3 Unit"> 3 Unit &nbsp;&nbsp;&nbsp;<input type="radio" name="breservered" value="5 Unit"> 5 Unit &nbsp;&nbsp;&nbsp;<input type="radio" name="breservered" value="6 Unit"> 6 Unit &nbsp;&nbsp;<input type="radio" name="breservered" value="N/A"checked> N/A &nbsp;


<br><br><br>  
<label for="age"><strong>Last Meal Or Drink Taken:</strong></label><br>
<input type="radio" name="lmeal" value="4 Hrs Ago" >4 Hrs Ago &nbsp;<input type="radio" name="lmeal" value="6 Hrs Ago"> 6 Hrs Ago &nbsp;<input type="radio" name="lmeal" value="8 Hrs Ago"> 8 Hrs Ago &nbsp;<input type="radio" name="lmeal" value="10 Hrs Ago"> 10 Hrs Ago &nbsp;<input type="radio" name="lmeal" value="More Than 10 Hrs Ago"> More Than 10 Hrs Ago &nbsp;<input type="radio" name="lmeal" value="N/A"checked> N/A &nbsp;


<br><br><br>  
<a target='_blank' href="otanaesvitalsnurse?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo '$id';?>"><b>Add Vitails<b></a> &nbsp;
<br><br><br>
<input type="radio" name="lreport" value="Taken" checked>Lab Report Taken &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="lreport" value="Not Taken"> Lab Report Not Taken &nbsp;
<br><br><br>
<input type="radio" name="rreport" value="Taken" checked> Radiology Report Taken &nbsp;<input type="radio" name="rreport" value="Taken"> Radiology Report Not Taken

<br><br><br>
<input type="radio" name="smarking" value="DONE" Checked> Site Marking Taken &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="smarking" value="DONE"> Site Marking Not Taken
  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
