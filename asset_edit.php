<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
		$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng','lab','rad')"; 
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

//include("auth.php");
//echo $count1;
$id=$_REQUEST['id'];

$query39 = "SELECT * FROM storenew where id= '$id'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row39 = mysqli_fetch_array($result39);




$queryt = "SELECT MAX(msno) FROM storenew"; 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_array($resultt);
$co=$rowt['MAX(msno)']+1;


  
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
$ename1 = $_REQUEST['ename1'];
$eid = $_REQUEST['eid'];
$eid1 = $_REQUEST['eid1'];
$elocation = $_REQUEST['elocation'];
$etype = $_REQUEST['etype'];
$eqty = $_REQUEST['eqty'];
//$estatus = $_REQUEST['estatus'];
$remarks = $_REQUEST['remarks'];
$status = $_REQUEST['status'];
//$bname = $_REQUEST['bname'];
//$cname=$_REQUEST['cname'];
//$form=$_REQUEST['form'];
//$cat=$_REQUEST['cat'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$adate= date('d/m/Y H:i:s');

$adate1= date('Y-m-d');
$installdate=date('Y-m-d',strtotime($_REQUEST['installdate']));
$vendor=$_REQUEST['vendor'];
$model=$_REQUEST['model'];
$serialno=$_REQUEST['serialno'];
$manu=$_REQUEST['manu'];
$origin=$_REQUEST['origin'];
$warrenty=$_REQUEST['warrenty'];
$msno=$_REQUEST['msno'];
$mtype=$_REQUEST['mtype'];
$ano=$_REQUEST['ano'];
$uprice=$_REQUEST['uprice'];
$p_by=$_REQUEST['p_by'];
$c_loc=$_REQUEST['c_loc'];


/*$queryt1 = "SELECT MAX(msno) FROM storenew"; 
$resultt1 = mysqli_query($con, $queryt1) or die(mysqli_error());
$rowt1 = mysqli_fetch_array($resultt1);
$co1=$rowt1['MAX(msno)'];
*/



$ins_query1="update storenew set `ename`='$ename',`ename1`='$ename1',`eid`='$eid', `eid1`='$eid1',`elocation`='$elocation',`etype`='$etype',
`eqty`='$eqty',`remarks`='$remarks',`supplier`='$vendor',`model`='$model',`serialno`='$serialno',`manu`='$manu',`origin`='$origin',
`installdate`='$installdate',`warrenty`='$warrenty',`eby`='$user',`edate`='$adate',`msno`='$msno',`mtype`='$mtype',`ano`='$ano',`uprice`='$uprice',`p_by`='$p_by',`c_loc`='$c_loc',`status`='$status' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query2="update oxygen_1 set `location`='$c_loc' where msno='$msno' and sno='$serialno'";
mysqli_query($con,$ins_query2) or die(mysql_error());



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
  width: 100%;
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
    max-width: 950px;
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
		<h1>ADD EQUIPMENT</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
		<td><img alt="" src="asset_pic/<?php echo $row39['pic'] ?>" class="img-flex-rounded" width="350"  height="250" align="center"/></td>
			
			<label for="age"><strong>MSNO:</strong></label>
	  <input  name="msno" type="text" size="70" value="<?php if ($row39['msno']=='0'){echo $co;} else {echo $row39['msno'];}?>"required >
	  
	  <label for="age"><strong>Asset Serial NO :</strong></label>
	  <input  name="ano" type="text" size="70" value="<?php echo $row39['ano'];?>"required  />
	  
	  <label for="age"><strong>Equipment Major Type:</strong></label>
	  <select name="mtype" value="" class="style1"required>
			        
					
					
					
					    <option value='Main'>Main</option>
						<option value='Sub'>Sub</option>
			
			</select>
			
			
			<label for="age"><strong>Asset ID :</strong></label>
	  <input  name="eid1" type="text" size="70" value="<?php echo $row39['eid1'];?>"required  />
	  
	  <label for="age"><strong>Charge ID :</strong></label>
	  <input  name="eid" type="text" size="70" value="<?php echo $row39['eid'];?>"  >
	  
	  <label for="age"><strong>Material Name :</strong></label>
      
	  
	  <input list="browsers111" name="ename"  size="80"  value="<?php echo $row39['ename'];?>"required>
	  <br><br>
	  
	  <label for="age"><strong>Chargeable Name :</strong></label>
      
	  
	  <input list="browsers111" name="ename1"  size="80"  value="<?php echo $row39['ename1'];?>"required>
	  <br><br>
	   <label for="age"><strong>Material Description :</strong></label>
      
	  
	  <input  name="description" type="text" size="80" value="<?php echo $row39['description'];?>"  />
	  
  <datalist id="browsers111">

						<option value=''>-Select Material</option>
				  </datalist>
	  
	  	 <br><br>
	  <label for="age"><strong>Material Type :</strong></label>
	 <select name="etype" value="" class="style1"  required>
			        
					<option value='Asset'>Asset</option>
					
					
				
			</select>
		<br><br>	
			<label for="age"><strong>Material Location :</strong></label>
	 <select name="elocation" value="" class="style1"required>
			        
					
					
					
					    <option value='Store'>Store</option>
						


		<br><br>	
			<label for="age"><strong>Material Quantity :</strong></label>
			<input  name="eqty" type="text" size="70" value="<?php echo $row39['eqty'];?>"required  />
		

			
			
			<br><br>	
			<label for="age"><strong>Vendor :</strong></label>
			<input  name="vendor" type="text" size="70" value="<?php echo $row39['supplier'];?>"  />
			
			<br><br>	
			<label for="age"><strong>Model:</strong></label>
			<input  name="model" type="text" size="70" value="<?php echo $row39['model'];?>"  />
			
			<br><br>	
			
			
			<label for="age"><strong>Serial No :</strong></label>
			<input  name="serialno" type="text" size="70" value="<?php echo $row39['serialno'];?>"  />
			
			<label for="age"><strong>Manufacturer:</strong></label>
			<input  name="manu" type="text" size="70" value="<?php echo $row39['manu'];?>"  />
			
			
			<label for="age"><strong>Origin:</strong></label>
			<input  name="origin" type="text" size="70" value="<?php echo $row39['origin'];?>"  />
			<label for="age"><strong>Installation Date / Purchase date (MM/DD/YYYY):</strong></label>
			<input type="text" name="installdate" id="datepicker" placeholder="Select Date" size="15" value='<?php echo $row39['installdate'];?>'>
			
	        			<label for="age"><strong>Warrenty:</strong></label>
			<input  name="warrenty" type="text" size="70" value="<?php echo $row39['warrenty'];?>"  />
			
			<label for="age"><strong>Unit Price:</strong></label>
			<input  name="uprice" type="text" size="70" value="<?php echo $row39['uprice'];?>"  />
  </fieldset>

 <label for="age"><strong>Remarks (If Any):</strong></label> 
<td colspan="15" align="center"> <textarea rows="5" name="remarks" ><?php echo $row39['remarks'];?></textarea></td>


<label for="age"><strong>Received From:</strong></label> 
<select name="p_by" value="" class="style1"required>
			        
					
					
					
					    <option value='<?php echo $row39['p_by'];?>'><?php echo $row39['p_by'];?></option>
						
						
						
					
			        <option value=''>-Select-</option>
					    <option value='SFMMKPJSH'>SFMMKPJSH</option>
						<option value='CMSD'>CMSD</option>
						<option value='CME'>CME</option>
						<option value='DONATION'>DONATION</option>
						<option value='RENTAL'>RENTAL</option>
						<option value='DEMO'>DEMO</option>
						
						
						
						
				
			
</select>



<label for="age"><strong>Current Location:</strong></label>
	 <select name="c_loc" value="" class="style1"required>
			
			<option value='<?php echo $row39['c_loc'];?>'><?php echo $row39['c_loc'];?></option>
			<?php 
			$sql = "select distinct name from `services` order by name asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->name."'>".$row->name."</option>";
				}
			}
			?>
			<?php 
			$sql = "select distinct subdept from `staff3`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->subdept."'>".$row->subdept."</option>";
				}
			}
			?>
			
			<?php 
			$sql = "select distinct sname from `subdept`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
			</select>


			
			
			
			<label for="age"><strong>Discard Status:</strong></label> 
<select name="status" value="" class="style1">
			        
					
					
					
					    <option value='<?php echo $row39['status'];?>'><?php echo $row39['status'];?></option>
						
						
						
					
			        
					    
						<option value='Discarded'>Discarded</option>
						
						
						
						
				
			
</select>
			
			
<table><tr><td colspan="15">		<button type="submit" name="Submit">Edit Equipment</button></td>
</table>

</form>
  


</body>

</html>
