<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="emergency"){
    header('Location: login2?err=2');
    }
	require('db1.php');

$user=$_SESSION["sess_username"];
$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$odate=date('m/d/Y',strtotime("+1 days"));	
$ndate=date('Y-m-d',strtotime("+1 days"));	





$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $pmrn = mysqli_real_escape_string($connect, $_POST["name1"]);  
      $infu = mysqli_real_escape_string($connect, $_POST["address1"]);  
      $instruc = mysqli_real_escape_string($connect, $_POST["ins1"]);  
	  $root = mysqli_real_escape_string($connect, $_POST["route1"]);  
	  //$dilu = mysqli_real_escape_string($connect, $_POST["result1"]);
	 $eid = mysqli_real_escape_string($connect, $_POST["dname1"]);	  
	 $time = mysqli_real_escape_string($connect, $_POST["time1"]);	
	 
	 $dilu = mysqli_real_escape_string($connect, $_POST["dilu"]);	
	 
$alert = mysqli_real_escape_string($connect, $_POST["alert1"]);	
$uprice = mysqli_real_escape_string($connect, $_POST["uprice1"]);		 
$id = mysqli_real_escape_string($connect, $_POST["employee_id2"]);		 
	 

	 
	 $sel96="SELECT * FROM medi_stock WHERE `sno`='$dilu';";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-1;
	 
$tfid=$b_chk_m['rfid'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
$u_price=$b_chk_m['u_price'];
$adate= date('Y-m-d');
$code=$b_chk_m['code'];	 
	 
$ddate = date('d/m/Y H:i:s');
if($uprice==$code and $mm_qty>0)
{

$update="update einfusion set ddate='$ddate',status='Rupdated', duser='$user' where `id`='$id'";
//$update="update imedi2 set donet='$ddate',status1='Rupdated', udone='$user',status1='implemented' where `id`='$id'";
mysqli_query($con,$update) or die(mysql_error());



//$message= "this is a message";

//$query="update imedi2 set `instruc`='$instruc',`root`='$root',`dilu`='$dilu',`editby`='$user',`edittime`='$dtime' where `pmrn`='$pmrn' and `eid`='$eid' and infusion='$infu' and status1!='SEEN'";

//$result = mysqli_query($con,$query) or die ( mysqli_error());



$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$dilu'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`,`iidd`) values
			('$g_name','1','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$eid','$dilu','Sale','AE STOCK','$code','$id')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);


//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine updated Added  !!"); ';
    echo '</script>';
$url = "einpatient_new.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");

}

 else {
	 
	 echo '<script language="javascript">';
    echo 'alert("NOT SUCCESSFUL  !!"); ';
    echo '</script>';
 }
	 
}
 ?>
 