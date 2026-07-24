<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="endo"){
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

//$name =$_REQUEST['dname'];
//$did =$_REQUEST['did'];
$date = $_REQUEST['date'];
$checkbox = $_REQUEST['select'];



 
if (($_POST['select'])=="ENDOSCOPY")
{
	
	
$ins_query1="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','09:00AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','09:10AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','09:20AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','09:30AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','09:40AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','09:50AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','10:00AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','10:10AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','10:20AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','10:30AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','10:40AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','10:50AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query110);
$ins_query111="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','11:00AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','11:10AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','11:20AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','11:30AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','11:40AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','11:50AM','AVAILABLE','$user')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','12:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','12:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','12:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','12:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','12:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','12:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','02:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query123);
$ins_query124="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','02:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query124);
$ins_query125="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','02:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query125);
$ins_query126="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','02:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query126);
$ins_query127="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','02:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query127);
$ins_query128="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','02:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query128);
$ins_query129="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','03:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query129);
$ins_query130="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','03:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query130);
$ins_query131="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','03:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query131);
$ins_query132="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','03:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query132);
$ins_query133="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','03:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query133);
$ins_query134="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','03:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query134);
$ins_query135="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','04:00PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query135);
$ins_query136="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','04:10PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query136);
$ins_query137="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','04:20PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query137);
$ins_query138="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','04:30PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query138);
$ins_query139="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','04:40PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query139);
$ins_query140="insert into endoapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','04:50PM','AVAILABLE','$user')";
mysqli_query($con,$ins_query140);










   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
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
  <title>Endo Suite App</title>
  
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
			maxDate: new Date(currentYear, currentMonth, currentDate+10)
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
   <li><a href='endonursehome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h2 align="center">SET ENDOSCOPY SUITE'S AVAILABLE DATE &amp; TIME </h2>
		
		<fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="age"><strong>Service Name :</strong></label>
			
			<select name="select" required/>
	  <option value=''>-Select Time-</option>
	  <option value='ENDOSCOPY'>ENDOSCOPY</option>
	  
      </select>
      

			
<!-- E-mail Input -->
			<label for="mail"><strong>Appointment Date :</strong></label>
									<input type="text" name="date" id="datepicker" placeholder="Select Date" required/>
<!-- Password Input --><!-- Age Dropdown -->
			
  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
