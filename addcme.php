<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
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


$query43 = "SELECT COUNT(id) FROM topic;"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(id)'];
$count1 = $count+1;  
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$ccat = $_REQUEST['ccat'];
$ctopic = $_REQUEST['ctopic'];
$cspeaker=$_REQUEST['cspeaker'];
$cdate=date('Y-m-d',strtotime($_REQUEST['cdate']));
$ctime=$_REQUEST['ctime'];
$cvenue=$_REQUEST['cvenue'];
$caudi=$_REQUEST['caudi'];
//$page=$_REQUEST['page'];
//$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$etime= date('d/m/Y H:i:s');

$adate1= date('Y-m-d');


$url = "topicupload.php?id=$count1";
	
	$ins_query1="insert into cme (`category`,`topic`,`speaker`,`date`,`time`,`venue`,`audience`,`status`,`eby`,`etime`) values 
	('$ccat','$ctopic','$cspeaker','$cdate','$ctime','$cvenue','$caudi','Pending','$user','$etime')";
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
		<h1>ADD </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
		<label for="age"><strong>Category :</strong></label>	
			
			
			
						
						<select name="ccat" value='' required>
						<option value=''>--Select Discipline--</option>
						<option value='Orientation Program'>Orientation Program</option>
						<option value='TOWN HALL SESSION'>TOWN HALL SESSION</option>
						<option value='Product Presentation'>Product Presentation</option>
						<?php 


			$sql = "Select * from ccom order by cname asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->cname."'>".$row->cname."</option>";
				}
			}

			?>
      
						
						
						
						<option value='CME'>CME</option>
						<option value='TM'>TM</option>
						<option value='CNE'>CNE</option>	
						<option value='JOURNAL PRESENTATION'>JOURNAL PRESENTATION</option>	
						<option value='TOPIC PRESENTATION'>TOPIC PRESENTATION</option>
						<option value='Clinical Committee Meeting'>Clinical Committee Meeting</option>						
						<option value='Credentialing Committee'>Credentialing Committee</option>
						<option value='Consultant Meeting'>Consultant Meeting</option>
						<option value='Emergency Daily Case Presentation'>Emergency Daily Case Presentation</option>
						<option value='Hospital Event'>Hospital Event</option>	
											
						</select>
						
						<label for="age"><strong>Speaker :</strong></label>	
			
			
			
						
						<select name="cspeaker" value='' required>
						<option value=''>-Select-</option>
						
						<option value='Product Presentation'>Product Presentation</option>
						<option value='Mohd Taufik Bin Ismail'>Mohd Taufik Bin Ismail</option>
						
						<option value='Nuradilah Shuib'>Nuradilah Shuib</option>
								
						
						<option value='Ruzita Mohd Dan'>Ruzita Mohd Dan</option>
						
						<option value='Hospital Event'>Hospital Event</option>	
						
						
						
						<?php 


			$sql = "Select * from staff3 where desig='Medical Officer' and status!='Deactive'order by sname asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}

			?>
						
						
						
						<?php 
			$sql = "select * from `staff1` where ugroup in('doctor')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>
						
						<?php 


			$sql = "Select * from staff3 where cat in ('HOD','In-Charge') and status!='Deactive'order by sname asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}

			?>
						
														
						</select>
			

	  <label for="age"><strong>Name Of The Topic:</strong></label>
	  	
             <input list="browsers111" name="ctopic"  size="80"  value="" style="text-transform:uppercase"autocomplete="off"required>
						
						<datalist id="browsers111">

						<option value=''>-Select Topic</option>
				<?php 
			$sql = "select * from `cme`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->topic." "."'></option>";
				}
			}
			?>  </datalist>

								<br><br>
								<label for="age"><strong>Date & Time:</strong></label>
								<td colspan="2"><input type="text" name="cdate" id="datepicker" placeholder="Select Date" size="15" required></td>  
								<td colspan="8" align="center"><input type="text" name="ctime" value="" /></td>
								<br><br>
								<label for="age"><strong>Venue and Audience:</strong></label>
								<td colspan="20" align="center"><input type="text" name="cvenue" value="" /></td>
								<td colspan="20" align="center"><input type="text" name="caudi" value="" /></td>
														
						
						
			
	
      
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		<a target='_blank' href="adm?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data4["adoc"]; ?>&adate=<?php echo $data4["adate"]; ?>&eid=<?php echo $count1; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>