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

$query3 = "SELECT * FROM otpac where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3 = mysqli_query($con, $query3);



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
$ecare=$_REQUEST['ecare'];
$acare=$_REQUEST['acare'];

$pposition=$_REQUEST['pposition'];
$psite=$_REQUEST['psite'];
$psize=$_REQUEST['psize'];
$csite=$_REQUEST['csite'];
$asite=$_REQUEST['asite'];
$circuit=$_REQUEST['circuit'];
$ventilation=$_REQUEST['ventilation'];
$rapid=$_REQUEST['rapid'];
//$rtechnique=$_REQUEST['rtechnique'];
$lgrading=$_REQUEST['lgrading'];
$cevents=$_REQUEST['cevents'];
//$eby=$_REQUEST['eby'];
$ga=$_REQUEST['dropdown'];
$gasize=$_REQUEST['gasize'];

$lm=$_REQUEST['dropdown1'];
$lmsize=$_REQUEST['lmsize'];

$ett=$_REQUEST['dropdown2'];
$ett1=$_REQUEST['ett'];
$ett2=$_REQUEST['ett1'];

$trache=$_REQUEST['dropdown3'];
$trache1=$_REQUEST['trache'];


$ng=$_REQUEST['dropdown4'];
$ng1=$_REQUEST['ng'];
$ng2=$_REQUEST['ng1'];

$adate1= date('d/m/Y H:i:s');

$etime= date('m/d/Y h:i:s');



//$x4=$_REQUEST['xl4'];
//$lx4= implode(",",$x4);

$rtechnique=$_REQUEST['rtechnique'];
$rtechnique1= implode(",",$rtechnique);

$monitoring1=$_REQUEST['monitoring1'];
$monitoring= implode(",",$monitoring1);

$rlevel=$_REQUEST['rlevel'];
$rdrugs=$_REQUEST['rdrugs'];
$rothers=$_REQUEST['rothers'];
$inmax=$_REQUEST['inmax'];
$f=$_REQUEST['f'];
$v=$_REQUEST['v'];
$vt=$_REQUEST['vt'];
$ppv=$_REQUEST['ppv'];
$spontaneous=$_REQUEST['spontaneous'];
$gasflow=$_REQUEST['gasflow'];
$co2a=$_REQUEST['co2a'];
$hme=$_REQUEST['hme'];
$peroxy=$_REQUEST['peroxy'];
$charge=$_REQUEST['charge'];


if($res90=mysqli_num_rows($result3)==0)
{
	
$insert1="insert into otpac (`pname`,`pmrn`,`eid`,`page`,`psex`,`pphone`,`adate`,`dname`,`induction`,`intubation`,`ecare`,`acare`,`monitoring`,`pposition`,`psite`,`psize`,`csite`,`asite`,`circuit`,`ventilation`,`rapid`,`rtechnique`,`lgrading`,`cevents`,`eby`,`etime`,`status`,`ga`,`gasize`,`lm`,`lmsize`,`ett`,`ett1`,`ett2`,`trache`,`trache1`,`ng`,`ng1`,`ng2`,`rlevel`,`rdrugs`,`rothers`,`inmax`,`f`,`v`,`vt`,`ppv`,`spontaneous`,`gasflow`,`co2a`,`hme`,`peroxy`,`charge`)
 values ('$pname', '$pmrn','$id1','$page','$psex','$pphone','$adate','$dname','$induction','$intubation','$ecare','$acare','$monitoring','$pposition','$psite','$psize','$csite','$asite','$circuit','$ventilation','$rapid','$rtechnique1','$lgrading','$cevents','$full','$etime','DONE','$ga','$gasize','$lm','$lmsize','$ett','$ett1','$ett2','$trache','$trache1','$ng','$ng1','$ng2','$rlevel','$rdrugs','$rothers','$inmax','$f','$v','$vt','$ppv','$spontaneous','$gasflow','$co2a','$hme','$peroxy','$charge')";

mysqli_query($con,$insert1);


/*$ins_query7="insert into otivisitendo (`pmrn`,`eid`,`infusion`,`room`,`cdate`,`user`,`vtype`,`odate`) values 
( '$pmrn','$id1','$full','$charge','$date1','$user','$proname','$adate1')";
mysqli_query($con,$ins_query7) or die(mysql_error());*/


$url = "otanaesedit?pmrn=$pmrn&id=$id1";
header("Location: $url");
}
else {


$insert="update otpac set `induction`='$induction',`intubation`='$intubation',`ecare`='$ecare',`acare`='$acare',`monitoring`='$monitoring',`pposition`='$pposition',`psite`='$psite',`psize`='$psize',`csite`='$csite',`asite`='$asite',`circuit`='$circuit',`ventilation`='$ventilation',`rapid`='$rapid',`rtechnique`='$rtechnique1',
`lgrading`='$lgrading',`cevents`='$cevents',`editb`='$full',`editt`='$etime',`ga`='$ga',`gasize`='$gasize',`lm`='$lm',`lmsize`='$lmsize',`ett`='$ett',`ett1`='$ett1',`ett2`='$ett2',`trache`='$trache',`trache1`='$trache1',`ng`='$ng',`ng1`='$ng1',
`ng2`='$ng2',`rlevel`='$rlevel',`rdrugs`='$rdrugs',`rothers`='$rothers',`inmax`='$inmax',`f`='$f',`v`='$v',`vt`='$vt',`ppv`='$ppv',
`spontaneous`='$spontaneous',`gasflow`='$gasflow',`co2a`='$co2a',`hme`='$hme',`peroxy`='$peroxy',`charge`='$charge' where pmrn='$pmrn' and eid ='$id1'";

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
				<td colspan="20"><input type="text" name="dname" required value="<?php echo $full; ?>" readonly/>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
				<tr><td colspan="20"><label><strong>2nd Anaesthetis's Name :</strong></label></td></tr>		
				<tr><td colspan="20"><select name="xl4[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Dr. J.M.H Qausar Alam">Dr. J.M.H Qausar Alam</option>
<option value="Dr. Razeeb Hassan">Dr. Razeeb Hassan</option>
<option value="Dr. Md.Rakibul Hassan">Dr. Md. Rakibul Hassan</option>
<option value="Dr. Ranen Biswas">Dr. Ranen Biswas</option>
<option value="Dr. Md. Abdur Razzak">Dr. Md. Abdur Razzak</option>





       
    </select></td></tr>
	
	
			
    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: 'Select Investigation',
            search: true,
            searchOptions: {
                'default': '-Select Investigation-'
            },
            selectAll: true
        });

    });
</script>
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
							<td colspan="5"><label><strong>Eye Care:</strong></label></td>
						<td colspan="5"><label><strong>Pressure Area Care:</strong></label></td>
						<td colspan="5"><label><strong>Monitoring:</strong></label></td>
						<td colspan="5"><label><strong>Patient Position:</strong></label></td>
						
						
						</tr>
						
						<tr>				
						
					 <td colspan="5"><input type="text" name="ecare" value="<?php echo $row2['ecare'];?>" ></td> 
					 <td colspan="5"><input type="text" name="acare" value="<?php echo $row2['acare'];?>" ></td> 

						<td colspan="5">
						
						<select name="monitoring1[]" multiple="multiple" class="3col active" placeholder="Select Regional Technique"required>
       
						
						<option value='<?php echo $row2['monitoring'];?>'selected></option>
						<option value='ECG'>ECG</option>
						<option value='BP'>BP</option>
						<option value='ETCO2'>ETCO2</option>
						<option value='Temperature'>Temperature</option>
						<option value='SPO2'>SPO2</option>
						<option value='INV-BP'>INV-BP</option>
						
						
				

						
						
				
</select>
						
						
						</td> 
						
						<td colspan="5"><select name="pposition">
        
						<option value='<?php echo $row2['pposition'];?>'><?php echo $row2['pposition'];?></option>
						<option value='Supine'>Supine</option>
						<option value='Lithotomy'>Lithotomy</option>
						<option value='Trendelenburgh'>Trendelenburgh</option>
						<option value='Reverse Trendelenburgh'>Reverse Trendelenburgh</option>
						<option value='Kidney Position'>Kidney Position</option>
				
</select></td>  </tr>
             		
 <tr><td colspan="20"><label><strong>Vascular Access</strong></label></td>  </tr>
 <tr><td colspan="20"><label><strong>Peripheral</strong></label></td>  </tr>
 <tr><td colspan="10"><label><strong>Site</strong></label></td>

<td colspan="10"><label><strong>Size</strong></label></td> </tr>
						  <tr><td colspan="10"><select name="psite">
        
						<option value='<?php echo $row2['psite'];?>'><?php echo $row2['psite'];?></option>
						<option value='Wrist'>Wrist</option>
						<option value='Cubital'>Cubital</option>
						<option value='Mid Forearm'>Mid Forearm</option>
						<option value='Arm'>Arm</option>
						
				
</select></td>

<td colspan="10"><select name="psize">
        
						<option value='<?php echo $row2['psize'];?>'><?php echo $row2['psize'];?></option>
						<option value='16 Fr'>16 Fr</option>
						<option value='18 Fr'>18 Fr</option>
						<option value='20 Fr'>20 Fr</option>
						<option value='22 Fr'>22 Fr</option>
						<option value='24 Fr'>24 Fr</option>
						
				
</select></td>

</tr>
						
						
						
						
						
<tr><td colspan="20"><label><strong>Central</strong></label></td>  </tr>
 <tr><td colspan="20"><label><strong>Site</strong></label></td>


						  <tr><td colspan="20"><select name="csite">
        
						<option value='<?php echo $row2['csite'];?>'><?php echo $row2['csite'];?></option>
						<option value='IJV'>IJV</option>
						<option value='SC'>SC</option>
						<option value='Femoral'>Femoral</option>
						
						
				
</select></td>


</tr>


<tr><td colspan="20"><label><strong>Arterial Line</strong></label></td>  </tr>
 <tr><td colspan="20"><label><strong>Site</strong></label></td>


						  <tr><td colspan="20"><select name="asite">
        
						<option value='<?php echo $row2['asite'];?>'><?php echo $row2['asite'];?></option>
						<option value='Radial'>Radial</option>
						<option value='Femoral'>Femoral</option>
						
						
				
</select></td>


</tr>


<tr><td colspan="20"><label><strong>Respiratory Management</strong></label></td>  </tr>

<tr><td colspan="20"><label><strong>Guedal Airways</strong></label></td></tr>	
<tr><td colspan="10"><select id='dropdown' name='dropdown' value="">
  <option value="<?php echo $row2['ga'];?>"><?php echo $row2['ga'];?></option>
  <option value="YES">YES</option>
  <option value="NO">NO</option>
  
</select></td>
<td colspan="10"><input type="text" id="gasize"  name="gasize" value="<?php echo $row2['gasize'];?>" placeholder="Guedal Airway Size" /></td>

<tr>


<tr><td colspan="20"><label><strong>LM</strong></label></td></tr>	
<tr><td colspan="10"><select id='dropdown1' name='dropdown1'>
  <option value="<?php echo $row2['lm'];?>"><?php echo $row2['lm'];?></option>
  <option value="YES">YES</option>
  <option value="NO">NO</option>
  
</select></td>
<td colspan="10"><input type="text" id="lmsize" name="lmsize" value="<?php echo $row2['lmsize'];?>" placeholder="LM Size" /></td>

<tr>


<tr><td colspan="20"><label><strong>ETT</strong></label></td></tr>	
<tr><td colspan="10"><select id='dropdown2' name='dropdown2'>
  <option value="<?php echo $row2['ett'];?>"><?php echo $row2['ett'];?></option>
  <option value="YES">YES</option>
  <option value="NO">NO</option>
  
</select></td>
<td colspan="5"><input type="text" id="ett" name="ett" value="<?php echo $row2['ett1'];?>" placeholder="ETT Type" /></td>
<td colspan="5"><input type="text" id="ett1"  name="ett1" value="<?php echo $row2['ett2'];?>" placeholder="ETT Size" /></td>

<tr>

<tr><td colspan="20"><label><strong>Tracheostomy</strong></label></td></tr>	
<tr><td colspan="10"><select id='dropdown3' name='dropdown3'>
  <option value="<?php echo $row2['ett'];?>"><?php echo $row2['ett'];?></option>
  <option value="YES">YES</option>
  <option value="NO">NO</option>
  
</select></td>
<td colspan="10"><input type="text" id="trache" name="trache" value="<?php echo $row2['trache1'];?>" placeholder="Tracheostomy Type" /></td>


<tr>


<tr><td colspan="20"><label><strong>NG Tube</strong></label></td></tr>	
<tr><td colspan="10"><select id='dropdown4' name='dropdown4'>
  <option value="<?php echo $row2['ng'];?>"><?php echo $row2['ng'];?></option>
  <option value="YES">YES</option>
  <option value="NO">NO</option>
  
</select></td>
<td colspan="5"><input type="text" id="ng" name="ng" value="<?php echo $row2['ng1'];?>"placeholder="NG Type" /></td>
<td colspan="5"><input type="text" id="ng1" name="ng1" value="<?php echo $row2['ng2'];?>" placeholder="NG Size" /></td></tr>






<tr><td colspan="5"><label><strong>Circuit</strong></label></td>
<td colspan="5"><label><strong>CO2 Absroption</strong></label></td>
<td colspan="5"><label><strong>HME</strong></label></td>
<td colspan="5"><label><strong>Preoxygenation</strong></label></td><tr>


<tr>

<td colspan="5"><input type="text" id="circuit" name="circuit"placeholder="circuit" value="<?php echo $row2['circuit'];?>" ></td>


		<td colspan="5"><select name="co2a">
        
						<option value="<?php echo $row2['co2a'];?>"><?php echo $row2['co2a'];?></option>
						<option value='ON'>ON</option>
						<option value='OFF'>OFF</option>
						</select></td>
						
						<td colspan="5"><select name="hme">
        
						<option value="<?php echo $row2['hme'];?>"><?php echo $row2['hme'];?></option>
						<option value='USED'>USED</option>
						<option value='NOT USED'>NOT USED</option>
						</select></td>
						
						<td colspan="5"><select name="peroxy">
        
						<option value="<?php echo $row2['peroxy'];?>"><?php echo $row2['peroxy'];?></option>
						<option value='DONE'>DONE</option>
						<option value='NOT DONE'>NOT DONE</option>
						</select></td>


</tr>





<tr><td colspan="20"><label><strong>Ventilation</strong></label></td>


						  <tr><td colspan="20"><select name="ventilation" id='ventilation'>
        
						<option value='<?php echo $row2['ventilation'];?>'><?php echo $row2['ventilation'];?></option>
						<option value='PPV'>PPV</option>
						<option value='Spontaneous Respiration'>Spontaneous Respiration</option>
						
						
						
						
				
</select></td>


</tr>


<tr><td colspan="20"><label><strong>Gsa Flow</strong></label></td>
<tr><td colspan="20"><input type="text" name="gasflow" value="<?php echo $row2['gasflow'];?>" id='gasflow'></td>

<tr><td colspan="20"><label><strong>Spontaneous Respiration </strong></label></td>
<tr><td colspan="20"><input type="text" name="spontaneous" value="<?php echo $row2['spontaneous'];?>" id='spontaneous'></td>

<tr><td colspan="20"><label><strong>PPV</strong></label></td>
<tr><td colspan="20"><input type="text" name="ppv" value="<?php echo $row2['ppv'];?>" id='ppv' ></td>

<tr><td colspan="20"><label><strong>VT</strong></label></td>
<tr><td colspan="20"><input type="text" name="vt" value="<?php echo $row2['vt'];?>" id='vt' ></td>

<tr><td colspan="20"><label><strong>V</strong></label></td>
<tr><td colspan="20"><input type="text" name="v" value="<?php echo $row2['v'];?>" id='v'></td>

<tr><td colspan="20"><label><strong>F</strong></label></td>
<tr><td colspan="20"><input type="text" name="f" value="<?php echo $row2['f'];?>" id='f'></td>

<tr><td colspan="20"><label><strong>Inmax</strong></label></td>
<tr><td colspan="20"><input type="text" name="inmax" value="<?php echo $row2['inmax'];?>" id='inmax'></td>




<tr><td colspan="20"><label><strong>Rapid Sequence Intubation</strong></label></td>


						  <tr><td colspan="20"><select name="rapid">
        
						
						<option value='YES'>YES</option>
						<option value='NO'>NO</option>
						
						
						
						
				
</select></td>


</tr>

<tr><td colspan="20"><label><strong>Laryngoscopy Graden</strong></label></td>


						  <tr><td colspan="20"><input type="text" name="lgrading" value="<?php echo $row2['lgrading'];?>" ></td>


</tr>




<tr><td colspan="20"><label><strong>Regional Technique</strong></label></td>


						  <tr><td colspan="20">
						
					<select name="rtechnique[]" multiple="multiple" class="3col active" placeholder="Select Regional Technique"required>
       
						
						<option value='<?php echo $row2['rtechnique'];?>'selected></option>
						<option value='Epidural'>Epidural</option>
						<option value='SAB'>SAB</option>
						<option value='Caudal'>Caudal</option>
						<option value='Plexus Block'>Plexus Block</option>
						<option value='Nerve Block'>Nerve Block</option>
						
						
				

						
						
				
</select></td>


</tr>





<tr><td colspan="20"><label><strong>Level</strong></label></td>
<tr><td colspan="20"><input type="text" name="rlevel" value="<?php echo $row2['rlevel'];?>" ></td>

<tr><td colspan="20"><label><strong>Drugs</strong></label></td>
<tr><td colspan="20"><input type="text" name="rdrugs" value="<?php echo $row2['rdrugs'];?>" ></td>

<tr><td colspan="20"><label><strong>Others</strong></label></td>
<tr><td colspan="20"><input type="text" name="rothers" value="<?php echo $row2['rothers'];?>" ></td>


<tr><td colspan="20"><label><strong>Difficulities / Critical Events</strong></label></td></tr>


						  <tr><td colspan="20"><input type="text" name="cevents" value="<?php echo $row2['cevents'];?>" ></td>


</tr>

<tr><td colspan="20" align="left"bgcolor="lightgreen"><label><strong>Charge</strong></label></td> </tr><tr>
<td colspan="20" ><input type="text" name="charge" required value=""></td>
</tr>


<tr><td colspan="20"><label><strong><a target='_blank'href="otanaesmedi?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Medication</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesinfusion?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Infusion</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesn2o?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">N20/Air</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesagent?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Volatile Agent</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesvitals?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Vitals</strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="otanaesbsugar?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Blood Sugar</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesbloss?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Blood Loss</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="otanaesurine?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Urine Output</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesinves?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Peroperative Investigation</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesbtrans?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id"; ?>">Blood Transfsion Order</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank' href="otanaesother?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Other Fluid Loss</a></strong>&nbsp;&nbsp;&nbsp;<strong><a target='_blank'href="otanaestour?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id1"; ?>">Tourniquite</a></strong></label></td></tr>
		

	

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="otanaesprint?id=<?php echo "$id"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
