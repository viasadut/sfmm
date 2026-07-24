<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','imo','mofficer','nurse','diet','physio','mng','qc','ddf','call','ot','moopd','billin','bill','staff','call','clinicalet','clinicalcardio','clinicalmedi','clinicalgp','clinical','mrd','rad','spd','cath')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php  


//$name=$_POST['data'];
//$query59 = mysqli_query($connect,"select * from medicine where mname='name'");
//$data59 = mysqli_fetch_assoc($query59);
 
 
 
 ?>  

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];

//include("auth.php");

  
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
$odate = date('m/d/Y H:i:s');
$infu = $_REQUEST['infu'];
$remarks = $_REQUEST['remarks'];


$ins_query="insert into iinves (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`) values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$infu','$user','$remarks')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    

  
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
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>
  
          <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  







<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnewnurse'><span>Home</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<h1 align="center"style="background-color:lightgreen;">Patient Covid Test Record</h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  




<tr>
      <th width="4%"><strong>SNO</strong></th>
	  <th width="4%"><strong>ID</strong></th>
	  <th width="4%"><strong>Lab ID</strong></th>
      <th width="17%"><strong>Name</strong></th>
      <th width="10%"><strong>Collection Date</strong></th>
	  <th width="10%"><strong>Test Center</strong></th>
      <th width="15%"><strong>Phone</strong>
       
      <th width="14%"><strong>Address</strong>
	  <th width="14%"><strong>Ward</strong>
	  <th width="14%"><strong>District</strong>
      <th width="14%"><strong>Sample Type</strong>
	  <th width="14%"><strong>Patient Type</strong>
	  <th width="14%"><strong>Bill Status</strong>
	  <th width="14%"><strong>Receive Status</strong>
	  <th width="14%"><strong>Result</strong>
	  <th width="14%"><strong>Result By</strong>
		  

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$sdate=date('Y-m-d');

$count=1;
$sel_query="Select * from covidopd where pmrn= '$pmrn' order by `id` desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

        <td align="center"><?php echo $count; ?></td>
      
	  <td align="center"><?php echo $row["sid"]; ?></td>
	  <td align="center"><?php echo $row["lid"]; ?></td>
      <td align="center"><?php echo $row["name"]; ?></td>
      <td align="center"><?php echo $row["ssent"]; ?>
	  <td align="center"><?php echo $row["sentto"]; ?>
      <td align="center"><?php echo $row["phone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["padd"];?> 
<td align="center"><?php echo $row["ward"]; ?>  </td>
<td align="center"><?php echo $row["district"]; ?>  </td>
<td align="center"><?php echo $row["sam"]; ?>  </td>
<td align="center"><?php echo $row["tp"]; ?>  </td>
<td align="center"><?php echo $row["bstatus"]; ?>  </td>
<td align="center"><?php echo $row["lstatus"]; ?>  </td>
<?php
$tt=$row['tresult'];
$dcom=$row['dconfirm'];
?>
<td align="center"><?php if($tt=='P'){echo "<span style='color:red;text-align:center;'><b>$tt"; }else {echo "<span style='color:green;text-align:center;'><b>$tt";} ?>  </td>
<td align="center"><?php if($tt==''){echo "<span style='color:blue;text-align:center;'><b>Result Pending"; } else if($dcom=='' and $tt!=''){echo "<span style='color:red;text-align:center;'><b>Updated By Technologist"; }else {echo "<span style='color:green;text-align:center;'><b>Confirmed By Consultant";} ?>  </td>	  	
	  
      </tr>
    <?php $count++; } ?>
</table>
</form>

</body>

 
 
</html>
