<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$user=$_REQUEST['user'];
$ortime = date('d/m/Y H:i:s');

$url = "pendingrequest1mng.php";
$sel90="SELECT * FROM medicinerequest WHERE `id`='$id';";
$result90 = mysqli_query($con,$sel90);
$res90=mysqli_fetch_assoc($result90);
$a1=$res90['aname1'];
$a2=$res90['aname2'];
$a3=$res90['aname3'];
$a4=$res90['aname4'];

$a5=$res90['a1'];
$a6=$res90['a2'];
$a7=$res90['a3'];
$a8=$res90['a4'];




$ins_query1="update medicinerequest set a1='Approved',a1time='$ortime',a2='Approved',a2time='$ortime',a3='Approved',a3time='$ortime',a4='Approved',a4time='$ortime',mapproveby='$user' where id='$id';";
mysqli_query($con,$ins_query1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");

?>