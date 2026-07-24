<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2.php?err=2');
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
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['ID'];
$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn' and ID='$id'");
$data = mysqli_fetch_assoc($query4);
  
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
$diagnosis=$_REQUEST['diagnosis'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$adate=$_REQUEST['adate'];
$btype=$_REQUEST['btype'];
$padd=$_REQUEST['padd'];


$ins_query="insert into inpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`) values ('$dname', '$pname','$pmrn','$padd','$psex','$page','$adate','$room')";
mysqli_query($con,$ins_query) or die(mysql_error());

$ins_query1="insert into ipres (`dname`,`pname`,`pmrn`,`padd`,`psex`,`page`,`date`,`room`,`cdetails`,`diagnosis`) values ('$dname', '$pname','$pmrn','$padd','$psex','$page','$adate','$room','$cdetails','$diagnosis')";
mysqli_query($con,$ins_query1) or die(mysql_error());
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission</title>
  
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
  
   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>

  
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


<body>
<div id='cssmenu'>
<ul>
   <li><a href='inview.php'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin.php'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='inpatient1.php'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview.php'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge.php'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview.php'><span>Print Discharge Report</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout.php'><span>LOGOUT</span></a></li>
</ul>
</div>
<h1 align="center">Patient's Admission </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
		<tr><td colspan="10"><label><strong>ROOM :</strong></label></td>
		<td colspan="5"><label><strong>ROOM :</strong></label></td>
				<td colspan="5"><label><strong>ROOM :</strong></label></td>
		</tr>
		
		
		
		<td colspan="10"><select name="btype" placeholder="Select Bed Type" >
        
						<option value=""></option>
				<?php 
			$sql = "select type from `bed` ";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->type."'>".$row->type."</option>";
				}
			}

			
			?>
</select>
</td>  
<td colspan="5"><input name="btype1" type="text" value="<?php	  if(isset($_POST['load'])==1)
{ $btype1 = $_REQUEST['btype'];
echo $btype1;
}
?>" ></td>
<td><input name="load" type="submit" id="load" value="Check Available Time"></td>
			    	 <td colspan="5"><select name="bno" placeholder="Select Bed Type" >
        
					   <?php 
	   $btype1= $_REQUEST['btype'];
			$sql = "select bno from `bed` where `type`='$btype1' and `status`='Vacant'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->bno."'>".$row->bno."</option>";
				}
			}
			?>

</select></td>  
					 </tr>

		
		
		
		
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><select name="dname" value="">
			        <option value=''>-Select Doctor-</option>
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
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
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
						<td colspan="5"><input type="text" name="page" required value="<?php echo $data["page"]; ?>" /></td>  
             		<td colspan="5"> <input type="text" name="adate" id="datepicker" placeholder="Select Date" size="15"></td>					 	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $data["psex"]; ?>" /></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $data["pphone"]; ?>" /></td>  




			    	 <td colspan="2"><select name="ttt" placeholder="Select Bed Type" >
        
						<option value=""></option>
				
</select>
</td>  


			    	 <td colspan="2"><select name="uuu" placeholder="Select Bed Type" >
        
				

</select></td>  
					 </tr>

						 <tr><td colspan="20"><label><strong>Patient's Clinical Details:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="5"></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"></textarea></td>  </tr>
						
				
<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="p4.php?pmrn=<?php echo "$pm"; ?>">GO</a></td>					
</tr>
														

</body>

</html>
