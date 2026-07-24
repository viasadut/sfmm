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
$aatime=date('d/m/Y H:i:s'); 
$adate1=date('Y-m-d'); 

$pmrn=$_REQUEST['pmrn'];

$query4 = "SELECT * FROM patient where pmrn='$pmrn'"; 
	 
$result4 = mysqli_query($con, $query4) or die(mysqli_error());

// Print out result
$row4 = mysqli_fetch_array($result4);

$bbdate=$row4['bdate'];

$day=date('d', strtotime($bbdate));
$month=date('m', strtotime($bbdate));
$year=date('Y', strtotime($bbdate));

$date23=date('m/d/Y', strtotime($date22));
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
$date_nn = $_REQUEST['date_nn'];
$date_nn1=date('m/d/Y', strtotime($date_nn));
$date10 =$_REQUEST[ 'date10'];
$slot = $_REQUEST['slot'];
$doc1 = $_REQUEST['doc'];
$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
$ptype = $_REQUEST['ptype'];

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

//$sel43="SELECT * FROM opd_appoint1 WHERE `dname`='$dname' and `date1`='$date_nn' and dslot='$slot' and status in ('Booked','NOT AVAILABLE');";
//$result43 = mysqli_query($con,$sel43);


//$ins_query46="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query46);


$sel="SELECT * FROM pappnew WHERE `pmrn`='$pmrn' and `dname`='$doc1' and adate='$date_nn1' and status!='Cancel';";
$result = mysqli_query($con,$sel);



if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Appointment Slot Selected!!"); ';
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

//$update="update opd_appoint1 set status='Booked' where `dname`='$dname' and `date1`='$date_nn' and `dslot`='$slot'";
//mysqli_query($con,$update);

	
	
$ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`page1`,`bill`,`billby`,`billtime`,`ptype`) values 
('$name', '$pmrn','$pphone','$padd','$doc1','$date_nn1','$slot','NOT SEEN','$diff1','$psex','$user','$diff2','$date91','$dis','$aatime','$date_nn','Anti_netal_diet','BILLED','$user','$aatime','$ptype')";
//mysqli_query($con,$ins_query) or die(mysql_error());

if(mysqli_query($con,$ins_query)==true){
	
	
	$query44 = "SELECT * FROM pappnew where pmrn='$pmrn' and adate='$date_nn1' and page1='Anti_netal_diet'"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());

// Print out result
$row44 = mysqli_fetch_array($result44);
$pap_id=$row44['ID'];

	
$ins_query2="insert into anti_netal_prog (`pmrn`,`pap_id`) values 
('$pmrn','$pap_id')";
mysqli_query($con,$ins_query2) or die(mysql_error());
}


//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`psex`,`bdate`,`dis`) values ('$name', '$pmrn','$pphone','$padd','$psex','$date91','$dis')";
//mysqli_query($con,$ins_query1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully!!!"); ';
    echo '</script>';
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
			maxDate: new Date(currentYear, currentMonth, currentDate+40)
		});
		
			$('#datepicker2').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
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
		<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
			
			<label for="age"><strong>Patient's MRN :</strong></label>
<input name="pmrn" id="pmrn"onkeyup="GetDetail(this.value)" type="text" size="85" placeholder="MRN" value="<?php echo $row4['pmrn'];?>">
      

			<label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" id="pname" type="text" size="85" value="<?php echo $row4['pname'];?>" required readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" id="padd" type="text" size="85" value="<?php echo $row4['padd'];?>" required readonly>


<label for="age"><strong>Patient's District :</strong></label>
<select name="dis" id="dis" class="style1" placeholder="District" required> 
		
		
		<option value="<?php echo $row4['dis'];?>"><?php echo $row4['dis'];?></option>

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

	  <label for="age"><strong>Patient's Gender :</strong></label>
	  	
            
	  	<select name="psex" id="psex"class="style1" placeholder="Gender"  required readonly> 
		
		
		<option value="<?php echo $row4['psex'];?>"><?php echo $row4['psex'];?></option>
			
				
      </select>
	  
	  
	  <label for="age"><strong>Patient's Phone Number :</strong></label>
	 <input name="pphone" type="text" id="pphone"size="85" placeholder="Phone No"value="<?php echo $row4['pphone'];?>" required readonly>	  
            


	  

	  <br><br>
	  
	  
	  
	  
<label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" id="dd" type="text" maxlength="2" size="1" value="<?php echo $day;?>" required placeholder="DD" readonly>	/

<input name="mm" id="mm" type="text" maxlength="2" size="1" value="<?php echo $month;?>" required placeholder="MM" readonly> /	

<input name="yy" id="yy" type="text" maxlength="4" size="1" value="<?php echo $year;?>" required placeholder="YYYY" readonly>		  
	  
	
	  
	  <br><br> 
	  
	  
	 
			
			
			<label for="name"><strong>Doctor's Name :</strong></label>
			<select name="doc" value="" required>
			        
		
		
		<option value="">--Select--</option>
			<?php $sql6 = "select * from doctor where Discipline like('diet%') and status='active' and type='res' ";
			$res6 = mysqli_query($con, $sql6);
			if(mysqli_num_rows($res6) > 0) {
				while($row6 = mysqli_fetch_object($res6)) {
					echo "<option value='".$row6->dname."'>".$row6->dname."</option>";
				}
			}
				?>
      </select>
				
			</select>
			    
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									<input type="text" name="date_nn" placeholder="Select Date" size="30" value="<?php echo $adate1;?>">
									  
									  
						
									  
									 
									<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="slot"> <option value='Anti Netal Program'>Anti Netal Program</option>
	   
			
			
      </select>
      

			
			<select name="ptype" id="type"class="style1" placeholder="Patient Type"  required> 
		
		
		<option value="<?php echo $row4["type"]; ?>"><?php echo $row4["type"]; ?></option>
			<option value="General">General</option>;
			<option value="Staff">Staff</option>;
			<option value="Staff Spouse">Staff Spouse</option>;
			<option value="Staff Children">Staff Children</option>;
			<option value="Consultant">Consultant</option>;
			<option value="VIP">VIP</option>;
			<option value="Corporate">Corporate</option>;
			
				
      </select>
	
      
							 


	   
  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  

	
	
	

</body>

</html>
