
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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
$orderby=$_REQUEST['orderby'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$instruc=$_REQUEST['instruc'];
$pmrn=$_REQUEST['pmrn'];
$time=$_REQUEST['time'];
$infu=$_REQUEST['infusion'];
$dilu=$_REQUEST['dilu'];
//$pdos=$_REQUEST['test'];
$odate=date('m/d/Y',strtotime("+1 days"));
$root=$_REQUEST['root'];
$alert=$_REQUEST['alert'];
  $ortime = date('d/m/Y H:i:s');
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid";

$sel90="SELECT * FROM imedi2 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate' and `time`='$time' and `status`='Active';";
$result90 = mysqli_query($con,$sel90);

$sel95 = "SELECT * from medicine where mname='$infu' and pre in('Tablet','Vaginal Suppository','VT','Suppository','Soft Capsule','Sachet','Capsule','Injection')"; 
$result95 = mysqli_query($con,$sel95);


if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Tommorows Order  !!"); ';

    echo '</script>';
	
	header("Refresh: .1; URL=$url");
}


else if($row95=mysqli_num_rows($result95)>0)

	
	
	{




//$message= "this is a message";

$query="insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$user','$odate','Active','$root','Rupdated','Ordered','$ortime','$dilu')";

$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");
}

else {




//$message= "this is a message";

$query="insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`reuse`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$user','$odate','Active','$root','Rupdated','Ordered','$ortime','$dilu','Reuse')";

$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");
}
?>

