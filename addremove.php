<?php

$request = $_POST['request'];
//$pmrn = $_POST['pmrn'];
//echo $request;
// Upload file
if($request == 1){

	$filename = $_FILES['file']['name'];
	/* Location */
	$location = "uploads/".$filename;
	$uploadOk = 1;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

	// Check image format
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	 && $imageFileType != "gif" ) {
	 	$uploadOk = 0;
	}

	if($uploadOk == 0){
	 	echo 0;
	}else{
	 /* Upload file */
	 	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	 		
			$cdb = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew') or die("Sorry could not connect to database");
			
			// query
			$q = 'INSERT INTO photo(image,pmrn) VALUES("'.$location.'","123456")';
			
			// run query
			$r = mysqli_query($cdb,$q);
			
			echo $location;
	 	}else{
	 		echo 0;
	 	}
	}
	exit;
}

// Remove file
if($request == 2){
	$path = $_POST['path'];
	$filename = $_FILES['file']['name'];
	$location = "uploads/".$filename;
	$return_text = 0;

	// Check file exist or not
	if( file_exists($path) ){

	// Remove file 
	 unlink($path);
			$cdb1 = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew') or die("Sorry could not connect to database");
			
			// query
			$q1 = 'DELETE from photo where image="$location"';
			
			// run query
			$r1 = mysqli_query($cdb1,$q1);

	 
	 
	 
	// Set status
	 $return_text = 1;
	}else{

	// Set status
	 $return_text = 0;
	}

	// Return status
	echo $return_text;
	exit;
}