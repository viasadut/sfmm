<?php


session_start();
$user = $_SESSION['sess_username'];
$edate=date('Y-m-d H:i:s');
require('db1.php');
$name=$_REQUEST['name'];

$pmrn=$_REQUEST['pmrn'];

if(isset($_POST) && !empty($_POST['id']) && $user!=''){


/*$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM image_gallery WHERE id='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$img=["image"];*/


$test ="rela_doc_pic/$name";

//$test= src=uploads/$name;
unlink($test);



		$sql = "Update rela_doc_form set status='Deleted', euser='$user',edate='$edate' WHERE id = ".$_POST['id'];
		mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: rela_doc_upload");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost:8000");
}


?>