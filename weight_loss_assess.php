<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff','imo','doctor','ot','endo','bill','nurse','bed','emergency','mofficer','call','diet','physio')"; 
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
//echo $count1;
$query39 = "SELECT * FROM user where uname= '$user'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];

$type = $_REQUEST['type'];
$pmrn = $_REQUEST['pmrn'];
$day = $_REQUEST['day'];
  
  
  $query = "SELECT * FROM weight_loss where pmrn= '$pmrn' and status='Active'"; 
$result = mysqli_query($con, $query) or die(mysqli_error());

// Print out result
$row = mysqli_fetch_array($result);
//$full=$row['fullname'];
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$details = $_REQUEST['details'];

$adate= date('Y-m-d h:i:s');

$adate1= date('Y-m-d');


//$url = "topicupload.php?eid=$count1";
	
	$ins_query1="insert into weight_loss_assess (`pmrn`,`type`,`day`,`assess_by`,`assess`,`assess_time`,`assess_date`) values 
	('$pmrn','$type','$day','$full','$details','$adate','$adate1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

	
	
	

//if ($con->query($ins_query) == TRUE) 
//{

	//header("Refresh: .1; URL=$url");
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
  width: 55%;
}
textarea {
  padding: 2px;
  height: 500px;
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

                  <script src="ckeditor_new/ckeditor.js"></script>
				  



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
		<h1><?php echo $type.'('.$day.')';?> </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
		
			
	  <label for="age"><strong><?php echo $type.'('.$day.')';?>:</strong></label>

									
                                    <div>
                                           <textarea name="details" class="form-control" placeholder="Details"rows="25"cols="25"></textarea>
                                               
										 
                                    </div>
                                </div>
								
								
  
  <script>
 CKEDITOR.replace( 'details', {
  height: 300,
  
  
  extraPlugins : 'filebrowser',
    filebrowserBrowseUrl:'browser.php?type=Images',
    filebrowserUploadMethod:"form",
    filebrowserUploadUrl: "upload_topic.php"
 });
</script>





  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td></table>
<td colspan="10">	




</form>
  
<form>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>Inpatient<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
	
	 <tr> <td colspan="1">S/NO</td>
	 <td colspan="4">MRN</td>
	 <td colspan="5">Patient Name</td>
	 <td colspan="3">Type</td>
	 <td colspan="4">Assessment</td>
	 <td colspan="2">Day</td>
	 <td colspan="1">Print</td>


	 </tr>
	
	<?php
	
	$sel_query2="Select * from weight_loss_assess where pmrn='$pmrn' and type='$type'order by type asc";
 

//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";
$count=1;

$result2 = mysqli_query($con,$sel_query2);

while($row2 = mysqli_fetch_assoc($result2)) 
{ ?>    <tr>

      <td align="left" colspan="1"><?php echo $count; ?></td>
      
      <td align="left" colspan="4"><?php echo $row2["pmrn"]; ?></td>
	  <td align="left" colspan="5"><?php echo $row["pname"]; ?></td>
      <td align="left" colspan="3"><?php echo $row2["type"]; ?></td>
	  <td align="left" colspan="4"><?php echo $row2["assess"]; ?></td>
	  <td align="left" colspan="2"><?php echo $row2["day"]; ?></td>
	  
        
	  <td align="left"colspan="1"><a target='_blank' href="weight_loss_print?pmrn=<?php echo "$pmrn"; ?>&type=<?php echo $type; ?>&id=<?php echo $row2["id"]; ?>&assess_by=<?php echo $row2['assess_by']; ?>"><img src="print.png" title="Print Report" width="40" height="40" /></a></td>
      </tr>
	  
    <?php $count++; }?>
	
	</table>
</form>
  

</body>

</html>