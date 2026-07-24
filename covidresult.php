<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
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
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];
$ugroup = $row39['ugroup'];
$status = $row39['status'];
 
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
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm The Result ?");
}

</script>



</head>


<body>
<div id='cssmenu'>
<ul>
   <li><a href='endohome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>





	
	

<form action="" method="POST">
<h1 align="center"style="background-color:lightgreen;">PENDING COVID RESULT LIST FOR CONFIRMATION</h1>
<!-- Form Title -->
        
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">




    <tr>
      <th width="4%"><strong>SNO</strong></th>
	  <th width="4%"><strong>ID</strong></th>
	  <th width="4%"><strong>LAB ID</strong></th>
      <th width="17%"><strong>Name</strong></th>
      <th width="10%"><strong>Collection Date</strong></th>
      <th width="15%"><strong>Phone</strong>
       
      <th width="14%"><strong>Address</strong>
	  <th width="14%"><strong>Ward</strong>
	  <th width="14%"><strong>District</strong>
      <th width="14%"><strong>Sample Type</strong>
	  <th width="14%"><strong>Patient Type</strong>
	  <th width="14%"><strong>Result</strong>
	  <th width="14%"><strong>Confirm</strong>
	  <th width="14%"><strong>Edit</strong>

	  <th width="14%"><strong>Print Report</strong>

	   </tr>
  
  <tbody>
  
    <?php
	
	if($fullname=='153' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;
$sel_query="Select * from covidopd where ssent between '$test' and '$apdate' and lstatus ='Received' and tresult !='' and dconfirm='' order by tresult desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     <td align="center"><?php echo $count; ?></td>
      
	  <td align="center"><?php echo $row["sid"]; ?></td>
	  <td align="center"><?php echo $row["lid"]; ?></td>
      <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row["ssent"])); ?>
      <td align="center"><?php echo $row["phone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["padd"];?> 
<td align="center"><?php echo $row["ward"]; ?>  </td>
<td align="center"><?php echo $row["district"]; ?>  </td>
<td align="center"><?php echo $row["sam"]; ?>  </td>
<td align="center"><?php echo $row["tp"]; ?>  </td>
<?php
$tt=$row['tresult'];
$ls=$row['lstatus'];
$id4=$row['id'];
$url2="covid1opd1?id=$id4";
?>

<?php 
$id2=$row['id'];
$url="covidopdprint?id=$id2";
$sstatus=$row['bstatus'];
$url4 = "updatecovidd?id=$id4"; 
?>


<td align="center"><?php if($tt=='P'){echo "<span style='color:red;text-align:center;'><b>$tt"; }else {echo "<span style='color:green;text-align:center;'><b>$tt";} ?>  </td>

<td align="center"><?php if($sstatus=='Paid'){echo"<a onclick='return confirm_click();' href='$url4'><strong>Confirm</strong></a>";} else {echo '';}?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($ls=='Received'){echo"<a target='_blank' href='$url2'>Edit</a>";} else{echo'';} ?></td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($row['tresult']!=''){echo"<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='25' /></a>";}else{echo'Report Pending';} ?></td>


</tr>

	<?php $count++;  }}





	else if($fullname=='md' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-10 days') );
$count=1;
$sel_query="Select * from covidopd where ssent between '$test' and '$apdate' and lstatus ='Received' and tresult !='' and dconfirm='' order by tresult desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     <td align="center"><?php echo $count; ?></td>
      
	  <td align="center"><?php echo $row["sid"]; ?></td>
	  <td align="center"><?php echo $row["lid"]; ?></td>
      <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row["ssent"])); ?>
      <td align="center"><?php echo $row["phone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["padd"];?> 
<td align="center"><?php echo $row["ward"]; ?>  </td>
<td align="center"><?php echo $row["district"]; ?>  </td>
<td align="center"><?php echo $row["sam"]; ?>  </td>
<td align="center"><?php echo $row["tp"]; ?>  </td>
<?php
$tt=$row['tresult'];
$ls=$row['lstatus'];
$id4=$row['id'];
$url2="covid1opd1?id=$id4";
?>

<?php 
$id2=$row['id'];
$url="covidopdprint?id=$id2";
$sstatus=$row['bstatus'];
$url4 = "updatecovidd?id=$id4"; 
?>


<td align="center"><?php if($tt=='P'){echo "<span style='color:red;text-align:center;'><b>$tt"; }else {echo "<span style='color:green;text-align:center;'><b>$tt";} ?>  </td>

<td align="center"><?php if($sstatus=='Paid'){echo"<a onclick='return confirm_click();' href='$url4'><strong>Confirm</strong></a>";} else {echo '';}?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($ls=='Received'){echo"<a target='_blank' href='$url2'>Edit</a>";} else{echo'';} ?></td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($row['tresult']!=''){echo"<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='25' /></a>";}else{echo'Report Pending';} ?></td>


</tr>

	<?php $count++;  }}
	
	else {
	
	echo '<script language="javascript">';
    echo 'alert("Only Lab Consultant have privilege to Access... Thank You !!"); ';
    echo '</script>';
	
	$url = "labome";
	//header("Location: $url");
	
	header("Refresh: .1; URL=$url");
}
?>

  </tbody>
</table>

</form>

</body>

</html>
