<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','call','bill','mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
require('db1.php');
include_once 'dbconfig.php';

	$user = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{
	$user=$_SESSION['sess_username'];

$dname =$_REQUEST['dname'];
$pmrn =$_REQUEST['pmrn'];

$pro_name=$_REQUEST['pro_name'];
//$cdetails=$_REQUEST['cdetails'];

$date1=date('Y-m-d',strtotime($_REQUEST['date']));
$s_date=date('Y-m-d H:i:s');
//$bt=$_REQUEST['bt2'];
//$tp=$_REQUEST['tp'];
$loc=$_REQUEST['loc'];

$remarks=$_REQUEST['remarks'];

$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];

$pname=$_REQUEST['pname'];
$psex=$_REQUEST['psex'];
$pphone=$_REQUEST['pphone'];






$date=date('Y-m-d', strtotime($date));


$queryd = "SELECT * FROM user where fullname= '$dname'"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$dcode=$rowd['uname'];

$querym = "SELECT COUNT(id) FROM privilege where dname= '$dname' and pname='$pro_name' and status='Approved'"; 
	 
$resultm = mysqli_query($con, $querym) or die(mysqli_error());

// Print out result
$rowm = mysqli_fetch_array($resultm);
$ap=$rowm['COUNT(id)'];



	
if(empty($_REQUEST['dname']))

{
       echo '<script language="javascript">';
    echo 'alert("No Surgeon Name is selected !!"); ';
    echo '</script>';

    }

else if($ap==0)

{
       echo '<script language="javascript">';
    echo 'alert("Sorry !! You Dont have the privilege.. kindly apply for it !!"); ';
    echo '</script>';

    }	
	
//$t1='11:00';
//$t2='12:30';
//$t3=strtotime($t2)-strtotime($t1);
//echo $t4=gmdate("H:i", $t3);

else {

$ins_query="insert into con_work (`dname`,`dcode`,`pro_name`,`pname`,`pmrn`,`pphone`,`psex`,`page`,`date`,`s_date`,`s_by`,`remarks`,`status`,`loc`) values 
('$dname', '$user','$pro_name','$pname','$pmrn','$pphone','$psex','$diff1','$date1','$s_date','$user','$remarks','Pending','$loc')";
mysqli_query($con,$ins_query) or die(mysql_error());


//$update="update otslot set status='Booked' where `otdate`='$date1' and otname='$bt' and `ottime` between '$bt3' and '$bt4'";
//mysqli_query($con,$update);

echo '<script language="javascript">';
    echo 'alert("Booking Set Successfully"); ';
    echo '</script>';
$url = "doc_event_calendar.php"; 
header("Location: $url");
	
	}
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SFMMKPJSH DHAKA</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
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
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate+1),
			maxDate: new Date(currentYear, currentMonth, currentDate)
		});
	});
</script>
  
  
  
  <link rel="stylesheet" href="styles.css">
  
  
  
  
 
  
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
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

		
		
<form action="" method="post">

<!-- Form Title -->
		

		
		
        <fieldset>

			<legend></legend>
            <!-- Name Input -->
		<h1>PATIENT'S APPOINTMENT </h1>
	  <label for="age"><strong>Patient's MRN :</strong></label>
<input name="pmrn" id="pmrn"onkeyup="GetDetail(this.value)" type="text" size="85" placeholder="MRN" value="">
		

			<label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" id="pname" type="text" size="85" value="" required readonly>
	  <input name="dname" id="dname" type="text" size="85" value="<?php echo $full;?>" required readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" id="padd" type="text" size="85" value="" required readonly>

	  <label for="age"><strong>Patient's Gender :</strong></label>
	  	
            <input name="psex" id="psex" type="text" size="85" value="" required readonly>
	  
		
		
			
				
      </select>
	  
	  <label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" id="dd" type="text" maxlength="2" size="1" value=""  readonly required placeholder="DD">	/

<input name="mm" id="mm" type="text" maxlength="2" size="1" value=""  readonly required placeholder="MM"> /	

<input name="yy" id="yy" type="text" maxlength="4" size="1" value=""   readonly required placeholder="YYYY">		  
	  
	  
	  
	  <label for="age"><strong>Patient's Phone Number :</strong></label>
	 <input name="pphone" type="text" id="pphone"size="85" placeholder="Phone No"value="" required readonly>	  
            

			<label colspan="5"><label><strong>Procedure Name:</strong></label>
		
		<input type="text" name="pro_name" value="" list='23' size="85">
		
		<datalist id="23" name="pro_name"  class="3col">
		

<option value="">--Select--</option>
	<?php
	$stmt = $DB_con->prepare("SELECT * FROM privilege where status='Approved' and did='$user'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>
        <?php
	} 
?>
 

</datalist>







						
						
						<label colspan="5"><label><strong>Date:</strong></label>
						
						
												

			    	 <input type="date" name="date"  placeholder="Select Date" value=""size="15" required> 

					 
					 
					 
		
							
										
						
						
						
						
	<label><label><strong>Location:</strong></label>				
					 


 
<select name="loc" required>
        
						<option value=''>--Select--</option>
						<option value='OT'>OT</option>
						<option value='Endoscopy'>Endoscopy</option>
						<option value='OPD Procedure'>OPD Procedure</option>
						
				
</select>




						
<label><label><strong>Remarks:</strong></label>
						
							
			<input type="text" name="remarks" value="">
				
						
					 
					 
  
            
	  
	  
	    			  
		  
  <button type="submit" name="Submit">Confirm</button>

</form>
  
<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("pname").value = "";

				document.getElementById("psex").value = "";
				document.getElementById("padd").value = "";
				document.getElementById("pphone").value = "";
				
				document.getElementById("dd").value = "";
				document.getElementById("mm").value = "";
				document.getElementById("yy").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("pname").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"psex").value = myObj[1];
							
							document.getElementById(
							"padd").value = myObj[2];
							
							document.getElementById(
							"pphone").value = myObj[3];
							
							
							document.getElementById(
							"dd").value = myObj[4];
							
							document.getElementById(
							"mm").value = myObj[5];
							
							document.getElementById(
							"yy").value = myObj[6];
							
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "gfg1_pro.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
	
	
	

</body>

</html>
