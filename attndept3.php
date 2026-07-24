<?php
include_once 'dbconfig.php';
?>


<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php 

$d1=date('Y-m-01');
$d2=date('Y-m-02');
$d3=date('Y-m-03');
$d4=date('Y-m-04');
$d5=date('Y-m-05');
$d6=date('Y-m-06');
$d7=date('Y-m-07');
$d8=date('Y-m-08');
$d9=date('Y-m-09');
$d10=date('Y-m-10');
$d11=date('Y-m-11');
$d12=date('Y-m-12');
$d13=date('Y-m-13');
$d14=date('Y-m-14');
$d15=date('Y-m-15');
$d16=date('Y-m-16');
$d17=date('Y-m-17');
$d18=date('Y-m-18');
$d19=date('Y-m-19');
$d20=date('Y-m-20');
$d21=date('Y-m-21');
$d22=date('Y-m-22');
$d23=date('Y-m-23');
$d24=date('Y-m-24');
$d25=date('Y-m-25');
$d26=date('Y-m-26');
$d27=date('Y-m-27');
$d28=date('Y-m-28');
$d29=date('Y-m-29');
$d30=date('Y-m-30');
$d31=date('Y-m-31');












?>


<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));

$dept=$_REQUEST["dept"];
$staff=$_REQUEST["staff"];

/*$query43 = "SELECT COUNT(dname) FROM pappnew where dname= '$bt' and adate1 BETWEEN '$start' and '$end' and status='SEEN';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



$query44 = "SELECT COUNT(dname) FROM pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44=mysqli_fetch_assoc($result44);*/
}

?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
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
  height: 50px;
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

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script>

  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   
   
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
			url: "get_dept.php",
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
   <li><a href='homemng'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Department Wise Attendance Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							<td colspan="3"><label><strong> Select Consultant</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 
<td>
			
			<select name="dept" class="country" value=''required/>
<option ="">--Select Department--</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct dept FROM staff3");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['dept']; ?>"><?php echo $row['dept']; ?></option>
        <?php
	} 
?>
</select>

</td>			       
	<td>	
		
		
									
									
			<select name="staff" class="state" value=''required/>

</select>
</td>
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Staff's Name</strong></th>
      <th width="10%"><strong>Staff ID</strong></th>
      <th width="15%"><strong>Department</strong>
      <th width="14%"><strong>In-Time</strong>   
      <th width="14%"><strong>Out-Time</strong>
      <th width="14%"><strong>Status</strong>
	  

	   </tr>
  </thead>
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$dept=$_REQUEST["dept"];
$staff=$_REQUEST["staff"];






if (($_POST['staff'])=="All"){
$sel_query="Select * from staff3 where status ='Active' and dept='$dept' order by id asc";}

else 
	
	{$sel_query="Select * from staff3 where status ='Active' and dept='$dept'and sid1='$staff' order by id asc";}
//$start=$row["aadate"];
$count=1;
$row789 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row789)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
	  
	  <td align="center"><?php echo $row["sid"]; ?></a></td>
	  <td align="center"><?php echo $row["dept"]; ?></a></td>
       <?php 

	   $uuid=$row['sid1'];
	   
$s1="Select COUNT(distinct(uid)),status from tm3 where date1='$d1' and uid='$uuid'";
$r1 = mysqli_query($con, $s1) or die(mysqli_error());
$row1 = mysqli_fetch_array($r1);
$n1=$row1['COUNT(distinct(uid))'];

$s2="Select COUNT(distinct(uid)),status from tm3 where date1='$d2' and uid='$uuid'";
$r2 = mysqli_query($con, $s2) or die(mysqli_error());
$row2 = mysqli_fetch_array($r2);
$n2=$row2['COUNT(distinct(uid))'];


$s3="Select COUNT(distinct(uid)),status from tm3 where date1='$d3' and uid='$uuid'";
$r3 = mysqli_query($con, $s3) or die(mysqli_error());
$row3 = mysqli_fetch_array($r3);
$n3=$row3['COUNT(distinct(uid))'];

$s4="Select COUNT(distinct(uid)),status from tm3 where date1='$d4' and uid='$uuid'";
$r4 = mysqli_query($con, $s4) or die(mysqli_error());
$row4 = mysqli_fetch_array($r4);
$n4=$row4['COUNT(distinct(uid))'];


$s5="Select COUNT(distinct(uid)),status from tm3 where date1='$d5' and uid='$uuid'";
$r5 = mysqli_query($con, $s5) or die(mysqli_error());
$row5 = mysqli_fetch_array($r5);
$n5=$row5['COUNT(distinct(uid))'];


$s6="Select COUNT(distinct(uid)),status from tm3 where date1='$d6' and uid='$uuid'";
$r6 = mysqli_query($con, $s6) or die(mysqli_error());
$row6 = mysqli_fetch_array($r6);
$n6=$row6['COUNT(distinct(uid))'];


$s7="Select COUNT(distinct(uid)),status from tm3 where date1='$d7' and uid='$uuid'";
$r7 = mysqli_query($con, $s7) or die(mysqli_error());
$row7 = mysqli_fetch_array($r7);
$n7=$row7['COUNT(distinct(uid))'];


$s8="Select COUNT(distinct(uid)),status from tm3 where date1='$d8' and uid='$uuid'";
$r8 = mysqli_query($con, $s8) or die(mysqli_error());
$row8 = mysqli_fetch_array($r8);
$n8=$row8['COUNT(distinct(uid))'];


$s9="Select COUNT(distinct(uid)),status from tm3 where date1='$d9' and uid='$uuid'";
$r9 = mysqli_query($con, $s9) or die(mysqli_error());
$row9 = mysqli_fetch_array($r9);
$n9=$row9['COUNT(distinct(uid))'];

$s10="Select COUNT(distinct(uid)),status from tm3 where date1='$d10' and uid='$uuid'";
$r10= mysqli_query($con, $s10) or die(mysqli_error());
$row10 = mysqli_fetch_array($r10);
$n10=$row10['COUNT(distinct(uid))'];



$s11="Select COUNT(distinct(uid)),status from tm3 where date1='$d11' and uid='$uuid'";
$r11= mysqli_query($con, $s11) or die(mysqli_error());
$row11 = mysqli_fetch_array($r11);
$n11=$row11['COUNT(distinct(uid))'];


$s12="Select  COUNT(distinct(uid)),status from tm3 where date1='$d12' and uid='$uuid'";
$r12= mysqli_query($con, $s12) or die(mysqli_error());
$row12 = mysqli_fetch_array($r12);
$n12=$row12['COUNT(distinct(uid))'];


$s13="Select distinct COUNT(distinct(uid)),status from tm3 where date1='$d13' and uid='$uuid'";
$r13= mysqli_query($con, $s13) or die(mysqli_error());
$row13 = mysqli_fetch_array($r13);
$n13=$row13['COUNT(distinct(uid))'];


$s14="Select COUNT(distinct(uid)),status from tm3 where date1='$d14' and uid='$uuid'";
$r14= mysqli_query($con, $s14) or die(mysqli_error());
$row14 = mysqli_fetch_array($r14);
$n14=$row14['COUNT(distinct(uid))'];


$s15="Select COUNT(distinct(uid)),status from tm3 where date1='$d15' and uid='$uuid'";
$r15= mysqli_query($con, $s15) or die(mysqli_error());
$row15 = mysqli_fetch_array($r15);
$n15=$row15['COUNT(distinct(uid))'];

$s16="Select COUNT(distinct(uid)),status from tm3 where date1='$d16' and uid='$uuid'";
$r16= mysqli_query($con, $s16) or die(mysqli_error());
$row16 = mysqli_fetch_array($r16);
$n16=$row16['COUNT(distinct(uid))'];

$s17="Select COUNT(distinct(uid)),status from tm3 where date1='$d17' and uid='$uuid'";
$r17= mysqli_query($con, $s17) or die(mysqli_error());
$row17 = mysqli_fetch_array($r17);
$n17=$row17['COUNT(distinct(uid))'];


$s18="Select COUNT(distinct(uid)),status from tm3 where date1='$d18' and uid='$uuid'";
$r18= mysqli_query($con, $s18) or die(mysqli_error());
$row18 = mysqli_fetch_array($r18);
$n18=$row18['COUNT(distinct(uid))'];

$s19="Select COUNT(distinct(uid)),status from tm3 where date1='$d19' and uid='$uuid'";
$r19= mysqli_query($con, $s19) or die(mysqli_error());
$row19 = mysqli_fetch_array($r19);
$n19=$row19['COUNT(distinct(uid))'];

$s20="Select COUNT(distinct(uid)),status from tm3 where date1='$d20' and uid='$uuid'";
$r20= mysqli_query($con, $s20) or die(mysqli_error());
$row20 = mysqli_fetch_array($r20);
$n20=$row20['COUNT(distinct(uid))'];

$s21="Select COUNT(distinct(uid)),status from tm3 where date1='$d21' and uid='$uuid'";
$r21= mysqli_query($con, $s21) or die(mysqli_error());
$row21 = mysqli_fetch_array($r21);
$n21=$row21['COUNT(distinct(uid))'];

$s22="Select COUNT(distinct(uid)),status from tm3 where date1='$d22' and uid='$uuid'";
$r22= mysqli_query($con, $s22) or die(mysqli_error());
$row22 = mysqli_fetch_array($r22);
$n22=$row22['COUNT(distinct(uid))'];


$s23="Select COUNT(distinct(uid)),status from tm3 where date1='$d23' and uid='$uuid'";
$r23= mysqli_query($con, $s23) or die(mysqli_error());
$row23 = mysqli_fetch_array($r23);
$n23=$row23['COUNT(distinct(uid))'];


$s24="Select COUNT(distinct(uid)),status from tm3 where date1='$d24' and uid='$uuid'";
$r24= mysqli_query($con, $s24) or die(mysqli_error());
$row24 = mysqli_fetch_array($r24);
$n24=$row24['COUNT(distinct(uid))'];


$s25="Select COUNT(distinct(uid)),status from tm3 where date1='$d25' and uid='$uuid'";
$r25= mysqli_query($con, $s25) or die(mysqli_error());
$row25 = mysqli_fetch_array($r25);
$n25=$row25['COUNT(distinct(uid))'];


$s26="Select COUNT(distinct(uid)),status from tm3 where date1='$d26' and uid='$uuid'";
$r26= mysqli_query($con, $s26) or die(mysqli_error());
$row26 = mysqli_fetch_array($r26);
$n26=$row26['COUNT(distinct(uid))'];

$s27="Select COUNT(distinct(uid)),status from tm3 where date1='$d27' and uid='$uuid'";
$r27= mysqli_query($con, $s27) or die(mysqli_error());
$row27 = mysqli_fetch_array($r27);
$n27=$row27['COUNT(distinct(uid))'];


$s28="Select COUNT(distinct(uid)),status from tm3 where date1='$d28' and uid='$uuid'";
$r28= mysqli_query($con, $s28) or die(mysqli_error());
$row28 = mysqli_fetch_array($r28);
$n28=$row28['COUNT(distinct(uid))'];


$s29="Select COUNT(distinct(uid)),status from tm3 where date1='$d29' and uid='$uuid'";
$r29= mysqli_query($con, $s29) or die(mysqli_error());
$row29 = mysqli_fetch_array($r29);
$n29=$row29['COUNT(distinct(uid))'];


$s30="Select COUNT(distinct(uid)),status from tm3 where date1='$d30' and uid='$uuid'";
$r30= mysqli_query($con, $s30) or die(mysqli_error());
$row30 = mysqli_fetch_array($r30);
$n30=$row30['COUNT(distinct(uid))'];



$s31="Select COUNT(distinct(uid)),status from tm3 where date1='$d31' and uid='$uuid'";
$r31= mysqli_query($con, $s31) or die(mysqli_error());
$row31 = mysqli_fetch_array($r31);
$n31=$row31['COUNT(distinct(uid))'];





?>

	   
	   <td align="center"><?php if($n1>0) {echo $row1['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n2>0) {echo $row2['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n3>0) {echo $row3['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n4>0) {echo $row4['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n5>0) {echo $row5['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n6>0) {echo $row6['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n7>0) {echo $row7['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n8>0) {echo $row8['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n9>0) {echo $row9['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n10>0) {echo $row10['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n11>0) {echo $row11['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n12>0) {echo $row12['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n13>0) {echo $row13['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n14>0) {echo $row14['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n15>0) {echo $row15['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n16>0) {echo $row16['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n17>0) {echo $row17['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n18>0) {echo $row18['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n19>0) {echo $row19['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n20>0) {echo $row20['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n21>0) {echo $row21['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n22>0) {echo $row22['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n23>0) {echo $row23['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n24>0) {echo $row24['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n25>0) {echo $row25['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n26>0) {echo $row26['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n27>0) {echo $row27['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n28>0) {echo $row28['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n29>0) {echo $row29['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n30>0) {echo $row30['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n31>0) {echo $row31['status'];} else {echo 'A';}?></td>
	  
	  

  
      </tr>
<?php $count++; } 
	}
?>

      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>
