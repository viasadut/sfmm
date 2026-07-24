<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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

<h1 align="center">PMS USAGES REPORT</h1>

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
			$sql = "select * from `doctor` where status='Active'";
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
$query2 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Razeeb Hassan' and type='lab' and date BETWEEN '$start' and '$end'" );
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Razeeb Hassan' and type='rad' and date BETWEEN '$start' and '$end'" );
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Razeeb Hassan' and date BETWEEN '$start' and '$end'" );
$data4 = mysqli_fetch_array($query4);

$query500 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Razeeb Hassan' and type='' and date BETWEEN '$start' and '$end'" );
$data500 = mysqli_fetch_array($query500);



$sum1=$data2['count(*)']+$data3['count(*)']+$data500['count(*)'];

//$sum600=$data2['count(*)']+$data3['count(*)']+$data500['count(*)'];


$query5 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. J.M.H Qausar Alam' and type='lab' and date BETWEEN '$start' and '$end'" );
$data5 = mysqli_fetch_array($query5);

$query6 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. J.M.H Qausar Alam' and type='rad' and date BETWEEN '$start' and '$end'" );
$data6 = mysqli_fetch_array($query6);

$query7 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. J.M.H Qausar Alam' and date BETWEEN '$start' and '$end'" );
$data7 = mysqli_fetch_array($query7);

$query501 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. J.M.H Qausar Alam' and type='' and date BETWEEN '$start' and '$end'" );
$data501 = mysqli_fetch_array($query501);



$sum2=$data5['count(*)']+$data6['count(*)']+$data501['count(*)'];
//$sum601=$data5['count(*)']+$data6['count(*)']+$data501['count(*)'];

$query8 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Ranen Biswas' and type='lab' and date BETWEEN '$start' and '$end'" );
$data8 = mysqli_fetch_array($query8);

$query9 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Ranen Biswas' and type='rad' and date BETWEEN '$start' and '$end'" );
$data9 = mysqli_fetch_array($query9);

$query10 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Ranen Biswas' and date BETWEEN '$start' and '$end'" );
$data10 = mysqli_fetch_array($query10);

$query502 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Ranen Biswas' and type='' and date BETWEEN '$start' and '$end'" );
$data502 = mysqli_fetch_array($query502);

$sum3=$data8['count(*)']+$data9['count(*)']+$data502['count(*)'];
//$sum602=$data2['count(*)']+$data3['count(*)']+$data500['count(*)'];


$query11 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Subrata Shakhar Kar' and type='lab' and date BETWEEN '$start' and '$end'" );
$data11 = mysqli_fetch_array($query11);

$query12 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Subrata Shakhar Kar' and type='rad' and date BETWEEN '$start' and '$end'" );
$data12 = mysqli_fetch_array($query12);

$query13 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Subrata Shakhar Kar' and date BETWEEN '$start' and '$end'" );
$data13 = mysqli_fetch_array($query13);

$query503 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Subrata Shakhar Kar' and type='' and date BETWEEN '$start' and '$end'" );
$data503 = mysqli_fetch_array($query503);


$sum4=$data11['count(*)']+$data12['count(*)']+$data503['count(*)'];




$query14 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Rakibul Hassan' and type='lab' and date BETWEEN '$start' and '$end'" );
$data14 = mysqli_fetch_array($query14);

$query15 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Rakibul Hassan' and type='rad' and date BETWEEN '$start' and '$end'" );
$data15 = mysqli_fetch_array($query15);

$query16 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Md. Rakibul Hassan' and date BETWEEN '$start' and '$end'" );
$data16 = mysqli_fetch_array($query16);

$query504 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Rakibul Hassan' and type='' and date BETWEEN '$start' and '$end'" );
$data504 = mysqli_fetch_array($query504);



$sum5=$data14['count(*)']+$data15['count(*)']+$data504['count(*)'];




$query17 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Mahbubul Alam' and type='lab' and date BETWEEN '$start' and '$end'" );
$data17 = mysqli_fetch_array($query17);

$query18 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Mahbubul Alam' and type='rad' and date BETWEEN '$start' and '$end'" );
$data18 = mysqli_fetch_array($query18);

$query19 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Md. Mahbubul Alam' and date BETWEEN '$start' and '$end'" );
$data19 = mysqli_fetch_array($query19);

$query505 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Mahbubul Alam' and type='' and date BETWEEN '$start' and '$end'" );
$data505 = mysqli_fetch_array($query505);


$sum6=$data17['count(*)']+$data18['count(*)']+$data505['count(*)'];


$query20 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Rashidul Hasan' and type='lab' and date BETWEEN '$start' and '$end'" );
$data20 = mysqli_fetch_array($query20);

$query21 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Rashidul Hasan' and type='rad' and date BETWEEN '$start' and '$end'" );
$data21 = mysqli_fetch_array($query21);

$query22 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Rashidul Hasan' and date BETWEEN '$start' and '$end'" );
$data22 = mysqli_fetch_array($query22);

$query506 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Rashidul Hasan' and type='' and date BETWEEN '$start' and '$end'" );
$data506 = mysqli_fetch_array($query506);


$sum7=$data20['count(*)']+$data21['count(*)']+$data506['count(*)'];




$query23 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammed Abu Shoeb Talukder' and type='lab' and date BETWEEN '$start' and '$end'" );
$data23 = mysqli_fetch_array($query23);

$query24 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammed Abu Shoeb Talukder' and type='rad' and date BETWEEN '$start' and '$end'" );
$data24 = mysqli_fetch_array($query24);

$query25 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Mohammed Abu Shoeb Talukder' and date BETWEEN '$start' and '$end'" );
$data25 = mysqli_fetch_array($query25);

$query507 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammed Abu Shoeb Talukder' and type='' and date BETWEEN '$start' and '$end'" );
$data507 = mysqli_fetch_array($query507);

$sum8=$data23['count(*)']+$data24['count(*)']+$data507['count(*)'];



$query26 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mahboob Mustafa Zaman' and type='lab' and date BETWEEN '$start' and '$end'" );
$data26 = mysqli_fetch_array($query26);

$query27 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mahboob Mustafa Zaman' and type='rad' and date BETWEEN '$start' and '$end'" );
$data27 = mysqli_fetch_array($query27);

$query28 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Mahboob Mustafa Zaman' and date BETWEEN '$start' and '$end'" );
$data28 = mysqli_fetch_array($query28);

$query508 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mahboob Mustafa Zaman' and type='' and date BETWEEN '$start' and '$end'" );
$data508 = mysqli_fetch_array($query508);


$sum9=$data26['count(*)']+$data27['count(*)']+$data508['count(*)'];


$query29 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Afroja Siddiqua' and type='lab' and date BETWEEN '$start' and '$end'" );
$data29 = mysqli_fetch_array($query29);

$query30 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Afroja Siddiqua' and type='rad' and date BETWEEN '$start' and '$end'" );
$data30 = mysqli_fetch_array($query30);

$query31 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Afroja Siddiqua' and date BETWEEN '$start' and '$end'" );
$data31 = mysqli_fetch_array($query31);

$query509 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Afroja Siddiqua' and type='' and date BETWEEN '$start' and '$end'" );
$data509 = mysqli_fetch_array($query509);


$sum10=$data29['count(*)']+$data30['count(*)']+$data509['count(*)'];

$query32 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Kaniz Farhana' and type='lab' and date BETWEEN '$start' and '$end'" );
$data32 = mysqli_fetch_array($query32);

$query33 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Kaniz Farhana' and type='rad' and date BETWEEN '$start' and '$end'" );
$data33 = mysqli_fetch_array($query33);

$query34 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Kaniz Farhana' and date BETWEEN '$start' and '$end'" );
$data34 = mysqli_fetch_array($query34);

$query510 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Kaniz Farhana' and type='' and date BETWEEN '$start' and '$end'" );
$data510 = mysqli_fetch_array($query510);


$sum11=$data32['count(*)']+$data33['count(*)']+$data510['count(*)'];



$query35 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Fatema Yasmin' and type='lab' and date BETWEEN '$start' and '$end'" );
$data35 = mysqli_fetch_array($query35);

$query36 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Fatema Yasmin' and type='rad' and date BETWEEN '$start' and '$end'" );
$data36 = mysqli_fetch_array($query36);

$query37 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Fatema Yasmin' and date BETWEEN '$start' and '$end'" );
$data37 = mysqli_fetch_array($query37);

$query511 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Fatema Yasmin' and type='' and date BETWEEN '$start' and '$end'" );
$data511 = mysqli_fetch_array($query511);


$sum12=$data35['count(*)']+$data36['count(*)']+$data511['count(*)'];


$query38 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Ayesha Hasina' and type='lab' and date BETWEEN '$start' and '$end'" );
$data38 = mysqli_fetch_array($query38);

$query39 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Ayesha Hasina' and type='rad' and date BETWEEN '$start' and '$end'" );
$data39 = mysqli_fetch_array($query39);

$query40 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Ayesha Hasina' and date BETWEEN '$start' and '$end'" );
$data40 = mysqli_fetch_array($query40);

$query512 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Ayesha Hasina' and type='' and date BETWEEN '$start' and '$end'" );
$data512 = mysqli_fetch_array($query512);

$sum13=$data38['count(*)']+$data39['count(*)']+$data512['count(*)'];



$query41 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohsina Akter Lucky' and type='lab' and date BETWEEN '$start' and '$end'" );
$data41 = mysqli_fetch_array($query41);

$query42 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohsina Akter Lucky' and type='rad' and date BETWEEN '$start' and '$end'" );
$data42 = mysqli_fetch_array($query42);

$query43 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Mohsina Akter Lucky' and date BETWEEN '$start' and '$end'" );
$data43 = mysqli_fetch_array($query43);

$query513 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohsina Akter Lucky' and type='' and date BETWEEN '$start' and '$end'" );
$data513 = mysqli_fetch_array($query513);


$sum14=$data41['count(*)']+$data42['count(*)']+$data513['count(*)'];

$query41 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohsina Akter Lucky' and type='lab' and date BETWEEN '$start' and '$end'" );
$data41 = mysqli_fetch_array($query41);

$query42 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohsina Akter Lucky' and type='rad' and date BETWEEN '$start' and '$end'" );
$data42 = mysqli_fetch_array($query42);

$query43 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Mohsina Akter Lucky' and date BETWEEN '$start' and '$end'" );
$data43 = mysqli_fetch_array($query43);

$query514 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohsina Akter Lucky' and type='' and date BETWEEN '$start' and '$end'" );
$data514 = mysqli_fetch_array($query514);


$sum14=$data41['count(*)']+$data42['count(*)']+$data514['count(*)'];

$query44 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Amir Mohammad Kaiser' and type='lab' and date BETWEEN '$start' and '$end'" );
$data44 = mysqli_fetch_array($query44);

$query45 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Amir Mohammad Kaiser' and type='rad' and date BETWEEN '$start' and '$end'" );
$data45 = mysqli_fetch_array($query45);

$query46 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Amir Mohammad Kaiser' and date BETWEEN '$start' and '$end'" );
$data46 = mysqli_fetch_array($query46);

$query515 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Amir Mohammad Kaiser' and type='' and date BETWEEN '$start' and '$end'" );
$data515 = mysqli_fetch_array($query515);

$sum15=$data44['count(*)']+$data45['count(*)']+$data515['count(*)'];


$query47 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Arif Mohammad Sohan' and type='lab' and date BETWEEN '$start' and '$end'" );
$data47 = mysqli_fetch_array($query47);

$query48 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Arif Mohammad Sohan' and type='rad' and date BETWEEN '$start' and '$end'" );
$data48 = mysqli_fetch_array($query48);

$query49 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Arif Mohammad Sohan' and date BETWEEN '$start' and '$end'" );
$data49 = mysqli_fetch_array($query49);

$query516 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Arif Mohammad Sohan' and type='' and date BETWEEN '$start' and '$end'" );
$data516 = mysqli_fetch_array($query516);

$sum16=$data47['count(*)']+$data48['count(*)']+$data516['count(*)'];





$query50 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammad Arifur Rahman' and type='lab' and date BETWEEN '$start' and '$end'" );
$data50 = mysqli_fetch_array($query50);

$query51 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammad Arifur Rahman' and type='rad' and date BETWEEN '$start' and '$end'" );
$data51 = mysqli_fetch_array($query51);

$query52 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Mohammad Arifur Rahman' and date BETWEEN '$start' and '$end'" );
$data52 = mysqli_fetch_array($query52);

$query517 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammad Arifur Rahman' and type='' and date BETWEEN '$start' and '$end'" );
$data517 = mysqli_fetch_array($query517);


$sum17=$data50['count(*)']+$data51['count(*)']+$data517['count(*)'];


$query53 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Farzana Sultana Borna' and type='lab' and date BETWEEN '$start' and '$end'" );
$data53 = mysqli_fetch_array($query53);

$query54 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Farzana Sultana Borna' and type='rad' and date BETWEEN '$start' and '$end'" );
$data54 = mysqli_fetch_array($query54);

$query55 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Farzana Sultana Borna' and date BETWEEN '$start' and '$end'" );
$data55 = mysqli_fetch_array($query55);

$query518 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Farzana Sultana Borna' and type='' and date BETWEEN '$start' and '$end'" );
$data518 = mysqli_fetch_array($query518);


$sum18=$data53['count(*)']+$data54['count(*)']+$data518['count(*)'];

$query56 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Abdur Razzak' and type='lab' and date BETWEEN '$start' and '$end'" );
$data56 = mysqli_fetch_array($query56);

$query57 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Abdur Razzak' and type='rad' and date BETWEEN '$start' and '$end'" );
$data57 = mysqli_fetch_array($query57);

$query58 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Md. Abdur Razzak' and date BETWEEN '$start' and '$end'" );
$data58 = mysqli_fetch_array($query58);


$query519 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Abdur Razzak' and type='' and date BETWEEN '$start' and '$end'" );
$data519 = mysqli_fetch_array($query519);

$sum19=$data56['count(*)']+$data57['count(*)']+$data519['count(*)'];


$query59 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Taslima Zaman' and type='lab' and date BETWEEN '$start' and '$end'" );
$data59 = mysqli_fetch_array($query56);

$query60 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Taslima Zaman' and type='rad' and date BETWEEN '$start' and '$end'" );
$data60 = mysqli_fetch_array($query60);

$query61 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Taslima Zaman' and date BETWEEN '$start' and '$end'" );
$data61 = mysqli_fetch_array($query61);


$query520 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Taslima Zaman' and type='' and date BETWEEN '$start' and '$end'" );
$data520 = mysqli_fetch_array($query520);


$sum20=$data59['count(*)']+$data60['count(*)']+$data520['count(*)'];



$query62 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Shariful Islam' and type='lab' and date BETWEEN '$start' and '$end'" );
$data62 = mysqli_fetch_array($query62);

$query63 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Shariful Islam' and type='rad' and date BETWEEN '$start' and '$end'" );
$data63 = mysqli_fetch_array($query63);

$query64 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Md. Shariful Islam' and date BETWEEN '$start' and '$end'" );
$data64 = mysqli_fetch_array($query64);


$query521 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Shariful Islam' and type='' and date BETWEEN '$start' and '$end'" );
$data521 = mysqli_fetch_array($query521);

$sum21=$data62['count(*)']+$data63['count(*)']+$data521['count(*)'];

$query65 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Salma Sultana' and type='lab' and date BETWEEN '$start' and '$end'" );
$data65 = mysqli_fetch_array($query65);

$query66 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Salma Sultana' and type='rad' and date BETWEEN '$start' and '$end'" );
$data66 = mysqli_fetch_array($query66);

$query67 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Salma Sultana' and date BETWEEN '$start' and '$end'" );
$data67 = mysqli_fetch_array($query67);

$query522 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Salma Sultana' and type='' and date BETWEEN '$start' and '$end'" );
$data522 = mysqli_fetch_array($query522);

$sum22=$data65['count(*)']+$data66['count(*)']+$data522['count(*)'];



$query68 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammad Rasel Arafat' and type='lab' and date BETWEEN '$start' and '$end'" );
$data68 = mysqli_fetch_array($query68);

$query69 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammad Rasel Arafat' and type='rad' and date BETWEEN '$start' and '$end'" );
$data69 = mysqli_fetch_array($query69);

$query70 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Mohammad Rasel Arafat' and date BETWEEN '$start' and '$end'" );
$data70 = mysqli_fetch_array($query70);

$query523 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohammad Rasel Arafat' and type='' and date BETWEEN '$start' and '$end'" );
$data523 = mysqli_fetch_array($query523);


$sum23=$data68['count(*)']+$data69['count(*)']+$data523['count(*)'];


$query71 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Ashraful Haque' and type='lab' and date BETWEEN '$start' and '$end'" );
$data71 = mysqli_fetch_array($query71);

$query72 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Ashraful Haque' and type='rad' and date BETWEEN '$start' and '$end'" );
$data72 = mysqli_fetch_array($query72);

$query73 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Md. Ashraful Haque' and date BETWEEN '$start' and '$end'" );
$data73 = mysqli_fetch_array($query73);

$query524 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Md. Ashraful Haque' and type='' and date BETWEEN '$start' and '$end'" );
$data524 = mysqli_fetch_array($query524);

$sum24=$data71['count(*)']+$data72['count(*)']+$data524['count(*)'];


$query74 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohd. Abbas Uddin' and type='lab' and date BETWEEN '$start' and '$end'" );
$data74 = mysqli_fetch_array($query74);

$query75 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohd. Abbas Uddin' and type='rad' and date BETWEEN '$start' and '$end'" );
$data75 = mysqli_fetch_array($query75);

$query76 = mysqli_query($link,"Select dname,count(*) from pmedi where dname='Dr. Mohd. Abbas Uddin' and date BETWEEN '$start' and '$end'" );
$data76 = mysqli_fetch_array($query76);

$query525 = mysqli_query($link,"Select dname,count(*) from alltest where dname='Dr. Mohd. Abbas Uddin' and type='' and date BETWEEN '$start' and '$end'" );
$data525 = mysqli_fetch_array($query525);

$sum25=$data74['count(*)']+$data75['count(*)']+$data525['count(*)'];


//$i1=$data2['count(*)']+$data8['count(*)']+$data14['count(*)']+$data118['count(*)']+$data24['count(*)']+$data30['count(*)']+$data36['count(*)']+$data42['count(*)']+$data48['count(*)']+$data54['count(*)']+$data60['count(*)']+$data66['count(*)'];
//$i2=$data15['count(*)']+$data9['count(*)']+$data3['count(*)']+$data119['count(*)']+$data25['count(*)']+$data31['count(*)']+$data37['count(*)']+$data43['count(*)']+$data49['count(*)']+$data55['count(*)']+$data61['count(*)']+$data67['count(*)'];
//$i3=$data16['count(*)']+$data10['count(*)']+$data4['count(*)']+$data20['count(*)']+$data26['count(*)']+$data32['count(*)']+$data38['count(*)']+$data44['count(*)']+$data50['count(*)']+$data56['count(*)']+$data62['count(*)']+$data68['count(*)'];
//$i4=$data18['count(*)']+$data12['count(*)']+$data6['count(*)']+$data21['count(*)']+$data27['count(*)']+$data33['count(*)']+$data39['count(*)']+$data45['count(*)']+$data51['count(*)']+$data57['count(*)']+$data63['count(*)']+$data69['count(*)'];
//$i5=$data19['count(*)']+$data13['count(*)']+$data7['count(*)']+$data22['count(*)']+$data28['count(*)']+$data34['count(*)']+$data40['count(*)']+$data46['count(*)']+$data52['count(*)']+$data58['count(*)']+$data64['count(*)']+$data70['count(*)'];
//$i6=$data17['count(*)']+$data11['count(*)']+$data5['count(*)']+$data23['count(*)']+$data29['count(*)']+$data35['count(*)']+$data41['count(*)']+$data47['count(*)']+$data53['count(*)']+$data59['count(*)']+$data65['count(*)']+$data71['count(*)'];
//$gsum=$sum1+$sum2+$sum3+$sum4+$sum5+$sum6+$sum7+$sum8+$sum9+$sum10+$sum11+$sum12;










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
      <th width="17%"><strong>Name</strong></th>
	  <th width="17%"><strong>LAB</strong></th>
      <th width="10%"><strong>RADIOLOGY</strong></th>
	  <th width="10%"><strong>NOT FROM DATABASE</strong></th>
	  <th width="14%"><strong>Total</strong>
      <th width="15%"><strong>PHARMACY </strong>
      

	   </tr>
  </thead>
  <tbody>


 <tr>

      <td align="center"><?php echo "1"; ?></td>
      <td align="center"><strong>Dr. Razeeb Hassan</strong></td>
	  <td align="center"><?php echo $data2["count(*)"]; ?>  
	  <td align="center"><?php echo $data3["count(*)"]; ?> 
	  <td align="center"><?php echo $data500["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum1"; ?>  
	  <td align="center"><?php echo $data4["count(*)"]; ?> 
	  
	  
	  
	  
      </tr>


 <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. J.M.H Qausar Alam</strong></td>
	  <td align="center"><?php echo $data5["count(*)"]; ?>  
	  <td align="center"><?php echo $data6["count(*)"]; ?> 
	  <td align="center"><?php echo $data501["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum2"; ?> 
	  <td align="center"><?php echo $data7["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Ranen Biswas</strong></td>
	  <td align="center"><?php echo $data8["count(*)"]; ?>  
	  <td align="center"><?php echo $data9["count(*)"]; ?> 
	  <td align="center"><?php echo $data502["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum3"; ?> 
	  <td align="center"><?php echo $data10["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Subrata Shakhar Kar</strong></td>
	  <td align="center"><?php echo $data11["count(*)"]; ?>  
	  <td align="center"><?php echo $data12["count(*)"]; ?> 
	  <td align="center"><?php echo $data503["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum4"; ?>  
	  <td align="center"><?php echo $data13["count(*)"]; ?> 
	  
	  
	  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Md. Rakibul Hassan</strong></td>
	  <td align="center"><?php echo $data14["count(*)"]; ?>  
	  <td align="center"><?php echo $data15["count(*)"]; ?> 
	  <td align="center"><?php echo $data504["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum5"; ?>  
	  <td align="center"><?php echo $data16["count(*)"]; ?> 
	  
	  
	  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Md. Mahbubul Alam</strong></td>
	  <td align="center"><?php echo $data17["count(*)"]; ?>  
	  <td align="center"><?php echo $data18["count(*)"]; ?> 
	  <td align="center"><?php echo $data505["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum6"; ?>  
	  <td align="center"><?php echo $data19["count(*)"]; ?> 
	  
	  
	  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Rashidul Hasan</strong></td>
	  <td align="center"><?php echo $data20["count(*)"]; ?>  
	  <td align="center"><?php echo $data21["count(*)"]; ?> 
	  <td align="center"><?php echo $data506["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum7"; ?>  
	  <td align="center"><?php echo $data22["count(*)"]; ?> 
	  
	  
	  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Mohammed Abu Shoeb Talukder</strong></td>
	  <td align="center"><?php echo $data23["count(*)"]; ?>  
	  <td align="center"><?php echo $data24["count(*)"]; ?> 
	  <td align="center"><?php echo $data507["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum8"; ?>  
	  <td align="center"><?php echo $data25["count(*)"]; ?> 
	  
	  
	  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Mahboob Mustafa Zaman</strong></td>
	  <td align="center"><?php echo $data26["count(*)"]; ?>  
	  <td align="center"><?php echo $data27["count(*)"]; ?> 
	  <td align="center"><?php echo $data508["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum9"; ?>  
	  <td align="center"><?php echo $data28["count(*)"]; ?> 
	  
	  
	  
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Afroja Siddiqua</strong></td>
	  <td align="center"><?php echo $data29["count(*)"]; ?>  
	  <td align="center"><?php echo $data30["count(*)"]; ?> 
	  <td align="center"><?php echo $data509["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum10"; ?> 
	  <td align="center"><?php echo $data31["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Kaniz Farhana</strong></td>
	  <td align="center"><?php echo $data32["count(*)"]; ?>  
	  <td align="center"><?php echo $data33["count(*)"]; ?> 
	  <td align="center"><?php echo $data510["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum11"; ?> 
	  <td align="center"><?php echo $data34["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Fatema Yasmin</strong></td>
	  <td align="center"><?php echo $data35["count(*)"]; ?>  
	  <td align="center"><?php echo $data36["count(*)"]; ?> 
	  <td align="center"><?php echo $data511["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum12"; ?> 
	  <td align="center"><?php echo $data37["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Ayesha Hasina</strong></td>
	  <td align="center"><?php echo $data38["count(*)"]; ?>  
	  <td align="center"><?php echo $data39["count(*)"]; ?> 
	  <td align="center"><?php echo $data512["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum13"; ?> 
	  <td align="center"><?php echo $data40["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Mohsina Akter Lucky</strong></td>
	  <td align="center"><?php echo $data41["count(*)"]; ?>  
	  <td align="center"><?php echo $data42["count(*)"]; ?> 
	  <td align="center"><?php echo $data513["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum14"; ?> 
	  <td align="center"><?php echo $data43["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Amir Mohammad Kaiser</strong></td>
	  <td align="center"><?php echo $data44["count(*)"]; ?>  
	  <td align="center"><?php echo $data45["count(*)"]; ?> 
	  <td align="center"><?php echo $data514["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum15"; ?> 
	  <td align="center"><?php echo $data46["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Arif Mohammad Sohan</strong></td>
	  <td align="center"><?php echo $data47["count(*)"]; ?>  
	  <td align="center"><?php echo $data48["count(*)"]; ?> 
	  <td align="center"><?php echo $data516["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum16"; ?> 
	  <td align="center"><?php echo $data49["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Mohammad Arifur Rahman</strong></td>
	  <td align="center"><?php echo $data50["count(*)"]; ?>  
	  <td align="center"><?php echo $data51["count(*)"]; ?> 
	  <td align="center"><?php echo $data517["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum17"; ?> 
	  <td align="center"><?php echo $data52["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Farzana Sultana Borna</strong></td>
	  <td align="center"><?php echo $data53["count(*)"]; ?>  
	  <td align="center"><?php echo $data54["count(*)"]; ?> 
	  <td align="center"><?php echo $data518["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum18"; ?> 
	  <td align="center"><?php echo $data55["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Md. Abdur Razzak</strong></td>
	  <td align="center"><?php echo $data56["count(*)"]; ?>  
	  <td align="center"><?php echo $data57["count(*)"]; ?> 
	  <td align="center"><?php echo $data519["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum19"; ?> 
	  <td align="center"><?php echo $data58["count(*)"]; ?> 
	  
	  
	   
	  
      </tr>
	  
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Taslima Zaman</strong></td>
	  <td align="center"><?php echo $data59["count(*)"]; ?>  
	  <td align="center"><?php echo $data60["count(*)"]; ?> 
	  <td align="center"><?php echo $data520["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum20"; ?> 
	  <td align="center"><?php echo $data61["count(*)"]; ?> 
	  
	  
	   
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Md. Shariful Islam</strong></td>
	  <td align="center"><?php echo $data62["count(*)"]; ?>  
	  <td align="center"><?php echo $data63["count(*)"]; ?> 
	  <td align="center"><?php echo $data521["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum21"; ?> 
	  <td align="center"><?php echo $data64["count(*)"]; ?> 
	  
	  
	   
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Salma Sultana</strong></td>
	  <td align="center"><?php echo $data65["count(*)"]; ?>  
	  <td align="center"><?php echo $data66["count(*)"]; ?> 
	  <td align="center"><?php echo $data522["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum22"; ?> 
	  <td align="center"><?php echo $data67["count(*)"]; ?> 
	  
	  
	   
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Mohammad Rasel Arafat</strong></td>
	  <td align="center"><?php echo $data68["count(*)"]; ?>  
	  <td align="center"><?php echo $data69["count(*)"]; ?> 
	  <td align="center"><?php echo $data523["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum23"; ?> 
	  <td align="center"><?php echo $data70["count(*)"]; ?> 
	  
	  
	   
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Md. Ashraful Haque</strong></td>
	  <td align="center"><?php echo $data71["count(*)"]; ?>  
	  <td align="center"><?php echo $data72["count(*)"]; ?> 
	  <td align="center"><?php echo $data524["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum24"; ?> 
	  <td align="center"><?php echo $data73["count(*)"]; ?> 
	  
	  
	   
	  <tr>

      <td align="center"><?php echo "2"; ?></td>
      <td align="center"><strong>Dr. Mohd. Abbas Uddin</strong></td>
	  <td align="center"><?php echo $data74["count(*)"]; ?>  
	  <td align="center"><?php echo $data75["count(*)"]; ?> 
	  <td align="center"><?php echo $data525["count(*)"]; ?> 
	  <td align="center"><?php echo "$sum25"; ?> 
	  <td align="center"><?php echo $data76["count(*)"]; ?> 
	  
	  
	   

    <?php $count++; } ?>


      <td colspan="10" align="right"><a target='_blank' href="testendotest1?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
  
</table>


</form>
</body>
</html>
