
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$user=$_SESSION["sess_username"];
require('db1.php');
$uname=$_REQUEST['uname'];
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$bal=$_REQUEST['bal'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];


$query3 = "SELECT * FROM staff3 where sid= '$uname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$ataken=$row3['ataken']-$bal;
$etaken=$row3['etaken']-$bal;
$staken=$row3['staken']-$bal;
$mataken=$row3['mataken']-$bal;
$pataken=$row3['pataken']-$bal;
$rltaken=$row3['rleave']-$bal;
$lwpltaken=$row3['lwl']-$bal;
$intaken=$row3['intaken']-$bal;
$comltaken=$row3['comltaken']-$bal;
$mrltaken=$row3['martaken']-$bal;







$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "leave_stats";
if($type=='aleave'){
$query1 = "UPDATE staff3 set ataken='$ataken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }

else if($type=='sleave'){
$query1 = "UPDATE staff3 set sleave='$staken',staken='$staken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }




else if($type=='eleave'){
$query1 = "UPDATE staff3 set eleave='$etaken',etaken='$etaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }

else if($type=='maleave'){
$query1 = "UPDATE staff3 set maleave='$mataken', mataken='$mataken'where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }


else if($type=='paleave'){
$query1 = "UPDATE staff3 set paleave='$pataken',pataken='$pataken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }

else if($type=='rleave'){
$query1 = "UPDATE staff3 set rleave='$rltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }

else if($type=='lWPleave'){
$query1 = "UPDATE staff3 set lwl='$lwpltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }


else if($type=='marleave'){
$query1 = "UPDATE staff3 set martaken='$mrltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }


else if($type=='comleave'){
$query1 = "UPDATE staff3 set comltaken='$comltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }


else if($type=='inleave'){
$query1 = "UPDATE staff3 set intaken='$intaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Cancelled By TM',cantime='$dtime',canby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }





?>