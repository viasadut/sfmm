<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST["user"];
$id =$_REQUEST["id"];
//$pname = $data59['pname'];
$pmrn = $_REQUEST['pmrn'];
$eid = $_REQUEST['eid'];
//$padd = $data59['padd'];
//$adm = $data59['adate'];
//$pphone=$data59['pphone'];
//$page=$data59['age'];
//$psex=$data59['gender'];
//$odate = $_REQUEST['odate'];
//$otime = $_REQUEST['otime'];
//$infu = $_REQUEST['infu'];
$ddate = date('d/m/Y H:i:s');
//$dtime = $_REQUEST['dtime'];

$url = "imedi1.php?pmrn=$pmrn&eid=$eid";

$update="update imedi2 set donet='$ddate',udone='$user',status1='implemented' where `id`='$id'";
mysqli_query($con,$update) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';
header("Location: $url"); 
?>