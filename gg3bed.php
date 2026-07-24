

<?php
include_once 'dbconfig.php';
?>


<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('nurse','ddf')"; 
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
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and id='$id'");
$data = mysqli_fetch_assoc($query4);
$oldbed=$data['room1'];
//echo $oldbed;
  
//echo $now = time();  
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
//$pphone=$_REQUEST['pphone'];
//$diagnosis=$_REQUEST['diagnosis'];
//$cdetails=$_REQUEST['cdetails'];
//$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];
$btype=$_REQUEST['btype1'];
//$padd=$_REQUEST['padd'];
$bno=$_REQUEST['bno'];
$ptemp=$_REQUEST['ptemp'];
$adate= date('d/m/Y H:i:s');
$adate1= date('m/d/Y');
$adatenew= date('Y-m-d H:i:s');


$query_bed1 = mysqli_query($db,"select * from newbed where type='$psex' and bno='$ptemp' and pmrn='$pmrn' and eid='$eid' and adatenew1 IS NULL");
$charge_bed1 = mysqli_fetch_assoc($query_bed1);
	
//$start_d=$adatenew;
$start=$charge_bed1["adatenew"];
//$dis=$charge_bed1["adatenew1"];
$ss=date('Y-m-d',$start);
//$ss1=date('Y-m-d',$dis);


$bed_ats=$charge_bed1['adatenew'];
$bed_ate=date('Y-m-d H:i:s');


$admit_time = strtotime($bed_ats);
$end_time = strtotime($bed_ate);
$timediff = $end_time - $admit_time ;
$bed_c=$charge_bed1['b_charge'];
$b_charge=$bed_c / 24;
$final_total_charge= round($timediff/(60*60) * $b_charge);    
$final_total_stay_hours= round($timediff/(60*60),2);

$now = strtotime($adatenew);
$your_date = strtotime($start);
//$your_date1 = strtotime("$dis");
$datediff = $now - $your_date;
//$datediff_t = $now - $your_date;

$query_bed = mysqli_query($db,"select * from bed where bno='$bno'");
$charge_bed = mysqli_fetch_assoc($query_bed);
$b_charge=$charge_bed['charge']/24;
$b_charge1=$charge_bed['charge'];

$fday= round($datediff/(60*60) * $b_charge) ;
$fday_t= round($datediff/(60*60),4) ;

if($ptemp!=$bno){
$ins_query1="insert into newbed (`dname`,`pname`,`pmrn`,`adate`,`type`,`bno`,`eid`,`adate1`,`adatenew`,`tby`,`b_charge`) values ('$dname', '$pname','$pmrn','$adate','$btype','$bno','$eid','$adate1','$adatenew','$user','$b_charge1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update2="update bed set status='Under Housekeeping', pname='',pmrn='', adate='', dname='', discharge='' where bno='$oldbed'";
mysqli_query($con,$update2) or die(mysqli_error(gg));


$update="update bed set status='Occupied', pname='$pname', pmrn='$pmrn', dname='$dname', adate='$adate',discharge='' where `bno`='$bno'";
mysqli_query($con,$update) or die(mysql_error());

$update22="update inpatient set room='$btype', room1='$bno' where pmrn='$pmrn' and id='$id'";
mysqli_query($con,$update22) or die(mysql_error());

$ins_query2="insert into bed_mang (`bno`,`c_request_by`,`c_request_time`,`problem`,`status`) values('$ptemp','$user','$adate','Under Housekeeping','Under Housekeeping')";
mysqli_query($con,$ins_query2) or die(mysql_error());

$update2_n="update newbed set adatenew1='$bed_ate',tby1='$user',charge='$final_total_charge',tdays='$final_total_stay_hours',b_charge='$bed_c' where type='$psex' and bno='$ptemp' and pmrn='$pmrn' and eid='$eid' and adatenew1 IS NULL";
mysqli_query($con,$update2_n) or die(mysqli_error(gg));

$update22_r="update irefferal set ward='$btype', bed1='$bno' where pmrn='$pmrn' and eid='$eid'";
mysqli_query($con,$update22_r) or die(mysql_error());

$url = "inview.php";
header("Location: $url");

}
else {
	echo '<script language="javascript">';
			echo 'alert("Unsuccessful !!"); ';
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
    max-width: 700px;
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
   <li><a href='viewnewnurse'><span>Home</span></a></li>
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S BED TRANSFER </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<label for="name"><strong>Select Ward :</strong></label>
			<p>
			
      <select class="country" name="btype1" id="con_charge1" required width="500px;">
<option value="">--Select Ward--</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct type FROM bed where status!='Deactivate'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
        <?php
	} 
?>
</select>
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
$('.country').select2();
});
</script>


<br /><br />	
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Avaiable Bed :</strong></label>
									<p>
									
									
			
					<select name="bno" class="state" required>

</select>

<label for="age"><strong>Current Bed Location :</strong></label>
<input name="psex" type="text" size="15" value="<?php echo $data["room"]; ?>"readonly>
      <input name="ptemp" type="text" size="13" value="<?php echo $data["room1"]; ?>"readonly>	 
									 
		
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                     
	    </p>

		<label for="age"><strong>Doctor's Name :</strong></label>
      <input name="dname" type="text" size="65" value="<?php echo $data["adoc"]; ?>"readonly>									
	  
	  <label for="age"><strong>Patient's Name & MRN:</strong></label>
      <input name="pname" type="text" size="40" value="<?php echo $data["pname"]; ?>"readonly>
      <input name="pmrn" type="text" size="17" value="<?php echo $data["pmrn"]; ?>"readonly>
	        
  </fieldset>


		<button type="submit" name="Submit">Confirm</button>

</form>
 
  

</body>

</html>


