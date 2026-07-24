<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','covid1','ddf')"; 
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



$query43 = "SELECT COUNT(id) FROM covidopd where ssent between '$start'and '$end' and bstatus='Paid'"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);





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
    max-width: 1300px;
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

<h1 align="center">Covid-19 Stats Report</h1>

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
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    

    <tr>
            <th width="4%"><strong>SNO</strong></th>
	  <th width="4%"><strong>Date</strong></th>
	  <th width="4%"><strong>Staff</strong></th>
      <th width="5%"><strong>OPD</strong></th>
	  <th width="5%"><strong>IPD</strong></th>
	  <th width="5%"><strong>Corporate</strong></th>
	  <th width="5%"><strong>Police</strong></th>
	  <th width="5%"><strong>Outsource</strong></th>
	  <th width="5%"><strong>Outside</strong></th>
	  <th width="5%"><strong>Total</strong></th>
	  <th width="5%"><strong>Positive</strong></th>
	  <th width="5%"><strong>Negative</strong></th>
	  <th width="5%"><strong>Pending</strong></th>
	  <th width="5%"><strong>Percentage</strong></th>
	  
      
	  

	   </tr>
	  

	   
  </thead>
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$start1=date('d/m/Y',strtotime($_REQUEST["stdate"]));
$end1=date('d/m/Y',strtotime($_REQUEST["endate"]));
//$id=$_REQUEST["id"];



echo "From  ";
echo $start1;
echo "  To  ";
echo $end1;

	 $sel_query="Select * from covidopd where ssent between '$start' and '$end' and bstatus='Paid' and status='collected' group by ssent;";
 
$count=1;
//$sel_query="Select * from presnew where dname='$bt' and date BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

             <td align="center"><?php echo $count; ?></td>
      
	  <td align="center"><?php echo $row["ssent1"]; ?></td>
      
	  	  
	  <?php 
	  
	  $tdate=$row['ssent'];
	  
$query46 = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and status='collected'"; 
	 
$result46 = mysqli_query($con, $query46) or die(mysqli_error());
$row46 = mysqli_fetch_assoc($result46);
	  


$query43s = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Staff' and status='collected'"; 
	 
$result43s = mysqli_query($con, $query43s) or die(mysqli_error());
$row43s = mysqli_fetch_assoc($result43s);

$query43o = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp in('OPD') and status='collected'"; 
	 
$result43o = mysqli_query($con, $query43o) or die(mysqli_error());
$row43o = mysqli_fetch_assoc($result43o);

$query43i = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='InPatient' and status='collected'"; 
	 
$result43i = mysqli_query($con, $query43i) or die(mysqli_error());
$row43i = mysqli_fetch_assoc($result43i);

$query43c = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Corporate' and status='collected'"; 
	 
$result43c = mysqli_query($con, $query43c) or die(mysqli_error());
$row43c = mysqli_fetch_assoc($result43c);

$query43p = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Police' and status='collected'"; 
	 
$result43p = mysqli_query($con, $query43p) or die(mysqli_error());
$row43p = mysqli_fetch_assoc($result43p);

$query43ot = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Outsource' and status='collected'"; 
	 
$result43ot = mysqli_query($con, $query43ot) or die(mysqli_error());
$row43ot = mysqli_fetch_assoc($result43ot);

$query43out = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Outside' and status='collected'"; 
	 
$result43out = mysqli_query($con, $query43out) or die(mysqli_error());
$row43out = mysqli_fetch_assoc($result43out);



$query43ptive = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and status='collected' and tresult='P'"; 
	 
$result43ptive = mysqli_query($con, $query43ptive) or die(mysqli_error());
$row43ptive = mysqli_fetch_assoc($result43ptive);

$query43ntive = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and status='collected' and tresult='N'"; 
	 
$result43ntive = mysqli_query($con, $query43ntive) or die(mysqli_error());
$row43ntive = mysqli_fetch_assoc($result43ntive);

$query43nn = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and status='collected' and tresult=''"; 
	 
$result43nn = mysqli_query($con, $query43nn) or die(mysqli_error());
$row43nn = mysqli_fetch_assoc($result43nn);


	  ?>
<td align="center"><?php echo $row43s['COUNT(id)']; ?></td>      
<td align="center"><?php echo $row43o['COUNT(id)']; ?></td>  
<td align="center"><?php echo $row43i['COUNT(id)']; ?></td>      

<td align="center"><?php echo $row43c['COUNT(id)']; ?></td>      
<td align="center"><?php echo $row43p['COUNT(id)']; ?></td>      
<td align="center"><?php echo $row43ot['COUNT(id)']; ?></td>      
<td align="center"><?php echo $row43out['COUNT(id)']; ?></td>   
<td align="center"><?php echo $row46['COUNT(id)']; ?></td>      
<td align="center"><?php echo $row43ptive['COUNT(id)']; ?></td>      
<td align="center"><?php echo $row43ntive['COUNT(id)']; ?></td>      
<td align="center"><?php echo $row43nn['COUNT(id)']; ?></td>      

<td align="center"><?php echo number_format($row43ptive['COUNT(id)']*100/$row46['COUNT(id)'], 2); ?></td>      
      </tr>
	  
<?php $count++; } }?>





        <td colspan ="2" align="right"><a target='_blank' href="covidbillstats3?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	   

      
  </tbody>
</table>


</form>
</body>
</html>
