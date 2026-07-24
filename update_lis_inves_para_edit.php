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
      $inves_name = mysqli_real_escape_string($connect, $_POST["inves_name1"]);  
	  $inves_para = mysqli_real_escape_string($connect, $_POST["inves_para1"]);  
	  $inves_code = mysqli_real_escape_string($connect, $_POST["code1"]);  
	  $employee_id2 = mysqli_real_escape_string($connect, $_POST["employee_id2"]);  
	  $status = mysqli_real_escape_string($connect, $_POST["status"]);  
	  
	  
	  
	  
	  
      
	  $inves_machine = mysqli_real_escape_string($connect, $_POST["inves_machine1"]);
	  
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		


      
        
        
           $query = "update lis_inves_table set `para`='$inves_para',`mcode`='$inves_machine',`status`='$status' where id='$employee_id2'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
		   
        
      
}
 ?>
 