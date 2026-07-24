<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy02','mng','pharmacy')"; 
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
//$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
//$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
//$bt=$_REQUEST["bt"];

/*$query43 = "SELECT COUNT(pmrn) FROM otreport where date1 BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);*/
$pmrn1=$_REQUEST['search'];
$select=$_REQUEST['select'];
if($select=='id')
{
	
	
	$query43 = "SELECT * FROM presnew where id='$pmrn1';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$pmrn=$row43['pmrn'];
$eid=$row43['eid'];
$dname=$row43['dname'];


	$runningTime = date('Ymdis')+$pmrn1;
$sno=$runningTime+$pmrn+$eid;
	

$url = "phar_update_bill3_new_opd?pmrn=$pmrn&dname=$dname&eid=$eid&sno=$sno";
header("Location: $url"); 
}

else if($select=='MRN')

{
	$url = "?pmrn=$pmrn"; 
header("Location: $url"); 
	
}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>




</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO PATIENT'S SEARCH PANEL</p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 
<td colspan="2"><select name="select" required>
	  <option value='id'>Prescription ID</option>

	  
	  
	  </select></td>

<td colspan="3"><input type="text" name="search"placeholder="ENTER MRN OR PRESCRIPTION ID"></td>

<td colspan="3"><button type="submit" name="bsearch">Search</button></td>
</tr>


	  

    
  </tbody>
</table>
</form>

</body>

</html>
