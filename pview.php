
<?php
 
	$conn=mysqli_connect( "localhost", "root", "Godiloveu16", "sfmmkpjnew" ) or die("Could not connect: " .mysqli_error($conn) );
 
	$getImage=mysqli_query($conn, "SELECT * FROM photo") or die("Could not retrieve image: " .mysqli_error($conn));
 
	$path=mysqli_fetch_assoc($getImage) or die("Could not fetch array : " .mysqli_error($conn));
 
?>




<html>
<head><title>Fetch image form mysql</title>
</head>
<body>
 <?php echo $path['image2'];?>

<img src="<?php echo $path['image2'];?>" />
</body>
</html>
