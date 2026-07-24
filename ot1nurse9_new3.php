<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','ot')"; 
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
$medi = $_REQUEST['medi'];
$uprice = $_REQUEST['uprice'];
$tprice = $_REQUEST['tprice'];
$tqty = $_REQUEST['tqty'];
$ins = $_REQUEST['ins'];
$p_name1 = $_REQUEST['p_name'];
$p_mrn1 = $_REQUEST['p_mrn'];
//$charge=$_REQUEST['charge'];
$charge= $tprice * $uprice;
$adate1= date('d/m/Y H:i:s');
$adate= date('Y-m-d');

$sel95="SELECT * FROM medicine WHERE `code`='$code' and status='Active';";
$result95 = mysqli_query($con,$sel95);
$b_chk=mysqli_fetch_assoc($result95);
$brand=$b_chk['brand1'];


$chk="SELECT * FROM phar_sale WHERE `sno`='$sno' and medi='$medi';";
$chk_result = mysqli_query($con,$chk);
$chk_row=mysqli_fetch_assoc($chk_result);
$mqty=$chk_row['qty'];
$r_id=$chk_row['id'];
$fqty=$mqty+$tprice;
$charge_f=$fqty*$uprice;


if($res95=mysqli_num_rows($result95)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Procedure Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }


else if($res95=mysqli_num_rows($result95)>0 and $mqty==''){


			$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`ins`,`brand`,`pname`,`pmrn`) values
			('$medi','$tprice','$uprice','$charge','$user','$adate','$sno','$ins','$brand','$p_name1','$p_mrn1')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
			
			
			$url = "phar_out?sno=$sno";
header("Location: $url"); 

}


else if($res95=mysqli_num_rows($result95)>0 and $mqty!=''){


			$strSQL2 = "update phar_sale set `qty`='$fqty',`tprice`='$charge_f',`aby`='$user',`adate`='$adate',`ins`='$ins',`pname`='$p_name1',`pmrn`='$p_mrn1' where id='$r_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
			
			
			$url = "phar_out?sno=$sno";
header("Location: $url"); 
}





else 
	
	{
		
		echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Session is closed .. pls login again"); ';
    echo '</script>';
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


   <script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".3col").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_privilege.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".3col").html(html);
			} 
		});
	});
	
	
	$(".3col").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>

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
<td colspan="10" align="center"><label><strong>Name</strong></label></td> 

<td colspan="10" align="center"><label><strong>MRN</strong></label></td> <tr>

<tr>
<td colspan="10" align="center"><input type="text" name="p_name" id="" required value="<?php echo $p_name;?>" style="font-weight: bold;font-size:22px;color:green"></td> 
<td colspan="10" align="center"><input type="text" name="p_mrn" id=""  value="<?php echo $p_mrn;?>" style="font-weight: bold;font-size:22px;color:green"></td>
</tr>



<td colspan="2" align="center"><label><strong>Code</strong></label></td> 

<td colspan="6" align="center"><label><strong>Medicine Name</strong></label></td> 
<td colspan="3" align="center"><label><strong>Available Qty</strong></label></td> 
<td colspan="3" align="center"><label><strong>Unit Price</strong></label></td>

<td colspan="3" align="center"><label><strong>Issue qty</strong></label></td>
<td colspan="3" align="center"><label><strong>Total Price</strong></label></td></tr>
<tr>
<td colspan="2">

<input type="text" id="pmrn" onkeyup="GetDetail(this.value)" list="categoryname" autocomplete="off"  required style="font-weight: bold;font-size:22px;color:green" name="dname1" value="" class="country"required>

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `doctor` where status='Active'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['dname']; ?>"><?php echo $row['dname']; ?></option>
        <?php } ?>
        
    </datalist>
	
	</td>
	
		
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['id'];?>" />
						</select></td>
						
						
						
						</tr>
						
						
<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>
		<tr><td colspan="20">
		
		
<select class="3col" name="xl"  value=''required>
			 

</select>



</td></tr>


		<tr>
						
						
						<td colspan="4"><label><strong>OT Date:</strong></label></td>
						
						
						
						<td colspan="2"><label><strong>Type Of OT:</strong></label></td>
						<td colspan="2"><label><strong>Duration:</strong></label></td>
						
						<td colspan="8"><label><strong>Type of Anesthesia:</strong></label></td>
							
						</tr>
						
						<tr>				
						

			    	 <td colspan="4"><input type="date" name="otdate"  placeholder="Select Date" value=""size="15" required></td>  

					 
					 
					 
		
							
										
						
						
						
						
					
					 


 
<td colspan="2"><select name="typeot" required>
        
						<option value=''>--Select--</option>
						<option value='Elective'>Elective</option>
						<option value='Emergency'>Emergency</option>
						
				
</select>




</td>  
<td colspan="2"><input type="text" name="duration" size="15"value="" required></td>  		             		
					 <td colspan="8"><select name="xl3"  class="3colms active" placeholder="Select Investigations">
       
						
						<option value=''>--Select--</option>
						<option value='Local'>Local</option>
						<option value='GA - Endotracheal Tube'>GA - Endotracheal Tube</option>
						<option value='GA - LMA'>GA - LMA</option>
						<option value='SAB'>SAB</option>
						<option value='GA + SAB'>GA + SAB</option>
						<option value='GA - LMA + Caudal Epidural'>GA - LMA + Caudal Epidural</option>
						<option value='Nerve Block'>Nerve Block</option>
						<option value='Saddle Block'>Saddle Block</option>
						<option value='Deep Sedation'>Deep Sedation</option>
						<option value='TIVA'>TIVA</option>
						<option value='Inhalational Anesthesia'>Inhalational Anesthesia</option>
						<option value='Dissociative Anaesthesia'>Dissociative Anaesthesia</option>
						<option value='Spinal'>Spinal + Epidural </option>
						
						
				
</select></td>  


 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"><?php echo $inves;?></textarea></td>  </tr>
						


		






					 </tr>

<tr>
							<td colspan="20"><label><strong>Type Of Operation:</strong></label></td>
						

<tr>
					 <td colspan="20"><select name="typeo" required >
        
						
						<option value=''>-Select-</option>
						<option value='Major'>Major</option>
						<option value='Minor'>Minor</option>
						<option value='Intermidiate'>Intermidiate</option>
						
						
						
				
</select></td>  

					 
</tr>
		
		
		 
		<tr>
						
						<td colspan="20"><label><strong> Remarks / Special Requirement:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><input type="text" name="sprequire" value=""></td>  
				
						
					 
					 </tr>
					 
						
				
														

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="otreport?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>&bkdate=<?php echo "$bkdate"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>
	
	
						
						
						 
						
						
						<td colspan="3"><input type="text" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>
						


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
				xmlhttp.open("GET", "con_ot_day.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
</body>

</html>


