<?php
require('db1.php');
// Get the user id
$pmrn = $_REQUEST['type'];
$dname = $_REQUEST['dname2'];
$ftype = $_REQUEST['ftype'];
$pmrn1 = $_REQUEST['pmrn'];






 


// Database connection
$con = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

if ($pmrn=='Staff' || $pmrn=='Staff Spouse' || $pmrn=='Staff Children' || $pmrn=='Consultant' and $ftype=='Regular'){
	
	// Get corresponding first name and
	// last name for that user id	

	
	
	$g=200;
	$g1=200;
	
	}


else if ($pmrn=='Staff' || $pmrn=='Staff Spouse' || $pmrn=='Staff Children' || $pmrn=='Consultant' and $ftype=='Followup'){
	
	// Get corresponding first name and
	// last name for that user id	

	
	
	$g=100;
	$g1=100;
	
	}
	
	
	else if ($pmrn=='General' || $pmrn=='VIP' and $ftype=='Regular'){
	
	// Get corresponding first name and
	// last name for that user id	
	
	
	$queryc = "SELECT * FROM doctor where dname='$dname' and status IN ('Active','active')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
	$g_r=$rowc['v1'];
	$g1=$rowc['v2'];


	$query_b = "SELECT * FROM pappnew where dname= '$dname' and pmrn='$pmrn1' and status='SEEN' order by ID DESC limit 1"; 
	 
	$result_b = mysqli_query($con, $query_b) or die(mysqli_error());
	
	// Print out result
	$row_b = mysqli_fetch_array($result_b);
	
	$l_date=date_create($row_b['adate1']);
	
	$l_date1=$row_b['adate1'];
	$t_date1=date('Y-m-d');
	
	$t_date=date_create($t_date1);
	
	
	//$date1=date_create("2013-03-15");
	//$date2=date_create("2013-12-12");
	$diff_b=date_diff($l_date,$t_date);
	$diff1_b=$diff_b->format("%a");
	
	if($l_date1==''){
		
		$g=$g_r+100;
	}
	else if($pmrn1==0){
		 $g=$g_r+100;
	} 
	else if($diff1_b<=4 and $pmrn1!=0)
	{ $g=0;
	} 
	else if($diff1_b >4 and $pmrn1!=0){
		 $g=$g_r+100;
	}







	
	}
	
	else if ($pmrn=='General' || $pmrn=='VIP' and $ftype=='Followup'){
	
	// Get corresponding first name and
	// last name for that user id	
	
	
	$queryc = "SELECT * FROM doctor where dname='$dname' and status IN ('Active','active')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$g_r=$rowc['v1'];
$g1=$rowc['v2'];


$query_b = "SELECT * FROM pappnew where dname= '$dname' and pmrn='$pmrn' and status='SEEN' order by ID DESC limit 1"; 
 
$result_b = mysqli_query($con, $query_b) or die(mysqli_error());

// Print out result
$row_b = mysqli_fetch_array($result_b);

$l_date=date_create($row_b['adate1']);

$l_date1=$row_b['adate1'];
$t_date1=date('Y-m-d');

$t_date=date_create($t_date1);


//$date1=date_create("2013-03-15");
//$date2=date_create("2013-12-12");
$diff_b=date_diff($l_date,$t_date);
$diff1_b=$diff_b->format("%a");

if($l_date1==''){
	
	$g=$g_r+100;
}
else if($pmrn==0){
	 $g=$g_r+100;
} 
else if($diff1_b<=4 and $pmrn!=0)
{ $g=0;
} 
else if($diff1_b >4 and $pmrn!=0){
	 $g=$g_r+100;
}




	
	}
	
	
else if ($pmrn!='Staff' || $pmrn!='Staff Spouse' || $pmrn!='Staff Children' || $pmrn!='Consultant' || $pmrn!='General' and $ftype=='Regular'){
	
	// Get corresponding first name and
	// last name for that user id	
	
$queryc5 = "SELECT * FROM corporate where c_name='$pmrn'"; 
$resultc5 = mysqli_query($con, $queryc5) or die(mysqli_error());
$rowc5 = mysqli_fetch_array($resultc5);

$dis=$rowc5['c_per'];


	
$queryc = "SELECT * FROM doctor where dname='$dname' and status IN ('Active','active')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
	$g=$rowc['v1']-$rowc['v1']*$dis / 100;
	//$g1=$rowc['v2'] * $dis / 100;
	
	}
	


else if ($pmrn!='Staff' || $pmrn!='Staff Spouse' || $pmrn!='Staff Children' || $pmrn!='Consultant' || $pmrn!='General' and $ftype=='Followup'){
	
	// Get corresponding first name and
	// last name for that user id	
	
$queryc5 = "SELECT * FROM corporate where c_name='$pmrn'"; 
$resultc5 = mysqli_query($con, $queryc5) or die(mysqli_error());
$rowc5 = mysqli_fetch_array($resultc5);

$dis=$rowc5['c_per'];


	
$queryc = "SELECT * FROM doctor where dname='$dname' and status IN ('Active','active')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
	$g=$rowc['v2']-$rowc['v2']*$dis / 100;
	//$g1=$rowc['v2'] * $dis / 100;
	
	}
	

// Store it in a array
$result = array("$g","$g1");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
