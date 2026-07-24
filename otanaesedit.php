<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','bill','ot')"; 
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
$dd4=date('d/m/Y');
$date1=date('Y-m-d');
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
$id1=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from otpac where pmrn='$pmrn' and eid='$id1'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row2 = mysqli_fetch_assoc($result);
$pn2= $row2['pname'];
$pm2= $row2['pmrn'];
$pp2= $row2['pphone'];  
$pa2= $row2['page'];
$ps2= $row2['psex'];
$ad2= $row2['adate'];
$id= $row2['id'];



$query2 = "SELECT * from ot where pmrn='$pmrn' and id='$id1'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result2);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pa= $row['page'];
$ps= $row['psex'];
$ad= $row['adate'];  
$nanes= $row['nanes'];  

$query3 = "SELECT * FROM otpac where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3 = mysqli_query($con, $query3);


$query3anaes = "SELECT * FROM otanaestype where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3anaes = mysqli_query($con, $query3anaes);

$query3position = "SELECT * FROM otanaesposition where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3position = mysqli_query($con, $query3position);

$query3care = "SELECT * FROM otanaescare where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3care = mysqli_query($con, $query3care);


$query3co2 = "SELECT * FROM otanaesetco2 where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3co2 = mysqli_query($con, $query3co2);


$query3sbp = "SELECT * FROM otanaessbp where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3sbp = mysqli_query($con, $query3sbp);

$query3pulse = "SELECT * FROM otanaespulse where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3pulse = mysqli_query($con, $query3pulse);


$query3spo2 = "SELECT * FROM otanaesspo2 where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3spo2 = mysqli_query($con, $query3spo2);

$query3temp = "SELECT * FROM otanaestemp where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3temp = mysqli_query($con, $query3temp);

$query3rr = "SELECT * FROM otanaesrr where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3rr = mysqli_query($con, $query3rr);

$query3cvp = "SELECT * FROM otanaescvp where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3cvp = mysqli_query($con, $query3cvp);

$query3ibp = "SELECT * FROM otanaesibp where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3ibp = mysqli_query($con, $query3ibp);

$query3urine = "SELECT * FROM otanaesurine where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3urine = mysqli_query($con, $query3urine);

$query3sugar = "SELECT * FROM otanaesbsugar1 where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3sugar = mysqli_query($con, $query3sugar);

$query3bloss = "SELECT * FROM otanaesbloss where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3bloss = mysqli_query($con, $query3bloss);

$query3btrans = "SELECT * FROM otanaesbtrans where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3btrans = mysqli_query($con, $query3btrans);

$query3other = "SELECT * FROM otanaesother where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3other = mysqli_query($con, $query3other);

$query3medi = "SELECT * FROM otanaesmedi where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3medi = mysqli_query($con, $query3medi);

$query3infu = "SELECT * FROM otanaesinfusion where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3infu = mysqli_query($con, $query3infu);

$query3vas = "SELECT * FROM otanaesvas where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3vas = mysqli_query($con, $query3vas);



$query3res = "SELECT * FROM otanaesres where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3res = mysqli_query($con, $query3res);


$query3vol = "SELECT * FROM otanaesvol where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3vol = mysqli_query($con, $query3vol);

$query3circuit = "SELECT * FROM circuit where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3circuit = mysqli_query($con, $query3circuit);








?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$pmrn=$_REQUEST['pmrn'];
$pname=$_REQUEST['pname'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$pphone=$_REQUEST['pphone'];
$adate=$_REQUEST['adate'];
$dname=$_REQUEST['dname'];
$induction=$_REQUEST['induction'];

$intubation=$_REQUEST['intubation'];
$anaestime=$_REQUEST['anaestime'];
$dl=$_REQUEST['dl'];

$com=$_REQUEST['com'];
$proce=$_REQUEST['proce'];

$adate1= date('d/m/Y H:i:s');

$etime= date('m/d/Y h:i:s');



//$x4=$_REQUEST['xl4'];
//$lx4= implode(",",$x4);



if($res90=mysqli_num_rows($result3)==0)
{
	
$insert1="insert into otpac (`pname`,`pmrn`,`eid`,`page`,`psex`,`pphone`,`adate`,`dname`,`induction`,`intubation`,`anaestime`,`dl`,`com`,`proce`,`eby`,`etime`,`status`)
 values ('$pname', '$pmrn','$id1','$page','$psex','$pphone','$adate','$dname','$induction','$intubation','$anaestime','$dl','$com','$proce','$full','$etime','DONE')";

 
 
mysqli_query($con,$insert1);




/*$ins_query7="insert into otivisitendo (`pmrn`,`eid`,`infusion`,`room`,`cdate`,`user`,`vtype`,`odate`) values 
( '$pmrn','$id1','$full','$charge','$date1','$user','$proname','$adate1')";
mysqli_query($con,$ins_query7) or die(mysql_error());*/


$url = "otanaesedit?pmrn=$pmrn&id=$id1";
header("Location: $url");
}
else {


$insert="update otpac set `induction`='$induction',`intubation`='$intubation',`anaestime`='$anaestime',`dl`='$dl',`com`='$com',`proce`='$proce',`editb`='$full',`editt`='$etime' where pmrn='$pmrn' and eid ='$id1'";

mysqli_query($con,$insert);
$url = "otanaesedit?pmrn=$pmrn&id=$id1";
header("Location: $url");
//header("Location:$url");
}
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Surgical Note</title>
  
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
   
 
   
   <script>
$(document).ready(function(){
  $('#dropdown').change(function() {
    if( $(this).val() == 'YES') {
        $('#gasize').prop( "disabled", false );
		$('#gasize').show();
    } else {       
        
		$('#gasize').hide();
		
    }
});
});
</script>


<script>
$(document).ready(function(){
  $('#dropdown1').change(function() {
    if( $(this).val() == 'YES') {
        $('#lmsize').prop( "disabled", false );
		$('#lmsize').show();
    } else {       
        
		$('#lmsize').hide();
		
    }
});
});
</script>



<script>
$(document).ready(function(){
  $('#dropdown2').change(function() {
    if( $(this).val() == 'YES') {
        $('#ett').prop( "disabled", false );
		$('#ett').show();
		$('#ett1').prop( "disabled", false );
		$('#ett1').show();
    } else {       
        
		$('#ett').hide();
		
		$('#ett1').hide();
		
    }
});
});
</script>



<script>
$(document).ready(function(){
  $('#dropdown3').change(function() {
    if( $(this).val() == 'YES') {
        $('#trache').prop( "disabled", false );
		$('#trache').show();
		
    } else {       
        
		$('#trache').hide();
		
		
    }
});
});

</script>



<script>
$(document).ready(function(){
  $('#dropdown4').change(function() {
    if( $(this).val() == 'YES') {
        $('#ng').prop( "disabled", false );
		$('#ng').show();
		$('#ng1').prop( "disabled", false );
		$('#ng1').show();
    } else {       
        
		$('#ng').hide();
		
		$('#ng1').hide();
		
    }
});
});
</script>


<script>
$(document).ready(function(){
  $('#ventilation').change(function() {
    if( $(this).val() == 'PPV') {
        $('#ppv').prop( "disabled", false );
		$('#ppv').show();
		$('#vt').prop( "disabled", false );
		$('#vt').show();
		$('#v').prop( "disabled", false );
		$('#v').show();
		$('#f').prop( "disabled", false );
		$('#f').show();
		$('#inmax').prop( "disabled", false );
		$('#inmax').show();
		$('#spontaneous').prop( "disabled", true );
		$('#spontaneous').hide();
    } else {       
        
		$('#ppv').hide();
		$('#vt').hide();
		$('#v').hide();
		$('#f').hide();
		$('#inmax').hide();
		
    }
});


});
</script>
   
   
   
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

<h1 align="center">SURGERY / PROCEDURE NOTE </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");'">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Anaesthetis's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><input type="text" name="dname" required value="<?php echo $nanes; ?>" readonly/>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
				
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="18"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="2"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly/></td>
					 <td colspan="18"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly/></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="2"><label><strong>Phone No:</strong></label></td>
						<td colspan="2"><label><strong>Date:</strong></label></td>
						<td colspan="6"><label><strong>Induction TIME:</strong></label></td>		
						<td colspan="3"><label><strong>Intubation TIME:</strong></label></td>		
						</tr>
						
						
						<tr>				
						<td colspan="2"><input type="text" name="page" required value="<?php echo $pa;?>" readonly/></td>  
             		<td colspan="3"><input type="text" name="adate" value="<?php echo $ad;?>"readonly/></td>					 	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly/></td>
					 <td colspan="2"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly/></td>  

			    	 <td colspan="2"><input type="text" name="date" value="<?php echo "$dd4";?>"></td>  
					 <td colspan="6">
					 
					 <input type="text" name="induction" required value="<?php echo $row2['induction'];?>"></td>
					 
					



<td colspan="3">
<input type="text" name="intubation" required value="<?php echo $row2['intubation'];?>"></td>
				
					 </tr>
					 
					 
		
		<tr>
							<td colspan="20"><label><strong>Name of Surgery </strong></label></td>
						
						
						
						</tr>
						
						<tr>				
						
					 <td colspan="20"><input type="text" name="proce" value="<?php echo $row['proce'].','.$row['Otherins'];?>" ></td> 
					 

					
						
						 </tr>
						 
						 
						 <tr>
							<td colspan="20"><label><strong>Communication with the patient</strong></label></td>
						
						
						
						</tr>
						
						<tr>				
						
					 <td colspan="20"><textarea name="com" rows="4"><?php echo $row2['com'];?></textarea></td> 
					 

					
						
						 </tr>
             		
 <tr><td colspan="20"><label><strong>Difficulty level of the case </strong></label></td>  </tr>
 

						  <tr><td colspan="20"><select name="dl">
        
						<option value='<?php echo $row2['dl'];?>'><?php echo $row2['dl'];?></option>
						<option value='Routine'>Routine</option>
						<option value='Emergency'>Emergency</option>
						<option value='Critical Case'>Critical Case</option>
						
						
				
</select></td>


</tr>
						
						
						
						
						
<tr><td colspan="20"><label><strong>Anesthesia start time</strong></label></td>  </tr>
 


<tr><td colspan="20"><input type="text" id="gasize"  name="anaestime" value="<?php echo $row2['anaestime'];?>" placeholder="anaestime" /></td>


</tr>




<tr><td colspan="20"><label><strong><a target='_blank'href="otchargenurse2_new11?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">MEDICATION</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otchargenurse2_new11?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">INFUSION</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesvitals?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">VITALS</strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="tanaes?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">TYPE OF ANESTHESIA </a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="anaesposition?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">PATIENTS POSITION </a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="anaescare?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">CARE AND MONITOR</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="anaesvas?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>"> VASCULAR ACCESS, TUBES AND CATHETERS</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="anaesres?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>"> RESPIRATORY MANAGEMENT </a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="anaesvol?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>"> VOLATILE AGENTS  </a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="otanaesvitalsnursedocnew?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">ANESTHESIA MACHINE PARAMETERS</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="otidocinvesstat?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">CHARGE</a></strong></label></td> </tr>
		

	

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="otanaesprint?id=<?php echo "$id1"; ?>&pmrn=<?php echo "$pmrn"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
