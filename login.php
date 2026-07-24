
<!DOCTYPE html>
<html>
<head>
	<title>SFMMKPJ</title>
	<link rel="stylesheet" href="style.css">
	
    <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
    </style>
</head>
<body>
<?php
	require('db1.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
				$utype = stripslashes($_REQUEST['utype']);
		$utype = mysqli_real_escape_string($con,$utype);

	//Checking is user existing in the database or not
        $query = "SELECT uname FROM `user` WHERE uname='$username' and upass='$password' and utype='admin'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
		$query1 = "SELECT uname FROM `user` WHERE uname='$username' and upass='$password' and utype='user'";
		$result1 = mysqli_query($con,$query1) or die(mysqli_error());
		$rows1 = mysqli_num_rows($result1);

        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: view.php"); // Redirect user to index.php
            }
			
        else if($rows1==1){
			$_SESSION['username'] = $username;
			header("Location: gg1.php"); // Redirect user to index.php
            }
			
			
			else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>


<div class="header">
	<h2>WELCOME!!! TO "SFMMKPJ" </h2>
</div>
<form method="post" action="">

	<div class="input-group"><strong>
	  <label>Username</label>
	  <input type="text" name="username" value="" required />
	</strong></div>
	<div class="input-group"><strong>
	  <label>Password</label>
	  <input type="password" name="password" required />
	</strong></div>
	
		<div class="input-group">
		<button name="register_btn" type="submit" class="btn style1">LOGIN</button>
	</div>
	<p>&nbsp;</p>
</form>
<?php } ?>
</body>
</html>