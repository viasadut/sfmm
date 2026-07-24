<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid1')"; 
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
$rd=date('Y-m-d');
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
return confirm("Are you Sure to Collecte The Sample ?");
}

</script>



</head>


<body>



<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   
   <li class='active has-sub'><a href='#'><span>Covid Report Print</span></a>
      <ul>
        <li class='active has-sub'><a href='covidstatnewtest'><span>Datewise Print Covid Reports</span></a>
      
   </li>
         <li class='has-sub'><a href="printcovidreport">Print Covid Reports By ID</a>
            
         </li>
      </ul>
	  
   </li>

   
   <li class='last'><a href='covidhomey?dt=<?php echo$rd;?>'><span>Todays Collection</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">PATIENTS RECORD SEARCH PANEL </p> 

<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>SNO</strong></th>
	  <th width="4%"><strong>ID</strong></th>
      <th width="17%"><strong>Name</strong></th>
      <th width="10%"><strong>Collection Date</strong></th>
      <th width="15%"><strong>Phone</strong>
       
      <th width="14%"><strong>Address</strong>
	  <th width="14%"><strong>Ward</strong>
	  <th width="14%"><strong>District</strong>
      <th width="14%"><strong>Sample Type</strong>
	  <th width="14%"><strong>Patient Type</strong>
	  <th width="14%"><strong>Bill Status</strong>
	  
	  <th width="14%"><strong>Add New Record</strong>
	  <th width="14%"><strong>Update</strong>
	  <th width="14%"><strong>Print Form</strong>
	  

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];

//$id=$_REQUEST["id"];
$adate=date('Y-m-d');
$count=1;

$sel_query="Select * from covidopd where ssent='$adate' and status=''order by id desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      
	  <td align="center"><?php echo $row["sid"]; ?></td>
      <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row["apdate"])); ?>
      <td align="center"><?php echo $row["phone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["padd"];?> 
<td align="center"><?php echo $row["ward"]; ?>  </td>
<td align="center"><?php echo $row["district"]; ?>  </td>
<td align="center"><?php echo $row["sam"]; ?>  </td>
<td align="center"><?php echo $row["tp"]; ?>  </td>

<?php 

$sstatus=$row['bstatus'];
$id4=$row['id'];
$url = "updatecovid?id=$id4"; 
$url1 = "covidopdprint1?id=$id4"; 

?>
<td align="center"><?php if($sstatus=='Paid') {echo "<span style='color:green;text-align:center;'><b>$sstatus"; } else if($sstatus=='Unpaid') {echo "<span style='color:red;text-align:center;'><b>$sstatus";}else {echo "<span style='color:red;text-align:center;'>";}?></td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a target='_blank' href="covid1opd1new?id=<?php echo $row["id"]; ?>">Edit</a> </td>
<td align="center"><?php if($sstatus=='Paid'){echo"<a onclick='return confirm_click();' href='$url'><strong>UPDATE</strong></a>";} else {echo '';}?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($sstatus=='Paid'){echo"<a target='_blank' href='$url1'><img src='print.png' title='Print Report' width='50' height='25' /></a>";} else{echo'';} ?></td>


	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>
