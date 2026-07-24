<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
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
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];




$query43 = "SELECT COUNT(pmrn) FROM cathreport where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$eid = $count+1;


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');



$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data = mysqli_fetch_assoc($query4);


$query = "SELECT * from alltest where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$dnam= $row['dname'];
//$type3= $row['medi'];

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
$dname=$_REQUEST['dname'];
$rname=$_REQUEST['rname'];

$rdate= date('d/m/Y H:i:s');

$adate= date('m/d/Y');

$dtime= date('d/m/Y H:i:s');

$ins_query="insert into cathreport (`dname`,`rname`,`pname`,`eid`,`pmrn`,`pphone`,`pgender`,`page`,`pperform`,`iprocedure`,`tprocedure`,`anti`,`pfind`,`con`,`plan`,`rdate`,`adate`,`user`,`status1`,`type`,`location`,`date1`,`dtime`)
values ('$dname','$rname','$pname','$eid','$pmrn','$pphone','$pgender','$page','$pperform','$iprocedure','$tprocedure','$anti','$pfind','$con','$plan','$rdate','$adate','$user','Updated','CORONARY ANGIOGRAM','OPD','$dtime','$rdate')";
mysqli_query($db,$ins_query) or die(mysql_error());


//$update="update iinves set resultstatus='UPDATED',resulttime='$adate',resultby='$user' where id='$id'";
//mysqli_query($db,$update) or die(mysql_error());

$query90 = "UPDATE alltest set rby='$user',rtime='$dtime',status='RECEIVED' where id='$id'"; 
$result90 = mysqli_query($db,$query90) or die ( mysqli_error());

//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Report Saved Successfully")';
    echo '</script>';

	$url = "cathreportedit11?pmrn=$pmrn&eid=$eid";
header("Location: $url");
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
  width: 60%;
}
textarea {
  padding: 2px;
  height: 100px;
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
    max-width: 750px;
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


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
		<label for="age"><strong>Doctor's Name :</strong></label>
				<select name="dname" value="" required/>
			        <option></option>
					<option value='Dr. Mohammad Arifur Rahman'>Dr. Mohammad Arifur Rahman</option>
					<option value='Dr. Arif Mohammad Sohan'>Dr. Arif Mohammad Sohan</option>
					</select>
				
		<label for="age"><strong>Referral Doctor's Name :</strong></label>
				  
				
				<input type="text" size="70"name="rname"  required value="<?php echo $dnam;?>" readonly/>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data['pname']?>"required/>
 	  

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
      <input name="psex" type="text" size="5"value="<?php echo $data['psex']?>" required/>
														
						
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required/>
      <input name="pphone" type="text" size="13" value="<?php echo $data['pphone']?>"  required/>	  
	  <input name="page" type="text" size="2"value="<?php echo $data['page']?>" required/>
      
	  <label for="age"><strong>PROCEDURES PERFORMED:</strong></label>
      <td colspan="3" align="center"><textarea name="pperform"  value="" /></textarea></td>
	  
	   <label for="age"><strong>INDICATIONS FOR PROCEDURE:</strong></label>
      <td colspan="3" align="center"><textarea name="iprocedure"  value="" /></textarea></td>
	  
	   <label for="age"><strong>TECHNIQUE OF PROCEDURE:</strong></label>
      <td colspan="3" align="center"><textarea name="tprocedure"  value="" />i.	Diag.Catheter		: 
ii.	Diag. Wire		: 
iii.	Introducer Sheath	: 
</textarea></td>
	  
	   <label for="age"><strong>ANTICOAGULATION & OTHER MED :</strong></label>
      <td colspan="3" align="center"><textarea name="anti"  value="" /></textarea></td>
	  
	   <label for="age"><strong>PROCEDURE FINDINGS :</strong></label>
      <td colspan="3" align="center"><textarea name="pfind"  value="" />LM	-  
LAD	- 
LCx	- 
RCA- 
LIMA- 
</textarea></td>
	  
	   <label for="age"><strong>CONCLUSIONS : </strong></label>
      <td colspan="3" align="center"><textarea name="con"  value="" /></textarea></td>
	  
	   <label for="age"><strong>PLAN :</strong></label>
      <td colspan="3" align="center"><textarea name="plan"  value="" /></textarea></td>
	  
	   
	  
	 
	  
	  
  </fieldset>


<table><tr><td colspan="6">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="7">		<a target='_blank' href="cathreportpdf?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>

<td colspan="7">		<a target='_blank' href="cathimage?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>

</tr>



</table>

</form>
  


</body>

</html>
