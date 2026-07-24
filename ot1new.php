<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
$date=date('m/d/Y');
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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from patient where ID='$id' and pmrn='$pmrn'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pa= $row['page'];
$ps= $row['psex'];
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$diagnosis=$_REQUEST['diagnosis'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$adate=$_REQUEST['adate'];
$otdate=$_REQUEST['otdate'];
$bkdate=$_REQUEST['bkdate'];
$bt=$_REQUEST['bt'];
$tp=$_REQUEST['tp'];
$ta=$_REQUEST['ta'];
$sn=$_REQUEST['sn'];
$na=$_REQUEST['na'];
$xl=$_REQUEST['xl'];
$lx= implode(",",$xl);
$duration=$_REQUEST['duration'];
$otherins=$_REQUEST['otherins'];
$sprequire=$_REQUEST['sprequire'];
$remarks=$_REQUEST['remarks'];





$ins_query="insert into ot (`dname`,`pname`,`pmrn`,`pphone`,`diagnosis`,`operation`,`psex`,`page`,`adate`,`otdate`,`bookingdt`,`duration`,`spereq`,`ptype`,`tanes`,`nanes`,`proce`,`duration1`,`Otherins`,`sprequire`,`remarks`) values 
('$dname', '$pname','$pmrn','$pphone','$cdetails','$diagnosis','$psex','$page','$adate','$otdate','$bkdate','$bt','$sn','$tp','$ta','$na','$lx','$duration','$otherins','$sprequire','$remarks')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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
  width: 100%;
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
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
}


@media screen and (min-width: 480px) {

  form {
    max-width: 1400px;
  }

}
      </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
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
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js">
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

<h1 align="center">OT BOOKING FORM </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname" required value="<?php echo $full; ?>" readonly/>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="18"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="2"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly/></td>
					 <td colspan="18"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly/></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="2"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>OT Date:</strong></label></td>
						<td colspan="6"><label><strong>OT TIME:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="2"><input type="text" name="page" required value="<?php echo $pa;?>" readonly/></td>  
             		<td colspan="3"><input type="text" name="adate" id="datepicker" placeholder="Select Date" size="15"></td>					 	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly/></td>
					 <td colspan="2"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly/></td>  

			    	 <td colspan="2"><input type="text" name="otdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="6"><select name="bt">
        
						<option value=''>-Select-</option>
						<option value='9:00AM'>9:00AM</option>
						<option value='10:00AM'>10:00AM</option>
						<option value='11:00AM'>11:00AM</option>
						<option value='12:00PM'>12:00PM</option>
						<option value='1:00PM'>1:00PM</option>
						<option value='2:00PM'>2:00PM</option>
						<option value='3:00PM'>3:00PM</option>
						<option value='4:00PM'>4:00PM</option>
						<option value='5:00PM'>5:00PM</option>
						<option value='6:00PM'>6:00PM</option>
						<option value='7:00PM'>7:00PM</option>
						<option value='8:00PM'>8:00PM</option>
						<option value='9:00PM'>9:00PM</option>
						<option value='10:00PM'>10:00PM</option>
						<option value='11:00PM'>11:00PM</option>
						<option value='12:00AM'>12:00AM</option>
				
</select></td>  
				
					 </tr>
					 
					 
		
		<tr>
							<td colspan="2"><label><strong>Duration:</strong></label></td>
						<td colspan="3"><label><strong>Booking Date& Time:</strong></label></td>
						<td colspan="2"><label><strong>Type Of Patients:</strong></label></td>
						<td colspan="2"><label><strong>Name of Anesthetist:</strong></label></td>
						<td colspan="4"><label><strong>Special Need:</strong></label></td>
						<td colspan="6"><label><strong>Type of Anesthesia:</strong></label></td>
						
						</tr>
						
						<tr>				
						
					 <td colspan="2"><input type="text" name="duration" size="15"value="" ></td> 
					 <td colspan="3"><input type="text" name="bkdate" size="15"value="<?php echo $date;?>" readonly/></td>  		

						
						
						<td colspan="2"><select name="tp">
        
						<option value=''>-Select-</option>
						<option value='In-Patients'>In-Patients</option>
						<option value='Day Care'>Day Care</option>
						<option value='OPD Procedure'>OPD Procedure</option>
				
</select></td>  
             		<td colspan="2"><select name="na">
        
						<option value=''>-Select-</option>
						<option value='Dr. Md. Ashraful Haque'>Dr. Md. Ashraful Haque</option>
						<option value='Dr. Rasel Arafat '>Dr. Rasel Arafat</option>
				
</select></td>					 	
					 <td colspan="4"><select name="sn">
        
						<option value=''>-Select-</option>
						<option value='Stretcher'>Stretcher</option>
						<option value='Wheel Chair'>Wheel Chair</option>
						<option value='Wheel Chair'>N/A</option>
				
</select></td>
					 <td colspan="6"><select name="ta">
        
						
						<option value=''>-Select-</option>
						<option value='General'>General</option>
						<option value='Local'>Local</option>
						<option value='Spinal'>Spinal</option>
						<option value='Nerve Block'>Nerve Block</option>
						
						
				
</select></td>  

 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="diagnosis" rows="5"></textarea></td>  </tr>
						


		<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>
		<tr><td colspan="20"><select name="xl[]" multiple="multiple" class="3col active" placeholder="Select Investigations">
<option value="">NOT REQUIRED</option>

       <?php 
			$sql = "select * from `procedure`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->proname."'>".$row->proname."</option>";
				}
			}
			?>
    </select>

    <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 6,
            placeholder: 'Select Investigation',
            search: true,
            searchOptions: {
                'default': '-Select Investigation-'
            },
            selectAll: true
        });

    });
</script>
</td></tr>
<td colspan="20"><input type="text" name="otherins" placeholder="Other Instruction"></td>	    	 
					 </tr>

		
		
		 <tr><td colspan="20"><label><strong>Instruction After Admission:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="cdetails" rows="5"></textarea></td>  </tr>
		<tr>
						
						<td colspan="20"><label><strong>Special Requirement:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><input type="text" name="sprequire" value=""</td>  
				
						
					 
					 </tr>
					 <tr>
						
						<td colspan="20"><label><strong>Remarks:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><input type="text" name="remarks" value=""</td>  
				
						
					 
					 </tr>
		
						
						 
						
				
				

<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="10"><a target='_blank' href="otreport?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>&bkdate=<?php echo "$bkdate"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>

</body>

</html>
