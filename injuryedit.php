<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('imo','doctor','gpopd','mofficer')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
//$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];


require('db1.php');
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result



$row39 = mysqli_fetch_array($result39);


$sel43="SELECT * FROM injury WHERE `id`='$id' ;";
$result43 = mysqli_query($con, $sel43) or die(mysqli_error());
$row3 = mysqli_fetch_array($result43);




$pmrn3=$row3['pmrn'];
$page3=$row3['page'];
$eid3=$row3['eid'];
$pname3=$row3['pname'];
$passno3=$row3['nid'];
$passno13=$row3['nid1'];
$ifind3=$row3['ffor'];
$adate3=$row3['fdate'];
$atime3=$row3['fdate1'];
$diag3=$row3['diagnosis'];
$full3=$row3['user'];
$idate3=$row3['idate'];
$ct3=$row3['ct'];
$year3=$row3['year'];
$idate3=$row3['idate'];
$athrough3=$row3['staff'];
$idate13=$row3['idate1'];
$remark3=$row3['remark'];
$ddate3=$row3['ddate'];
$dtime3=$row3['dtime'];
$remark3=$row3['remark'];
$adate3_new=$row3['fdate_new'];
$ddate3_new=$row3['ddate_new'];
$iid=$row3['id'];
$m1=$row3['m1'];
$m2=$row3['m2'];
$m3=$row3['m3'];
$idate_new=$row3['idate_new'];
$confirmby3=$row3['confirmby'];



$sel44="SELECT * FROM patient WHERE `id`='$id' ;";
$result44 = mysqli_query($con, $sel44) or die(mysqli_error());
$row4 = mysqli_fetch_array($result44);




?>


<?php
$full = $row39['fullname'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
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
$athrough =$_REQUEST['athrough'];
$adate1 =$_REQUEST['adate'];
$adate=date("d/m/Y", strtotime($adate1));
$atime =$_REQUEST['atime'];
$ifind =$_REQUEST['ifind'];
$diag =$_REQUEST['diag'];
$ddate1 =$_REQUEST['ddate'];
$ddate=date("d/m/Y", strtotime($ddate1));
$dtime =$_REQUEST['dtime'];
$remark =$_REQUEST['remark'];
//$sex = $_REQUEST['sex'];


$year=date('Y');
$idate1 = date( 'm/d/Y');
$idate=date("d/m/Y", strtotime($idate1));



//$dname =$_REQUEST['dname'];
//$rdate=date('d/m/Y H:i:s');
//$rdate1=date("d/m/Y", strtotime($rdate));




//$sel="SELECT * FROM pappnew WHERE `pphone`='$pphone' and `dname`='$dname' and adate='$date1';";
//$result = mysqli_query($con,$sel);


$ins_query5="insert into injury_edit (`pmrn`,`page`,`eid`,`pname`,`nid`,`nid1`,`ffor`,`fdate`,`fdate1`,`diagnosis`,`user`,`idate`,`ct`,`year`,`m1`,`m2`,`m3`,`staff`,`idate1`,`remark`,`ddate`,`dtime`,`fdate_new`,`ddate_new`,`idate_new`,`iid`,`confirmby`) values 
('$pmrn3','$page3', '$eid3','$pname3','$passno3','$passno13','$ifind3','$adate3','$atime3','$diag3','$full3','$idate3','$ct3','$year3','$m1','$m2','$m3','$athrough3','$idate13','$remark3','$ddate3','$dtime3','$adate3_new','$ddate3_new','$idate_new','$iid','$confirmby3')";
mysqli_query($con,$ins_query5) or die(mysql_error());

$ins_query="update injury set `fdate`='$adate',`fdate_new`='$adate1',`remark`='$remark',`ddate`='$ddate',`ddate_new`='$ddate1',`dtime`='$dtime',`diagnosis`='$diag',`ffor`='$ifind',`fdate1`='$atime',estatus='Waiting For Confirmation' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());

  echo '<script language="javascript">';
    echo 'alert("Injury Certificate Updated Successfully !!"); ';
echo '</script>';
	


}

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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
		<h1>Injury Certificate</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
		

	  	
<label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="80" value="<?php echo $row3["pname"]; ?>" readonly/>          


<label for="age"><strong>Patient's Details (MRN/Gender) :</strong></label>
	  <input name="pmrn" type="text" size="15" value="<?php echo $row3["pmrn"]; ?>"readonly/>
	  <input name="sex" type="text" size="15" value="<?php if($m1=='MR.') {echo "M";} else{echo "F";} ?>"readonly/>
            
      
	  
<label for="name"><strong>Admitted Through:</strong></label>
			<select name="athrough" required>
			        <option value='<?php echo $row3['staff'];?>'><?php echo $row3['staff'];?></option>
					<option value='OPD'>OPD</option>
					<option value='A&E'>Emergency</option>
					
				
			</select>
			
			<label for="mail"><strong>Visit / Admission Date :</strong></label>
									<p>
									  <input type="date" name="adate" placeholder="Select Date" size="8" value="<?php echo $row3['fdate_new'];?>" required>
									  
									  <label for="mail"><strong>Admission Time :</strong></label>
									  <input name="atime" type="text" size="7" value="<?php echo $row3['fdate1'];?>"required>
	  
	  
	  	  
	  	  <label for="age"><strong>IC/Passport No./NID NO :</strong></label>
      <select name="passno"required>
			        <option value='<?php echo $row3['nid'];?>' ><?php echo $row3['nid'];?></option>
					<option value='IC NO' >IC NO</option>
					<option value='Passport NO' >Passport NO</option>
					<option value='NID NO' selected>NID NO</option>
				
			</select>
	  	  <label for="age"><strong>NO :</strong></label>
		  
		  

		  
      <input name="passno1" type="text" size="80" value="<?php echo $row3['nid1'];?>" required>
	  
	  <label for="age"><strong>Injury Findings :</strong></label>
      <textarea rows="5"  name="ifind" required><?php echo $row3['ffor'];?></textarea>
 	  <label for="age"><strong>Diagnosis :</strong></label>
      <textarea rows="5"  name="diag" required><?php echo $row3['diagnosis'];?></textarea>
	  
	  
		
			
			       
				   
				   
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Discharge Date:</strong></label>
									<p>
									  <input type="date" name="ddate"  placeholder="Select Date" size="8" value="<?php echo $row3['ddate_new'];?>" required>
									  
									  <label for="mail"><strong>Discharge Time :</strong></label>
									  <input name="dtime" type="text" size="7" value="<?php echo $row3['dtime'];?>"required>
									  
									  
									  
									  
									  
									  
		<label for="age"><strong>Remarks :</strong></label>
      <textarea rows="5"  name="remark" required><?php echo $row3['remark'];?></textarea>
			
					
	  

	  
      

  </fieldset>

		<button type="submit" name="Submit">UPDATE</button>
<td><a target='_blank' href="injuryeditprint.php?id=<?php echo "$id"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>  
</form>
  
  

</body>

</html>
