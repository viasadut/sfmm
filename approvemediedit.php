<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor')"; 
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
$user=$_SESSION['sess_username'];
$ortime = date('d/m/Y H:i:s');

$url = "pendingrequest1.php";
$sel90="SELECT * FROM medicineedit WHERE `id`='$id';";
$result90 = mysqli_query($con,$sel90);
$res90=mysqli_fetch_assoc($result90);

$code = $res90['code'];
$mname = $res90['mname'];
$bname = $res90['brand1'];
$cname=$res90['brand2'];
$form=$res90['pre'];
$frequency=$res90['frequency'];
$frelation=$res90['frelation'];
$pcategory=$res90['pcategory'];
$duration=$res90['duration'];
$contrain=$res90['contrain'];
$meffect=$res90['meffect'];
$cat=$res90['pcat'];
$uprice=$res90['uprice'];
$mid=$res90['mid'];
$etime=$res90['etime'];
$eby=$res90['eby'];
$id2=$res90['id'];

$ap1=$res90['appby'];
$ap2=$res90['appby1'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');
$url = "editrequestapprove.php";

if($ap1==''and $ap2==''and $user=='md')

{

/*$ins_query1="update medicine set mname='$mname', brand1='$bname', brand2='$cname', pre='$form', 
pcat='$cat', etime='$etime',eby='$eby',frequency='$frequency',frelation='$frelation',pcategory='$pcategory',duration='$duration',contrain='$contrain',meffect='$meffect',uprice='$uprice',code='$code' where id='$mid'";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/


$ins_query2="update medicineedit set aptime='$adate',appby='$user',status='Waiting' where id='$id2'";
mysqli_query($con,$ins_query2) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}


if($ap1==''and $ap2!=''and $user=='md')

{

$ins_query1="update medicine set mname='$mname', brand1='$bname', brand2='$cname', pre='$form', 
pcat='$cat', etime='$etime',eby='$eby',frequency='$frequency',frelation='$frelation',pcategory='$pcategory',duration='$duration',contrain='$contrain',meffect='$meffect',uprice='$uprice',code='$code' where id='$mid'";
mysqli_query($con,$ins_query1) or die(mysql_error());



$ins_query2="update medicineedit set aptime='$adate',appby='$user',status='Approved' where id='$id2'";
mysqli_query($con,$ins_query2) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}




if($ap1==''and $ap2==''and $user=='332')


{

/*$ins_query1="update medicine set mname='$mname', brand1='$bname', brand2='$cname', pre='$form', 
pcat='$cat', etime='$etime',eby='$eby',frequency='$frequency',frelation='$frelation',pcategory='$pcategory',duration='$duration',contrain='$contrain',meffect='$meffect',uprice='$uprice',code='$code' where id='$mid'";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/


$ins_query2="update medicineedit set aptime1='$adate',appby1='$user',status='Waiting' where id='$id2'";
mysqli_query($con,$ins_query2) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}

if($ap1!=''and $ap2==''and $user=='332')
	

{

$ins_query1="update medicine set mname='$mname', brand1='$bname', brand2='$cname', pre='$form', 
pcat='$cat', etime='$etime',eby='$eby',frequency='$frequency',frelation='$frelation',pcategory='$pcategory',duration='$duration',contrain='$contrain',meffect='$meffect',uprice='$uprice',code='$code' where id='$mid'";
mysqli_query($con,$ins_query1) or die(mysql_error());



$ins_query2="update medicineedit set aptime1='$adate',appby1='$user',status='Approved' where id='$id2'";
mysqli_query($con,$ins_query2) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
?>