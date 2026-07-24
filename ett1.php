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


$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];



$query43 = "SELECT COUNT(pmrn) FROM ett where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;

$query = "SELECT * from alltest where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$dnam= $row['dname'];

//$dname1= $row['dname'];
//$rfor= $row['rfor'];

//$pa= $row['padd'];
  
$query2 = "SELECT * from patient where pmrn='$pmrn'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row2 = mysqli_fetch_assoc($result2);
$pp= $row2['pphone'];  
//$pd= $row['tname'];
//$pdate= $row['adate'];
$pa= $row2['bdate'];
$ps= $row2['psex'];
  
  
  $te=date('d',strtotime($pa));
$te1=date('m',strtotime($pa));
$te2=date('Y',strtotime($pa));


$date19=date_create("$te-$te1-$te2");
$date91=date_format($date19,'Y-m-d');
$date92= date('d-m-Y');
$date20=date_create($date92);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date20,$date19);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;

?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{


$dname =$_REQUEST['dname'];
$rname =$_REQUEST['rname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
//$rname=$_REQUEST['rname'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
//$proname=$_REQUEST['proname'];
$cdiag=$_REQUEST['cdiag'];
$indication=$_REQUEST['indication'];
$indication1= implode(",",$indication);
$cdata=$_REQUEST['cdata'];
$cdata1= implode(",",$cdata);
$medication=$_REQUEST['medication'];
$medication1= implode(",",$medication);
$rt=$_REQUEST['rt'];
$rt1= implode(",",$rt);
$ssummary=$_REQUEST['ssummary'];
$etime1=$_REQUEST['etime1'];
$etime2=$_REQUEST['etime2'];
$mspeed=$_REQUEST['mspeed'];
$emw=$_REQUEST['emw'];
$mg=$_REQUEST['mg'];
$pha=$_REQUEST['pha'];
$recg=$_REQUEST['recg'];
$msd=$_REQUEST['msd'];
$lsd=$_REQUEST['lsd'];
$tsc=$_REQUEST['tsc'];
$eia=$_REQUEST['eia'];
$ec=$_REQUEST['ec'];
$hrr=$_REQUEST['hrr'];


$bpr=$_REQUEST['bpr'];
$ecd=$_REQUEST['ecd'];
$recover=$_REQUEST['recover'];
$oi=$_REQUEST['oi'];


$a5=$_REQUEST['a5'];
$a6=$_REQUEST['a6'];
$a7=$_REQUEST['a7'];

$b5=$_REQUEST['b5'];
$b6=$_REQUEST['b6'];
$b7=$_REQUEST['b7'];

$c5=$_REQUEST['c5'];
$c6=$_REQUEST['c6'];
$c7=$_REQUEST['c7'];

$d5=$_REQUEST['d5'];
$d6=$_REQUEST['d6'];
$d7=$_REQUEST['d7'];

$e5=$_REQUEST['e5'];
$e6=$_REQUEST['e6'];
$e7=$_REQUEST['e7'];

$f5=$_REQUEST['f5'];
$f6=$_REQUEST['f6'];
$f7=$_REQUEST['f7'];

$g5=$_REQUEST['g5'];
$g6=$_REQUEST['g6'];
$g7=$_REQUEST['g7'];

$h5=$_REQUEST['h5'];
$h6=$_REQUEST['h6'];
$h7=$_REQUEST['h7'];

$i5=$_REQUEST['i5'];
$i6=$_REQUEST['i6'];
$i7=$_REQUEST['i7'];

$j5=$_REQUEST['j5'];
$j6=$_REQUEST['j6'];
$j7=$_REQUEST['j7'];

$k5=$_REQUEST['k5'];
$k6=$_REQUEST['k6'];
$k7=$_REQUEST['k7'];

$l5=$_REQUEST['l5'];
$l6=$_REQUEST['l6'];
$l7=$_REQUEST['l7'];

$m5=$_REQUEST['m5'];
$m6=$_REQUEST['m6'];
$m7=$_REQUEST['m7'];



//$comments=$_REQUEST['comments'];

$date= date('Y/m/d');
$date1=date('m/d/Y');
$date2=date('d/m/Y');
$date2=date('d/m/Y');
$stime=date("h:i:sa");
$dtime= date('d/m/Y H:i:s');
$ins_query="insert into ett (`dname`,`rname`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`cdiag`,`indication`,`cdata`,`medication`,`rt`,`ssummary`,`etime1`,`etime2`,`mspeed`,`emw`,`mg`,`pha`,`recg`,`msd`,`lsd`,`tsc`,`eia`,`ec`,`hrr`,`bpr`,`ecd`,`recover`,`oi`,`a5`,`a6`,`a7`,`b5`,`b6`,`b7`,`c5`,`c6`,`c7`,`d5`,`d6`,`d7`,`e5`,`e6`,`e7`,`f5`,`f6`,`f7`,`g5`,`g6`,`g7`,`h5`,`h6`,`h7`,`i5`,`i6`,`i7`,`j5`,`j6`,`j7`,`k5`,`k6`,`k7`,`l5`,`l6`,`l7`,`m5`,`m6`,`m7`,`eid`,`status1`,`type`,`location`,`date1`,`dtime`) 
values('$dname','$rname','$pmrn','$pname','$page','$psex','$pphone','$cdiag','$indication1','$cdata1','$medication1','$rt1','$ssummary','$etime1','$etime2','$mspeed','$emw','$mg','$pha','$recg','$msd','$lsd','$tsc','$eia','$ec','$hrr','$bpr','$ecd','$recover','$oi','$a5','$a6','$a7','$b5','$b6','$b7','$c5','$c6','$c7','$d5','$d6','$d7','$e5','$e6','$e7','$f5','$f6','$f7','$g5','$g6','$g7','$h5','$h6','$h7','$i5','$i6','$i7','$j5','$j6','$j7','$k5','$k6','$k7','$l5','$l6','$l7','$m5','$m6','$m7','$count1','Updated','ETT','OPD','$date1','$dtime')";
mysqli_query($con,$ins_query)or die ( "JHJKHH");



$query90 = "UPDATE alltest set rby='$fullname',rtime='$dtime',status='RECEIVED' where id='$id'"; 
$result90 = mysqli_query($con,$query90) or die ( mysqli_error());

//$update="update ecgapp set status='SEEN' where `id`='$id'";
//mysqli_query($con,$update);
echo '<script language="javascript">';
    echo 'alert("Report Saved Successfully")';
    echo '</script>';

	//$url = "ettedit1?pmrn=$pmrn&eid=$eid";
//header("Location: $url");
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

<h1 align="center">ETT REPORT FORM</h1>

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
			        <option></option>
					<option value='Dr. Mohammad Arifur Rahman'>Dr. Mohammad Arifur Rahman</option>
					<option value='Dr. Md. Moniruzzaman Maruf'>Dr. Md. Moniruzzaman Maruf</option>
					
					
					
					</select></td>
				<td colspan="10" ><input type="text" name="rname"  required value="<?php echo $dnam;?>" readonly/></td>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['id'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="10"><input type="text" name="pmrn"   value="<?php echo $pmrn;?>" readonly/></td>
					 <td colspan="10"><input type="text" name="pname"  value="<?php echo $pn;?>" readonly/></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Phone NO:</strong></label></td>
						<td colspan="5"><label><strong>REPORT ON:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page"  value="<?php echo $diff1;?>" readonly/></td>  
             		
					 <td colspan="5"><input type="text" name="psex"  value="<?php echo $ps;?>" readonly/></td>
					 <td colspan="5"><input type="text" name="pphone"  value="<?php echo $pp;?>" readonly/></td>  


					  
					 </tr>
<tr><td colspan="20"><label><strong>Clinical Diagnosis:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="cdiag" rows="5" ></textarea></td>  </tr>

	
					 
				 <tr>
				 
				 
				 		<td colspan="20"><label><strong>INDICATION: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="indication[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Evaluation of Chest Pain">Evaluation of Chest Pain</option>
<option value="Screening for IHD-SAP">Screening for IHD-SAP</option>
<option value="Screening for IHD-UA ">Screening for IHD-UA</option>
<option value="Screening for IHD-MI">Screening for IHD-MI</option>
<option value="Prognostic Assessment">Prognostic Assessment</option>
<option value="Rehabilitation">Rehabilitation</option>
<option value="Evaluation of Arrhythmia">Evaluation of Arrhythmia</option>
<option value="Evaluation of Medical Therapy">Evaluation of Medical Therapy</option>
<option value="Evaluation of Revascularization">Evaluation of Revascularization</option>
<option value="Predischarge (After MI)">Predischarge (After MI)</option>
       
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
				 
				 
				 		<td colspan="20"><label><strong>CLINICAL DATA: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="cdata[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Hypertension">Hypertension</option>
<option value="IHD-SAP">IHD-SAP</option>
<option value="IHD-UA">IHD-UA</option>
<option value="IHD-MI">IHD-MI</option>	
<option value="Diabetes">Diabetes</option>
<option value="Smoker">Smoker</option>
<option value="Past Smoker">Past Smoker</option>
<option value="Hyperlipidaemia">Hyperlipidaemia</option>
<option value="CABG">CABG</option>
<option value="Stentangioplasty">Stentangioplasty</option>
<option value="Family history-IHD">Family history-IHD</option>
<option value="Family history-DM">Family history-DM</option>
</tr>				 


<tr><td colspan="20"><label><strong>      MEDICATION: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="medication[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Beta-Blockers">Beta-Blockers</option>
<option value="Digitalis">Digitalis</option>
<option value="CCB">CCB</option>
<option value="Nitrates">Nitrates</option>
<option value="ACE Inhibitors">ACE Inhibitors</option>
<option value="ARB">ARB</option>
<option value="Diuretics">Diuretics</option>
<option value="None">None</option>


</tr>	


<tr>
						
						
						<td colspan="3"><label><strong>Excercise</strong></label></td>
						<td colspan="2"><label><strong>Bruce</strong></label></td>
						
						<td colspan="2"><label><strong>Speed (MPH)</strong></label></td>
						<td colspan="2"><label><strong>Elevation (% Grade)</strong></label></td>
						<td colspan="2"><label><strong>Heart Rate (bpm) </strong></label></td>
						<td colspan="2"><label><strong>Blood Pressure (mm Hg)</strong></label></td>
						<td colspan="2"><label><strong>Symptoms & Signs </strong></label></td>
						
						
						
						
						
						</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">REST</td>
					 
					 <td colspan="2"></td>
					 <td colspan="2"></td>
					 <td colspan="2"><input type="text" name="a5"   value="" /></td>
					 <td colspan="2"><input type="text" name="a6"   value="" /></td>
					 <td colspan="2"><input type="text" name="a7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">REST</td>
					 
					 <td colspan="2">1.7</td>
					 <td colspan="2">0</td>
					 <td colspan="2"><input type="text" name="b5"   value="" /></td>
					 <td colspan="2"><input type="text" name="b6"   value="" /></td>
					 <td colspan="2"><input type="text" name="b7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">REST</td>
					 
					 <td colspan="2">1.7</td>
					 <td colspan="2">5</td>
					 <td colspan="2"><input type="text" name="c5"   value="" /></td>
					 <td colspan="2"><input type="text" name="c6"   value="" /></td>
					 <td colspan="2"><input type="text" name="c7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">Stage-1</td>
					 
					 <td colspan="2">1.7</td>
					 <td colspan="2">10</td>
					 <td colspan="2"><input type="text" name="d5"   value="" /></td>
					 <td colspan="2"><input type="text" name="d6"   value="" /></td>
					 <td colspan="2"><input type="text" name="d7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">Stage-2</td>
					
					 <td colspan="2">2.5</td>
					 <td colspan="2">12</td>
					 <td colspan="2"><input type="text" name="e5"   value="" /></td>
					 <td colspan="2"><input type="text" name="e6"   value="" /></td>
					 <td colspan="2"><input type="text" name="e7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">Stage-3</td>
					
					 <td colspan="2">3.4</td>
					 <td colspan="2">14</td>
					 <td colspan="2"><input type="text" name="f5"   value="" /></td>
					 <td colspan="2"><input type="text" name="f6"   value="" /></td>
					 <td colspan="2"><input type="text" name="f7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">Stage-4</td>
					
					 <td colspan="2">4.2</td>
					 <td colspan="2">16</td>
					 <td colspan="2"><input type="text" name="g5"   value="" /></td>
					 <td colspan="2"><input type="text" name="g6"   value="" /></td>
					 <td colspan="2"><input type="text" name="g7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">Stage-5</td>
					
					 <td colspan="2">5.0</td>
					 <td colspan="2">18</td>
					 <td colspan="2"><input type="text" name="h5"   value="" /></td>
					 <td colspan="2"><input type="text" name="h6"   value="" /></td>
					 <td colspan="2"><input type="text" name="h7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Excercise</td>
					 <td colspan="2">Stage-6</td>
					
					 <td colspan="2">5.5</td>
					 <td colspan="2">20</td>
					 <td colspan="2"><input type="text" name="i5"   value="" /></td>
					 <td colspan="2"><input type="text" name="i6"   value="" /></td>
					 <td colspan="2"><input type="text" name="i7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Recovery</td>
					 <td colspan="2">2 Min</td>
					
					 <td colspan="2"></td>
					 <td colspan="2"></td>
					 <td colspan="2"><input type="text" name="j5"   value="" /></td>
					 <td colspan="2"><input type="text" name="j6"   value="" /></td>
					 <td colspan="2"><input type="text" name="j7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Recovery</td>
					 <td colspan="2">4 Min</td>
					
					 <td colspan="2"></td>
					 <td colspan="2"></td>
					 <td colspan="2"><input type="text" name="k5"   value="" /></td>
					 <td colspan="2"><input type="text" name="k6"   value="" /></td>
					 <td colspan="2"><input type="text" name="k7"   value="" /></td>
					 

					 
</tr>

<tr>				<td colspan="3">Recovery</td>
					 <td colspan="2">6 Min</td>
					
					 <td colspan="2"></td>
					 <td colspan="2"></td>
					 <td colspan="2"><input type="text" name="l5"   value="" /></td>
					 <td colspan="2"><input type="text" name="l6"   value="" /></td>
					 <td colspan="2"><input type="text" name="l7"   value="" /></td>

					 
</tr>

<tr>				<td colspan="3">Recovery</td>
					 <td colspan="2">8 Min</td>
					
					 <td colspan="2"></td>
					 <td colspan="2"></td>
					 <td colspan="2"><input type="text" name="m5"   value="" /></td>
					 <td colspan="2"><input type="text" name="m6"   value="" /></td>
					 <td colspan="2"><input type="text" name="m7"   value="" /></td>
					 

					 
</tr>





<tr><td colspan="20"><label><strong>      REASON FOR TERMINATION: </strong></label></td></tr>
				 <tr><td colspan="20"><select name="rt[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value=""selected>N/A</option>
<option value="Chest Pain (Angina)">Chest Pain (Angina)</option>
<option value="THR-achieved">THR-achieved</option>
<option value="Rise of BP ">Rise of BP</option>
<option value="Fall of BP">Fall of BP</option>
<option value="Dizziness">Dizziness</option>
<option value="Diagnostic ECG-Changes">Diagnostic ECG-Changes</option>
<option value="Fatigue-General">Fatigue-General</option>
<option value="Fatigue-Leg">Fatigue-Leg</option>
<option value="Dyspnoea">Dyspnoea</option>

</tr>	

	 		
<tr><td colspan="20"><label><strong>STRESS TEST DATA AND SUMMARY:</strong></label></td>  </tr>
						 <tr><td colspan="20"><select name="ssummary">
        
						<option value=''>-Select Procedure Name-</option>
						<option value='Bruce'>Bruce</option>
						<option value='Modified Bruce'>Modified Bruce</option>
						
						
				
</select></td>  </tr>

						 
<tr>
						
						
						<td colspan="10"><label><strong>Exercise time (Min):</strong></label></td>
						<td colspan="10"><label><strong>Exercise time (Sec):</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="10"><input type="text" name="etime1"   value="" /></td>
					 <td colspan="10"><input type="text" name="etime2"  value="" /></td>

					 
</tr>						 


<tr>
						
						
						<td colspan="4"><label><strong>Maximum Speed:</strong></label></td>
						<td colspan="4"><label><strong>Estimated Maximum workload:</strong></label></td>
						<td colspan="4"><label><strong>Maximum Grade:</strong></label></td>
						<td colspan="4"><label><strong>Peak HR Achieved:</strong></label></td>
						<td colspan="4"><label><strong>Resting ECG:</strong></label></td>
						
						
						
						</tr>

<tr>				<td colspan="4"><input type="text" name="mspeed"   value="" /></td>
					 <td colspan="4"><input type="text" name="emw"  value="" /></td>
					 <td colspan="4"><input type="text" name="mg"   value="" /></td>
					 <td colspan="4"><input type="text" name="pha"  value="" /></td>
					 <td colspan="4"><input type="text" name="recg"   value="" /></td>
					 

					 
</tr>

<tr>
						
						
						<td colspan="4"><label><strong>Maximum ST depression / elevation (>1mm) :</strong></label></td>
						<td colspan="4"><label><strong>Leads with ST depression / elevation (>1mm) : </strong></label></td>
						<td colspan="4"><label><strong>Type of ST-changes (depression / elevation) : </strong></label></td>
						<td colspan="4"><label><strong>Exercise induced arrhythmia / heart block : </strong></label></td>
						<td colspan="4"><label><strong>Exercise capacity : </strong></label></td>
						
						
						
						</tr>

<tr>				<td colspan="4"><input type="text" name="msd"   value="" /></td>
					 <td colspan="4"><input type="text" name="lsd"  value="" /></td>
					 <td colspan="4"><input type="text" name="tsc"   value="" /></td>
					 <td colspan="4"><input type="text" name="eia"  value="" /></td>
					 <td colspan="4"><input type="text" name="ec"   value="" /></td>
					 

					 
</tr>		

<tr>
						
						
						<td colspan="4"><label><strong>Heart rate respose  :</strong></label></td>
						<td colspan="4"><label><strong>Blood pressure respose  : </strong></label></td>
						<td colspan="4"><label><strong>ECG changes during and or after the procedure  : </strong></label></td>
						<td colspan="4"><label><strong>Recovery : </strong></label></td>
						<td colspan="4"><label><strong>Other information (if any)  : </strong></label></td>
						
						
						
						</tr>

<tr>				<td colspan="4"><input type="text" name="hrr"   value="" /></td>
					 <td colspan="4"><input type="text" name="bpr"  value="" /></td>
					 <td colspan="4"><input type="text" name="ecd"   value="" /></td>
					 <td colspan="4"><input type="text" name="recover"  value="" /></td>
					 <td colspan="4"><input type="text" name="oi"   value="" /></td>
					 

					 
</tr>						 




						 
														


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="ettreport.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$count1"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
