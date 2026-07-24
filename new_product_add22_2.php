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
     
$id1 = mysqli_real_escape_string($connect, $_POST["id1"]); 	  
      $address = mysqli_real_escape_string($connect, $_POST["address1"]);  
      $price = mysqli_real_escape_string($connect, $_POST["price"]);  
	  $coun1 = mysqli_real_escape_string($connect, $_POST["coun1"]);  
	  $mid = mysqli_real_escape_string($connect, $_POST["mid"]);  
	  
	//$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 
	 
	$date=date('Y-m-d H:i:s') ;


 
$query="update add_com_product set `status`='$coun1',`price`='$price' where id='$id1'";

//$result = mysqli_query($con,$query) or die ( mysqli_error());
if(mysqli_query($con,$query)==true){

$in_query="insert into update_product_price (`product`,`mid`,`price`,`add_by`) values('$address','$mid','$price','$user')";

$in_result = mysqli_query($con,$in_query) or die ( mysqli_error());
}
	 
}
 ?>
 