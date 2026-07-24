<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$orderby=$_REQUEST['orderby'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$instruc=$_REQUEST['instruc'];
$pmrn=$_REQUEST['pmrn'];
$time=$_REQUEST['time'];
$infu=$_REQUEST['infusion'];
$pdos=$_REQUEST['test'];
$odate=date('m/d/Y');
$root=$_REQUEST['root'];
$alert=$_REQUEST['alert'];
$uprice=$_REQUEST['uprice'];
$ndate=date('Y-m-d',strtotime("+1 days"));	
$ortime = date('d/m/Y H:i:s');



$url = "datewisemedi22.php?pmrn=$pmrn&eid=$eid";
$query="insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`ndate`,`uprice`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$orderby','$odate','Active','$root','Rupdated','Ordered','$ortime','$ndate','$uprice')";

$result = mysqli_query($con,$query) or die ( mysqli_error());

echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';
header("Location: $url"); 
?>