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

	$role = isset($_SESSION['sess_userrole']) ? $_SESSION['sess_userrole'] : '';
	
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
$user = isset($_SESSION['sess_username']) ? $_SESSION['sess_username'] : '';
$sql2="SELECT * FROM noti where status='1' and user in ('$user','all')";
$result=mysqli_query($con, $sql2);
$count4=mysqli_num_rows($result);
//echo=$count;




$q1 = isset($_GET['q']) ? $_GET['q'] : '';
$q = ($q1 !== '') ? date('Y-m-d', strtotime($q1)) : date('Y-m-d');
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');




if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
else{
//mysqli_select_db($con,"ajax_demo");


$test=date('Y-m-d');
$ad3=date('d/m/Y H:i:s');

$sel3="Select * from ot where date5= '$test' and status !='Cancel' ORDER BY id asc";

$resu3 = mysqli_query($con,$sel3);
$rw3 = mysqli_fetch_assoc($resu3);
$tt3 = $rw3 ? $rw3['pmrn'] : '';
$tt4 = $rw3 ? $rw3['pname'] : '';




$sel6="Select COUNT(id) from ot where date5= '$test' and status !='Cancel'";

$resu6 = mysqli_query($con,$sel6);
$rw6 = mysqli_fetch_assoc($resu6);





//$rr=$rw6['COUNT(id)'];





$sql="Select * from ot where date5= '$test' and status !='Cancel'";
$result = mysqli_query($con,$sql);
$count=1;



echo"<form action='' method='GET'>

	
<table>";


if($rw6['COUNT(id)']>0){
echo "



<tr>
	   
	    <td colspan='12' style='font-size:20px;color:green;text-align:center;background-color:white;'>
		
		

		<strong>Today's OT List</strong>&nbsp;&nbsp;
		
		
		
		</td>
		
	   </tr>

<tr>
      
      <td colspan='3' style=' background-color:lightblue;'><strong>Patient's Name</strong></td>
      <td colspan='1' style=' background-color:lightblue;'><strong>MRN</strong></td>
	  
      <td colspan='2' style=' background-color:lightblue;'><strong>Surgon Name </strong></td>
      <td colspan='2' style=' background-color:lightblue;'><strong>Anaesthetist Name </strong></td>
      <td colspan='1' style=' background-color:lightblue;'><strong>OT Time</strong>   </td>
	  
      
      <td colspan='1' style=' background-color:lightblue;'><strong>Duration</strong></td>
	  <td colspan='1' style=' background-color:lightblue;'><strong>OT NO</strong></td>
      
	  <td colspan='2' style=' background-color:lightblue;'><strong>Status</strong></td>
	  

	   </tr>
	   
	   
	   
	   "
	   
;}
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  
  
  $ad=date('d/m/Y H:i:s');
$pp=$row['pmrn'];
$pp1=$row['eid'];
$sel="Select COUNT(id) from ot where date5= '$test' and status !='Cancel'";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);

  
  
  //echo "<td colspan='1'>" . $count . "</td>";
  
  if($rw['COUNT(id)']>0){
  echo "<td colspan='3'>"; 
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
$ns=substr($row['nanes'], 0, 20); 
$dn=substr($row['dname'], 0, 20); 

	  
  echo "</td>";
  
  echo "<td colspan='2' >" . $dn . "</td>";
  echo "<td colspan='2' >" . $ns . "</td>";
if($row['stime']!='' and $row['etime']!=''){
  echo "<td colspan='1' >" . $row["stime"].' To '.$row["etime"] . "</td>";
}
else {
  echo "<td colspan='1' ></td>";
}
  
  
  
  

   
  echo "<td colspan='1' >" . $row["duration1"] . "</td>";
  
  echo "<td colspan='1' >" . $row["duration"] . "</td>";
 echo "<td colspan='2' >" . $row["status"] . "</td>";
  
  
  
 
  
  

// Print out result



  
  
  echo "</tr>";

  $count++;
  }
  



  
echo "<form></table>";

mysqli_close($con);

}
//$cc=1;


?>

</div>


</body>


</html>