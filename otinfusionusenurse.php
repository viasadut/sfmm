<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
//$user=$_SESSION["sess_username"];
//$dname=$_REQUEST['dname'];
$id3=$_REQUEST['id3'];
$pmrn=$_REQUEST['pmrn'];
$infusion=$_REQUEST['infusion'];
//$code=$_REQUEST['code'];
$odate=$_REQUEST['odate'];
$addi=$_REQUEST['addi'];
$add1=$_REQUEST['add1'];
$qty1=$_REQUEST['qty1'];
$qty2=$_REQUEST['qty2'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$infusion';");
$result1 = mysqli_fetch_assoc($sel1);
$code=$result1["code"];







if($addi !='NA' && $add1 !='NA' ){

//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "otidocinfusionnurse.php?pmrn=$pmrn&id=$id";
$query = "UPDATE otendoinfusion set status='given',cuser='$user', cdate='$cdate' where id='$id3'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$ins_query1="insert into othoscharge1 (`pmrn`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$infusion','$id','$odate','1','$code')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into othoscharge1 (`pmrn`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$addi','$id','$odate','$qty1','$code')";
mysqli_query($con,$ins_query2) or die(mysql_error());

$ins_query3="insert into othoscharge1 (`pmrn`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$add1','$id','$odate','$qty2','$code')";
mysqli_query($con,$ins_query3) or die(mysql_error());


header("Location: $url"); 

}
else if($addi !='NA' && $add1='NA'){

//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "otidocinfusionnurse.php?pmrn=$pmrn&id=$id";
$query = "UPDATE otendoinfusion set status='given',cuser='$user', cdate='$cdate' where id='$id3'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$ins_query1="insert into othoscharge1 (`pmrn`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$infusion','$id','$odate','1','$code')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into othoscharge1 (`pmrn`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$addi','$id','$odate','$qty1','$code')";
mysqli_query($con,$ins_query2) or die(mysql_error());


header("Location: $url"); 

}


else if($addi ='NA' && $add1 !='NA'){

//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "otidocinfusionnurse.php?pmrn=$pmrn&id=$id";
$query = "UPDATE otendoinfusion set status='given',cuser='$user', cdate='$cdate' where id='$id3'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$ins_query1="insert into othoscharge1 (`pmrn`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$infusion','$id','$odate','1','$code')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into othoscharge1 (`pmrn`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$add1','$id','$odate','$qty2','$code')";
mysqli_query($con,$ins_query2) or die(mysql_error());


header("Location: $url"); 

}

else {

//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "otidocinfusionnurse.php?pmrn=$pmrn&id=$id";
$query = "UPDATE otendoinfusion set status='given',cuser='$user', cdate='$cdate' where id='$id3'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$ins_query1="insert into othoscharge1 (`pmrn`,`medi`,`eid`,`date`,`pdos`,`code`) values ('$pmrn','$infusion','$id','$odate','1','$code')";
mysqli_query($con,$ins_query1) or die(mysql_error());


header("Location: $url"); 

}


?>