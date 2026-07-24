<?php


//session_start();
require('db1.php');
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];


if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['pmrn'])&& !empty($_POST['eid'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'spd1pic/'.$image_name)){


		$sql = "update echo set upload='".$image_name."' where pmrn='".$_POST['pmrn']."' and eid= '".$_POST['eid']."'";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: spd1upload?pmrn=$pmrn&eid=$eid");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>