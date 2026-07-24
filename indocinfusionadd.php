<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$orderby=$_REQUEST['orderby'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
//$instruc=$_REQUEST['instruc'];
$pmrn=$_REQUEST['pmrn'];
$pname=$_REQUEST['pname'];
$stime=$_REQUEST['stime'];
$etime=$_REQUEST['etime'];
$add1=$_REQUEST['add1'];
$add2=$_REQUEST['add2'];
$qty1=$_REQUEST['qty1'];
$qty2=$_REQUEST['qty2'];
$infuqty=$_REQUEST['infuqty'];

$infu=$_REQUEST['infusion'];
//$pdos=$_REQUEST['test'];
$odate=date('m/d/Y',strtotime("+1 days"));
//$root=$_REQUEST['root'];
$alert=$_REQUEST['alert'];
$status=$_REQUEST['status'];
$status1=$_REQUEST['status1'];
$infu1=$_REQUEST['infu1'];


$url = "idocinfusion.php?pmrn=$pmrn&eid=$eid";

$sel90="SELECT * FROM iinfusion WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and `addi`='$add1' and `add1`='$add2' and odate='$odate' and `status1`='Active';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Infusion is Already Added in Tommorows Order  !!"); ';

    echo '</script>';
	
	header("Refresh: .5; URL=$url");
}
else{

//$url = "idocmedi.php?pmrn=$pmrn&eid=$eid";
$ins_query="insert into iinfusion (`pmrn`,`eid`,`pname`,`odate`,`infusion`,`user`,`room`,`status`,`alert`,`status1`,`odate1`,`otime`,`addi`,`otime1`,`infu1`,`add1`,`qty1`,`qty2`) 
values ( '$pmrn','$eid','$pname','$odate','$infu','$orderby','$infuqty','Data Updated','$alert','Active','$odate','$stime','$add1','$etime','$infu1','$add2','$qty1','$qty2')";
mysqli_query($con,$ins_query) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
?>