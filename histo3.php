<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','histo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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




</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='histohome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>






<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
      <th width="14%"><strong>Status</strong>
	        <th width="14%"><strong>Update</strong>
			<th width="14%"><strong>Cancel</strong>
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from histo where status='NOT SEEN' and status1 !='Cancel' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["date"]; ?>  
	  <td align="center"><?php echo $row["indication"]; ?>  
	  	  <td align="center"><?php echo $row["find"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="histo2?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"];?>">UPDATE</a> </td>
		   <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click1();" href="histocancel?id=<?php echo $row["id"]; ?>">Cancel</a> </td>


	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from alltest where status='' and medi in ('HISTOLOGY- SMALL','HISTOLOGY - LARGE','REQUEST FOR HISTOLOGY PARAFFIN','REQUEST FOR HISTOLOGY/CYTOLOGY','SECOND OPINION HISTOPATHOLOGY','HISTOPATHOLOGY-MEDIUM') ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["date"]; ?>  
	  <td align="center">
	  	  <td align="center">
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="histo2doc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"];?>&dname5=<?php echo $row["dname"];?>&daten=<?php echo $row["date1"];?>">UPDATE</a> </td>
		   <td align="center" colspan="1"><a href="labreceivehisto?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>"><strong>RECEIVE</strong></a></td>
		   
<td colspan="1"><a target='_blank' href="sample_receive_print1?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="50" height="50" /></a></td>

	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from iinves where infusion in ('HISTOLOGY- SMALL','HISTOLOGY - LARGE','REQUEST FOR HISTOLOGY PARAFFIN','REQUEST FOR HISTOLOGY/CYTOLOGY','SECOND OPINION HISTOPATHOLOGY','HISTOPATHOLOGY-MEDIUM','HISTOLOGY- LARGE') ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <?php
	  $uu=$row['user'];
$query40 = "SELECT * FROM user where uname= '$uu'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$dd=$row40['fullname'];

	  ?>
	  
      <td align="center"><?php echo $dd; ?>
      <td align="center"><?php echo $row["ordate"]; ?>  
	  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="histo3doc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"];?>&dname5=<?php echo $row["user"];?>&daten=<?php echo $row["ndate"];?>">UPDATE</a> </td>
		   

<td align="center"><a href="labreceivehisto1?pmrn=<?php echo "$row[pmrn]"; ?>&id=<?php echo "$row[id]"; ?>&eid=<?php echo "$row[eid]"; ?>"><strong>RECEIVE</strong></a></td>	  
	       
<td colspan="1"><a target='_blank' href="sample_receive_print?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="50" height="50" /></a></td>

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
  
  
  
  	
</table>

<br><br>


</form>


</body>

</html>
