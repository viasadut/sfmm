<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('pharmacy','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));

//$bt=$_REQUEST["bt"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];

$query43 = "SELECT COUNT(pmrn) FROM ot where otdate='$start'" ;
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
}

?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
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
  height: 50px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
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
    max-width: 1200px;
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

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script>

  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Endoscopy Appointment Report</title>
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

<body>

<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Do you want to Update the Status ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>



<div id='cssmenu'>
<ul>
   <li><a href='otdash'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Department wise Stock</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Department:</strong></label></td>
						

						<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><select name="stdate">
					 
					 <option value="">-Select-</option>
					 <option value='Pharmacy'>Pharmacy</option>
					 <option value="ICU">ICU</option>
					 <option value="NICU">NICU</option>
					 <option value="5AB Medicine stock">5AB Medicine stock</option>
					 <option value="5CD Medicine stock">5CD Medicine stock</option>
					 
					 <option value="6AB Medicine stock">6AB Medicine stock</option>
					 <option value="6CD Medicine stock">6CD Medicine stock</option>
					 <option value="OT Medicine Store">OT Medicine Store</option>
					 <option value="HMD">HMD</option>
					 <option value="Cathlab and SPD">Cathlab and SPD</option>
					 <option value="ENDOSCOPY">ENDOSCOPY</option>
					 <option value="AE">AE</option>
					 <option value="OT medicine store">OT medicine store</option>
					 <option value="OPD PROCEDURE ROOM(General)">OPD PROCEDURE ROOM(General)</option>
					 <option value="OPD PROCEDURE ROOM(Gynae)">OPD PROCEDURE ROOM(Gynae)</option>
					 	<option value='5AB emergency trolley'>5AB emergency trolley</option>
		<option value='5CD emergency trolley'>5CD emergency trolley</option>
		<option value='6th Fl emergency trolley'>6th Fl emergency trolley</option>
		
					 
					 
					 
					 
					 </select>
					 
					 
					 
					 
					 
					 </td>  
					   
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"style="font-size:20px;font-weight:bold;color:red;"><strong>S.No</strong></th>
	  <th width="4%"style="font-size:20px;font-weight:bold;color:red;"><strong>Code</strong></th>
      <th width="17%"style="font-size:20px;font-weight:bold;color:red;"><strong>Generic Name</strong></th>
      <th width="10%"style="font-size:20px;font-weight:bold;color:red;"><strong>Brand Name</strong></th>
	  <th width="14%"style="font-size:20px;font-weight:bold;color:red;"><strong>Stock In Hand</strong> 
	  <th width="14%"style="font-size:20px;font-weight:bold;color:red;"><strong>Batch NO</strong> 
      <th width="15%"style="font-size:20px;font-weight:bold;color:red;"><strong>Expire date</strong>
      <th width="14%"style="font-size:20px;font-weight:bold;color:red;"><strong>Location</strong> 
	  <th width="14%"style="font-size:20px;font-weight:bold;color:red;"><strong>Barcode</strong> 
	  <th width="14%"style="font-size:20px;font-weight:bold;color:red;"><strong>Edit</strong> 
	   <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
	
	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=$_REQUEST["stdate"];

//$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];




$count=1;

$sel_query="Select distinct(code) from medi_stock where location='$start' ORDER BY g_name asc;";



$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

       <td align="center"style="font-size:20px;font-weight:bold;color:blue;"><?php echo $count; ?></td>
	   <td align="center" style="font-size:20px;font-weight:bold;color:green;"><?php echo $row["code"]; ?></td>
      <td align="center" style="font-size:20px;font-weight:bold;color:green;"><?php echo $row["g_name"]; ?></td>
      <td align="center"style="font-size:20px;font-weight:bold;color:green;"><?php echo $row["b_name"]; ?></td>

	  <?php $new_medi=$row['add_qty'];
	  $mcode=$row['code'];
	  
	  
	  $sum = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='Pharmacy'" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$new_qty=$sumr['SUM(add_qty)'];

	  ?>
	  
	  <td align="center"style="font-size:20px;font-weight:bold;color:green;"><?php echo $new_qty; ?></td>

	  
	  <td align="left" ><a target='_blank' href="department_bar.php?id=<?php echo $row['id']; ?>">bar_print</a></td>
	  <td align="left" ><a target='_blank' href="edit_medi_stock.php?id=<?php echo $row['id']; ?>">Edit</a></td>
	 <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"></td> 
      </tr>
	  
    <?php $count++; } }?>


      
  </tbody>
</table>


</form>
</body>
</html>
