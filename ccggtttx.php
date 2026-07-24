<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="call"){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
 $user = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');




//include("auth1.php");
$user1=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['submit'])==1)
{

$name =$_REQUEST['dname'];
//$did =$_REQUEST['did'];
$date = $_REQUEST['date'];
$checkbox = $_REQUEST['select'];


//if (!empty ($_POST['select']))


$ins_query36="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 21','AVAILABLE','$user')";
mysqli_query($con,$ins_query36);
$ins_query37="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 22','AVAILABLE','$user')";
mysqli_query($con,$ins_query37);
$ins_query38="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 23','AVAILABLE','$user')";
mysqli_query($con,$ins_query38);
$ins_query39="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 24','AVAILABLE','$user')";
mysqli_query($con,$ins_query39);
$ins_query40="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 25','AVAILABLE','$user')";
mysqli_query($con,$ins_query40);
$ins_query41="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 26','AVAILABLE','$user')";
mysqli_query($con,$ins_query41);
$ins_query42="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 27','AVAILABLE','$user')";
mysqli_query($con,$ins_query42);
$ins_query43="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 28','AVAILABLE','$user')";
mysqli_query($con,$ins_query43);
$ins_query44="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 29','AVAILABLE','$user')";
mysqli_query($con,$ins_query44);
$ins_query45="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 30','AVAILABLE','$user')";
mysqli_query($con,$ins_query45);



$ins_query336="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 31','AVAILABLE','$user')";
mysqli_query($con,$ins_query336);
$ins_query337="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 32','AVAILABLE','$user')";
mysqli_query($con,$ins_query337);
$ins_query338="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 33','AVAILABLE','$user')";
mysqli_query($con,$ins_query338);
$ins_query339="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 34','AVAILABLE','$user')";
mysqli_query($con,$ins_query339);
$ins_query340="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 35','AVAILABLE','$user')";
mysqli_query($con,$ins_query340);
$ins_query341="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 36','AVAILABLE','$user')";
mysqli_query($con,$ins_query341);
$ins_query342="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 37','AVAILABLE','$user')";
mysqli_query($con,$ins_query342);
$ins_query343="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 38','AVAILABLE','$user')";
mysqli_query($con,$ins_query343);
$ins_query344="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 39','AVAILABLE','$user')";
mysqli_query($con,$ins_query344);
$ins_query345="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 40','AVAILABLE','$user')";
mysqli_query($con,$ins_query345);






$ins_query46="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 41','AVAILABLE','$user')";
mysqli_query($con,$ins_query46);
$ins_query47="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 42','AVAILABLE','$user')";
mysqli_query($con,$ins_query47);
$ins_query48="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 43','AVAILABLE','$user')";
mysqli_query($con,$ins_query48);
$ins_query49="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 44','AVAILABLE','$user')";
mysqli_query($con,$ins_query49);
$ins_query50="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 45','AVAILABLE','$user')";
mysqli_query($con,$ins_query50);
$ins_query51="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 46','AVAILABLE','$user')";
mysqli_query($con,$ins_query51);
$ins_query52="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 47','AVAILABLE','$user')";
mysqli_query($con,$ins_query52);
$ins_query53="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 48','AVAILABLE','$user')";
mysqli_query($con,$ins_query53);
$ins_query54="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 49','AVAILABLE','$user')";
mysqli_query($con,$ins_query54);
$ins_query55="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 50','AVAILABLE','$user')";
mysqli_query($con,$ins_query55);



$ins_query536="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 51','AVAILABLE','$user')";
mysqli_query($con,$ins_query536);
$ins_query537="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 52','AVAILABLE','$user')";
mysqli_query($con,$ins_query537);
$ins_query538="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 53','AVAILABLE','$user')";
mysqli_query($con,$ins_query538);
$ins_query539="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 54','AVAILABLE','$user')";
mysqli_query($con,$ins_query539);
$ins_query540="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 55','AVAILABLE','$user')";
mysqli_query($con,$ins_query540);
$ins_query541="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 56','AVAILABLE','$user')";
mysqli_query($con,$ins_query541);
$ins_query542="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 57','AVAILABLE','$user')";
mysqli_query($con,$ins_query542);
$ins_query543="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 58','AVAILABLE','$user')";
mysqli_query($con,$ins_query543);
$ins_query544="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 59','AVAILABLE','$user')";
mysqli_query($con,$ins_query544);
$ins_query545="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 60','AVAILABLE','$user')";
mysqli_query($con,$ins_query545);


$ins_query736="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 61','AVAILABLE','$user')";
mysqli_query($con,$ins_query736);
$ins_query737="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 62','AVAILABLE','$user')";
mysqli_query($con,$ins_query737);
$ins_query738="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 63','AVAILABLE','$user')";
mysqli_query($con,$ins_query738);
$ins_query739="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 64','AVAILABLE','$user')";
mysqli_query($con,$ins_query739);
$ins_query740="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 65','AVAILABLE','$user')";
mysqli_query($con,$ins_query740);
$ins_query741="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 66','AVAILABLE','$user')";
mysqli_query($con,$ins_query741);
$ins_query742="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 67','AVAILABLE','$user')";
mysqli_query($con,$ins_query742);
$ins_query743="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 68','AVAILABLE','$user')";
mysqli_query($con,$ins_query743);
$ins_query744="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 69','AVAILABLE','$user')";
mysqli_query($con,$ins_query744);
$ins_query745="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 70','AVAILABLE','$user')";
mysqli_query($con,$ins_query745);




   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
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
  padding: 5px;
  width: 50%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 1px;
   margin-left: 100px;
 
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
  padding: 5px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 40%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 2px;
  margin-left: 140px;

}

fieldset {
  margin-bottom: 30px;
  border: none;
 
}

legend {
  font-size: 1.4em;
  margin-bottom: 1px;
}

label {
  display: block;
  margin-bottom: 1px;
    margin-left: 100px;
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
    max-width: 600px;
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
			maxDate: new Date(currentYear, currentMonth, currentDate+13)
		});
	});
</script>





  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
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
		<h2 align="center">SET DOCTOR'S AVAILABLE DATE &amp; TIME (MORNING)</h2>
		<a href='ccggttt'><span><b>Morning Schedule</span><b></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='ccggttt22'><span>Evening Schedule</span></a>
		<fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="name">Doctor's Name :</label>
			</span>
			<select name="dname" value="" required/>
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
			
<!-- E-mail Input -->
			<label for="mail"><strong>Appointment Date :</strong></label>
									<input type="text" name="date" id="datepicker" placeholder="Select Date" required/>
<!-- Password Input --><!-- Age Dropdown -->
			<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="select" required/>
	  <option value=''>-Select Time-</option>
	  <option value='Available'>AVAILABLE</option>
	  
      </select>
      

  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
