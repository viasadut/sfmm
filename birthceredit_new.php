<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
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


$sel43="SELECT * FROM birth WHERE `id`='$id' ;";
$result43 = mysqli_query($con, $sel43) or die(mysqli_error());
$row3 = mysqli_fetch_array($result43);
//echo $iby=$row3['iby'];
//echo $dd=date('d',strtotime($row['bdate']));


$query43 = "SELECT COUNT(pmrn) FROM birth where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;  

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

$bname =$_REQUEST['bname'];
$pmrn =$_REQUEST['pmrn'];
$weight =$_REQUEST['weight'];
//$did =$_REQUEST['did'];
$dname =$_REQUEST['dname'];
$dname1 =$_REQUEST['dname1'];
$bdate = $_REQUEST['bdate'];
$bdate1 = date('d/m/Y', strtotime($bdate) );
//$idate =$_REQUEST[ 'bdate'];
$btime = $_REQUEST['btime'];
$fname =$_REQUEST['fname'];
$mname =$_REQUEST['mname'];
$year=date('Y');
//$doc1 = $_REQUEST['doc'];
//$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
//$page= $_REQUEST['page'];
$sex = $_REQUEST['sex'];
//$bill = $_REQUEST['bill'];

$rdate=date('d/m/Y H:i:s');
//$rdate1=date("d/m/Y", strtotime($rdate));
$issue_date=date('d/m/Y');


$mo_mrn =$_REQUEST['mo_mrn'];
$mo_nationality =$_REQUEST['mo_nationality'];
$mo_religion =$_REQUEST['mo_religion'];
$mo_passport =$_REQUEST['mo_passport'];
$mo_national_id =$_REQUEST['mo_national_id'];
$mo_present =$_REQUEST['mo_present'];
$mo_permanent =$_REQUEST['mo_permanent'];


$fa_mrn =$_REQUEST['fa_mrn'];
$fa_nationality =$_REQUEST['fa_nationality'];
$fa_religion =$_REQUEST['fa_religion'];
$fa_passport =$_REQUEST['fa_passport'];
$fa_national_id =$_REQUEST['fa_national_id'];
$fa_present =$_REQUEST['fa_present'];
$fa_permanent =$_REQUEST['fa_permanent'];

$idate=date('Y-m-d');
//$sel="SELECT * FROM pappnew WHERE `pphone`='$pphone' and `dname`='$dname' and adate='$date1';";
//$result = mysqli_query($con,$sel);


//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
$ins_query="insert into birth (`pmrn`,`idate`,`bname`,`fname`,`mname`,`sex`,`weight`,`bdate`,`btime`,`dname`,`eby`,`year`,`bdate1`,`eid`,`status`,`rdate`,`mng`,`dname1`,`iby`,`mo_mrn`,`mo_nationality`,`mo_religion`,`mo_passport`,`mo_national_id`,`mo_present`,`mo_permanent`,`fa_mrn`,`fa_nationality`,`fa_religion`,`fa_passport`,`fa_national_id`,`fa_present`,`fa_permanent`,`i_date`) values 
('$pmrn', '$issue_date','$bname','$fname','$mname','$sex','$weight','$bdate1','$btime','$dname','$fullname','$year','$bdate','$count1','Waiting For Approval','$rdate','waiting','$dname1','$iby','$mo_mrn','$mo_nationality','$mo_religion','$mo_passport','$mo_national_id','$mo_present','$mo_permanent','$fa_mrn','$fa_nationality','$fa_religion','$fa_passport','$fa_national_id','$fa_present','$fa_permanent','$idate')";
mysqli_query($con,$ins_query) or die(mysql_error());


  echo '<script language="javascript">';
    echo 'alert("Birth Certificate Issued Successfully !!"); ';
    echo '</script>';

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
		<h1>BIRTH CERTIFICATE EDIT PANEL</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
		

	  	
<label for="age"><strong>Baby's Name :</strong></label>
      <input name="bname" type="text" size="80" value="<?php echo $row3["bname"]; ?>">          


<label for="age"><strong>Patient's Details (MRN/Gender) :</strong></label>
	  <input name="pmrn" type="text" size="15" value="<?php echo $row3["pmrn"]; ?>" readonly>
	  <input name="sex" type="text" size="15" value="<?php echo $row3["sex"]; ?>">
            
      
	  <label for="age"><strong>Weight :</strong></label>
      <input name="weight" type="text" size="80" value="<?php echo $row3["weight"]; ?>"required>


	  
	  
	  	  
	  	  
	  	  <label for="age"><strong>Mother's Name :</strong></label>
      <input name="mname" type="text" size="80" value="<?php echo $row3["mname"]; ?>" required>

      <label for="age"><strong>Mother's MRN :</strong></label>
      <input name="mo_mrn" type="text" size="80" value="<?php echo $row3["mo_mrn"]; ?>" required>

      <label for="age"><strong>Mother's Nationality :</strong></label>
      <select name="mo_nationality" value="" required class="con_charge2">
      <option value="<?php echo $row3["mo_nationality"]; ?>" selected><?php echo $row3["mo_nationality"]; ?></option>
				<?php 
			$sql = "select * from `country`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->c_nationality."'>".$row->c_nationality."</option>";
				}
			}
			?>
			</select>

      <br /><br />

      <label for="age"><strong>Mother's Religion :</strong></label>
      <select name="mo_religion" value="" required>
			        
      <option value="<?php echo $row3["mo_religion"]; ?>" selected><?php echo $row3["mo_religion"]; ?></option>
        <option value="Muslim">Muslim</option>
        <option value="Hindu">Hindu</option>
        <option value="Christian">Christian</option>
        <option value="Buddhist">Buddhist</option>
			</select>
      <label for="age"><strong>Mother's Passport NO :</strong></label>
      <input name="mo_passport" type="text" size="80" value="<?php echo $row3["mo_passport"]; ?>" required>

      <label for="age"><strong>Mother's National ID NO :</strong></label>
      <input name="mo_national_id" type="text" size="80" value="<?php echo $row3["mo_national_id"]; ?>" required>


	  	<label for="age"><strong>Mother's Present Address :</strong></label>
      <input name="mo_present" type="text" size="80" value="<?php echo $row3["mo_present"]; ?>" required>

      <label for="age"><strong>Mother's Permanent Address :</strong></label>
      <input name="mo_permanent" type="text" size="80" value="<?php echo $row3["mo_permanent"]; ?>" required>



      <label for="age"><strong>Father's Name :</strong></label>
      <input name="fname" type="text" size="80" value="<?php echo $row3["fname"]; ?>" required>
 	  
      <label for="age"><strong>Father's MRN :</strong></label>
      <input name="fa_mrn" type="text" size="80" value="<?php echo $row3["fa_mrn"]; ?>" required>

      <label for="age"><strong>Father's Nationality :</strong></label>
      <select name="fa_nationality" value="" required class="con_charge">
      <option value="<?php echo $row3["fa_nationality"]; ?>" selected><?php echo $row3["fa_nationality"]; ?></option>
				<?php 
			$sql = "select * from `country`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->c_nationality."'>".$row->c_nationality."</option>";
				}
			}
			?>
			</select>
      <br />
      <br />

      <label for="age"><strong>Father's Religion :</strong></label>
      
      <select name="fa_religion" value="" required>
			        
      <option value="<?php echo $row3["fa_religion"]; ?>" selected><?php echo $row3["fa_religion"]; ?></option>
        <option value="Muslim">Muslim</option>
        <option value="Hindu">Hindu</option>
        <option value="Christian">Christian</option>
        <option value="Buddhist">Buddhist</option>
			</select>
      
      


      <label for="age"><strong>Father's Passport NO :</strong></label>
      <input name="fa_passport" type="text" size="80" value="<?php echo $row3["fa_passport"]; ?>" required>

      <label for="age"><strong>Father's National ID NO :</strong></label>
      <input name="fa_national_id" type="text" size="80" value="<?php echo $row3["fa_national_id"]; ?>" required>

      <label for="age"><strong>Father's Present Address :</strong></label>
      <input name="fa_present" type="text" size="80" value="<?php echo $row3["fa_present"]; ?>" required>

      <label for="age"><strong>Father's Permanent Address :</strong></label>
      <input name="fa_permanent" type="text" size="80" value="<?php echo $row3["fa_permanent"]; ?>" required>

			
			
			<label for="name"><strong>Gynecologist's Name :</strong></label>
			<select name="dname" value="" required>
			        <option value='<?php echo $row3["dname"]; ?>' selected><?php echo $row3["dname"]; ?></option>
				<?php 
			$sql = "select * from `doctor` where discipline ='gynecologist'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select>
			
			<label for="name"><strong>Pediatrician's Name :</strong></label>
			<select name="dname1" value="" required>
			        <option value='<?php echo $row3["dname1"]; ?>' selected><?php echo $row3["dname1"]; ?></option>
				<?php 
			$sql = "select * from `doctor` where discipline ='pediatrician'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select>
			
			
			       
				   
				   
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Date Of Birth:</strong></label>
									<p>
									  <input type="text" name="bdate" id="datepicker" placeholder="Select Date" size="15" value="<?php echo $row3["bdate1"]; ?>" required >
									   
									  
		<label for="name"><strong>Time :</strong></label>
			<select name="btime" value="" required class="con_charge1">
			        <option value="<?php echo $row3["btime"]; ?>" selected><?php echo $row3["btime"]; ?></option>
              <?php 
			

      for ($i = 0; $i < 24 * 60; $i++) {
        $time = date("H:i", strtotime("+$i minutes"));
        echo 
        "<option value='".$time."'>".$time."</option>";
        //$time . "<br>";
    }
			?>


</select>
			
					
	  

	  
      

  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />			
			<script>
$(document).ready(function() {
    $('.con_charge').select2();
});
</script>
<script>
$(document).ready(function() {
    $('.con_charge1').select2();
});
</script>
	  

<script>
$(document).ready(function() {
    $('.con_charge2').select2();
});
</script>
