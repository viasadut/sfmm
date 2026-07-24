<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','mng','ot','endo','imo','mofficer','nurse','emergency')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];

$query11 = "SELECT * FROM inpatient where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result11 = mysqli_query($con, $query11) or die(mysqli_error());


$row1 = mysqli_fetch_array($result11);
$pname2=$row1['pname'];



$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());


$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];




$query = "SELECT * FROM mc_report_format where id= '$id'"; 
	 
$result = mysqli_query($con, $query) or die(mysqli_error());


$row = mysqli_fetch_array($result);


$query1 = "SELECT * FROM ot where pmrn= '$pmrn' and eid='$eid' order by id desc"; 
	 
$result1 = mysqli_query($con, $query1) or die(mysqli_error());


$row11 = mysqli_fetch_array($result1);


$pname=$row11['pname'];
$pmrn=$row11['pmrn'];
$sname=$row11['dname'];
$eid=$row11['id'];
$proce=$row11['proce'];

$cname=$row['type'];



  
?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{


$consent=$_REQUEST['consent'];
$time= date('Y-m-d H:i:s');

$pmrn1=$_REQUEST['pmrn'];
$eid1=$_REQUEST['eid'];


//$url = "p4new1.php?pmrn=$pmrn&eid=$count1&dname=$full"; 
$date_d= date('Y-m-d');



$q = "SELECT COUNT(id) FROM all_consent_print where pmrn= '$pmrn' and eid='$eid' and cname='$cname'"; 
	 
$r = mysqli_query($con, $q) or die(mysqli_error());


$r = mysqli_fetch_array($r);
$cc = $r['COUNT(id)'];

if($cc==0)

{

    $servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";

// Create connection
$conn = new mysqli($servername, $username1, $password1, $dbname1);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//$sql = "insert into all_consent_print (`pmrn`,`pname`,`sname`,`eid`,`proce`,`iby`,`time`,`consent`,`cname`) 
//values ('$pmrn1', '$pname2','$sname','$eid1','$proce','$user','$time','$consent','$cname')";

$sql = "insert into all_consent_print (`pmrn`,`pname`,`sname`,`eid`,`proce`,`iby`,`time`,`consent`,`cname`,`date`) 
values ('$pmrn1', '$pname2','$sname','$eid1','$proce','$user','$time','$consent','$cname','$date_d')";


if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
  

$url = "consent_format_view_ns?pmrn=$pmrn1&eid=$eid1&cname=$cname&id=$last_id";
header("Location: $url");

}


else 

{

$ins_query_format="update all_consent_print set `consent`='$consent' where pmrn='$pmrn' and eid='$eid' and cname='$cname'";
mysqli_query($con,$ins_query_format);

$url = "consent_format_view_ns?pmrn=$pmrn1&eid=$eid1&cname=$cname&id=$last_id";
header("Location: $url");


}

  
  $conn->close();
  

}



}


?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DID REPORT</title>
  
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
<script src="ckeditor/samples/js/sample.js"></script></head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='rad_report_outside2'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Consent Form Template</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
	

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}" autocomplete="on">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr><td colspan="20" style="font-size:18px;color:green;"><label><strong> Surgeon's Name : <?php echo $row11['dname'];?></strong></label></td></tr>
				<tr>
				
				<td colspan="10" style="font-size:18px;color:green;"><label><strong> Patient's Name : <?php echo $row1['pname'];?></strong></label></td>
				<td colspan="10" style="font-size:18px;color:green;"><label><strong> Patient's MRN : <?php echo $row1['pmrn'];?></strong></label></td>
				
				</tr>
				<tr>
				
				<td colspan="20" style="font-size:18px;color:green;"><label><strong> Surgery's Name : <?php echo $row11['proce'];?></strong></label></td>
				
				
				</tr>
				
						
						
						
						
						<tr>
<td colspan="20">
	  <input type="text" id="pmrn" class="form-control action" list="categoryname"  name='vtype' placeholder='Edit Previous Template' style="background-color:gold;font-size:20px;color:red; font-weight:bold;" value="<?php echo $row['type'];?>" readonly>

   
	
	
</td>
</tr>	

						 <tr><td colspan="20"><label><strong>Details:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="charge" name="consent" rows="40" >
						 
						 <?php echo $row['inves'];?>
						 </textarea></td>  </tr>
						 
						 <script>
                                                    CKEDITOR.replace( 'charge',{
  height: 700,
  
  
 
 } );
													
                                                </script>
						
				
														


<tr>

				 
					 <script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
        var txtPassportNumber = document.getElementById("txtPassportNumber");
        txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
</script>
	 
	 		
		<td colspan="5"><button type="submit" name="Submit">Confirm</button></td>
	  
	  				
</tr>



</body>

</html>
