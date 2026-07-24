<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd')"; 
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



$query43 = "SELECT COUNT(name) FROM covid where ssent BETWEEN '$start' and '$end'"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(name) FROM covid where retest BETWEEN '$start' and '$end'"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);

$query45 = "SELECT COUNT(name) FROM covid where sam2 BETWEEN '$start' and '$end'"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);

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
      <th width="2%"><strong>S.No</strong></th>
	  <th width="2%"><strong>S.ID</strong></th>
      <th width="8%"><strong>Name</strong></th>
      <th width="8%"><strong>Contact Pattern</strong></th>
      <th width="8%"><strong>Department</strong>
	  <th width="8%"><strong>designation</strong>
	  <th width="8%"><strong>Phone</strong>
	  <th width="8%"><strong>Sent To</strong>
      <th width="8%"><strong>Sample Sent</strong>   
      <th width="8%"><strong>Test Result</strong>
      <th width="8%"><strong>Retest Date</strong>
	  <th width="8%"><strong>2nd Sample</strong></th>
	  <th width="8%"><strong>within 1 m distance</strong></th>
	  <th width="8%"><strong>Quarantine until</strong></th>
	  <th width="8%"><strong>Retest</strong></th>
	  <th width="8%"><strong>Remarks</strong></th>
	  <th width="8%"><strong>Edit</strong></th>
	  <th width="8%"><strong>P1</strong></th>
	  <th width="8%"><strong>P2</strong></th>
	  

	   </tr>
  </thead>
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));

//$id=$_REQUEST["id"];


echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row43['COUNT(name)'] +$row44['COUNT(name)']+$row45['COUNT(name)'];
echo "<font color=blue font size=5> (New Sample -";
echo   $row43['COUNT(name)'];
echo "<font color=blue font size=5> & Retest Sample -";
echo  $row44['COUNT(name)'];
echo "<font color=blue font size=5> & Re-Retest Sample -";
echo  $row45['COUNT(name)'];

echo ") ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from covid where ssent BETWEEN '$start' and '$end' order by ssent desc;";
 
$count=1;
//$sel_query="Select * from presnew where dname='$bt' and date BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo 'SFMM'.$row["sid"]; ?></td>
	  <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo $row["cp"]; ?>
	  <td align="center"><?php echo $row["depart"]; ?>
	  <td align="center"><?php echo $row["desig"]; ?>
	  <td align="center"><?php echo $row["phone"]; ?>
	  <td align="center"><?php echo $row["sentto"]; ?>
	  <td align="center"><?php echo date('d/m/Y',strtotime($row["ssent"]));?>
	  <?php 
	  $ttr=$row["tresult"];
	  if($row["tresult"]=='P')
	  	  {
			  echo
	  '<td align="center"><font color="red"><b>'.$ttr.'<b></font></td>';}
	  else{ echo '<td align="center"><b>'.$ttr.'<b></td>';}
	  
	  ?>
	  
	  
	  <td align="center"><?php if($row["retest"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["retest"]));}?></td>
	  <td align="center"><?php if($row["sam2"]=='1970-01-01' ||$row["sam2"]=='0000-00-00') {echo '';} else {echo date('d/m/Y',strtotime($row["sam2"]));}?></td>
	  <td align="center"><?php echo $row["cduration"]; ?>
	  <td align="center"><?php if($row["quntil"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["quntil"]));}?></td>
	  
      <td align="center"><?php if($row["retest"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["retest"]));}?></td>
      <td align="center"><?php echo $row["remarks"]; ?>
	  <td align="right"><a target='_blank' href="covideditreport?id=<?php echo $row["id"]; ?>">Edit</a></td>	
<td align="right"><a target='_blank' href="covidreport?id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report" width="30" height="15" /></a></td>	
<td align="right"><a target='_blank' href="covidreport2?id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report" width="30" height="15" /></a></td>	
      </tr>
	  
<?php $count++; } }?>





     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));

//$id=$_REQUEST["id"];


	 $sel_query="Select * from covid where retest BETWEEN '$start' and '$end' order by retest desc;";
 

//$sel_query="Select * from presnew where dname='$bt' and date BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo 'SFMM'.$row["sid"]; ?></td>
	  <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo $row["cp"]; ?>
	  <td align="center"><?php echo $row["depart"]; ?>
	  <td align="center"><?php echo $row["desig"]; ?>
	  <td align="center"><?php echo $row["phone"]; ?>
	  <td align="center"><?php echo $row["sentto"]; ?>
	  <td align="center"><?php echo date('d/m/Y',strtotime($row["ssent"]));?>
	  <?php 
	  $ttr=$row["tresult"];
	  if($row["tresult"]=='P')
	  	  {
			  echo
	  '<td align="center"><font color="red"><b>'.$ttr.'<b></font></td>';}
	  else{ echo '<td align="center"><b>'.$ttr.'<b></td>';}
	  
	  ?>
	  
	  
	  <td align="center"><?php if($row["retest"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["retest"]));}?></td>
	  <td align="center"><?php if($row["sam2"]=='1970-01-01'||$row["sam2"]=='0000-00-00') {echo '';} else {echo date('d/m/Y',strtotime($row["sam2"]));}?></td>
	  <td align="center"><?php echo $row["cduration"]; ?>
	  <td align="center"><?php if($row["quntil"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["quntil"]));}?></td>
	  
      <td align="center"><?php if($row["retest"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["retest"]));}?></td>
      <td align="center"><?php echo $row["remarks"]; ?>
	  <td align="right"><a target='_blank' href="covideditreport?id=<?php echo $row["id"]; ?>">Edit</a></td>	
<td align="right"><a target='_blank' href="covidreport?id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report" width="30" height="15" /></a></td>	
<td align="right"><a target='_blank' href="covidreport2?id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report" width="30" height="15" /></a></td>	
      </tr>
	  
<?php $count++; } }?>


<?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));

//$id=$_REQUEST["id"];


	 $sel_query="Select * from covid where sam2 BETWEEN '$start' and '$end' order by sam2 desc;";
 

//$sel_query="Select * from presnew where dname='$bt' and date BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo 'SFMM'.$row["sid"]; ?></td>
	  <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo $row["cp"]; ?>
	  <td align="center"><?php echo $row["depart"]; ?>
	  <td align="center"><?php echo $row["desig"]; ?>
	  <td align="center"><?php echo $row["phone"]; ?>
	  <td align="center"><?php echo $row["sentto"]; ?>
	  <td align="center"><?php echo date('d/m/Y',strtotime($row["ssent"]));?>
	  <?php 
	  $ttr=$row["tresult"];
	  if($row["tresult"]=='P')
	  	  {
			  echo
	  '<td align="center"><font color="red"><b>'.$ttr.'<b></font></td>';}
	  else{ echo '<td align="center"><b>'.$ttr.'<b></td>';}
	  
	  ?>
	  
	  
	  <td align="center"><?php if($row["retest"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["retest"]));}?></td>
	  <td align="center"><?php if($row["sam2"]=='1970-01-01'||$row["sam2"]=='0000-00-00') {echo '';} else {echo date('d/m/Y',strtotime($row["sam2"]));}?></td>
	  <td align="center"><?php echo $row["cduration"]; ?>
	  <td align="center"><?php if($row["quntil"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["quntil"]));}?></td>
	  
      <td align="center"><?php if($row["retest"]=='1970-01-01') {echo '';} else {echo date('d/m/Y',strtotime($row["retest"]));}?></td>
      <td align="center"><?php echo $row["remarks"]; ?>
	  <td align="right"><a target='_blank' href="covideditreport?id=<?php echo $row["id"]; ?>">Edit</a></td>	
<td align="right"><a target='_blank' href="covidreport?id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report" width="30" height="15" /></a></td>	
<td align="right"><a target='_blank' href="covidreport2?id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report" width="30" height="15" /></a></td>	
      </tr>
	  
<?php $count++; } }?>


      <td colspan ="2" align="right"><a target='_blank' href="covidstatprint?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  <td colspan ="2" align="right"><a target='_blank' href="testcovid?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="printdt.jpg" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>
