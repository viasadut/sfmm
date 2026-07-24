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
 $id = mysqli_real_escape_string($connect, $_POST["employee_id"]);       

	 $pmrn = mysqli_real_escape_string($connect, $_POST["pmrn"]);  
	  $pname = mysqli_real_escape_string($connect, $_POST["pname"]);  
	  $rela = mysqli_real_escape_string($connect, $_POST["rela"]);  
      $sname = mysqli_real_escape_string($connect, $_POST["sname"]);  
	  $reason = mysqli_real_escape_string($connect, $_POST["reason"]);  
      
	  $day = mysqli_real_escape_string($connect, $_POST["day"]);
	  $time=date('Y-m-d H:i:s');
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		  
		  
//$pbp1= implode(",",$pbp2);
	 
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id"] != '' and $rela=='')  
        
      {  
          $query = "update presnew set follow_date='$day',reason='$reason' WHERE id = '$id'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
      }
	  
	  
	  else if($_POST["employee_id"] != '' and $rela!='')  
        
      {  
          $query = "update presnew set follow_date='$day',reason='$reason' WHERE id = '$id'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   $ins_query1="insert into project_sample (`p_name`,`remarks`,`add_by`,`add_time`,`pmrn`) values 
		   ('Dr. Rela Institute - SFMMKPJSH Liver Clinic','$reason','$user','$etime','$pmrn')";
mysqli_query($con,$ins_query1) or die(mysql_error());
      }

 }	  
      

 ?>
 