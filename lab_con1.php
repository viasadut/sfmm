<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>



<?php

$user=$_SESSION["sess_username"];
$q1 = $_GET['q'];
$q=date('Y-m-d', strtotime($q1));
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
require('db1.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

$sql="SELECT COUNT(id) FROM alltest WHERE rdate = '".$q."' and cby='153' order by id asc";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$r1=$row['COUNT(id)'];


$sqli="SELECT COUNT(id) FROM iinves WHERE ndate = '".$q."' and conby='153' order by id asc";
$resulti = mysqli_query($con,$sqli);
$rowi= mysqli_fetch_array($resulti);
$r1i=$rowi['COUNT(id)'];


$sqle="SELECT COUNT(id) FROM einves WHERE ndate = '".$q."' and conby='153' order by id asc";
$resulte = mysqli_query($con,$sqle);
$rowe= mysqli_fetch_array($resulte);
$r1e=$rowe['COUNT(id)'];


$nahar=$r1+$r1i+$r1e;


$sqlo="SELECT COUNT(id) FROM alltest WHERE rdate = '".$q."' and cby='910' order by id asc";
$resulto = mysqli_query($con,$sqlo);
$rowo = mysqli_fetch_array($resulto);
$r1o=$rowo['COUNT(id)'];


$sqloi="SELECT COUNT(id) FROM iinves WHERE ndate = '".$q."' and conby='910' order by id asc";
$resultoi = mysqli_query($con,$sqloi);
$rowoi = mysqli_fetch_array($resultoi);
$r1oi=$rowoi['COUNT(id)'];

$sqloe="SELECT COUNT(id) FROM einves WHERE ndate = '".$q."' and conby='910' order by id asc";
$resultoe = mysqli_query($con,$sqloe);
$rowoe = mysqli_fetch_array($resultoe);
$r1oe=$rowoe['COUNT(id)'];


$nazma=$r1o+$r1oi+$r1oe;



$sqlo1="SELECT COUNT(id) FROM alltest WHERE rdate = '".$q."' and cby='865' order by id asc";
$resulto1 = mysqli_query($con,$sqlo1);
$rowo1 = mysqli_fetch_array($resulto1);
$r1o1=$rowo1['COUNT(id)'];


$sqlo1i="SELECT COUNT(id) FROM iinves WHERE ndate = '".$q."' and conby='865' order by id asc";
$resulto1i = mysqli_query($con,$sqlo1i);
$rowo1i = mysqli_fetch_array($resulto1i);
$r1o1i=$rowo1i['COUNT(id)'];

$sqlo1i="SELECT COUNT(id) FROM einves WHERE ndate = '".$q."' and conby='865' order by id asc";
$resulto1i = mysqli_query($con,$sqlo1i);
$rowo1i = mysqli_fetch_array($resulto1i);
$r1o1i=$rowo1i['COUNT(id)'];


$anis=$r1o1+$r1o1i+$r1o1i;



echo "<table width='100%' height ='100%' border='1' align='center' bgcolor='#FFFF99' style='border-collapse:collapse;'>
<tr>
<th style='background-color:lightgreen;font-size:38px;font-weight:bold'>Dr. Kamrun Nahar :".$nahar." </th>
<th style='background-color:lightgreen;font-size:38px;font-weight:bold'>Dr. Nazma :".$nazma." </th>
<th style='background-color:lightgreen;font-size:38px;font-weight:bold'>Dr. Anis :".$anis." </th>

</tr>";

echo "</table>";

?>
</body>
</html>