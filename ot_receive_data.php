<?php



session_start();
$role = $_SESSION['sess_userrole'];
if(!isset($_SESSION['sess_username']) || $role!="ot"){
  header('Location: login2?err=2');
}

require('db1.php');
$odate=date('m/d/Y');
$user=$_SESSION["sess_username"];
$pmrn = $_REQUEST['pmrn'];
$id = $_REQUEST['id'];

$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 10; URL=$url1");


//include("auth.php");
$cdate=date('d/m/Y');

$db = mysqli_connect('localhost','root','Godiloveu16');
	mysqli_select_db($db,'sfmmkpjnew');
	

	
$query60 = mysqli_query($db,"select COUNT(id),pname,pmrn,dname,proce,typeo,room,room1,date5,m_clearance,stime,etime,duration2 from ot where id='$id'");
$data60 = mysqli_fetch_assoc($query60);


  
?>


<?php
require('db1.php');
 //$fullname = $_SESSION['sess_username'];

$dt=date('Y-m-d');




?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['receive'])){
	//$odate = date('m/d/Y H:i:s');
	//$uname = $_REQUEST['uname'];
	
$url = "otpatientreceive?pmrn=$pmrn&id=$id";
header("Location: $url");
		//header("sad.php?pmrn='$p_mrn'&id='$ot_id';");
	}
	
		
	 if(isset($_POST['cancel'])){
		
		$url = "ot_receive_panel";
header("Location: $url");
  
  
	}
    
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>OT RECEIVE PANEL</title>
  
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
  background-color: #FA8072		;
  /*#4bc970*/
  font-size: 22px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 20%;
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
  
  img {
  border-radius: 50%;
  
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
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>




  <style type="text/css">

  
  .alert {
  
  background-color: #f44336;
  color: white;
  font-weight: bold;
  float: middle;
  font-size: 50px;
  
  line-height: 20px;
  text-align: center;
}


  
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
<script>
function goBack() {
    window.history.back();
}


</script>
</head>


<body>






  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post">
<?php if($data60['COUNT(id)']>0){echo "
<p style='color:red;font-size:25px;font-weight:bold;text-align:center;'>Patient's Details Information</p>
<table>
<tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Patiet Name:</td><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>".$data60['pname']."</span></td></tr>
<tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Patient MRN:</td><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>".$data60['pmrn']."</span></td></tr>
<tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Surgeon Name:</td><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>".$data60['dname']."</span></td></tr>
<tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Surgery Name:</td><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>".$data60['proce']."</span></td></tr>
<tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>OT Date:</td><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>".$data60['date5']."</span></td></tr>
<tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Start Time:</td><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>".$data60['stime']."</span></td></tr>
<tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>End Time:</td><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>".$data60['etime']."</span></td></tr>
<tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Duration:</td><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>".$data60['duration2']."</span></td></tr>

";}
?>

<tr><td colspan='20'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>
<?php if($data60['m_clearance']==''){

    echo "
    <tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Status:</td><td colspan='10'> <span style='font-size:25px;color:red;font-weight:bold;text-align:right'> Finance Clearance Not Done</span></td></tr>
   ";
}

else if($data60['m_clearance']!='' and $data60['stime']=='' and $data60['etime']==''){

    echo "
    <tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Status:</td><td colspan='10'> <span style='font-size:25px;color:red;font-weight:bold;text-align:right'> Finance Clearance Done but OT Time Not Set</span></td></tr>
   ";
}

else if($data60['m_clearance']!='' and $data60['stime']!='' and $data60['etime']!=''){

    echo "
    <tr><td colspan='10'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'>Status:</td><td colspan='10'> <span style='font-size:25px;color:green;font-weight:bold;text-align:right'> Clearance Done</span></td></tr>
   ";
}




?>
<?php 
if($data60['m_clearance']!='' and $data60['stime']!='' and $data60['etime']!=''){
    echo "<tr><td colspan='20'><span style='font-size:25px;color:green;font-weight:bold;text-align:right'><button type='submit' name='receive'>Receive</button>
    


<button type='submit' name='cancel'>Cancel</button></td>
</tr></table>";}
?>

<!-- Form Title -->
         

</form>
</body>

</html>
