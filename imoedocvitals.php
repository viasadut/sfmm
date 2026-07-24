<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('imo','nurse','doctor','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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

$querytemp = "SELECT COUNT(hrd) FROM vitalstemp where pmrn='$pmrn' and date1='$odate1'"; 
	 
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
$ins_queryspo2="insert into vitalsspo2 (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`) values ('$pname', '$pmrn','$eid','$odate1','SPO2','$spo2','$countspo21','$user','$odate','$time')";
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
$ins_queryrr="insert into vitalsrr (`pname`,`pmrn`,`eid`,`date1`,`vitails1`,`score1`,`hrd`,`user`,`date2`,`time`) values ('$pname', '$pmrn','$eid','$odate1','RR','$rr','$countrr1','$user','$odate','$time')";
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
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


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
   <li><a href='inviewnew1'><span>Home</span></a></li>
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
<h4><a target='_blank' href="test4545.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">See Graph</a>
&nbsp;&nbsp;<a href="dgraph2.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>">Datewise Graph</a>&nbsp;&nbsp;<a href="height.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Height Graph</a>&nbsp;&nbsp;<a href="weight.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Weight Graph</a>&nbsp;&nbsp;<a href="bp.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">BP Graph</a>&nbsp;&nbsp;<a href="pulse.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Pulse Graph</a>&nbsp;&nbsp;<a href="temp.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Temperature Graph</a>&nbsp;&nbsp;<a href="spo2.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">SPO2 Graph</a>&nbsp;&nbsp;<a href="rr.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">RR Graph</a>&nbsp;&nbsp;<a href="pain.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Pain Score Graph</a>&nbsp;&nbsp;<a href="tempu.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid";?>&odate1=<?php echo "$odate1";?>">Temperature Chart New</a></h4></h4>
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

						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Vitals Entry Form</strong></label></td> </tr>
<tr>
<td colspan="2" align="center"><label><strong>Time</strong></label></td> 
<td colspan="2" align="center"><label><strong>Height(CM)</strong></label></td> 
<td colspan="2" align="center"><label><strong>Weight(KG)</strong></label></td> 
<td colspan="2" align="center"><label><strong>Pulse</strong></label></td> 
<td colspan="2" align="center"><label><strong>SBP</strong></label></td>
<td colspan="2" align="center"><label><strong>DBP</strong></label></td>
<td colspan="2" align="center"><label><strong>SPO2</strong></label></td> 
<td colspan="2" align="center"><label><strong>Temperature</strong></label></td> 
<td colspan="2" align="center"><label><strong>RR</strong></label></td> 
<td colspan="2" align="center"><label><strong>Pain Score</strong></label></td> 



</tr>
<tr>
<td colspan="2" align="center"><select name="time"  value="" required>
<option value="">-Select Time-</option>
<option value="12:00AM">12:00AM</option>
<option value="12:10AM">12:10AM</option>
<option value="12:20AM">12:20AM</option>
<option value="12:30AM">12:30AM</option>
<option value="12:40AM">12:40AM</option>
<option value="12:50AM">12:50AM</option>
<option value="01:00AM">01:00AM</option>
<option value="01:10AM">01:10AM</option>
<option value="01:20AM">01:20AM</option>
<option value="01:30AM">01:30AM</option>
<option value="01:40AM">01:40AM</option>
<option value="01:50AM">01:50AM</option>
<option value="02:00AM">02:00AM</option>
<option value="02:10AM">02:10AM</option>
<option value="02:20AM">02:20AM</option>
<option value="02:30AM">02:30AM</option>
<option value="02:40AM">02:40AM</option>
<option value="02:50AM">02:50AM</option>
<option value="03:00AM">03:00AM</option>
<option value="03:10AM">03:10AM</option>
<option value="03:20AM">03:20AM</option>
<option value="03:30AM">03:30AM</option>
<option value="03:40AM">03:40AM</option>
<option value="03:50AM">03:50AM</option>
<option value="04:00AM">04:00AM</option>
<option value="04:10AM">04:10AM</option>
<option value="04:20AM">04:20AM</option>
<option value="04:30AM">04:30AM</option>
<option value="04:40AM">04:40AM</option>
<option value="04:50AM">04:50AM</option>
<option value="05:00AM">05:00AM</option>
<option value="05:10AM">05:10AM</option>
<option value="05:20AM">05:20AM</option>
<option value="05:30AM">05:30AM</option>
<option value="05:40AM">05:40AM</option>
<option value="05:50AM">05:50AM</option>
<option value="06:00AM">06:00AM</option>
<option value="06:10AM">06:10AM</option>
<option value="06:20AM">06:20AM</option>
<option value="06:30AM">06:30AM</option>
<option value="06:40AM">06:40AM</option>
<option value="06:50AM">06:50AM</option>
<option value="07:00AM">07:00AM</option>
<option value="07:10AM">07:10AM</option>
<option value="07:20AM">07:20AM</option>
<option value="07:30AM">07:30AM</option>
<option value="07:40AM">07:40AM</option>
<option value="07:50AM">07:50AM</option>
<option value="08:00AM">08:00AM</option>
<option value="08:10AM">08:10AM</option>
<option value="08:20AM">08:20AM</option>
<option value="08:30AM">08:30AM</option>
<option value="08:40AM">08:40AM</option>
<option value="08:50AM">08:50AM</option>
<option value="08:00AM">08:00AM</option>
<option value="09:00AM">09:00AM</option>
<option value="09:10AM">09:10AM</option>
<option value="09:20AM">09:20AM</option>
<option value="09:30AM">09:30AM</option>
<option value="09:40AM">09:40AM</option>
<option value="09:50AM">09:50AM</option>
<option value="10:00AM">10:00AM</option>
<option value="10:10AM">10:10AM</option>
<option value="10:20AM">10:20AM</option>
<option value="10:30AM">10:30AM</option>
<option value="10:40AM">10:40AM</option>
<option value="10:50AM">10:50AM</option>
<option value="11:00AM">11:00AM</option>
<option value="11:10AM">11:10AM</option>
<option value="11:20AM">11:20AM</option>
<option value="11:30AM">11:30AM</option>
<option value="11:40AM">11:40AM</option>
<option value="11:50AM">11:50AM</option>
<option value="11:00AM">11:00AM</option>
<option value="12:00PM">12:00PM</option>
<option value="12:10PM">12:10PM</option>
<option value="12:20PM">12:20PM</option>
<option value="12:30PM">12:30PM</option>
<option value="12:40PM">12:40PM</option>
<option value="12:50PM">12:50PM</option>
<option value="01:00PM">01:00PM</option>
<option value="01:10PM">01:10PM</option>
<option value="01:20PM">01:20PM</option>
<option value="01:30PM">01:30PM</option>
<option value="01:40PM">01:40PM</option>
<option value="01:50PM">01:50PM</option>
<option value="02:00PM">02:00PM</option>
<option value="02:10PM">02:10PM</option>
<option value="02:20PM">02:20PM</option>
<option value="02:30PM">02:30PM</option>
<option value="02:40PM">02:40PM</option>
<option value="02:50PM">02:50PM</option>
<option value="03:00PM">03:00PM</option>
<option value="03:10PM">03:10PM</option>
<option value="03:20PM">03:20PM</option>
<option value="03:30PM">03:30PM</option>
<option value="03:40PM">03:40PM</option>
<option value="03:50PM">03:50PM</option>
<option value="04:00PM">04:00PM</option>
<option value="04:10PM">04:10PM</option>
<option value="04:20PM">04:20PM</option>
<option value="04:30PM">04:30PM</option>
<option value="04:40PM">04:40PM</option>
<option value="04:50PM">04:50PM</option>
<option value="05:00PM">05:00PM</option>
<option value="05:10PM">05:10PM</option>
<option value="05:20PM">05:20PM</option>
<option value="05:30PM">05:30PM</option>
<option value="05:40PM">05:40PM</option>
<option value="05:50PM">05:50PM</option>
<option value="06:00PM">06:00PM</option>
<option value="06:10PM">06:10PM</option>
<option value="06:20PM">06:20PM</option>
<option value="06:30PM">06:30PM</option>
<option value="06:40PM">06:40PM</option>
<option value="06:50PM">06:50PM</option>
<option value="07:00PM">07:00PM</option>
<option value="07:10PM">07:10PM</option>
<option value="07:20PM">07:20PM</option>
<option value="07:30PM">07:30PM</option>
<option value="07:40PM">07:40PM</option>
<option value="07:50PM">07:50PM</option>
<option value="08:00PM">08:00PM</option>
<option value="08:10PM">08:10PM</option>
<option value="08:20PM">08:20PM</option>
<option value="08:30PM">08:30PM</option>
<option value="08:40PM">08:40PM</option>
<option value="08:50PM">08:50PM</option>
<option value="09:00PM">09:00PM</option>
<option value="09:10PM">09:10PM</option>
<option value="09:20PM">09:20PM</option>
<option value="09:30PM">09:30PM</option>
<option value="09:40PM">09:40PM</option>
<option value="09:50PM">09:50PM</option>
<option value="10:00PM">10:00PM</option>
<option value="10:10PM">10:10PM</option>
<option value="10:20PM">10:20PM</option>
<option value="10:30PM">10:30PM</option>
<option value="10:40PM">10:40PM</option>
<option value="10:50PM">10:50PM</option>
<option value="10:00PM">11:00PM</option>
<option value="11:10PM">11:10PM</option>
<option value="11:20PM">11:20PM</option>
<option value="11:30PM">11:30PM</option>
<option value="11:40PM">11:40PM</option>
<option value="11:50PM">11:50PM</option>

</select>

</td>

<td colspan="2" align="center"><input type="text" name="height" class="form-control"placeholder="Height"></td>


<td colspan="2" align="center"><input type="text" name="weight" class="form-control"placeholder="Weight"></td>
<td colspan="2" align="center"><input type="text" name="pulse" class="form-control"placeholder="Pulse"></td>


<td colspan="2" align="center"><input type="text" name="sbp"  class="form-control" placeholder="Systolic"></td>


<td colspan="2" align="center"><input type="text" name="dbp" class="form-control"placeholder="diastolic"></td>
<td colspan="2" align="center"><input type="text" name="spo2" class="form-control"placeholder="SPO2"></td>
<td colspan="2" align="center"><input type="text" name="temp" class="form-control"placeholder="Tempperature"></td>
<td colspan="2" align="center"><input type="text" name="rr" class="form-control"placeholder="RR"></td>
<td colspan="2" align="center"><input type="text" name="pscore" class="form-control"placeholder="Pain Score"></td>




<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
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
	  <td colspan="2" align="center"><strong>Date</strong></td>
       

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
	  <td align="center"colspan="2"><?php echo $row["date2"]; ?></td>
  	  

	  
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
	  <td colspan="5" align="center"><strong>Date</strong></td>
       

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
	  <td align="center"colspan="5"><?php echo $row["date2"]; ?></td>
  	  

	  
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
	  <td colspan="5" align="center"><strong>Date</strong></td>
       

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
	  <td align="center"colspan="5"><?php echo $row["date2"]; ?></td>
  	  

	  
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
	  <td colspan="5" align="center"><strong>Date</strong></td>
       

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
	  <td align="center"colspan="5"><?php echo $row["date2"]; ?></td>
  	  

	  
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
	  <td colspan="5" align="center"><strong>Date</strong></td>
       

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
	  <td align="center"colspan="5"><?php echo $row["date2"]; ?></td>
  	  

	  
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
