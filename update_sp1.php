<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];

	require('db1.php');

$user=$_SESSION["sess_username"];
$dtime= date('Y-m-d H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$odate=date('m/d/Y',strtotime("+1 days"));	
$ndate=date('Y-m-d',strtotime("+1 days"));	







?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 
      $output = '';  
      $message = '';  
      $sbp = mysqli_real_escape_string($connect, $_POST["spo2"]);  
       
      
	  $remarks = mysqli_real_escape_string($connect, $_POST["remarks"]);
	  
	 $id = mysqli_real_escape_string($connect, $_POST["employee_idsp"]);	
	 $eid = mysqli_real_escape_string($connect, $_POST["eid"]);	
	 $pmrn = mysqli_real_escape_string($connect, $_POST["pmrn"]);	

	 
$query1="update vitalsspo2 set score1='$sbp',remarks='$remarks',edit_by='$user',edit_time='$dtime' where id='$id'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine updated Added  !!"); ';
    echo '</script>';
//$url = "indocvitals_new.php?ename=$event&id=$id2";

//header("Refresh: .1; URL=$url");
 

 ?>
 