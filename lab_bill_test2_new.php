<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
$dd1=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$date77=date('Y-m-d');

//include("auth.php");
//$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$pmrn=$data['pmrn'];
//$eid=$data['eid'];
$dname=$data['dname'];
$pname=$data['pname'];

/*$query5 = mysqli_query($db,"select * from patient where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);
$bdate=$data1['bdate'];
$dd=date('d-m-Y',strtotime($data1['bdate']));
$dd2=date_create($dd);



$date= date('d-m-Y');
$date2=date_create($date);



$diff=date_diff($date2,$dd2);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
*/





$pdate=date('Y-m-d');  
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

			
			
$eqty2 = $_POST['eqty1_'.$updateid];
$bar = $_POST['bar_'.$updateid];

			
			if($eqty2 >0)
	{
			
			
						$strSQL1 = "update alltest set billstatus='Billed', billby='$user', billdate='$pdate',barcode1='$bar',barcode='$bar' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);

			
			
			
			
			
			
			
	}
	
	


}		
			}
			
			echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';
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


h1 {
  text-align: left;
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




  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
 


</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='lab_bill_test2_new1?pmrn=<?php echo $pmrn;?>'><span>Home</span></a></li>
  
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


<form name="frmMain1" action="" method="post" > 

<h1 align="left"style="background-color:lightgreen;">Patient Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['pname'];?>
<br>MRN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['pmrn'];?>
<br>Consultant Name:&nbsp;&nbsp;<?php echo $data['dname'];?>
<br>Episode:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['eid'];?>
<br>Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['date'];?>

</h1>
        <table align="center" class="table table-bordered" id="dynamic_field"> 




<tr>
      <td colspan="1" align="center"><h3><strong>S.No</strong></h3></td>
       <td colspan="4" align="center"><h3><strong>Investigation Name</strong></h3></td>
      <td colspan="3" align="center"><h3><strong>Instruction</strong></h3></td>  
	  <td colspan="2" align="center"><h3><strong>Price</strong></h3></td>  
	  <td colspan="2" align="center"><h3><strong>Qty</strong></h3></td>  
		  
		  <td colspan="1" align="center"><input type='checkbox' id='checkAll' style="height:22px; width:22px;" checked hidden></td>
		
       

	   </tr>
	   
	   
	    <?php 
		


                    $query = "select * from alltest where pmrn='$pmrn' and eid='$eid' and billstatus!='Billed' and result=''";
                    $result = mysqli_query($con,$query);
					$count=1;
                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                             					   
                    ?>
	   
   
     <td align="center" colspan="1" style="font-size:22px; color:red; font-weight:bold;"><?php echo $count; ?></td>


                            
                  
     <td align="center"colspan="4" style="font-size:22px; color:red; font-weight:bold;"><?php echo $row["medi"]; ?></td>
			      <td align="center"colspan="3" style="font-size:22px; color:red; font-weight:bold;"><?php echo $row["ins"]; ?></td>
				 <td align="center"colspan="2" style="font-size:22px; color:red; font-weight:bold;"><?php echo $row["price"];?>
				  
				  <input class="iprice" name="eqty3_<?= $id ?>" id="eqty2" type="text" value="<?php echo $row["price"];?>" readonly  hidden>
				  
				  
				  </td>
				  <td align="center"colspan="2">
				  <input class="iquantity" name="eqty1_<?= $id ?>" onchange='subTotal()' id="eqty1" type="text" value="1" required style="font-size:22px; color:red; font-weight:bold;">
				  <input class="itotal" name="eqty5_<?= $id ?>"  id="eqty1" type="hidden">
				  				  <input  name="bar_<?= $id ?>"  id="bar" type="hidden" value="<?php echo $row['id'].''.date('Yd');?>">
				  </td>
							  
                  
						
	 <td align="center" colspan="1"><input type='checkbox' name='update[]' value='<?= $id ?>' style="height:22px; width:22px;" checked hidden></td>						
			      

  	  

	  
      </tr>
	  
    <?php $count++; } ?>
	<tr >
	
	<td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red">Grand Total</td>
	<td colspan="10"align="right" id='gtotal'style="font-weight: bold;font-size:35px;color:red"></td>
	</tr>
	
	
	
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


	<tr>
	<td colspan='20' align='right'><input type='submit' value='Confirm' name='but_update'><br><br></td></tr>
	
	
	 </table>
            </form>
        </div>








</body>

</html>
