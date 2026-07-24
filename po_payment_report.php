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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Vendor Wise PO & Payment Report </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<?php
//$sel_query_due="Select SUM(total_amount), SUM(total_vat), SUM(total_tax), SUM(total_discount) from fund_transfer_master where approve_status in ('4','1','2','3')";
$sel_query_due="Select SUM(total_amount), SUM(total_vat), SUM(total_tax), SUM(total_discount) from fund_transfer_master where approve_status in ('4')";
   $result_due = mysqli_query($con,$sel_query_due);
   $row_due = mysqli_fetch_assoc($result_due);
   
   $sel_query_due1="Select SUM(total_amount) from po_table where status in ('Approved')";
   $result_due1 = mysqli_query($con,$sel_query_due1);
   $row_due1 = mysqli_fetch_assoc($result_due1);
   
   
   
echo"<tr><td colspan='20' style='font-size:25px; font-weight:bold; color:red; text-align: center'>Total Due: ".$final_due=$row_due1['SUM(total_amount)']-$row_due['SUM(total_amount)']-$row_due['SUM(total_vat)']-$row_due['SUM(total_tax)']-$row_due['SUM(total_discount)']."</td></tr>";
   ?>


    <tr>
      <th width="4%"><strong>S.No</strong></th>
      
	  
	  <th width="17%"><strong>Company Name</strong></th>
      
	  <th width="14%"><strong>PO Amount</strong>
     <th width="14%"><strong>PV Amount</strong>
     <th width="14%"><strong>Paid Amount</strong>
     <th width="14%"><strong>Due Amount</strong>

	  
	  
      
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

$sel_query="Select * from po_table where status='Approved' group by creditor_code";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	 
	  
	  
	  
      

     <?php
     $creditor=$row['creditor_code'];


$sel_sup="Select * from suppliers_master where supplier_code='$creditor'";
$result_sup = mysqli_query($con,$sel_sup);
$row_sup = mysqli_fetch_assoc($result_sup);

$sel_query1="Select SUM(total_amount) from po_table where status='Approved' and creditor_code='$creditor' group by creditor_code";
$result1 = mysqli_query($con,$sel_query1);
$row1 = mysqli_fetch_assoc($result1);

$sel_query2="Select SUM(total_amount) from fund_transfer_master where approve_status='1' and sub_ledger='$creditor' group by sub_ledger";
$result2 = mysqli_query($con,$sel_query2);
$row2 = mysqli_fetch_assoc($result2);

$sel_query22="Select SUM(total_vat) from fund_transfer_master where approve_status='1' and sub_ledger='$creditor' group by sub_ledger";
$result22 = mysqli_query($con,$sel_query22);
$row22 = mysqli_fetch_assoc($result22);

$sel_query222="Select SUM(total_tax) from fund_transfer_master where approve_status='1' and sub_ledger='$creditor' group by sub_ledger";
$result222 = mysqli_query($con,$sel_query222);
$row222 = mysqli_fetch_assoc($result222);


$sel_query2222="Select SUM(total_discount) from fund_transfer_master where approve_status='1' and sub_ledger='$creditor' group by sub_ledger";
$result2222 = mysqli_query($con,$sel_query2222);
$row2222 = mysqli_fetch_assoc($result2222);

//$total_pv=$row2['SUM(total_amount)']+$row22['SUM(total_vat)']+$row222['SUM(total_tax)']+$row2222['SUM(total_discount)'];
$total_pv=$row2['SUM(total_amount)'];



$sel_query3="Select SUM(total_amount) from fund_transfer_master where approve_status='3' and sub_ledger='$creditor' group by sub_ledger";
$result3 = mysqli_query($con,$sel_query3);
$row3 = mysqli_fetch_assoc($result3);



$sel_query33="Select SUM(total_vat) from fund_transfer_master where approve_status='3' and sub_ledger='$creditor' group by sub_ledger";
$result33 = mysqli_query($con,$sel_query33);
$row33 = mysqli_fetch_assoc($result33);

$sel_query333="Select SUM(total_tax) from fund_transfer_master where approve_status='3' and sub_ledger='$creditor' group by sub_ledger";
$result333 = mysqli_query($con,$sel_query333);
$row333 = mysqli_fetch_assoc($result333);


$sel_query3333="Select SUM(total_discount) from fund_transfer_master where approve_status='3' and sub_ledger='$creditor' group by sub_ledger";
$result3333 = mysqli_query($con,$sel_query3333);
$row3333 = mysqli_fetch_assoc($result3333);

$total_paid=$row3['SUM(total_amount)']+$row33['SUM(total_vat)']+$row333['SUM(total_tax)']+$row3333['SUM(total_discount)'];





?>

<td align="center"><?php echo $row_sup["supplier_name"]; ?></td>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
<a href="po_report?cname=<?php echo $row["creditor_code"]; ?>"><?php echo $row1["SUM(total_amount)"]; ?></a> 
</td>


<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
<a href="dp_report?cname=<?php echo $row["creditor_code"]; ?>"><?php echo $total_pv; ?></a> 
</td>


<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
<a href="prepare_ap_cheque?cname=<?php echo $row["creditor_code"]; ?>"><?php echo $total_paid; ?></a> 
</td>

<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
<a href="prepare_ap_cheque?cname=<?php echo $row["creditor_code"]; ?>"><?php echo $row1["SUM(total_amount)"]-$total_paid; ?></a> 
</td>

      </tr>
    <?php $count++; } ?>
	
	
	
</tbody>
</table>

</form>

</body>

</html>

