<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','oic','mrd','ddf')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(adoc) FROM inpatient where adoc= '$bt'and dnew BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(adoc) FROM inpatient where dnew BETWEEN '$start' and '$end';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
}

?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
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
  height: 50px;
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
   <li><a href='homemng'><span>Home</span></a></li>
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

<h1 align="center">Inpatient Discharge Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							<td colspan="3"><label><strong> Select Consultant</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 <td colspan="3"><select name="bt" class="con_charge" required id="pmrn">
  

  <option value=''>-Select Consultant Name-</option>

        
						<option value=''>-Select-</option>
						<option value='all'>ALL</option>
						<?php 
			$sql = "select * from `doctor` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
				
</select>


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
			<script>
$(document).ready(function() {
    $('.con_charge').select2();
});
</script>
			
			</td>

					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="10%"><strong>Type</strong></th>
      <th width="15%"><strong>Admission Date </strong>
      
      <th width="14%"><strong>Doctor's Name</strong>
      <th width="14%"><strong>Bed</strong>
      <th width="14%"><strong>All Records</strong>   
	  <th width="14%"><strong>All Reports</strong>
    <th width="14%"><strong>Discharge Report</strong>
    <th width="14%"><strong>Summary Bill</strong>
    <th width="14%"><strong>Total</strong>
    <th width="14%"><strong>Hospital</strong>
    <th width="14%"><strong>Consultant</strong>


	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];

if (($_POST['bt'])=="all"){
echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row44['COUNT(adoc)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;

$sel_query="Select * from inpatient where dnew BETWEEN '$start' and '$end' order by dnew";}
 else{
	 echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row43['COUNT(adoc)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from inpatient where adoc='$bt' and dnew BETWEEN '$start' and '$end' order by dnew";
 } 
$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["adate"]; ?></td>
      
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["adoc"];?> 
      <td align="center"><?php echo $row["room1"]; ?>  </td>
      <td align="center"><a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>">All Records</a></td> 
	  <td align="center"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row["pmrn"]; ?>">All Reports</a></td> 
	  <td align="center"><a target='_blank' href="discharge_view?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Discharge Note</a></td>





      <?php
      $eid=$row['eid'];
      $emer_eid=$row['emerid'];
      $pmrn=$row['pmrn'];
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198j_bed = "SELECT SUM(charge) FROM newbed_new where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(charge)'];
$test1c_bed4=	$row198j_bed['SUM(charge)']+$fday8;

$total_bed_dis=	($test1c_bed4)*$data['room_dis']/100;


	$query198j_stay = "SELECT SUM(tdays),b_charge FROM newbed where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_stay = mysqli_query($dbhandle,$query198j_stay) or die(mysql_error());

// Print out result
$row198j_stay = mysqli_fetch_array($result198j_stay);

$total_day=	$row198j_stay['SUM(tdays)']/24;
$bed_charge_new=	$row198j_stay['b_charge'];



$query198ad = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and status1='implemented' and reuse=''"; 
	 
$result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());

// Print out result
$row198ad = mysqli_fetch_array($result198ad);
$test1am2=	$row198ad['SUM(uprice)'];



$query198ad3 = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and status1='implemented' and reuse='Reuse' and discard='New'"; 
	 
$result198ad3 = mysqli_query($dbhandle, $query198ad3) or die(mysql_error());

// Print out result
$row198ad3 = mysqli_fetch_array($result198ad3);
$test1am3=	$row198ad3['SUM(uprice)'];


$test1am=$test1am3+$test1am2;


$query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in('lab','Lab','LAB')"; 
	 
$result198af = mysqli_query($dbhandle,$query198af) or die(mysql_error());

// Print out result
$row198af = mysqli_fetch_array($result198af);
$test1al=	$row198af['SUM(price)'];


$query198af3 = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN','DONE') and type in('rad','Rad','RAD')"; 
	 
$result198af3 = mysqli_query($dbhandle,$query198af3) or die(mysql_error());

// Print out result
$row198af3 = mysqli_fetch_array($result198af3);
$test1al_rad=	$row198af3['SUM(price)'];


$query198ah = "SELECT SUM(price), SUM(doc_price)  FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN') and type in ('spd','spd1','ANJAN OPD ( ENT)','SPD')"; 
	 
$result198ah = mysqli_query($dbhandle,$query198ah) or die(mysql_error());

// Print out result
$row198ah = mysqli_fetch_array($result198ah);
$test1as=	$row198ah['SUM(price)']+$row198ah['SUM(doc_price)'];



$query198 = "SELECT SUM(price) FROM inhoscharge where pmrn= '$pmrn' and eid='$eid'"; 
	 
  $result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());
  $row198 = mysqli_fetch_array($result198);
  
  
  $query198_care = "SELECT SUM(price) FROM careshope1 where pmrn= '$pmrn' and eid='$eid'"; 
     
  $result198_care = mysqli_query($dbhandle,$query198_care) or die(mysql_error());
  
  $row198_care = mysqli_fetch_array($result198_care);
  $care_price=$row198_care['SUM(price)'];
  // Print out result
  
  $test1=	$row198['SUM(price)']+$care_price;


  $query198j = "SELECT SUM(charge) FROM icnote where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198j = mysqli_query($dbhandle,$query198j) or die(mysql_error());

// Print out result
$row198j = mysqli_fetch_array($result198j);
$test1c=	$row198j['SUM(charge)'];


$opd_procedure = "SELECT SUM(price) FROM prohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res = mysqli_query($dbhandle,$opd_procedure) or die(mysql_error());

// Print out result
$opd_procedure_data = mysqli_fetch_array($opd_procedure_res);
$opd_procedure_sum=	$opd_procedure_data['SUM(price)'];

$opd_procedure_medi = "SELECT SUM(price) FROM promediused where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res_medi = mysqli_query($dbhandle,$opd_procedure_medi) or die(mysql_error());

// Print out result
$opd_procedure_data_medi = mysqli_fetch_array($opd_procedure_res_medi);
$opd_procedure_sum_medi=	$opd_procedure_data_medi['SUM(price)'];


$opd_procedure_doc = "SELECT SUM(procharge) FROM procedure1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res_doc = mysqli_query($dbhandle,$opd_procedure_doc) or die(mysql_error());

// Print out result
$opd_procedure_data_doc = mysqli_fetch_array($opd_procedure_res_doc);
$opd_procedure_sum_doc=	$opd_procedure_data_doc['SUM(procharge)'];

$opd_pro_summary=$opd_procedure_sum+$opd_procedure_sum_medi;



$opd_cath = "SELECT SUM(qty) FROM cathhoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res = mysqli_query($dbhandle,$opd_cath) or die(mysql_error());

// Print out result
$opd_cath_data = mysqli_fetch_array($opd_cath_res);
$opd_cath_sum=	$opd_cath_data['SUM(qty)'];

$opd_cath_medi = "SELECT SUM(price) FROM cathmediused where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res_medi = mysqli_query($dbhandle,$opd_cath_medi) or die(mysql_error());

// Print out result
$opd_cath_data_medi = mysqli_fetch_array($opd_cath_res_medi);
$opd_cath_sum_medi=	$opd_cath_data_medi['SUM(price)'];


$opd_cath_doc = "SELECT SUM(charge) FROM cath_charge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res_doc = mysqli_query($dbhandle,$opd_cath_doc) or die(mysql_error());

// Print out result
$opd_cath_data_doc = mysqli_fetch_array($opd_cath_res_doc);
$opd_cath_sum_doc=	$opd_cath_data_doc['SUM(charge)'];

$opd_cath_summary=$opd_cath_sum+$opd_cath_sum_medi;


$opd_msuite = "SELECT SUM(price) FROM prohoscharge_ms where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res = mysqli_query($dbhandle,$opd_msuite) or die(mysql_error());

// Print out result
$opd_msuite_data = mysqli_fetch_array($opd_msuite_res);
$opd_msuite_sum=	$opd_msuite_data['SUM(price)'];

$opd_msuite_medi = "SELECT SUM(price) FROM promediused_ms where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_medi = mysqli_query($dbhandle,$opd_msuite_medi) or die(mysql_error());

// Print out result
$opd_msuite_data_medi = mysqli_fetch_array($opd_msuite_res_medi);
$opd_msuite_sum_medi=	$opd_msuite_data_medi['SUM(price)'];


$opd_msuite_doc = "SELECT SUM(procharge) FROM m_suite where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_doc = mysqli_query($dbhandle,$opd_msuite_doc) or die(mysql_error());

// Print out result
$opd_msuite_data_doc = mysqli_fetch_array($opd_msuite_res_doc);
$opd_msuite_sum_doc=	$opd_msuite_data_doc['SUM(procharge)'];

$opd_msuite_summary=$opd_msuite_sum+$opd_msuite_sum_medi;


$endo_doc = "SELECT SUM(room) FROM ivisitendo where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_doc_res = mysqli_query($dbhandle,$endo_doc) or die(mysql_error());

// Print out result
$endo_doc_data = mysqli_fetch_array($endo_doc_res);
$endo_doc_sum=	$endo_doc_data['SUM(room)'];

$endo_hos = "SELECT SUM(price) FROM endohoscharge1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_hos_q = mysqli_query($dbhandle,$endo_hos) or die(mysql_error());

// Print out result
$endo_hos_data = mysqli_fetch_array($endo_hos_q);
$endo_hos_sum=	$endo_hos_data['SUM(price)'];


$endo_medi = "SELECT SUM(price) FROM endohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_medi_q = mysqli_query($dbhandle,$endo_medi) or die(mysql_error());

// Print out result
$endo_medi_data = mysqli_fetch_array($endo_medi_q);
$endo_medi_sum=	$endo_medi_data['SUM(price)'];

$endo_summary=$endo_hos_sum+$endo_medi_sum;



$query198_dis = "SELECT SUM(tprice) FROM phar_sale where pmrn= '$pmrn' and eid='$eid' and location='Discharge'"; 
	 
$result198_dis = mysqli_query($dbhandle,$query198_dis) or die(mysql_error());

// Print out result
$row198_dis = mysqli_fetch_array($result198_dis);
$test1_dis=	$row198_dis['SUM(tprice)'];


$emer_medi = "SELECT SUM(uprice) FROM estat where pmrn= '$pmrn' and eid='$emer_eid' and status='Rupdated'"; 

	 
$emer_medi_1 = mysqli_query($dbhandle, $emer_medi) or die(mysql_error());

// Print out result
$emer_medi_res = mysqli_fetch_array($emer_medi_1);
$emer_medi_bill=	$emer_medi_res['SUM(uprice)'];


$emer_inves = "SELECT SUM(price) FROM einves where pmrn= '$pmrn' and eid='$emer_eid' and status in ('RECEIVED','SEEN','DONE')"; 

	 
$emer_inves_1 = mysqli_query($dbhandle, $emer_inves) or die(mysql_error());

// Print out result
$emer_inves_res = mysqli_fetch_array($emer_inves_1);
$emer_inves_bill=	$emer_inves_res['SUM(price)'];

$emer_dispo = "SELECT SUM(price) FROM edisposible where pmrn= '$pmrn' and eid='$emer_eid'"; 
	 
$emer_dispo_1 = mysqli_query($dbhandle, $emer_dispo) or die(mysql_error());

// Print out result
$emer_dispo_res = mysqli_fetch_array($emer_dispo_1);
$emer_dispo_bill=	$emer_dispo_res['SUM(price)'];


$emer_evisit = "SELECT SUM(visit) FROM ecnote where pmrn= '$pmrn' and eid='$emer_eid'"; 
	 
$emer_evisit_1 = mysqli_query($dbhandle, $emer_evisit) or die(mysql_error());

// Print out result
$emer_evisit_res = mysqli_fetch_array($emer_evisit_1);
$emer_evisit_bill=	$emer_evisit_res['SUM(visit)'];

/*$nurse_procedure = "SELECT SUM(price) FROM enprocedure where pmrn='$pmrn' and eid='$emer_eid'"; 
	 
$nurse_procedure1 = mysqli_query($dbhandle,$nurse_procedure) or die(mysql_error());

// Print out result
$nurse_procedure2 = mysqli_fetch_array($nurse_procedure1);
$nurse_procedure_price=	$nurse_procedure2['SUM(price)'];
*/

$emer_all_bill=$emer_dispo_bill+$emer_inves_bill+$emer_medi_bill+$nurse_procedure_price+0;


$query198j_doc_ot = "SELECT * FROM ot where pmrn= '$pmrn' and eid='$eid' ORDER BY id DESC"; 
	 
  $result198j_doc_ot = mysqli_query($dbhandle,$query198j_doc_ot) or die(mysql_error());
  $row198j_doc_ot = mysqli_fetch_array($result198j_doc_ot);
  $test1c_doc_ot=	$row198j_doc_ot['id'];
  

$query198j_doc = "SELECT SUM(room) FROM otivisitendo where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_doc = mysqli_query($dbhandle,$query198j_doc) or die(mysql_error());

// Print out result
$row198j_doc = mysqli_fetch_array($result198j_doc);
$test1c_doc=	$row198j_doc['SUM(room)'];


$query198j_dis = "SELECT SUM(ins) FROM othoscharge where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_dis = mysqli_query($dbhandle,$query198j_dis) or die(mysqli_error());

// Print out result
$row198j_dis = mysqli_fetch_array($result198j_dis);
$test1c_dis=	$row198j_dis['SUM(ins)'];

$query198j_medi = "SELECT SUM(ins) FROM othoscharge1 where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_medi = mysqli_query($dbhandle,$query198j_medi) or die(mysqli_error());

// Print out result
$row198j_medi = mysqli_fetch_array($result198j_medi);
$test1c_medi=	$row198j_medi['SUM(ins)'];


/*$query198j_amedi = "SELECT SUM(price) FROM otanaesmedi where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_amedi = mysqli_query($dbhandle,$query198j_amedi) or die(mysqli_error());

// Print out result
$row198j_amedi = mysqli_fetch_array($result198j_amedi);
$test1c_amedi=	$row198j_amedi['SUM(price)'];

$query198j_ainfu = "SELECT SUM(price) FROM otanaesinfusion where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_ainfu = mysqli_query($dbhandle,$query198j_ainfu) or die(mysqli_error());

// Print out result
$row198j_ainfu = mysqli_fetch_array($result198j_ainfu);
$test1c_ainfu=	$row198j_ainfu['SUM(price)'];

*/


$payment=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$implant+$extra+$test1_dis-$test1al_rad_dis-$total_bed_dis;

$ot_payment=$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu-$data['ot_hos_dis']-$data['ot_doc_dis'];
$in_payment=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed-$test1al_rad_dis-$total_bed_dis;
$payable=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$implant+$extra+$endo_summary+$opd_pro_summary+$test1_dis+$emer_all_bill-$test1al_rad_dis-$total_bed_dis-$data['hos1_dis']-$data['hos_doc_dis']-$data['advance'];



$query198j_implant = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi LIKE '%IMPLANT%' "; 
	 
$result198j_implant = mysqli_query($dbhandle,$query198j_implant) or die(mysqli_error());

// Print out result
$row198j_implant = mysqli_fetch_array($result198j_implant);
$implant=	$row198j_implant['SUM(price)'];

$query198j_extra = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi NOT LIKE '%IMPLANT%'"; 
	 
$result198j_extra = mysqli_query($dbhandle,$query198j_extra) or die(mysqli_error());

// Print out result
$row198j_extra = mysqli_fetch_array($result198j_extra);
$extra=	$row198j_extra['SUM(price)'];


	?>
    <td align="center"><a target='_blank' href="ipall_new_1_new_0_new1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Summary Bill</a></td>

    <td align="center"><a target='_blank' href="ipall_new_1_new_0_new1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><?php if($total_day<1){echo $bed_charge_new+$test1am+$test1al+$test1al_rad+$test1as+$test1+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary+$endo_summary+$test1_dis+$emer_all_bill+$ot_payment+$implant+$extra+$test1c+$opd_procedure_sum_doc+$opd_cath_sum_doc+$opd_msuite_sum_doc+$endo_doc_sum+$emer_evisit_bill+$test1c_doc;}
    else {echo $test1c_bed+$test1am+$test1al+$test1al_rad+$test1as+$test1+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary+$endo_summary+$test1_dis+$emer_all_bill+$ot_payment+$implant+$extra+$test1c+$opd_procedure_sum_doc+$opd_cath_sum_doc+$opd_msuite_sum_doc+$endo_doc_sum+$emer_evisit_bill+$test1c_doc;}?></a></td>

    <td align="center"><a target='_blank' href="ipall_new_1_new_0_new1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><?php if($total_day<1){echo $bed_charge_new+$test1am+$test1al+$test1al_rad+$test1as+$test1+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary+$endo_summary+$test1_dis+$emer_all_bill+$ot_payment+$implant+$extra;}
    else {echo $test1c_bed+$test1am+$test1al+$test1al_rad+$test1as+$test1+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary+$endo_summary+$test1_dis+$emer_all_bill+$ot_payment+$implant+$extra;}?></a></td>
    <td align="center"><a target='_blank' href="ipall_new_1_new_0_new1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><?php echo $test1c+$opd_procedure_sum_doc+$opd_cath_sum_doc+$opd_msuite_sum_doc+$endo_doc_sum+$emer_evisit_bill+$test1c_doc?></a></td>
    
      </tr>
	  
    <?php $count++; } }?>


      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>
