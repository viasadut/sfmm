<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$ad='b';
?>

<?php

$runningTime = date('mismi');
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
		
$runningTime1 = date('misis').$fullname;

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];
$dd=$row3['dept'];
$in_id=$row3['sid1'];
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
    //height: 40px;
    width: 30%;
    background-color: powderblue;
}



img {
  border-radius: 50%;
  
}

</style>



   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" href="css/presentational.css">
    
    
    <link rel="stylesheet" href="css/circular-images.css">



</head>

<body>





<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr><td colspan="19"align="center"bgcolor="lightblue"class="style1" border="0">Welcome!! <?php echo $row39['fullname']; ?></td>
<td colspan="1"align="center"bgcolor="lightblue">
<a target='_blank' href="hinfo111"><img src="hinfo.jpg" title="Hospital Information" width="50" height="30" /></a>
<a target='_blank' href="task_index"><img src="to_do.jpg" title="ADD YOUR TO-DO-LIST" width="50" height="30" /></a>
</td>



</tr>
<tr><td colspan="19"align="center"bgcolor="lightgreen"><img  src="staff_pic/<?php echo $row3['pic'] ?>" width="100"  height="100" align="center"></td>
<td colspan="1"align="center"bgcolor="lightgreen"><h3><?php echo date('d/m/Y').'<br>'.date('H:i:s')?></h3></td>
</tr>


  





<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module</h3></td></tr>
<tr><td colspan="20"align="left"bgcolor="white"><br></td></tr>
<tr>
	<td colspan="20"align="left"><a href="otslotopen"><font size="4.5">Open OT Slot</a></td></tr>
	<td colspan="20"align="left"><a href="blockot"><font size="4.5">Block OT Slot</a></td></tr>
	<td colspan="20"align="left"><a href="otnurse"><font size="4.5">OT BOOKING</a></td></tr>
	<td colspan="20"align="left"><a href="con_waiting_list"><font size="4.5">Pending OT Appointment List</a></td></tr>
	<tr><td colspan="20" align="left"><a href="otview12"><font size="4.5">Today's Patient List</a></td></tr>
	<tr><td colspan="20" align="left"><a href="newotdate"><font size="4.5">Datewise Booking List</a></td></tr>
	<tr>
	
		<td colspan="20" align="left"><a href="otnotedonestatsot"><font size="4.5">	OT STAT (Report Wise)</a></td>
	
		
	  
</tr>
		<tr><td colspan="20" align="left"><a href="otallnurse"><font size="4.5">OT STAT (Booking Wise)</a></td></tr>
		<tr><td colspan="20" align="left"><a href="endoreportmrnot"><font size="4.5">Search Report By MRN OR PHONE</a></td></tr>
		<tr><td colspan="20" align="left"><a href="printhistoot"><font size="4.5">Print Previous Histo Request</a></td></tr>
		<tr><td colspan="20" align="left"><a href="printcdot"><font size="4.5">Print Previous CS Request</a></td></tr>
		<tr><td colspan="20" align="left"><a href="inventoryot"><font size="4.5">Inventory</a></td></tr>
		<tr><td colspan="20" align="left"><a href="bstat"><font size="4.5">Best Pratice Stats</a></td></tr>
		<tr><td colspan="20" align="left"><a href="snotemanual"><font size="4.5">Insert Previous Surgery Note</a></td></tr>
				<tr><td colspan="20" align="left"><a href="otrequest"><font size="4.5">Request</a></td></tr>
				<tr><td colspan="20" align="left"><a href="inviewot"><font size="4.5">Today's IPD Patient List</a></td></tr>
						<tr><td colspan="20"align="left"><a href="staffleave"><font size="4.5">Staff Leave </td></tr>	
		
<tr><td colspan="20"align="ledt"><a href="staffincident"><font size="4.5">	Incident Report</a></td></tr>'
		
	  
<tr><td colspan="20"align="left"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td></tr>
<tr><td colspan="20"align="left"><a href="reporting-portal/index.php"><font size="4.5">Reporting Portal</a></td></tr>	

						<tr><td colspan="20"align="left"><a href="best_stats"><font size="4.5">Best Practice Stats </td></tr>	
						<tr><td colspan="20"align="left"><a href="mrequest"><font size="4.5">Material Request </td></tr>	
						<tr>	<td colspan="20"align="left"><a href="dmaterialstore"><font size="4.5">Add Hospital Equipment / Asset</a></td></tr>	
						<tr><td colspan="20"align="left"><a href="bio_list"><font size="4.5">Asset List</td></tr>	
						<tr><td colspan="20"align="left"><a href="hinfo111"><font size="4.5">Hospital Information</td></tr>	
						<tr><td colspan="20"align="left"><a href="bio_list_edit"><font size="4.5">Asset List (Added By User)</td></tr>	
						<tr><td colspan="20"align="left"><a href="ot_day_approval"><font size="4.5">Pending OT Day Approval</td></tr>	
						
						<tr><td colspan="20"align="left"><a href="ot_stock_edit"><font size="4.5">OT Stock</td></tr>	
						<tr><td colspan="20"align="left"><a href="dispose_medicine"><font size="4.5">Discard Medicine</td></tr>	
						<tr><td colspan="20"align="left"><a href="phar_transfer_ot?sno=<?php echo $runningTime;?>"><font size="4.5">Request For Stock</td></tr>	
						<tr><td colspan="20"align="left"><a href="pac_new_panel"><font size="4.5">PAC Pending Request</td></tr>	
						<tr><td colspan="20"align="left"><a href="pac_report_pending"><font size="4.5">PAC Pending Report</td></tr>	
						<tr><td colspan="20"align="left"><a href="ot_daily_use"><font size="4.5">Daily Used Total Medicine List</td></tr>	
						<tr><td colspan="20"align="left"><a href='ot_return_phar?sno=<?php echo date('dsmYi');?>'><span>Return Stock Medicine</span></a></td></tr>	
							<td colspan="20"align="left"><a href="oes1/index"><span><font size="5.5" color="green" font-weight="bold">Online Exam Module</span></a></td>					
						
						
							<?php if($cat=='HOD' or $cat=='Incharge'){	echo'	
							<tr><td colspan="20"align="left"><a href="recruit/manpower_requisition"><font size="4.5">Recruitment</a></td></tr>';}?>
						
						<tr><td colspan="20"align="left" style="font-size:22px; font-weight:bold;"><a href='surgery_instrument'><span>Create Surgical Set</span></a></td></tr>	
						<tr><td colspan="3"align="left"><a href="purchase_transfer_ot?sno=<?php echo $runningTime1;?>"><font size="5" color="green">Request For Stock(Store)</td></tr>
						
						
						
							<?php if($fullname=='485' || $fullname=='ot01'){	echo'	

<tr><td colspan="20"align="left"><a href="tender/equipment/asset_management_ot"><font size="4.5">Add Instrument</a></td></tr>
<tr><td colspan="20"align="left"><a href="roaster_home"><font size="4.5">Set Departmental Roster</a></td></tr>


'


;}

		

	?>	
<?php if($fullname=='54' || $fullname=='294' || $fullname=='729' || $fullname=='1194' || $fullname=='679' || $fullname=='729' || $fullname=='1160' || $fullname=='485'){	echo'	
	<tr><td colspan="20" align="left"><a href="tender/equipment/asset_management" style="color:red;font-size:20px;font-weight:bold;"><font size="4.5">New(RFID)</a></td></tr>
	<tr><td colspan="20" align="left"><a href="asset_search_new" style="color:red;font-size:20px;font-weight:bold;"><font size="4.5">Search By(RFID)</a></td></tr>
		';}?>
		
		<tr><td colspan="20"align="left"><a href="roaster_home_indu"><font size="4.5">Staff's Roster</a></td></tr>	  
<tr><td colspan="20"align="left"><a href="consent_patient"><span><font size="5.5" color="green" font-weight="bold">Upload Consent Forms</span></a></td></tr>					
</table>
    


  
<?php if($ad=='b')
{
	$txt='Greetings'.' '.$full.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}?>    

    


</body>

</html>
