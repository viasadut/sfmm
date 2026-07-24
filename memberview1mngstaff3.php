<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','qc','staff','admin1')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }?>



<?php

require('db1.php');
$sid=$_REQUEST['sid'];
$query = "SELECT * from staff1 where sid='$sid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>



<?php

require('db1.php');
$stime=date("h:i:sa");


function makeThumbnail($name,$max_width, $max_height, $image_name, $type){
// Takes the sourcefile (path/to/image.jpg) and makes a thumbnail from it
// and places it at endfile (path/to/thumb.jpg).

// Load image and get image size.
   
//   
switch($type){
	case'image/png':
		$img = imagecreatefrompng($name);
		break;
		case'image/jpeg':
		$img = imagecreatefromjpeg($name);
		break;
		
		case'image/gif':
		$img = imagecreatefromgif($name);
		break;
		default : 
		return 'Un supported format';
}

$width = imagesx( $img );
$height = imagesy( $img );

if ($width > $height) {
    if($width < $max_width)
		$newwidth = $max_width;
	
	else
	
    $newwidth = $max_width;	
	
	
    $divisor = $width / $newwidth;
    $newheight = floor( $height / $divisor);
}
else {
	
	 if($height < $max_height)
         $newheight = $max_height;
     else
		 $newheight =  $max_height;
	 
    $divisor = $height / $newheight;
    $newwidth = floor( $width / $divisor );
}

// Create a new temporary image.
$tmpimg = imagecreatetruecolor( $newwidth, $newheight );

    imagealphablending($tmpimg, false);
    imagesavealpha($tmpimg, true);
	
// Copy and resize old image into new image.
imagecopyresampled( $tmpimg, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Save thumbnail into a file.

//compressing the file


switch($type){
	case'image/png':
		imagepng($tmpimg, $image_name, 0);
		break;
	case'image/jpeg':
		imagejpeg($tmpimg, $image_name, 100);
		break;
	case'image/gif':
		imagegif($tmpimg, $image_name, 0);
		break;	
	
}

// release the memory
   imagedestroy($tmpimg);
   imagedestroy($img);
}









?>

<?php
if(isset($_POST['Submit101']))
{
header("Location: membertest?sid=$sid");	
}
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];



  
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Out Patient Record</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
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
  font-size: 12px;
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

input[type="text1"] {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 20px;
  font-weight:bold;
  font-color: Blue;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: yellow;
  color: Black;
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

.button {
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
<link rel="stylesheet" href="jsnew/3.3.7.css.bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="jsnew/jquery.fancybox.min.css" media="screen">
    <script src="jsnew/jquery_3.2.1_jquery.min.js"></script>
    <script src="jsnew/fancybox.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>


<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>





  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Staff Record View Panel </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

				



       <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" style="width:300px;margin:auto;">

<div class="card" >
  <div class="card-body" >
  <div class="media" >
                    <a class="thumbnail fancybox" rel="ligthbox" href="uploads/<?php echo $row['image'] ?>">
                        <img class="img-responsive" alt="" src="uploads/<?php echo $row['image'] ?>"  class="img-flex-rounded" weight="165"  height="180" class="align-self-start mr-3"/>
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['image'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
					
					             



								</div>			</div>			</div>			</div>
								

								
								




<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
		


		

			
				<tr><td colspan="2"><label><strong>Staff ID:</strong></label></td>
				<td colspan="6"><label><strong>Staff's Name :</strong></label></td>
								<td colspan="4"><label><strong>Date Of Birth:</strong></label></td>
							<td colspan="4"><label><strong>Gender:</strong></label></td>
									<td colspan="4"><label><strong>Religion:</strong></label></td>
				
				</tr>
				<tr>	  
				<td colspan="2">	<input type="text" name="sid" id="sid" class="input-text" placeholder="Staff ID" value="<?php echo $row['sid'] ?>"required></td>
				<td colspan="6">	<input type="text" name="mname" id="mname" class="input-text" placeholder="Staff Name" value="<?php echo $row['mname'] ?>"required></td>
				<td colspan="4">	<input type="text" name="dob" id="datepicker" class="input-text" placeholder="Date Of Birth" value="<?php echo $row['dob'] ?>" required></td>
				
				<td colspan="4">	
						<select name="gender" class="style1" required> <option><?php echo $row['gender'] ?></option>
			<option value="MALE">MALE</option>;
			<option value="FEMALE">FEMALE</option>;
			<option value="OTHERS">OTHERS</option>;
				
      </select></td>		
				<td colspan="4">	
						<select name="religion" class="style1" value='' required> <option><?php echo $row['religion'] ?></option>
			<option value="Muslim">Muslim</option>;
			<option value="Hindu">Hindu</option>;
			<option value="Christian">Christian</option>;
			<option value="Buddhism">Buddhism </option>;
				
      </select></td>		
</tr>
						
												<tr>
						
						
						<td colspan="6"><label><strong>Father's Name:</strong></label></td>
						<td colspan="6"><label><strong>Mother's Name:</strong></label></td>	
						<td colspan="2"><label><strong>Marital Status:</strong></label></td>	
						
						<td colspan="6"><label><strong>Spouse's Name:</strong></label></td>				

						
						</tr>

<tr>				 
					<td colspan="6">					<input type="text" name="fname" id="mname" class="input-text" placeholder="Father Name" value="<?php echo $row['fname'] ?>"required></td>
					
					<td colspan="6">					<input type="text" name="maname" id="mname" class="input-text" placeholder="Mother Name" value="<?php echo $row['maname'] ?>" required></td>
					<td colspan="2">	
						<select name="mstatus" class="style1" value='' required> <option value="<?php echo $row['mstatus'] ?>"><?php echo $row['mstatus'] ?></option>
			<option value="Single">Single</option>;
			<option value="Married">Married</option>;
			<option value="Divorced">Divorced</option>;
			<option value="Widow">Widow</option>;
				
      </select></td>	
					<td colspan="6">					<input type="text" name="sname" id="sname" class="input-text" placeholder="Spouse Name" value="<?php echo $row['sname'] ?>"required></td>
				
					 
</tr>

				<tr><td colspan="16" bgcolor="#00CCCC"><label><strong>Permanent Address:</strong></label></td>
				<td colspan="4" bgcolor="#00CCCC"><label><strong>District:</strong></label></td>
				
				</tr>
								

		<tr>				 
					<td colspan="16">					<input type="text" name="peradd" id="village" class="input-text" placeholder="Village" value="<?php echo $row['peradd'] ?>"required></td>
					<td colspan="4">					<input type="text" name="perdis" id="village" class="input-text" placeholder="District" value="<?php echo $row['perdis'] ?>"required></td>
					
					
				
					 
</tr>

<tr><td colspan="20" bgcolor="#00CCCC"><label><strong>Present Address:</strong></label></td></tr>
								

		<tr>				 
					<td colspan="20">					<input type="text" name="preadd" id="village" class="input-text" placeholder="Address" value="<?php echo $row['preadd'] ?>"required></td>
					
					
					 
</tr>

		


					<tr>
						
						
						<td colspan="5"><label><strong>Phone:</strong></label></td>
												<td colspan="5"><label><strong>Email Address:</strong></label></td>
												<td colspan="5"><label><strong>Emergency Contact Person Name:</strong></label></td>
												<td colspan="5"><label><strong>Emergency Contact Person Phone No:</strong></label></td>


						
						</tr>

<tr>				 
					<td colspan="5">					<input type="text" name="phone" id="phone" class="input-text" placeholder="Phone" value="<?php echo $row['phone'] ?>"required></td>
										<td colspan="5">					<input type="text" name="email" id="email" class="input-text" placeholder="Email Address" value="<?php echo $row['email'] ?>"required></td>
										<td colspan="5">					<input type="text" name="econtact" id="econtact" class="input-text" placeholder="Emergency Contact Person Name" value="<?php echo $row['econtact'] ?>"required></td>
										<td colspan="5">					<input type="text" name="econtactp" id="econtactp" class="input-text" placeholder="Emergency COntact Person Phone No" value="<?php echo $row['econtactp'] ?>"required></td>
					
				
					 
</tr>



												<tr>
						
						<td colspan="3"><label><strong>Date Of Join:</strong></label></td>						
						<td colspan="3"><label><strong>Staff Type:</strong></label></td>
						<td colspan="3"><label><strong>Department:</strong></label></td>		
						<td colspan="3"><label><strong>Sub Department:</strong></label></td>	
						<td colspan="3"><label><strong>Category:</strong></label></td>							
						<td colspan="3"><label><strong>Designation:</strong></label></td>
						<td colspan="2"><label><strong>HOD:</strong></label></td>						

						
						</tr>

<tr>				 
					<td colspan="3"><input type="text" name="doj" id="datepicker1" class="input-text" placeholder="Date Of Birth" value="<?php echo $row['doj'] ?>"required></td></td>
					<td colspan="3"><select name="stype" class="style1" value='' required> <option value="<?php echo $row['stype'] ?>"><?php echo $row['stype'] ?></option>
			<option value="Permanent">Permanent</option>;
			<option value="Provisional">Provisional</option>;
						<option value="Contractual">Contractual</option>;
	      </select></td>
					<td colspan="3"><select name="department" class="style1" value='' required> <option value="<?php echo $row['department'] ?>"><?php echo $row['department'] ?></option>
			<option value="Administration">Administration</option>;
			<option value="Talent Management">Talent Management</option>;
						<option value="Information Technology">Information Technology</option>;
						<option value="Nursing">Nursing</option>;
	      </select></td>
					<td colspan="3"><select name="sdepartment" class="style1" value='' required> <option value="<?php echo $row['sdepartment'] ?>"><?php echo $row['sdepartment'] ?></option>
			<option value="Accident & Emergency">Accident & Emergency</option>;
			<option value="Inpatient">Inpatient</option>;
						<option value="Clinical Service">Clinical Service</option>;
	      </select></td>
		  
		  <td colspan="3"><select name="category" class="style1" value='' required> <option value="<?php echo $row['category'] ?>"><?php echo $row['category'] ?></option>
			<option value="Accident & Emergency">Accident & Emergency</option>;
			<option value="Inpatient">Inpatient</option>;
						<option value="Clinical Service">Clinical Service</option>;
	      </select></td>
					<td colspan="3"><select name="designation" class="style1" value='' required> <option value="<?php echo $row['designation'] ?>"><?php echo $row['designation'] ?></option>
			<option value="Executive">Executive</option>;
			<option value="Manager">Manager</option>;
						<option value="Asst. Manager">Asst. Manager</option>;
	      </select></td>
					
					<td colspan="5"><select name="hod" class="style1" value='' required> <option value="<?php echo $row['hod'] ?>"><?php echo $row['hod'] ?></option>
			<option value="YES">YES</option>;
			<option value="NO">NO</option>;
						
	      </select></td>
				
					 
</tr>


<tr>
						
						
						<td colspan="2"><label><strong>Status:</strong></label></td>
						<td colspan="3"><select name="astatus" class="style1" value='' required> <option value="<?php echo $row['astatus'] ?>"><?php echo $row['astatus'] ?></option>
			<option value="Active">Active</option>;
			<option value="Deactive">Deactive</option>;
			<option value="Resign">Resign</option>;
			<option value="Suspended">Suspended</option>;
	      </select></td></tr>




        <tr><td align="left" colspan="20"><a target='_blank' href="seducationmng?sid=<?php echo "$sid"; ?>"><b>Education Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="strainingmng?sid=<?php echo "$sid"; ?>"><b>Training Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="spromotionmng?sid=<?php echo "$sid"; ?>"><b>Promotion Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="stransfermng?sid=<?php echo "$sid"; ?>"><b>Transfer Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="snidmng?sid=<?php echo "$sid"; ?>"><b>Upload NID / Passport<b></a>

&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="cme_indu1?sid=<?php echo "$sid"; ?>"><b>CME & Training Records (In-House)<b></a>

&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="doc_contract_record?sid=<?php echo "$sid"; ?>"><b>Contract Update Portal<b></a>


</td></tr>

    </form> 





            


</body>

</html>
