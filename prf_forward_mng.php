<?php 
   session_start();
    require('db1.php');
	
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION['sess_username'];
$sno=$_REQUEST['sno'];


//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "prf_approval";
$df=date('Y-m-d H:i:s');









if($user!='' and $user=='cfo')
{
$query = "UPDATE purchase_stock set fstatus='2',cfo_time='$df' where rfid='$sno'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
}


else if($user!='' and $user=='ceo')
{
$query = "UPDATE purchase_stock set fstatus='3',ceo_time='$df' where rfid='$sno'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
}

?>