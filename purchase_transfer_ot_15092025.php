<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','ot','nurse')"; 
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

$query39 = "SELECT * FROM Purchase_stock where rfid= '$sno'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_assoc($result39);
$p_name = $row39['pname'];
$p_mrn = $row39['req_loc'];
$po_id=$row39['id'];  
$fstatus=$row39['fstatus'];  
$ptype=$row39['ptype'];  

$query = "SELECT * FROM user where uname= '$user'"; 
	 
$result = mysqli_query($con, $query) or die(mysqli_error());

// Print out result
$row9 = mysqli_fetch_array($result);
$rq_name = $row9['fullname'];
$uname = $row9['uname'];

$query5 = "SELECT * FROM staff3 where sid= '$uname'"; 
	 
$result5 = mysqli_query($con, $query5) or die(mysqli_error());

// Print out result
$row5 = mysqli_fetch_array($result5);

$dept=$row5['dept'];
$subdept=$row5['subdept'];
$hod=$row5['hos'];
$incharge=$row5['incharge'];






?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$runningTime = date('Ydims');

$code = $_REQUEST['code'];

$code =$_REQUEST['code'];

$treat=explode(',',$code);
	
	$code1=$treat[0];
	$code2=$treat[1];


$medi = $_REQUEST['medi'];
$ptype = $_REQUEST['ptype'];
$uprice = $_REQUEST['uprice'];
$tprice = $_REQUEST['tprice'];
$tqty = $_REQUEST['tqty'];
$ins = $_REQUEST['ins'];
$p_name1 = $_REQUEST['p_name'];
$p_mrn1 = $_REQUEST['dept'];
$rfid5 = $_REQUEST['rfid5'];
//$charge=$_REQUEST['charge'];
$charge= $_REQUEST['charge'];
$lpdate= $_REQUEST['lpdate'];
$plevel= $_REQUEST['plevel'];
$balance= $_REQUEST['balance'];
$musage= $_REQUEST['musage'];
$adate1= date('d/m/Y H:i:s');
$adate= date('Y-m-d');

$sel95="SELECT * FROM storenew WHERE `eid`='$code1' and estatus='Active';";
$result95 = mysqli_query($con,$sel95);
$b_chk=mysqli_fetch_assoc($result95);
$brand=$b_chk['brand1'];
$p_id=$b_chk['id'];
$re_time=date('Y-m-d H:i:s');




if($res95=mysqli_num_rows($result95)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Procedure Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }


else if($user !='' and $incharge==''){


			/*$strSQL2 = "insert into phar_sale(`medi`,`req_qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`ins`,`brand`,`pname`,`pmrn`,`status`,`s_type`,`code`) values
			('$medi','$tprice','$uprice','$charge','$user','$adate','$sno','$ins','$brand','$p_name1','$p_mrn1','Pending','Transfer','$code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
			*/
			
			$ins_query1="insert into purchase_stock (`code`,`g_name`,`b_name`,`add_qty`,`req_qty`,`req_loc`,`status`,`location`,`rfid`,`sno`,`u_price`,`t_price`,`req_by`,`re_time`,`remarks`,`lpdate`,`plevel`,`balance`,`musage`,`p_id`,`hod`,`ptype`)
 values ('$code','$medi','$medi','','$tprice','$p_mrn1','Pending','$p_mrn1','$sno','$runningTime','$uprice','$charge','$user','$re_time','$ins','$lpdate','$plevel','$balance','$musage','$p_id','$hod','$ptype')";
mysqli_query($con,$ins_query1) or die(mysql_error());
			
			
$url = "purchase_transfer_ot?sno=$sno";
header("Location: $url"); 

}


else if($user !='' and $incharge!=''){


  /*$strSQL2 = "insert into phar_sale(`medi`,`req_qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`ins`,`brand`,`pname`,`pmrn`,`status`,`s_type`,`code`) values
  ('$medi','$tprice','$uprice','$charge','$user','$adate','$sno','$ins','$brand','$p_name1','$p_mrn1','Pending','Transfer','$code')";
  //$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2);
  */
  
$ins_query1="insert into purchase_stock (`code`,`g_name`,`b_name`,`add_qty`,`req_qty`,`req_loc`,`status`,`location`,`rfid`,`sno`,`u_price`,`t_price`,`req_by`,`re_time`,`remarks`,`lpdate`,`plevel`,`balance`,`musage`,`p_id`,`hod`,`ptype`,`incharge`)
values ('$code','$medi','$medi','','$tprice','$p_mrn1','Pending','$p_mrn1','$sno','$runningTime','$uprice','$charge','$user','$re_time','$ins','$lpdate','$plevel','$balance','$musage','$p_id','$hod','$ptype','$incharge')";
mysqli_query($con,$ins_query1) or die(mysql_error());
  
  
$url = "purchase_transfer_ot?sno=$sno";
header("Location: $url"); 

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
<?php 
  
  
  
  if($fstatus==0){echo'<div style="position: relative;left: 760px; top: 100px;">
<a onclick="return confirm_click();" href="prf_forward?id='.$po_id.'&sno='.$sno.'"><strong><img src="forward.png" title="Forward PO" width="50" height="50" /></strong></a>
<a target="_blank" href="prf_upload?id='.$po_id.'&sno='.$sno.'"><img src="upload.png" title="Upload PO" width="50" height="50" />
   </a>  
<a target="_blank" href="po_request_comparison?id='.$po_id.'&sno='.$sno.'"><img src="comparison.png" title="Comparison" width="50" height="50" />
   </a>   

</div>
';}

else {echo'<div style="position: relative;
  left: 760px;">
<strong><img src="white.png" title="CLOSED" width="50" height="50" /></div>
';}
?>
	

<form action="" method="post">

<!-- Form Title -->

        <table align="center" class="table table-bordered" id="dynamic_field">  

						
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><h1 style="color:red"><strong>Bill No - <?php echo $sno;?></strong></h1></label></td> </tr>


<tr>
<td colspan="10" align="center"><label><strong>Name</strong></label></td> 

<td colspan="10" align="center"><label><strong>Department</strong></label></td> <tr>

<tr>
<td colspan="10" align="center"><input type="text" name="p_name" id="" required value="<?php echo $rq_name;?>" style="font-weight: bold;font-size:22px;color:green"></td> 
<td colspan="5" align="center">




    <select id="ddd" name='dept' required style="font-weight: bold;font-size:18px;color:green">
	
	
	<?php 
	
	
	
	
if ($dept!='' and $subdept!='') {echo'
	
	
	
	<option value="'.$subdept.'" selected>'.$subdept.'</option>
	<option value="'.$dept.'" selected>'.$dept.'</option>';}
	
	else if ($dept=='Nursing Services' and $subdept=='') 
	
	

	
	{echo '<option value='.$p_mrn.'>'.$p_mrn.'</option>';
		$query55 = "SELECT distinct subdept FROM staff3 where dept= '$dept'"; 
	 
$result55 = mysqli_query($con, $query55) or die(mysqli_error());

// Print out result
while ($row55 = mysqli_fetch_array($result55)){?>
		
		
	
	
	
	<option value="<?php echo $row55['subdept'];?>"><?php echo $row55['subdept'];?></option>
	
<?php }}
else if ($dept!='' and $subdept=='') 
	
	
	{echo '
	
	<option value="'.$dept.'" selected>'.$dept.'</option>';}
	
	?>
		
	
	
	
	
	
				
				
        
    </select>
	</td>
	
	<td colspan="5" align="center">




    <select name='ptype' required style="font-weight: bold;font-size:18px;color:green">
	<option value="<?php echo $ptype;?>" selected><?php echo $ptype;?></option>
	<option value="Stock Items">Stock Items</option>
	<option value="Purchase Items">Purchase Items</option>
	<select></td>
</tr>



<td colspan="2" align="center"><label><strong>Code</strong></label></td> 

<td colspan="6" align="center"><label><strong>Product Name</strong></label></td> 
<td colspan="2" align="center"><label><strong>Available Qty</strong></label></td> 
<td colspan="1" align="center"><label><strong>L.D.OF Purchase</strong></label></td> 
<td colspan="1" align="center"><label><strong>Per Level</strong></label></td> 
<td colspan="1" align="center"><label><strong>Balance</strong></label></td> 
<td colspan="1" align="center"><label><strong>Monthly Avg. Usage</strong></label></td> 
<td colspan="1" align="center"><label><strong>Unit Price</strong></label></td>

<td colspan="2" align="center"><label><strong>Request qty</strong></label></td>
<td colspan="3" align="center"><label><strong>Total Price</strong></label></td></tr>
<tr>
<td colspan="2">

<input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='code' required style="font-weight: bold;font-size:22px;color:green">

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `storenew` where estatus='Active' and etype='Disposable'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['eid'].','.$dept; ?>"><?php echo $row['ename']; ?></option>
        <?php } ?>
            </datalist>
	
	</td>

<td colspan="6" align="center"><textarea name="medi" id="code" class="form-control action" cols="30" rows="5"style="font-weight: bold;font-size:22px;color:green"readonly required>


</textarea>

</td>
	
	
						
						
						 
						
						
						<td colspan="2"><input type="text" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green">
						<input type="hidden" name="rfid5" id="rfid5" required value="" readonly style="font-weight: bold;font-size:22px;color:green">
						<input type="hidden" name="pid" id="pid" required value="" readonly style="font-weight: bold;font-size:22px;color:green">
						
						</td>
						
<td colspan="1" ><input type="date" name="lpdate" id="lpdate" required value=""  style="font-weight: bold;font-size:22px;color:green"></td>
<td colspan="1" ><input type="number" name="plevel" id="plevel" required value=""  style="font-weight: bold;font-size:22px;color:green"></td>
<td colspan="1" ><input type="number" name="balance" id="balance" required value=""  style="font-weight: bold;font-size:22px;color:green"></td>
<td colspan="1" ><input type="number" name="musage" id="musage" required value=""  style="font-weight: bold;font-size:22px;color:green"></td>
<td colspan="1" ><input type="text" name="uprice" id="uprice" required value=""  style="font-weight: bold;font-size:22px;color:green"></td>
						
						
						<td colspan="2" ><input type="text" name="tprice" id="qty" required value="" style="font-weight: bold;font-size:22px;color:green"></td>
						
							
						
						
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

<?php if($fstatus==0){echo'
		<td colspan="20" align="right">		<button type="submit" name="Submit">Add</button></td>';}
		else {
			
			echo'<td colspan="16" align="right"><span style="font-size:30px; font-weight:bold;color:red">Request Closed</span>
			<a target="_blank" href="prf_request?sno='.$sno.'"><img src="phar_pic/print.png" title="Print Receipt" width="100" height="80" /></a>
			
			</td>
			';
		}?>

		
	  

</tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>SNO</strong></td>
      <td colspan="8" align="center"><strong>Item</strong></td>
      <td colspan="3" align="center"><strong>Request Qty </strong></td>
      
      <td colspan="3" align="center"><strong>Unit Price</strong></td>
	  <td colspan="3" align="center"><strong>Department</strong></td>
	  
<td colspan="1" align="center"><strong>Edit </strong></td>
	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select * from purchase_stock where rfid= '$sno' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["sno"]; ?></td>
      <td align="center"colspan="8"><?php echo $row["g_name"]; ?></td>
	  
      
	  <td align="center"colspan="3"><?php echo $row["req_qty"]; ?></td>
	  <td align="center"colspan="3" ><?php echo $row["u_price"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["req_loc"]; ?></td>  
      
	  
	  <?php 
	  $id=$row["id"];
	  $user7=$row["user"];
	  $url7 = "idoccnoteedit?pmrn=$pmrn&eid=$eid&id=$id"; 
	  
	  if($user7==$full){echo"
	  <td colspan='1' align='center'><a href='$url7'>Edit</a></td>
	  ";} else{echo"<td colspan='1'></td>";}?>	
	  
  	  

	  
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
				document.getElementById("rfid5").value = "";
				document.getElementById("balance").value = "";
				document.getElementById("lpdate").value = "";
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
							"rfid5").value = myObj[4];
							
							
							document.getElementById(
							"balance").value = myObj[5];
							
							
							document.getElementById(
							"lpdate").value = myObj[6];
							
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
				xmlhttp.open("GET", "purchase_out1.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
</body>

</html>


