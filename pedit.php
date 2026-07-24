<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ddf"){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$etime = date('d/m/Y h:i:s');
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['ID'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn' and ID='$id'");
$data = mysqli_fetch_assoc($query4);

	$ttr=$data['bdate'];

$dd1=date('d',strtotime($ttr));
$mm1=date('m',strtotime($ttr));
$yy1=date('Y',strtotime($ttr));

 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['Submit']))
{
	

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];

$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
$page1= $_REQUEST['page1'];
$psex = $_REQUEST['psex'];
//$bill = $_REQUEST['bill'];



$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];
$type = $_REQUEST['type'];
//$fdate='$dd-$mm-$yy';
$new_dob=date("$yy-$mm-$dd");

$date1=date_create("$dd-$mm-$yy");
//$page=date_create("$yy-$mm-$dd");

$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
echo $diff1;

 if($fullname !=''){

$update="update patient set pname='$name',padd='$padd',pphone='$pphone',bdate='$new_dob',psex='$psex',eby='$fullname',etime='$etime',type='$type' where `ID`='$id'";
mysqli_query($con,$update) or die(mysql_error());

$update1="update pappnew set pname='$name',padd='$padd',pphone='$pphone',page='$diff1',psex='$psex' where `pmrn`='$pmrn'";
mysqli_query($con,$update1) or die(mysql_error());

$update2="update presnew set pname='$name',pphone='$pphone',page='$diff1',psex='$psex' where `pmrn`='$pmrn'";
mysqli_query($con,$update2) or die(mysql_error());

$update3="update inpatient set pname='$name',padd='$padd',pphone='$pphone',age='$diff1',gender='$psex' where `pmrn`='$pmrn'";
mysqli_query($con,$update3) or die(mysql_error());


$update4="update emergency set pname='$name',padd='$padd',pphone='$pphone',age='$diff1',gender='$psex' where `pmrn`='$pmrn'";
mysqli_query($con,$update4) or die(mysql_error());

$update5="update discharge1 set pname='$name',page='$diff1',psex='$psex' where `pmrn`='$pmrn'";
mysqli_query($con,$update5) or die(mysql_error());

$update6="update idischarge1 set pname='$name',page='$diff1',psex='$psex' where `pmrn`='$pmrn'";
mysqli_query($con,$update6) or die(mysql_error());

$update7="update bed set pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update7) or die(mysql_error());


$update8="update preadm set pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update8) or die(mysql_error());


$update9="update endopapp set pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update9) or die(mysql_error());


$update10="update radreport set pname='$name',age='$diff1',gender='$psex' where `pmrn`='$pmrn'";
mysqli_query($con,$update10) or die(mysql_error());

$update11="update radpapp set pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update11) or die(mysql_error());


$update12="update alltest set page='$diff1',pgender='$psex',pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update12) or die(mysql_error());




$update13="update iinves set page='$diff1',pgender='$psex',pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update13) or die(mysql_error());


$update14="update einves set page='$diff1',pgender='$psex',pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update14) or die(mysql_error());

$update15="update ecg_test set page='$diff1',psex='$psex',pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update15) or die(mysql_error());

$update16="update procedure1 set page='$diff1',psex='$psex',pname='$name' where `pmrn`='$pmrn'";
mysqli_query($con,$update16) or die(mysql_error());


$update_insert="insert into patient_edit_record (`pmrn`,`pname`,`padd`,`pphone`,`bdate`,`psex`,`eby`,`etime`,`type`,`old_dob`) 
values
('$pmrn','$name','$padd','$pphone','$new_dob','$psex','$fullname','$etime','$type','$ttr')";
mysqli_query($con,$update_insert) or die(mysql_error());

  echo '<script language="javascript">';
    echo 'alert("Patient Personal Record Updated Successfully!!"); ';
    echo '</script>';

}
else{
	echo '<script language="javascript">';
    echo 'alert("Something Went Wrong!!"); ';
    echo '</script>';

	
}
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
    max-width: 800px;
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
  
  <link rel="stylesheet" href="styles.css">
</head>

<body>
<div id='cssmenu'>
<ul>
   <li><a href='ccview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='ccggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ccami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		  		 <li class='has-sub'><a href='ccviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>

      </ul>
	  
   </li>

    	    <li class='last'><a href='ccgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='ccview4'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='ccapp1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>EDIT PATIENT'S PERSONAL DETAILS  </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
				  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="80" style="text-transform:uppercase" value="<?php echo $data["pname"]; ?>">
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="80" style="text-transform:uppercase" value="<?php echo $data["padd"]; ?>">

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
           <label> <select id="browsers1" name="psex">

						<option value='<?php echo $data["psex"]; ?>'><?php echo $data["psex"]; ?></option>
						<option value='M'>Male</option>
						<option value='F'>Female</option>
						<option value='OTHER'>Other</option>
				  </select></label>
            <input name="pmrn" type="text" size="15" style="text-transform:uppercase" value="<?php echo $data["pmrn"]; ?>"readonly/>
      <input name="pphone" type="text" size="13" style="text-transform:uppercase" value="<?php echo $data["pphone"]; ?>">	  
	  <input name="page1" type="text" size="11" style="text-transform:uppercase" value="<?php echo $data["bdate"]; ?>">



<label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="<?php echo $dd1;?>" required placeholder="DD">	/
<input name="mm" type="text" maxlength="2" size="1" value="<?php echo $mm1;?>" required placeholder="MM"> /	

<input name="yy" type="text" maxlength="4" size="1" value="<?php echo $yy1;?>" required placeholder="YYYY">		        

<label for="age"><strong>Patient's Type :</strong></label>
	  	
            
	  	<select name="type" id="type"class="style1" placeholder="Patient Type"  required> 
		
		
		<option value="<?php echo $data["type"]; ?>"><?php echo $data["type"]; ?></option>
			<option value="General">General</option>;
			<option value="Staff">Staff</option>;
			<option value="Staff Spouse">Staff Spouse</option>;
			<option value="Staff Children">Staff Children</option>;
			<option value="Consultant">Consultant</option>;
			<option value="VIP">VIP</option>;
			<option value="Corporate">Corporate</option>;
			
				
      </select>


  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
