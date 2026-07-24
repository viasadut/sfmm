<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start1=$_REQUEST["stdate"];
$end1=$_REQUEST["endate"];

$start= date('Y-m-d', strtotime($start1));
$end= date('Y-m-d', strtotime($end1));




$query43a = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '0' and '4' and psex='M';"; 
	 
$result43a = mysqli_query($con, $query43a) or die(mysqli_error());
$row43a = mysqli_fetch_assoc($result43a);


$query43b = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '0' and '4' and psex='F';"; 
	 
$result43b = mysqli_query($con, $query43b) or die(mysqli_error());
$row43b = mysqli_fetch_assoc($result43b);


$query43c = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '0' and '4' and gender='M';"; 
	 
$result43c = mysqli_query($con, $query43c) or die(mysqli_error());
$row43c = mysqli_fetch_assoc($result43c);


$query43d = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '0' and '4' and gender='F';"; 
	 
$result43d = mysqli_query($con, $query43d) or die(mysqli_error());
$row43d = mysqli_fetch_assoc($result43d);



$query43e = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '0' and '4' and gender='M';"; 
	 
$result43e = mysqli_query($con, $query43e) or die(mysqli_error());
$row43e = mysqli_fetch_assoc($result43e);



$query43f = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '0' and '4' and gender='F';"; 
	 
$result43f = mysqli_query($con, $query43f) or die(mysqli_error());
$row43f = mysqli_fetch_assoc($result43f);


$query43g = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '5' and '14' and psex='M';"; 
	 
$result43g = mysqli_query($con, $query43g) or die(mysqli_error());
$row43g = mysqli_fetch_assoc($result43g);


$query43h = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '5' and '14' and psex='F';"; 
	 
$result43h = mysqli_query($con, $query43h) or die(mysqli_error());
$row43h = mysqli_fetch_assoc($result43h);


$query43i = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '5' and '14' and gender='M';"; 
	 
$result43i = mysqli_query($con, $query43i) or die(mysqli_error());
$row43i = mysqli_fetch_assoc($result43i);


$query43j = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '5' and '14' and gender='F';"; 
	 
$result43j = mysqli_query($con, $query43j) or die(mysqli_error());
$row43j = mysqli_fetch_assoc($result43j);



$query43k = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '5' and '14' and gender='M';"; 
	 
$result43k = mysqli_query($con, $query43k) or die(mysqli_error());
$row43k = mysqli_fetch_assoc($result43k);



$query43l = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '5' and '14' and gender='F';"; 
	 
$result43l = mysqli_query($con, $query43l) or die(mysqli_error());
$row43l = mysqli_fetch_assoc($result43l);

$query43m = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '15' and '24' and psex='M';"; 
	 
$result43m = mysqli_query($con, $query43m) or die(mysqli_error());
$row43m = mysqli_fetch_assoc($result43m);


$query43n = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '15' and '24' and psex='F';"; 
	 
$result43n = mysqli_query($con, $query43n) or die(mysqli_error());
$row43n = mysqli_fetch_assoc($result43n);


$query43o = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '15' and '24' and gender='M';"; 
	 
$result43o = mysqli_query($con, $query43o) or die(mysqli_error());
$row43o = mysqli_fetch_assoc($result43o);


$query43p = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '15' and '24' and gender='F';"; 
	 
$result43p = mysqli_query($con, $query43p) or die(mysqli_error());
$row43p = mysqli_fetch_assoc($result43p);



$query43q = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '15' and '24' and gender='M';"; 
	 
$result43q = mysqli_query($con, $query43q) or die(mysqli_error());
$row43q = mysqli_fetch_assoc($result43q);



$query43r = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '15' and '24' and gender='F';"; 
	 
$result43r = mysqli_query($con, $query43r) or die(mysqli_error());
$row43r = mysqli_fetch_assoc($result43r);


$query43s = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '25' and '49' and psex='M';"; 
	 
$result43s = mysqli_query($con, $query43s) or die(mysqli_error());
$row43s = mysqli_fetch_assoc($result43s);


$query43t = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '25' and '49' and psex='F';"; 
	 
$result43t = mysqli_query($con, $query43t) or die(mysqli_error());
$row43t = mysqli_fetch_assoc($result43t);


$query43u = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '25' and '49' and gender='M';"; 
	 
$result43u = mysqli_query($con, $query43u) or die(mysqli_error());
$row43u = mysqli_fetch_assoc($result43u);


$query43v = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '25' and '49' and gender='F';"; 
	 
$result43v = mysqli_query($con, $query43v) or die(mysqli_error());
$row43v = mysqli_fetch_assoc($result43v);



$query43w = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '25' and '49' and gender='M';"; 
	 
$result43w = mysqli_query($con, $query43w) or die(mysqli_error());
$row43w = mysqli_fetch_assoc($result43w);



$query43x = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '25' and '49' and gender='F';"; 
	 
$result43x = mysqli_query($con, $query43x) or die(mysqli_error());
$row43x = mysqli_fetch_assoc($result43x);


$query43y = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '50' and '150' and psex='M';"; 
	 
$result43y = mysqli_query($con, $query43y) or die(mysqli_error());
$row43y = mysqli_fetch_assoc($result43y);


$query43z = "SELECT COUNT(pmrn) FROM pappnew where status='SEEN' and adate1 BETWEEN '$start' and '$end' and yage between '50' and '150' and psex='F';"; 
	 
$result43z = mysqli_query($con, $query43z) or die(mysqli_error());
$row43z= mysqli_fetch_assoc($result43z);


$query43aa = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '50' and '150' and gender='M';"; 
	 
$result43aa = mysqli_query($con, $query43aa) or die(mysqli_error());
$row43aa = mysqli_fetch_assoc($result43aa);


$query43bb = "SELECT COUNT(pmrn) FROM inpatient where anew BETWEEN '$start' and '$end' and yage between '50' and '150' and gender='F';"; 
	 
$result43bb = mysqli_query($con, $query43bb) or die(mysqli_error());
$row43bb = mysqli_fetch_assoc($result43bb);



$query43cc = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '50' and '150' and gender='M';"; 
	 
$result43cc = mysqli_query($con, $query43cc) or die(mysqli_error());
$row43cc = mysqli_fetch_assoc($result43cc);



$query43dd = "SELECT COUNT(pmrn) FROM emergency where adate2 BETWEEN '$start' and '$end' and yage between '50' and '150' and gender='F';"; 
	 
$result43dd = mysqli_query($con, $query43dd) or die(mysqli_error());
$row43dd = mysqli_fetch_assoc($result43dd);


$query43ee = "SELECT COUNT(pmrn) FROM deathb where rdate BETWEEN '$start' and '$end' and psex='F';"; 
	 
$result43ee = mysqli_query($con, $query43ee) or die(mysqli_error());
$row43ee = mysqli_fetch_assoc($result43ee);


$query43ff = "SELECT COUNT(pmrn) FROM deathb where rdate BETWEEN '$start' and '$end' and psex='M';"; 
	 
$result43ff = mysqli_query($con, $query43ff) or die(mysqli_error());
$row43ff = mysqli_fetch_assoc($result43ff);


$query43gg = "SELECT COUNT(pmrn) FROM deathn where rdate BETWEEN '$start' and '$end' and psex='F';"; 
	 
$result43gg = mysqli_query($con, $query43gg) or die(mysqli_error());
$row43gg = mysqli_fetch_assoc($result43gg);


$query43hh = "SELECT COUNT(pmrn) FROM deathn where rdate BETWEEN '$start' and '$end' and psex='M';"; 
	 
$result43hh = mysqli_query($con, $query43hh) or die(mysqli_error());
$row43hh = mysqli_fetch_assoc($result43hh);


$mdeath=$row43ff["COUNT(pmrn)"]+$row43hh["COUNT(pmrn)"];
$fdeath=$row43ee["COUNT(pmrn)"]+$row43gg["COUNT(pmrn)"];


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
   <li><a href='homemrd'><span>Home</span></a></li>
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

<h1 align="center">Age Groupwise Patient Stats </h1>
<h2 align="center">(Stats was Aactivated from 6th March'2020 and onwards)</h2>

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
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15" required></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15" required></td>  
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
<tr>
      <th width="4%"><strong>Type</strong></th>
      <th width="17%"><strong>0-4</strong></th>
      <th width="10%"><strong>5-14</strong></th>
      <th width="15%"><strong>15-24 </strong>
      <th width="14%"><strong>25-49</strong>   
      <th width="14%"><strong>50</strong>
      
      
	   </tr>


    
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=$_REQUEST["stdate"];
$end=$_REQUEST["endate"];



echo'




<tr>
      <td align="center">IPD</td>
      <td align="center">'.$row43c["COUNT(pmrn)"].' Male, '.$row43d["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43i["COUNT(pmrn)"].' Male, '.$row43j["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43o["COUNT(pmrn)"].' Male, '.$row43p["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43u["COUNT(pmrn)"].' Male, '.$row43v["COUNT(pmrn)"].' Female</td>
	  <td align="center">'.$row43aa["COUNT(pmrn)"].' Male, '.$row43bb["COUNT(pmrn)"].' Female</td>
</tr>


<tr>
      <td align="center">Death</td>
      <td align="center">'.$mdeath.' Male</td>
	  <td align="center">'.$fdeath.' Female</td>
	  
</tr>



<tr>
      <td align="center">Emergency</td>
      <td align="center">'.$row43e["COUNT(pmrn)"].' Male, '.$row43f["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43k["COUNT(pmrn)"].' Male, '.$row43l["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43q["COUNT(pmrn)"].' Male, '.$row43r["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43w["COUNT(pmrn)"].' Male, '.$row43x["COUNT(pmrn)"].' Female</td>
	  <td align="center">'.$row43cc["COUNT(pmrn)"].' Male, '.$row43dd["COUNT(pmrn)"].' Female</td>
</tr>

<tr>
      <td align="center">OPD</td>
      <td align="center">'.$row43a["COUNT(pmrn)"].' Male, '.$row43b["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43g["COUNT(pmrn)"].' Male, '.$row43h["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43m["COUNT(pmrn)"].' Male, '.$row43n["COUNT(pmrn)"].' Female</td>
      <td align="center">'.$row43s["COUNT(pmrn)"].' Male, '.$row43t["COUNT(pmrn)"].' Female</td>
	  <td align="center">'.$row43y["COUNT(pmrn)"].' Male, '.$row43z["COUNT(pmrn)"].' Female</td>
</tr>



';


	
}?>

      
  </tbody>
</table>


</form>
</body>
</html>
