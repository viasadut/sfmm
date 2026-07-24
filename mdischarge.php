<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];

//include("auth.php");
 $pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['ID'];
$ddate1= date('m-d-Y');
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and id='$id'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and id='$id'");
$data1 = mysqli_fetch_assoc($query5);

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$m1=$_REQUEST['m1'];
$m2=$_REQUEST['m2'];
$d1=$_REQUEST['d1'];
$d2=$_REQUEST['d2'];

$m3=$_REQUEST['m3'];
$m4=$_REQUEST['m4'];
$m5=$_REQUEST['m5'];
$m6=$_REQUEST['m6'];
$m7=$_REQUEST['m7'];
$m8=$_REQUEST['m8'];
$m9=$_REQUEST['m9'];
$m10=$_REQUEST['m10'];
$m11=$_REQUEST['m11'];
$m12=$_REQUEST['m12'];
$m13=$_REQUEST['m13'];
$m14=$_REQUEST['m14'];
$m15=$_REQUEST['m15'];
$m16=$_REQUEST['m16'];
$m17=$_REQUEST['m17'];
$m18=$_REQUEST['m18'];
$m19=$_REQUEST['m19'];
$m20=$_REQUEST['m20'];
$d3=$_REQUEST['d3'];
$d4=$_REQUEST['d4'];
$d5=$_REQUEST['d5'];
$d6=$_REQUEST['d6'];
$d7=$_REQUEST['d7'];
$d8=$_REQUEST['d8'];
$d9=$_REQUEST['d9'];
$d10=$_REQUEST['d10'];
$d11=$_REQUEST['d11'];
$d12=$_REQUEST['d12'];
$d13=$_REQUEST['d13'];
$d14=$_REQUEST['d14'];
$d15=$_REQUEST['d15'];
$d16=$_REQUEST['d16'];
$d17=$_REQUEST['d17'];
$d18=$_REQUEST['d18'];
$d19=$_REQUEST['d19'];
$d20=$_REQUEST['d20'];
$other=$_REQUEST['other'];
$diagnosis=$_REQUEST['diagnosis'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$pdiet=$_REQUEST['pdiet'];
$reffer=$_REQUEST['reffer'];
$psex=$_REQUEST['psex'];
$pheight=$_REQUEST['pheight'];
$pweight=$_REQUEST['pweight'];
$ptemp=$_REQUEST['ptemp'];
$discharge=$_REQUEST['discharge'];
$ddate= date('m-d-Y H:i:s');


$ins_query="insert into discharge1 (`dname`,`pname`,`pmrn`,`pphone`,`cdetails`,`diagnosis`,`m1`,`m2`,`d1`,`d2`,`m3`,`m4`,`m5`,`m6`,`m7`,`m8`,`m9`,`m10`,`m11`,`m12`,`m13`,`m14`,`m15`,`m16`,`m17`,`m18`,`m19`,`m20`,`d3`,`d4`,`d5`,`d6`,`d7`,`d8`,`d9`,`d10`,`d11`,`d12`,`d13`,`d14`,`d15`,`d16`,`d17`,`d18`,`d19`,`d20`,`other`,`date`,`page`,`pdiet`,`reffer`,`psex`,`pheight`,`pweight`,`ptemp`,`ddate`) values ('$dname', '$pname','$pmrn','$pphone','$cdetails','$diagnosis','$m1','$m2','$d1','$d2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10','$m11','$m12','$m13','$m14','$m15','$m16','$m17','$m18','$m19','$m20','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$d11','$d12','$d13','$d14','$d15','$d16','$d17','$d18','$d19','$d20','$other','$pheight','$page','$pdiet','$reffer','$psex','$pheight','$pweight','$ptemp','$ddate')";
mysqli_query($con,$ins_query) or die(mysql_error());


if (!empty ($_POST['m1'])){
$ins_query1="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m1','$d1','$ddate')";
mysqli_query($con,$ins_query1) or die(mysql_error());}

if (!empty ($_POST['m2'])){
$ins_query2="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m2','$d2','$ddate')";
mysqli_query($con,$ins_query2) or die(mysql_error());}

if (!empty ($_POST['m3'])){
$ins_query3="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m3','$d3','$ddate')";
mysqli_query($con,$ins_query3) or die(mysql_error());}

if (!empty ($_POST['m4'])){
$ins_query4="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m4','$d4','$ddate')";
mysqli_query($con,$ins_query4) or die(mysql_error());}

if (!empty ($_POST['m5'])){
$ins_query5="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m5','$d5','$ddate')";
mysqli_query($con,$ins_query5) or die(mysql_error());}


if (!empty ($_POST['m6'])){
$ins_query6="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m6','$d6','$ddate')";
mysqli_query($con,$ins_query6) or die(mysql_error());}

if (!empty ($_POST['m7'])){
$ins_query7="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m7','$d7','$ddate')";
mysqli_query($con,$ins_query7) or die(mysql_error());}

if (!empty ($_POST['m8'])){
$ins_query8="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m8','$d8','$ddate')";
mysqli_query($con,$ins_query8) or die(mysql_error());}

if (!empty ($_POST['m9'])){
$ins_query9="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m9','$d9','$ddate')";
mysqli_query($con,$ins_query9) or die(mysql_error());}

if (!empty ($_POST['m10'])){
$ins_query10="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m10','$d10','$ddate')";
mysqli_query($con,$ins_query10) or die(mysql_error());}

if (!empty ($_POST['m11'])){
$ins_query11="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m11','$d11','$ddate')";
mysqli_query($con,$ins_query11) or die(mysql_error());}

if (!empty ($_POST['m12'])){
$ins_query12="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m12','$d12','$ddate')";
mysqli_query($con,$ins_query12) or die(mysql_error());}

if (!empty ($_POST['m13'])){
$ins_query13="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m13','$d13','$ddate')";
mysqli_query($con,$ins_query13) or die(mysql_error());}

if (!empty ($_POST['m14'])){
$ins_query14="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m14','$d14','$ddate')";
mysqli_query($con,$ins_query14) or die(mysql_error());}

if (!empty ($_POST['m15'])){
$ins_query15="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m15','$d15','$ddate')";
mysqli_query($con,$ins_query15) or die(mysql_error());}

if (!empty ($_POST['m16'])){
$ins_query16="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m16','$d16','$ddate')";
mysqli_query($con,$ins_query16) or die(mysql_error());}

if (!empty ($_POST['m17'])){
$ins_query17="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m17','$d17','$ddate')";
mysqli_query($con,$ins_query17) or die(mysql_error());}

if (!empty ($_POST['m18'])){
$ins_query18="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m18','$d18','$ddate')";
mysqli_query($con,$ins_query18) or die(mysql_error());}

if (!empty ($_POST['m19'])){
$ins_query19="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m19','$d19','$ddate')";
mysqli_query($con,$ins_query19) or die(mysql_error());}

if (!empty ($_POST['m20'])){
$ins_query20="insert into dmedi1 (`pmrn`,`pname`,`dname`,`medi`,`pdos`,`ddate`) values ('$pmrn','$pname','$dname','$m20','$d20','$ddate')";
mysqli_query($con,$ins_query20) or die(mysql_error());}


//$update33="update bed set status='vacant', pname='', pmrn='', dname='', adate='' where `bno`='$ptemp'";
//mysqli_query($con,$update33) or die(mysql_error());


}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Manual Discharge</title>
  
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>





  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>SFMMKPJSH DHAKA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='mpsadmin'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<h1 align="center">WELCOME TO MANUAL DISCHARGE PANEL </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname"  required value="<?php echo $data["adoc"]; ?>" </td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="10"><input type="text" name="pmrn"  required value="<?php echo $data["pmrn"]; ?>" /></td>
					 <td colspan="10"><input type="text" name="pname" required value="<?php echo $data["pname"]; ?>" /></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><input type="text" name="padd"  required value="<?php echo $data["padd"]; ?>" /></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Discharge Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="2"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" required value="<?php echo $data["age"]; ?>" /></td>  
             		<td colspan="5"> <input type="text" name="pheight" value="<?php echo $ddate1; ?>" size="15"></td>					 	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $data["gender"]; ?>" /></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $data["pphone"]; ?>" /></td>  

			    	 <td colspan="2"><input type="text" name="pweight"  value="<?php echo $data["room"]; ?>" /></td>  
					 <td colspan="2"><input type="text" name="ptemp" value="<?php echo $data["room1"]; ?>" /></td>  
					 </tr>

						 <tr><td colspan="20"><label><strong>Patient's Clinical Details:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="5"></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"></textarea></td>  </tr>
						
				
														

<tr><td colspan="12"><label><strong>Medication Advised:</strong></label></td>
<td colspan="8"><label><strong>Dosages:</strong></label></td>

  </tr>


<tr> 

        

<td colspan="12"> <input list="browsers" name="m1" size=70% class="form-control" value="">
  <datalist id="browsers">

						
				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d1" size=70% class="form-control"value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m2" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d2" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m3" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d3" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m4" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d4" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m5" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d5" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m6" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d6" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m7" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 


<td  colspan="8"><input list="browsers1" name="d7" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m8" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 


<td  colspan="8"><input list="browsers1" name="d8" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>
<tr> 
<td colspan="12"> <input list="browsers" name="m9" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d9" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m10" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d10" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m11" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 


<td  colspan="8"><input list="browsers1" name="d11" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m12" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 


<td  colspan="8"><input list="browsers1" name="d12" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m13" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d13" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m14" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d14" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>
<tr> 
<td colspan="12"> <input list="browsers" name="m15" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d15" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>
<tr> 
<td colspan="12"> <input list="browsers" name="m16" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d16" size=70% class="form-control" value="">
  <datalist id="browsers1">

						
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>
<tr> 
<td colspan="12"> <input list="browsers" name="m17" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 


<td  colspan="8"><input list="browsers1" name="d17" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m18" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d18" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>
</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m19" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



<td  colspan="8"><input list="browsers1" name="d19" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>

<tr> 
<td colspan="12"> <input list="browsers" name="m20" size=70% class="form-control" value="">
  <datalist id="browsers">


				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist>
</td> 



       

<td  colspan="8"><input list="browsers1" name="d20" size=70% class="form-control" value="">
  <datalist id="browsers1">


				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>


</tr>


<tr><td colspan="20"><label for="age"><strong>Other Instructions:</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea" name="other" rows="5" placeholder="Other Instructions"></textarea></td>  </tr>	

<tr><td colspan="20"><select name="pdiet" placeholder="Select Dosage">
						
						<option value=''>-Select Diet-</option>
				 <?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>	
						
						</select>
</td></tr>






<tr><td colspan="20"><select name="reffer" placeholder="Select Dosage" >
						
						<option value=''>-Select Reffered Doctor-</option>
				 <?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>	
						
						</select>
</td></tr>

<tr><td colspan="20"><select name="discharge" placeholder="discharge" required />
						
						<option value=''>-Discharge-</option>
						<option value="Discharge Confirm">Discharge Confirm</option>
								
						</select>
</td></tr>



<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="mdischargereport?pmrn=<?php echo "$pmrn"; ?>&ddate=<?php echo "$ddate"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>					
</tr>

</body>

</html>
