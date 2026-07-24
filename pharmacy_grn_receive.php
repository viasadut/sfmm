<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','store','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
//$ip=$_SERVER['REMOTE_ADDR'];




    //$ip = "195.123.321.456";
  //  $split = explode(".", $ip);
    //$last= $split[3];
    //$host=substr($last, -2);

//    $grn=$host.date(ymds)

?>

<?php
$full = $row39['fullname'];

$user=$_SESSION["sess_username"];

$query40 = "SELECT * FROM staff3 where sid='$fullname'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$sid1=$row40['sid1'];
$cat=$row40['cat'];
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
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


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Request ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Reject this Leave ?");
}

</script>

</head>


<body>








<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Charge Code Pending Approval List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      
	  
	  <th width="17%"><strong>Request Department</strong></th>
      <th width="10%"><strong>PO No</strong></th>
	  <th width="10%"><strong>Supplier</strong></th>
	  <th width="10%"><strong>Discount</strong></th>
	  	  
	  <th width="10%"><strong>Total Amount</strong></th>
     <th width="10%"><strong>GRN Amount</strong></th>
     <th width="10%"><strong>Net GRN Amount</strong></th>
      
      <th width="14%"><strong>Issue Date</strong>   
      
	  
	  <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Print PO</strong>

	  
	  
      
	   </tr>
  </thead>
  <tbody>


  
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from po_table where status='FORWARD FOR CEO APPROVAL' and '$user'='ceo' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	 
	  
	  <td align="center"><?php echo $row["req_department"]; ?></td>
	  <td align="center"><?php echo $row['id']; ?></td>
      <td align="center"><?php echo $row["sup_code"]; ?></td>
	  <td align="center"><?php echo $row["amount_discount"]; ?></td>
	  <td align="center"><?php echo $row["total_amount"]; ?></td>
      
      <td align="center"><?php echo $row["issue_date"]; ?></td>
      
<td align="center">

<?php
$ono1=$row['ono'];
$simple_string = $ono1;
								$ciphering = "AES-256-CTR";
								$iv_length = openssl_cipher_iv_length($ciphering);
								$options = 0;
								$encryption_iv = '1234567891011121';
								$encryption_key = "kpj";
								$encryption = openssl_encrypt($simple_string,
								$ciphering,
								$encryption_key, $options, $encryption_iv);
								$encryption;


?>

<a href="po_prepare_mng?ono=<?php echo $encryption; ?>">View/Edit</a>


</td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="po_approve_con?id=<?php echo $row["id"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="po_reject_con?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
	

	      


	  
      </tr>
    <?php $count++; } ?>
	
	
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from po_table where po_type='Pharmacy' ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
      <?php

$e_date=date('Y-m-d');


$ip=$_SERVER['REMOTE_ADDR'];
    //$ip = "195.123.321.456";
    $split = explode(".", $ip);
    $last= $split[3];
    $host=substr($last, -2);
    $host3=substr($row['id'], -3);
    $grn=$host.date('yms').$host3;



$ono1=$row['ono'];
$simple_string = $ono1;
								$ciphering = "AES-128-CTR";
								$iv_length = openssl_cipher_iv_length($ciphering);
								$options = 0;
								$encryption_iv = '1234567891011121';
								$encryption_key = "kpj";
								$encryption = openssl_encrypt($simple_string,
								$ciphering,
								$encryption_key, $options, $encryption_iv);
								$encryption;

    $simple_string1 = $grn;
    $ciphering1 = "AES-128-CTR";
    $iv_length1 = openssl_cipher_iv_length($ciphering);
    $options1 = 0;
    $encryption_iv1 = '1234567891011124';
    $encryption_key1 = "kpjj";
    $encryption14 = openssl_encrypt($simple_string1,
    $ciphering1,
    $encryption_key1, $options1, $encryption_iv1);
    $encryption14;




    $querycy = "SELECT SUM(t_price) FROM medi_stock where p_id='$ono1'"; 
    $resultcy = mysqli_query($con, $querycy) or die(mysqli_error());
    $rowcy = mysqli_fetch_array($resultcy);
   // $grn_value=number_format($rowcy['SUM(t_price)'], 2);
    $grn_value=round($rowcy['SUM(t_price)']);
    
?>


	  
	  <td align="center"><?php echo $row["req_department"]; ?></td>
	  <td align="center"><?php echo $row['id']; ?></td>
      <td align="center"><?php echo $row["sup_code"]; ?></td>
	  <td align="center"><?php echo $row["amount_discount"]; ?></td>
	  <td align="center"><?php echo $row["total_amount"]; ?></td>
     <td align="center"><?php echo $grn_value; ?></td>
     <td align="center"><?php echo $grn_value-$row["amount_discount"]; ?></td>
      <td align="center"><?php echo $row["issue_date"]; ?></td>
      
<td align="center">




<?php if($row['status']=='Approved' and $fullname=='45' || $fullname=='310' || $fullname=='790'){
echo "<a href=po_prepare1_pharmacy_grn?ono=$ono1&grn=$grn>View/Edit</a>";
}
else {

   echo $row['status'];
}
?>




</td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
<a href="po_print_new?ono=<?php echo $row["ono"]; ?>">Print</a> 
</td>

      </tr>
    <?php $count++; } ?>
	
	
	
</tbody>
</table>

</form>

</body>

</html>

