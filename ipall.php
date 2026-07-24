<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','doctor','oic')"; 
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

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from ipres where pmrn='$pmrn' and discharge=''");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and eid='$eid'");
$data59 = mysqli_fetch_assoc($query59);

  
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
$eid = $_REQUEST['eid'];
$padd = $_REQUEST['padd'];
$adm = $_REQUEST['adm'];
$pphone=$_REQUEST['pphone'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$room = $_REQUEST['room'];
$bed = $_REQUEST['bed'];
$odate = $_REQUEST['odate'];
$otime = $_REQUEST['otime'];
$infu = $_REQUEST['infu'];
$ddate = $_REQUEST['ddate'];
$dtime = $_REQUEST['dtime'];


$ins_query="insert into inves (`dname`,`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`room`,`bed`,`odate`,`otime`,`ddate`,`dtime`,`infusion`) values ('$dname', '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$room','$bed','$odate','$otime','$ddate','$dtime','$infu')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Emergency Details</title>
  
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

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
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
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
 

<script src="script.js"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
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
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">PATIENT DETAILS TREATMENT SUMMARY </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>medex.com.bd<b></a></td></tr>
<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>"><b>SURGERY NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolink?pmrn=<?php echo "$pmrn"; ?>"><b>CARDIOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="opdprocedurenote?pmrn=<?php echo "$pmrn"; ?>"><b>OPD PROCEDURE NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="historeportdoc?pmrn=<?php echo "$pmrn"; ?>"><b>HISTOPATHOLOGY REPORT<b></a></td></tr>		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><?php echo $data["adoc"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="7"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="7"><?php echo $data["pmrn"]; ?> </td>
				<td colspan="3"><?php echo $data["eid"]; ?> </td>
					 <td colspan="10"><?php echo $data["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="2"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["age"]; ?> </td>  
             		<td colspan="5"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  

			    	 <td colspan="2"><?php echo $data["room"]; ?></td>  
					 <td colspan="2"><?php echo $data["room1"]; ?></td>  
					 </tr>

						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Patient's Details Treatment Summary</strong></label></td> </tr>
<tr colspan="20"><td></td></tr>
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label style="color:red;font-weight:bold;"><strong>Discharge Diagnosis</strong></label></td> </tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="4" align="center"><strong>MRN</strong></td>
      <td colspan="5" align="center"><strong>Date </strong></td>
      <td colspan="5" align="center"><strong>Score</strong></td>
	  
      <td colspan="5" align="center"><strong>Done By</strong></td>   
	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$eid=$data["eid"];

$count=1;
$sel_query100="Select * from diap where pmrn= '$pmrn' and eid='$eid'order by `id` DESC LIMIT 1;";

$result100 = mysqli_query($con,$sel_query100);

while($row100 = mysqli_fetch_assoc($result100)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="center"colspan="4"><?php echo $row100["pmrn"]; ?></td>
	  
	  <td align="center"colspan="5"><?php echo $row100["odate"]; ?></td>
    <td align="center"colspan="5"><?php echo $row100["inves"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row100["user"]; ?></td>  
      
  	  

	  
      </tr>
    <?php $count++; } ?>



<tr><td colspan="20" align="center"bgcolor="lightgreen"><label style="color:red;font-weight:bold;"><strong>Fall Risk Assessment Records</strong></label></td> </tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="4" align="center"><strong>MRN</strong></td>
      <td colspan="5" align="center"><strong>Date </strong></td>
      <td colspan="5" align="center"><strong>Score</strong></td>
	  
      <td colspan="5" align="center"><strong>Done By</strong></td>   
	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$eid=$data["eid"];

$count=1;
$sel_query100="Select * from frisk where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result100 = mysqli_query($con,$sel_query100);

while($row100 = mysqli_fetch_assoc($result100)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="center"colspan="4"><?php echo $row100["pmrn"]; ?></td>
	  
	  <td align="center"colspan="5"><?php echo $row100["date"]; ?></td>
    <td align="center"colspan="5"><?php echo $row100["fscore"]; ?></td>  
      <td align="center"colspan="5"><?php echo $row100["udone"]; ?></td>  
      
  	  

	  
      </tr>
    <?php $count++; } ?>

	
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Infusion Used</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="3" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Order Date </strong></td>
      
      <td colspan="3" align="center"><strong>Infusion</strong></td>
	  <td colspan="4" align="center"><strong>Done Date</strong></td>

	  	  <td colspan="4" align="center"><strong>Done By</strong></td>
<td colspan="2" align="center"><strong>Coution</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
$sel_query104="Select * from iinfusion where pmrn= '$pmrn'and eid='$episode' order by `ddate` DESC;";

$result104 = mysqli_query($con,$sel_query104);

while($row104 = mysqli_fetch_assoc($result104)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="3"><?php echo $row104["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row104["pmrn"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row104["odate"]; ?></td>  
      <td align="center"colspan="3"><?php echo $row104["infusion"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row104["ddate"]; ?></td>  

	  <td align="center"colspan="4"><?php echo $row104["duser"]; ?></td>
  	  <td align="center"colspan="2"<?php if($row104['alert']== "H. Alert"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row104['alert'];?></td>
		<td align="center"colspan="1"><?php echo $row104["uprice"]; ?></td>

		
	  
      </tr>
    <?php $count++; } ?>
	<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle, "sfmmkpjnew") 
  or die("Could not select examples");

	  $query198as = "SELECT SUM(uprice) FROM iinfusion where pmrn= '$pmrn' and eid='$eid' and duser !='' "; 
	 
$result198as = mysqli_query($dbhandle,$query198as) or die(mysqli_error());

// Print out result
$row198as = mysqli_fetch_array($result198as);
$test1ai=$row198as['SUM(uprice)'];

?>	  
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Infusion Charge is:<?php echo $test1ai;?> (BDT)</strong></td></tr>
	
	<tr><td colspan="20" align="center" bgcolor="skyblue"><label><strong>Stat Medicine Used</strong></label></td> </tr>
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="3" align="center"><strong>Order Date </strong></td>
     <td colspan="4" align="center"><strong>Done Date</strong></td>
      <td colspan="2" align="center"><strong>Done Time</strong></td>
       <td colspan="5" align="center"><strong>Stat Medication</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
$sel_query105="Select * from istat where pmrn= '$pmrn'and eid='$episode' order by `id` DESC;";

$result105 = mysqli_query($con,$sel_query105);

while($row105 = mysqli_fetch_assoc($result105)) 
{ ?>    
<tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row105["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row105["pmrn"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row105["odate"]; ?></td>  
      <td align="center"colspan="4"><?php echo $row105["ddate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row105["dtime"]; ?></td>
  	  <td align="center"colspan="5"><?php echo $row105["infusion"]; ?></td>
	  

	  
      </tr>
    <?php $count++; } ?>
	
	
<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Medicine Used</strong></label></td> </tr>
	
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="2" align="center"><strong>Order Time</strong></td>
        
      <td colspan="3" align="center"><strong>Medication</strong></td>   
	  <td colspan="2" align="center"><strong>Route</strong></td>
      <td colspan="2" align="center"><strong>Status</strong></td>
      <td colspan="2" align="center"><strong>User Done</strong></td>
	  <td colspan="2" align="center"><strong>Done time</strong></td>
	  <td colspan="4" align="center"><strong>Caution</strong></td>
	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='' order by `time` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["root"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["status"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["udone"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["uprice"]; ?></td>

	  
	  <td align="center"colspan="2"><?php echo $row["donet"]; ?></td>
	  <td align="center"colspan="4"<?php if($row['alert']== "H. Medi"): ?> style="background-color:RED;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
  	  


      </tr>
    <?php $count++; } ?>
<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198ad = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='' and reuse=''"; 
	 
$result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());

// Print out result
$row198ad = mysqli_fetch_array($result198ad);
$test1am=	$row198ad['SUM(uprice)'];

?>	  
	
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Medicine Charge is:<?php echo $test1am;?> (BDT)</strong></td></tr>
	
	<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Special Treatment</strong></label></td> </tr>
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="3" align="center"><strong>Order Date </strong></td>
 
      <td colspan="4" align="center"><strong>Done Date</strong></td>
      <td colspan="3" align="center"><strong>Special Treatment</strong></td>
	  <td colspan="2" align="center"><strong>Done By</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from istret where pmrn= '$pmrn' and eid='$episode'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="4"><?php echo $row["ddate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Done (LAB)</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="4" align="center"><strong>Done Date</strong></td>
	  <td colspan="2" align="center"><strong>Result</strong></td>
       	  <td colspan="2" align="center"><strong>Done By</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$episode' and type='lab'  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
			
		
			
      <td align="center"colspan="4"><?php echo $row["ddate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["otime"]; ?></td>
	  	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
  	  
  
      </tr>
    <?php $count++; } ?>	
	<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type='lab'"; 
	 
$result198af = mysqli_query($dbhandle,$query198af) or die(mysql_error());

// Print out result
$row198af = mysqli_fetch_array($result198af);
$test1al=	$row198af['SUM(price)'];

?>	  
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Lab Charge is:<?php echo $test1al;?> (BDT)</strong></td></tr>

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Done (Radiology)</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="2" align="center"><strong>Status</strong></td>
	  <td colspan="2" align="center"><strong>Result</strong></td>
       	  <td colspan="2" align="center"><strong>Done By</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$episode' and type='rad' and status='RECEIVED' order by `id`  DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["status"]; ?></td>  
	  
	  
	  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["otime"]; ?></td>
	  	  
		  <td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>
  	  
  
      </tr>
    <?php $count++; } ?>	
	<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198ag = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type='rad'"; 
	 
$result198ag = mysqli_query($dbhandle,$query198ag) or die(mysql_error());

// Print out result
$row198ag = mysqli_fetch_array($result198ag);
$test1a1=	$row198ag['SUM(price)'];

?>	  
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Radiology Charge is:<?php echo $test1a1;?> (BDT)</strong></td></tr>


<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Done (SPD)</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Performed By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="4" align="center"><strong>Status</strong></td>
	  <td colspan="2" align="center"><strong>Result</strong></td>
       	  <td colspan="2" align="center"><strong>Done By</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type in('spd','spd1','ANJAN OPD ( ENT)','SPD') and status in ('RECEIVED','SEEN') order by `id`  DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["per_doc"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  
	  
	  
	  <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["status"]; ?></td> 
	  
      
<td align="center"colspan="2"><?php echo $row["price"]; ?></td>	  
	  <td align="center"colspan="2"><?php echo $row["otime"]; ?></td>
	  	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
  	  
  
      </tr>
    <?php $count++; } ?>	
	
	<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198ah = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN') and type in('spd','spd1','ANJAN OPD ( ENT)','SPD')"; 
	 
$result198ah = mysqli_query($dbhandle,$query198ah) or die(mysql_error());

// Print out result
$row198ah = mysqli_fetch_array($result198ah);
$test1as=	$row198ah['SUM(price)'];

?>	  
	
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total SPD Charge is:<?php echo $test1as;?> (BDT)</strong></td></tr>
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Hospital Charges</strong></label></td> </tr>

 <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     <td colspan="2" align="center"><strong>Date</strong></td>
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>ITEM</strong></td>
      	  <td colspan="2" align="center"><strong>QTY</strong></td>
		  <td colspan="3" align="center"><strong>Price</strong></td>
	
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from inhoscharge where pmrn= '$pmrn' and eid='$eid'order by `date` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
<td align="center"colspan="2"><?php echo $row["date"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
			
			<?php
						
						$rrt=$row['code'];
						$query4p = mysqli_query($db,"select * from storenew where eid='$rrt'");
						$datap = mysqli_fetch_assoc($query4p);
						$uom=$datap['uom'];

						
						?>
			
			
			
				        <td align="center"colspan="5"><?php echo $row["pdos"].' ('.$uom.')'; ?></td>
						<td align="center"colspan="3"><?php echo $row["price"]; ?></td>
						
			      
	

  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
	<tr>
	
	
	<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198 = "SELECT SUM(price) FROM inhoscharge where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];



	?>
	
	<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Hospital Charge is:<?php echo $test1;?> (BDT)</strong></td></tr>
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Referral Doctor List</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="8" align="center"><strong>Referred By</strong></td>
      <td colspan="3" align="center"><strong>Referral Date  </strong></td>
      <td colspan="3" align="center"><strong>Referred To</strong></td>
      <td colspan="2" align="center"><strong>Referral Mode</strong></td>  
	  <td colspan="2" align="center"><strong>Referral Type</strong></td>   
      

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from irefferal where pmrn= '$pmrn' and eid='$episode'  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="8"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
<td align="center"colspan="2"><?php echo $row["bed"]; ?></td>	  
      <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
      
  
      </tr>
    <?php $count++; } ?>
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Visited Doctor List</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Entry By</strong></td>
      <td colspan="4" align="center"><strong>Visited Date </strong></td>
      <td colspan="4" align="center"><strong>Visited By</strong></td>
      <td colspan="2" align="center"><strong>Charge</strong></td>   
      <td colspan="4" align="center"><strong>Visit Type</strong></td>   

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from icnote where pmrn= '$pmrn' and eid='$episode' and ugroup ='Doctor'  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="4"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["charge"]; ?></td>
			<td align="center"colspan="4"><?php echo $row["vtype"]; ?></td>
			

      
  
      </tr>
    <?php $count++; } ?>

				<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198j = "SELECT SUM(charge) FROM icnote where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198j = mysqli_query($dbhandle,$query198j) or die(mysql_error());

// Print out result
$row198j = mysqli_fetch_array($result198j);
$test1c=	$row198j['SUM(charge)'];



	?>
	
	<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Doctor Charge is:<?php echo $test1c;?> (BDT)</strong></td></tr>
		<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>OT LIST</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Doctor Name</strong></td>
      <td colspan="4" align="center"><strong>Booking Date</strong></td>
      <td colspan="4" align="center"><strong>Procedure</strong></td>
      

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from ot where pmrn= '$pmrn' and eid='$episode' and status='Received'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["dname"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["bookingdt"]; ?></td>  
	  <td align="center"colspan="4"><?php echo $row["proce"].''.$row["Otherins"]; ?></td>
	        
      
  
      </tr>
    <?php }

	
$ot_id=$data59['id'];
	

$count=1;
$sel_query="Select * from otivisitendo where pmrn= '$pmrn' and eid='$ot_id' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["vtype"]; ?></td>  
	  <td align="center"colspan="4"><?php echo $row["odate"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["room"]; ?></td>
	        
      
  
      </tr>
    <?php $count++; } ?>

					<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$ot_id=$data59['id'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198jot = "SELECT SUM(room) FROM otivisitendo where pmrn= '$pmrn' and eid='$ot_id'"; 
	 
$result198jot = mysqli_query($dbhandle,$query198jot) or die(mysql_error());

// Print out result
$row198jot = mysqli_fetch_array($result198jot);
$test1cot=	$row198jot['SUM(room)'];



	?>

<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Consultant OT Charge is:<?php echo $test1cot;?> (BDT)</strong></td></tr>	


<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Grand Total is:<?php echo $test1c+$test1+$test1as+$test1a1+$test1al+$test1ai+$test1am+$test1cot;?> (BDT)</strong></td></tr>	
</table>
</form>
</body>

</html>
