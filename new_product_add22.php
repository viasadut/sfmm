<?php 
    session_start();
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
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $address = mysqli_real_escape_string($connect, $_POST["address"]);  
      $instruc = mysqli_real_escape_string($connect, $_POST["ins"]);  
	  $root = mysqli_real_escape_string($connect, $_POST["route"]);  
	  $dilu = mysqli_real_escape_string($connect, $_POST["result"]);
	 $eid = mysqli_real_escape_string($connect, $_POST["eid"]);	  
	 $time = mysqli_real_escape_string($connect, $_POST["time"]);	
$alert = mysqli_real_escape_string($connect, $_POST["alert"]);	
$uprice = mysqli_real_escape_string($connect, $_POST["uprice"]);		 
$code = mysqli_real_escape_string($connect, $_POST["code"]);	
$id = mysqli_real_escape_string($connect, $_POST["id"]);	
$coun = mysqli_real_escape_string($connect, $_POST["coun"]);
$mid = mysqli_real_escape_string($connect, $_POST["mid"]);
$test = mysqli_real_escape_string($connect, $_POST["test"]);		 
	 
	//$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 
	 
	$date=date('Y-m-d H:i:s') ;


 foreach($_POST['coun'] as $group_member){
//$message= "this is a message";

$query="insert into add_com_product (`company`,`cid`,`product`,`status`,`date`,`mid`) values 
('$address','$id','$group_member','Active','$date','$mid')";

$result = mysqli_query($con,$query) or die ( mysqli_error());
 }
 if($result){
        $_SESSION['success']='Examiner Group Update Successfull';
        header("location:all_medi_phar_new"); 
       }
       else{
        $_SESSION['fail']='Examiner Group Update Fail !';
        header("location:all_medi_phar_new"); 
       }
 
	 
}
 ?>
 