
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
$sid = 'I'.$id;

//$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
$ortime = date('d/m/Y H:i:s');

$cdate=date('Y-m-d');

$query="update alltest set cby='$user',ctime='$ortime',resultstatus='Confirmed By Consultant',cdate='$cdate' where id='$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());



$query1="update alllab set conby='$user',contime='$ortime',resultstatus='Confirmed By Consultant' where sno='$sid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());



//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Result Successfully Confirm   !!"); ';
    echo '</script>';
$url = "lab_all1_histo.php";

header("Refresh: .1; URL=$url");
?>

