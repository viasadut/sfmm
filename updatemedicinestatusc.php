
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
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$user=$_SESSION['sess_username'];
$ortime = date('d/m/Y H:i:s');

$url = "pendingrequest1.php";
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



if($user==$a1){
if($a1=='Approved'){
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessfully !! Already Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
else {

$ins_query1="update medicinerequest set a1='Approved',a1time='$ortime',rstatus='WAITING FOR CFO APPROVAL' where id='$id';";
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
$ins_query2="update medicinerequest set a2='Approved',a2time='$ortime' where id='$id';";
mysqli_query($con,$ins_query2) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
}

else if($user==$a3){
	
	if($a7=='Approved'){
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessfully !! Already Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
else {


$ins_query3="update medicinerequest set a3='Approved',a3time='$ortime' where id='$id';";
mysqli_query($con,$ins_query3) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}

}
else if($user==$a4){

if($a8=='Approved'){
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessfully !! Already Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
else {

$ins_query4="update medicinerequest set a4='Approved',a4time='$ortime' where id='$id';";
mysqli_query($con,$ins_query4) or die(mysql_error());


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