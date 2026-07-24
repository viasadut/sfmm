<?php


//session_start();
require('db1.php');
$name=$_REQUEST['name'];
$eid=$_REQUEST['poid'];
$pmrn=$_REQUEST['ono'];
$ono=$_REQUEST['ono'];


$simple_string1 = $eid;
								$ciphering1 = "AES-192-CTR";
								$iv_length = openssl_cipher_iv_length($ciphering1);
								$options = 0;
								$encryption_iv = '1234567891011121';
								$encryption_key = "kpj";
								$encryption1 = openssl_encrypt($simple_string1,
								$ciphering1,
								$encryption_key, $options, $encryption_iv);
								$encryption1;
								
								$simple_string = $ono;
								$ciphering = "AES-192-CTR";
								$iv_length = openssl_cipher_iv_length($ciphering);
								$options = 0;
								$encryption_iv = '1234567891011121';
								$encryption_key = "kpj";
								$encryption = openssl_encrypt($simple_string,
								$ciphering,
								$encryption_key, $options, $encryption_iv);
								$encryption;

if(isset($_POST) && !empty($_POST['id'])){


/*$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM image_gallery WHERE id='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$img=["image"];*/


$test ="popic/$name";

//$test= src=uploads/$name;
unlink($test);



		$sql = "DELETE FROM po_gallery WHERE id = ".$_POST['id'];
		mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: po_upload?ono=$pmrn&eid=$eid");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost:8000");
}


?>