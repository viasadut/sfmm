
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
      header('Location: login2?err=2');
    }

	
	
	?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
//$orderby=$_REQUEST['orderby'];
//$dname=$_REQUEST['dname'];
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];

//$pdos=$_REQUEST['test'];


$ortime = date('Y-m-d H:i:s');




//$message= "this is a message";

$query="update cath_receive set charge_confirm='Charge Confirmed', confirm_time='$ortime',confirm_by='$user' where id='$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Notification Sent Successfully!!"); ';
    echo '</script>';
$url = "cath_receive2";

header("Refresh: .1; URL=$url");



?>

