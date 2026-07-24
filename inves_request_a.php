<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('lab','doctor','mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=$url1");

?>

<?php $test=date('Y-m-d', strtotime('-30 days') );
  //echo $test;
//echo $date= date('m/d/Y');
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
$row39 = mysqli_fetch_array($result39)

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/


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
return confirm("Are you Sure to Comfirm this Request ?");
}

</script>

</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='teslab'><span>Home</span></a></li>
   
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='preview'><span>Print Previous Prescription</span></a>
            
         </li>
		 <li class='has-sub'><a href='tes5lab'><span>Prescription Status Wise Report </span></a>
            
         </li>
         <li class='has-sub'><a href='tes6lab'><span>Consultant Wise Report</span></a>
            
         </li>
      </ul>
   </li>
  <li><a href='inplab'><span>Inpatient</span></a></li>
  <li><a href='emerlab'><span>Emergency</span></a></li>
  <li><a href='endoscopylab'><span>Endoscopy Suite</span></a></li>
  <li><a href='labsearchbar'><span>Search By Barcode</span></a></li>
  <li><a href='labstatlab'><span>Investigation Stats</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">!! WELCOME !! <?php echo $row39['fullname']; ?>'s Dash Board </p> 
<p align="center" class="style1">Pending Charge Code Request</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    


<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> All Pending Request For Your Approval / Forwarding</h3></td></tr>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Investigation Name</strong></th>
      <th width="10%"><strong>Type</strong></th>
      <th width="15%"><strong>Request For</strong>
	  <th width="15%"><strong>Code </strong>
	  <th width="15%"><strong>Cost Price </strong>
	  <th width="15%"><strong>Pre. Price </strong>
	  <th width="15%"><strong>Margin(%)</strong>
	  <th width="15%"><strong>New Price </strong>
	  <th width="15%"><strong>Margin(%)</strong>
	  
	  <th width="15%"><strong>Remarks </strong>
	  <th width="15%"><strong>Competitor Price </strong>
      <th width="14%"><strong>View/Edit</strong>   
	  <th width="14%"><strong>View Format</strong>   
	        <th width="14%"><strong>Confirm</strong>   
      <th width="14%"><strong>Reject</strong>
	  <th width="14%"><strong>Print</strong>
      

	   </tr>
  </thead>
  <tbody>
  
<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from radio where status='Waiting For Finance Fowrading' and fby='$user' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">ADD</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"></td>
	  <td align="center"></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
<td align="center"></td>
	  
	 <td align="center"><?php echo $row["com_price"]; ?></td> 
	  <td align="center"><a href="editlabmng?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>	   
	  <td align="center"></td>
<td align="center"><a onclick="return confirm_click();" href="inves_request_aa?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_r?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 

	  	  	  

      </tr>
    <?php $count++; } ?>



	
	
	 <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from radio where status='Waiting For CFO Approval' and '$user'='1601' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">ADD</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"></td>
	  <td align="center"></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>

	  <td></td>
	  <td align="center"><?php echo $row["com_price"]; ?></td> 
	  <td align="center"><a href="editlabmng?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center"></td>	  
<td align="center"><a onclick="return confirm_click();" href="inves_request_aa?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_r?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 

	  	  	  

      </tr>
    <?php $count++; } ?>
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from radio where status='Waiting For MD Approval' and md='$user' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">ADD</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"></td>
	  <td align="center"></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
<td align="center"></td>	
	  
	  <td align="center"><?php echo $row["com_price"]; ?></td> 
	  <td align="center"><a href="editlabmng?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>	 
<td align="center"></td>	  
<td align="center"><a onclick="return confirm_click();" href="inves_request_aa?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_r?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 

	  	  	  

      </tr>
    <?php $count++; } ?>
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from radio where status='Waiting For CEO Approval' and ceo='$md' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">ADD</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"></td>
	  <td align="center"></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
<td align="center"></td>	
<td align="center"><?php echo $row["com_price"]; ?></td> 
	  
	  <td align="center"><a href="editlabmng?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>	   
	  <td align="center"></td>
<td align="center"><a onclick="return confirm_click();" href="inves_request_aa?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_r?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 

	  	  	  

      </tr>
    <?php $count++; } ?>
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from radio where status='Waiting For IT Entry' and $user in (`itby`,'1274','729') and type in ('LAB','lab','Lab')order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">ADD</td>
	  
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><a href="editlabmng?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center" colspan="1"><a href="inves_request_photo_view?pmrn=<?php echo $row["id"]; ?>">View Format</a></td>

<td align="center"><a onclick="return confirm_click();" href="inves_request_aa?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_r?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 
<td align="center"><a href="charge_code_lab1?ed=<?php echo $row["ittime1"]; ?>"><strong>Print</strong></a></td>	   
	  	  	  

      </tr>
    <?php $count++; } ?>


	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from radio where status='Waiting For IT Entry' and $user in (`itby`,'1274','729') and type in ('rad','Rad','RAD') order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">ADD</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  
	  <td align="center"><a href="editlabmng?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center" colspan="1"><a href="inves_request_photo_view?pmrn=<?php echo $row["id"]; ?>">View Format</a></td>	  
<td align="center"><a onclick="return confirm_click();" href="inves_request_aa?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_r?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 
<td align="center"><a href="charge_code_rad1?ed=<?php echo $row["ittime1"]; ?>"><strong>Print</strong></a></td>	   
	  	  	  

      </tr>
    <?php $count++; } ?>
	
	
	
	
	















    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from edit_inves where status='Waiting For Finance Fowrading' and fby='$user' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">UPDATE</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"><?php echo $row["oprice"]; ?></td>
	  
	   <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['oprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>

	  <td align="center"><?php echo $row["remarks1"]; ?></td>
	  
	  <td align="center"><?php echo $row["com_price"]; ?></td> 
	  <td align="center"><a href="edit_inves_price1?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>	   
	  <td align="center"></td>
<td align="center"><a onclick="return confirm_click();" href="edit_inves_price11?id=<?php echo $row["id"]; ?>&iid=<?php echo $row["iid"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_rr?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 

	  	  	  

      </tr>
    <?php $count++; } ?>
	
	
	
	 <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from edit_inves where status='Waiting For CFO Approval' and '$user'='1601' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">UPDATE</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"><?php echo $row["oprice"]; ?></td>
	  
	   <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['oprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>

	  <td align="center"><?php echo $row["remarks1"]; ?></td>
	  <td align="center"><?php echo $row["com_price"]; ?></td> 
	  <td align="center"><a href="edit_inves_price1?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center"></td>	  
<td align="center"><a onclick="return confirm_click();" href="edit_inves_price11?id=<?php echo $row["id"]; ?>&iid=<?php echo $row["iid"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_rr?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 

	  	  	  

      </tr>
    <?php $count++; } ?>
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from edit_inves where status='Waiting For MD Approval' and md='$user' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">UPDATE</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"><?php echo $row["oprice"]; ?></td>
	  
	   <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['oprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>

	  <td align="center"><?php echo $row["remarks1"]; ?></td>
	  <td align="center"><?php echo $row["com_price"]; ?></td> 
	  <td align="center"><a href="edit_inves_price1?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center"></td>	  
<td align="center"><a onclick="return confirm_click();" href="edit_inves_price11?id=<?php echo $row["id"]; ?>&iid=<?php echo $row["iid"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_rr?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 

	  	  	  

      </tr>
    <?php $count++; } ?>
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from edit_inves where status='Waiting For CEO Approval' and ceo='$user' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">UPDATE</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"><?php echo $row["oprice"]; ?></td>
	   <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['oprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>

	  <td align="center"><?php echo $row["remarks1"]; ?></td>
	  <td align="center"><?php echo $row["com_price"]; ?></td> 
	  
	  <td align="center"><a href="edit_inves_price1?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center"></td>	  
<td align="center"><a onclick="return confirm_click();" href="edit_inves_price11?id=<?php echo $row["id"]; ?>&iid=<?php echo $row["iid"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_rr?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
 

	  	  	  

      </tr>
    <?php $count++; } ?>
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
//$count=1;
$sel_query="Select * from edit_inves where status='Waiting For IT Entry' and $user in (`itby`,'1274','729') and type='lab' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">UPDATE</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"><?php echo $row["oprice"]; ?></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  
	  <td align="center"><a href="edit_inves_price1?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center" colspan="1"><a href="inves_request_photo_view?pmrn=<?php echo $row["id"]; ?>">View Format</a></td>	  
<td align="center"><a onclick="return confirm_click();" href="edit_inves_price11?id=<?php echo $row["id"]; ?>&iid=<?php echo $row["iid"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_rr?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
<td align="center"><a href="charge_code_lab?ed=<?php echo $row["ittime1"]; ?>"><strong>Print</strong></a></td>	   
 

	  	  	  

      </tr>
    <?php $count++; } ?>

	
	
		<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
//$count=1;
$sel_query="Select * from edit_inves where status='Waiting For IT Entry' and $user in (`itby`,'1274','729') and type in ('rad','RAD','Rad') order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">UPDATE</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"><?php echo $row["oprice"]; ?></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  
	  <td align="center"><a href="edit_inves_price1?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center" colspan="1"><a href="inves_request_photo_view?pmrn=<?php echo $row["id"]; ?>">View Format</a></td>	  
<td align="center"><a onclick="return confirm_click();" href="edit_inves_price11?id=<?php echo $row["id"]; ?>&iid=<?php echo $row["iid"]; ?>"><strong>Confirm</strong></a></td>
<td align="center"><a href="inves_request_rr?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
<td align="center"><a href="charge_code_rad?ed=<?php echo $row["ittime1"]; ?>"><strong>Print</strong></a></td>	   
 

	  	  	  

      </tr>
    <?php $count++; } ?>

<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> All Pending / Approved Request</h3></td></tr>
 <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Investigation Name</strong></th>
      <th width="10%"><strong>Type</strong></th>
      <th width="15%"><strong>Request For</strong>
	  <th width="15%"><strong>Code </strong>
	  <th width="15%"><strong>Cost Price </strong>
	  <th width="15%"><strong>Pre. Price </strong>
	  <th width="15%"><strong>Margin(%)</strong>
	  <th width="15%"><strong>New Price </strong>
	  <th width="15%"><strong>Margin(%)</strong>
	  <th width="15%"><strong>Remarks </strong>
	  <th width="15%"><strong>View Format </strong>
      <th width="14%"><strong>View/Edit</strong>  
	  
	   
	        <th width="14%"><strong>Status</strong>   
      

	   </tr>
	
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
//$count=1;
$sel_query="Select * from radio where status in('Waiting For IT Entry','Waiting For CEO Approval','Waiting For MD Approval','Waiting For CFO Approval','Waiting For Finance Fowrading') order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">ADD</td>
	  
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"></td>
	   <td align="center"></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>

	  <td align="center"><?php echo $row["remarks1"]; ?></td>
	  
	  
	  <td align="center"><a href="editlabmng?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center" colspan="1"><a href="inves_request_photo_view?pmrn=<?php echo $row["id"]; ?>">View Format</a></td>
<td align="center"><?php echo $row["status"]; ?></td>


 

	  	  	  

      </tr>
    <?php $count++; } ?>


	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
//$count=1;
$sel_query="Select * from edit_inves where status in('Waiting For IT Entry','Waiting For CEO Approval','Waiting For MD Approval','Waiting For CFO Approval','Waiting For Finance Fowrading') and type='rad' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

       <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["iname"]; ?></td>
      <td align="center"><?php echo $row["type"]; ?></td>

      <td align="center">UPDATE</td>
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["cprice"]; ?></td>
	  <td align="center"><?php echo $row["oprice"]; ?></td>
	   <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['oprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  
	  
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['price']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>

	  <td align="center"><?php echo $row["remarks1"]; ?></td>
	  
	  
	  <td align="center"><a href="edit_inves_price1?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>
<td align="center" colspan="1"><a href="inves_request_photo_view?pmrn=<?php echo $row["id"]; ?>">View Format</a></td>	  

<td align="center"><?php echo $row["status"]; ?></td>
 
	  	  	  

      </tr>
    <?php $count++; } ?>

	








	
  </tbody>
</table>
</form>
</body>
</html>
