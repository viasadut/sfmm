<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
    header('Location: login2?err=2');
    }
	require('db1.php');

$user=$_SESSION["sess_username"];
$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$odate=date('m/d/Y',strtotime("+1 days"));	
$ndate=date('Y-m-d',strtotime("+1 days"));	
$time= date('Y-m-d H:i:s');
$mtime=date('H:i:s');



$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
//$dname=$row139['fullname'];

?>

  <?php  
  
  $user1='root';
$pass='Godiloveu16';
$db= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
     /* $pmrn = mysqli_real_escape_string($connect, $_POST["name1"]);  
      $infu = mysqli_real_escape_string($connect, $_POST["address1"]);  
      $instruc = mysqli_real_escape_string($connect, $_POST["ins1"]);  
	  $root = mysqli_real_escape_string($connect, $_POST["route1"]);  
	 // $dilu = mysqli_real_escape_string($connect, $_POST["result1"]);
	 $eid = mysqli_real_escape_string($connect, $_POST["dname1"]);	  
	 $time = mysqli_real_escape_string($connect, $_POST["time1"]);	
	 */
	 $dilu = mysqli_real_escape_string($connect, $_POST["dilu"]);	
	 
$alert = mysqli_real_escape_string($connect, $_POST["alert1"]);	
$uprice = mysqli_real_escape_string($connect, $_POST["uprice1"]);		 
$id = mysqli_real_escape_string($connect, $_POST["employee_id3"]);		 
$location5 = mysqli_real_escape_string($connect, $_POST["location5"]);		 
	 

	 
$sel96="SELECT * FROM medi_stock WHERE `sno`='$dilu' and add_qty>0 order by id asc limit 1;";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-1;
	 
$tfid=$b_chk_m['rfid'];
//$loc=$b_chk_m['location'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
$u_price=$b_chk_m['u_price'];
$adate= date('Y-m-d');
$code=$b_chk_m['code'];	 
$mid=$b_chk_m['id'];	 
$ddate = date('d/m/Y H:i:s');

$sel="SELECT * FROM otendomedi WHERE `id`='$id';";
$result = mysqli_query($con,$sel);
$info=mysqli_fetch_assoc($result);
$pmrn=$info['pmrn'];
$pname=$info['pname'];
$route=$info['root'];
$ins=$info['instruc'];
$ucode=$info['code'];
$eid=$info['eid'];
$dname=$info['dname'];


if($ucode==$code and $mm_qty>0)
{
	
    $ins_query="UPDATE otendomedi SET status1='given',donet='$ddate',udone='$user' WHERE id='$id' and status1!='given'";
    mysqli_query($con,$ins_query) or die(mysql_error());
    if(mysqli_affected_rows($con)){

try {
    $db->beginTransaction();

	
	$impl='implemented';
    $qqt='1';
	$sale='Sale';
 //   $sh = $db->prepare("UPDATE imedi3 SET donet=?,udone=?,status1=? WHERE id=? and status1 !=?");
   // $sh->execute([$ddate, $user, $impl, $id, $impl]);
	
	$sh = $db->prepare("UPDATE medi_stock SET add_qty=? WHERE id=?");
    $sh->execute([$m_qty1, $mid]);

	//$sh = $db->prepare("insert into phar_sale (medi,qty,uprice,tprice,aby,adate,brand,pmrn,eid,rfid,status,location,code,iidd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    //$sh->execute([$g_name, $qqt, $u_price, $u_price, $user, $adate, $bb_name, $pmrn, $eid, $dilu, $sale, $loc, $code, $id]);



	$sh = $db->prepare("insert into othoscharge1 (dname,pmrn,pname,medi,brand,eid,date,pdos,rfid,code,ndate,route,remarks,location,aqty,ins,time,mtime,nuser) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$dname,$pmrn, $pname, $g_name, $bb_name, $eid, $date1, $qqt, $dilu, $code, $date2, $route, $ins,$location5, $m_qty1, $u_price, $time,$mtime,$user]);



	/*$ins_query1="insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`eid`,`date`,`pdos`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`aqty`,`ins`,`time`,`mtime`,`nuser`) values 
('$pmrn','$pname','$infusion','$id','$odate','1','$code',)";
mysqli_query($con,$ins_query1) or die(mysql_error());
*/

    $db->commit();
	//$url = "historynewview?pmrn=$pm&eid=$count1&date=$pdate&dname=$pd" ;
//header("Location:$url");


/*echo '<script language="javascript">';
    echo 'alert("Medicine updated Added  !!"); ';
    echo '</script>';*/
$url = "imedi1_new.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");

	
} catch ( Exception $e ) {
    $db->rollBack();
}	
	
	

}

}
else if($infu==$g_name and $mm_qty>0)
{
	
	
    $ins_query="UPDATE otendomedi SET status1='given',donet='$ddate',udone='$user' WHERE id='$id' and status1!='given'";
    mysqli_query($con,$ins_query) or die(mysql_error());
    if(mysqli_affected_rows($con)){


try {
    $db->beginTransaction();

	
	$impl='implemented';
    $qqt='1';
	$sale='Sale';
 //   $sh = $db->prepare("UPDATE imedi3 SET donet=?,udone=?,status1=? WHERE id=? and status1 !=?");
   // $sh->execute([$ddate, $user, $impl, $id, $impl]);
	
	$sh = $db->prepare("UPDATE medi_stock SET add_qty=? WHERE id=?");
    $sh->execute([$m_qty1, $mid]);

	$sh = $db->prepare("insert into othoscharge1 (dname,pmrn,pname,medi,brand,eid,date,pdos,rfid,code,ndate,route,remarks,location,aqty,ins,time,mtime,nuser) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$dname,$pmrn, $pname, $g_name, $bb_name, $eid, $date1, $qqt, $dilu, $code, $date2, $route, $ins,$location5, $m_qty1, $u_price, $time,$mtime,$user]);

    $db->commit();
	
$url = "imedi1_new.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");

	
} catch ( Exception $e ) {
    $db->rollBack();
}
		
	
	
	
}
}
}
 ?>
 