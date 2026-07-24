<?php



session_start();
$user = $_SESSION['sess_username'];
require('db1.php');
$pmrn=$_REQUEST['pmrn'];
$type=$_REQUEST['type'];
echo $eid=$_REQUEST['eid'];
$date=date('Y-m-d H:i:s');

if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['pmrn']) && $user!=''){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'other_doc_pic/'.$image_name)){


		$sql = "INSERT INTO other_doc_form (file,pmrn,date,user,status,eid,type) VALUES ('".$image_name."','".$_POST['pmrn']."','".$date."','".$user."','Active','".$eid."','".$type."')";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: other_doc_upload?pmrn=$pmrn&eid=$eid");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}


?>