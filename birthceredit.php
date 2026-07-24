<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
      header('Location: login2?err=2');
    }
?>
<?php
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];


require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result



$row39 = mysqli_fetch_array($result39);


$sel43="SELECT * FROM birth WHERE `id`='$id' ;";
$result43 = mysqli_query($con, $sel43) or die(mysqli_error());
$row3 = mysqli_fetch_array($result43);
//echo $iby=$row3['iby'];
//echo $dd=date('d',strtotime($row['bdate']));


$query43 = "SELECT COUNT(pmrn) FROM birth where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;  

?>


<?php
$full = $row39['fullname'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn' and ID='$id'");
$data = mysqli_fetch_assoc($query4);
 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['Submit'])==1)
{

$bname =$_REQUEST['bname'];
$pmrn =$_REQUEST['pmrn'];
$weight =$_REQUEST['weight'];
//$did =$_REQUEST['did'];
$dname =$_REQUEST['dname'];
$dname1 =$_REQUEST['dname1'];
$bdate = $_REQUEST['bdate'];
$bdate1 = date('d/m/Y', strtotime($bdate) );
//$idate =$_REQUEST[ 'bdate'];
$btime = $_REQUEST['btime'];
$fname =$_REQUEST['fname'];
$mname =$_REQUEST['mname'];
$year=date('Y');
//$doc1 = $_REQUEST['doc'];
//$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$page= $_REQUEST['page'];
$sex = $_REQUEST['sex'];
//$bill = $_REQUEST['bill'];

$rdate=date('d/m/Y H:i:s');
//$rdate1=date("d/m/Y", strtotime($rdate));
$issue_date=date('d/m/Y');


//$sel="SELECT * FROM pappnew WHERE `pphone`='$pphone' and `dname`='$dname' and adate='$date1';";
//$result = mysqli_query($con,$sel);


//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
$ins_query="insert into birth (`pmrn`,`idate`,`bname`,`fname`,`mname`,`sex`,`weight`,`bdate`,`btime`,`dname`,`eby`,`year`,`bdate1`,`eid`,`status`,`rdate`,`mng`,`dname1`,`iby`) values 
('$pmrn', '$issue_date','$bname','$fname','$mname','$sex','$weight','$bdate1','$btime','$dname','$fullname','$year','$bdate','$count1','Waiting For Approval','$rdate','waiting','$dname1','$iby')";
mysqli_query($con,$ins_query) or die(mysql_error());


  echo '<script language="javascript">';
    echo 'alert("Birth Certificate Issued Successfully !!"); ';
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
  width: 95%;
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

<script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
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
		

<form action="" method="post">

<!-- Form Title -->
<h1>BIRTH CERTIFICATE EDIT PANEL</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
		

	  	
<label for="age"><strong>Baby's Name :</strong></label>
      <input name="bname" type="text" size="80" value="<?php echo $row3["bname"]; ?>">          


<label for="age"><strong>Patient's Details (MRN/Gender) :</strong></label>
	  <input name="pmrn" type="text" size="15" value="<?php echo $row3["pmrn"]; ?>" readonly>
	  <input name="sex" type="text" size="15" value="<?php echo $row3["sex"]; ?>">
            
      
	  

	  
	  
	  	  
	  	  <label for="age"><strong>Father's Name :</strong></label>
      <input name="fname" type="text" size="80" value="<?php echo $row3["fname"]; ?>" required>
	  	  <label for="age"><strong>Mother's Name :</strong></label>
      <input name="mname" type="text" size="80" value="<?php echo $row3["mname"]; ?>" required>
 	  <label for="age"><strong>Weight :</strong></label>
      <input name="weight" type="text" size="80" value="<?php echo $row3["weight"]; ?>"required>

		
			
			
			<label for="name"><strong>Gynecologist's Name :</strong></label>
			<select name="dname" value="" required>
			        <option value='<?php echo $row3["dname"]; ?>' selected><?php echo $row3["dname"]; ?></option>
				<?php 
			$sql = "select * from `doctor` where discipline ='gynecologist'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select>
			
			<label for="name"><strong>Pediatrician's Name :</strong></label>
			<select name="dname1" value="" required>
			        <option value='<?php echo $row3["dname1"]; ?>' selected><?php echo $row3["dname1"]; ?></option>
				<?php 
			$sql = "select * from `doctor` where discipline ='pediatrician'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select>
			
			
			       
				   
				   
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Date Of Birth:</strong></label>
									<p>
									  <input type="text" name="bdate" id="datepicker" placeholder="Select Date" size="15" value="<?php echo $row3["bdate1"]; ?>" required >
									   
									  
		<label for="name"><strong>Time :</strong></label>
			<select name="btime" value="" required>
			        <option value="<?php echo $row3["btime"]; ?>" selected><?php echo $row3["btime"]; ?></option>
<option value="00:00">00:00</option>
<option value="00:10">00:10</option>
<option value="00:20">00:20</option>
<option value="00:30">00:30</option>
<option value="00:40">00:40</option>
<option value="00:50">00:50</option>
<option value="01:00">01:00</option>
<option value="01:10">01:10</option>
<option value="01:20">01:20</option>
<option value="01:30">01:30</option>
<option value="01:40">01:40</option>
<option value="01:50">01:50</option>
<option value="02:00">02:00</option>
<option value="02:10">02:10</option>
<option value="02:20">02:20</option>
<option value="02:30">02:30</option>
<option value="02:40">02:40</option>
<option value="02:50">02:50</option>
<option value="03:00">03:00</option>
<option value="03:10">03:10</option>
<option value="03:20">03:20</option>
<option value="03:30">03:30</option>
<option value="03:40">03:40</option>
<option value="03:50">03:50</option>
<option value="04:00">04:00</option>
<option value="04:10">04:10</option>
<option value="04:20">04:20</option>
<option value="04:30">04:30</option>
<option value="04:40">04:40</option>
<option value="04:50">04:50</option>
<option value="05:00">05:00</option>
<option value="05:10">05:10</option>
<option value="05:20">05:20</option>
<option value="05:30">05:30</option>
<option value="05:40">05:40</option>
<option value="05:50">05:50</option>
<option value="06:00">06:00</option>
<option value="06:10">06:10</option>
<option value="06:20">06:20</option>
<option value="06:30">06:30</option>
<option value="06:40">06:40</option>
<option value="06:50">06:50</option>
<option value="07:00">07:00</option>
<option value="07:10">07:10</option>
<option value="07:20">07:20</option>
<option value="07:30">07:30</option>
<option value="07:40">07:40</option>
<option value="07:50">07:50</option>
<option value="08:00">08:00</option>
<option value="08:10">08:10</option>
<option value="08:20">08:20</option>
<option value="08:30">08:30</option>
<option value="08:40">08:40</option>
<option value="08:50">08:50</option>
<option value="08:00">08:00</option>
<option value="09:00">09:00</option>
<option value="09:10">09:10</option>
<option value="09:20">09:20</option>
<option value="09:30">09:30</option>
<option value="09:40">09:40</option>
<option value="09:50">09:50</option>
<option value="10:00">10:00</option>
<option value="10:10">10:10</option>
<option value="10:20">10:20</option>
<option value="10:30">10:30</option>
<option value="10:40">10:40</option>
<option value="10:50">10:50</option>
<option value="11:00">11:00</option>
<option value="11:10">11:10</option>
<option value="11:20">11:20</option>
<option value="11:30">11:30</option>
<option value="11:40">11:40</option>
<option value="11:50">11:50</option>
<option value="12:00">12:00</option>
<option value="12:10">12:10</option>
<option value="12:20">12:20</option>
<option value="12:30">12:30</option>
<option value="12:40">12:40</option>
<option value="12:50">12:50</option>
<option value="13:00">13:00</option>
<option value="13:10">13:10</option>
<option value="13:20">13:20</option>
<option value="13:30">13:30</option>
<option value="13:40">13:40</option>
<option value="13:50">13:50</option>
<option value="14:00">14:00</option>
<option value="14:10">14:10</option>
<option value="14:20">14:20</option>
<option value="14:30">14:30</option>
<option value="14:40">14:40</option>
<option value="14:50">14:50</option>
<option value="15:00">15:00</option>
<option value="15:10">15:10</option>
<option value="15:20">15:20</option>
<option value="15:30">15:30</option>
<option value="15:40">15:40</option>
<option value="15:50">15:50</option>
<option value="16:00">16:00</option>
<option value="16:10">16:10</option>
<option value="16:20">16:20</option>
<option value="16:30">16:30</option>
<option value="16:40">16:40</option>
<option value="16:50">16:50</option>
<option value="17:00">17:00</option>
<option value="17:10">17:10</option>
<option value="17:20">17:20</option>
<option value="17:30">17:30</option>
<option value="17:40">17:40</option>
<option value="17:50">17:50</option>
<option value="18:00">18:00</option>
<option value="18:10">18:10</option>
<option value="18:20">18:20</option>
<option value="18:30">18:30</option>
<option value="18:40">18:40</option>
<option value="18:50">18:50</option>
<option value="19:00">19:00</option>
<option value="19:10">19:10</option>
<option value="19:20">19:20</option>
<option value="19:30">19:30</option>
<option value="19:40">19:40</option>
<option value="19:50">19:50</option>
<option value="20:00">20:00</option>
<option value="20:10">20:10</option>
<option value="20:20">20:20</option>
<option value="20:30">20:30</option>
<option value="20:40">20:40</option>
<option value="20:50">20:50</option>
<option value="21:00">21:00</option>
<option value="21:10">21:10</option>
<option value="21:20">21:20</option>
<option value="21:30">21:30</option>
<option value="21:40">21:40</option>
<option value="21:50">21:50</option>
<option value="22:00">22:00</option>
<option value="22:10">22:10</option>
<option value="22:20">22:20</option>
<option value="22:30">22:30</option>
<option value="22:40">22:40</option>
<option value="22:50">22:50</option>
<option value="23:00">23:00</option>
<option value="23:10">23:10</option>
<option value="23:20">23:20</option>
<option value="23:30">23:30</option>
<option value="23:40">23:40</option>
<option value="23:50">23:50</option>

</select>
			
					
	  

	  
      

  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
