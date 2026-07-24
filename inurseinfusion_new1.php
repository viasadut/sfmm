<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');




session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="emergency"){
      header('Location: login2?err=2');
    }



$user=$_SESSION["sess_username"];
$id =$_REQUEST["id"];
//$pname = $data59['pname'];
$pmrn = $_REQUEST['pmrn'];
$eid = $_REQUEST['eid'];
$rf = $_REQUEST['rf'];
$mcode = $_REQUEST['mcode'];
//$padd = $data59['padd'];
//$adm = $data59['adate'];
//$pphone=$data59['pphone'];
//$page=$data59['age'];
//$psex=$data59['gender'];
//$odate = $_REQUEST['odate'];
//$otime = $_REQUEST['otime'];
//$infu = $_REQUEST['infu'];
$ddate = date('d/m/Y H:i:s');
//$dtime = $_REQUEST['dtime'];




$url = "einpatient_new.php?pmrn=$pmrn&eid=$eid";




//$dtime = $_REQUEST['dtime'];
$adate= date('Y-m-d');

$sel96="SELECT * FROM medi_stock WHERE `code`='$mcode' and add_qty!='0';";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-1;
$tfid=$b_chk_m['rfid'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
$u_price=$b_chk_m['u_price'];


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`) values
			('$g_name','1','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$eid','$rf','Sale','AE','$mcode')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);







$update="update einfusion set ddate='$ddate',status='Rupdated', duser='$user' where `id`='$id'";
mysqli_query($con,$update) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("Infusion Successfully Implemented  !!"); ';
    echo '</script>';
header("Location: $url"); 
?>