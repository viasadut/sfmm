<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="adminmng"){
      header('Location: login2?err=2');
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
   <li><a href='viewnew1'><span>Home</span></a></li>
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

<h1 align="center">Monthly Endoscopic Procedure Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		



  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
//$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];

//$eid=$_REQUEST['eid'];
$dd=date('m/d/Y');
$query2 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data4 = mysqli_fetch_array($query4);

$query5 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data5 = mysqli_fetch_array($query5);

$query6 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data6 = mysqli_fetch_array($query6);

$query7 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data7 = mysqli_fetch_array($query7);


$sum1=$data2['count(*)']+$data3['count(*)']+$data4['count(*)']+$data5['count(*)']+$data6['count(*)']+$data7['count(*)'];


$query8 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data8 = mysqli_fetch_array($query8);

$query9 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data9 = mysqli_fetch_array($query9);

$query10 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data10 = mysqli_fetch_array($query10);

$query11 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data11 = mysqli_fetch_array($query11);

$query12 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data12 = mysqli_fetch_array($query12);

$query13 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data13 = mysqli_fetch_array($query13);


$sum2=$data8['count(*)']+$data9['count(*)']+$data10['count(*)']+$data11['count(*)']+$data12['count(*)']+$data13['count(*)'];


$query14 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data14 = mysqli_fetch_array($query14);

$query15 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data15 = mysqli_fetch_array($query15);

$query16 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data16 = mysqli_fetch_array($query16);

$query17 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data17 = mysqli_fetch_array($query17);

$query18 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data18 = mysqli_fetch_array($query18);

$query19 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data19 = mysqli_fetch_array($query19);



$sum3=$data14['count(*)']+$data15['count(*)']+$data16['count(*)']+$data17['count(*)']+$data18['count(*)']+$data19['count(*)'];


$query118 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data118 = mysqli_fetch_array($query118);

$query119 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data119 = mysqli_fetch_array($query119);

$query20 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data20 = mysqli_fetch_array($query20);


$query21 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data21 = mysqli_fetch_array($query21);

$query22 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data22 = mysqli_fetch_array($query22);

$query23 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data23 = mysqli_fetch_array($query23);



$sum4=$data118['count(*)']+$data119['count(*)']+$data20['count(*)']+$data21['count(*)']+$data22['count(*)']+$data23['count(*)'];


$query24 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data24 = mysqli_fetch_array($query24);

$query25 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='FLEXIBLE CYSTOSCOPY UNDER LA' and rdate BETWEEN '$start' and '$end'" );
$data25 = mysqli_fetch_array($query25);

$query26 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data26 = mysqli_fetch_array($query26);


$query27 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data27 = mysqli_fetch_array($query27);

$query28 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data28 = mysqli_fetch_array($query28);

$query29 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data29 = mysqli_fetch_array($query29);





$sum5=$data24['count(*)']+$data25['count(*)']+$data26['count(*)']+$data27['count(*)']+$data28['count(*)']+$data29['count(*)'];


$query30 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data30 = mysqli_fetch_array($query30);

$query31 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data31 = mysqli_fetch_array($query31);

$query32 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data32 = mysqli_fetch_array($query32);


$query33 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data33 = mysqli_fetch_array($query33);

$query34 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data34 = mysqli_fetch_array($query34);

$query35 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data35 = mysqli_fetch_array($query35);



$sum6=$data30['count(*)']+$data31['count(*)']+$data32['count(*)']+$data33['count(*)']+$data33['count(*)']+$data35['count(*)'];


$query36 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data36 = mysqli_fetch_array($query36);

$query37 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data37 = mysqli_fetch_array($query37);

$query38 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data38 = mysqli_fetch_array($query38);


$query39 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data39 = mysqli_fetch_array($query39);

$query40 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data40 = mysqli_fetch_array($query40);

$query41 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data41 = mysqli_fetch_array($query41);



$sum7=$data36['count(*)']+$data37['count(*)']+$data38['count(*)']+$data39['count(*)']+$data40['count(*)']+$data41['count(*)'];


$query42 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data42 = mysqli_fetch_array($query42);

$query43 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data43 = mysqli_fetch_array($query43);

$query44 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data44 = mysqli_fetch_array($query44);


$query45 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data45 = mysqli_fetch_array($query45);

$query46 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data46 = mysqli_fetch_array($query46);

$query47 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data47 = mysqli_fetch_array($query47);



$sum8=$data42['count(*)']+$data43['count(*)']+$data44['count(*)']+$data45['count(*)']+$data46['count(*)']+$data47['count(*)'];

$query48 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data48 = mysqli_fetch_array($query48);

$query49 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data49 = mysqli_fetch_array($query49);

$query50 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data50 = mysqli_fetch_array($query50);


$query51 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data51 = mysqli_fetch_array($query51);

$query52 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data52 = mysqli_fetch_array($query52);

$query53 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data53 = mysqli_fetch_array($query53);



$sum9=$data48['count(*)']+$data49['count(*)']+$data50['count(*)']+$data51['count(*)']+$data52['count(*)']+$data53['count(*)'];



$query54 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data54 = mysqli_fetch_array($query54);

$query55 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data55 = mysqli_fetch_array($query55);

$query56 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data56 = mysqli_fetch_array($query56);


$query57 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data57 = mysqli_fetch_array($query57);

$query58 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data58 = mysqli_fetch_array($query58);

$query59 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data59 = mysqli_fetch_array($query59);



$sum10=$data54['count(*)']+$data55['count(*)']+$data56['count(*)']+$data57['count(*)']+$data58['count(*)']+$data59['count(*)'];



$query60 = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='EVL' and date1 BETWEEN '$start' and '$end'" );
$data60 = mysqli_fetch_array($query60);

$query61 = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='EVL' and date1 BETWEEN '$start' and '$end'" );
$data61 = mysqli_fetch_array($query61);

$query62 = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='EVL' and date1 BETWEEN '$start' and '$end'" );
$data62 = mysqli_fetch_array($query62);


$query63 = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='EVL' and date1 BETWEEN '$start' and '$end'" );
$data63 = mysqli_fetch_array($query63);

$query64 = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='EVL' and date1 BETWEEN '$start' and '$end'" );
$data64 = mysqli_fetch_array($query64);

$query65 = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='EVL' and date1 BETWEEN '$start' and '$end'" );
$data65 = mysqli_fetch_array($query65);



$sum11=$data60['count(*)']+$data61['count(*)']+$data62['count(*)']+$data63['count(*)']+$data64['count(*)']+$data65['count(*)'];



$query66 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data66 = mysqli_fetch_array($query66);

$query67 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data67 = mysqli_fetch_array($query67);

$query68 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='EDUDONOSCOPYVL' and rdate BETWEEN '$start' and '$end'" );
$data68 = mysqli_fetch_array($query68);


$query69 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data69 = mysqli_fetch_array($query69);

$query70 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data70 = mysqli_fetch_array($query70);

$query71 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data71 = mysqli_fetch_array($query71);



$sum12=$data66['count(*)']+$data67['count(*)']+$data68['count(*)']+$data69['count(*)']+$data70['count(*)']+$data71['count(*)'];



$query74 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohammad Sana Ullah Sarker' and type='BRONCHOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data74 = mysqli_fetch_array($query74);







$query42a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data42a = mysqli_fetch_array($query42a);

$query43a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data43a = mysqli_fetch_array($query43a);

$query44a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data44a = mysqli_fetch_array($query44a);


$query45a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data45a = mysqli_fetch_array($query45a);

$query46a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data46a = mysqli_fetch_array($query46a);

$query47a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data47a = mysqli_fetch_array($query47a);



$sum8a=$data42a['count(*)']+$data43a['count(*)']+$data44a['count(*)']+$data45a['count(*)']+$data46a['count(*)']+$data47a['count(*)'];




$query42b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data42b = mysqli_fetch_array($query42b);

$query43b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data43b = mysqli_fetch_array($query43b);

$query44b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data44b = mysqli_fetch_array($query44b);


$query45b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data45b = mysqli_fetch_array($query45b);

$query46b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data46b = mysqli_fetch_array($query46b);

$query47b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data47b = mysqli_fetch_array($query47b);



$sum8b=$data42b['count(*)']+$data43b['count(*)']+$data44b['count(*)']+$data45b['count(*)']+$data46b['count(*)']+$data47b['count(*)'];




$query42c = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Ploypectomy' and date1 BETWEEN '$start' and '$end'" );
$data42c = mysqli_fetch_array($query42c);

$query43c = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Ploypectomy' and date1 BETWEEN '$start' and '$end'" );
$data43c = mysqli_fetch_array($query43c);

$query44c = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Ploypectomy' and date1 BETWEEN '$start' and '$end'" );
$data44c = mysqli_fetch_array($query44c);


$query45c = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Ploypectomy' and date1 BETWEEN '$start' and '$end'" );
$data45c = mysqli_fetch_array($query45c);

$query46c = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Ploypectomy' and date1 BETWEEN '$start' and '$end'" );
$data46c = mysqli_fetch_array($query46c);

$query47c = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Ploypectomy' and date1 BETWEEN '$start' and '$end'" );
$data47c = mysqli_fetch_array($query47c);



$sum8c=$data42c['count(*)']+$data43c['count(*)']+$data44c['count(*)']+$data45c['count(*)']+$data46c['count(*)']+$data47c['count(*)'];



$query42d = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Dilatation' and date1 BETWEEN '$start' and '$end'" );
$data42d = mysqli_fetch_array($query42d);

$query43d = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Dilatation' and date1 BETWEEN '$start' and '$end'" );
$data43d = mysqli_fetch_array($query43d);

$query44d = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Dilatation' and date1 BETWEEN '$start' and '$end'" );
$data44d = mysqli_fetch_array($query44d);


$query45d = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Dilatation' and date1 BETWEEN '$start' and '$end'" );
$data45d = mysqli_fetch_array($query45d);

$query46d = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Dilatation' and date1 BETWEEN '$start' and '$end'" );
$data46d = mysqli_fetch_array($query46d);

$query47d = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Dilatation' and date1 BETWEEN '$start' and '$end'" );
$data47d = mysqli_fetch_array($query47d);



$sum8d=$data42d['count(*)']+$data43d['count(*)']+$data44d['count(*)']+$data45d['count(*)']+$data46d['count(*)']+$data47d['count(*)'];


$query42e = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Early GI cancer screening' and date1 BETWEEN '$start' and '$end'" );
$data42e = mysqli_fetch_array($query42e);

$query43e = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Early GI cancer screening' and date1 BETWEEN '$start' and '$end'" );
$data43e = mysqli_fetch_array($query43e);

$query44e = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Early GI cancer screening' and date1 BETWEEN '$start' and '$end'" );
$data44e = mysqli_fetch_array($query44e);


$query45e = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Early GI cancer screening' and date1 BETWEEN '$start' and '$end'" );
$data45e = mysqli_fetch_array($query45e);

$query46e = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Early GI cancer screening' and date1 BETWEEN '$start' and '$end'" );
$data46e = mysqli_fetch_array($query46e);

$query47e = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Early GI cancer screening' and date1 BETWEEN '$start' and '$end'" );
$data47e = mysqli_fetch_array($query47e);



$sum8e=$data42e['count(*)']+$data43e['count(*)']+$data44e['count(*)']+$data45e['count(*)']+$data46e['count(*)']+$data47e['count(*)'];



$query42f = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Oesophageal pneumatic balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data42f = mysqli_fetch_array($query42f);

$query43f = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Oesophageal pneumatic balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data43f = mysqli_fetch_array($query43f);

$query44f = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Oesophageal pneumatic balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data44f = mysqli_fetch_array($query44f);


$query45f = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Oesophageal pneumatic balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data45f = mysqli_fetch_array($query45f);

$query46f = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Oesophageal pneumatic balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data46f = mysqli_fetch_array($query46f);

$query47f = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Oesophageal pneumatic balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data47f = mysqli_fetch_array($query47f);



$sum8f=$data42f['count(*)']+$data43f['count(*)']+$data44f['count(*)']+$data45f['count(*)']+$data46f['count(*)']+$data47f['count(*)'];


$query42g = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Oesophageal CRE balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data42g = mysqli_fetch_array($query42g);

$query43g = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Oesophageal CRE balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data43g = mysqli_fetch_array($query43g);

$query44g = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Oesophageal CRE balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data44g = mysqli_fetch_array($query44g);


$query45g = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Oesophageal CRE balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data45g = mysqli_fetch_array($query45g);

$query46g = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Oesophageal CRE balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data46g = mysqli_fetch_array($query46g);

$query47g = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Oesophageal CRE balloon dilation' and date1 BETWEEN '$start' and '$end'" );
$data47g = mysqli_fetch_array($query47g);



$sum8g=$data42g['count(*)']+$data43g['count(*)']+$data44g['count(*)']+$data45g['count(*)']+$data46g['count(*)']+$data47g['count(*)'];



$query42h = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Foreign body removal' and date1 BETWEEN '$start' and '$end'" );
$data42h= mysqli_fetch_array($query42h);

$query43h = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Foreign body removal' and date1 BETWEEN '$start' and '$end'" );
$data43h = mysqli_fetch_array($query43h);

$query44h = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Foreign body removal' and date1 BETWEEN '$start' and '$end'" );
$data44h = mysqli_fetch_array($query44h);


$query45h = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Foreign body removal' and date1 BETWEEN '$start' and '$end'" );
$data45h = mysqli_fetch_array($query45h);

$query46h = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Foreign body removal' and date1 BETWEEN '$start' and '$end'" );
$data46h = mysqli_fetch_array($query46h);

$query47h = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Foreign body removal' and date1 BETWEEN '$start' and '$end'" );
$data47h = mysqli_fetch_array($query47h);



$sum8h=$data42h['count(*)']+$data43h['count(*)']+$data44h['count(*)']+$data45h['count(*)']+$data46h['count(*)']+$data47h['count(*)'];


$query42i = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='ESD' and date1 BETWEEN '$start' and '$end'" );
$data42i= mysqli_fetch_array($query42i);

$query43i = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='ESD' and date1 BETWEEN '$start' and '$end'" );
$data43i = mysqli_fetch_array($query43i);

$query44i = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='ESD' and date1 BETWEEN '$start' and '$end'" );
$data44i = mysqli_fetch_array($query44i);


$query45i = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='ESD' and date1 BETWEEN '$start' and '$end'" );
$data45i = mysqli_fetch_array($query45i);

$query46i = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='ESD' and date1 BETWEEN '$start' and '$end'" );
$data46i = mysqli_fetch_array($query46i);

$query47i = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='ESD' and date1 BETWEEN '$start' and '$end'" );
$data47i = mysqli_fetch_array($query47i);



$sum8i=$data42i['count(*)']+$data43i['count(*)']+$data44i['count(*)']+$data45i['count(*)']+$data46i['count(*)']+$data47i['count(*)'];


$query42j = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='EMR' and date1 BETWEEN '$start' and '$end'" );
$data42j= mysqli_fetch_array($query42j);

$query43j = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='EMR' and date1 BETWEEN '$start' and '$end'" );
$data43j = mysqli_fetch_array($query43j);

$query44j = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='EMR' and date1 BETWEEN '$start' and '$end'" );
$data44j = mysqli_fetch_array($query44j);


$query45j = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='EMR' and date1 BETWEEN '$start' and '$end'" );
$data45j = mysqli_fetch_array($query45j);

$query46j = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='EMR' and date1 BETWEEN '$start' and '$end'" );
$data46j = mysqli_fetch_array($query46j);

$query47j = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='EMR' and date1 BETWEEN '$start' and '$end'" );
$data47j = mysqli_fetch_array($query47j);



$sum8j=$data42j['count(*)']+$data43j['count(*)']+$data44j['count(*)']+$data45j['count(*)']+$data46j['count(*)']+$data47j['count(*)'];





$query42k = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Brush cytology' and date1 BETWEEN '$start' and '$end'" );
$data42k= mysqli_fetch_array($query42k);

$query43k = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Brush cytology' and date1 BETWEEN '$start' and '$end'" );
$data43k = mysqli_fetch_array($query43k);

$query44k = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Brush cytology' and date1 BETWEEN '$start' and '$end'" );
$data44k = mysqli_fetch_array($query44k);


$query45k = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Brush cytology' and date1 BETWEEN '$start' and '$end'" );
$data45k = mysqli_fetch_array($query45k);

$query46k = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Brush cytology' and date1 BETWEEN '$start' and '$end'" );
$data46k = mysqli_fetch_array($query46k);

$query47k = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Brush cytology' and date1 BETWEEN '$start' and '$end'" );
$data47k = mysqli_fetch_array($query47k);



$sum8k=$data42k['count(*)']+$data43k['count(*)']+$data44k['count(*)']+$data45k['count(*)']+$data46k['count(*)']+$data47k['count(*)'];



$query42l = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Stenting' and date1 BETWEEN '$start' and '$end'" );
$data42l= mysqli_fetch_array($query42l);

$query43l = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Stenting' and date1 BETWEEN '$start' and '$end'" );
$data43l = mysqli_fetch_array($query43l);

$query44l = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Stenting' and date1 BETWEEN '$start' and '$end'" );
$data44l = mysqli_fetch_array($query44l);


$query45l = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Stenting' and date1 BETWEEN '$start' and '$end'" );
$data45l = mysqli_fetch_array($query45l);

$query46l = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Stenting' and date1 BETWEEN '$start' and '$end'" );
$data46l = mysqli_fetch_array($query46l);

$query47l = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Stenting' and date1 BETWEEN '$start' and '$end'" );
$data47l = mysqli_fetch_array($query47l);



$sum8l=$data42l['count(*)']+$data43l['count(*)']+$data44l['count(*)']+$data45l['count(*)']+$data46l['count(*)']+$data47l['count(*)'];



$query42m = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Biopsy' and date1 BETWEEN '$start' and '$end'" );
$data42m= mysqli_fetch_array($query42m);

$query43m = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Biopsy' and date1 BETWEEN '$start' and '$end'" );
$data43m = mysqli_fetch_array($query43m);

$query44m = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Biopsy' and date1 BETWEEN '$start' and '$end'" );
$data44m = mysqli_fetch_array($query44m);


$query45m = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Biopsy' and date1 BETWEEN '$start' and '$end'" );
$data45m = mysqli_fetch_array($query45m);

$query46m = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Biopsy' and date1 BETWEEN '$start' and '$end'" );
$data46m = mysqli_fetch_array($query46m);

$query47m = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Biopsy' and date1 BETWEEN '$start' and '$end'" );
$data47m = mysqli_fetch_array($query47m);



$sum8m=$data42m['count(*)']+$data43m['count(*)']+$data44m['count(*)']+$data45m['count(*)']+$data46m['count(*)']+$data47m['count(*)'];



$query42n = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='TBNA' and date1 BETWEEN '$start' and '$end'" );
$data42n= mysqli_fetch_array($query42n);

$query43n = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='TBNA' and date1 BETWEEN '$start' and '$end'" );
$data43n = mysqli_fetch_array($query43n);

$query44n = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='TBNA' and date1 BETWEEN '$start' and '$end'" );
$data44n = mysqli_fetch_array($query44n);


$query45n = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='TBNA' and date1 BETWEEN '$start' and '$end'" );
$data45n = mysqli_fetch_array($query45n);

$query46n = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='TBNA' and date1 BETWEEN '$start' and '$end'" );
$data46n = mysqli_fetch_array($query46n);

$query47n = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='TBNA' and date1 BETWEEN '$start' and '$end'" );
$data47n = mysqli_fetch_array($query47n);



$sum8n=$data42n['count(*)']+$data43n['count(*)']+$data44n['count(*)']+$data45n['count(*)']+$data46n['count(*)']+$data47n['count(*)'];



$query42o = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Indwelling Pleural Catheter' and date1 BETWEEN '$start' and '$end'" );
$data42o= mysqli_fetch_array($query42o);

$query43o = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Indwelling Pleural Catheter' and date1 BETWEEN '$start' and '$end'" );
$data43o = mysqli_fetch_array($query43o);

$query44o = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Indwelling Pleural Catheter' and date1 BETWEEN '$start' and '$end'" );
$data44o = mysqli_fetch_array($query44o);


$query45o = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Indwelling Pleural Catheter' and date1 BETWEEN '$start' and '$end'" );
$data45o = mysqli_fetch_array($query45o);

$query46o = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Indwelling Pleural Catheter' and date1 BETWEEN '$start' and '$end'" );
$data46o = mysqli_fetch_array($query46o);

$query47o = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Indwelling Pleural Catheter' and date1 BETWEEN '$start' and '$end'" );
$data47o = mysqli_fetch_array($query47o);



$sum8o=$data42o['count(*)']+$data43o['count(*)']+$data44o['count(*)']+$data45o['count(*)']+$data46o['count(*)']+$data47o['count(*)'];




$query42p = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Razeeb Hassan' and medi='Electrocautery Of Angiodysplasia' and date1 BETWEEN '$start' and '$end'" );
$data42p= mysqli_fetch_array($query42p);

$query43p = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranen Biswas' and medi='Electrocautery Of Angiodysplasia' and date1 BETWEEN '$start' and '$end'" );
$data43p = mysqli_fetch_array($query43p);

$query44p = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. J.M.H Qausar Alam' and medi='Electrocautery Of Angiodysplasia' and date1 BETWEEN '$start' and '$end'" );
$data44p = mysqli_fetch_array($query44p);


$query45p = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Md. Abbas Uddin' and medi='Electrocautery Of Angiodysplasia' and date1 BETWEEN '$start' and '$end'" );
$data45p = mysqli_fetch_array($query45p);

$query46p = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Ranjit Kumar Rudra' and medi='Electrocautery Of Angiodysplasia' and date1 BETWEEN '$start' and '$end'" );
$data46p = mysqli_fetch_array($query46p);

$query47p = mysqli_query($link,"Select dname,count(*) from addtherapeutic where dname='Dr. Chowdhury Mohammed Anwar Parvez' and medi='Electrocautery Of Angiodysplasia' and date1 BETWEEN '$start' and '$end'" );
$data47p = mysqli_fetch_array($query47p);



$sum8p=$data42p['count(*)']+$data43p['count(*)']+$data44p['count(*)']+$data45p['count(*)']+$data46p['count(*)']+$data47p['count(*)'];







$query42q = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohammad Sana Ullah Sarker' and type='Pleuroscopy' and rdate BETWEEN '$start' and '$end'" );
$data42q= mysqli_fetch_array($query42q);



$sum8q=$data42q['count(*)'];


$query42r = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohammad Sana Ullah Sarker' and type='TBNA' and rdate BETWEEN '$start' and '$end'" );
$data42r= mysqli_fetch_array($query42r);



$sum8r=$data42r['count(*)'];



$i1=$data2['count(*)']+$data8['count(*)']+$data14['count(*)']+$data118['count(*)']+$data24['count(*)']+$data30['count(*)']+$data36['count(*)']+$data42['count(*)']+$data48['count(*)']+$data54['count(*)']+$data60['count(*)']+$data66['count(*)']+$data42c['count(*)']+$data42d['count(*)']+$data42e['count(*)']+$data42f['count(*)']+$data42g['count(*)']+$data42h['count(*)']+$data42i['count(*)']+$data42j['count(*)']+$data42k['count(*)']+$data42l['count(*)']+$data42m['count(*)']+$data42n['count(*)']+$data42o['count(*)']+$data42a['count(*)']+$data42b['count(*)']+$data42p['count(*)'];
$i2=$data15['count(*)']+$data9['count(*)']+$data3['count(*)']+$data119['count(*)']+$data25['count(*)']+$data31['count(*)']+$data37['count(*)']+$data43['count(*)']+$data49['count(*)']+$data55['count(*)']+$data61['count(*)']+$data67['count(*)']+$data43c['count(*)']+$data43d['count(*)']+$data43e['count(*)']+$data43f['count(*)']+$data43g['count(*)']+$data43h['count(*)']+$data43i['count(*)']+$data43j['count(*)']+$data43k['count(*)']+$data43l['count(*)']+$data43m['count(*)']+$data43n['count(*)']+$data43o['count(*)']+$data43a['count(*)']+$data43b['count(*)']+$data43p['count(*)'];
$i3=$data16['count(*)']+$data10['count(*)']+$data4['count(*)']+$data20['count(*)']+$data26['count(*)']+$data32['count(*)']+$data38['count(*)']+$data44['count(*)']+$data50['count(*)']+$data56['count(*)']+$data62['count(*)']+$data68['count(*)']+$data44c['count(*)']+$data44d['count(*)']+$data44e['count(*)']+$data44f['count(*)']+$data44g['count(*)']+$data44h['count(*)']+$data44i['count(*)']+$data44j['count(*)']+$data44k['count(*)']+$data44l['count(*)']+$data44m['count(*)']+$data44n['count(*)']+$data44o['count(*)']+$data44a['count(*)']+$data44b['count(*)']+$data44p['count(*)'];
$i4=$data18['count(*)']+$data12['count(*)']+$data6['count(*)']+$data21['count(*)']+$data27['count(*)']+$data33['count(*)']+$data39['count(*)']+$data45['count(*)']+$data51['count(*)']+$data57['count(*)']+$data63['count(*)']+$data69['count(*)']+$data45c['count(*)']+$data45d['count(*)']+$data45e['count(*)']+$data45f['count(*)']+$data45g['count(*)']+$data45h['count(*)']+$data45i['count(*)']+$data45j['count(*)']+$data45k['count(*)']+$data45l['count(*)']+$data45m['count(*)']+$data45n['count(*)']+$data45o['count(*)']+$data45a['count(*)']+$data45b['count(*)']+$data45p['count(*)'];
$i5=$data19['count(*)']+$data13['count(*)']+$data7['count(*)']+$data22['count(*)']+$data28['count(*)']+$data34['count(*)']+$data40['count(*)']+$data46['count(*)']+$data52['count(*)']+$data58['count(*)']+$data64['count(*)']+$data70['count(*)']+$data46c['count(*)']+$data46d['count(*)']+$data46e['count(*)']+$data46f['count(*)']+$data46g['count(*)']+$data46h['count(*)']+$data46i['count(*)']+$data46j['count(*)']+$data46k['count(*)']+$data46l['count(*)']+$data46m['count(*)']+$data46n['count(*)']+$data46o['count(*)']+$data46a['count(*)']+$data46b['count(*)']+$data46p['count(*)'];
$i6=$data17['count(*)']+$data11['count(*)']+$data5['count(*)']+$data23['count(*)']+$data29['count(*)']+$data35['count(*)']+$data41['count(*)']+$data47['count(*)']+$data53['count(*)']+$data59['count(*)']+$data65['count(*)']+$data71['count(*)']+$data47c['count(*)']+$data47d['count(*)']+$data47e['count(*)']+$data47f['count(*)']+$data47g['count(*)']+$data47h['count(*)']+$data47i['count(*)']+$data47j['count(*)']+$data47k['count(*)']+$data47l['count(*)']+$data47m['count(*)']+$data47n['count(*)']+$data47o['count(*)']+$data47a['count(*)']+$data47b['count(*)']+$data47p['count(*)'];
$gsum=$sum1+$sum2+$sum3+$sum4+$sum5+$sum6+$sum7+$sum8+$sum9+$sum10+$sum11+$sum12+$data74['count(*)']+$sum8a+$sum8b+$sum8c+$sum8d+$sum8e+$sum8f+$sum8g+$sum8h+$sum8i+$sum8j+$sum8k+$sum8l+$sum8m+$sum8n+$sum8o+$sum8p+$sum8q+$sum8r;










//$date1=date_create("$start");
//$date2=date_create("$end");
//$diff=date_diff($date1,$date2);
//echo $diff->format("%R%a days");


$count=1;
$sel_query="Select type,dname,count(*) from endoreport where rdate BETWEEN '$start' and '$end' group by dname, type order by type";


$result = mysqli_query($con,$sel_query);

$row = mysqli_fetch_assoc($result);

echo "<font color=blue font size=5> Total Record found in the search  -";

echo " ,  From  ";
echo date('d/m/Y',strtotime($_REQUEST["stdate"]));
echo "  To  ";
echo date('d/m/Y',strtotime($_REQUEST["endate"]));

 ?>   

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Name Of The Procedure</strong></th>
      <th width="10%"><strong>Dr. Razeeb</strong></th>
      <th width="15%"><strong>Dr. Ranen </strong>
      <th width="14%"><strong>Dr. Qausar</strong>   
      <th width="14%"><strong>Dr. Abbas</strong>
	  <th width="14%"><strong>Dr. Ranjit</strong>
      <th width="14%"><strong>Dr. Parvez</strong>
	  <th width="14%"><strong>Dr. Sanaullah</strong>
	  <th width="14%"><strong>Total</strong>

	   </tr>
  </thead>
  <tbody>


 <tr>

      <td align="center"><?php echo "1"; ?></td>
      <td align="center"><strong>Endoscopy</strong></td>
	  <td align="center"><?php echo $data2["count(*)"]; ?>  
	  <td align="center"><?php echo $data3["count(*)"]; ?> 
	  <td align="center"><?php echo $data4["count(*)"]; ?> 
	  <td align="center"><?php echo $data6["count(*)"]; ?> 
	  <td align="center"><?php echo $data7["count(*)"]; ?> 
	  <td align="center"><?php echo $data5["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum1"; ?>  
	  
      </tr>
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Colonoscopy</strong></td>
	  <td align="center"><?php echo $data8["count(*)"]; ?>  
	  <td align="center"><?php echo $data9["count(*)"]; ?> 
	  <td align="center"><?php echo $data10["count(*)"]; ?> 
	  <td align="center"><?php echo $data12["count(*)"]; ?> 
	  <td align="center"><?php echo $data13["count(*)"]; ?> 
	  <td align="center"><?php echo $data11["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum2"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "3"; ?></td>
      <td align="center"><strong>Sigmoidoscopy</strong></td>
	  <td align="center"><?php echo $data14["count(*)"]; ?>  
	  <td align="center"><?php echo $data15["count(*)"]; ?> 
	  <td align="center"><?php echo $data16["count(*)"]; ?> 
	  <td align="center"><?php echo $data18["count(*)"]; ?> 
	  <td align="center"><?php echo $data19["count(*)"]; ?> 
	  <td align="center"><?php echo $data17["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum3"; ?>  
	  
      </tr>
	  
	   <tr>

      <td align="center"><?php echo "4"; ?></td>
      <td align="center"><strong>ENDOSCOPY AND COLONOSCOPY</strong></td>
	  <td align="center"><?php echo $data42a["count(*)"]; ?>  
	  <td align="center"><?php echo $data43a["count(*)"]; ?> 
	  <td align="center"><?php echo $data44a["count(*)"]; ?> 
	  <td align="center"><?php echo $data45a["count(*)"]; ?> 
	  <td align="center"><?php echo $data46a["count(*)"]; ?> 
	  <td align="center"><?php echo $data47a["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8a"; ?>  
	  
      </tr>
	  
	   <tr>

      <td align="center"><?php echo "5"; ?></td>
      <td align="center"><strong>ENDOSCOPY AND SIGMOIDOSCOPY</strong></td>
	   <td align="center"><?php echo $data42b["count(*)"]; ?>  
	  <td align="center"><?php echo $data43b["count(*)"]; ?> 
	  <td align="center"><?php echo $data44b["count(*)"]; ?> 
	  <td align="center"><?php echo $data45b["count(*)"]; ?> 
	  <td align="center"><?php echo $data46b["count(*)"]; ?> 
	  <td align="center"><?php echo $data47b["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8b"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "6"; ?></td>
      <td align="center"><strong>Polypectomy</strong></td>
	  <td align="center"><?php echo $data118["count(*)"]; ?>  
	  <td align="center"><?php echo $data119["count(*)"]; ?> 
	  <td align="center"><?php echo $data20["count(*)"]; ?> 
	  <td align="center"><?php echo $data21["count(*)"]; ?> 
	  <td align="center"><?php echo $data22["count(*)"]; ?> 
	  <td align="center"><?php echo $data23["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum4"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "7"; ?></td>
      <td align="center"><strong>Cystoscopy</strong></td>
	  <td align="center"><?php echo $data24["count(*)"]; ?>  
	  <td align="center"><?php echo $data25["count(*)"]; ?> 
	  <td align="center"><?php echo $data26["count(*)"]; ?> 
	  <td align="center"><?php echo $data27["count(*)"]; ?> 
	  <td align="center"><?php echo $data28["count(*)"]; ?> 
	  <td align="center"><?php echo $data29["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum5"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "8"; ?></td>
      <td align="center"><strong>DJ. Stent Remove</strong></td>
	  <td align="center"><?php echo $data30["count(*)"]; ?>  
	  <td align="center"><?php echo $data31["count(*)"]; ?> 
	  <td align="center"><?php echo $data32["count(*)"]; ?> 
	  <td align="center"><?php echo $data33["count(*)"]; ?> 
	  <td align="center"><?php echo $data34["count(*)"]; ?> 
	  <td align="center"><?php echo $data35["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum6"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "9"; ?></td>
      <td align="center"><strong>F.B. Remove</strong></td>
	  <td align="center"><?php echo $data36["count(*)"]; ?>  
	  <td align="center"><?php echo $data37["count(*)"]; ?> 
	  <td align="center"><?php echo $data38["count(*)"]; ?> 
	  <td align="center"><?php echo $data39["count(*)"]; ?> 
	  <td align="center"><?php echo $data40["count(*)"]; ?> 
	  <td align="center"><?php echo $data41["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum7"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "10"; ?></td>
      <td align="center"><strong>FOL</strong></td>
	  <td align="center"><?php echo $data42["count(*)"]; ?>  
	  <td align="center"><?php echo $data43["count(*)"]; ?> 
	  <td align="center"><?php echo $data44["count(*)"]; ?> 
	  <td align="center"><?php echo $data45["count(*)"]; ?> 
	  <td align="center"><?php echo $data46["count(*)"]; ?> 
	  <td align="center"><?php echo $data47["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "11"; ?></td>
      <td align="center"><strong>Uroflowmetry</strong></td>
	  <td align="center"><?php echo $data48["count(*)"]; ?>  
	  <td align="center"><?php echo $data49["count(*)"]; ?> 
	  <td align="center"><?php echo $data50["count(*)"]; ?> 
	  <td align="center"><?php echo $data51["count(*)"]; ?> 
	  <td align="center"><?php echo $data52["count(*)"]; ?> 
	  <td align="center"><?php echo $data53["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum9"; ?>  
	  
      </tr>
	  <tr>

      <td align="center"><?php echo "12"; ?></td>
      <td align="center"><strong>ERCP Screening</strong></td>
	  <td align="center"><?php echo $data54["count(*)"]; ?>  
	  <td align="center"><?php echo $data55["count(*)"]; ?> 
	  <td align="center"><?php echo $data56["count(*)"]; ?> 
	  <td align="center"><?php echo $data57["count(*)"]; ?> 
	  <td align="center"><?php echo $data58["count(*)"]; ?> 
	  <td align="center"><?php echo $data59["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum10"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "13"; ?></td>
      <td align="center"><strong>EVL</strong></td>
	  <td align="center"><?php echo $data60["count(*)"]; ?>  
	  <td align="center"><?php echo $data61["count(*)"]; ?> 
	  <td align="center"><?php echo $data62["count(*)"]; ?> 
	  <td align="center"><?php echo $data63["count(*)"]; ?> 
	  <td align="center"><?php echo $data64["count(*)"]; ?> 
	  <td align="center"><?php echo $data65["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum11"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "14"; ?></td>
      <td align="center"><strong>Dudonoscopy</strong></td>
	  <td align="center"><?php echo $data66["count(*)"]; ?>  
	  <td align="center"><?php echo $data67["count(*)"]; ?> 
	  <td align="center"><?php echo $data68["count(*)"]; ?> 
	  <td align="center"><?php echo $data69["count(*)"]; ?> 
	  <td align="center"><?php echo $data70["count(*)"]; ?> 
	  <td align="center"><?php echo $data71["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum12"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "15"; ?></td>
      <td align="center"><strong>Bronronchoscopy</strong></td>
	  <td align="center"><?php echo $data66["count(*)"]; ?>  
	  <td align="center"><?php echo $data67["count(*)"]; ?> 
	  <td align="center"><?php echo $data68["count(*)"]; ?> 
	  <td align="center"><?php echo $data69["count(*)"]; ?> 
	  <td align="center"><?php echo $data70["count(*)"]; ?> 
	  <td align="center"><?php echo $data71["count(*)"]; ?> 
	  <td align="center"><?php echo $data74["count(*)"]; ?> 
	  
	  <td align="center"><?php echo $data74["count(*)"]; ?> 
	  
      </tr>
	  
	  
	  
	  
	   <tr>

      <td align="center"><?php echo "16"; ?></td>
      <td align="center"><strong>Ploypectomy</strong></td>
	   <td align="center"><?php echo $data42c["count(*)"]; ?>  
	  <td align="center"><?php echo $data43c["count(*)"]; ?> 
	  <td align="center"><?php echo $data44c["count(*)"]; ?> 
	  <td align="center"><?php echo $data45c["count(*)"]; ?> 
	  <td align="center"><?php echo $data46c["count(*)"]; ?> 
	  <td align="center"><?php echo $data47c["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8c"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "17"; ?></td>
      <td align="center"><strong>Dilatation</strong></td>
	   <td align="center"><?php echo $data42d["count(*)"]; ?>  
	  <td align="center"><?php echo $data43d["count(*)"]; ?> 
	  <td align="center"><?php echo $data44d["count(*)"]; ?> 
	  <td align="center"><?php echo $data45d["count(*)"]; ?> 
	  <td align="center"><?php echo $data46d["count(*)"]; ?> 
	  <td align="center"><?php echo $data47d["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8d"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "18"; ?></td>
      <td align="center"><strong>Early GI cancer screening</strong></td>
	   <td align="center"><?php echo $data42e["count(*)"]; ?>  
	  <td align="center"><?php echo $data43e["count(*)"]; ?> 
	  <td align="center"><?php echo $data44e["count(*)"]; ?> 
	  <td align="center"><?php echo $data45e["count(*)"]; ?> 
	  <td align="center"><?php echo $data46e["count(*)"]; ?> 
	  <td align="center"><?php echo $data47e["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8e"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "19"; ?></td>
      <td align="center"><strong>Oesophageal pneumatic Balloon Dilation</strong></td>
	   <td align="center"><?php echo $data42f["count(*)"]; ?>  
	  <td align="center"><?php echo $data43f["count(*)"]; ?> 
	  <td align="center"><?php echo $data44f["count(*)"]; ?> 
	  <td align="center"><?php echo $data45f["count(*)"]; ?> 
	  <td align="center"><?php echo $data46f["count(*)"]; ?> 
	  <td align="center"><?php echo $data47f["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8f"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "20"; ?></td>
      <td align="center"><strong>Oesophageal CRE Balloon Dilation</strong></td>
	   <td align="center"><?php echo $data42g["count(*)"]; ?>  
	  <td align="center"><?php echo $data43g["count(*)"]; ?> 
	  <td align="center"><?php echo $data44g["count(*)"]; ?> 
	  <td align="center"><?php echo $data45g["count(*)"]; ?> 
	  <td align="center"><?php echo $data46g["count(*)"]; ?> 
	  <td align="center"><?php echo $data47g["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8g"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "21"; ?></td>
      <td align="center"><strong>Foreign Body Removal</strong></td>
	   <td align="center"><?php echo $data42h["count(*)"]; ?>  
	  <td align="center"><?php echo $data43h["count(*)"]; ?> 
	  <td align="center"><?php echo $data44h["count(*)"]; ?> 
	  <td align="center"><?php echo $data45h["count(*)"]; ?> 
	  <td align="center"><?php echo $data46h["count(*)"]; ?> 
	  <td align="center"><?php echo $data47h["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8h"; ?>  
	  
      </tr>
	  
	  
	  	  <tr>

      <td align="center"><?php echo "22"; ?></td>
      <td align="center"><strong>ESD</strong></td>
	   <td align="center"><?php echo $data42i["count(*)"]; ?>  
	  <td align="center"><?php echo $data43i["count(*)"]; ?> 
	  <td align="center"><?php echo $data44i["count(*)"]; ?> 
	  <td align="center"><?php echo $data45i["count(*)"]; ?> 
	  <td align="center"><?php echo $data46i["count(*)"]; ?> 
	  <td align="center"><?php echo $data47i["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8i"; ?>  
	  
      </tr>
	  
	  
	  
	  
	  	  	  <tr>

      <td align="center"><?php echo "23"; ?></td>
      <td align="center"><strong>EMR</strong></td>
	   <td align="center"><?php echo $data42j["count(*)"]; ?>  
	  <td align="center"><?php echo $data43j["count(*)"]; ?> 
	  <td align="center"><?php echo $data44j["count(*)"]; ?> 
	  <td align="center"><?php echo $data45j["count(*)"]; ?> 
	  <td align="center"><?php echo $data46j["count(*)"]; ?> 
	  <td align="center"><?php echo $data47j["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8j"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "24"; ?></td>
      <td align="center"><strong>Brush Cytology</strong></td>
	   <td align="center"><?php echo $data42k["count(*)"]; ?>  
	  <td align="center"><?php echo $data43k["count(*)"]; ?> 
	  <td align="center"><?php echo $data44k["count(*)"]; ?> 
	  <td align="center"><?php echo $data45k["count(*)"]; ?> 
	  <td align="center"><?php echo $data46k["count(*)"]; ?> 
	  <td align="center"><?php echo $data47k["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8k"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "25"; ?></td>
      <td align="center"><strong>Stenting</strong></td>
	   <td align="center"><?php echo $data42l["count(*)"]; ?>  
	  <td align="center"><?php echo $data43l["count(*)"]; ?> 
	  <td align="center"><?php echo $data44l["count(*)"]; ?> 
	  <td align="center"><?php echo $data45l["count(*)"]; ?> 
	  <td align="center"><?php echo $data46l["count(*)"]; ?> 
	  <td align="center"><?php echo $data47l["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8l"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "26"; ?></td>
      <td align="center"><strong>Biopsy</strong></td>
	   <td align="center"><?php echo $data42m["count(*)"]; ?>  
	  <td align="center"><?php echo $data43m["count(*)"]; ?> 
	  <td align="center"><?php echo $data44m["count(*)"]; ?> 
	  <td align="center"><?php echo $data45m["count(*)"]; ?> 
	  <td align="center"><?php echo $data46m["count(*)"]; ?> 
	  <td align="center"><?php echo $data47m["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8m"; ?>  
	  
      </tr>
	  
	  
	  	  <tr>

      <td align="center"><?php echo "27"; ?></td>
      <td align="center"><strong>TBNA</strong></td>
	   <td align="center"><?php echo $data42n["count(*)"]; ?>  
	  <td align="center"><?php echo $data43n["count(*)"]; ?> 
	  <td align="center"><?php echo $data44n["count(*)"]; ?> 
	  <td align="center"><?php echo $data45n["count(*)"]; ?> 
	  <td align="center"><?php echo $data46n["count(*)"]; ?> 
	  <td align="center"><?php echo $data47n["count(*)"]; ?> 
	  <td align="center"><?php echo $data42r["count(*)"];; ?> 
	  
	  <td align="center"><?php echo "$sum8r"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "28"; ?></td>
      <td align="center"><strong>Indwelling Pleural Catheter</strong></td>
	   <td align="center"><?php echo $data42o["count(*)"]; ?>  
	  <td align="center"><?php echo $data43o["count(*)"]; ?> 
	  <td align="center"><?php echo $data44o["count(*)"]; ?> 
	  <td align="center"><?php echo $data45o["count(*)"]; ?> 
	  <td align="center"><?php echo $data46o["count(*)"]; ?> 
	  <td align="center"><?php echo $data47o["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8o"; ?>  
	  
      </tr>
	  
	  
	  <tr>

      <td align="center"><?php echo "28"; ?></td>
      <td align="center"><strong>Electrocautery Of Angiodysplasia</strong></td>
	   <td align="center"><?php echo $data42p["count(*)"]; ?>  
	  <td align="center"><?php echo $data43p["count(*)"]; ?> 
	  <td align="center"><?php echo $data44p["count(*)"]; ?> 
	  <td align="center"><?php echo $data45p["count(*)"]; ?> 
	  <td align="center"><?php echo $data46p["count(*)"]; ?> 
	  <td align="center"><?php echo $data47p["count(*)"]; ?> 
	  <td align="center"><?php echo '0'; ?> 
	  
	  <td align="center"><?php echo "$sum8p"; ?>  
	  
      </tr>
	  
	  
	  	  <tr>

      <td align="center"><?php echo "28"; ?></td>
      <td align="center"><strong>Pleuroscopy</strong></td>
	   <td align="center"><?php  ?>  
	  <td align="center"><?php ?> 
	  <td align="center"><?php  ?> 
	  <td align="center"><?php  ?> 
	  <td align="center"><?php  ?> 
	  <td align="center"><?php  ?> 
	  <td align="center"><?php echo $data42q["count(*)"]; ?> 
	  
	  
	  <td align="center"><?php echo "$sum8q"; ?>  
	  
      </tr>
	  
	   <tr>

      <td align="center"></td>
      <td align="center"><strong>Grand Total</strong></td>
	  <td align="center"><?php echo "$i1"; ?>  
	  <td align="center"><?php echo "$i2"; ?> 
	  <td align="center"><?php echo "$i3"; ?> 
	  <td align="center"><?php echo "$i4"; ?> 
	  <td align="center"><?php echo "$i5"; ?> 
	  <td align="center"><?php echo "$i6"; ?> 
	  
	  <td align="center"><?php echo $data74["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$gsum"; ?>  
	  
      </tr>

    <?php $count++; } ?>


      <td colspan="10" align="right"><a target='_blank' href="testendotest1?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
  
</table>


</form>
</body>
</html>
