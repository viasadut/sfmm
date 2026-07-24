<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
    header('Location: login2?err=2');
    }
	require('db1.php');

	$user=$_SESSION["sess_username"];
	$dtime= date('d/m/Y H:i:s');
?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $time = mysqli_real_escape_string($connect, $_POST["time"]);  
      $cval = mysqli_real_escape_string($connect, $_POST["cval"]);  
      $pmrn = mysqli_real_escape_string($connect, $_POST["pmrn"]);  
	  //$pmrn = mysqli_real_escape_string($connect, $_POST["pmrn"]);  
	  //$gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
	  
//$eid = mysqli_real_escape_string($connect, $_POST["eid"]); 	  
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
           $update = "insert into circuit (`pmrn`,`cid`,`time`)  values('$pmrn','$cval','$time')";
           
			mysqli_query($connect,$update) or die(mysql_error());
			
			 
			
			
           $message = 'Data Updated';  
        
      
      
 }  
 ?>