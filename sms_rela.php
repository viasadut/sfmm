
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$pname=$_REQUEST['pname'];
//$phone=$_REQUEST['phone'];
$phone='01711206048';
//$psex=$_REQUEST['psex'];
$psex='M';
$pmrn=$_REQUEST['pmrn'];
$start=$_REQUEST['start'];
$end=$_REQUEST['end'];

$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url1 = "bmi_sms";
$jj='TEST PATIENT';

$queryl = "SELECT * FROM sms where id= '1'"; 
	 
$resultl = mysqli_query($con, $queryl) or die(mysqli_error());

// Print out result
$rowl = mysqli_fetch_array($resultl);
$message5=$rowl['sms_details'];
$message6=$rowl['sms_name'];
$s_date=date('Y-m-d');

$query = "Insert into sms_sent (`pmrn`,`l_s_date`) values('$pmrn','$s_date')"; 
	 
$result = mysqli_query($con, $query) or die(mysqli_error());



 //$message1 = 'One'.'%20'.'Patient'.'%20'.'MRN-'.'%20'.'123456'.'%20'.'Name-'.'%20'.$jj;
 //$message1 = rawurlencode('One Patient MRN-123456, Name- Mr.'.$pname.' has admitted under your supervision');
 //$message2 = rawurlencode('One Patient MRN-123456, Name- Ms.'.$pname.' has admitted under your supervision');
 //$message1 = rawurlencode('Dear Mr.'.$pname.', We have launched Weight Loss Program. If you are interested kindly communicate in the following number- 01711206048, Or visit our website www.kpjdhaka.com,Thanks');
 //$message2 = rawurlencode('Dear Ms.'.$pname.', We have launched Weight Loss Program. If you are interested kindly communicate in the following number- 01711206048, Or visit our website www.kpjdhaka.com,Thanks');        
 
 
 $message1 = rawurlencode('Dear Mr.'.$pname.','.$message5);
 $message2 = rawurlencode('Dear Ms.'.$pname.','.$message5);
 
 //$message1 = rawurlencode($message6. '!! Mr.'.$pname.','.$message5);
 //$message2 = rawurlencode($message6. '!! Ms.'.$pname.','.$message5);
 //$message2 = rawurlencode('Dear Ms.'.$pname.', We have launched Weight Loss Program. If you are interested kindly communicate in the following number- 01711206048, Or visit our website www.kpjdhaka.com,Thanks');        
 //          $message1    = 'JKHJKHv'.'%A0'.'askjhd'.'%a'.'askjhd'.'%0a'.'askjhd';
			$message    = $message1;
			$message1    = $message2;
    $phone      = $phone;
	
	
	

    $sms =  'https://api.mobireach.com.bd/SendTextMessage?Username=sfmc&Password=Ada@si@2022&From=SFMMKPJSH&To='.$phone.'&Message='.$message;
	$sms1 =  'https://api.mobireach.com.bd/SendTextMessage?Username=sfmc&Password=Ada@si@2022&From=SFMMKPJSH&To='.$phone.'&Message='.$message1;
            if($psex=='M'){
			$ch = curl_init($sms);
            
            $result = curl_exec($ch);
            echo $result;
			header("Location:research_rela?start=$start&end=$end");
			curl_close($ch); }
			
			else if($psex=='F'){
			$ch = curl_init($sms1);
            
            $result = curl_exec($ch);
            echo $result;
			header("Location:research_rela?start=$start&end=$end");
			curl_close($ch); }
//header('Location: ' . $varResponse);


         //return redirect()->away('/sfmm/homestaff.php?addsuccess=1');
         
		 

//	



		 





?>