<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
if(isset($_POST['bsearch']) && $bt='5000'){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];


$query43 = "SELECT COUNT(bfigure) FROM preadm where bfigure >0 and bfigure <=5000 and ddrequest='settled' and  snew BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

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


$query498 = "SELECT bfigure, SUM(bfigure) FROM preadm where bfigure >0 and bfigure <=5000 and ddrequest='settled' and snew BETWEEN '$start' and '$end';";
	 
$result498 = mysql_query($query498) or die(mysql_error());

// Print out result
$row498 = mysql_fetch_array($result498);



}

if(isset($_POST['bsearch']) && $bt='10000'){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];


$query443 = "SELECT COUNT(bfigure) FROM preadm where bfigure >5000 and bfigure <=10000 and ddrequest='settled' and ddrequest='settled' and  snew BETWEEN '$start' and '$end';"; 
	 
$result443 = mysqli_query($con, $query443) or die(mysqli_error());
$row443 = mysqli_fetch_assoc($result443);

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


$query499 = "SELECT bfigure, SUM(bfigure) FROM preadm where bfigure >5000 and bfigure <=10000 and ddrequest='settled' and snew BETWEEN '$start' and '$end';";
	 
$result499 = mysql_query($query499) or die(mysql_error());

// Print out result
$row499 = mysql_fetch_array($result499);


}


if(isset($_POST['bsearch']) && $bt='ALL'){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];


$query45 = "SELECT COUNT(bfigure) FROM preadm where bfigure !='0' and ddrequest='settled' and  snew BETWEEN '$start' and '$end';"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);

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


$query50 = "SELECT bfigure, SUM(bfigure) FROM preadm where bfigure !='0' and ddrequest='settled' and snew BETWEEN '$start' and '$end';";
	 
$result50 = mysql_query($query50) or die(mysql_error());

// Print out result
$row50 = mysql_fetch_array($result50);



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
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
<link rel="stylesheet" href="styles.css">
		<link href='jsnew/fjsnwonts' rel='stylesheet' type='text/css'>







 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

  
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


<h1 align="center">Amount wise Doriddro Fund Reports</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					<tr>
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

						<td colspan="3"><label><strong> Amount</strong></label></td> 
							<td colspan="3"><label><strong> Search</strong></label></td> 
			 				
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"required ></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"required ></td>  
					 <td colspan="3"><select name="bt" required>
						<option value=''>Select</option>
						<option value='ALL'>ALL</option>
						<option value='5000'>0-5000</option>
						<option value='10000'>5001-10000</option>
						
						</select></td>
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="14%"><strong>Patient Phone</strong>   
      <th width="14%"><strong>Doctor's Name</strong>
	   <th width="14%"><strong>Diagnosis</strong>
	  <th width="14%"><strong>Clinical Info</strong>
      <th width="14%"><strong>Amount Requested</strong>
	  <th width="14%"><strong>Amount Given</strong>
	 

	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])) {
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];
if($bt==5000){

echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row43['COUNT(bfigure)'];
echo " ,  From  ";
echo date('d/m/Y',strtotime($start));
echo "  To  ";
echo date('d/m/Y',strtotime($end));
echo " Total Amount Given -"  ;
echo "<font color=red font size=5><b>";
echo $test4=$row498['SUM(bfigure)'];
echo " BDT";
$count=1;
$sel_query="Select * from preadm where bfigure >0 and bfigure <=5000 and ddrequest='settled'and snew BETWEEN '$start' and '$end';";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a  target='_blank' href="ddrequestprint?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      
      <td align="center"><?php echo $row["pphone"]; ?>  
	  <td align="center"><?php echo $row["dname"]; ?>
 <td align="center"><?php echo $row["dia1"]; ?>  
	  <td align="center"><?php echo $row["cinfo"]; ?>       
	 <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["arequest"];?> 
      <td align="center"><?php echo $row["bfigure"]; ?>  
	 
	   
      </tr>
	  
    <?php $count++; } }}?>
	
	
	
	     <?php
	if(isset($_POST['bsearch'])) {
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
		
		
	if ($bt==10000){
//$id=$_REQUEST["id"];


echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row443['COUNT(bfigure)'];
echo " ,  From  ";
echo date('d/m/Y',strtotime($start));
echo "  To  ";
echo date('d/m/Y',strtotime($end));
echo " Total Amount Given -"  ;
echo "<font color=red font size=5><b>";
echo $test4=$row499['SUM(bfigure)'];
echo " BDT";
$count=1;
$sel_query="Select * from preadm where bfigure >5000 and bfigure <=10000 and ddrequest='settled'and snew BETWEEN '$start' and '$end';";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a  target='_blank' href="ddrequestprint?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pname"]; ?></td>
      <td align="center"><a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?>
      
      <td align="center"><?php echo $row["pphone"]; ?>  
	  <td align="center"><?php echo $row["dname"]; ?>
 <td align="center"><?php echo $row["dia1"]; ?>  
	  <td align="center"><?php echo $row["cinfo"]; ?>       
	 <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["arequest"];?> 
      <td align="center"><?php echo $row["bfigure"]; ?>  
	 
	   
      </tr>
	  
    <?php $count++; } }}?>

	
	
	
		     <?php
	if(isset($_POST['bsearch'])) {
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
		
		
	if ($bt=='ALL'){
//$id=$_REQUEST["id"];


echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row45['COUNT(bfigure)'];
echo " ,  From  ";
echo date('d/m/Y',strtotime($start));
echo "  To  ";
echo date('d/m/Y',strtotime($end));
echo " Total Amount Given -"  ;
echo "<font color=red font size=5><b>";
echo $test4=$row50['SUM(bfigure)'];
echo " BDT";
$count=1;
$sel_query="Select * from preadm where bfigure !='0' and ddrequest='settled'and snew BETWEEN '$start' and '$end';";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a  target='_blank' href="ddrequestprint?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pname"]; ?></td>
      <td align="center"><a  target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>"><?php echo $row["pmrn"]; ?>
      
      <td align="center"><?php echo $row["pphone"]; ?>  
	  <td align="center"><?php echo $row["dname"]; ?>
 <td align="center"><?php echo $row["dia1"]; ?>  
	  <td align="center"><?php echo $row["cinfo"]; ?>       
	 <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["arequest"];?> 
      <td align="center"><?php echo $row["bfigure"]; ?>  
	 
	   
      </tr>
	  
    <?php $count++; } }}?>


      
  </tbody>
</table>


</form>
</body>
</html>
