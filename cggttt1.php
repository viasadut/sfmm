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

if (!empty ($_POST['select']))
$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:00AM','NOT AVAILABLE','$user')";
if ($con->query($ins_query) === TRUE) 
{
$ins_query1="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:15AM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query1);
$ins_query2="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:30AM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query2);
$ins_query3="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:45AM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query3);
$ins_query4="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','11:00AM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query4);
$ins_query5="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','11:15AM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query5);
$ins_query6="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','11:30AM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query6);
$ins_query7="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','11:45AM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query7);
$ins_query8="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','12:00PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query8);
$ins_query9="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','12:15PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query9);
$ins_query10="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','12:30PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query10);
$ins_query11="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','12:45PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query11);
$ins_query12="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:00PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query12);
$ins_query13="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:15PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query13);
$ins_query14="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:30PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query14);
$ins_query15="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','02:45PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query15);
$ins_query16="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:00PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query16);
$ins_query17="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:15PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query17);
$ins_query18="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:30PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query18);
$ins_query19="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','03:45PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query19);
$ins_query20="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:00PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query20);
$ins_query21="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:15PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query21);
$ins_query22="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:30PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query22);
$ins_query23="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','04:45PM','NOT AVAILABLE','$user')";
mysqli_query($con,$ins_query23);
   
    echo '<script language="javascript">';
    echo 'alert("Successfully Registered"); ';
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
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
   <li><a href='cview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

    	    <li class='last'><a href='gg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='app1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h2 align="center">SET DOCTOR'S NOT AVAILABLE DATE &amp; TIME </h2>
        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="name">Doctor's Name :</label>
			</span>
			<select name="dname" value="">
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
									<input type="text" name="date" id="datepicker" placeholder="Select Date">
<!-- Password Input --><!-- Age Dropdown -->
			<label for="age"><strong>NOT AVAILABLE Slot :</strong></label>
			
			<select name="select">
	  <option value=''>-Select Time-</option>
	  <option value='NOT AVAILABLE'>NOT AVAILABLE</option>
	  
      </select>
      

  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
