<?php


session_start();
require('../db1.php');
$user=$_SESSION["sess_username"];
$add_time=date('Y-m-d H:i:s');
if(isset($_POST) && !empty($_FILES['test']['name'])){

$folderPath = "doctor/";
	$name = $_FILES['test']['name'];
	
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['test']['tmp_name'];

$ss = $_REQUEST['mrn'];
$eid = $_REQUEST['eid'];
$cat = $_REQUEST['cat'];
$remarks = $_REQUEST['remarks'];

	if(move_uploaded_file($tmp, 'doctor/'.$image_name)){


		$sql = "update doctor set pic='".$image_name."' where sid='".$ss."'";
		
	mysqli_query($con,$sql) or die(mysql_error());


	
	
  
    
	
	
	
		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location:../../summary_bds");
	}
	
	
	
	else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>