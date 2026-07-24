<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mofficer"){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
$id=$_REQUEST['id'];


$query = "SELECT * from emedi2 where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<?php
require('db1.php');
$user=$_REQUEST['user'];
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=$_REQUEST["stdate"];
$end=$_REQUEST["endate"];
$bt=$_REQUEST["bt"];
$date3=date('d/m/Y H:i:s');
$update="update emedi2 set status='Cancel', cdate='$date3',cuser='$user' where infusion='$bt' and time BETWEEN '$start' and '$end'";
mysqli_query($con,$update) or die(mysql_error());
}
?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
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
  width: 100%;
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
  height: 50px;
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
    max-width: 1200px;
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

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script>

  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Medication Stop Panel</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="1"><label><strong>Stop Time Start:</strong></label></td>
						<td colspan="1"><label><strong>Stop Time End:</strong></label></td>	

							<td colspan="10"><label><strong> Medicine Name</strong></label></td> 
			 				<td colspan="8">	<label><strong>STOP:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="1" align="center"><input list="rr5" name="stdate" size=60% class="form-control">
  <datalist id="rr5">
<option value=''>-Select-</option>
						<option value='00:00'>00:00</option>
						<option value='01:00'>01:00</option>
						<option value='02:00'>02:00</option>
						<option value='03:00'>03:00</option>
						<option value='04:00'>04:00</option>
						<option value='05:00'>05:00</option>
						<option value='06:00'>06:00</option>
						<option value='07:00'>07:00</option>
						<option value='08:00'>08:00</option>
						<option value='09:00'>09:00</option>
						<option value='10:00'>10:00</option>
						<option value='11:00'>11:00</option>
						<option value='12:00'>12:00</option>
						<option value='12:00'>13:00</option>
						<option value='14:00'>14:00</option>
						<option value='15:00'>15:00</option>
						<option value='16:00'>16:00</option>
						<option value='17:00'>17:00</option>
						<option value='18:00'>18:00</option>
						<option value='19:00'>19:00</option>
						<option value='20:00'>20:00</option>
						<option value='21:00'>21:00</option>
						<option value='22:00'>22:00</option>
						<option value='23:00'>23:00</option>
			  </datalist></td>
					 <td colspan="1" align="center"><input list="rr5" name="endate" size=60% class="form-control">
  <datalist id="rr5">
<option value=''>-Select-</option>
						<option value='00:00'>00:00</option>
						<option value='01:00'>01:00</option>
						<option value='02:00'>02:00</option>
						<option value='03:00'>03:00</option>
						<option value='04:00'>04:00</option>
						<option value='05:00'>05:00</option>
						<option value='06:00'>06:00</option>
						<option value='07:00'>07:00</option>
						<option value='08:00'>08:00</option>
						<option value='09:00'>09:00</option>
						<option value='10:00'>10:00</option>
						<option value='11:00'>11:00</option>
						<option value='12:00'>12:00</option>
						<option value='12:00'>13:00</option>
						<option value='14:00'>14:00</option>
						<option value='15:00'>15:00</option>
						<option value='16:00'>16:00</option>
						<option value='17:00'>17:00</option>
						<option value='18:00'>18:00</option>
						<option value='19:00'>19:00</option>
						<option value='20:00'>20:00</option>
						<option value='21:00'>21:00</option>
						<option value='22:00'>22:00</option>
						<option value='23:00'>23:00</option>
			  </datalist></td>
					 <td colspan="10"><input type="text" name="bt" value="<?php echo $row['infusion'];?>"readonly/>
						
				
</td>  
					<td colspan="8">	<button type="submit" name="bsearch">STOP</button></td>
					 </tr>
					 
					 
		




</form>
</body>
</html>
