<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php 
include "con_db.php";
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
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


<?php

if(isset($_POST['but_update'])){


if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}


            else {
                foreach($_POST['update'] as $updateid){
					
$eqty2 = $_POST['eqty1_'.$updateid];			
$eqty2_1 = $_POST['eqty1_'.$updateid]+$add_qty;
$eqty5 = $_POST['eqty2_'.$updateid];
$eqty26 = $_POST['eqty25_'.$updateid];
$eqty25 = $_POST['eqty26_'.$updateid];
$eqty27 = $_POST['eqty27_'.$updateid];
$p_price = $_POST['price_'.$updateid];
	



	//echo date('i').''.rand();
			$runningTime = date('dsiY')+$updateid;
			$bar_code = date('iYds');
			$add_by=date('Y-m-d h:i:s');
			$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			$qq = mysqli_query($db,"select * from medi_stock where id='".$updateid."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi_1 = $dd["g_name"];
			$code_1 = $dd["code"];
			$add_qty = $dd["add_qty"];
			$add_qty_new = $dd["add_qty"]+$eqty2;
			$req_qty5 = $dd["req_qty"];
			$ss_no = $dd["sno"];
			
			
			$qq1 = mysqli_query($db,"select * from medi_stock where id='".$updateid."'");
			$dd1 = mysqli_fetch_assoc($qq1);
			
			
$u_qty=$lqty-$eqty2;
$u_price=$eqty2*$p_price;

			$ortime = date('d/m/Y H:i:s');
			$adate = date('Y-m-d');
			
			
			$qq1 = mysqli_query($db,"select * from medi_stock where id='".$eqty26."'");
			$dd1 = mysqli_fetch_assoc($qq1);
			$nqty4=$dd1['add_qty']-$eqty2;
			
			


	if($add_qty_new<=$req_qty5 and $eqty5 >= $eqty2 and $eqty2==$req_qty5 and $eqty2>0)
	{
			
$ins_query3="update medi_stock set `add_qty`='$nqty4' where id='$eqty26' and location='Pharmacy'";
//mysqli_query($con,$ins_query3) or die(mysql_error());

if(mysqli_query($con,$ins_query3)==true){

$strSQL1 = "update medi_stock set status='Served',add_qty='$eqty2',given_qty='$eqty2',exdate='$eqty25',u_price='$p_price',t_price='$u_price',batch_no='$eqty27',add_by='$user',add_time='$add_time' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
		

$strSQL3 = "insert into medi_stock2 (`code`,`location`,`g_name`,`b_name`,`given_qty`,`req_qty`,`exdate`,`batch_no`,`sno`)
values('$code_1','$req_loc','$medi_1','$brand','$eqty2','$req_qty5','$eqty25','$eqty27','$ss_no')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery3 = mysqli_query($objConnect,$strSQL3);
				
		
		
	$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','$req_loc','$code_1','$p_mrn','$p_name')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);

}
	}	
	
	
	else if($add_qty_new<=$req_qty5 and $eqty5 >= $eqty2 and $req_qty5!=$add_qty_new and $eqty2>0)
	{
			
$ins_query3="update medi_stock set `add_qty`='$nqty4' where id='$eqty26' and location='Pharmacy'";
//mysqli_query($con,$ins_query3) or die(mysql_error());
if(mysqli_query($con,$ins_query3)==true){


$strSQL1 = "update medi_stock set status='Partially Served',add_qty='$add_qty_new',given_qty='$add_qty_new',exdate='$eqty25',u_price='$p_price',t_price='$u_price',batch_no='$eqty27',add_by='$user',add_time='$add_time' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
		

$strSQL3 = "insert into medi_stock2 (`code`,`location`,`g_name`,`b_name`,`given_qty`,`req_qty`,`exdate`,`batch_no`,`sno`)
values('$code_1','$req_loc','$medi_1','$brand','$eqty2','$req_qty5','$eqty25','$eqty27','$ss_no')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery3 = mysqli_query($objConnect,$strSQL3);
				
		
		
	$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','$req_loc','$code_1','$p_mrn','$p_name')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);
}
	
	}	
	
	
	else if($add_qty_new<=$req_qty5 and $eqty5 >= $eqty2 and $req_qty5==$add_qty_new and $eqty2>0)
	{
			
$ins_query3="update medi_stock set `add_qty`='$nqty4' where id='$eqty26' and location='Pharmacy'";
//mysqli_query($con,$ins_query3) or die(mysql_error());

if(mysqli_query($con,$ins_query3)==true){

$strSQL1 = "update medi_stock set status='Served',add_qty='$add_qty_new',given_qty='$add_qty_new',exdate='$eqty25',u_price='$p_price',t_price='$u_price',batch_no='$eqty27',add_by='$user',add_time='$add_time' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
		

$strSQL3 = "insert into medi_stock2 (`code`,`location`,`g_name`,`b_name`,`given_qty`,`req_qty`,`exdate`,`batch_no`,`sno`)
values('$code_1','$req_loc','$medi_1','$brand','$eqty2','$req_qty5','$eqty25','$eqty27','$ss_no')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery3 = mysqli_query($objConnect,$strSQL3);
				
		
		
	$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','$req_loc','$code_1','$p_mrn','$p_name')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);

}
	}	
		
	
	


		}
}
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Medicine</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}



fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 1300px;
  }

}


      </style>

    <script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Investigation</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>



  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>




</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='phar_transfer_out_test'><span>Back</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

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
     
      <td colspan="7" align="center"><strong>Medicine Name</strong></td>
	  <td colspan="1" align="center"><strong>Code</strong></td>
     	  <td colspan="1" align="center"style="font-weight: bold;font-size:12px;color:red"><strong>Stock In Hand</strong></td>
		  <td colspan="1" align="center"><strong>Available_QTY</strong></td>
		  <td colspan="1" align="center"><strong>Request_QTY</strong></td>
		  <td colspan="1" align="center"><strong>Batch Qty</strong></td>
		  <td colspan="2" align="center"><strong>Batch NO</strong></td>
		  <td colspan="2" align="center"><strong>Expiry Date</strong></td>
      	  <td colspan="1" align="center"><strong>Issue_Qty</strong></td>
		  
		  
		  <td colspan="1" align="center"><input type='checkbox' id='checkAll' ></td>
		
       

	   </tr>
	   
	   
	    <?php 
                    $query = "select * from medi_stock where rfid='$sno' and req_loc='$req_loc' and status in('Pending','Partially Served','Served')";
                    $result = mysqli_query($con,$query);
					$count=1;
                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                        $medi = $row['g_name'];
						$pdos = $row['pdos'];
						$pno = $row['sno'];
						$duration = $row['duration'];
						$frelation = $row['frelation'];
						$ccode = $row['code'];
						$rr_qty = $row['req_qty'];
						$aa_qty = $row['add_qty'];
                       $rr_qty1 = $row['req_qty']-$row['add_qty'];;
$query1 = "select * from medicine where code='$ccode' and status='Active'";
                    $result1 = mysqli_query($con,$query1);
					   $row1 = mysqli_fetch_array($result1);
                     
$mcode = $row['code'];
	  $sum = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='Pharmacy'" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$new_qty=$sumr['SUM(add_qty)'];	
		

$sum5 = "SELECT * FROM medi_stock where code='$mcode' and location='Pharmacy' and add_qty>='$rr_qty' order by exdate asc limit 1" ;
	 
$sum15 = mysqli_query($con, $sum5) or die(mysqli_error());
$sum25 = mysqli_fetch_assoc($sum15);
$new_qty5=$sum25['add_qty'];
$new_qty55=$sum25['exdate'];	
$new_qty555=$sum25['id'];	
$new_batch1=$sum25['batch_no'];


$sum6 = "SELECT * FROM medi_stock where code='$mcode' and location='Pharmacy' and add_qty>0 order by exdate asc limit 1" ;
	 
$sum16 = mysqli_query($con, $sum6) or die(mysqli_error());
$sum26 = mysqli_fetch_assoc($sum16);
$new_qty6=$sum26['add_qty'];	
$new_qty66=$sum26['exdate'];
$new_qty666=$sum26['id'];
$new_batch=$sum26['batch_no'];


$sum_r = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='$req_loc' and add_qty>0 and status='Served'" ;
	 
$sum1_r = mysqli_query($con, $sum_r) or die(mysqli_error());
$sumr_r = mysqli_fetch_assoc($sum1_r);
$new_qty_r=$sumr_r['SUM(add_qty)'];					 
                    ?>
	   
   
     <td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?>><?php echo $count; ?></td>


                            
                  
                  
	 
      <td align="center"colspan="7" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?>><?php echo $row["g_name"]; ?></td>
	  
	  <td align="center"colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?>><?php echo $row["code"].'<br>'.$row["frelation"].'<br>'.$row["duration"]; ?></td>
	        
<td align="center"colspan="1"style="font-weight: bold;font-size:12px;color:red"><?php echo $new_qty_r;?></td>

<td align="center"colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?>><?php echo $new_qty; ?></td>
			
			<td align="center"colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?>><?php echo $row["req_qty"]; ?>
			
			<br>
<span style="color:red;font-weight:bold">Given-&nbsp;&nbsp;<?php if($row['add_qty'!='']){echo $row["add_qty"];} else {echo 0;}?></span>
			</td>
			
			
<input name="price_<?= $id ?>" type="hidden" value="<?php echo $row1['uprice']?>" >			
		
		
<td align="center"colspan="1"><input name="eqty2_<?= $id ?>" type="number" value="<?php if($new_qty5>$rr_qty1){echo $new_qty5;} else {echo $new_qty6;};?>" id="eqty2" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?> >


</td>

<td align="center"colspan="2" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?>>
<input name="eqty27_<?= $id ?>" style="font-weight: bold;font-size:12px;color:green" type="text" value="<?php if($new_qty5>$rr_qty1){echo $new_batch1;} else {echo $new_batch;};?>"readonly>

</td> 
		
<td align="center"colspan="2" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?>>
<input name="eqty26_<?= $id ?>" style="font-weight: bold;font-size:12px;color:green" type="text" value="<?php if($new_qty5>$rr_qty1){echo $new_qty55;} else {echo $new_qty66;};?>" readonly>

</td> 

                           


<input style="font-weight: bold;font-size:12px;color:green" name="eqty25_<?= $id ?>" type="hidden" value="<?php if($new_qty5>$rr_qty1){echo $new_qty555;} else {echo $new_qty666;};?>" readonly>


		


		
		<?php if($row["req_qty"]!=$row["add_qty"]){?>
<td align="center"colspan="1">

<input name="eqty1_<?= $id ?>" type="number" value="<?php if($row["req_qty"]==$row["add_qty"]){echo $row["req_qty"];} else{echo $row["req_qty"]-$row["add_qty"];} ?>" max="<?php if($new_qty5>=$rr_qty1) {echo $rr_qty1;} else if($new_qty6<=$rr_qty1){echo $new_qty6;} else if($new_qty6>=$rr_qty1){echo $rr_qty1;}?>" id="eqty1" required  <?php if($new_qty>0){echo'style="font-weight: bold;font-size:12px;color:green"';} else{echo'style="font-weight: bold;font-size:12px;color:red"';}?>></td>

<?php }

else {
	
	echo"<td></td>";
}

?>


			<?php if($row["req_qty"]!=$row["add_qty"]){echo'				  
				
			<td align="center"colspan="1"><input type="checkbox" name="update[]" value="'.$id.'" ></td>';}?>						
	 
	 <td align="center"colspan="1">
	 <?php
	                $queryg = "select COUNT(id) from medi_stock2 where sno='$pno' and g_name='$medi'";
                    $resultg = mysqli_query($con,$queryg);
					$countg=1;
                    $rowg = mysqli_fetch_array($resultg);
     if($rowg['COUNT(id)']>0){
	 echo'
	 
	 <a target="_blank" href="department_bar_transfer_new?sno='.$pno.'"><img src="phar_pic/barcode.png" title="Print Instruction" width="20" height="20" /></a>';}
	 ?>
	 </td>						
			      

  	  

	  
      </tr>
	  
    <?php $count++; } ?>
	
	
	<tr>
	<td colspan="10"align="right"><a target='_blank' href="phar_receipt?sno=<?php echo $sno;?>"></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="department_bar_transfer?sno=<?php echo $sno;?>"></a>


</td>

	
	<td colspan='10' align='right'><input type='submit' value='Confirm' name='but_update'><br><br></td></tr>
	
	
	 </table>
            </form>
        </div>
<script src='a_j_q/jquery-3.3.1.min.js' type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="update[]"]').prop('checked',true);
                    }else{
                        $('input[name="update[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });

                // Checkbox click
                $('input[name="update[]"]').click(function(){
                    var total_checkboxes = $('input[name="update[]"]').length;
                    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            });
        </script>	





</body>

</html>
