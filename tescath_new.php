<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
      header('Location: login2?err=2');
    }
?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 60; URL=$url1");
$test=date('Y-m-d', strtotime('-7 days') );
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/


require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);


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
  font-size: 8px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 30%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

</style>
   <link rel="stylesheet" href="styles.css">
   
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      
	  <li class='active has-sub'><a href='0carmanualsearch_po'><span>Old Patient</span></a></li>
	  <li class='active has-sub'><a href='tescardiospd'><span>Print All Done Reports</span></a></li>
	  <li class='active has-sub'><a href='tescardiospd1'><span>Approval Pending List</span></a></li>
	  
      <li class='last'><a href='callpasschange'><span>Change Password</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<p align="center" class="style1">!! WELCOME !! <?php echo $row39['fullname']; ?>'s Dash Board </p> 
<p align="center" class="style1">Special Diagnosis Request </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    
<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>OPD Request</strong></label></td> </tr>	


    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Date </strong>
      <th width="14%"><strong>Doctor's Name</strong>   
	        <th width="14%"><strong>Procedure Name</strong> 
<th width="14%"><strong>Instruction</strong> 			
       	  
      <th width="14%"><strong>Receive</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from alltest where date1 between '$test' and '$date' and type in('spd1','spd','SPD') and status='' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?></td>
	  	  <td align="center"><?php echo $row["medi"];?></td> 
		  <td align="center"><?php echo $row["ins"];?></td> 
	  

<?php
/*$tt1=$row['pmrn'];
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




*/


?>


<td align="center"colspan="7" align="right"><a href="spd_receive_new?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Receive</a></td>	  


      </tr>
    <?php $count++; } ?>
	
	
		<tr><td colspan="20" align="center"bgcolor="#FF7F50"><label><strong>Inpatient Request</strong></label></td> </tr>	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
//$count=1;
$sel_query3="Select * from iinves where ndate between '$test' and '$date' and type in('spd1','spd','SPD') and rstatus='Ordered' order by id desc;";

$result3 = mysqli_query($con,$sel_query3);
while($row3 = mysqli_fetch_assoc($result3)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
     <td align="center"><?php echo $row3["pname"]; ?></td>
	 <td align="center"><?php echo $row3["pmrn"]; ?></td>
	 <?php
	 
	 $pmrn=$row3['pmrn']; 
$eid=$row3['eid']; 	 
	  $queryc = "SELECT * FROM inpatient where pmrn= '$pmrn' and eid='$eid'"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$fname=$rowc['adoc'];

	 ?>
       
	  <td align="center"><?php echo $row3["odate"]; ?></td> 
<td align="center"><?php echo $fname; ?></td>    
	  <td align="center"><?php echo $row3["infusion"]; ?></td>
	  <td align="center"><?php echo $row3["room"]; ?></td>
	  
	  <?php
/*$tt1=$row['pmrn'];
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




*/


?>


<td align="center"colspan="7" align="right"><a href="spd_receive_new_in?id=<?php echo $row3["id"]; ?>&eid=<?php echo $row3["eid"]; ?>&pmrn=<?php echo $row3["pmrn"]; ?>">Receive</a></td>	  
      
	  	   
	  
      </tr>
    <?php $count++; } ?>
<tr><td colspan="20" align="center"bgcolor="#00FFFF	"><label><strong>A&E Request</strong></label></td> </tr>	
<?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];

$sel_query="Select * from einves where type in('spd1','spd','SPD') and status='Data Updated' and odate1='$date' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pname"]; ?></td>
	 <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"><?php echo $row3["user"]; ?></td> 	  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"><?php echo $row["room"]; ?></td>
	  
	  <?php
/*$tt1=$row['pmrn'];
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];


*/




?>


<td align="center"colspan="7" align="right"><a href="spd_receive_new_ae?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Receive</a></td>	  
      
	  	   
	  
      </tr>
    <?php $count++; } ?>

	</tbody>
</table>
</form>
</body>
</html>
