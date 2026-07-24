<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
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
$bt1=$_REQUEST["bt1"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
$new=$start.' '.$bt;
$old=$end.' '.$bt1;

// Make a MySQL Connection
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("sfmmkpjnew",$dbhandle) 
  or die("Could not select examples");

$query298 = "SELECT type, SUM(qty) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid' and type='intake' GROUP BY type"; 
	 
$result298 = mysql_query($query298) or die(mysql_error());

// Print out result
$row298 = mysql_fetch_array($result298);
	//echo $row298['SUM(qty)'];

$test=$row298['SUM(qty)'];

	
$query198 = "SELECT type1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn'and eid='$eid'and type1='Output 'GROUP BY type1"; 
	 
$result198 = mysql_query($query198) or die(mysql_error());

// Print out result
$row198 = mysql_fetch_array($result198);
	//echo $row198['SUM(qty)'];

	
$test1=	$row198['SUM(qty1)'];

$test3=$test-$test1;

//echo $test3; 

$query398 = "SELECT route, SUM(qty) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route='oral'GROUP BY route"; 
	 
$result398 = mysql_query($query398) or die(mysql_error());

// Print out result
$row398 = mysql_fetch_array($result398);

$query498 = "SELECT route, SUM(qty) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route='IV'GROUP BY route"; 
	 
$result498 = mysql_query($query498) or die(mysql_error());

// Print out result
$row498 = mysql_fetch_array($result498);

$test4=	$row498['SUM(qty)'];
$test5=	$row398['SUM(qty)'];




 
	
$query298 = "SELECT type, SUM(qty) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and type='intake'GROUP BY type"; 
	 
$result298 = mysql_query($query298) or die(mysql_error());

// Print out result
$row298 = mysql_fetch_array($result298);
	//echo $row298['SUM(qty)'];

$test=$row298['SUM(qty)'];

	
$query198 = "SELECT type1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn'and eid='$eid'and type1='Output 'GROUP BY type1"; 
	 
$result198 = mysql_query($query198) or die(mysql_error());

// Print out result
$row198 = mysql_fetch_array($result198);
	//echo $row198['SUM(qty)'];

	
$test1=	$row198['SUM(qty1)'];

$test3=$test-$test1;

//echo $test3; 

$query398 = "SELECT route, SUM(qty) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route='oral'GROUP BY route"; 
	 
$result398 = mysql_query($query398) or die(mysql_error());

// Print out result
$row398 = mysql_fetch_array($result398);

$query498 = "SELECT route, SUM(qty) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route='IV'GROUP BY route"; 
	 
$result498 = mysql_query($query498) or die(mysql_error());

// Print out result
$row498 = mysql_fetch_array($result498);

$test4=	$row498['SUM(qty)'];
$test5=	$row398['SUM(qty)'];




$query11 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Vomitus'GROUP BY route1"; 
	 
$result11 = mysql_query($query11) or die(mysql_error());

// Print out result
$row11 = mysql_fetch_array($result11);

$query22 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='NG' GROUP BY route1"; 
	 
$result22 = mysql_query($query22) or die(mysql_error());

// Print out result
$row22 = mysql_fetch_array($result22);


$query33 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Urine'GROUP BY route1"; 
	 
$result33 = mysql_query($query33) or die(mysql_error());

// Print out result
$row33 = mysql_fetch_array($result33);


$query44 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Drain-1'GROUP BY route1"; 
	 
$result44 = mysql_query($query44) or die(mysql_error());

// Print out result
$row44 = mysql_fetch_array($result44);


$query55 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Drain-2'GROUP BY route1"; 
	 
$result55 = mysql_query($query55) or die(mysql_error());

// Print out result
$row55 = mysql_fetch_array($result55);

$query66 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Drain-3'GROUP BY route1"; 
	 
$result66 = mysql_query($query66) or die(mysql_error());

// Print out result
$row66 = mysql_fetch_array($result66);

$query77 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Drain-4'GROUP BY route1"; 
	 
$result77 = mysql_query($query77) or die(mysql_error());

// Print out result
$row77 = mysql_fetch_array($result77);

$query88 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Drain-5'GROUP BY route1"; 
	 
$result88 = mysql_query($query88) or die(mysql_error());

// Print out result
$row88 = mysql_fetch_array($result88);


$query99 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Drain-6'GROUP BY route1"; 
	 
$result99 = mysql_query($query99) or die(mysql_error());

// Print out result
$row99 = mysql_fetch_array($result99);


$query00 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Drain-7'GROUP BY route1"; 
	 
$result00 = mysql_query($query00) or die(mysql_error());

// Print out result
$row00 = mysql_fetch_array($result00);


$query009 = "SELECT route1, SUM(qty1) FROM influid where time1 between '$new' and '$old' and pmrn='$pmrn' and eid='$eid'and route1='Stool'GROUP BY route1"; 
	 
$result009 = mysql_query($query009) or die(mysql_error());

// Print out result
$row009 = mysql_fetch_array($result009);


$test11=	$row11['SUM(qty1)'];
$test22=	$row22['SUM(qty1)'];
$test33=	$row33['SUM(qty1)'];
$test44=	$row44['SUM(qty1)'];
$test55=	$row55['SUM(qty1)'];
$test66=	$row66['SUM(qty1)'];
$test77=	$row77['SUM(qty1)'];
$test88=	$row88['SUM(qty1)'];
$test99=	$row99['SUM(qty1)'];
$test00=	$row00['SUM(qty1)'];
$test009=	$row009['SUM(qty1)'];









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

<h1 align="center">Number of Out Patient Report</h1>

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
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15" required></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"required></td>  
					 <td colspan="3"><select name="bt" required>
        
						
						<option value=''>-Select-</option>
						<option value='00:00:00'>00:00</option>
						<option value='01:00:00'>01:00</option>
						<option value='02:00:00'>02:00</option>
						<option value='03:00:00'>03:00</option>
						<option value='04:00:00'>04:00</option>
						<option value='05:00:00'>05:00</option>
						<option value='06:00:00'>06:00</option>
						<option value='07:00:00'>07:00</option>
						<option value='08:00:00'>08:00</option>
						<option value='09:00:00'>09:00</option>
						<option value='10:00:00'>10:00</option>
						<option value='11:00:00'>11:00</option>
						<option value='12:00:00'>12:00</option>
						<option value='13:00:00'>13:00</option>
						<option value='14:00:00'>14:00</option>
						<option value='15:00:00'>15:00</option>
						<option value='16:00:00'>16:00</option>
						<option value='17:00:00'>17:00</option>
						<option value='18:00:00'>18:00</option>
						<option value='19:00:00'>19:00</option>
						<option value='20:00:00'>20:00</option>
						<option value='21:00:00'>21:00</option>
						<option value='22:00:00'>22:00</option>
						<option value='23:00:00'>23:00</option>
						
				
</select></td>  

<td colspan="3"><select name="bt1"required>
        
						<option value=''>-Select-</option>
						
						<option value='00:00:00'>00:00</option>
						<option value='01:00:00'>01:00</option>
						<option value='02:00:00'>02:00</option>
						<option value='03:00:00'>03:00</option>
						<option value='04:00:00'>04:00</option>
						<option value='05:00:00'>05:00</option>
						<option value='06:00:00'>06:00</option>
						<option value='07:00:00'>07:00</option>
						<option value='08:00:00'>08:00</option>
						<option value='09:00:00'>09:00</option>
						<option value='10:00:00'>10:00</option>
						<option value='11:00:00'>11:00</option>
						<option value='12:00:00'>12:00</option>
						<option value='13:00:00'>13:00</option>
						<option value='14:00:00'>14:00</option>
						<option value='15:00:00'>15:00</option>
						<option value='16:00:00'>16:00</option>
						<option value='17:00:00'>17:00</option>
						<option value='18:00:00'>18:00</option>
						<option value='19:00:00'>19:00</option>
						<option value='20:00:00'>20:00</option>
						<option value='21:00:00'>21:00</option>
						<option value='22:00:00'>22:00</option>
						<option value='23:00:00'>23:00</option>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


	
	<tr>

<td colspan="10" align="center"bgcolor="lightgreen"><strong>Total Intake </strong></td>
<td colspan="10" align="center"bgcolor="red"><strong>Total Output </strong></td>

</tr>
<tr>

<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Oral</strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong><?php echo $test5;?> </strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Vomitus</strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong><?php echo $test11;?></strong></td>
</tr>

<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong>IV</strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong><?php echo $test4;?> </strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>NG</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test22;?>  </strong></td>


</tr>



<tr>


<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Urine</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test33;?> </strong></td>


</tr>


<tr>


<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Stool</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test009;?> </strong></td>


</tr>

<tr>


<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-1</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test44;?> </strong></td>


</tr>


<tr>


<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-2</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test55;?> </strong></td>


</tr>


<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-3</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test66;?> </strong></td>


</tr>

<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-4</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test77;?> </strong></td>


</tr>


<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-5</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test88;?> </strong></td>


</tr>


<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-6</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test99;?></strong></td>


</tr>

<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-7</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test00;?> </strong></td>


</tr>





<td colspan="3" align="center"bgcolor="lightblue"><strong>Total Intake</strong></td>
<td colspan="3" align="center"><font size="4.5"><strong><?php echo $test;?> ml</strong></td>
<td colspan="3" align="center"bgcolor="lightblue"><strong>Total Outake</strong></td>
<td colspan="3" align="center"><font size="4.5"><strong><?php echo $test1;?> ml</strong></td>
<td colspan="4" align="center"bgcolor="red"><strong>Difference</strong></td>
<td colspan="4" align="center"><font size="4.5" color="#FF0000"><strong><?php echo $test3;?> ml</strong></td>
</tr>


      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>
</form>


</body>
</html>
