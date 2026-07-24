<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$cyear=date('Y');

$ad='b';
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
$ipd_bal=$row3['ipd_bal'];
$opd_bal=$row3['opd_bal'];
$year=date('Y');


$idept=$row3['dept'];
$gender= $row3['gender'];
$doj= $row3['doj'];
$status1= $row3['cstatus'];
$pal1= $row3['paleave'];
$cdate=date('m/d/Y');
$hos=$row3['hos'];
$incharge=$row3['incharge'];
$date4 = new DateTime($cdate);
$date3 = new DateTime($doj);

$diff2 = $date3->diff($date4, true);

$diff3= $diff2->format('%a')+1;


$el= $row3['etaken'];
$al= $row3['ataken'];
$sl= $row3['staken'];
$sl1= $row3['sleave'];

$ma= 112-(int)$row3['mataken']; 
$pa= $row3['pataken'];
$doj= $row3['doj'];  
$status= $row3['status']; 
//$pa= $row['padd'];
$cf= $row3['cfleave'];

$sl1s=14-(int)$sl;

$sl1s_p=5-(int)$sl;
 
/*$date2=date('01/01/2019');
$date1= date('m/d/Y');
$date3=date_create("$date2");
$date4=date_create("$date1");
$diff=date_diff($date4,$date3);
echo $diff->format("%d");*/
$now = time(); // or your date as well


$doj78=strtotime($doj);



$doj12=date('Y',strtotime($doj));


$datediff78 = $now - $doj78;

//echo $fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;
$fday8= round($datediff78 / (60 * 60 * 24)*.0164,2) ;


$year=date('Y');
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
$your_date1 = strtotime("$doj");
//$your_date = strtotime("2019-01-01");
$datediff = $now - $your_date;
$datediff_y = $now - $your_date1;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438,2) ;
$fday_y= round($datediff_y / (60 * 60 * 24)*.0438,2) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274,2) ;
$fday1_y= round($datediff_y / (60 * 60 * 24)*.0274,2) ;

$fday9= round($datediff78 / (60 * 60 * 24)*.0274,2) ;

$fday3= round($datediff / (60 * 60 * 24)*.0164,2) ;
$fday3_y= round($datediff_y / (60 * 60 * 24)*.0164,2) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;


//echo $fday;
$aday=$fday+$cf-$al;
$aday_y=$fday_y+$cf-$al;
$aday1=$fday1-$el;
$aday1_y=$fday1_y-$el;
$aday2=$fday3-$al+$cf;
$aday2_y=$fday3_y-$al+$cf;


$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");


$query198 = "SELECT SUM(b_amount) FROM staff_benefit where s_id='$fullname' and b_type='IPD' and year='$year' and status!='Cancel'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$ipd=$ipd_bal - $row198['SUM(b_amount)'];
$ipd1=$row198['SUM(b_amount)'];



$queryo = "SELECT SUM(b_amount) FROM staff_benefit where s_id='$fullname' and b_type='OPD' and year='$year' and status!='Cancel'"; 
	 
$resulto = mysqli_query($dbhandle,$queryo) or die(mysql_error());

// Print out result
$rowo = mysqli_fetch_array($resulto);
$opd=$ipd_bal -	$rowo['SUM(b_amount)'];
$opd1=$rowo['SUM(b_amount)'];






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

$tp=$row22['COUNT(id)']+$row23['COUNT(id)'];
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


<body>





<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
   
   
   
 
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
   
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>



        



 


<?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>


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
<tr>
<td colspan="3" bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>IPD Balance</td>
		<td colspan="3"bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>OPD Balance</td>
		<td colspan="3" bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>Annual Leave</td>
		<td colspan="3"bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>Emergency Leave</td>
		<td colspan="3"bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>Sick Leave</td>
		<td colspan="3"bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>Maternity Leave</td>
		<td colspan="3"bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>Paternity Leave</td>
		
		</tr>
		
		<tr>
		<td colspan="3" bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php echo $ipd_bal;?></td>
		<td colspan="3"bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php echo $opd_bal;?></td>
		<td colspan="3" bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php if($status1=='Confirm'and $cyear!=$doj12){echo $aday;} else if($status1=='Confirm'and $cyear==$doj12){echo $aday_y;}else if($status1=='nonconfirm' and $cyear==$doj12){echo $aday2_y;}else if($status1=='nonconfirm' and $cyear!=$doj12){echo $aday2;}?>
		<td colspan="3" bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php if($status1=='Confirm' and $cyear!=$doj12){echo $aday1;}else if($status1=='Confirm' and $cyear==$doj12){echo $aday1_y;} else if($status1=='nonconfirm'){echo '0';}?></td>
		<td colspan="3" bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php if($status1=='Confirm'){echo $sl1s;} else if($status1=='nonconfirm'){echo $sl1s_p;}?></td>
		<td colspan="3" bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php if($gender=='F'){echo '112';} else {echo '0';}?></td>
		<td colspan="3" bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php if($gender=='M'){echo '2';} else {echo '0';}?></td>					
		
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
<td colspan="2"align="left"><a href="recruit/job"><font size="4.5">Recruitment</a></td>
'
;}



	?>	

		
	  
 <tr><td colspan="20"align="left"><a href="attnstatsindu"><font size="4.5">Datewise Attendance</td></tr>	
 <tr><td colspan="20"align="left"><a href="video/video"><font size="4.5">Hospital Video</td></tr>	
<tr><td colspan="20"align="left"><a href="roaster_home_indu"><font size="4.5">Staff's Roster</a></td></tr>	  


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

'
;}

		

	?>	

	
		<?php if($user=='15' || $user=='580'){	echo'	

<tr>	<td colspan="20"align="left"><a href="consu_adm"><font size="4.5">Consultant Menu</a></td></tr>
<tr><td colspan="20"align="left"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td><tr>	'
;}

		

	?>	
	
	
	
	<?php if($user=='72' or $user=='45'){	echo'	

<tr>	<td colspan="20"align="left"><a href="storeedit_test1"><font size="4.5">Edit Hospital Equipment</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="dmaterialstore"><font size="4.5">Add Hospital Equipment / Asset</a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="dmaterialstore1"><font size="4.5">Add Hospital Disposible</a></td></tr>
'
;}

		

	?>	

	
			<?php if($user=='805'){	echo'	

<tr>	<td colspan="20"align="left"><a href="ddpendingrequest"><font size="4.5">Doridro Fund Request</a></td></tr>	
<tr><td colspan="20"align="left"><a href="recruit/job"><font size="4.5">Recruitment</a></td></tr>
<tr><td colspan="20s"align="left"><a href="generic_brand_request"><font size="4.5">CME Medicine Add Request</a></td>
<tr><td colspan="20s"align="left"><a href="generic_brand_request_edit"><font size="4.5">CME Medicine Edit Request</a></td>
<tr><td colspan="20s"align="left"><a href="cme_medi_request"><font size="4.5">CME Medicine Request Status</a></td>
<tr><td colspan="20s"align="left"><a href="opdmng"><font size="4.5">OPD STATS</a></td>'

;}

		

	?>	
	
	<?php if($user=='805'){	echo'	

<tr>	<td colspan="20"align="left"><a href="history1mng"><font size="4.5">Patient History</a></td></tr>	'
;}

		

	?>	
	
	<?php if($user=='805'){	echo'	

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

<tr><td colspan="20"align="left"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td><tr>'
;}

		

	?>	

	
	<?php if($user=='455'){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>	'
;}

		

	?>	

	
	<?php if($user=='327' || $user=='414'){	echo'	

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

<tr><td colspan="20"align="left"><a href="new_phone"><font size="4.5">Hospital Contact Information Panel</a></td><tr>'
;}

		

	?>	


		<?php if($user=='338'){	echo'	

<tr>	<td colspan="20"align="left"><a href="inves_request_a"><font size="4.5">Edit / Forward New Investigation Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="eapprove_new"><font size="4.5">Edit / Forward PCS Charge Code Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="phar_approve_new"><font size="4.5">Edit / Forward Pharmacy Charge Code Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="categoryinvesmng_f"><font size="4.5">Edit Lab Cost Price</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="dmaterialstore_bill"><font size="4.5">Add Hospital Equipment / Asset</a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="dmaterialstore1_bill"><font size="4.5">Add Hospital Disposible</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="radeditapp_bill"><font size="4.5">Cancel Radiology Appointment</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="bedviewbill_bill"><font size="4.5">Edit Bed Status</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="add_new_bed"><font size="4.5">Add New bed</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="storeedit"><font size="4.5">Edit Disposible Price</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="opd_doc_schedule"><font size="4.5">Edit Consultant Charge</a></td></tr>


'

;}

		

	?>	


		<?php if($user=='322'){	echo'	

<tr>	<td colspan="20"align="left"><a href="inves_request_a"><font size="4.5">Edit / Forward New Investigation Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="eapprove_new"><font size="4.5">Edit / Forward PCS Charge Code Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="phar_approve_new"><font size="4.5">Edit / Forward Pharmacy Charge Code Request</a></td></tr>

<tr>	<td colspan="20"align="left"><a href="uid_pa"><font size="4.5">Change Staff Type</a></td></tr>'



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
'


;}

		

	?>		
	
	

	
	<?php if($dept=='Out Patient Services' and $cat=='Staff')
{echo'	
<tr><td colspan="20"align="left"><a href="new_opd"><font size="4.5">OPD Appointment System</a></td></tr>'
;}?>

<?php if($user=='951' || $user=='792' || $user=='174' || $user=='322' || $user=='82' || $user=='570' || $user=='857')
{echo'	
<tr><td colspan="20"align="left"><a href="student_portal"><font size="4.5">Student Portal</a></td></tr>'
;}?>	
	
	<?php if($dept=='Information Technology'){	echo'	

<tr>	<td colspan="20"align="left"><a href="it_clearance_panel"><font size="4.5">IT Clearance Panel</a></td></tr>'

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

</html>
