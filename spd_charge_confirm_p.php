
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
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
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

//$pdos=$_REQUEST['test'];


$ortime = date('Y-m-d H:i:s');




//$message= "this is a message";

$query="update cath_receive set charge_confirm_p='Charge Confirmed', charge_confirm_p_time='$ortime',charge_confirm_p_by='$user' where pmrn='$pmrn' and id='$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Notification Sent Successfully!!"); ';
    echo '</script>';
$url = "p_spd_medi.php?pmrn=$pmrn&id=$id&eid=$eid";

header("Refresh: .1; URL=$url");



?>

