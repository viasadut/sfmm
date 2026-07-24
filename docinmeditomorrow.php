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
//$pdos=$_REQUEST['test'];
$odate=date('m/d/Y',strtotime("+1 days"));
$root=$_REQUEST['root'];
$alert=$_REQUEST['alert'];
$ortime = date('d/m/Y H:i:s');

$url = "idocmedi.php?pmrn=$pmrn&eid=$eid";

$sel90="SELECT * FROM imedi2 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate' and `time`='$time' and `status`='Active';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Tommorows Order  !!"); ';

    echo '</script>';
	
	header("Refresh: .1; URL=$url");
}
else{

//$url = "idocmedi.php?pmrn=$pmrn&eid=$eid";
$query="insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$orderby','$odate','Active','$root','Rupdated','Ordered','$ortime')";

$result = mysqli_query($con,$query) or die ( mysqli_error());

echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}
?>