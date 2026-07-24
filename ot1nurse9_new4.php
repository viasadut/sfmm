<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('ot','imo','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
include_once 'dbconfig.php';
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$date=date('m/d/Y');
//$bt4='02:30:00';
//$bt3='18:00:00';

//$duration1=strtotime($bt4) - strtotime($bt3); 
//echo $duration=gmdate("H:i",$duration1); 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];

//include("auth.php");
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from patient where pmrn='$pmrn'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

 
$query1 = "SELECT * from inpatient where pmrn='$pmrn' and idisconfirm !='Confirmed'"; 
$result1 = mysqli_query($con, $query1) or die ( mysqli_error());
$row1 = mysqli_fetch_assoc($result1);

$addate= $row1['adate'];
$eid= $row1['eid'];
$pname= $row['pname'];
$pmrn= $row['pmrn'];
$pphone= $row['pphone'];  
$page=$row['page'];
$psex= $row['gender'];

$queryd = "SELECT * FROM diap where pmrn= '$pmrn' and  eid='$eid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname1'];

$diagnosis=$_REQUEST['diagnosis'];
//$cdetails=$_REQUEST['cdetails'];

$otdate=$_REQUEST['otdate'];
$bkdate=date('d/m/Y H:i:s');
//$bt=$_REQUEST['bt2'];
//$tp=$_REQUEST['tp'];
$typeot=$_REQUEST['typeot'];
//$sn=$_REQUEST['sn'];
//$na=$_REQUEST['na'];
$lx=$_REQUEST['xl'];
//$lx= implode(",",$xl);


//$otherins=$_REQUEST['otherins'];
$sprequire=$_REQUEST['sprequire'];
//$remarks=$_REQUEST['remarks'];
$typeo=$_REQUEST['typeo'];
$lx3=$_REQUEST['xl3'];
//$lx3= implode(",",$x3);
//$bt3=$_REQUEST['bt3'];
//$bt4=$_REQUEST['bt4'];
//$duration1=strtotime($bt4) - strtotime($bt3); 
//$duration=gmdate("H:i",$duration1); 
//$x2=$_REQUEST['xl2'];
//$lx2= implode(",",$x2);
$duration=$_REQUEST['duration'];
$date1=date('Y-m-d', strtotime($otdate));
$date5=date('Y-m-d');





	
if(empty($_REQUEST['dname1']))

{
       echo '<script language="javascript">';
    echo 'alert("No Surgeon Name is selected !!"); ';
    echo '</script>';

    }

	
	else if(empty($_REQUEST['xl']))

{
       echo '<script language="javascript">';
    echo 'alert("Please select Surgery Name!!"); ';
    echo '</script>';

    }	
	
//$t1='11:00';
//$t2='12:30';
//$t3=strtotime($t2)-strtotime($t1);
//echo $t4=gmdate("H:i", $t3);

else {

$ins_query="insert into ot (`dname`,`pname`,`pmrn`,`pphone`,`diagnosis`,`psex`,`page`,`adate`,`otdate`,`bookingdt`,`tanes`,`proce`,`duration2`,`sprequire`,`typeo`,`date5`,`typeot`) values 
('$dname', '$pname','$pmrn','$pphone','$diagnosis','$psex','$page','$addate','$otdate','$bkdate','$lx3','$lx','$duration','$sprequire','$typeo','$date1','$typeot')";
mysqli_query($con,$ins_query) or die(mysql_error());


//$update="update otslot set status='Booked' where `otdate`='$date1' and otname='$bt' and `ottime` between '$bt3' and '$bt4'";
//mysqli_query($con,$update);

echo '<script language="javascript">';
    echo 'alert("Booking Set Successfully"); ';
    echo '</script>';
}
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>OT Booking</title>
  
   

  
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
  background: red;
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
  height: 32px;
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

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
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
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   
   
   
   
   
   <script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".3col").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_privilege.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".3col").html(html);
			} 
		});
	});
	
	
	$(".3col").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='otdash'><span>Home</span></a></li>
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

<h1 align="center">OT BOOKING FORM </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>
		
		
		<form style="background-color: gold;">
		        <table class="table" border='0'>  
		<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's MRN:<?php echo $row['pmrn'];?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Gender:<?php echo $row['psex'];?></strong></label></td>
						
						
						</tr>
						<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Name:<?php echo $row['pname'];?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Phone:</strong> <?php echo $row['pphone'];?></label></td>
						
						
						</tr>
						
						<tr>
						
						
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Patient's Age: <?php echo $row['page'];?></strong></label></td>
						<td colspan="10" align='left' style="font-size: 20px;"><label><strong>Admission Date:<?php echo $row1['adate'];?></strong></label></td>
						
						
						</tr>
		
		</table>
		</form>

<form action="" method="post" style="background-color: lightgreen;">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field"> 

<tr><td colspan="20" style="font-weight: bold;font-size:25px;color:red;" align="center"><label><strong>Approved OT Day</strong></label></td></tr>
<tr>
<td colspan="7"><input type="text" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:16px;color:green"></td>
<td colspan="7"><input type="text" name="tqty" id="tqty1" required value="" readonly style="font-weight: bold;font-size:16px;color:green"></td>
<td colspan="6"><input type="text" name="tqty" id="tqty2" required value="" readonly style="font-weight: bold;font-size:16px;color:green"></td>

</tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td>
				
				<tr>	  
				<td colspan="20">

<input type="text" id="pmrn" onkeyup="GetDetail(this.value)" list="categoryname" autocomplete="off"  required style="font-weight: bold;font-size:16px;color:green" name="dname1" value="" class="country"required>

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `doctor` where status='Active'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['dname']; ?>"><?php echo $row['dname']; ?></option>
        <?php } ?>
        
    </datalist>
	
	</td>

						
						
						
						</tr>
						
						
<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>
		<tr><td colspan="20">
		
		
<select class="3col" name="xl"  value=''required style="font-weight: bold;font-size:16px;color:green">
			 

</select>



</td></tr>


		<tr>
						
						
						<td colspan="4"><label><strong>OT Date:</strong></label></td>
						
						
						
						<td colspan="2"><label><strong>Type Of OT:</strong></label></td>
						<td colspan="2"><label><strong>Duration:</strong></label></td>
						
						<td colspan="8"><label><strong>Type of Anesthesia:</strong></label></td>
							
						</tr>
						
						<tr>				
						

			    	 <td colspan="4"><input type="date" name="otdate"  placeholder="Select Date" value=""size="15" required style="font-weight: bold;font-size:16px;color:green"></td>  

					 
					 
					 
		
							
										
						
						
						
						
					
					 


 
<td colspan="2"><select name="typeot" required style="font-weight: bold;font-size:16px;color:green">
        
						<option value=''>--Select--</option>
						<option value='Elective'>Elective</option>
						<option value='Emergency'>Emergency</option>
						
				
</select>




</td>  
<td colspan="2"><input type="text" name="duration" size="15"value="" required style="font-weight: bold;font-size:16px;color:green"></td>  		             		
					 <td colspan="8"><select name="xl3"  class="3colms active" placeholder="Select Type Of Anaesthesia" style="font-weight: bold;font-size:16px;color:green">
       
						
						<option value=''>--Select--</option>
						<option value='Local'>Local</option>
						<option value='GA - Endotracheal Tube'>GA - Endotracheal Tube</option>
						<option value='GA - LMA'>GA - LMA</option>
						<option value='SAB'>SAB</option>
						<option value='GA + SAB'>GA + SAB</option>
						<option value='GA - LMA + Caudal Epidural'>GA - LMA + Caudal Epidural</option>
						<option value='Nerve Block'>Nerve Block</option>
						<option value='Saddle Block'>Saddle Block</option>
						<option value='Deep Sedation'>Deep Sedation</option>
						<option value='TIVA'>TIVA</option>
						<option value='Inhalational Anesthesia'>Inhalational Anesthesia</option>
						<option value='Dissociative Anaesthesia'>Dissociative Anaesthesia</option>
						<option value='Spinal'>Spinal + Epidural </option>
						
						
				
</select></td>  


 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5" style="font-weight: bold;font-size:16px;color:green"><?php echo $inves;?></textarea></td>  </tr>
						


		






					 </tr>

<tr>
							<td colspan="20"><label><strong>Type Of Operation:</strong></label></td>
						

<tr>
					 <td colspan="20"><select name="typeo" required style="font-weight: bold;font-size:16px;color:green">
        
						
						<option value=''>-Select-</option>
						<option value='Major'>Major</option>
						<option value='Minor'>Minor</option>
						<option value='Intermidiate'>Intermidiate</option>
						
						
						
				
</select></td>  

					 
</tr>
		
		
		 
		<tr>
						
						<td colspan="20"><label><strong> Remarks / Special Requirement:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><input type="text" name="sprequire" value="" style="font-weight: bold;font-size:16px;color:green"></td>  
				
						
					 
					 </tr>
					 
						
				
														

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="otreport?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>&bkdate=<?php echo "$bkdate"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("tqty").value = "";

				document.getElementById("tqty1").value = "";
				document.getElementById("tqty2").value = "";
				
				//document.getElementById("pp").value = "";
				
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
							("tqty").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"tqty1").value = myObj[1];
							
							
							
							document.getElementById(
							"tqty2").value = myObj[2];
							
							//document.getElementById(
							//"qty").value = 0;
							

					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "con_ot_day.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  

</body>

</html>
