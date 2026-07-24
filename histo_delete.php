<?php


//session_start();
require('db1.php');
$name=$_REQUEST['name'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

if(isset($_POST) && !empty($_POST['id'])){


/*$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM image_gallery WHERE id='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$img=["image"];*/


$test ="histopic/$name";

//$test= src=uploads/$name;
unlink($test);



		$sql = "DELETE FROM histo_gallery WHERE id = ".$_POST['id'];
		mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: histo_photo?pmrn=$pmrn&eid=$eid");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost:8000");
}


?>