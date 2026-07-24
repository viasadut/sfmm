<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call','bill')"; 
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
//$full = $row39['fullname'];

//include("auth.php");
//echo $count1;

$ss=date('m/d/Y');

//$rd=date('m/d/Y',strtotime($_REQUEST["rd"]));
$pmrn1=$_REQUEST["pmrn"];


$gg = "SELECT * FROM inpatient where pmrn='$pmrn1'"; 
$hh = mysqli_query($con, $gg) or die(mysqli_error());
$ii = mysqli_fetch_array($hh);

$querymax = "SELECT max(sid) FROM covidopd"; 
$resultmax = mysqli_query($con, $querymax) or die(mysqli_error());
$rowmax = mysqli_fetch_array($resultmax);
$max=$rowmax['max(sid)']+1;

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$sid = $_REQUEST['sid'];

$name = $_REQUEST['name'];
$psex = $_REQUEST['psex'];
$page = $_REQUEST['page'];
$phone = $_REQUEST['phone'];
$result = $_REQUEST['result'];

$ssent = date('Y-m-d',strtotime($_REQUEST["ssent"]));
$ssent1 = date('d/m/Y',strtotime($_REQUEST["ssent"]));
$sentto = $_REQUEST['sentto'];

$adate= date('d/m/Y H:i:s');
$adate1= date('Y-m-d');






$pmrn=$_REQUEST['pmrn'];








$querymax1 = "SELECT max(sid) FROM covidopd"; 
$resultmax1 = mysqli_query($con, $querymax1) or die(mysqli_error());
$rowmax1 = mysqli_fetch_array($resultmax1);
$max1=$rowmax1['max(sid)']+1;

$queryt = "SELECT COUNT(sid) FROM covidopd where sid='$max1' and ssent='$adate1'"; 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_array($resultt);
$co=$rowt['COUNT(sid)'];



if($co>0)
	
	{
		
	 echo '<script language="javascript">';
    echo 'alert("Unsuccessful !! Patient Already Gave Sample for Today"); ';
    echo '</script>';
	
	}



else if($co<1)
{

$ins_query1="insert into covidopd (`sid`,`name`,`psex`,`page`,`phone`,`ssent`,`ssent1`,`sentto`,`aby`,`adate`,`udone`,`pmrn`,`tresult`,`rdate`,`rdate1`,`dconfirm`) values
 ('$max1','$name','$psex','$page','$phone','$ssent','$ssent1','$sentto','$adate','$user','$user','$pmrn','$result','$ssent','$ssent1','confirmed')";
	
	mysqli_query($con,$ins_query1) or die(mysql_error());
   echo '<script language="javascript">';
    echo 'alert("Entry Successful"); ';
    echo '</script>';

	
	$url = "allsamplelistcovid?dt=$rd1" ;
header("Location:$url");

}

else

	{
	 echo '<script language="javascript">';
    echo 'alert("Unsuccessful"); ';
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
  width: 80%;
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
  <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script><script>
  $(document).ready(function() {
    $("#datepicker3").datepicker();
  });
  </script>
  </script><script>
  $(document).ready(function() {
    $("#datepicker6").datepicker();
  });
  </script>
  
  <link rel="stylesheet" href="styles.css">

  
  
    <link href="./jquery.multiselect.css" rel="stylesheet" />
  
    <script src="./jquery.multiselect.js"></script>




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
		<h1>ADD Covid Record</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
	


  

	  
<label for="age"><strong>MRN:</strong></label>
<input type="text" name="pmrn" id="email" class="input-text" placeholder="MRN" size="70" value="<?php echo $pmrn1;?>">




	  
<label for="age"><strong>ID:</strong></label>
<input type="text" name="sid" id="email" class="input-text" placeholder="ID" size="70" value="<?php echo $max;?>"readonly>


	  <label for="age"><strong>Name:</strong></label>
<input type="text" name="name" id="email" class="input-text" placeholder="Name" size="70" value="<?php echo $ii['pname'];?>" readonly>

<label for="age"><strong>Gender:</strong></label>
	 <select name="psex" required>
						<option value='<?php echo $ii['gender'];?>'><?php echo $ii['gender'];?></option>
						
					
</select>

<label for="age"><strong>Age:</strong></label>
<input type="text" name="page" id="email" class="input-text" placeholder="Age" size="70"value="<?php echo $ii['age'];?>" readonly>     




<label for="age"><strong>Phone:</strong></label>
<input type="text" name="phone" id="email" class="input-text" placeholder="Phone" size="70"value="<?php echo $ii['pphone'];?>" readonly>     



<label for="age"><strong>Sample Sent:</strong></label>
<input type="text" name="ssent" id="datepicker" placeholder="Select Date" size="15" value="<?php echo date('m/d/Y');?>">


<label for="age"><strong>Sent To:</strong></label>
	 
<input type="text" name="sentto" placeholder="Test Centre" size="70" value="" required>

<label for="age"><strong>Resutl:</strong></label>
	 <select name="result" required>
        <option value=''>--Select--</option>
		<option value='P'>P</option>
		<option value='N'>N</option>
		
		
					
</select>




    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 4,
            placeholder: 'Select Symptoms',
            search: true,
            searchOptions: {
                'default': '-Select Symptoms-'
            },
            selectAll: true
        });

    });
</script>

  </fieldset>

 

<table><tr><td colspan="15">		<button type="submit" name="Submit">ADD</button></td>
</table>

</form>
  


</body>

</html>
