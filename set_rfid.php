<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
    header('Location: login2?err=2');
    }
	require('db1.php');

$user=$_SESSION["sess_username"];
$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$odate=date('m/d/Y',strtotime("+1 days"));	
$ndate=date('Y-m-d',strtotime("+1 days"));	





$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
       
	  $a_id = mysqli_real_escape_string($connect, $_POST["employee_id"]);   
	  $root = mysqli_real_escape_string($connect, $_POST["route"]);  
	  
	 
$url = "asset_bar_newrr.php"; 
	 
	 

$message= "this is a message";

$query="update storenew set rfid='$root' where id='$a_id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location:$url?message=$message");

}
 ?>
 