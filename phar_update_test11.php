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
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$dname=$_REQUEST['dname'];
$sno=$_REQUEST['sno'];
$stime = date('d/m/Y H:i:s');
//$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];

//include("auth.php");

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
					
			
			$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			$qq = mysqli_query($db,"select * from pmedi where id='".$updateid."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi_1 = $dd["medi"];
			$code_1 = $dd["code"];
			$p_mrn = $dd["pmrn"];
			$p_name = $dd["pname"];
			
			$qq1 = mysqli_query($db,"select * from medicine where code='".$code_1."'");
			$dd1 = mysqli_fetch_assoc($qq1);
			$p_price=$dd1['uprice'];
			$brand=$dd1['brand1'];
			$lqty=$dd1['tqty'];
			$ins = $dd["pdos"].','.$dd["frelation"].','.$dd["duration"];
			
$eqty2 = $_POST['eqty1_'.$updateid];
$eqty5 = $_POST['eqty2_'.$updateid];
$u_qty=$eqty5-$eqty2;
$u_price=$eqty2*$p_price;

			$ortime = date('d/m/Y H:i:s');
			$adate = date('Y-m-d');
			
			
			
	$chk=mysqli_query($db,"SELECT * FROM phar_sale WHERE `sno`='$sno' and medi='$medi_1'");
	$chk_row=mysqli_fetch_assoc($chk);
	$mqty=$chk_row['qty'];
	$r_id=$chk_row['id'];
	$fqty=$mqty+$eqty2;
	$charge_f=$fqty*$p_price;
		
			

$sel96="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty!='0' and location='Pharmacy' order by id asc limit 1;";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-$eqty2;
$rf=$b_chk_m['rfid'];


			
			
			

			//if($eqty5!='0' and $eqty5 < $eqty2)
				if($eqty5>'25000')
				{
					echo '<script language="javascript">';
    echo 'alert("Unsuccessful !! Dispense Quantity in Greater than requested quantity!!"); ';

    echo '</script>';
					
					
				}
			
			
			else if($lqty >= $eqty2 and $mqty=='' and $mm_qty<$eqty2 and $eqty2>0)
	{
			
			
			
			$strSQL = "update medicine set tqty='".$u_qty."' where code='".$code_1."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			$strSQL1 = "update pmedi set status='Served',qty='$eqty2' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);

			
			$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','OPD','$code_1','$p_mrn','$p_name')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);
			
			
			
			
			$ins_query3="update medi_stock set `add_qty`='0' where rfid='$rf'";
mysqli_query($con,$ins_query3) or die(mysql_error());

$sel97="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty!='0' and location='Pharmacy' order by id asc limit 1;";
$result97 = mysqli_query($con,$sel97);
$b_chk_7=mysqli_fetch_assoc($result97);
$rfid1=$b_chk_7['rfid'];
$second_qty=$b_chk_7['add_qty']+$m_qty1;

$ins_query4="update medi_stock set `add_qty`='$second_qty' where rfid='$rfid1'";
mysqli_query($con,$ins_query4) or die(mysql_error());


	//$url = "srequest2" ;
//header("Location:$url");
			
	}
	
	else if($lqty >= $eqty2 and $mqty=='' and $mm_qty>=$eqty2 and $eqty2>0)
	{
			
			
			
			$strSQL = "update medicine set tqty='".$u_qty."' where code='".$code_1."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			$strSQL1 = "update pmedi set status='Served',qty='$eqty2' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);

			
			$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','OPD','$code_1','$p_mrn','$p_name')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);
			
			
			
			
			$ins_query3="update medi_stock set `add_qty`='$m_qty1' where rfid='$rf'";
mysqli_query($con,$ins_query3) or die(mysql_error());

			
	}
	
	else if($lqty >= $eqty2 and $mqty!='' and $mm_qty<$eqty2 and $eqty2>0)
	{
			
			
			
			$strSQL = "update medicine set tqty='".$u_qty."' where code='".$code_1."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			$strSQL1 = "update pmedi set status='Served',qty='$eqty2' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);

			
			$strSQL2 = "update phar_sale set `qty`='$fqty',`tprice`='$charge_f',`aby`='$user',`adate`='$adate',`brand`='$brand',`ins`='$ins' where id='$r_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
	//$url = "srequest2" ;
//header("Location:$url");


$ins_query3="update medi_stock set `add_qty`='0' where rfid='$rf'";
mysqli_query($con,$ins_query3) or die(mysql_error());

$sel97="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty!='0' and location='Pharmacy' order by id asc limit 1;";
$result97 = mysqli_query($con,$sel97);
$b_chk_7=mysqli_fetch_assoc($result97);
$rfid1=$b_chk_7['rfid'];
$second_qty=$b_chk_7['add_qty']+$m_qty1;

$ins_query4="update medi_stock set `add_qty`='$second_qty' where rfid='$rfid1'";
mysqli_query($con,$ins_query4) or die(mysql_error());


			
	}
	
	else if($lqty >= $eqty2 and $mqty!='' and $mm_qty>=$eqty2 and $eqty2>0)
	{
			
			
			
			$strSQL = "update medicine set tqty='".$u_qty."' where code='".$code_1."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			$strSQL1 = "update pmedi set status='Served',qty='$eqty2' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);

			
			$strSQL2 = "update phar_sale set `qty`='$fqty',`tprice`='$charge_f',`aby`='$user',`adate`='$adate',`brand`='$brand',`ins`='$ins' where id='$r_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
	//$url = "srequest2" ;
//header("Location:$url");


$ins_query3="update medi_stock set `add_qty`='$m_qty1' where rfid='$rf'";
mysqli_query($con,$ins_query3) or die(mysql_error());


			
	}
	

                   
}

/*echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';
	
	$url = "srequest2" ;
header("Location:$url");
*/

	


}		}
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
    max-width: 1200px;
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
   <script>
function goBack() {
    window.history.back();
}
</script>



</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
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
     
      <td colspan="9" align="center"><strong>Medicine Name</strong></td>
	  <td colspan="5" align="center"><strong>Instruction</strong></td>
     	  <td colspan="1" align="center"><strong>Available QTY</strong></td>
		  <td colspan="1" align="center"><strong>Unit Price</strong></td>
      	  <td colspan="1" align="center"><strong>Issue_Qty</strong></td>
		  <td colspan="1" align="center"><strong>Total price</strong></td>
		  
		  <td colspan="1" align="center"><input type='checkbox' id='checkAll' ></td>
		
       

	   </tr>
	   
	   
	    <?php 
                    $query = "select * from pmedi where pmrn='$pmrn' and dname='$dname' and eid='$eid'";
                    $result = mysqli_query($con,$query);
					$count=1;
                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                        $medi = $row['medi'];
						$pdos = $row['pdos'];
						$duration = $row['duration'];
						$frelation = $row['frelation'];
                       
$query1 = "select * from medicine where mname='$medi' and status='Active'";
                    $result1 = mysqli_query($con,$query1);
					   $row1 = mysqli_fetch_array($result1);
                        
                    ?>
	   
   
     <td align="center" colspan="1" <?php if($row1['tqty']>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $count; ?></td>


                            
                  
                  
	 
      <td align="center"colspan="9" <?php if($row1['tqty']>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["medi"]; ?></td>
	  



	  <td align="center"colspan="5" <?php if($row1['tqty']>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["pdos"].'<br>'.$row["frelation"].'<br>'.$row["duration"]; ?></td>
	        
						

		
<td align="center"colspan="1"><input name="eqty2_<?= $id ?>" id="eqty2" type="text" value="<?php echo $row1['tqty'];?>" readonly <?php if($row1['tqty']>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>></td>
		
<td align="center"colspan="1"><input class="iprice" name="eqty3_<?= $id ?>" id="eqty2" type="text" value="<?php echo $row1['uprice'];?>" readonly <?php if($row1['tqty']>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>></td>			

<td align="center"colspan="1">



<input class="iquantity" name="eqty1_<?= $id ?>" onchange='subTotal()' id="eqty1" type="text" value="0" required <?php if($row1['tqty']>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>




<td colspan="1" class='itotal' <?php if($row1['tqty']>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>></td>


							  
                  
						
	 <td align="center"colspan="1"><input type='checkbox' name='update[]' value='<?= $id ?>' checked></td>						
			      

  	  

	  
      </tr>
	  
    <?php $count++; } ?>
	<tr >
	
	<td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red">Grand Total</td>
	<td colspan="10"align="right" id='gtotal'style="font-weight: bold;font-size:35px;color:red"></td>
	<tr>
	
	<tr>
	<td colspan="10"align="right"><a target='_blank' href="phar_receipt?sno=<?php echo $sno;?>"><img src="phar_pic/print.png" title="Print Receipt" width="100" height="80" /></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="medi_ins_p?sno=<?php echo $sno;?>"><img src="phar_pic/barcode.png" title="Print Instruction" width="100" height="80" /></a>


</td>
<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');


function subTotal()
{
gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
gt=gt+(iprice[i].value)*(iquantity[i].value);

}
gtotal.innerText=gt;
}
subTotal();
</script>

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


	
	<td colspan='10' align='right'><input type='submit' value='Confirm' name='but_update'><br><br></td></tr>
	
	
	 </table>
            </form>
        </div>








</body>

</html>
