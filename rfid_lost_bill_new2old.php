<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="billin"){
      	header('Location: login2?err=2');
    }

	require('db1.php');
	require('connect.php');

	$user=$_SESSION["sess_username"];
	$user_id = $user;
	$date	= date("Y-m-d h:i:sa");
	$pmrn=$_REQUEST['pmrn'];
	$id=$_REQUEST['id'];
	$eid=$_REQUEST['eid'];
	$query4 = mysqli_query($con,"select * from inpatient where pmrn='$pmrn' and discharge=''");
	$data = mysqli_fetch_assoc($query4);

	if(isset($_POST['Submit'])){
		$pname = $data['pname'];
		$pmrn = $data['pmrn'];
		$eid = $data['eid'];
		$padd = $data['padd'];
		$adm = $data['adate'];
		$pphone=$data['pphone'];
		$page=$data['age'];
		$psex=$data['gender'];
		$dtype=$data['dtype'];
		$damount=$data['damount'];
		//$odate = $_REQUEST['odate'];
		$infu = $_REQUEST['infu'];
		$adate1= date('d/m/Y H:i:s');
		$date1= date('d/m/Y');
		$dnew= date('Y-m-d');

		$patient_rfid	= $_REQUEST['patient_rfid'];
		$attendant_rfid	= $_REQUEST['attendant_rfid'];
		$visitor_rfid	= $_REQUEST['visitor_rfid'];

		if ($patient_rfid == 'Yes') {
			$rfid 	=  $data['rfid'];
			
			try {
				$dbh->beginTransaction();
				$dbh->query("INSERT INTO `rfid_transaction` (
					`rfid`,
						`transaction_type`,
							`transaction_by`,
								`transaction_user`,
									`transaction_by_dept`,
										`transaction_user_dept`
				) VALUES(
					'$rfid',
						'Lost by Patient MRN-$pmrn',
							'$user_id',
								'MRN-$pmrn',
									'Finance And Accounts Services',
										'Information Technology'
				)");
				$dbh->query("UPDATE `rfid` SET `status`='0', `destroyed`='1' `destroyed_by`='$user_id', `destroyed_at`='$date'  WHERE  `rfid`='$rfid'");
				$dbh->query("UPDATE `inpatient` SET `rfid_status`='0' WHERE `rfid`='$rfid' AND `rfid_status`='1' AND `pmrn`='$pmrn' AND `eid`='$eid'");
				$dbh->commit();
				echo '<script language="javascript">';
				echo 'alert("Success !!Patient RFID TAG Deleted"); ';
				echo '</script>';
			} catch (\Throwable $e) {
				$dbh->rollback();
				throw $e;
				echo '<script language="javascript">';
				echo 'alert("Wrong !!Patient RFID TAG NOT Deleted, PLease contact with IT"); ';
				echo '</script>';
			}
		}

		if ($attendant_rfid == 'Yes') {
			$rfid 	=  $data['acard'];
			
			try {
				$dbh->beginTransaction();
				$dbh->query("INSERT INTO `rfid_transaction` (
					`rfid`,
						`transaction_type`,
							`transaction_by`,
								`transaction_user`,
									`transaction_by_dept`,
										`transaction_user_dept`
				) VALUES(
					'$rfid',
						'Lost by Patient MRN-$pmrn',
							'$user_id',
								'MRN-.$pmrn',
									'Finance And Accounts Services',
										'Information Technology'
				)");
				$dbh->query("UPDATE `rfid` SET `status`='0', `destroyed`='1' `destroyed_by`='$user_id', `destroyed_at`='$date'  WHERE  `rfid`='$rfid'");
				$dbh->query("UPDATE `inpatient` SET `rfid_acard_status`='0' WHERE `acard`='$rfid' AND `rfid_acard_status`='1' AND `pmrn`='$pmrn' AND `eid`='$eid'");
				$dbh->commit();
				echo '<script language="javascript">';
				echo 'alert("Success !!Attendant RFID TAG Deleted"); ';
				echo '</script>';
			} catch (\Throwable $e) {
				$dbh->rollback();
				throw $e;
				echo '<script language="javascript">';
				echo 'alert("Wrong !!Attendant RFID TAG NOT Deleted, PLease contact with IT"); ';
				echo '</script>';
			}
		}

		if ($visitor_rfid == 'Yes') {
			$rfid 	=  $data['card2'];
			
			try {
				$dbh->beginTransaction();
				$dbh->query("INSERT INTO `rfid_transaction` (
						`rfid`,
							`transaction_type`,
								`transaction_by`,
									`transaction_user`,
										`transaction_by_dept`,
											`transaction_user_dept`
					) VALUES(
						'$rfid',
							'Lost by Patient MRN-$pmrn',
								'$user_id',
									'MRN-.$pmrn',
										'Finance And Accounts Services',
											'Information Technology'
					)");
				$dbh->query("UPDATE `rfid` SET `status`='0', `destroyed`='1' `destroyed_by`='$user_id', `destroyed_at`='$date'  WHERE  `rfid`='$rfid'");
				$dbh->query("UPDATE `inpatient` SET `rfid_card2_status`='0' WHERE `card2`='$rfid' AND `rfid_card2_status`='1' AND `pmrn`='$pmrn' AND `eid`='$eid'");
				$dbh->commit();
				echo '<script language="javascript">';
				echo 'alert("Success !!Visitor RFID TAG Deleted"); ';
				echo '</script>';
			} catch (\Throwable $e) {
				$dbh->rollback();
				throw $e;
				echo '<script language="javascript">';
				echo 'alert("Wrong !!Visitor RFID TAG NOT Deleted, PLease contact with IT"); ';
				echo '</script>';
			}
		}
		
	}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Discharge RFID Lost Bill</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 1200px;
  }

}
</style>

    <script src="jsnew/pprefixfree.min.js"></script>
	<link rel="stylesheet" href="jsnew/jquery-ui.css">
	<script src="jsnew/jquery.min.js"></script>
	<script src="jsnew/jquery-ui.min.js"></script>

	<script type="text/javascript">
		jQuery(function() {		
			var date = new Date();
			var currentMonth = date.getMonth();
			var currentDate = date.getDate();
			var currentYear = date.getFullYear();
			
			$('#datepicker').datepicker({
				minDate: new Date(currentMonth, currentDate,currentYear),
				maxDate: new Date(currentMonth, currentDate,currentYear)
			});
		});
	</script>

  
	<head>
		<title>Discharge</title>
		<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
		<script src="jsnew/jjquery.min.js"></script>
		<script src="jsnew/bootstrap.min.js"></script>
		<link href="jsnew/jquery-ui.css" rel="stylesheet" />
		<link href="./jquery.multiselect.css" rel="stylesheet" />
		<script src="jsnew/jquery-1.12.4.js"></script>
		<script src="jsnew/jquery-ui.js"></script>
		<script src="./jquery.multiselect.js"></script>

		<script>
			$(document).ready(function() {
				$("#datepicker").datepicker();
			});
		</script>

		<link rel="stylesheet" href="styles.css">

		<script src="script.js"></script>
		<script>
			function goBack() {
				window.history.back();
			}
		</script>
	</head>

<body>

	<div id='cssmenu'>
		<ul>
			<li><a href='inviewnew1'><span>Home</span></a></li>
			<li class='active has-sub'><a href='#'><span>Patients</span></a>
				<ul>
					<li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a></li>
					<li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a></li>
				</ul>
			</li>
		
			<li class='active has-sub'><a href='#'><span>Discharge</span></a>
				<ul>
					<li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a></li>
					<li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a></li>
					<li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a></li>
				</ul>
			</li>
		
			<li class='active has-sub'><a href='#'><span>Bed Management</span></a>
				<ul>
					<li class='has-sub'><a href='bedview'><span>All Bed Status</span></a></li>
					<li class='has-sub'><a href='tes7'><span>Detail History</span></a></li>
					<li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a></li> 
				</ul>
			</li>

		<li class='last'><a href='logout'><span>LOGOUT</span></a></li>
		</ul>
	</div>

	<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


	<form action="" method="post">
		<h1 align="center"style="background-color:yellow;">INPATIENT DISCHARGE RFID lost?</h1>
        <table align="center" class="table table-bordered" id="dynamic_field">  
			<tr>
				<td colspan="20" align="right"><button onClick="goBack()">Back</button></td>
			</tr>
			<tr>
				<td colspan="20"><label><strong>Doctors's Name :</strong></label></td>
			</tr>
			<tr>	  
				<td colspan="20"><?php echo $data['adoc'];?></td>
			</tr>
			<input type="hidden" name="new" value="1" />
			</select></td></tr>
						
			<tr>	
				<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
				<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
				<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
			</tr>

			<tr>
				<td colspan="5"><?php echo $data["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data["eid"]; ?> </td>
				<td colspan="12"><?php echo $data["pname"]; ?></td>
			</tr>

			<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
			<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>

			<tr>
				<td colspan="5"><label><strong>Age:</strong></label></td>
				<td colspan="3"><label><strong>Admission Date:</strong></label></td>
				<td colspan="2"><label><strong>Gender:</strong></label></td>
				<td colspan="4"><label><strong>Phone NO:</strong></label></td>
				<td colspan="2"><label><strong>Ward/Cabin:</strong></label></td>
				<td colspan="4"><label><strong>Bed NO:</strong></label></td>
					
			</tr>
						
			<tr>				
				<td colspan="5"><?php echo $data["pmrn"]; ?></td>  
				<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
				<td colspan="2"><?php echo $data["gender"]; ?></td>
				<td colspan="4"><?php echo $data["pphone"]; ?></td>  
				<td colspan="2"><?php echo $data["room"]; ?></td> 
				<td colspan="4"><?php echo $data["room1"]; ?></td> 
			</tr>

			<tr>
				<td colspan="15" align="center"bgcolor="yellow"><label><strong>RFID lost?</strong></label></td>
			</tr>
			<tr>
				<td colspan="5">
					<select name="patient_rfid">
						<option value=''>--Select Patient Tag--</option>
						<option value='Yes'>Yes</option>	
					</select>
				</td>
				<td colspan="5">
					<select name="visitor_rfid">
						<option value=''>--Select Visitor Card--</option>
						<option value='Yes'>Yes</option>	
					</select>
				</td>
				<td colspan="5">
					<select name="attendant_rfid">
						<option value=''>--Select Attendant Card--</option>
						<option value='Yes'>Yes</option>	
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
			</tr>

			<tr>
				<td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Discharge Request Form</strong></label></td>
			</tr>
			<tr>
				<td colspan="1" align="center"><strong>S.No</strong></td>
				<td colspan="4" align="center"><strong>Patient's Name</strong></td>
				<td colspan="1" align="center"><strong>MRN</strong></td>
				<td colspan="3" align="center"><strong>Request Date </strong></td>
				<td colspan="3" align="center"><strong>Request By</strong></td>
				<td colspan="2" align="center"><strong>Bill Confirmed</strong></td>
			</tr>
			<?php
				$user=$_SESSION["sess_username"];
				$pmrn=$data["pmrn"];
				$id=$_REQUEST["id"];
				$episode=$data["eid"];
				$count=1;
				$sel_query="Select * from inpatient where id= '$id' order by `id` DESC;";

				$result = mysqli_query($con,$sel_query);

				while($row = mysqli_fetch_assoc($result)) {
			?>    
			<tr>
				<td align="center" colspan="1"><?php echo $count; ?></td>
				<td align="center"colspan="4"><?php echo $row["pname"]; ?></td>
				<td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
				<td align="center"colspan="3"><?php echo $row["dstatustime"]; ?></td>
				<td align="center"colspan="3"><?php echo $row["duser"]; ?></td>
				<td align="center"colspan="2"><?php echo $row["bstatustime"]; ?></td>
			</tr>
			<?php $count++; } ?>
		</table>
	</form>
</body>

</html>
