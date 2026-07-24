
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
$uname=$_REQUEST['uname'];
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$bal=$_REQUEST['bal'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];


$query3 = "SELECT * FROM staff3 where sid= '$uname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$ataken=$row3['ataken']+$bal;
$etaken=$row3['etaken']+$bal;
$staken=$row3['staken']+$bal;
$mataken=$row3['mataken']+$bal;
$pataken=$row3['pataken']+$bal;
$rltaken=$row3['rleave']+$bal;
$lwpltaken=$row3['lwl']+$bal;
$intaken=$row3['intaken']+$bal;
$comltaken=$row3['comltaken']+$bal;
$mrltaken=$row3['mrltaken']+$bal;
$martaken=$row3['martaken']+$bal;
$insleave=$row3['insleave']+$bal;

$email = 'diasadman16@gmail.com';
$mname = $row3['sname'];



$queryl = "SELECT * FROM dleave where id= '$id'"; 
	 
$resultl = mysqli_query($con, $queryl) or die(mysqli_error());

// Print out result
$rowl = mysqli_fetch_array($resultl);




$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url1 = "leaveviewtm";
$jj='TEST PATIENT';
 //$message1 = 'One'.'%20'.'Patient'.'%20'.'MRN-'.'%20'.'123456'.'%20'.'Name-'.'%20'.$jj;
 $message1 = rawurlencode('One Patient MRN-123456, Name-'.$jj.' has admitted under your supervision');
         
 //          $message1    = 'JKHJKHv'.'%A0'.'askjhd'.'%a'.'askjhd'.'%0a'.'askjhd';
			$message    = $message1;
    $phone      = '01711206048';

    $sms =  'https://api.mobireach.com.bd/SendTextMessage?Username=sfmc&Password=Ada@si@2022&From=SFMMKPJSH&To='.$phone.'&Message='.$message;
            $ch = curl_init($sms);
            
            $result = curl_exec($ch);
            echo $result;
			header("Location:homestaff");
			curl_close($ch); 
//header('Location: ' . $varResponse);


         //return redirect()->away('/sfmm/homestaff.php?addsuccess=1');
         
		 

//	



		 





?>