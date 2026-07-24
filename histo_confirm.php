
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
$id=$_REQUEST['id'];
//$sid = $id;

//$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
$ortime = date('d/m/Y H:i:s');
$cdate=date('Y-m-d');






$query1="update histo set rconby='$user',rcontime='$ortime',status='Confirmed By Consultant' where id='$id'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());



//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Result Successfully Confirm   !!"); ';
    echo '</script>';
$url = "histo_con.php";

header("Refresh: .1; URL=$url");
?>

