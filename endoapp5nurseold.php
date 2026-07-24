<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="endo"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');
//$pmrn=$_REQUEST['pmrn'];
//$dname1=$_REQUEST['dname1'];
//include("auth.php");
$user=$_SESSION["sess_userrole"];

//$query39 = "SELECT * FROM patient where pmrn= '$pmrn'"; 
//$result39 = mysqli_query($con, $query39) or die(mysqli_error());
//$row39 = mysqli_fetch_array($result39);

$status = "";
if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
$dname =$_REQUEST['dname'];
$tname23 =$_REQUEST['tname23'];
$tname2 =$_REQUEST['tname2'];
$date = $_REQUEST['date'];
$date1 =$_REQUEST[ 'date1'];
$slot = $_REQUEST['slot'];
$doc1 = $_REQUEST['doc'];
$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
//$bill = $_REQUEST['bill'];


$sel43="SELECT * FROM endoapp WHERE `dname`='$dname' and `ddate`='$date1' and dslot='$slot' and status='Booked';";
$result43 = mysqli_query($con,$sel43);

$sel45="SELECT * FROM endo WHERE `iname`='$tname2';";
$result45 = mysqli_query($con,$sel45);


//$ins_query46="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query46);


//$sel="SELECT * FROM endopapp WHERE `pphone`='$pphone' and `dname`='$dname' and adate='$date1';";
//$result = mysqli_query($con,$sel);
$sel90="SELECT * FROM doctor1 WHERE `dname`='$tname23';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Doctors Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }

	else if($res45=mysqli_num_rows($result45)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Service Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }





else if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Appointment Slot Selected!!"); ';
    echo '</script>';

    }

	
	//else if($res=mysqli_num_rows($result)>0)
//{
 	
  //   echo '<script language="javascript">';
//echo 'alert("Unsuccessful !!Patient Already Have Appointment with the doctor"); ';
 //echo '</script>';
 //}

	
else if($res43=mysqli_num_rows($result43)>0)
{
 	
     echo '<script language="javascript">';
echo 'alert("Unsuccessful !!The Time Slot is Already Taken By Another Patient"); ';
echo '</script>';
 }





	
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
else
{
$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


$ins_query="insert into endopapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$tname23','$tname2')";
mysqli_query($con,$ins_query);
$update="update endoapp set status='Booked' where `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully!!!"); ';
    echo '</script>';
} 


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
  width: 25%;
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
		
	<input list="tname45" name="tname45" size=75% class="form-control" value="">
	
	<datalist id="tname45">

						<option value=''>-Select Doctor-</option>
				<?php 
			$sql = "select * from `doctor1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </datalist>
			
	
			<br><br>
			<input name="tname23" class="style1" type="text"  size =72% value="<?php	  if(isset($_POST['load'])==1)
{ $tname23 = $_REQUEST['tname45'];
echo $tname23;
}
?>" readonly>
			<br><br>

		<label for="tname1"><strong>Service Name:</strong></label>
		<br>
	<input list="tname1" name="tname" size=75% class="form-control" value="">
	
	<datalist id="tname1">

						<option value=''>-Select Service-</option>
				<?php 
			$sql = "select * from `endo`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>  </datalist>
			<br><br>
			<input name="tname2" class="style1" type="text"  size =72% value="<?php	  if(isset($_POST['load'])==1)
{ $tname2 = $_REQUEST['tname'];
echo $tname2;
}
?>"  readonly>
			<br><br>
            <!-- Name Input -->
			<label for="name"><strong>Service Name :</strong></label>
			<select name="doc" value="" class="style1">
			<option value="endoscopy"> Endoscopy</option>       
			<option value="Cystoscopy"> Cystoscopy</option>   
			<option value="FOL"> FOL</option> 			
			</select>
			        <input name="dname" class="style1" type="text"  size =50% value="<?php	  if(isset($_POST['load'])==1)
{ $doc1 = $_REQUEST['doc'];
echo $doc1;
}
?>" size="57" readonly>
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input type="text" class="style1" name="date" id="datepicker" placeholder="Select Date" size="15" >
									  <input name="date1" type="text" size=48% class="style1" value="<?php if(isset($_POST['load'])==1)
{ $date1 = $_REQUEST['date'];
echo $date1;
}
?>" size ="57" readonly>
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      <input name="load" class="style1" type="submit" id="load" value="Check Available Time">
	    </p>

									<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="slot" class="style1"> <option value=''>--Select--</option>
	   <?php 
	   $doc1= $_REQUEST['doc'];
	   		if(isset($_POST['load'])){
			$sql = "select * from `endoapp` where  `status`='Available'and `ddate`='$date1'order by id asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dslot."'>".$row->dslot."</option>";
				}
			}
			}
			?>
      </select>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="70" class="style1" value="" />
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" class="style1" value="">

	  <label for="age"><strong>Patient's Details :</strong></label>
      <input name="psex" type="text" size="11" class="style1" value="" placeholder="Gender">
	  
      <input name="pmrn" type="text" size="15"Placeholder="MRN" class="style1" value="">
      <input name="pphone" type="text" size="13" Placeholder="Phone NO" class="style1"value="">	  
	  <input name="page" type="text" size="5"Placeholder="AGE" class="style1" value="" >
      



  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
