<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('ev','bill')"; 
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
$adate1=date('Y-m-d'); 
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
//$dname =$_REQUEST['dname'];
//$date = $_REQUEST['date'];
$date10 =date('m/d/Y');
//$slot = $_REQUEST['slot'];
//$doc1 = $_REQUEST['doc'];
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

$pack = $_REQUEST['pack'];

if($pack=='P2')
{
$ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Dr. Md. Mostofa Kaisar','$date10','Consultation Package-2','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-2')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Dr. A.K.M Mamunur Rahman','$date10','Consultation Package-2','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-2')";
mysqli_query($con,$ins_query2) or die(mysql_error());


$ins_query33="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Dr. Md. Moniruzzaman Maruf','$date10','Consultation Package-2','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-2')";
mysqli_query($con,$ins_query33) or die(mysql_error());


$ins_query3="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Ms. Maisha Musharrat Nazia','$date10','Consultation Package-2','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-2')";
mysqli_query($con,$ins_query3) or die(mysql_error());


$ins_query32="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Physiotherapy','$date10','Consultation Package-2','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-2')";
mysqli_query($con,$ins_query32) or die(mysql_error());


$ins_query1a="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`psex`,`bdate`,`dis`) values ('$name', '$pmrn','$pphone','$padd','$psex','$date91','$dis')";
mysqli_query($con,$ins_query1a);

$ins_query3="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Dr. Md. Mamunur Rashid ','$date10','Consultation Package-2','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-2')";
mysqli_query($con,$ins_query3) or die(mysql_error());



}



else 
{
$ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Dr. Md. Mostofa Kaisar','$date10','Consultation Package-1','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-1')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Dr. A.K.M Mamunur Rahman','$date10','Consultation Package-1','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-1')";
mysqli_query($con,$ins_query2) or die(mysql_error());



$ins_query3="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`bill`,`pack`) values ('$name', '$pmrn','$pphone','$padd','Ms. Maisha Musharrat Nazia','$date10','Consultation Package-1','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$adate1','BILLED','Consultation Package-1')";
mysqli_query($con,$ins_query3) or die(mysql_error());



$ins_query1a="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`psex`,`bdate`,`dis`) values ('$name', '$pmrn','$pphone','$padd','$psex','$date91','$dis')";
mysqli_query($con,$ins_query1a);

}





//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`psex`,`bdate`,`dis`) values ('$name', '$pmrn','$pphone','$padd','$psex','$date91','$dis')";
//mysqli_query($con,$ins_query1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully!!!"); ';
    echo '</script>';
 


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
		<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			 <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="80" value="<?php if(isset($_POST['load'])==1)
{ $name = $_REQUEST['name'];
echo $name;
}
?>" required >
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="40" value="<?php if(isset($_POST['load'])==1)
{ $padd = $_REQUEST['padd'];
echo $padd;
}
?>" required>

<select name="dis" class="style1" placeholder="District" required> 
		
		<option >-Select District-</option>
		<option value="<?php if(isset($_POST['load'])==1)
{ $dis = $_REQUEST['dis'];
echo $dis;
}
?>"><?php if(isset($_POST['load'])==1)
{ $dis = $_REQUEST['dis'];
echo $dis;
}
?></option>

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

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            
	  	<select name="psex" class="style1" placeholder="Gender" required> 
		
		
		<option value="<?php if(isset($_POST['Submit'])==1)
{ $psex = $_REQUEST['psex'];
echo $psex;
}
?>"><?php if(isset($_POST['Submit'])==1)
{ $psex = $_REQUEST['psex'];
echo $psex;
}
?></option>
			<option value="M">MALE</option>;
			<option value="F">FEMALE</option>;
			
				
      </select>
            <input name="pmrn" type="text" size="15" placeholder="MRN" value="<?php if(isset($_POST['Submit'])==1)
{ $pmrn = $_REQUEST['pmrn'];
echo $pmrn;
}
?>">
      <input name="pphone" type="text" size="13" placeholder="Phone No"value="<?php if(isset($_POST['Submit'])==1)
{ $pphone = $_REQUEST['pphone'];
echo $pphone;
}
?>" required>	  


	  

	  <br><br>
<label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="<?php if(isset($_POST['Submit'])==1)
{ $dd1 = $_REQUEST['dd'];
echo $dd1;
}
?>" required placeholder="DD">	/

<input name="mm" type="text" maxlength="2" size="1" value="<?php if(isset($_POST['Submit'])==1)
{ $mm1 = $_REQUEST['mm'];
echo $mm1;
}
?>" required placeholder="MM"> /	

<input name="yy" type="text" maxlength="4" size="1" value="<?php if(isset($_POST['Submit'])==1)
{ $yy1 = $_REQUEST['yy'];
echo $yy1;
}
?>" required placeholder="YYYY">		  
	  
	
	  
<input name="yy5" type="text" maxlength="4" size="20" value="<?php if(isset($_POST['Submit'])==1)
{ $dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];

//$fdate='$dd-$mm-$yy';


$date1=date_create("$dd-$mm-$yy");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
echo $diff1;

}
?>" required readonly placeholder="AGE">		  
	  <br><br> 
	  
<label><strong>Package:</strong></label>
	  	<select name="pack" class="style1" placeholder="Gender" required> 
		
		<option value="">-Select-</option>;
			
			<option value="P2">Consultation Package</option>;
			
				
      </select>
	  
      
	   
  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
