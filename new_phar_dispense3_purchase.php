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
$pmrn = mysqli_real_escape_string($connect, $_POST["prfid"]);	
$rfid4 = mysqli_real_escape_string($connect, $_POST["rfid"]);	

$nqty=$tqty-$sqty;
	 
	//$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 
	 
	$date=date('Y-m-d') ;
	
	
	$t_g_qty=$gqty+$sqty;

//if($code2==$add2 and $t_g_qty==$reqty and $tqty>=$t_g_qty){
	if($code2==$add2 and $t_g_qty==$reqty and $tqty>=$sqty){

$query="update purchase_stock3 set status='Served',`add_qty`='$t_g_qty',`given_qty`='$t_g_qty',`batch_no`='$batch_no',`exdate`='$exdate', given_date='$date' where id='$id'";

//$result = mysqli_query($con,$query) or die ( mysqli_error());


if(mysqli_query($con,$query)==true){			
			
			$ins_query3="update purchase_stock3 set `add_qty`='$nqty' where rfid='$rfid' and location='Store'";
			//$ins_query3="update purchase_stock set `add_qty`='$nqty' where code='$rfid' and location='Store'";
mysqli_query($con,$ins_query3) or die(mysql_error());


$strSQL3 = "insert into purchase_stock2 (`code`,`location`,`g_name`,`b_name`,`given_qty`,`req_qty`,`exdate`,`batch_no`,`sno`,`rfid`,`add_date`)
values('$code2','$rloc','$g_name','$b_name','$sqty','$reqty','$exdate','$batch_no','$lrfid','$rfid4','$date')";
mysqli_query($con,$strSQL3) or die(mysql_error());

		
	$strSQL2 = "insert into purchase_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`) values
			('$g_name','$sqty','','','$user','$date','$lrfid','$b_name','','$rloc','$code2')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
			
}

header("Location:new_purchase_dispense1?rfid=$rfid4&req_loc=$rloc");
 }


//else if($code2==$add2 and $t_g_qty<$reqty and $tqty>=$t_g_qty){

	else if($code2==$add2 and $t_g_qty<$reqty and $tqty>=$sqty){
$query="update purchase_stock3 set status='Partially Served',`add_qty`='$t_g_qty',`given_qty`='$t_g_qty',`batch_no`='$batch_no',`exdate`='$exdate', given_date='$date' where id='$id'";

//$result = mysqli_query($con,$query) or die ( mysqli_error());


if(mysqli_query($con,$query)==true){			
			
			$ins_query3="update purchase_stock3 set `add_qty`='$nqty' where rfid='$rfid' and location='Store'";
mysqli_query($con,$ins_query3) or die(mysql_error());

 
$strSQL3 = "insert into purchase_stock2 (`code`,`location`,`g_name`,`b_name`,`given_qty`,`req_qty`,`exdate`,`batch_no`,`sno`,`rfid`,`add_date`)
values('$code2','$rloc','$g_name','$b_name','$sqty','$reqty','$exdate','$batch_no','$lrfid','$rfid4','$date')";
			
mysqli_query($con,$strSQL3);


	$strSQL2 = "insert into purchase_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`) values
			('$g_name','$sqty','','','$user','$date','$lrfid','$b_name','','$rloc','$code2')";
			
			$objQuery2 = mysqli_query($con,$strSQL2);
			
}

header("Location:new_purchase_dispense1?rfid=$rfid4&req_loc=$rloc");
 }

 
 }
 ?>
 