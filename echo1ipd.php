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
$utime=date('Y-m-d');

?>

<?php

require('db1.php');

$user=$_SESSION['sess_username'];

$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];



$query43 = "SELECT COUNT(pmrn) FROM echo where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;

$query = "SELECT * from iinves where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$dnam= $row['dname'];

//$dname1= $row['dname'];
//$rfor= $row['rfor'];

//$pa= $row['padd'];
  
$query2 = "SELECT * from inpatient where pmrn='$pmrn' and eid='$eid'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row2 = mysqli_fetch_assoc($result2);
$pp= $row2['pphone'];  
//$pd= $row['tname'];
//$pdate= $row['adate'];
$pa= $row2['age'];
$ps= $row2['gender'];
$dname= $row2['adoc'];
  
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
$dtime= date('d/m/Y H:i:s');
$datenew=date('Y-m-d');

$ins_query="insert into echo (`dname`,`rname`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`proname`,`ao`,`lvid`,`ef`,`mva`,`la1`,`lvids`,`ivsd`,`avring`,`acs`,`fs`,`pa`,`epss`,`rvid`,`mvan`,`pwt`,`rvot`,`eaxis`,`poro`,`la`,`lv`,`ra`,`rv`,`mv`,`av`,`pv`,`tv`,`ias`,`ivs`,`peri`,`intramass`,`v1`,`p1`,`m1`,`r1`,`va1`,`v2`,`p2`,`m2`,`r2`,`va2`,`v3`,`p3`,`m3`,`r3`,`va3`,`v4`,`p4`,`m4`,`r4`,`va4`,`pht`,`earation`,`pasp`,`padp`,`aduration`,`srdv`,`apv`,`mvalve`,`dvalve`,`avalve`,`pvalve`,`eorg`,`tee`,`wall`,`impression`,`advice`,`eid`,`status1`,`adur`,`location`,`date1`,`dtime`,`datenew`,`upload_by`,`update_time`) 
values('$dname','$rname','$pmrn','$pname','$page','$psex','$pphone','$proname','$ao','$lvid','$ef','$mva','$lx','$lvids','$ivsd','$avring','$acs','$fs','$pa','$epss','$rvid','$mvan','$pwt','$rvot','$eaxis','$poro','$la1','$lx22','$lx2','$lx3','$lx4','$lx5','$lx6','$lx7','$lx8','$lx9','$lx10','$lx11','$v1','$p1','$m1','$r1','$va1','$v2','$p2','$m2','$r2','$va2','$v3','$p3','$m3','$r3','$va3','$v4','$p4','$m4','$r4','$va4','$pht','$earation','$pasp','$padp','$aduration','$svdv','$apv','$lx12','$lx13','$lx14','$lx15','$lx16','$tee','$wall','$impression','$advice','$count1','Updated','$adur','IPD','$date1','$dtime','$datenew','$fullname','$utime')";
mysqli_query($con,$ins_query);



$query90 = "UPDATE alltest set rby='$fullname',rtime='$dtime',status='RECEIVED' where id='$id'"; 
$result90 = mysqli_query($con,$query90) or die ( mysqli_error());

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
				<td colspan="10"><select name="dname" required>
			        
					<option value='Dr. Mohammad Arifur Rahman'>Dr. Mohammad Arifur Rahman</option>
					<option value='Dr. Md. Moniruzzaman Maruf'>Dr. Md. Moniruzzaman Maruf</option>
					<option value='Dr. Md. Shahimur Parvez'>Dr. Md. Shahimur Parvez</option>
					
					</select></td>
				<td colspan="10" ><input type="text" name="rname"  required value="<?php echo $dname;?>" readonly/></td>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['id'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="10"><input type="text" name="pmrn"   value="<?php echo $row2['pmrn'];?>" readonly/></td>
					 <td colspan="10"><input type="text" name="pname"  value="<?php echo $row2['pname'];?>" readonly/></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Phone NO:</strong></label></td>
						<td colspan="5"><label><strong>REPORT ON:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page"  value="<?php echo $row2['age'];?>" readonly/></td>  
             		
					 <td colspan="5"><input type="text" name="psex"  value="<?php echo $row2['gender'];?>" readonly/></td>
					 <td colspan="5"><input type="text" name="pphone"  value="<?php echo $row2['pphone'];?>" readonly/></td>  


					  <td colspan="5"><select name="proname"required>
        
						<option value=''>-Select Procedure Name-</option>
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
						<td colspan="5"><input type="text" name="ao"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="lvid"  value=""></td>
					 <td colspan="5"><input type="text" name="ef"  value=""></td>  


					 <td colspan="5"><input type="text" name="mva" value=""></td>  
					 </tr>
					 
					 
<tr>
						
						<td colspan="5"><label><strong>LA (mm) </strong></label></td>
						<td colspan="5"><label><strong>LV-IDS (mm) </strong></label></td>
						<td colspan="5"><label><strong>IVSD (mm) </strong></label></td>
						<td colspan="5"><label><strong>AV-RING (mm) </strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="la1"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="lvids"  value=""></td>
					 <td colspan="5"><input type="text" name="ivsd"  value=""></td>  


					 <td colspan="5"><input type="text" name="avring"  value=""></td>  
					 </tr>					 
					 
					 
					 <tr>
						
						<td colspan="5"><label><strong>ACS (mm) </strong></label></td>
						<td colspan="5"><label><strong>FS (%) </strong></label></td>
						<td colspan="5"><label><strong>PWT (mm) </strong></label></td>
						
						<td colspan="5"><label><strong>EPSS (mm)</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="acs"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="fs"  value=""></td>
					 
					<td colspan="5"><input type="text" name="pwt"  value=""></td> 

					 <td colspan="5"><input type="text" name="epss" value=""></td>  
					 </tr>	


<tr>
						
						<td colspan="5"><label><strong>RVID (mm)</strong></label></td>
						<td colspan="5"><label><strong>MV – annulus (mm) </strong></label></td>
						<td colspan="5"><label><strong>PA (mm) </strong></label></td>
						<td colspan="5"><label><strong>RVOT (mm)</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="rvid"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="mvan"  value=""></td>
					 
					 <td colspan="5"><input type="text" name="pa"  value=""></td>  
					  


					 <td colspan="5"><input type="text" name="rvot" value=""></td>  
					 </tr>
					 
					 
					 <tr>
						
						<td colspan="5"><label><strong>Elec. Axis:</strong></label></td>
						<td colspan="5"><label><strong>Position / Rotation: </strong></label></td>
					
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="eaxis"  value=""></td>  
             		
					 <td colspan="5"><input type="text" name="poro"  value=""></td>
					 
					 </tr>	
					 <tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>CHAMBERS</label></strong></td></tr>				 
				 <tr>
				 
				 
				 		<td colspan="20"><label><strong>LA: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl44[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Normal" selected>Normal</option>
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
<option value="">N/A</option>
<option value="Normal" selected>Normal</option>
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
<option value="">N/A</option>
<option value="Normal" selected>Normal</option>
<option value="Dilated">Dilated</option>

</tr>	


	 		<tr><td colspan="20"><label><strong>RV: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl6[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Normal" selected>Normal</option>
<option value="Dilated">Dilated</option>
<option value="Small  ">Small</option>
<option value="Concentric/ Eccentric hypertrophy-present">Concentric/ Eccentric hypertrophy-present.  </option>	

</tr>					 


<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>VALVES </label></strong></td></tr>				 

<tr><td colspan="20"><label><strong>MV: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl7[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Normal"selected>Normal</option>
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
<option value="">N/A</option>
<option value="Normal"selected>Normal</option>
<option value="RCC/NCC-thickened">RCC/NCC-thickened</option>
<option value="Clacification-present. Restricted movement of RCC/NCC">Clacification-present. Restricted movement of RCC/NCC</option>
<option value="Non-coaption-present">Non-coaption-present</option>	

<option value="Eccentric closure-present">Eccentric closure-present</option>	

</tr>					 
<tr><td colspan="20"><label><strong>PV : </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl9[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Normal"selected>Normal</option>
<option value="Thickened">Thickened</option>
<option value="Movement suggestive of pulmorary hypertension">Movement suggestive of pulmorary hypertension</option>
<option value="Doming-present.">Doming-present.</option>	

</tr>	

<tr><td colspan="20"><label><strong>TV : </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl10[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Normal"selected>Normal</option>
<option value="Thickened">Thickened</option>
<option value="Non-coaptation-present">Non-coaptation-present</option>
<option value="Doming-present">Doming-present.</option>	

</tr>					 
				 
<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>SEPTAE  </label></strong></td></tr>				 

<tr><td colspan="20"><label><strong>IAS : </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl11[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Intact"selected>Intact</option>
<option value="Deficit-primum/Secumdum/Simus Venosus">Deficit-primum/Secumdum/Simus Venosus</option>
<option value="Absent">Absent</option>
<option value="PFO-present">PFO-present</option>	

</tr>	

<tr><td colspan="20"><label><strong>IVS : </strong></label></td></tr>
				 <tr><td colspan="20"><select name="xl12[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Intact"selected>Intact</option>
<option value="Deficit-Perimembranous/Muscular/Supra-Cristal">Deficit-Perimembranous/Muscular/Supra-Cristal</option>
<option value="Absent">Absent</option>
<option value="Paradoxical Flat">Paradoxical Flat</option>	

</tr>

<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>PERICARDIUM</label></strong></td></tr>				 



				 <tr><td colspan="20"><select name="xl13[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Normal"selected>Normal</option>
<option value="Thick">Thick</option>
<option value="Calcification-present">Calcification-present</option>
<option value="Effusion: present-mild/moderate/severe">Effusion: present-mild/moderate/severe</option>	
<option value="Feature of cardiac tamponade-present">Feature of cardiac tamponade-present</option>
</tr>

<tr><td colspan="20"bgcolor='lightgreen'align="left"><label><strong>INTRACARDIAC MASS</label></strong></td></tr>				 



				 <tr><td colspan="20"><select name="xl14[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">N/A</option>
<option value="Absent"selected>Absent</option>
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
<td colspan="2"><input type="text" name="v1"  value=""></td>
<td colspan="2"><input type="text" name="p1"  value=""></td>
<td colspan="2"><input type="text" name="m1"  value=""></td>
<td colspan="2"><input type="text" name="r1"  value=""></td>
<td colspan="2"><input type="text" name="va1"  value=""></td>

  </tr>

  


  </tr>

  <tr>
  
  <td colspan="5"><label><strong>AV (1.0-1.7)</strong></label></td>
<td colspan="2"><input type="text" name="v2"  value=""></td>
<td colspan="2"><input type="text" name="p2"  value=""></td>
<td colspan="2"><input type="text" name="m2"  value=""></td>
<td colspan="2"><input type="text" name="r2"  value=""></td>
<td colspan="2"><input type="text" name="va2"  value=""></td>
  </tr>
  
  <tr>
  
  <td colspan="5"><label><strong>PV (0.6-0.7)</strong></label></td>
<td colspan="2"><input type="text" name="v3"  value=""></td>
<td colspan="2"><input type="text" name="p3"  value=""></td>
<td colspan="2"><input type="text" name="m3"  value=""></td>
<td colspan="2"><input type="text" name="r3"  value=""></td>
<td colspan="2"><input type="text" name="va3"  value=""></td>

  </tr>
  
  <tr>
  
  <td colspan="5"><label><strong>TV (0.3-0.7)</strong></label></td>
<td colspan="2"><input type="text" name="v4"  value=""></td>
<td colspan="2"><input type="text" name="p4"  value=""></td>
<td colspan="2"><input type="text" name="m4"  value=""></td>
<td colspan="2"><input type="text" name="r4"  value=""></td>
<td colspan="2"><input type="text" name="va4"  value=""></td>

  </tr>
  
  <tr>
  
 <tr> <td colspan="20"><label><strong>OTHERS</strong></label></td></tr>
 <tr><td colspan="5"><label><strong>PHT (m/sec)</strong></label></td>
 <td colspan="5"><label><strong>EA- ration</strong></label></td>
 <td colspan="5"><label><strong>PASP (mmHg)</strong></label></td>
 <td colspan="5"><label><strong>PADP (mmHg)</strong></label></td>
 
 
 </tr>
 <tr>
<td colspan="5"><input type="text" name="pht"  value=""></td>
<td colspan="5"><input type="text" name="earation"  value=""></td>
<td colspan="5"><input type="text" name="pasp"  value=""></td>
<td colspan="5"><input type="text" name="padp"  value=""></td>

  </tr>
  <tr> <td colspan="20"><label><strong>Pulmonary vein</strong></label></td></tr>
 <tr><td colspan="5"><label><strong>A-duration (m/sec)</strong></label></td>
 <td colspan="5"><label><strong>SV/DV (cm/sec)</strong></label></td>
 <td colspan="5"><label><strong>ARV (cm/sec)</strong></label></td>
 <td colspan="5"><label><strong>A dur (MVA du-PVA du)</strong></label></td>
 
 
 </tr>
 <tr>
<td colspan="5"><input type="text" name="adura"  value=""></td>
<td colspan="5"><input type="text" name="svdv"  value=""></td>
<td colspan="5"><input type="text" name="arv"  value=""></td>
<td colspan="5"><input type="text" name="adur"  value=""></td>

  </tr>
  
  <tr> <td colspan="20"><label><strong>COLOUR FLOW MAPPING: Consistent with: </strong></label></td></tr>
  <tr> <td colspan="4"><label><strong>Mitral Valve </strong></label></td>
  <td colspan="4"><label><strong>Tricuspid Valve</strong></label></td>
  <td colspan="4"><label><strong>Aortic Valve</strong></label></td>
  <td colspan="4"><label><strong>Pulmonary Valve</strong></label></td>
  <td colspan="4"><label><strong>Corg. H. Disease</strong></label></td></tr>
  
  
  <tr><td colspan="4"><select name="xl15[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Normal">Normal</option>
<option value="Mitral Stenosis (MS)">Mitral Stenosis (MS)</option>
<option value="Mitral regurgitation (MR)">Mitral regurgitation (MR)</option>
</td>

<td colspan="4"><select name="xl16[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Normal">Normal</option>
<option value="Tricuspid stenosis (TS)">Tricuspid stenosis (TS)</option>
<option value="Tricuspid regurgitation (TR)">Tricuspid regurgitation (TR)</option>
</td>

<td colspan="4"><select name="xl17[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Normal">Normal</option>
<option value="Aortic stenosis (AS)">Aortic stenosis (AS)</option>
<option value="Aortic regurgitation (AR)">Aortic regurgitation (AR)</option>

</td>


<td colspan="4"><select name="xl18[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Normal">Normal</option>

<option value="Pulmonary stenosis (PS)">Pulmonary stenosis (PS)</option>
<option value="Pulmonary regurgitation (PR)">Pulmonary regurgitation (PR)</option>	
</td>

<td colspan="4"><select name="xl19[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="ASD">ASD</option>
<option value="VSD">VSD</option>
<option value="PDA">PDA</option>
<option value="APW">APW</option>	
<option value="TOF">TOF</option>
<option value="DORV">DORV</option>
</td>

</tr>

<tr><td colspan="20"><label><strong>TEE/DSE/TISSUE DOPPLER/ OTHER INFORMATION:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="tee" rows="5" ></textarea></td>  </tr>

<tr><td colspan="20"><label><strong>Wall Motion:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="wall" rows="5" ></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>IMPRESSION:</strong></label></td>  </tr>
						 <tr><td colspan="20" align="center"><textarea class="form-control" name="impression" value="" / rows="5" >*No Regional Wall Motion Abnormality.
*Good LV Systolic Function (LVEF-    %).
*Normal Chamber Dimensions.
*No Diastolic Dysfunction.
*No Pericardial Effusion or Intracardiac throubus Seen.
</textarea></td>  </tr>
						 
						  
						 
						 <tr><td colspan="20"><label><strong>ADVICE:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="advice" rows="5" ></textarea></td>  </tr>

						 
						 
														


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>

	  				
</tr>

</body>

</html>
