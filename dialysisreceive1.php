<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="dialysis"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 20; URL=$url1");

?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
//$full = $row39['fullname'];
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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Discharge The Patinet?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Cancel The Patinet Procedure?");
}

</script>

</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='endonursehome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>







<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="cviewsp1" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Doctor From</strong>
      <th width="14%"><strong>Procedure</strong>  
	  <th width="14%"><strong>Anaes Name</strong>  
      <th width="14%"><strong>Status</strong>
	<th width="14%"><strong>Details</strong>
		<th width="14%"><strong>Discharge</strong>	        
		<th width="14%"><strong>Cancel</strong>	        
				<th width="14%"><strong>Print All Charges</strong>	     
<th width="14%"><strong>Print Nurse Assessment</strong>	     
  				
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$date1=date("y-m-d", strtotime('-3 days') );
  //echo $test;


$count=1;

$sel_query="Select * from dialysispapp where adate between '$date1' and '$date' and discharge !='Discharged' and status!='NOT SEEN'ORDER BY adate asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo date('d/m/Y', strtotime($row["adate"])); ?>  
	  <td align="center"><a href="changechemo?ID=<?php echo $row["ID"]; ?>"><?php echo $row["dreffer"]; ?>  
	  	  <td align="center"><?php echo $row["tname"]; ?>
	  <td align="center"><a href="changeaneschemo?ID=<?php echo $row["ID"]; ?>"><?php echo $row["anes"]; ?> </a> 		  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="dialysisnursedetails?ID=<?php echo $row["ID"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Details</a> </td>
	       

<td align="center" colspan="1"><a onclick="return confirm_click();" href="dislysisdischarge?id=<?php echo $row["ID"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Discharge</a></td>
<td align="center" colspan="1"><a onclick="return confirm_click1();" href="endodischargecancel?id=<?php echo $row["ID"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Cancel</a></td>
<td colspan="1"><a target='_blank' href="dialysisuse.php?pmrn=<?php echo $row["pmrn"]; ?>&full=<?php echo $row["dreffer"]; ?>&eid=<?php echo $row["eid"]; ?>"><img src="print.png" title="Print Report" width="70" height="30" /></a></td>		       
<td colspan="1"><a target='_blank' href="nurseassessmentdialysisprint.php?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><img src="print.png" title="Print Report" width="70" height="30" /></a></td>		       



	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>

<br><br>


</form>


</body>

</html>
