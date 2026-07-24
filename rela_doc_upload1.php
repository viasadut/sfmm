<?php



session_start();
$user = $_SESSION['sess_username'];
require('db1.php');
$pmrn=$_REQUEST['pmrn'];
$type=$_REQUEST['type'];
echo $eid=$_REQUEST['eid'];
$date=date('Y-m-d H:i:s');

if(isset($_POST) && !empty($_FILES['image']['name']) && $user!=''){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'rela_doc_pic/'.$image_name)){


		$sql = "INSERT INTO rela_doc_form (file,date,user,status,type) VALUES ('".$image_name."','".$date."','".$user."','Active','".$type."')";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: rela_doc_upload");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>