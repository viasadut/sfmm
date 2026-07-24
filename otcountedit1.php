<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
    header('Location: login2?err=2');
    }
	require('db1.php');

	$user=$_SESSION["sess_username"];
	$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
	

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $address = mysqli_real_escape_string($connect, $_POST["brand"]); 
	  $result = mysqli_real_escape_string($connect, $_POST["result"]);
	 
	 
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id"] != '')  
        
      {  
           $query = "  update otcount set qty ='$result', c2by='$user', c2time='$dtime' where id='$address'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Inserted';  
		   
      }  
      
}
 ?>
 