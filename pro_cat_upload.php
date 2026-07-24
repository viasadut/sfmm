<?php


//session_start();
require('db1.php');
$ename=$_REQUEST['ename'];
//$eid=$_REQUEST['eid'];
//$sno=$_REQUEST['sno'];

if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['ename'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	


		$select1="insert into pro_cat (`ename`) values('$ename')";
$sel1=mysqli_query($con,$select1) or die(mysql_error());

	
		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: otphotonew?pmrn=$pmrn&eid=$eid");
}


?>