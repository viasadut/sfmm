<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$ad='b';
$runningTime1 = date('misis').$user;


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
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$sno=$fullname.date('Ydms');
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



@-webkit-keyframes invalid {
  from { background-color: red; }
  to { background-color: inherit; }
}
@-moz-keyframes invalid {
  from { background-color: red; }
  to { background-color: inherit; }
}
@-o-keyframes invalid {
  from { background-color: red; }
  to { background-color: inherit; }
}
@keyframes invalid {
  from { background-color: red; }
  to { background-color: inherit; }
}
.invalid {
  -webkit-animation: invalid 3s infinite; /* Safari 4+ */
  -moz-animation:    invalid 3s infinite; /* Fx 5+ */
  -o-animation:      invalid 3s infinite; /* Opera 12+ */
  animation:         invalid 3s infinite; /* IE 10+ */
}

td {
    padding: 1em;
}
}


blink {
        color: #1c87c9;
        font-size: 25px;
        font-weight: bold;
        font-family: sans-serif;
      }
	  
	  
	  #myDIV {
  
  background: red;
  animation: mymove 3s infinite;
}

@keyframes mymove {
  from {background-color: red;}
  to {background-color: lightgreen;}
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>

<style>
   .disabled-li {
  pointer-events: none; /* Prevents click events */
  opacity: 0.6;        /* Makes it appear grayed out */
  cursor: not-allowed; /* Changes cursor to indicate it's not interactive */
}

</style>

</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='bcview'><span>Home</span></a></li>


<li class='last'><a href='billpass'><span>Change Password</span></a></li>


   

<li class='last'><a href='billapp'><span>Appoinment Report</span></a></li>
<li class='last'><a href='opdbill'><span>OPD PROCEDURE BILL</span></a></li>
<li class='last'><a href='otallbill'><span>OT STATS</span></a></li>
<li class='last'><a href='opdbill_ms'><span>Maternity Suite</span></a></li>
<li class='active has-sub'><a href='#'><span>Endoscopy</span></a>
      <ul>
<li class='last'><a href='endobillsummary'><span>Today's Endoscopy Patient List</span></a></li>
    	    <li class='last'><a href='endocensusbill'><span>Endoscopy STATS</span></a></li>
      
      </ul>
	  
   </li>

   <li class='active has-sub'><a href='#'><span>Oncology</span></a>
      <ul>
<li class='last'><a href='chemobillsummary'><span>Today's Oncology Patient List</span></a></li>
    	    <li class='last'><a href='chemocensusbill'><span>Oncology STATS</span></a></li>
      
      </ul>
	  
   </li>

   
<li class='last'><a href='billotbill'><span>Todays OT List</span></a></li>
<li class='last'><a href='register1'><span>Register New Patient</span></a></li>


<li class='active has-sub'><a href='#'><span>Doriddro Fund</span></a>
      <ul>

    	    
      <li class='last'><a href='ddrequestsend'><span>View DD Fund Request From Consultant / MO</span></a></li>
	  <li class='last'><a href='ddrequestsend1'><span>View DD Fund Final Print</span></a></li>
	  <li class='last'><a href='ddfinalprintdate'><span>Datewise ALL Approved DD Fund Print</span></a></li>
	  <li class='last'><a href='ddstats3bill'><span>Stats of Allocation Datewise DD Fund Amount</span></a></li>
	  <li class='last'><a href='ddmanualbill'><span>Manual Request</span></a></li>
	  
      </ul>
	  
   </li>
   
 <li class='active has-sub'><a href='#'><span>Covid Menu</span></a>  
<ul>
<li class='last'><a href='covidhomeg'><span>Covid</span></a></li>
<li class='last'><a href='covidbillstati'><span>Todays Bill Collection</span></a></li>

</ul>
</li>

<li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>

    	    <li class='last'><a href='#bgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='#bview4'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='bill_lab_search_new'><span>Test</span></a></li>
	  <li class='last'><a href='manual_bill'><span>Test1</span></a></li>
      </ul>
	  
   </li>
   <li class='last'><a href='insummary'><span>IPD</span></a></li>
<li class='last'><a href='leave2'><span>Apply Leave</span></a></li>
<li class='last'><a href='leaveviewindu'><span>View Leave</span></a></li>
   

<li class='last'><a href="ticketv2/dashboard">Hospital Ticketing System</a></li>


<li class='last'><a href="attnstatsindu">Attendance Report</a></li>
<li class='last'><a href="hinfo111">Hospital Information</a></li>

<li class='active has-sub'><a href='#'><span>Package</span></a>
      <ul>

    	    <li class='last'><a href='ccgg1new_pac'><span>New Patient Package Registration</span></a></li>
      <li class='last'><a href='even_view11'><span>Old Patient Package Registration</span></a></li>
	  <li class='last'><a href='even_view12'><span>Package Investigation</span></a></li>
      </ul>
	  
   </li>


   <li class='last'><a href='rfid/dashboard.php'><span>Receive RFID ID</span></a></li>
   
   
   <li class='active has-sub'><a href='#'><span>Investigation Bill Comfirm Panel</span></a>
      <ul>

    	   
	  <li class='disabled-li' ><a href='bill_lab_search_new'><span>Search Bill</span></a></li>
	  <li class='disabled-li'><a href='manual_bill'><span>Manual Bill Confirm</span></a></li>
    <li class='last'><a href='manual_bill_package'><span>Package Bill Confirm</span></a></li>
      </ul>
	  
   </li>


   <li class='last'><a href='search_weight_loss'><span>Weight Loss Registration</span></a></li>
      <li class='last'><a href='weight_loss_list'><span>Weight Loss Patient List</span></a></li>
<li class='last'><a href='staffincident'><span>Incident</span></a></li>
	  <li class='last'><a target='_blank' href='bcview_rela'><span>Liver Clinic</span></a></li>
	  
	   <?php if($fullname=='448'){	echo'	

<li class="last"><a href="cafe/index.php">CAFE</a></li>	'
;}

		

	?>	

<li class='active has-sub'><a href='#'><span>New Patient Registration</span></a>
      <ul>
         <li class='has-sub'><a href='registration_api'><span>Patient Registration With API</span></a>         </li>
         <li class='has-sub'><a href='mrn_manual_push'><span>Manual Push Patient MRN</span></a>         </li>
		   <li class='has-sub'><a href='new_patient_list'><span>View Latest Registered Patient </span></a>         </li>
      </ul>
   </li>


   <li class='active has-sub'><a href='#'><span>New Billing Portal</span></a>
      <ul>
      <li class='has-sub'><a href='new_bill/pre_appointment_list'><span>Pre Appointment List</span></a>         </li>
      <li class='has-sub'><a href='new_bill/old_mrn_app1'><span>Old Patient Consultation Bill</span></a>         </li>
      <li class='has-sub'><a href='new_bill/register_new_app_new'><span>New Patient Consultation Bill</span></a>         </li>
      
      
      
     
      
      <li class='has-sub'><a href='new_bill/opd_inves_search'><span>Search Prescribed Investigation By Consultant</span></a>         </li>
      
      <li class='has-sub'><a href='new_bill/register_new_app_new_inves'><span>New Patient Investigation Bill Portal</span></a>         </li>
      
      <li class='has-sub'><a href='new_bill/manual_bill'><span>Manual Bill Portal</span></a>         </li>
      
      <li class='has-sub'><a href='new_bill/due_payment_against_billno'><span>Due Collection Against Billno</span></a>         </li>
      <li class='has-sub'><a href='new_bill/manual_bill_extra'><span>Other Charges</span></a>         </li>
      <li class='has-sub'><a href='today_pms_bill'><span>Today's Bill</span></a>         </li>
      <li class='has-sub'><a href='new_bill/search_patient_bill'><span>Search Bill By Patient MRN</span></a>         </li>
      <li class='has-sub'><a href='new_bill/new_bill_refund'><span>Bill Refund</span></a>         </li>
      <li class='has-sub'><a href='collection_report'><span>Collection Report</span></a>      
      <li class='has-sub'><a target='_blank' href='opd_consultation_bill'><span>Patient Sticker Print</span></a>         </li>   </li>
      
      </ul>
   </li>
	  
   <li class='last'><a href='bhcp/index.php'><span>BHCP</span></a></li>

   <?php if($fullname=='115'){	echo'	

<li class="last"><a href="purchase_transfer_ot?sno='.$runningTime1.'">Request For Material(Store)</a></li>	'
;}

		

	?>	

   
<li class='last'><a href='card-printing/index.php'><span>Patient Card Print</span></a></li>   
<li class='last'><a href='edischarge3'><span>Inpatient</span></a></li>
<li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
<li class='last'><a href='ward_update_11'><span>Ward Visit</span></a></li>
<li class='last'><a href='logout'><span>LOGOUT</span></a></li>
	  
	  
	 
	  
</ul>
</div>
<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">List of Unbilled Patients</p>
<form action="" method="post">
 
&nbsp;&nbsp;&nbsp;&nbsp;<a href='bcview'><span><b>Unbilled Patients</span><b></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='bviewreffer'><span>Reffered Patients</span></a><br><br>
		
		
		<table>
											
						<tr>				
						
             		
					 
			    	 
					 
        
		<td colspan="3"><input list="test" name="bt" id="test1" size='50' disabled>
		
		
					


 <datalist id="test">
						<option value=''>-Select-</option>
						
						<?php 
			$sql = "select * from `doctor` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			
			
						
				
</datalist>

</td>  
					<td>	<button type="submit" name="bsearch" align="right">Search</button></td>
					 </tr>
</table>

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
      <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Bill</strong>
	  <th width="14%"><strong>Update</strong>



	   </tr>
  </thead>
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
		$bt=$_REQUEST["bt"];
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;

$sel_query100="Select * from pappnew where adate= '$date' and status='NOT SEEN' and dname='$bt' and `bill`='' ORDER BY aslot asc;";

$result100 = mysqli_query($con,$sel_query100);
while($row100 = mysqli_fetch_assoc($result100)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row100["pname"]; ?></td>
      <td align="center"><?php echo $row100["pmrn"]; ?>
      <td align="center"><?php echo $row100["aslot"]; ?>
      <td align="center"><?php echo $row100["adate"]; ?>  
	  <td align="center"><?php echo $row100["dreffer"]; ?>  
	  	  <td align="center"><?php echo $row100["dname"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row100["status"];?> </td> 
	        
			
			
			
			
			
			<?php if($row100['dreffer']==''){echo'
			
			<td  align ="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="bgg3333_api?pmrn='.$row100["pmrn"].'&ID='.$row100["ID"].'">UPDATE</a> </td>';}
			
			else if($row100['dreffer']!=''){echo'
			
			<td  align ="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="bgg3333_new_api?pmrn='.$row100["pmrn"].'&ID='.$row100["ID"].'">UPDATE</a> </td>';}

			?>

	  
      </tr>
    <?php $count++; }}?>
	
	
	
  </tbody>
  </table>
  
  
</form>
<?php /*if($ad=='b')
{
	$txt='Greetings'.' '.$full.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}*/?>


</body>




</html>
