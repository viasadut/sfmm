<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('imo','doctor','gpopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];


require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result



$row39 = mysqli_fetch_array($result39);


$sel43="SELECT * FROM patient WHERE `id`='$id' ;";
$result43 = mysqli_query($con, $sel43) or die(mysqli_error());
$row3 = mysqli_fetch_array($result43);



$query43 = "SELECT COUNT(pmrn) FROM mtreatment where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$eid = $count+1;  

?>


<?php
$full = $row39['fullname'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn' and ID='$id'");
$data = mysqli_fetch_assoc($query4);
 
require('db1.php');
//include("auth.php");
$user=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['Submit'])==1)
{

$pname =$_REQUEST['pname'];
$pmrn =$_REQUEST['pmrn'];
$passno =$_REQUEST['passno'];
$passno1 =$_REQUEST['passno1'];
//$dname =$_REQUEST['dname'];
$ufor = $_REQUEST['ufor'];
$idate = date( 'm/d/Y');
$idate1=date("d/m/Y", strtotime($idate));
//$idate =$_REQUEST[ 'bdate'];
$fdate = $_REQUEST['fdate'];
$fdate1=date("d/m/Y", strtotime($fdate));
$tdate =$_REQUEST['tdate'];
$tdate1=date("d/m/Y", strtotime($tdate));
$rdate =$_REQUEST['rdate'];
$rdate1=date("d/m/Y", strtotime($rdate));
$year=date('Y');
//$doc1 = $_REQUEST['doc'];
//$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$page= $_REQUEST['page'];
$sex = $_REQUEST['sex'];
$diag = $_REQUEST['diag'];
//$bill = $_REQUEST['bill'];
$staff = $_REQUEST['staff'];
//$rdate=date('d/m/Y H:i:s');
//$rdate1=date("d/m/Y", strtotime($rdate));
$date1=date_create("$fdate");
$date2=date_create("$tdate");
//$diff=$date1+$date2;

$diff=date_diff($date1,$date2);
$diff1=$diff->format("%d")+1;




$ttdate = str_replace('/', '-', $tdate1);
$ttdate1= date('Y-m-d', strtotime($ttdate));
$aa=strtotime($ttdate1);


$ffdate = str_replace('/', '-', $fdate1);
$ffdate1= date('Y-m-d', strtotime($ffdate));
$bb=strtotime($ffdate1);


/*$date1 = '25/08/2010';
$date1 = str_replace('/', '-', $date1);
$b= date('Y-m-d', strtotime($date1));
$bb=strtotime($b);*/
$d=$aa-$bb;
$e= round($d / (60 * 60 * 24)) +1 ;




//$sel="SELECT * FROM pappnew WHERE `pphone`='$pphone' and `dname`='$dname' and adate='$date1';";
//$result = mysqli_query($con,$sel);

if($sex=='M'){
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
$ins_query="insert into mtreatment (`pmrn`,`eid`,`pname`,`nid`,`nid1`,`ffor`,`fdate`,`fdate1`,`tdate`,`tdate1`,`rdate`,`rdate1`,`tdays`,`diagnosis`,`user`,`idate`,`ct`,`year`,`m1`,`m2`,`m3`,`staff`,`idate1`) values 
('$pmrn', '$eid','$pname','$passno','$passno1','$ufor','$fdate','$fdate1','$tdate','$tdate1','$rdate','$rdate1','$e','$diag','$full','$idate','Treatment','$year','MR.','HE','HIS','$staff','$idate1')";
mysqli_query($con,$ins_query) or die(mysql_error());


  echo '<script language="javascript">';
    echo 'alert("Treatment Certificate Issued Successfully !!"); ';
echo '</script>';}





else {
	
	$ins_query="insert into mtreatment (`pmrn`,`eid`,`pname`,`nid`,`nid1`,`ffor`,`fdate`,`fdate1`,`tdate`,`tdate1`,`rdate`,`rdate1`,`tdays`,`diagnosis`,`user`,`idate`,`ct`,`year`,`m1`,`m2`,`m3`,`staff`,`idate1`) values 
('$pmrn', '$eid','$pname','$passno','$passno1','$ufor','$fdate','$fdate1','$tdate','$tdate1','$rdate','$rdate1','$e','$diag','$full','$idate','Treatment','$year','MS.','SHE','HER','$staff','$idate1')";
mysqli_query($con,$ins_query) or die(mysql_error());


  echo '<script language="javascript">';
    echo 'alert("Treatment Certificate Issued Successfully !!"); ';
echo '</script>';
	
}

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
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  width: 100%;
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
  width: 95%;
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
    $("#datepicker1").datepicker();
  });
  </script>


<script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script>


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
		<h1>Treatment Certificate (Issue UNFIT Certificate) </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
		

	  	
<label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="80" value="<?php echo $row3["pname"]; ?>" readonly/>          


<label for="age"><strong>Patient's Details (MRN/Gender) :</strong></label>
	  <input name="pmrn" type="text" size="15" value="<?php echo $row3["pmrn"]; ?>"readonly/>
	  <input name="sex" type="text" size="15" value="<?php echo $row3["psex"]; ?>"readonly/>
            
      
	  
<label for="name"><strong>Paients Identify:</strong></label>
			<select name="staff" required>
			        <option value=''>-Select-</option>
					<option value='Staff'>Staff</option>
					<option value='General'>General</option>
					
				
			</select>
	  
	  
	  	  
	  	  <label for="age"><strong>IC/Passport No./NID NO :</strong></label>
      <select name="passno"required>
			        <option value='IC NO' >IC NO</option>
					<option value='Passport NO' >Passport NO</option>
					<option value='NID NO' selected>NID NO</option>
				
			</select>
	  	  <label for="age"><strong>NO :</strong></label>
      <input name="passno1" type="text" size="80" value="" required>
 	  <label for="age"><strong>Diagnosis :</strong></label>
      <textarea rows="5"  name="diag" required></textarea>
	  
	  <label for="age"><strong>Treatment Given :</strong></label>
      <textarea rows="5"  name="ufor" required></textarea>

		
			
			       
				   
				   
		<!-- E-mail Input -->
		
		<label for="mail"><strong>From :</strong></label>
									<p>
									  <input type="text" name="fdate" id="datepicker" placeholder="Select Date" size="15" value="" required>
									  
									  
									  <label for="mail"><strong>TO :</strong></label>
									<p>
									  <input type="text" name="tdate" id="datepicker1" placeholder="Select Date" size="15" value=""required>
									  
									  
									  
									  
		<label for="age"><strong>Remarks :</strong></label>
      <textarea rows="5"  name="rdate" required></textarea>
			
					
	  

	  
      

  </fieldset>

		<button type="submit" name="Submit">Confirm</button>
<td><a target='_blank' href="printtreatment.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>  
</form>
  
  

</body>

</html>
