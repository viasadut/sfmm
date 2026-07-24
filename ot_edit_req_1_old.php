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
 $id = mysqli_real_escape_string($connect, $_POST["employee_id1"]);       

	 $pmrn = mysqli_real_escape_string($connect, $_POST["pmrn1"]);  
	  $pname = mysqli_real_escape_string($connect, $_POST["pname1"]);  
      $sname = mysqli_real_escape_string($connect, $_POST["sname1"]);  
      
	  $remarks = mysqli_real_escape_string($connect, $_POST["remarks1"]);
	  $time=date('Y-m-d H:i:s');
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		  
		  
//$pbp1= implode(",",$pbp2);
	 
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id1"] != '')  
        
      {  
           $query = "update otreport set md_approve='Approved',md_a_time='$time' WHERE id = '$id'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
      }

 }	  
      

 ?>
 