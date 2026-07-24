<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
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
$year=date('Y');
$etime=date('d/m/Y H:i:s');
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from death where id='$id'");
$data = mysqli_fetch_assoc($query4);
 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
$rdoc =$_REQUEST['rdoc'];
$rdate = $_REQUEST['rdate'];
$rdate1=date("d/m/Y", strtotime($rdate));
$rtime = $_REQUEST['rtime'];
//$date1 =$_REQUEST[ 'date1'];
//$slot = $_REQUEST['slot'];
//$doc1 = $_REQUEST['doc'];
$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
$ppadd = $_REQUEST['ppadd'];
$psex = $_REQUEST['psex'];
$diag = $_REQUEST['diag'];
$bp = $_REQUEST['bp'];
$bname = $_REQUEST['bname'];
$badd = $_REQUEST['badd'];
$brel= $_REQUEST['brel'];
$cdeath = $_REQUEST['cdeath'];
$fname = $_REQUEST['fname'];
$ppadd = $_REQUEST['ppadd'];
$pnid = $_REQUEST['pnid'];
$idetails = $_REQUEST['idetails'];
//$bill = $_REQUEST['bill'];

//$sel="SELECT * FROM death WHERE `pmrn`='$pmrn';";
//$result = mysqli_query($con,$sel);


//$sel2="SELECT * FROM death1 WHERE `pmrn`='$pmrn';";
//$result2 = mysqli_query($con,$sel2);



	
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];

$ins_query="insert into death (`name`,`pmrn`,`fname`,`padd`,`ppadd`,`rdoc`,`rdate`,`rdate1`,`rtime`,`pphone`,`page`,`psex`,`diag`,`bp`,`bname`,`badd`,`brel`,`cdeath`,`year`,`eby`,`etime`,`pnid`,`idetails`,`csendto`) values 
('$name', '$pmrn','$fname','$padd','$ppadd','$rdoc','$rdate','$rdate1','$rtime','$pphone','$page','$psex','$diag','$bp','$bname','$badd','$brel','$cdeath','$year','$full','$etime','$pnid','$idetails','md')";
mysqli_query($con,$ins_query) or die(mysql_error());



  echo '<script language="javascript">';
    echo 'alert("Successfully issued the Death Certificate against this MRN"); ';
    echo '</script>';
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
  width: 80%;
}

textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
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
    max-width: 800px;
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
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
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
		<h1>Death Certificate Issue Panel</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			

		
		<!-- E-mail Input -->
		
		<label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="80" value="<?php echo $data["name"]; ?>" />
	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            <input name="psex" type="text" size="15" value="<?php echo $data["psex"]; ?>"/>
            <input name="pmrn" type="text" size="15" value="<?php echo $data["pmrn"]; ?>"readonly>
      <input name="pphone" type="text" size="13" value="<?php echo $data["pphone"]; ?>"/>	  
	  <input name="page" type="text" size="11"value="<?php echo $data["page"]; ?>"/>
	  
	  <label for="age"><strong>Patient NID No / Birth ID :</strong></label>
      <input name="pnid" type="text" size="80" value="" required>
	  
	  <label for="age"><strong>Father / Husband's Name :</strong></label>
      <input name="fname" type="text" size="80" value="<?php echo $data["fname"]; ?>" >
 	  <label for="age"><strong>Patient's Present ADDRESS :</strong></label>
      <input name="padd" type="text" size="80" value="<?php echo $data["padd"]; ?>"/>
	  <label for="age"><strong>Patient's Permanet ADDRESS :</strong></label>
      <input name="ppadd" type="text" size="80" value="<?php echo $data["ppadd"]; ?>">

	  
      
			<label for="name"><strong>Received Doctor's Name :</strong></label>
			<input name="rdoc" type="text" size="80" value="<?php echo $data["rdoc"]; ?>" readonly>
			<label for="age"><strong>Diagnosis :</strong></label>
      <input name="diag" type="text" size="80" value="Brought in Death" readonly/>
	  
	  <label for="mail"><strong>Date and Time of Receiving :</strong></label>
									<p>
									   <input type="date" name="rdate" value="<?php echo $data["rdate"]; ?>" size="15" required min="2023-01-01" max="2050-12-31" readonly>
									  <input name="rtime" type="text" size="80" value="<?php echo $data["rtime"]; ?>" readonly>
  			
			<label for="age"><strong>Who Brought The Patient? :</strong></label>
      <input name="bp" type="text" size="80" value="<?php echo $data["bp"]; ?>" >
	  
	  <label for="age"><strong>Name :</strong></label>
      <input name="bname" type="text" size="80" value="<?php echo $data["bname"]; ?>" >
	  
	  
	  	  <label for="age"><strong>Address :</strong></label>
      <input name="badd" type="text" size="80" value="<?php echo $data["badd"]; ?>" >
	  	  <label for="age"><strong>Relationship :</strong></label>
      <input name="brel" type="text" size="80" value="<?php echo $data["brel"]; ?>" >
	  
	  <label for="age"><strong>Cause Of Death :</strong></label>
      <textarea size="100" name="cdeath" readonly><?php echo $data["cdeath"]; ?></textarea>
	  
	  	  <label for="age"><strong>Indentifyer Details (Name,NID,Address,Phone)  :</strong></label>
      <textarea size="500" name="idetails" required></textarea>
	  
	  	  
  </fieldset>

		<button type="submit" name="Submit">Confirm</button>
		

</form>
  
  

</body>

</html>
