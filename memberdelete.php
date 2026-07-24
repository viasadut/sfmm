<?php


//session_start();
require('db2.php');
$name=$_REQUEST['name'];
$sid=$_REQUEST['sid'];

if(isset($_POST) && !empty($_POST['id'])&& !empty($_POST['name'])){


/*$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM image_gallery WHERE id='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$img=["image"];*/


$test ="uploads/$name";

//$test= src=uploads/$name;
unlink($test);



		$sql = "update member set image ='' WHERE id = ".$_POST['id'];
		mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: memberview2?sid=$sid");
}

else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost:8000");
}


?>