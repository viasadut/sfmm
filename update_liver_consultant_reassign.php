<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
   // if(!isset($_SESSION['sess_username']) || $role!="doctor")
   //{
   // header('Location: login2?err=2');
    //}
	require('db1.php');

	$user=$_SESSION["sess_username"];
	$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$etime= date('Y-m-d H:i:s');	

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $pmrn = mysqli_real_escape_string($connect, $_POST["pmrn"]);  
	  $pphone = mysqli_real_escape_string($connect, $_POST["pphone"]);  
	  $old_aslot = mysqli_real_escape_string($connect, $_POST["temp"]);  
	  $old_date = mysqli_real_escape_string($connect, $_POST["app_date"]);  
	  
      
	  $pbp = mysqli_real_escape_string($connect, $_POST["pbp"]);
	  $l_doc = mysqli_real_escape_string($connect, $_POST["local"]);
	  $pname = mysqli_real_escape_string($connect, $_POST["ppluse"]);
	  $dname = mysqli_real_escape_string($connect, $_POST["dname"]);
	  $adate = mysqli_real_escape_string($connect, $_POST["adate"]);
	  $aslot = mysqli_real_escape_string($connect, $_POST["txtHint"]);
	  
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id"] != '')  
        
      {  
           $query = "update pappnew set dname='$pbp',adate1='$adate',adate='$adate1',aslot='$aslot',liver_opd='SFMM LIVER CLINIC',l_doc='$l_doc' WHERE ID = '".$_POST["employee_id"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
		  $update="update opd_appoint1 set status='Booked' where `dname`='$pbp' and `date1`='$adate' and `dslot`='$aslot'";
mysqli_query($connect,$update);


$query1 = "update opd_appoint1 set status='Available' where `dname`='$dname' and `date1`='$old_date' and `dslot`='$old_slot'";  
		   mysqli_query($connect,$query1) or die(mysql_error());
           $message = 'Data Updated';  

/*$message1 = rawurlencode('Dear Sir/ Madam, Greetings from SFMMKPJSH. Your appointment with '.$pbp.' for '.$pname.' on '.$adate2.' at '.$aslot.' is confirmed. Pls. come 30mins early, Thank you.');

		   
 $phone      = $pphone;
	
	
	

    $sms =  'https://api.mobireach.com.bd/SendTextMessage?Username=sfmc&Password=Ada@si@2022&From=SFMMKPJSH&To='.$phone.'&Message='.$message1;
	
           
			$ch = curl_init($sms);
            
            $result = curl_exec($ch);
            echo $result;
			header("Location:liver_clinic_app_new");
			curl_close($ch); 
			*/
		   
      }  
      
}
 ?>
 