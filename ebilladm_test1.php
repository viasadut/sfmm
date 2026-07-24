<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="billin"){
      header('Location: login2?err=2');
    }
?>

<?php

	require('db1.php');

	$user=$_SESSION['sess_username'];
	$eeid=$_REQUEST['eeid'];
	$pmrn=$_REQUEST['pmrn'];
	$id=$_REQUEST['id'];

	$ad=date('d/m/Y H:i:s');
	$ad1=date("d/m/Y H:i:s", time() + 600);
	
	$db = mysqli_connect('localhost','root','Godiloveu16');
	mysqli_select_db($db,'sfmmkpjnew');
	$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
	$data59 = mysqli_fetch_assoc($query4);

	$ttr=$data59['bdate'];

	$te=date('d',strtotime($ttr));
	$te1=date('m',strtotime($ttr));
	$te2=date('Y',strtotime($ttr));

	$query444 = mysqli_query($db,"select * from preadm where id='$id'");
	$data444 = mysqli_fetch_assoc($query444);

	$dname=$data444['dname'];
	$pname=$data444['pname'];
	$pmrn=$data444['pmrn'];
	$page=$data444['page'];
	$padd=$data444['padd'];
	$gender=$data444['gender'];
	$pphone=$data444['pphone'];
	$staff=$data444['staff'];
	//$eeid=$data444['eeid'];
	$approx_amount=$data444['approx_amount'];

	$query43 = "SELECT COUNT(pmrn) FROM inpatient where pmrn= '$pmrn';"; 
	$result43 = mysqli_query($con, $query43) or die(mysqli_error());
	$row43 = mysqli_fetch_assoc($result43);
	$count =$row43['COUNT(pmrn)'];
	$count1 = $count+1;  

	$query4444 = mysqli_query($db,"select * from preadm where pmrn='$pmrn' and eid='$count'");
	$data4444 = mysqli_fetch_assoc($query4444);
	
	$query_doc = mysqli_query($db,"select * from staff1 where mname='$dname'");
	$data_doc = mysqli_fetch_assoc($query_doc);
	$doc_phone=$data_doc['phone'];
  
	$fullname = $_SESSION['sess_username'];
	$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
	$result39 = mysqli_query($con, $query39) or die(mysqli_error());

	// Print out result
	$row39 = mysqli_fetch_array($result39);

	$full = $row39['fullname'];


if(isset($_POST['Submit'])){

	$btype=$_REQUEST['btype1'];
	$bno=$_REQUEST['bno'];
	$adate= date('d/m/Y H:i:s');
	$aadate= date('m/d/Y ');
	$fname=$_REQUEST['fname'];
	$mname=$_REQUEST['mname'];
	$peradd=$_REQUEST['peradd'];
	$nid=$_REQUEST['nid'];
	$pocu=$_REQUEST['pocu'];
	$mincome=$_REQUEST['mincome'];
	$wife=$_REQUEST['wife'];
	$child=$_REQUEST['child'];
	$isource=$_REQUEST['isource'];
	$land=$_REQUEST['land'];
	$service=$_REQUEST['service'];
	$poss=$_REQUEST['poss'];
	$political=$_REQUEST['political'];
	//$vcard=$_REQUEST['vcard'];
	//$vcard1=$_REQUEST['vcard1'];
	//$acard=$_REQUEST['acard'];
	$pmode=$_REQUEST['pmode'];
	$premarks=$_REQUEST['premarks'];
	$date1 = date('d/m/Y H:i:s');
	$ddate1 = date('m/d/Y');
	$anew = date('Y-m-d');

	$patient_rfid	= $_REQUEST['patient_rfid'];
	$attendant_rfid	= $_REQUEST['attendant_rfid'];
	$visitor_rfid	= $_REQUEST['visitor_rfid'];

	$dd = $_REQUEST['dd'];
	$mm = $_REQUEST['mm'];
	$yy = $_REQUEST['yy'];

	$date11=date_create("$dd-$mm-$yy");
	$date91=date_format($date11,'Y-m-d');
	$date12= date('d-m-Y');
	$date22=date_create($date12);
	//$date90=date_format($date2,'d/m/Y');
	$diff=date_diff($date22,$date11);
	$diff1= $diff->format("%y Y %m M %d D");
	$diff1;
	$diff2= $diff->format("%y");

	$adatenew= date('Y-m-d H:i:s');

	$sel="SELECT * FROM inpatient WHERE `pmrn`='$pmrn' and `discharge`='';";
	$result = mysqli_query($con,$sel);


	$sel2="SELECT * FROM death WHERE `pmrn`='$pmrn';";
	$result2 = mysqli_query($con,$sel2);

	$sel3="SELECT * FROM death1 WHERE `pmrn`='$pmrn';";
	$result3 = mysqli_query($con,$sel3);

	$sel_patient_rfid       = "SELECT COUNT(`id`) FROM `rfid` WHERE  `rfid`='$patient_rfid' AND `status`='0' AND `use_for`='Inpatient Tag' ";
	$run_patient_rfid       = mysqli_query($con,$sel_patient_rfid);
	$result_patient_rfid 	= mysqli_fetch_assoc($run_patient_rfid);
	$patient_rfid_count     = $result_patient_rfid['COUNT(`id`)'];

	$sel_attendant_rfid     = "SELECT COUNT(`id`) FROM `rfid` WHERE  `rfid`='$attendant_rfid' AND `status`='0' AND `use_for`='Attendant Card' ";
	$run_attendant_rfid     = mysqli_query($con,$sel_attendant_rfid);
	$result_attendant_rfid	= mysqli_fetch_assoc($run_attendant_rfid);
	$attendant_rfid_count   = $result_attendant_rfid['COUNT(`id`)'];

	$sel_visitor_rfid       = "SELECT COUNT(`id`) FROM `rfid` WHERE  `rfid`='$visitor_rfid' AND `status`='0' AND `use_for`='Visitor Card' ";
	$run_visitor_rfid       = mysqli_query($con,$sel_visitor_rfid);
	$result_visitor_rfid 	= mysqli_fetch_assoc($run_visitor_rfid);
	$visitor_rfid_count     = $result_visitor_rfid['COUNT(`id`)'];

	/*var_dump($sel_patient_rfid);
	echo '<br>patient_rfid_count- '.$patient_rfid_count;
	echo '<br> attendant_rfid_count-'.$attendant_rfid_count;
	echo '<br> visitor_rfid_count-'.$visitor_rfid_count;
*/
	if($res2=mysqli_num_rows($result2)>0){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!Already Death Certificate has been issued against this MRN "); ';
		echo '</script>';
    }


	else if($res3=mysqli_num_rows($result3)>0){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!Already Death Certificate has been issued against this MRN "); ';
		echo '</script>';
    }

	else if($res=mysqli_num_rows($result)>0){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!Patient Already Admitted in the system"); ';
		echo '</script>';
	}
	
	else if($patient_rfid_count<=0){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!Patient Card Not Matched"); ';
		echo '</script>';
	}
	
	else if($attendant_rfid_count<=0){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!Attendant Card Not Matched"); ';
		echo '</script>';
	}
	
	
	else if($visitor_rfid_count<=0){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!Visitor Card Not Matched"); ';
		echo '</script>';
	}
	// else if($vcard==$vcard1){
	// 	echo '<script language="javascript">';
	// 	echo 'alert("You have issued same vistor card twice"); ';
	// 	echo '</script>';
		
	// }

	else if($dname=='Covid Unit'){
		if ($patient_rfid_count==1) {
			$query159 = mysqli_query($db,"select * from doctor where covid='yes'");
			while($data159 = mysqli_fetch_assoc($query159)){
				$dd=$data159["dname"];
				$sid=$data159["sid"];

				$ins_query="insert into irefferal (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`ward`,`bed1`,`rnote`,`sid`,`ndate`,`cstatus`,`duser`,`bed`) values 
				('$pmrn','$count1','$pname','$padd','$page','$adate','$gender','$pphone','$adate','$dd','Covid Unit','$btype','$bno','Followup Visit','$sid','$anew','Active','$user','Continuous')";
				mysqli_query($con,$ins_query) or die(mysql_error());

			}
		
			$update212="update preadm set status='Admitted',eid='$count1', fname='$fname', mname='$mname', peradd='$peradd', nid='$nid', pocu='$pocu', mincome='$mincome', wife='$wife', child='$child', isource='$isource', land='$land', service='$service', poss='$poss', political='$political', vcard='$vcard', vcard1='$vcard1',acard='$acard', pmode='$pmode', premarks='$premarks',anew='$anew' where `id`='$id'";
			mysqli_query($con,$update212);

			$ins_query33="insert into inpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`bdate`,`adate`,`room`,`room1`,`eid`,`pphone`,`aadate`,`card2`,`acard`,`type`,`anew`,`yage`,`emerid`,`alert1`,`alert2`,`rfid`,`rfid_status`,`rfid_card2_status`,`rfid_acard_status`)
			values ('$dname', '$pname','$pmrn','$padd','$gender','$diff1','$date91','$adate','$btype','$bno','$count1','$pphone','$aadate','$visitor_rfid','$attendant_rfid','$staff','$anew','$diff2','$eeid','$ad','$ad1','$patient_rfid','1','1','1')";
			mysqli_query($con,$ins_query33);

			$ins_query111="insert into newbed (`dname`,`pname`,`pmrn`,`adate`,`type`,`bno`,`eid`,`adate1`,`adatenew`,`tby`) values ('$dname', '$pname','$pmrn','$adate','$btype','$bno','$count1','$aadate','$adatenew','$user')";
			mysqli_query($con,$ins_query111);

			$update="update bed set status='Occupied', pname='$pname', pmrn='$pmrn', dname='$dname', adate='$adate' where `bno`='$bno'";
			mysqli_query($con,$update);

			// $update98="update vcard set status='BOOKED',`pmrn`='$pmrn' where `c_no`='$vcard'";
			// mysqli_query($con,$update98);

			// $update99="update vcard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$vcard1'";
			// mysqli_query($con,$update99);

			// $update199="update acard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$acard'";
			// mysqli_query($con,$update199);

			$update_patient_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$patient_rfid' ";
			mysqli_query($con,$update_patient_rfid);

			$update_attendant_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$attendant_rfid' ";
			mysqli_query($con,$update_attendant_rfid);

			$update_visitor_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$visitor_rfid' ";
			mysqli_query($con,$update_visitor_rfid);

			$ins_query99="insert into tinpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`bdate`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$gender','$diff1','$date91','$adate','$btype','$bno','$count1','$pphone')";
			mysqli_query($con,$ins_query99);  

			$update111="update emergency set discharge='Admitted', disstatus='SEEN',fstatustime='$date1',ddate1='$ddate1', duser='$user' where pmrn='$pmrn' and eid='$eeid'";
			mysqli_query($con,$update111) or die(mysql_error());

			$update112="update erefferal set status='Admitted'where pmrn='$pmrn' and eid='$eeid'";
			mysqli_query($con,$update112) or die(mysql_error());
			
			
			$insert_rfid_trans="INSERT INTO `rfid_transaction` (
						`rfid`,
							`transaction_type`,
								`transaction_by`,
									`transaction_user`,
										`transaction_by_dept`,
											`transaction_user_dept`
					) VALUES(
						'$patient_rfid',
							'Transfer',
								'$user',
									'MRN-.$pmrn',
										'Billing',
											'Inpatient')";
				mysqli_query($con,$insert_rfid_trans) or die(mysql_error());

			echo '<script language="javascript">';
			echo 'alert("Admission Successful"); ';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!RFID Not matched "); ';
			echo '</script>';
		}
	}

	else if($btype=='ICU(4TH FL)' or $btype=='ICU(C)' or $btype=='ICU(3RD FL)' or $btype=='HDU(3RD FL)' or $btype=='HDU(4TH FL)'){
		if ($patient_rfid_count==1) {
			$update212="update preadm set status='Admitted',eid='$count1', fname='$fname', mname='$mname', peradd='$peradd', nid='$nid', pocu='$pocu', mincome='$mincome', wife='$wife', child='$child', isource='$isource', land='$land', service='$service', poss='$poss', political='$political', vcard='$vcard', vcard1='$vcard1',acard='$acard', pmode='$pmode', premarks='$premarks',anew='$anew' where `id`='$id'";
			mysqli_query($con,$update212);

			$ins_query33="insert into inpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`bdate`,`adate`,`room`,`room1`,`eid`,`pphone`,`aadate`,`card2`,`acard`,`type`,`anew`,`yage`,`emerid`,`alert1`,`alert2`,`rfid`,`rfid_status`,`rfid_card2_status`,`rfid_acard_status`)
			values ('$dname', '$pname','$pmrn','$padd','$gender','$diff1','$date91','$adate','$btype','$bno','$count1','$pphone','$aadate','$visitor_rfid','$attendant_rfid','$staff','$anew','$diff2','$eeid','$ad','$ad1','$patient_rfid','1','1','1')";
			mysqli_query($con,$ins_query33);

			$ins_query111="insert into newbed (`dname`,`pname`,`pmrn`,`adate`,`type`,`bno`,`eid`,`adate1`,`adatenew`,`tby`) values ('$dname', '$pname','$pmrn','$adate','$btype','$bno','$count1','$aadate','$adatenew','$user')";
			mysqli_query($con,$ins_query111);

			$update="update bed set status='Occupied', pname='$pname', pmrn='$pmrn', dname='$dname', adate='$adate' where `bno`='$bno'";
			mysqli_query($con,$update);

			// $update98="update vcard set status='BOOKED',`pmrn`='$pmrn' where `c_no`='$vcard'";
			// mysqli_query($con,$update98);

			// $update99="update vcard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$vcard1'";
			// mysqli_query($con,$update99);

			// $update199="update acard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$acard'";
			// mysqli_query($con,$update199);

			$update_patient_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$patient_rfid' ";
			mysqli_query($con,$update_patient_rfid);

			$update_attendant_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$attendant_rfid' ";
			mysqli_query($con,$update_attendant_rfid);

			$update_visitor_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$visitor_rfid' ";
			mysqli_query($con,$update_visitor_rfid);

			$ins_query99="insert into tinpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`bdate`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$gender','$diff1','$date91','$adate','$btype','$bno','$count1','$pphone')";
			mysqli_query($con,$ins_query99);  

			$update111="update emergency set discharge='Admitted', disstatus='SEEN',fstatustime='$date1',ddate1='$ddate1', duser='$user' where pmrn='$pmrn' and eid='$eeid'";
			mysqli_query($con,$update111) or die(mysql_error());

			$update112="update erefferal set status='Admitted'where pmrn='$pmrn' and eid='$eeid'";
			mysqli_query($con,$update112) or die(mysql_error());
			
			$insert_rfid_trans="INSERT INTO `rfid_transaction` (
						`rfid`,
							`transaction_type`,
								`transaction_by`,
									`transaction_user`,
										`transaction_by_dept`,
											`transaction_user_dept`
					) VALUES(
						'$patient_rfid',
							'Transfer',
								'$user',
									'MRN-.$pmrn',
										'Billing',
											'Inpatient')";
				mysqli_query($con,$insert_rfid_trans) or die(mysql_error());
				
				
				
				
				$query159 = mysqli_query($db,"select * from doctor where Discipline='anes1' and status in('Active','active') and type='res'");

while($data159 = mysqli_fetch_assoc($query159))
//while($row = mysqli_fetch_assoc($result)) 
{
$dd=$data159["dname"];
$sid=$data159["sid"];



$query41 = mysqli_query($db,"select * from irefferal where pmrn='$pmrn' and eid='$eid' and sid='$sid' and cstatus='Active'");
if ($data41=mysqli_num_rows($query41)>0)
	{
//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Doctor Alreday has the reffreal"); ';
    echo '</script>';
} 

else {
$ins_query="insert into irefferal (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`ward`,`bed1`,`rnote`,`sid`,`ndate`,`cstatus`,`duser`,`room`,`bed`) values 
('$pmrn','$eid','$pname','$padd','$page','$adate','$gender','$pphone','$adate','$dd','$dname','$btype','$bno','ICU Admission','$sid','$anew','Active','$user','Regular Visit','Continuous')";
mysqli_query($con,$ins_query) or die(mysql_error());
}
}

				

				$message = 'One Patient MRN- '.$pmrn.', Name- '.$pname. ', Bed- '.$bno.', is admitted under your supervision';
				header("location:/sfmm/sms/public/posprint?message=$message&phone=$doc_phone");
				
			echo '<script language="javascript">';
			echo 'alert("Admission Successful"); ';
			echo '</script>';
		}
		}
		
		
else if($btype!='ICU(4TH FL)' or $btype!='ICU(C)' or $btype!='ICU(3RD FL)' or $btype!='HDU(3RD FL)' or $btype!='HDU(4TH FL)'){
		if ($patient_rfid_count==1) {
			$update212="update preadm set status='Admitted',eid='$count1', fname='$fname', mname='$mname', peradd='$peradd', nid='$nid', pocu='$pocu', mincome='$mincome', wife='$wife', child='$child', isource='$isource', land='$land', service='$service', poss='$poss', political='$political', vcard='$vcard', vcard1='$vcard1',acard='$acard', pmode='$pmode', premarks='$premarks',anew='$anew' where `id`='$id'";
			mysqli_query($con,$update212);

			$ins_query33="insert into inpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`bdate`,`adate`,`room`,`room1`,`eid`,`pphone`,`aadate`,`card2`,`acard`,`type`,`anew`,`yage`,`emerid`,`alert1`,`alert2`,`rfid`,`rfid_status`,`rfid_card2_status`,`rfid_acard_status`)
			values ('$dname', '$pname','$pmrn','$padd','$gender','$diff1','$date91','$adate','$btype','$bno','$count1','$pphone','$aadate','$visitor_rfid','$attendant_rfid','$staff','$anew','$diff2','$eeid','$ad','$ad1','$patient_rfid','1','1','1')";
			mysqli_query($con,$ins_query33);

			$ins_query111="insert into newbed (`dname`,`pname`,`pmrn`,`adate`,`type`,`bno`,`eid`,`adate1`,`adatenew`,`tby`) values ('$dname', '$pname','$pmrn','$adate','$btype','$bno','$count1','$aadate','$adatenew','$user')";
			mysqli_query($con,$ins_query111);

			$update="update bed set status='Occupied', pname='$pname', pmrn='$pmrn', dname='$dname', adate='$adate' where `bno`='$bno'";
			mysqli_query($con,$update);

			// $update98="update vcard set status='BOOKED',`pmrn`='$pmrn' where `c_no`='$vcard'";
			// mysqli_query($con,$update98);

			// $update99="update vcard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$vcard1'";
			// mysqli_query($con,$update99);

			// $update199="update acard set status='BOOKED',`pmrn`='$pmrn'where `c_no`='$acard'";
			// mysqli_query($con,$update199);

			$update_patient_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$patient_rfid' ";
			mysqli_query($con,$update_patient_rfid);

			$update_attendant_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$attendant_rfid' ";
			mysqli_query($con,$update_attendant_rfid);

			$update_visitor_rfid="UPDATE `rfid` SET `status` = '1' WHERE `rfid`='$visitor_rfid' ";
			mysqli_query($con,$update_visitor_rfid);

			$ins_query99="insert into tinpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`bdate`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$gender','$diff1','$date91','$adate','$btype','$bno','$count1','$pphone')";
			mysqli_query($con,$ins_query99);  

			$update111="update emergency set discharge='Admitted', disstatus='SEEN',fstatustime='$date1',ddate1='$ddate1', duser='$user' where pmrn='$pmrn' and eid='$eeid'";
			mysqli_query($con,$update111) or die(mysql_error());

			$update112="update erefferal set status='Admitted'where pmrn='$pmrn' and eid='$eeid'";
			mysqli_query($con,$update112) or die(mysql_error());
			
			$insert_rfid_trans="INSERT INTO `rfid_transaction` (
						`rfid`,
							`transaction_type`,
								`transaction_by`,
									`transaction_user`,
										`transaction_by_dept`,
											`transaction_user_dept`
					) VALUES(
						'$patient_rfid',
							'Transfer',
								'$user',
									'MRN-.$pmrn',
										'Billing',
											'Inpatient')";
				mysqli_query($con,$insert_rfid_trans) or die(mysql_error());
				
						
							

				$message = 'One Patient MRN- '.$pmrn.', Name- '.$pname. ', Bed- '.$bno.', is admitted under your supervision';
				header("location:/sfmm/sms/public/posprint?message=$message&phone=$doc_phone");
				
			echo '<script language="javascript">';
			echo 'alert("Admission Successful"); ';
			echo '</script>';
		}
}
		
		
		
		else{
			echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!RFID Not matched "); ';
			echo '</script>';
		}
	}

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
  
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
  width: 30%;
}

select1 {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 20%;
}


textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
  margin-bottom: 0px;
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
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
}


@media screen and (min-width: 480px) {

  form {
    max-width: 750px;
  }

}
      </style>

   <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>

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
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
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
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S ADMISSION </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			 <label1 for="age" ><strong color="green">Patient Particulars   :</strong></label1> <br><br>
	  
	  <label for="age" style="color:red;font-size:30px;font-weight:bold">Consultant's Estimated Cost: <?php echo $approx_amount;?></label>
	  <br><br>
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" value="<?php echo $data59['pname'];?>"required readonly />
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" value="<?php echo $data59['padd'];?>"required readonly/>

	  <label for="age"><strong>Patient's Details (Gender / MRN / Phone / Age) :</strong></label>
	  	<input name="psex" type="text" size="10" value="<?php echo $data59['psex'];?>"required readonly/>

		
						


						<input name="pmrn" type="text" size="15" value="<?php echo $data59['pmrn'];?>" placeholder="MRN" required readonly>
      <input name="pphone" type="text" size="13" value="<?php echo $data59['pphone'];?>" placeholder="Phone No" required readonly>	  
	  
	  
	  <label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te;}  

if(isset($_POST['load'])==1)
{ $dd1 = $_REQUEST['dd'];
if($ttr == 0000-00-00){echo 'dd1';} else {echo '';}
}
?>
"required>	/

<input name="mm" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te1;} 

if(isset($_POST['load'])==1)
{ $mm1 = $_REQUEST['mm'];

if($ttr == 0000-00-00){echo 'mm1';} else {echo '';}

}

?>"required> /	

<input name="yy" type="text" maxlength="4" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te2;} 


if(isset($_POST['load'])==1)
{ 

$yy1 = $_REQUEST['yy'];
if($ttr == 0000-00-00){echo 'yy1';} else {echo '';}




}


?>"required>		  
	  
	  

	  		<label for="age"><strong>Patient's Diagnosis:</strong></label>
		
			  	<textarea name="diagno" readonly><?php echo $data444['diagnosis'];?></textarea>
		
		<br><br>

		<label for="age"><strong>Father's Name :</strong></label>
		<input name="fname" type="text" size="70" value="<?php echo $data4444['fname'];?>"required  />
		<label for="age"><strong>Mother's Name :</strong></label>
		<input name="mname" type="text" size="70" value="<?php echo $data4444['mname'];?>"required  />

		<label for="age"><strong>Permanent Address :</strong></label>
		<input name="peradd" type="text" size="70" value="<?php echo $data4444['peradd'];?>"required  />

		<label for="age"><strong>National ID :</strong></label>
		<input name="nid" type="text" size="70" value="<?php echo $data4444['nid'];?>"required  />


      <label1 for="age"><strong color="green">Financial condition of the patients  :</strong></label1> <br><br><br>
	  
	  <label for="age"><strong>Occupation of the patient  :</strong></label> <br>
	  
	  <input list=pocu name="pocu" placeholder="Select Occupation" size="70" value="<?php echo $data4444['pocu'];?>">
					<datalist id="pocu">	
						
						<option value='Government Job'>Government Job</option>
						<option value='Private Job'>Private Job</option>
						<option value='Business'> Business</option>
						<option value='Others'>Others</option>
				 
						

						</datalist>
	 

	  	<br><br>
		
		<label for="age"><strong>Monthly Income :</strong></label>
		<input name="mincome" type="text" size="70" value="<?php echo $data4444['mincome'];?>"required  />
		
		<label for="age"><strong>Dependents Please Mention Numbers :</strong></label>
		<input name="wife" type="text" size="30" value="<?php echo $data4444['wife'];?>"required placeholder="Wife" />
		<input name="child" type="text" size="30" value="<?php echo $data4444['child'];?>"required placeholder="Children"  />
		<br><br>
		<label for="age"><strong>Income Source of Dependents :</strong></label>
		<input name="isource" type="text" size="70" value="<?php echo $data4444['isource'];?>"required  />
		<br><br>
		
		<label for="age"><strong>Owner of Land in Favor of Patients (in Acre) :</strong></label>
		<input name="land" type="text" size="70" value="<?php echo $data4444['land'];?>"required  />
		<br><br>
		<label for="age"><strong>Service Place :</strong></label>
		<input name="service" type="text" size="70" value="<?php echo $data4444['service'];?>"required  />
		<br><br>
		<label for="age"><strong>Select on the Patient’s possession (Have to include the photocopy)  :</strong></label> <br>
	  
	  <input list=poss name="poss" placeholder="Select Possession" size="70" value="<?php echo $data4444['poss'];?>">
					<datalist id="poss">	
						
						<option value='VGF Card'>VGF Card</option>
						<option value='Old Allowance'>Old Allowance</option>
						<option value='Widow Allowance'> Widow Allowance</option>
						<option value='Handicap Card'>Handicap Card</option>
						<option value='Freedom Fighter Certificate'>Freedom Fighter Certificate</option>	
						

						</datalist>
						
						<br><br>
		<label for="age"><strong>Member of any political party , if yes have to mention with designation :</strong></label>
		<input name="political" type="text" size="70" value="<?php echo $data4444['political'];?>"required  />
		<br><br>
		      
			  <label for="name"><strong>Select Ward :</strong></label>
			<p>
			<select name="btype1" class="country" value=''required/>
<option ="">--Select Ward--</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct type FROM bed where status!='deactivate'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
        <?php
	} 
?>
</select>

			       
		
		<label for="mail"><strong>Avaiable Bed :</strong></label>
									<p>
									
									
			<select name="bno" class="state" value='' required>

</select>

		<label for="age"><strong>Patient RFID (Do not edit the number):</strong></label>
		<input name="patient_rfid" type="text" size="70" required  />

		<label for="age"><strong>Attendant RFID (Do not edit the number):</strong></label>
		<input name="attendant_rfid" type="text" size="70"  required>

		<label for="age"><strong>Visitor RFID (Do not edit the number):</strong></label>
		<input name="visitor_rfid" type="text" size="70" required>


<label for="age"><strong>Select Payment By  :</strong></label> <br>
	  
	  	<input list=pmode name="pmode" placeholder="Select Payment Mode" size="30">
					<datalist id="pmode">	
					<option value='Cash'>Cash</option>
					<option value='Corporate'>Corporate</option>
					<option value='Credit / Debit Card'>Credit / Debit Card</option>
					<option value='SFMMKPJSH Staff'>SFMMKPJSH Staff<option>
						
						</datalist>
						
						
<input name="premarks" type="text" size="30" value=""required  />
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');



//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['ID'];
//$adate=$_REQUEST['adate'];
$query49 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$count1' and discharge=''");
$data49 = mysqli_fetch_assoc($query49);
  
?>


<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		<a target='_blank' href="admnew?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data49["adoc"]; ?>&adate=<?php echo $data49["adate"]; ?>&eid=<?php echo $count1; ?>&id=<?php echo $id; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>
