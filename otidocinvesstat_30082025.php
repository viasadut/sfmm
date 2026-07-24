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

$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$id1=$_REQUEST['id'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and id='$id1'");
$data = mysqli_fetch_assoc($query4);

$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];





$query3 = "SELECT * FROM otpac where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3 = mysqli_query($con, $query3);


$query3anaes = "SELECT * FROM otanaestype where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3anaes = mysqli_query($con, $query3anaes);

$query3position = "SELECT * FROM otanaesposition where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3position = mysqli_query($con, $query3position);

$query3care = "SELECT * FROM otanaescare where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3care = mysqli_query($con, $query3care);


$query3co2 = "SELECT * FROM otanaesetco2 where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3co2 = mysqli_query($con, $query3co2);


$query3sbp = "SELECT * FROM otanaessbp where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3sbp = mysqli_query($con, $query3sbp);

$query3pulse = "SELECT * FROM otanaespulse where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3pulse = mysqli_query($con, $query3pulse);


$query3spo2 = "SELECT * FROM otanaesspo2 where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3spo2 = mysqli_query($con, $query3spo2);

$query3temp = "SELECT * FROM otanaestemp where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3temp = mysqli_query($con, $query3temp);

$query3rr = "SELECT * FROM otanaesrr where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3rr = mysqli_query($con, $query3rr);

$query3cvp = "SELECT * FROM otanaescvp where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3cvp = mysqli_query($con, $query3cvp);

$query3ibp = "SELECT * FROM otanaesibp where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3ibp = mysqli_query($con, $query3ibp);

$query3urine = "SELECT * FROM otanaesurine where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3urine = mysqli_query($con, $query3urine);

$query3sugar = "SELECT * FROM otanaesbsugar1 where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3sugar = mysqli_query($con, $query3sugar);

$query3bloss = "SELECT * FROM otanaesbloss where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3bloss = mysqli_query($con, $query3bloss);

$query3btrans = "SELECT * FROM otanaesbtrans where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3btrans = mysqli_query($con, $query3btrans);

$query3other = "SELECT * FROM otanaesother where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3other = mysqli_query($con, $query3other);

$query3medi = "SELECT * FROM otanaesmedi where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3medi = mysqli_query($con, $query3medi);

$query3infu = "SELECT * FROM otanaesinfusion where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3infu = mysqli_query($con, $query3infu);

$query3vas = "SELECT * FROM otanaesvas where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3vas = mysqli_query($con, $query3vas);



$query3res = "SELECT * FROM otanaesres where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3res = mysqli_query($con, $query3res);


$query3vol = "SELECT * FROM otanaesvol where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3vol = mysqli_query($con, $query3vol);

$query3circuit = "SELECT * FROM circuit where pmrn= '$pmrn' and eid='$id1'"; 
	 
$result3circuit = mysqli_query($con, $query3circuit);

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data['pname'];
$pmrn = $data['pmrn'];
$eid = $data['eid'];
//$padd = $data['padd'];
$adm = $data['adate'];
$pphone=$data['pphone'];
$page=$data['page'];
$psex=$data['psex'];
$odate = date('d/m/Y H:i:s');
$infu = $_REQUEST['infu'];
$remarks = $_REQUEST['remarks'];
$date=$_REQUEST['date'];
/*

if($res90=mysqli_num_rows($result3)==0)
{
echo '<script language="javascript">';
    echo 'alert("Cannot Charge If Documentation is not fully Completed"); ';

    echo '</script>';
	

}

else if($res91=mysqli_num_rows($result3anaes)==0)
{
echo '<script language="javascript">';
    echo 'alert("Cannot Charge If Anaesthesia Type is not defined"); ';

    echo '</script>';
	

}

else if($res92=mysqli_num_rows($result3position)==0)
{
echo '<script language="javascript">';
    echo 'alert("Cannot Charge If Anaesthesia Position is not defined"); ';

    echo '</script>';
	

}



else if($res93=mysqli_num_rows($result3care)==0)
{
echo '<script language="javascript">';
    echo 'alert("Cannot Charge If Anaesthesia Care is not defined"); ';

    echo '</script>';
	
}


else if($res94=mysqli_num_rows($result3vol)==0)
{
echo '<script language="javascript">';
    echo 'alert("Cannot Charge If Volatile Agent is not defined"); ';

    echo '</script>';
	
}

else if($res95=mysqli_num_rows($result3res)==0)
{
echo '<script language="javascript">';
    echo 'alert("Cannot Charge If RESPIRATORY MANAGEMENT is not defined"); ';

    echo '</script>';
	
}

else if($res96=mysqli_num_rows($result3vas)==0)
{
echo '<script language="javascript">';
    echo 'alert("Cannot Charge If   VASCULAR ACCESS, TUBES AND CATHETERS is not defined"); ';

    echo '</script>';
	
}


else if($res97=mysqli_num_rows($result3care)==0)
{
echo '<script language="javascript">';
    echo 'alert("Cannot Charge If   CARE & MONITOR is not defined"); ';

    echo '</script>';
	
}

*/




$ins_query="insert into otivisitendo (`pmrn`,`eid`,`pname`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`,`vtype`,`cdate`) values 
( '$pmrn','$id1','$pname','$page','$adm','$psex','$pphone','$odate','$full','$user','$remarks','$infu','$date')";
mysqli_query($con,$ins_query) or die(mysql_error());

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
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
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

<script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

 




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>



    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">
 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>

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
			url: "ctype.php",
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
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Reveive this Sample ?");
}

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




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT INVESTIGATION </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data['dname'];?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $data["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
					
	
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["page"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["psex"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  
					 

				 </tr>



<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Doctor/Alied Charges</strong></label></td> </tr>

<tr>
<td colspan="5" align="center"><label><strong>Date</strong></label></td>
<td colspan="12" align="center"><label><strong>Type Of Charge</strong></label></td> 
<td colspan="3" align="center"><label><strong>Amount</strong></label></td>

</tr>
<tr>
<td colspan="5" align="left"><input type="text" class="style" name="date" id="datepicker" placeholder="Select Date" value="<?php echo date('m/d/Y');?>" required></td>
<td colspan="12" align="center"><input list="rr10" name="infu" class="form-control">
  <datalist id="rr10">
						
						<option value=''>-Select Type-</option>
				 <?php 
			$sql = "select Proname from `mma1` ";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->Proname."'>".$row->Proname."</option>";
				}
			}
			?>	
						
						</datalist>						
</td>
			<td colspan="3" align="center"><input type="text" name="remarks" value="" required/></td>
</td>

</tr> 

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>



						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Doctor/Allied Charges</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Entry By</strong></td>
      <td colspan="4" align="center"><strong>Visited Date </strong></td>
      <td colspan="4" align="center"><strong>Visited By</strong></td>
      <td colspan="2" align="center"><strong>Charge</strong></td>   
      <td colspan="2" align="center"><strong>Visit Type</strong></td>   

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
$id=$_REQUEST["id"];


$count=1;
$sel_query="Select * from otivisitendo where pmrn= '$pmrn' and eid='$id1'  order by `user` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="4"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
			<td align="center"colspan="4"><?php echo $row["vtype"]; ?></td>
      
  
      </tr>
    <?php $count++; } ?>
</table>
</form>
</body>

</html>
