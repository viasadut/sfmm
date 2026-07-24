



<?php
session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 $entry_time=date('Y-m-d 00:00:00');
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$query1 = "SELECT * FROM doctor where dname= '$full'"; 
	 
$result1 = mysqli_query($con, $query1) or die(mysqli_error());

// Print out result
$row1 = mysqli_fetch_array($result1);
$desig = $row1['desig'];

//$id=$_REQUEST['pa_type'];

// Get the user id
$pmrn = $_REQUEST['pa_type'];
$pmrn1 = $_REQUEST['pmrn'];
$eid = $_REQUEST['eid'];
$pname = $_REQUEST['ppluse'];
$adoc = $_REQUEST['adoc'];



$querytr = "SELECT * FROM doctor where dname= '$adoc'"; 
$resulttr = mysqli_query($con, $querytr) or die(mysqli_error());
$row1tr= mysqli_fetch_array($resulttr);
$doc_code=$row1tr['dcode'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$queryd1 = mysqli_query($db,"select * from doctor_code where dcode='$doc_code' and dname like '%WARD REVIEW%'");
$datad1= mysqli_fetch_assoc($queryd1);

$modified_string=$row1tr['code'];
//$codeuy=$doc_code['code'];
$codeuy = substr($modified_string, 1);


$tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$codeuy'");
		$tb_result = mysqli_fetch_assoc($tb_q);
	//	$tb_data=$tb_result['tb_ip'];
  if($tb_result['tb_ip']==''){
    $tb_data=$tb_result['tb_op'];
    }
    else if($tb_result['tb_ip']!=''){
      $tb_data=$tb_result['tb_ip'];
      }



$treat=explode(',',$pmrn);
	
	$pp=$treat[0];
	$id=$treat[1];
	$r='p';
	$adate1= date('d/m/Y H:i:s');
	$daten= date('Y-m-d');
$daten1= date('Y-m-d H:i:s');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query5 = mysqli_query($db,"select * from irefferal where pmrn='$pmrn' and eid='$eid' and infusion='$full' and cstatus='Active'");
$data5 = mysqli_fetch_assoc($query5);
$rtype=$data5['bed'];

// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn !== "" and $pp=='Regular Visit' and $user=='1218') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '1000';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) 
  values ( '$pmrn1','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$pp','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());


	}
	
}



else if ($pmrn !== "" and $pp=='Regular Visit' and $desig=='Consultant' and $full =='$adoc') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '800';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;



$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) 
  values ( '$pmrn1','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$pp','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());


	}
}
	



else if ($pmrn !== "" and $pp=='Regular Visit' and $desig!='Consultant' and $full =='$adoc') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '700';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;



$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) 
  values ( '$pmrn1','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$pp','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());


	}
}

else if ($pmrn !== "" and $pp=='Regular Visit' and $desig=='Consultant' and $full!='$adoc' and $full!='' and $rtype=='Continuous') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '800';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;



$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) 
  values ( '$pmrn1','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$pp','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());


	}
}



else if ($pmrn !== "" and $pp=='Regular Visit' and $desig=='Consultant' and $full!='$adoc' and $full!='' and $rtype!='Continuous') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '800';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;



$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) 
  values ( '$pmrn1','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$pp','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());




	$update1="update irefferal set cstatus='Closed' where pmrn='$pmrn' and eid='$eid' and infusion='$full' and cstatus='Active'";
  mysqli_query($con,$update1) or die(mysql_error());
	}
}




else if ($pmrn !== "" and $pp=='Regular Visit' and $desig!='Consultant' and $full!='$adoc' and $full!='' and $rtype=='Continuous') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '700';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;



$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) 
  values ( '$pmrn1','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$pp','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());




	}
}


else if ($pmrn !== "" and $pp=='Regular Visit' and $desig!='Consultant' and $full!='$adoc' and $full!='' and $rtype!='Continuous') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = '700';
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;



$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) 
  values ( '$pmrn1','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$pp','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());



	$update1="update irefferal set cstatus='Closed' where pmrn='$pmrn' and eid='$eid' and infusion='$full' and cstatus='Active'";
  mysqli_query($con,$update1) or die(mysql_error());
	}
}






else if ($pmrn !== "" and $pp!='Regular Visit') {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT * FROM privilege WHERE id='$id' and dname in ('$full','common') and status in ('Approved','Waiting For CFO Approval')");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$sformat = $row["sformat"];

	// Get the first name
	//$page = $row["page"];
	$charge = $row['charge'];
	$porder = $row["porder"];

$result = array("$sformat","$charge","$porder");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;



$servername = "localhost";
  $username1 = "root";
  $password1 = "Godiloveu16";
  $dbname1 = "sfmmkpjnew";
  
  // Create connection
  $conn = new mysqli($servername, $username1, $password1, $dbname1);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`) 
  values ( '$pmrn1','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$pp','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre')";
  
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());


	}
	
}

// Store it in a array
?>

