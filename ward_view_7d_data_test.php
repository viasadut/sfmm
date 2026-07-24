<?php 
    require('db1.php');
/*$sel7="Select COUNT(id) from noti where user in ('all','$user') and sa='0'";

$resu7 = mysqli_query($con,$sel7);
$rw7 = mysqli_fetch_assoc($resu7);
*/

/*$_SESSION['id'] = $rw7['COUNT(id)'];
echo $pid = $_SESSION['id'];

*/

    session_start();

	$role = $_SESSION['sess_userrole'];
	
/*$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
*/

	?>

<!DOCTYPE html>
<html>
<head>


  <meta name="viewport" content="width=device-width, user-scalable=yes" />

<style>
table {
  border-collapse: collapse;
  width: 100%;
  
}

table, td, th {
  border: 1px solid black;
 padding: 0px;
 font-size:18.5px;
}
tr:nth-child(even) {background-color: #f2f2f2;}
th {text-align: left;}

}



@media screen and (min-width: 900px) {

  form {
    max-width: 900px;
  }
</style>
</head>
<body>





<?php

require('db1.php');
//$conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");
$sql2="SELECT * FROM noti where status='1' and user in ('$user','all')";
$result=mysqli_query($con, $sql2);
$count4=mysqli_num_rows($result);
//echo=$count;




$user=$_SESSION["sess_username"];
$q1 = $_GET['q'];
$q=date('Y-m-d', strtotime($q1));
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');




if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
else{
//mysqli_select_db($con,"ajax_demo");



$ad3=date('d/m/Y H:i:s');

$sel3="Select * from inpatient where '$ad3' between alert1 and alert2 and discharge='' and room1 like '7C%' order by id desc limit 1";

$resu3 = mysqli_query($con,$sel3);
$rw3 = mysqli_fetch_assoc($resu3);
$tt3=$rw3['pmrn'];
$tt4=$rw3['pname'];

$sel4="Select * from inpatient where '$ad3' between alert1 and alert2 and discharge='' and room1 like '7D%' order by id desc limit 1";

$resu4 = mysqli_query($con,$sel4);
$rw4 = mysqli_fetch_assoc($resu4);
$tt55=$rw4['pmrn'];
$tt66=$rw4['pname'];



$sel6="Select COUNT(id) from inpatient where room1 like '7C%' and discharge=''";

$resu6 = mysqli_query($con,$sel6);
$rw6 = mysqli_fetch_assoc($resu6);


$sel66="Select COUNT(id) from inpatient where room1 like '7D%' and discharge=''";

$resu66 = mysqli_query($con,$sel66);
$rw66 = mysqli_fetch_assoc($resu66);



//$rr=$rw6['COUNT(id)'];





$sql="Select * from inpatient where room1 like '7C%' and discharge='' order by room1 asc";
$result = mysqli_query($con,$sql);
$count=1;



$sql1="Select * from inpatient where room1 like '7D%' and discharge='' order by room1 asc";
$result1 = mysqli_query($con,$sql1);
$count1=1;

echo"<form action='' method='GET'>

	
<table>";



if($rw66['COUNT(id)']>0 and $rw6['COUNT(id)']==0){

echo"

<tr>
	   
	    <td colspan='12' style='font-size:20px;color:green;text-align:center;background-color:white;'>
		
		

		<strong>7th Floor D Block</strong>&nbsp;&nbsp;
		
		
		
		</td>
		
	   </tr>
<tr>
      
      <td colspan='3' style=' background-color:lightblue;'><strong>Patient's Name</strong></td>
      <td colspan='1' style=' background-color:lightblue;'><strong>MRN</strong></td>
	  
      <td colspan='2' style=' background-color:lightblue;'><strong>Doctor's Name </strong></td>
      <td colspan='2' style=' background-color:lightblue;'><strong>Admission Date</strong>   </td>
	  
      
      <td colspan='1' style=' background-color:lightblue;'><strong>BED</strong></td>
	  <td colspan='1' style=' background-color:lightblue;'><strong>Day</strong></td>
      
	  <td colspan='1' style=' background-color:lightblue;'><strong>Remarks</strong></td>
	  <td colspan='1' style=' background-color:lightblue;'><strong>Nurse</strong></td>

	   </tr>
";    }


else if($rw66['COUNT(id)']>0 and $rw6['COUNT(id)']>0){

echo"

<tr>
	   
	    <td colspan='12' style='font-size:20px;color:green;text-align:center;background-color:white;'>
		
		

		<strong>7th Floor D Block</strong>&nbsp;&nbsp;
		
		
		
		</td>
		
	   </tr>
<tr>
      
      <td colspan='3' style=' background-color:lightblue;'><strong>Patient's Name</strong></td>
      <td colspan='1' style=' background-color:lightblue;'><strong>MRN</strong></td>
	  
      <td colspan='2' style=' background-color:lightblue;'><strong>Doctor's Name </strong></td>
      <td colspan='2' style=' background-color:lightblue;'><strong>Admission Date</strong>   </td>
	  
      
      <td colspan='1' style=' background-color:lightblue;'><strong>BED</strong></td>
	  <td colspan='1' style=' background-color:lightblue;'><strong>Day</strong></td>
      
	  <td colspan='1' style=' background-color:lightblue;'><strong>Remarks</strong></td>
	  <td colspan='1' style=' background-color:lightblue;'><strong>Nurse</strong></td>

	   </tr>
";    }


	   while($row = mysqli_fetch_array($result1)) {
echo "<tr>";
  
  
  $ad=date('d/m/Y H:i:s');
$pp=$row['pmrn'];
$pp1=$row['eid'];
$sel="Select COUNT(id) from inpatient where '$ad' between alert1 and alert2 and pmrn='$pp' and eid='$pp1'";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);

  
  
  //echo "<td colspan='1'>" . $count1 . "</td>";
  
  if($rw['COUNT(id)']>0){
  echo "<td colspan='3' style='background-color:violet;'>"; 
  echo "".$row['pname']."";
  echo "</td>";
  }
  
  if($rw['COUNT(id)']==0){
  echo "<td colspan='3'>"; 
  echo "".$row['pname']."";
  echo "</td>";
  }
  
  echo "<td colspan='1' >" . $row['pmrn'] . "";
  
  
$pmrn=$row['pmrn'];
$eid=$row['pmrn'];
$baby="Select * from mo_baby where pmrn='$pmrn' and eid='$eid'";
$baby_result = mysqli_query($con, $baby) or die ( mysqli_error());
$data_baby = mysqli_fetch_assoc($baby_result);
$m_pmrn=$data_baby['pmrn'];
$b_pmrn=$data_baby['medi'];
$b_eid=$data_baby['beid'];
$m_eid=$data_baby['eid'];


$baby_w="Select * from inpatient where pmrn='$b_pmrn' and eid='$b_eid' and room1 like 'NURS%' and discharge=''";
$baby_result_w = mysqli_query($con, $baby_w) or die ( mysqli_error());
$data_baby_w = mysqli_fetch_assoc($baby_result_w);

$baby_room=$data_baby_w['room1'];

$baby_w1="Select * from inpatient where pmrn='$b_pmrn' and eid='$b_eid' and room1 NOT like 'NURS%' and discharge=''";
$baby_result_w1 = mysqli_query($con, $baby_w1) or die ( mysqli_error());
$data_baby_w1 = mysqli_fetch_assoc($baby_result_w1);

$baby_room1=$data_baby_w1['room1'];
	  if($m_pmrn==$pmrn)
	  {	  

$baby1="Select * from mo_baby where pmrn='$pmrn'";
$baby_result1 = mysqli_query($con, $baby1) or die ( mysqli_error());

  
while($data_baby1 = mysqli_fetch_assoc($baby_result1))


{ 
 $n=$data_baby1['medi'];
$n1=$data_baby1['beid'];
	
 echo"
		  <a target='_blank' href='imoidetails?pmrn=".$n."&eid=".$n1."'><strong><img src='baby1.png' title='Baby Details of ".$n."' width='20' height='20' /></strong></a>

   </a> ";}	
	
	

	    
		  
		

	  
 }
	  else if($b_pmrn==$pmrn){
		  
		 echo "<a target='_blank' href='imoidetails?pmrn=".$m_pmrn."&eid=".$m_eid."'><strong><img src='mother1.png' title='Mother Details' width='20' height='20' /></strong></a>

   </a>   ";
	  }
	  
	  
  echo "</td>";
  
  echo "<td colspan='2' >" . $row['adoc'] . "</td>";

  echo "<td colspan='2' >" . $row['adate'] . "</td>";
  
  
 $tt1=$row['pmrn']; 
 $rid=$row['eid']; 
 $date5=date('Y-m-d'); 
  
  $query43_o = "SELECT * FROM ot where pmrn= '$tt1' and date5='$date5';"; 
$result43_o = mysqli_query($con, $query43_o) or die(mysqli_error());
$row43_o = mysqli_fetch_assoc($result43_o);

$rows_ot=mysqli_num_rows($result43_o); 
  $m_c=$row43_o['m_clearance'];
  
  


$query73="Select COUNT(disstatus) from inpatient where eid='$rid' and pmrn='$tt1' and disstatus='Discharge Requested' ORDER BY id asc;";
$result73 = mysqli_query($con, $query73) or die(mysqli_error());
$row73 = mysqli_fetch_assoc($result73);
$count75 =$row73['COUNT(disstatus)'];


$query74="Select COUNT(disstatus) from inpatient where eid='$rid' and pmrn='$tt1' and disstatus='Discharge Bill Confirmed'  ORDER BY id asc;";
$result74 = mysqli_query($con, $query74) or die(mysqli_error());
$row74 = mysqli_fetch_assoc($result74);
$count76 =$row74['COUNT(disstatus)'];




  
  $queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];

$date= date('m/d/Y');
$start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
//$diff->format("%R%a Day");

$rr=$diff->format("%a");

$query77="Select COUNT(inves) from diap where eid='$rid' and pmrn='$tt1' and inves LIKE '%dengu%'  ORDER BY id asc;";
$result77 = mysqli_query($con, $query77) or die(mysqli_error());
$row77 = mysqli_fetch_assoc($result77);
$count77 =$row77['COUNT(inves)'];



   
  echo "<td colspan='1' >" . $row['room1'] . "</td>";
  
  echo "<td colspan='1' >" . $rr . "</td>";
  
  
 
  
  
  

  $ns=substr($row['nurse'], 0, 15); 
  
  
  
   
  if($rows_ot>0 and $m_c!='')
	{ 
echo "<td colspan='1' style='background-color:lightgreen;'>C. Done</td>";
	}
	
	else if($rows_ot>0 and $m_c=='')
	{ 
echo "<td colspan='1' style='background-color:lightblue;'>C. Pending</td>";
	}
	
	
	else if($count76>0){
		
echo "<td colspan='1' style='background-color:orange;' >Req. Dis</td>";		
	}
	
	else if($count75>0){
		
echo "<td colspan='1' style='background-color:lightgreen;'>Dis_Bill</td>";		
	}

  else if($baby_room !='')
	{ 
echo "<td colspan='1' style='background-color:pink;' >B. Rooming</td>";
	}

  else if($baby_room1 !=''){

    echo "<td colspan='1' style='background-color:pink'>B. in $baby_room1";
  }
	else 
	{ 
echo "<td colspan='1' ></td>";
  
  }
  
  echo "<td colspan='1' >" . $ns . "</td>";
 

// Print out result



  
  
  echo "</tr>";
  $count1++;
  }
  
echo "<form></table>";

mysqli_close($con);

}
//$cc=1;
//$rw11=1;
if($rw3==true){
							


$txt='One Patient is Admitted in Block - 7C, Patient Name is-'.$tt4.' And Patient- '.'MRN'.$tt3;
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-US');
  
  
  echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">';
 
}


if($rw4==true){
							$txt='One Patient is Admitted in Block - 7D, Patient Name is-'.$tt66.' And Patient- '.'MRN'.$tt55;
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-US');
  
  
  echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">';
						}



?>

</div>


</body>


</html>