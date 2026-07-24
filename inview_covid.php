<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      	header('Location: login2?err=2');
    }

	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 60; URL=$url1");

	require('db1.php');
	require('connect.php');

	$user_id			 	= $_SESSION['sess_username'];
	$staff_dept_query       = "SELECT `dept` FROM `staff3` WHERE `sid` = '$user_id'";
    $run_staff_dept_query   = $con->query($staff_dept_query) or die("Error in staff_dept".$con->error);
    $staff_dept_result      = $run_staff_dept_query->fetch_assoc();
    $transaction_by_dept    = $staff_dept_result['dept'];

	if(isset($_POST['Submit'])){
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
            }else {
                echo '<script language="javascript">';
				echo 'alert("Unsuccessful !!Patient has taken"); ';
				echo '</script>';
            }
        }
    }

	$ad3=date('d/m/Y H:i:s');
	$sel3="Select * from inpatient where '$ad3' between alert1 and alert2";
	$resu3 = mysqli_query($con,$sel3);
	$rw3 = mysqli_fetch_assoc($resu3);
	$tt3=$rw3['pmrn'];
	$tt4=$rw3['pname'];
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
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.container {
  padding: 2px 16px;
}

</style>
   <link rel="stylesheet" href="styles.css">
   <script src="script.js"></script>
</head>
<body>
	<div id='cssmenu'>
		<ul>
			<li><a href='inviewnew1'><span>Home</span></a></li>
			<li class='active has-sub'><a href='#'><span>Patients</span></a>
				<ul>
					<li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
					</li>
					<li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
					</li>
				</ul>
			</li>
		
			<li class='active has-sub'><a href='#'><span>Discharge</span></a>
				<ul>
					<li class='has-sub'><a href='dcview'><span>Discharge Request By Consultants</span></a>
					</li>
					<li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
					</li>
					<li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
					</li>
				</ul>
			</li>
		
			<li class='active has-sub'><a href='#'><span>Bed Management</span></a>
				<ul>
					<li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
					</li>
					<li class='has-sub'><a href='tes7'><span>Detail History</span></a>
					</li>
					<li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
					</li>
				</ul>
			</li>
			<li class='active has-sub'><a href='#'><span>Today's Summary Diet Order</span></a>
				<ul>
					<li class='has-sub'><a href='inplabdietcafenot'><span>Morning</span></a>
					</li>
					<li class='has-sub'><a href='inplabdietcafenot1'><span>Mid Morning</span></a>
					</li>
					<li class='has-sub'><a href='inplabdietcafenot2'><span>Lunch</span></a>
					</li>
					<li class='has-sub'><a href='inplabdietcafenot3'><span>Evening</span></a>
					</li>
					<li class='has-sub'><a href='inplabdietcafenot4'><span>Dinner</span></a>
					</li>
				</ul>
			</li>
			<li class='last'><a href='logout'><span>LOGOUT</span></a></li>
		</ul>
	</div>

	<p align="center" class="style1">WELCOME TO NURSE'S Panel</p>
	
	<form action="" method="GET">
		<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
			<thead>
				<tr> <td align="right" colspan="20"><a href="ninviewtest"><strong>SEARCH</strong></a></td></tr>
				<tr>
					<th width="4%"><strong>S.No</strong></th>
					<th width="17%"><strong>Patient's Name</strong></th>
					<th width="10%"><strong>MRN</strong></th>
					<th width="10%"><strong>Category</strong></th>
					<th width="15%"><strong>Doctor's Name </strong>
					<th width="14%"><strong>Admission Date</strong>   
					<th width="14%"><strong>Room No</strong>
					<th width="14%"><strong>Bed No</strong>
					<th width="14%"><strong>Days Staying</strong>
					<th width="14%"><strong>Go</strong>
					<th width="14%"><strong>Transfer Bed</strong>
					<th width="14%"><strong>Transfer Doctor</strong>
					<th width="14%"><strong>Covid Result</strong>
					<th width="14%"><strong>OT Clearance</strong>
				</tr>
			</thead>
			<tbody>
			
				<?php
					$user=$_SESSION["sess_username"];
					$date= date('m/d/Y');
					$count=1;
					$sel_query="Select * from inpatient where discharge= '' order by room1 asc";

					$result = mysqli_query($con,$sel_query);
					while($row = mysqli_fetch_assoc($result)) { 
				?>
					<tr>
						
						<?php
							$pmrn1=$row['pmrn'];
							$eid1=$row['eid'];
							$date5=date('Y-m-d');
							$query43 = "SELECT COUNT(medinoti) FROM inpatient where pmrn= '$pmrn1' and eid='$eid1' and medinoti !='';"; 
							$result43 = mysqli_query($con, $query43) or die(mysqli_error());
							$row43 = mysqli_fetch_assoc($result43);
							$count55 =$row43['COUNT(medinoti)'];

							$query43_o = "SELECT * FROM ot where pmrn= '$pmrn1' and date5='$date5';"; 
							$result43_o = mysqli_query($con, $query43_o) or die(mysqli_error());
							$row43_o = mysqli_fetch_assoc($result43_o);
							$rows_ot=mysqli_num_rows($result43_o); 
						?>

						<?php
							$tt1=$row['pmrn'];
							$date455=$row['anew'];
							$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
							$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
							// Print out result
							$rowc = mysqli_fetch_array($resultc);
							$cr=$rowc['tresult'];
							$tt=$rowc['tresult'];
							$dcon=$rowc["dconfirm"];
							$ss1=$rowc["ssent"];
							$ss=date('m/d/Y', strtotime($rowc["ssent"]));
							$date45=date('m/d/Y',strtotime($row['anew']));
							$date22=date_create("$date45");
							$date21=date_create("$ss");
							$diff44=date_diff($date21,$date22);
							$diff47=$diff44->format("%r%a");
							//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));
							$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'";
								
							$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
							$rowt = mysqli_fetch_assoc($resultt);
							$co=$rowt['COUNT(pmrn)'];
						?>
						<td align="center"><?php echo $count; ?></td>
						<?php
							$ad=date('d/m/Y H:i:s');
							$pp=$row['pmrn'];
							$sel="Select * from inpatient where '$ad' between alert1 and alert2 and pmrn='$pp'";
							$resu = mysqli_query($con,$sel);
							$rw = mysqli_fetch_assoc($resu);
						?>
						<td align="center" <?php if($count55>0):?> style="background-color:LIGHTGREEN;"<?php else: ?> <?php endif ; ?>><?php echo $row["pname"]; ?></td>
						<td align="center"><?php echo $row["pmrn"]; ?>
						<td align="center"<?php if($row['type']!='General'): ?> style="background-color:SKYBLUE;"<?php else: ?> style="" <?php endif ; ?>><?php echo $row["type"]; ?></td>
						<td align="center"><?php echo $row["adoc"]; ?>
						<td align="center"<?php if($rw==true): ?> style="background-color:VIOLET;"<?php else: ?> <?php endif ; ?>><?php echo $row["adate"]; ?> 
						<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
						<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
						<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
							<?php 
								$start=$row["aadate"];$date1=date_create("$start");
								$date2=date_create("$date");
								$diff=date_diff($date1,$date2);
								echo $diff->format("%R%a days");
							?>  
						</td>
						<td align="center">
							<?php
								$id = $row["id"];
								$patient_receive_at_sql 	= "SELECT `patient_receive_at` FROM `inpatient` WHERE `id`='$id'";
								$run_patient_receive_at_sql = $con->query($patient_receive_at_sql) or die("Error in staff_info".$con->error);
								$patient_receive_at_result 	= $run_patient_receive_at_sql->fetch_assoc();
								$receive_at 				=  $patient_receive_at_result['patient_receive_at'];
								if ($receive_at =='') {
								?>
									<!-- <form action="" method="post">
										<input type="text" name="rfid" >
										<input type="hidden" name="id" value="<?php //echo $id;?>">
										<button type="submit" name="Submit">Confirm</button>
									</form> -->
								<?php
								} 
								
								else{
								?>
									<a href="idetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">GO</a>
								<?php
								}
							?>
						</td>
						<td align="center">
						<?php if ($receive_at =='') {
								?>
									<!-- <form action="" method="post">
										<input type="text" name="rfid" >
										<input type="hidden" name="id" value="<?php //echo $id;?>">
										<button type="submit" name="Submit">Confirm</button>
									</form> -->
								<?php
								} 
								
								else{
								?>
									<a href="gg3bed?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">transfer bed</a>
								<?php
								}
							?>
						
						
						</td>
						<td align="center">
						
						<?php if ($receive_at =='') {
								?>
									<!-- <form action="" method="post">
										<input type="text" name="rfid" >
										<input type="hidden" name="id" value="<?php //echo $id;?>">
										<button type="submit" name="Submit">Confirm</button>
									</form> -->
								<?php
								} 
								
								else{
								?>
									<a href="tdoc1?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer Doctor</a>
								<?php
								}
							?>
						
						
						</td>	  
						<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=5){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=5){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>5){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>
							<?php
								$m_c=$row43_o['m_clearance'];
								$rid=$row43_o['id'];
								$pp=$row43_o['pmrn'];
								$url = "otpatientreceive?pmrn=$pp&id=$rid"; 		
								if($rows_ot>0 and $m_c!=''){ 
									echo "<td align='center' style='background-color:lightgreen;'>OT Clearance Done</td>";
								}
								else if($rows_ot>0 and $m_c==''){ 
									echo "<td align='center' style='background-color:red;'>Waiting For OT Clearance</td>";
								}	
								else{ 
									echo "<td align='center' style='background-color:lightblue;'></td>";
								}
							?>
					</tr>
					<?php $count++; } ?>
					<?php
						if($rw3==true){
							$txt='One Patient is registered in PMS, Patient Name is-'.$tt4.' And Patient- '.'MRN'.$tt3;
							$txt1=htmlspecialchars($txt);
							$txt2=rawurlencode($txt1);
							$html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-US');
						
						echo '
							<audio autoplay>
								<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
								<source src="data:audio/ogg;base64,'.base64_encode($html).'">
							</audio>';
						}
					?>
			</tbody>
		</table>
	</form>

</body>

</html>
