<?php
    require('db1.php');
	require('db1.php');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$user=$_SESSION["sess_username"];
$req_loc=$_REQUEST['req_loc'];
$sno=$_REQUEST['rfid'];
$stime = date('d/m/Y H:i:s');
//$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];

//include("auth.php");
$add_time=date('Y-m-d h:i:s');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class='container'>
<form name="frmMain1" action="" method="post" > 
        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><h1 style="color:red"><strong>Bill No - <?php echo $sno;?></strong></h1></label></td> </tr>
<tr><td colspan="7" align="center"><label><strong>S/No- <?php echo $sid;?></strong></label></td> 
<td colspan="10" align="center"><label><strong>User- <?php echo $user ;?></strong></label></td> 
<td colspan="7" align="center"><label><strong>Date & Time:<?php echo $stime ;?> </strong></label></td> 



</tr>



<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="8" align="center"><strong>Medicine Name</strong></td>
	  <td colspan="7" align="center"><strong>Code</strong></td>
     	  <td colspan="1" align="center"style="font-weight: bold;font-size:22px;color:red"><strong>Stock In Hand</strong></td>
		  <td colspan="1" align="center"><strong>Request_QTY</strong></td>
		  <td colspan="1" align="center"><strong>Available_QTY</strong></td>
      	  <td colspan="1" align="center"><strong>Issue_Qty</strong></td>
		  
		  <td colspan="1" align="center"><input type='checkbox' id='checkAll' ></td>
		
       

	   </tr>
	   
	   
	    <?php 
                    $query = "select * from medi_stock where rfid='$sno' and req_loc='$req_loc' and status='Pending'";
                    $result = mysqli_query($con,$query);
					$count=1;
                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                        $medi = $row['g_name'];
						echo $pdos = $row['add_qty'];
						$duration = $row['duration'];
						$frelation = $row['frelation'];
						$ccode = $row['code'];
                       $id3=$id.','.$ccode;
$query1 = "select * from medicine where code='$ccode' and status='Active'";
                    $result1 = mysqli_query($con,$query1);
					   $row1 = mysqli_fetch_array($result1);
                     
$mcode = $row['code'];
	  $sum = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='Pharmacy'" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$new_qty=$sumr['SUM(add_qty)'];		

$sum5 = "SELECT * FROM medi_stock where code='$mcode' and location='Pharmacy' and add_qty>'$pdos' order by exdate asc limit 1" ;
	 
$sum15 = mysqli_query($con, $sum5) or die(mysqli_error());
$sum25 = mysqli_fetch_assoc($sum15);
$new_qty5=$sum25['add_qty'];	


$sum6 = "SELECT * FROM medi_stock where code='$mcode' and location='Pharmacy' and add_qty>0 order by exdate asc limit 1" ;
	 
$sum16 = mysqli_query($con, $sum6) or die(mysqli_error());
$sum26 = mysqli_fetch_assoc($sum16);
$new_qty6=$sum26['add_qty'];	



$sum_r = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='$req_loc' and add_qty>0 and status='Served'" ;
	 
$sum1_r = mysqli_query($con, $sum_r) or die(mysqli_error());
$sumr_r = mysqli_fetch_assoc($sum1_r);
$new_qty_r=$sumr_r['SUM(add_qty)'];					 
                    ?>
	   
   
     <td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $count; ?></td>


                            
                  
                  
	 
      <td align="center"colspan="8" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["g_name"]; ?></td>
	  
	  <td align="center"colspan="7" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["code"].'<br>'.$row["frelation"].'<br>'.$row["duration"]; ?></td>
	        
<td align="center"colspan="1"style="font-weight: bold;font-size:22px;color:red"><?php echo $new_qty_r;?></td>

			<td align="center"colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["add_qty"]; ?></td>
			
		
<td align="center"colspan="1"><input name="eqty2_<?= $id ?>" type="number" value="<?php if($new_qty5>$pdos){echo $new_qty5;} else {echo $new_qty6;};?>" id="eqty2" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?> ></td>
		


<td align="center"colspan="1">


<input name="eqty1_<?= $id ?>" type="number" value="<?php echo $row["add_qty"]; ?>" max="<?php if($new_qty5>$pdos) {echo $new_qty5;} else {echo $new_qty6;} ?>" id="eqty1" required  <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>></td>


							  
                            
	  
      </tr>



	  
    <?php $count++; } ?>
	
	
	<tr>
	<td colspan="10"align="right"><a target='_blank' href="phar_receipt?sno=<?php echo $sno;?>"><img src="phar_pic/print.png" title="Print Receipt" width="100" height="80" /></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="department_bar_transfer?sno=<?php echo $sno;?>"><img src="phar_pic/barcode.png" title="Print Instruction" width="100" height="80" /></a>


</td>

	
	
	
	
	 </table>
            </form>
        </div>


</body>
</html>
