<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','diet','physio')"; 
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

$user=$_SESSION["sess_username"];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];





//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$adoc=$data['adoc'];
$emerid=$data['emerid'];

$query5 = mysqli_query($db,"select * from irefferal where pmrn='$pmrn' and eid='$eid' and infusion='$full' and cstatus='Active'");
$data5 = mysqli_fetch_assoc($query5);
$rtype=$data5['bed'];
 
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
$page=$data['age'];
$psex=$data['gender'];
//$odate = $_REQUEST['odate'];
//$otime = $_REQUEST['otime'];
$infu = $_REQUEST['infu'];
$inves = $_REQUEST['inves'];
$charge = $_REQUEST['charge'];
$pnote = $_REQUEST['pnote'];
$vtype = $_REQUEST['vtype'];
$adate1= date('d/m/Y H:i:s');
$daten= date('Y-m-d');

$sel95="SELECT * FROM privilege WHERE `pname`='$vtype' and dname in('$full','common') and status='Approved';";
$result95 = mysqli_query($con,$sel95);



if($res95=mysqli_num_rows($result95)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Procedure Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }


else if($full =='$adoc'){

$ins_query="insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`) values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$vtype','$daten')";
mysqli_query($con,$ins_query) or die(mysql_error());
}



else if($full !='' and $rtype=='Continuous'){

$ins_query="insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`) values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$vtype','$daten')";
mysqli_query($con,$ins_query) or die(mysql_error());
}




else if($full !='' and $rtype!='Continuous'){

$ins_query="insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`) values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$adate1','$inves','$infu','$pnote','$full','Data Updated','Doctor','$charge','$vtype','$daten')";
mysqli_query($con,$ins_query) or die(mysql_error());


$update1="update irefferal set cstatus='Closed' where pmrn='$pmrn' and eid='$eid' and infusion='$full' and cstatus='Active'";
mysqli_query($con,$update1) or die(mysql_error());
}


else 
	
	{
		
		echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Session is closed .. pls login again"); ';
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
    max-width: 1800px;
  }

}
      </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




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
function confirm_click()
{
return confirm("Are you Sure to Add Inpatient Visit ?");
}

</script>
<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add ICU Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Add Emergency Visit ?");
}

</script>


<script type="text/javascript">
function confirm_click3()
{
return confirm("Are you Sure to Add After Office Hour Visit ?");
}

</script>

<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='idocdetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
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
<h1 align="center"style="background-color:lightgreen;">INPATIENT PROGRESS NOTE </h1>
<!-- Form Title -->

        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data["adoc"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="3"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="2"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="7"><label><strong>Patient's Name:</strong></label></td>
						
						<td colspan="1"><label><strong>Age:</strong></label></td>
						<td colspan="2"><label><strong>Admission Date:</strong></label></td>
						<td colspan="1"><label><strong>Gender:</strong></label></td>
						<td colspan="1"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="2"><label><strong>Bed No:</strong></label></td>		
						
						
						</tr>

<tr>				<td colspan="3"><?php echo $data["pmrn"]; ?></td>
				<td colspan="2"><?php echo $data["eid"]; ?> </td>
					 <td colspan="7"><?php echo $data["pname"]; ?></td>
<td colspan="1"><?php echo $data["age"]; ?></td>  
             		<td colspan="2"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="1"><?php echo $data["gender"]; ?></td>
					 <td colspan="1"><?php echo $data["pphone"]; ?></td>  
				<td colspan="2"><?php echo $data["room"]; ?></td>  
				<td colspan="2"><?php echo $data["room1"]; ?></td>  
					 
					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>


		<tr>
						
						
						</tr>
						
						

						
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>PROGRESS NOTE</strong></label></td> </tr>

<td colspan="2" align="center"><label><strong>Time</strong></label></td> 

<td colspan="5" align="center"><label><strong>Visit Type / Procedure</strong></label></td> 
<td colspan="8" align="center"><label><strong>Progress Note</strong></label></td> 
<td colspan="3" align="center"><label><strong>Investigation/Treatment Plan</strong></label></td>

<td colspan="2" align="center"><label><strong>Charge</strong></label></td></tr>
<tr>

<td colspan="2" align="center"><select name="infu"  value="" required>
<option value="">-Select Time-</option>
<option value="00:00">00:00</option>
<option value="00:10">00:10</option>
<option value="00:20">00:20</option>
<option value="00:30">00:30</option>
<option value="00:40">00:40</option>
<option value="00:50">00:50</option>
<option value="01:00">01:00</option>
<option value="01:10">01:10</option>
<option value="01:20">01:20</option>
<option value="01:30">01:30</option>
<option value="01:40">01:40</option>
<option value="01:50">01:50</option>
<option value="02:00">02:00</option>
<option value="02:10">02:10</option>
<option value="02:20">02:20</option>
<option value="02:30">02:30</option>
<option value="02:40">02:40</option>
<option value="02:50">02:50</option>
<option value="03:00">03:00</option>
<option value="03:10">03:10</option>
<option value="03:20">03:20</option>
<option value="03:30">03:30</option>
<option value="03:40">03:40</option>
<option value="03:50">03:50</option>
<option value="04:00">04:00</option>
<option value="04:10">04:10</option>
<option value="04:20">04:20</option>
<option value="04:30">04:30</option>
<option value="04:40">04:40</option>
<option value="04:50">04:50</option>
<option value="05:00">05:00</option>
<option value="05:10">05:10</option>
<option value="05:20">05:20</option>
<option value="05:30">05:30</option>
<option value="05:40">05:40</option>
<option value="05:50">05:50</option>
<option value="06:00">06:00</option>
<option value="06:10">06:10</option>
<option value="06:20">06:20</option>
<option value="06:30">06:30</option>
<option value="06:40">06:40</option>
<option value="06:50">06:50</option>
<option value="07:00">07:00</option>
<option value="07:10">07:10</option>
<option value="07:20">07:20</option>
<option value="07:30">07:30</option>
<option value="07:40">07:40</option>
<option value="07:50">07:50</option>
<option value="08:00">08:00</option>
<option value="08:10">08:10</option>
<option value="08:20">08:20</option>
<option value="08:30">08:30</option>
<option value="08:40">08:40</option>
<option value="08:50">08:50</option>
<option value="08:00">08:00</option>
<option value="09:00">09:00</option>
<option value="09:10">09:10</option>
<option value="09:20">09:20</option>
<option value="09:30">09:30</option>
<option value="09:40">09:40</option>
<option value="09:50">09:50</option>
<option value="10:00">10:00</option>
<option value="10:10">10:10</option>
<option value="10:20">10:20</option>
<option value="10:30">10:30</option>
<option value="10:40">10:40</option>
<option value="10:50">10:50</option>
<option value="11:00">11:00</option>
<option value="11:10">11:10</option>
<option value="11:20">11:20</option>
<option value="11:30">11:30</option>
<option value="11:40">11:40</option>
<option value="11:50">11:50</option>
<option value="12:00">12:00</option>
<option value="12:10">12:10</option>
<option value="12:20">12:20</option>
<option value="12:30">12:30</option>
<option value="12:40">12:40</option>
<option value="12:50">12:50</option>
<option value="13:00">13:00</option>
<option value="13:10">13:10</option>
<option value="13:20">13:20</option>
<option value="13:30">13:30</option>
<option value="13:40">13:40</option>
<option value="13:50">13:50</option>
<option value="14:00">14:00</option>
<option value="14:10">14:10</option>
<option value="14:20">14:20</option>
<option value="14:30">14:30</option>
<option value="14:40">14:40</option>
<option value="14:50">14:50</option>
<option value="15:00">15:00</option>
<option value="15:10">15:10</option>
<option value="15:20">15:20</option>
<option value="15:30">15:30</option>
<option value="15:40">15:40</option>
<option value="15:50">15:50</option>
<option value="16:00">16:00</option>
<option value="16:10">16:10</option>
<option value="16:20">16:20</option>
<option value="16:30">16:30</option>
<option value="16:40">16:40</option>
<option value="16:50">16:50</option>
<option value="17:00">17:00</option>
<option value="17:10">17:10</option>
<option value="17:20">17:20</option>
<option value="17:30">17:30</option>
<option value="17:40">17:40</option>
<option value="17:50">17:50</option>
<option value="18:00">18:00</option>
<option value="18:10">18:10</option>
<option value="18:20">18:20</option>
<option value="18:30">18:30</option>
<option value="18:40">18:40</option>
<option value="18:50">18:50</option>
<option value="19:00">19:00</option>
<option value="19:10">19:10</option>
<option value="19:20">19:20</option>
<option value="19:30">19:30</option>
<option value="19:40">19:40</option>
<option value="19:50">19:50</option>
<option value="20:00">20:00</option>
<option value="20:10">20:10</option>
<option value="20:20">20:20</option>
<option value="20:30">20:30</option>
<option value="20:40">20:40</option>
<option value="20:50">20:50</option>
<option value="21:00">21:00</option>
<option value="21:10">21:10</option>
<option value="21:20">21:20</option>
<option value="21:30">21:30</option>
<option value="21:40">21:40</option>
<option value="21:50">21:50</option>
<option value="22:00">22:00</option>
<option value="22:10">22:10</option>
<option value="22:20">22:20</option>
<option value="22:30">22:30</option>
<option value="22:40">22:40</option>
<option value="22:50">22:50</option>
<option value="23:00">23:00</option>
<option value="23:10">23:10</option>
<option value="23:20">23:20</option>
<option value="23:30">23:30</option>
<option value="23:40">23:40</option>
<option value="23:50">23:50</option>

</select>

</td>



<td colspan="5">

<input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='vtype' required>

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `privilege` where dname='common' and status='Approved'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>
        <?php } ?>
        <?php
            require('db1.php');
            $uname = '';
            $query = "select * from `privilege` where dname='$full' and status='Approved'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>
        <?php } ?>
    </datalist>
	
	</td>

						
						<td colspan="8"><textarea name="pnote" id="sformat" class="form-control action" cols="30" rows="10"></textarea></td>
						
						  <script>
                                                    CKEDITOR.replace( 'sformat' );
													
                                                </script>
<td colspan="3"><textarea name="inves" id="porder" class="form-control action" cols="30" rows="10"required></textarea></td>

 <script>
                                                    CKEDITOR.replace( 'porder' );
													
                                                </script>


						<td colspan="2" ><input type="text" name="charge" id="charge" required value="" readonly></td>
</tr>

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Note By</strong></td>
      <td colspan="1" align="center"><strong>Date </strong></td>
      
      <td colspan="2" align="center"><strong>Note's Time</strong></td>
	  <td colspan="4" align="center"><strong>Progress Note</strong></td>
	  <td colspan="4" align="center"><strong>Investigation/Treatment Plan</strong></td>
<td colspan="1" align="center"><strong>Charge </strong></td>
<td colspan="1" align="center"><strong>V.Type </strong></td>
<td colspan="1" align="center"><strong>Edit </strong></td>
	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from ecnote where pmrn= '$pmrn' and eid='$emerid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"style='font-weight:bold;color:red;font-size:12px;'><?php echo $count; ?></td>
      <td align="center"colspan="1"style='font-weight:bold;color:red;font-size:12px;'><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"style='font-weight:bold;color:red;font-size:12px;'><?php echo $row["dname"]; ?></td>
	  <td align="center"colspan="1"style='font-weight:bold;color:red;font-size:12px;'><?php echo $row["odate"]; ?></td>  
      
	  <td align="center"colspan="2"style='font-weight:bold;color:red;font-size:12px;'><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="4"style='font-weight:bold;color:red;font-size:12px;'><?php echo $row["pnote"]; ?></td>
      <td align="center"colspan="4"style='font-weight:bold;color:red;font-size:12px;'><?php echo $row["inves"]; ?></td>  
	  <td align="center"colspan="1"style='font-weight:bold;color:red;font-size:12px;'><?php echo $row["visit"]; ?></td>  
	  <td align="center"colspan="1"style='font-weight:bold;color:red;font-size:12px;'><?php echo $row["vtype"]; ?></td>  
	  <?php 
	  $id=$row["id"];
	  $user7=$row["user"];
	  $url7 = "idoccnoteedit?pmrn=$pmrn&eid=$eid&id=$id"; 
	  
	  if($user7==$full){echo"
	  <td colspan='1' align='center'><a href='$url7'>Edit</a></td>
	  ";} else{echo"<td colspan='1'></td>";}?>	
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

//$count=1;
$sel_query="Select * from icnote where pmrn= '$pmrn' and eid='$episode' and ugroup='Doctor' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
      
	  <td align="center"colspan="2"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="4" ><?php echo $row["pnote"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["inves"]; ?></td>  
	  <td align="center"colspan="1"><?php echo $row["charge"]; ?></td>  
	  <td align="center"colspan="1"><?php echo $row["vtype"]; ?></td>  
	  <?php 
	  $id=$row["id"];
	  $user7=$row["user"];
	  $url7 = "idoccnoteedit?pmrn=$pmrn&eid=$eid&id=$id"; 
	  
	  if($user7==$full){echo"
	  <td colspan='1' align='center'><a href='$url7'>Edit</a></td>
	  ";} else{echo"<td colspan='1'></td>";}?>	
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
</table>
</form>

<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("sformat").value = "";

				document.getElementById("charge").value = "";
				document.getElementById("porder").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("sformat").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"charge").value = myObj[1];
							
							document.getElementById(
							"porder").value = myObj[2];
							
							
							CKEDITOR.instances["sformat"].setData(myObj[0]);
							CKEDITOR.instances["porder"].setData(myObj[2]);
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "pro_charge.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
</body>

</html>


