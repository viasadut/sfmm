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

$url = "pendingnewmaterial.php";
$sel90="SELECT * FROM newmaterial WHERE `id`='$id';";
$result90 = mysqli_query($con,$sel90);
$res90=mysqli_fetch_assoc($result90);
$a1=$res90['aname1'];
$a2=$res90['aname2'];


$a5=$res90['a1'];
$a6=$res90['a2'];



if($user==$a1){
if($a5=='Approved'){
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessfully !! Already Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
else {

$ins_query1="update newmaterial set a1='Approved',a1time='$ortime' where id='$id';";
mysqli_query($con,$ins_query1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
}
else if($user==$a2){
if($a6=='Approved'){
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessfully !! Already Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
else {
$ins_query2="update newmaterial set a2='Approved',a2time='$ortime' where id='$id';";
mysqli_query($con,$ins_query2) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
}

else {
	
	echo '<script language="javascript">';
    echo 'alert("TEST   !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
?>