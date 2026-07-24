<?php


session_start();
require('db1.php');
$user=$_SESSION["sess_username"];
$add_time=date('Y-m-d H:i:s');
if(isset($_POST) && !empty($_FILES['test']['name'])){

$folderPath = "rela_photo/";
	$name = $_FILES['test']['name'];
	
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['test']['tmp_name'];

$id = $_REQUEST['id'];
$eid = $_REQUEST['eid'];
$cat = $_REQUEST['cat'];
$remarks = $_REQUEST['remarks'];

	if(move_uploaded_file($tmp, 'tumor_doc/'.$image_name)){


		$sql = "update patient_tumor set doc='".$image_name."' where id='".$id."'";
		
	mysqli_query($con,$sql) or die(mysql_error());


	
	
  
    
	
	
	
		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location:../rela_all_form");
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