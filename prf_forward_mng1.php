<?php 
   session_start();
    require('db1.php');
	
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION['sess_username'];
$sno=$_REQUEST['sno'];
$hod=$_REQUEST['hod'];
$incharge=$_REQUEST['incharge'];
$cat=$_REQUEST['cat'];




//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "prf_approval";
$df=date('Y-m-d H:i:s');



$query = "SELECT * FROM staff3 where sid= '$user' and status='Active'"; 
	 
$result = mysqli_query($con, $query) or die(mysqli_error());

// Print out result
$row9 = mysqli_fetch_array($result);
$rq_name = $row9['fullname'];
$sid1 = $row9['sid1'];



if($user!='' and $cat=="HOD")
{
$query = "UPDATE purchase_stock3 set fstatus='2',hod_time='$df' where rfid='$sno'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
}


else if($user!='' and $cat=="Incharge")
{
$query = "UPDATE purchase_stock3 set fstatus='1',incharge_time='$df' where rfid='$sno'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
}


else if($user!='' and $sid1==$hod)
{
$query = "UPDATE purchase_stock3 set fstatus='2',hod_time='$df' where rfid='$sno'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
}



else if($user!='' and $user=='1601')
{
$query = "UPDATE purchase_stock3 set fstatus='3',cfo_time='$df' where rfid='$sno'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
}


else if($user!='' and $user=='md')
{
$query = "UPDATE purchase_stock3 set fstatus='4',ceo_time='$df' where rfid='$sno'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
}



?>