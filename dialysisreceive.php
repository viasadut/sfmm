<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="dialysis"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');
$ID=$_REQUEST['ID'];
//$dname1=$_REQUEST['dname1'];
//include("auth.php");
$user=$_SESSION["sess_userrole"];

$query39 = "SELECT * FROM dialysispapp where ID= '$ID'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row39 = mysqli_fetch_array($result39);
$pmrn=$row39['pmrn'];

/*$query43 = "SELECT COUNT(pmrn) FROM endoreport where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;*/


$query43t = "SELECT COUNT(pmrn) FROM dialysispapp where pmrn= '$pmrn' and status !='Cancel';"; 
$result43t = mysqli_query($con, $query43t) or die(mysqli_error());
$row43t = mysqli_fetch_assoc($result43t);
$countt =$row43t['COUNT(pmrn)'];
$count1t = $countt+1;



$status = "";
if(isset($_POST['Submit'])==1)
{
$dname =$_REQUEST['dname'];
$tname =$_REQUEST['tname'];
$anes =$_REQUEST['anes'];
$date1 = $_REQUEST['date1'];
$slot = $_REQUEST['slot'];



//$ins_query46="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query46);


//$sel="SELECT * FROM endopapp WHERE `pphone`='$pphone' and `dname`='$dname' and adate='$date1';";
//$result = mysqli_query($con,$sel);







	
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


$ins_query="update dialysispapp set dreffer='$dname', tname='$tname',anes='$anes',eid='$count1t',status='Received' where ID='$ID'";
mysqli_query($con,$ins_query);
//$update="update endoapp set status='Booked' where `ddate`='$date1' and `dslot`='$slot'";
//mysqli_query($con,$update);
echo '<script language="javascript">';
    echo 'alert("Patient Received Successfully!!!"); ';
    echo '</script>';



}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SFMMKPJSH DHAKA</title>
  
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
  max-width: 280px;
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

  
  <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+10)
		});
	});
</script>
  <link rel="stylesheet" href="styles.css">
  
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='endonursehome'><span>Home</span></a></li>
      
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>
		
				<label for="tname45"><strong>Referral Doctor Name:</strong></label>
				
				<select name="dname" value="" class="style1" required>
		
	
	
	

						<option value='<?php echo $row39['dreffer'];?>'selected><?php echo $row39['dreffer'];?></option>
				<?php 
			$sql = "select * from `doctor1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
	
			<br><br>


				<label for="tname45"><strong>Anaesthethist Name:</strong></label>
				
				<select name="anes" value="" class="style1" required>
		
	
	
	

<option value='NA'>NA</option>
						
				<?php 
			$sql = "select * from `doctor` where Discipline='anes' and status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </select>
			
	
			<br><br>



		<label for="tname1"><strong>Service Name:</strong></label>
		<br>
		<select name="tname" value="" class="style1" required>
	
	

						<option value='Dialysis'>Dialysis</option>
 </select>
			<br><br>
			
			<br><br>
            <!-- Name Input -->
			
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Appointment Date & Time:</strong></label>
									<p>
									  
									  <input name="date1" type="text" size="32"class="style1" value="<?php echo $row39['adate']?>" readonly>
									  <input name="slot" type="text" size="32" class="style1" value="<?php echo $row39['aslot']?>" readonly>
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
              
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="70" class="style1" value="<?php echo $row39['pname'];?>" readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" class="style1" value="<?php echo $row39['padd'];?>"readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
      <input name="psex" type="text" size="11" class="style1" value="<?php echo $row39['psex'];?>"readonly>
	  
      <input name="pmrn" type="text" size="15"Placeholder="Patient's MRN" class="style1" value="<?php echo $row39['pmrn'];?>"readonly>
      <input name="pphone" type="text" size="13" Placeholder="Patient's Phone NO" class="style1"value="<?php  echo $row39['pphone'];?>"readonly>	  
	  <input name="page" type="text" size="5" class="style1" value="<?php echo $row39['page'];?>" readonly>
      



  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
