<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
include("auth.php"); 
require('db1.php');

$user=$_SESSION["username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from ipres where pmrn='$pmrn'");
$data1 = mysqli_fetch_assoc($query5);

  
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
$discharge=$_REQUEST['discharge'];


$update="update ipres set pname='$pname',pmrn='$pmrn',pphone='$pphone',cdetails='$cdetails',diagnosis='$diagnosis',xl='$lx',m1='$m1',m2='$m2',m3='$m3',m4='$m4',m5='$m5',m6='$m6' ,m7='$m7',m8='$m8',m9='$m9',m10='$m10',m11='$m11',m12='$m12',m13='$m13',m14='$m14',m15='$m15',m16='$m16',m17='$m17',m18='$m18',m19='$m19',m20='$m20',d1='$d1',d2='$d2',d3='$d3',d4='$d4',d5='$d5',d6='$d6',d7='$d7',d8='$d8',d9='$d9',d10='$d10',d11='$d11',d12='$d12',d13='$d13',d14='$d14',d15='$d15',d16='$d16',d17='$d17',d18='$d18',d19='$d19',d20='$d20',i1='$i1',i2='$i2',i3='$i3',i4='$i4',i5='$i5',i6='$i6',i7='$i7',i8='$i8',i9='$i9',i10='$i10',i11='$i11',i12='$i12',i13='$i13',i14='$i14',i15='$i15',i16='$i16',i17='$i17',i18='$i18',i19='$i19',i20='$i20',discharge='$discharge' where `pmrn`='$pmrn'";
mysqli_query($con,$update) or die(mysql_error());

$update1="update inpatient set discharge='$discharge' where `pmrn`='$pmrn'";
mysqli_query($con,$update1) or die(mysql_error());
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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
  height: 32px;
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>





  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
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


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

</head>
</head>

<body>

<h1 align="center">INPATIENT RECORD </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname"  required value="<?php echo $data["adoc"]; ?>"</td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="10"><input type="text" name="pmrn"  required value="<?php echo $data["pmrn"]; ?>" /></td>
					 <td colspan="10"><input type="text" name="pname" required value="<?php echo $data["pname"]; ?>" /></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><input type="text" name="padd"  required value="<?php echo $data["padd"]; ?>" /></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="2"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" required value="<?php echo $data["age"]; ?>" /></td>  
             		<td colspan="5"> <input type="text" name="pheight" value="<?php echo $data["adate"]; ?>" size="15"></td>					 	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $data["gender"]; ?>" /></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $data["pphone"]; ?>" /></td>  

			    	 <td colspan="2"><input type="text" name="pweight"  value="<?php echo $data["room"]; ?>" /></td>  
					 <td colspan="2"><input type="text" name="ptemp" value="<?php echo $data["room"]; ?>" /></td>  
					 </tr>

						 <tr><td colspan="20"><label><strong>Patient's Clinical Details:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="5"></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"></textarea></td>  </tr>
						
				
														

<tr><td colspan="20"><label><strong>Investigation Advised:</strong></label></td>  </tr>
<tr><td colspan="20"><select name="xl[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
						<option value="NO TEST REQUIRED">NO TEST REQUIRED</option>
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
<tr><td colspan="10"><label><strong>Medication Advised:</strong></label></td>
<td colspan="5"><label><strong>Dosages:</strong></label></td>
<td colspan="5"><label><strong>Instruction:</strong></label></td>  
  </tr>


<tr> 
 <td colspan="10"><select name="m1" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m1"]; ?>"><?php echo $data1["m1"]; ?></option>
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



<td  colspan="5"><select name="d1">
        
						<option value="<?php echo $data1["d1"]; ?>"><?php echo $data1["d1"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i1" rows="1"><?php echo $data1["i1"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m2" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m2"]; ?>"><?php echo $data1["m2"]; ?></option>
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



<td  colspan="5"><select name="d2">
        
						<option value="<?php echo $data1["d2"]; ?>"><?php echo $data1["d2"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i2" rows="1"><?php echo $data1["i2"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m3" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m3"]; ?>"><?php echo $data1["m3"]; ?></option>
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



<td  colspan="5"><select name="d3">
        
						<option value="<?php echo $data1["d3"]; ?>"><?php echo $data1["d3"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i3" rows="1"><?php echo $data1["i3"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m4" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m4"]; ?>"><?php echo $data1["m4"]; ?></option>
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



<td  colspan="5"><select name="d4">
        
						<option value="<?php echo $data1["d4"]; ?>"><?php echo $data1["d4"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i4" rows="1"><?php echo $data1["i4"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m5" placeholder="Select Medicine" >
        
						<option value=<?php echo $data1["m5"]; ?>><?php echo $data1["m5"]; ?></option>
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



<td  colspan="5"><select name="d5">
        
						<option value=<?php echo $data1["d5"]; ?>><?php echo $data1["d5"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i5" rows="1"><?php echo $data1["i5"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m6" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m6"]; ?>"><?php echo $data1["m6"]; ?></option>
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



<td  colspan="5"><select name="d6">
        
						<option value="<?php echo $data1["d6"]; ?>"><?php echo $data1["d6"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i6" rows="1"><?php echo $data1["i6"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m7" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m7"]; ?>"><?php echo $data1["m7"]; ?></option>
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



<td  colspan="5"><select name="d7">
        
						<option value=<?php echo $data1["d7"]; ?>><?php echo $data1["d7"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i7" rows="1"><?php echo $data1["i7"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m8" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m8"]; ?>"><?php echo $data1["m8"]; ?></option>
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



<td  colspan="5"><select name="d8">
        
						<option value="<?php echo $data1["d8"]; ?>"><?php echo $data1["d8"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i8" rows="1"><?php echo $data1["i8"]; ?></textarea></td>
</tr>
<tr> 
 <td colspan="10"><select name="m9" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m9"]; ?>"><?php echo $data1["m9"]; ?></option>
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



<td  colspan="5"><select name="d9">
        
						<option value="<?php echo $data1["d9"]; ?>"><?php echo $data1["d9"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i9" rows="1"><?php echo $data1["i9"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m10" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m10"]; ?>"><?php echo $data1["m10"]; ?></option>
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



<td  colspan="5"><select name="d10">
        
						<option value="<?php echo $data1["d10"]; ?>"><?php echo $data1["d10"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i10" rows="1"><?php echo $data1["i10"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m11" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m11"]; ?>"><?php echo $data1["m11"]; ?></option>
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



<td  colspan="5"><select name="d11">
        
						<option value=<?php echo $data1["d11"]; ?>><?php echo $data1["d11"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i11" rows="1"><?php echo $data1["i11"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m12" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m12"]; ?>"><?php echo $data1["m12"]; ?></option>
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



<td  colspan="5"><select name="d12">
        
						<option value="<?php echo $data1["d12"]; ?>"><?php echo $data1["d12"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i12" rows="1"><?php echo $data1["i12"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m13" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m13"]; ?>"><?php echo $data1["m13"]; ?></option>
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



<td  colspan="5"><select name="d13">
        
						<option value="<?php echo $data1["d13"]; ?>"><?php echo $data1["d13"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i13" rows="1"><?php echo $data1["i13"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m14" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m14"]; ?>"><?php echo $data1["m14"]; ?></option>
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



<td  colspan="5"><select name="d14">
        
						<option value="<?php echo $data1["d14"]; ?>"><?php echo $data1["d14"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i14" rows="1"><?php echo $data1["i14"]; ?></textarea></td>
</tr>
<tr> 
 <td colspan="10"><select name="m15" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m15"]; ?>"><?php echo $data1["m15"]; ?></option>
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



<td  colspan="5"><select name="d15">
        
						<option value="<?php echo $data1["d15"]; ?>"><?php echo $data1["d15"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i15" rows="1"><?php echo $data1["i15"]; ?></textarea></td>
</tr>
<tr> 
 <td colspan="10"><select name="m16" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m16"]; ?>"><?php echo $data1["m16"]; ?></option>
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



<td  colspan="5"><select name="d16">
        
						<option value="<?php echo $data1["d16"]; ?>"><?php echo $data1["d16"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i16" rows="1"><?php echo $data1["i16"]; ?></textarea></td>
</tr>
<tr> 
 <td colspan="10"><select name="m17" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m17"]; ?>"><?php echo $data1["m17"]; ?></option>
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



<td  colspan="5"><select name="d17">
        
						<option value=<?php echo $data1["d17"]; ?>><?php echo $data1["d17"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i17" rows="1"><?php echo $data1["i17"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m18" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m18"]; ?>"><?php echo $data1["m18"]; ?></option>
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



<td  colspan="5"><select name="d18">
        
						<option value="<?php echo $data1["d18"]; ?>"><?php echo $data1["d18"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i18" rows="1"><?php echo $data1["i18"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m19" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m19"]; ?>"><?php echo $data1["m19"]; ?></option>
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



<td  colspan="5"><select name="d19">
        
						<option value="<?php echo $data1["d19"]; ?>"><?php echo $data1["d19"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i19" rows="1"><?php echo $data1["i19"]; ?></textarea></td>
</tr>

<tr> 
 <td colspan="10"><select name="m20" placeholder="Select Medicine" >
        
						<option value="<?php echo $data1["m20"]; ?>"><?php echo $data1["m20"]; ?></option>
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



<td  colspan="5"><select name="d20">
        
						<option value="<?php echo $data1["d20"]; ?>"><?php echo $data1["d20"]; ?></option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>
</select>
</td>
<td colspan="5"><textarea  id="exampleTextarea" name="i20" rows="1"><?php echo $data1["i20"]; ?></textarea></td>
</tr>


<tr><td colspan="20"><label for="age"><strong>Other Instructions:</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea" name="other" rows="5" placeholder="Other Instructions"></textarea></td>  </tr>	

<tr><td colspan="20"><select name="pdiet" placeholder="Select Dosage">
						
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






<tr><td colspan="20"><select name="reffer" placeholder="Select Dosage" >
						
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

<tr><td colspan="20"><select name="discharge" placeholder="discharge" >
						
						<option value=''>-Select Reffered Doctor-</option>
						<option value="Discharge">Discharge</option>
								
						</select>
</td></tr>



<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="p4.php?pmrn=<?php echo "$pm"; ?>">GO</a></td>					
</tr>

</body>

</html>
