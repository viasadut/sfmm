<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
      header('Location: login2?err=2');
    }
?>



<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");
$runningTime = date('misds');
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
$row39 = mysqli_fetch_array($result39);

$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);


$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];
$dd=$row3['dept'];
$dt=date('Y-m-d');



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
  <li><a href='testlabreceive'><span>OPD Pending Reports</span></a></li>
  
  <li><a href='opdlabreport'><span>OPD Done Reports</span></a></li>
  <li><a href='ipdlabreport'><span>IPD Done Reports</span></a></li>
  <li><a href='inplab'><span>Inpatient</span></a></li>
  <li><a href='emerlab'><span>Emergency</span></a></li>
  <li><a href='labinpendo_new'><span>Endoscopy Suite</span></a></li>
  <li><a href='labsearchbar'><span>Search By Barcode</span></a></li>
  <li><a href='labstatlab'><span>Investigation Stats</span></a></li>
  <li><a href='categoryinvesmng'><span>Update</span></a></li>
  
  <li class='active has-sub'><a href='#'><span>Covid</span></a>
      <ul>
         <li class='has-sub'><a href='covidhome'><span>Collect Covid Sample</span></a>
            
         </li>
		 <li class='has-sub'><a href='labcovidreceive'><span>Receive Covid Sample</span></a>
            
         </li>
		  <li class='has-sub'><a href='centrewise1'><span>Update Covid Result</span></a>
            
         </li>
		 <li class='has-sub'><a href='covidstatnew'><span>Datewise Covid Test Stats</span></a>
            
         </li>
		 
		 
      </ul>
   </li>
      
	  
	  
	  <li class='active has-sub'><a href='#'><span>Manual Request</span></a>
      <ul>
         <li class='has-sub'><a href='#manualesearchlab#'><span>OPD Manual Request</span></a>
            
         </li>
		  <li class='has-sub'><a href='registerlab'><span>Manual Patient Registration</span></a>
            
         </li>
		 
      </ul>
   </li>
      
	  <li class='last'><a href='mngpassword'><span>Change Password</span></a></li>
	  <li class='last'><a href='laballs'><span>Search Patient's All Reports</span></a></li>
	  
	   <li class='active has-sub'><a href='#'><span>Blood Bank</span></a>
      <ul>
         <li class='has-sub'><a href='teslab2'><span>Stock</span></a>
            
         </li>
		<li class='has-sub'><a href='#manualesearchlab_bbank#'><span>Donor Investigation Request</span></a>
            
         </li>
		 <li class='has-sub'><a href='registerlab_bbank'><span>New Donor Registration</span></a>
		 </li>
		 <li class='has-sub'><a href='teslab_bbank'><span>Pending Screening Investigation List</span></a>
		 </li>
		 <li class='has-sub'><a href='testlabreceive_blood'><span>Pending Screening Report List</span></a>
		 </li>
		 
		 <li class='has-sub'><a href='Print_previous_Report'><span>Print Previous Reports</span></a>
		 </li>
		 <li class='has-sub'><a href='all_staff_lab_view'><span>View All Staff Blood Group</span></a>
		 </li>
		 
      </ul>
   </li>
	  
	  
	   <li class='active has-sub'><a href='#'><span>New Investigation</span></a>
      <ul>
         <li class='has-sub'><a href='inves_request'><span>Request New Investigation</span></a>
            
         </li>
		<li class='has-sub'><a href='inves_pending'><span>View Pending Request</span></a>
            
         </li>
		 
		 
      </ul>
   </li>
   
   
   <li class='active has-sub'><a href='#'><span>HISTO PANEL</span></a>
      <ul>
         <li class='has-sub'><a href='histo_receive'><span>Receive Histo Request</span></a>
            
         </li>
		<li class='has-sub'><a href='histo_report'><span>Pending Histo Report</span></a>
            
         </li>
		 
		 
      </ul>
   </li>


   <?php 
   
   if($cat=='HOD' or $cat=='Incharge'){	echo'	
   <li class="active has-sub"><a href="#"><span>FOR HOS / InCharge Only</span></a>
      <ul>
         <li class="has-sub"><a href="hos_log"><span>Departmental Log</span></a>
            
         </li>
		<li class="has-sub"><a href="mrequest"><span>Material Request</span></a>
            
         </li>
		 
		 <li class="has-sub"><a href="bio_list"><span>Asset List</span></a>
            
         </li>
		 
		 <li class="has-sub"><a href="dmaterialstore"><span>Add Hospital Equipment / Asset</span></a>
            
         </li>
		 
		 <li class="has-sub"><a href="recruit/manpower_requisition">Recruitment</a>
            
         </li>
		 
		  <li class="has-sub"><a href="set_lab_template">Create Report Format</a>
            
         </li>
		 
		 
      </ul>
   </li>'
;}
?>	   
   <li class='last'><a href='staffleave'><span>Apply leave</span></a></li>
   <li class='last'><a href='hinfo111'><span>Hospital Information</span></a></li>
<li class='last'><a href="ticketv2/dashboard">Hospital Ticketing System</a></li>
<li class='last'><a href="staffincident">Incident Report</a></li> 
<li class='last'><a href="phar_transfer_lab?sno=<?php echo $runningTime;?>">Request For Stock </a> </li> 

<li class='has-sub'><a href='lab_sample_receive_new'><span>Receive OPD Sample</span></a>
            
         </li>
   
   
   
	  <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">!! WELCOME !! <?php echo $row39['fullname']; ?>'s Dash Board </p> 
<p align="center" class="style1">OPD LAB REQUEST </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Date </strong>
      <th width="14%"><strong>Doctor's Name</strong>   
	        <th width="14%"><strong>Barcode</strong>   
			<th width="14%"><strong>Print</strong>   
      
      

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from alltest where rdate between '$test' and '$date' and type='lab' and status='Received' group by barcode1 order by rdate desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["rdate"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?></td>
	  	  
		  	  	  <td align="center"><?php echo $row["barcode1"];?></td> 
	  

 

	  	  	  <td align="center" colspan="1"><a target="_blank" href="lab_receive_print?barcode=<?php echo $row["barcode1"]; ?>">Print</a></td>

      </tr>
    <?php $count++; } ?>
	
  </tbody>
</table>
</form>
</body>
</html>
