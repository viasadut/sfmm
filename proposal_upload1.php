<?php


//session_start();
require('db1.php');

$id=$_REQUEST['id'];


if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['id'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'proposal/uploads/'.$image_name)){


		$sql = "INSERT INTO proposal_files (file_name,ticket_id) VALUES ('".$image_name."','".$id."')";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: proposal_upload?id=$id");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>