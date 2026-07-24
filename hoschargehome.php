<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

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
?>
<?php
$full = $row39['fullname'];

$phar1 = "SELECT COUNT(id) FROM medicineedit where status='Waiting For CEO Approval'";
$phar11 = mysqli_query($con, $phar1) or die(mysqli_error());
$phar111 = mysqli_fetch_array($phar11);
$phar_ceo=$phar111['COUNT(id)'];

$phar1_cfo = "SELECT COUNT(id) FROM medicineedit where status='Waiting For CFO Approval'";
$phar11_cfo = mysqli_query($con, $phar1_cfo) or die(mysqli_error());
$phar111_cfo = mysqli_fetch_array($phar11_cfo);
$phar_cfo=$phar111_cfo['COUNT(id)'];

$phar1_md = "SELECT COUNT(id) FROM medicineedit where status='Waiting For MD Approval'";
$phar11_md = mysqli_query($con, $phar1_md) or die(mysqli_error());
$phar111_md = mysqli_fetch_array($phar11_md);
$phar_md=$phar111_md['COUNT(id)'];



$phar1a = "SELECT COUNT(id) FROM medicinerequest where rstatus='Waiting For CEO Approval'";
$phar11a = mysqli_query($con, $phar1a) or die(mysqli_error());
$phar111a = mysqli_fetch_array($phar11a);
$phar_ceoa=$phar111a['COUNT(id)'];

$phar1_cfoa = "SELECT COUNT(id) FROM medicinerequest where rstatus='Waiting For CFO Approval'";
$phar11_cfoa = mysqli_query($con, $phar1_cfoa) or die(mysqli_error());
$phar111_cfoa = mysqli_fetch_array($phar11_cfoa);
$phar_cfoa=$phar111_cfoa['COUNT(id)'];

$phar1_mda = "SELECT COUNT(id) FROM medicinerequest where rstatus='Forward to MD Approval'";
$phar11_mda = mysqli_query($con, $phar1_mda) or die(mysqli_error());
$phar111_mda = mysqli_fetch_array($phar11_mda);
$phar_mda=$phar111_mda['COUNT(id)'];

$cf=$phar_cfo+$phar_cfoa;
$ce=$phar_ceo+$phar_ceoa;
$mmd=$phar_md+$phar_mda;



$query_inves = "SELECT COUNT(id) FROM edit_inves where status='Waiting For CEO Approval'";
$result_inves = mysqli_query($con, $query_inves) or die(mysqli_error());
$row_inves = mysqli_fetch_array($result_inves);
$s_inves=$row_inves['COUNT(id)'];

$query_inves_a = "SELECT COUNT(id) FROM radio where status='Waiting For CEO Approval'";
$result_inves_a = mysqli_query($con, $query_inves_a) or die(mysqli_error());
$row_inves_a = mysqli_fetch_array($result_inves_a);
$s_inves_a=$row_inves_a['COUNT(id)'];

$ss_ceo=$s_inves_a+$s_inves;



$query_inves1 = "SELECT COUNT(id) FROM edit_inves where status='Waiting For CFO Approval'";
$result_inves1 = mysqli_query($con, $query_inves1) or die(mysqli_error());
$row_inves1 = mysqli_fetch_array($result_inves1);
$s_inves1=$row_inves1['COUNT(id)'];

$query_inves_a1 = "SELECT COUNT(id) FROM radio where status='Waiting For CFO Approval'";
$result_inves_a1 = mysqli_query($con, $query_inves_a1) or die(mysqli_error());
$row_inves_a1 = mysqli_fetch_array($result_inves_a1);
$s_inves_a1=$row_inves_a1['COUNT(id)'];

$ss_cfo=$s_inves_a1+$s_inves1;


$query_inves2 = "SELECT COUNT(id) FROM edit_inves where status='Waiting For MD Approval'";
$result_inves2 = mysqli_query($con, $query_inves2) or die(mysqli_error());
$row_inves2 = mysqli_fetch_array($result_inves2);
$s_inves2=$row_inves2['COUNT(id)'];

$query_inves_a2 = "SELECT COUNT(id) FROM radio where status='Waiting For MD Approval'";
$result_inves_a2 = mysqli_query($con, $query_inves_a2) or die(mysqli_error());
$row_inves_a2 = mysqli_fetch_array($result_inves_a2);
$s_inves_a2=$row_inves_a2['COUNT(id)'];

$ss_md=$s_inves_a2+$s_inves2;



$query_inves_asset = "SELECT COUNT(id) FROM storenew where estatus='Waiting For CEO Approval'";
$result_inves_asset = mysqli_query($con, $query_inves_asset) or die(mysqli_error());
$row_inves_asset = mysqli_fetch_array($result_inves_asset);
$s_inves_asset=$row_inves_asset['COUNT(id)'];

$query_inves_asset1 = "SELECT COUNT(id) FROM storenew_edit where estatus='Waiting For CEO Approval'";
$result_inves_asset1 = mysqli_query($con, $query_inves_asset1) or die(mysqli_error());
$row_inves_asset1 = mysqli_fetch_array($result_inves_asset1);
$s_inves_asset1=$row_inves_asset1['COUNT(id)'];

$asset_ceo=$s_inves_asset+$s_inves_asset1;


$query_inves_asset_cfo = "SELECT COUNT(id) FROM storenew where estatus='Waiting For CFO Approval'";
$result_inves_asset_cfo = mysqli_query($con, $query_inves_asset_cfo) or die(mysqli_error());
$row_inves_asset_cfo = mysqli_fetch_array($result_inves_asset_cfo);
$s_inves_asset_cfo=$row_inves_asset_cfo['COUNT(id)'];

$query_inves_asset1_cfo = "SELECT COUNT(id) FROM storenew_edit where estatus='Waiting For CFO Approval'";
$result_inves_asset1_cfo = mysqli_query($con, $query_inves_asset1_cfo) or die(mysqli_error());
$row_inves_asset1_cfo = mysqli_fetch_array($result_inves_asset1_cfo);
$s_inves_asset1_cfo=$row_inves_asset1_cfo['COUNT(id)'];

$asset_cfo=$s_inves_asset_cfo+$s_inves_asset1_cfo;




$query_inves_asset_md = "SELECT COUNT(id) FROM storenew where estatus='Waiting For MD Approval'";
$result_inves_asset_md = mysqli_query($con, $query_inves_asset_md) or die(mysqli_error());
$row_inves_asset_md = mysqli_fetch_array($result_inves_asset_md);
$s_inves_asset_md=$row_inves_asset_md['COUNT(id)'];

$query_inves_asset1_md = "SELECT COUNT(id) FROM storenew_edit where estatus='Waiting For CFO Approval'";
$result_inves_asset1_md = mysqli_query($con, $query_inves_asset1_md) or die(mysqli_error());
$row_inves_asset1_md = mysqli_fetch_array($result_inves_asset1_md);
$s_inves_asset1_md=$row_inves_asset1_md['COUNT(id)'];

$asset_md=$s_inves_asset_md+$s_inves_asset1_md;






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
		 <li class='has-sub'><a href='pedit1'><span>Edit Patient Record</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
	   <li class='has-sub'><a href='app1doc'><span>Appointment Report</span></a>
            
         </li>
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
		<li class='has-sub'><a href='view3newrad'><span>Radiology Report</span></a>
            
         </li>
      </ul>
   </li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?>'s DashBoard </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">

 <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module</h3></td></tr>

<tr><td colspan="3" align="left"><a href="addhoscharge"><font size="4.5">ADD Hospital Charge</a></td></tr>
<tr>
	<td colspan="5"align="left"><a href="hoschargeedit"><font size="4.5">EDIT Hospital Charge</a></td></tr>
	
		
		
		

		
	  
</tr>
<tr><td colspan="3" align="left"><a href="storeedit_test1"><font size="4.5">EDIT Hospital Charge(NEW FORMAT)</a></td></tr>
<tr><td colspan="3" align="left"><a href="eapprove_new"><font size="4.5">Pending Disposable Charge Add / Update Request</a>


<font size="4.5" color="#FF0000"><b><?php if($fullname=='ceo')
	  {
		  echo '('.$asset_ceo.')';
		  
	  }
	  
	  else if($fullname=='1601')
	  {
		  echo '('.$asset_cfo.')';
		  
	  }
	  
	  else if($fullname=='md')
	  {
		  echo '('.$asset_md.')';
		  
	  }
	  
	  ?><b>


</td></tr>


<tr><td colspan="3"align="left"><a href="inves_request_a"><font size="4.5">Pending Investigation Charge Add / Update Request</a>
	
	  <font size="4.5" color="#FF0000"><b><?php if($fullname=='ceo')
	  {
		  echo '('.$ss_ceo.')';
		  
	  }
	  
	  else if($fullname=='1601')
	  {
		  echo '('.$ss_cfo.')';
		  
	  }
	  
	  else if($fullname=='md')
	  {
		  echo '('.$ss_md.')';
		  
	  }
	  
	  ?><b>
	  
	  
	  </td><tr>

	  
	  
	  <tr><td colspan="3"align="left"><a href="phar_approve_new"><font size="4.5">Pending Pharmacy Charge Update Request</a>
	
	  <font size="4.5" color="#FF0000"><b><?php if($fullname=='ceo')
	  {
		  echo '('.$ce.')';
		  
	  }
	  
	  else if($fullname=='cfo')
	  {
		  echo'('.$cf.')';
		  
	  }
	  
	  else if($fullname=='md')
	  {
		  echo '('.$mmd.')';
		  
	  }
	  
	  ?><b>
	  
	  
	  </td><tr>





</table>
    


   
  </tbody>
</table>
</form>

</body>

</html>
