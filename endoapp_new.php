<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('endo','call','bill','mng','staff')"; 
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
$aatime=date('d/m/Y H:i:s'); 

$ct=date('H:i:s');
$dname2=$_REQUEST['dname'];


require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_username"];
$status = "";
if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
$dname =$_REQUEST['dname'];
//$date = $_REQUEST['date'];
$date22=$_REQUEST['daten'];
$date23=date('m/d/Y', strtotime($date22));
//$date23=$_REQUEST['daten'];
$date10 =$_REQUEST[ 'date10'];
$adate1=date('Y-m-d',strtotime($date22)); 
$slot = $_REQUEST['slot'];
$doc1 = $_REQUEST['doc'];
$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
//$bill = $_REQUEST['bill'];
//$hdlate = $_REQUEST['hdlate'];
//$yage = $_REQUEST['yage'];


$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];


$dis = $_REQUEST['dis'];
$ptype = $_REQUEST['type'];
//$fdate='$dd-$mm-$yy';


$date1=date_create("$dd-$mm-$yy");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");

$sel43="SELECT * FROM opd_appoint1 WHERE `dname`='$dname2' and `date1`='$date22' and dslot='$slot' and status in ('Booked','NOT AVAILABLE');";
$result43 = mysqli_query($con,$sel43);


//$ins_query46="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query46);


$sel="SELECT * FROM pappnew WHERE `pmrn`='$pmrn' and `dname`='$dname2' and adate='$date23' and status!='Cancel';";
$result = mysqli_query($con,$sel);



if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Appointment Slot Selected!!"); ';
    echo '</script>';

    }

else if($res43=mysqli_num_rows($result43)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!The Time Slot is Already Taken By Another Patient"); ';
    echo '</script>';
    }



	else if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Already Have Appointment with the doctor"); ';
    echo '</script>';
    }

	




	
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
else
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 

	
$update="update opd_appoint1 set status='Booked' where `dname`='$dname' and `date1`='$date22' and `dslot`='$slot'";
//mysqli_query($con,$update);
	

$ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`ptype`,`page1`) values 
('$name', '$pmrn','$pphone','$padd','$dname','$date23','$slot','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','$ptype','ccgg1new_test1')";
//mysqli_query($con,$ins_query) or die(mysql_error());



//$ins_query_1="update set patient bdate='$date91' where pmrn='$pmrn'";
//mysqli_query($con,$ins_query_1);
if(mysqli_query($con,$update)==true and mysqli_query($con,$ins_query)==true)
{
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully!!!"); ';
    echo '</script>';
	
}

else {
	
	echo '<script language="javascript">';
    echo 'alert("failed!!!"); ';
    echo '</script>';

}
} 


}


?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>PATIENT'S APPOINTMENT</title>
  
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
  
  height: 60px;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 30%;
  background-color: #e8eeef;
  color: red;
  font-weight: bold;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 60px;
  border-radius: 2px;
}



button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 20%;
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
    max-width: 900px;
  }

}






* {
    box-sizing: border-box;
}
#data {
    overflow:hidden;
    padding:0;
	width:94vw;
	
}
select {
	padding:0;
	padding-left:1px;
	border:none;
	background-color:#eee;
	width:50%;
	white-space: normal;
	height:60px;
}
option {
	height:40px;
	width:52px;
	border:1px solid #000;
	background-color:white;
	margin-left:-1px;
	display:inline-block;
}




      </style>

    
<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
  
  




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>
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
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>


  
          
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
	
</head>


<body style="background-color:lightgreen">

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

<form action="" method="post" style="background-color:#F8DAE9">

<!-- Form Title -->
		<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>

			
            <!-- Name Input -->
			
			
			<label for="name"><strong>Doctor's Name :</strong></label>
			<select name="doc" value="" id='dname' style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:350px">
			        <option value='<?php echo $dname2;?>'><?php echo $dname2;?></option>
				
			</select>
			
			
			    
		<!-- E-mail Input -->
		
		<label for="age"><strong>MRN :</strong></label>
<input name="pmrn" id="pmrn"onkeyup="GetDetail(this.value)" type="text" placeholder="MRN" value="" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:300px">
      
	  

			<label for="age"><strong>Name :</strong></label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="name" id="pname" type="text" value="" required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:300px">
 	  <label for="age"><strong>ADDRESS :</strong></label>
      <input name="padd" id="padd" type="text" size="85" value="" required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:330px">


<label for="age"><strong>District :</strong></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="dis" id="dis" class="style1" placeholder="District" required style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:200px"> 
		
		
		<option value=""></option>

<option value='Barguna'>Barguna</option>
<option value='Barisal'>Barisal</option> 
<option value='Bhola'>Bhola</option>
<option value='Jhalokati'>Jhalokati</option> 
<option value='Patuakhali'>Patuakhali</option> 
<option value='Pirojpur'>Pirojpur</option> 
<option value='Bandarban'>Bandarban</option> 
<option value='Brahmanbaria'>Brahmanbaria</option> 
<option value='Chandpur'>Chandpur</option> 
<option value='Chittagong'>Chittagong</option> 
<option value='Comilla'>Comilla</option> 
<option value='Coxs Bazar'>Cox's Bazar</option> 
<option value='Feni'>Feni</option> 
<option value='Khagrachhari'>Khagrachhari</option> 
<option value='Lakshmipur'>Lakshmipur</option> 
<option value='Noakhali'>Noakhali</option> 
<option value='Rangamati'>Rangamati</option> 
<option value='Dhaka'>Dhaka</option> 
<option value='Faridpur'>Faridpur</option> 
<option value='Gazipur'>Gazipur</option> 
<option value='Gopalganj'>Gopalganj</option> 
<option value='Kishoreganj'>Kishoreganj</option> 
<option value='Madaripur'>Madaripur</option> 
<option value='Manikganj'>Manikganj</option> 
<option value='Munshiganj'>Munshiganj</option> 
<option value='Narayanganj'>Narayanganj</option> 
<option value='Narsingdi'>Narsingdi</option> 
<option value='Rajbari'>Rajbari</option> 
<option value='Shariatpur'>Shariatpur</option> 
<option value='Tangail'>Tangail</option> 
<option value='Bagerhat'>Bagerhat</option> 
<option value='Chuadanga'>Chuadanga</option> 
<option value='Jessore'>Jessore</option> 
<option value='Jhenaidah'>Jhenaidah</option> 
<option value='Khulna'>Khulna</option> 
<option value='Kushtia'>Kushtia</option> 
<option value='Magura'>Magura</option> 
<option value='Meherpur'>Meherpur</option> 
<option value='Narail'>Narail</option> 
<option value='Satkhira'>Satkhira</option> 
<option value='Jamalpur'>Jamalpur</option> 
<option value='Mymensingh'>Mymensingh</option> 
<option value='Netrokona'>Netrokona</option> 
<option value='Sherpur'>Sherpur</option> 
<option value='Bogra'>Bogra</option> 
<option value='Joypurhat'>Joypurhat</option> 
<option value='Naogaon'>Naogaon</option> 
<option value='Natore'>Natore</option> 
<option value='Chapai Nawabganj'>Chapai Nawabganj</option> 
<option value='Pabna'>Pabna</option> 
<option value='Rajshahi'>Rajshahi</option> 
<option value='Sirajganj'>Sirajganj</option> 
<option value='Dinajpur'>Dinajpur</option> 
<option value='Gaibandha'>Gaibandha</option> 
<option value='Kurigram'>Kurigram</option> 
<option value='Lalmonirhat'>Lalmonirhat</option> 
<option value='Nilphamari'>Nilphamari</option> 
<option value='Panchagarh'>Panchagarh</option> 
<option value='Rangpur'>Rangpur</option> 
<option value='Thakurgaon'>Thakurgaon</option> 
<option value='Habiganj'>Habiganj</option> 
<option value='Moulvibazar'>Moulvibazar</option> 
<option value='Sunamganj'>Sunamganj</option> 
<option value='Sylhet'>Sylhet</option> 

			
				
      </select>

	  <label for="age"><strong>Gender :</strong></label>
	  	
            
	  	<select name="psex" id="psex"class="style1" placeholder="Gender"  required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:120px"> 
		
		
		<option value=""></option>
			<option value="M">MALE</option>;
			<option value="F">FEMALE</option>;
			
				
      </select>
	  
	  
	  <label for="age"><strong>Phone Number :</strong></label>
	 <input name="pphone" type="text" id="pphone" placeholder="Phone No"value="" required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:200px">	  
            

  
            
	  

	  <br><br>
<label><strong>DOB(DD/MM/YYYY) :</strong></label>
<input name="dd" id="dd" type="text" maxlength="2" size="1" value=""  readonly required placeholder="DD" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px">	/

<input name="mm" id="mm" type="text" maxlength="2" size="1" value=""  readonly required placeholder="MM" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px"> /	

<input name="yy" id="yy" type="text" maxlength="4" size="1" value=""   readonly required placeholder="YYYY" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:90px">		  
	  
	
	  
	  
	  
							 
<label for="age"><strong>Patient's Type :</strong></label>
	  	
            
	  	<select name="type" id="type"class="style1" placeholder="Patient Type"  required style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:100px"
		
		onchange="showUser(this.value)"
		> 
		
		
		<option value=""></option>
			<option value="General">General</option>;
			<option value="Staff">Staff</option>;
			<option value="Staff Spouse">Staff Spouse</option>;
			<option value="Staff Children">Staff Children</option>;
			<option value="Consultant">Consultant</option>;
			<option value="VIP">VIP</option>;
			<option value="Corporate">Corporate</option>;
			
				
      </select>

	   
	
	  
      
      

			<label for="age"><strong>Covid Result :</strong></label>
	 <input name="cr" type="text" id="cr" placeholder="CR"value="" readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px">	  
			
	  

<label for="mail"><strong>Appointment Date :</strong></label>

									  
									<input type='date' name="daten" onchange="showUser(this.value)"size="20" style='background-color:lightgreen;font-size:22px;font-weight:bold;color:red;width:200px' min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('45 days') ); ?>">  
									  
									  
									 
									<label for="age"><strong>Available Slot :</strong></label>
			
			
			<select id="txtHint" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:120px" name = 'slot' required>
			
			<option value=''>-Select-</option>
			
			</select>	    			  
		&nbsp;&nbsp;&nbsp;<button type="submit" name="Submit" style="background-color:#ED6572">Confirm</button>  
  </fieldset>

		

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
				document.getElementById("dis").value = "";
				document.getElementById("dd").value = "";
				document.getElementById("mm").value = "";
				document.getElementById("yy").value = "";
				document.getElementById("cr").value = "";
				document.getElementById("type").value = "";
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
							"dis").value = myObj[4];
							
							document.getElementById(
							"dd").value = myObj[5];
							
							document.getElementById(
							"mm").value = myObj[6];
							
							document.getElementById(
							"yy").value = myObj[7];
							
							document.getElementById(
							"cr").value = myObj[8];
							
							
							document.getElementById(
							"type").value = myObj[9];
						document.getElementById('type').style.color = "red";	
						document.getElementById('cr').style.color = "red";	
						document.getElementById('yy').style.color = "red";	
						document.getElementById('mm').style.color = "red";	
						document.getElementById('dd').style.color = "red";	
						document.getElementById('dis').style.color = "red";	
						document.getElementById('phone').style.color = "red";	
						document.getElementById('padd').style.color = "red";	
						document.getElementById('psex').style.color = "red";	
						document.getElementById('pname').style.color = "red";	
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "gfg1.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
	
	
	
<script>
function showUser(str) {
  if (str=="") {
   document.getElementById("txtHint").innerHTML="";
	var tt=document.getElementById("type").innerHTML="";
	
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
	  // document.getElementById("type").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","opd_slot.php?q="+str + "qq="+tt + "&dname2=<?php echo $dname2;?>", true);
  xmlhttp.send();
}
</script>
</body>

</html>
