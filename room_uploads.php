<?php


//session_start();
require('db1.php');

$eid=$_REQUEST['eid'];
$rno=$_REQUEST['rno'];


if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['eid'])&& !empty($_POST['rno'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'room_uploads/'.$image_name)){


		$sql = "INSERT INTO new_room (file_name,eid,room_id) VALUES ('".$image_name."','".$_POST['eid']."','".$_POST['rno']."')";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: room_uploads1?eid=$eid&rno=$rno");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>