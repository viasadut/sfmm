<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','staff1','mng')"; 
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
//$name=$_REQUEST['name'];
$id=$_REQUEST['id'];

$query39 = "SELECT * FROM student where id= '$id'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$data = mysqli_fetch_array($result39);
$sidu=$data['sid'];
$hos2=$data['hos'];
$inc=$data['incharge'];

$sida=$data['sid1'];

//$full = $row39['fullname'];

//include("auth.php");
//echo $count1;
/*
$querycz = "SELECT COUNT(uname) FROM user where uname='$sid1'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$z=$rowcz['COUNT(uname)'];
  */
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

//$sid7=$_REQUEST['sid7'];
$name = $_REQUEST['name'];
$fname = $_REQUEST['fname'];
$roll = $_REQUEST['roll'];
$session = $_REQUEST['session'];
$year = $_REQUEST['year'];
//$psex = $_REQUEST['psex'];

//$dob = date('Y-m-d',strtotime($_REQUEST["dob"]));




$phone = $_REQUEST['phone'];
$phone1 = $_REQUEST['phone1'];
$padd = $_REQUEST['padd'];
$peradd = $_REQUEST['peradd'];
//$district = $_REQUEST['district'];

//$bgroup = $_REQUEST['bgroup'];

$email = $_REQUEST['email'];

$etime= date('d/m/Y H:i:s');
//$mrn = $_REQUEST['mrn'];

$ins_query1="insert into student (`sname`,`fname`,`roll`,`mno`,`mno2`,`padd`,`peradd`,`aby`,`atime`,`email`,`session`,`year`)
values
('$name','$fname','$roll','$phone','$phone1','$padd','$peradd','$user','$etime','$email','$session','$year')";
mysqli_query($con,$ins_query1) or die(mysql_error());




/*if($z=='0')
{
$ins_query78="insert into user (`uname`,`upass`,`utype`,`fullname`,`ugroup`,`status`,`dept`) 
values ('$sidu', '123456','staff','$name','staff','Active','$dept')";
mysqli_query($con,$ins_query78);
}
*/
//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';


}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Student Add Record</title>
  
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
  
  
  <script>
  $(document).ready(function() {
    $("#datepicker7").datepicker();
  });
  </script>
  <script>
  $(document).ready(function() {
    $("#datepicker5").datepicker();
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
		<h1>Student Add Record</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  
	  <label for="age"><strong>Staff ID:</strong></label>
<input type="text" name="sid7" id="email" class="input-text" placeholder="SID" size="70"value="<?php echo $data['roll'];?>"required>     

<label for="age"><strong>Name:</strong></label>
<input type="text" name="name" id="email" class="input-text" placeholder="Name" size="70" value="<?php echo $data['sname'];?>">

<label for="age"><strong>Parent's Name:</strong></label>
<input type="text" name="fname" id="email" class="input-text" placeholder="Name" size="70" value="<?php echo $data['fname'];?>">

<label for="age"><strong>Gender:</strong></label>
	 <select name="psex" required>
						<option value='<?php echo $data['gender'];?>'><?php echo $data['gender'];?></option>
						<option value='M'>M</option>
						<option value='F'>F</option>
					
</select>

<label for="age"><strong>DOB (M/D/Y):</strong></label>
<input type="text" name="dob" id="datepicker" placeholder="Select Date" size="15" value="<?php if($data['dob']=='1970-01-01' ||$data['dob']=='0000-00-00'){echo '';}else {echo date('m/d/Y',strtotime($data['dob']));}?>">




<label for="age"><strong>Year:</strong></label>
<select name="year" >
        <option value='<?php echo $data['year'];?>'><?php echo $data['year'];?></option>
				<option value='1st Year'>1st Year</option>
				<option value='2nd Year'>2nd Year</option>
				<option value='3rd Year'>3rd Year</option>
				<option value='4th Year'>4th Year</option>
</select>


<label for="age"><strong>Session:</strong></label>
<input type="text" name="session" id="email" class="input-text" placeholder="Phone" size="70"value="<?php echo $data['session'];?>">     


<label for="age"><strong>Self Phone:</strong></label>
<input type="text" name="phone" id="email" class="input-text" placeholder="Phone" size="70"value="<?php echo $data['mno'];?>">     

<label for="age"><strong>Parent's Phone:</strong></label>
<input type="text" name="phone1" id="email" class="input-text" placeholder="Phone" size="70"value="<?php echo $data['mno2'];?>">     

<label for="age"><strong>Present Address:</strong></label>
<input type="text" name="padd" id="email" class="input-text" placeholder="padd" size="70"value="<?php echo $data['padd'];?>">     

<label for="age"><strong>Permanent Address:</strong></label>
<input type="text" name="peradd" id="email" class="input-text" placeholder="padd" size="70"value="<?php echo $data['peradd'];?>">     

<label for="age"><strong>Blood Group:</strong></label>
 <select name="bgroup" required>
	 <option value='<?php echo $data['bgroup'];?>'><?php echo $data['bgroup'];?></option>
        <option value='A(+ve)'>A(+ve)</option>
		<option value='A(-ve)'>A(-ve)</option>
		<option value='B(+ve)'>B(+ve)</option>
		<option value='B(-ve)'>B(-ve)</option>
		<option value='AB(+ve)'>AB(+ve)</option>
		<option value='AB(-ve)'>AB(-ve)</option>
		<option value='O(+ve)'>O(+ve)</option>
		<option value='O(-ve)'>O(-ve)</option>
				
		
		
					
</select>

<label for="age"><strong>District:</strong></label>
	 <select name="district" required>
        <option value='<?php echo $data['district'];?>'><?php echo $data['district'];?></option>
								<option value='Barguna'>Barguna</option>
<option value='Barisal'>Barisal</option> 
<option value='Bhola'>Bhola</option>
<option value='Jhalokati'>Jhalokati</option> 
<option value='Patuakhali'>Patuakhali</option> 
<option value='Pirojpur'>Pirojpur</option> 
<option value='Bandarban'>Bandarban</option> 
<option value='Brahmanbaria'>Brahmanbaria</option> 
<option value='Chandpur'>Chandpur</option> 
<option value='Chittagong'>Chittagong</option> 
<option value='Comilla'>Comilla</option> 
<option value='Coxs Bazar'>Cox's Bazar</option> 
<option value='Feni'>Feni</option> 
<option value='Khagrachhari'>Khagrachhari</option> 
<option value='Lakshmipur'>Lakshmipur</option> 
<option value='Noakhali'>Noakhali</option> 
<option value='Rangamati'>Rangamati</option> 
<option value='Dhaka'>Dhaka</option> 
<option value='Faridpur'>Faridpur</option> 
<option value='Gazipur'>Gazipur</option> 
<option value='Gopalganj'>Gopalganj</option> 
<option value='Kishoreganj'>Kishoreganj</option> 
<option value='Madaripur'>Madaripur</option> 
<option value='Manikganj'>Manikganj</option> 
<option value='Munshiganj'>Munshiganj</option> 
<option value='Narayanganj'>Narayanganj</option> 
<option value='Narsingdi'>Narsingdi</option> 
<option value='Rajbari'>Rajbari</option> 
<option value='Shariatpur'>Shariatpur</option> 
<option value='Tangail'>Tangail</option> 
<option value='Bagerhat'>Bagerhat</option> 
<option value='Chuadanga'>Chuadanga</option> 
<option value='Jessore'>Jessore</option> 
<option value='Jhenaidah'>Jhenaidah</option> 
<option value='Khulna'>Khulna</option> 
<option value='Kushtia'>Kushtia</option> 
<option value='Magura'>Magura</option> 
<option value='Meherpur'>Meherpur</option> 
<option value='Narail'>Narail</option> 
<option value='Satkhira'>Satkhira</option> 
<option value='Jamalpur'>Jamalpur</option> 
<option value='Mymensingh'>Mymensingh</option> 
<option value='Netrokona'>Netrokona</option> 
<option value='Sherpur'>Sherpur</option> 
<option value='Bogra'>Bogra</option> 
<option value='Joypurhat'>Joypurhat</option> 
<option value='Naogaon'>Naogaon</option> 
<option value='Natore'>Natore</option> 
<option value='Chapai Nawabganj'>Chapai Nawabganj</option> 
<option value='Pabna'>Pabna</option> 
<option value='Rajshahi'>Rajshahi</option> 
<option value='Sirajganj'>Sirajganj</option> 
<option value='Dinajpur'>Dinajpur</option> 
<option value='Gaibandha'>Gaibandha</option> 
<option value='Kurigram'>Kurigram</option> 
<option value='Lalmonirhat'>Lalmonirhat</option> 
<option value='Nilphamari'>Nilphamari</option> 
<option value='Panchagarh'>Panchagarh</option> 
<option value='Rangpur'>Rangpur</option> 
<option value='Thakurgaon'>Thakurgaon</option> 
<option value='Habiganj'>Habiganj</option> 
<option value='Moulvibazar'>Moulvibazar</option> 
<option value='Sunamganj'>Sunamganj</option> 
<option value='Sylhet'>Sylhet</option> 


</select>

<label for="age"><strong>Email Address:</strong></label>
<input type="text" name="email" id="email" class="input-text" placeholder="Email Address" size="70"value="<?php echo $data['email'];?>">     




<label for="age"><strong>MRN:</strong></label>
<input type="text" name="mrn" id="mrn" class="input-text" placeholder="MRN" size="70"value="<?php echo $data['mrn'];?>">     


  </fieldset>

 <a target='_blank' href="seducationstaff?sid=<?php echo "$sid1"; ?>"><b>Education Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="strainingstaff?sid=<?php echo "$sid1"; ?>"><b>Training Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="spromotionstaff?sid=<?php echo "$sid1"; ?>"><b>Promotion Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="stransferstaff?sid=<?php echo "$sid1"; ?>"><b>Transfer Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="snidstaff?sid=<?php echo "$sid1"; ?>"><b>Upload NID / Passport<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="staff_equipment?sid=<?php echo "$sid1"; ?>"><b>Material Given<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="snidstafftest?sid=<?php echo "$sid1"; ?>"><b>Upload Picture<b></a>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Edit</button></td>
</table>

</form>
  


</body>

</html>
