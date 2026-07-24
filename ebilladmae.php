<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="billin"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];
//$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$pmrn=$_REQUEST['dname'];
//include("auth.php");
//echo $count1;
 
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data59 = mysqli_fetch_assoc($query4);


$query444 = mysqli_query($db,"select * from preadm where id='$id'");
$data444 = mysqli_fetch_assoc($query444);



$dname=$data444['dname'];
$pname=$data444['pname'];
$pmrn=$data444['pmrn'];
$page=$data444['page'];
$padd=$data444['padd'];
$gender=$data444['gender'];
$pphone=$data444['pphone'];
$staff=$data444['staff'];
$eeid=$data444['eeid'];
$location=$data444['location'];



$query43 = "SELECT COUNT(pmrn) FROM inpatient where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;  
  
  
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
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$pname = $_REQUEST['pname'];
//$pmrn = $_REQUEST['pmrn'];
//$pphone=$_REQUEST['pphone'];
//$page=$_REQUEST['page'];
//$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];
//$diagnosis=$_REQUEST['diagnosis'];
//$date=$_REQUEST['date'];
//$plan=$_REQUEST['plan'];
//$instruction=$_REQUEST['instruction'];
//$date1=$_REQUEST['date1'];
//$remarks=$_REQUEST['remarks'];
$btype=$_REQUEST['btype1'];
$bno=$_REQUEST['bno'];
$adate= date('d/m/Y H:i:s');
$aadate= date('m/d/Y ');
$fname=$_REQUEST['fname'];
$mname=$_REQUEST['mname'];
$peradd=$_REQUEST['peradd'];
$nid=$_REQUEST['nid'];
$pocu=$_REQUEST['pocu'];
$mincome=$_REQUEST['mincome'];
$wife=$_REQUEST['wife'];
$child=$_REQUEST['child'];
$isource=$_REQUEST['isource'];
$land=$_REQUEST['land'];
$service=$_REQUEST['service'];
$poss=$_REQUEST['poss'];
$political=$_REQUEST['political'];
$vcard=$_REQUEST['vcard'];
$vcard1=$_REQUEST['vcard1'];
$acard=$_REQUEST['acard'];
$pmode=$_REQUEST['pmode'];
$premarks=$_REQUEST['premarks'];
$date1 = date('d/m/Y H:i:s');
$ddate1 = date('m/d/Y');

$sel="SELECT * FROM inpatient WHERE `pmrn`='$pmrn' and `discharge`='';";
$result = mysqli_query($con,$sel);


$sel2="SELECT * FROM death WHERE `pmrn`='$pmrn';";
$result2 = mysqli_query($con,$sel2);

$sel3="SELECT * FROM death1 WHERE `pmrn`='$pmrn';";
$result3 = mysqli_query($con,$sel3);

if($res2=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Already Death Certificate has been issued against this MRN "); ';
    echo '</script>';
    }


	else if($res3=mysqli_num_rows($result3)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Already Death Certificate has been issued against this MRN "); ';
    echo '</script>';
    }



else if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Already Admitted in the system"); ';
    echo '</script>';
    }
else if($vcard==$vcard1)
{
	echo '<script language="javascript">';
    echo 'alert("You have issued same vistor card twice"); ';
    echo '</script>';
	
}

	else if ($location='A&E'){


$update212="update preadm set status='Admitted',eid='$count1', fname='$fname', mname='$mname', peradd='$peradd', nid='$nid', pocu='$pocu', mincome='$mincome', wife='$wife', child='$child', isource='$isource', land='$land', service='$service', poss='$poss', political='$political', vcard='$vcard', vcard1='$vcard1',acard='$acard', pmode='$pmode', premarks='$premarks' where `id`='$id'";
mysqli_query($con,$update212);


$ins_query33="insert into inpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`,`room1`,`eid`,`pphone`,`aadate`,`card1`,`card2`,`acard`,`type`)
values ('$dname', '$pname','$pmrn','$padd','$gender','$page','$adate','$btype','$bno','$count1','$pphone','$aadate','$vcard','$vcard1','$acard','$staff')";
mysqli_query($con,$ins_query33);
//if ($con->query($ins_query) == TRUE) 
//{

//$ins_query1="insert into ipres (`dname`,`pname`,`pmrn`,`padd`,`psex`,`page`,`date`,`room`,`room1`,`pphone`,`eid`) values ('$dname', '$pname','$pmrn','$padd','$gender','$page','$adate','$btype','$bno','$pphone','$count1')";
//mysqli_query($con,$ins_query1);


$ins_query111="insert into newbed (`dname`,`pname`,`pmrn`,`adate`,`type`,`bno`,`eid`,`adate1`) values ('$dname', '$pname','$pmrn','$adate','$btype','$bno','$count1','$aadate')";
mysqli_query($con,$ins_query111);


$update="update bed set status='Occupied', pname='$pname', pmrn='$pmrn', dname='$dname', adate='$adate' where `bno`='$bno'";
mysqli_query($con,$update);

$update98="update vcard set status='BOOKED',`pmrn`='$pmrn' where `c_no`='$vcard'";
mysqli_query($con,$update98);

$update99="update vcard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$vcard1'";
mysqli_query($con,$update99);

$update199="update acard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$acard'";
mysqli_query($con,$update199);



$ins_query99="insert into tinpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$gender','$page','$adate','$btype','$bno','$count1','$pphone')";
mysqli_query($con,$ins_query99);  

$update111="update emergency set discharge='Admitted', disstatus='SEEN',fstatustime='$date1',ddate1='$ddate1', duser='$user' where pmrn='$pmrn' and eid='$eeid'";
mysqli_query($con,$update111) or die(mysql_error());

$update112="update erefferal set status='Admitted'where pmrn='$pmrn' and eid='$eeid'";
mysqli_query($con,$update112) or die(mysql_error());


    echo '<script language="javascript">';
    echo 'alert("Admission Successful"); ';
    echo '</script>';
} 
	
	else {
		
$update212="update preadm set status='Admitted',eid='$count1', fname='$fname', mname='$mname', peradd='$peradd', nid='$nid', pocu='$pocu', mincome='$mincome', wife='$wife', child='$child', isource='$isource', land='$land', service='$service', poss='$poss', political='$political', vcard='$vcard', vcard1='$vcard1',acard='$acard', pmode='$pmode', premarks='$premarks' where `id`='$id'";
mysqli_query($con,$update212);


$ins_query33="insert into inpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`,`room1`,`eid`,`pphone`,`aadate`,`card1`,`card2`,`acard`,`type`)
values ('$dname', '$pname','$pmrn','$padd','$gender','$page','$adate','$btype','$bno','$count1','$pphone','$aadate','$vcard','$vcard1','$acard','$staff')";
mysqli_query($con,$ins_query33);
//if ($con->query($ins_query) == TRUE) 
//{

//$ins_query1="insert into ipres (`dname`,`pname`,`pmrn`,`padd`,`psex`,`page`,`date`,`room`,`room1`,`pphone`,`eid`) values ('$dname', '$pname','$pmrn','$padd','$gender','$page','$adate','$btype','$bno','$pphone','$count1')";
//mysqli_query($con,$ins_query1);


$ins_query111="insert into newbed (`dname`,`pname`,`pmrn`,`adate`,`type`,`bno`,`eid`,`adate1`) values ('$dname', '$pname','$pmrn','$adate','$btype','$bno','$count1','$aadate')";
mysqli_query($con,$ins_query111);


$update="update bed set status='Occupied', pname='$pname', pmrn='$pmrn', dname='$dname', adate='$adate' where `bno`='$bno'";
mysqli_query($con,$update);

$update98="update vcard set status='BOOKED',`pmrn`='$pmrn' where `c_no`='$vcard'";
mysqli_query($con,$update98);

$update99="update vcard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$vcard1'";
mysqli_query($con,$update99);

$update199="update acard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$acard'";
mysqli_query($con,$update199);



$ins_query99="insert into tinpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$gender','$page','$adate','$btype','$bno','$count1','$pphone')";
mysqli_query($con,$ins_query99);  




    echo '<script language="javascript">';
    echo 'alert("Admission Successful"); ';
    echo '</script>';		
		
	}

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
  
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
  width: 30%;
}

select1 {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 20%;
}


textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
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
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>

</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S ADMISSION </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			 <label1 for="age"><strong color="green">Patient Particulars   :</strong></label1> <br><br><br>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" value="<?php echo $data59['pname'];?>"required readonly />
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" value="<?php echo $data59['padd'];?>"required readonly/>

	  <label for="age"><strong>Patient's Details (Gender / MRN / Phone / Age) :</strong></label>
	  	<input name="psex" type="text" size="10" value="<?php echo $data59['psex'];?>"required readonly/>

		
						


						<input name="pmrn" type="text" size="15" value="<?php echo $data59['pmrn'];?>" placeholder="MRN" required readonly/>
      <input name="pphone" type="text" size="13" value="<?php echo $data59['pphone'];?>" placeholder="Phone No" required readonly/>	  
	  <input name="page" type="text" size="2"value="<?php echo $data59['page'];?>" placeholder="Age" required readonly/>

	  		<label for="age"><strong>Patient's Diagnosis:</strong></label>
		
			  	<textarea name="diagno" readonly><?php echo $data444['diagnosis'];?></textarea>
		
		<br><br>

		<label for="age"><strong>Father's Name :</strong></label>
		<input name="fname" type="text" size="70" value=""required  />
		<label for="age"><strong>Mother's Name :</strong></label>
		<input name="mname" type="text" size="70" value=""required  />

		<label for="age"><strong>Permanent Address :</strong></label>
		<input name="peradd" type="text" size="70" value=""required  />

		<label for="age"><strong>National ID :</strong></label>
		<input name="nid" type="text" size="70" value=""required  />


      <label1 for="age"><strong color="green">Financial condition of the patients  :</strong></label1> <br><br><br>
	  
	  <label for="age"><strong>Occupation of the patient  :</strong></label> <br>
	  
	  <input list=pocu name="pocu" placeholder="Select Occupation" size="70">
					<datalist id="pocu">	
						
						<option value='Government Job'>Government Job</option>
						<option value='Private Job'>Private Job</option>
						<option value='Business'> Business</option>
						<option value='Others'>Others</option>
				 
						

						</datalist>
	 

	  	<br><br>
		
		<label for="age"><strong>Monthly Income :</strong></label>
		<input name="mincome" type="text" size="70" value=""required  />
		
		<label for="age"><strong>Dependents Please Mention Numbers :</strong></label>
		<input name="wife" type="text" size="30" value=""required placeholder="Wife" />
		<input name="child" type="text" size="30" value=""required placeholder="Children"  />
		<br><br>
		<label for="age"><strong>Income Source of Dependents :</strong></label>
		<input name="isource" type="text" size="70" value=""required  />
		<br><br>
		
		<label for="age"><strong>Owner of Land in Favor of Patients (in Acre) :</strong></label>
		<input name="land" type="text" size="70" value=""required  />
		<br><br>
		<label for="age"><strong>Service Place :</strong></label>
		<input name="service" type="text" size="70" value=""required  />
		<br><br>
		<label for="age"><strong>Select on the Patient’s possession (Have to include the photocopy)  :</strong></label> <br>
	  
	  <input list=poss name="poss" placeholder="Select Possession" size="70">
					<datalist id="poss">	
						
						<option value='VGF Card'>VGF Card</option>
						<option value='Old Allowance'>Old Allowance</option>
						<option value='Widow Allowance'> Widow Allowance</option>
						<option value='Handicap Card'>Handicap Card</option>
						<option value='Freedom Fighter Certificate'>Freedom Fighter Certificate</option>	
						

						</datalist>
						
						<br><br>
		<label for="age"><strong>Member of any political party , if yes have to mention with designation :</strong></label>
		<input name="political" type="text" size="70" value=""required  />
		<br><br>
		      
			  <label for="name"><strong>Select Ward :</strong></label>
			<p>
			<select name="btype1" class="country" value=''required/>
<option ="">--Select Ward--</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct type FROM bed");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
        <?php
	} 
?>
</select>

			       
		
		<label for="mail"><strong>Avaiable Bed :</strong></label>
									<p>
									
									
			<select name="bno" class="state" value=''required/>

</select>

<label for="age"><strong>Visitor Card  :</strong></label> <br>
	  
	   <select name="vcard" placeholder="Select Visitor Card" >
						
						<option value=''>-Select Visitor Card-</option>
				 <?php 
			$sql = "select * from `vcard` where status='AVAILABLE'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->c_no."'>".$row->c_no."</option>";
				}
			}
			?>	
						
						</select>						
			<select name="vcard1" placeholder="Select Visitor Card" >
						
						<option value=''>-Select Visitor Card-</option>
				 <?php 
			$sql1 = "select * from `vcard` where status='AVAILABLE'";
			$res1 = mysqli_query($con, $sql1);
			if(mysqli_num_rows($res1) > 0) {
				while($row1 = mysqli_fetch_object($res1)) {
					echo "<option value='".$row1->c_no."'>".$row1->c_no."</option>";
				}
			}
			?>	
						
						</select>

	   <select name="acard" placeholder="Select Attendant Card" required>
						
						<option value=''>-Select Attendant Card-</option>
				 <?php 
			$sql = "select * from `acard` where status='AVAILABLE'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->c_no."'>".$row->c_no."</option>";
				}
			}
			?>	
						
						</select>												

<label for="age"><strong>Select Payment By  :</strong></label> <br>
	  
	  	<input list=pmode name="pmode" placeholder="Select Payment Mode" size="30">
					<datalist id="pmode">	
					<option value='Cash'>Cash</option>
					<option value='Corporate'>Corporate</option>
					<option value='Credit / Debit Card'>Credit / Debit Card</option>
					<option value='SFMMKPJSH Staff'>SFMMKPJSH Staff<option>
						
						</datalist>
						
						
<input name="premarks" type="text" size="30" value=""required  />
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');



//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['ID'];
//$adate=$_REQUEST['adate'];
$query49 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$count1' and discharge=''");
$data49 = mysqli_fetch_assoc($query49);
  
?>


<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		<a target='_blank' href="admnew?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data49["adoc"]; ?>&adate=<?php echo $data49["adate"]; ?>&eid=<?php echo $count1; ?>&id=<?php echo $id; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>
