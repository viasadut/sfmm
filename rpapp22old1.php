<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="rad"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');
//$pmrn=$_REQUEST['pmrn'];
//$dname1=$_REQUEST['dname1'];
//include("auth.php");
$user=$_SESSION["sess_userrole"];
$btime=date('d/m/Y H:i:s');

//$query39 = "SELECT * FROM patient where pmrn= '$pmrn'"; 
//$result39 = mysqli_query($con, $query39) or die(mysqli_error());
//$row39 = mysqli_fetch_array($result39);

$status = "";
if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
$dname =$_REQUEST['dname'];
$date = $_REQUEST['date'];
$date1 =$_REQUEST[ 'date1'];
$slot = $_REQUEST['slot'];
$doc1 = $_REQUEST['doc'];
$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
//$bill = $_REQUEST['bill'];
$tname2= $_REQUEST['tname2'];
$tname23= $_REQUEST['tname23'];

$sel2="SELECT * FROM radpapp WHERE `pmrn`='$pmrn' and `tname`='$tname2' and adate='$date1';";
$result2 = mysqli_query($con,$sel2);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query159 = mysqli_query($db,"select * from radio where iname='$tname2'");
$data159 = mysqli_fetch_assoc($query159);
$type=$data159["type"];
$price=$data159["price"];
$code=$data159["code"];
//echo $type;
//echo $type;
$link=$data159["link"];
$dis = $_REQUEST['dis'];
$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];
$date11=date_create("$dd-$mm-$yy");
$date91=date_format($date11,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date11);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;


$sel90="SELECT * FROM radio WHERE `iname`='$tname2';";
$result90 = mysqli_query($con,$sel90);


if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Appointment Slot Selected!!"); ';
    echo '</script>';

    }
else if(empty($_REQUEST['name']))

{
       echo '<script language="javascript">';
    echo 'alert("Patient Name is Blank!!"); ';
    echo '</script>';

    }
else if(empty($_REQUEST['padd']))

{
       echo '<script language="javascript">';
    echo 'alert("Patient Address is Blank!!"); ';
    echo '</script>';

    }
	else if(empty($_REQUEST['psex']))

{
       echo '<script language="javascript">';
    echo 'alert("Patient Gender is Blank!!"); ';
    echo '</script>';

    }

	else if(empty($_REQUEST['pmrn']))

{
       echo '<script language="javascript">';
    echo 'alert("Patient MRN is Blank!!"); ';
    echo '</script>';

    }


	else if(empty($_REQUEST['pphone']))

{
       echo '<script language="javascript">';
    echo 'alert("Patient Phone Number is Blank!!"); ';
    echo '</script>';

    }
	
	else if(empty($_REQUEST['dd']))

{
       echo '<script language="javascript">';
    echo 'alert("DATE is Blank!!"); ';
    echo '</script>';

    }

	
	else if(empty($_REQUEST['mm']))

{
       echo '<script language="javascript">';
    echo 'alert("MONTH is Blank!!"); ';
    echo '</script>';

    }

	
	else if(empty($_REQUEST['yy']))

{
       echo '<script language="javascript">';
    echo 'alert("YEAR is Blank!!"); ';
    echo '</script>';

    }

else if($res2=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Patient Already Have an Appointment, Pls check Appointment List"); ';
    echo '</script>';
    }	

	
	else if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Investigation Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }


	//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
else if ($dname=='MR')
{
$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`psex`,`bdate`,`dis`) values ('$name','$pmrn','$pphone','$padd','$psex','$date91','$dis')";
mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$diff1','$psex','$tname23','$tname2','$btime','$link')";
mysqli_query($con,$ins_query);
$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','$dname','$pname','$pmrn','$psex','$tname2','USG','$dname','$app_date','$slot','$tname2','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);


echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
} 


}

//echo $refrred2;
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SFMMKPJSH DHAKA</title>
  
     <link rel="stylesheet" href="jsnew/normalize.min.css">
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
<link rel="stylesheet" href="styles.css">
		<link href='jsnew/fjsnwonts' rel='stylesheet' type='text/css'>







 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

  
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
  max-width: 280px;
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
    max-width: 750px;
  }

}
      </style>

    
  
  <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+20)
		});
	});
</script>
  <link rel="stylesheet" href="styles.css">
  
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>



  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>
				<label for="tname45"><strong>Referral Doctor Name:</strong></label>
		
	<input list="tname45" name="tname45" size=75% class="form-control" value=""autocomplete="off">
	
	<datalist id="tname45">

						<option value=''>-Select Investigation-</option>
				<?php 
			$sql = "select * from `doctor1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </datalist>
			
	
			<br><br>
			<input name="tname23" class="style1" type="text"  size =72% value="<?php	  if(isset($_POST['load'])==1)
{ $tname23 = $_REQUEST['tname45'];
echo $tname23;
}
?>" readonly>
			<br><br>
			<label for="tname1"><strong>Investigation Name:</strong></label>
		
	<input list="tname1" name="tname" size=75% class="form-control" value="" autocomplete="off">
	
	<datalist id="tname1">

						<option value=''>-Select Investigation-</option>
				<?php 
			$sql = "select * from `radio` where type='rad'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>  </datalist>
			
	
			<br><br>
			<input name="tname2" class="style1" type="text"  size =72% value="<?php	  if(isset($_POST['load'])==1)
{ $tname2 = $_REQUEST['tname'];
echo $tname2;
}
?>" readonly>
			<br><br>
            <!-- Name Input -->
			<label for="name"><strong>Service Name :</strong></label>
			<select name="doc" value="" class="style1">
			        <option value=''>-Select Service-</option>
					<option value='CR'>CR</option>
					<option value='CT'>CT</option>
					<option value='DX'>DX</option>
					<option value='DX1'>DX1</option>
					
					<option value='MR'>MR</option>
					<option value='US'>US</option>
					<option value='US1'>US1</option>
				
			</select>
			        <input name="dname" class="style1" type="text"  size =50% value="<?php	  if(isset($_POST['load'])==1)
{ $doc1 = $_REQUEST['doc'];
echo $doc1;
}
?>" size="57" readonly >
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input type="text" class="style1" name="date" id="datepicker" placeholder="Select Date" size="15" >
									  <input name="date1" type="text" size=48% class="style1" value="<?php if(isset($_POST['load'])==1)
{ $date1 = $_REQUEST['date'];
echo $date1;
}
?>" size ="57" readonly>
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      <input name="load" class="style1" type="submit" id="load" value="Check Available Time">
	    </p>

									<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="slot" class="style1"> <option value=''>--Select--</option>
	   <?php 
	   $doc1= $_REQUEST['doc'];
			$sql = "select * from `rapp` where `dname`='$doc1' and `status`='AVAILABLE'and `ddate`='$date1'order by id asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dslot."'>".$row->dslot."</option>";
				}
			}
			?>
      </select>
	  
	  <label for="age"><strong>Patient's Name(Required) :</strong></label>
      <input name="name" type="text" size="70" class="style1" value="" >
 	  <label for="age"><strong>Patient's ADDRESS(Required) :</strong></label>
      <input name="padd" type="text" size="40" class="style1" value="" >
	  <select name="dis" class="style1" placeholder="District" > 
		
		<option value=''>-Select District-</option>
		
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

	  <label for="age"><strong>Patient's Details (Required):</strong></label>
      <select name="psex" class="style1" > <option>--GENDER--</option>
			<option value="M">MALE</option>;
			<option value="F">FEMALE</option>;
			
				
      </select>
	  
      <input name="pmrn" type="text" size="15"Placeholder="Patient's MRN" class="style1" value="" >
      <input name="pphone" type="text" size="13" Placeholder="Patient's Phone NO" class="style1"value="">	  
	  
      
<label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="" placeholder="DD">	/

<input name="mm" type="text" maxlength="2" size="1" value="" placeholder="MM"> /	

<input name="yy" type="text" maxlength="4" size="1" value="" placeholder="YYYY">		  



  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
