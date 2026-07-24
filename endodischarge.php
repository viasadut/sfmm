<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="endo"){
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
$id=$_REQUEST['id'];
//$user=$_REQUEST['user'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
  $cdate = date('d/m/Y H:i:s');
  $cdate1 = date('m/d/Y');
//$id1=$_REQUEST['ID'];
$url = "endoreport1nursetest1.php";



$sel43="SELECT * FROM endoreport WHERE `pmrn`='$pmrn' and `eid`='$eid';";
$result43 = mysqli_query($con,$sel43);

if($res43=mysqli_num_rows($result43)==0)
{
 	
$ins_query="insert into endoreport (`pmrn`,`eid`,`status`) values ('$pmrn','$eid','REPORT NOT DONE')";
$result= mysqli_query($con,$ins_query);

$query = "UPDATE endopapp set discharge='Discharged', disdate='$cdate', disdate1='$cdate1',disuser='$user' where ID='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
 }


else{


$query = "UPDATE endopapp set discharge='Discharged', disdate='$cdate', disdate1='$cdate1',disuser='$user' where ID='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
}
?>