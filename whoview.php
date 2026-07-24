<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$dname1=$_REQUEST['dname1'];
//include("auth.php");
$user=$_SESSION["sess_username"];
$time=date('d/m/Y h:i:s');

$query39 = "SELECT * FROM ot where id= '$id'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row39 = mysqli_fetch_array($result39);
$pmrn=$row39['pmrn'];

/*$query43 = "SELECT COUNT(pmrn) FROM endoreport where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;*/
$query1 = "SELECT * from inpatient where pmrn='$pmrn' and idisconfirm !='Confirmed'"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);
$room=$row1['room'];
$room1=$row1['room1'];
$addate= $row1['adate'];
$eid= $row1['eid'];


$query2 = "SELECT * from who where pmrn='$pmrn' and eid='$id'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row2 = mysqli_fetch_assoc($result2);



?>

<?php
if(isset($_POST['Submit669']))
{
$url = "otanaesvitalsnurse?pmrn=$pmrn&id=$id";
header("Location: $url");
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

textarea {
 
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
		<h1>WHO CHECKLIST</h1>

        <fieldset>
		
				
	


	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="70" class="style1" value="<?php echo $row39['pname'];?>" readonly>
 	  <label for="age"><strong>Patient's Location :</strong></label>
      <input name="room" type="text" size="30" class="style1" value="<?php echo $room;?>"readonly>
	  <input name="room1" type="text" size="30" class="style1" value="<?php echo $room1;?>"readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
      <input name="psex" type="text" size="11" class="style1" value="<?php echo $row39['psex'];?>"readonly>
	  
      <input name="pmrn" type="text" size="15"Placeholder="Patient's MRN" class="style1" value="<?php echo $row39['pmrn'];?>"readonly>
      <input name="pphone" type="text" size="13" Placeholder="Patient's Phone NO" class="style1"value="<?php  echo $row39['pphone'];?>"readonly>	  
	  <input name="page" type="text" size="5" class="style1" value="<?php echo $row39['page'];?>" readonly>
    <br><br><br>  
	


<label for="age"><strong> Has the patient confirmed his/her identity,site, procedure, and consent? - <b><?php echo $row2['w1']?><b> </strong></label>




<br>
<label for="age"><strong> Is the site marked? - <b><?php echo $row2['w2']?><b></strong></label> <br>




<label for="age"><strong> Is the anaesthesia machine and medication check complete? - <b><?php echo $row2['w3']?><b></strong></label> <br>



<label for="age"><strong> Is the pulse oximeter on the patient and functioning?- <b><?php echo $row2['w4']?> <b> </strong></label> <br>



<label for="age"><strong> Does the patient have a: Known allergy? - <b><?php echo $row2['w5']?><b> </strong></label> <br>




<label for="age"><strong> Difficult airway or aspiration risk? - <b><?php echo $row2['w6']?><b> </strong></label> <br>




<label for="age"><strong> Risk of >500ml blood loss (7ml/kg in children)? -<b><?php echo $row2['w7']?><b></strong></label> <br>




<label for="age"><strong> Confirm all team members have introduced themselves by name and role - <b><?php echo $row2['w8']?><b></strong></label> <br>



<label for="age"><strong> Confirm the patient’s name, procedure, and where the incision will be made. -<b><?php echo $row2['w9']?><b></strong></label> <br>

<label for="age"><strong> Has antibiotic prophylaxis been given within the last 60 minutes? - <b><?php echo $row2['w10']?><b></strong></label> <br>



<label for="age"><strong> Has sterility (including indicator results) been confirmed? - <b><?php echo $row2['w11']?><b></strong></label> <br>



<label for="age"><strong> Are there equipment issues or any concerns? - <b><?php echo $row2['w12']?><b></strong></label> <br>



<label for="age"><strong> Is essential imaging displayed? <b><?php echo $row2['w13']?><b></strong></label> <br>





  </fieldset>

		

</form>
  
  

</body>

</html>
