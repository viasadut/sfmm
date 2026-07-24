<?php


//session_start();
require('db1.php');
$pmrn=$_REQUEST['ono'];
$ono=$_REQUEST['ono'];
$eid=$_REQUEST['poid'];
$sno=$_REQUEST['sno'];
//echo $kk=$_FILES['image']['name'];



$encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $ono4 = $pmrn;
	
	
	$encryption1=$_REQUEST['poid'];
/*    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '123esed';
    $decryption_key = "kpj1";
    $decryption1=openssl_decrypt ($encryption1, $ciphering,
    $decryption_key, $options, $decryption_iv);*/
   $eid4 = $encryption1;

/*$simple_string1 = $eid;
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
								
*/



if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['ono'])&& !empty($_POST['poid'])&& !empty($_POST['sno'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'popic/'.$image_name)){


		$sql = "INSERT INTO po_gallery (image,pmrn,eid,sid) VALUES ('".$image_name."','$ono4','$eid4','".$_POST['sno']."')";
		//$mysqli->query($sql);
	mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: po_upload?ono=$encryption&eid=$eid");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		//header("Location: http://localhost:8000");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	//header("Location: http://localhost:8000");
}
?>