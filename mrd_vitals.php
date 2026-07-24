<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query4);
$odate1 = date('m/d/Y');  
$date = date('m/d/Y');  
$date7 = date('Y-m-d');  

$start=$data59["aadate"];
$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
$diff1=$diff->format("%d%") +1;

?>

<?php 

$query3 = "SELECT COUNT(hrd) FROM vitalshw where pmrn='$pmrn' and date1='$odate1'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);

$count =$row3['COUNT(hrd)'];
$count1 = $count+1;

?>

<?php 

$querybp = "SELECT COUNT(hrd) FROM vitalsbp where pmrn='$pmrn' and eid='$eid'"; 
	 
$resultbp = mysqli_query($con, $querybp) or die(mysqli_error());

// Print out result
$rowbp = mysqli_fetch_array($resultbp);

$countbp =$rowbp['COUNT(hrd)'];
$countbp1 = $countbp+1;

?>
<?php 

$querypulse = "SELECT COUNT(hrd) FROM vitalspulse where pmrn='$pmrn' and eid='$eid'"; 
	 
$resultpulse = mysqli_query($con, $querypulse) or die(mysqli_error());

// Print out result
$rowpulse = mysqli_fetch_array($resultpulse);

$countpulse =$rowpulse['COUNT(hrd)'];
$countpulse1 = $countpulse+1;

?>
<?php 

$queryspo2 = "SELECT COUNT(hrd) FROM vitalsspo2 where pmrn='$pmrn' and date1='$odate1'"; 
	 
$resultspo2 = mysqli_query($con, $queryspo2) or die(mysqli_error());

// Print out result
$rowspo2 = mysqli_fetch_array($resultspo2);

$countspo2 =$rowspo2['COUNT(hrd)'];
$countspo21 = $countspo2+1;

?>
<?php 

$querytemp = "SELECT COUNT(hrd) FROM vitalstemp where pmrn='$pmrn' and eid='$eid'"; 
	 
$resulttemp = mysqli_query($con, $querytemp) or die(mysqli_error());

// Print out result
$rowtemp = mysqli_fetch_array($resulttemp);

$counttemp =$rowtemp['COUNT(hrd)'];
$counttemp1 = $counttemp+1;

?>

<?php 

$queryrr = "SELECT COUNT(hrd) FROM vitalsrr where pmrn='$pmrn' and date1='$odate1'"; 
	 
$resultrr = mysqli_query($con, $queryrr) or die(mysqli_error());

// Print out result
$rowrr = mysqli_fetch_array($resultrr);

$countrr =$rowrr['COUNT(hrd)'];
$countrr1 = $countrr+1;

?>
<?php 

$querypscore = "SELECT COUNT(hrd) FROM vitalspscore where pmrn='$pmrn' and date1='$odate1'"; 
	 
$resultpscore = mysqli_query($con, $querypscore) or die(mysqli_error());

// Print out result
$rowpscore = mysqli_fetch_array($resultpscore);

$countpscore =$rowpscore['COUNT(hrd)'];
$countpscore1 = $countpscore+1;

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data59['pname'];
$pmrn = $data59['pmrn'];
$eid = $data59['eid'];
$padd = $data59['padd'];
$adm = $data59['adate'];
$pphone=$data59['pphone'];
$page=$data59['age'];
$psex=$data59['gender'];
$odate = date('m/d/Y H:i:s');
$height = $_REQUEST['height'];
$weight = $_REQUEST['weight'];
//$height = $_REQUEST['bmi'];
$pulse = $_REQUEST['pulse'];
$sbp = $_REQUEST['sbp'];
$dbp = $_REQUEST['dbp'];
$spo2 = $_REQUEST['spo2'];
$temp = $_REQUEST['temp'];
$rr = $_REQUEST['rr'];
$pscore = $_REQUEST['pscore'];
//$infu1 = $_REQUEST['infu1'];
//$remarks=$_REQUEST['remarks'];
$time = $_REQUEST['time'];
//$time1 = $_REQUEST['time1'];
//$bp1 = $_REQUEST['bp1'];
//$bp2 = $_REQUEST['bp2'];



if (!empty ($_POST['height'])){
$bmi= ("$weight" / "$height"/"$height") *10000 ;
$ins_query21="insert into vitalshw (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`vitails2`,`score2`,`hrd`,`user`,`date2`,`bmi`,`time`) values ('$pname', '$pmrn','$eid','$odate1','Height','$height','Weight','$weight','$count1','$user','$odate','$bmi','$time')";
mysqli_query($con,$ins_query21) or die("Problem in entry");}

if (!empty ($_POST['sbp'])){
$ins_querybp="insert into vitalsbp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`vitails2`,`score2`,`hrd`,`user`,`date2`,`time`) values ('$pname', '$pmrn','$eid','$date7','sbp','$sbp','dbp','$dbp','$countbp1','$user','$odate','$time')";
mysqli_query($con,$ins_querybp) or die("Problem in entry");}

if (!empty ($_POST['pulse'])){
$ins_querypulse="insert into vitalspulse (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`) values ('$pname', '$pmrn','$eid','$date7','Pulse','$pulse','$countpulse1','$user','$odate','$time')";
mysqli_query($con,$ins_querypulse) or die("Problem in entry");}

if (!empty ($_POST['spo2'])){
$ins_queryspo2="insert into vitalsspo2 (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`date4`) values ('$pname', '$pmrn','$eid','$odate1','SPO2','$spo2','$countspo21','$user','$odate','$time','$date7')";
mysqli_query($con,$ins_queryspo2) or die("Problem in entry");}




if (!empty ($_POST['temp']))

{
	if($diff1=='1'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d1`,`d1temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day1','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");


}

else if($diff1=='2'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d2`,`d2temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day2','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}

else if($diff1=='3'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d3`,`d3temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day3','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='4'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d4`,`d4temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day4','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='5'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d5`,`d5temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day5','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='6'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d6`,`d6temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day6','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='7'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d7`,`d7temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day7','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='8'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d8`,`d8temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day8','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='9'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d9`,`d9temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day9','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='10'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d10`,`d10temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day10','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='11'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d11`,`d11temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day11','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='12'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d12`,`d12temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day12','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='13'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d13`,`d13temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day13','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='14'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d14`,`d14temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day14','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='15'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d15`,`d15temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day15','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='16'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d16`,`d16temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day16','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='17'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d17`,`d17temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day17','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='18'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d18`,`d18temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day18','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='19'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d19`,`d19temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day19','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='20'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d20`,`d20temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day20','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='21'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d21`,`d21temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day21`','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='22'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d22`,`d22temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day22','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='23'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d23`,`d23temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day23','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='24'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d24`,`d24temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day24','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='25'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d25`,`d25temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day25','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='26'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d26`,`d26temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day26','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='27'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d27`,`d27temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day27','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}

else if($diff1=='28'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d28`,`d28temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day28','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='29'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d29`,`d29temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day29','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}


else if($diff1=='30'){
$ins_querytemp="insert into vitalstemp (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`d30`,`d30temp`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','Temperature','$temp','$counttemp1','$user','$odate','$time','Day30','$temp','$date7')";
mysqli_query($con,$ins_querytemp) or die("Problem in entry");}



}



if (!empty ($_POST['rr'])){
$ins_queryrr="insert into vitalsrr (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`,`date7`) values ('$pname', '$pmrn','$eid','$odate1','RR','$rr','$countrr1','$user','$odate','$time','$date7')";
mysqli_query($con,$ins_queryrr) or die("Problem in entry");}











if (!empty ($_POST['pscore'])){
$ins_querypscore="insert into vitalspscore (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`) values ('$pname', '$pmrn','$eid','$odate1','Pain','$pscore','$countpscore1','$user','$odate','$time')";
mysqli_query($con,$ins_querypscore) or die("Problem in entry");}

}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Vitals</title>
  
   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
  

  
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
  height: 32px;
    width: 100px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
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

   
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
     <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>

 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='idetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">Emergency Patients Vitals</h1>
<!-- Form Title -->
<h4>
<a href="bp.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">BP Graph</a>&nbsp;&nbsp;<a href="pulse.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Pulse Graph</a>&nbsp;&nbsp;<a href="tempu.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Temperature Chart</a></h4></h4>
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data59["adoc"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $data59["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data59["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data59["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data59["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="4"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data59["age"]; ?></td>  
             		<td colspan="3"><?php echo $data59["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data59["gender"]; ?></td>
					 <td colspan="4"><?php echo $data59["pphone"]; ?></td>  

			    	 <td colspan="2"><?php echo $data59["room"]; ?></td>  
					 <td colspan="4"><?php echo $data59["room1"]; ?></td>  
					 </tr>

						


<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Patients SBP & DBP </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="3" align="center"><strong>SBP</strong></td>
      <td colspan="2" align="center"><strong>DBP</strong></td>
	  <td colspan="4" align="center"><strong>Checked Time</strong></td>
      <td colspan="3" align="center"><strong>Checking Episode</strong></td>
	  <td colspan="1" align="center"><strong>Date</strong></td>
	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from vitalsbp where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["score1"]; ?></td>  
      <td align="center"colspan="2"><?php echo $row["score2"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["hrd"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["date2"]; ?></td>
	  <?php 
	  $ddt=date('Y-m-d', strtotime('-1 days') );
	  
	  if($ddt<=$row['date1'])
	  {echo
  	  '';
	  }
	  ?>
      </tr>
    <?php $count++; } ?>
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Patients Pulse </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      
      <td colspan="2" align="center"><strong>Pulse</strong></td>
	  <td colspan="4" align="center"><strong>Checked Time</strong></td>
      <td colspan="3" align="center"><strong>Checking Episode</strong></td>
	  <td colspan="4" align="center"><strong>Date</strong></td>
	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from vitalspulse where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  
      <td align="center"colspan="2"><?php echo $row["score1"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["hrd"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["date2"]; ?></td>
  	  
 <?php 
	  $ddt=date('Y-m-d', strtotime('-1 days') );
	  
	  if($ddt<=$row['date1'])
	  {echo
  	  '';
	  }
	  ?>
	  
      </tr>
    <?php $count++; } ?>

	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Patients SPO2 </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      
      <td colspan="2" align="center"><strong>SPO2</strong></td>
	  <td colspan="4" align="center"><strong>Checked Time</strong></td>
      <td colspan="3" align="center"><strong>Checking Episode</strong></td>
	  <td colspan="4" align="center"><strong>Date</strong></td>
	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from vitalsspo2 where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  
      <td align="center"colspan="2"><?php echo $row["score1"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["hrd"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["date2"]; ?></td>
  	  
<?php 
	  $ddt=date('Y-m-d', strtotime('-1 days') );
	  
	  if($ddt<=$row['date4'])
	  {echo
  	  '';
	  }
	  ?>
	  
      </tr>
    <?php $count++; } ?>
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Patients Temperature </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      
      <td colspan="2" align="center"><strong>Temperature</strong></td>
	  <td colspan="4" align="center"><strong>Checked Time</strong></td>
      <td colspan="3" align="center"><strong>Checking Episode</strong></td>
	  <td colspan="4" align="center"><strong>Date</strong></td>
	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from vitalstemp where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  
      <td align="center"colspan="2"><?php echo $row["score1"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["hrd"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["date2"]; ?></td>
  	  
<?php 
	  $ddt=date('Y-m-d', strtotime('-1 days') );
	  
	  if($ddt<=$row['date7'])
	  {echo
  	  '';
	  }
	  ?>

	  
      </tr>
    <?php $count++; } ?>
	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Patients RR </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      
      <td colspan="2" align="center"><strong>RR</strong></td>
	  <td colspan="4" align="center"><strong>Checked Time</strong></td>
      <td colspan="3" align="center"><strong>Checking Episode</strong></td>
	  <td colspan="4" align="center"><strong>Date</strong></td>
	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from vitalsrr where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  
      <td align="center"colspan="2"><?php echo $row["score1"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["hrd"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["date2"]; ?></td>
  	  
<?php 
	  $ddt=date('Y-m-d', strtotime('-1 days') );
	  
	  if($ddt<=$row['date7'])
	  {echo
  	  '';
	  }
	  ?>
	  
      </tr>
    <?php $count++; } ?>
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Patients Pain Score </strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      
      <td colspan="2" align="center"><strong>Pain Score</strong></td>
	  <td colspan="4" align="center"><strong>Checked Time</strong></td>
      <td colspan="3" align="center"><strong>Checking Episode</strong></td>
	  <td colspan="5" align="center"><strong>Date</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from vitalspscore where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  
      <td align="center"colspan="2"><?php echo $row["score1"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["hrd"]; ?></td>
	  <td align="center"colspan="5"><?php echo $row["date2"]; ?></td>
  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Patients Height</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Height</strong></td>
<td colspan="4" align="center"><strong>Checked Time</strong></td>
      <td colspan="3" align="center"><strong>Checking Episode</strong></td>
	  <td colspan="2" align="center"><strong>Date</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from vitalshw where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["score1"]; ?></td>  
<td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["hrd"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["date2"]; ?></td>
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>Patients Weight</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Weight</strong></td>
	  <td colspan="4" align="center"><strong>Checked Time</strong></td>
      <td colspan="3" align="center"><strong>Checking Episode</strong></td>
	  <td colspan="2" align="center"><strong>Date</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from vitalshw where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	    
      <td align="center"colspan="4"><?php echo $row["score2"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["hrd"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["date2"]; ?></td>
  	  

	  
      </tr>
    <?php $count++; } ?>
	
</table>
</form>
<?php echo  $row3['COUNT(hrd)']; ?>
</body>

</html>
<div id="dataModal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit SBP & DBP Portal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_form7" id="insert_form7">  
                         <label>SBP</label>  
                          <input type="text" name="sbp" id="sbp" class="form-control" size="15" required>  
                          
                          <label>DBP</label>  
                          <input type="text" name="dbp" id="dbp" class="form-control"  size="15"required>  
                          
						  
						  
						 <label>Remarks</label>  
                          <input type="text" name="remarks" id="event" class="form-control" value=""  size="15"required >  
						  
						  
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						    <input type="hidden" name="pmrn" id="pmrn" />  
							  <input type="hidden" name="eid" id="eid" />  
                         <input type="submit" name="insert" id="insert450" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form7')[0].reset();  
      });  
      $(document).on('click', '.edit_data_co', function(){  
           var employee_id2 = $(this).attr("id");  
           $.ajax({  
                url:"update_bp.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                      $('#sbp').val(data.score1);  
                     $('#dbp').val(data.score2);  
					 
                    
					 
					 $('#employee_id2').val(data.id);  
                     $('#insert450').val("Update");  
                     $('#add_data_Modal7').modal('show');  
					  
                              

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#sd').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#ds').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"update_bp1.php",  
                     method:"POST",  
                     data:$('#insert_form7').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form7')[0].reset();  
                          $('#add_data_Modal7').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>
 
 
 
 
 <div id="dataModalp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modalp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Pulse Portal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_formp" id="insert_formp">  
                         <label>Pulse</label>  
                          <input type="text" name="pulse" id="pulse" class="form-control" size="15" required>  
                          
                          
						  
						  
						 <label>Remarks</label>  
                          <input type="text" name="remarks" id="event" class="form-control" value=""  size="15"required >  
						  
						  
                          
                          <input type="hidden" name="employee_idp" id="employee_idp" />  
						    <input type="hidden" name="pmrn" id="pmrn" />  
							  <input type="hidden" name="eid" id="eid" />  
                         <input type="submit" name="insertp" id="insert450p" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insertp').val("Insert");  
           $('#insert_formp')[0].reset(); 
      });  
      $(document).on('click', '.edit_data_cop', function(){  
           var employee_idp = $(this).attr("id");  
           $.ajax({  
                url:"update_p.php",  
                method:"POST",  
                data:{employee_idp:employee_idp},  
				
                dataType:"json",  
                success:function(data){  
                      $('#pulse').val(data.score1);  
                      
					 
                    
					 
					 $('#employee_idp').val(data.id);  
                     $('#insert450p').val("Update");  
                     $('#add_data_Modalp').modal('show');  
					  
                              

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_formp').on("submit", function(event){  
           event.preventDefault();  
           if($('#sd').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#ds').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"update_p1.php",  
                     method:"POST",  
                     data:$('#insert_formp').serialize(),  
                     beforeSend:function(){  
                          $('#insertp').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_formp')[0].reset();  
                          $('#add_data_Modalp').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>
 
 
 
  
 <div id="dataModalsp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modalsp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Pulse Portal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_formsp" id="insert_formsp">  
                         <label>SPO2</label>  
                          <input type="text" name="spo2" id="spo2" class="form-control" size="15" required>  
                          
                          
						  
						  
						 <label>Remarks</label>  
                          <input type="text" name="remarks" id="event" class="form-control" value=""  size="15"required >  
						  
						  
                          
                          <input type="hidden" name="employee_idsp" id="employee_idsp" />  
						    <input type="hidden" name="pmrn" id="pmrn" />  
							  <input type="hidden" name="eid" id="eid" />  
                         <input type="submit" name="insertsp" id="insert450sp" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insertsp').val("Insert");  
           $('#insert_formsp')[0].reset(); 
      });  
      $(document).on('click', '.edit_data_cosp', function(){  
           var employee_idsp = $(this).attr("id");  
           $.ajax({  
                url:"update_sp.php",  
                method:"POST",  
                data:{employee_idsp:employee_idsp},  
				
                dataType:"json",  
                success:function(data){  
                      $('#spo2').val(data.score1);  
                      
					 
                    
					 
					 $('#employee_idsp').val(data.id);  
                     $('#insert450sp').val("Update");  
                     $('#add_data_Modalsp').modal('show');  
					  
                              

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_formsp').on("submit", function(event){  
           event.preventDefault();  
           if($('#sd').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#ds').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"update_sp1.php",  
                     method:"POST",  
                     data:$('#insert_formsp').serialize(),  
                     beforeSend:function(){  
                          $('#insertsp').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_formsp')[0].reset();  
                          $('#add_data_Modalsp').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>
 
 
 
  <div id="dataModaltemp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modaltemp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Temperature Portal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_formtemp" id="insert_formtemp">  
                         <label>Temperature</label>  
                          <input type="text" name="temp" id="temp" class="form-control" size="15" required>  
                          
                          
						  
						  
						 <label>Remarks</label>  
                          <input type="text" name="remarks" id="event" class="form-control" value=""  size="15"required >  
						  
						  
                          
                          <input type="hidden" name="employee_idtemp" id="employee_idtemp" />  
						    <input type="hidden" name="pmrn" id="pmrn" />  
							  <input type="hidden" name="eid" id="eid" />  
                         <input type="submit" name="inserttemp" id="insert450temp" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#inserttemp').val("Insert");  
           $('#insert_formtemp')[0].reset(); 
      });  
      $(document).on('click', '.edit_data_cotemp', function(){  
           var employee_idtemp = $(this).attr("id");  
           $.ajax({  
                url:"update_temp.php",  
                method:"POST",  
                data:{employee_idtemp:employee_idtemp},  
				
                dataType:"json",  
                success:function(data){  
                      $('#temp').val(data.score1);  
                      
					 
                    
					 
					 $('#employee_idtemp').val(data.id);  
                     $('#insert450temp').val("Update");  
                     $('#add_data_Modaltemp').modal('show');  
					  
                              

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_formtemp').on("submit", function(event){  
           event.preventDefault();  
           if($('#sd').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#ds').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"update_temp1.php",  
                     method:"POST",  
                     data:$('#insert_formtemp').serialize(),  
                     beforeSend:function(){  
                          $('#inserttemp').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_formtemp')[0].reset();  
                          $('#add_data_Modaltemp').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>
 
 
 
 
 
   <div id="dataModaltrr" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modalrr" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit RR Portal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_formrr" id="insert_formrr">  
                         <label>RR</label>  
                          <input type="text" name="rr" id="rr" class="form-control" size="15" required>  
                          
                          
						  
						  
						 <label>Remarks</label>  
                          <input type="text" name="remarks" id="event" class="form-control" value=""  size="15"required >  
						  
						  
                          
                          <input type="hidden" name="employee_idrr" id="employee_idrr" />  
						    <input type="hidden" name="pmrn" id="pmrn" />  
							  <input type="hidden" name="eid" id="eid" />  
                         <input type="submit" name="insertrr" id="insert450rr" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insertrr').val("Insert");  
           $('#insert_formrr')[0].reset(); 
      });  
      $(document).on('click', '.edit_data_corr', function(){  
           var employee_idrr = $(this).attr("id");  
           $.ajax({  
                url:"update_rr.php",  
                method:"POST",  
                data:{employee_idrr:employee_idrr},  
				
                dataType:"json",  
                success:function(data){  
                      $('#rr').val(data.score1);  
                      
					 
                    
					 
					 $('#employee_idrr').val(data.id);  
                     $('#insert450rr').val("Update");  
                     $('#add_data_Modalrr').modal('show');  
					  
                              

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_formrr').on("submit", function(event){  
           event.preventDefault();  
           if($('#sd').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#ds').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"update_rr1.php",  
                     method:"POST",  
                     data:$('#insert_formrr').serialize(),  
                     beforeSend:function(){  
                          $('#insertrr').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_formrr')[0].reset();  
                          $('#add_data_Modalrr').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>