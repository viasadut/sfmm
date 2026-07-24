<?php


//session_start();
require('db1.php');
$pmrn=$_REQUEST['ono'];
$ono=$_REQUEST['ono'];
$poid=$_REQUEST['poid'];
$sno=$_REQUEST['sno'];
//echo $kk=$_FILES['image']['name'];


if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['ono'])&& !empty($_POST['poid'])&& !empty($_POST['sno'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'popic/'.$image_name)){


		$sql = "INSERT INTO po_gallery (image,rfid,sid) VALUES ('".$image_name."','$ono','".$_POST['sno']."')";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: prf_upload?sno=$ono&id=$sno");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}
?>