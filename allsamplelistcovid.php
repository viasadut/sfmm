<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call','bill','lab')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
//$dt = $_REQUEST['dt'];
//$dt=date('Y-m-d');
$dt=$_REQUEST['dt'];
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
return confirm("Are you Sure to UPDATE Bill Status ?");
}

</script>


</head>


<body>



<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">PATIENTS RECORD SEARCH PANEL </p> 

<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="covidhomeg"><b>BACK<b></a> </td></tr>
    



    <tr>
      <th width="4%"><strong>SNO</strong></th>
	  <th width="4%"><strong>ID</strong></th>
      <th width="17%"><strong>Name</strong></th>
      <th width="10%"><strong>Collection Date</strong></th>
      <th width="15%"><strong>Phone</strong>
       
      <th width="14%"><strong>Address</strong>
	  <th width="14%"><strong>Gender</strong>
	  <th width="14%"><strong>Age</strong>
      <th width="14%"><strong>Sample Type</strong>
	  <th width="14%"><strong>Patient Type</strong>
	  <th width="14%"><strong>Bill Status</strong>
	  <th width="14%"><strong>Edit</strong>
	  
	  <th width="14%"><strong>Update</strong>
	  <th width="14%"><strong>Print Form</strong>
	  <th width="14%"><strong>Barcode</strong>
	  

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];

//$id=$_REQUEST["id"];
$adate=date('Y-m-d');
$rd=date('Y-m-d', strtotime('+1 days') );
$rd2=date('Y-m-d', strtotime('+2 days') );
$rd3=date('Y-m-d', strtotime('+3 days') );
$rd4=date('Y-m-d', strtotime('+4 days') );
$rd5=date('Y-m-d', strtotime('+5 days') );
$rd6=date('Y-m-d', strtotime('+6 days') );

$count=1;
if($dt==$adate)
{$sel_query="Select * from covidopd where ssent='$adate' and status=''order by sid asc;";}

else if($dt==$rd)
{$sel_query="Select * from covidopd where ssent='$rd' and status='' order by sid asc;";}

else if($dt==$rd2)
{$sel_query="Select * from covidopd where ssent='$rd2' and status=''order by sid asc;";}

else if($dt==$rd3)
{$sel_query="Select * from covidopd where ssent='$rd3' and status=''order by sid asc;";}

else if($dt==$rd4)
{$sel_query="Select * from covidopd where ssent='$rd4' and status=''order by sid asc;";}


else if($dt==$rd5)
{$sel_query="Select * from covidopd where ssent='$rd5' and status=''order by sid asc;";}


else if($dt==$rd6)
{$sel_query="Select * from covidopd where ssent='$rd6' and status=''order by sid asc;";}



$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      
	  <td align="center"><?php echo $row["sid"]; ?></td>
      <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row["apdate"])); ?>
      <td align="center"><?php echo $row["phone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["padd"];?> 
<td align="center"><?php echo $row["psex"]; ?>  </td>
<td align="center"><?php echo $row["page"]; ?>  </td>
<td align="center"><?php echo $row["sam"]; ?>  </td>
<td align="center"><?php echo $row["tp"]; ?>  </td>
<?php

$id3=$row["id"];
$dt5 = $_REQUEST['dt'];
$bill=$row["bstatus"];
$sstatus=$row["status"];


//$url = "covidbillconfirm?id=$id3&rd1=$dt5"; 
//$url1 = "covid1opd1newbill?id=$id3"; 
?>

		








<?php 

$sstatus=$row['bstatus'];
$id4=$row['id'];
$id5=$row['sid'];
$cname=$row['name'];
$url = "updatecovidb?id=$id4"; 
$url1 = "covidopdprint1?id=$id4"; 
$url2="covidbar?sid=$id5&cname=$cname";

?>
<td align="center"><?php if($sstatus=='Paid') {echo "<span style='color:green;text-align:center;'><b>$sstatus"; } else if($sstatus=='Unpaid') {echo "<span style='color:red;text-align:center;'><b>$sstatus";}else {echo "<span style='color:red;text-align:center;'>";}?></td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a target='_blank' href="covid1opd1new?id=<?php echo $row["id"]; ?>">Edit</a> </td>
<td align="center"><?php if($sstatus=='Paid'){echo"<a onclick='return confirm_click();' href='$url'><strong>UPDATE</strong></a>";} else {echo '';}?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($sstatus=='Paid'){echo"<a target='_blank' href='$url1'><img src='print.png' title='Print Report' width='50' height='25' /></a>";} else{echo'';} ?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($sstatus=='Paid'){echo"<a target='_blank' href='$url2'>Barcode</a>";} else{echo'';} ?></td>



<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($sstatus!=='collected' and $bill!='Paid'){echo"<a target='_blank' href='$url1'>EDIT</a>";} else{echo'';} ?></td>





	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>
