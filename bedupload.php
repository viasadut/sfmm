<?php


//session_start();
require('db1.php');
//$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['eid'];
$sno=$_REQUEST['sno'];

if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['eid'])&& !empty($_POST['sno'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'bedpic/'.$image_name)){


		$sql = "INSERT INTO bed_photo (image,bid,sid) VALUES ('".$image_name."','".$_POST['eid']."','".$_POST['sno']."')";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: bed_photo?id=$id");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>