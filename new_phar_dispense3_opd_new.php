<?php 
    session_start();
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
      $address = mysqli_real_escape_string($connect, $_POST["address"]);
	  $rfid = mysqli_real_escape_string($connect, $_POST["code"]);  
      $g_name = mysqli_real_escape_string($connect, $_POST["g_name"]);  
      $b_name = mysqli_real_escape_string($connect, $_POST["b_name"]);  
	  $exdate = mysqli_real_escape_string($connect, $_POST["location"]);  
	  $reqty = mysqli_real_escape_string($connect, $_POST["result5"]);
	 $gqty = mysqli_real_escape_string($connect, $_POST["gqty"]);	  
	 $tqty = mysqli_real_escape_string($connect, $_POST["tqty"]);	
	 $code2 = mysqli_real_escape_string($connect, $_POST["code2"]);	
	 $add2 = mysqli_real_escape_string($connect, $_POST["add2"]);	
$sqty = mysqli_real_escape_string($connect, $_POST["sqty"]);	
$batch_no = mysqli_real_escape_string($connect, $_POST["u_price"]);		 
$id = mysqli_real_escape_string($connect, $_POST["id"]);	
$rloc = mysqli_real_escape_string($connect, $_POST["rloc"]);	
$lrfid = mysqli_real_escape_string($connect, $_POST["lrfid"]);	
$p_rfid = mysqli_real_escape_string($connect, $_POST["prfid"]);	
$uuprice = mysqli_real_escape_string($connect, $_POST["uuprice"]);	
$sno = mysqli_real_escape_string($connect, $_POST["sno"]);	
$ins = mysqli_real_escape_string($connect, $_POST["ins"]);	


$tprice=$uuprice*$sqty;

$nqty=$tqty-$sqty;
	 
	//$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 
	 
	$date=date('Y-m-d') ;
	
	
	$t_g_qty=$uuprice+$sqty;
	
	
	$queryp = mysqli_query($con, "SELECT * FROM phar_sale WHERE id='$id'");

	$rowp = mysqli_fetch_array($queryp);
	$pmrn = $rowp["pmrn"];
	$pname = $rowp["pname"];
	$eid = $rowp["eid"];
	$r_qty = $rowp["qty"];
	$billno = $rowp["billno"];
	$balance=$r_qty-$uuprice;
	
	/*$chk=mysqli_query($con,"SELECT * FROM phar_sale WHERE `sno`='$sno' and medi='$g_name'");
	$chk_row=mysqli_fetch_assoc($chk);
	$mqty=$chk_row['qty'];
	$r_id=$chk_row['id'];
	$fqty=$mqty+$sqty;
	$charge_f=$fqty*$uuprice;
	*/
	

	$querym = mysqli_query($con, "SELECT * FROM medi_stock WHERE rfid='$p_rfid'");

	$rowm = mysqli_fetch_array($querym);
	
	$medi_id=$rowm['id'];
	
if($code2==$add2 and $r_qty>=$t_g_qty and $tqty>=$sqty){

$query="update phar_sale set `status_opd`='Served', req_qty='$t_g_qty' where id='$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());

$query2="update medi_stock set `add_qty`='$nqty' where rfid='$p_rfid'";

$result2 = mysqli_query($con,$query2) or die ( mysqli_error());



$strSQL3 = "insert into medi_stock2 (`code`,`location`,`g_name`,`b_name`,`given_qty`,`r_qty`,`exdate`,`batch_no`,`sno`,`medi_id`,`phar_id`,`billno`)
values('$code2','$rloc','$g_name','$b_name','$sqty','$reqty','$exdate','$batch_no','$lrfid','$medi_id','$id','$billno')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery3 = mysqli_query($con,$strSQL3);






 
 }
 }
 ?>
 