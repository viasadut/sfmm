<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy','mng','doctor')"; 
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
$user=$_SESSION['sess_username'];
$b_date=date('Y-m-d');


$bill_all="SELECT SUM(amount) FROM pms_bill WHERE `date`='$b_date';";
$bill_all_result = mysqli_query($con,$bill_all);
$bill_all_data=mysqli_fetch_assoc($bill_all_result);


$bill_all_dis="SELECT SUM(dis_amount) FROM pms_bill WHERE `date`='$b_date';";
$bill_all_result_dis = mysqli_query($con,$bill_all_dis);
$bill_all_data_dis=mysqli_fetch_assoc($bill_all_result_dis);


$bill_all_dis_opd="SELECT SUM(dis_amount) FROM pms_bill WHERE `date`='$b_date' and location='OPD';";
$bill_all_result_dis_opd = mysqli_query($con,$bill_all_dis_opd);
$bill_all_data_dis_opd=mysqli_fetch_assoc($bill_all_result_dis_opd);



$bill_all_refund="SELECT SUM(r_amount) FROM pms_bill WHERE `date`='$b_date';";
$bill_all_result_refund = mysqli_query($con,$bill_all_refund);
$bill_all_data_refund=mysqli_fetch_assoc($bill_all_result_refund);


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
if(isset($_POST['GO'])){
//$rr =$_REQUEST['rr'];
$update="update pmedi set `status`='$rr' where `id`='".$id."'";
mysqli_query($con,$update) or die(mysql_error());
}


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

<script type="text/javascript">
function confirm_click()
{
return confirm("Are You Sure To Delete This Request ?");
}

</script>

   <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='tes'><span>Home</span></a></li>
   
   
   
      
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</div>


<p align="center" class="style1">WelCome To Pharmacy Module </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Total Income</strong></th>
      <th width="10%"><strong>Total Discount</strong></th>
      <th width="15%"><strong>Total Refund</strong>
	  <th width="15%"><strong>Collection After Discount & Refund</strong>
      
	        

	   </tr>
  
  
  <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong><?php echo $bill_all_data['SUM(amount)']+$bill_all_data_dis_opd['SUM(dis_amount)'];?></strong></th>
      <th width="10%"><strong><?php echo $bill_all_data_dis['SUM(dis_amount)'];?></strong></th>
      <th width="15%"><strong><?php echo $bill_all_data_refund['SUM(r_amount)'];?></strong>
	  <th width="15%"><strong><?php echo $bill_all_data['SUM(amount)']+$bill_all_data_dis_opd['SUM(dis_amount)']-$bill_all_data_dis['SUM(dis_amount)']-$bill_all_data_refund['SUM(r_amount)'];?></strong>
      
	        

	   </tr>
</table>


</form>
</body>
</html>
