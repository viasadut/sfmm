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
//echo $count1;
//$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from cathreport where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
//$eid=$data['eid'];
//$iname=$data['infusion'];
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$page=$_REQUEST['page'];
$pgender=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

$pperform=$_REQUEST['pperform'];
$iprocedure=$_REQUEST['iprocedure'];
$tprocedure=$_REQUEST['tprocedure'];
$anti=$_REQUEST['anti'];
$pfind=$_REQUEST['pfind'];
$con=$_REQUEST['con'];
$plan=$_REQUEST['plan'];

$rdate= date('d/m/Y H:i:s');

$adate= date('m/d/Y');



$ins_query="insert into cathreport (`pname`,`eid`,`pmrn`,`pphone`,`pgender`,`page`,`pperform`,`iprocedure`,`tprocedure`,`anti`,`pfind`,`con`,`plan`,`rdate`,`adate`,`user`)
values ('$pname','$eid','$pmrn','$pphone','$pgender','$page','$pperform','$iprocedure','$tprocedure','$anti','$pfind','$con','$plan','$rdate','$adate','$user')";
mysqli_query($db,$ins_query) or die(mysql_error());


//$update="update iinves set resultstatus='UPDATED',resulttime='$adate',resultby='$user' where id='$id'";
//mysqli_query($con,$update) or die(mysql_error());



//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Report Saved Successfully")';
    echo '</script>';
} 

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
       <style>

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
  max-width: 2000px;
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
    max-width: 2000px;
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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>

</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>CATHLAB REPORT</h1>


        <table>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data['pname']?>"readonly/>
 	  

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
      <input name="psex" type="text" size="5"value="<?php echo $data['pgender']?>" readonly/>
														
						
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" readonly/>
      <input name="pphone" type="text" size="13" value="<?php echo $data['pphone']?>"  readonly/>	  
	  <input name="page" type="text" size="2"value="<?php echo $data['page']?>" readonly/>
      
	  <tr><td><strong>PROCEDURES PERFORMED:</strong></td>
      <td colspan="3" align="center"><?php echo $data['pperform']?></td></tr>
	  
	   <tr><td><strong>INDICATIONS FOR PROCEDURE:</strong></td>
      <td colspan="3" align="center"><?php echo $data['iprocedure']?></td></tr>
	  
	   <tr><td><strong>TECHNIQUE OF PROCEDURE:</strong></td>
      <td colspan="3" align="center"><?php echo $data['tprocedure']?></td></tr>
	  
	   <tr><td><strong>ANTICOAGULATION & OTHER MED :</strong></td>
      <td colspan="3" align="center"><?php echo $data['anti']?></td></tr>
	  
	   <tr><td><strong>PROCEDURE FINDINGS :</strong></td>
      <td colspan="3" align="center"><?php echo $data['pfind']?></td></tr>
	  
	   <tr><td><strong>CONCLUSIONS : </strong></td>
      <td align="center" value="<?php echo $data['con']?>"></td></tr>
	  
	   <tr><td><strong>PLAN :</strong></td>
      <td colspan="3" align="center"><?php echo $data['plan']?></td></tr>
	  
	   
	  
	 
	  
	  
  </table>


<table><tr><td colspan="15">		<button type="submit" name="Submit">EDIT</button></td>
<td colspan="10">		<a target='_blank' href="adm?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data4["adoc"]; ?>&adate=<?php echo $data4["adate"]; ?>&eid=<?php echo $count1; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>
