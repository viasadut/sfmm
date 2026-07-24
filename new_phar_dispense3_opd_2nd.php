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
$uuprice = mysqli_real_escape_string($connect, $_POST["uuprice"]);	
$sno = mysqli_real_escape_string($connect, $_POST["sno"]);	
//$ins = mysqli_real_escape_string($connect, $_POST["ins"]);	
$sale_no = mysqli_real_escape_string($connect, $_POST["sale_no"]);	

$tprice=$uuprice*$sqty;

$nqty=$tqty-$sqty;
	 
	//$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 
	 
	$date=date('Y-m-d') ;
	
	
	$t_g_qty=$gqty+$sqty;
	
	
	$queryp = mysqli_query($con, "SELECT * FROM pmedi WHERE id='$id'");

	$rowp = mysqli_fetch_array($queryp);
	$pmrn = $rowp["pmrn"];
	$pname = $rowp["pname"];
	$eid = $rowp["eid"];
	$ins = $rowp["pdos"].','.$rowp["frelation"].','.$rowp["duration"];
	
	$chk=mysqli_query($con,"SELECT * FROM phar_sale WHERE `sno`='$sale_no' and code='$code2'");
	$chk_row=mysqli_fetch_assoc($chk);
	$mqty=$chk_row['qty'];
	$r_id=$chk_row['id'];
	$fqty=$mqty+$sqty;
	$charge_f=$fqty*$uuprice;
	
	

if($code2==$add2 and $tqty>=$t_g_qty and $mqty==''){

$query="update pmedi set status='Served',`qty`='$t_g_qty' where id='$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());
if(mysqli_affected_rows($con)==true)

{			
			
			$ins_query3="update medi_stock set `add_qty`='$nqty' where sno='$rfid' and location='2nd Fl Pharmacy'";
mysqli_query($con,$ins_query3) or die(mysql_error());

 


if(mysqli_affected_rows($con)==true)
{


/*$strSQL3 = "insert into medi_stock2 (`code`,`location`,`g_name`,`b_name`,`given_qty`,`req_qty`,`exdate`,`batch_no`,`sno`)
values('$code2','$rloc','$g_name','$b_name','$sqty','$reqty','$exdate','$batch_no','$lrfid')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
//			$objQuery3 = mysqli_query($objConnect,$strSQL3);


*/


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`pname`,`pmrn`,`eid`,`rfid`,`location`,`code`) values
('$g_name','$sqty','$uuprice','$tprice','$user','$date','$sale_no','$b_name','$ins','$pname','$pmrn','$eid','$rfid','OPD-2nd','$code2')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
}


}




 }
 
 
 else if($code2==$add2 and $tqty>=$t_g_qty and $mqty!=''){

$query="update pmedi set status='Served',`qty`='$t_g_qty' where id='$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());

if(mysqli_affected_rows($con)==true)
{			
			
			$ins_query3="update medi_stock set `add_qty`='$nqty' where sno='$rfid' and location='2nd Fl Pharmacy'";
mysqli_query($con,$ins_query3) or die(mysql_error());

 

if(mysqli_affected_rows($con)==true)

{


/*$strSQL3 = "insert into medi_stock2 (`code`,`location`,`g_name`,`b_name`,`given_qty`,`req_qty`,`exdate`,`batch_no`,`sno`)
values('$code2','$rloc','$g_name','$b_name','$sqty','$reqty','$exdate','$batch_no','$lrfid')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
//			$objQuery3 = mysqli_query($objConnect,$strSQL3);


*/

		
			
			
			$strSQL2 = "update phar_sale set `qty`='$fqty',`tprice`='$charge_f',`aby`='$user',`adate`='$date',`brand`='$b_name',`ins`='$ins' where id='$r_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
}

}





 }



 
 }
 ?>
 