<?php


require('db1.php');
    session_start();
$user=$_SESSION["sess_username"];

if(isset($_POST)){


/*$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM image_gallery WHERE id='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$img=["image"];*/


$test ="set_pic/$name";

//$test= src=uploads/$name;
unlink($test);



		$sql = "DELETE FROM set_pic WHERE id = ".$_POST['id'];
		mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: set_pic.php");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost:8000");
}


?>