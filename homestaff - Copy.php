<?php 
//ini_set('session.gc_maxlifetime', 30); // Set session timeout to 24 hours
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }

	/*if(time() - $_SESSION['timestamp'] > 10) { //subtract new timestamp from the old one
		echo "<script>alert('15 Minutes over!');</script>";
		unset($_SESSION['username'], $_SESSION['password'], $_SESSION['timestamp']);
		$_SESSION['logged_in'] = false;
		header("Location: login2.php"); //redirect to index.php
		exit;
	} else {
		$_SESSION['timestamp'] = time(); //set new timestamp
	}
	*/
?>


<?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$month= date('m');
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
/*$h=date('Y-m-d');
$g=strtotime($h);
date("W", $g);*/
$ad='b';
$test=$_SESSION['user_session_id'];
?>


	<?php
$did = "CtaXiM7Zd3Ds9.Y";
$ciphering = "AES-192-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011123';
$encryption_key = "login";
$encryption = openssl_encrypt($did,$ciphering,$encryption_key, $options, $encryption_iv);
$encryption2 = openssl_encrypt($did,$ciphering,$encryption_key, $options, $encryption_iv);
//accounts
//echo "<a target='_blank' href='https://sfmmkpjsh.com/login?e=admission@sfmmkpjsh.com&p=".$encryption."'>Login<a/>";
?>

<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];
$dd=$row3['dept'];
$in_id=$row3['sid1'];
$dt=date('Y-m-d');

$runningTime = date('misis');
$runningTime1 = date('misis').$user;

$log = "SELECT COUNT(id) FROM logbook_users where user_id= '$fullname' and status='1'"; 
		
	$log_res = mysqli_query($con, $log) or die(mysqli_error());

	// Print out result
	$log_data = mysqli_fetch_array($log_res);

	$log_count = $log_data['COUNT(id)'];



$query22 = "SELECT COUNT(id) FROM tm3 where date1='$dt' and status='P' and hos='$in_id'"; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$query22a = "SELECT COUNT(id) FROM tm3 where date1='$dt' and status='P' and uid='$in_id'"; 
$result22a = mysqli_query($con, $query22a) or die(mysqli_error());
$row22a = mysqli_fetch_array($result22a);



$query23 = "SELECT COUNT(id) FROM tm3 where hos='$in_id' and date1='$dt' and status='LT'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);

$query23a = "SELECT COUNT(id) FROM tm3 where uid='$in_id' and date1='$dt' and status='LT'"; 
$result23a = mysqli_query($con, $query23a) or die(mysqli_error());
$row23a = mysqli_fetch_array($result23a);



$query24 = "SELECT COUNT(id) FROM tm3 where hos='$in_id' and date1='$dt' and status='A'"; 
$result24 = mysqli_query($con, $query24) or die(mysqli_error());
$row24 = mysqli_fetch_array($result24);


$query24a = "SELECT COUNT(id) FROM tm3 where uid='$in_id' and date1='$dt' and status='A'"; 
$result24a = mysqli_query($con, $query24a) or die(mysqli_error());
$row24a = mysqli_fetch_array($result24a);



$query25 = "SELECT COUNT(id) FROM tm3 where hos='$in_id' and date1='$dt' and status='L'"; 
$result25 = mysqli_query($con, $query25) or die(mysqli_error());
$row25 = mysqli_fetch_array($result25);


$query25a = "SELECT COUNT(id) FROM tm3 where uid='$in_id' and date1='$dt' and status='L'"; 
$result25a = mysqli_query($con, $query25a) or die(mysqli_error());
$row25a = mysqli_fetch_array($result25a);

$query26 = "SELECT COUNT(id) FROM staff3 where hos='$in_id' and status='Active' || sid='$fullname'"; 
$result26 = mysqli_query($con, $query26) or die(mysqli_error());
$row26 = mysqli_fetch_array($result26);

$tp=$row22['COUNT(id)']+$row23['COUNT(id)']+1;
$tmp=$row26['COUNT(id)'];
$ta=$row24['COUNT(id)']+$row25['COUNT(id)'];

//$url = "attn_com?dept=$dd"; 
$ss='P';
$ss1='LT';
$ss2='A';
$ss3='L';

$queryin = "SELECT COUNT(id) FROM incident1 where fby='$fullname' and status !='Closed'"; 
$resultin = mysqli_query($con, $queryin) or die(mysqli_error());
$rowin = mysqli_fetch_array($resultin);
$cin=$rowin['COUNT(id)'];


$present=$row22["COUNT(id)"]+$row22a["COUNT(id)"];
$late=$row23["COUNT(id)"]+$row23a["COUNT(id)"];
$absent=$row24["COUNT(id)"]+$row24a["COUNT(id)"];
$leave=$row25["COUNT(id)"]+$row25a["COUNT(id)"];
	



       $count1a = $tp / $tmp;
       $count2a = $count1a * 100;
       $counta = round($count2a);
     $counta;



       $count1b = $ta / $tmp;
       $count2b = $count1b * 100;
       $countb = round($count2b);
     $countb;


	



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


<body onload="startTime()">





<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
   
   <li class='last'><a href='EVENT\index'><span>Event</span></a></li>
   
 
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <?php if($fullname==284)
   {
   echo "<li class='active has-sub'><a href='#'><span>Customer Counselling Menu</span></a>
      <ul>
         <li class='has-sub'><a href='bedviewbill'><span>Bed Management</span></a>
            
         </li>
         <li class='has-sub'><a href='qcview'><span>Todays In-Patients List</span></a>
            
         </li>
		 <li class='has-sub'><a href='feed'><span>Add Feedback</span></a>
            
         </li>
		 <li class='has-sub'><a href='feedstats'><span>Feedback Stats</span></a>
            
         </li>
      </ul>
   </li>";
   }
   ?>
   <li class='last'><?php if ($log_count>0){echo "<a style='color:red;font-size:20px;font-weight:bold;' href='logbook/index'><span>Logbook</span></a>";}?></li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>



        



 
<script type="text/javascript">
/*var timestamp = '<?=date;?>';
function updateTime(){
  $('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});*/



function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>


<script>
/*
function display_ct6() {
var x = new Date()
var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
hours = x.getHours( ) % 12;
hours = hours ? hours : 12;
var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
document.getElementById('ct6').innerHTML = x1;
display_c6();
 }
 function display_c6(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct6()',refresh)
}
display_c6()
*/
</script>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr><td colspan="19"align="center"bgcolor="lightblue"class="style1" border="0">Welcome!! <?php echo $row39['fullname']; ?></td>
<td colspan="1"align="center"bgcolor="lightblue">
<a target='_blank' href="hinfo111"><img src="hinfo.jpg" title="Hospital Information" width="50" height="30" /></a>
<a target='_blank' href="task_index"><img src="to_do.jpg" title="ADD YOUR TO-DO-LIST" width="50" height="30" /></a>

<?php if($user=='15'){
	echo
'<a target="_blank" href="event_cal/calender"><img src="event_cal/cal_view.png" title="Update Calendar" width="50" height="30" /></a>
<a target="_blank" href="tcmeview2n"><img src="event_cal/cal_view.png" title="Update Consultant RFID" width="50" height="30" />Update Consultant RFID</a>';
}
else
	{
	echo
'<a target="_blank" href="event_cal/calender_view"><img src="event_cal/cal_view.png" title="Update Calendar" width="50" height="30" /></a>';
}
?>
</td>



</tr>
<tr><td colspan="19"align="center"bgcolor="lightgreen"><img  src="staff_pic/<?php echo $row3['pic'] ?>" width="100"  height="100" align="center"></td>
<td colspan="1"align="center"bgcolor="lightgreen"><h3><?php echo date('d/m/Y')?>

<p id='txt' style="color:red; font-size:20px; font-weight:bold;"></p>
</h3>


</td>
</tr>


<?php 

if($cat=='HOD' or $cat=='Incharge'){
	echo'	

	
	<tr>
	
      
	  <th colspan="3"style="color:blue;text-align:center;font-size:25px;font-weight:bold;"><strong>Total Manpower<br>  '.$row26["COUNT(id)"].'</strong></th>
	  <th colspan="3"style="color:green;text-align:center;font-size:25px;font-weight:bold;"><strong>Present<br> <a href="attn_com?dept='.$dd.'&ss='.$ss.'&hos='.$in_id.'">'.$present.'</a></strong></th>
	  <th colspan="3"style="color:lightgreen;text-align:center;font-size:25px;font-weight:bold;"><strong>Late<br> <a href="attn_com1?dept='.$dd.'&ss='.$ss1.'&hos='.$in_id.'"> '.$late.'</strong></th>
	  <th colspan="3"style="color:red;text-align:center;font-size:25px;font-weight:bold;"><strong>Absent<br> <a href="attn_com1?dept='.$dd.'&ss='.$ss2.'&hos='.$in_id.'"> '.$absent.'</strong></th>
	  
      <th colspan="3"style="color:brown;text-align:center;font-size:25px;font-weight:bold;"><strong>Leave<br> <a href="attn_com1?dept='.$dd.'&ss='.$ss3.'&hos='.$in_id.'"> '.$leave.'</strong></th>
	  <th colspan="4"style="color:green;text-align:center;font-size:25px;font-weight:bold;"><strong>Present<br>'.$counta.'%</strong></th>
	  <th colspan="1"style="color:red;text-align:center;font-size:25px;font-weight:bold;"><strong>Absent<br>'.$countb.'%</strong></th>
	  
    
      
	  
      
	   </tr>
  ';}

  
  
  


?>













<?php if($dept=='Human Resources Management')
{echo'	
<tr><td colspan="20"align="left"><a href="staffdetails"><font size="4.5">Staff Information</a></td></tr>'
;}?>

<tr><td colspan="20"align="left"><a href="staffleave"><font size="4.5">Staff Leave </td></tr>	
<tr><td colspan="20"align="left"><a href="hinfo111"><font size="4.5">Hospital Information</td></tr>	

<?php if($dept=='Human Resources Management')
{echo'	

<tr><td colspan="20"align="left"><a href="staffadm"><font size="4.5">Staff Admission</a></td></tr>


<tr><td colspan="20"align="ledt"><a href="cmeportaltm"><font size="4.5">	Training & Education Portal</a></td></tr>'
;}?>
		
<?php if($dept=='Human Resources Management'){	echo'	

<tr>	<td colspan="20"align="left"><a href="staffattnm"><font size="4.5">Staff Attendance</a></td></tr>	

<tr>	<td colspan="20"align="left"><a href="attndept2deptall"><font size="4.5">All Staff Attendance Report</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="desig_wise_attn"><font size="4.5">Todays Summary Attendance Report</a></td></tr>	
<tr><td colspan="20"align="left"><a href="recruit/job"><font size="4.5">Recruitment</a></td></tr>
<tr><td colspan="20"align="left"><a href="medical_staff"><font size="4.5">Staff Medical Benefit Report</a></td></tr>
<tr><td colspan="20"align="left"><a href="medical_staff_1"><font size="4.5">Department Medical Benefit Report</a></td></tr>
'
;}



	?>	

		
	  
 <tr><td colspan="20"align="left"><a href="attnstatsindu"><font size="4.5">Datewise Attendance</td></tr>	
 <tr><td colspan="20"align="left"><a href="video/video"><font size="4.5">Hospital Video</td></tr>	
<tr><td colspan="20"align="left"><a href="roaster_home_indu"><font size="4.5">Staff's Roster</a></td></tr>	  
<tr><td colspan="20"align="left"><a href="cafe/OwnBill.php?m=<?= date('m') ?>"><font size="4.5">Current Month Cafe Bill</a></td></tr>	  



<?php if($cat!='Staff'){	echo'	

<tr>	<td colspan="20"align="left"><a href="attndept2dept"><font size="4.5">Departmental Attendance Report</a></td></tr>

	'
;}

		

	?>	

	
	

	
	<?php if($cat=='HOD' or $cat=='Incharge'){	echo'	

<tr>	<td colspan="20"align="left"><a href="hos_log"><font size="4.5">Departmental Log </a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="mrequest"><font size="4.5">Material Request </a></td></tr>	
<tr><td colspan="20"align="left"><a href="bio_list"><font size="4.5">Asset List</td></tr>	
<tr><td colspan="20"align="left"><a href="bio_list_edit"><font size="4.5">Asset List (Added By User)</td></tr>	
<tr><td colspan="20"align="left"><a href="dmaterialstore"><font size="4.5">Add Hospital Equipment / Asset</td></tr>	
<tr><td colspan="20"align="left"><a href="recruit/manpower_requisition"><font size="4.5">Recruitment</a></td></tr>
<tr><td colspan="20"align="left"><a href="bed_mng_test5"><span>Bed Management</span></a></td></tr>
<tr><td colspan="20"align="left"><a href="roaster_home"><font size="4.5">Set Departmental Roster</a></td></tr>
<tr><td colspan="20"align="left"><a href="phar_transfer_support?sno='.$runningTime.'"><font size="4.5">Request For Stock</td></tr>	
<tr><td colspan="20" align="left"><a href="tender/equipment/asset_management"><font size="4.5">New(RFID)</a></td></tr>
	<tr><td colspan="20" align="left"><a href="asset_search_new"><font size="4.5">Search By(RFID)</a></td></tr>
	<tr><td colspan="20" align="left"><a href="tender/equipment/asset_management_dept"><font size="4.5">New Departmental Asset List</a></td></tr>
	<tr><td colspan="20" align="left"><a href="tender/equipment/asset_management_dept_faulty"><font size="4.5">Departmental Faulty Asset List</a></td></tr>
	<tr><td colspan="20" align="left"><a href="cafe/DepartmentWiseBill?m='.date('m').'"><font size="4.5">Departmental Cafeteria Bill</a></td></tr>
	
'
;}

		

	?>	

	
		<?php if($user=='15' || $user=='580'){	echo'	

<tr>	<td colspan="20"align="left"><a href="consu_adm"><font size="4.5">Consultant Menu</a></td></tr>
<tr><td colspan="20"align="left"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td><tr>
<tr><td colspan="20"align="left"><a href="ccomm_admin"><font size="4.5">All Committee Portal</a></td><tr>	
<tr><td colspan="20"align="left"><a href="tender/index"><font size="4.5">Tender Portal</a></td><tr>	
<tr><td colspan="20"align="left"><a href="tender/index"><font size="4.5">Tender Portal</a></td><tr>	
<tr><td colspan="20"align="left"><a href="tender/equipment/hos_room_add"><font size="4.5">Add Hospital Room Information</a></td></tr>
<tr><td colspan="20"align="left"><a href="on_call_room"><font size="4.5">OnCall Room Management</a></td></tr>

'


;}

		

	?>	
	
	
	
	<?php if($user=='1382' or $user=='45'){	echo'	

<tr>	<td colspan="20"align="left"><a href="storeedit_test1"><font size="4.5">Edit Hospital Equipment</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="dmaterialstore"><font size="4.5">Add Hospital Equipment / Asset</a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="dmaterialstore1"><font size="4.5">Add Hospital Disposible</a></td></tr>
<tr><td colspan="20"align="left"><a href="slider/upload2.html"><font size="4.5">PMS Homepage Bottom Slider Maintenance(left)</td></tr>
<tr><td colspan="20"align="left"><a href="all_dept_stock" style="font-size:20px;color:red; font-weight:bold"><font size="4.5">Edit Batch NO</td></tr>
<tr><td colspan="20"align="left"><a href="edit_price_phar" style="font-size:20px;color:red; font-weight:bold"><font size="4.5">Edit Price</td></tr>
'
;}

		

	?>	
	
		
	<?php if($user=='45'){	echo'	

<tr>	<td colspan="20"align="left"><a href="phar_stock_edit"><font size="4.5">Pharmacy Stock Edit</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="storeedit_test1_care"><font size="4.5">Care Shoppe Item List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="eapprove_new_care"><font size="4.5">Pending Care Shoppe Item List</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="cash_collection_0"><font size="4.5">Daily Cashier Report</a></td></tr>


'
;}

		

	?>	

	
			<?php if($user=='805' || $user=='1585'){	echo'	

<tr>	<td colspan="20"align="left"><a href="ddpendingrequest"><font size="4.5">Doridro Fund Request</a></td></tr>	
<tr><td colspan="20"align="left"><a href="recruit/job"><font size="4.5">Recruitment</a></td></tr>
<tr><td colspan="20s"align="left"><a href="generic_brand_request"><font size="4.5">CME Medicine Add Request</a></td>
<tr><td colspan="20s"align="left"><a href="generic_brand_request_edit"><font size="4.5">CME Medicine Edit Request</a></td>
<tr><td colspan="20s"align="left"><a href="cme_medi_request"><font size="4.5">CME Medicine Request Status</a></td>
<tr><td colspan="20s"align="left"><a href="opdmng"><font size="4.5">OPD STATS</a></td>
<tr><td colspan="20s"align="left" style="color:red; font-size:18px;font-weight:bold;"><a href="deathstatmng_minutes"><font size="4.5">Mortality Meeting Minutes</a></td>
<tr><td colspan="20s"align="left" style="color:red; font-size:18px;font-weight:bold;"><a href="deathstatmng1_all"><font size="4.5">Prepare Mortality Meeting Minutes</a></td>
<tr>	<td colspan="20"align="left"><a href="dc_note_confirm"><font size="4.5">Clear DC Note Confirmation</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="mo_attendance"><font size="4.5">MO Attendance</a></td></tr>
<tr><td colspan="20s"align="left"><a href="tumor_test_new" style="color:red; font-size:18px;font-weight:bold;">Board Portal</a></td></tr>
<tr><td colspan="20s"align="left"><a href="manual_tumor_register" style="color:red; font-size:18px;font-weight:bold;">Add Manual Patient in Board Portal</a></td></tr>
<tr><td colspan="2" align="left"><a href="research_home" style="color:blue; font-size:18px;font-weight:bold;"><font size="4.5">Research Portal</a></td></tr>
'
;}

		

	?>	
	
	<?php if($user=='805' || $user=='1585'){	echo'	

<tr>	<td colspan="20"align="left"><a href="history1mng"><font size="4.5">Patient History</a></td></tr>	'
;}

		

	?>	
	
	<?php if($user=='805' || $user=='1585'){	echo'	

<tr>	<td colspan="20"align="left"><a href="predoc5"><font size="4.5">Upload Minutes</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="endoreport_qc"><font size="4.5">Endoscopy Record</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="deathstatmng1_con_indu"><font size="4.5">MMRC</a></td></tr>	'
;}

		

	?>	
	
	
	
	<?php if($user=='284'){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="adm_req"><font size="4.5">View Admission Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="bed_mng_test5"><font size="4.5">Bed Management</a></td></tr>	
<tr><td colspan="20"align="left"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td><tr>'
;}

		

	?>	

	
	
	<?php if($user=='399'){	echo'	

<tr><td colspan="20"align="left"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td><tr>
<tr><td colspan="20"align="left"><a href="inves_request_opd"><font size="4.5">New Investigation Request</a></td><tr>
<tr><td colspan="20"align="left"><a href="opd_doc_list"><font size="4.5">Update Doctor OPD</a></td><tr>'
;}

		

	?>	

	
	<?php if($user=='455'){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>	'
;}

		

	?>	

	
	<?php if($user=='327' || $user=='414' || $user=='1546' || $user=='1725' ){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="bed_mng_test5"><font size="4.5">Bed Management</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="qcview"><font size="4.5">Inpatient List</a></td></tr>	'
;}

		

	?>	
	
	<?php if($user=='459'){	echo'	

<tr>	<td colspan="20"align="left"><a href="gstat"><font size="4.5">Guest House</a></td></tr>
<tr><td colspan="20"align="left"><a href="new_room_home"><font size="4.5">Hospital Room Management</a></td></tr>
<tr><td colspan="3" align="left"><a href="g_house_bed"><font size="4.5">Guest House Room Management(New Format)</a></td></tr>


	'
;}

		

	?>	
	
	<?php if($user=='75'){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="deathstatmngdoc"><font size="4.5">MMRC</a></td></tr>	

<tr><td colspan="20"align="left"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td><tr>
<tr><td colspan="20"align="left"><a href="guest_module_home"><font size="5.5" color="red" font-weight="bold">Guest Module</a></td><tr>
<tr><td colspan="20"align="left"><a href="set_mc_template"><font size="5.5" color="red" font-weight="bold">Prepare Consent Template</a></td><tr>
<tr><td colspan="20"align="left"><a href="research_rela"><font size="5.5" color="red" font-weight="bold">Dr. Rela Project</a></td><tr>
<tr><td colspan="20"align="left"><a href="liver_clinic_app"><font size="5.5" color="red" font-weight="bold">Dr. Rela Patient Appointment</a></td><tr>
<tr><td colspan="20"align="left"><a href="liver_clinic_app_reassign"><font size="5.5" color="red" font-weight="bold">Dr. Rela Patient Reassign Appointment</a></td><tr>
<tr><td colspan="20"align="left"><a href="rela_doc_upload"><font size="5.5" color="brown" font-weight="bold">Upload Rela Document</a></td><tr>
<tr><td colspan="20"align="left"><a href="summary_opd"><font size="5.5" color="black" font-weight="bold">OPD SUMMARY</a></td><tr>
<tr><td colspan="20"align="left"><font size="5.5" color="black" font-weight="bold"><a target="_blank" href="transplant/liver/liver_dash"><span>Transplant Portal</span></a></td><tr>
<tr><td colspan="2" align="left"><a href="research_home" style="color:blue; font-size:18px;font-weight:bold;"><font size="4.5">Research Portal</a></td></tr>
<tr><td colspan="20"align="left"><a href="nursing_form"><font size="5.5" color="red" font-weight="bold">Nursing Form</a></td><tr>

<tr><td colspan="20"align="left"><a style="color:red;font-weight:bold;font-size:20px;" href="list_injury_edit_ack"><span>Pending Injury Certificate Confirmation Request</span></a></td></tr>
'

;}

		

	?>	
	
	<?php if($user=='1678' || $user=='1300'){	echo'	


<tr><td colspan="20"align="left"><a href="guest_module_home"><font size="5.5" color="red" font-weight="bold">Guest Module</a></td><tr>'
;}

		

	?>	


<?php if($user=='156'){	echo'	


<tr><td colspan="2" align="left"><a href="research_home" style="color:blue; font-size:18px;font-weight:bold;"><font size="4.5">Research Portal</a></td></tr>'
;}

		

	?>	


		<?php if($user=='338'){	echo'	

<tr>	<td colspan="20"align="left"><a href="inves_request_a"><font size="4.5">Edit / Forward New Investigation Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="eapprove_new"><font size="4.5">Edit / Forward PCS Charge Code Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="phar_approve_new"><font size="4.5">Edit / Forward Pharmacy Charge Code Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="categoryinvesmng_f"><font size="4.5">Edit Lab Cost Price</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="dmaterialstore_bill"><font size="4.5">Add Hospital Equipment / Asset</a></td></tr>	

<tr>	<td colspan="20"align="left"><a href="radeditapp_bill"><font size="4.5">Cancel Radiology Appointment</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="bedviewbill_bill"><font size="4.5">Edit Bed Status</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="add_new_bed"><font size="4.5">Add New bed</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="dmaterialstore1_bill"><font size="4.5">Add Hospital Disposible</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="storeedit"><font size="4.5">Edit Disposible Price</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="opd_doc_schedule"><font size="4.5">Edit Consultant Charge</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="follow_scan" style="color:red;font-size:22px;font-weight:bold"><font size="4.5">Scan Prescription</a></td></tr>

<tr>	<td colspan="20"align="left"><a href="create_package" style="color:red;font-size:22px;font-weight:bold"><font size="4.5">Create Package</a></td></tr>


'

;}

		

	?>	

<?php if($user=='1603'){	echo'	
<tr>	<td colspan="20"align="left"><a href="dmaterialstore1_bill"><span style="color:red; font-size:20px;">Add Hospital Disposible</a></span></td></tr>
<tr>	<td colspan="20"align="left"><a href="storeedit"><span style="color:red; font-size:20px;">Edit Disposible Price</a></span></td></tr>';
}?>

		<?php if($user=='322'){	echo'	

<tr>	<td colspan="20"align="left"><a href="inves_request_a"><font size="4.5">Edit / Forward New Investigation Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="eapprove_new"><font size="4.5">Edit / Forward PCS Charge Code Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="phar_approve_new"><font size="4.5">Edit / Forward Pharmacy Charge Code Request</a></td></tr>

<tr>	<td colspan="20"align="left"><a href="uid_pa"><font size="4.5">Change Staff Type</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="update_monthly_stock_new"><font size="4.5">Update Monthly Medicine Stock</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="https://sfmmkpjsh.com/login?id=admission@sfmmkpjsh.com&pa=CtaXiM7Zd3Ds9.Y"><font size="4.5">TEST</a></td></tr>

<tr><td>
<a target="_blank" href="https://sfmmkpjsh.com/login?e=admission@sfmmkpjsh.com&p='.$encryption.'">Login<a/>

</td></tr>

<tr>	<td colspan="20"align="left"><a href="dc_note_confirm"><font size="4.5">Clear DC Note Confirmation</a></td></tr>'



;}

		

	?>	
	

<tr><td colspan="20"align="left"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td></tr>	
<tr><td colspan="20"align="left"><a href="staffincident"><font size="4.5">	Incident Report</a>
<font size="4.5" color="#FF0000"><b>(
	<?php echo $cin;?>)<b>

</td></tr>
<tr><td colspan="20"align="left"><a href="eapprove_new_pending"><font size="4.5">	Pending Charge Code Edit / Add List</a></td></tr>

<?php if($dept=='Purchasing And Store Services'){	echo'	

<tr>	<td colspan="20"align="left"><a href="mrequest"><font size="4.5">Material Request </a></td></tr>	
<tr><td colspan="20"align="left"><a href="bio_list"><font size="4.5">Asset List</td></tr>	
<tr><td colspan="20"align="left"><a href="dmaterialstore"><font size="4.5">Add Hospital Equipment / Asset</td></tr>		'
;}

		

	?>	

	

<?php if($user=='951'){	echo'	

<td colspan="2"align="left"><a href="recruit/job"><font size="4.5">Recruitment</a></td>
'


;}

		

	?>		


	
	<?php if($user=='80'){	echo'	

<td colspan="20"align="left"><a href="bedviewbill_nurse"><font size="4.5">Bed Management</a></td>
'


;}

		

	?>		


	<?php if($user=='370'){	echo'	

<td colspan="20"align="left"><a href="bed_mng_test5"><font size="4.5">Bed Management</a></td>
'


;}

		

	?>		

	
	<?php if($user=='399'){	echo'	

<tr><td colspan="20"align="left"><a href="opd_doc_schedule"><font size="4.5">Appointment System</a></td></tr>
<tr><td colspan="20"align="left"><a href="opd_staff_list"><font size="4.5">Edit OPD Staffs Location</a></td></tr>
<tr><td colspan="20"align="left"><a href="research_rela"><font size="5.5" color="red" font-weight="bold">Dr. Rela Project</a></td><tr>
<tr><td colspan="20"align="left"><a href="summary_opd"><font size="5.5" color="black" font-weight="bold">OPD SUMMARY</a></td><tr>
<tr><td colspan="20"align="left"><a href="topdmngadm"><font size="5.5" color="black" font-weight="bold">OPD Details</a></td><tr>
<tr><td colspan="20"align="left"><font size="5.5" color="black" font-weight="bold"><a target="_blank" href="transplant/liver/liver_dash"><span>Transplant Portal</span></a></td><tr>
'


;}

		

	?>		
	
	

	
	<?php if($dept=='Out Patient Services' and $cat=='Staff')
{echo'	
<tr><td colspan="20"align="left"><a href="new_opd"><font size="4.5">OPD Appointment System</a></td></tr>
<tr><td colspan="20"align="left"><a href="patient_work"><font size="4.5">Set Consultant Procedure</a></td></tr>
<tr><td colspan="20"align="left"><a href="work_view_all"><font size="4.5">View Consultant Work Calendar</a></td></tr>
<tr><td colspan="20"align="left"><a href="rdhome"><font size="4.5">Report Print</a></td></tr>
<tr><td colspan="20"align="left"><a href="report_upload" style="font-size:20px; color:red;font-weight:bold;">Upload Outside Investigation Report</a></td></tr>'
;}?>

<?php if($user=='951' || $user=='792' || $user=='174' || $user=='322' || $user=='1678' || $user=='570' || $user=='857')
{echo'	
<tr><td colspan="20"align="left"><a href="student_portal"><font size="4.5">Student Portal</a></td></tr>'
;}?>	
	
	<?php if($dept=='Information Technology'){	echo'	

<tr>	<td colspan="20"align="left"><a href="it_clearance_panel"><font size="4.5">IT Clearance Panel</a></td></tr>

<tr>	<td colspan="20"align="left"><a href="uid_pa_it"><font size="4.5">Change User Type</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="rfid/registration/registration"><font size="4.5">RFID Registration Panel</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="ims/index"><font size="4.5">IP Management Module</a></td></tr>
<tr><td align="left"colspan="2"><a  style="color:green;font-size:20px;font-weight:bold" target="_blank" href="tcmeview2n">Update Staff RFID</td></tr>
<tr><td align="left"colspan="2"><a  style="color:green;font-size:20px;font-weight:bold" target="_blank" href="patient-phone-number">Update Patient Phone No</td></tr>
<tr>	<td colspan="20"align="left"><a href="inves_request_a"><font size="4.5">Edit / Forward New Investigation Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="eapprove_new"><font size="4.5">Edit / Forward PCS Charge Code Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="phar_approve_new"><font size="4.5">Edit / Forward Pharmacy Charge Code Request</a></td></tr>

'
;}

		

	?>	

	
<?php if($user=='45'){	echo'	

<tr>	<td colspan="20"align="left"><a href="pharmacy_stats"><font size="4.5">Medicine Order Stats</a></td></tr>

'
;}

		

	?>		
	


<?php if($user=='688'){	echo'	

<tr>	<td colspan="20"align="left"><a href="eye_csp"><font size="4.5">Spectacles Order</a></td></tr>

'
;}

		

	?>		
<?php if($user=='370' || $user=='1098'){	echo'	

<tr><td colspan="20"align="left"><a href="bio_list"><font size="4.5">Asset List</td></tr>

'
;}

		

	?>			

	
	<?php if($user=='322' || $user=='44'){	echo'	

<tr><td colspan="20"align="left"><a href="asset_search"><font size="4.5">Datewise Asset List</td></tr>

'
;}

		

	?>			


	
	<?php if($user=='918' || $user=='1096' || $user=='1656' || $user=='1254'|| $user=='1239' || $user=='1568'|| $user=='1571'|| $user=='1581'){	echo'	

<tr><td colspan="20"align="left"><a href="radview1_con_1"><font size="4.5">Pending Reports</td></tr>
<tr><td colspan="20"align="left"><a href="rad_report_outside21_usg.php"><font size="4.5">Todays Report</td></tr>
<tr><td colspan="20"align="left"><a href="set_radio_template.php"><font size="4.5">Prepare Your Own Template</td></tr>


'
;}

		

	?>	

	
	<?php if($user=='1475' || $user=='170' || $user=='1290' || $user=='1273' || $user=='322' ){	echo'	

<tr><td colspan="20"align="left"><a href="slider/upload.html"><font size="4.5">PMS Homepage Bottom Slider Maintenance(Middle)</td></tr>
<tr><td colspan="20"align="left"><a href="slider/upload1.html"><font size="4.5">PMS Homepage Bottom Slider Maintenance(right)</td></tr>

<tr><td colspan="20"align="left"><a href="do_upload.php"><font size="4.5">Homepage Side Banner Upload Panel</td></tr>
<tr><td colspan="20"align="left"><a href="guest_module_home"><font size="5.5" color="red" font-weight="bold">Guest Module</a></td><tr>
<tr><td colspan="20"align="left"><a href="leaflet/index"><font size="5.5" color="red" font-weight="bold">Update Doctors Information</a></td><tr>




'
;}

		

	?>	
	
	
		<?php if($user=='74'){	echo'	

<tr><td colspan="20"align="left"><a href="phar_transfer_rad?sno='.$runningTime.'"><font size="4.5">Request Stock</a></td></tr>
<tr><td colspan="20"align="left"><a href="dispose_medicine_rad"><font size="4.5">Discard Medicine</a></td></tr>
<tr><td colspan="20"align="left"><a href="rad_stock_edit"><font size="4.5">View Stock</a></td></tr>
<tr><td colspan="20"align="left"><a href="con_inves_charge_usg_new"><font size="4.5">USG Stats</a></td></tr>


'
;}

		

	?>	
	
	<?php if($user=='891'){	echo'	



<tr><td colspan="20"align="left"><a href="spd_stock"><font size="4.5">View Stock</a></td></tr>
<tr><td colspan="20"align="left"><a href="material_request_spd" style="color:red;font-size:20px;font-weight:bold"><font size="4.5">Add Disposable</a></td></tr>

<tr><td colspan="20"align="left"><a href="spd_stats_new_all" style="color:red;font-size:20px;font-weight:bold"><font size="4.5">SPD Stats</a></td></tr>



'
;}

		

	?>	
	
	<?php if($user=='15' || $user=='75' || $user=='1382' || $user=='22' || $user=='886' || $user=='322'){	echo'	

<tr><td colspan="20"align="left"><a href="tender/index"><font size="4.5">Tender Portal</a></td></tr>

'


;}

		

	?>	
	
	
	<?php if($user=='294' || $user=='1601'){	echo'	

<tr>	<td colspan="20"align="left"><a href="con_inves_charge"><font size="4.5">Investigation Request Stats</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="all_doc_stats"><font size="4.5">Doctor Income Stats</a></td></tr>

'
;}

		

	?>	


<?php if($user=='338' || $user=='1601' || $user=='322'){	echo'	

<tr>	<td colspan="20"align="left"><a href="cash_collection_report_new"><font size="4.5">Cashier Wise Report(Total)</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="cash_collection_report_modewise_1"><font size="4.5">Cashier Wise Report(Payment Mode Wise)</a></td></tr>


'
;}

		

	?>	
	
	
	<?php if($user=='1382' || $user=='22' || $user=='657'){	echo'	

<tr>	<td colspan="20"align="left"><a href="tender/equipment/product_cata4"><font size="4.5">Repository of Medical Equipment</a></td></tr>

'
;}

		

	?>	
<?php if($user=='1264'){	echo'	

<tr><td colspan="20" align="left"><a href="cafeteria/index"><font size="4.5">Cafeteria</a></td></tr>
'
;}

		

	?>	


<?php if($user=='71' || $user=='54' || $user=='534'){	echo'	

<tr><td colspan="20"align="left"><a href="print_barcode"><font size="4.5">Barcode Print</a></td></tr>
<tr><td colspan="20" align="left"><a href="tender/equipment/asset_management"><font size="4.5">New(RFID)</a></td></tr>
	<tr><td colspan="20" align="left"><a href="asset_search_new"><font size="4.5">Search By(RFID)</a></td></tr>

'


;}

		

	?>		
	
	
	<?php if($user=='1382'){	echo'	

<tr><td colspan="20"align="left"><a href="print_barcode"><font size="4.5">Barcode Print</a></td></tr>

<tr>	<td colspan="20"align="left"><a href="dmaterialstore1_bill"><font size="4.5">Add Hospital Disposible</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="storeedit"><font size="4.5">Edit Disposible Price</a></td></tr>
'


;}

		

	?>	

	
		<?php if($user=='1264'){	echo'	

<tr><td colspan="20"align="left"><a href="inplabdietcafe.php" style="color:red;font-size:18px; font-weight:bold"><font size="4.5">Inpatient Diet</a></td></tr>


'


;}

		

	?>	
	
	<?php if($user=='74'){	echo'	

<tr><td colspan="20"align="left"><a href="pedit1_rad_1.php" style="color:red;font-size:18px; font-weight:bold"><font size="4.5">Change DOB</a></td></tr>


'


;}

		

	?>	
<?php if($user=='1276' || $user=='1292'){	echo'	
<tr><td colspan="20"align="left"><a href="set_mc_template"><font size="5.5" color="red" font-weight="bold">Prepare Consent Template</a></td><tr>
<tr><td colspan="20"align="left"><a href="nursing_form"><font size="5.5" color="red" font-weight="bold">Nursing Form</a></td><tr>
';}
?>


<?php if($user=='1601' || $user=='327'){	echo'	
<tr><td colspan="20"align="left"><a href="billot_staff"><font size="5.5" color="red" font-weight="bold">Todays OT List</a></td><tr>

';}
?>


<?php if($dept=='Nursing College' || $user=='621' || $user=='338' || $user=='1789'){	echo'	

<tr><td>
<a target="_blank" href="http://192.168.98.153:8085/ncms/login-from-pms/'.$_SESSION["sess_username"].'">NCMS</a>

</td></tr>	



'


;}

	else if($user=='621'){	echo'	

<tr><td>
<a target="_blank" href="https://sfmmkpjsh.com/login?e=accounts@sfmmkpjsh.com&p='.$encryption.'">Online Admission Accounts<a/>

</td></tr>	



'


;}
	

	?>	



<?php if($user=='174' || $user=='792' || $user=='1300' || $user=='731' || $user=='1062' || $user=='1207' || $user=='1073' || $user=='990' || $user=='973'){	echo'	

<tr><td>
<a target="_blank" href="https://sfmmkpjsh.com/login?e=admission@sfmmkpjsh.com&p='.$encryption.'">Online Admission<a/>

</td></tr>	



'


;}

	else if($user=='621'){	echo'	

<tr><td>
<a target="_blank" href="https://sfmmkpjsh.com/login?e=accounts@sfmmkpjsh.com&p='.$encryption.'">Online Admission Accounts<a/>

</td></tr>	



'


;}
	

	?>
	
<tr>


	
<td colspan="20"align="left"><a href="oes1/index"><span><font size="5.5" color="green" font-weight="bold">Online Exam Module</span></a></td>
	</tr>
	
	<tr><td colspan="20"align="left"><a href="purchase_transfer_ot?sno=<?php echo $runningTime1;?>"><font size="4.5">Request For Material(Store)</td></tr>	

		<?php if($user=='54' || $user=='294' || $user=='729' || $user=='1194' || $user=='679' || $user=='729' || $user=='1160' || $user=='485'){	echo'	
	<tr><td colspan="20" align="left"><a href="tender/equipment/asset_management"><font size="4.5">New(RFID)</a></td></tr>
	<tr><td colspan="20" align="left"><a href="asset_search_new"><font size="4.5">Search By(RFID)</a></td></tr>
		';}?>
		


		<?php if($user=='1475' || $user=='75' || $user=='399'){	echo'	
	<tr><td colspan="20" align="left"><a href="ap/index"><font size="4.5" color="green">Antenatal Program Portal</a></td></tr>
	
		';}?>


<?php if($user=='294'){	echo'	
	<tr><td colspan="20" align="left"><a href="statement/DoctorsSalaryStatement?m=04"><font size="4.5" color="green">Doctor Salary Satement</a></td></tr>
	
		';}?>


<?php if($dept=='Pharmacy Services'){	echo'	
	<tr><td colspan="20" align="left"><a href="phar_home" style="font-size:25px; color:red; font-weight:bold"><font size="4.5">Pharmacy</a></td></tr>
	<tr><td colspan="20" align="left"><a href="phar_home_02" style="font-size:25px; color:red; font-weight:bold"><font size="4.5">Pharmacy 2nd Floor</a></td></tr>
	
		';}?>
		



		<?php if($user=='322' || $user=='1603' || $user=='71' || $user=='534' || $user=='54' || $user=='45'){	echo'	
	<tr><td colspan="20" align="left"><a href="purchase_home"><font size="4.5" color="green">Purchase Home</a></td></tr>
	
		';}?>


<?php if($user=='1186' || $user=='322'){	echo'	
	<tr><td colspan="20" align="left"><a href="con_inves_charge"><font size="4.5" color="green">Doctor Investigation Stats</a></td></tr>
	
		';}?>


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
	



</table>
    



 
</form>

</body>
<script>

function check_session_id()
{
    var session_id = "<?php echo $test; ?>";

    fetch('check_login.php').then(function(response){

        return response.json();

    }).then(function(responseData){

        if(responseData.output == 'logout')
        {
            window.location.href = 'logout_new.php';
        }

    });
}

setInterval(function(){

    check_session_id();
    
}, 10000);

</script>


<script>

let idleTime = 0;
const idleMax = 10; // Logout after 10 minutes of inactivity
const logoutUrl = 'logout.php'; // Your logout page URL

$(document).ready(function() {
  var idleInterval = setInterval(timerIncrement, 60000); // Check every minute

  // Reset timer on user activity
  $(document).mousemove(function(e) {
      idleTime = 0;
  });
  $(document).keypress(function(e) {
      idleTime = 0;
  });
});

function timerIncrement() {
  idleTime++;
  if (idleTime > idleMax) {
    alert("You have been logged out due to inactivity."); // Optional warning
    window.location.href = logoutUrl; // Redirect to logout page
  }
}
</script>
</html>
