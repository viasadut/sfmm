<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
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

							<td colspan="3"><label><strong> Select Consultant</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 <td colspan="3"><select name="bt">
        
						<option value=''>-Select-</option>
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
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		



  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=$_REQUEST["stdate"];
$end=$_REQUEST["endate"];
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];

//$eid=$_REQUEST['eid'];
$dd=date('m/d/Y');
$query2 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data4 = mysqli_fetch_array($query4);

$query5 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data5 = mysqli_fetch_array($query5);

$query6 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data6 = mysqli_fetch_array($query6);

$query7 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data7 = mysqli_fetch_array($query7);


$sum1=$data2['count(*)']+$data3['count(*)']+$data4['count(*)']+$data5['count(*)']+$data6['count(*)']+$data7['count(*)'];


$query8 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data8 = mysqli_fetch_array($query8);

$query9 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data9 = mysqli_fetch_array($query9);

$query10 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data10 = mysqli_fetch_array($query10);

$query11 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data11 = mysqli_fetch_array($query11);

$query12 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data12 = mysqli_fetch_array($query12);

$query13 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data13 = mysqli_fetch_array($query13);


$sum2=$data8['count(*)']+$data9['count(*)']+$data10['count(*)']+$data11['count(*)']+$data12['count(*)']+$data13['count(*)'];


$query14 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data14 = mysqli_fetch_array($query14);

$query15 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data15 = mysqli_fetch_array($query15);

$query16 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data16 = mysqli_fetch_array($query16);

$query17 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data17 = mysqli_fetch_array($query17);

$query18 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data18 = mysqli_fetch_array($query18);

$query19 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data19 = mysqli_fetch_array($query19);



$sum3=$data14['count(*)']+$data15['count(*)']+$data16['count(*)']+$data17['count(*)']+$data18['count(*)']+$data19['count(*)'];


$query118 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='POLYPECTOMY' and r1date BETWEEN '$start' and '$end'" );
$data118 = mysqli_fetch_array($query118);

$query119 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='POLYPECTOMY' and r1date BETWEEN '$start' and '$end'" );
$data119 = mysqli_fetch_array($query119);

$query20 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='POLYPECTOMY' and r1date BETWEEN '$start' and '$end'" );
$data20 = mysqli_fetch_array($query20);


$query21 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='POLYPECTOMY' and r1date BETWEEN '$start' and '$end'" );
$data21 = mysqli_fetch_array($query21);

$query22 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='POLYPECTOMY' and r1date BETWEEN '$start' and '$end'" );
$data22 = mysqli_fetch_array($query22);

$query23 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='POLYPECTOMY' and r1date BETWEEN '$start' and '$end'" );
$data23 = mysqli_fetch_array($query23);



$sum4=$data118['count(*)']+$data119['count(*)']+$data20['count(*)']+$data21['count(*)']+$data22['count(*)']+$data23['count(*)'];


$query24 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='CYSTOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data24 = mysqli_fetch_array($query24);

$query25 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='CYSTOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data25 = mysqli_fetch_array($query25);

$query26 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='CYSTOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data26 = mysqli_fetch_array($query26);


$query27 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='CYSTOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data27 = mysqli_fetch_array($query27);

$query28 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='CYSTOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data28 = mysqli_fetch_array($query28);

$query29 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='CYSTOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data29 = mysqli_fetch_array($query29);



$sum5=$data24['count(*)']+$data25['count(*)']+$data26['count(*)']+$data27['count(*)']+$data28['count(*)']+$data29['count(*)'];


$query30 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='DJ. STENT REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data30 = mysqli_fetch_array($query30);

$query31 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='DJ. STENT REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data31 = mysqli_fetch_array($query31);

$query32 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='DJ. STENT REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data32 = mysqli_fetch_array($query32);


$query33 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='DJ. STENT REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data33 = mysqli_fetch_array($query33);

$query34 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='DJ. STENT REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data34 = mysqli_fetch_array($query34);

$query35 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='DJ. STENT REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data35 = mysqli_fetch_array($query35);



$sum6=$data30['count(*)']+$data31['count(*)']+$data32['count(*)']+$data33['count(*)']+$data33['count(*)']+$data35['count(*)'];


$query36 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='F.B REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data36 = mysqli_fetch_array($query36);

$query37 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='F.B REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data37 = mysqli_fetch_array($query37);

$query38 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='F.B REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data38 = mysqli_fetch_array($query38);


$query39 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='F.B REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data39 = mysqli_fetch_array($query39);

$query40 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='F.B REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data40 = mysqli_fetch_array($query40);

$query41 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='F.B REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data41 = mysqli_fetch_array($query41);



$sum7=$data36['count(*)']+$data37['count(*)']+$data38['count(*)']+$data39['count(*)']+$data40['count(*)']+$data41['count(*)'];


$query42 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='FOL' and r1date BETWEEN '$start' and '$end'" );
$data42 = mysqli_fetch_array($query42);

$query43 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='FOL' and r1date BETWEEN '$start' and '$end'" );
$data43 = mysqli_fetch_array($query43);

$query44 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='FOL' and r1date BETWEEN '$start' and '$end'" );
$data44 = mysqli_fetch_array($query44);


$query45 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='FOL' and r1date BETWEEN '$start' and '$end'" );
$data45 = mysqli_fetch_array($query45);

$query46 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='FOL' and r1date BETWEEN '$start' and '$end'" );
$data46 = mysqli_fetch_array($query46);

$query47 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='FOL' and r1date BETWEEN '$start' and '$end'" );
$data47 = mysqli_fetch_array($query47);



$sum8=$data42['count(*)']+$data43['count(*)']+$data44['count(*)']+$data45['count(*)']+$data46['count(*)']+$data47['count(*)'];

$query48 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='UROFLOWMETRY' and r1date BETWEEN '$start' and '$end'" );
$data48 = mysqli_fetch_array($query48);

$query49 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='UROFLOWMETRY' and r1date BETWEEN '$start' and '$end'" );
$data49 = mysqli_fetch_array($query49);

$query50 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='UROFLOWMETRY' and r1date BETWEEN '$start' and '$end'" );
$data50 = mysqli_fetch_array($query50);


$query51 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='UROFLOWMETRY' and r1date BETWEEN '$start' and '$end'" );
$data51 = mysqli_fetch_array($query51);

$query52 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='UROFLOWMETRY' and r1date BETWEEN '$start' and '$end'" );
$data52 = mysqli_fetch_array($query52);

$query53 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='UROFLOWMETRY' and r1date BETWEEN '$start' and '$end'" );
$data53 = mysqli_fetch_array($query53);



$sum9=$data48['count(*)']+$data49['count(*)']+$data50['count(*)']+$data51['count(*)']+$data52['count(*)']+$data53['count(*)'];



$query54 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ERCP SCREENING' and r1date BETWEEN '$start' and '$end'" );
$data54 = mysqli_fetch_array($query54);

$query55 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ERCP SCREENING' and r1date BETWEEN '$start' and '$end'" );
$data55 = mysqli_fetch_array($query55);

$query56 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ERCP SCREENING' and r1date BETWEEN '$start' and '$end'" );
$data56 = mysqli_fetch_array($query56);


$query57 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='ERCP SCREENING' and r1date BETWEEN '$start' and '$end'" );
$data57 = mysqli_fetch_array($query57);

$query58 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='ERCP SCREENING' and r1date BETWEEN '$start' and '$end'" );
$data58 = mysqli_fetch_array($query58);

$query59 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='ERCP SCREENING' and r1date BETWEEN '$start' and '$end'" );
$data59 = mysqli_fetch_array($query59);



$sum10=$data54['count(*)']+$data55['count(*)']+$data56['count(*)']+$data57['count(*)']+$data58['count(*)']+$data59['count(*)'];



$query60 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='EVL' and r1date BETWEEN '$start' and '$end'" );
$data60 = mysqli_fetch_array($query60);

$query61 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='EVL' and r1date BETWEEN '$start' and '$end'" );
$data61 = mysqli_fetch_array($query61);

$query62 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='EVL' and r1date BETWEEN '$start' and '$end'" );
$data62 = mysqli_fetch_array($query62);


$query63 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='EVL' and r1date BETWEEN '$start' and '$end'" );
$data63 = mysqli_fetch_array($query63);

$query64 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='EVL' and r1date BETWEEN '$start' and '$end'" );
$data64 = mysqli_fetch_array($query64);

$query65 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='EVL' and r1date BETWEEN '$start' and '$end'" );
$data65 = mysqli_fetch_array($query65);



$sum11=$data60['count(*)']+$data61['count(*)']+$data62['count(*)']+$data63['count(*)']+$data64['count(*)']+$data65['count(*)'];



$query66 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='DUDONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data66 = mysqli_fetch_array($query66);

$query67 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='DUDONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data67 = mysqli_fetch_array($query67);

$query68 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='EDUDONOSCOPYVL' and r1date BETWEEN '$start' and '$end'" );
$data68 = mysqli_fetch_array($query68);


$query69 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='DUDONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data69 = mysqli_fetch_array($query69);

$query70 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='DUDONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data70 = mysqli_fetch_array($query70);

$query71 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='DUDONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data71 = mysqli_fetch_array($query71);



$sum12=$data66['count(*)']+$data67['count(*)']+$data68['count(*)']+$data69['count(*)']+$data70['count(*)']+$data71['count(*)'];











$i1=$data2['count(*)']+$data8['count(*)']+$data14['count(*)']+$data118['count(*)']+$data24['count(*)']+$data30['count(*)']+$data36['count(*)']+$data42['count(*)']+$data48['count(*)']+$data54['count(*)']+$data60['count(*)']+$data66['count(*)'];
$i2=$data15['count(*)']+$data9['count(*)']+$data3['count(*)']+$data119['count(*)']+$data25['count(*)']+$data31['count(*)']+$data37['count(*)']+$data43['count(*)']+$data49['count(*)']+$data55['count(*)']+$data61['count(*)']+$data67['count(*)'];
$i3=$data16['count(*)']+$data10['count(*)']+$data4['count(*)']+$data20['count(*)']+$data26['count(*)']+$data32['count(*)']+$data38['count(*)']+$data44['count(*)']+$data50['count(*)']+$data56['count(*)']+$data62['count(*)']+$data68['count(*)'];
$i4=$data18['count(*)']+$data12['count(*)']+$data6['count(*)']+$data21['count(*)']+$data27['count(*)']+$data33['count(*)']+$data39['count(*)']+$data45['count(*)']+$data51['count(*)']+$data57['count(*)']+$data63['count(*)']+$data69['count(*)'];
$i5=$data19['count(*)']+$data13['count(*)']+$data7['count(*)']+$data22['count(*)']+$data28['count(*)']+$data34['count(*)']+$data40['count(*)']+$data46['count(*)']+$data52['count(*)']+$data58['count(*)']+$data64['count(*)']+$data70['count(*)'];
$i6=$data17['count(*)']+$data11['count(*)']+$data5['count(*)']+$data23['count(*)']+$data29['count(*)']+$data35['count(*)']+$data41['count(*)']+$data47['count(*)']+$data53['count(*)']+$data59['count(*)']+$data65['count(*)']+$data71['count(*)'];
$gsum=$sum1+$sum2+$sum3+$sum4+$sum5+$sum6+$sum7+$sum8+$sum9+$sum10+$sum11+$sum12;










//$date1=date_create("$start");
//$date2=date_create("$end");
//$diff=date_diff($date1,$date2);
//echo $diff->format("%R%a days");


$count=1;
$sel_query="Select type,dname,count(*) from endoreport where r1date BETWEEN '$start' and '$end' group by dname, type order by type";


$result = mysqli_query($con,$sel_query);

$row = mysqli_fetch_assoc($result);

echo "<font color=blue font size=5> Total Record found in the search  -";

echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;

 ?>   

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Name Of The Procedure</strong></th>
      <th width="10%"><strong>Dr. Razeeb</strong></th>
      <th width="15%"><strong>Dr. Ranen </strong>
      <th width="14%"><strong>Dr. Qausar</strong>   
      <th width="14%"><strong>Dr. Abbas</strong>
	  <th width="14%"><strong>Dr. Razzak</strong>
      <th width="14%"><strong>Dr. Taslima</strong>
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
	  
	  <td align="center"><?php echo "$sum3"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "4"; ?></td>
      <td align="center"><strong>Polypectomy</strong></td>
	  <td align="center"><?php echo $data118["count(*)"]; ?>  
	  <td align="center"><?php echo $data119["count(*)"]; ?> 
	  <td align="center"><?php echo $data20["count(*)"]; ?> 
	  <td align="center"><?php echo $data21["count(*)"]; ?> 
	  <td align="center"><?php echo $data22["count(*)"]; ?> 
	  <td align="center"><?php echo $data23["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum4"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "5"; ?></td>
      <td align="center"><strong>Cystoscopy</strong></td>
	  <td align="center"><?php echo $data24["count(*)"]; ?>  
	  <td align="center"><?php echo $data25["count(*)"]; ?> 
	  <td align="center"><?php echo $data26["count(*)"]; ?> 
	  <td align="center"><?php echo $data27["count(*)"]; ?> 
	  <td align="center"><?php echo $data28["count(*)"]; ?> 
	  <td align="center"><?php echo $data29["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum5"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "6"; ?></td>
      <td align="center"><strong>DJ. Stent Remove</strong></td>
	  <td align="center"><?php echo $data30["count(*)"]; ?>  
	  <td align="center"><?php echo $data31["count(*)"]; ?> 
	  <td align="center"><?php echo $data32["count(*)"]; ?> 
	  <td align="center"><?php echo $data33["count(*)"]; ?> 
	  <td align="center"><?php echo $data34["count(*)"]; ?> 
	  <td align="center"><?php echo $data35["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum6"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "7"; ?></td>
      <td align="center"><strong>F.B. Remove</strong></td>
	  <td align="center"><?php echo $data36["count(*)"]; ?>  
	  <td align="center"><?php echo $data37["count(*)"]; ?> 
	  <td align="center"><?php echo $data38["count(*)"]; ?> 
	  <td align="center"><?php echo $data39["count(*)"]; ?> 
	  <td align="center"><?php echo $data40["count(*)"]; ?> 
	  <td align="center"><?php echo $data41["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum7"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "8"; ?></td>
      <td align="center"><strong>FOL</strong></td>
	  <td align="center"><?php echo $data42["count(*)"]; ?>  
	  <td align="center"><?php echo $data43["count(*)"]; ?> 
	  <td align="center"><?php echo $data44["count(*)"]; ?> 
	  <td align="center"><?php echo $data45["count(*)"]; ?> 
	  <td align="center"><?php echo $data46["count(*)"]; ?> 
	  <td align="center"><?php echo $data47["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum8"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "9"; ?></td>
      <td align="center"><strong>Uroflowmetry</strong></td>
	  <td align="center"><?php echo $data48["count(*)"]; ?>  
	  <td align="center"><?php echo $data49["count(*)"]; ?> 
	  <td align="center"><?php echo $data50["count(*)"]; ?> 
	  <td align="center"><?php echo $data51["count(*)"]; ?> 
	  <td align="center"><?php echo $data52["count(*)"]; ?> 
	  <td align="center"><?php echo $data53["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum9"; ?>  
	  
      </tr>
	  <tr>

      <td align="center"><?php echo "10"; ?></td>
      <td align="center"><strong>ERCP Screening</strong></td>
	  <td align="center"><?php echo $data54["count(*)"]; ?>  
	  <td align="center"><?php echo $data55["count(*)"]; ?> 
	  <td align="center"><?php echo $data56["count(*)"]; ?> 
	  <td align="center"><?php echo $data57["count(*)"]; ?> 
	  <td align="center"><?php echo $data58["count(*)"]; ?> 
	  <td align="center"><?php echo $data59["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum10"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "11"; ?></td>
      <td align="center"><strong>EVL</strong></td>
	  <td align="center"><?php echo $data60["count(*)"]; ?>  
	  <td align="center"><?php echo $data61["count(*)"]; ?> 
	  <td align="center"><?php echo $data62["count(*)"]; ?> 
	  <td align="center"><?php echo $data63["count(*)"]; ?> 
	  <td align="center"><?php echo $data64["count(*)"]; ?> 
	  <td align="center"><?php echo $data65["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum11"; ?>  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "12"; ?></td>
      <td align="center"><strong>Dudonoscopy</strong></td>
	  <td align="center"><?php echo $data66["count(*)"]; ?>  
	  <td align="center"><?php echo $data67["count(*)"]; ?> 
	  <td align="center"><?php echo $data68["count(*)"]; ?> 
	  <td align="center"><?php echo $data69["count(*)"]; ?> 
	  <td align="center"><?php echo $data70["count(*)"]; ?> 
	  <td align="center"><?php echo $data71["count(*)"]; ?> 
	  
	  <td align="center"><?php echo "$sum12"; ?>  
	  
      </tr>
	   <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Grand Total</strong></td>
	  <td align="center"><?php echo "$i1"; ?>  
	  <td align="center"><?php echo "$i2"; ?> 
	  <td align="center"><?php echo "$i3"; ?> 
	  <td align="center"><?php echo "$i4"; ?> 
	  <td align="center"><?php echo "$i5"; ?> 
	  <td align="center"><?php echo "$i6"; ?> 
	  
	  <td align="center"><?php echo "$gsum"; ?>  
	  
      </tr>

    <?php $count++; } ?>


      <td colspan="10" align="right"><a target='_blank' href="testendotest1?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
  
</table>


</form>
</body>
</html>
