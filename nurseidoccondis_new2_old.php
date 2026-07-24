<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      	header('Location: login2?err=2');
    }

	// $url1=$_SERVER['REQUEST_URI'];
	// header("Refresh: 5; URL=$url1");

	require('db1.php');
	require('connect.php');
	$pmrn=$_REQUEST['pmrn'];
	$eid=$_REQUEST['eid'];

	$user_id 				= $_SESSION['sess_username'];
	$staff_dept_query       = "SELECT `dept` FROM `staff3` WHERE `sid` = '$user_id'";
	$run_staff_dept_query   = $con->query($staff_dept_query) or die("Error in staff_dept".$con->error);
	$staff_dept_result      = $run_staff_dept_query->fetch_assoc();
	$transaction_by_dept    = $staff_dept_result['dept'];

	try {
		$patientQuery	= "SELECT * FROM `inpatient` WHERE `eid`='$eid' AND `pmrn`='$pmrn' AND `disstatus`='Discharge Bill Confirmed' AND `confirmdn`!=''";
		$patientstmt 	= $dbh->prepare($patientQuery);
		$patientstmt	->execute();
		$data			= $patientstmt->fetch(PDO::FETCH_ASSOC);
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	$id		= $data['id'];
	$vc		= $data['card1'];
	$vc1	= $data['card2'];
	$room1	= $data['room1'];
	$ac		= $data['acard'];
	$room	= $data['room'];

	if(isset($_POST['verify'])){
		$patient_rfid 		= $_POST['patient_rfid'];
		$patient_rfid_v 	= $_POST['patient_rfid_v'];
		$attendant_rfid 	= $_POST['attendant_rfid'];
		$attendant_rfid_v	= $_POST['attendant_rfid_v'];
		$visitor_rfid 		= $_POST['visitor_rfid'];
		$visitor_rfid_v 	= $_POST['visitor_rfid_v'];
		
        if($patient_rfid_v ==$patient_rfid){
			try {
				$dbh->beginTransaction();
				$dbh->query("UPDATE `inpatient` SET `rfid_status` = '0' WHERE `id`='$id' AND `rfid_status`='1' AND `rfid`='$patient_rfid_v'");
				$dbh->query("UPDATE `rfid` SET `status`='0' WHERE  `rfid`='$patient_rfid_v'");
				$dbh->query("INSERT INTO `rfid_transaction` (
						`rfid`,
							`transaction_type`,
								`transaction_by`,
									`transaction_user`,
										`transaction_by_dept`,
											`transaction_user_dept`
					) VALUES(
						'$patient_rfid_v',
							'Patient Release',
								'$user_id',
									'MRN-.$pmrn',
										'$transaction_by_dept',
											'Inpatient'
					)");
				$dbh->commit();
				echo '<script language="javascript">';
				echo 'alert("Success !!Patient RFID Matched Success "); ';
				echo '</script>';
			} catch (\Throwable $e) {
				$dbh->rollback();
				throw $e;
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Something went wrong "); ';
				echo '</script>';
			}
		}else {
			echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!Patient RFID not matched "); ';
			echo '</script>';
		}

		if ($attendant_rfid!='') {
			if($attendant_rfid_v ==$attendant_rfid){
				try {
					$dbh->beginTransaction();
					$dbh->query("UPDATE `inpatient` SET `rfid_acard_status` = '0' WHERE `id`='$id' AND `rfid_acard_status`='1' AND `acard`='$attendant_rfid_v'");
					$dbh->query("UPDATE `rfid` SET `status`='0' WHERE  `rfid`='$attendant_rfid_v'");
					$dbh->query("INSERT INTO `rfid_transaction` (
							`rfid`,
								`transaction_type`,
									`transaction_by`,
										`transaction_user`,
											`transaction_by_dept`,
												`transaction_user_dept`
						) VALUES(
							'$attendant_rfid_v',
								'Patient Release',
									'$user_id',
										'MRN-.$pmrn',
											'$transaction_by_dept',
												'Inpatient'
						)");
					$dbh->commit();
					echo '<script language="javascript">';
					echo 'alert("Success !!Attendant RFID Matched Success "); ';
					echo '</script>';
				} catch (\Throwable $e) {
					$dbh->rollback();
					throw $e;
					echo '<script language="javascript">';
					echo 'alert("Unsuccessful !!Something went wrong "); ';
					echo '</script>';
				}
			}else {
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Attendant RFID not matched "); ';
				echo '</script>';
			}
		}

		if ($visitor_rfid!='') {
			if($visitor_rfid_v ==$visitor_rfid){
				try {
					$dbh->beginTransaction();
					$dbh->query("UPDATE `inpatient` SET `rfid_card2_status` = '0' WHERE `id`='$id' AND `rfid_card2_status`='1' AND `card2`='$visitor_rfid_v'");
					$dbh->query("UPDATE `rfid` SET `status`='0' WHERE  `rfid`='$visitor_rfid_v'");
					$dbh->query("INSERT INTO `rfid_transaction` (
							`rfid`,
								`transaction_type`,
									`transaction_by`,
										`transaction_user`,
											`transaction_by_dept`,
												`transaction_user_dept`
						) VALUES(
							'$visitor_rfid_v',
								'Patient Release',
									'$user_id',
										'MRN-.$pmrn',
											'$transaction_by_dept',
												'Inpatient'
						)");
					$dbh->commit();
					echo '<script language="javascript">';
					echo 'alert("Success !!Visitor RFID Matched Success "); ';
					echo '</script>';
				} catch (\Throwable $e) {
					$dbh->rollback();
					throw $e;
					echo '<script language="javascript">';
					echo 'alert("Unsuccessful !!Something went wrong "); ';
					echo '</script>';
				}
			}else {
				echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Visitor RFID not matched "); ';
				echo '</script>';
			}
		}

    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Patient Discharge</title>
   	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="/sfmm/appraisal/template/dist/css/adminlte.min.css">
   	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   	<script src="script.js"></script>
	<script type="text/javascript">
		function confirm_click(){
			return confirm("Are you Sure to Confirm the Discharge ?");
		}
	</script>
</head>
<body>

<div id='cssmenu'>
<ul>
   	<li><a href='idetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
   	<li class='active has-sub'><a href='#'><span>Patients</span></a>
      	<ul>
			<li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
			</li>
			<li class='has-sub'><a href='iview'><span>In-Patients</span></a>
			</li>
      	</ul>
   	</li>
   	<li class='active has-sub'><a href='#'><span>Appointment</span></a>
      	<ul>
			<li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
			</li>
			<li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
			</li>
     	</ul>
   	</li>
   	<li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   	<li class='active has-sub'><a href='#'><span>Reports</span></a>
		<ul>
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
		</ul>
   	</li>
   	<li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
	<p align="center" class="style1">Todays Out Patients List </p>
	<p><b> Discharge Bill Confirmed Patient<b></p>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header p-2">
                            Patient Discharge
                        </div>
                        <div class="card-body">
							<table>
								<tr>
									<td>Patient's Name:</td>
									<td><b><?php echo $data["pname"]; ?></b></td>
								</tr>
								<tr>
									<td>MRN:</td>
									<td><b><?php echo $data["pmrn"]; ?></b></td>
								</tr>
								<tr>
									<td>Discharge Request Time:</td>
									<td><b><?php echo $data["dstatustime"]; ?></b></td>
								</tr><tr>
									<td>Bill Confirmed Time:</td>
									<td><b><?php echo $data["bstatustime"]; ?></b></td>
								</tr><tr>
									<td>Doctor Name:</td>
									<td><b><?php echo $data["adoc"]; ?></b></td>
								</tr><tr>
									<td>Episode:</td>
									<td><b><?php echo $data["eid"]; ?></b></td>
								</tr><tr>
									<td>Print :</td>
									
									<?php if($data['disstatus']=='Discharge Bill Confirmed' and $data['confirmdn']!='')
									{echo
									'<td><b><a target="_blank" href="idisreport?pmrn='.$pmrn.'&eid='.$eid.'"><img src="print.png" title="Print Report" width="100" height="60" /></a></b></td>';
									}?>
								</tr>
								</tr><tr>
									<td>Confirm:</td>
									<?php if($data['disstatus']=='Discharge Bill Confirmed' and $data['confirmdn']!='')
									{echo
									'<td><b><a onclick="return confirm_click();" href="ndischarge?eid='.$eid.'&pmrn='.$pmrn.'&room1='.$room1.'&room='.$room.'&vc='.$vc.'&vc1='.$vc1.'&ac='.$ac.'&user='.$user_id.'">Click To Vacant the Bed</a></b></td>';
									}?>
								</tr>
							</table>
                        </div>
                    </div>
                </div>
				<div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header p-2">
                            RFID Scan
                        </div>
                        <div class="card-body">
							<p>
								<?php
									$rfid_status 		= $data["rfid_status"];
									$rfid_acard_status 	= $data["rfid_acard_status"];
									$rfid_card2_status 	= $data["rfid_card2_status"];

									$patient_rfid_s 	= $data["rfid"];
									$attendant_rfid_s 	= $data["acard"];
									$visitor_rfid_s 	= $data["card2"];

									try {
										$rfidQuery	= "SELECT `status` FROM `rfid` WHERE `rfid`='$patient_rfid_s'";
										$rfidstmt 	= $dbh->prepare($rfidQuery);
										$rfidstmt	->execute();
										$rfid_rfid	= $rfidstmt->fetch(PDO::FETCH_ASSOC);
										$sRFIDp		= $rfid_rfid['status'];
									} catch(PDOException $e) {
										echo "Error: " . $e->getMessage();
									}

									try {
										$rfidaQuery	= "SELECT `status` FROM `rfid` WHERE `rfid`='$attendant_rfid_s'";
										$rfidastmt 	= $dbh->prepare($rfidaQuery);
										$rfidastmt	->execute();
										$rfida_rfid	= $rfidastmt->fetch(PDO::FETCH_ASSOC);
										$sRFIDa		= $rfida_rfid['status'];
									} catch(PDOException $e) {
										echo "Error: " . $e->getMessage();
									}

									try {
										$rfidvQuery	= "SELECT `status` FROM `rfid` WHERE `rfid`='$visitor_rfid_s'";
										$rfidvstmt 	= $dbh->prepare($rfidvQuery);
										$rfidvstmt	->execute();
										$rfidv_rfid	= $rfidvstmt->fetch(PDO::FETCH_ASSOC);
										$sRFIDv		= $rfidv_rfid['status'];
									} catch(PDOException $e) {
										echo "Error: " . $e->getMessage();
									}

									if ($rfid_status == '0' && $sRFIDp == '0') {
								?>
							</p>
								<div class="col-md-12">
									<div class="icheck-success d-inline">
										<input type="radio" checked>
										<label for="radioSuccess1"></label>
									</div>
									<div class="icheck-success d-inline">
										<label for="radioSuccess3">
											Patient RFID Tag Has Taken
										</label>
									</div>
								</div>
							<?php } if ($rfid_acard_status == '0' && $sRFIDa == '0') {?>
								<div class="col-md-12">
									<div class="icheck-success d-inline">
										<input type="radio" checked>
										<label for="radioSuccess1"></label>
									</div>
									<div class="icheck-success d-inline">
										<label for="radioSuccess3">
											Attendant RFID Tag Has Taken
										</label>
									</div>
								</div>
							<?php } if ($rfid_card2_status == '0' && $sRFIDv == '0') {?>
								<div class="col-md-12">
									<div class="icheck-success d-inline">
										<input type="radio" checked>
										<label for="radioSuccess1"></label>
									</div>
									<div class="icheck-success d-inline">
										<label for="radioSuccess3">
											Visitor RFID Tag Has Taken
										</label>
									</div>
								</div>
							<?php } ?>
                            <form class="form-horizontal" action=""  method="post">
								<?php
									if ($rfid_status == '0') {
									} else if ($rfid_status == '1') {
								?>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Patient RFID Tag:</label>
										<div class="col-sm-8">
											<input type="hidden" name="patient_rfid" value="<?php echo $data["rfid"]; ?>">
											<input type="text" name="patient_rfid_v" class="form-control" placeholder="Patient RFID Tag" required>
										</div>
									</div>
								<?php
									}
									if ($rfid_acard_status=='0') {
									} else if ($rfid_acard_status=='1') {
								?>
									<div class="form-group row">
										<label for="inputPassword" class="col-sm-4 col-form-label">Attendant RFID:</label>
										<div class="col-sm-8">
											<input type="hidden" name="attendant_rfid" value="<?php echo $attendant_rfid_s; ?>">
											<input type="text" name="attendant_rfid_v" class="form-control" placeholder="Attendant RFID" required>
										</div>
									</div>
								<?php
									}
									if ($rfid_card2_status=='0') {
									} else if ($rfid_card2_status=='1') {
								?>
									<div class="form-group row">
										<label for="inputPassword" class="col-sm-4 col-form-label">Visitor RFID:</label>
										<div class="col-sm-8">
											<input type="hidden" name="visitor_rfid" value="<?php echo $visitor_rfid_s; ?>">
											<input type="text" name="visitor_rfid_v" class="form-control" placeholder="Visitor RFID" required>
										</div>
									</div>
								<?php }
									if ($rfid_status == '1' || $rfid_acard_status=='1' || $rfid_card2_status=='1') {
								?>
									<button type="submit" name="verify" class="btn btn-primary">Verify</button>
								<?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
		</div>
	</div>
</body>
<script src="/sfmm/appraisal/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>