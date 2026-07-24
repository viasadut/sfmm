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
      $pmrn = mysqli_real_escape_string($connect, $_POST["name1"]);  
      $infu = mysqli_real_escape_string($connect, $_POST["address1"]);  
      $instruc = mysqli_real_escape_string($connect, $_POST["ins1"]);  
	  $root = mysqli_real_escape_string($connect, $_POST["route1"]);  
	  $dilu = mysqli_real_escape_string($connect, $_POST["result1"]);
	 $eid = mysqli_real_escape_string($connect, $_POST["eid1"]);	  
	 $time = mysqli_real_escape_string($connect, $_POST["time1"]);	
$alert = mysqli_real_escape_string($connect, $_POST["alert1"]);	
$uprice = mysqli_real_escape_string($connect, $_POST["uprice1"]);		 
$id = mysqli_real_escape_string($connect, $_POST["employee_id2"]);		 
	 

	 
	 





//$message= "this is a message";

//$query="update imedi3 set `instruc`='$instruc',`root`='$root',`dilu`='$dilu',`editby`='$user',`edittime`='$dtime' where `pmrn`='$pmrn' and `eid`='$eid' and infusion='$infu' and status1 NOT IN('SEEN','implemented')";

//$result = mysqli_query($con,$query) or die ( mysqli_error());



$query1="update imedi3 set `instruc`='$instruc',`root`='$root',`dilu`='$dilu',`editby`='$user',`edittime`='$dtime', `time`='$time' where `id`='$id' and status1 NOT IN('SEEN','implemented')";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine updated Added  !!"); ';
    echo '</script>';
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");



 
	 
}
 ?>
 