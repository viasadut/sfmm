<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      	header('Location: login2?err=2');
    }
$runningTime = date('midYs');
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

	/*$rfid_card = $_REQUEST['rfid_card'];
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
	}*/

	$user_id			 	= $_SESSION['sess_username'];
	$staff_dept_query       = "SELECT `dept` FROM `staff3` WHERE `sid` = '$user_id'";
    $run_staff_dept_query   = $con->query($staff_dept_query) or die("Error in staff_dept".$con->error);
    $staff_dept_result      = $run_staff_dept_query->fetch_assoc();
    $transaction_by_dept    = $staff_dept_result['dept'];
	if(isset($_POST['Receive'])){
        $rfid	= $_POST['rfid'];
		
		
		
		$receive_at	= date("Y-m-d h:i:sa");
		
        if($rfid !=''){
            $sel_rfid       = "SELECT COUNT(`id`), `id` FROM `inpatient` WHERE  `rfid`='$rfid' AND `rfid_status`='1' AND `patient_receive_at` IS NULL";
            $run_rfid       = mysqli_query($con,$sel_rfid);
            $result_patient = mysqli_fetch_assoc($run_rfid);
            $rfid_count     = $result_patient['COUNT(`id`)'];
			$rfid_id 		= $result_patient['id'];

            if ($rfid_count == 1) {
				try {
					$dbh->beginTransaction();
					$dbh->query("UPDATE `inpatient` SET `patient_receive_at`='$receive_at' WHERE  `id`='$rfid_id'");
					$dbh->query("INSERT INTO `rfid_transaction` (
							`rfid`,
								`transaction_type`,
									`transaction_by`,
										`transaction_user`,
											`transaction_by_dept`,
												`transaction_user_dept`
						) VALUES(
							'$rfid',
								'Patient Receive',
									'$user_id',
										'MRN-.$pmrn',
											'$transaction_by_dept',
												'Inpatient'
						)");
					$dbh->commit();
					$query_connection  = "SELECT * FROM `connections` WHERE `customer_id`='$id'";
					$stmtc 	= $dbh->prepare($query_connection);
					$stmtc	->execute();
					echo '<script language="javascript">';
					echo 'alert("Success !!Patient Receive Success "); ';
					echo '</script>';
				} catch (\Throwable $e) {
					$dbh->rollback();
					throw $e;
					echo '<script language="javascript">';
					echo 'alert("Unsuccessful !!Something went wrong "); ';
					echo '</script>';
				}
            } else if ($rfid_count < 1){
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Patientis is not in admission process"); ';
				echo '</script>';
			} else if ($rfid_count > 1){
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Multiple patient detected!!! Contact with IT"); ';
				echo '</script>';
			} else {
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Something terrible went wrong!!!"); ';
				echo '</script>';
			}
        }
    }
	if(isset($_POST['Discharge'])){
		$rfid	= $_POST['rfid'];

		try {
			$checkForDischargeCleranceQuery		= "SELECT * FROM `inpatient` WHERE `rfid`='$rfid' and discharge!='Discharged' order by id desc limit 1";
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

		if ($resultCheckForDischargeClerance ==true) {
				$url = "nurseidoccondis_new2?pmrn=$pmrn&eid=$eid";
				header("Location: $url");
			}
			
			else {
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Patient Already Discharged OR Not Admitted"); ';
				echo '</script>';
			}
		
		
		/*if($checkDischargeRow == 0){
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
			if ($patient_receive_at=='') {
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Patient has not receive by nurse yet"); ';
				echo '</script>';
			} else if ($disstatus!='Discharge Bill Confirmed') {
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Patient bill is not clear"); ';
				echo '</script>';
			} else if ($idisconfirm=='Confirmed') {
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Patient Already Discharged"); ';
				echo '</script>';
			} else if ($idisconfirm != 'Confirmed') {
				$url = "nurseidoccondis_new2?pmrn=$pmrn&eid=$eid";
				header("Location: $url");
			}*/
		
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
		
			<li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
			
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
			<td colspan="8" align="left">
				<?php 
				
				$sel90		= "SELECT * FROM `inpatient` WHERE `discharge`='' and patient_receive_at!='NULL' order by id desc limit 1";
		$result90 	= mysqli_query($con,$sel90);
		$result91 	= mysqli_fetch_array($result90);
		
					 ?>
				
					<h2 style="align:left;color:red">Name- <?php echo $result91['pname'];?></h2>
					<h2 style="align:left;color:red">MRN- <?php echo $result91['pmrn'];?></h2>
					<h2 style="align:left;color:red">Ward / Cabin- <?php echo $result91['room'];?></h2>
					<h2 style="align:left;color:red">Bed- <?php echo $result91['room1'];?></h2>
					<h2 style="align:left;color:red">Consultant- <?php echo $result91['adoc'];?></h2>
				 
			</td>
			<td colspan="4" align="center" bgcolor="lightgreen">
				<h4><b>Discharge Patient Scan RFID</b></h4>
				<form action="" method="post">
					<input type="text" name="rfid" placeholder="Click & Scan RFID">
					<button type="submit" name="Discharge" style="visibility: hidden;">Confirm</button>
				</form>
			</td>
		</tr>
		<tr>
			<td colspan="5"align="center"><a href=""><font size="4.5">OPD</a></td>
			<td colspan="5" align="center"><a href="inviewnew1"><font size="4.5">IPD</a></td>
			<td colspan="3" align="center"><a href="view3newradimo"><font size="4.5">	Radiology</a></td>
			<td colspan="3" align="center"><a href="categoryimo"><font size="4.5">	Pharmacy</a></td>
			<td colspan="2" align="center"><a href="viewlabimo"><font size="4.5">LAB</a></td>
			<td colspan="2" align="center"><a href="otdashimo"><font size="4.5">	OT</a></td>
		</tr>
		<tr>
			<td colspan="5"align="center"><a href=""><font size="4.5">	Antenatal History</a></td>
			<td colspan="5" align="center"><a href=""><font size="4.5">Vaccine Center</a></td>
			<td colspan="3" align="center"><a href="opdprodashimo"><font size="4.5">	OPD Procedure</a></td>
			<td colspan="3" align="center"><a href="endohomeimo"><font size="4.5">Endoscopy Suite</a></td>
			<td colspan="2" align="center"><a href="histoappnew"><font size="4.5">	Histopathology</a></td>
			<td colspan="2" align="center"><a href="hinfo111"><font size="4.5">Hospital Information</a></td>
		</tr>
		<tr>
			<td colspan="5"align="center"><a href=""><font size="4.5">	Emergency</a></td>
			<td colspan="5" align="center"><a href="history1mng"><font size="4.5">Patients History</a></td>
			<td colspan="3" align="center"><a href=""><font size="4.5">	Admission Request</a></td>
			<td colspan="3" align="center"><a href="categoryimo"><font size="4.5">	Categorywise Medicine Search</a></td>
			<td colspan="2" align="center"><a href="categoryinvesimo"><font size="4.5">	Categorywise Investigation Search</a></td>
			<td colspan="2" align="center"><a href="cathdashimo"><font size="4.5">	Cardiac Procedure</a></td>
		</tr>
		<tr>
			<td colspan="5"align="center"><a href=""><font size="4.5">	Doridro Fund Request</a></td>
			<td colspan="5" align="center"><a href=""><font size="4.5">Medical Certificate</a></td>
			<td colspan="3" align="center"><a href="chemoimohome"><font size="4.5">Oncology Suite</a></td>
			<td colspan="3" align="center"><a href="hinfo111"><font size="4.5">Hospital Information</a></td>
			<td colspan="2"align="center"><a href="ticketv2/dashboard"><font size="4.5">Hospital Ticketing System</a></td>
			<td colspan="2"align="center"><a href="staffincident"><font size="4.5">Incident Reporting </td>
		</tr>
		<tr>
			<td colspan="5"align="center"><a href="staffleave"><font size="4.5">	Leave Management</a></td>
			<td colspan="5"align="center"><a href="bed_mng_test5"><font size="4.5">	Bed Management</a></td>
			<td colspan="3"align="center"><a href="rfid/nurse/inpatient/medication_new_receive"><font size="4.5">Receive Medication</a></td>
				<td colspan="3"align="center"><a href="rfid/nurse/inpatient/medication_new_given"><font size="4.5">Implement Medication</a></td>
				
				<td colspan="2"align="center"><a href="rfid/nurse/inpatient/discard_medi"><font size="4.5">Discard Medicine</a></td>
			<?php 
				if($cat=='HOD' or $cat=='Incharge'){
					echo'
						<td colspan="3" align="center"><a href="mrequest"><font size="4.5">Material Request</a></td>
						<td colspan="3" align="center"><a href="bio_list_nurse"><font size="4.5">Asset List</a></td>		
						<td colspan="2" align="center"><a href="dmaterialstore"><font size="4.5">Add Hospital Asset</a></td>		
						<td colspan="2" align="center"><a href="bededit_nurse"><font size="4.5">Bed Management</a></td>	
						<tr>
							<td colspan="5"align="center"><a href="recruit/manpower_requisition"><font size="4.5">Recruitment</a></td>	
							<td colspan="5"align="left"><a href="roaster_home"><font size="4.5">Set Departmental Roster</a></td>
						<tr>
					';
				}
			?>
			<tr>
			<td colspan="5"align="center"><a href="dept_bar_print"><font size="5.5" color="red" font-weight="bold">View Stock</a></td>
	<td colspan="5"align="center"><a href="add_medi_stock_ipdlklk"><font size="5.5" color="red" font-weight="bold">Add Stock</a></td>
	<td colspan="3"align="left"><a href="phar_transfer_ipd?sno=<?php echo $runningTime;?>"><font size="4.5">Request For Stock</td>	
	<td colspan="3"align="left"><a href='rfid/transaction/transfer'><span>RFID Transfer</span></a>        </td>
	<td colspan="3"align="left"><a href='ipd_medi_stat'><span>Used Stock Medicine Stats</span></a>        </td>
	<td colspan="3"align="left"><a href='ipd_return_phar?sno=<?php echo date('mdsYi');?>'><span>Return Stock Medicine</span></a>        </td>
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