<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','staff1','mng','doctor')"; 
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
$sid1=$_REQUEST['sid'];

$query39 = "SELECT * FROM staff3 where sid= '$sid1'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$data = mysqli_fetch_array($result39);



//$full = $row39['fullname'];

//include("auth.php");
//echo $count1;


  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

//$sid1=$_REQUEST['sid'];
$name = $_REQUEST['name'];
$psex = $_REQUEST['psex'];

$dob = date('Y-m-d',strtotime($_REQUEST["dob"]));
$doj = date('Y-m-d',strtotime($_REQUEST["doj"]));
$dept=$_REQUEST['dept'];
$subdept=$_REQUEST['subdept'];
$desig=$_REQUEST['desig'];
$phone = $_REQUEST['phone'];
$padd = $_REQUEST['padd'];
$peradd = $_REQUEST['peradd'];
$district = $_REQUEST['district'];
$cat = $_REQUEST['cat'];
$incharge = $_REQUEST['incharge'];
$hos = $_REQUEST['hos'];
$bgroup = $_REQUEST['bgroup'];
$etime= date('d/m/Y H:i:s');
$ins_query1="update staff3 set sname='$name',gender='$psex',dob='$dob',doj='$doj',dept='$dept',subdept='$subdept',desig='$desig',
cno='$phone',padd='$padd',peradd='$peradd',district='$district',cat='$cat',eby='$user',etime='$etime',incharge='$incharge',hos='$hos',bgroup='$bgroup' where sid='$sid1'";
mysqli_query($con,$ins_query1) or die(mysql_error());



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
		<h1>Staff Details</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  <label><img alt="" src="staff_pic/<?php echo $data['pic'] ?>" class="img-flex-rounded" width="200"  height="200" align="center"/></label>
	  
	  <label for="age"><strong>Staff ID:</strong></label>
<input type="text" name="sid7" id="email" class="input-text" placeholder="SID" size="70"value="<?php echo $data['sid1'];?>"readonly>     

<label for="age"><strong>Name:</strong></label>
<input type="text" name="name" id="email" class="input-text" placeholder="Name" size="70" value="<?php echo $data['sname'];?>">
<label for="age"><strong>Gender:</strong></label>
	 <select name="psex" required>
						<option value='<?php echo $data['gender'];?>'><?php echo $data['gender'];?></option>
						<option value='M'>M</option>
						<option value='F'>F</option>
					
</select>

<label for="age"><strong>DOB (M/D/Y):</strong></label>
<input type="text" name="dob" id="datepicker" placeholder="Select Date" size="15" value="<?php if($data['dob']=='1970-01-01' ||$data['dob']=='0000-00-00'){echo '';}else {echo date('m/d/Y',strtotime($data['dob']));}?>">


<label for="age"><strong>DOJ (M/D/Y):</strong></label>
<input type="text" name="doj" id="datepicker1" placeholder="Select Date" size="15" value="<?php if($data['doj']=='1970-01-01' ||$data['dob']=='0000-00-00'){echo '';}else {echo date('m/d/Y',strtotime($data['doj']));}?>">


<label for="age"><strong>Department:</strong></label>
<select name="dept" >
        <option value='<?php echo $data['dept'];?>'><?php echo $data['dept'];?></option>
		<?php 
			$sql = "select * from `services` order by name asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->name."'>".$row->name."</option>";
				}
			}
			?>
				
</select>

<label for="age"><strong>Sub-Department:</strong></label>
<select name="subdept" >
        <option value='<?php echo $data['subdept'];?>'><?php echo $data['subdept'];?></option>
		<?php 
			$sql = "select distinct subdept from `staff3`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->subdept."'>".$row->subdept."</option>";
				}
			}
			?>
				
</select>
<label for="age"><strong>Designation:</strong></label>
<select name="desig" >
        <option value='<?php echo $data['desig'];?>'><?php echo $data['desig'];?></option>
		<?php 
			$sql = "select * from `desig`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->name."'>".$row->name."</option>";
				}
			}
			?>
				
</select>

<label for="age"><strong>Phone:</strong></label>
<input type="text" name="phone" id="email" class="input-text" placeholder="Phone" size="70"value="<?php echo $data['cno'];?>">     

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

<label for="age"><strong>Staff Category:</strong></label>
<select name="cat" >
        <option value='<?php echo $data['cat'];?>'><?php echo $data['cat'];?></option>
		<option value='Staff'>Staff</option>
		<option value='HOD'>HOD</option>
		<option value='Incharge'>Incharge</option>
		<option value='Acting Incharge'>Acting Incharge</option>
				
</select>


<label for="age"><strong>Incharge:</strong></label>
<select name="incharge" >
        <option value='<?php echo $data['incharge'];?>'><?php echo $data['incharge'];?></option>
		


<?php 
			$sql = "select * from `hos` where type='incharge'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->name."</option>";
				}
			}
			?>

		
</select>

<label for="age"><strong>HOS:</strong></label>
<select name="hos" >
        <option value='<?php echo $data['hos'];?>'><?php echo $data['hos'];?></option>
		


<?php 
			$sql = "select * from `hos` where type='hos'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->name."</option>";
				}
			}
			?>
			
</select>

  </fieldset>

 <a target='_blank' href="seducationstaff?sid=<?php echo "$sid1"; ?>"><b>Education Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="strainingstaff?sid=<?php echo "$sid1"; ?>"><b>Training Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="spromotionstaff?sid=<?php echo "$sid1"; ?>"><b>Promotion Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="stransferstaff?sid=<?php echo "$sid1"; ?>"><b>Transfer Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="snidstaff?sid=<?php echo "$sid1"; ?>"><b>Upload NID / Passport<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="staff_equipment?sid=<?php echo "$sid1"; ?>"><b>Material Given<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="snidstafftest?sid=<?php echo "$sid1"; ?>"><b>Upload Picture<b></a>


</table>

</form>
  


</body>

</html>
