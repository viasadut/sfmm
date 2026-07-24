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
$dt=date('Y-m-d');





$query22 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt' and status='P'"; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$query23 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt' and status='LT'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);

$query24 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt' and status='A'"; 
$result24 = mysqli_query($con, $query24) or die(mysqli_error());
$row24 = mysqli_fetch_array($result24);

$query25 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt' and status='L'"; 
$result25 = mysqli_query($con, $query25) or die(mysqli_error());
$row25 = mysqli_fetch_array($result25);


$query26 = "SELECT COUNT(id) FROM staff3 where dept='$dd' and status='Active'"; 
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
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
		 <li class='has-sub'><a href='pedit1'><span>Edit Patient Record</span></a>
            
         </li>
		 <li class='has-sub'><a href='manualesearchdd'><span>Old Doridro Fund Request</span></a>
            
         </li>
      </ul>
   </li>
   
   
   
 
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



        


<p align="center" class="style1">Welcome!! <?php echo $row39['fullname']; ?> </p> 
 


<?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >

<tr><td colspan="20"align="center"bgcolor="lightgreen"><img  src="staff_pic/<?php echo $row3['pic'] ?>" width="100"  height="100" align="center"></td></tr>
<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module  (<?php echo "Date:" ?> <?php echo date('d/m/Y')?>) </h3> </td></tr>


<?php 

if($cat=='HOD' or $cat=='Incharge'){
	echo'	

	
	<tr>
      
	  <th width="17%"style="color:blue;text-align:center;font-size:25px;font-weight:bold;"><strong>Total Manpower<br>  '.$row26["COUNT(id)"].'</strong></th>
	  <th width="17%"style="color:green;text-align:center;font-size:25px;font-weight:bold;"><strong>Present<br> <a href="attn_com?dept='.$dd.'&ss='.$ss.'">'.$row22["COUNT(id)"].'</a></strong></th>
	  <th width="17%"style="color:lightgreen;text-align:center;font-size:25px;font-weight:bold;"><strong>Late<br> <a href="attn_com1?dept='.$dd.'&ss='.$ss1.'"> '.$row23["COUNT(id)"].'</strong></th>
	  <th width="17%"style="color:red;text-align:center;font-size:25px;font-weight:bold;"><strong>Absent<br> <a href="attn_com1?dept='.$dd.'&ss='.$ss2.'"> '.$row24["COUNT(id)"].'</strong></th>
	  
      <th width="10%"style="color:brown;text-align:center;font-size:25px;font-weight:bold;"><strong>Leave<br> <a href="attn_com1?dept='.$dd.'&ss='.$ss3.'"> '.$row25["COUNT(id)"].'</strong></th>
	  <th width="10%"style="color:green;text-align:center;font-size:25px;font-weight:bold;"><strong>Present<br>'.$counta.'%</strong></th>
	  <th width="10%"style="color:red;text-align:center;font-size:25px;font-weight:bold;"><strong>Absent<br>'.$countb.'%</strong></th>
	  
      
      
	  
      
	   </tr>
  ';}

  
  
  


?>













<?php if($dept=='Talent Management Services')
{echo'	
<tr><td colspan="20"align="left"><a href="staffdetails"><font size="4.5">Staff Information</a></td></tr>'
;}?>

<tr><td colspan="20"align="left"><a href="staffleave"><font size="4.5">Staff Leave </td></tr>	

<?php if($dept=='Talent Management Services')
{echo'	

<tr><td colspan="20"align="left"><a href="staffadm"><font size="4.5">Staff Admission</a></td></tr>


<tr><td colspan="20"align="ledt"><a href="cmeportaltm"><font size="4.5">	Training & Education Portal</a></td></tr>'
;}?>
		
<?php if($dept=='Talent Management Services'){	echo'	

<tr>	<td colspan="20"align="left"><a href="staffattnm"><font size="4.5">Staff Attendance</a></td></tr>	

<tr>	<td colspan="20"align="left"><a href="attndept2deptall"><font size="4.5">All Staff Attendance Report</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="desig_wise_attn"><font size="4.5">Todays Summary Attendance Report</a></td></tr>	
<td colspan="2"align="left"><a href="recruit/job"><font size="4.5">Recruitment</a></td>
'
;}



	?>	

		
	  
 <tr><td colspan="20"align="left"><a href="attnstatsindu"><font size="4.5">Datewise Attendance</td></tr>	
	  


<?php if($cat!='Staff'){	echo'	

<tr>	<td colspan="20"align="left"><a href="attndept2dept"><font size="4.5">Departmental Attendance Report</a></td></tr>	'
;}

		

	?>	


	
	<?php if($cat=='HOD' or $cat=='Incharge'){	echo'	

<tr>	<td colspan="20"align="left"><a href="hos_log"><font size="4.5">Departmental Log </a></td></tr>	
<tr>	<td colspan="20"align="left"><a href="mrequest"><font size="4.5">Material Request </a></td></tr>	
<tr><td colspan="20"align="left"><a href="bio_list"><font size="4.5">Asset List</td></tr>	
<tr><td colspan="20"align="left"><a href="dmaterialstore"><font size="4.5">Add Hospital Equipment / Asset</td></tr>	
'
;}

		

	?>	

	
		<?php if($user=='15'){	echo'	

<tr>	<td colspan="20"align="left"><a href="consu_adm"><font size="4.5">Consultant Menu</a></td></tr>	'
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

<tr>	<td colspan="20"align="left"><a href="ddpendingrequest"><font size="4.5">Doridro Fund Request</a></td></tr>	'
;}

		

	?>	
	
	<?php if($user=='805'){	echo'	

<tr>	<td colspan="20"align="left"><a href="history1mng"><font size="4.5">Patient History</a></td></tr>	'
;}

		

	?>	
	
	<?php if($user=='805'){	echo'	

<tr>	<td colspan="20"align="left"><a href="predoc5"><font size="4.5">Upload Minutes</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="endoreport_qc"><font size="4.5">Endoscopy Record</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="deathstatmngdoc"><font size="4.5">MMRC</a></td></tr>	'
;}

		

	?>	
	
	
	
	<?php if($user=='284'){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="adm_req"><font size="4.5">View Admission Request</a></td></tr>	'
;}

		

	?>	

	
	<?php if($user=='455'){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>	'
;}

		

	?>	

	
	<?php if($user=='327'){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>	'
;}

		

	?>	
	
	<?php if($user=='459'){	echo'	

<tr>	<td colspan="20"align="left"><a href="gstat"><font size="4.5">Guest House</a></td></tr>	'
;}

		

	?>	
	
	<?php if($user=='75'){	echo'	

<tr>	<td colspan="20"align="left"><a href="bedviewbill"><font size="4.5">Edit Bed Details</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="deathstatmngdoc"><font size="4.5">MMRC</a></td></tr>	'
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
'

;}

		

	?>	


		<?php if($user=='322'){	echo'	

<tr>	<td colspan="20"align="left"><a href="inves_request_a"><font size="4.5">Edit / Forward New Investigation Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="eapprove_new"><font size="4.5">Edit / Forward PCS Charge Code Request</a></td></tr>
<tr>	<td colspan="20"align="left"><a href="phar_approve_new"><font size="4.5">Edit / Forward Pharmacy Charge Code Request</a></td></tr>'



;}

		

	?>	
	

<tr>	<td colspan="20"align="left"><a href="it_ticket_home"><font size="4.5">IT_Ticketing_System</a></td></tr>	
<tr><td colspan="20"align="ledt"><a href="staffincident"><font size="4.5">	Incident Report</a></td></tr>
<tr><td colspan="20"align="ledt"><a href="eapprove_new_pending"><font size="4.5">	Pending Charge Code Edit / Add List</a></td></tr>

<?php if($dept=='Purchasing And Store Services'){	echo'	

<tr>	<td colspan="20"align="left"><a href="mrequest"><font size="4.5">Material Request </a></td></tr>	
<tr><td colspan="20"align="left"><a href="bio_list"><font size="4.5">Asset List</td></tr>	
<tr><td colspan="20"align="left"><a href="dmaterialstore"><font size="4.5">Add Hospital Equipment / Asset</td></tr>		'
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
