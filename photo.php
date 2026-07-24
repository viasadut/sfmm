<?php
require('db1.php');
/*$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where id= '1'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);*/
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
 
?>


<?php
 
// check for form request method
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// check for uploaded file
	if(isset($_POST['submit']))
	{
		// file name, type, size, temporary name
		$file_name = $_FILES['upload']['name'];
		$file_type = $_FILES['upload']['type'];
		$file_name1 = $_FILES['upload1']['name'];
		$file_type1 = $_FILES['upload']['type'];

		$file_name2 = $_FILES['upload2']['name'];
		$file_type2 = $_FILES['upload']['type'];
		$file_name3 = $_FILES['upload3']['name'];
		$file_type3 = $_FILES['upload']['type'];


		$file_tmp_name = $_FILES['upload']['tmp_name'];
		$file_tmp_name1 = $_FILES['upload1']['tmp_name'];
		$file_tmp_name2 = $_FILES['upload2']['tmp_name'];
		$file_tmp_name3 = $_FILES['upload3']['tmp_name'];
		$file_size = $_FILES['upload']['size'];
		$file_size1 = $_FILES['upload']['size'];
 
		// target directory
		$target_dir = "uploads/";
	
		// uploding file
		if(move_uploaded_file($file_tmp_name,$target_dir.$file_name))
		{
			// connect to database
			$cdb = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew') or die("Sorry could not connect to database");
			
			// query
			$q = 'INSERT INTO photo(image,image2,image3,image4,pmrn) VALUES("'.$target_dir.$file_name.'","'.$target_dir.$file_name1.'","'.$target_dir.$file_name2.'","'.$target_dir.$file_name3.'","123456")';
			
			// run query
			$r = mysqli_query($cdb,$q);
			
			//$q1 = 'INSERT INTO photo(image2) VALUES("'.$target_dir.$file_name1.'")';
			
			// run query
			//$r1 = mysqli_query($cdb,$q1);
			
			if(mysqli_affected_rows($cdb) == 1)
			{
				echo "<p style='color:green'><b>File has been successfully uploaded</b></p>";
			}
			else
			{
			echo "<p>A system error has been occured</p>".mysqli_error($cdb);
			}
		}
		else
		{
			echo "File can not be uploaded";
		}
	}
}

?>
<!doctype html>
<html>
<head>

<title>File Uploading</title>
</head>
<body>
<h2>File uploading</h2>
<form action=" " method="post" enctype="multipart/form-data">
<p>
File : <input type="file" id= "upload" name="upload">
File : <input type="file" id= "upload1" name="upload1">
File : <input type="file" id= "upload2" name="upload2">
File : <input type="file" id= "upload3" name="upload3">
</p>
<input type="submit" name="submit" value="upload file">
</form>


</body>






