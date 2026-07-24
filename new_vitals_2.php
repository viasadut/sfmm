<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor')"; 
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
<meta charset="utf-8">
<title>Detail Roster</title>



<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->



* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


#myInput2 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
    overflow: auto;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 5px;
  min-width: 50px;
    
  
}



#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


img {
  border-radius: 50%;
  
}

div2 {
  height: 50px;
  width: 25%;
  border: 1px solid #4CAF50;
  float: right;
  
  
  div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}



}




</style>




<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>



<style>
    @media screen and (min-width: 1280px) {
        .modal-dialog {
          max-width: 1280px; /* New width for default modal */
        }
    }
</style>
   
 
</head>
<body>



<?php

$user=$_SESSION["sess_username"];
$q1 = date('2023-10-26');
$q=date('Y-m-d', strtotime($q1));
$q2=date('d/m/Y', strtotime($q1));
$q_n=date('Y-m-d',strtotime($q. '+1 day'));
$q_n1=date('d/m/Y',strtotime($q. '+1 day'));
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
require('db1.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

echo "<table width='100%' height ='100%' border='1' align='center' bgcolor='#FFFF99' style='border-collapse:collapse;'>
<tr rowspan='20'>
<td colspan='20' style='background-color:lightgreen;font-size:18px;font-weight:bold'>Fluid Chart</td>
</tr>
<tr>
<td style='background-color:lightgreen;font-size:18px;font-weight:bold'>Date & Time</td>
<td style='background-color:lightgreen;font-size:18px;font-weight:bold'>Fluid</td>
<td style='background-color:lightgreen;font-size:18px;font-weight:bold'>BP</td>
<td style='background-color:lightgreen;font-size:18px;font-weight:bold'>SPO2</td>
<td style='background-color:lightgreen;font-size:18px;font-weight:bold'>Temperature</td>
<td style='background-color:lightgreen;font-size:18px;font-weight:bold'>Pulse</td>
<td style='background-color:lightgreen;font-size:18px;font-weight:bold'>RR</td>
</tr>";

  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>08:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="jkhjsdflkjsdlkfjsdlkjf" id="322" class="btn btn-info btn-xs edit_data1" style="display:none"></td>';
 
  echo "</td>";
   echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>09:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>10:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>11:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>12:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>01:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>02:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>03:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>04:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $q2 ."<br>05:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>06:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>07:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>08:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>09:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>10:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:green;'>" . $q2 ."<br>11:00PM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:red;'>" . $q_n1 ."<br>12:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:red;'>" . $q_n1 ."<br>01:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:red;'>" . $q_n1 ."<br>02:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:red;'>" . $q_n1 ."<br>03:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:red;'>" . $q_n1 ."<br>04:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:red;'>" . $q_n1 ."<br>05:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:red;'>" . $q_n1 ."<br>06:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold;color:red;'>" . $q_n1 ."<br>07:00AM</td>";
  //echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data1"></td>';
 
  echo "</td>";
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_bp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_spo2"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_temp"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_pulse"></td>';
 
  echo "</td>";
  
  echo'<td style="background-color:lightbllue;font-size:18px;font-weight:bold;font-color:red"><input type="button" name="2023-03-01"  value="A" id="322" class="btn btn-info btn-xs edit_data_rr"></td>';
 
  echo "</td>";
  
  echo "</tr>";
  

echo "</table>";

?>

<div id="add_data_Modal1" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>Date</label>  
						  
                          <input type="text" class="form-control" name="date" id="date" readonly></td>
						  
						  
		  <?php 
		  /*$gg=$_REQUEST['pmrn1'];
		  
		  $queryi = "SELECT * FROM staff3 where sid= '$gg'"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);

$fu = $rowi['sname'];

		  */
		  ?>
		   <label>Duty Location</label>  
						  <select type="text" name="pbp11" id="pbp11" class="form-control" required>
						
                          
			<?php 
			$sql = "Select * from roaster_location where dept='$dept' ;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  
		  <label>Duty Shift</label>  
						  <select type="text" name="pbp31" id="pbp31" class="form-control" required>
			
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select>
		  
		  
		  
					 
						  
						  
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4" value="Insert" class="btn btn-success" />  

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
           $('#insert_form2')[0].reset();  
      });  
      $(document).on('click', '.edit_data1', function(){  
           var employee_id2 = $(this).attr("id");  
		   var employee_id3 = $(this).attr("name");  
		   
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(employee_id3); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4').val("Add");  
                     $('#add_data_Modal1').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#add_data_Modal1').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
 
 <div id="bp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>SBP</label>  
						  
                          <input type="text" class="form-control" name="sbp" id="sbp" required></td>
						  
						  <label>DBP</label>  
						  
                          <input type="text" class="form-control" name="dbp" id="dbp" required></td>
						  
						  
		 
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4_bp" value="Insert" class="btn btn-success" />  

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
           $('#insert_form_bp')[0].reset();  
      });  
      $(document).on('click', '.edit_data_bp', function(){  
           var employee_id2 = $(this).attr("id");  
		   var employee_id3 = $(this).attr("name");  
		   
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(employee_id3); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4_bp').val("Add");  
                     $('#bp').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#bp').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>



<div id="spo2" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>SPO2</label>  
						  
                          <input type="text" class="form-control" name="sbp" id="sbp" required></td>
						  
						 
						  
		 
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4_spo2" value="Insert" class="btn btn-success" />  

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
           $('#insert_form_spo2')[0].reset();  
      });  
      $(document).on('click', '.edit_data_spo2', function(){  
           var employee_id2 = $(this).attr("id");  
		   var employee_id3 = $(this).attr("name");  
		   
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(employee_id3); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4_spo2').val("Add");  
                     $('#spo2').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#spo2').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
 
 
 <div id="temp" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>Temperature</label>  
						  
                          <input type="text" class="form-control" name="temp" id="temp" required></td>
						  
						 
						  
		 
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4_temp" value="Insert" class="btn btn-success" />  

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
           $('#insert_form_temp')[0].reset();  
      });  
      $(document).on('click', '.edit_data_temp', function(){  
           var employee_id2 = $(this).attr("id");  
		   var employee_id3 = $(this).attr("name");  
		   
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(employee_id3); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4_temp').val("Add");  
                     $('#temp').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#temp').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
 
 <div id="pulse" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>Pulse</label>  
						  
                          <input type="text" class="form-control" name="temp" id="temp" required></td>
						  
						 
						  
		 
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4_pulse" value="Insert" class="btn btn-success" />  

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
           $('#insert_form_pulse')[0].reset();  
      });  
      $(document).on('click', '.edit_data_pulse', function(){  
           var employee_id2 = $(this).attr("id");  
		   var employee_id3 = $(this).attr("name");  
		   
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(employee_id3); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4_pulse').val("Add");  
                     $('#pulse').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#temp').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
 
 
 <div id="rr" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>RR</label>  
						  
                          <input type="text" class="form-control" name="rr" id="rr" required></td>
						  
						 
						  
		 
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4_rr" value="Insert" class="btn btn-success" />  

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
           $('#insert_form_rr')[0].reset();  
      });  
      $(document).on('click', '.edit_data_rr', function(){  
           var employee_id2 = $(this).attr("id");  
		   var employee_id3 = $(this).attr("name");  
		   
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(employee_id3); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4_rr').val("Add");  
                     $('#rr').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#temp').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
 
</body>
</html>

