


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION['sess_username'];
$id=$_REQUEST['id'];
$sno=$_REQUEST['sno'];
$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];


//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$ctime= date('Y-m-d H:i:s');
//$id1=$_REQUEST['ID'];
$url = "purchase_transfer_ot?sno=$sno";



$query = "delete from purchase_stock3  where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 


?>