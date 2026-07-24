<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('lab','doctor','mng','staff')"; 
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

$user=$_SESSION['sess_username'];
$id=$_REQUEST['id'];

//include("auth.php");
//echo $count1;

$query43 = "SELECT * FROM radio where id= '$id';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);



?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$mname = $_REQUEST['mname'];
$bname = $_REQUEST['bname'];
$cname=$_REQUEST['cname'];
$form=$_REQUEST['form'];
$cat=$_REQUEST['cat'];
$result=$_REQUEST['result'];
$reference=$_REQUEST['reference'];
$unit=$_REQUEST['unit'];
//$adate=$_REQUEST['adate'];
$indication=$_REQUEST['indication'];
$specimen=$_REQUEST['specimen'];
$amount=$_REQUEST['amount'];
$ccode=$_REQUEST['ccode'];
$ref2=$_REQUEST['ref2'];
$com_remarks=$_REQUEST['com_remarks'];
$instruction=$_REQUEST['instruction'];
$ins1=$_REQUEST['ins1'];
$tcentre=$_REQUEST['tcentre'];
$interpretation=$_REQUEST['interpretation'];
$remarks1=$_REQUEST['remarks1'];
$remarks=$_REQUEST['remarks'];
$cprice=$_REQUEST['cprice'];
$oprice=$_REQUEST['oprice'];
$com_price=$_REQUEST['com_price'];

$s_data=$_REQUEST['s_data'];
$tat_t=$_REQUEST['tat_r'];
$tat_u=$_REQUEST['tat_u'];
$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


$ins_query1="update radio set 
iname='$mname', 
type='$bname', 
subtype='$cname', 
code='$cat', 
etime='$adate',
eby='$user',
result='$result',
reference='$reference',
unit='$unit',
ref2='$ref2',
indication='$indication',
specimen='$specimen',
amount='$amount',
ccode='$ccode',
com_remarks='$com_remarks',
com_price='$com_price',
instruction='$instruction',
ins1='$ins1',
tcentre='$tcentre',
interpretation='$interpretation',
tat_r='$tat_t',
tat_u='$tat_u',
remarks1='$remarks1',
remarks='$remarks',
price='$form'
 

where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="update radio1 set 
iname='$mname', 
type='$bname', 
subtype='$cname', 
code='$cat', 
etime='$adate',
eby='$user',
result='$result',
reference='$reference',
unit='$unit',
ref2='$ref2',
indication='$indication',
specimen='$specimen',
amount='$amount',
ccode='$ccode',
com_remarks='$com_remarks',
com_price='$com_price',
instruction='$instruction',
ins1='$ins1',
tcentre='$tcentre',
interpretation='$interpretation',
tat_r='$tat_t',
tat_u='$tat_u',
remarks1='$remarks1',
remarks='$remarks',
price='$form'
 
where id='$id'";
mysqli_query($con,$ins_query2) or die(mysql_error());


$ins_query3="update radio2 set 
iname='$mname', 
type='$bname', 
subtype='$cname', 
code='$cat', 
etime='$adate',
eby='$user',
result='$result',
reference='$reference',
unit='$unit',
ref2='$ref2',
indication='$indication',
specimen='$specimen',
amount='$amount',
ccode='$ccode',
com_remarks='$com_remarks',
com_price='$com_price',
instruction='$instruction',
ins1='$ins1',
tcentre='$tcentre',
interpretation='$interpretation',
tat_r='$tat_t',
tat_u='$tat_u',
remarks1='$remarks1',
remarks='$remarks',
price='$form'
 
where id='$id'";
mysqli_query($con,$ins_query3) or die(mysql_error());




    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';



 

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The ssstyles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
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
    max-width: 750px;
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
		<h1>EDIT INVESTIGATION</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Investigation Name :</strong></label>
      <input name="mname" type="text" size="70" value="<?php echo $row1["iname"];?>"required/>
 	  <label for="age"><strong>Type :</strong></label>
      <input name="bname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["type"];?>"required/>
	  <label for="age"><strong>Subtype :</strong></label>
      
	  
	  <select name="cname" required>
        
						<option value='<?php echo $row1["subtype"];?>'><?php echo $row1["subtype"];?></option>
							<option value='VIROLOGY'>VIROLOGY</option>
						
						<?php 
			$sql = "Select DISTINCT subtype  from radio where type='lab';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->subtype."'>".$row->subtype."</option>";
				}
			}
			?>
			<option value='Body Fluid'>Body Fluid</option>
			</select>
	  
	  <label for="age"><strong>Cost Price :</strong></label>
      <input name="cprice" id="cprice"type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["cprice"];?>"required/>
	  
	  <label for="age"><strong>Existing Price :</strong></label>
      <input name="oprice" id="oprice"type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["oprice"];?>"required/>
	  
	  
	  <label for="age"><strong>Proposed Price :</strong></label>
      <input name="form" id="form" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["price"];?>"required/>
	  
	  
	  
	  <label for="age"><strong>Margin(%):</strong></label>
      <input name="mar" id="mar" type="text" size="70" value="<?php echo $row1["mar"];?>"required>
	  
	  <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#cprice").val()) 
	var ret2 = parseInt($("#form").val())
	var ret3=ret2-ret1
	var ret4=ret3 * 100
	var ret5=ret4 / ret1
	
    $("#mar").val(ret5);
  })
</script>
	  
	  
	  <label for="age"><strong>Competitor Price :</strong></label>
      <input name="com_price" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["com_price9"];?>"required>
	  
	  <label for="age"><strong>Code :</strong></label>
      <input name="cat" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["code"];?>"required/>
	  
	  <label for="age"><strong>Result Format :</strong></label>
      <textarea rows="4" cols="50" name="result" id="result" style="text-transform:uppercase"></textarea>
	  
	  <label for="age"><strong>Unit :</strong></label>
      <textarea rows="4" cols="50" name="unit" id="unit"><?php echo $row1["unit"];?></textarea>
	  
	  <label for="age"><strong>Reference(From) :</strong></label>
      <textarea rows="4" cols="50" name="reference" id="reference" style="text-transform:uppercase"><?php echo $row1["reference"];?></textarea>

	  <label for="age"><strong>Reference(To) :</strong></label>
      <textarea rows="4" cols="50" name="ref2" id="reference" style="text-transform:uppercase"><?php echo $row1["ref2"];?></textarea>
      
	  
	  <label for="age"><strong>Indication Of The Test :</strong></label>
      <textarea rows="4" cols="50" name="indication" id="unit"><?php echo $row1["indication"];?></textarea>
	  
	  <label for="age"><strong>Specimen :</strong></label>
      <textarea rows="4" cols="50" name="specimen" id="unit"><?php echo $row1["specimen"];?></textarea>
	  
	  
	  <label for="age"><strong>Color Code of the Vaccuum Tube :</strong></label>
      
	  <select name="ccode" >
        
						<option value='<?php echo $row1["ccode"];?>'><?php echo $row1["ccode"];?></option>
						<option value='Blue'>Blue</option>
						<option value='Red'>Red</option>
						<option value='Yellow'>Yellow</option>
						<option value='Green'>Green</option>
						<option value='Light Green'>Light Green</option>
						<option value='Purple'>Purple</option>
						<option value='Gray'>Gray</option>
						<option value='Plastic Urine Container'>Plastic Urine Container</option>
						<option value='Blood Culture Bottle'>Blood Culture Bottle</option>
		
	


					
</select>
	  
	  
	  <label for="age"><strong>Amount :</strong></label>
      <textarea rows="4" cols="50" name="amount" id="unit" readonly><?php echo $row1["amount"];?></textarea>
	  
	  
	  
	  
	   <label for="age"><strong>Turn Around Time Regular(TAT-Regular) :</strong></label>
      <input name="tat_r" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["tat_r"];?>"required>
	  
	  <label for="age"><strong>Turn Around Time Urgent(TAT-Urgent) :</strong></label>
      <input name="tat_u" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["tat_u"];?>"required>
	  
	  
	  
	  
	  <label for="age"><strong>Reference Range which will be shown in report :</strong></label>
      <textarea rows="4" cols="50" name="remarks" id="unit"><?php echo $row1["remarks"];?></textarea>
	  <label for="age"><strong>instructions to patient before test :</strong></label>
      <textarea rows="4" cols="50" name="instruction" id="unit"><?php echo $row1["instruction"];?></textarea>


<label for="age"><strong>instruction to Phlebotomist or Nurse :</strong></label>
      <textarea rows="4" cols="50" name="ins1" id="unit"><?php echo $row1["ins1"];?></textarea>	  
	  
	<label for="age"><strong>Test Centre:</strong></label>
      
	  <select name="tcentre" >
        
						<option value='<?php echo $row1["tcentre"];?>'><?php echo $row1["tcentre"];?></option>
						<option value='Sfmmkpjsh Lab'>Sfmmkpjsh Lab</option>
						<option value='DMFR'>DMFR</option>
						<option value='ICDDRB'>ICDDRB</option>
						<option value='IPH'>IPH</option>
						
						<option value='IEDCR'>IEDCR</option>
						<option value='NILMRC'>NILMRC</option>
						<option value='Thyrocare'>Thyrocare</option>
						
		
	


					
</select>

<label for="age"><strong>Interpretation:</strong></label>
      <textarea rows="4" cols="50" name="interpretation" id="unit"><?php echo $row1["interpretation"];?></textarea>	  

	  
	  <label for="age"><strong>Remarks:</strong></label>
      <textarea rows="4" cols="50" name="com_remarks" id="unit"><?php echo $row1["com_remarks"];?></textarea>	  



	  
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">UPDATE</button></td>
</table>

</form>
  


</body>

</html>
