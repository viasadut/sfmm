<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$user=$_REQUEST['user'];
$ortime = date('d/m/Y H:i:s');

$url = "phar_approve_new.php";
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
$aa=date('Y-m-d');


if($user=='1175') {

$ins_query1="update medicinerequest set rstatus='Forward to CFO Approval',a1time='$ortime',a1time1='$aa' where id='$id';";
mysqli_query($con,$ins_query1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}


else if($user=='338') {

$ins_query1="update medicinerequest set rstatus='Forward  Approval',a1time='$ortime',a1time1='$aa' where id='$id';";
mysqli_query($con,$ins_query1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}


else if($user=='1601')
 {
$ins_query2="update medicinerequest set rstatus='Forward to MD Approval',a3='Approved',a3time='$ortime',a3time1='$aa' where id='$id';";
mysqli_query($con,$ins_query2) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}





else if($user=='md'){
	
	


$ins_query3="update medicinerequest set a2='Approved',a2time='$ortime',rstatus='Waiting For CEO Approval' where id='$id';";
mysqli_query($con,$ins_query3) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}


else if($user=='ceo'){
	
	


$ins_query3="update medicinerequest set a4='Approved',a4time='$ortime',rstatus='Waiting For Entry' where id='$id';";
mysqli_query($con,$ins_query3) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}

else {
	
	echo '<script language="javascript">';
    echo 'alert("TEST   !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
?>