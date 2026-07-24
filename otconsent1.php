<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2?err=2');
    }
?>
<?php
$pmrn=$_REQUEST['pmrn'];
$pro=$_REQUEST['pro'];
$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];


require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result



$row39 = mysqli_fetch_array($result39);


$sel43="SELECT * FROM patient WHERE `pmrn`='$pmrn' ;";
$result43 = mysqli_query($con, $sel43) or die(mysqli_error());
$row3 = mysqli_fetch_assoc($result43);
$ppname=$row3['pname'];
$page=$row3['page'];



/*$query43 = "SELECT COUNT(pmrn) FROM mcertificate where pmrn= '$pmrn' and ct='unfit';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$eid = $count+1;  */

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
//include("auth.php");
$user=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['Submit'])==1)
{

$pname =$_REQUEST['pname'];
$pmrn =$_REQUEST['pmrn'];
//$passno =$_REQUEST['passno'];
$passno1 =$_REQUEST['passno1'];
$dname =$_REQUEST['dname'];
$padd =$_REQUEST['padd'];
$psex =$_REQUEST['psex'];
$spass =$_REQUEST['spass'];
$sdesig =$_REQUEST['sdesig'];
$wname =$_REQUEST['wname'];

$idate = date( 'm/d/Y');
$idate1=date("d/m/Y", strtotime($idate));
$idate1=date('d/m/Y H:i:s');



$sel90="SELECT * FROM otconsent1 WHERE `pmrn`='$pmrn' and `eid`='$id' and `pro`='$pro';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)==1)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Consent Already Taken"); ';
    echo '</script>';
    }

else {
$ins_query="insert into otconsent1 (`pmrn`,`eid`,`pname`,`passno1`,`dname`,`padd`,`psex`,`spass`,`sdesig`,`tdate`,`pname1`,`pro`,`page`,`user`,`tdate1`,`wname`,`ward`,`bed`) values 
('$pmrn','$id','$ppname','$passno1','$dname','$padd','$psex','$spass','$sdesig','$idate','$pname','$pro','$page','$user','$idate1','$wname','Endoscopy','Daycare')";
mysqli_query($con,$ins_query) or die(mysql_error());}


 

	


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
  width: 100%;
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
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+90)
		});
	});
</script>


<script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker2').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+90)
		});
	});
</script>


<script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+90)
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
		<h1>Consent For Operation / Treatment / Procedure</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
		

	  	
<label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="80" value="<?php echo $row3["pname"]; ?>">          
	  
	  <label for="age"><strong>Patient's Address :</strong></label>
      <input name="padd" type="text" size="80" value="<?php echo $row3["padd"]; ?>" >          
	  
	  <label for="age"><strong>Doctor Name :</strong></label>
      <input name="dname" type="text" size="80" value="<?php echo "$dname" ?>" readonly>          


<label for="age"><strong>Patient's Details (MRN/Gender) :</strong></label>
	  <input name="pmrn" type="text" size="15" value="<?php echo $row3["pmrn"]; ?>"readonly>
	  <input name="psex" type="text" size="15" value="<?php echo $row3["psex"]; ?>"readonly>
	  
            
      
	  

	  
	  	  
	  	  <label for="age"><strong>Passport / National ID NO :</strong></label>
      <input name="passno1" type="text" size="80" value="" required>
	  
	  
	  	  <label for="age"><strong>Witness Name :</strong></label>
      <input name="wname" type="text" size="80" value="" required>
		  
		  <label for="age"><strong>Witness's Passport / National ID NO :</strong></label>
      <input name="spass" type="text" size="80" value="" required>
	  
	  	  <label for="age"><strong>Witness's Designation :</strong></label>
      <input name="sdesig" type="text" size="80" value="" required>
 	  
			
					
	  

	  
      

  </fieldset>

		<button type="submit" name="Submit">Confirm</button>
<td><a target='_blank' href="otconsentprint1.php?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo "$id"; ?>&pro=<?php echo "$pro"; ?>&dname=<?php echo "$dname"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>  
</form>
  
  

</body>

</html>
