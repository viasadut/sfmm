<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
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
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $address = mysqli_real_escape_string($connect, $_POST["address"]);  
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
	  //$gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
	  $result = mysqli_real_escape_string($connect, $_POST["result"]); 
$eid = mysqli_real_escape_string($connect, $_POST["eid"]); 	  
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id"] != '')  
      {  
           $update = "  
           UPDATE iinves   
           SET result='$result',   
           resultby='$user',  
		   resulttime='$dtime',
		   resultstatus='UPDATED'		   
            WHERE id='".$_POST["employee_id"]."'";  
			mysqli_query($connect,$update) or die(mysql_error());
			
			
           $message = 'Data Updated';  
      }  
      
      
 }  
 ?>