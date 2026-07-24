<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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

$query43 = "SELECT * FROM storenew where id= '$id';"; 
	 
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


$ename = $_REQUEST['ename'];
$eid = $_REQUEST['eid'];
$elocation = $_REQUEST['elocation'];
$etype = $_REQUEST['etype'];
$eqty = $_REQUEST['eqty'];
$estatus = $_REQUEST['estatus'];
$remarks = $_REQUEST['remarks'];


$adate= date('d/m/Y H:i:s');

$adate1= date('Y-m-d');
$installdate=date('Y-m-d',strtotime($_REQUEST['installdate']));
$vendor=$_REQUEST['vendor'];
$model=$_REQUEST['model'];
$serialno=$_REQUEST['serialno'];
$manu=$_REQUEST['manu'];
$origin=$_REQUEST['origin'];
$warrenty=$_REQUEST['warrenty'];


$edate= date('d/m/Y H:i:s');
$adate1= date('m/d/Y');


$ins_query1="update storenew set eid='$eid', ename='$ename', elocation='$elocation', etype='$etype', eqty='$eqty', estatus='$estatus', remarks='$remarks', edate='$edate'
, eby='$user', installdate='$installdate', supplier='$vendor', model='$model', serialno='$serialno', manu='$manu', origin='$origin', warrenty='$warrenty' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());


//if ($con->query($ins_query) == TRUE) 
//{

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
  width: 90%;
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
<link rel="stylesheet" href="jsnew/normalize.min.css">

  
  
  
  
  
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
   
   <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
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
		

<form action="" method="post">

<!-- Form Title -->
		<h1>Edit Hospital CHarges</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Material ID :</strong></label>
	  <input  name="eid" type="text" size="70" value="<?php echo $row1['eid'];?>"required  />
	  
	  <label for="age"><strong>Material Name :</strong></label>
      
	  
	  <input  name="ename" type="text" size="70" value="<?php echo $row1['ename'];?>"required  />
	  <br><br>
	   <label for="age"><strong>Material Description :</strong></label>
      
	  
	  <input  name="description" type="text" size="80" value="<?php echo $row1['description'];?>"  />
	  
  <datalist id="browsers111">

						<option value=''>-Select Material</option>
				  </datalist>
	  
	  	 <br><br>
	  <label for="age"><strong>Material Type :</strong></label>
	 <select name="etype" value="" class="style1"  required>
			        <option value='<?php echo $row1['etype'];?>'><?php echo $row1['etype'];?></option>
					<option value='Asset'>Asset</option>
					<option value='Disposable'>Disposable</option>
					
				
			</select>
		<br><br>	
			<label for="age"><strong>Material Location :</strong></label>
	 <select name="elocation" value="" class="style1"required>
			        <option value='<?php echo $row1['elocation'];?>'selected><?php echo $row1['elocation'];?></option>
					    <option value='Store'>Store</option>
						
				
			</select>


		<br><br>	
			<label for="age"><strong>Material Quantity :</strong></label>
			<input  name="eqty" type="text" size="70" value="<?php echo $row1['eqty'];?>"required  />
		
<br><br>	
			<label for="age"><strong>Material Status :</strong></label>
	 <select name="estatus" value="" class="style1"required>
			    <option value='<?php echo $row1['estatus'];?>'><?php echo $row1['estatus'];?></option>    
				<option value='Active'>Active</option>
				<option value='Nonactive'>Nonactive</option>
			</select>		
			
			
			<br><br>	
			<label for="age"><strong>Vendor :</strong></label>
			<input  name="vendor" type="text" size="70" value="<?php echo $row1['supplier'];?>"  />
			
			<br><br>	
			<label for="age"><strong>Model:</strong></label>
			<input  name="model" type="text" size="70" value="<?php echo $row1['model'];?>"  />
			
			<br><br>	
			
			
			<label for="age"><strong>Serial No :</strong></label><br><br>	
			<input  name="serialno" type="text" size="70" value="<?php echo $row1['serialno'];?>"  />
			<br><br>	
			<label for="age"><strong>Manufacturer:</strong></label><br><br>	
			<input  name="manu" type="text" size="70" value="<?php echo $row1['manu'];?>"  />
			<br><br>	
			
			<label for="age"><strong>Origin:</strong></label><br><br>	
			<input  name="origin" type="text" size="70" value="<?php echo $row1['origin'];?>"  />
			
			<br><br>	
			<label for="age"><strong>Installation Date / Purchase date (MM/DD/YYYY):</strong></label><br><br>	
			<input type="text" name="installdate" id="datepicker1" placeholder="Select Date" size="15" value='<?php echo $row1['installdate'];?>'>
			<br><br>	
	        			<label for="age"><strong>Warrenty:</strong></label><br><br>	
			<input  name="warrenty" type="text" size="70" value="<?php echo $row1['warrenty'];?>"  />
			<br><br>	
			<label for="age"><strong>Unit Price:</strong></label><br><br>	
			<input  name="uprice" type="text" size="70" value="<?php echo $row1['price'];?>"required  />
			<br><br>	
  </fieldset>

 <label for="age"><strong>Remarks (If Any):</strong></label> 
<td colspan="15" align="center"> <textarea rows="5" name="remarks" ><?php echo $row1['remarks'];?></textarea></td>
	        <br><br>
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
