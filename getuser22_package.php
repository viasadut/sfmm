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
  width: 90%;
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
  margin-bottom: 13px;
}

#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 13px;
}



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 13px;
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

require('db1.php');
//$conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");
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


//$rr=$rw6['COUNT(id)'];





$sql="Select * from package_screening where status='Active' order by id desc";
$result = mysqli_query($con,$sql);
$count=1;



echo "
<form action='' method='GET'>
<table width='100%' height ='100%' border='1' align='center' bgcolor='#eed7a1' style='border-collapse:collapse;' id='myTable'>
<tr>
      <td width='2%' style='font-size:13px; background-color:#eed7a1;'><strong>S.No</strong></td>
      <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>Patient's Name</strong></td>
      <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>MRN</strong></td>
	  <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>Category</strong></td>
      <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>Doctor's Name </strong></td>
      <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>Admission Date</strong>   </td>
	   </tr>";
while($row = mysqli_fetch_array($result)) {
  echo "
  
  
  <tr>";
  
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $count . "</td>";
  

  echo "<td style='background-color:violet;font-size:13px;font-weight:bold'>"; 
  echo "<a target='_blank' href='imo_pack_details?pmrn=".$row['pmrn']."&eid=".$row['eid']."'>".$row['pname']."</a>";
  echo "</td>";
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['pmrn'] . "";
  
  
	  
  echo "</td>";
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['page'] . "</td>";
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['psex'] . "</td>";

  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['package_name'] . "</td>";
  
											



  
  
  echo "</tr>";

  $count++;
  }
echo "<form></table>";

mysqli_close($con);

}


?>




</body>


</html>