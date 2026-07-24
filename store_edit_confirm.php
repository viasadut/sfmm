<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','store','staff')"; 
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


//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "eapprove_new.php";
$df=date('Y-m-d');


$query40 = "SELECT * FROM storenew_edit where id='$id'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$uprice=$row40['price'];
$cprice=$row40['cprice'];
$iid=$row40['iid'];





if($user=='1601')
{
$query = "UPDATE storenew_edit set estatus='WAITING FOR MD APPROVAL',cfotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }


/*if($user=='md')
{
$query = "UPDATE storenew_edit set estatus='WAITING FOR CEO APPROVAL',mdtime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }

*/
else if($user=='md')
{
$query = "UPDATE storenew_edit set estatus='WAITING FOR IT ENTRY',ceotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }




else if($user=='338')
{
$query = "UPDATE storenew_edit set estatus='WAITING FOR CFO APPROVAL',financetime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }



else if($user=='322')
{
	
	
$query = "UPDATE storenew_edit set estatus='Active',ittime='$dtime',it='$user'  where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$query1 = "UPDATE storenew set estatus='Active',ittime='$dtime',it='$user',price='$uprice',cprice='$cprice' where id='$iid'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


header("Location: $url"); }



/*else if($user=='322' and $lprice1!='')
{
	
	
$query = "UPDATE storenew set estatus='Active',ittime='$dtime',it='$user',ittime1='$df',price='$lprice1',uprice='' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }
*/



?>