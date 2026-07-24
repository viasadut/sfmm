<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
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

$user=$_SESSION['sess_username'];
$id=$_REQUEST['id'];

//include("auth.php");
//echo $count1;

$query43 = "SELECT * FROM acct_ap where id= '$id';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$oprice=$row1['uprice'];
$oprice1=$row1['uprice1'];
$code=$row1['code'];
$payable_new=round($row1['amount']-($row1['amount']*$row1['vat']/100)-($row1['amount']*$row1['tax']/100));
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

//$code = $_REQUEST['code'];
$payable = $_REQUEST['payable'];
$vat = $_REQUEST['vat'];
$tax=$_REQUEST['tax'];
$o_dis=$_REQUEST['o_dis'];
$remarks=$_REQUEST['remarks'];
$o_dis_remarks=$_REQUEST['o_dis_remarks'];

//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$ap_time= date('Y-m-d H:i:s');

$adate1= date('m/d/Y');
$ittime1= date('Y-m-d');





if($user!=''){


$ins_query1="update acct_ap set other_dis='$o_dis',vat='$vat',tax='$tax',payable='$payable', status='AP DONE', remarks='$remarks', other_dis_remarks='$o_dis_remarks',ap_entry='$ap_time', ap_by='$user' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());


/*if (mysqli_query($con,$ins_query1) == TRUE) 
{

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
 

}*/
echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';

    $url = "create_ap_number_new?id=$id";
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
  width: 100%;
  margin: 0;
  outline: 0;
  padding: 15px;
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
  width: 25%;
}
textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
  margin-bottom: 0px;
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


@media screen and (min-width: 1480px) {

  form {
    max-width: 1480px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
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
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
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
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>Account Payable Form</h1>


    <table width="100%" height ="100%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">	

    <td colspan="20"  style="font-size:30px;color:red;text-align:right"><strong>AUDIT NO:<br><?php if($row1['status']=='AP DONE'){echo $row1['id'];}?></strong></td>
</tr>
    <tr>
      <td colspan="10" align="center" style="font-size:24px;color:green;text-align:left"><strong>GRN NO:<?php echo $row1['grn'];?></strong></td>
      
      <td colspan="10" align="center" style="font-size:24px;color:green;text-align:left"><strong>INVOICE NO:<?php echo $row1['invoice_no'];?></strong></td>
      
      
      
	  
	  
	   </tr>

     <tr>
     <td colspan="10" align="center" style="font-size:24px;color:green;text-align:left"><strong>PO NO:<?php echo $row1['pono'];?></strong></td>
      <td colspan="10" align="center" style="font-size:24px;color:green;text-align:left"><strong>INVOICE VALUE:
    
      <input name="amount" type="number" size="70" style="text-transform:uppercase;font-size:30px;color:red;font-weight:bold;text-align:center" value="<?php echo $row1["amount"];?>" id="amount"required>
    </strong>
    
    </strong></td>
      
      
      
      
      
	  
	  
	   </tr>


     <tr>
      <td colspan="10" style="font-size:24px;color:green;text-align:left"><strong>VAT:
    
      <input name="vat" type="number" size="70" style="text-transform:uppercase;font-size:30px;color:red;font-weight:bold;text-align:center" value="<?php echo $row1["vat"];?>" id="vat"required>
    </strong></td>
      
      <td colspan="10" style="font-size:24px;color:green;text-align:left"><strong>TAX:
      <input name="tax" type="number" size="70" style="text-transform:uppercase;font-size:30px;color:red;font-weight:bold;text-align:center" value="<?php echo $row1["tax"];?>" id="tax"required>
    </strong></td>
      

</tr>
<tr>
<td colspan="10" style="font-size:24px;color:green;text-align:left"><strong>OTHER DISCOUNT:
    
      <input name="o_dis" type="number" size="70" style="text-transform:uppercase;font-size:30px;color:red;font-weight:bold;text-align:center" value="<?php echo $row1["other_dis"];?>" id="o_dis"required>
      <textarea name="o_dis_remarks" style="text-transform:uppercase;font-size:30px;color:red;font-weight:bold;text-align:center" placeholder="Other Discount Remarks"><?php echo $row1["other_dis_remarks"];?></textarea>
    
    </strong></td>


    <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#amount").val()) 
	var ret2 = parseInt($("#tax").val())
  var ret3 = parseInt($("#vat").val())
  var ret33 = parseInt($("#o_dis").val())
	var vat=ret1*ret3/100;
	var tax=ret1*ret2/100;
	var payable=Math.round(ret1-vat-tax-ret33);
//  var payable=round(payable1);
	
    $("#payable").val(payable);
  })
</script>
      
      
	  
	  
	   

      <td colspan="10" style="font-size:24px;color:green;text-align:left"><strong>PAYABLE AMOUNT:
    
      <input name="payable" size="40" type="number"  style="text-transform:uppercase;font-size:30px;color:red;font-weight:bold;text-align:center" value="<?php 
      
      echo $payable_new;?>"required id="payable" readonly>
      
    </td>
      
</tr>
<tr>      

      <td colspan="20" style="font-size:24px;color:green;text-align:left"><strong>REMARKS:
    
      <input name="remarks" type="text" size="40" style="text-transform:uppercase;font-size:30px;color:red;font-weight:bold;text-align:center" value="" Required>
    </td>
      
      

</tr>
 




    
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		
<?php if($row1['status']!='AP DONE'){echo'  
<button type="submit" name="Submit">UPDATE</button>';}?></td>
</table>

</form>
  


</body>

</html>
