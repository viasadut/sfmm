<?php


//session_start();
require('db1.php');
$sid=$_REQUEST['sid'];
$eid=$_REQUEST['eid'];


if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['sid'])&& !empty($_POST['eid'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'leave/'.$image_name)){


		$sql = "Update conleavedetails set upload='".$image_name."' where sid='$sid' and eid='$eid'";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: conleaveupload?sid=$sid&eid=$eid");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>