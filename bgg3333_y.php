<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
      header('Location: login2.php?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$billtime = date('d/m/Y H:i:s');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['ID'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from pappnew where ID='$id'");
$data = mysqli_fetch_assoc($query4);

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query44 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data1 = mysqli_fetch_assoc($query44);

$ttr=$data['bdate'];

$te=date('d',strtotime($ttr));
$te1=date('m',strtotime($ttr));
$te2=date('Y',strtotime($ttr));


$date1=date_create("$te-$te1-$te2");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");
 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_username"];
$status = "";
if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
$dis =$_REQUEST['dis'];
$dname =$_REQUEST['dname'];
$sid =$_REQUEST['sid'];
//$date = $_REQUEST['date'];
$date11 =$_REQUEST[ 'date1'];
$slot = $_REQUEST['slot'];
//$doc1 = $_REQUEST['doc'];
$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
$bill = $_REQUEST['bill'];


$sel99="SELECT * FROM patient WHERE `pmrn`='$pmrn';";
$result99 = mysqli_query($con,$sel99);


if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Time Slot is selected !!"); ';
    echo '</script>';

    }
else if($res=mysqli_num_rows($result99)>0)
{
 	
	$update33="update pappnew set `aslot`='$slot', `bill`='$bill',`billby`='$user',`pmrn`='$pmrn', `pname`='$name', `padd`='$padd',`billtime`='$billtime' where `ID`='$id'";
mysqli_query($con,$update33);

//$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
//mysqli_query($con,$update) or die(mysql_error());

$update87="update test set status='Booked' where `dname`='$dname' and `ddate`='$date11' and `dslot`='$slot'";
mysqli_query($con,$update87);


$update1="update patient set bdate='$date91', dis='$dis', sid='$sid' where `pmrn`='$pmrn'";
mysqli_query($con,$update1) or die(mysql_error());

       echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully !!"); ';
    echo '</script>';
    }	
	
	else{
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`psex`,`bdate`,`dis`) values ('$name', '$pmrn','$pphone','$padd','$psex','$date91','$dis')";
mysqli_query($con,$ins_query1);

$update33="update pappnew set `aslot`='$slot', `bill`='$bill',`billby`='$user',`pmrn`='$pmrn', `pname`='$name', `padd`='$padd',`billtime`='$billtime' where `ID`='$id'";
mysqli_query($con,$update33);

//$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
//mysqli_query($con,$update) or die(mysql_error());

$update87="update test set status='Booked' where `dname`='$dname' and `ddate`='$date11' and `dslot`='$slot'";
mysqli_query($con,$update87);

echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully !!"); ';
    echo '</script>';}
}

?>


	  	 	  <?php
$tt1=$pmrn;
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];







?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>APPOINTMENT</title>
  
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

 
  
  <script src="jsnew/pprefixfree.min.js"></script>



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
   <li><a href='bcview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>

    	    <li class='last'><a href='bgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='bview4'><span>Search previous patients</span></a></li>
      </ul>
	  
   </li>


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
			
			<label for="age"><strong><SPAN STYLE="font-size:18.0pt">Covid Result:</span> <a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;font-size:18pt;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;font-size:18pt;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;font-size:18pt;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;font-size:18pt;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a></strong></label>
			<br><br><br>
			
			<label for="name"><strong>Doctor's Name :</strong></label>
			<input name="dname" type="text" value="<?php echo $data["dname"]; ?>"required readonly >
		
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input name="date1" id="datepicker" type="text" size=65% value="<?php echo $data["adate"]; ?>" size ="57"required readonly>
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      
	    </p>

									<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="slot"readonly required> <option><?php echo $data["aslot"]; ?></option>
	   
      </select>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="65" style="text-transform:uppercase" value="<?php echo $data["pname"]; ?>"required>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="40" style="text-transform:uppercase" value="<?php echo $data["padd"]; ?>"required>
	  <select name="dis" class="style1" placeholder="District" required> 
		
		<option value='<?php echo $data["dis"]; ?>'><?php echo $data["dis"]; ?></option>
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
	  	
            <input name="psex" type="text" size="15" value="<?php echo $data["psex"]; ?>"placeholder="Gender"required>
            <input name="pmrn" type="text" size="10" value="<?php if($data["pmrn"]==0){echo '';} else {echo $data["pmrn"];} ?>"placeholder="MRN"required>
      <input name="pphone" type="text" size="10" value="<?php echo $data["pphone"]; ?>"placeholder="Phone"required>	  
	  <input name="page" type="text" size="11"value="<?php echo $data["page"]; ?>"readonly required>
	  
	  
	  
	  <label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te;}  ?>"required>	/

<input name="mm" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te1;} ?>"required> /	

<input name="yy" type="text" maxlength="4" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te2;} ?>"required>		  
	  


	  <br><br> 

	  
	  
	  
	  
<label for="age"><strong>Staff ID(If Staff OR Staff's Dependent) :</strong></label>
      <input name="sid" type="text" size="65" style="text-transform:uppercase" value="<?php echo $data1["sid"]; ?>">	  
	  
	  
	  <br><br> 
	  
	  

      
			
			<label for="age"><strong>BILL STATUS:</strong></label>
<select name="bill" value=""> 
			<option value="BILLED">BILLED</option>;


				
      </select>		

  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
