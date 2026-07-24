<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$tt=date("d-m-Y H:i:s");   
echo $tt;
require('db1.php');
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
if(!empty($xl)){
$lx=implode(",",$xl);}




//$lx= implode(",",$xl);
$m1=$_REQUEST['m1'];
$m2=$_REQUEST['m2'];
$d1=$_REQUEST['d1'];
$d2=$_REQUEST['d2'];
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



$ins_query="insert into pres (`dname`,`pname`,`pmrn`,`pphone`,`cdetails`,`diagnosis`,`xl`,`m1`,`m2`,`d1`,`d2`,`m3`,`m4`,`m5`,`m6`,`m7`,`m8`,`m9`,`m10`,`m11`,`m12`,`m13`,`m14`,`m15`,`m16`,`m17`,`m18`,`m19`,`m20`,`d3`,`d4`,`d5`,`d6`,`d7`,`d8`,`d9`,`d10`,`d11`,`d12`,`d13`,`d14`,`d15`,`d16`,`d17`,`d18`,`d19`,`d20`,`other`) values ('$dname', '$pname','$pmrn','$pphone','$cdetails','$diagnosis','$lx','$m1','$m2','$d1','$d2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10','$m11','$m12','$m13','$m14','$m15','$m16','$m17','$m18','$m19','$m20','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$d11','$d12','$d13','$d14','$d15','$d16','$d17','$d18','$d19','$d20','$other')";
mysqli_query($con,$ins_query) or die(mysql_error());


$update="update papp set status='SEEN' where `ID`='$id'";
mysqli_query($con,$update) or die(mysql_error());


$ins_query1="insert into pmedi (`pmrn`,`medi`) values ('$pmrn','$m1')";
mysqli_query($con,$ins_query1) or die(mysql_error());
$ins_query2="insert into pmedi (`pmrn`,`medi`) values ('$pmrn','$m2')";
mysqli_query($con,$ins_query2) or die(mysql_error());
$ins_query3="insert into pmedi (`pmrn`,`medi`) values ('$pmrn','$m3')";
mysqli_query($con,$ins_query3) or die(mysql_error());



$status = "New Record Inserted Successfully";

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



   
   <link rel="stylesheet" href="styles.css">
  
   <script src="script.js"></script>




</head>

<body>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->



<div class="container" style="background-color:#CCCCCC">


<h1 align="center">OUTPATIENT RECORD </h1>

<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Products</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Product 1</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Product 2</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li><a href='#'><span>About</span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>



<form action="" method="post" style="border:medium #333333">

<div class="table-responsive">  
                <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr>	  <td><label for="age"><strong>Doctors's Name :</strong></label></td>
				<td colspan="4"><input type="text" name="dname" class="form-control name_list" required value="<?php echo $pd;?>" />
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						<tr>
						<td colspan="1"><label for="age"><strong>Patient's Name :</strong></label></td>
						  <td><input type="text" name="pname" class="form-control name_list" required value="<?php echo $pn;?>" /></td>

						  <td><input type="text" name="pmrn"class="form-control name_list" required value="<?php echo $pm;?>" /></td>  

						  <td><input type="text" name="pphone"class="form-control name_list" placeholder="Enter Patient Phone No" required value="<?php echo $pp;?>" /></td></tr>
						  <tr><td colspan="4"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="5"></textarea></td>  </tr>
						  <tr><td colspan="4"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"></textarea></td>  </tr>
						
				
														
<tr><td colspan="4"><select name="xl[]" multiple="multiple" class="3col active" placeholder="Select Investigations">

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
<tr><td colspan="2"><select name="m1" placeholder="Select Medicine"class="form-control name_list" >
        
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
<td colspan="2"><select name="d1" class="form-control name_list" >
        
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
                        <td colspan="2"><select name="m2" placeholder="Select Medicine"class="form-control name_list" >
						
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
						<td><select name="d2" placeholder="Select Dosage" class="form-control name_list">
						
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
						
						</select></td>  
												</tr>  
												
												<tr><td colspan="2"><select name="m3" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d3" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m4" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d4" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m5" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d5" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m6" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d6" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m7" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d7" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr><tr><td colspan="2"><select name="m8" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d8" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m9" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d9" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr><tr><td colspan="2"><select name="m10" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d10" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m11" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d11" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m12" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d12" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr><tr><td colspan="2"><select name="m13" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d13" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m14" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d14" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m15" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d15" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m16" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d16" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr><tr><td colspan="2"><select name="m17" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d17" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr><tr><td colspan="2"><select name="m18" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d18" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="2"><select name="m19" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d19" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr><tr><td colspan="2"><select name="m20" placeholder="Select Dosage" class="form-control name_list">
						
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
<td colspan="2"><select name="d20" placeholder="Select Dosage" class="form-control name_list">
						
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
</tr>
<tr><td colspan="3"><textarea class="form-control" id="exampleTextarea" name="other" rows="5" placeholder="Other Instructions"></textarea></td>  </tr>						
<tr><td>		<button type="submit" name="Submit">Confirm</button></td></tr>

</form>

  
</div>
</body>

</html>
