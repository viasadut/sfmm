<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
//$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
//$vc=$_REQUEST['vc'];
//$vc1=$_REQUEST['vc1'];
//$room1=$_REQUEST['room1'];
//$user=$_REQUEST['fullname'];
//$id1=$_REQUEST['ID'];
$date1 = date('d/m/Y H:i:s');
//$ddate1 = date('m/d/Y');
//$url = "idoccondis.php?pmrn=$pmrn&eid=$eid";
$url = "imoidoccondis.php?pmrn=$pmrn&eid=$eid";

$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$full = $row139['fullname'];

$sel90="SELECT * FROM inpatient WHERE `id`='$id';";
$result90 = mysqli_query($con,$sel90);
$res90=mysqli_fetch_assoc($result90);
$a1=$res90['confirmdn'];

if($a1!=''){
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessfully !! Already Confirmed  !!"); ';
    echo '</script>';
$url = "imoidoccondis.php?pmrn=$pmrn&eid=$eid";
header("Refresh: .1; URL=$url");
}
else {

$update="update inpatient set confirmdn='$user', cdntime='$date1'where id='$id'";
mysqli_query($con,$update) or die(mysqli_error(pp));

$query1 = "UPDATE idischarge1 set emo='$full',ddate='$date1' where pmrn='$pmrn' and eid='$eid'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());
$url = "imoidoccondis.php?pmrn=$pmrn&eid=$eid";
echo '<script language="javascript">';
    echo 'alert("Confirm Successful  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
?>