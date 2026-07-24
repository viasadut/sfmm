
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');
$url = "editrequestapprove.php";



$ins_query2="update medicineedit set rtime='$adate',rby='$user',status='Reject' where id='$id2'";
mysqli_query($con,$ins_query2) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("successfully Rejected  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");

?>