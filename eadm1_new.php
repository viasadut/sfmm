<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="billin"){
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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];

$query143 = "SELECT COUNT(pmrn) FROM emergency where pmrn= '$pmrn';"; 
$result143 = mysqli_query($con, $query143) or die(mysqli_error());
$row143 = mysqli_fetch_assoc($result143);
$count =$row143['COUNT(pmrn)'];
$eid = $count+1;

//include("auth.php");
//echo $count1;
 
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where ID='$id'");
$data59 = mysqli_fetch_assoc($query4);

$ttr=$data59['bdate'];

$te=date('d',strtotime($ttr));
$te1=date('m',strtotime($ttr));
$te2=date('Y',strtotime($ttr));
  
$query41 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and discharge=''");
$data41 = mysqli_fetch_assoc($query41);  

$adate2= date('Y-m-d');  
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
//$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$type=$_REQUEST['type'];
//$adate=$_REQUEST['adate'];

$padd=$_REQUEST['padd'];
$a_type=$_REQUEST['a_type'];

$adate= date('d/m/Y H:i:s');
$adate1= date('m/d/Y');





$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yy'];

//$fdate='$dd-$mm-$yy';


$date1=date_create("$dd-$mm-$yy");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");







if($data41=mysqli_num_rows($query41)>0)
	{
//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Patient already Admitted in Emergency"); ';
    echo '</script>';
} 
else if ($data41=mysqli_num_rows($query41)==0)

{
$ins_query="insert into emergency (`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`eid`,`pphone`,`user`,`adate1`,`adate2`,`yage`,`type`,`e_type`) values ('$pname','$pmrn','$padd','$psex','$diff1','$adate','$eid','$pphone','$user','$adate1','$adate2','$diff2','$type','$a_type')";
mysqli_query($con,$ins_query) or die(mysql_error());

/*$update1="update patient set bdate='$date91',type='$type' where `pmrn`='$pmrn'";
mysqli_query($con,$update1) or die(mysql_error());
*/

    echo '<script language="javascript">';
    echo 'alert("Admission Successful"); ';
    echo '</script>';
} 
else{
echo '<script language="javascript">';
    echo 'alert("Admission Not Successful"); ';
    echo '</script>';

}
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
  width: 25%;
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

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S ADMISSION EMERGENCY DEPT</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
            <label1 for="age" >
    <?php if($data59['remarks']=='Due'){echo'<strong><SPAN STYLE="font-size:18.0pt;color:red;">PAYMENT DUE</span> </strong>';}
      else if($data59['remarks']=='Partial Due'){echo'<strong><SPAN STYLE="font-size:18.0pt;color:red;">PARTIAL DUE</span> </strong>';}
      ?>
			</label1>	  <br>	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" value="<?php echo $data59['pname'];?>"required readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" value="<?php echo $data59['padd'];?>"required readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	<input name="psex" type="text" size="70" value="<?php echo $data59['psex'];?>"required readonly>
														
						</select>
            <input name="pmrn" type="text" size="15" value="<?php echo $data59['pmrn'];?>" placeholder="MRN" required readonly>
      <input name="pphone" type="text" size="13" value="<?php echo $data59['pphone'];?>" placeholder="Phone No" required readonly>	  

	  
	  
	  
	  
	  <br><br>
<label><strong>Date Of Birth(DD/MM/YYYY) :</strong></label>
<input name="dd" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te;}  ?>"required>	/

<input name="mm" type="text" maxlength="2" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te1;} ?>"required> /	

<input name="yy" type="text" maxlength="4" size="1" value="<?php if($ttr == 0000-00-00){echo '';} else {echo $te2;} ?>"required>		  
	  <br><br>

      
	<label for="age"><strong>Patient's Type :</strong></label>
	  	
            
	  	<select name="type" id="type"class="style1" placeholder="Patient Type"  required> 
		
		
		<option value="<?php echo $data59["type"]; ?>"><?php echo $data59["type"]; ?></option>
			<option value="General">General</option>;
			<option value="Staff">Staff</option>;
			<option value="Staff Spouse">Staff Spouse</option>;
			<option value="Staff Children">Staff Children</option>;
			<option value="Consultant">Consultant</option>;
			<option value="VIP">VIP</option>;
			<option value="Corporate">Corporate</option>;
			
				
      </select>  


      <label for="age"><strong>Admission's Type :</strong></label>
	  	
            
	  	<select name="a_type" id="a_type"class="style1" placeholder="Patient Type"  required> 
		
		
		
			<option value="">--Select--</option>
			<option value="0">Emergency</option>
			<option value="1">Procedure</option>
			
				
      </select>  
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<?php if($data59['remarks']!='Due'){echo'

<button type="submit" name="Submit">Confirm</button>
';}
?>
  </td>
<td colspan="10">		<a target='_blank' href="adm?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data4["adoc"]; ?>&adate=<?php echo $data4["adate"]; ?>&eid=<?php echo $count1; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>
