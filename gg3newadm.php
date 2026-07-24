<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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

$user=$_SESSION['sess_username'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data = mysqli_fetch_assoc($query4);


$query43 = "SELECT COUNT(pmrn) FROM inpatient where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
//echo $count1;
$sel_query27="Select * from presnew where pmrn='$pmrn' and eid='$eid' ;";

$result27 = mysqli_query($con,$sel_query27);
$row27 = mysqli_fetch_assoc($result27);
$cd=$row27["cdetails"];
$da=$row27["diagnosis"];
$doc=$row27["dname"];
  
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
$diagnosis=$_REQUEST['diagnosis'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];
$btype=$_REQUEST['btype1'];
$padd=$_REQUEST['padd'];
$bno=$_REQUEST['bno'];
$adate= date('m-d-Y H:i:s');

$sel="SELECT * FROM inpatient WHERE `pmrn`='$pmrn' and `discharge`='';";
$result = mysqli_query($con,$sel);
if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Already Admitted in the system"); ';
    echo '</script>';
    }
else{

$ins_query="insert into inpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$psex','$page','$adate','$btype','$bno','$count1','$pphone')";
mysqli_query($con,$ins_query);
//if ($con->query($ins_query) == TRUE) 
//{

$ins_query1="insert into ipres (`dname`,`pname`,`pmrn`,`padd`,`psex`,`page`,`date`,`room`,`room1`,`cdetails`,`diagnosis`,`pphone`,`eid`) values ('$dname', '$pname','$pmrn','$padd','$psex','$page','$adate','$btype','$bno','$cdetails','$diagnosis','$pphone','$count1')";
mysqli_query($con,$ins_query1);


$ins_query111="insert into newbed (`dname`,`pname`,`pmrn`,`adate`,`type`,`bno`,`eid`) values ('$dname', '$pname','$pmrn','$adate','$btype','$bno','$count1')";
mysqli_query($con,$ins_query111);


$update="update bed set status='Occupied', pname='$pname', pmrn='$pmrn', dname='$dname', adate='$adate' where `bno`='$bno'";
mysqli_query($con,$update);

$update66="update presnew set astatus='admitted'where `pmrn` ='$pmrn' and `eid`='$eid'";
mysqli_query($con,$update66);


$ins_query99="insert into tinpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$psex','$page','$adate','$btype','$bno','$count1','$pphone')";
mysqli_query($con,$ins_query99);  

    echo '<script language="javascript">';
    echo 'alert("Admission Successful"); ';
    echo '</script>';
} 

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
  width: 90%;
}
textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
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
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
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
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
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

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S ADMISSION </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<label for="name"><strong>Select Ward :</strong></label>
			<p>
			<select name="btype1" class="country"required/>
<option selected="">--Select Ward--</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct type FROM bed");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
        <?php
	} 
?>
</select>

			       
		
		<label for="mail"><strong>Avaiable Bed :</strong></label>
									<p>
									
									
			<select name="bno" class="state"required/>
<option selected="">--Select Bed--</option>
</select>
<label for="age"><strong>Select Doctor Name :</strong></label>
		
		<select name="dname" value=""required/>
			        <option><?php echo $doc;?></option>
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
									
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" value="<?php echo $data["pname"];?>"readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" value="<?php echo $data["padd"]; ?>"readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            <input name="psex" type="text" size="15" value="<?php echo $data["psex"]; ?>"readonly>
            <input name="pmrn" type="text" size="15" value="<?php echo $data["pmrn"]; ?>"readonly>
      <input name="pphone" type="text" size="13" value="<?php echo $data["pphone"]; ?>"readonly>	  
	  <input name="page" type="text" size="2"value="<?php echo $data["page"]; ?>"readonly>
      
<label for="age"  size="20%"><strong>Patient's Physical Examination :</strong></label>

	        <input name="pheight" type="text" size="21" placeholder="Height" value="">
	        <input name="pweight" type="text" size="21" placeholder="Weight" value="">
	        <input name="ptemp" type="text" size="11" placeholder="Temperature" value="">
			
<label for="age"><strong>Patient's Clinical Details :</strong></label>
			<p><textarea id="exampleTextarea" name="cdetails" size =50%><?php echo $cd;?></textarea></p>
<label for="age"><strong>Patient's Diagnosis :</strong></label>
<p>			<textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"size =50%><?php echo $da;?></textarea></p>

  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');



//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['ID'];
//$adate=$_REQUEST['adate'];
$query44 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and adoc='$doc' and discharge=''");
$data4 = mysqli_fetch_assoc($query44);
  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		<a target='_blank' href="adm?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data4["adoc"]; ?>&adate=<?php echo $data4["adate"]; ?>&eid=<?php echo $count1; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>
