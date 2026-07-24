<?php
include_once 'dbconfig.php';
?>

<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd')"; 
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
$id=$_REQUEST['id'];

$query39 = "SELECT * FROM covid where id= '$id'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$data = mysqli_fetch_array($result39);



//echo $full = $data1['mname'];

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


$cp = $_REQUEST['cp'];
$name4 = $_REQUEST['name'];
$depart = $_REQUEST['depart'];
$desig = $_REQUEST['desig'];
$remarks = $_REQUEST['remarks'];
$rresult = $_REQUEST['rresult'];
$ssent = date('Y-m-d',strtotime($_REQUEST["ssent"]));
$ssent1 = date('d/m/Y',strtotime($_REQUEST["ssent"]));
$tresult=$_REQUEST['tresult'];
$cduration=$_REQUEST['cduration'];
$distance=$_REQUEST['distance'];
$ldate=date('Y-m-d',strtotime($_REQUEST["ldate"]));
$ldate1=date('d/m/Y',strtotime($_REQUEST["ldate"]));
$retest=date('Y-m-d',strtotime($_REQUEST["retest"]));
$retest1=date('d/m/Y',strtotime($_REQUEST["retest"]));
$quntil=date('Y-m-d',strtotime($_REQUEST["quntil"]));
$quntil1=date('d/m/Y',strtotime($_REQUEST["quntil"]));
$sam2=date('Y-m-d',strtotime($_REQUEST["sam2"]));
$sam21=date('d/m/Y',strtotime($_REQUEST["sam2"]));
$rrdate1=date('Y-m-d',strtotime($_REQUEST["rrdate1"]));
$rrdate2=date('d/m/Y',strtotime($_REQUEST["rrdate1"]));

$adate= date('d/m/Y H:i:s');

$pcase = $_REQUEST['pcase'];
$sentto = $_REQUEST['sentto'];
$padd = $_REQUEST['padd'];
$phone = $_REQUEST['phone'];
$advice = $_REQUEST['advice'];

$ssam2nd = $_REQUEST['ssam2nd'];
$fresult = $_REQUEST['fresult'];
$page = $_REQUEST['page'];
$psex = $_REQUEST['psex'];
$district = $_REQUEST['district'];
$specimen = $_REQUEST['specimen'];
$rdate=date('Y-m-d',strtotime($_REQUEST["rdate"]));
$rdate1=date('d/m/Y',strtotime($_REQUEST["rdate"]));


$ins_query1="update covid set cp='$cp',depart='$depart',ssent='$ssent',tresult='$tresult',cduration='$cduration',distance='$distance',quntil='$quntil',retest='$retest',etime='$adate',eby='$user',ldate='$ldate',ldate1='$ldate1',ssent1='$ssent1',retest1='$retest1',desig='$desig',remarks='$remarks',quntil1='$quntil1',pcase='$pcase',sentto='$sentto',padd='$padd',phone='$phone',rresult='$rresult',advice='$advice', 
page='$page',psex='$psex',district='$district',specimen='$specimen',rdate='$rdate',rdate1='$rdate1',sam2='$sam2',sam21='$sam21',rrdate1='$rrdate1',rrdate2='$rrdate2',ssam2nd='$ssam2nd',fresult='$fresult' where id='$id'";
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
    $("#datepicker5").datepicker();
  });
  </script>
  <script>
  $(document).ready(function() {
    $("#datepicker7").datepicker();
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
		<h1>Edit Covid Record</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Contact Pattern:</strong></label>
	  <input type="text" name="cp" id="email" class="input-text" placeholder="Contact Pattern" size="70" value="<?php echo $data['cp'];?>"required>

<label for="age"><strong>Name:</strong></label>
<input type="text" name="name" id="email" class="input-text" placeholder="Name" size="70" value="<?php echo $data['name'];?>"readonly>
<label for="age"><strong>Gender:</strong></label>
	 <select name="psex" required>
						<option value='<?php echo $data['psex'];?>'><?php echo $data['psex'];?></option>
						<option value='Male'>Male</option>
						<option value='Female'>Female</option>
					
</select>

<label for="age"><strong>Age:</strong></label>
<input type="text" name="page" id="email" class="input-text" placeholder="Age" size="70"value="<?php echo $data['page'];?>"required>     


<label for="age"><strong>Department:</strong></label>
<input type="text" name="depart" id="email" class="input-text" placeholder="Department" size="70"value="<?php echo $data['depart'];?>"readonly>     
<label for="age"><strong>Designation:</strong></label>
<input type="text" name="desig" id="email" class="input-text" placeholder="Designation" size="70"value="<?php echo $data['desig'];?>"readonly>     

<label for="age"><strong>Phone:</strong></label>
<input type="text" name="phone" id="email" class="input-text" placeholder="Phone" size="70"value="<?php echo $data['phone'];?>"readonly>     

<label for="age"><strong>Address:</strong></label>
<input type="text" name="padd" id="email" class="input-text" placeholder="padd" size="70"value="<?php echo $data['padd'];?>"readonly>     


<label for="age"><strong>District:</strong></label>
	 <select name="district" required>
        <option value='<?php echo $data['district'];?>'><?php echo $data['district'];?></option>
						<option value='Gazipur'>Gazipur</option>
						<option value='Dhaka'>Dhaka</option>
						<option value='Tangail'>Tangail</option>
						<option value='Savar'>Savar</option>

</select>

<label for="age"><strong>Sample Sent:</strong></label>
<input type="text" name="ssent" id="datepicker" placeholder="Select Date" size="15" value="<?php echo date('m/d/Y',strtotime($data['ssent']));?>"required>


<label for="age"><strong>Sent To:</strong></label>
	 <select name="sentto" required>
        
						<option value='<?php echo $data['sentto'];?>'><?php echo $data['sentto'];?></option>
		


		<option value='IEDCR'>IEDCR</option>
		<option value='IPH'>IPH</option>
		<option value='NILM'>NILM</option>
					
</select>
<label for="age"><strong>Specimen:</strong></label>
<select name="specimen" required>
        
						<option value='<?php echo $data['specimen'];?>'><?php echo $data['specimen'];?></option>
		


		<option value='Nasal Swab'>Nasal Swab</option>
		<option value='Throat Swab'>Throat Swab</option>
		
					
</select>


<label for="age"><strong>Test Result:</strong></label>
	 <select name="tresult" >
        
						<option value='<?php echo $data['tresult'];?>'><?php echo $data['tresult'];?></option>
		


		<option value='N'>N</option>
		<option value='P'>P</option>
					
</select>

<label for="age"><strong>Result Date:</strong></label>
<input type="text" name="rdate" id="datepicker6" placeholder="Select Date" size="15" value="<?php if($data['rdate']=='1970-01-01' || $data['rdate']=='0000-00-00'){echo '';} else {echo date('m/d/Y',strtotime($data['rdate']));}?>">



<label for="age"><strong>Last date of contact with positive case:</strong></label>
<input type="text" name="ldate" id="datepicker1" placeholder="Select Date" size="15" value="<?php if($data['ldate']=='1970-01-01' || $data['ldate']=='0000-00-00'){echo '';} else {echo date('m/d/Y',strtotime($data['ldate']));}?>">
	  
	  <label for="age"><strong>Contact Duration:</strong></label>
<select name="cduration" >
        
						<option value='<?php echo $data['cduration'];?>'><?php echo $data['cduration'];?></option>
		


		<option value='>15 min'>>15 min</option>
		<option value='<15 min'><15 min</option>
					
</select>


<label for="age"><strong>Within 1 m Distance:</strong></label>
	 <select name="distance" >
        
						<option value='<?php echo $data['distance'];?>'><?php echo $data['distance'];?></option>
		


		<option value='Y'>Y</option>
		<option value='N'>N</option>
					
</select>  
	  	 
		 <label for="age"><strong>Quarantine until:</strong></label>
<input type="text" name="quntil" id="datepicker3" placeholder="Select Date" size="15" value="<?php if($data['quntil']=='1970-01-01' || $data['quntil']=='0000-00-00'){echo '';} else {echo date('m/d/Y',strtotime($data['quntil']));}?>">

	<label for="age"><strong>Retest:</strong></label>
<input type="text" name="retest" id="datepicker2" placeholder="Select Date" size="15" value="<?php if($data['retest']=='1970-01-01' || $data['retest']=='0000-00-00'){echo '';} else {echo date('m/d/Y',strtotime($data['retest']));}?>">
  
   
<label for="age"><strong>Primary Case:</strong></label>
<textarea rows="5" name="pcase" ><?php echo $data['pcase'];?></textarea>

	  	  <label for="age"><strong>Remarks:</strong></label>
<input type="text" name="remarks" id="email" class="input-text" placeholder="Remarks" size="70" value='<?php echo $data['remarks'];?>'>
	        

<label for="age"><strong>2nd Sample Sent To:</strong></label>
	 <select name="ssam2nd">
        
						<option value='<?php echo $data['ssam2nd'];?>'><?php echo $data['ssam2nd'];?></option>
		


		<option value='IEDCR'>IEDCR</option>
		<option value='IPH'>IPH</option>
		<option value='NILM'>NILM</option>
					
</select>

			
			<label for="age"><strong>2nd Test Result:</strong></label>
	 <select name="rresult" >
        
						<option value='<?php echo $data['rresult'];?>'><?php echo $data['rresult'];?></option>
		
	


		<option value='N'>N</option>
		<option value='P'>P</option>
					
</select>

<label for="age"><strong>2nd Sample Sent:</strong></label>
<input type="text" name="sam2" id="datepicker5" placeholder="Select Date" size="15" value="<?php if($data['sam2']=='1970-01-01' ||$data['sam2']== '0000-00-00'){echo '';} else {echo date('m/d/Y',strtotime($data['sam2']));}?>">


<label for="age"><strong>2nd Result Date:</strong></label>
<input type="text" name="rrdate1" id="datepicker7" placeholder="Select Date" size="15" value="<?php if($data['rrdate1']=='1970-01-01' ||$data['rrdate1']== '0000-00-00'){echo '';} else {echo date('m/d/Y',strtotime($data['rrdate1']));}?>">





<label for="age"><strong>Last Working Test Result:</strong></label>
	 <select name="fresult" required>
        
						<option value='<?php echo $data['fresult'];?>'><?php echo $data['fresult'];?></option>
		
	


		<option value='N'>N</option>
		<option value='P'>P</option>
					
</select>
<label for="age"><strong>Advice:</strong></label>
<textarea rows="15" name="advice" ><?php echo $data['advice'];?></textarea>

  </fieldset>

 

<table><tr><td colspan="15">		<button type="submit" name="Submit">Edit</button></td>
</table>

</form>
  


</body>

</html>
