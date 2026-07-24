<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','doctor','imo','mofficer')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
$dept=$row7['dept'];


?>

<?php

require('db1.php');

$user=$_SESSION['sess_username'];


$atime=date('Y-m-d H:i:s');
//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];






$query = "SELECT * from roaster where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row_r = mysqli_fetch_assoc($result);
$ddate=$row_r['date'];
$ddate1=date('d/m/Y h:i:s');
  
?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$code_name=$_REQUEST['code_name'];
$code_incharge=$_REQUEST['code_incharge'];
$code_members=$_REQUEST['code_members'];
$code_color=$_REQUEST['code_color'];
		
		
$querycz = "insert into code (`code_name`,`members`,`code_color`,`created_by`,`role`)
values ('$code_name','$code_incharge','$code_color','$fullname','Incharge')"; 
mysqli_query($con, $querycz) or die(mysqli_error());

foreach($_POST['code_members'] as $group_member){
	
$querycz = "insert into code (`code_name`,`members`,`code_color`,`created_by`,`role`)
values ('$code_name','$group_member','$code_color','$fullname','Member')"; 
mysqli_query($con, $querycz) or die(mysqli_error());

	
	}
}
?>
<?php 
$query39 = "SELECT * FROM radreport where pmrn= '$pmrn' and eid='$count1'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$dname3=$row39['dname'];

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DID REPORT</title>
  
    

  
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


<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>

</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center"><?php echo $row_r['date'];?></h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}" autocomplete="on">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field"> 

		
		
		<label>Code Name</label> 
      <input name="code_name" type="text" size="15" value="" style="font-size:30px;color:green;font-weight:bold;" required />

		
		<label>Incharge</label> 
     <select id="pmrn" class="con_charge" list="categoryname" autocomplete="off" name='code_incharge' required>

						<option value=''>-Select Name-</option>
				
				<?php 
			$sql1 = "Select * from staff1 where astatus='Active';";
			$res1 = mysqli_query($con, $sql1);
			if(mysqli_num_rows($res1) > 0) {
				while($row1 = mysqli_fetch_object($res1)) {
					echo "<option value='".$row1->sid."'>".$row1->mname."</option>";
				}
			}
			?>		  
                          
			<?php 
			$sql = "Select * from staff3 where status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
			}
			?>  </select>
			
			
			
			
			<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />			
			<script>
$(document).ready(function() {
    $('.con_charge').select2();
});
</script>

	  
	  <label>Members</label> 
     

    <select class="country"
					multiple="true"
					name="code_members[]">
				
				<?php 
			$sql1 = "Select * from staff1 where astatus='Active';";
			$res1 = mysqli_query($con, $sql1);
			if(mysqli_num_rows($res1) > 0) {
				while($row1 = mysqli_fetch_object($res1)) {
					echo "<option value='".$row1->sid."'>".$row1->mname."</option>";
				}
			}
			?>		  
                          
			<?php 
			$sql = "Select * from staff3 where status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
			}
			?> 
			</select>
			
	  <script>
			$(document).ready(function () {
				//Select2
				$(".country").select2({
					maximumSelectionLength: 50,
				});
				//Chosen
				/*$(".country1").chosen({
					max_selected_options: 20,
				});*/
			});
		</script>

		  
		  <label>Color Picker: </label>  
						<input type="color"
			id="colorPicker" value="#000000">

		<!-- To display hex code of the color -->
		<input type="text" id="box" name='code_color' readonly>
  
														


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>

	  				
</tr>

</body>

</html>


<script>
		function myColor() {

			// Get the value return by color picker
			var color = document.getElementById('colorPicker').value;

			// Set the color as background
		

			// Take the hex code
			document.getElementById('box').value = color;
		}

		// When user clicks over color picker,
		// myColor() function is called
		document.getElementById('colorPicker')
			.addEventListener('input', myColor);
	</script>