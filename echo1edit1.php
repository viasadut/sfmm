
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


//$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];



$query43 = "SELECT COUNT(pmrn) FROM echo where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;

require('db1.php');
$queryett = "SELECT * from echo where pmrn='$pmrn' and eid='$eid'"; 
	 
$resultett = mysqli_query($con, $queryett) or die(mysqli_error());

// Print out result
$rowett = mysqli_fetch_array($resultett);
$pn= $rowett['pname'];
$pm= $rowett['pmrn'];
$pp= $rowett['pphone'];  
//$pd= $row['tname'];
//$pdate= $row['adate'];
$pa= $rowett['page'];
$ps= $rowett['psex'];
//$dname1= $row['dname'];
//$rfor= $row['rfor'];
$dtime= date('d/m/Y H:i:s');

//$pa= $row['padd'];
  
?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$rname=$_REQUEST['rname'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$proname=$_REQUEST['proname'];
$ao=$_REQUEST['ao'];
$lvid=$_REQUEST['lvid'];
$ef=$_REQUEST['ef'];
$mva=$_REQUEST['mva'];
$la1=$_REQUEST['la1'];
$lvids=$_REQUEST['lvids'];
$ivsd=$_REQUEST['ivsd'];
$avring=$_REQUEST['avring'];
$acs=$_REQUEST['acs'];
$fs=$_REQUEST['fs'];
$pa=$_REQUEST['pa'];
$epss=$_REQUEST['epss'];
$rvid=$_REQUEST['rvid'];
$mvan=$_REQUEST['mvan'];
$pwt=$_REQUEST['pwt'];
$rvot=$_REQUEST['rvot'];
$eaxis=$_REQUEST['eaxis'];
$poro=$_REQUEST['poro'];

$xl44=$_REQUEST['xl44'];
$lx= implode(",",$xl44);

$xl4=$_REQUEST['xl4'];
$lx22= implode(",",$xl4);


$xl5=$_REQUEST['xl5'];
$lx2= implode(",",$xl5);
$xl6=$_REQUEST['xl6'];
$lx3= implode(",",$xl6);
$xl7=$_REQUEST['xl7'];
$lx4= implode(",",$xl7);
$xl8=$_REQUEST['xl8'];
$lx5= implode(",",$xl8);
$xl9=$_REQUEST['xl9'];
$lx6= implode(",",$xl9);
$xl10=$_REQUEST['xl10'];
$lx7= implode(",",$xl10);
$xl11=$_REQUEST['xl11'];
$lx8= implode(",",$xl11);
$xl12=$_REQUEST['xl12'];
$lx9= implode(",",$xl12);
$xl13=$_REQUEST['xl13'];
$lx10= implode(",",$xl13);
$xl14=$_REQUEST['xl14'];
$lx11= implode(",",$xl14);
$xl15=$_REQUEST['xl15'];
$lx12= implode(",",$xl15);

$xl16=$_REQUEST['xl16'];
$lx13= implode(",",$xl16);
$xl17=$_REQUEST['xl17'];
$lx14= implode(",",$xl17);
$xl18=$_REQUEST['xl18'];
$lx15= implode(",",$xl18);
$xl19=$_REQUEST['xl19'];
$lx16= implode(",",$xl19);

$v1=$_REQUEST['v1'];
$p1=$_REQUEST['p1'];
$m1=$_REQUEST['m1'];
$r1=$_REQUEST['r1'];
$va1=$_REQUEST['va1'];

$v2=$_REQUEST['v2'];
$p2=$_REQUEST['p2'];
$m2=$_REQUEST['m2'];
$r2=$_REQUEST['r2'];
$va2=$_REQUEST['va2'];

$v3=$_REQUEST['v3'];
$p3=$_REQUEST['p3'];
$m3=$_REQUEST['m3'];
$r3=$_REQUEST['r3'];
$va3=$_REQUEST['va3'];

$v4=$_REQUEST['v4'];
$p4=$_REQUEST['p4'];
$m4=$_REQUEST['m4'];
$r4=$_REQUEST['r4'];
$va4=$_REQUEST['va4'];

$pht=$_REQUEST['pht'];
$earation=$_REQUEST['earation'];
$pasp=$_REQUEST['pasp'];
$padp=$_REQUEST['padp'];
$aduration=$_REQUEST['adura'];
$svdv=$_REQUEST['svdv'];
$apv=$_REQUEST['arv'];

$tee=$_REQUEST['tee'];
$wall=$_REQUEST['wall'];
$impression=$_REQUEST['impression'];
$advice=$_REQUEST['advice'];




//$comments=$_REQUEST['comments'];

$date= date('Y/m/d');
$date1=date('m/d/Y');
$date2=date('d/m/Y');
$date2=date('d/m/Y');
$stime=date("h:i:sa");

$adur=$_REQUEST['adur'];

$update="update echo set `rname`='$rname',`proname`='$proname',`ao`='$ao',`lvid`='$lvid',`ef`='$ef',`mva`='$mva',`la1`='$lx',
`lvids`='$lvids',`ivsd`='$ivsd',`avring`='$avring',`acs`='$acs',`fs`='$fs',`pa`='$pa',`epss`='$epss',`rvid`='$rvid',`mvan`='$mvan',
`pwt`='$pwt',`rvot`='$rvot',`eaxis`='$eaxis',`poro`='$poro',`la`='$la1',`lv`='$lx22',`rv`='$lx3',`mv`='$lx4',`av`='$lx5',
`pv`='$lx6',`tv`='$lx7',`ias`='$lx8',`ivs`='$lx9',`peri`='$lx10',`intramass`='$lx11',`v1`='$v1',`p1`='$p1',`m1`='$m1',
`r1`='$r1',`va1`='$va1',`v2`='$v2',`p2`='$p2',`m2`='$m2',`r2`='$r2',`va2`='$va2',`v3`='$v3',`p3`='$p3',`m3`='$m3',
`r3`='$r3',`va3`='$va3',`v4`='$v4',`p4`='$p4',`m4`='$m4',`r4`='$r4',`va4`='$va4',`pht`='$pht',`earation`='$earation',
`pasp`='$pasp',`padp`='$padp',`aduration`='$aduration',`srdv`='$svdv',`apv`='$apv',`mvalve`='$lx12',`dvalve`='$lx13',`avalve`='$lx14',
`pvalve`='$lx15',`eorg`='$lx16',`tee`='$tee',`wall`='$wall',`impression`='$impression',`advice`='$advice',`adur`='$adur',`status1`='Confirmed' where `pmrn`='$pmrn' and `eid`='$eid'";
mysqli_query($con,$update);

//$update="update ecgapp set status='SEEN' where `id`='$id'";
//mysqli_query($con,$update);

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
      <script src="./jquery.multiselect.js"></script>
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>



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

<h1 align="center">ECHO REPORT FORM</h1>

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
				<td colspan="10"><select name="dname" value="" required/>
			        <option value='<?php echo $rowett['dname'];?>'><?php echo $rowett['dname'];?></option>
					<option value='Dr. Mohammad Arifur Rahman'>Dr. Mohammad Arifur Rahman</option>
					<option value='Dr. Md. Moniruzzaman Maruf'>Dr. Md. Moniruzzaman Maruf</option>
					</select></td>
				<td colspan="10" ><select name="rname" value="">
			        <option value='<?php echo $rowett['rname'];?>'><?php echo $rowett['rname'];?></option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select></td>
				
						
						
				
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
						<td colspan="5"><input type="text" name="page" required value="<?php echo $pa;?>" readonly/></td>  
             		
					 <td colspan="5"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly/></td>
					 <td colspan="5"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly/></td>  


					  <td colspan="5"><select name="proname" value="">
        
						<option value='<?php echo $rowett['proname'];?>'><?php echo $rowett['proname'];?></option>
						<option value='M-MODE & 2 D'>M-MODE & 2 D</option>
						<option value='DOPPLER'>DOPPLER</option>
						<option value='TEE'>TEE</option>
						<option value='DSE'>DSE</option>
						<option value='OTHER'>OTHER</option>
						
				
</select></td>  
					 </tr>

	<tr><td colspan="20"bgcolor='lightgreen'align="center"><label><strong>MEASUREMENTS</label></strong></td></tr>				 
					 
					 
					 <tr>
						
						<td colspan="5"><label><strong>AO(mm)</strong></label></td>
						<td colspan="5"><label><strong>LV-ID (mm)       </strong></label></td>
						<td colspan="5"><label><strong>EF (%) </strong></label></td>
						<td colspan="5"><label><strong>MVA (cm2)</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="ao"  value="<?php echo $rowett['ao'];?>"></td>  
             		
					 <td colspan="5"><input type="text" name="lvid"  value="<?php echo $rowett['lvid'];?>"></td>
					 <td colspan="5"><input type="text" name="ef"  value="<?php echo $rowett['ef'];?>"></td>  


					 <td colspan="5"><input type="text" name="mva" value="<?php echo $rowett['mva'];?>"></td>  
					 </tr>
					 
					 
<tr>
						
						<td colspan="5"><label><strong>LA (mm) </strong></label></td>
						<td colspan="5"><label><strong>LV-IDS (mm) </strong></label></td>
						<td colspan="5"><label><strong>IVSD (mm) </strong></label></td>
						<td colspan="5"><label><strong>AV-RING (mm) </strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="la1"  value="<?php echo $rowett['la'];?>"></td>  
             		
					 <td colspan="5"><input type="text" name="lvids"  value="<?php echo $rowett['lvids'];?>"></td>
					 <td colspan="5"><input type="text" name="ivsd"  value="<?php echo $rowett['ivsd'];?>"></td>  


					 <td colspan="5"><input type="text" name="avring"  value="<?php echo $rowett['avring'];?>"></td>  
					 </tr>					 
					 
					 
					 <tr>
						
						<td colspan="5"><label><strong>ACS (mm) </strong></label></td>
						<td colspan="5"><label><strong>FS (%) </strong></label></td>
						<td colspan="5"><label><strong>PWT (mm) </strong></label></td>
						<td colspan="5"><label><strong>EPSS (mm)</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="acs"  value="<?php echo $rowett['acs'];?>"></td>  
             		
					 <td colspan="5"><input type="text" name="fs"  value="<?php echo $rowett['fs'];?>"></td>
					 
<td colspan="5"><input type="text" name="pwt"  value="<?php echo $rowett['pwt'];?>"></td>  

					 <td colspan="5"><input type="text" name="epss" value="<?php echo $rowett['epss'];?>"></td>  
					 </tr>	


<tr>
						
						<td colspan="5"><label><strong>RVID (mm)</strong></label></td>
						<td colspan="5"><label><strong>MV – annulus (mm) </strong></label></td>
						<td colspan="5"><label><strong>PA (mm) </strong></label></td>
						<td colspan="5"><label><strong>RVOT (mm)</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="rvid"  value="<?php echo $rowett['rvid'];?>"></td>  
             		
					 <td colspan="5"><input type="text" name="mvan"  value="<?php echo $rowett['mvan'];?>"></td>
					 <td colspan="5"><input type="text" name="pa"  value="<?php echo $rowett['pa'];?>"></td>  


					 <td colspan="5"><input type="text" name="rvot" value="<?php echo $rowett['rvot'];?>"></td>  
					 </tr>
					 
					 
					 <tr>
						
						<td colspan="5"><label><strong>Elec. Axis:</strong></label></td>
						<td colspan="5"><label><strong>Position / Rotation: </strong></label></td>
					
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="eaxis"  value="<?php echo $rowett['eaxis'];?>"></td>  
             		
					 <td colspan="5"><input type="text" name="poro"  value="<?php echo $rowett['poro'];?>"></td>
					 
					 </tr>	
					 <tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>CHAMBERS</label></strong></td></tr>				 
				 <tr>
				 
				 
				 		<td colspan="20"><label><strong>LA: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl44[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['la1'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Dilated">Dilated</option>
<option value="Appendage- Clear  ">Appendage- Clear  </option>
<option value="Appendage- Hazy  ">Appendage- Hazy  </option>



       
    </select>
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
	
	</td></tr>
					 
	<tr>
				 
				 
				 		<td colspan="20"><label><strong>LV: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl4[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['lv'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Dilated">Dilated</option>
<option value="Small  ">Small</option>
<option value="Concentric hypertrophy-present">Concentric hypertrophy-present.  </option>	
<option value="Eccentric hypertrophy-present">Eccentric hypertrophy-present.  </option>	
<option value="RWMA: Absent">RWMA: Absent</option>
<option value="RWMA: Present">RWMA: Present</option>
<option value="Global Wall Motion Abnormality">Global Wall Motion Abnormality</option>
</tr>				 


<td colspan="20"><label><strong>RA: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl5[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['lv'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Dilated">Dilated</option>

</tr>	


	 		<tr><td colspan="20"><label><strong>RV: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl6[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['rv'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Dilated">Dilated</option>
<option value="Small  ">Small</option>
<option value="Concentric/ Eccentric hypertrophy-present">Concentric/ Eccentric hypertrophy-present.  </option>	

</tr>					 


<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>VALVES </label></strong></td></tr>				 

<tr><td colspan="20"><label><strong>MV: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl7[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['mv'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="AML/PML-Thickened">AML/PML-Thickened</option>
<option value="Diastolic doming of AML   ">Diastolic doming of AML</option>
<option value="Non-coaptation-present">Non-coaptation-presentption</option>	

<option value="Commissures-Medial-Free/fused">Commissures-Medial-Free/fused</option>	
<option value="Lateral-free/ fused">Lateral-free/ fused</option>	
<option value="Subvalvular changes-present-mild">Subvalvular changes-present-mild</option>	
<option value="Subvalvular changes-present-moderate">Subvalvular changes-present-moderate</option>	
<option value="Subvalvular changes-present-severe">Subvalvular changes-present-severe</option>	
<option value="Prolepse /Fluttering of AML-present">Prolepse /Fluttering of AML-present</option>	
<option value="Non-coaptation-present">Non-coaptation-presentption</option>	

</tr>					 

<tr><td colspan="20"><label><strong>AV: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl8[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['av'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="RCC/NCC-thickened">RCC/NCC-thickened</option>
<option value="Clacification-present. Restricted movement of RCC/NCC">Clacification-present. Restricted movement of RCC/NCC</option>
<option value="Non-coaption-present">Non-coaption-present</option>	

<option value="Eccentric closure-present">Eccentric closure-present</option>	

</tr>					 
<tr><td colspan="20"><label><strong>PV : </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl9[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['pv'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Thickened">Thickened</option>
<option value="Movement suggestive of pulmorary hypertension">Movement suggestive of pulmorary hypertension</option>
<option value="Doming-present.">Doming-present.</option>	

</tr>	

<tr><td colspan="20"><label><strong>TV : </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl10[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['tv'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Thickened">Thickened</option>
<option value="Non-coaptation-present">Non-coaptation-present</option>
<option value="Doming-present.">Doming-present.</option>	

</tr>					 
				 
<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>SEPTAE  </label></strong></td></tr>				 

<tr><td colspan="20"><label><strong>IAS : </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl11[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['ias'];?>"selected></option>
<option value="Intact">Intact</option>
<option value="Deficit-primum/Secumdum/Simus Venosus">Deficit-primum/Secumdum/Simus Venosus</option>
<option value="Absent">Absent</option>
<option value="PFO-present">PFO-present</option>	

</tr>	

<tr><td colspan="20"><label><strong>IVS : </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl12[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['ivs'];?>"selected></option>
<option value="Intact">Intact</option>
<option value="Deficit-Perimembranous/Muscular/Supra-Cristal">Deficit-Perimembranous/Muscular/Supra-Cristal</option>
<option value="Absent">Absent</option>
<option value="Paradoxical Flat">Paradoxical Flat</option>	

</tr>

<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>PERICARDIUM</label></strong></td></tr>				 



				 <tr><td colspan="20"><select name="xl13[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['peri'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Thick">Thick</option>
<option value="Calcification-present">Calcification-present</option>
<option value="Effusion: present-mild/moderate/severe">Effusion: present-mild/moderate/severe</option>	
<option value="Feature of cardiac tamponade-present">Feature of cardiac tamponade-present</option>
</tr>

<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>INTRACARDIAC MASS</label></strong></td></tr>				 



				 <tr><td colspan="20"><select name="xl14[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['intramass'];?>"selected></option>
<option value="Absent">Absent</option>
<option value="Present: Thrombus">Present: Thrombus</option>
<option value="Present: Vegetation">Present: Vegetation</option>
<option value="Present: Others- in or on">Present: Others- in or on</option>	
<option value="Feature of cardiac tamponade-present">Feature of cardiac tamponade-present</option>
</tr>

<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>DOPPLER STUDY</label></strong></td></tr>				 

<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>MEASUREMENT</label></strong></td></tr>

<tr><td colspan="5"><label><strong>Valves</strong></label></td>
<td colspan="2"><label><strong>Velocity (m/sec)</strong></label></td>
<td colspan="2"><label><strong>PPG (mmHg)</strong></label></td>
<td colspan="2"><label><strong>MPG(mmHg)
</strong></label></td>
<td colspan="2"><label><strong>Regurgitation</strong></label></td>
<td colspan="2"><label><strong>Valve Area(cm2)
</strong></label></td>

  </tr>

  <tr>
  
  <td colspan="5"><label><strong>MV(0.6-1.3)</strong></label></td>
<td colspan="2"><input type="text" name="v1"  value="<?php echo $rowett['v1'];?>"></td>
<td colspan="2"><input type="text" name="p1"  value="<?php echo $rowett['p1'];?>"></td>
<td colspan="2"><input type="text" name="m1"  value="<?php echo $rowett['m1'];?>"></td>
<td colspan="2"><input type="text" name="r1"  value="<?php echo $rowett['r1'];?>"></td>
<td colspan="2"><input type="text" name="va1"  value="<?php echo $rowett['va1'];?>"></td>

  </tr>

  


  </tr>

  <tr>
  
  <td colspan="5"><label><strong>AV (1.0-1.7)</strong></label></td>
<td colspan="2"><input type="text" name="v2"  value="<?php echo $rowett['v2'];?>"></td>
<td colspan="2"><input type="text" name="p2"  value="<?php echo $rowett['p2'];?>"></td>
<td colspan="2"><input type="text" name="m2"  value="<?php echo $rowett['m2'];?>"></td>
<td colspan="2"><input type="text" name="r2"  value="<?php echo $rowett['r2'];?>"></td>
<td colspan="2"><input type="text" name="va2"  value="<?php echo $rowett['va2'];?>"></td>
  </tr>
  
  <tr>
  
  <td colspan="5"><label><strong>PV (0.6-0.7)</strong></label></td>
<td colspan="2"><input type="text" name="v3"  value="<?php echo $rowett['v3'];?>"></td>
<td colspan="2"><input type="text" name="p3"  value="<?php echo $rowett['p3'];?>"></td>
<td colspan="2"><input type="text" name="m3"  value="<?php echo $rowett['m3'];?>"></td>
<td colspan="2"><input type="text" name="r3"  value="<?php echo $rowett['r3'];?>"></td>
<td colspan="2"><input type="text" name="va3"  value="<?php echo $rowett['va3'];?>"></td>

  </tr>
  
  <tr>
  
  <td colspan="5"><label><strong>TV (0.3-0.7)</strong></label></td>
<td colspan="2"><input type="text" name="v4"  value="<?php echo $rowett['v4'];?>"></td>
<td colspan="2"><input type="text" name="p4"  value="<?php echo $rowett['p4'];?>"></td>
<td colspan="2"><input type="text" name="m4"  value="<?php echo $rowett['m4'];?>"></td>
<td colspan="2"><input type="text" name="r4"  value="<?php echo $rowett['r4'];?>"></td>
<td colspan="2"><input type="text" name="va4"  value="<?php echo $rowett['va4'];?>"></td>

  </tr>
  
  <tr>
  
 <tr> <td colspan="20"><label><strong>OTHERS</strong></label></td></tr>
 <tr><td colspan="5"><label><strong>PHT (m/sec)</strong></label></td>
 <td colspan="5"><label><strong>EA- ration</strong></label></td>
 <td colspan="5"><label><strong>PASP (mmHg)</strong></label></td>
 <td colspan="5"><label><strong>PADP (mmHg)</strong></label></td>
 
 
 </tr>
 <tr>
<td colspan="5"><input type="text" name="pht"  value="<?php echo $rowett['pht'];?>"></td>
<td colspan="5"><input type="text" name="earation"  value="<?php echo $rowett['earation'];?>"></td>
<td colspan="5"><input type="text" name="pasp"  value="<?php echo $rowett['pasp'];?>"></td>
<td colspan="5"><input type="text" name="padp"  value="<?php echo $rowett['padp'];?>"></td>

  </tr>
  <tr> <td colspan="20"><label><strong>Pulmonary vein</strong></label></td></tr>
 <tr><td colspan="5"><label><strong>A-duration (m/sec)</strong></label></td>
 <td colspan="5"><label><strong>SV/DV (cm/sec)</strong></label></td>
 <td colspan="5"><label><strong>ARV (cm/sec)</strong></label></td>
 <td colspan="5"><label><strong>A dur (MVA du-PVA du)</strong></label></td>
 
 
 </tr>
 <tr>
<td colspan="5"><input type="text" name="adura"  value="<?php echo $rowett['aduration'];?>"></td>
<td colspan="5"><input type="text" name="svdv"  value="<?php echo $rowett['srdv'];?>"></td>
<td colspan="5"><input type="text" name="arv"  value="<?php echo $rowett['apv'];?>"></td>
<td colspan="5"><input type="text" name="adur"  value="<?php echo $rowett['adur'];?>"></td>

  </tr>
  
  <tr> <td colspan="20"><label><strong>COLOUR FLOW MAPPING: Consistent with: </strong></label></td></tr>
  <tr> <td colspan="4"><label><strong>Mitral Valve </strong></label></td>
  <td colspan="4"><label><strong>Tricuspid Valve</strong></label></td>
  <td colspan="4"><label><strong>Aortic Valve</strong></label></td>
  <td colspan="4"><label><strong>Pulmonary Valve</strong></label></td>
  <td colspan="4"><label><strong>Corg. H. Disease</strong></label></td></tr>
  
  
  <tr><td colspan="4"><select name="xl15[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['mvalve'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Mitral Stenosis (MS)">Mitral Stenosis (MS)</option>
<option value="Mitral regurgitation (MR)">Mitral regurgitation (MR)</option>
</td>

<td colspan="4"><select name="xl16[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['dvalve'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Tricuspid stenosis (TS)">Tricuspid stenosis (TS)</option>
<option value="Tricuspid regurgitation (TR)">Tricuspid regurgitation (TR)</option>
</td>

<td colspan="4"><select name="xl17[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['avalve'];?>"selected></option>
<option value="Normal">Normal</option>
<option value="Aortic stenosis (AS)">Aortic stenosis (AS)</option>
<option value="Aortic regurgitation (AR)">Aortic regurgitation (AR)</option>

</td>


<td colspan="4"><select name="xl18[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['pvalve'];?>"selected></option>
<option value="Normal">Normal</option>

<option value="Pulmonary stenosis (PS)">Pulmonary stenosis (PS)</option>
<option value="Pulmonary regurgitation (PR)">Pulmonary regurgitation (PR)</option>	
</td>

<td colspan="4"><select name="xl19[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="<?php echo $rowett['eorg'];?>"selected></option>
<option value="ASD">ASD</option>
<option value="VSD">VSD</option>
<option value="PDA">PDA</option>
<option value="APW">APW</option>	
<option value="TOF">TOF</option>
<option value="DORV">DORV</option>
</td>

</tr>

<tr><td colspan="20"><label><strong>TEE/DSE/TISSUE DOPPLER/ OTHER INFORMATION:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="tee" rows="5" ><?php echo $rowett['tee'];?></textarea></td>  </tr>

<tr><td colspan="20"><label><strong>Wall Motion:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="wall" rows="5" ><?php echo $rowett['wall'];?></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>IMPRESSION:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="impression" rows="5" ><?php echo $rowett['impression'];?></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>ADVICE:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="advice" rows="5" ><?php echo $rowett['advice'];?></textarea></td>  </tr>

						 
						 
														


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="echoreport.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
