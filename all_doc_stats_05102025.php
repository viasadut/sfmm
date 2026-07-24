<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');


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
    max-width: 1500px;
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
    <title>CONSULTANT STATEMENT</title>
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

<h1 align="center">CONSULTANT WISE STATEMENT</h1>

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
					 <td colspan="3">
					<input list="test" name="bt" id="test1" size='50'> 
					 
					 <datalist id="test">
					 
					
        
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
						
				
</datalist></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th><strong>S.No</strong></th>
      <th ><strong>Patient's Name</strong></th>
      <th ><strong>MRN</strong></th>
      <th ><strong>Appointment Date </strong>
      <th ><strong>Amount</strong>   
      
	   </tr>
  </thead>
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$bt=$_REQUEST["bt"];


$date77=date('Y-m-d',strtotime($_REQUEST['stdate']));
$date77e=date('Y-m-d',strtotime($_REQUEST['endate']));
$date78=date('m/d/Y');


$query43 = "SELECT * FROM user where fullname= '$bt';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$dd=$row43['uname'];


$query43 = "SELECT COUNT(pmrn) FROM presnew where date1 between '$date77' and '$date77e' and dname='$bt';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);


$query43p = "SELECT SUM(payment) FROM pappnew where adate1 between '$date77' and '$date77e' and dname='$bt' and status='SEEN';"; 
	 
$result43p = mysqli_query($con, $query43p) or die(mysqli_error());
$row43p = mysqli_fetch_assoc($result43p);


$query44 = "SELECT COUNT(pmrn) FROM inpatient where anew between '$date77' and '$date77e' and adoc='$bt' and emerid ='0';"; 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);


$query44e = "SELECT COUNT(pmrn) FROM inpatient where anew between '$date77' and '$date77e' and adoc='$bt' and emerid !='0';"; 
$result44e = mysqli_query($con, $query44e) or die(mysqli_error());
$row44e = mysqli_fetch_assoc($result44e);



$query45 = "SELECT COUNT(pmrn) FROM erefferal where ddate between '$date77' and '$date77e' and infusion='$bt';"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);


$query46 = "SELECT COUNT(pmrn) FROM ot where date5 between '$date77' and '$date77e' and status='Received' and dname='$bt';"; 
	 
$result46 = mysqli_query($con, $query46) or die(mysqli_error());
$row46 = mysqli_fetch_assoc($result46);



$query46a = "SELECT COUNT(pmrn) FROM ot where status='Received' and '$bt' in (nanes,anes2,anes3) and date5 between '$date77' and '$date77e';"; 
	 
$result46a = mysqli_query($con, $query46a) or die(mysqli_error());
$row46a = mysqli_fetch_assoc($result46a);



$query47 = "SELECT COUNT(pmrn) FROM endopapp where adate between '$date77' and '$date77e' and dreffer='$bt' and status in ('Received','SEEN');"; 
	 
$result47 = mysqli_query($con, $query47) or die(mysqli_error());
$row47 = mysqli_fetch_assoc($result47);



$query47a = "SELECT COUNT(pmrn) FROM endopapp where adate between '$date77' and '$date77e' and anes='$bt' and status in ('Received','SEEN');"; 
	 
$result47a = mysqli_query($con, $query47a) or die(mysqli_error());
$row47a = mysqli_fetch_assoc($result47a);



$query48 = "SELECT COUNT(pmrn) FROM procedure1 where date1 between '$date77' and '$date77e' and dname='$bt' and ustatus in ('Updated','Paid');"; 
	 
$result48 = mysqli_query($con, $query48) or die(mysqli_error());
$row48 = mysqli_fetch_assoc($result48);



$query48r = "SELECT COUNT(pmrn) FROM radreport where rdate between '$date77' and '$date77e' and dname='$bt';"; 
	 
$result48r = mysqli_query($con, $query48r) or die(mysqli_error());
$row48r = mysqli_fetch_assoc($result48r);




$query48l = "SELECT COUNT(pmrn) FROM alltest where date1 between '$date77' and '$date77e' and cby='$dd' and type='lab';"; 
	 
$result48l = mysqli_query($con, $query48l) or die(mysqli_error());
$row48l = mysqli_fetch_assoc($result48l);



$query48l1 = "SELECT COUNT(pmrn) FROM iinves where dis_date between '$date77' and '$date77e' and conby='$dd' and type='lab';"; 
	 
$result48l1 = mysqli_query($con, $query48l1) or die(mysqli_error());
$row48l1 = mysqli_fetch_assoc($result48l1);


$query48l2 = "SELECT COUNT(pmrn) FROM einves where ndate between '$date77' and '$date77e' and conby='$dd' and type='lab';"; 
	 
$result48l2 = mysqli_query($con, $query48l2) or die(mysqli_error());
$row48l2 = mysqli_fetch_assoc($result48l2);



$query48ecg = "SELECT COUNT(pmrn) FROM ecg where datenew between '$date77' and '$date77e' and dname1='$bt' and status1='Confirmed';"; 
	 
$result48ecg = mysqli_query($con, $query48ecg) or die(mysqli_error());
$row48ecg = mysqli_fetch_assoc($result48ecg);



$query48echo = "SELECT COUNT(pmrn) FROM echo where datenew between '$date77' and '$date77e' and dname='$bt' and status1='Confirmed';"; 
	 
$result48echo= mysqli_query($con, $query48echo) or die(mysqli_error());
$row48echo = mysqli_fetch_assoc($result48echo);


$query48ett = "SELECT COUNT(pmrn) FROM ett where date2 between '$date77' and '$date77e' and dname='$bt' and status1='Confirmed';"; 
	 
$result48ett= mysqli_query($con, $query48ett) or die(mysqli_error());
$row48ett = mysqli_fetch_assoc($result48ett);




$histo = "SELECT COUNT(pmrn) FROM histo where date1 between '$date77' and '$date77e' and dname1='$bt' and status='REPORT DONE';"; 
	 
$histo1= mysqli_query($con, $histo) or die(mysqli_error());
$histo2 = mysqli_fetch_assoc($histo1);


$histof = "SELECT COUNT(pmrn) FROM fnacreport where date5 between '$date77' and '$date77e' and dname='$bt' and status='SEEN';"; 
	 
$histo1f= mysqli_query($con, $histof) or die(mysqli_error());
$histo2f = mysqli_fetch_assoc($histo1f);



$query43i = "SELECT SUM(charge) FROM icnote where dis_date between '$date77' and '$date77e' and user='$bt' and ugroup='Doctor';"; 
	 
$result43i = mysqli_query($con, $query43i) or die(mysqli_error());
$row43i = mysqli_fetch_assoc($result43i);


$query43i_discount = "SELECT SUM(discount) FROM icnote where dis_date between '$date77' and '$date77e' and user='$bt' and ugroup='Doctor';"; 
	 
$result43i_discount = mysqli_query($con, $query43i_discount) or die(mysqli_error());
$row43i_discount = mysqli_fetch_assoc($result43i_discount);



$query43o = "SELECT SUM(charge) FROM otreport where dis_date between '$date77' and '$date77e' and sname='$bt';"; 
	 
$result43o = mysqli_query($con, $query43o) or die(mysqli_error());
$row43o = mysqli_fetch_assoc($result43o);


$query43o_discount = "SELECT SUM(discount) FROM doc_dis where edate between '$date77' and '$date77e' and dname='$bt';"; 
	 
$result43o_discount = mysqli_query($con, $query43o_discount) or die(mysqli_error());
$row43o_discount = mysqli_fetch_assoc($result43o_discount);




$query43pp = "SELECT SUM(procharge) FROM procedure1 where date1 between '$date77' and '$date77e' and dname='$bt';"; 
	 
$result43pp = mysqli_query($con, $query43pp) or die(mysqli_error());
$row43pp = mysqli_fetch_assoc($result43pp);



$query43e = "SELECT SUM(room) FROM ivisitendo where cdate between '$date77' and '$date77e' and infusion='$bt';"; 
	 
$result43e = mysqli_query($con, $query43e) or die(mysqli_error());
$row43e = mysqli_fetch_assoc($result43e);


$query43ecg = "SELECT COUNT(ron) FROM ecg_test where datenew between '$date77' and '$date77e' and con_by='$dd' and ron='ECG';"; 
	 
$result43ecg = mysqli_query($con, $query43ecg) or die(mysqli_error());
$row43ecg = mysqli_fetch_assoc($result43ecg);


$query43ecg1 = "SELECT COUNT(ron) FROM ecg_test where datenew between '$date77' and '$date77e' and con_by='$dd' and ron='ECHO-COLOR DOPPLER';"; 
	 
$result43ecg1 = mysqli_query($con, $query43ecg1) or die(mysqli_error());
$row43ecg1 = mysqli_fetch_assoc($result43ecg1);


$query43ecg2 = "SELECT COUNT(ron) FROM ecg_test where datenew between '$date77' and '$date77e' and con_by='$dd' and ron='ECHO-2D';"; 
	 
$result43ecg2 = mysqli_query($con, $query43ecg2) or die(mysqli_error());
$row43ecg2 = mysqli_fetch_assoc($result43ecg2);


$query43ecg3 = "SELECT COUNT(ron) FROM ecg_test where datenew between '$date77' and '$date77e' and con_by='$dd' and ron='CORONARY ANGIOGRAM';"; 
	 
$result43ecg3 = mysqli_query($con, $query43ecg3) or die(mysqli_error());
$row43ecg3 = mysqli_fetch_assoc($result43ecg3);

 
$query43_e = "SELECT SUM(visit) FROM ecnote where daten between '$date77' and '$date77e' and dname='$bt' and type='Doctor';"; 
	 
$result43_e = mysqli_query($con, $query43_e) or die(mysqli_error());
$row43_e = mysqli_fetch_assoc($result43_e);



$query_cath = "SELECT COUNT(pmrn) FROM cath_charge where date1 between '$date77' and '$date77e' and c_status!='Cancelled' and sname='$bt';"; 
	 
$result_cath = mysqli_query($con, $query_cath) or die(mysqli_error());
$cath_count = mysqli_fetch_assoc($result_cath);



$query_cath1 = "SELECT SUM(charge) FROM cath_charge where date1 between '$date77' and '$date77e' and c_status!='Cancelled' and sname='$bt';"; 
	 
$result_cath1 = mysqli_query($con, $query_cath1) or die(mysqli_error());
$cath_sum = mysqli_fetch_assoc($result_cath1);



echo "<br><br>";

echo "<font color=blue font size=5.5><b> ".$bt." ACTIVITIES AT A GLANCE  - $date77 TO $date77e";

	 
	 echo "<br>";
	 

   echo "OPD-  ";	 
   echo $row43['COUNT(pmrn)'];
   
   
   //echo " , ";	 
   
   echo "<br>";
   
   echo "IPD(OPD)-  ";	 
   echo $row44['COUNT(pmrn)'];
   echo " ,IPD(Through Emergency)-  ";	 
   echo $row44e['COUNT(pmrn)'];
   
   echo " ,IPD(Total)-  ";	 
   echo $row44['COUNT(pmrn)'] +$row44e['COUNT(pmrn)'];
   
   //echo " , ";	 
   echo "<br>";
   
   echo "A&E-  ";	 
   echo $row45['COUNT(pmrn)'];
   //echo " , ";	
   
   echo "<br>"; 
   echo "OT-  ";	 
   echo $row46['COUNT(pmrn)'];
   //echo " , ";	
   
   echo "<br>"; 
   
   echo "Anaes (OT)-  ";	 
   echo $row46a['COUNT(pmrn)'];
   //echo " , ";	 
   
   
   echo "<br>";
   echo "Endoscopy-  ";	 
   echo $row47['COUNT(pmrn)'];
   //echo " , ";	 
   
   echo "<br>";
   echo "Anaes (Endo)-  ";	 
   echo $row47a['COUNT(pmrn)'];
   //echo " , ";	 
   
   echo "<br>";
   echo "Procedure Done (Procedure Room)-  ";	 
   echo $row48['COUNT(pmrn)'];
   echo "<br>";
   
   echo "Radiology Report Done-  ";	 
   echo $row48r['COUNT(pmrn)'];
   
   echo "<br>";
   echo "Lab Report Confirmed -  ";	 
   echo $row48l['COUNT(pmrn)'] + $row48l1['COUNT(pmrn)'] + $row48l2['COUNT(pmrn)'];
   
   
   echo "<br>";
   
   
   
   echo "ECG - ";	 
   echo $row48ecg['COUNT(pmrn)']; 
   
   echo " ,ECHO - ";	 
   echo $row48echo['COUNT(pmrn)'] ; 
   
   echo " ,ETT - ";	 
   echo $row48ett['COUNT(pmrn)'];
   
   
   echo " ,Total - ";	 
   echo $row48ecg['COUNT(pmrn)'] + $row48echo['COUNT(pmrn)'] + $row48ett['COUNT(pmrn)'];
   
   
   
   
   echo "<br>";
   
   
   
   echo "Histopathology Report Done - ";	 
   echo $histo2['COUNT(pmrn)']; 
   
   
   
   echo "<br>";
   
   
   
   echo "FNAC Report Done - ";	 
   echo $histo2f['COUNT(pmrn)']; 
   echo "<br>";
   
   echo "<font color=red font size=2><b> CONSULTANT ACTIVITIES AT A GLANCE in (BDT)  - $date77 TO $date77e";
   
   
   echo "<br>";
   echo "OPD-  ";	 
   echo $row43p['SUM(payment)'];
   echo "<br>";
   
   echo "IPD-  ";	 
   echo $row43i['SUM(charge)'];
   echo "<br>";
   
   echo "A&E-  ";	 
   echo $row43_e['SUM(visit)'];
   echo "<br>";
   
   
   echo "OT-  ";	 
   echo $row43o['SUM(charge)'];
   echo "<br>";
   
   echo "Procedure-  ";	 
   echo $row43pp['SUM(procharge)'];
   echo "<br>";
   
   echo "Endoscopy-  ";	 
   echo $row43e['SUM(room)'];
   echo "<br>";
   
   echo "ECG-  ";	 
   echo $row43ecg['COUNT(ron)']*100;
   echo "<br>";
   
   echo "ECHO 2D-  ";	 
   echo $row43ecg1['COUNT(ron)']*1000;
   
   echo "<br>";
   echo "ECHO Color Doppler-  ";	 
   echo $row43ecg2['COUNT(ron)']*1500;
   
   
   echo "<br>";
   echo "ANGIGRAM-  ";	 
   echo $row43ecg3['COUNT(ron)'];
   
   echo "<br>";
   echo "CATHLAB PROCEDURE-  ";	 
   echo $cath_sum['SUM(charge)'];
   
   echo "<br>";
   echo "Total Income-  ";	 
   echo $row43p['SUM(payment)'] + $row43i['SUM(charge)'] + $row43_e['SUM(visit)']+ $row43o['SUM(charge)'] + $row43pp['SUM(procharge)'] + $row43e['SUM(room)'] + $row43ecg['COUNT(ron)']*100 + $row43ecg1['COUNT(ron)']*1000+ $row43ecg2['COUNT(ron)']*1500+ $row43ecg3['COUNT(ron)']+$cath_sum['SUM(charge)'];
   echo " BDT";	 
   
   
   
   echo "<br>";
   echo "Total Discount-  ";	 
   echo $row43o['SUM(discount)']+ $row43o_discount['SUM(discount)'];
   
   
   echo "<br>";
   echo "Net Income-  ";	 
   echo $row43p['SUM(payment)'] + $row43i['SUM(charge)'] + $row43_e['SUM(visit)']+ $row43o['SUM(charge)'] + $row43pp['SUM(procharge)'] + $row43e['SUM(room)'] + $row43ecg['COUNT(ron)']*100 + $row43ecg1['COUNT(ron)']*1000+ $row43ecg2['COUNT(ron)']*1500+ $row43ecg3['COUNT(ron)']-$row43o['SUM(discount)']- $row43o_discount['SUM(discount)']+$cath_sum['SUM(charge)'];
   echo " BDT";	 

	}
?>

<?php

if(isset($_POST['bsearch'])){
  $user=$_SESSION["sess_username"];
  $bt=$_REQUEST["bt"];
  
  
  $date77=date('Y-m-d',strtotime($_REQUEST['stdate']));
  $date77e=date('Y-m-d',strtotime($_REQUEST['endate']));
  $date78=date('m/d/Y');
  
$sel_query1="Select * from pappnew where adate1 BETWEEN '$date77' and '$date77e' and dname='$bt' and status='SEEN'";
//SELECT SUM(payment) FROM pappnew where adate1 between '$date77' and '$date77e' and dname='$bt' and status='SEEN';"; 

 //$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";
 $count=1;
 
 $result1 = mysqli_query($con,$sel_query1);
 
 while($row1 = mysqli_fetch_assoc($result1)) 
 { ?>    <tr>
 
       <td align="center"><?php echo $count; ?></td>
       <td align="center"><?php echo $row1["pname"]; ?></td>
       <td align="center"><?php echo $row1["pmrn"]; ?>
     <td align="center"><?php echo $row1["adate1"]; ?>
       <td align="center"><?php echo $row1["payment"]; ?>
         
     
       </tr>
     
     <?php $count++; } }?>
   
  </tbody>
</table>


</form>
</body>
</html>
