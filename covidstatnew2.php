<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','covid1')"; 
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
$start=$_REQUEST["stdate"];
$end=$_REQUEST["endate"];



$query43 = "SELECT COUNT(sid) FROM covidopd where ssent BETWEEN '$start' and '$end' and sam='NEW' and status !='collected'"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(sid) FROM covidopd where ssent BETWEEN '$start' and '$end' and sam='FollowUp' and status='collected'"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);

$query45 = "SELECT COUNT(sid) FROM covidopd where ssent BETWEEN '$start' and '$end' and sam='Death' and status='collected'"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);


$query46 = "SELECT COUNT(sid) FROM covidopd where ssent BETWEEN '$start' and '$end' and tresult!='' and status='collected'"; 
	 
$result46 = mysqli_query($con, $query46) or die(mysqli_error());
$row46 = mysqli_fetch_assoc($result46);


$query47 = "SELECT COUNT(sid) FROM covidopd where ssent BETWEEN '$start' and '$end' and tresult='P' and status='collected'"; 
	 
$result47 = mysqli_query($con, $query47) or die(mysqli_error());
$row47 = mysqli_fetch_assoc($result47);

$query48 = "SELECT COUNT(sid) FROM covidopd where ssent BETWEEN '$start' and '$end' and tresult='N' and status='collected'"; 
	 
$result48 = mysqli_query($con, $query48) or die(mysqli_error());
$row48 = mysqli_fetch_assoc($result48);



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
    max-width: 1600px;
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
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" placeholder="Select Date" size="15" value="2020-08-09" readonly></td>  
					 <td colspan="2"><input type="text" name="endate" placeholder="Select Date" size="15" value="2020-08-09" readonly></td>  
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
            <th width="2%"><strong>SNO</strong></th>
	  <th width="2%"><strong>ID</strong></th>
	  <th width="2%"><strong>LAB ID</strong></th>
      <th width="5%"><strong>Name</strong></th>
      <th width="5%"><strong>Collection Date</strong></th>
      <th width="7%"><strong>Phone</strong></th>
       
      <th width="5%"><strong>Address</strong></th>
	  <th width="5%"><strong>Ward</strong></th>
	  <th width="5%"><strong>District</strong></th>
      <th width="5%"><strong>Sample Type</strong></th>
	  <th width="5%"><strong>Patient Type</strong></th>
	  <th width="5%"><strong>Result</strong></th>
	  <th width="5%"><strong>Edit</strong></th>

	  <th width="1%"><strong>Print Report</strong></th>
	  <th width="1%"><strong>Status</strong></th>
	  <th width="1%"><strong>I. Status</strong></th>
	  <th width="2%"><strong>SMS MSG</strong></th>
	  

	   </tr>
  </thead>
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=$_REQUEST["stdate"];
$end=$_REQUEST["endate"];

//$id=$_REQUEST["id"];


echo "<font color=blue font size=5> Total- ";
echo   $row43['COUNT(sid)'] +$row44['COUNT(sid)']+$row45['COUNT(sid)'];
echo "<font color=blue font size=5> Samples Collected, ";
echo   $row46['COUNT(sid)'];
echo "<font color=blue font size=5> Test Done, ";

echo   $row47['COUNT(sid)'];
echo "<font color=blue font size=5> Positive, ";

echo   $row48['COUNT(sid)'];
echo "<font color=blue font size=5> Negative ";
echo "<br>";
echo "<font color=blue font size=5> (New Sample -";
echo   $row43['COUNT(sid)'];
echo "<font color=blue font size=5> & FollowUp Sample -";
echo  $row44['COUNT(sid)'];
echo "<font color=blue font size=5> & Death Sample -";
echo  $row45['COUNT(sid)'];

echo ") ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from covidopd where ssent BETWEEN '$start' and '$end' and status !='Collected' and bstatus='Paid' order by ssent asc;";
 
$count=1;
//$sel_query="Select * from presnew where dname='$bt' and date BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     <td align="center"><?php echo $count; ?></td>
      
	  <td align="center"><?php echo $row["sid"]; ?></td>
	  <td align="center"><?php echo $row["lid"]; ?></td>
      <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row["ssent"])); ?></td>
      <td align="center"><?php echo $row["phone"]; ?>  </td>
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["padd"];?> </td>
<td align="center"><?php echo $row["ward"]; ?>  </td>
<td align="center"><?php echo $row["district"]; ?>  </td>
<td align="center"><?php echo $row["sam"]; ?>  </td>
<td align="center"><?php echo $row["tp"]; ?>  </td>
<?php
$tt=$row['tresult'];
$ls=$row['lstatus'];
$id4=$row['id'];
$url2="covid1opd13?id=$id4";
?>
<?php 
$id2=$row['id'];
$dstatus=$row['dconfirm'];
$url="covidopdprint?id=$id2";
?>


<td align="center"><?php if($tt=='P'){echo "<span style='color:red;text-align:center;'><b>$tt"; }else {echo "<span style='color:green;text-align:center;'><b>$tt";} ?>  </td>


<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($ls!='Received' and $dstatus !='confirmed'){echo"<a target='_blank' href='$url2'>Edit</a>";} else{echo'';} ?></td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($row['tresult']!=''and $dstatus =='confirmed'){echo"<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='25' height='15' /></a>";}else{echo'Report Pending';} ?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($dstatus=='' and $tt !=''){echo"<span style='color:red;text-align:center;'><b>Updated By Technologist";}else if($dstatus=='confirmed' and $tt !=''){echo"<span style='color:green;text-align:center;'><b>Confirmed By Consultant";}  else{echo"<span style='color:blue;text-align:center;'><b>Result Pending";}?></td>


<?php

$id8=$row['id'];
$inform=$row['informs'];
$dstatus=$row['dconfirm'];
$url8 = "covidinform?id=$id8&sdate=$start&edate=$end"; 
?>
<td align="center"><?php if($inform=='Informed' and $dstatus=='confirmed'){echo "<span style='color:green;text-align:center;'><b>Already Informed";}else {echo '';}?></td>


<?php 
$id2=$row['id'];
$dcon=$row["dconfirm"];
$url="covidopdprint?id=$id2";
$n='Name- '.$row['name'].'<br>'.'ID- '.$row['sid'].'<br>'.'Sample Date- '.$row['ssent1'].'<br>'.'Result- POSITIVE';
$n1='Name- '.$row['name'].'<br>'.'ID- '.$row['sid'].'<br>'.'Sample Date- '.$row['ssent1'].'<br>'.'Result- NEGATIVE';
?>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($row['tresult']=='P' and $dcon=='confirmed'){echo"$n";}else if($row['tresult']=='N' and $dcon=='confirmed'){echo"$n1";}else{echo'';} ?></td>
      </tr>
	  
<?php $count++; } }?>





     

      <td colspan ="7" align="right"><a target='_blank' href="test_pdf12?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  <td colspan ="7" align="right"><a target='_blank' href="testcovid?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="printdt.jpg" title="Print Report" width="150" height="60" /></a></td>	
	  <td colspan ="6" align="right"><a target='_blank' href="test_pdf12l?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>">PRINT FOR LAB</a></td>	
  </tbody>
</table>


</form>
</body>
</html>
