<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','mng')"; 
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
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(amount) FROM pms_payment where user= '$bt'and date BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(adoc) FROM inpatient where anew BETWEEN '$start' and '$end';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
}

?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
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


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Start The Blood?");
}

</script>

<link href="prescription/prescription/css/select2.min.css" rel="stylesheet" />
<script src="prescription/prescription/css/select2.min.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
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

<h1 align="center">Cashier Wise Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="date" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="date" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Cashier ID</strong></th>
      <th width="10%"><strong>Cashier Name</strong></th>
	  <th width="10%"><strong>OPD Collection</strong></th>
	  <th width="10%"><strong>Other Collection</strong></th>
      
	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


$query43_p = "SELECT SUM(amount_receive) FROM pms_bill where date between '$start' and '$end' and dname NOT IN ('IPD ADVANCE')"; 
	 
$result43_p = mysqli_query($con, $query43_p) or die(mysqli_error());
$row43_p = mysqli_fetch_assoc($result43_p);

$query43_p3 = "SELECT SUM(amount) FROM pms_bill where date between '$start' and '$end' and dname IN ('IPD ADVANCE');"; 
	 
$result43_p3 = mysqli_query($con, $query43_p3) or die(mysqli_error());
$row43_p3 = mysqli_fetch_assoc($result43_p3);


$query43_p1_dis = "SELECT SUM(dis_amount) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi');"; 
	 
$result43_p1_dis = mysqli_query($con, $query43_p1_dis) or die(mysqli_error());
$row43_p1_dis = mysqli_fetch_assoc($result43_p1_dis);



$query43_p1_refund = "SELECT SUM(r_amount) FROM pms_bill where date between '$start' and '$end' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi');"; 
	 
$result43_p1_refund = mysqli_query($con, $query43_p1_refund) or die(mysqli_error());
$row43_p1_refund = mysqli_fetch_assoc($result43_p1_refund);

//echo $row43_p1_refund['SUM(r_amount)'];

if (($_POST['bt'])=="all"){
echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row44['COUNT(adoc)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;

$sel_query="Select * from inpatient where date BETWEEN '$start' and '$end' group by user";}
 else{
	 echo "<font color=blue font size=5> Total Collection  -";
echo  '<span style="color:red; font-weight:bold">';
echo $row43_p3['SUM(amount)'] + $row43_p['SUM(amount_receive)']-$row43_p1_dis['SUM(dis_amount)']-$row43_p1_refund['SUM(r_amount)'];
echo
' BDT </span>';
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from pms_bill where date BETWEEN '$start' and '$end'  group by user";
 } 
$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>


<?php
$bill_user=$row['user'];
$bill_date=$row['date'];
$query43 = "SELECT SUM(amount_receive) FROM pms_bill where user= '$bill_user'and date='$bill_date' and dname !='IPD ADVANCE';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query43_ipd = "SELECT SUM(amount) FROM pms_bill where user= '$bill_user'and date='$bill_date' and dname='IPD ADVANCE';"; 
	 
$result43_ipd = mysqli_query($con, $query43_ipd) or die(mysqli_error());
$row43_ipd = mysqli_fetch_assoc($result43_ipd);


$query43_p = "SELECT SUM(amount) FROM pms_bill where user= '$bill_user'and date='$bill_date' and location not in ('OPD_inves','OPD');"; 
	 
$result43_p = mysqli_query($con, $query43_p) or die(mysqli_error());
$row43_p = mysqli_fetch_assoc($result43_p);


$user_name_q = "SELECT * FROM user where uname= '$bill_user';"; 
	 
$user_name_r = mysqli_query($con, $user_name_q) or die(mysqli_error());
$user_name_d = mysqli_fetch_assoc($user_name_r);

$query43_dis = "SELECT SUM(dis_amount) FROM pms_bill where user= '$bill_user'and date='$bill_date' and location IN ('OPD_DIS','OTC_Sale','OPD_Medi');"; 
	 
$result43_dis = mysqli_query($con, $query43_dis) or die(mysqli_error());
$phar_collection_dis = mysqli_fetch_assoc($result43_dis);

$query43_p1_refund1 = "SELECT SUM(r_amount) FROM pms_bill where user= '$bill_user' and date between '$start' and '$end' ;"; 
	 
$result43_p1_refund1 = mysqli_query($con, $query43_p1_refund1) or die(mysqli_error());
$row43_p1_refund1 = mysqli_fetch_assoc($result43_p1_refund1);


      ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["user"]; ?></td>
      <td align="center"><?php echo $user_name_d['fullname']; ?></td>

     
      <td align="center">
      <a target='_blank' href="cashier_details_new?user=<?php echo $row['user'];?>&date=<?php echo $bill_date; ?>">
      <?php echo $row43["SUM(amount_receive)"]+$row43_ipd['SUM(amount)']-$phar_collection_dis['SUM(dis_amount)']-$row43_p1_refund1['SUM(r_amount)']; ?></a>   </td>
	       
           
      </tr>
	  
    <?php $count++; } }?>


      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>

