<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','imo')"; 
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
$ugroup = $row39['ugroup'];
$date=date('m/d/Y');
$two = substr($fullname, -2);
$eid1=date('mds').$two;

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
//$id=$_REQUEST['ID'];
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
$ttr=$row['bdate'];
$te=date('d',strtotime($ttr));
	$te1=date('m',strtotime($ttr));
	$te2=date('Y',strtotime($ttr));
	
	$date11=date_create("$te-$te1-$te2");
	$date91=date_format($date11,'Y-m-d');
	$date12= date('d-m-Y');
	$date22=date_create($date12);
	//$date90=date_format($date2,'d/m/Y');
	$diff=date_diff($date22,$date11);
	$diff1= $diff->format("%y Y %m M %d D");
	$diff1;


$query43 = "SELECT COUNT(pmrn) FROM preanaes where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$eid = $count+1;
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$dname=$_REQUEST['dname'];
$pmrn=$_REQUEST['pmrn'];
$pname=$_REQUEST['pname'];
$height=$_REQUEST['height'];
$sname=$_REQUEST['sname'];
$weight=$_REQUEST['weight'];
$allergy=$_REQUEST['allergy'];
$teeth=$_REQUEST['teeth'];
$airway=$_REQUEST['airway'];
$mscore=$_REQUEST['mscore'];
$otherins=$_REQUEST['otherins'];
$preanae=$_REQUEST['preanae'];
$mediprob=$_REQUEST['mediprob'];

$premedi=$_REQUEST['premedi'];
$pulse=$_REQUEST['pulse'];
$temp=$_REQUEST['temp'];
$bp=$_REQUEST['bp'];
$jaundice=$_REQUEST['jaundice'];
$cyanosis=$_REQUEST['cyanosis'];

$edema=$_REQUEST['edema'];
//$lx2= implode(",",$x2);

//$otdate= date('m/d/Y');



$cvs=$_REQUEST['cvs'];
//$lx4= implode(",",$x4);





$resp=$_REQUEST['resp'];
$git=$_REQUEST['git'];
$cns=$_REQUEST['cns'];
$hb=$_REQUEST['hb'];
$wbc=$_REQUEST['wbc'];
$pla=$_REQUEST['pla'];
$pt=$_REQUEST['pt'];
$inr=$_REQUEST['inr'];
$bt=$_REQUEST['bt'];
$ct=$_REQUEST['ct'];
$aptt=$_REQUEST['aptt'];
$urea=$_REQUEST['urea'];
$creatinine=$_REQUEST['creatinine'];
$na=$_REQUEST['na'];
$k=$_REQUEST['k'];
$cl=$_REQUEST['cl'];
$hco3=$_REQUEST['hco3'];
$glucose=$_REQUEST['glucose'];
$hbs=$_REQUEST['hbs'];
$hcv=$_REQUEST['hcv'];
$hiv=$_REQUEST['hiv'];
$abg=$_REQUEST['abg'];
$pft=$_REQUEST['pft'];
$tft=$_REQUEST['tft'];
$echo=$_REQUEST['echo'];
$xray=$_REQUEST['xray'];
$ecg=$_REQUEST['ecg'];
$bgroup=$_REQUEST['bgroup'];

$crossm=$_REQUEST['crossm'];
//$tanaesthesia=$_REQUEST['tanaesthesia'];
//$prelief=$_REQUEST['prelief'];
$rfactor=$_REQUEST['rfactor'];
$tsurgery=$_REQUEST['tsurgery'];
$nil=$_REQUEST['nil'];
$premedication=$_REQUEST['premedication'];
$remarks=$_REQUEST['remarks'];
$charge=$_REQUEST['charge'];
$tsh=$_REQUEST['tsh'];
$aadate= date('m/d/Y ');
$adate= date('d/m/Y H:i:s');
$x3=$_REQUEST['xl3'];
$tanaesthesia= implode(",",$x3); 

$x4=$_REQUEST['xl4'];
$prelief= implode(",",$x4);

$otname=$_REQUEST['otname'];
$urinere=$_REQUEST['urinere'];
$others1=$_REQUEST['others1'];

$ins_query="insert into preanaes (`dname`,`pmrn`,`pname`,`height`,`surgeon`,`weight`,`allergy`,`teeth`,`airway`,`mscore`,`otherins`,`preanae`,`mediprob`,`premedi`,`pulse`,`temp`,`bp`,`jaundice`,`cyanosis`,`edema`,`cvs`,`resp`,`git`,`cns`,`hb`,`wbc`,`pla`,`pt`,`inr`,`bt`,`ct`,`aptt`,`urea`,`creatinine`,`na`,`k`,`cl`,`hco3`,`glucose`,`hbs`,`hcv`,`hiv`,`abg`,`pft`,`tft`,`echo`,`xray`,`ecg`,`bgroup`,`crossm`,`tanaesthesia`,`prelief`,`rfactor`,`tsurgery`,`nil`,`premedication`,`remarks`,`charge`,`date`,`time`,`page`,`psex`,`eid`,`otname`,`urinere`,`others1`,`tsh`,`eid1`) values 
('$dname', '$pmrn','$pname','$height','$sname','$weight','$allergy','$teeth','$airway','$mscore','$otherins','$preanae','$mediprob','$premedi','$pulse','$temp','$bp','$jaundice','$cyanosis','$edema','$cvs','$resp', '$git','$cns','$hb','$wbc','$pla','$pt','$inr','$bt','$ct','$aptt','$urea','$creatinine','$na','$k','$cl','$hco3','$glucose','$hbs','$hcv','$hiv','$abg','$pft','$tft','$echo', '$xray','$ecg','$bgroup','$crossm','$tanaesthesia','$prelief','$rfactor','$tsurgery','$nil','$premedication','$remarks','$charge','$aadate','$adate','$diff1','$ps','$eid','$otname','$urinere','$others1','$tsh','$eid1')";
mysqli_query($con,$ins_query) or die(mysql_error());


//$ins_query="insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`) values 
//( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$vtype','$daten','$entry_time')";

/*$update= "update ot set status='DONE',Indication='$Indication', prep='$prep',incision='$incision',findings='$findings',procedure2='$procedure2',peroperative='$peroperative',drain='$drain'
,cs='cs',position='$position',biopsyspe='$biopsyspe',biopsy='$biopsy',bloss='$bloss',pplan='$pplan',hplan='$hplan',
diagnosis='$diagnosis',adate='$adate',otdate='$otdate',bookingdt='$bkdate',duration='$bt',
ptype='$tp',tanes='$x3',nanes='$na',proce='$lx',duration1='$duration',Otherins='$otherins',sprequire='$sprequire',remarks='$remarks',otdate='$otdate',nurse='$x2',asdoc='$lx4',oo='$oo',ci='$ci',ngi='$ngi',di='$di',morder='$morder',nmorder='$nmorder',inorder='$inorder',o2='$o2'where `id`='$id'";

mysqli_query($con,$update);*/



}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>PAC</title>
  
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
	


<h1 align="center">Pre Anaesthesia Checkup </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");'">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Anaesthetist's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><input type="text" name="sname" required value="<?php echo $full; ?>" readonly/>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
												
												
												<tr><td colspan="20"><label><strong>Surgeon's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><select name="dname" value="" class="test">
			        <option value=''>-Select Doctor-</option>
				<?php 
			$sql = "select * from `doctor` where status in('active','Active')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select>
			</td>
			
			<script>
$(document).ready(function() {
    $('.test').select2();
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
			
			</tr>
						
				
						<td colspan="3"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="11"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="3"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Sex:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="3"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly/></td>
					 <td colspan="11"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly/></td>
					 <td colspan="3"><input type="text" name="page" required value="<?php echo $diff1;?>" readonly/></td>
					 <td colspan="3"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly/></td>

					 
</tr>

						
						



		
					 
					 
		
		<tr>
							<td colspan="3"><label><strong>Height(cm):</strong></label></td>
						<td colspan="3"><label><strong>Weight(KG):</strong></label></td>
						<td colspan="3"><label><strong>Allergy:</strong></label></td>
						<td colspan="3"><label><strong>Teeth:</strong></label></td>
						<td colspan="3"><label><strong>Airway:</strong></label></td>
						<td colspan="5"><label><strong>Mallampati Score:</strong></label></td>
						
						
						</tr>
						
						<tr>				
						
					 <td colspan="3"><input type="text" name="height" size="15"value=""></td> 
					 <td colspan="3"><input type="text" name="weight" size="15"value="" ></td>  		
					 <td colspan="3"><input type="text" name="allergy" size="15"value="" ></td>  		
					 <td colspan="3"><input type="text" name="teeth" size="15"value="" ></td>  		
					 <td colspan="3"><input type="text" name="airway" size="15"value="" ></td>  		
					 <td colspan="5"><input type="text" name="mscore" size="15"value="" ></td>  		

						
						
						
<tr><td colspan="20"><label><strong>Others:</strong></label></td></tr>						
<tr><td colspan="20"><input type="text" name="others1" value=""></td>  </tr>


 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						 
						


		
    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: '-Select-',
            search: true,
            searchOptions: {
                'default': '-Select-'
            },
            selectAll: true
        });

    });
</script>

<tr><td colspan="20"><input type="text" name="otherins" placeholder=""></td>	    	 
					 </tr>

		
<tr><td colspan="20"><label><strong>Name Of the Operation:</strong></label></td></tr>						
<tr><td colspan="20"><input type="text" name="otname" value=""></td>  </tr>
		
					 
<tr><td colspan="20"><label><strong>previous Anaesthesia:</strong></label></td></tr>						
<tr><td colspan="20"><input type="text" name="preanae" value=""></td>  </tr>
<tr><td colspan="20"><label><strong>Associated Medical Problem</strong></label></td></tr>	
<tr><td colspan="20"><input type="text" name="mediprob" value=""></td>  </tr>
<tr><td colspan="20"><label><strong>Present Medication:</strong></label></td></tr>	
 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="premedi" rows="3"></textarea></td>  </tr>
<tr><td colspan="20"><label><strong>Clinical Examination:</strong></label></td></tr>	
<tr>
						
						<td colspan="2"><label><strong>Pulse:</strong></label></td>
						<td colspan="2"><label><strong>BP:</strong></label></td>
						<td colspan="2"><label><strong>Temp:</strong></label></td>
						<td colspan="2"><label><strong>Jaundice:</strong></label></td>
						<td colspan="2"><label><strong>Cyanosis:</strong></label></td>
						<td colspan="2"><label><strong>Edema:</strong></label></td>		
					
						<td colspan="2"><label><strong>GIT:</strong></label></td>		
						<td colspan="2"><label><strong>CNS:</strong></label></td>		
						
						
						</tr>
						
						
						<tr>				
						<td colspan="2"><input type="text" name="pulse"  value=""></td>  
             		<td colspan="2"><input type="text" name="bp"  value=""></td>  
					<td colspan="2"><input type="text" name="temp"  value=""></td>  
					<td colspan="2"><input type="text" name="jaundice"  value=""></td>  
					<td colspan="2"><input type="text" name="cyanosis"  value=""></td>  
					<td colspan="2"><input type="text" name="edema"  value=""></td>  
					 
					<td colspan="2"><input type="text" name="git"  value=""></td>  
					<td colspan="2"><input type="text" name="cns"  value=""></td>  
				
					 </tr>
					 
					 <tr>	<td colspan="20"><label><strong>CVS:</strong></label></td>		</tr>
						
						
						<tr><td colspan="20"><input type="text" name="cvs"  value=""></td>  </tr>
						<tr><td colspan="20"><label><strong>Resp System:</strong></label></td>		</tr>
					<tr><td colspan="20"><input type="text" name="resp"  value=""></td> </tr>
<tr><td colspan="20"><label><strong>Investigation:</strong></label></td></tr>
<tr><td colspan="20"><a target='_blank' href="opd_pac_inves?pmrn=<?php echo $pmrn; ?>&dname=<?php echo $full; ?>&eid=<?php echo $eid; ?>&eid1=<?php echo $eid1; ?>">.</a></td></tr>	



<tr>
						
						<td colspan="2"><label><strong>HB:</strong></label></td>
						<td colspan="2"><label><strong>WBC:</strong></label></td>
						<td colspan="2"><label><strong>Platelets:</strong></label></td>
						<td colspan="2"><label><strong>PT:</strong></label></td>
						<td colspan="2"><label><strong>INR:</strong></label></td>
						<td colspan="2"><label><strong>BT:</strong></label></td>		
						<td colspan="2"><label><strong>CT:</strong></label></td>		
						<td colspan="2"><label><strong>APTT:</strong></label></td>		
						<td colspan="2"><label><strong>Urea:</strong></label></td>		
						<td colspan="2"><label><strong>Creatinine:</strong></label></td>		
						
						
						</tr>
						
						
						<tr>				
						<td colspan="2"><input type="text" name="hb"  value=""></td>  
             		<td colspan="2"><input type="text" name="wbc"  value=""></td>  
					<td colspan="2"><input type="text" name="pla"  value=""></td>  
					<td colspan="2"><input type="text" name="pt"  value=""></td>  
					<td colspan="2"><input type="text" name="inr"  value=""></td>  
					<td colspan="2"><input type="text" name="bt"  value=""></td>  
					<td colspan="2"><input type="text" name="ct"  value=""></td>  
					<td colspan="2"><input type="text" name="aptt"  value=""></td>  
					<td colspan="2"><input type="text" name="urea"  value=""></td>  
					<td colspan="2"><input type="text" name="creatinine"  value=""></td>  
				
					 </tr>

					 
					 
					 <tr>
						
						<td colspan="2"><label><strong>Na:</strong></label></td>
						<td colspan="2"><label><strong>K:</strong></label></td>
						<td colspan="2"><label><strong>Cl:</strong></label></td>
						<td colspan="2"><label><strong>HCO3:</strong></label></td>
						<td colspan="2"><label><strong>Glucose:</strong></label></td>
						<td colspan="2"><label><strong>HBsAg:</strong></label></td>		
						<td colspan="2"><label><strong>HCV:</strong></label></td>		
						<td colspan="2"><label><strong>HIV:</strong></label></td>		
						<td colspan="2"><label><strong>ABG:</strong></label></td>		
						<td colspan="2"><label><strong>PFT:</strong></label></td>		
						
						
						</tr>
						
						
						<tr>				
						<td colspan="2"><input type="text" name="na"  value=""></td>  
             		<td colspan="2"><input type="text" name="k"  value=""></td>  
					<td colspan="2"><input type="text" name="cl"  value=""></td>  
					<td colspan="2"><input type="text" name="hco3"  value=""></td>  
					<td colspan="2"><input type="text" name="glucose"  value=""></td>  
					<td colspan="2"><input type="text" name="hbs"  value=""></td>  
					<td colspan="2"><input type="text" name="hcv"  value=""></td>  
					<td colspan="2"><input type="text" name="hiv"  value=""></td>  
					<td colspan="2"><input type="text" name="abg"  value=""></td>  
					<td colspan="2"><input type="text" name="pft"  value=""></td>  
				
					 </tr>

					 
					 <tr>
						
						<td colspan="2"><label><strong>TFT/LFT:</strong></label></td>
						<td colspan="2"><label><strong>TSH:</strong></label></td>
						
						<td colspan="2"><label><strong>Blood Group:</strong></label></td>
						<td colspan="2"><label><strong>Cross Match:</strong></label></td>	
						<td colspan="2"><label><strong>Urine R/E:</strong></label></td>	
												
						
						
						
						</tr>
						<tr>				
						<td colspan="2"><input type="text" name="tft"  value=""></td>  
						<td colspan="2"><input type="text" name="tsh"  value=""></td>  
             		

					
					<td colspan="2"><input type="text" name="bgroup"  value=""></td>  
					<td colspan="2"><input type="text" name="crossm"  value=""></td>  
					<td colspan="2"><input type="text" name="urinere"  value=""></td>  
					
				
					 </tr>
						<tr><td colspan="20"><label><strong>Echo:</strong></label></td></tr>
<tr><td colspan="20"><input type="text" name="echo"  value=""></td>  </tr>					

<tr>					<td colspan="20"><label><strong>Chest X-Ray:</strong></label></td></tr>

					<tr><td colspan="20"><input type="text" name="xray"  value=""></td>  </tr>
					<tr><td colspan="20"><label><strong>ECG:</strong></label></td></tr>
					<tr><td colspan="20"><input type="text" name="ecg"  value=""></td>  </tr>
					

					
						



<tr><td colspan="20"><label><strong>Type Of Anaesthesia Discussed:</strong></label></td></tr>	
					 
					 <tr>
					 
					 
					 
					  <td colspan="20"><select name="xl3[]" multiple="multiple" class="3col active" placeholder="Select Anaesthesia">
       
						
						<option value=''>-Select-</option>
						<option value='Local'>Local</option>
						<option value='GA - Endotracheal Tube'>GA - Endotracheal Tube</option>
						<option value='GA - LMA'>GA - LMA</option>
						<option value='GA - Spinal'>GA - Spinal</option>
						<option value='SAB'>SAB</option>
						<option value='GA + SAB'>GA + SAB</option>
						<option value='GA - LMA + Caudal Epidural'>GA - LMA + Caudal Epidural</option>
						<option value='Nerve Block'>Nerve Block</option>
						<option value='Saddle Block'>Saddle Block</option>
						<option value='Deep Sedation'>Deep Sedation</option>
						<option value='TIVA'>TIVA</option>
						<option value='Inhalational Anesthesia'>Inhalational Anesthesia</option>
						<option value='Dissociative Anaesthesia'>Dissociative Anaesthesia</option>
						<option value='Spinal + Epidural'>Spinal + Epidural </option>
						
						
				
</select></td>  
					 
					</tr>  


<tr><td colspan="20"><label><strong>Pain Relief Discussed:</strong></label></td></tr>	
					 
					 <tr>
					 
					 
					 
					  <td colspan="20"><select name="xl4[]" multiple="multiple" class="3col active" placeholder="Select Pain Relief Method">
       
						
						<option value=''>-Select-</option>
						<option value='PCA'>PCA</option>
						<option value='Epidural Infusion'>Epidural Infusion</option>
						<option value='PCEA'>PCEA</option>
						<option value='Oral'>Oral</option>
						<option value='IM'>IM</option>
						<option value='IV'>IV</option>
						<option value='Per Rectal'>Per Rectal</option>
						
						
				
</select></td> 
					 
					 
					</tr>  




<tr><td colspan="20"><label><strong>Risk Factor:</strong></label></td></tr>	
					 
					 					 <tr><td colspan="20"><input type="text" name="rfactor"  value=""></td></tr>  


<tr><td colspan="20"><label><strong>Type Of Surgery:</strong></label></td></tr>	
					 
					 <tr><td colspan="20"><select name="tsurgery">
        
						<option value=''></option>
						<option value='Elective'>Elective</option>
						<option value='Emergency'>Emergency</option>
						
						
						
				
</select></td></tr>  











<tr><td colspan="20"><label><strong>Keep Nil By Mouth From:</strong></label></td></tr>	
<tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="nil" rows="5"></textarea></td>  </tr>


<tr><td colspan="20"><label><strong>Premedication Advised:</strong></label></td></tr>	
<tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="premedication" rows="5"></textarea></td>  </tr>


<tr><td colspan="20"><label><strong>Remarks:</strong></label></td></tr>	
<tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="remarks" rows="5"></textarea></td>  </tr>




<tr><td colspan="20"><label><strong>Charge:</strong></label></td></tr>	
<tr><td colspan="20"><input type="text" name="charge" value=""></td>  </tr>

	

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  	  <td colspan="10"><a target='_blank' href="preanaesprint8?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
