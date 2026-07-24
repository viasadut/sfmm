<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2.php?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_REQUEST['user'];
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];

//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "bio_list_edit";




$query = "UPDATE storenew set estatus='Deleted',del_time='$dtime',del_by='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());






header("Location: $url"); 


?>