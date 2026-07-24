
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="rad"){
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
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

//$rr=$_REQUEST['rr'];
//$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "tesphar";



$query = "UPDATE presnew set status='PARTIALLY SERVED',i19='$user',i20='$dtime' where pmrn='$pmrn' and eid='$eid'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$query3 = "UPDATE pmedi set status='PARTIALLY SERVED' where pmrn='$pmrn' and eid='$eid'"; 
$result3 = mysqli_query($con,$query3) or die ( mysqli_error());



header("Location: $url"); 
?>