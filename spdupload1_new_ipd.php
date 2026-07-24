<?php


session_start();
$user=$_SESSION["sess_username"];
require('db1.php');
$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$dtime= date('d/m/Y H:i:s');

if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['id'])&& $user!=''){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'spdpic/'.$image_name)){


		$sql = "update iinves set upload='".$image_name."',upload_by='$user' where id='".$id."'";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: spdupload_new_ipd?id=$id&eid=$eid");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>