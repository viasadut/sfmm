<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf','staff','lab')"; 
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
$user=$_SESSION['sess_username'];
$id=$_REQUEST['id'];
$iid=$_REQUEST['iid'];


//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "inves_request_a.php";


$query43 = "SELECT * FROM edit_inves where id= '$id';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$rowz = mysqli_fetch_assoc($result43);
$cprice=$rowz['cprice'];
$price=$rowz['price'];
$iname=$rowz['iname'];


if($user=='338')
{
$query = "UPDATE edit_inves set status='Waiting For CFO Approval',ftime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


header("Location: $url"); }




else if($user=='1601')
{
$query = "UPDATE edit_inves set status='Waiting For MD Approval',cfotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }


else if($user=='md')
{
$query = "UPDATE edit_inves set status='Waiting For IT Entry',cfotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }




else if($user=='ceo')
{
$query = "UPDATE edit_inves set status='Waiting For IT Entry',ceotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }




else if($user=='322'|| $user=='1274' || $user=='729')
{
$query = "UPDATE radio set status='Active',ittime='$dtime',cprice='$cprice',price='$price',iname='$iname' where id='$iid'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$query1 = "UPDATE radio1 set status='Active',ittime='$dtime',cprice='$cprice',price='$price',iname='$iname' where id='$iid'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());

$query2 = "UPDATE radio2 set status='Active',ittime='$dtime',cprice='$cprice',price='$price',iname='$iname' where id='$iid'"; 
$result2 = mysqli_query($con,$query2) or die ( mysqli_error());

$query3 = "UPDATE edit_inves set status='Active',ittime='$dtime' where id='$id'"; 
$result3 = mysqli_query($con,$query3) or die ( mysqli_error());

header("Location: $url"); }


?>