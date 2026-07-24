<?php


//session_start();
require('db1.php');

$rid=$_REQUEST['rid'];


if(isset($_POST) && !empty($_POST['id'])){


/*$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM image_gallery WHERE id='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$img=["image"];*/


$test ="company_delete/$name";

//$test= src=uploads/$name;
unlink($test);



		$sql = "DELETE FROM company_document WHERE id = ".$_POST['id'];
		mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: company_document_upload?rid=$rid");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost:8000");
}


?>