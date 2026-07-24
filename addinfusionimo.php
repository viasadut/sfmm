<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
//$orderby=$_REQUEST['orderby'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$instruc=$_REQUEST['instruc'];
$pmrn=$_REQUEST['pmrn'];
//$time=$_REQUEST['time'];
$infu=$_REQUEST['infusion'];
//$pdos=$_REQUEST['test'];
$odate=date('d/m/Y H:i:s');
$odate1=date('m/d/Y');

//$root=$_REQUEST['root'];
$alert=$_REQUEST['alert'];


$url = "addpreviousinfusionimo.php?pmrn=$pmrn&eid=$eid";
$ins_query="insert into iinfusion (`pmrn`,`eid`,`odate`,`infusion`,`user`,`room`,`status`,`alert`,`status1`,`odate1`) values 
( '$pmrn','$eid','$odate','$infu','$dname','$instruc','Data Updated','$alert','Active','$odate1')";

$result = mysqli_query($con,$ins_query) or die ( mysqli_error());

echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';
header("Location: $url"); 
?>