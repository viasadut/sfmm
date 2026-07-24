<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);

$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];

  
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
$padd = $data['padd'];
$adm = $data['adate'];
$pphone=$data['pphone'];
$room=$data['room'];
$bed=$data['room1'];
$page=$data['age'];
$psex=$data['gender'];
$odate = date('d/m/Y H:i:s');
$date=date('Y-m-d',strtotime($_REQUEST["date"]));
//$date = $_REQUEST['date'];
$infu = $_REQUEST['infu'];
$dtime = $_REQUEST['dtime'];
$rtime = $_REQUEST['rtime'];
$url = "idocdiet.php?pmrn=$pmrn&eid=$eid";


$sel9="SELECT * FROM dietchart WHERE `dtype`='$infu';";
$result9 = mysqli_query($con,$sel9);


$query19 = "SELECT * FROM dietchart WHERE `dtype`='$infu';";
	 
$result19 = mysqli_query($con, $query19) or die(mysqli_error());

// Print out result
$data4 = mysqli_fetch_array($result19);
//$full=$row39['fullname'];



$d1=$data4['d1'];
$d2=$data4['d2'];
$d3=$data4['d3'];
$d4=$data4['d4'];
$d5=$data4['d5'];
$d6=$data4['d6'];
$type=$data4['type'];


$sel990="SELECT * FROM time WHERE `tt`='$rtime';";
$result990 = mysqli_query($con,$sel990);

if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!!  Please select the Time from Dropdown List"); ';
    echo '</script>';
    }
	
	
		
		else if($res9=mysqli_num_rows($result9)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Diet Menu is not in the Database List.. Please contact with Dietary Service"); ';
    echo '</script>';
    }

		
		
		else if($type=='add')
			
			{
				
				$ins_query1="insert into iidiet (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`dtime`,`user`,`status`,`rtime`,`ordate`,`dmenu`,`diettime`,`room`,`bed`,`type`) 
values( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$date','$infu','$dtime','$user','Data Updated','$rtime','$odate','$d1','Extra Food','$room','$bed','$type')";
mysqli_query($con,$ins_query1) or die(mysql_error());

				
			}
	
	else {



$ins_query1="insert into iidiet (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`dtime`,`user`,`status`,`rtime`,`ordate`,`dmenu`,`diettime`,`room`,`bed`,`type`) 
values( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$date','$infu','$dtime','$user','Data Updated','$rtime','$odate','$d1','Morning','$room','$bed','$type')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into iidiet (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`dtime`,`user`,`status`,`rtime`,`ordate`,`dmenu`,`diettime`,`room`,`bed`,`type`) 
values( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$date','$infu','$dtime','$user','Data Updated','$rtime','$odate','$d2','Mid Morning','$room','$bed','$type')";
mysqli_query($con,$ins_query2) or die(mysql_error());

$ins_query3="insert into iidiet (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`dtime`,`user`,`status`,`rtime`,`ordate`,`dmenu`,`diettime`,`room`,`bed`,`type`) 
values( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$date','$infu','$dtime','$user','Data Updated','$rtime','$odate','$d3','Lunch','$room','$bed','$type')";
mysqli_query($con,$ins_query3) or die(mysql_error());

$ins_query4="insert into iidiet (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`dtime`,`user`,`status`,`rtime`,`ordate`,`dmenu`,`diettime`,`room`,`bed`,`type`) 
values( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$date','$infu','$dtime','$user','Data Updated','$rtime','$odate','$d4','Evening','$room','$bed','$type')";
mysqli_query($con,$ins_query4) or die(mysql_error());

$ins_query5="insert into iidiet (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`dtime`,`user`,`status`,`rtime`,`ordate`,`dmenu`,`diettime`,`room`,`bed`,`type`) 
values( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$date','$infu','$dtime','$user','Data Updated','$rtime','$odate','$d5','Dinner','$room','$bed','$type')";
mysqli_query($con,$ins_query5) or die(mysql_error());


$ins_query6="insert into iidiet (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`dtime`,`user`,`status`,`rtime`,`ordate`,`dmenu`,`diettime`,`room`,`bed`,`type`) 
values( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$date','$infu','$dtime','$user','Data Updated','$rtime','$odate','$d6','Supper','$room','$bed','$type')";
mysqli_query($con,$ins_query6) or die(mysql_error());


//header("URL=$url");
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
 




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
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
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT INVESTIGATION </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data['adoc'];?></td></tr>
				
						
						
				
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
						<td colspan="2"><label><strong>Ward/Cabin:</strong></label></td>
						<td colspan="4"><label><strong>Bed NO:</strong></label></td>
	
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["age"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  
					 <td colspan="2"><?php echo $data["room"]; ?></td>  
					 <td colspan="4"><?php echo $data["room1"]; ?></td>  

				 </tr>



<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Diet Form</strong></label></td> </tr>
<tr>
<td colspan="2" align="center"><label><strong>Date</strong></label></td>
<td colspan="2" align="center"><label><strong>Time</strong></label></td>
<td colspan="10" align="center"><label><strong>Diet</strong></label></td> 

<td colspan="6" align="center"><label><strong>Instruction</strong></label></td>

</tr>

<tr>
<td colspan="2" align="left"><input type="text" class="style" name="date" id="datepicker" value="<?php echo date('m/d/Y');?>"placeholder="Select Date" required ></td>
<td colspan="2" align="center"><input list="rr5" name="rtime" class="form-control"required>
  <datalist id="rr5">
<option value=''>-Select Time-</option>
				<?php 
			$sql = "select * from `time`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->tt."'>".$row->tt."</option>";
				}
			}
			?>  </datalist></td>
			
			
<td colspan="10" align="center"><input list="infu" name="infu" class="form-control" required autocomplete="off">
  <datalist id="infu">
<option value=''>-Select Diet-</option>
				<?php 
			$sql = "select * from `dietchart`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dtype."'>".$row->dtype."</option>";
				}
			}
			?>  </datalist></td>			

<td colspan="6" align="center"><input type="text" name="dtime" required value="" /></td></tr>

<tr><td colspan="20" align="right"><button type="submit" name="Submit">Confirm</button></td></tr>

			        

<tr>
<td colspan="20"align="right"><font size="4.5" color="#FF0000"><b><label><strong><a href="viewidietdetailsimo">View All Available Diet Details</a></strong>&nbsp;&nbsp;<a href="viewidiettomorrow?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">View Tomorrow's Diet</a></strong>&nbsp;&nbsp;<a href="datewiseidiet?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><b>(See Datewise Diet Order)<b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	  
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="2" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Order Date </strong></td>
 
      <td colspan="2" align="center"><strong>Done Date</strong></td>
      <td colspan="2" align="center"><strong>Diet Type</strong></td>
	  <td colspan="1" align="center"><strong>Time</strong></td>
	  <td colspan="2" align="center"><strong>Items</strong></td>
	  <td colspan="2" align="center"><strong>Ins.</strong></td>
	  <td colspan="2" align="center"><strong>Done By</strong></td>
	  <td colspan="1" align="center"><strong>ADD</strong></td>
	  <td colspan="1" align="center"><strong>Cancel</strong></td>
	  <td colspan="1" align="center"><strong>Menu Details</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$odate = date('Y-m-d');
$count=1;
$sel_query="Select * from iidiet where pmrn= '$pmrn' and eid='$eid' and odate='$odate' and status1 != 'Cancel'order by `id` ASC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="2"><?php echo date('d/m/Y',strtotime($row["odate"])); ?></td>  
      <td align="center"colspan="2"><?php echo $row["ddate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["diettime"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["dmenu"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["dtime"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
<td align="center" colspan="1"><a onclick="return confirm_click1();" href="idiettomorrow?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&infusion=<?php echo $row["infusion"]; ?>&instruc=<?php echo $row["dtime"]; ?>&rtime=<?php echo $row["rtime"]; ?>&orderby=<?php echo $user; ?>">ADD For Tomorrow</a></td>  	  
<td align="center" colspan="1"><a onclick="return confirm_click();" href="imediupdate1indiet?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&user=<?php echo $user; ?>">Cancel</a></td>
<td align="center" colspan="1"><a href="menudetailsimo?dtype=<?php echo $row["infusion"]; ?>">View Details Diet Menu</a></td>  	  
	  
      </tr>
    <?php $count++; } ?>
	<tr><td colspan="10"><a target='_blank' href="testpdfdiet.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>

	
	</table>
</form>
</body>

</html>
