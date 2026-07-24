<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call','bill')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$id =$_REQUEST["id"];
$rd1=$_REQUEST["rd1"];
//$pname = $data59['pname'];
//$pmrn = $_REQUEST['pmrn'];
//$eid = $_REQUEST['eid'];
//$padd = $data59['padd'];
//$adm = $data59['adate'];
//$pphone=$data59['pphone'];
//$page=$data59['age'];
//$psex=$data59['gender'];
//$odate = $_REQUEST['odate'];
//$otime = $_REQUEST['otime'];
//$infu = $_REQUEST['infu'];
$btime = date('d/m/Y H:i:s');
//$dtime = $_REQUEST['dtime'];

$url = "allsamplelistcovid?dt=$rd1" ;

$update="update covidopd set bstatus='Paid',udone='$user',btime='$btime' where `id`='$id'";
mysqli_query($con,$update) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("Successfully Updated  !!"); ';
    echo '</script>';
header("Location: $url"); 
?>