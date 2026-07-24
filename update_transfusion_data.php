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
	  $pname = mysqli_real_escape_string($connect, $_POST["pname"]);  
	  $tst = mysqli_real_escape_string($connect, $_POST["tst"]);  
	  $rst = mysqli_real_escape_string($connect, $_POST["rst"]);  
	  
      
	  $blood_remaining = mysqli_real_escape_string($connect, $_POST["blood_remaining"]);
	  $symptoms = mysqli_real_escape_string($connect, implode(",",$_POST["symptoms"]));
	  $b_temp = mysqli_real_escape_string($connect, $_POST["b_temp"]);
	  $b_pulse = mysqli_real_escape_string($connect, $_POST["b_pulse"]);
	  $b_bp = mysqli_real_escape_string($connect, $_POST["b_bp"]);
	  $a_temp = mysqli_real_escape_string($connect, $_POST["a_temp"]);

	  $a_pulse = mysqli_real_escape_string($connect, $_POST["a_pulse"]);
	  $a_bp = mysqli_real_escape_string($connect, $_POST["a_bp"]);
	  $t_history = mysqli_real_escape_string($connect, $_POST["t_history"]);
	  $reporting_time = mysqli_real_escape_string($connect, $_POST["reporting_time"]);
	  
	  
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id5"] == '')  
        
      {  
           $query = "update iblood set 
		   tst='$tst',
		   rst='$rst',
		   blood_remaining='$blood_remaining',
		   symptoms='$symptoms', 
		   b_temp='$b_temp',
		   b_pulse='$b_pulse',
		   b_bp='$b_bp',
		   a_temp='$a_temp',
		   a_pulse='$a_pulse',
		   a_bp='$a_bp',
		   t_history='$t_history',
		   reporting_time='$reporting_time',
		   reporting_user='$user',
		   reporting_user_time='$adate2'
		   WHERE id = '".$_POST["employee_id5"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
		  
		   
      }  
      
}
 ?>
 