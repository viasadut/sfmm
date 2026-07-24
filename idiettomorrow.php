<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$orderby=$_REQUEST['orderby'];
//$user=$_REQUEST['user'];
$eid=$_REQUEST['eid'];
$instruc=$_REQUEST['instruc'];
$pmrn=$_REQUEST['pmrn'];
//$time=$_REQUEST['time'];
$infu=$_REQUEST['infusion'];
//$pdos=$_REQUEST['test'];
$odate=date('m/d/Y',strtotime("+1 days"));
$rtime=$_REQUEST['rtime'];
//$alert=$_REQUEST['alert'];
$ortime = date('d/m/Y H:i:s');
$url = "imoidocdiet.php?pmrn=$pmrn&eid=$eid";

$sel90="SELECT * FROM iidiet WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate' and `rtime`='$rtime';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Tommorows Order  !!"); ';

    echo '</script>';
	
	header("Refresh: .1; URL=$url");
}
else{




//$message= "this is a message";

$ins_query="insert into iidiet (`pmrn`,`eid`,`odate`,`infusion`,`dtime`,`user`,`status`,`rtime`,`ordate`) 
values( '$pmrn','$eid','$odate','$infu','$instruc','$orderby','Data Updated','$rtime','$ortime')";
mysqli_query($con,$ins_query) or die(mysql_error());


//$query="insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`) values 
//('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$orderby','$odate','Active','$root','Rupdated','Ordered','$ortime')";

//$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';
$url = "imoidocstret.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");
}
?>

