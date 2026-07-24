<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="call"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_username"];
$status = "";
if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
$dname =$_REQUEST['dname'];
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
$hdlate = $_REQUEST['hdlate'];
$yage = $_REQUEST['yage'];

$sel43="SELECT * FROM test WHERE `dname`='$dname' and `ddate`='$date1' and dslot='$slot' and status='Booked';";
$result43 = mysqli_query($con,$sel43);


//$ins_query46="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query46);


$sel="SELECT * FROM pappnew WHERE `pphone`='$pphone' and `pmrn`='$pmrn' and `dname`='$dname' and adate='$date1';";
$result = mysqli_query($con,$sel);



if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Appointment Slot Selected!!"); ';
    echo '</script>';

    }

	else if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Already Have Appointment with the doctor"); ';
    echo '</script>';
    }

	
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
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


$ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$user','$yage')";
mysqli_query($con,$ins_query) or die(mysql_error());
$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);


$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`,`bdate`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex','$hdlate')";
mysqli_query($con,$ins_query1);
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
  
  <link rel="stylesheet" href="styles.css">
  
  
  
  
 
  
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
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			 <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="80" value="<?php if(isset($_POST['load'])==1)
{ $name = $_REQUEST['name'];
echo $name;
}
?>" required >
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="80" value="<?php if(isset($_POST['load'])==1)
{ $padd = $_REQUEST['padd'];
echo $padd;
}
?>" required>

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            
	  	<select name="psex" class="style1" placeholder="Gender" required> 
		
		
		<option value="<?php if(isset($_POST['load'])==1)
{ $psex = $_REQUEST['psex'];
echo $psex;
}
?>"><?php if(isset($_POST['load'])==1)
{ $psex = $_REQUEST['psex'];
echo $psex;
}
?></option>
			<option value="MALE">MALE</option>;
			<option value="FEMALE">FEMALE</option>;
			<option value="OTHERS">OTHERS</option>;
				
      </select>
            <input name="pmrn" type="text" size="15" placeholder="MRN" value="<?php if(isset($_POST['load'])==1)
{ $pmrn = $_REQUEST['pmrn'];
echo $pmrn;
}
?>">
      <input name="pphone" type="text" size="13" placeholder="Phone No"value="<?php if(isset($_POST['load'])==1)
{ $pphone = $_REQUEST['pphone'];
echo $pphone;
}
?>" required>	  
	  

	  
	  
	  
	  
							  <input type="text" name="date5" id="datepicker" placeholder="Select Date" size="15" value="<?php if(isset($_POST['load'])==1)
{ $date5 = $_REQUEST['date5'];
echo $date5;
}
?>"required>      

<input type="text" name='hdlate'value="<?php	  if(isset($_POST['load'])==1)
{ $hd = date('Y-m-d',strtotime($_REQUEST['date5']));

echo $hd;
}
?>" size="57" readonly>


<input name="page" type="text" size="11"value="<?php	  if(isset($_POST['load'])==1)
{ $bdate = $_REQUEST['date5'];
$bdate1=date("Y-m-d", strtotime($bdate));
//echo $doc1;


	  
	  
	  
	  $start=$bdate1;
$date1=date_create($start);
//$date91=date_format($date1,'d/m/Y');
$date= date('Y-m-d');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
$diffy= $diff->format("%y");
echo $diff1;
	  
	  
}?>"readonly required>


<input type="hidden" name='yage'value="<?php	  if(isset($_POST['load'])==1)
{ 

echo $diffy;
}
?>" size="57" readonly>

<label for="name"><strong>Doctor's Name :</strong></label>
			<select name="doc" value="">
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
			        <input name="dname" type="text" value="<?php	  if(isset($_POST['load'])==1)
{ $doc1 = $_REQUEST['doc'];
echo $doc1;
}
?>" size="57" readonly>
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input type="text" name="date" id="datepicker1" placeholder="Select Date" size="15" >
									  <input name="date1" type="text" value="<?php if(isset($_POST['load'])==1)
{ $date1 = $_REQUEST['date'];
echo $date1;
}
?>" size ="57" readonly>
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      <input name="load" type="submit" id="load" value="Check Available Time">
	    </p>

									<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="slot"> <option value=''>--Select--</option>
	   <?php 
	   $doc1= $_REQUEST['doc'];
	   		if(isset($_POST['load'])){
			$sql = "select * from `test` where `dname`='$doc1' and `status`='AVAILABLE'and `ddate`='$date1' order by id asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dslot."'>".$row->dslot."</option>";
				}
			}
			}
			?>
      </select>
      
	   
  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
