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
$sql="Select * from inpatient where adoc='".$q1."' and discharge='' order by  id asc";
$result = mysqli_query($con,$sql);
$count=1;

echo "<table width='100%' height ='100%' border='1' align='center' bgcolor='#FFFF99' style='border-collapse:collapse;'>
<tr>
            <th width=4%'><strong>S.No</strong></th>
      <th width=17%><strong>Patient's Name</strong></th>
      <th width=10%><strong>MRN</strong></th>
	  <th width=10%><strong>Category</strong></th>
      <th width=15%><strong>Doctor's Name </strong>
      <th width=14%><strong>Admission Date</strong>   
	  <th width=24%><strong>Working Diagnosis</strong>
      <th width=14%><strong>Room No</strong>
      <th width=14%><strong>Bed No</strong>
	  <th width=14%><strong>Days Staying</strong>
      <th width=14%><strong>Summary Treatment</strong>
      <th width=5%><strong>Transfer Bed</strong>
	  <th width=5%><strong>PWL</strong>
	  <th width=10%><strong>Covid Result</strong>
	  <th width=14%><strong>OT Clearance</strong>

	   </tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $count . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['pname'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['pmrn'] . "";
  
  
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
		  <a target='_blank' href='ipallmng?pmrn=".$n."&eid=".$n1."'><strong><img src='baby1.png' title='Baby Details of ".$n."' width='50' height='50' /></strong></a>

   </a> ";}	
	
	

	    
		  
		

	  
 }
	  else if($b_pmrn==$pmrn){
		  
		 echo "<a target='_blank' href='ipallmng?pmrn=".$m_pmrn."&eid=".$m_eid."'><strong><img src='mother1.png' title='Mother Details' width='50' height='50' /></strong></a>

   </a>   ";
	  }
	  
	  
  echo "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['type'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['adoc'] . "</td>";

  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['adate'] . "</td>";
  
  
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




  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>"; 
  echo "<a target='_blank' href='diap?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>".$inves."</a>";
  echo "</td>";
  
   echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['room'] . "</td>";
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['room1'] . "</td>";
  
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $rr . "</td>";
  
  
 
  
  
  

  
  
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>"; 
  echo "<a target='_blank' href='imo_summary_treatment?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>Summary Treatment</a>";
  echo "</td>";
  
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>"; 
  echo "<a target='_blank' href='imotdoc?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>transfer</a>";
  echo "</td>";
  
  
  echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'>"; 
  echo "<a target='_blank' href='todolist?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>PWL</a>";
  echo "</td>";
  
   echo "<td style='background-color:lightbllue;font-size:18px;font-weight:bold'></td>"; 
  if($rows_ot>0 and $m_c!='')
	{ 
echo "<td align='center' style='background-color:lightgreen;'>OT Clearance Done</td>";
	}
	
	else if($rows_ot>0 and $m_c=='')
	{ 
echo "<td align='center' style='background-color:red;'>Waiting For OT Clearance</td>";
	}
	
	else 
	{ 
echo "<td align='center' style='background-color:lightblue;'></td>";
	}
  
  
  echo "</tr>";

  $count++;
  }
echo "</table>";

mysqli_close($con);

}
?>
</body>
</html>