<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
include("auth.php"); 
require('db1.php');

$user=$_SESSION["username"];

//include("auth.php");
$id=$_REQUEST['ID'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from papp where ID='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pd= $row['dname'];
$pdate= $row['adate'];
$pa= $row['page'];
$ps= $row['psex'];
$ph= $row['height'];
$pw= $row['weight'];
$pt= $row['temp'];
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$xl=$_REQUEST['xl'];
$lx= implode(",",$xl);
$m1=$_REQUEST['m1'];
$m2=$_REQUEST['m2'];
$d1=$_REQUEST['d1'];
$d2=$_REQUEST['d2'];

$m3=$_REQUEST['m3'];
$m4=$_REQUEST['m4'];
$m5=$_REQUEST['m5'];
$m6=$_REQUEST['m6'];
$m7=$_REQUEST['m7'];
$m8=$_REQUEST['m8'];
$m9=$_REQUEST['m9'];
$m10=$_REQUEST['m10'];
$m11=$_REQUEST['m11'];
$m12=$_REQUEST['m12'];
$m13=$_REQUEST['m13'];
$m14=$_REQUEST['m14'];
$m15=$_REQUEST['m15'];
$m16=$_REQUEST['m16'];
$m17=$_REQUEST['m17'];
$m18=$_REQUEST['m18'];
$m19=$_REQUEST['m19'];
$m20=$_REQUEST['m20'];
$d3=$_REQUEST['d3'];
$d4=$_REQUEST['d4'];
$d5=$_REQUEST['d5'];
$d6=$_REQUEST['d6'];
$d7=$_REQUEST['d7'];
$d8=$_REQUEST['d8'];
$d9=$_REQUEST['d9'];
$d10=$_REQUEST['d10'];
$d11=$_REQUEST['d11'];
$d12=$_REQUEST['d12'];
$d13=$_REQUEST['d13'];
$d14=$_REQUEST['d14'];
$d15=$_REQUEST['d15'];
$d16=$_REQUEST['d16'];
$d17=$_REQUEST['d17'];
$d18=$_REQUEST['d18'];
$d19=$_REQUEST['d19'];
$d20=$_REQUEST['d20'];
$other=$_REQUEST['other'];
$diagnosis=$_REQUEST['diagnosis'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$pdiet=$_REQUEST['pdiet'];
$reffer=$_REQUEST['reffer'];
$psex=$_REQUEST['psex'];
$pheight=$_REQUEST['pheight'];
$pweight=$_REQUEST['pweight'];
$ptemp=$_REQUEST['ptemp'];
$i1=$_REQUEST['i1'];
$i2=$_REQUEST['i2'];
$i3=$_REQUEST['i3'];
$i4=$_REQUEST['i4'];
$i5=$_REQUEST['i5'];
$i6=$_REQUEST['i6'];
$i7=$_REQUEST['i7'];
$i8=$_REQUEST['i8'];
$i9=$_REQUEST['i9'];
$i10=$_REQUEST['i10'];
$i11=$_REQUEST['i11'];
$i12=$_REQUEST['i12'];
$i13=$_REQUEST['i13'];
$i14=$_REQUEST['i14'];
$i15=$_REQUEST['i15'];
$i16=$_REQUEST['i16'];
$i17=$_REQUEST['i17'];
$i18=$_REQUEST['i18'];
$i19=$_REQUEST['i19'];
$i20=$_REQUEST['i20'];



$ins_query="insert into pres (`dname`,`pname`,`pmrn`,`pphone`,`cdetails`,`diagnosis`,`xl`,`m1`,`m2`,`d1`,`d2`,`m3`,`m4`,`m5`,`m6`,`m7`,`m8`,`m9`,`m10`,`m11`,`m12`,`m13`,`m14`,`m15`,`m16`,`m17`,`m18`,`m19`,`m20`,`d3`,`d4`,`d5`,`d6`,`d7`,`d8`,`d9`,`d10`,`d11`,`d12`,`d13`,`d14`,`d15`,`d16`,`d17`,`d18`,`d19`,`d20`,`other`,`date`,`page`,`pdiet`,`reffer`,`psex`,`pheight`,`pweight`,`ptemp`,`i1`,`i2`,`i3`,`i4`,`i5`,`i6`,`i7`,`i8`,`i9`,`i10`,`i11`,`i12`,`i13`,`i14`,`i15`,`i16`,`i17`,`i18`,`i19`,`i20`) values ('$dname', '$pname','$pmrn','$pphone','$cdetails','$diagnosis','$lx','$m1','$m2','$d1','$d2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10','$m11','$m12','$m13','$m14','$m15','$m16','$m17','$m18','$m19','$m20','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$d11','$d12','$d13','$d14','$d15','$d16','$d17','$d18','$d19','$d20','$other','$pdate','$page','$pdiet','$reffer','$psex','$pheight','$pweight','$ptemp','$i1','$i2','$i3','$i4','$i5','$i6','$i7','$i8','$i9','$i10','$i11','$i12','$i13','$i14','$i15','$i16','$i17','$i18','$i19','$i20')";
mysqli_query($con,$ins_query) or die(mysql_error());

$query="insert into patient (`pname`,`pmrn`,`pphone`,`page`,`psex`) values ('$pname','$pmrn','$pphone','$page','$psex')";
mysqli_query($con,$query) or die(mysql_error());


$gg= $_REQUEST['pname'];
$update="update papp set status='SEEN' where `ID`='$id'";
mysqli_query($con,$update) or die(mysql_error());

if (!empty ($_POST['m1'])){
$ins_query1="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m1','$d1','$i1','$pdate')";
mysqli_query($con,$ins_query1) or die(mysql_error());}

if (!empty ($_POST['m2'])){
$ins_query2="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m2','$d2','$i2','$pdate')";
mysqli_query($con,$ins_query2) or die(mysql_error());}

if (!empty ($_POST['m3'])){
$ins_query3="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m3','$d3','$i3','$pdate')";
mysqli_query($con,$ins_query3) or die(mysql_error());}

if (!empty ($_POST['m4'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m4','$d4','$i4','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m5'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m5','$d5','$i5','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}


if (!empty ($_POST['m6'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m6','$d6','$i6','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m7'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m7','$d7','$i7','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m8'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m8','$d8','$i8','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m9'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m9','$d9','$i9','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m10'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m10','$d10','$i10','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m11'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m11','$d11','$i11','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m12'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m12','$d12','$i12','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m13'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m13','$d13','$i13','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m14'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m14','$d14','$i14','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m15'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m15','$d15','$i15','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m16'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m16','$d16','$i16','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m17'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m17','$d17','$i17','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m18'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m18','$d18','$i18','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m19'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m19','$d19','$i19','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m20'])){
$ins_query4="insert into pmedi (`pmrn`,`medi`,`pdos`,`ins`,`date`) values ('$pmrn','$m20','$d20','$i20','$pdate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


</head>

<body>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->

<div class="container" style="background-color:#CCCCCC">

<h1 align="center">OUTPATIENT RECORD </h1>
<div align="right" style="font-weight:bold"><a href="logout.php">Logout</a></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div align="left" style="font-weight:bold"><a href="view.php">BACK</a></div>

<form action="" method="POST" style="border:medium #333333">

<div class="table-responsive">  
                <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="6"><label for="age"><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="6"><input type="text" name="dname" class="form-control name_list" required value="<?php echo $pd;?>" />
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						

<tr>				<td colspan="3"><input type="text" name="pmrn" class="form-control name_list" required value="<?php echo $pm;?>" /></td>
					<td colspan="3"><input type="text" name="pmrn" class="form-control name_list" required value="<?php echo $pm;?>" /></td>

					 
</td></tr>
<tr><td colspan="3"></td><td colspan="3"></td></tr>

		<tr>
						
						
						<td colspan="2"><label for="age"><strong>Patient's Height:</strong></label></td>
						<td colspan="2"><label for="age"><strong>Patient's Weight:</strong></label></td>
						<td colspan="2"><label for="age"><strong>Patient's Temperature:</strong></label></td>		
						</tr>
						
						<tr>				
             		<td colspan="2"><input type="text" name="pheight" class="form-control name_list"value="<?php echo $ph;?>" ></td>
			    	 <td colspan="2"><input type="text" name="pweight"class="form-control name_list"  value="<?php echo $pw;?>" ></td>  
					 <td colspan="2"><input type="text" name="ptemp"class="form-control name_list" value="<?php echo $pt;?>" ></td>  
					 </tr>

						 <tr><td colspan="6"><label for="age"><strong>Patient's Clinical Details:</strong></label></td>  </tr>
						 <tr><td colspan="6"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="5"></textarea></td>  </tr>
						 
						 <tr><td colspan="6"><label for="age"><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="6"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"></textarea></td>  </tr>
						
				
														

<tr><td colspan="6"><label for="age"><strong>Investigation Advised:</strong></label></td>  </tr>
<tr><td colspan="6"><select name="xl[]" multiple="multiple" class="3col active" placeholder="Select Investigations">

       <?php 
			$sql = "select * from `investigastion`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
    </select>

    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: 'Select Investigation',
            search: true,
            searchOptions: {
                'default': '-Select Investigation-'
            },
            selectAll: true
        });

    });
</script>
</td></tr>
<tr><td colspan="3"><label for="age"><strong>Medication Advised:</strong></label></td>
<td colspan="1"><label for="age"><strong>Dosages:</strong></label></td>
<td colspan="2"><label for="age"><strong>Instruction:</strong></label></td>  </tr>


<tr>
<td colspan="3"><select name="m1" placeholder="Select Medicine"class="form-control name_list" >
        
						<option value=''>-Select Medicine-</option>
				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>

</td>

<td  colspan="1"><select name="d1" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>
<td  colspan="2"><select name="i1" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>

                    <tr>  
                        <td colspan="3"><select name="m2" placeholder="Select Medicine"class="form-control name_list" >
						
						<option value=''>-Select Medicine-</option>
								<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>
						
						
						</select></td>  
						<td colspan="1"><select name="d2" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>	
						
						</select></td>
						
						
						
						<td colspan="2"><select name="i2" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>
  
												</tr>  
												
												<tr><td colspan="3"><select name="m3" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						

    </select>

</td>
<td colspan="1"><select name="d3" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i3" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m4" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>
<td colspan="1"><select name="d4" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i4" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m5" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d5" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i5" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m6" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d6" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i6" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>


</tr>
<tr><td colspan="3"><select name="m7" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d7" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i7" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>


</tr><tr><td colspan="3"><select name="m8" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d8" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>

<td colspan="1"><select name="i8" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m9" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d9" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i9" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr><tr><td colspan="3"><select name="m10" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>
<td colspan="1"><select name="d10" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>

<td colspan="1"><select name="i10" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m11" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d11" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i11" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m12" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d12" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i12" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr><tr><td colspan="3"><select name="m13" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d13" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i13" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m14" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d14" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>

<td colspan="1"><select name="i14" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m15" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d15" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i15" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m16" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>
<td colspan="1"><select name="d16" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>

<td colspan="1"><select name="i16" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr><tr><td colspan="3"><select name="m17" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>
<td colspan="1"><select name="d17" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>

<td colspan="1"><select name="i17" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr><tr><td colspan="3"><select name="m18" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>
<td colspan="1"><select name="d18" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>

<td colspan="1"><select name="i18" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="3"><select name="m19" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>
<td colspan="1"><select name="d19" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i19" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr><tr><td colspan="3"><select name="m20" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Medicine-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td>
<td colspan="1"><select name="d20" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Dosages-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>

</td>

<td colspan="1"><select name="i20" class="form-control name_list" >
        
						<option value=''>-Select Dosages-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>

</td>

</tr>
<tr><td colspan="5"><label for="age"><strong>Other Instructions:</strong></label></td></tr>
<tr><td colspan="5"><textarea class="form-control" id="exampleTextarea" name="other" rows="5" placeholder="Other Instructions"></textarea></td>  </tr>	
<tr><td colspan="5"><select name="pdiet" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Diet-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td></tr>

<tr><td colspan="5"><select name="reffer" placeholder="Select Dosage" class="form-control name_list">
						
						<option value=''>-Select Reffered Doctor-</option>
				 <?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>	
						
						</select>
</td></tr>

	  <td align="center"><a target='_blank' href="p4.php?pmrn=<?php echo "$pm"; ?>">GO</a></td>					
<tr><td><button type="submit" name="Submit">Confirm</button></td></tr>

</form>

</div>
</body>

</html>
