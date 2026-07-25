<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
//$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$eid1=$_REQUEST['eid1'];
$pmrn=$_REQUEST['pmrn'];
$pname=$_REQUEST['pname'];
$medi=$_REQUEST['medi'];
$pdos=$_REQUEST['test'];
$type=$_REQUEST['type'];
$date1=$_REQUEST['date1'];
$date77=date('Y-m-d');
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];



$query159 = "select * from radio where iname='$medi'";
$row159 = mysqli_query($con, $query159) or die(mysqli_error());
$data159 = mysqli_fetch_assoc($row159);
$type=$data159["type"];
$price=$data159["price"];
$code=$data159["code"];
//echo $type;
//echo $type;
$link=$data159["link"];
$linkv=$data159["linkv"];
$report=$data159["report"];
$reportv=$data159["reportv"];
$subtype=$data159["subtype"];



//$id1=$_REQUEST['ID'];
$url = "newtest2test2.php?pmrn=$pmrn&eid=$eid&dname=$dname&eido=$eid1";
$query="insert into alltest (`dname`,`pmrn`,`pname`,`medi`,`ins`,`eid`,`type`,`date`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`subtype`,`page`,`pgender`) values ('$dname','$pmrn','$pname','$medi','$pdos','$eid','$type','$date1','$price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$subtype','$page','$pgender')";

$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 
?>