<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) ){
      	header('Location: login2?err=2');
    }

	$url1=$_SERVER['REQUEST_URI'];
	//header("Refresh: 5; URL=$url1");
	require('connect.php');
	require('db1.php');
	//include("auth.php");
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

	$rfid_card = $_REQUEST['rfid_card'];
	if(isset($_POST['rfid_card'])){
		

		//$odate = date('m/d/Y H:i:s');
		//$uname = $_REQUEST['uname'];
		$rfid_card = $_REQUEST['rfid_card'];
		$etime=date('m/d/Y H:i:s');

		$sel90		= "SELECT * FROM `inpatient` WHERE `rfid_card`='$rfid_card' AND `rfid_status`='1' AND `discharge`=''";
		$result90 	= mysqli_query($con,$sel90);
		$pmrn		= $result90['pmrn'];
		$eid		= $result90['eid'];
		
		if($res90=mysqli_num_rows($result90)==0){
			echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!! No Patient Found Under This RFID.. Pls Try Again With Correct RFID"); ';
			echo '</script>';
			//header("Refresh: .1;");
		}else {
			//$url = "idetails_new?pmrn=$pmrn&eid=$eid";
			$url = "medi_infu?pmrn=$pmrn&eid=$eid";
			header("Location: $url");
		}
	}

	$user_id			 	= $_SESSION['sess_username'];
	$staff_dept_query       = "SELECT `dept` FROM `staff3` WHERE `sid` = '$user_id'";
    $run_staff_dept_query   = $con->query($staff_dept_query) or die("Error in staff_dept".$con->error);
    $staff_dept_result      = $run_staff_dept_query->fetch_assoc();
    $transaction_by_dept    = $staff_dept_result['dept'];
	// if(isset($_POST['Receive'])){
    //     $rfid	= $_POST['rfid'];
	// 	$receive_at	= date("Y-m-d h:i:sa");
		
    //     if($rfid !=''){
    //         $sel_rfid       = "SELECT COUNT(`id`), `id` FROM `inpatient` WHERE  `rfid`='$rfid' AND `rfid_status`='1' AND `patient_receive_at` IS NULL";
    //         $run_rfid       = mysqli_query($con,$sel_rfid);
    //         $result_patient = mysqli_fetch_assoc($run_rfid);
    //         $rfid_count     = $result_patient['COUNT(`id`)'];
	// 		$rfid_id 		= $result_patient['id'];

    //         if ($rfid_count == 1) {
	// 			try {
	// 				$dbh->beginTransaction();
	// 				$dbh->query("UPDATE `inpatient` SET `patient_receive_at`='$receive_at' WHERE  `id`='$rfid_id'");
	// 				$dbh->query("INSERT INTO `rfid_transaction` (
	// 						`rfid`,
	// 							`transaction_type`,
	// 								`transaction_by`,
	// 									`transaction_user`,
	// 										`transaction_by_dept`,
	// 											`transaction_user_dept`
	// 					) VALUES(
	// 						'$rfid',
	// 							'Patient Receive',
	// 								'$user_id',
	// 									'MRN-.$pmrn',
	// 										'$transaction_by_dept',
	// 											'Inpatient'
	// 					)");
	// 				$dbh->commit();
	// 				$query_connection  = "SELECT * FROM `connections` WHERE `customer_id`='$id'";
	// 				$stmtc 	= $dbh->prepare($query_connection);
	// 				$stmtc	->execute();
	// 				echo '<script language="javascript">';
	// 				echo 'alert("Success !!Patient Receive Success "); ';
	// 				echo '</script>';
	// 			} catch (\Throwable $e) {
	// 				$dbh->rollback();
	// 				throw $e;
	// 				echo '<script language="javascript">';
	// 				echo 'alert("Unsuccessful !!Something went wrong "); ';
	// 				echo '</script>';
	// 			}
    //         } else if ($rfid_count < 1){
	// 			echo '<script language="javascript">';
	// 			echo 'alert("Unsuccessful !!Patientis is not in admission process"); ';
	// 			echo '</script>';
	// 		} else if ($rfid_count > 1){
	// 			echo '<script language="javascript">';
	// 			echo 'alert("Unsuccessful !!Multiple patient detected!!! Contact with IT"); ';
	// 			echo '</script>';
	// 		} else {
	// 			echo '<script language="javascript">';
	// 			echo 'alert("Unsuccessful !!Something terrible went wrong!!!"); ';
	// 			echo '</script>';
	// 		}
    //     }
    // }
	if(isset($_POST['Discharge'])){
		$rfid	= $_POST['rfid'];

		try {
			$checkForDischargeCleranceQuery		= "SELECT COUNT(`id`), `id`, `eid`, `pmrn`, `patient_receive_at`, `idisconfirm`, `disstatus` FROM `inpatient` WHERE `rfid`='$rfid' AND `rfid_status`='1'";
			$checkForDischargeClerancestmt 		= $dbh->prepare($checkForDischargeCleranceQuery);
			$checkForDischargeClerancestmt		->execute();
			$resultCheckForDischargeClerance	= $checkForDischargeClerancestmt->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$checkDischargeRow					= $resultCheckForDischargeClerance['COUNT(`id`)'];
		$checkDischargeid					= $resultCheckForDischargeClerance['id'];
		$eid								= $resultCheckForDischargeClerance['eid'];
		$pmrn								= $resultCheckForDischargeClerance['pmrn'];
		$idisconfirm						= $resultCheckForDischargeClerance['idisconfirm'];
		$disstatus							= $resultCheckForDischargeClerance['disstatus'];
		$patient_receive_at					= $resultCheckForDischargeClerance['patient_receive_at'];

		if($checkDischargeRow == 0){
			echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!No record found!!!"); ';
			echo '</script>';
		} else if($checkDischargeRow > 1) {
			echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!Multiple Patient Detected! Please contact with IT"); ';
			echo '</script>';
		} else if($checkDischargeRow < 1){
			echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!Patient not found in inpatient"); ';
			echo '</script>';
		} else if ($checkDischargeRow == 1) {
				$url = "it_rfid_inpatient_card_clear?pmrn=$pmrn&eid=$eid";
				header("Location: $url");
			// if ($patient_receive_at=='') {
			// 	echo '<script language="javascript">';
			// 	echo 'alert("Unsuccessful !!Patient has not receive by nurse yet"); ';
			// 	echo '</script>';
			// } else if ($disstatus!='Discharge Bill Confirmed') {
			// 	echo '<script language="javascript">';
			// 	echo 'alert("Unsuccessful !!Patient bill is not clear"); ';
			// 	echo '</script>';
			// } else if ($idisconfirm=='Confirmed') {
			// 	echo '<script language="javascript">';
			// 	echo 'alert("Unsuccessful !!Patient Already Discharged"); ';
			// 	echo '</script>';
			// } else if ($idisconfirm != 'Confirmed') {
			// 	$url = "it_rfid_inpatient_card_clear?pmrn=$pmrn&eid=$eid";
			// 	header("Location: $url");
			// }
		} else{
			echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!Something terrible went wrong!!!"); ';
			echo '</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nurse Dashboard</title>
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

		div {
			height: 50px;
			width: 100%;
		}

		img {
			border-radius: 50%;
		}
	</style>
	<link rel="stylesheet" href="styles.css">
	<script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
</head>
<body>
	<div id='cssmenu'>
		<ul>
			<li><a href='viewnew1'><span>Home</span></a></li>
			<li class='active has-sub'><a href='#'><span>Patients</span></a>
				<ul>
					<li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a></li>
					<li class='has-sub'><a href='iview'><span>In-Patients</span></a></li>
				</ul>
			</li>
			<li class='active has-sub'><a href='#'><span>Appointment</span></a>
				<ul>
					<li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a></li>
					<li class='has-sub'><a href='ccamidoc'><span>Set Restrictions on Appointment Time</span></a></li>
					<li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a></li>
				</ul>
			</li>
			<li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
			<li class='active has-sub'><a href='#'><span>Reports</span></a>
				<ul>
					<li class='has-sub'><a href='app1doc'><span>Appointment Report</span></a></li>
					<li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a></li>
					<li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a></li>
					<li class='has-sub'><a href='con2'><span>OT Stats</span></a></li>
					<li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a></li>
					<li class='has-sub'><a href='con11'><span>Medicine Stats</span></a></li>
					<li class='has-sub'><a href='view3newrad'><span>Radiology Report</span></a></li>
				</ul>
			</li>
			<li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
			<li class='active has-sub'><a href='docchangepass'><span>Pending Certificates Request</span></a>
			<ul>
				<li class='has-sub'><a href='deathconfirm'><span>Pending Death Certificate Approval Request</span></a></li>
				<li class='has-sub'><a href='birthconfirm'><span>Pending Birth Certificate Approval Request</span></a></li>
			</ul>
			<li class='active has-sub'><a href='#'><span>Generic Name Request</span></a>
				<ul>
					<li class='has-sub'><a href='requestmedicine'><span>Request Generic Name</span></a></li>
					<li class='has-sub'><a href='pendingrequestdoc'><span>Pending Request List For Generic Name</span></a></li>
					<li class='has-sub'><a href='pendingrequest1'><span>Pending List For Approval</span></a>
				</ul>
			</li>
			<li class='last'><a href='logout'><span>LOGOUT</span></a></li>
		</ul>
	</div>

	<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
		<tr>
			<td colspan="19"align="center"bgcolor="lightblue"class="style1" border="0">Welcome!! <?php echo $row39['fullname']; ?></td>
			<td colspan="1"align="center"bgcolor="lightblue"><a target='_blank' href="hinfo111"><img src="hinfo.jpg" title="Hospital Information" width="100" height="70" /></a>
		</tr>
		<tr>
			<td colspan="19"align="center"bgcolor="lightgreen"><img  src="staff_pic/<?php echo $row3['pic'] ?>" width="100"  height="100" align="center"></td>
			<td colspan="1"align="center"bgcolor="lightgreen"><h3><?php echo date('d/m/Y').'<br>'.date('H:i:s')?></h3></td>
		</tr>
		<tr>
			<td colspan="8" align="center" bgcolor="lightblue">
				<h4><b>Receive Patient Scan RFID</b></h4>
				<form action="" method="post">
					<input type="text" name="rfid" placeholder="Click & Scan RFID">
					<button type="submit" name="Receive" style="visibility: hidden;">Confirm</button>
				</form>
			</td>
			<td colspan="8" align="center">
				<?php 
					 if($rfid_card!=''){
				?>
					<h3>Name- <?php $result90['pname'];?></h3>
					<h3>MRN- <?php $result90['pmrn'];?></h3>
					<h3>Room- <?php $result90['room'];?></h3>
					<h3>Bed- <?php $result90['room1'];?></h3>
				<?php } ?>
			</td>
			<td colspan="4" align="center" bgcolor="lightgreen">
				<h4><b>Discharge Patient Scan RFID</b></h4>
				<form action="" method="post">
					<input type="text" name="rfid" placeholder="Click & Scan RFID">
					<button type="submit" name="Discharge" style="visibility: hidden;">Confirm</button>
				</form>
			</td>
		</tr>
	
	</table>

	<?php 
	  	$ad='b';
	  
	  	if($ad=='b'){
			$txt='Greetings'.' '.$full.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
			$txt1=htmlspecialchars($txt);
			$txt2=rawurlencode($txt1);
			$html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
			echo '
				<audio autoplay>
					<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
					<source src="data:audio/ogg;base64,'.base64_encode($html).'">
				</audio>
			';
		}
	?>
</body>
</html>