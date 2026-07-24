<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf','rad','doctor','moopd','ddf1','staff','histo','doctor','nurse','imo','mofficer','physio','outdoc','techbio','endo','oic','gpopd','mrd')"; 
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
$id=$_REQUEST['id'];
$pmrn =$_REQUEST['pmrn'];

//$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
$ortime = date('d/m/Y H:i:s');
$cdate=date('Y-m-d');



$query="update presnew set fav='0' where id='$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());





//header("Location: $url?message=" . $message . ");

	/*echo '<script language="javascript">';
    echo 'alert("Successfully Added   !!"); ';
    echo '</script>';*/
$url = "own_fav_case";

header("Refresh: .1; URL=$url");
?>

