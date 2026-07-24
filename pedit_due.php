<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ddf"){
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
$ctime = date('Y-m-d h:i:s');
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['ID'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn' and ID='$id'");
$data = mysqli_fetch_assoc($query4);

	$ttr=$data['bdate'];

$dd1=date('d',strtotime($ttr));
$mm1=date('m',strtotime($ttr));
$yy1=date('Y',strtotime($ttr));

 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['Submit']))
{
	

$pname =$_REQUEST['pname'];
$pmrn =$_REQUEST['pmrn'];
//$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];

$due= $_REQUEST['due'];
$due_remarks= $_REQUEST['due_remarks'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$bill = $_REQUEST['bill'];



//$fdate='$dd-$mm-$yy';


 if($fullname !=''){

  $ins_query1="insert into patient_payment (`pname`,`pmrn`,`due_clear_by`,`due_remarks`,`remarks`,`due_clear_time`) values 
  ('$name','$pmrn','$full','$due_remarks','$due','$ctime')";
  mysqli_query($con,$ins_query1) or die(mysql_error());
  


$update="update patient set remarks='$due',due_remarks='$due_remarks',due_clear_by='$full',due_clear_time='$ctime' where `ID`='$id'";
mysqli_query($con,$update) or die(mysql_error());




  echo '<script language="javascript">';
    echo 'alert("Patient Personal Record Updated Successfully!!"); ';
    echo '</script>';

}
else{
	echo '<script language="javascript">';
    echo 'alert("Something Went Wrong!!"); ';
    echo '</script>';

	
}
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    

  
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
  width: 25%;
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
		<h1>EDIT PATIENT'S PERSONAL DETAILS  </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
				  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="80" style="text-transform:uppercase" value="<?php echo $data["pname"]; ?>" readonly>

      <label for="age"><strong>Patient's MRN :</strong></label>
      <input name="pmrn" type="text" size="80" style="text-transform:uppercase" value="<?php echo $data["pmrn"]; ?>" readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="80" style="text-transform:uppercase" value="<?php echo $data["padd"]; ?>" readonly>

      
<label for="age"><strong>Patient's Due Status :</strong></label>
	  	
            
	  	<select name="due" id="type"class="style1" placeholder="Patient Type"  required> 
		
		
		<option value="<?php echo $data["remarks"]; ?>"><?php echo $data["remarks"]; ?></option>
			<option value="Due">Due</option>;
			<option value="Partial Due">Partial Due</option>;
      <option value="No Due">No Due</option>;
				
      </select>


      <label for="age"><strong>Remarks:</strong></label>
      <input name="due_remarks" type="text" size="80" style="text-transform:uppercase" value="<?php echo $data["due_remarks"]; ?>">

  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
