<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="clinical"){
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
$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:00PM','AVAILABLE','$user')";
if ($con->query($ins_query) === TRUE) 
{
//$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:00PM','AVAILABLE','$user')";
//mysqli_query($con,$ins_query);
$ins_query1="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query1);
$ins_query2="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query2);
$ins_query3="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query3);
$ins_query4="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query4);
$ins_query5="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query5);
$ins_query6="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query6);
$ins_query7="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query7);
$ins_query8="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query8);
$ins_query9="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query9);
$ins_query10="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query10);
$ins_query11="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query11);
$ins_query12="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query12);
$ins_query13="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query13);
$ins_query14="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query14);
$ins_query15="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query15);
$ins_query16="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query16);
$ins_query17="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query17);
$ins_query18="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','05:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query18);
$ins_query19="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','05:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query19);
$ins_query20="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','05:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query20);
$ins_query21="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','05:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query21);
$ins_query22="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','05:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query22);
$ins_query23="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','05:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query23);
$ins_query24="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','06:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query24);
$ins_query25="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','06:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query25);
$ins_query26="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','06:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query26);
$ins_query27="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','06:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query27);
$ins_query28="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','06:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query28);
$ins_query29="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','06:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query29);
$ins_query30="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','07:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query30);
$ins_query31="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','07:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query31);
$ins_query32="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','07:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query32);
$ins_query33="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','07:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query33);
$ins_query34="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','07:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query34);
$ins_query35="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','07:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query35);



$ins_query346="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-01','AVAILABLE','$user')";
mysqli_query($con,$ins_query346);
$ins_query347="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-02','AVAILABLE','$user')";
mysqli_query($con,$ins_query347);
$ins_query348="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-03','AVAILABLE','$user')";
mysqli_query($con,$ins_query348);
$ins_query349="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-04','AVAILABLE','$user')";
mysqli_query($con,$ins_query349);
$ins_query350="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-05','AVAILABLE','$user')";
mysqli_query($con,$ins_query350);
$ins_query351="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-06','AVAILABLE','$user')";
mysqli_query($con,$ins_query351);
$ins_query352="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-07','AVAILABLE','$user')";
mysqli_query($con,$ins_query352);
$ins_query353="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-08','AVAILABLE','$user')";
mysqli_query($con,$ins_query353);
$ins_query354="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-09','AVAILABLE','$user')";
mysqli_query($con,$ins_query354);
$ins_query355="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','REPORT-10','AVAILABLE','$user')";
mysqli_query($con,$ins_query355);



$ins_query36="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 01','AVAILABLE','$user')";
mysqli_query($con,$ins_query36);
$ins_query37="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 02','AVAILABLE','$user')";
mysqli_query($con,$ins_query37);
$ins_query38="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 03','AVAILABLE','$user')";
mysqli_query($con,$ins_query38);
$ins_query39="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 04','AVAILABLE','$user')";
mysqli_query($con,$ins_query39);
$ins_query40="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 05','AVAILABLE','$user')";
mysqli_query($con,$ins_query40);
$ins_query41="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 06','AVAILABLE','$user')";
mysqli_query($con,$ins_query41);
$ins_query42="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 07','AVAILABLE','$user')";
mysqli_query($con,$ins_query42);
$ins_query43="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 08','AVAILABLE','$user')";
mysqli_query($con,$ins_query43);
$ins_query44="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 09','AVAILABLE','$user')";
mysqli_query($con,$ins_query44);
$ins_query45="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 10','AVAILABLE','$user')";
mysqli_query($con,$ins_query45);



$ins_query336="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 11','AVAILABLE','$user')";
mysqli_query($con,$ins_query336);
$ins_query337="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 12','AVAILABLE','$user')";
mysqli_query($con,$ins_query337);
$ins_query338="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 13','AVAILABLE','$user')";
mysqli_query($con,$ins_query338);
$ins_query339="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 14','AVAILABLE','$user')";
mysqli_query($con,$ins_query339);
$ins_query340="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 15','AVAILABLE','$user')";
mysqli_query($con,$ins_query340);
$ins_query341="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 16','AVAILABLE','$user')";
mysqli_query($con,$ins_query341);
$ins_query342="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 17','AVAILABLE','$user')";
mysqli_query($con,$ins_query342);
$ins_query343="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 18','AVAILABLE','$user')";
mysqli_query($con,$ins_query343);
$ins_query344="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 19','AVAILABLE','$user')";
mysqli_query($con,$ins_query344);
$ins_query345="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','WALK IN 20','AVAILABLE','$user')";
mysqli_query($con,$ins_query345);



 
    echo '<script language="javascript">';
    echo 'alert("Appointment Successfully set"); ';
    echo '</script>';


} 

else 
{
       echo '<script language="javascript">';
    echo 'alert("Appointment time is not set because Doctor Appointment Already set for requested Date !!"); ';
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
			maxDate: new Date(currentYear, currentMonth, currentDate+3)
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
		<h2 align="center">SET DOCTOR'S AVAILABLE DATE &amp; TIME (EVENING)</h2>
		<a href='ccggttt'><span><b>Morning Schedule</span><b></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='ccggttt22'><span>Evening Schedule</span></a>
        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="name">Doctor's Name :</label>
			</span>
			<select name="dname" value=""required/>
			        <option value=''>-Select Doctor-</option>
				<?php 
			$sql = "select * from `doctor` where status='Active'";
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
									<input type="text" name="date" id="datepicker" placeholder="Select Date"required/>
<!-- Password Input --><!-- Age Dropdown -->
			<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="select"required/>
	  <option value=''>-Select Time-</option>
	  <option value='Available'>AVAILABLE</option>
	  
      </select>
      

  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
