<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');




//include("auth1.php");
$user=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['submit'])==1)
{

$name =$_REQUEST['dname'];
//$did =$_REQUEST['did'];
$date = $_REQUEST['date'];

$date1=date('Y-m-d', strtotime($date));


$checkbox1 = $_REQUEST['select1'];
$checkbox2 = $_REQUEST['select2'];


$sel90="SELECT * from otslot WHERE otname ='$name' and otdate='$date1';";
$result90 = mysqli_query($con,$sel90);


if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Slot Available for this OT to block"); ';
    echo '</script>';
    }
	else 
	{
$update="update otslot set status='BLOCK' where otname='$name' and  otdate='$date1' and ottime between '$checkbox1' and '$checkbox2' and status='vacant'";
	mysqli_query($con,$update) or die(mysql_error());
	echo '<script language="javascript">';
    echo 'alert("Appointment Blocked Successfully !!"); ';
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
  width: 19%;
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
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>BLOCK OT DATE &amp; TIME </h1>
        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="name">OT's Name :</label>
			</span>
			<select name="dname" required>
			         <option value=''>-Select OT-</option>
	  
						<option value='OT01'>OT01</option>
						<option value='OT02'>OT02</option>
						<option value='OT03'>OT03</option>
						<option value='OT04'>OT04</option>
				
			</select>
<!-- E-mail Input -->
			<label for="mail"><strong>Appointment Date :</strong></label>
									<input type="text" name="date" id="datepicker" placeholder="Select Date" required>
<!-- Password Input --><!-- Age Dropdown -->
			<label for="age"><strong>BLOCK UR SLOT :</strong></label>
			
		
<select name="select1">
	<option>Select</option>
	  <option value='06:00:00'>06AM</option>
	  <option value='07:00:00'>07AM</option>
	  <option value='08:00:00'>08AM</option>
	  <option value='09:00:00'>09AM</option>
	  <option value='10:00:00'>10AM</option>
	  <option value='11:00:00'>11AM</option>
	  <option value='12:00:00'>12PM</option>
	  <option value='13:00:00'>01PM</option>
	  <option value='14:00:00'>02PM</option>
	  <option value='15:00:00'>03PM</option>
	  <option value='16:00:00'>04PM</option>
	  <option value='17:00:00'>05PM</option>
	  <option value='18:00:00'>06PM</option>
	  <option value='19:00:00'>07PM</option>
	  <option value='20:00:00'>08PM</option>
	  <option value='21:00:00'>09PM</option>
	  <option value='22:00:00'>10PM</option>
	  
	  
      </select>
	  
	  <select name="select2" required>
	  <option>Select</option>
	  <option value='06:00:00'>06AM</option>
	  <option value='07:00:00'>07AM</option>
	  <option value='08:00:00'>08AM</option>
	  <option value='09:00:00'>09AM</option>
	  <option value='10:00:00'>10AM</option>
	  <option value='11:00:00'>11AM</option>
	  <option value='12:00:00'>12PM</option>
	  <option value='13:00:00'>01PM</option>
	  <option value='14:00:00'>02PM</option>
	  <option value='15:00:00'>03PM</option>
	  <option value='16:00:00'>04PM</option>
	  <option value='17:00:00'>05PM</option>
	  <option value='18:00:00'>06PM</option>
	  <option value='19:00:00'>07PM</option>
	  <option value='20:00:00'>08PM</option>
	  <option value='21:00:00'>09PM</option>
	  <option value='22:00:00'>10PM</option>
	  
      </select>


	  <br>
  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
