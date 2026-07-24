<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$rfid=$_REQUEST['rfid'];
$pdos=$_REQUEST['pdos'];
$reuse=$_REQUEST['reuse'];
//$id1=$_REQUEST['ID'];

$adate=date('Y-m-d');
$sel96="SELECT * FROM medi_stock WHERE `sno`='$rfid';";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']+$pdos;
$url = "cath_medi_use.php?pmrn=$pmrn&eid=$eid&dname=$dname&id=$id";	 

	if($reuse=='') 
	{ 
$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$rfid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query13="update phar_sale set `status`='Cancel' where `rfid`='$rfid' and pmrn='$pmrn' and eid='$eid' and adate='$adate'";

$result13 = mysqli_query($con,$query13) or die ( mysqli_error());




$query = "DELETE FROM cathmediused WHERE id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 

	}
	
		else if($reuse!='') 
	{ 

$query = "DELETE FROM cathmediused WHERE id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: $url"); 


$query13="update phar_sale set `status`='Cancel' where `rfid`='$rfid' and pmrn='$pmrn' and eid='$eid' and adate='$adate'";

$result13 = mysqli_query($con,$query13) or die ( mysqli_error());

	}
?>