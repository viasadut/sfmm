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
$user=$_SESSION["sess_username"];
//$dname=$_REQUEST['dname'];
$id3=$_REQUEST['id3'];
$pmrn=$_REQUEST['pmrn'];
$pname=$_REQUEST['pname'];
$code=$_REQUEST['code'];
$infusion=$_REQUEST['infusion'];
$ins=$_REQUEST['ins'];
//$code=$_REQUEST['code'];
$odate=$_REQUEST['odate'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$infusion';");
$result1 = mysqli_fetch_assoc($sel1);
//$code=$result1["code"];



$query3 = "SELECT * FROM othoscharge1 where pmrn= '$pmrn' and eid='$id' and date='$odate' and medi='$infusion'"; 
	 
$result3 = mysqli_query($con, $query3);

// Print out result

$query4 = "SELECT * FROM othoscharge1 where pmrn= '$pmrn' and eid='$id' and date='$odate'and medi='$infusion'"; 
	 
$result4 = mysqli_query($con, $query4);

$row3 = mysqli_fetch_array($result4);
$pdos1=$row3['pdos'];
$pdos2=$row3['pdos']+1;


$query4 = "SELECT * FROM othoscharge where pmrn= '$pmrn' and eid='$id' and date='$date1'and code='$code'"; 
	 
$result4 = mysqli_query($con, $query4);

$row3 = mysqli_fetch_array($result4);
$pdos1=$row3['pdos'];
$pdos2=$row3['pdos']+$pdos;
$pp1=$pdos *$price;
$pp2=$pdos2*$price;


$pp3=$pdos *$priceold;
$pp4=$pdos2*$priceold;



	
if($res90=mysqli_num_rows($result3)>0){
		



//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "otidocmedinurse.php?pmrn=$pmrn&id=$id";
$query = "UPDATE otendomedi set status1='given',cuser='$user', cdate='$cdate' where id='$id3'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$ins_query1="Update othoscharge1 set pdos='$pdos2' where eid='$id' and pmrn='$pmrn' and medi='$infusion'";
mysqli_query($con,$ins_query1) or die(mysql_error());
		



}


else {
		



//$id1=$_REQUEST['ID'];
$cdate = date('d/m/Y H:i:s');
$url = "otidocmedinurse.php?pmrn=$pmrn&id=$id";
$query = "UPDATE otendomedi set status1='given',cuser='$user', cdate='$cdate' where id='$id3'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$ins_query1="insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`eid`,`date`,`pdos`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`aqty`,`ins`,`time`,`mtime`,`nuser`) values 
('$pmrn','$pname','$infusion','$id','$odate','1','$code',)";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query1="insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`aqty`,`ins`,`time`,`mtime`,`nuser`) values 
('$pmrn','$pname','$medi1','$bb_name','$pdos','$id','$date1','$rfid','$code','$adate','$route','$remarks','$location','$m_qty1','$t_price','$time','$mtime','$user')";
mysqli_query($con,$ins_query1) or die(mysql_error());



}




header("Location: $url"); 


?>