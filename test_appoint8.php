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
require('db1.php');
 $user = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$dname2=$_REQUEST['dname'];
$date2=$_REQUEST['date'];
$ct=date('H:i:s');



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

//if (!empty ($_POST['select']))


      
    // Check if form is submitted successfully 
    if(isset($_POST["submit"]))  
    { 

$name =$_REQUEST['dname'];
$reason =$_REQUEST['reason'];
//$did =$_REQUEST['did'];
$date = $_REQUEST['date'];
//$checkbox = $_REQUEST['select'];
$dd=date('Y-m-d',strtotime($date));
$otime=date('d/m/Y H:i:s');
        // Check if any option is selected 
        if(isset($_POST["select"]))  
        { 
            // Retrieving each selected option 
            foreach ($_POST['select'] as $select)  
            //print "You selected $subject<br/>"; 
			{	
			
/*$ins_query3="insert into opd_appoint1 (`dname`,`ddate`,`dslot`,`status`,`user`,`date1`,`remarks`) 
values ('$name', '$date','$select','AVAILABLE','$user','$dd','AVAILABLE')";
mysqli_query($con,$ins_query3);*/


$update="update opd_appoint1 set status='NOT AVAILABLE',remarks='$reason',otime='$otime' where dslot='$select' and date1='$dd' and dname='$name' and status!='Booked'";
mysqli_query($con,$update);
}
			
echo '<script language="javascript">';
    echo 'alert("Appointment Blocked Successfully"); ';
    echo '</script>';


        } 
    else
        echo "Select an option first !!"; 
    } 
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
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
{
  background: rgba(255,255,255,0.1);
  border: n
  font-size: 16px;
  height: 150;
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
        width: 350px;
        margin: 0px;
    }
    select:focus {
        min-width: 350px;
        width: auto;
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
    margin-left: 0px;
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
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+13)
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
		<h2 align="center">SET DOCTOR'S AVAILABLE DATE &amp; TIME </h2>
		
		<fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="name" style="size:20px;">Doctor's Name :</label>
			
			<select name="dname" id="dname" value="" required readonly style="background-color:#ECE3FC">
			        <option value='<?php echo $dname2;?>'><?php echo $dname2;?></option>
				
			</select>
			
<!-- E-mail Input -->
			<form>
<label for="name" style="size:20px;">Select Date :</label>
<input type='date' name="date" onchange="showUser(this.value)"size="20" style='background-color:#ECE3FC;font-size:22px;font-weight:bold' min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('45 days') ); ?>">

</form>
<br>
<select id="txtHint" style="background-color:#ECE3FC;font-size:22px;font-weight:bold" name = 'select[]' multiple size=60><b>Select A Date to View All Worklist.</b></select>
<button type="submit" name="submit">Confirm</button>
  
  

</body>

</html>

<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","app_data_block.php?q="+str + "&dname2=<?php echo $dname2;?>", true);
  xmlhttp.send();
}
</script>


