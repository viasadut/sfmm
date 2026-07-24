<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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


$query3 = "SELECT * FROM who where pmrn= '$pmrn' and eid='$id'"; 
	 
$result3 = mysqli_query($con, $query3);


$status = "";
if(isset($_POST['Submit'])==1)
{
$w1=$_REQUEST['w1'];
$w2=$_REQUEST['w2'];
$w3=$_REQUEST['w3'];
$w4=$_REQUEST['w4'];
$w5=$_REQUEST['w5'];
$w6=$_REQUEST['w6'];
$w7=$_REQUEST['w7'];
$w8=$_REQUEST['w8'];
$w9=$_REQUEST['w9'];
$w10=$_REQUEST['w10'];
$w11=$_REQUEST['w11'];
$w12=$_REQUEST['w12'];
$w13=$_REQUEST['w13'];

$query3 = "SELECT * FROM who where pmrn= '$pmrn' and eid='$id'"; 
	 
$result3 = mysqli_query($con, $query3);


if($res90=mysqli_num_rows($result3)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Information is already updated"); ';
    echo '</script>';
    }
	

else {
	
$ins_query46="insert into who (`pmrn`,`eid`,`w1`,`w2`,`w3`,`w4`,`w5`,`w6`,`w7`,`w8`,`w9`,`w10`,`w11`,`w12`,`w13`) values ('$pmrn', '$id','$w1','$w2','$w3','$w4','$w5','$w6','$w7','$w8','$w9','$w10','$w11','$w12','$w13')";
mysqli_query($con,$ins_query46) or die(mysql_error());;

echo '<script language="javascript">';
    echo 'alert("Successfully Updated!!!"); ';
    echo '</script>';
}

}
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
		
				
	<tr><td align="right"><a target='_blank' href="whoviewot?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>"><b>View Records</a><b></td></tr>	


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
	


<label for="age"><strong> Has the patient confirmed his/her identity,site, procedure, and consent? </strong></label> <br>
<input type="radio" name="w1" value="YES" Checked> YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w1" value="NO"> NO



<br><br><br>
<label for="age"><strong> Is the site marked? </strong></label> <br>
<input type="radio" name="w2" value="YES" Checked> YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w2" value="N/A"> N/A


<br><br><br>
<label for="age"><strong> Is the anaesthesia machine and medication check complete? </strong></label> <br>
<input type="radio" name="w3" value="YES" Checked> YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w3" value="NO"> NO

<br><br><br>
<label for="age"><strong> Is the pulse oximeter on the patient and functioning? </strong></label> <br>
<input type="radio" name="w4" value="YES" Checked> YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w4" value="NO"> NO

<br><br><br>
<label for="age"><strong> Does the patient have a: Known allergy?  </strong></label> <br>
<input type="radio" name="w5" value="NO" Checked> NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w5" value="YES"> YES


<br><br><br>
<label for="age"><strong> Difficult airway or aspiration risk?  </strong></label> <br>
<input type="radio" name="w6" value="NO" Checked> NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w6" value="Yes, and equipment/assistance available"> Yes, and equipment/assistance available


<br><br><br>
<label for="age"><strong> Risk of >500ml blood loss (7ml/kg in children)?</strong></label> <br>
<input type="radio" name="w7" value="NO" Checked> NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w7" value="Yes, and two IVs/central access and fluids planned"> Yes, and two IVs/central access and fluids planned


<br><br><br>
<label for="age"><strong> Confirm all team members have introduced themselves by name and role</strong></label> <br>
<input type="radio" name="w8" value="YES" Checked> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w8" value="NO"> NO

<br><br><br>
<label for="age"><strong> Confirm the patient’s name, procedure, and where the incision will be made.</strong></label> <br>
<input type="radio" name="w9" value="YES" Checked> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w9" value="NO"> NO

<br><br><br>
<label for="age"><strong> Has antibiotic prophylaxis been given within the last 60 minutes?</strong></label> <br>
<input type="radio" name="w10" value="YES" Checked> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w10" value="NA"> NA

<br><br><br>
<label for="age"><strong> Has sterility (including indicator results) been confirmed?</strong></label> <br>
<input type="radio" name="w11" value="YES" Checked> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w11" value="NO"> NO

<br><br><br>
<label for="age"><strong> Are there equipment issues or any concerns?</strong></label> <br>
<input type="radio" name="w12" value="YES" Checked> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w12" value="NO"> NO

<br><br><br>
<label for="age"><strong> Is essential imaging displayed?</strong></label> <br>
<input type="radio" name="w13" value="YES" Checked> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="w13" value="NA"> NA




  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
