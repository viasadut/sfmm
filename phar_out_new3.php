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
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');
$sno=$_REQUEST['sno'];
$user=$_SESSION["sess_username"];
/*$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];





//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$adoc=$data['adoc'];
$emerid=$data['emerid'];

$query5 = mysqli_query($db,"select * from irefferal where pmrn='$pmrn' and eid='$eid' and infusion='$full' and cstatus='Active'");
$data5 = mysqli_fetch_assoc($query5);
$rtype=$data5['bed'];*/


$query39 = "SELECT * FROM phar_sale where sno= '$sno'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$p_name = $row39['pname'];
$p_mrn = $row39['pmrn'];
 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$code = $_REQUEST['code'];
//$pcode = $_REQUEST['pcode'];
$medi = $_REQUEST['medi'];
$uprice = $_REQUEST['uprice'];
$tprice = $_REQUEST['tprice'];
$tqty = $_REQUEST['tqty'];
$ins = $_REQUEST['ins'];
//$charge=$_REQUEST['charge'];
$charge= $tprice * $uprice;
$adate1= date('d/m/Y H:i:s');
$adate= date('Y-m-d');
$p_name1 = $_REQUEST['p_name'];
$p_mrn1 = $_REQUEST['p_mrn'];



$sel96="SELECT * FROM medi_stock WHERE `rfid`='$code' and add_qty>0 and location='Pharmacy'";


$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$code1=$b_chk_m['code'];
$brand=$b_chk_m['brand'];
$m_qty1=$tprice - $b_chk_m['add_qty'];
$m_qty1_t=$b_chk_m['add_qty']-$tprice;
$rf=$b_chk_m['rfid'];
$mid=$b_chk_m['id'];

$chk="SELECT * FROM phar_sale WHERE `sno`='$sno' and medi='$medi';";
$chk_result = mysqli_query($con,$chk);
$chk_row=mysqli_fetch_assoc($chk_result);
$mqty=$chk_row['qty'];
$r_id=$chk_row['id'];
$fqty=$mqty+$tprice;
$charge_f=$fqty*$uprice;


if($tqty<$tprice)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Available Quantity is Not Sufficient"); ';
    echo '</script>';
    }

else if($tqty >= $tprice and $mqty=='' and $mm_qty>=$tprice and $tprice>0)
	
//else if($res95=mysqli_num_rows($result95)>0 and $mqty=='' and $mm_qty<$tprice)
{
			
			
					
			
			$ins_query3="update medi_stock set `add_qty`='$m_qty1_t' where id='$mid' and location='Pharmacy'";
			//mysqli_query($con,$ins_query3) or die(mysql_error());
			
			
			if(mysqli_query($con,$ins_query3)==true){
			$ins_query3i="update medicine set `l_sale_date`='$ldate' where code='$code1'";
			
			}
			if(mysqli_query($con,$ins_query3i)==true){

	
	$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`ins`,`brand`,`pname`,`pmrn`,`location`,`rfid`,`code`) values
			('$medi','$tprice','$uprice','$charge','$user','$adate','$sno','$ins','$brand','$p_name1','$p_mrn1','OTC','$rf','$code')";
			}
			
			
			if(mysqli_query($con,$strSQL2)==true){
			
			$url = "phar_out_new3?sno=$sno";
header("Location: $url"); 

			}
	}

	
	
			
			


				
			
			else if($tqty >= $tprice and $mqty!='' and $mm_qty>=$tprice and $tprice>0)
	{
			
			
					
			

			
			$ins_query3="update medi_stock set `add_qty`='$m_qty1_t' where id='$mid' and location='Pharmacy'";
			if(mysqli_query($con,$ins_query3)==true){
			
			$ins_query3i="update medicine set `l_sale_date`='$ldate' where code='$code1'";
			
			}
			if(mysqli_query($con,$ins_query3i)==true){
			
			$strSQL2 = "update phar_sale set `qty`='$fqty',`tprice`='$charge_f',`aby`='$user',`adate`='$adate',`brand`='$brand',`ins`='$ins' where id='$r_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			
			}
			if(mysqli_query($con,$strSQL2)==true){

$url = "phar_out_new3?sno=$sno";
header("Location: $url"); 
			}
		}
	
	}
	
	
	
	
	


	

?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
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
  color: #-a97a0;
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

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
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
    max-width: 1800px;
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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="jsnew/jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="jsnew/jquery.multiselect.js"></script>


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

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Add Inpatient Visit ?");
}

</script>
<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add ICU Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Add Emergency Visit ?");
}

</script>


<script type="text/javascript">
function confirm_click3()
{
return confirm("Are you Sure to Add After Office Hour Visit ?");
}

</script>
</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='idocdetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
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
	

<form action="" method="post">

<!-- Form Title -->

        <table align="center" class="table table-bordered" id="dynamic_field">  

						
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><h1 style="color:red"><strong>Bill No - <?php echo $sno;?></strong></h1></label></td> </tr>

<tr>
<td colspan="10" align="center"><label><strong>Patient Name</strong></label></td> 

<td colspan="10" align="center"><label><strong>MRN</strong></label></td> <tr>

<tr>
<td colspan="10" align="center"><input type="text" name="p_name" id="" required value="<?php echo $p_name;?>" style="font-weight: bold;font-size:22px;color:green"></td> 
<td colspan="10" align="center"><input type="text" name="p_mrn" id=""  value="<?php echo $p_mrn;?>" style="font-weight: bold;font-size:22px;color:green"></td>
</tr>

<tr>

<td colspan="4" align="center"><label><strong>Code</strong></label></td> 

<td colspan="6" align="center"><label><strong>Medicine Name</strong></label></td> 
<td colspan="2" align="center"><label><strong>Available Qty</strong></label></td> 
<td colspan="2" align="center"><label><strong>Unit Price</strong></label></td>

<td colspan="3" align="center"><label><strong>Issue qty</strong></label></td>
<td colspan="3" align="center"><label><strong>Total Price</strong></label></td></tr>
<tr>
<td colspan="4">

<input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='code' required style="font-weight: bold;font-size:22px;color:green">

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `medi_stock` where location='Pharmacy' and add_qty>0";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['rfid']; ?>"><?php echo $row['rfid'].'('.$row['g_name'].')'; ?></option>
        <?php } ?>
        
    </datalist>
	
	</td>
	
		

<td colspan="6" align="center"><textarea name="medi" id="code" class="form-control action" cols="30" rows="5"style="font-weight: bold;font-size:22px;color:green"readonly required>


</textarea>

</td>
	
	
						
						
						 
						
						
						<td colspan="2"><input type="text" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>
						

<td colspan="2" ><input type="text" name="uprice" id="uprice" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>
						
						
						<td colspan="3" ><input type="text" name="tprice" id="qty" required value="" style="font-weight: bold;font-size:22px;color:green"></td>
						
							
						
						
						<td colspan="3" ><input type="text" name="charge" id="tprice" readonly value="" style="font-weight: bold;font-size:22px;color:green"required></td>
						
						
						
						<script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#uprice").val()) 
	var ret2 = parseInt($("#qty").val())
	var ret3=ret2 * ret1
	//var ret4=ret3 * 100
	//var ret5=ret4 / ret1
	if(ret3>0){
    $("#tprice").val(ret3);
	
	//$("#tprice").style.color = "red";
	
	}
	else {
		$("#tprice").val();
		//$("#tprice").style.color = "green";6
	}
  })
</script>
</tr>

<tr>
<td colspan="20" align="center"><textarea name="ins" id="ins" class="form-control action" cols="30" rows="2"style="font-weight: bold;font-size:22px;color:green"required>


</textarea>

</td>

</tr>

<form>
<tr>
<td colspan="10"align="right"><a target='_blank' href="phar_receipt?sno=<?php echo $sno;?>"><img src="phar_pic/print.png" title="Print Receipt" width="100" height="80" /></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="medi_ins?sno=<?php echo $sno;?>"><img src="phar_pic/barcode.png" title="Print Instruction" width="100" height="80" /></a>


</td>

		<td colspan="10"align="right"><button type="submit" name="Submit">Add</button></td>
	  

</tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>SNO</strong></td>
      <td colspan="8" align="center"><strong>Medi</strong></td>
      <td colspan="3" align="center"><strong>Qty </strong></td>
      
      <td colspan="3" align="center"><strong>Unit Price</strong></td>
	  <td colspan="3" align="center"><strong>Total Price</strong></td>
	  

	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select * from phar_sale where sno= '$sno' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["sno"]; ?></td>
      <td align="center"colspan="8"><?php echo $row["medi"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["qty"]; ?></td>  
      
	  <td align="center"colspan="3"><?php echo $row["uprice"]; ?></td>
	  <td align="center"colspan="3" ><?php echo $row["tprice"]; ?></td>
      
	  
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
</table>
</form>

<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("tqty").value = "";

				document.getElementById("uprice").value = "";
				document.getElementById("code").value = "";
				document.getElementById("qty").value = "";
				document.getElementById("ins").value = "";
				document.getElementById("pcode").value = "";
				//document.getElementById("pp").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("tqty").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"uprice").value = myObj[1];
							
							
							
							document.getElementById(
							"code").value = myObj[2];
							
							document.getElementById(
							"ins").value = myObj[3];
							
							document.getElementById(
							"pcode").value = myObj[4];
							
							//document.getElementById(
							//"pp").value = myObj[3];
							
							//document.getElementById(
							//"qty").value = 0;
							if(myObj[0]>0){
							document.getElementById('tqty').style.color = "green";}
else {
							document.getElementById('tqty').style.color = "red";}							

					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "phar_out1_new22.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
</body>

</html>


