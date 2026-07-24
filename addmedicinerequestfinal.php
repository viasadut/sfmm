<?php
include_once 'dbconfig.php';
//require('db1.php');
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');



//include("auth.php");
//echo $count1;
$id=$_REQUEST['id'];
$user=$_REQUEST['user'];

$sel91="SELECT * FROM medicinerequest WHERE `id`='$id';";
$result91 = mysqli_query($con,$sel91);
$data=mysqli_fetch_assoc($result91);
$mname = $data['mname'];
$bname = $data['brand1'];
$cname=$data['brand2'];
$form=$data['pre'];
$cat=$data['pcat'];
$adate= date('d/m/Y H:i:s');
$adate1= date('m/d/Y');
$url = "pendingrequest.php";


$frequency=$data['frequency'];
$frelation=$data['frelation'];
$pcategory=$data['pcategory'];
$duration=$data['duration'];
$contrain=$data['contrain'];
$meffect=$data['meffect'];
$reuse=$_REQUEST['reuse'];
$cprice=$data['cprice'];
$uprice=$data['uprice'];
$uprice1=$data['uprice1'];
$code=$data['code'];
$stest=$data['mtest'];
$aa=date('Y-m-d');



  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');


//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];



$sel90="SELECT * FROM medicine WHERE `mname`='$mname';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in The Database !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else{


$ins_query1="insert into medicine (`mname`,`brand1`,`brand2`,`pre`,`pcat`,`addby`,`atime`,`status`,
`frequency`,`frelation`,`pcategory`,`duration`,`contrain`,`meffect`,`cprice`,`uprice1`,`uprice`,`reuse`,`code`,`stest`) values 
('$mname','$bname','$cname','$form','$cat','$user','$adate','Active','$frequency','$frelation','$pcategory','$duration'
,'$contrain','$meffect','$cprice','$uprice1','$uprice','$reuse','$code','$stest')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="update medicinerequest set addby='$user',atime='$adate',rstatus='DONE',atime1='$aa' where id='$id';";
mysqli_query($con,$ins_query2) or die(mysql_error());


//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Entry Successful"); ';
    echo '</script>';
	
	header("Refresh: .1; URL=$url");
} 


?>

