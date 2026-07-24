<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','imo')"; 
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



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
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
else{
//mysqli_select_db($con,"ajax_demo");


$ad3=date('d/m/Y H:i:s');

$sel3="Select * from inpatient where '$ad3' between alert1 and alert2 and discharge='' order by id desc limit 1";

$resu3 = mysqli_query($con,$sel3);
$rw3 = mysqli_fetch_assoc($resu3);
$tt3=$rw3['pmrn'];
$tt4=$rw3['pname'];






$sql="Select * from inpatient where discharge='' order by room asc";
$result = mysqli_query($con,$sql);
$count=1;

echo "


<form action='' method='GET'>


<table width='100%' height ='100%' border='1' align='center' bgcolor='#eed7a1' style='border-collapse:collapse;' id='myTable'>

<tr>
            <th width=4%' style='font-size:12px; background-color:#eed7a1;'><strong>S.No</strong></th>
      <th width=17% style='font-size:12px; background-color:#eed7a1;'><strong>Patient's Name</strong></th>
      <th width=10% style='font-size:12px; background-color:#eed7a1;'><strong>MRN</strong></th>
	  <th width=10% style='font-size:12px; background-color:#eed7a1;'><strong>Category</strong></th>
      <th width=15% style='font-size:12px; background-color:#eed7a1;'><strong>Doctor's Name </strong>
      <th width=14% style='font-size:12px; background-color:#eed7a1;'><strong>Admission Date</strong>   
	  <th width=24% style='font-size:12px; background-color:#eed7a1;'><strong>Working Diagnosis</strong>
      <th width=14% style='font-size:12px; background-color:#eed7a1;'><strong>Room No</strong>
      <th width=14% style='font-size:12px; background-color:#eed7a1;'><strong>Bed No</strong>
	  <th width=14% style='font-size:12px; background-color:#eed7a1;'><strong>Days Staying</strong>
      <th width=14% style='font-size:12px; background-color:#eed7a1;'><strong>Summary Treatment</strong>
      <th width=5% style='font-size:12px; background-color:#eed7a1;'><strong>Transfer Bed</strong>
	  <th width=5% style='font-size:12px; background-color:#eed7a1;'><strong>PWL</strong>
	  <th width=10% style='font-size:12px; background-color:#eed7a1;'><strong>Covid Result</strong>
	  <th width=14% style='font-size:12px; background-color:#eed7a1;'><strong>OT Clearance</strong>

	   </tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  
  
  $ad=date('d/m/Y H:i:s');
$pp=$row['pmrn'];
$pp1=$row['eid'];
$sel="Select COUNT(id) from inpatient where '$ad' between alert1 and alert2 and pmrn='$pp' and eid='$pp1'";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);

  
  
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>" . $count . "</td>";
  
  if($rw['COUNT(id)']>0){
  echo "<td style='background-color:violet;font-size:12px;font-weight:bold'>"; 
  echo "<a target='_blank' href='imoidetails?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>".$row['pname']."</a>";
  echo "</td>";
  }
  
  if($rw['COUNT(id)']==0){
  echo "<td style='font-size:12px;font-weight:bold;background-color:#eed7a1'>"; 
  echo "<a target='_blank' href='imoidetails?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>".$row['pname']."</a>";
  echo "</td>";
  }
  
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>" . $row['pmrn'] . "";
  
  
	   $pmrn=$row['pmrn'];
	   $baby="Select * from mo_baby where pmrn='$pmrn' or medi='$pmrn'";
$baby_result = mysqli_query($con, $baby) or die ( mysqli_error());
$data_baby = mysqli_fetch_assoc($baby_result);
$m_pmrn=$data_baby['pmrn'];
$b_pmrn=$data_baby['medi'];
$b_eid=$data_baby['beid'];
$m_eid=$data_baby['eid'];
	  if($m_pmrn==$pmrn)
	  {	  

$baby1="Select * from mo_baby where pmrn='$pmrn'";
$baby_result1 = mysqli_query($con, $baby1) or die ( mysqli_error());

  
while($data_baby1 = mysqli_fetch_assoc($baby_result1))


{ 
 $n=$data_baby1['medi'];
$n1=$data_baby1['beid'];
	
 echo"
		  <a target='_blank' href='imoidetails?pmrn=".$n."&eid=".$n1."'><strong><img src='baby1.png' title='Baby Details of ".$n."' width='50' height='50' /></strong></a>

   </a> ";}	
	
	

	    
		  
		

	  
 }
	  else if($b_pmrn==$pmrn){
		  
		 echo "<a target='_blank' href='imoidetails?pmrn=".$m_pmrn."&eid=".$m_eid."'><strong><img src='mother1.png' title='Mother Details' width='50' height='50' /></strong></a>

   </a>   ";
	  }
	  
	  
  echo "</td>";
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>" . $row['type'] . "</td>";
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>" . $row['adoc'] . "</td>";

  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>" . $row['adate'] . "</td>";
  
  
 $tt1=$row['pmrn']; 
 $rid=$row['eid']; 
 $date5=date('Y-m-d'); 
  
  $query43_o = "SELECT * FROM ot where pmrn= '$tt1' and date5='$date5';"; 
$result43_o = mysqli_query($con, $query43_o) or die(mysqli_error());
$row43_o = mysqli_fetch_assoc($result43_o);

$rows_ot=mysqli_num_rows($result43_o); 
  $m_c=$row43_o['m_clearance'];
  
  
  
  $queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];

$date= date('m/d/Y');
$start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
//$diff->format("%R%a days");

$rr=$diff->format("%R%a days");

$query77="Select COUNT(inves) from diap where eid='$rid' and pmrn='$tt1' and inves LIKE '%dengu%'  ORDER BY id asc;";
$result77 = mysqli_query($con, $query77) or die(mysqli_error());
$row77 = mysqli_fetch_assoc($result77);
$count77 =$row77['COUNT(inves)'];


if($count77>0){
  echo "<td style='background-color:orange;font-size:12px;font-weight:bold'>"; 
  echo "<a target='_blank' href='diap?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>".$inves."</a>";
echo "</td>";}

if($count77==0){
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>"; 
  echo "<a target='_blank' href='diap?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>".$inves."</a>";
echo "</td>";}

   echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>" . $row['room'] . "</td>";
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>" . $row['room1'] . "</td>";
  
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>" . $rr . "</td>";
  
  
 
  
  
  

  
  
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>"; 
  echo "<a target='_blank' href='imo_summary_treatment?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>Summary Treatment</a>";
  echo "</td>";
  
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>"; 
  echo "<a target='_blank' href='imotdoc?pmrn=".$row['pmrn']."&eid=".$row['eid']."&id=".$row['id']."'>transfer</a>";
  echo "</td>";
  
  
  echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'>"; 
  echo "<a target='_blank' href='todolist?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>PWL</a>";
  echo "</td>";
  
   echo "<td style='background-color:#eed7a1;font-size:12px;font-weight:bold'></td>"; 
  if($rows_ot>0 and $m_c!='')
	{ 
echo "<td align='center' style='background-color:lightgreen; font-size:12px;'>OT Clearance Done</td>";
	}
	
	else if($rows_ot>0 and $m_c=='')
	{ 
echo "<td align='center' style='background-color:red;font-size:12px;'>Waiting For OT Clearance</td>";
	}
	
	else 
	{ 
echo "<td align='center' style='background-color:#eed7a1;font-size:12px;'></td>";
	}
  
  
  echo "</tr>";

  $count++;
  }
echo "<form></table>";

mysqli_close($con);

}

if($rw3==true)
{
	$txt=' One Patient is registered in PMS, Patient Name is-'.$tt4.' And Patient- '.'MRN'.$tt3;
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-US');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}
?>



</body>


</html>